<?php namespace App\Controllers;

class Cart extends BaseController
{
    public function __construct() {
        $session = \Config\Services::session();
        $session->start();
    }

	public function index()
	{
        
		echo view('templates/header');
		echo view('cart_view');
        echo view('templates/footer');
	}

    public function insert() {
        $product = "tikkukaramellit";

        echo $product;

    }



}