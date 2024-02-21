<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller 
{
	public function login()
	{
		$this->load->view('users/login');
	}
	public function signup()
	{
		$this->load->view('users/signup');
	}
}
