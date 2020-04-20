<?php namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\ThemeModel;
use App\Models\ProductModel;

class Category extends BaseController
{
    public function __construct()
    {
        $session = \Config\Services::session();
        $session->start();
    }

    public function index($id)
    {
        $model = new CategoryModel();
        $thememodel = new ThemeModel();
        $prodmodel = new ProductModel();
        
        $data['title'] = "Herkkuhetki";
        $data['categories'] = $model->getCategories();
        $data['themecategories'] = $thememodel->getThemeCategories();
        $data['product'] = $prodmodel->ShowProduct();
        $data['id'] = $id;
        echo view('templates/header', $data);
        echo view('shop/category_view', $data);
        echo view('templates/footer');
    }
    public function sortBy($id) {
        $model = new CategoryModel();
        $thememodel = new ThemeModel();
        $prodmodel = new ProductModel();
        $method = $this->request->getVar('parameter');
        $data['title'] = "Herkkuhetki";
		$data['categories'] = $model->getCategories();
		$data['themecategories'] = $thememodel->getThemeCategories();
        $data['product'] = $prodmodel->sortProductsby($method);
        $data['id'] = $id;
        echo view('templates/header', $data);
        echo view('shop/category_view', $data);
        echo view('templates/footer');
	}
}