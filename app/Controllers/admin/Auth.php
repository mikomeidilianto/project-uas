<?php 

namespace App\Controllers\admin;  

use App\Controllers\BaseController;
use App\Models\ModelAuth;
use CodeIgniter\HTTP\ResponseInterface;
  
class Auth extends BaseController
{
    public function __construct()
    {
        $this->ModelAuth = new ModelAuth();
    }

    public function login()
    {
        $data = [
            'judul' => 'Login',
        ];
        return view('admin/v_login', $data);
    }

    public function cek_login()
    {
        if ($this->validate([
            'nama' => [
                'label' => 'nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
                ],
            'password' => [
                'label' => 'password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
                ],
        ])) {
            // Jika valid
            $nama = $this->request->getPost('nama');
            $password = $this->request->getPost('password');
            $cek = $this->ModelAuth->login($nama, $password);
            if ($cek) {
                // Jika datanya cocok
                session()->set('log',true);
                session()->set('nama',$cek['nama']);
                session()->set('password',$cek['password']);
                // login
                return redirect()->to(base_url('admin/Home'));
            } else {
                // Jika datanya tidak cocok
                session()->setFlashdata('pesan','Login Gagal !!');
                return redirect()->to(base_url('admin/Auth/login'));
            }
        } else {
            // jika tidak valid
            session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
            return redirect()->to(base_url('admin/Auth/login'));
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('nama');
        session()->remove('password');
        session()->setFlashdata('pesan','Logout Sukses !!');
        return redirect()->to(base_url('admin/Auth/login'));
    }
}