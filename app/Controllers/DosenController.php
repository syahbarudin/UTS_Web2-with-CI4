<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\AbsensiModel;

class DosenController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel(); // Memanggil UserModel

        $user_id = session()->get('user_id');
        $user = $userModel->find($user_id);

        // Verifikasi IP address
        if ($this->request->getIPAddress() !== $user['ip_address']) {
            echo "<script>alert('Akun ini telah login diperangkat lain !'); window.location.href = '/';</script>";
            return false;
        }
        
        //Mengatur zona waktu untuk region indonesia
        date_default_timezone_set('Asia/Jakarta');
        // Ambil data waktu login dan nama pengguna dari session
        $login_time = date('H:i');
        $username = session()->get('username');
    
        // Tentukan ucapan selamat berdasarkan waktu login
        if ($login_time >= '00:00' && $login_time < '10:00') {
            $greeting = 'Selamat pagi';
        } elseif ($login_time >= '10:00' && $login_time < '14:00') {
            $greeting = 'Selamat siang';
        } elseif ($login_time >= '14:00' && $login_time < '18:00') {
            $greeting = 'Selamat sore';
        } elseif ($login_time >= '18:00' && $login_time < '24:00') {
            $greeting = 'Selamat malam';
        } else {
            $greeting = 'Selamat';
        }
    
        // Tampilkan halaman home dengan menyertakan ucapan selamat dan nama pengguna
        return view('dosen', [
            'greeting' => $greeting,
            'username' => $username,
            'title' => 'Dosen',
            'is_auth_page' => false
        ]);
    }

    public function save()
    {
        // Ambil data dari request POST
        $request = $this->request->getJSON();
        $tanggal = $request->tanggal;
        $waktu = $request->waktu;
        $lokasi = $request->lokasi;

        // Simpan data absen ke dalam database (implementasi disesuaikan dengan struktur database Anda)
        $absenModel = new \App\Models\AbsensiModel(); // Sesuaikan dengan model yang Anda gunakan
        $data = [
            'tanggal' => $tanggal,
            'waktu' => $waktu,
            'lokasi' => $lokasi
            // Tambahkan kolom-kolom lain sesuai kebutuhan
        ];
        $absenModel->insert($data);

        // Respon ke client
        return $this->response->setJSON(['status' => 'success']);
    }
}
