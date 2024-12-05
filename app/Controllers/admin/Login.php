<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelKategori;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Login',
            'page' => 'admin/login',
            'menu' => 'konfirmasi',
        ];
         return view('admin/v_login', $data);
    }
}
