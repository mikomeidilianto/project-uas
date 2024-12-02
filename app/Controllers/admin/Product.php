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
    public function Tambah()
    {
        $data = [
            'judul' => 'Tambah Kategori',
            'page' => 'admin/v_tambahkategori',
            'menu' => 'kategori',
        ];
         return view('admin/v_template', $data);
    }

    public function InsertData()
    {
        if ($this->validate([
            'name' => [
                'label' => 'Nama Produk',
                'rules' => 'required|is_unique[product.name]',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                    'is_unique' => '{field} sudah ada !!!',
                ]
                ],
            'description' => [
                'label' => 'Deskripsi Produk',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
                ],
            'price' => [
                'label' => 'Harga',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
                ],
            'stock' => [
                'label' => 'Stok',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
                ],
            'category_id' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
                ],
        ])) {
            // Jika valid
            $data = [
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
            ];
            $this->ModelKategori->InsertData($data);
            session()->setFlashdata('insert','Data berhasil ditambahkan !!');
            return redirect()->to(base_url('admin/Kategori'));
        } else {
            // Jika tidak valid
            session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
            return redirect()->to(base_url('admin/Kategori/Tambah'))->withInput('validation', \config\Services::validation());
        }
    }
}
