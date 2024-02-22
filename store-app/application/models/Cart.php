<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Model
{
	function fetch_all()
	{
		return $this->db->query("SELECT `id`,`product_id`,`quantity`,`customer_id` FROM `carts`")->result_array();
	}
	
}
