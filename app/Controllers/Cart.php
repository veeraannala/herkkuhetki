<?php namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\ThemeModel;
use App\Models\ProductModel;
class Cart extends BaseController
{
    public function __construct() {
        $session = \Config\Services::session();
        $session->start();
        $this->model = new CategoryModel();
		$this->thememodel = new ThemeModel();
        $this->prodmodel = new ProductModel();
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
        $product = $this->request->getPost('product');

        array_push($_SESSION['basket'],$product);
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
}