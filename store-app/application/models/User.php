<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model
{
	/* Validates form during user signs up */
	function signup_validation()
	{
		$this->form_validation->set_rules('first_name','First Name','trim|required');
		$this->form_validation->set_rules('last_name','Last Name','trim|required');
		$this->form_validation->set_rules('email','Email Address','trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_rules('confirm_password','Confirm Password','trim|required|matches[password]');

		if($this->form_validation->run())
		{
			return "valid";
		}
		else {
			return $validation_errors();
		}
	}
	/* Validate user details during login */
	function signin_validation()
	{
		$this->form_validation->set_rules('email','Email Address','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required');

		if($this->form_validation->run())
		{
			return "valid";
		}
		else {
			return $validation_errors();
		}
	}
	/* Validates user credentials if exists and valid */
	function validate_credential($user, $details)
	{
		if(!empty($user))
		{
			$encrypted_password = md5($details["password"] ."". $user["salt"]);
			if($details["password"] !== $encrypted_password)
			{
				return "Invalid login credentials.";
			}
			return "valid";
		}
		else {
			return "This email is not yet registered";
		}
	}
	/* Fetch user details by user id */
	function fetch_by_id($user_id)
	{
		return $this->db->query("SELECT * FROM `users` WHERE id = ?", $user_id)->row_array();
	}
	/* Fetch all users and their details */
	function fetch_all()
	{
		return $this->db->query("SELECT * FROM `users`")->result_array();
	}
	/* Search users table depending on the values set in parameter.
	Parameters:
		- $user: array() //array of objects for specific search of fields and values
			- e.g. array("email"=>"user_email@email.com")
		- $operator1: string // operator to use in binding the values to the column name (field name)
			- e.g. LIKE, =
		- $operator2: string (optional) //second operator to use in binding the previous condition with next condition
			-	e.g. AND, OR, NOT
	Return:
		array()
	*/
	function search($user, $operator1, $operator2)
	{
		$values = array();
		$fields = "";
		$counter = 0;
		
		foreach($user as $key=>$val)
		{
			$counter++;
			// e.g. column_name LIKE ?
			$fields .= "$key $operator1 ? ";
			if(!empty($operator2) && $counter < count($user))
			{
				// e.g. AND, OR, NOT 
				$fields .= "$operator2 ";
			}
			array_push($values, $val);
		}

		return $this->db->query("SELECT * FROM users WHERE $fields", $values)->result_array();
	}
	/* Create new row in users table */
	function add()
	{
		$query = "INSERT INTO users (`first_name`, `last_name`, `email`, `password`, `salt`) VALUES (?,?,?,?,?)";
		$values = array($user["first_name"], $user["last_name"], $user["email"], $user["password"], $user["salt"]);
		return $this->db->query($query, $values);
	}
	/* Cleans data thru XSS filtering */
	function clean_data($data)
	{
		return $this->security->xss_clean($data);
	}
}
