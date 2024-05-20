<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends BaseController
{
    public function index()
    {
        $page = $this->request->getGet('page') ?? 'login';
        return view('auth', ['page' => $page]);
    }

    public function register()
    {
        $model = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];

        $model->insert($data);

        return redirect()->to('/')->with('success', 'User registered successfully.');
    }

    public function login()
    {
        $model = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->regenerate();

            $session_id = session_id();
            $device_info = $_SERVER['HTTP_USER_AGENT'];
            $timestamp = date('Y-m-d H:i:s');
            $is_new_device = $device_info !== $user['device_info'];

            $data = [
                'session_id' => $session_id,
                'device_info' => $device_info,
                'last_login' => $timestamp,
                'last_device_info' => $user['device_info']
            ];

            $model->update($user['id'], $data);

            session()->set('user_id', $user['id']);
            session()->set('session_id', $session_id);
            session()->set('is_new_device', $is_new_device);
            session()->set('username', $user['username']);
            session()->set('login_time', date('H:i'));

            return redirect()->to('home');
        } else {
            return redirect()->to('/')->with('error', 'Invalid username or password.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    public function verify_session($user_id)
    {
        $model = new UserModel();
        $user = $model->find($user_id);

        if (!$user) {
            return false;
        }

        if ($user['session_id'] !== session_id()) {
            session()->destroy();
            echo "<script>alert('Your account is logged in on another device.'); window.location.href = '/';</script>";
            exit();
        }

        return true;
    }
}
