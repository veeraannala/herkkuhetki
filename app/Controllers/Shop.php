<?php namespace App\Controllers;

class Shop extends BaseController
{
	public function index()
	{
        echo view('templates/header');
        echo view('templates/footer');
	}
	}