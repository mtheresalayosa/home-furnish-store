<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Order');
	}
	public function index()
	{
		$this->load->view('admin/orders');
	}
	
}
