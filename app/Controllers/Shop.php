<?php namespace App\Controllers;
use App\Models\CategoryModel;
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
		$data['categories'] = $model->getCategories();
		$data['subcategories'] = $model->getSubCategories();
		echo view('templates/header',$data);
		echo view('front_page');
        echo view('templates/footer');
	}

	public function show_product()
	{
		$model = new CategoryModel();
		$data['categories'] = $model->getCategories();
		$data['subcategories'] = $model->getSubCategories();
		echo view('templates/header',$data);
		echo view('product_info');
        echo view('templates/footer');
	}

	public function show_category()
	{
		$model = new CategoryModel();
        $data['subcategories'] = $model->getSubCategories();

		print_r ($data);

	}



	}