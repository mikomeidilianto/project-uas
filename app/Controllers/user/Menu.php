<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelProduk;
use App\Models\ModelKategori;

class Menu extends BaseController
{
    public function __construct()
    {
        $this->ModelProduk = new ModelProduk();
        $this->ModelKategori = new ModelKategori();
    }

    public function index()
    {
        $data = [
            'page' => 'user/Menu/v_menu',
            'kategorimenu' => $this->ModelKategori->AllData(),
            'produkmenu' => $this->ModelProduk->AllData(),
        ];

        
        return view('user/Menu/v_template_menu', $data);
    }
}
