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
		echo view('front_page');
        echo view('templates/footer');
	}

    public function insert() {
        //$product = $this->request->getPost('product');
        //echo $product;
        // ostoskori esimerkki n.30min tehty
        //echo "lisätty ostoskoriin";
    }



}