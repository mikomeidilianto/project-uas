<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelProduk;
use App\Models\ModelKategori;

class Product extends BaseController
{
    public function __construct()
    {
        $this->ModelProduk = new ModelProduk();
    }

    public function index()
    {
        $data = [
            'page' => 'user/Dashboard/v_dashboard',
            'produk' => $this->ModelProduk->GetData(),
        ];
         return view('user/Dashboard/v_template', $data);
    }
}