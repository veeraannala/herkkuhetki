<?php namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

    class ProductModel extends Model
    {
        protected $table     = 'product';
        protected $primaryKey = 'id';
        /*protected $returnType = 'array';*/

        protected $allowedFields = ['id','name','price','description','image','stock','type','category_id','theme_id'];
        
    
        // gets only one certain product
        public function getProduct($id)
        {
            $this->table('product');
            $this->select('id, name, price, description, image, stock, type, category_id, theme_id');
            $this->where('id',$id);
            $query = $this->get();

            return $query->getResultArray();
        }
        // gets all the products and their information
        public function ShowProduct()
        {
            $this->table('product');
            $this->select('id, name, price, image, stock, type, category_id, theme_id');
            $query = $this->get();

            return $query->getResultArray();
        }

        public function getStock($id){
            $this->table('product');
            $this->select('stock');
            $this->where('id',$id);
            $query = $this->get();

            return $query->getResultArray();
        }

        public function getBasketproducts($basket) {
            $db = db_connect();
            $builder = $this->table("product");
            $builder->whereIn("id", $basket);
            $query = $builder->get();
            return $query->getResultArray();
        }
        public function searchLike($catIDs) {
            $db = db_connect();
            $builder = $this->table("product");
            $builder->WhereIn('category_id', $catIDs);
            $query = $builder->get();
            return $query->getResultArray();
        }
       
        public function getProductsCat() {
            // $this->db->query('SELECT product.name AS "tuotenimi", productcategory.name AS "kategorianimi" FROM product, productcategory
            // WHERE product.category_ID = productcategory.categoryID');

            $builder = $this->table("product");
            $builder->select("product.id as id, product.name AS productName, price, image, type, category_id, theme_id, productCategory.parentID as parentID,  productCategory.name AS category, themeCategory.name as theme");
            $builder->join("productCategory", "product.category_ID = productCategory.categoryID", "inner");
            $builder->join("themeCategory", "product.theme_ID = themeCategory.id", "left");
            $builder->orderby("category");
            $query = $builder->get();

            return $query->getResultArray();
        }

    }