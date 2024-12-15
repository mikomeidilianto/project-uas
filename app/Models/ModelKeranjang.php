<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKeranjang extends Model
{
    protected $table = 'keranjang';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_product', 'quantity'];

    
    public function AllData()
{
    return $this->db->table('keranjang')
        ->join('products', 'products.id = keranjang.id_product', 'left') // Join dengan tabel produk
        ->select('keranjang.quantity') // Kolom dari keranjang
        ->select('products.id AS product_id, products.name AS keranjang_name, products.price AS keranjang_price, products.foto AS keranjang_foto, products.stock AS keranjang_stok') // Kolom dari produk
        ->get()
        ->getResultArray(); // Mengembalikan hasil dalam bentuk array
}

// Ambil semua item keranjang
public function getCartItems()
{
    return $this->db->table('keranjang')
        ->join('products', 'products.id = keranjang.id_product', 'left')
        ->select('keranjang.id AS cart_id, keranjang.quantity, keranjang.id_product') // Kolom dari keranjang
        ->select('products.id AS product_id, products.name AS product_name, products.price, products.foto') // Kolom dari produk
        ->get()
        ->getResultArray(); // Mengembalikan hasil dalam bentuk array
}

    // Tambahkan item ke keranjang
    public function addItem($id_product, $quantity)
    {
        $item = $this->where('id_product', $id_product)->first();

        if ($item) {
            // Jika produk sudah ada di keranjang, update jumlah
            $this->update($item['id'], ['quantity' => $item['quantity'] + $quantity]);
        } else {
            // Tambahkan produk baru ke keranjang
            $this->insert(['id_product' => $id_product, 'quantity' => $quantity]);
        }
    }

    // Update jumlah item
    public function updateQuantity($id_product, $quantity)
    {
        $this->where('id_product', $id_product)->set(['quantity' => $quantity])->update();
    }

    // Hapus item dari keranjang
    public function removeItem($id_product)
    {
        $this->where('id_product', $id_product)->delete();
    }

    // Ambil satu item berdasarkan id_product
    public function getItemById($id_product)
    {
        return $this->where('id_product', $id_product)->first();
        
    }
    public function clearCart()
{
    $this->db->table('keranjang')->truncate();
}

}