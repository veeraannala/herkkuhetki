<?php namespace App\Models;

use CodeIgniter\Model;

    class OrderdetailModel extends Model
    {
        protected $table     = 'orderdetail';
        protected $returnType = 'array';

        protected $allowedFields = ['order_id', 'product_id', 'amount'];




        
    }