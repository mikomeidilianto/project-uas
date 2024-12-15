<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\ModelOrder;

class Order extends BaseController
{
    protected $ModelOrder;

    public function __construct()
    {
        $this->ModelOrder = new ModelOrder();
    }

    public function index()
    {
        $data = [
            'judul' => 'Order',
            'page' => 'admin/v_order',
            'menu' => 'order',
            'orders' => $this->ModelOrder->getCompletedOrders(), // Ambil pesanan yang dikonfirmasi
        ];
        return view('admin/v_template', $data);
    }
    public function detail($id_order)
{
    $invoiceDetail = $this->ModelOrder->getInvoiceDetail($id_order);

    if (empty($invoiceDetail)) {
        return redirect()->to('/admin/order')->with('error', 'Invoice tidak ditemukan.');
    }

    $data = [
        'page' => 'admin/v_order_detail',
        'menu' => 'order',
        'invoiceDetail' => $invoiceDetail
    ];

    return view('admin/v_template', $data);
}
}
