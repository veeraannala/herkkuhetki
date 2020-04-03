<?php namespace App\Models;

use CodeIgniter\Model;

    class CategoryModel extends Model{
        protected $table      = 'productcategory';
        protected $primaryKey = 'categoryID';
        protected $returnType = 'object';
        
    }