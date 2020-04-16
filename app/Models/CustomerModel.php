<?php namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

    class CustomerModel extends Model
    {
        protected $table     = 'customer';
        protected $primaryKey = 'id';
        protected $allowedFields = ['id','firstname','lastname','address','postcode','town','email','phone','password'];
        
        //Returns last customer's id number
        public function getCustId() {
            $builder = $this->table("customer");
            $builder->select("max(id)");
            $query = $builder->get();

            return $query->getResultArray();
        }

    }
    