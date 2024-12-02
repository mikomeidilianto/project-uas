<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKategori extends Model
{   
    //Tampil data
    public function AllData()
    {
        return $this->db->table('categories')
                ->Get()-> GetResultArray();
    }

    //Tambah data
    public function InsertData($data)
    {
        $this->db->table('categories')->insert($data);
    }

    public function DetailData($id)
    {
        return $this->db->table('categories')
                ->where('id', $id)
                ->Get()->GetRowArray();
    }

    //Edit data
    public function UpdateData($data)
    {
        $this->db->table('categories')
        ->where('id', $data['id'])
        ->update($data);
    }

    //Delete data
    public function DeleteData($data)
    {
        $this->db->table('categories')
        ->where('id', $data['id'])
        ->delete($data);
    }
}
