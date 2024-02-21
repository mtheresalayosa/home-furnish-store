<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model
{
	function fetch_all()
	{
		return $this->db->query("SELECT * FROM `users`")->result_array();
	}
	
}
