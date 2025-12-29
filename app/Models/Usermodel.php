<?php
namespace App\Models;
use CodeIgniter\Model;

class Usermodel extends Model
{
    // protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'password', 'status'];

    public function getUserByEmail($email)
    {
       $result = $this->db->table('user')
            ->where('email', $email)
            ->get()
            ->getRowArray();
        return $result;
    }
}
?>