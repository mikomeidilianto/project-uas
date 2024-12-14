<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Order extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Order',
            'page' => 'admin/v_order',
            'menu' => 'order',
        ];
         return view('admin/v_template', $data);
    }

    public function orderDetails($orderId)
{
    // Ambil data pesanan berdasarkan ID
    $order = $this->ModelOrder->getOrderById($orderId);

    // Ambil item-item dari pesanan tersebut
    $items = $this->ModelKeranjang->getItemsByOrder($orderId);

    // Kirim data ke view
    return view('admin/v_order_details', [
        'order' => $order,
        'items' => $items,
    ]);
}
public function detail($orderId)
{
    $data['order'] = $this->ModelOrder->getOrderWithInvoice($orderId);
    return view('admin/v_order_detail', $data);
}
}

