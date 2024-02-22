<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shops extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Shop');
	}
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('customer/shops/catalogue');
	}
	public function show_cart()
	{
		$this->load->view('templates/header');
		$this->load->view('customer/shops/cart');
	}
	public function product_view()
	{
		$this->load->view('templates/header');
		$this->load->view('customer/shops/product_view');
	}
}
