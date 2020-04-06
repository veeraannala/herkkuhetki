<?php namespace App\Controllers;
use App\Models\AdminModel;
class Admin extends BaseController
{
    
    public function index() {
        echo view('admin/adminHeader');
		echo view('admin/admin_view');
        echo view('admin/adminFooter');
    }

    public function adminregister() {
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
}