<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Model
{
	function fetch_all()
	{
		return $this->db->query("SELECT `orders`.*, CONCAT(users.first_name,' ',users.last_name) AS receiver_name, CONCAT(JSON_UNQUOTE(JSON_EXTRACT(`checkout_details`,'$.shipping_details.address1')), ',', JSON_UNQUOTE(JSON_EXTRACT(`checkout_details`,'$.shipping_details.address2')), ',', JSON_UNQUOTE(JSON_EXTRACT(`checkout_details`,'$.shipping_details.city')), ',', JSON_UNQUOTE(JSON_EXTRACT(`checkout_details`,'$.shipping_details.state')), ',', JSON_UNQUOTE(JSON_EXTRACT(`checkout_details`,'$.shipping_details.zip_code'))) AS receiver_address FROM `orders` JOIN users ON orders.customer_id = users.id")->result_array();
	}
	function add($order)
	{
		$query = "INSERT INTO `orders`(`products_details`, `total_amount`, `customer_id`, `checkout_details`) VALUES (?,?,?,?)";
		$values = array($order["products_details"], $order["total_amount"], $order["customer_id"], $order["checkout_details"]);
		return $this->db->query($query, $values);
	}
	function clean_data($data)
	{
		return $this->security->xss_clean($data, TRUE);
	}
	function json_response($status_code, $response)
	{
		return $this->output
			->set_content_type('application/json')
			->set_status_header($status_code)
			->set_output(json_encode($response));
	}
}
