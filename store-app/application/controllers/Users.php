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
        if(!$this->User->is_loggedin()) { 
			$this->load->view('users/login', array("csrf"=>$this->csrf, "message"=>$this->session->flashdata("message")));
		}
		else {
			redirect("/");
		}
	}
	public function process_login()
	{
		$login_post = $this->User->clean_data($this->input->post());
		$validation = $this->User->signin_validation();
		if($validation == "valid")
		{
			$user = $this->User->search(array("email"=>$login_post["email"]), "=")[0];
			$validate_user = $this->User->validate_credential($user, $login_post);
			if($validate_user == "valid") {
				$this->session->set_userdata("user", $user);
				$this->is_admin();
			}
			else {
				$this->session->set_flashdata("message", $validate_user);
			}
		}
		else {
			$this->session->set_flashdata("message", $validation);
		}
		redirect("login");
	}
	/* This method is called when user register as new member. */
	public function signup()
	{
        if(!$this->User->is_loggedin()) { 
			$this->load->view('users/signup', array("csrf"=>$this->csrf, "message"=>$this->session->flashdata("message")));
        } 
        else {
            redirect("login");
        }
	}
	public function process_signup()
	{
		$user_post = $this->User->clean_data($this->input->post());
		$validation = $this->User->signup_validation();
		if($validation == "valid") {
			$user_post['salt'] = bin2hex(openssl_random_pseudo_bytes(22));
			$user_post['password'] = md5($user_post["password"] . "" . $user_post['salt']);
			
			$this->User->add($user_post);
			$this->session->set_flashdata("message", "Successfully registered!");
			redirect("login");
		}
		else {
			$this->session->set_flashdata("message", $validation);
		}
		redirect("signup");
	}
	/* Log out the user from app and destroy user session */
    public function logout() 
    {
        $this->session->sess_destroy();
        redirect("login");   
    }
	public function is_admin()
	{
		if($this->User->is_admin()) {
			redirect("orders");
		}
		else {
			redirect("/");
		}
	}
}
