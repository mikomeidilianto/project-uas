<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    public function login($nama, $password)
    {
        return $this->db->table('users')->where([
            'nama'=> $nama,
            'password'=> $password,
        ])->get()->getRowArray();
                
    }
}