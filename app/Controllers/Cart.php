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
        return redirect()->to('/Shop');
    }

    public function clear() {
        $_SESSION['basket'] = null;
        return redirect()->to('/Shop');
    }
    public function delete ($id) {
        print_r($_SESSION['basket']);
        print_r($id);
        while (array_search($id,$_SESSION['basket'])) {
            $basketid=array_search($id,$_SESSION['basket']);
            array_splice($_SESSION['basket'],$basketid,1);
            print_r('onnistui');
        }
        print_r($_SESSION['basket']);

       //$Product_Model = new ProductModel();
        //$Product_Model->delete($id);
        //return redirect()->to('/cart');
    }
}