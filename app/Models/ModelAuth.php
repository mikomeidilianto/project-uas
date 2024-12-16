<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    // Method login, mengambil nama dan password pada tabel user untuk login admin
    public function login($nama, $password)
    {
        return $this->db->table('users')->where([
            'nama'=> $nama,
            'password'=> $password,
        ])->get()->getRowArray();
                
    }
}