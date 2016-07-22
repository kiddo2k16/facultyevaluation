<?php

class Course extends CI_Model{
	

	var $id = 0;
	var $name = '';
	var $description = '';



	function __construct(){

		parent::__construct();


		$this->load->database();

	}


	public function GetAll(){


		$query = $this->db->get('course');

		$rows = array();

		foreach($query->result() as $row){

				$course = new Course();
				$course->id = $row->id;
				$course->name = $row->name;
				$course->description = $row->description;

				$rows[] = $course;
		}

		return $rows;
	}

}