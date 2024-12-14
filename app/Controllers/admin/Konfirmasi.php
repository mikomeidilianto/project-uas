<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\ModelKategori;
use App\Models\ModelKeranjang;
use App\Models\ModelOrder;
use App\Models\ModelProduk;

class Konfirmasi extends BaseController
{
    protected $ModelProduk;
    protected $ModelKeranjang;
    protected $ModelOrder;

    public function __construct()
    {
        $this->ModelProduk = new ModelProduk();
        $this->ModelKeranjang = new ModelKeranjang();
        $this->ModelOrder = new ModelOrder();
    }

    public function index()
    {
        // Mengambil semua data pesanan dengan detail invoice
        $data = [
            'judul' => 'Konfirmasi Pesanan',
            'page' => 'admin/v_konfirmasi',
            'menu' => 'konfirmasi',
            'orders' => $this->ModelOrder->getOrderWithInvoice(), // Fungsi ini harus mengembalikan data pesanan lengkap
        ];
        return view('admin/v_template', $data);
    }

    public function detail($orderId)
    {
        // Mengambil detail pesanan berdasarkan ID
        $data = [
            'judul' => 'Detail Pesanan',
            'page' => 'admin/v_order_detail',
            'menu' => 'konfirmasi',
            'order' => $this->ModelOrder->getOrderWithInvoice($orderId),
        ];

        // Redirect jika data tidak ditemukan
        if (empty($data['order'])) {
            return redirect()->to('/admin/konfirmasi')->with('error', 'Pesanan tidak ditemukan.');
        }

        return view('admin/v_template', $data);
    }

    public function confirm($orderId)
    {
        // Ubah status pesanan menjadi 'completed'
        $this->ModelOrder->update($orderId, ['status' => 'completed']);
        return redirect()->to('/admin/konfirmasi')->with('success', 'Pesanan berhasil dikonfirmasi.');
    }

    public function reject($orderId)
    {
        // Ubah status pesanan menjadi 'cancelled'
        $this->ModelOrder->update($orderId, ['status' => 'cancelled']);
        return redirect()->to('/admin/konfirmasi')->with('success', 'Pesanan berhasil ditolak.');
    }
}
