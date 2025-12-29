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
        return view('adduser');
    }
}
