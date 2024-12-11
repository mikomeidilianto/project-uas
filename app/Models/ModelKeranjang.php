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
            ->select('products.*, keranjang.quantity, products.name AS keranjang_name, products.price AS keranjang_price, products.foto AS keranjang_foto') // Pilih kolom yang dibutuhkan
            ->get()
            ->getResultArray(); // Mengembalikan hasil dalam bentuk array
    }
    // Ambil semua item keranjang
    public function getCartItems()
    {
        return $this->select('keranjang.*, products.name as product_name, products.price, products.foto')
            ->join('products', 'products.id = keranjang.id_product')
            ->findAll();
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
}