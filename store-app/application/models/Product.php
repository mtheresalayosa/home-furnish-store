<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model
{
	function form_validation()
	{
		$this->load->form_validation();
		$this->form_validation->set_rules('name','Product Name','required');
		$this->form_validation->set_rules('description','Description','required');
		$this->form_validation->set_rules('category_id','Category','required');
		$this->form_validation->set_rules('price','Price','required');
		$this->form_validation->set_rules('stocks','Stocks','required');

		if($this->form_validation->run())
		{
			return "valid";
		}
		else
		{
			return $validation_errors();
		}
	}
	function fetch_all()
	{
		return $this->db->query("SELECT `id`,`name`,`description`,`category_id`,`price`,`is_active`,`photos` FROM products")->result_array();
	}
	function clean_data($data)
	{
		return $this->security->xss_clean($data, TRUE);
	}
	
}
