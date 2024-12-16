<?php
namespace App\Controllers\admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelProduk;
use App\Models\ModelKategori;

// Kontroler Home
class Home extends BaseController
{
    public function __construct()
    {
        // Mengambil data dari kedua model ini
        $this->ModelProduk = new ModelProduk();
        $this->ModelKategori = new ModelKategori();
    }
    public function index()
    {
        if (session()->get('nama') == false)
        {
            return redirect()->to(base_url('admin/Auth/login'));
        }
        // Menampilkan halaman utama
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