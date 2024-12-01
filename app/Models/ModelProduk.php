<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProduk extends Model
{
    public function Alldata()
    {
        // Melakukan join antara tabel 'products' dan 'categories' berdasarkan category_id
        return $this->db->table('products')
            ->join('categories', 'categories.id = products.category_id', 'left')  // 'left' join agar semua produk ditampilkan meskipun tanpa kategori
            ->select('products.*, categories.name AS category_name')  // Memilih semua kolom dari products dan 'name' dari categories
            ->get()
            ->getResultArray();
    }
}
