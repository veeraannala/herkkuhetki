<?php namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\ThemeModel;
use App\Models\ProductModel;

class Shop extends BaseController
{
	
	public function __construct()
	{
		$session = \Config\Services::session();
        $session->start();
	}
	public function index()
	{
		$model = new CategoryModel();
		$thememodel = new ThemeModel();
		$prodmodel = new ProductModel();
		$data['categories'] = $model->getCategories();
		$data['themecategories'] = $thememodel->getThemeCategories();
		$data['product'] = $prodmodel->ShowProduct();
		echo view('templates/header',$data);
		echo view('front_page');
		echo view('product');
        echo view('templates/footer');
	}

	public function show_product($id)
	{
		$model = new CategoryModel();
		$thememodel = new ThemeModel();
		$prodmodel = new ProductModel();
		$data['categories'] = $model->getCategories();
		$data['themecategories'] = $thememodel->getThemeCategories();
		$data['product'] = $prodmodel->getProduct($id);
		
		echo view('templates/header',$data);
		echo view('product_info', $data);
        echo view('templates/footer');
	}

	public function show_methods()
	{
		$model = new CategoryModel();
		$thememodel = new ThemeModel();
		$prodmodel = new ProductModel();
		$data['categories'] = $model->getCategories();
		$data['themecategories'] = $thememodel->getThemeCategories();
		$data['product'] = $prodmodel->ShowProduct();
		echo view('templates/header',$data);
		echo view('method_view');
        echo view('templates/footer');
	}


	}