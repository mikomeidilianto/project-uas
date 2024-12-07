<?php 

namespace App\Controllers\admin;  

use App\Controllers\BaseController;
use App\Models\ModelLogin;
use CodeIgniter\HTTP\ResponseInterface;
  
class LoginController extends BaseController
{
    public function index()
    {
        helper(['form']);
        echo view('admin/v_login');
    } 
  
    public function loginAuth()
    {
        $session = session();
        $ModelLogin = new ModelLogin();
        $nama = $this->request->getVar('nama');
        $password = $this->request->getVar('password');
        
        $data = $ModelLogin->where('nama', $nama)->first();
        
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'nama' => $data['nama'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to(base_url('admin/Login'));
            
            }else{
                $session->setFlashdata('msg', 'Password Salah!');
                return redirect()->to(base_url('admin/Login'));
            }
        }else{
            $session->setFlashdata('msg', 'Username Salah!');
            return redirect()->to(base_url('admin/Login'));
        }
    }
  
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('admin/Login'));
    }
}