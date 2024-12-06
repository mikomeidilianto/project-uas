<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelProduk;
use App\Models\ModelKategori;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->ModelProduk = new ModelProduk();
    }
    
    public function index()
    {
        $data = [
            'page' => 'user/Dashboard/v_dashboard',
            'produkhome' => $this->ModelProduk->GetData(),
        ];
        return view('user/Dashboard/v_template_dashboard', $data);
    }
}
