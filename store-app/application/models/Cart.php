<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Model
{
	function fetch_all()
	{
		return $this->db->query("SELECT `id`,`product_id`,`quantity`,`customer_id` FROM `carts`")->result_array();
	}
	function fetch_by_customer($customer_id)
	{
		$select = "SELECT products.id AS product_id, products.name, products.price, JSON_UNQUOTE(JSON_EXTRACT(products.photos,'$.main_photo')) AS main_photo, carts.* FROM products JOIN carts ON carts.product_id = products.id WHERE carts.customer_id = ? GROUP BY products.id ORDER BY carts.created_at DESC";
		return $this->db->query($select, array($customer_id))->result_array();
	}
	/** Check if product id exists in customer id cart items, then return cart id */
	function get_product_cart_id($customer_id, $product_id)
	{
		$query = "SELECT `id`, `quantity`, `subtotal_amount` FROM `carts` WHERE customer_id = ? AND product_id = ?";
		return $this->db->query($query, array($customer_id, $product_id))->row_array();
	}
	/** Returns total count per product by customer_id */
	function count_cart($customer_id)
	{
		return $this->db->query("SELECT COUNT(DISTINCT product_id) as cart_count FROM `carts` WHERE customer_id = ?", array($customer_id))->row_array();
	}
	/** Get total amount of all cart items by customer_id */
	function get_cart_total_amount($customer_id)
	{
		$query = "SELECT SUM(subtotal_amount) as total_amount FROM `carts` WHERE customer_id = ?";
		$result = $this->db->query($query, array($customer_id))->row_array();
		if(empty($result))
		{
			return 0;
		}
		return $result["total_amount"];
	}
	/** Update cart data if product already exists in customer's cart, ELSE, add item to customers' cart
	 * NOTE: use for single item only
	 * Parameter:
	 * 	- $data: array()
	 * 		- value: array(
	 * 				"customer_id"=>"",
	 * 				"product_id"=>"",
	 * 				"update_data"=> array(
	 * 					"quantity"=>"",
	 * 					"subtotal_amount"=>""
	 * 				) //data for update
	 * 			)
	 * 
	*/
	function update_cart_item($data)
	{

		$cart_item = $this->get_product_cart_id($data["customer_id"], $data["product_id"]);
		if(!empty($cart_item))
		{
			$quantity = $cart_item["quantity"] + $data["update_data"]["quantity"];
			$subtotal_amount = $cart_item["subtotal_amount"] + $data["update_data"]["subtotal_amount"];
			$update_data = array("quantity"=>$quantity, "subtotal_amount"=>$subtotal_amount);

			$this->update($update_data, $cart_item["id"]);
		}
		else {
			$add_data = array_slice($data, 0, 2);
			$add_data["quantity"] = $data["update_data"]["quantity"];
			$add_data["subtotal_amount"] = $data["update_data"]["subtotal_amount"];
			$this->add($add_data);
		}
	}
	/* Add cart item */
	function add($cart)
	{
		$query = "INSERT INTO carts (`customer_id`, `product_id`, `quantity`, `subtotal_amount`) VALUES (?,?,?,?)";
		$values = array($cart["customer_id"], $cart["product_id"], $cart["quantity"], $cart["subtotal_amount"]);
		return $this->db->query($query, $values);
	}
	/** Update cart data */
	function update($data, $cart_id)
	{
		$data = $this->clean_data($data);
		$values = array();
		$fields = array();
		//e.g. $data = array("quantity"=>2);
		foreach($data as $key=>$val)
		{
			$fields[$key] = "val";
			array_push($values, $val);
		}

		//build set column_name = ? (with comma(,) to separate pairs)
		$str_replace_val = str_replace("val", "?", http_build_query($fields));
		$str_fields = str_replace("&", ",", $str_replace_val);
		
		array_push($values, $cart_id);
		$query = "UPDATE `carts` SET $str_fields WHERE id = ?";
		return $this->db->query($query, $values);
	}
	function delete($cart_id)
	{
		return $this->db->query("DELETE FROM `carts` WHERE `id` = ?", array($cart_id));
	}
	/* Cleans data thru XSS filtering */
	function clean_data($data)
	{
		return $this->security->xss_clean($data);
	}
	function json_response($status_code, $response)
	{
		return $this->output
			->set_content_type('application/json')
			->set_status_header($status_code)
			->set_output(json_encode($response));
	}
}
