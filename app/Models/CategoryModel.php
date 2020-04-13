<?php namespace App\Models;

use CodeIgniter\Model;

    class CategoryModel extends Model
    {
        protected $table     = 'productCategory';
        protected $primaryKey = 'categoryID';
        protected $returnType = 'array';

        protected $allowedFields = ['categoryID', 'parentID', 'name', 'category_id'];
        
    

        public function getCategories()
        {
            $this->table('productCategory');
            $this->select('categoryID, parentID, name');
            $query = $this->get();

            return $query->getResultArray();
        }

        
        public function getCategoryID($value) {
            $db = db_connect();
            $builder = $this->table("productCategory");
            $builder->Like('name', $value);
            $query = $builder->get();
            foreach ($query->getResultArray() as  $row)
            {       
            return $row['categoryID'];
            }
                    
                    
                    
                        
                      
                    
        }
                
                   
                
                

            
            
             

        


    }



    