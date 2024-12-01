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
}
