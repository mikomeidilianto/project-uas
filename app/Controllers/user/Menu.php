<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelProduk;
use App\Models\ModelKategori;
use App\Models\ModelKeranjang;

class Menu extends BaseController
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
        // Menampilkan produk pada halaman menu
        $data = [
            'page' => 'user/Menu/v_menu',
            'kategorimenu' => $this->ModelKategori->AllData(),
            'produkmenu' => $this->ModelProduk->AllData(),
            'keranjang' => $this->ModelKeranjang->AllData(),
        ];

        
        return view('user/Menu/v_template_menu', $data);
    }
    
}
