<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelInvoice extends Model
{
    protected $table = 'invoice';
    protected $primaryKey = 'id';
    protected $allowedFields = ['order_id', 'product_id', 'quantity'];

    public function insertInvoice($data)
    {
        return $this->insert($data);
    }
}
