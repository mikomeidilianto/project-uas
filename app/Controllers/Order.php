<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Order extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Order',
            'page' => 'v_order',
            'menu' => 'order',
        ];
         return view('v_template', $data);
    }
}
