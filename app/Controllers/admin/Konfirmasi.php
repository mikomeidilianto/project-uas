<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\ModelOrder;
use App\Models\ModelProduk;
use App\Models\ModelKategori;

class Konfirmasi extends BaseController
{
    protected $ModelOrder;
    // Mengambil data dari model
    public function __construct()
    {
        $this->ModelOrder = new ModelOrder();
    }

    public function index()
    {
        if (session()->get('nama') == false)
        {
            return redirect()->to(base_url('admin/Auth/login'));
        }
        // Menampilkan Data
        $data = [
            'judul' => 'Konfirmasi Pesanan',
            'page' => 'admin/v_konfirmasi',
            'menu' => 'konfirmasi',
            'orders' => $this->ModelOrder->getPendingOrders(),
        ];
        return view('admin/v_template', $data);
    }

    public function confirmOrder($id_order)
    {
        // Fitur konfirmasi order, mengambil data dari model
        $this->ModelOrder->confirmOrder($id_order);
        return redirect()->to('admin/Konfirmasi')->with('success', 'Pesanan berhasil dikonfirmasi.');
    }

    public function cancelOrder($id_order)
    {
                // Fitur cancle order, mengambil data dari model
        $this->ModelOrder->cancelOrder($id_order);
        return redirect()->to('admin/Konfirmasi')->with('danger', 'Pesanan berhasil ditolak.');
    }

    public function orders()
    {
        // Menampilkan order
        $data = [
            'judul' => 'Orders',
            'page' => 'admin/v_orders',
            'orders' => $this->ModelOrder->getConfirmedOrders(),
        ];
        return view('admin/v_template', $data);
    }

    public function detail($id_order)
{
    $orderDetail = $this->ModelOrder->getOrderDetail($id_order);

    if (empty($orderDetail)) {
        return redirect()->to('/admin/konfirmasi')->with('error', 'Detail pesanan tidak ditemukan.');
    }

    $data = [
        'judul' => 'Detail Pesanan',
        'page' => 'admin/v_order_detail',
        'menu' => 'konfirmasi',
        'orderDetail' => $orderDetail,
    ];

    return view('admin/v_template', $data);
}

}

