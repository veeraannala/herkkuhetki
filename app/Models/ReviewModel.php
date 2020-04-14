<?php namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

    class ReviewModel extends Model {        
        protected $table     = 'review';
        protected $primaryKey = 'id';

        protected $allowedFields = ['product_id', 'review', 'stars'];

    }