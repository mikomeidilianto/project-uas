<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelKeranjang;
use App\Models\ModelProduk;
use App\Models\ModelOrder;
use App\Models\ModelInvoice;

class Keranjang extends BaseController
{
    protected $ModelKeranjang;
    protected $ModelProduk;
    protected $ModelOrder;
    protected $ModelInvoice;

    public function __construct()
    {
        $this->ModelKeranjang = new ModelKeranjang();
        $this->ModelProduk = new ModelProduk();
        $this->ModelOrder = new ModelOrder();
        $this->ModelInvoice = new ModelInvoice();
    }

    public function index()
    {
        // Mengambil data keranjang menggunakan metode AllData()
        $data['keranjang'] = $this->modelKeranjang->AllData();

        return view('user/v_navbar', $data); // Ganti dengan nama view yang sesuai
    }
    // Method untuk mendapatkan isi keranjang
    public function getCart()
    {
        $cart = $this->ModelKeranjang->getCartItems();
        $cartCount = count($cart); // Total item dalam keranjang

        return $this->response->setJSON([
            'success' => true,
            'cart' => $cart,
            'cartCount' => $cartCount
        ]);
    }

    // Method untuk menambahkan produk ke keranjang
    public function addToCart()
    {
        $data = $this->request->getJSON(true);
        $id_product = $data['id_product'];
        $quantity = $data['quantity'];

        // Cari produk berdasarkan ID
        $product = $this->ModelProduk->find($id_product);

        if ($product) {
            $this->ModelKeranjang->addItem($id_product, $quantity);

            return $this->response->setJSON(['success' => true, 'message' => 'Produk berhasil ditambahkan ke keranjang']);
        }

        return $this->response->setJSON(['success' => false, 'message' => 'Produk tidak ditemukan']);
    }

    // Method untuk memperbarui jumlah produk
    public function updateQuantity()
    {
        $data = $this->request->getJSON(true);
        $id_product = $data['id_product'];
        $action = $data['action'];

        // Cari item keranjang berdasarkan produk ID
        $item = $this->ModelKeranjang->getItemById($id_product);

        if ($item) {
            $newQuantity = ($action === 'plus') ? $item['quantity'] + 1 : max(1, $item['quantity'] - 1);
            $this->ModelKeranjang->updateQuantity($id_product, $newQuantity);

            return $this->response->setJSON(['success' => true]);
        }

        return $this->response->setJSON(['success' => false, 'message' => 'Item tidak ditemukan di keranjang']);
    }

    // Method untuk menghapus item dari keranjang
    public function removeFromCart()
    {
        $data = $this->request->getJSON(true);
        $id_product = $data['id_product'];

        $this->ModelKeranjang->removeItem($id_product);

        return $this->response->setJSON(['success' => true, 'message' => 'Produk berhasil dihapus dari keranjang']);
    }
    
    public function checkout()
    {
        // Ambil data keranjang
        $data = [
            'page' => 'user/Pesanan/v_detailpesanan',
            'cart' => $this->ModelKeranjang->getCartItems(),
        ];

        return view('user/Pesanan/v_template_pesanan', $data);
    }

    // Fungsi untuk memproses checkout
    public function prosesCheckout()
{
    // Validasi input
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

    // Cek apakah pengguna sudah ada berdasarkan NIM (opsional)
    $userModel = new \App\Models\ModelUser();
    $existingUser = $userModel->where('nim', $data['nim'])->first();

    if (!$existingUser) {
        // Simpan data pengguna baru ke tabel users
        $userData = [
            'nama' => $data['nama'],
            'nim' => $data['nim'],
            'fakultas' => $data['fakultas'],
            'telepon' => $data['telepon'],
            'role' => 'customer', // Atur sebagai "customer"
        ];

        $userModel->insert($userData);
        $userId = $userModel->getInsertID();
    } else {
        $userId = $existingUser['id'];
    }

    // Ambil data keranjang
    $cartItems = $this->ModelKeranjang->getCartItems();
    if (empty($cartItems)) {
        return redirect()->back()->with('error', 'Keranjang Anda kosong!');
    }

    // Validasi apakah `cart_id` tersedia
    if (!isset($cartItems[0]['cart_id'])) {
        return redirect()->back()->with('error', 'ID keranjang tidak ditemukan!');
    }
    // Simpan data pesanan ke tabel orders
    $orderData = [
        'user_id' => $userId,
        'id_keranjang' => $cartItems[0]['cart_id'],  // Ambil ID keranjang pertama
        'status' => 'pending', // Status awal pesanan
    ];
    $this->ModelOrder->insert($orderData);
    $orderId = $this->ModelOrder->getInsertID();

    // Simpan detail pesanan ke tabel invoice
    $invoiceModel = new \App\Models\ModelInvoice();
foreach ($cartItems as $item) {
    $invoiceModel->insertInvoice([
        'order_id' => $orderId,
        'product_id' => $item['product_id'],
        'quantity' => $item['quantity'],
    ]);
}
    // Kosongkan keranjang
    $this->ModelKeranjang->clearCart();

    // Redirect ke halaman daftar pesanan pengguna
    return redirect()->to('/user/orders')->with('success', 'Pesanan berhasil dibuat!');
}


    // Fungsi untuk mengosongkan keranjang
    public function clearCart()
    {
        $this->ModelKeranjang->clearCart();
        return redirect()->back()->with('success', 'Keranjang berhasil dikosongkan!');
    }
}