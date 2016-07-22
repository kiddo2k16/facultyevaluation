<?php

class semester extends Security{
	

	function __construct(){

		parent::__construct();

		$this->load->helper('url');
		$this->load->library('session');
	}	


	public function index(){



		$this->load->Model('SemesterModel');


		$data = array(
				'semesters' =>$this->SemesterModel->GetAll()
			);

		$this->load->view('semester.html',$data);


	}
}