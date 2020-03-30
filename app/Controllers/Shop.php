<?php namespace App\Controllers;

class Shop extends BaseController
{
	public function index()
	{
		echo view('templates/header');
		echo view('front_page');
        echo view('templates/footer');
	}
	}