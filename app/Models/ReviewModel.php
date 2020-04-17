<?php namespace App\Models;

use CodeIgniter\Model;

    class ReviewModel extends Model {        
        protected $table     = 'review';
        protected $primaryKey = 'id';

        protected $allowedFields = ['id', 'product_id', 'review', 'stars'];

        // finds all revies with same product_id
        public function ShowReviews($id)
        {
            $this->table('review');
            $this->select('id, product_id, reviewDate, review, stars');
            $this->where('product_id', $id);
            $this->orderby('id', 'DESC');
            $query = $this->get();

            return $query->getResultArray();
        }
        
        //all reviews for admin user
        public function allReviews()
        {
            $this->table('review');
            $this->select('id, product_id, reviewDate, review, stars');
            $this->orderby('id', 'DESC');
            $query = $this->get();

            return $query->getResultArray();
        }

        //finds that one review by id
        public function getReview($id)
        {
            $this->table('review');
            $this->select('id, product_id, reviewDate, review, stars');
            $this->where('id',$id);
            $query = $this->get();

            return $query->getResultArray();
        }
    }