<?php namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\ThemeModel;
use App\Models\ProductModel;

class Category extends BaseController
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

    public function index($id)
    {

        $data['title'] = "Herkkuhetki";
        $data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();
        $data['product'] = $this->prodmodel->ShowProduct();
        $data['id'] = $id;
        echo view('templates/header', $data);
        echo view('shop/category_view', $data);
        echo view('templates/footer');
    }
    public function sortBy($id) {

        $method = $this->request->getVar('parameter');
        $data['title'] = "Herkkuhetki";
    		$data['categories'] = $this->model->getCategories();
    		$data['themecategories'] = $this->thememodel->getThemeCategories();
        $data['product'] = $this->prodmodel->sortProductsby($method);
        $data['id'] = $id;
        echo view('templates/header', $data);
        echo view('shop/category_view', $data);
        echo view('templates/footer');
    }
    // get products with specific main category and send it to page
    public function allProducts($id) {

        $data['title'] = "Herkkuhetki";
        $data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();
        $data['product'] = $this->prodmodel->getParentid($id);
        $data['id'] = $id;
        echo view('templates/header', $data);
        echo view('shop/CatProducts_view', $data);
        echo view('templates/footer');
    }
    // get products that have theme category and send it to page
    public function allThemeProducts() {

        $data['title'] = "Herkkuhetki";
        $data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();
        $data['product'] = $this->prodmodel->getThemeProducts();
        echo view('templates/header', $data);
        echo view('shop/ThemeProduct_view', $data);
        echo view('templates/footer');
    }
    public function sortallThemeproducts() {

        $method = $this->request->getVar('parameter');
        $data['title'] = "Herkkuhetki";
        $data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();
        $data['product'] = $this->prodmodel->getThemeProducts();
        $data['product'] = $this->prodmodel->sortProductsby($method);
        echo view('templates/header', $data);
        echo view('shop/ThemeProduct_view', $data);
        echo view('templates/footer');
    }
    public function sortallProducts($id) {

        $method = $this->request->getVar('parameter');
        $data['title'] = "Herkkuhetki";
        $data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();
        $data['product'] = $this->prodmodel->getParentid($id);
        $data['id'] = $id;
        $data['product'] = $this->prodmodel->sortProductsby2($id,$method);
        echo view('templates/header', $data);
        echo view('shop/CatProducts_view', $data);
        echo view('templates/footer');
    }
}
