<?php namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\ThemeModel;
use App\Models\ProductModel;
use App\Models\CustomerModel;
use App\Models\OrderModel;

class Customer extends BaseController
{
    private $model = null;
    private $thememodel = null;
    private $prodmodel = null;
    private $customermodel = null;
    private $ordermodel = null;

    public function __construct()
    {
        $session = \Config\Services::session();
        $session->start();
        $this->model = new CategoryModel();
        $this->thememodel = new ThemeModel();
        $this->prodmodel = new ProductModel();
        $this->customermodel = new CustomerModel();
        $this->ordermodel = new OrderModel();
    }

    # Shows customer login page.
    public function index() {

    		$data['categories'] = $this->model->getCategories();
    		$data['themecategories'] = $this->thememodel->getThemeCategories();
        $data['title'] = "Kirjaudu";

        echo view('templates/header', $data);
        echo view('customer/customer_view');
        echo view('templates/footer');
    }

    # Shows customer register page.
    public function register() {

        $data['title'] = "Rekisteröidy";
        $data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();

        echo view('templates/header', $data);
        echo view('customer/customerRegister_view');
        echo view('templates/footer');
    }

    # shows customers detail page.
    public function customerDetail() {
        # if logged customer, gets user id from session array.
        if(!isset($_SESSION['customer'])) {
            return redirect()->to('/customer/index');
        }
        else
        {
            $customerid = null;
            foreach ($_SESSION['customer'] as $key => $value):
                    $customerid = $value;
            endforeach;
        }

        $data['title'] = "Tiedot";
        $data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();
        $data['userdata'] = $this->customermodel->find($customerid);
        $data['orders'] = $this->ordermodel->getOrders();

        echo view('templates/header', $data);
        echo view('customer/customerDetail_view');
        echo view('templates/footer');
    }

    # Loads view where customer can edit email address or password
    public function customerEdit() {
        # if logged customer, gets user id from session array.
        if(!isset($_SESSION['customer'])) {
           return redirect()->to('/customer/index');
        }
        else
        {
            $customerid = null;
            foreach ($_SESSION['customer'] as $key => $value):
                    $customerid = $value;
            endforeach;
        }

        $data['userdata'] = $this->customermodel->find($customerid);
        $data['title'] = "Muokkaa tietoja";
        $data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();

        echo view('templates/header', $data);
        echo view('customer/customerEdit_view');
        echo view('templates/footer');
    }

    # shows page where customer can update details (firstname, lastname, address etc.)
    public function customerEditDetail() {
        # if logged customer, gets user id from session array.
        if(!isset($_SESSION['customer'])) {
            return redirect()->to('/customer/index');
        }
        else
        {
            $customerid = null;
            foreach ($_SESSION['customer'] as $key => $value):
                    $customerid = $value;
            endforeach;
        }

        $data['title'] = "Muokkaa tietoja";
        $data['userdata'] = $this->customermodel->find($customerid);
        $data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();

        echo view('templates/header',$data);
        echo view('customer/customerEditDetail_view',$data);
        echo view('templates/footer');
    }

    # Updates customer email address
    public function customerEmailUpdate() {
        $validation =  \Config\Services::validation();
        # if logged customer, gets user id from session array.
        if(!isset($_SESSION['customer'])) {
            return redirect()->to('/customer/index');
        }
        else
        {
            $customerid = null;
            foreach ($_SESSION['customer'] as $key => $value):
                    $customerid = $value;
            endforeach;
        }

        $data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();
        $data['userdata'] = $this->customermodel->find($customerid);
        $data['orders'] = $this->ordermodel->getOrders();
        $data['title'] = "Muokkaa tietoja";

        if (!$this->validate($validation->getRuleGroup('customerEmailValidate'))) {
            echo view('templates/header',$data);
            echo view('customer/customerEdit_view');
            echo view('templates/footer');
        } else
        {
            # if new email is same than before. Sends errormessage
            $newEmail = $this->request->getVar('newemail');
            $user = $this->customermodel->find($customerid);
            if ($newEmail === $user['email']) {
                $data['emailmessage'] = 'Uusi sähköpostiosoite ei voi olla sama kun edellinen';
                echo view('templates/header',$data);
                echo view('customer/customerEdit_view',$data);
                echo view('templates/footer');
            }
            # if email exits in database. Sends error message.
            $customers = $this->customermodel->getCustomer();
            foreach ($customers as $cust):
                if ($cust['email'] === $this->request->getVar('newemail') && $cust['password'] != null) {
                    $data['ordererror'] = 'Sähköpostiosoite on jo rekisteröity.';
                    echo view('templates/header',$data);
                    echo view('customer/customerEdit_view',$data);
                    echo view('templates/footer');
                    exit();
                }
            endforeach;

            $this->customermodel->save([
                'id' => $customerid,
                'email' => $this->request->getVar('newemail')
            ]);

            # Gives to user a message and loads new details.
            $data['infomessage'] = 'on nyt päivitetty.';
            $data['userdata'] = $this->customermodel->find($customerid);
                echo view('templates/header',$data);
                echo view('customer/customerDetail_view',$data);
                echo view('templates/footer');
        }
    }

    # Updates customer password.
    public function customerPasswordUpdate() {
        $validation =  \Config\Services::validation();
        # if logged customer, gets user id from session array.
        if(!isset($_SESSION['customer'])) {
            return redirect()->to('/customer/index');
        }
        else
        {
            $customerid = null;
            foreach ($_SESSION['customer'] as $key => $value):
                 $customerid = $value;
            endforeach;
        }

        $data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();
        $data['userdata'] = $this->customermodel->find($customerid);
        $data['orders'] = $this->ordermodel->getOrders();
        $data['title'] = "Muokkaa tietoja";

        if (!$this->validate($validation->getRuleGroup('customerPasswordValidate'))) {
            echo view('templates/header',$data);
            echo view('customer/customerEdit_view');
            echo view('templates/footer');
        } else
        {
            #finds customer details from database.
            $user = $this->customermodel->find($customerid);
            #returns custmers password from database.
            $oldPassword = $this->customermodel->PasswordCheck(
                $customerid,
                $this->request->getVar('oldpassword')
            );
            # if passwords are same, saves a new password. Else sends errormessage.
            if ($oldPassword === $user['password']) {
              # saves customer new password to database.
                 $this->customermodel->save([
                     'id' => $customerid,
                     'password' => password_hash($this->request->getPost('newpassword'),PASSWORD_DEFAULT)
                 ]);

                $data['passwordmessage'] = 'Salasanasi on nyt vaihdettu.';
                echo view('templates/header',$data);
                echo view('customer/customerDetail_view',$data);
                echo view('templates/footer');
            } else {
                $data['message'] = 'Salasanasi vaihto ei onnistunut. Yritä uudelleen.';
                echo view('templates/header',$data);
                echo view('customer/customerEdit_view',$data);
                echo view('templates/footer');
            }
        }
    }

    # Updates customers details (firstname,lastname, address etc.)
    public function customerDetailUpdate() {
        $validation =  \Config\Services::validation();
        # if logged customer, gets user id from session array.
        if(!isset($_SESSION['customer'])) {
            return redirect()->to('/customer/index');
        } else {
            $customerid = null;
            foreach ($_SESSION['customer'] as $key => $value):
                 $customerid = $value;
            endforeach;
        }
        $data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();
        $data['userdata'] = $this->customermodel->find($customerid);
        $data['orders'] = $this->ordermodel->getOrders();
        $data['title'] = "Muokkaa tietoja";

        if (!$this->validate($validation->getRuleGroup('customerDetailValidate'))) {
            echo view('templates/header',$data);
            echo view('customer/customerEditDetail_view');
            echo view('templates/footer');
        } else
        {
            # saves customer updated details to database.
             $this->customermodel->save([
                'id' => $customerid,
                'firstname' => ucfirst($this->request->getVar('firstname')),
                'lastname' => ucfirst($this->request->getVar('lastname')),
                'address' => ucfirst($this->request->getVar('address')),
                'postcode' => $this->request->getVar('postcode'),
                'town' => strtoupper($this->request->getVar('town')),
                'phone' => $this->request->getVar('phone')

            ]);
              # Gives to user a message and loads new details.
                $data['infomessage'] = 'on nyt päivitetty.';
                $data['userdata'] = $this->customermodel->find($customerid);
                echo view('templates/header',$data);
                echo view('customer/customerDetail_view',$data);
                echo view('templates/footer');
        }
    }
    # validates and saves customer details to database.
    public function customerRegistration()
    {
        $validation =  \Config\Services::validation();
        $data['title'] = "Rekisteröidy";
        $data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();

        if (!$this->validate($validation->getRuleGroup('customerRegisterValidate'))) {
            echo view('templates/header', $data);
            echo view('customer/customerRegister_view');
            echo view('templates/footer');

        } else {

            $customers = $this->customermodel->getCustomer();
            foreach ($customers as $cust):
                if ($cust['email'] === $this->request->getVar('email') && $cust['password'] != null) {
                    $data['ordererror'] = 'Sähköpostiosoite on jo rekisteröity. <a href="/Customer/customerAccount">Kirjaudu sisään.</a>';
                    echo view('templates/header',$data);
                    echo view('customer/customerRegister_view',$data);
                    echo view('templates/footer');
                    exit();
                }
            endforeach;
            $this->customermodel->save([
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getPost('password'),PASSWORD_DEFAULT),
                'firstname' => ucfirst($this->request->getVar('firstname')),
                'lastname' => ucfirst($this->request->getVar('lastname')),
                'address' => ucfirst($this->request->getVar('address')),
                'postcode' => $this->request->getVar('postcode'),
                'town' => strtoupper($this->request->getVar('town')),
                'phone' => $this->request->getVar('phone')
            ]);
            $data['registermessage'] = 'Voit nyt kirjautua sisään.';

            $data['categories'] = $this->model->getCategories();
            $data['themecategories'] = $this->thememodel->getThemeCategories();
            echo view('templates/header',$data);
            echo view('customer/customer_view',$data);
            echo view('templates/footer');
        }
    }

    # Validates and checks whether the login information is correct.
    public function loginCheck()
    {
        $validation =  \Config\Services::validation();
        $data['title'] = "Kirjaudu sisään";
        $data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();
        $_SESSION['customer'] = array();

        if (!$this->validate($validation->getRuleGroup('customerLoginValidate'))) {
            echo view('templates/header', $data);
            echo view('customer/customer_view');
            echo view('templates/footer');
        } else {
            $loggedCustomer = $this->customermodel->loginCheck(
                $this->request->getVar('email'),
                $this->request->getVar('password')
            );
            # if customer is logged in. Push id to session array.
            if ($loggedCustomer) {
                array_push($_SESSION['customer'], $loggedCustomer->id);
                $data['orders'] = $this->ordermodel->getOrders();
                $data['userdata'] = null;

                foreach ($_SESSION['customer'] as $key => $value):
                    $customerid = $value;
                endforeach;
                # Loads customer details from database and send them to detail page.
                $customers = $this->customermodel->getCustomer();

                foreach ($customers as $customer):
                    if ($customerid === $customer['id']) {
                        $data['userdata'] = $customer;
                    }
                endforeach;

                echo view('templates/header',$data);
                echo view('customer/customerDetail_view',$data);
                echo view('templates/footer');
            }
            else {
                $data['message'] = 'Käyttäjänimi tai salasana on väärin:';
                $data['title'] = "Kirjaudu";
                $data['categories'] = $this->model->getCategories();
                $data['themecategories'] = $this->thememodel->getThemeCategories();
                echo view('templates/header', $data);
                echo view('customer/customer_view', $data);
                echo view('templates/footer');
            }
        }
    }

    public function showOrder($id)
    {
      if (isset($_SESSION['customer'])) {
      $customerOrders = $this->ordermodel->find($id);
      foreach ($_SESSION['customer'] as $key => $value):
          $customerid = $value;
      endforeach;

          if ($customerOrders['customer_id'] === $customerid) {
              $data['title'] = "Tilaus";
              $data['categories'] = $this->model->getCategories();
              $data['themecategories'] = $this->thememodel->getThemeCategories();
              $data['orderdetails'] = $this->ordermodel->getOrderDetails($id);
              echo view('templates/header', $data);
              echo view('customer/customerorder_view', $data);
              echo view('templates/footer');
          } else {
              return redirect()->to('/Customer/customerAccount');
          }
      } else {
        return redirect()->to('/Customer/index');
      }

    }


    public function logout() {
        $_SESSION['customer'] = null;
        return redirect()->to('/shop');
    }

    public function customerAccount()
    {
        $data['title'] = "Omat tiedot";
        $data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();

        if (isset($_SESSION['customer'])) {
            $customerid=null;
            $data['userdata'] = null;
            $data['orders'] = $this->ordermodel->getOrders();
            foreach ($_SESSION['customer'] as $key => $value):
            $customerid = $value;
            endforeach;
            $customers = $this->customermodel->getCustomer();
            //print_r($customers);
            foreach ($customers as $customer):
            if ($customerid === $customer['id']) {
                $data['userdata'] = $customer;
            }
            endforeach;

            echo view('templates/header', $data);
            echo view('customer/customerDetail_view', $data);
            echo view('templates/footer');
        } else {
            return redirect()->to('/customer');
        }
    }
}
