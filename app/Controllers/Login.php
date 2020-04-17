<?php namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\ThemeModel;
use App\Models\ProductModel;
use App\Models\CustomerModel;
class Login extends BaseController
{

    private $model = null;
	private $thememodel = null;
	private $prodmodel = null;
    private $customermodel = null;
    

    public function __construct() {
        $session = \Config\Services::session();
        $session->start();
        $this->model = new CategoryModel();
		$this->thememodel = new ThemeModel();
        $this->prodmodel = new ProductModel();
        $this->customermodel = new CustomerModel();

    }

    public function index() {

		$data['categories'] = $this->model->getCategories();
		$data['themecategories'] = $this->thememodel->getThemeCategories();
		

		echo view('templates/header',$data);
		echo view('customer_view');
        echo view('templates/footer');

    }
    public function register() {
        $data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();
        
        echo view('templates/header',$data);
		echo view('customerRegister_view');
        echo view('templates/footer');
    }

    public function customerRegistration() {
        $validation =  \Config\Services::validation();
        $data['categories'] = $this->model->getCategories();
		$data['themecategories'] = $this->thememodel->getThemeCategories();

        if (!$this->validate($validation->getRuleGroup('customerRegisterValidate')))
        {
            echo view('templates/header,',$data);
            echo view('customerRegister_view');
            echo view('templates/footer');;
        }
        else
        {
            $this->customermodel->save([
                'firstname' => $this->request->getVar('firstname'),
                'lastname' => $this->request->getVar('lastname'),
                'address' => $this->request->getVar('address'),
                'postcode' => $this->request->getVar('postcode'),
                'town' => $this->request->getVar('town'),
                'email' => $this->request->getVar('email'),
                'phone' => $this->request->getVar('phone'),
                'password' => password_hash($this->request->getVar('password'),PASSWORD_DEFAULT),
            ]);
            return redirect()->to('/login/index');
        }
    }

    public function loginCheck() {
        $validation =  \Config\Services::validation();
        $data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();
        
        if (!$this->validate($validation->getRuleGroup('customerLoginValidate')))
        {
            

            echo view('templates/header',$data);
		    echo view('customer_view');
            echo view('templates/footer');
        }
        else
        {
            $loggedCustomer = $this->customermodel->loginCheck(
                $this->request->getVar('email'),
                $this->request->getVar('password')  
            );
            
            if ($loggedCustomer) {
                $_SESSION['customer'] = $loggedCustomer;
                $userdata = [];
                foreach ($_SESSION['customer'] as $values) {
                    array_push($userdata, $values);
                }
                $data['userdata'] = $userdata;
               
                echo view('templates/header',$data);
		        echo view('customerDetail_view',$data);
                echo view('templates/footer'); 
            
            }
            else {  
                $data = [
                'message' => 'sähköposti tai salasana on väärin'
                ];
               
                echo view('templates/header',$data);
		        echo view('customer_view',$data);
                echo view('templates/footer');
            }
        }
    }

    public function logout() {
        session_destroy();
        return redirect()->to('/shop');
    }


}