<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller 
{
	public $csrf;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product');
		$this->load->model("ProductCategory");
		$this->csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
	}
	public function index()
	{
		$products = $this->Product->fetch_all();
		$product_categories = $this->ProductCategory->fetch_all();
		$this->load->view('admin/products', array('products'=>$products, "categories"=>$product_categories,"csrf"=>$this->csrf));
	}
	public function search()
	{
		$search_filters = $this->Product->clean_data($this->input->get());
		$this->session->set_userdata("search_filters", $search_filters);
		$products = $this->Product->search($search_filters);
		$this->session->set_userdata("products", $products);
		redirect("/");
	}
	public function add()
	{
		$$post_product = $this->Product->clean_data($this->input->post());
		$validation = $this->Product->form_validation();
		if($validation == "valid")
		{

		}
	}
}
