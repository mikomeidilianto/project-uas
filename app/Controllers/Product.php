<?php

namespace App\Controllers;

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
            'page' => 'produk/v_product',
            'menu' => 'product',
            'produk' => $this->ModelProduk->AllData(),
        ];
         return view('v_template', $data);
    }
}
