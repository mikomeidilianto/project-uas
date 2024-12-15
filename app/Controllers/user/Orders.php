<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use App\Models\ModelOrder;
use App\Models\ModelKeranjang;
use App\Models\ModelUser;

class Orders extends BaseController
{
    protected $ModelOrder;
    protected $ModelKeranjang;

    public function __construct()
    {
        $this->ModelOrder = new ModelOrder();
        $this->ModelKeranjang = new ModelKeranjang();
    }

    public function index()
    {
        $data = [
            'page' => 'user/Pesanan/v_orders',
            'keranjang' => $this->ModelOrder->getKeranjang(),
            'orders' => $this->ModelOrder->getPendingOrders(),
        ];

        return view('user/Pesanan/v_template_pesanan', $data);
    }

    public function insertOrder()
    {
        $validation = \Config\Services::validation();
        $data = $this->request->getPost();

        $rules = [
            'nama' => 'required',
            'nim' => 'required',
            'fakultas' => 'required',
            'telepon' => 'required',
        ];

        if (!$validation->setRules($rules)->run($data)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Simpan user jika belum ada
        $userModel = new ModelUser();
        $existingUser = $userModel->where('nim', $data['nim'])->first();

        if (!$existingUser) {
            $userId = $userModel->insert([
                'nama' => $data['nama'],
                'nim' => $data['nim'],
                'fakultas' => $data['fakultas'],
                'telepon' => $data['telepon'],
                'role' => 'customer',
            ]);
        } else {
            $userId = $existingUser['id'];
        }

        // Ambil data keranjang
        $cartItems = $this->ModelKeranjang->getCartItems();
        if (empty($cartItems)) {
            return redirect()->back()->with('error', 'Keranjang kosong.');
        }

        // Simpan pesanan
    $orderData = [
        'user_id' => $userId, // ID user (sementara)
        'id_keranjang' => $cartItems[0]['cart_id'], // Ambil ID keranjang pertama
        'status' => 'pending',
    ];
    $this->ModelOrder->insert($orderData);

        return redirect()->to('user/Orders')->with('success', 'Pesanan berhasil dibuat!');
    }
    public function detail($id_order)
{
    $orderDetail = $this->ModelOrder->getOrderDetail($id_order);
    $invoiceDetail = $this->ModelOrder->getInvoice($id_order);

    if (empty($orderDetail)) {
        return redirect()->to('/user/orders')->with('error', 'Detail pesanan tidak ditemukan.');
    }

    $data = [
        'page' => 'user/Pesanan/v_order_detail',
        'orderDetail' => $orderDetail,
        'invoiceDetail' => $invoiceDetail,
    ];

    return view('user/Pesanan/v_template_pesanan', $data);
}

}
