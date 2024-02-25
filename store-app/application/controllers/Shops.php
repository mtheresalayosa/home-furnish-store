<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shops extends CI_Controller 
{
	public $csrf;
	public $customer;
	public $cart_count;
	public $user_name;

	public function __construct()
	{
		parent::__construct();
		$this->load->model("User");
		$this->load->model("Product");
		$this->load->model("ProductCategory");
		$this->load->model("Cart");
		$this->customer = $this->User->current_user();
		$this->csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		if(isset($this->customer))
		{
			$this->cart_count = $this->Cart->count_cart($this->customer["id"])["cart_count"];
			$this->user_name = $this->customer["first_name"];
		}
		else {
			$this->cart_count = 0;
			$this->user_name = "";
		}
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
		$this->load->view('templates/header', array("is_loggedin"=>$this->User->is_loggedin(), "cart_count"=>$this->cart_count, "user"=>$this->user_name));
		$this->load->view('customer/shops/catalogue', array("products"=>$products, "product_categories"=>$product_categories, "sort_options"=>$sort_options, "search_filters"=>$search_filters));
	}
	public function product_view($id)
	{
		$product = $this->Product->fetch_by_id($id);
		$this->load->view('templates/header', array("is_loggedin"=>$this->User->is_loggedin(), "cart_count"=>$this->cart_count, "user"=>$this->user_name));
		$this->load->view('customer/shops/product_view', array("product"=>$product, "csrf"=>$this->csrf));
	}
}
