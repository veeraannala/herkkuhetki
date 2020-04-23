<?php namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

    class ProductModel extends Model
    {
        protected $table     = 'product';
        protected $primaryKey = 'id';
        /*protected $returnType = 'array';*/

        protected $allowedFields = ['id','name','price','description','image','stock','type', 'keywords', 'category_id','theme_id'];


        // gets only one certain product
        public function getProduct($id)
        {
            $this->table('product');
            $this->select('id, name, price, description, image, stock, type, keywords, category_id, theme_id');
            $this->where('id',$id);
            $query = $this->get();

            return $query->getResultArray();
        }
        // gets all the products and their information
        public function ShowProduct()
        {
            $this->table('product');
            $this->select('id, name, price, image, stock, type, keywords, category_id, theme_id');
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
        # Gets keywords as parameter. Returns products that have keyword in name, description or tag.
        public function searchLike( array $keywords) {
            $db = db_connect();
            $builder = $this->table("product");
            foreach ($keywords as $values) {
            $builder->orLike('name', $values,'both')
                    ->orLike('description',$values,'both')
                    ->orlike('keywords',$values);
            }
            $query = $builder->get();
            return $query->getResultArray();
        }

        public function getProductsCat() {
            // gets products and their categories and themecategories joined
            $builder = $this->table("product");
            $builder->select("product.id as id, product.name AS productName, price, image, type, keywords, category_id, theme_id, productCategory.parentID as parentID,  productCategory.name AS category, themeCategory.name as theme");
            $builder->join("productCategory", "product.category_ID = productCategory.categoryID", "inner");
            $builder->join("themeCategory", "product.theme_ID = themeCategory.id", "left");
            $builder->orderby("category");
            $query = $builder->get();

            return $query->getResultArray();
        }
        public function sortProductsby($method)
        {
            $builder = $this->table("product");
            $builder->select("id, name, image, stock, type, price, keywords, category_id, theme_id" );
            if ($method == 1){
            $builder->orderBy('price', 'ASC');
            }
            if ($method == 2){
            $builder->orderBy('price', 'DESC');
            }
            if ($method == 3){
                $builder->orderBy('name', 'ASC');
                }
            $query = $this->get();
            return $query->getResultArray();
        }
        // get products with specific main category
        public function getParentid($id) {
            $builder = $this->table("product");
            $builder->select("id , product.name , price , image , stock, type, category_id as category, parentID");
            $builder->join("productCategory", "product.category_ID = productCategory.categoryID");
            $builder->where("parentID", $id);
            $query = $builder->get();

            return $query->getResultArray();
        }
        // get products that have theme category
        public function getThemeProducts() {
            $builder = $this->table("product");
            $builder->select("id , product.name , price , image , stock, type, category_id as category, theme_id");
            $builder->where("theme_id !=", NULL);
            $query = $builder->get();

            return $query->getResultArray();
        }

    }
