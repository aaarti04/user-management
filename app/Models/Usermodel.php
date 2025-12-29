<?php
namespace App\Models;
use CodeIgniter\Model;

class Usermodel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'password', 'status'];

    public function getUserByEmail($email)
    {
       $result = $this->db->table('user')
            ->where('email', $email)
            ->get()
            ->getRowArray();
        return $result;
    }
    public function updatedata($data){
         $input=[
        "name"     => $data['name'],
        "email"    => $data['email'],
        "password" => password_hash(
            $data['password'],
            PASSWORD_DEFAULT
        ),
        "status"   => $data['status']
    ];
     $builder = $this->db->table($this->table);
     $builder->where('id', $data['id']);
    $builder->update($input);


    }
    public function deleteuser($id){
        $builder = $this->db->table($this->table);
        $builder->where('id' , $id)->delete();
    }
}
?>