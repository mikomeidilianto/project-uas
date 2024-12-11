<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelProduk;
use App\Models\ModelKategori;
use App\Models\ModelKeranjang;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->ModelProduk = new ModelProduk();
        $this->ModelKategori = new ModelKategori();
        $this->ModelKeranjang = new ModelKeranjang();
    }
    
    public function index()
    {
        $data = [
            'page' => 'user/Dashboard/v_dashboard',
            'produkhome' => $this->ModelProduk->GetData(),
            'kategori' => $this->ModelKategori->AllData(),
            'keranjang' => $this->ModelKeranjang->AllData(),
        ];
        return view('user/Dashboard/v_template_dashboard', $data);
    }
}
