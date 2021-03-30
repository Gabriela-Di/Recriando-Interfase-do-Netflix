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
        $data = array(
            'nav_only' => TRUE
        );
        $this->display('usuarios/login', $data);
    }

    public function checkEmail()
    {
        $email = $this->request->getPost('email');
        if($email){
            $emailExists =  $this->mdl->getByEmail($email);
            if(!$emailExists){
                return redirect()->to(base_url().'/usuarios/registrar');
            }
        }
    }

    public function newUser()
    {
        if($this->session->get('auth_user')){
			return redirect()->to(base_url().'/home/index');
		}

        $this->display('usuarios/cadastro');
    }

    public function registrar()
    {
        if($this->session->get('auth_user')){
			return redirect()->to(base_url().'/home/index');
		}

        $userPost = $this->request->getPost();
        if(!empty($userPost)){
            $usuario = [
                'nome' => $userPost['nome'],
                'email' => $userPost['email'],
                'telefone' => $userPost['telefone'],
                'senha' => $userPost['senha'],
            ];
            $saved = $this->mdl->saveUser($usuario);
            if($saved){
                
            }
            dd($saved);
            

        }


        $data = array(
            'basic_nav' => TRUE
        );
        $this->display('usuarios/registrar', $data);
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url().'/usuarios/login');
    }
}