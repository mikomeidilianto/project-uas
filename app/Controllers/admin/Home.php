<?php
namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $session = session();
        echo "Hello : ".$session->get('nama');
        $data = [
            'judul' => 'Dashboard',
            'page' => 'admin/v_home',
            'menu' => 'dashboard',
        ];
        return view('admin/v_template', $data);
    }
}