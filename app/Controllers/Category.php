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
    
    public function showcategories() {

        $catmodel = new CategoryModel;

        $data = ['cat' => $catmodel->where('parentId', null)
		    	->findAll()
		
        ];
        print_r($data);

        echo view('templates/header',$data);
		

    }



}