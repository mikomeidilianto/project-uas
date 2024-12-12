<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelKeranjang;
use App\Models\ModelProduk;

class Keranjang extends BaseController
{
    protected $ModelKeranjang;
    protected $ModelProduk;

    public function __construct()
    {
        $this->ModelKeranjang = new ModelKeranjang();
        $this->ModelProduk = new ModelProduk();
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

}