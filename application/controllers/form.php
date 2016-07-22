<?php

class Form extends CI_Controller{
	

	function __construct(){

		parent::__construct();

		$this->load->helper('url');
		$this->load->library('session');
	}	


	public function index(){
		$this->output->set_template('default');
		$this->welcome();
	}

	public function welcome(){
			$this->output->set_template('default');
			$this->load->view("welcome.html");
		
	}

	public function student_form(){
		$this->output->set_template('default');
		$this->load->view("student_form.html");
	}

	public function student_form_2(){
		$this->output->set_template('default');
		$this->load->view("student_form_2.html");
	}

	
}	