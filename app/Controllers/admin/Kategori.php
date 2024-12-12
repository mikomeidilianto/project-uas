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
            'judul' => 'Tenant',
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
            'judul' => 'Tambah Tenant',
            'page' => 'admin/v_tambahkategori',
            'menu' => 'kategori',
        ];
         return view('admin/v_template', $data);
    }

    public function InsertData()
    {
        if ($this->validate([
            'name' => [
                'label' => 'Nama Tenant',
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

                'foto' => [
                'label' => 'Foto',
                 'rules' => 'uploaded[foto]|max_size[foto,10024]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                 'errors' => [
                     'uploaded' => '{field} Wajib Diupload !!!',
                     'max_size' => 'Ukuran {field} Max 10MB',
                     'mime_in' => 'Format {field} Harus JPG/PNG/JPEG/GIF/WEBP',
                 ]
                ],
        ])) {
            $foto = $this->request->getFile('foto');
            $nama_file = $foto->getRandomName();

            // Jika valid
            $data = [
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
                'foto' => $nama_file,
            ];

            $foto->move("Admin/assets/img",$nama_file);
            $this->ModelKategori->InsertData($data);
            session()->setFlashdata('insert','Kategori berhasil ditambahkan !!');
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
            'judul' => 'Edit Tenant',
            'page' => 'admin/v_editkategori',
            'menu' => 'kategori',
            'detailkategori' => $this->ModelKategori->DetailData($id),
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
            'foto' => [
                'label' => 'Foto',
                 'rules' => 'max_size[foto,10024]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                 'errors' => [
                     'uploaded' => '{field} Wajib Diupload !!!',
                     'max_size' => 'Ukuran {field} Max 10MB',
                     'mime_in' => 'Format {field} Harus JPG/PNG/JPEG/GIF/WEBP',
                 ]
                ],
        ])) {
            $detailkategori = $this->ModelKategori->DetailData($id);
            $foto = $this->request->getFile('foto');
            if ($foto->getError() == 4){
                $nama_file = $detailkategori['foto'];
            } else {
                $nama_file = $foto->getRandomName();
                $foto->move("Admin/assets/img/",$nama_file);
            }

            // Jika valid
            $data = [
                'id' => $id,
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
                'foto' => $nama_file,
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
        $detailkategori = $this->ModelKategori->DetailData($id);
        if ($detailkategori['foto'] <> ''){
            unlink('Admin/assets/img/' . $detailkategori['foto']);
        }
        $data = [
            'id' => $id,
        ];
        $this->ModelKategori->DeleteData($data);
        session()->setFlashdata('delete','Data Berhasil Dihapus !!');
        return redirect()->to(base_url('admin/Kategori'));
    }
}
