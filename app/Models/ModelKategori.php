<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKategori extends Model
{   
    //Tampil data
    public function Alldata()
    {
        return $this->db->table('categories')
                ->Get()-> GetResultArray();
    }

    //Tambah data
    public function InsertData($data)
    {
        $this->db->table('categories')->insert($data);
    }
}
