<?php 

namespace App\Models; 

use CodeIgniter\Model;
 
class ModelLogin extends Model
{
 protected $table = 'users';
 // Mengambil data dari tabel user
 protected $allowedFields = [
 'nama',
 'password',
 'created_at'
 ];
}