<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\IncomingRequest;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{
	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['html', 'url', 'Sys_helper'];
	public $ns_model;

	public function __construct()
	{
		$this->session = \Config\Services::session();
		$this->uri = current_url(true)->getSegments();
		$this->routes = \Config\Services::router();
		$this->request = \Config\Services::request();
	}
	

	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param IncomingRequest $requests
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);
		
		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.: $this->session = \Config\Services::session();
		// $this->app_url = base_url();
		

		$this->parser = \Config\Services::parser();
		$this->session = \Config\Services::session();
		$this->SetInitialData();
		$this->SetMdl();

	}
	
	public function display($view, $data = false)
	{
		$this->request->getPost();
		if(!$data){
			$data = array();
		}
		
		echo $this->parser->setData($data)->render('template/header');

		echo $this->parser->setData($data)->render($view);
		
		echo $this->parser->setData($data)->render('template/footer');
	}

	public function SetInitialData()
	{
		//Initial data for view, assuming this it's gonna be used in all pages
		$msg_type = '';
		if($this->session->getFlashdata('msg_type') == 'success'){
			$msg_type = 'msg-success';
		}elseif($this->session->getFlashdata('msg_type') == 'alert'){
			$msg_type = 'alert';
		}
		
		$dataArr = array(
			'app_url' => base_url().'/',
			'title' => '',
			'msg' => $this->session->getFlashdata('msg'),
			'msg_type' => $msg_type,
			'auth_user' => $this->session->get('auth_user'),
			'nav_only' => FALSE,
			'basic_nav' => FALSE,
		);
		$this->parser->setData($dataArr);
		
	}

	public function SetMdl()
	{
		//Let's call for MDL (model) for short code in Controllers
		$namespace_call = ($this->ns_model) ? $this->ns_model : '\\App\\Models\\'.$this->module_name.'\\'.$this->module_name.'model';
		if(class_exists($namespace_call)){
			$this->mdl = new $namespace_call();
		}
	}
}
