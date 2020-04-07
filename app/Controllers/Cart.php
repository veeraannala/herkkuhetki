<?php namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\ThemeModel;
use App\Models\ProductModel;
class Cart extends BaseController
{
    public function __construct() {
        $session = \Config\Services::session();
        $session->start();
    }

	public function index()
	{
        $data['purchases'] = $_SESSION['basket'];
		$model = new CategoryModel();
        $thememodel = new ThemeModel();
        $Product_Model = new ProductModel();
		$data['categories'] = $model->getCategories();
        $data['themecategories'] = $thememodel->getThemeCategories();
        $data['products'] = $Product_Model->getBasketproducts($_SESSION['basket']);
		echo view('templates/header',$data);
		echo view('cart_view',$data);
        echo view('templates/footer');
	}

    public function insert() {
        $product = $this->request->getPost('product');

        if (!isset($_SESSION['basket'])) {
            $_SESSION['basket'] = array();
        }

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