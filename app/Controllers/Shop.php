<?php namespace App\Controllers;

class Shop extends BaseController
{
	public function __construct()
	{
		$session = \Config\Services::session();
        $session->start();
	}
	public function index()
	{
		echo view('templates/header');
		echo view('front_page');
        echo view('templates/footer');
	}

	public function show_product()
	{
		echo view('templates/header');
		echo view('product_info');
        echo view('templates/footer');
	}



	}