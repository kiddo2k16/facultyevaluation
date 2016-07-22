<?php

class Logout extends CI_Controller{
	
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->library('session');
		$this->load->helper('url');
	}
	
	public function index()
	{
		
		$this->session->unset_userdata('loggedIn');
		
		$this->session->sess_destroy();
		
		redirect('login');
		
	}

}