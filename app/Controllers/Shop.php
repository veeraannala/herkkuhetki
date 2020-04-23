<?php namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\ThemeModel;
use App\Models\ProductModel;
use App\Models\NewsletterModel;
use App\Models\ReviewModel;
use App\Models\CustomerModel;
use App\Models\OrderModel;

class Shop extends BaseController
{
	private $model = null;
	private $thememodel = null;
	private $prodmodel = null;
	private $reviewmodel = null;
	private $customermodel = null;
	private $ordermodel = null;

	public function __construct()
	{
		$session = \Config\Services::session();
		$session->start();
		$this->model = new CategoryModel();
		$this->thememodel = new ThemeModel();
		$this->prodmodel = new ProductModel();
		$this->newsmodel = new NewsletterModel();
		$this->reviewmodel = new ReviewModel();
		$this->customermodel = new CustomerModel();
		$this->ordermodel = new OrderModel();
	}

	public function index()
	{
		if (!isset($_SESSION['basket'])) {
            $_SESSION['basket'] = array();
		}

		$data['title'] = "Herkkuhetki";
		$data['categories'] = $this->model->getCategories();
		$data['themecategories'] = $this->thememodel->getThemeCategories();
		$data['product'] = $this->prodmodel->ShowProduct();

		echo view('templates/header',$data);
		echo view('shop/frontpage_view');
		echo view('shop/frontpageproduct_view', $data);
        echo view('templates/footer');
	}

	//Shows gdpr information
	public function gdprregister(){

		$data['title'] = "Herkkuhetki";
		$data['categories'] = $this->model->getCategories();
		$data['themecategories'] = $this->thememodel->getThemeCategories();
		echo view('templates/header',$data);
		echo view('shop/gdprregister');
        echo view('templates/footer');
	}



	public function show_product($id)
	{
		//Shows detailed information of one product.

		$data['title'] = "Herkkuhetki";
        $data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();
		$data['product'] = $this->prodmodel->getProduct($id);
		$data['review'] = $this->reviewmodel->ShowReviews($id);
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
                echo view('product/product_outstock', $data);
                echo view('templates/footer');
            } else {
                echo view('templates/header', $data);
            	echo view('product/product_instock', $data);
            	echo view('templates/footer');
            }
        } else if ($stock < 1) {
            echo view('templates/header', $data);
            echo view('product/product_outstock', $data);
            echo view('templates/footer');
        } else {
            echo view('templates/header', $data);
            echo view('product/product_instock', $data);
            echo view('templates/footer');
        }
    }

	public function show_methods()
	{

		$data['title'] = "Herkkuhetki";
		$data['categories'] = $this->model->getCategories();
		$data['themecategories'] = $this->thememodel->getThemeCategories();
		echo view('templates/header',$data);
		echo view('shop/method_view');
        echo view('templates/footer');
	}

	/*

	the purpose of this function is:
	-find products with given keywords. The keywords given are compared with the name of the product, description or tag.

	-Example keywords:
	- "suklaa"
	- "suklaa*" not allowed
	- "suklaa karkki"

	Specs
	-All special characters in the search query are rejected / not processed
	-if there is more than one word in the search term: all individual keywords must be found
	product name, description, or tag.
	*/
	public function search_product(){

		$data['title'] = "Herkkuhetki - haku";
		$data['categories'] = $this->model->getCategories();
		$data['themecategories'] = $this->thememodel->getThemeCategories();
		$data['product'] = $this->prodmodel->ShowProduct();

		$searchQuery = $this->request->getVar('search',FILTER_SANITIZE_STRING);

		if(!empty($searchQuery)) {
			# Change the given search to lowercase.
			$searchQuery = mb_convert_case($searchQuery, MB_CASE_LOWER, "UTF-8");
			# Remove special characters.
			$searchQuery = preg_replace('/[^A-Öa-ö0-9]+/', ',', $searchQuery);
			# Create array of keywords.
			$keywords = explode(',', $searchQuery);

			# Send array to searchLike method.
			$data['searchresult'] = $this->prodmodel->searchLike($keywords);


			if (!empty($data)) {
			echo view('templates/header',$data);
			echo view('shop/search_view',$data);
			echo view('templates/footer');

			} else {
				echo view('templates/header',$data);
				echo view('shop/searchfail_view');
				echo view('templates/footer');
			}
		} else {
			return redirect()->to('/shop');
		}
	}

	//adds email to newsletter database
	public function addToNewsletter(){

		$data['title'] = "Uutiskirje";
		$data['categories'] = $this->model->getCategories();
		$data['themecategories'] = $this->thememodel->getThemeCategories();
		//$data['product'] = $this->prodmodel->ShowProduct();

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
		echo view('shop/newsletter_view', $data);
		echo view('templates/footer');

	}

	//saves new review to database
	public function review($id) {

		$data['title'] = "Herkkuhetki";
		$data['product'] = $this->prodmodel->getProduct($id);
		$id = $this->prodmodel->showProduct($id);

		$this->reviewmodel->save([
			'product_id' => $this->request->getVar('id'),
			'review' => $this->request->getVar('review'),
			'stars' => $this->request->getVar('stars')
		]);
		return redirect()->to(previous_url());
		}

	// gets information of all reviews
	public function showReview($product_id) {

		$data['title'] = "Herkkuhetki";
		$data['categories'] = $this->model->getCategories();
        $data['themecategories'] = $this->thememodel->getThemeCategories();
		$data['review'] = $this->reviewmodel->ShowReviews($product_id);

		echo view('templates/header', $data);
		echo view('product/AllReviews_view', $data);
		echo view('templates/footer');
	}
	public function sortBy() {
        $model = new CategoryModel();
        $thememodel = new ThemeModel();
        $prodmodel = new ProductModel();
        $method = $this->request->getVar('parameter');
        $data['title'] = "Herkkuhetki";
		$data['categories'] = $model->getCategories();
		$data['themecategories'] = $thememodel->getThemeCategories();
        $data['product'] = $prodmodel->sortProductsby($method);
        echo view('templates/header', $data);
        echo view('shop/frontpageproduct_view.php', $data);
        echo view('templates/footer');
	}

	public function aboutUs() {
		$data['title'] = "Tietoa meistä";
		$data['categories'] = $this->model->getCategories();
		$data['themecategories'] = $this->thememodel->getThemeCategories();

		echo view('templates/header', $data);
        echo view('shop/aboutUs_view');
        echo view('templates/footer');
	}

	public function contactInfo() {
		$data['title'] = "Yhteystiedot";
		$data['categories'] = $this->model->getCategories();
		$data['themecategories'] = $this->thememodel->getThemeCategories();

		echo view('templates/header', $data);
        echo view('shop/contact_view');
        echo view('templates/footer');
	}
}
