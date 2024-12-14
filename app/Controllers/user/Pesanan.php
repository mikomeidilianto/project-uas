<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelOrder;
use App\Models\ModelUser;
use App\Models\ModelKeranjang;

class Pesanan extends BaseController
{
    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelOrder = new ModelOrder();
        $this->ModelKeranjang = new ModelKeranjang();
    }

    public function index()
    {
        // Data yang dikirim ke view
        $data = [
            'page' => 'user/Pesanan/v_detailpesanan', // Halaman detail pesanan
        ];

        // Menggunakan template untuk menampilkan halaman
        return view('user/Pesanan/v_template_pesanan', $data);
    }

    public function InsertDataUser()
    {
        if ($this->validate([
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
                ],
            'nim' => [
                'label' => 'NIM',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
                ],
                                
                'fakultas' => [
                'label' => 'Fakultas',
                'rules' => 'required',
                 'errors' => [
                     'required' => '{field} Wajib Diisi !!!',
                 ]
                ],

                'telepon' => [
                    'label' => 'Nomor Telepon',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !!!',
                    ]
                    ],

        ])) {
        
            // Jika valid
            $dataUser = [
                'nama' => $this->request->getPost('nama'),
                'nim' => $this->request->getPost('nim'),
                'fakultas' => $this->request->getPost('fakultas'),
                'telepon' => $this->request->getPost('telepon'),
                
            ];
            $userId = $this->ModelUser->insert($dataUser);
            $orderData = [
                'user_id' => $userId,
                'status' => 'pending',
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $this->ModelUser->InsertDataUser($data);
            return redirect()->to(base_url('user/Pesanan/v_invoice'));
        } else {
            // Jika tidak valid
            session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user/Keranjang/checkout'))->withInput('validation', \config\Services::validation());
        }
    }
}
//         $orderId = $this->ModelOrder->insert($orderData);

//         foreach ($this->ModelKeranjang->getCartItems() as $item) {
//             $this->ModelKeranjang->update($item['id'], ['id_order' => $orderId]);
//         }

//         return $this->response->setJSON(['success' => true, 'order_id' => $orderId]);

//         }
//         return $this->response->setJSON(['success' => false]);
//     }


//     public function confirmOrder()
// {
//     $id_keranjang = $this->request->getPost('id_keranjang');

//     // Periksa apakah id_keranjang valid
//     $keranjangExists = $this->db->table('keranjang')
//         ->where('id', $id_keranjang)
//         ->countAllResults();

//     if ($keranjangExists == 0) {
//         // Jika id_keranjang tidak ditemukan
//         return redirect()->back()->with('error', 'Keranjang tidak ditemukan.');
//     }

//     // Simpan data ke tabel orders
//     $this->db->table('orders')->insert([
//         'user_id' => $this->request->getPost('user_id'),
//         'id_keranjang' => $id_keranjang,
//         'status' => 'pending',
//         'created_at' => date('Y-m-d H:i:s'),
//     ]);

//     return redirect()->to('/admin/orders/confirmation')->with('success', 'Pesanan berhasil ditambahkan.');
// }
//     public function getOrderModal($orderId)
//     {
//         $order = $this->ModelOrder->getOrderById($orderId);
//         $cartItems = $this->ModelKeranjang->getCartByOrder($orderId);

//         return view('user/Pesanan/v_modal_order', ['order' => $order, 'cart' => $cartItems]);
//     }
// }




