<?php namespace App\Controllers;

class Cart extends BaseController
{
    public function __construct() {
        $session = \Config\Services::session();
        $session->start();
    }

	public function index()
	{
        $data['groceries'] = $_SESSION['basket'];
		echo view('templates/header');
		echo view('cart_view',$data);
        echo view('templates/footer');
	}

    public function insert() {
        $product = $this->request->getPost('product');

        if (!isset($_SESSION['basket'])) {
            $_SESSION['basket'] = array();
        }

        array_push($_SESSION['basket'],$product);
        return redirect('/');
    }



}