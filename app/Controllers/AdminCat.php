<?php namespace App\Controllers;
use App\Models\AdminModel;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\ThemeModel;
use App\Models\OrderModel;

class AdminCat extends BaseController
{
    private $categorymodel = null;
    private $thememodel = null;
    private $prodmodel = null;
    private $adminmodel = null;
    private $ordermodel = null;


    public function __construct()
    {
        $session = \Config\Services::session();
        $session->start();
        $this->categorymodel = new CategoryModel();
        $this->thememodel = new ThemeModel();
        $this->prodmodel = new ProductModel();
        $this->adminmodel = new AdminModel();
        $this->ordermodel = new OrderModel();
    }
    
    //For category update. Shows all categories and gives a change to update, delete or add new categories.
    //If cannot delete, gives an error message.
    public function updateCategory()
    {
        if(!isset($_SESSION['username'])) {
        return redirect()->to('/admin/adminlogin');
        }
        $data['title'] = "Ylläpito - muokkaa kategoriaa";
        

        $data['categories'] = $this->categorymodel->getCategories();

        echo view('admin/adminHeader', $data);
        echo view('admin/updateCategory_view', $data);
        echo view('admin/adminFooter');
    }

    //Shows one category to update name and parent category
    public function updateCat($id)
    {
        
        if(!isset($_SESSION['username'])) {
        return redirect()->to('/admin/adminlogin');
        }
        $data['title'] = "Ylläpito - muokkaa kategoriaa";
        $data['categories'] = $this->categorymodel->getCategories();
        $data['id'] = $id;

        echo view('admin/adminHeader', $data);
        echo view('admin/updateCat_view', $data);
        echo view('admin/adminFooter');
    }

    //Updates name and parentID for chosen category
    public function update()
    {
        
        if(!isset($_SESSION['username'])) {
        return redirect()->to('/admin/adminlogin');
        }
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('newname'),
            'parentID' => $this->request->getVar('category')
        ];
        $this->categorymodel->update($id, $data);
        return redirect()->to('/admin/updateCategory');
    }

    //Deletes chosen category or gives an error message if cannot delete
    public function deleteCat($categoryID)
    {
        
        if(!isset($_SESSION['username'])) {
        return redirect()->to('/admin/adminlogin');
        }
        $data['title'] = "Ylläpito - poista kategoria";
        $data['categories'] = $this->categorymodel->getCategories();
        try {
            $category_model = new CategoryModel();
            $category_model->delete($categoryID);
            return redirect()->to('/admin/updateCategory');
        } catch (\Exception $e) {
            $data['errormessage'] = ($e->getMessage());
            echo view('admin/adminHeader', $data);
            echo view('admin/updateCategory_view', $data);
            echo view('admin/adminFooter');
        }
    }

    // Shows view where adminuser gives name to new subcategory
    public function insertCat($parentid)
    {
        
        if(!isset($_SESSION['username'])) {
        return redirect()->to('/admin/adminlogin');
        }
        $data['title'] = "Ylläpito - lisää kategoria";
        $data['categories'] = $this->categorymodel->getCategories();
        $data['id'] = $parentid;

        echo view('admin/adminHeader', $data);
        echo view('admin/insertCat_view', $data);
        echo view('admin/adminFooter');
    }

    // Inserts new category with chosen parentID.
    public function addCat()
    {
        
        if(!isset($_SESSION['username'])) {
        return redirect()->to('/admin/adminlogin');
        }
        if ($this->request->getVar('parentid') === 'NULL') {
            $this->categorymodel->save([
                'name' => $this->request->getVar('name'),
            ]);
        } else {
            $this->categorymodel->save([
                'name' => $this->request->getVar('name'),
                'parentID' => $this->request->getVar('parentid')
            ]);
        }
        return redirect()->to('/admin/updateCategory');
    }
}
