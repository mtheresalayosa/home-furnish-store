<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carts extends CI_Controller 
{
	public $csrf;
	public $customer;
	public $cart_count;
	public $subtotal_amount;
	public $user_name;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cart');
		$this->load->model("User");
		$this->customer = $this->User->current_user();
		if(isset($this->customer))
		{
			$this->cart_count = $this->Cart->count_cart($this->customer["id"])["cart_count"];
			$this->subtotal_amount = $this->Cart->get_cart_total_amount($this->customer["id"]);
			$this->user_name = $this->customer["first_name"];
		}
		else {
			$this->cart_count = 0;
			$this->subtotal_amount = 0;
			$this->user_name = "";
		}
		$this->csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
	}
	public function index()
	{
		$this->load->view('admin/orders');
	}
	public function get_cart()
	{
		$carts = array();
		$subtotal_amount = 0;
		if(isset($this->customer))
		{
			$carts = $this->Cart->fetch_by_customer($this->customer["id"]);
		}

		$this->load->view('templates/header', array("is_loggedin"=>$this->User->is_loggedin(), "cart_count"=>$this->cart_count, "user"=>$this->user_name));
		$this->load->view('customer/shops/cart', array("carts"=>$carts, "cart_count"=>$this->cart_count, "subtotal_amount"=>$this->subtotal_amount, "csrf"=>$this->csrf, "stripe_key"=>$this->config->item('stripe_key')));
	}
	public function add()
	{
		$cart = $this->Cart->clean_data($this->input->post());
		$data = array(
			"customer_id"=>$this->customer["id"],
			"product_id"=>$cart["product_id"],
			"update_data"=> array(
				"quantity"=>$cart["quantity"],
				"subtotal_amount"=>$cart["subtotal_amount"]
			)
		);

		$this->Cart->update_cart_item($data);
		$result = array("message"=>"Item is added to cart.");
		return $this->Cart->json_response(200, $result);
	}
	public function update()
	{
		$this->Cart->update($this->input->post());
		$result = array("message"=>"Item updated.");
		return $this->Cart->json_response(200, $result);
	}
	public function delete($id)
	{
		$this->Cart->delete($id);
		$result = array("message"=>"Item deleted.");
		$carts = $this->Cart->fetch_by_customer($this->customer["id"]);
		
		$this->load->view('templates/header', array("is_loggedin"=>$this->User->is_loggedin(), "cart_count"=>$this->cart_count));
		$this->load->view('customer/shops/cart', array("carts"=>$carts, "cart_count"=>$this->cart_count, "subtotal_amount"=>$this->subtotal_amount, "csrf"=>$this->csrf, "stripe_key"=>$this->config->item('stripe_key')));
	}
}
