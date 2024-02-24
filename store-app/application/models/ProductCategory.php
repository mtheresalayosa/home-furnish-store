<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductCategory extends CI_Model
{
	function form_validation()
	{
		$this->form_validation->set_rules('name','Name','required');

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
		return $this->db->query("SELECT `id`,`name`,`parent_id` FROM product_categories ORDER BY name")->result_array();
	}
}
