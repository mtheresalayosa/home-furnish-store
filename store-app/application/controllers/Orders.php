<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller 
{
	public $csrf;
	public $customer;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Order');
		$this->load->model('User');
		$this->load->model('Cart');
		$this->load->model('Product');
		$this->customer = $this->User->current_user();
		$this->csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
	}
	public function index()
	{
		$orders = $this->Order->fetch_all();
		$this->load->view('admin/orders', array("orders"=>$orders));
	}
	/** This method processes the payment with Stripe and record order details */
    public function process_payment()
    {
		$post_data = $this->Order->clean_data($this->input->post());
		//get data from cart total amount to pay
		$cart_total_amount = $this->Cart->get_cart_total_amount($this->customer["id"]);
		$order_amount = ceil($cart_total_amount + 50); //add shipping fee
		$cart_items = $this->Cart->fetch_by_customer($this->customer["id"]); //get all cart items

		require_once('application/libraries/stripe-php/init.php');
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
     
        \Stripe\Charge::create ([
                "amount" => $order_amount,
                "currency" => "usd",
                "source" => $post_data["stripeToken"],
                "description" => "Dummy stripe payment." 
        ]);

		$shipping_details = array(
			"address1" => $post_data["shipping_address1"],
			"address2" => $post_data["shipping_address2"],
			"city" => $post_data["shipping_city"],
			"state" => $post_data["shipping_state"],
			"zip_code" => $post_data["shipping_zip_code"],
		);
		
		$billing_info = $shipping_details;
		if($post_data["same_billing"] !== "on")
		{
			foreach($shipping_details as $key=>$value)
			{
				$billing_info[$key] = $post_data["billing_".$key];
			}
		}

        $checkout_details = json_encode(array("shipping_details"=>$shipping_details, "billing_info"=>$billing_info));
		$order_items = array();

		//update products stocks/sold data
		foreach($cart_items as $cart)
		{
			$this->Product->update_stocks_sold($cart["quantity"], $cart["product_id"]);

			$cart_item = array("product_id"=>$cart["product_id"], "quantity"=>$cart["quantity"], "subtotal_amount"=>$cart["subtotal_amount"]);
			array_push($order_items, $cart_item);
		}

		$products_details = json_encode($order_items);
		//add cart details to order
		$order_data = array(
			"products_details" => $products_details,
			"total_amount" => $order_amount,
			"customer_id" => $this->customer["id"],
			"checkout_details" => $checkout_details
		);
		$this->Order->add($order_data);

		// delete cart_items
		foreach($cart_items as $cart)
		{
			$this->Cart->delete($cart["id"]);
		}

		$result = array("message"=>"Your order is successfully checked out!");
		return $this->Order->json_response(200, $result);
    }
}
