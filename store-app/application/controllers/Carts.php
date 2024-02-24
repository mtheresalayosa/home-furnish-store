<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carts extends CI_Controller 
{
	public $customer;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cart');
		$this->load->model("User");
		$this->customer = $this->User->current_user();
	}
	public function index()
	{
		$this->load->view('admin/orders');
	}
	public function get_cart()
	{
		$cart_count = $this->Cart->count_cart($this->customer["id"]);
		$carts = $this->Cart->fetch_by_customer($this->customer["id"]);
		
		$this->load->view('templates/header', array("is_loggedin"=>$this->User->is_loggedin(), "cart_count"=>$cart_count["cart_count"]));
		$this->load->view('customer/shops/cart', array("carts"=>$carts));
	}
	public function add()
	{
		$cart = $this->Cart->clean_data($this->input->post());
		$cart["customer_id"] = $this->customer["id"];

		$this->Cart->add($cart);
		$result = array("message"=>"Item is added to cart.");
		return $this->json_response(200, $result);
	}
	public function update()
	{
		$this->Cart->update($this->input->post());
		$result = array("message"=>"Item updated.");
		return $this->json_response(200, $result);
	}
	public function delete()
	{
		$this->Cart->delete($data);
		$result = array("message"=>"Item deleted.");
		return $this->json_response(200, $result);
	}
	private function json_response($status_code, $response)
	{
		return $this->output
			->set_content_type('application/json')
			->set_status_header($status_code)
			->set_output(json_encode($response));
	}
}
