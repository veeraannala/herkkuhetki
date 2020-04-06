<?php namespace App\Controllers;

class Admin extends BaseController
{

    public function index() {
        echo view('admin/adminHeader');
		echo view('admin/admin_view');
        echo view('admin/adminFooter');
    }
}