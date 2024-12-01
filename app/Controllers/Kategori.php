<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelKategori;

class Kategori extends BaseController
{
    public function __construct()
    {
        $this->ModelKategori = new ModelKategori();
    }
    
    //CRUD : READ
    public function index()
    {
        $data = [
            'judul' => 'Kategori',
            'page' => 'produk/v_kategori',
            'menu' => 'kategori',
            'kategori' => $this->ModelKategori->AllData(),
        ];
         return view('v_template', $data);
    }

    //CRUD : CREATE
    public function Tambah()
    {
        $data = [
            'judul' => 'Tambah Kategori',
            'page' => 'produk/v_tambahkategori',
            'menu' => 'kategori',
        ];
         return view('v_template', $data);
    }

    public function InsertData()
    {
        if ($this->validate([
            'name' => [
                'label' => 'Nama Kategori',
                'rules' => 'required|is_unique[categories.name]',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                    'is_unique' => '{field} sudah ada !!!',
                ]
                ],
            'description' => [
                'label' => 'Deskripsi Kategori',
                'rules' => 'required|is_unique[categories.description]',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                    'is_unique' => '{field} sudah ada !!!',
                ]
            ]
        ])) {

            $data = [
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
            ];
            $this->ModelKategori->InsertData($data);
            session()->setFlashData('insert');
        } else {
            session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Kategori/Tambah'))->withInput('validation', \config\Services::validation());
        }
    }
}
