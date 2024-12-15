<?php
namespace App\Controllers\admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelProduk;
use App\Models\ModelKategori;

class Home extends BaseController
{
    public function __construct()
    {
        $this->ModelProduk = new ModelProduk();
        $this->ModelKategori = new ModelKategori();
    }
    public function index()
    {
        $data = [
            'judul' => 'Dashboard',
            'page' => 'admin/v_home',
            'menu' => 'dashboard',
            'produk' => $this->ModelProduk->GetData(),
            'kategori' => $this->ModelKategori->GetData(),
        ];
        return view('admin/v_template', $data);
    }
}