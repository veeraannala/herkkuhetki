<?php namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

    class CustomerModel extends Model
    {
        protected $table     = 'customer';
        protected $primaryKey = 'id';
        protected $allowedFields = ['firstname','lastname','address','postcode','town','email','phone','password'];


        public function getCustomer() {
            $builder = $this->table("customer");
            $query = $builder->get();

            return $query->getResultArray();
        }

        # Returns user data when user log in.
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
        # Returns users password.
        public function PasswordCheck($customerid,$password) {
            $this->where('id', $customerid);
            $query = $this->get();
            $row = $query->getRow();
            if($row) {
                if(password_verify($password,$row->password)) {
                    return $row->password;
                }
            }
                    return null;
        }
    }
