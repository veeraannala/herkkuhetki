<?php namespace App\Controllers;
use App\Models\AdminModel;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\ThemeModel;

class Admin extends BaseController
{
    public function __construct() {
        $session = \Config\Services::session();
        $session->start();
    }
    
    public function index() {
        echo view('admin/adminHeader');
		echo view('admin/admin_view');
        echo view('admin/adminFooter');
    }

    public function adminRegister() {
        $validation =  \Config\Services::validation();
        $model = new AdminModel();

        if (! $this->validate($validation->getRuleGroup('adminvalidate')
            
        ))
        {
                    echo view('admin/adminHeader');
                    echo view('admin/register_view');
                    echo view('admin/adminFooter');        
        }
        else
        {
                    $model->save([
                        'username' => $this->request->getVar('username'),
                        'password' => password_hash($this->request->getPost('password'),PASSWORD_DEFAULT)
                    ]);
                    echo view('admin/adminHeader');
                    echo view('admin/success_view');
                    echo view('admin/adminFooter'); 
        }
        
    }

    public function adminCheck() {
        $validation =  \Config\Services::validation();
        $model = new AdminModel();
        if (! $this->validate($validation->getRuleGroup('adminvalidate')
            
        ))
        {
            echo view('admin/adminHeader');
            echo view('admin/adminlogin_view');
            echo view('admin/adminFooter');

        }
        else {
            $adminuser =$model->admincheck(
                $this->request->getVar('username'),
                $this->request->getVar('password')  
            );
            if ($adminuser) {
                $_SESSION['username'] = $adminuser;
                return redirect('index');
            }
            else {
                return redirect('admin/adminlogin_view');
            }
        }
        
        
    }
    public function updateCategory() {
        $model = new CategoryModel();
        $data['categories'] = $model->getCategories();

        echo view('admin/adminHeader');
		echo view('admin/updateCategory_view', $data);
        echo view('admin/adminFooter');
    }

    public function updateProduct() {

        $category_model = new CategoryModel();
        $product_model = new ProductModel();
        $theme_model = new ThemeModel();
        $data['categories'] = $category_model->getCategories();
        $data['themecategories'] = $theme_model->getThemeCategories();

        echo view('admin/adminHeader');
        echo view('admin/updateProduct_view', $data);
        echo view('admin/adminFooter');
        
    }
    
}