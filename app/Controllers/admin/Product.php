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
            // 'image_path' => [
            //     'label' => 'Foto',
            //      'rules' => 'required',
            //      'errors' => [
            //          'required' => '{field} Wajib Diisi !!!',
            //      ]
            //     ],
            'status' => [
                'label' => 'Status',
                'rules' => 'required|in_list[active,inactive]',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                    'in_list' => '{field} harus berupa Active atau Inactive.',
                ],
            ],

        ])) {
            // Jika valid
            $data = [
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
                'price' => $this->request->getPost('price'),
                'stock' => $this->request->getPost('stock'),
                'category_id' => $this->request->getPost('category_id'),
                // 'image_path' => $this->request->getPost('image_path'),
                'status' => $this->request->getPost('status'),
            ];
            $this->ModelProduk->InsertData($data);
            session()->setFlashdata('insert','Data berhasil ditambahkan !!');
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
            'kategori' => $this->ModelKategori->DetailData($id),
        ];
         return view('admin/v_template', $data);
    }

    public function UpdateData($id)
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
            // 'image_path' => [
            //     'label' => 'Foto',
            //      'rules' => 'required',
            //      'errors' => [
            //          'required' => '{field} Wajib Diisi !!!',
            //      ]
            //     ],
            'status' => [
                'label' => 'Status',
                'rules' => 'required|in_list[active,inactive]',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                    'in_list' => '{field} harus berupa Active atau Inactive.',
                ],
                ],
        ])) {
            // Jika valid
            $data = [
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
                'price' => $this->request->getPost('price'),
                'stock' => $this->request->getPost('stock'),
                'category_id' => $this->request->getPost('category_id'),
                // 'image_path' => $this->request->getPost('image_path'),
                'status' => $this->request->getPost('status'),
            ];
            $this->ModelProduk->UpdateData($data);
            session()->setFlashdata('update','Data Berhasil Diupdate !!');
            return redirect()->to(base_url('admin/Product'));
        } else {
            // Jika tidak valid
            session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
            return redirect()->to(base_url('admin/Product/Tambah'))->withInput('validation', \config\Services::validation());
        }
    }
}
