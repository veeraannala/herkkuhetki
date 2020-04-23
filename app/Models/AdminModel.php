<?php namespace App\Models;

use CodeIgniter\Model;

    class AdminModel extends Model{

        protected $table = 'adminuser';
        protected $allowedFields = ['username', 'password'];
        
    public function admincheck($username,$password) {
        $this->where('username', $username);
        $query = $this->get();
        $row = $query->getRow();
            if($row) {
                if(password_verify($password,$row->password)) {
                    return $row->username;
                }
            }
            return null;
        }


        

}
?>