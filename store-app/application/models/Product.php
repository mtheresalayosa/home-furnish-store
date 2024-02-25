<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model
{
	public $sort_options;

	function __construct()
	{
		parent::__construct();
		
		$this->sort_options = array("Newest", "Price: Low To High", "Price: High To Low", "Product Name: (A-Z)", "Product Name: (Z-A)");
	}
	function form_validation()
	{
		$this->form_validation->set_rules('name','Product Name','trim|required');
		$this->form_validation->set_rules('description','Description','trim|required');
		$this->form_validation->set_rules('category_id','Category','trim|required');
		$this->form_validation->set_rules('price','Price','trim|required|decimal');
		$this->form_validation->set_rules('stocks','Stocks','trim|required|numeric');

		if($this->form_validation->run())
		{
			return "valid";
		}
		else {
			return $validation_errors();
		}
	}
	function fetch_all()
	{
		return $this->db->query("SELECT * FROM products")->result_array();
	}
	function fetch_by_id($id)
	{
		$select = "*, JSON_UNQUOTE(JSON_EXTRACT(`photos`,'$.main_photo')) AS main_photo, JSON_UNQUOTE(JSON_EXTRACT(`photos`,'$.other_photos[0]')) AS photo_1, JSON_UNQUOTE(JSON_EXTRACT(`photos`,'$.other_photos[1]')) AS photo_2, JSON_UNQUOTE(JSON_EXTRACT(`photos`,'$.other_photos[2]')) AS photo_3";
		return $this->db->query("SELECT $select FROM products WHERE id = ?", $id)->row_array();
	}
	function fetch_by_category($category_id)
	{
		$select = "*, JSON_UNQUOTE(JSON_EXTRACT(`photos`,'$.main_photo')) AS main_photo, JSON_UNQUOTE(JSON_EXTRACT(`photos`,'$.other_photos[0]')) AS photo_1, JSON_UNQUOTE(JSON_EXTRACT(`photos`,'$.other_photos[1]')) AS photo_2, JSON_UNQUOTE(JSON_EXTRACT(`photos`,'$.other_photos[2]')) AS photo_3";
		return $this->db->query("SELECT $select FROM products WHERE category_id = ?", $id)->row_array();
	}
	function add($product)
	{
		$query = "INSERT INTO products (`name`, `description`, `price`, `stocks`, `category_id`, `photos`) VALUES (?,?,?,?,?,?)";
		$values = array($product["first_name"], $product["last_name"], $product["email"], $product["password"], $product["salt"], $product["product_level"]);
		return $this->db->query($query, $values);
	}
	function update($data, $product_id)
	{
		$values = array();
		$fields = array();
		//e.g. $data = array("stocks"=>2);
		foreach($data as $key=>$val)
		{
			$fields[$key] = "val";
			array_push($values, $val);
		}

		//build set column_name = ? (with comma(,) to separate pairs)
		$str_replace_val = str_replace("val", "?", http_build_query($fields));
		$str_fields = str_replace("&", ",", $str_replace_val);
		
		array_push($values, $product_id);
		$query = "UPDATE `products` SET $str_fields WHERE id = ?";
		return $this->db->query($query, $values);
	}
	function search($filters)
	{
		$options = $this->filter_options($filters);
		
		$query = "SELECT *, JSON_UNQUOTE(JSON_EXTRACT(`photos`,'$.main_photo')) AS photo from products ".$options[0].$options[1];
		return $this->db->query($query, $options[2])->result_array();
	}

	function filter_options($filters)
	{
		$order_by = "ORDER BY ";
		$where = "WHERE 1 ";
		$query_values = array();
		if(isset($filters['sort_options']))
		{
			switch ($filters['sort_options']) {
				case '0':
					$order_by .= "created_at DESC ";
					break;
				case '1':
					$order_by .= "price ASC ";
					break;
				case '2':
					$order_by .= "price DESC ";
					break;
				case '3':
					$order_by .= "name ASC ";
					break;
				case '4':
					$order_by .= "name DESC ";
					break;
				
				default:
					$order_by .= "created_at DESC ";
					break;
			}
		}
		else {
			$order_by .= "created_at DESC ";
		}

		if(isset($filters['category']) && !empty($filters['category']))
		{
			$where .= "AND category_id IN ? ";
			array_push($query_values, $filters["category"]);
		}
		if(isset($filters['search_term']))
		{
			if(!empty($filters['search_term']))
			{
				$where .= "AND name LIKE '%?%' ";
				array_push($query_values, $filters['search_term']);
			}
		}

		return array($where, $order_by, $query_values);
	}
	/** This method computes and update product stocks and unit sold value if the product id exists. */
	public function update_stocks_sold($quantity, $product_id)
	{
		$product = $this->fetch_by_id($product_id);
		if(!empty($product))
		{
			$stocks = $product["stocks"] - $quantity;
			$sold = $product["unit_sold"] + $quantity;

			$query = "UPDATE `products` SET `stocks`= ?, `unit_sold`= ? WHERE id = ?";
			return $this->db->query($query, array($stocks, $sold, $product_id));
		}
	}
	/** Filters data from XSS */
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
