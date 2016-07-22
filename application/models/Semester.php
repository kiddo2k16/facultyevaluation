<?php


class Semester extends CI_Model{



	var $id = 0;
	var $name = '';
	var $description = '';	



	function __construct(){


		parent::__construct();


		$this->load->database();

	}



	public function GetAll(){

					//SELECT * FROM semesters;
		$query = $this->db->get('semesters');

		$rows = array();

		foreach($query->result() as $row){

			$semester = new Semester();

			$semester->id = $row->id;
			$semester->name = $row->name;
			$semester->description = $row->description;

			$rows[] = $semester;

		}

		return $rows;

	}


}