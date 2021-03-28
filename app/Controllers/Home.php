<?php

namespace App\Controllers;

class Home extends BaseController
{
	public $module_name = 'Home';
	
	public function index()
	{
		if(!$this->session->get('auth_user')){
			return redirect()->to(base_url().'/usuarios/login');
		}
		$data = [
			'title' => 'Popcorn',
		];

		$this->display('home/index', $data);
		
	}
}
