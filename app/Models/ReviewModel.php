<?php namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

    class ReviewModel extends Model {        
        protected $table     = 'review';
        protected $primaryKey = 'id';

        protected $allowedFields = ['product_id', 'review', 'stars'];


        public function ShowReviews($id)
        {
            $this->table('review');
            $this->select('id, product_id, reviewDate, review, stars');
            $this->where('product_id', $id);
            $this->orderby('id', 'DESC');
            $query = $this->get();

            return $query->getResultArray();
        }

        public function allReviews()
        {
            $this->table('review');
            $this->select('id, product_id, reviewDate, review, stars');
            $this->orderby('id', 'DESC');
            $query = $this->get();

            return $query->getResultArray();
        }
    }