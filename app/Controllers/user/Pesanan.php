<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class Pesanan extends BaseController
{
    public function index()
    {
        // Data yang dikirim ke view
        $data = [
            'page' => 'user/Pesanan/v_detailpesanan', // Halaman detail pesanan
        ];

        // Menggunakan template untuk menampilkan halaman
        return view('user/Pesanan/v_template_pesanan', $data);
    }
}
