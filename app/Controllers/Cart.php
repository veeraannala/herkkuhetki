<?php namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\ThemeModel;
use App\Models\ProductModel;
use App\Models\CustomerModel;
use App\Models\OrderModel;
class Cart extends BaseController
{
    public function __construct() {
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
        if (!isset($_SESSION['basket'])) {
            $_SESSION['basket'] = array();
        }
		$data['categories'] = $this->model->getCategories();
		$data['themecategories'] = $this->thememodel->getThemeCategories();
		$data['product'] = $this->prodmodel->ShowProduct();
        if (!empty($_SESSION['basket'])){
            $data['basketproducts'] = $this->prodmodel->getBasketproducts($_SESSION['basket']);
        } else {
            $data['basketproducts'] = null;
        }

        echo view('templates/header',$data);
		echo view('cart_view',$data);
        echo view('templates/footer');
	}

    public function insert() {
        if (!isset($_SESSION['basket'])) {
            $_SESSION['basket'] = array();
        }
        $product = $this->request->getPost('product');
        $amount = $this->request->getPost('amount');
        for ($i=0; $i < $amount; $i++) {
        array_push($_SESSION['basket'], $product);
                
        }
        return redirect()->to(previous_url());    
    }

    public function clear() {
        $_SESSION['basket'] = null;
        return redirect()->to('/Shop');
    }
    public function delete ($id) {
        
        foreach ($_SESSION['basket'] as $item) {
            if ($item === $id) {
                $basketid=array_search($item, $_SESSION['basket']);
                array_splice($_SESSION['basket'], $basketid, 1);
                if (count($_SESSION['basket'])===0){
                    $this->clear();
                }
            }
        }
        return redirect()->to('/cart');
    }

    public function updateAmount($id) {
        //Updates the amount of chosen product in the cart.
        $amount = $this->request->getVar('updAmount');
        if ($amount < 0) {
            for ($i=0; $i > $amount; $i--) {
                $basketid=array_search($id, $_SESSION['basket']);
                array_splice($_SESSION['basket'], $basketid, 1);
                if (count($_SESSION['basket'])===0) {
                    $this->clear();
                }
            }
        } else {
            for ($i=0; $i < $amount; $i++) {
                array_push($_SESSION['basket'],$id);
            }
        }
        return redirect()->to('/cart');
    }

    public function placeOrder() {
        
		$data['categories'] = $this->model->getCategories();
		$data['themecategories'] = $this->thememodel->getThemeCategories();
		$data['product'] = $this->prodmodel->ShowProduct();
        
        $data['basketproducts'] = $this->prodmodel->getBasketproducts($_SESSION['basket']);
        

        echo view('templates/header',$data);
		echo view('cartOrder_view');
        echo view('templates/footer');
    }

    public function order() {
        $data['categories'] = $this->model->getCategories();
		$data['themecategories'] = $this->thememodel->getThemeCategories();
        $data['product'] = $this->prodmodel->ShowProduct();
        $data['basketproducts'] = $this->prodmodel->getBasketproducts($_SESSION['basket']);

        $validation =  \Config\Services::validation();
        if (!$this->validate($validation->getRuleGroup('customerValidate')))
        {
            echo view('templates/header',$data);
            echo view('cartOrder_view');
            echo view('templates/footer'); 

        } else {

       /* $this->customermodel->save([
            'firstname' => $this->request->getVar('name'),
            'lastname' => $this->request->getVar('last'),
            'address' => $this->request->getVar('address'),
            'postcode' => $this->request->getVar('postcode'),
            'town' => $this->request->getVar('town'),
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('phone'),
        ]);*/

        $customerid = $this->customermodel->getCustId();
        $customerid = $customerid[0];
        $customerid = $customerid['max(id)'];
        //insert into orders (status, orderDate, customer_id,delivery) values ('shipped',CURRENT_TIMESTAMP,(SELECT max(id) FROM customer),'N');
      /*  $this->customermodel->save([
            'status' => 'ordered',
            'orderDate' => 'current_timestamp',
            'customer_id' => $customerid,
            'delivery' => $this->request->getVar('delivery'),
        ]);*/
        $orderid = $this->customermodel->getCustId();
        $orderid = $orderid[0];
        $orderid = $orderid['max(id)'];
        print_r($customer);
        print ("<p></p>");
        print_r($_SESSION['order']);
      }
    }
}