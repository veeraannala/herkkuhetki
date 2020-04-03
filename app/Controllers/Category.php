<?php namespace App\Controllers;

 use App\Models\CategoryModel;

class Category extends BaseController
{

    public function __construct() {
        $session = \Config\Services::session();
        $session->start();
    }

	public function index()
	{
		echo view('templates/header');
		echo view('front_page');
        echo view('templates/footer');
	}



}