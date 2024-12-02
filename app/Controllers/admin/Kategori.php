<?php

namespace App\Controllers\admin;

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
            'page' => 'admin/v_kategori',
            'menu' => 'kategori',
            'kategori' => $this->ModelKategori->AllData(),
        ];
         return view('admin/v_template', $data);
    }

    //CRUD : CREATE
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
                'label' => 'Nama Kategori',
                'rules' => 'required|is_unique[categories.name]',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                    'is_unique' => '{field} sudah ada !!!',
                ]
                ],
            'description' => [
                'label' => 'Deskripsi Kategori',
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

    public function Edit($id)
    {
        $data = [
            'judul' => 'Edit Kategori',
            'page' => 'admin/v_editkategori',
            'menu' => 'kategori',
            'kategori' => $this->ModelKategori->DetailData($id),
        ];
         return view('admin/v_template', $data);
    }

    public function UpdateData($id)
    {
        if ($this->validate([
            'name' => [
                'label' => 'Nama Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
                ],
            'description' => [
                'label' => 'Deskripsi Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
                ],
        ])) {
            // Jika valid
            $data = [
                'id' => $id,
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
            ];
            $this->ModelKategori->UpdateData($data);
            session()->setFlashdata('update','Data Berhasil Diupdate !!');
            return redirect()->to(base_url('admin/Kategori'));
        } else {
            // Jika tidak valid
            session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
            return redirect()->to(base_url('admin/Kategori/Edit/' . $id))->withInput('validation', \config\Services::validation());
        }
    }

    public function Delete($id)
    {
        $data = [
            'id' => $id,
        ];
        $this->ModelKategori->DeleteData($data);
        session()->setFlashdata('delete','Data Berhasil Dihapus !!');
        return redirect()->to(base_url('admin/Kategori'));
    }
}
