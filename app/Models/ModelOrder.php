<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelOrder extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'id_keranjang', 'status', 'created_at'];


        // Ambil detail pesanan dengan join tabel terkait
        public function getOrderWithInvoice($orderId = null)
        {
            $builder = $this->db->table('orders')
                ->join('users', 'users.id = orders.user_id', 'left')
                ->join('keranjang', 'keranjang.id = orders.id_keranjang', 'left')
                ->join('products', 'products.id = keranjang.id_product', 'left')
                ->select('orders.id AS order_id, orders.status, orders.created_at') // Data pesanan
                ->select('users.nama AS user_nama, users.nim AS user_nim, users.fakultas AS user_fakultas, users.telepon AS user_telepon') // Data pengguna
                ->select('products.name AS product_name, products.price AS product_price, products.foto AS product_image') // Data produk
                ->select('keranjang.quantity, (keranjang.quantity * products.price) AS total_price'); // Quantity dari keranjang
    
            if ($orderId) {
                $builder->where('orders.id', $orderId);
            }
    
            return $builder->get()->getResultArray();
        }
    
        // Tambahkan pesanan baru
        public function insertOrder($data)
        {
            $this->insert($data);
            return $this->getInsertID(); // Dapatkan ID dari pesanan terakhir
        }
    
        // Ambil pesanan berdasarkan ID pengguna
        public function getOrdersByUserId($userId)
        {
            return $this->db->table('orders')
                ->where('orders.user_id', $userId)
                ->get()
                ->getResultArray();
        }
    }

//     public function saveOrderWithInvoice($userId, $cartItems)
//     {
//         // Simpan data pesanan ke tabel `orders`
//         $orderData = [
//             'user_id' => $userId,
//             'id_keranjang' => 0, // Opsional jika tidak dipakai
//             'status' => 'pending',
//         ];
//         $this->insert($orderData);
//         $orderId = $this->getInsertID();

//         // Simpan data ke tabel `invoice` untuk setiap item di keranjang
//         foreach ($cartItems as $item) {
//             $this->db->table('invoice')->insert([
//                 'order_id' => $orderId,
//                 'product_id' => $item['id_product'],
//                 'quantity' => $item['quantity'],
//             ]);
//         }

//         return $orderId;
//     }
// }
//     public function DataOrder()
//     {
//         // Melakukan join antara tabel 'products' dan 'categories' berdasarkan category_id
//         return $this->db->table('orders')
//             ->join('users', 'users.id = orders.user_id', 'left')  // 'left' join agar semua produk ditampilkan meskipun tanpa kategori
//             ->join('keranjang', 'keranjang.id = orders.id_keranjang', 'left')  // 'left' join agar semua produk ditampilkan meskipun tanpa kategori
//             ->select('users.*, users.nama AS order_nama, users.nim AS order_nim, users.fakultas AS order_fakultas, users.telepon AS order_telepon')  // Memilih semua kolom dari products dan 'name' dari categories
//             ->select('keranjang.*, keranjang.id_product AS order_nama, keranjang.quantity AS order_quantity')  // Memilih semua kolom dari products dan 'name' dari categories
//             ->get()
//             ->getResultArray();
//     }

//     public function getOrderById($orderId)
// {
//     return $this->db->table('orders')
//         ->join('users', 'users.id = orders.user_id', 'left')
//         ->select('orders.*, users.nama, users.nim, users.fakultas, users.telepon')
//         ->where('orders.id', $orderId)
//         ->get()
//         ->getRowArray();
// }
    
//     public function updateOrderStatus($id, $status)
//     {
//         return $this->update($id, ['status' => $status]);
//     }

//     public function getPendingOrders()
// {
//     return $this->db->table('orders')
//         ->join('users', 'users.id = orders.user_id', 'left') // Join tabel users untuk informasi pelanggan
//         ->select('orders.*, users.nama, users.nim, users.telepon') // Kolom yang dibutuhkan
//         ->where('orders.status', 'pending') // Ambil hanya pesanan berstatus pending
//         ->get()
//         ->getResultArray(); // Hasil dalam bentuk array
// }
