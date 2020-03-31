<?php namespace App\Controllers;

class Cart extends BaseController
{
	public function index()
	{
		echo view('templates/header');
		echo view('front_page');
        echo view('templates/footer');
	}

    public function insert() {
        echo "lisätty";
    }



	}