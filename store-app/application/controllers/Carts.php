<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carts extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cart');
	}
	public function index()
	{
		$this->load->view('admin/orders');
	}
}