<?php

namespace App\Controllers;

class Usuarios extends BaseController
{
    public $module_name = 'Usuarios';
    public function login()
    {
        if($this->session->get('auth_user')){
			return redirect()->to(base_url().'/home/index');
		}
        
        // $this->session->set('auth_user', ['id' => '999999999999999', 'nome' => 'teste', 'email' => 'emailteste']);

        $this->display('usuarios/login');
    }

    public function checkEmail()
    {
        $email = $this->request->getPost('email');
        echo '<pre>';
        print_r($email);
        echo '</pre>';
        die();
    }

    public function newUser()
    {
        if($this->session->get('auth_user')){
			return redirect()->to(base_url().'/home/index');
		}

        $this->display('usuarios/cadastro');
    }
}