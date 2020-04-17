<?php namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\ThemeModel;
use App\Models\ProductModel;
use App\Models\CustomerModel;
use App\Models\OrderModel;
use App\Models\OrderdetailModel;
class Cart extends BaseController
{
    public function __construct()
    {
        $session = \Config\Services::session();
        $session->start();
        $this->db = db_connect();
        $this->model = new CategoryModel();
        $this->thememodel = new ThemeModel();
        $this->prodmodel = new ProductModel();
        $this->customermodel = new CustomerModel();
        $this->ordermodel = new OrderModel();
        $this->orderdetailmodel = new OrderdetailModel();
    }

    public function index()
    {
        if (!isset($_SESSION['basket'])) {
            $_SESSION['basket'] = array();
        }
        $data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();
        $data['product'] = $this->prodmodel->ShowProduct();
        if (!empty($_SESSION['basket'])) {
            $data['basketproducts'] = $this->prodmodel->getBasketproducts($_SESSION['basket']);
        } else {
            $data['basketproducts'] = null;
        }

        echo view('templates/header', $data);
        echo view('cart/cart_view', $data);
        echo view('templates/footer');
    }

    public function insert()
    {
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

    public function clear()
    {
        $_SESSION['basket'] = null;
        return redirect()->to('/Shop');
    }
    public function delete($id)
    {
        foreach ($_SESSION['basket'] as $item) {
            if ($item === $id) {
                $basketid=array_search($item, $_SESSION['basket']);
                array_splice($_SESSION['basket'], $basketid, 1);
                if (count($_SESSION['basket'])===0) {
                    $this->clear();
                }
            }
        }
        return redirect()->to('/cart');
    }

    public function updateAmount($id)
    {
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
                array_push($_SESSION['basket'], $id);
            }
        }
        return redirect()->to('/cart');
    }

    //shows all products, and gives user choice to log in or order without logging in. If user is already logged in, skips this stage
    public function checkout()
    {            
        $data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();
        $data['product'] = $this->prodmodel->ShowProduct();
        
        $data['basketproducts'] = $this->prodmodel->getBasketproducts($_SESSION['basket']);
        if(!isset($_SESSION['customer'])){

            
            echo view('templates/header', $data);
            echo view('cart/cartOrder_view');
            echo view('templates/footer');
        } else {
            $data['customers'] = $this->customermodel->getCustomer();
            echo view('templates/header', $data);
            echo view('cart/cartContact_view',$data);
            echo view('templates/footer');
        }
    }

    //shows all products, total sum and a form for user to give delivery information
    public function custContact()
    {
        $data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();
        $data['product'] = $this->prodmodel->ShowProduct();
        
        $data['basketproducts'] = $this->prodmodel->getBasketproducts($_SESSION['basket']);
        

        echo view('templates/header', $data);
        echo view('cart/cartContact_view');
        echo view('templates/footer');
    }

    //Collect users contact information and save order, order detail and customer to the database.
    public function saveOrder()
    {
        $data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();
        $data['product'] = $this->prodmodel->ShowProduct();
        $data['basketproducts'] = $this->prodmodel->getBasketproducts($_SESSION['basket']);

        $sum = 0;
        foreach ($data['basketproducts'] as $product):
            foreach ($_SESSION['basket'] as $key => $value):
                if ($value == $product['id']) {
                    $sum += $product['price'];
                }
        endforeach;
        endforeach;
        $data['sum'] = $sum;

        $validation =  \Config\Services::validation();
        $customer = array();
        if (!isset($_POST['register'])) {
            if (!$this->validate($validation->getRuleGroup('customerValidate'))) {
                echo view('templates/header', $data);
                echo view('cart/cartContact_view');
                echo view('templates/footer');
            } else {
                $this->db->transStart();
                $this->customermodel->save([
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                    'address' => $this->request->getVar('address'),
                    'postcode' => $this->request->getVar('postcode'),
                    'town' => $this->request->getVar('town'),
                    'email' => $this->request->getVar('email'),
                    'phone' => $this->request->getVar('phone'),
                ]);

                $customerid = $this->customermodel->getCustId();
                $customerid = $customerid[0];
                $customerid = $customerid['max(id)'];

                $this->ordermodel->save([
                    'status' => 'ordered',
                    'customer_id' => $customerid,
                    'delivery' => $this->request->getVar('delivery'),
                ]);

                $orderid = $this->ordermodel->getOrderId();
                $orderid = $orderid[0];
                $orderid = $orderid['max(id)'];

                foreach ($_SESSION['order'] as $item => $value) {
                    $this->orderdetailmodel->save([
                        'product_id' => $item,
                        'order_id' => $orderid,
                        'amount' => $value
                    ]);
                    $stock = $this->prodmodel->getStock($item);
                    $stock =$stock[0];
                    $stock = $stock['stock'] - $value;
                    $this->prodmodel->save([
                        'id' => $item,
                        'stock' => $stock
                    ]);
                    //print_r($item['amount']);
                }
                $this->clear();

                $this->db->transComplete();
            

                $data['register'] = "Rekisteröinti onnistui";
                $data['payment'] = $this->request->getVar('payment');
                $data['delivery'] = $this->request->getVar('delivery');
                echo view('templates/header', $data);
                echo view('cart/payOrder_view', $data);
                echo view('templates/footer');
            }
        } else {
            if (!$this->validate($validation->getRuleGroup('customerValidate')) || !$this->validate($validation->getRuleGroup('customerRegisterValidate'))) {
                echo view('templates/header', $data);
                echo view('cart/cartContact_view');
                echo view('templates/footer');
            } else {
                $this->db->transStart();
                $this->customermodel->save([
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                    'address' => $this->request->getVar('address'),
                    'postcode' => $this->request->getVar('postcode'),
                    'town' => $this->request->getVar('town'),
                    'email' => $this->request->getVar('email'),
                    'phone' => $this->request->getVar('phone'),
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                ]);
            

                $customerid = $this->customermodel->getCustId();
                $customerid = $customerid[0];
                $customerid = $customerid['max(id)'];

                $this->ordermodel->save([
                    'status' => 'ordered',
                    'customer_id' => $customerid,
                    'delivery' => $this->request->getVar('delivery'),
                ]);

                $orderid = $this->ordermodel->getOrderId();
                $orderid = $orderid[0];
                $orderid = $orderid['max(id)'];

                foreach ($_SESSION['order'] as $item => $value) {
                    $this->orderdetailmodel->save([
                        'product_id' => $item,
                        'order_id' => $orderid,
                        'amount' => $value
                    ]);
                    $stock = $this->prodmodel->getStock($item);
                    $stock =$stock[0];
                    $stock = $stock['stock'] - $value;
                    $this->prodmodel->save([
                        'id' => $item,
                        'stock' => $stock
                    ]);
                    //print_r($item['amount']);
                }
                $this->clear();
                $this->db->transComplete();
        

                $data['register'] = "Rekisteröinti onnistui";
                $data['payment'] = $this->request->getVar('payment');
                $data['delivery'] = $this->request->getVar('delivery');
                echo view('templates/header', $data);
                echo view('cart/payOrder_view', $data);
                echo view('templates/footer');
            }
        }
    }

    public function payconfirm()
    {
        $data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();
        $data['product'] = $this->prodmodel->ShowProduct();
        echo view('templates/header', $data);
        echo view('cart/payconfirm', $data);
        echo view('templates/footer');
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

}