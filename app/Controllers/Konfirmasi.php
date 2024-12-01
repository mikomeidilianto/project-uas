<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Konfirmasi extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Konfirmasi Pembayaran',
            'page' => 'v_konfirmasi',
            'menu' => 'konfirmasi',
        ];
         return view('v_template', $data);
    }
}
