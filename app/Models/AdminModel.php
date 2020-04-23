<?php namespace App\Models;

use CodeIgniter\Model;

    class AdminModel extends Model{

        protected $table = 'adminuser';
        protected $allowedFields = ['username', 'password'];

     /**
     * Checks, is adminuser password right
     * @param $username admins username.
     * @param $password admins password
     *
     * @return $row->username from database.
     */
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
