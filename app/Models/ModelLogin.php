<?php 

namespace App\Models; 

use CodeIgniter\Model;
 
class ModelLogin extends Model
{
 protected $table = 'users';
 
 protected $allowedFields = [
 'nama',
 'password',
 'created_at'
 ];
}