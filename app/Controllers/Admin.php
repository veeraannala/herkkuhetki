<?php namespace App\Controllers;
use App\Models\CategoryModel;

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

        echo view('admin/adminHeader');
        echo view('admin/updateProduct_view');
        echo view('admin/adminFooter');
        
    }
    
}