<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Model
{
	function fetch_all()
	{
		return $this->db->query("SELECT `id`,`details`,`total_amount`,`customer_id`,`status` FROM `orders`")->result_array();
	}
	
}
