<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelProduk;
use App\Models\ModelKategori;

class Product extends BaseController
{
    public function __construct()
    {
        $this->ModelKategori = new ModelKategori();
    }

    public function index()
    {
        $data = [
            'page' => 'user/Dashboard/v_dashboard',
            'Kategori' => $this->ModelKategori->AllData(),
        ];
         return view('user/Dashboard/v_template', $data);
    }
}