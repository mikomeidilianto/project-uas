<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelProduk;
use App\Models\ModelKategori;

class Product extends BaseController
{
    public function __construct()
    {
        $this->ModelProduk = new ModelProduk();
    }

    public function index()
    {
        $data = [
            'judul' => 'Produk',
            'page' => 'admin/v_product',
            'menu' => 'product',
            'produk' => $this->ModelProduk->AllData(),
        ];
         return view('admin/v_template', $data);
    }

    //CRUD : CREATE
    public function Tambah()
    {
        $data = [
            'judul' => 'Tambah Produk',
            'page' => 'admin/v_tambahproduct',
            'menu' => 'product',
            'kategori' => $this->ModelProduk->AllKategori(),
        ];
         return view('admin/v_template', $data);
    }

    public function InsertData()
    {
        if ($this->validate([
            'name' => [
                'label' => 'Nama Produk',
                'rules' => 'required|is_unique[products.name]',
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

            'status' => [
                'label' => 'Status',
                'rules' => 'required|in_list[active,inactive]',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                    'in_list' => '{field} harus berupa Active atau Inactive.',
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
                'price' => $this->request->getPost('price'),
                'stock' => $this->request->getPost('stock'),
                'category_id' => $this->request->getPost('category_id'),
                'status' => $this->request->getPost('status'),
                'foto' => $nama_file,
            ];

            $foto->move("Admin/assets/img",$nama_file);
            $this->ModelProduk->InsertData($data);
            session()->setFlashdata('insert','Produk berhasil ditambahkan !!');
            return redirect()->to(base_url('admin/Product'));
        } else {
            // Jika tidak valid
            session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
            return redirect()->to(base_url('admin/Product/Tambah'))->withInput('validation', \config\Services::validation());
        }
    }

    public function Edit($id)
    {
        $data = [
            'judul' => 'Edit Kategori',
            'page' => 'admin/v_editproduk',
            'menu' => 'product',
            'detailproduk' => $this->ModelProduk->DetailData($id),
            'kategori' => $this->ModelProduk->AllKategori(),
        ];
         return view('admin/v_template', $data);
    }

    public function UpdateData($id)
    {
        if ($this->validate([
            'name' => [
                'label' => 'Nama Produk',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                    
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
            'status' => [
                'label' => 'Status',
                'rules' => 'required|in_list[active,inactive]',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                    'in_list' => '{field} harus berupa Active atau Inactive.',
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
            $detailproduk = $this->ModelProduk->DetailData($id);
            $foto = $this->request->getFile('foto');
            if ($foto->getError() == 4){
                $nama_file = $detailproduk['foto'];
            } else {
                $nama_file = $foto->getRandomName();
                $foto->move("Admin/assets/img/",$nama_file);
            }
            
            // Jika valid
            $data = [
                'id' => $id,
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
                'price' => $this->request->getPost('price'),
                'stock' => $this->request->getPost('stock'),
                'category_id' => $this->request->getPost('category_id'),
                'status' => $this->request->getPost('status'),
                'foto' => $nama_file,
            ];
            $this->ModelProduk->UpdateData($data);
            session()->setFlashdata('update','Data Berhasil Diupdate !!');
            return redirect()->to(base_url('admin/Product'));
        } else {
            // Jika tidak valid
            session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
            return redirect()->to(base_url('admin/Product/Edit/' . $id))->withInput('validation', \config\Services::validation());
        }
    }

    public function Delete($id)
    {
        $detailproduk = $this->ModelProduk->DetailData($id);
        if ($detailproduk['foto'] <> ''){
            unlink('Admin/assets/img/' . $detailproduk['foto']);
        }
        $data = [
            'id' => $id,
        ];
        $this->ModelProduk->DeleteData($data);
        session()->setFlashdata('delete','Data Berhasil Dihapus !!');
        return redirect()->to(base_url('admin/Product'));
    }
}
