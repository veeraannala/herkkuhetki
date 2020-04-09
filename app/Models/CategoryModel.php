<?php namespace App\Models;

use CodeIgniter\Model;

    class CategoryModel extends Model
    {
        protected $table     = 'productcategory';
        protected $primaryKey = 'categoryID';
        protected $returnType = 'array';

        protected $allowedFields = ['categoryID', 'parentID', 'name'];
        
    

        public function getCategories()
        {
            $this->table('productcategory');
            $this->select('categoryID, parentID, name');
            $query = $this->get();

            return $query->getResultArray();
        }

        public function searchCat($searchdata) {
            $db = db_connect();
            $builder = $this->table("productcategory");
            $builder->like('name', $searchdata, 'both');
            $query = $builder->get();
            return $query->getResult();
        }


    }