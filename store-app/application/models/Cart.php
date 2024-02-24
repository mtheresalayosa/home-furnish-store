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
		$select = "SELECT products.name, products.price, JSON_UNQUOTE(JSON_EXTRACT(products.photos,'$.main_photo')) AS main_photo, carts.* FROM products JOIN carts ON carts.product_id = products.id WHERE carts.customer_id = ? GROUP BY products.id ORDER BY carts.created_at DESC";
		return $this->db->query($select, array($customer_id))->result_array();
	}
	function count_cart($customer_id)
	{
		return $this->db->query("SELECT COUNT(DISTINCT product_id) as cart_count FROM `carts` WHERE customer_id = ?", array($customer_id))->row_array();
	}
	function add($cart)
	{
		$query = "INSERT INTO carts (`customer_id`, `product_id`, `quantity`, `subtotal_amount`) VALUES (?,?,?,?)";
		$values = array($cart["customer_id"], $cart["product_id"], $cart["quantity"], $cart["subtotal_amount"]);
		return $this->db->query($query, $values);
	}
	function update($data)
	{
		$data = $this->clean_data($data);
		$cart_id = $data["cart_id"];
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
	function delete($data)
	{
		$data = $this->clean_data($data);
		$cart_id = $data["cart_id"];
		return $this->db->query("DELETE FROM `carts` WHERE `id` = ?", array($cart_id));
	}
	/* Cleans data thru XSS filtering */
	function clean_data($data)
	{
		return $this->security->xss_clean($data);
	}
}
