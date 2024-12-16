<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelInvoice extends Model
{
    protected $table = 'invoice';
    protected $primaryKey = 'id';
    protected $allowedFields = ['order_id', 'product_id', 'quantity'];

    public function getInvoicesByOrderId($orderId)
{
    // Method invoice, mengambil data dari table invoice dengan melakukan join ke table orders dengan id_order dengan menggunakan method left
    return $this->db->table('invoice')
        ->join('orders', 'orders.id_order = invoice.order_id', 'left')
        ->select('invoice.*, orders.status AS order_status')
        ->where('invoice.order_id', $orderId)
        ->get()
        ->getResultArray();
}

public function insertInvoiceDataFromCart($orderId, $cartItems)
{
    // Method invoice berdasarkan keranjang 
    foreach ($cartItems as $item) {
        $this->db->table('invoice')->insert([
            'order_id' => $orderId,
            'product_id' => $item['product_id'],
            'quantity' => $item['quantity'],
        ]);
    }
}

    public function insertInvoice($data)
    {
        return $this->insert($data);
    }
}
