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

    public function index()
    {
        $data['title'] = "Kirjaudu";
        $data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();
        

        echo view('templates/header', $data);
        echo view('customer/customer_view');
        echo view('templates/footer');
    }
    public function register()
    {
        $data['title'] = "Rekisteröidy";
        $data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();
        
        echo view('templates/header', $data);
        echo view('customer/customerRegister_view');
        echo view('templates/footer');
    }
    public function customerDetail()
    {
        if (!isset($_SESSION['customer'])) {
            return redirect()->to('/customer/index');
        }
        $data['title'] = "Tiedot";
        $data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();
        
        echo view('templates/header', $data);
        echo view('customer/customerDetail_view');
        echo view('templates/footer');
    }

    public function customerEdit()
    {
        if (!isset($_SESSION['customer'])) {
            return redirect()->to('/customer/index');
        } else {
            $customerid = null;
            foreach ($_SESSION['customer'] as $key => $value):
                $customerid = $value;
            endforeach;
        }
        $data['title'] = "Muokkaa tietoja";
        $data['userdata'] = $this->customermodel->find($customerid);
        $data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();
            
        echo view('templates/header', $data);
        echo view('customer/customerEdit_view');
        echo view('templates/footer');
    }

    public function customerEditDetail()
    {
        if (!isset($_SESSION['customer'])) {
            return redirect()->to('/customer/index');
        } else {
            $customerid = null;
            foreach ($_SESSION['customer'] as $key => $value):
                 $customerid = $value;
            endforeach;
        }
        $data['title'] = "Muokkaa tietoja";
        $data['userdata'] = $this->customermodel->find($customerid);
        $data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();
     
        echo view('templates/header', $data);
        echo view('customer/customerEditDetail_view');
        echo view('templates/footer');
    }

    public function customerUpdate()
    {
        $validation =  \Config\Services::validation();
        if (!isset($_SESSION['customer'])) {
            return redirect()->to('/customer/index');
        } else {
            $customerid = null;
            foreach ($_SESSION['customer'] as $key => $value):
                 $customerid = $value;
            endforeach;
        }
        if (!$this->validate($validation->getRuleGroup('customerRegisterValidate'))) {
        }
        $data = [

        ];
    }

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
            ;
        } else {
            $this->customermodel->save([
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'firstname' => $this->request->getVar('firstname'),
                'lastname' => $this->request->getVar('lastname'),
                'address' => $this->request->getVar('address'),
                'postcode' => $this->request->getVar('postcode'),
                'town' => $this->request->getVar('town'),
                'phone' => $this->request->getVar('phone')
            ]);
            $data['registermessage'] = 'Voit nyt kirjautua sisään';

            echo view('templates/header', $data);
            echo view('customer/customer_view', $data);
            echo view('templates/footer');
        }
    }

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
            
            if ($loggedCustomer) {
                array_push($_SESSION['customer'], $loggedCustomer->id);

                $data['orders'] = $this->ordermodel->getOrders();
                //print_r($data1);
                $data['userdata'] = null;
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
                $data = [
                    'message' => 'Käyttäjänimi tai salasana on väärin'
                ];
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
        $data['title'] = "Tilaus";
        $data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();
        $data['orderdetails'] = $this->ordermodel->getOrderDetails($id);
        echo view('templates/header', $data);
        echo view('customer/customerorder_view', $data);
        echo view('templates/footer');
    }

    public function logout()
    {
        session_destroy();
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