<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Konfirmasi extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Konfirmasi Pembayaran',
            'page' => 'admin/v_konfirmasi',
            'menu' => 'konfirmasi',
        ];
         return view('admin/v_template', $data);
    }
}
