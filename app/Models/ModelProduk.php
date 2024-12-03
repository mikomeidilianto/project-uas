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

     //Tambah data
    public function InsertData($data)
    {
        $this->db->table('products')->insert($data);
    }

    public function DetailData($id)
    {
        return $this->db->table('products')
                ->where('id', $id)
                ->Get()->GetRowArray();
    }

     //Edit data
     public function UpdateData($data)
     {
         $this->db->table('products')
         ->where('id', $data['id'])
         ->update($data);
     }
 
     //Delete data
     public function DeleteData($data)
     {
         $this->db->table('products')
         ->where('id', $data['id'])
         ->delete($data);
     }
 
    public function AllKategori()
    {
        // Melakukan join antara tabel 'products' dan 'categories' berdasarkan category_id
        return $this->db->table('categories')
            ->get()->getResultArray();
    }

    
}

