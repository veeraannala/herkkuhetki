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

        
        public function getParentCategories() {
            $builder = $this->table('productcategory');
            $builder->select('categoryID, parentID, name');
            $builder->where('parentID', null);

            $query = $builder->get();

            return $query->getResultArray();
        }

        public function searchCategory() {
            $builder = $this->table('productcategory');
            $builder->select('productcategory.categoryID, productcategory.parentID, productcategory.name');
            $builder->join("product", "productcategory.categoryID = product.category_id", "inner");
            
            $query = $builder->get();
            return $query->getResultArray();

        }

    }