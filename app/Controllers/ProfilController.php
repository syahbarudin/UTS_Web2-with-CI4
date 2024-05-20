<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\AuthController;

class ProfilController extends BaseController
{
    public function index()
    {
        $auth = new AuthController();
        if (!$auth->verify_session(session()->get('user_id'))) {
            return redirect()->to('/'); // Redirect ke halaman login jika verifikasi gagal
        }

        return view('profil');
    }
}
