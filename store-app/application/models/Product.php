<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model
{
	function fetch_all()
	{
		return $this->db->query("SELECT `id`,`name`,`description`,`category_id`,`price`,`is_active`,`photos` FROM products")->result_array();
	}
	
}
