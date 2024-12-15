<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{   
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'nim', 'fakultas', 'telepon'];
    //Tampil data
    public function AllData()
    {
        return $this->db->table('users')
                ->Get()-> GetResultArray();
    }

    //Tambah data
    public function InsertDataUser($data)
    {
        $this->db->table('users')->insert($data);
    }

    public function getUserById($id)
{
    return $this->where('id', $id)->first();
}
}