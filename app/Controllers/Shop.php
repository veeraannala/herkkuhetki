<?php namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\ThemeModel;
use App\Models\ProductModel;

class Shop extends BaseController
{
	private $model = null;
	private $thememodel = null;
	private $prodmodel = null;

	public function __construct()
	{
		$session = \Config\Services::session();
		$session->start();
		$this->model = new CategoryModel();
		$this->thememodel = new ThemeModel();
		$this->prodmodel = new ProductModel();
	}

	public function index()
	{

		$data['categories'] = $this->model->getCategories();
		$data['themecategories'] = $this->thememodel->getThemeCategories();
		$data['product'] = $this->prodmodel->ShowProduct();

		echo view('templates/header',$data);
		echo view('front_page');
		echo view('product', $data);
        echo view('templates/footer');
	}

	public function show_product($id)
	{

		$data['categories'] = $this->model->getCategories();
		$data['themecategories'] = $this->thememodel->getThemeCategories();
		$data['product'] = $this->prodmodel->getProduct($id);
		
		echo view('templates/header',$data);
		echo view('product_info', $data);
        echo view('templates/footer');
	}

	public function show_methods()
	{

		$data['categories'] = $this->model->getCategories();
		$data['themecategories'] = $this->thememodel->getThemeCategories();
		echo view('templates/header',$data);
		echo view('method_view');
        echo view('templates/footer');
	}
	/*
	tämän function tarkoitus on:
	-etsiä tuotteita annetuilla hakusanoilla. Annettuja hakusanoja verrataan tuotteiden nimikenttiin
	ja kuvauksiin ja tuotteen kategorioihin

	-esimerkkihakuja:
	- "suklaa"
	- "suklaa*" ei tuettu
	- "suklaa karkki"
	
	specsi
	-kaikki hakulausekkeessa esiintyvät erikoismerkit hylätään/ei käsitellä
	-mikäli hakulausekkeessa on useampi kuin yksi sana: tulee kaikkien yksittäisten hakusanojen löytyä
	tuotteen nimestä tai kuvauksesta.
	*/
	public function search_product(){
		$data['categories'] = $this->model->getCategories();
		$data['themecategories'] = $this->thememodel->getThemeCategories();
		$data['product'] = $this->prodmodel->ShowProduct();
		# 1.parsitaan ylimääräiset merkit
		# $keywords =
		# 2.looppaa jokainen keyword(esim ["suklaa", "karkki"])
		# tarkista onko keyword kategoria
		# jos keyword on kategoria niin etsi CategoryID.
		# 3. Muodosta tietokantahaku

		$searchQuery = $this->request->getVar('search',FILTER_SANITIZE_STRING);
			if(isset($searchQuery)) {
				$string = str_replace(' ', ' ',$searchQuery);
				$string = preg_replace('/[^A-Za-z0-9\-]/', ' ', $string);
				//echo $string; 
				$keywords = explode(" ", $string);
				//print_r($keywords);
				$data['searchresult'] = $this->prodmodel->searchLike($keywords);
				//print_r($data1);
				$CategoryIDarray = [];
				foreach($keywords as $key => $value){
				
				$CategoryID = $this->model->getCategoryID($value);
					array_push($CategoryIDarray,$CategoryID);
				}
				$data['searchproduct'] = $this->prodmodel->searchProduct($CategoryIDarray);
				

					if (!empty($data)) {

					echo view('templates/header',$data);
					echo view('search_view',$data);
					echo view('templates/footer');

					} else {
						echo view('templates/header',$data);
						echo view('searchfail_view');
						echo view('templates/footer');
					}

			} else {
				return redirect()->to('/Shop');
			}
			
			
		
		
		
		
			
		
		 
	}

}