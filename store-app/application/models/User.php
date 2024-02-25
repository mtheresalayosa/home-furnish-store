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
			return validation_errors();
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
			return validation_errors();
		}
	}
	/* Validates user credentials if exists and valid */
	function validate_credential($user, $details)
	{
		if(count($user) > 0)
		{
			$encrypted_password = md5($details["password"] ."". $user["salt"]);
			if($user["password"] !== $encrypted_password)
			{
				return "<p>Invalid login credentials.</p>";
			}
			return "valid";
		}
		else {
			return "<p>This email is not yet registered.</p>";
		}
	}
	/* Fetch user details by user id */
	function fetch_by_id($user_id)
	{
		return $this->db->query("SELECT `id`, `first_name`, `last_name`, `user_level` FROM `users` WHERE id = ?", $user_id)->row_array();
	}
	/* Fetch all users and their details */
	function fetch_all()
	{
		return $this->db->query("SELECT `id`, `first_name`, `last_name`, `user_level` FROM `users`")->result_array();
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
	function search($user, $operator1, $operator2 = null)
	{
		$values = array();
		$fields = "";
		$counter = 0;
		
		foreach($user as $key=>$val)
		{
			$counter++;
			// e.g. column_name LIKE ?
			$fields .= "$key $operator1 ? ";
			if($operator2 && $counter < count($user))
			{
				// e.g. AND, OR, NOT 
				$fields .= "$operator2 ";
			}
			array_push($values, $val);
		}

		return $this->db->query("SELECT * FROM users WHERE $fields", $values)->result_array();
	}
	/* Create new row in users table */
	function add($user)
	{
		if(count($this->fetch_all()) == 0)
		{
			$user["user_level"] = 5; //set to superadmin
		}
		else {
			$user["user_level"] = 1; //set to ordinary user
		}

		$query = "INSERT INTO users (`first_name`, `last_name`, `email`, `password`, `salt`, `user_level`) VALUES (?,?,?,?,?,?)";
		$values = array($user["first_name"], $user["last_name"], $user["email"], $user["password"], $user["salt"], $user["user_level"]);
		return $this->db->query($query, $values);
	}
	/* Cleans data thru XSS filtering */
	function clean_data($data)
	{
		return $this->security->xss_clean($data);
	}
	/* Check if user is admin */
	function is_admin()
	{
		$current_user = $this->current_user();
		if($current_user && $current_user["user_level"] == '5')
		{
			return true;
		} 
		else {
			return false;
		}
	}
	/* Check if user is logged in */
	function is_loggedin()
	{
		$current_user = $this->current_user();
		if($current_user)
		{
			return true;
		} 
		else {
			return false;
		}
	}
	function current_user()
	{
		if($this->session->has_userdata("user"))
		{
			return $this->session->userdata("user");
		}
		if($this->session->has_userdata("session_user"))
		{
			return $this->session->userdata("session_user");
		}
	}
}
