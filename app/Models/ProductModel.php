<?php namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

    class ProductModel extends Model
    {
        protected $table     = 'product';
        protected $primaryKey = 'id';
        /*protected $returnType = 'array';*/

        protected $allowedFields = ['id','name','price','description','image','stock','type','category_id','theme_id'];
        
    

        public function getProduct($id)
        {
            $this->table('product');
            $this->select('id, name, price, description, image, stock, type, category_id, theme_id');
            $this->where('id',$id);
            $query = $this->get();

            return $query->getResultArray();
        }
        public function ShowProduct()
        {
            $this->table('product');
            $this->select('id, name, price, image, type, category_id, theme_id');
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
       

    }