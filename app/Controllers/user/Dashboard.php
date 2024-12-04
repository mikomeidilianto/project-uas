<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'page' => 'user/Dashboard/v_dashboard',
        ];
        return view('user/Dashboard/v_template_dashboard', $data);
    }
}
