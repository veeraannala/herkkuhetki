<?php namespace App\Controllers;
use App\Models\AdminModel;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\ThemeModel;
use App\Models\OrderModel;
use App\Models\ReviewModel;

class Admin extends BaseController
{

	private $categorymodel = null;
	private $thememodel = null;
    private $prodmodel = null;
    private $adminmodel = null;
    private $ordermodel = null;
    private $reviewmodel = null;


    public function __construct() {
        $session = \Config\Services::session();
        $session->start();
        $this->categorymodel = new CategoryModel();
		$this->thememodel = new ThemeModel();
        $this->prodmodel = new ProductModel();
        $this->adminmodel = new AdminModel();
        $this->ordermodel = new OrderModel();
        $this->reviewmodel = new ReviewModel();
    }

    public function index() {
        if(!isset($_SESSION['username'])) {
        return redirect()->to('/admin/adminlogin');
        }
        $data['title'] =  "Ylläpito";
        echo view('admin/adminHeader', $data);
        echo view('admin/admin_view');
        echo view('admin/adminFooter');
    }
		//Shows admin login page.
    public function adminlogin() {

        $data['title'] = "Ylläpito - kirjautuminen";
        echo view('admin/adminHeader', $data);
        echo view('admin/adminlogin_view');
        echo view('admin/adminFooter');
    }
		//Shows admin register page.
    public function adminregister(){
        if(!isset($_SESSION['username'])) {
        return redirect()->to('/admin/adminlogin');
        }
        $data['title'] = "Ylläpito - rekisteröidy";
        echo view('admin/adminHeader', $data);
        echo view('admin/register_view');
        echo view('admin/adminFooter');
    }

    public function adminorders(){
        if(!isset($_SESSION['username'])) {
        return redirect()->to('/admin/adminlogin');
        }
        $data['title'] = "Ylläpito - tilaukset";
        echo view('admin/adminHeader', $data);
        echo view('admin/orders_view');
        echo view('admin/adminFooter');
}
		//validates and saves admin user to database.
    public function adminRegistration() {
        if(!isset($_SESSION['username'])) {
        return redirect()->to('/admin/adminlogin');
        }
        $data['title'] = "Ylläpito - rekisteröidy";
        $validation =  \Config\Services::validation();


        if (!$this->validate($validation->getRuleGroup('adminregistervalidate')))
        {
            echo view('admin/adminHeader', $data);
            echo view('admin/register_view');
            echo view('admin/adminFooter');
        }
        else
        {
            $this->adminmodel->save([
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getPost('password'),PASSWORD_DEFAULT)
            ]);
            echo view('admin/adminHeader', $data);
            echo view('admin/success_view');
            echo view('admin/adminFooter');
        }
    }
		// Validates and checks whether the login information is correct.
    public function adminCheck() {
        $data['title'] = "Ylläpito - kirjautuminen";
        $validation =  \Config\Services::validation();

        if (!$this->validate($validation->getRuleGroup('adminloginvalidate')))
        {
            echo view('admin/adminHeader', $data);
            echo view('admin/adminlogin_view');
            echo view('admin/adminFooter');
        }
        else
        {
            $adminUser = $this->adminmodel->admincheck(
                $this->request->getVar('username'),
                $this->request->getVar('password')
            );

            if ($adminUser) {
                $_SESSION['username'] =  $adminUser;
                return redirect()->to('/admin');
            }
            else {
                $data['message'] = 'Käyttäjänimi tai salasana on väärin.';
                echo view('admin/adminHeader', $data);
                echo view('admin/adminlogin_view',$data);
                echo view('admin/adminFooter');
            }
        }
    }
		//logout adminuser.
    public function logout() {
        session_destroy();
        return redirect()->to('/admin/adminlogin');
    }



    public function updateProduct() {
        if(!isset($_SESSION['username'])) {
        return redirect()->to('/admin/adminlogin');
        }
        $data['title'] = "Ylläpito - lisää tuotteita";
        $data['categories'] = $this->categorymodel->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();

        echo view('admin/adminHeader', $data);
        echo view('admin/updateProduct_view', $data);
        echo view('admin/adminFooter');

    }

    //shows all products in one view
    public function editProduct() {
        
        if(!isset($_SESSION['username'])) {
        return redirect()->to('/admin/adminlogin');
        }
        $data['title'] = "Ylläpito - muokkaa tuotteita";
        $data['products'] = $this->prodmodel->getProductsCat();
        $data['categories'] = $this->categorymodel->getParentCategories();

        echo view('admin/adminHeader', $data);
        echo view('admin/editProduct_view', $data);
        echo view('admin/adminFooter');
    }

    // Shows products and their amount in stock
    public function editAmount() {
        if(!isset($_SESSION['username'])) {
        return redirect()->to('/admin/adminlogin');
        }
        $data['title'] = "Ylläpito - tuotteiden määrä";
        $category_model = new CategoryModel();
        $product_model = new ProductModel();
        $theme_model = new ThemeModel();
        // gets product and its information form product models function
        $data['products'] = $product_model->showProduct();

        //prints views for page + takes the data to the page
        echo view('admin/adminHeader', $data);
        echo view('admin/editAmount_view', $data);
        echo view('admin/adminFooter');
    }

    // shows view where admin can edit amount of product in stock
    public function updateAmo($id) {
        //gets product and its information form product models function
        if(!isset($_SESSION['username'])) {
        return redirect()->to('/admin/adminlogin');
        }
        $data['title'] = "Ylläpito - tuotteiden määrä";
        $data['products'] = $this->prodmodel->showProduct();
        $data['id'] = $id;

        //prints views for page + takes the data to the page
        echo view('admin/adminHeader', $data);
		echo view('admin/updateAmount_view', $data);
        echo view('admin/adminFooter');

    }

    public function update2() {
        // gets only one certain products id
        if(!isset($_SESSION['username'])) {
        return redirect()->to('/admin/adminlogin');
        }
        $id = $this->request->getVar('id');
        // changes amount of products in stock
        $data = [
            'stock' => $this->request->getVar('newAmount') +  $this->request->getVar('oldAmount')
        ];
        // checks which products amount its gonna change
        $this->prodmodel->update($id, $data);
        // redirects admin to page where all the products are printed
        return redirect()->to('/admin/editAmount');

    }

    //saves new product to the database. replaces empty image with imagenotfound-file
    public function addProduct() {
    
        if(!isset($_SESSION['username'])) {
        return redirect()->to('/admin/adminlogin');
        }
        $data['title'] = "Ylläpito - lisää tuote";

        $newproduct = [
            'name' => $this->request->getVar('name'),
            'price' => $this->request->getVar('price'),
            'type' => $this->request->getVar('type'),
            'description' => $this->request->getVar('description'),
            'keywords' => $this->request->getVar('keywords'),
            'stock' => $this->request->getVar('stock'),
            'category_id' => $this->request->getVar('category'),
        ];

        if ($this->request->getVar('themecategory') !== "NULL") {
            $newproduct += ['theme_id' => $this->request->getVar('themecategory')];
        }
        if (!$this->validate([
            // checks if new product name is unique
            'name' => 'is_unique[product.name]'
        ])) {
            //error
            $data['title'] = "Ylläpito - lisää tuote";
            $data['errorname'] = $this->validator->getErrors();
            $data['categories'] = $this->categorymodel->getCategories();
            $data['themecategories'] = $this->thememodel->getThemeCategories();
            echo view('admin/adminHeader', $data);
            echo view('admin/updateProduct_view', $data);
            echo view('admin/adminFooter');
        }
        else if ($_FILES['image']['size'] > 0) {
           if (!$this->validate([
            'image' => [
                'uploaded[image]',
                'mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[image,4096]'
            ]
            ])) {
            // error
            $data['title'] = "Ylläpito - lisää tuote";
            $data['errorimage'] = $this->validator->getErrors();
            $data['categories'] = $this->categorymodel->getCategories();
            $data['themecategories'] = $this->thememodel->getThemeCategories();
            echo view('admin/adminHeader', $data);
            echo view('admin/updateProduct_view', $data);
            echo view('admin/adminFooter');
            } else {
                // works
                $image = $this->request->getFile('image');
                $path = APPPATH;
                $path = str_replace('app','public/images',$path);
                $image->move($path);

                $newproduct['image'] = 'images/' . $image->getName();
                $this->prodmodel->save($newproduct);
                return redirect()->to('/admin/editProduct');
            }
        } else {
            $newproduct['image'] = 'images/imagenotfound.png';
            $this->prodmodel->save($newproduct);
            return redirect()->to('/admin/editProduct');
        }

    }

    public function deleteProduct($id) {
        if(!isset($_SESSION['username'])) {
        return redirect()->to('/admin/adminlogin');
        }
        $product_model = new ProductModel();
        $product_model->delete($id);



		return redirect()->to('/admin/editProduct');

    }

    //gets chosen product's information from the database so it can be changed
    public function alterProduct($id) {
        
        if(!isset($_SESSION['username'])) {
        return redirect()->to('/admin/adminlogin');
        }
        $data['title'] = "Ylläpito - muokkaa tuotetta";
        $product = $this->prodmodel->getProduct($id);
        $data['product'] = $product[0];
        $data['categories'] = $this->categorymodel->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();
        $data['id'] = $id;

        echo view('admin/adminHeader', $data);
		echo view('admin/alterProduct_view', $data);
        echo view('admin/adminFooter');
    }

    //changes product information in the database
    public function changeProduct() {
        if(!isset($_SESSION['username'])) {
        return redirect()->to('/admin/adminlogin');
        }
        $data['title'] = "Ylläpito - muokkaa tuotetta";
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('newname'),
            'price' => $this->request->getVar('newprice'),
            'description' => $this->request->getVar('newdescription'),
            'type' => $this->request->getVar('newtype'),
            'category_id' => $this->request->getVar('newcategory'),
            'theme_id' => $this->request->getVar('newthemecategory')
        ];

        if ($data["theme_id"] === "NULL") {
            $data['theme_id'] = NULL;
        }
        $product = $this->prodmodel->getProduct($id);
        $name = null;
        foreach ($product as $prod) {
            $name = $prod['name'];
        }

       
        if ($this->request->getVar('newname') != $name && !$this->validate([
            
            // checks if new product name is unique

            'newname' => 'is_unique[product.name]'
            ])) {
            //error
            $data['title'] = "Ylläpito - muuta tuotetta";
            $pagedata['errorname'] = $this->validator->getErrors();
            $product = $this->prodmodel->getProduct($id);
            $pagedata['product'] = $product[0];
            $pagedata['categories'] = $this->categorymodel->getCategories();
            $pagedata['themecategories'] = $this->thememodel->getThemeCategories();
            $pagedata['id'] = $id;
            echo view('admin/adminHeader', $data);
		    echo view('admin/alterProduct_view', $pagedata);
            echo view('admin/adminFooter');
        }
        else if ($_FILES['image']['size'] > 0) {
            if (!$this->validate([
             'image' => [
                'uploaded[image]',
                'mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[image,4096]'
                ]
            ])) {
                //error
                $data['title'] = "Ylläpito - muokkaa tuotetta";
                $pagedata['errorimage'] = $this->validator->getErrors();
                $product = $this->prodmodel->getProduct($id);
                $pagedata['product'] = $product[0];
                $pagedata['categories'] = $this->categorymodel->getCategories();
                $pagedata['themecategories'] = $this->thememodel->getThemeCategories();
                $pagedata['id'] = $id;
                echo view('admin/adminHeader', $data);
		        echo view('admin/alterProduct_view', $pagedata);
                echo view('admin/adminFooter');
            } else {
                 // works
                $image = $this->request->getFile('image');
                $path = APPPATH;
                $path = str_replace('app','public/images',$path);
                $image->move($path);

                $data['image'] = 'images/' . $image->getName();

                $this->prodmodel->update($id, $data);
                return redirect()->to('/admin/editProduct');
             }
        } else {
             //updates data without changing image
            $this->prodmodel->update($id, $data);
            return redirect()->to('/admin/editProduct');
        }

    }
    public function showOrders() {
        if(!isset($_SESSION['username'])) {
        return redirect()->to('/admin/adminlogin');
        }
        $data['title'] = "Ylläpito - tilaukset";
        $data['orders'] = $this->ordermodel->getOrders();

        echo view('admin/adminHeader', $data);
		echo view('admin/orders_view', $data);
        echo view('admin/adminFooter');
    }
    public function showOrder($id) {
        if(!isset($_SESSION['username'])) {
        return redirect()->to('/admin/adminlogin');
        }
        $data['title'] = "Ylläpito - tilaus";
        $data['orderdetails'] = $this->ordermodel->getOrderDetails($id);
        echo view('admin/adminHeader', $data);
		echo view('admin/order_view', $data);
        echo view('admin/adminFooter');
    }
    public function updateStatus($id) {
        if(!isset($_SESSION['username'])) {
        return redirect()->to('/admin/adminlogin');
        }
        $data['title'] = "Ylläpito - tilaukset tila";
        $data['orderstatus'] = $this->ordermodel->getOrderStatus($id);
        $data['testit'] = $this->ordermodel->getstatus();
        $data['id'] = $id;
        echo view('admin/adminHeader', $data);
		echo view('admin/changestatus_view.php', $data);
        echo view('admin/adminFooter');
    }
    public function updatestat() {
        if(!isset($_SESSION['username'])) {
        return redirect()->to('/admin/adminlogin');
        }
        $id = $this->request->getVar('id');
        $data = [
            'status' => $this->request->getVar('newstatus')
        ];
        $this->ordermodel->update($id, $data);
        return redirect()->to('/admin/showOrders');
    }
    public function sortbystatus() {
				if(!isset($_SESSION['username'])) {
				return redirect()->to('/admin/adminlogin');
				}
        $data1['title'] = "Ylläpito - tilaukset";
        $data = [
            'status' => $this->request->getVar('status')
        ];
        $data['sortedorders'] = $this->ordermodel->SortOrders($data);
        echo view('admin/adminHeader', $data1);
				echo view('admin/sortedorders',$data);
        echo view('admin/adminFooter');
    }
    public function sortbymonth() {
        if(!isset($_SESSION['username'])) {
        return redirect()->to('/admin/adminlogin');
        }
        $data1['title'] = "Ylläpito - tilaukset";
        $data = [
            'month' => $this->request->getVar('month')
        ];
            $data['sortedorderbymonth'] = $this->ordermodel->SortOrdersbyMonth($data);
            echo view('admin/adminHeader', $data1);
            echo view('admin/sortedordersbymonth',$data);
            echo view('admin/adminFooter');
    }

    //prints all reviews to admin page
    public function editReview() {
        if(!isset($_SESSION['username'])) {
        return redirect()->to('/admin/adminlogin');
        }
        $data['title'] = "Ylläpito - arvostelut";
        $product_model = new ProductModel();
        $data['products'] = $product_model->showProduct();
        $data['reviews'] = $this->reviewmodel->allReviews();

        echo view('admin/adminHeader', $data);
        echo view('admin/editReview_view', $data);
        echo view('admin/adminFooter');
    }

    // when you clik the "poista" button, removes that review
    public function deleteReview($id) {
        if(!isset($_SESSION['username'])) {
        return redirect()->to('/admin/adminlogin');
        }
        $re_model = new ReviewModel();
        $re_model->delete($id);

        return redirect()->to(previous_url());
    }

}
