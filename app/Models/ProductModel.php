<?php namespace App\Models;

use CodeIgniter\Model;

    class ProductModel extends Model
    {
        protected $table     = 'product';
        protected $primaryKey = 'id';
        /*protected $returnType = 'array';*/

        protected $allowedFields = ['id','name','price','description','image','stock,category_id','theme_id'];
        
    

        public function getProduct()
        {
            $this->table('product');
            $this->select('id, name, price, description, image, stock, category_id, theme_id');
            $this->where('id',14);
            $query = $this->get();

            return $query->getResultArray();
        }
        public function ShowProduct()
        {
            $this->table('product');
            $this->select('id, name, price, image, category_id, theme_id');
            $query = $this->get();

            return $query->getResultArray();
        }


    }