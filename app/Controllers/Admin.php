<?php namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\ProductModel;

class Admin extends BaseController
{

    public function index() {
        echo view('admin/adminHeader');
		echo view('admin/admin_view');
        echo view('admin/adminFooter');
    }

    public function updateCategory() {
        $model = new CategoryModel();
        $data['categories'] = $model->getCategories();

        echo view('admin/adminHeader');
		echo view('admin/updateCategory_view', $data);
        echo view('admin/adminFooter');
    }

    public function updateProduct() {

        $model = new ProductModel();

        echo view('admin/adminHeader');
        echo view('admin/updateProduct_view');
        echo view('admin/adminFooter');
        
    }
    
}