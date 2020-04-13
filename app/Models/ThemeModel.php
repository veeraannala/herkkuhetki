<?php namespace App\Models;

use CodeIgniter\Model;

    class ThemeModel extends Model
    {
        protected $table     = 'themeCategory';
        protected $primaryKey = 'id';
        protected $returnType = 'array';

        protected $allowedFields = ['id', 'name'];
        
    

        public function getThemeCategories()
        {
            $this->table('productCategory');
            $this->select('id, name');
            $query = $this->get();

            return $query->getResultArray();
        }
        
    }