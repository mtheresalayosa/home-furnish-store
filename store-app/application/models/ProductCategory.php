<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductCategory extends CI_Model
{
	function fetch_all()
	{
		return $this->db->query("SELECT * FROM product_categories")->result_array();
	}
	
}
