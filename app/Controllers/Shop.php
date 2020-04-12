<?php namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\ThemeModel;
use App\Models\ProductModel;

class Shop extends BaseController
{
	private $model = null;
	private $thememodel = null;
	private $prodmodel = null;

	public function __construct()
	{
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

		echo view('templates/header',$data);
		echo view('front_page');
		echo view('product', $data);
        echo view('templates/footer');
	}

	public function show_product($id)
	{
		//Shows detailed information of one product. 
		 
        $data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();
        $data['product'] = $this->prodmodel->getProduct($id);
		
		foreach ($data['product'] as $prod):
            if ($prod['id'] == $id) {
				$stock = $prod['stock'];
				
            }
            endforeach;
        if (is_array($_SESSION['basket'])) {
            $amount = 0;
            foreach ($_SESSION['basket'] as $key => $value):
            if ($value == $id) {
				$amount++;
            }
            endforeach;
            if (($stock[0]-$amount) < 1) {
                echo view('templates/header', $data);
                echo view('product_outstock', $data);
                echo view('templates/footer');
            } else {
                echo view('templates/header', $data);
            	echo view('product_instock', $data);
            	echo view('templates/footer');
            }
        } else if ($stock < 1) {
            echo view('templates/header', $data);
            echo view('product_outstock', $data);
            echo view('templates/footer');
        } else {
            echo view('templates/header', $data);
            echo view('product_instock', $data);
            echo view('templates/footer');
        }
    }

	public function show_methods()
	{

		$data['categories'] = $this->model->getCategories();
		$data['themecategories'] = $this->thememodel->getThemeCategories();
		echo view('templates/header',$data);
		echo view('method_view');
        echo view('templates/footer');
	}

	public function search_product(){

		$data['categories'] = $this->model->getCategories();
		$data['themecategories'] = $this->thememodel->getThemeCategories();
		$data['product'] = $this->prodmodel->ShowProduct();

		$searchdata = $this->request->getVar('search');
		$searchdata = substr($searchdata, 0, -2);
		$data1['CategoryIDs'] = $this->model->searchCat($searchdata);
		print $searchdata;
		 if (!empty($data1['CategoryIDs'])) {

		$catIDs = [];

		foreach($data1['CategoryIDs'] as $catID):
		$categoryID = $catID->categoryID;
		array_push($catIDs,$categoryID);
		endforeach;
		
		$data2['searchresult'] = $this->prodmodel->searchLike($catIDs);
		//print_r($data2);

		echo view('templates/header',$data);
		echo view('search_view',$data2);
		echo view('templates/footer');

		} else {
			echo view('templates/header',$data);
			echo view('searchfail_view');
			echo view('templates/footer');
		}
			
		
		
		
		
		
		
		 
	}

}