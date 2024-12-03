<?php
namespace App\Controllers\user;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'page' => 'user/v_dashboard',
        ];
        return view('user/v_template', $data);

        
    }
}