<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelOrder extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id_order';
    protected $allowedFields = ['user_id', 'id_keranjang', 'status'];

    // Ambil semua data pesanan yang statusnya pending
    public function getPendingOrders()
{
    return $this->db->table('orders')
        ->join('users', 'users.id = orders.user_id', 'left')
        ->join('keranjang', 'keranjang.id = orders.id_keranjang', 'left')
        ->join('products', 'products.id = keranjang.id_product', 'left')
        ->select('orders.id_order, orders.status, users.nama AS user_nama, users.nim, users.telepon, users.fakultas')
        ->select('products.name AS product_name, products.price, keranjang.quantity')
        ->select('(products.price * keranjang.quantity) AS total_price')
        ->where('orders.status', 'pending')
        ->orderBy('orders.id_order', 'DESC')
        ->get()
        ->getResultArray();
}
public function getKeranjang()
{
    return $this->db->table('keranjang')
        ->join('products', 'products.id = keranjang.id_product', 'left')
        ->select('keranjang.quantity, products.name AS product_name, products.price, products.foto')
        ->get()
        ->getResultArray();
}

    // Konfirmasi pesanan, pindahkan ke tabel invoice dan hapus keranjang
    public function confirmOrder($id_order)
    {
        // Ambil pesanan berdasarkan id_order
        $order = $this->db->table('orders')->where('id_order', $id_order)->get()->getRow();

        if ($order) {
            // Ambil data keranjang
            $keranjang = $this->db->table('keranjang')->where('id', $order->id_keranjang)->get()->getRow();

            if ($keranjang) {
                // Simpan ke tabel invoice
                $invoiceData = [
                    'order_id' => $id_order,
                    'product_id' => $keranjang->id_product,
                    'quantity' => $keranjang->quantity,
                ];
                $this->db->table('invoice')->insert($invoiceData);

                // Hapus keranjang
                $this->db->table('keranjang')->where('id', $order->id_keranjang)->delete();
            }

            // Update status pesanan menjadi 'completed'
            return $this->db->table('orders')->where('id_order', $id_order)->update(['status' => 'completed']);
        }
        return false;
    }

    // Tolak pesanan
    public function cancelOrder($id_order)
    {
        return $this->db->table('orders')
            ->where('id_order', $id_order)
            ->update(['status' => 'cancelled']);
    }

    // Ambil semua pesanan yang sudah dikonfirmasi atau ditolak
    public function getConfirmedOrders()
    {
        return $this->db->table('orders')
            ->join('users', 'users.id = orders.user_id', 'left')
            ->select('orders.id_order, orders.status, users.nama, users.telepon')
            ->whereIn('orders.status', ['completed', 'cancelled'])
            ->orderBy('orders.id_order', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function getOrderDetail($id_order)
{
    return $this->db->table('orders')
        ->join('users', 'users.id = orders.user_id', 'left')
        ->join('keranjang', 'keranjang.id = orders.id_keranjang', 'left')
        ->join('products', 'products.id = keranjang.id_product', 'left')
        ->select('orders.id_order, orders.status, users.nama AS user_nama, users.nim, users.telepon')
        ->select('products.name AS product_name, products.price, keranjang.quantity')
        ->where('orders.id_order', $id_order)
        ->get()
        ->getResultArray();
}

public function getInvoice($id_order)
{
    return $this->db->table('invoice')
        ->join('products', 'products.id = invoice.product_id', 'left')
        ->select('products.name AS product_name, products.price, invoice.quantity')
        ->where('invoice.order_id', $id_order)
        ->get()
        ->getResultArray();
}

public function getCompletedOrders()
{
    return $this->db->table('orders')
        ->join('users', 'users.id = orders.user_id', 'left')
        ->select('orders.id_order, orders.status, users.nama AS user_nama, users.nim, users.telepon')
        ->where('orders.status', 'completed')
        ->orderBy('orders.id_order', 'DESC')
        ->get()
        ->getResultArray();
}
}
