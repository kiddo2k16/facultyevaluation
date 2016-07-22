<?php

class PermissionDenied extends CI_Controller{



	function __construct(){

		parent::__construct();

		$this->load->helper('url');
		$this->load->library('session');
	}	

	public function index(){


		$this->output->set_template('default');
		$this->load->view('permissiondenied.html');

	}

}