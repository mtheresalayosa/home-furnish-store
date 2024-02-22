<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller 
{
	public $csrf;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');
		$this->csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
	}
	/* This method is called whenever user try to log in. 
	This also validates user credential if it exists and/or is valid. */
	public function login()
	{
		$login_post = $this->User->clean_data($this->input->post());
		$validation = $this->User->form_validation();
		if($validation == "valid")
		{
			$user = $this->search(array("email"=>$login_post["email"]), "=");
			$validate_user = $this->User->validate_credential($user, $login_post);
			if($validate_user == "valid")
			{
				$this->session->set_userdata("user", $user);
				redirect('/');
			}
			else {
				$this->session->set_flashdata("message", $validate_user);
			}
		}
		else {
			$this->session->set_flashdata("message", $validation);
		}

		$this->load->view('users/login', array("csrf"=>$this->csrf, "message"=>$this->session->flashdata("message")));
	}
	/* This method is called during user register as new user. */
	public function signup()
	{
		$user_post = $this->User->clean_data($this->input->post());
		$validation = $this->User->signup_validation();
		if($validation == "valid")
		{
			$user_post['salt'] = bin2hex(openssl_random_pseudo_bytes(22));
			$user_post['password'] = md5($user_post["password"] . "" . $salt);
			
			$this->User->add($user_post);
			$this->session->set_flashdata("message", "Successfully registered!");
		}
		else {
			$this->session->set_flashdata("message", $validation);
		}
		$this->load->view('users/signup', array("csrf"=>$this->csrf, "message"=>$this->session->flashdata("message")));
	}
	/* Log out the user from app and destroy user session */
    public function logout() 
    {
        $this->session->sess_destroy();
        redirect("/");   
    }
}
