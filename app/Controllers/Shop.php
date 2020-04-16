<?php namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\ThemeModel;
use App\Models\ProductModel;
use App\Models\NewsletterModel;
use App\Models\ReviewModel;

class Shop extends BaseController
{
	private $model = null;
	private $thememodel = null;
	private $prodmodel = null;
	private $reviewmodel = null;

	public function __construct()
	{
		$session = \Config\Services::session();
		$session->start();
		$this->model = new CategoryModel();
		$this->thememodel = new ThemeModel();
		$this->prodmodel = new ProductModel();
		$this->newsmodel = new NewsletterModel();
		$this->reviewmodel = new ReviewModel();
	}

	public function index()
	{
		if (!isset($_SESSION['basket'])) {
            $_SESSION['basket'] = array();
		} 
		
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
		//Shows detailed information of one product. 
		 
        $data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();
        $data['product'] = $this->prodmodel->getProduct($id);
		
		foreach ($data['product'] as $prod):
            if ($prod['id'] == $id) {
				$stock = $prod['stock'];
				
            }
            endforeach;
        if (is_array($_SESSION['basket'])) {
            $amount = 0;
            foreach ($_SESSION['basket'] as $key => $value):
            if ($value == $id) {
				$amount++;
            }
            endforeach;
            if (($stock[0]-$amount) < 1) {
                echo view('templates/header', $data);
                echo view('product_outstock', $data);
                echo view('templates/footer');
            } else {
                echo view('templates/header', $data);
            	echo view('product_instock', $data);
            	echo view('templates/footer');
            }
        } else if ($stock < 1) {
            echo view('templates/header', $data);
            echo view('product_outstock', $data);
            echo view('templates/footer');
        } else {
            echo view('templates/header', $data);
            echo view('product_instock', $data);
            echo view('templates/footer');
        }
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
	ja kuvauksiin ja tuotteen tageihin

	-esimerkkihakuja:
	- "suklaa"
	- "suklaa*" ei tuettu
	- "suklaa karkki"
	
	specsi
	-kaikki hakulausekkeessa esiintyvät erikoismerkit hylätään/ei käsitellä
	ps. ainakaan merkin; ¤ poisto ei toimi toistaiseksi. Selvitellään.
	-mikäli hakulausekkeessa on useampi kuin yksi sana: tulee kaikkien yksittäisten hakusanojen löytyä
	tuotteen nimestä, kuvauksesta tai tagista.
	*/
	public function search_product(){

		$data['categories'] = $this->model->getCategories();
		$data['themecategories'] = $this->thememodel->getThemeCategories();
		$data['product'] = $this->prodmodel->ShowProduct();

		$searchQuery = $this->request->getVar('search',FILTER_SANITIZE_STRING);
		//echo $searchQuery;
		if(!empty($searchQuery)) {
			# muutetaan annettu haku pieniksi kirjaimiksi.
			$searchQuery = mb_convert_case($searchQuery, MB_CASE_LOWER, "UTF-8");
			# parsitaan ylimääräiset merkit.
			$searchQuery = preg_replace('/[^A-Öa-ö0-9]+/', ',', $searchQuery);
			# Luodaan sanoista taulukko.
			$keywords = explode(',', $searchQuery);
			
			# lähetetään taulukko $keywords searchLike metodille.
			$data['searchresult'] = $this->prodmodel->searchLike($keywords);
			$data1['keywords'] = $keywords;
			
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
			return redirect()->to('/shop'); 
		}

	}
		 
	

	public function addToNewsletter(){

		$data['categories'] = $this->model->getCategories();
		$data['themecategories'] = $this->thememodel->getThemeCategories();
		$data['product'] = $this->prodmodel->ShowProduct();

		try {
			$this->newsmodel->save([
			'email' => $this->request->getVar('email')
			]);

			$data["success"] = "Uutiskirjeen tilaus onnistui!";

		}
		catch (\Exception $e) {
			$data['errormessage'] = ($e->getMessage());
		}

		echo view('templates/header', $data);
		echo view('newsletter_view', $data);
		echo view('templates/footer');

	}

	//saves new review to database
	public function review($id) {
		
		$data['product'] = $this->prodmodel->getProduct($id);
		$id = $this->prodmodel->showProduct($id);
		
		$this->reviewmodel->save([		
			'product_id' => $this->request->getVar('id'),
			'review' => $this->request->getVar('review'),
			'stars' => $this->request->getVar('stars')
		]);
			return redirect()->to('/');
		}

}