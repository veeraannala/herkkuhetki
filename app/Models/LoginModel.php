<?php namespace App\Models;

use CodeIgniter\Model;

    class LoginModel extends Model
    {
        protected $table = 'customer';
        protected $allowedFields = ['firstname','lastname','address','postcode','town','email','phone','password'];

        public function loginCheck($email,$password) {
            $this->where('email', $email);
            $query = $this->get();
            $row = $query->getRow();
                if($row) {
                    if(password_verify($password,$row->password)) {
                        return $row;
                    }
                }
                return null;
            }
    }