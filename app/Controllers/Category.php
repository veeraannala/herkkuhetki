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
        // $data = $catmodel->where('parentId')
        $data = ['cat' => $catmodel->where('parentID', null)
                ->findAll(),
                 'subcat'=> $catmodel->where('parentID', 2)
                 ->findAll()
		
        ];

        print_r($data);

        echo view('templates/header',$data);
        echo view('front_page');
        echo view('templates/footer');
		

    }



}