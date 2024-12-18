<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelProduk;
use App\Models\ModelKategori;
use App\Models\ModelKeranjang;

class Product extends BaseController
{
    public function __construct()
    {
        // Mengambil data dari model
        $this->ModelProduk = new ModelProduk();
        $this->ModelKategori = new ModelKategori();
        $this->ModelKeranjang = new ModelKeranjang();
    }

    public function index()
    {
        // Menampilkan tenant pada dashboard
        $data = [
            'page' => 'user/Dashboard/v_dashboard',
            'Kategori' => $this->ModelKategori->AllData(),
        ];
         return view('user/Dashboard/v_template', $data);
    }
}