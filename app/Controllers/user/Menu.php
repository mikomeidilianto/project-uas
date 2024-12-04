<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class Menu extends BaseController
{
    public function index()
    {
        $data = [
            'page' => 'user/Menu/v_menu',  
        ];

        
        return view('user/Menu/v_template_menu', $data);
    }
}
