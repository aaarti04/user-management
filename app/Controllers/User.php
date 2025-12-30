<?php

namespace App\Controllers;
use App\Models\Usermodel;
class User extends BaseController
{
    public function __construct()
    {
        $this->usermodel = new Usermodel();
    }

    public function login()
    {
        if($this->request->getMethod() === 'POST'){
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $user = $this->usermodel->getUserByEmail($email);
            
            if($user && password_verify($password, $user['password'])){
                if($user['status'] == '1'){
       
                    $session = session();
                    $session->set('isLoggedIn', true);
                    $session->set('userId', $user['id']);

                    return redirect()->to('/dashboard');
                } else {
                    return view('login', ['error' => 'Account is inactive']);
                }
                // Successful login
            } else {
                // Failed login
                helper['form'];
                return view('login', ['error' => 'Invalid email or password']);
            }
         
        
        }
        $session = session();
        $session->destroy();
        return view('login');
    }
    public function dashboard()
    {
        return  view('dashboard');
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
    
   public function adduser()
{
    if ($this->request->getMethod() === 'POST') {

        // Validation rules (use field names)
        $rules = [
            'name' => 'required|min_length[2]|max_length[30]',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]',
            'status' => 'required|in_list[0,1]',
        ];

        // Validate
        if (!$this->validate($rules)) {
            return view('adduser', [
                'errors' => $this->validator->getErrors()
            ]);
        }

        // Get validated data
        $name     = $this->request->getPost('name');
        $email    = $this->request->getPost('email');
        $password = password_hash(
            $this->request->getPost('password'),
            PASSWORD_DEFAULT
        );
        $status   = $this->request->getPost('status');
         $this->usermodel->save([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'status' => $status
        ]);
        return redirect()->to('/dashboard')->with('success', 'User added successfully');
    }

    return view('adduser');
}
    public function list(){
         $result =  $this->usermodel->findAll();
         return view('list' , ["list" =>$result]);         
    }
    public function edit($id){
        $result = $this->usermodel->find($id);
        return view('edit' , ['user'=>$result]);
    }

    public function updateuser($id){
        $rules = [
            'name' => 'required|min_length[2]|max_length[30]',
            'email' => 'required|valid_email',
            'status' => 'required|in_list[0,1]',
        ];

        // Validate
        if (!$this->validate($rules)) {
            return view('edit', [
                'errors' => $this->validator->getErrors()
            ]);
        }

        // Get validated data
        $data=[
        'id' =>$this->request->getPost('id'),
        "name"     => $this->request->getPost('name'),
        "email"    => $this->request->getPost('email'),
        "password" => password_hash(
            $this->request->getPost('password'),
            PASSWORD_DEFAULT
        ),
        "status"   => $this->request->getPost('status')
    ];
         $this->usermodel->updatedata($data);
    
        return redirect()->to('/list');
    }
    public function deleteuser($id){
         $this->usermodel->deleteuser($id);
    
        return redirect()->to('/list')->with('success', 'User deleted successfully');;
    }

}
