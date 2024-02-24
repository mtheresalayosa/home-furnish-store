<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shops extends CI_Controller 
{
	public $csrf;
	public function __construct()
	{
		parent::__construct();
		$this->load->model("User");
		$this->load->model("Product");
		$this->load->model("ProductCategory");
		$this->csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
	}
	public function index()
	{
		$search_filters = array('sort_options'=>'0');
		$product_categories = $this->ProductCategory->fetch_all();
		$sort_options = $this->Product->sort_options;

		if($this->session->has_userdata("products") && $this->session->has_userdata("search_filters"))
		{
			$products = $this->session->userdata("products");
			$search_filters = $this->session->userdata("search_filters");
		}
		
		$products = $this->Product->search($search_filters);
		$this->load->view('templates/header', array("is_loggedin"=>$this->User->is_loggedin()));
		$this->load->view('customer/shops/catalogue', array("products"=>$products, "product_categories"=>$product_categories, "sort_options"=>$sort_options, "search_filters"=>$search_filters));
	}
	public function product_view($id)
	{
		$product = $this->Product->fetch_by_id($id);
		$this->load->view('templates/header', array("is_loggedin"=>$this->User->is_loggedin()));
		$this->load->view('customer/shops/product_view', array("product"=>$product, "csrf"=>$this->csrf));
	}
}
