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

		$data['categories'] = $this->model->getCategories();
		$data['themecategories'] = $this->thememodel->getThemeCategories();
		$data['product'] = $this->prodmodel->getProduct($id);
		
		echo view('templates/header',$data);
		echo view('product_info', $data);
        echo view('templates/footer');
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
		$searchdata = $this->request->getVar('search');
		 $cutsearchdata = substr($searchdata, 0, -1);
		$data1['CategoryIDs'] = $this->model->searchCat($cutsearchdata);

		$catIDs = [];

		foreach($data1['CategoryIDs'] as $catID):
		$categoryID = $catID->categoryID;
		array_push($catIDs,$categoryID);
		endforeach;
		
		$data2['searchresult'] = $this->prodmodel->searchLike($catIDs);
		print_r($data2);
		
		
		
		
		
		 
	}

}