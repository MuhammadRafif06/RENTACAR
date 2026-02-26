<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function processRegister()
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => 'user',
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->userModel->insert($data);

        return redirect()->to('/login')->with('success','Register berhasil');
    }

    public function processLogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->userModel->where('email',$email)->first();

        if ($user && password_verify($password, $user['password'])) {

            session()->set([
                'id' => $user['id'],
                'name' => $user['name'],
                'role' => $user['role'],
                'logged_in' => true
            ]);

            if ($user['role'] == 'admin') {
                return redirect()->to('/admin/dashboard');
            } elseif ($user['role'] == 'employee') {
                return redirect()->to('/employee/dashboard');
            } else {
                return redirect()->to('/user/dashboard');
            }
        }

        return redirect()->back()->with('error','Email atau password salah');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}