<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelProduk;

class Product extends BaseController
{
    public function __construct()
    {
        $this->ModelProduk = new ModelProduk();
    }

    public function index()
    {
        $data = [
            'judul' => 'Product',
            'page' => 'admin/v_product',
            'menu' => 'product',
            'produk' => $this->ModelProduk->AllData(),
        ];
         return view('admin/v_template', $data);
    }
}
