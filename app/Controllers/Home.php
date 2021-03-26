<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		
		$data = [
			'title' => 'Popcorn',
		];

		$this->display('home/index', $data);
		
	}
}
