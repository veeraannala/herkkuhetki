<?php namespace App\Controllers;
use App\Models\AdminModel;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\ThemeModel;
use App\Models\OrderModel;

class Admin extends BaseController
{

	private $categorymodel = null;
	private $thememodel = null;
    private $prodmodel = null;
    private $adminmodel = null;
    private $ordermodel = null;


    public function __construct() {
        $session = \Config\Services::session();
        $session->start();
        $this->categorymodel = new CategoryModel();
		$this->thememodel = new ThemeModel();
        $this->prodmodel = new ProductModel();
        $this->adminmodel = new AdminModel();
        $this->ordermodel = new OrderModel();
    }
    
    public function index() {
        // if(!isset($_SESSION['username'])) {
        //  return redirect()->to('/admin/adminlogin');
        // }
        echo view('admin/adminHeader');
        echo view('admin/admin_view');
        echo view('admin/adminFooter');
    }

    public function adminlogin() {
        echo view('admin/adminHeader');
        echo view('admin/adminlogin_view');
        echo view('admin/adminFooter');
    }
    public function adminregister(){
            echo view('admin/adminHeader');
            echo view('admin/register_view');
            echo view('admin/adminFooter');
    }

    public function adminRegistration() {
        $validation =  \Config\Services::validation();
        //$adminmodel = new AdminModel();

        if (!$this->validate($validation->getRuleGroup('adminregistervalidate')))
        {
            echo view('admin/adminHeader');
            echo view('admin/register_view');
            echo view('admin/adminFooter');
        }
        else
        {
            $this->adminmodel->save([
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getPost('password'),PASSWORD_DEFAULT)
            ]);
            echo view('admin/adminHeader');
            echo view('admin/success_view');
            echo view('admin/adminFooter');
        }
    }

    public function adminCheck() {
        $validation =  \Config\Services::validation();
        //$adminmodel = new AdminModel();
        
        if (!$this->validate($validation->getRuleGroup('adminloginvalidate')))
        {
            

            echo view('admin/adminHeader');
            echo view('admin/adminlogin_view');
            echo view('admin/adminFooter');
        }
        else
        {
            $adminuser = $this->adminmodel->admincheck(
                $this->request->getVar('username'),
                $this->request->getVar('password')  
            );
            
            if ($adminuser) {
                $_SESSION['username'] = $adminuser;
                return redirect()->to('/admin'); 
            
            }
            else {
                $data = [
                'message' => 'Käyttäjänimi tai salasana on väärin'
                ];
               
                echo view('admin/adminHeader');
                echo view('admin/adminlogin_view',$data);
                echo view('admin/adminFooter');
            }
        }
    }

    public function logout() {
        session_destroy();
        return redirect()->to('/admin/adminlogin');
    }

   

    public function updateProduct() {
        //  if(!isset($_SESSION['username'])) {
        //      return redirect()->to('/admin/adminlogin');
        //  }

        $data['categories'] = $this->categorymodel->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();

        echo view('admin/adminHeader');
        echo view('admin/updateProduct_view', $data);
        echo view('admin/adminFooter');
        
    }
    
    public function editProduct() {

        //shows all products in one view
        $data['products'] = $this->prodmodel->getProductsCat();
        $data['categories'] = $this->categorymodel->getParentCategories();

        echo view('admin/adminHeader');
        echo view('admin/editProduct_view', $data);
        echo view('admin/adminFooter');
    }

    public function editAmount() {
        $category_model = new CategoryModel();
        $product_model = new ProductModel();
        $theme_model = new ThemeModel();
        // gets product and its information form product models function
        $data['products'] = $product_model->showProduct();

        //prints views for page + takes the data to the page
        echo view('admin/adminHeader');
        echo view('admin/editAmount_view', $data);
        echo view('admin/adminFooter');
    }

    public function updateAmo($id) {
        // gets product and its information form product models function
        $data['products'] = $this->prodmodel->showProduct();
        $data['id'] = $id;

        //prints views for page + takes the data to the page
        echo view('admin/adminHeader');
		echo view('admin/updateAmount_view', $data);
        echo view('admin/adminFooter');

    }

    public function update2() {
        // gets only one certain products id
        $id = $this->request->getVar('id');
        // changes amount of products in stock
        $data = [
            'stock' => $this->request->getVar('newAmount')
        ];
        // checks which products amount its gonna change
        $this->prodmodel->update($id, $data);
        // redirects admin to page where all the products are printed
        return redirect()->to('/admin/editAmount');

    }

    
    public function addProduct() {
    //saves new product to the database. replaces empty image with imagenotfound-file
        $newproduct = [
            'name' => $this->request->getVar('name'),
            'price' => $this->request->getVar('price'),
            'type' => $this->request->getVar('type'),
            'description' => $this->request->getVar('description'),
            'image' => $this->request->getVar('image'),
            'stock' => $this->request->getVar('stock'),
            'category_id' => $this->request->getVar('category'),
        ];
        if ($this->request->getVar('themecategory') !== "NULL") {
            $newproduct += ['theme_id' => $this->request->getVar('themecategory')];
        }
        if ($this->request->getVar('image') === "") {
            $newproduct['image'] = 'images/imagenotfound';
        }

        $this->prodmodel->save($newproduct);

        return redirect()->to('/admin/updateProduct');
    }

    public function deleteProduct($id) {

        $product_model = new ProductModel();
        $product_model->delete($id);
        


		return redirect()->to('/admin/editProduct');

    }

    
    public function alterProduct($id) {
        //gets chosen product's information from the database so it can be changed
        $product = $this->prodmodel->getProduct($id);
        $data['product'] = $product[0];
        $data['categories'] = $this->categorymodel->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();
        $data['id'] = $id;

        echo view('admin/adminHeader');
		echo view('admin/alterProduct_view', $data);
        echo view('admin/adminFooter');
    }

    
    public function changeProduct() {
    //changes product information in the database
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('newname'),
            'price' => $this->request->getVar('newprice'),
            'description' => $this->request->getVar('newdescription'),
            'image' => $this->request->getVar('newimage'),
            'type' => $this->request->getVar('newtype'),
            'category_id' => $this->request->getVar('newcategory'),
            'theme_id' => $this->request->getVar('newthemecategory')
        ];

        if ($data["theme_id"] === "NULL") {
            $data['theme_id'] = NULL;
        }
        if ($this->request->getVar('newimage') === "") {
            $data['image'] = 'images/imagenotfound';
        }

        $this->prodmodel->update($id, $data);
        return redirect()->to('/admin/editProduct');


    }
    public function showOrders() {
        $data['orders'] = $this->ordermodel->getOrders();

        echo view('admin/adminHeader');
		echo view('admin/Orders_view', $data);
        echo view('admin/adminFooter');
    }
    public function showOrder($id) {
        $data['orderdetails'] = $this->ordermodel->getOrderDetails($id);
        echo view('admin/adminHeader');
		echo view('admin/Order_view', $data);
        echo view('admin/adminFooter');
    }
    public function updateStatus($id) {
        $data['orderstatus'] = $this->ordermodel->getOrderStatus($id);
        $data['testit'] = $this->ordermodel->getstatus();
        $data['id'] = $id;
        echo view('admin/adminHeader');
		echo view('admin/changestatus_view.php', $data);
        echo view('admin/adminFooter');
    }
    public function updatestat() {
        $id = $this->request->getVar('id');
        $data = [
            'status' => $this->request->getVar('newstatus'),
        ];
        $this->ordermodel->update($id, $data);
        return redirect()->to('/admin/showOrders');
    }
    public function sortbystatus () {
        $data = [
            'status' => $this->request->getVar('status'),
        ];
        $data['sortedorders'] = $this->ordermodel->SortOrders($data);
        echo view('admin/adminHeader');
		echo view('admin/sortedorders',$data);
        echo view('admin/adminFooter');
    }
}