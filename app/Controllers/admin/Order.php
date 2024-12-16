<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\ModelOrder;
use App\Models\ModelInvoice;

class Order extends BaseController
{
    protected $ModelOrder;
    protected $ModelInvoice;

    public function __construct()
    {
        $this->ModelOrder = new ModelOrder();
        $this->ModelInvoice = new ModelInvoice();
    }

    public function index()
    {
        // Menampilkan data pesanan yang sudah dikonfirmasi
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
    // Menampilkan detail pesanan
    if (empty($invoiceDetail)) {
        return redirect()->to('admin/order')->with('error', 'Invoice tidak ditemukan.');
    }

    $data = [
        'page' => 'admin/v_order_completed',
        'menu' => 'order',
        'invoiceDetail' => $this->ModelOrder->getInvoiceDetail($id_order),
    ];

    return view('admin/v_template', $data);
}
}
