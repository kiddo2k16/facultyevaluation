<?php

class Proctor extends CI_Model{
	
	var $id = 0;
	var $firstName =  '';
	var $middleName = '';
	var $lastName = '';



	function __construct(){


		parent::__construct();


		$this->load->database();


	}



	public function GetAll(){


		$query = $this->db->get('proctors');

		$rows = array();


		foreach($query->result() as $row){

			$proctor = new Proctor();

			$proctor->id = $row->id;
			$proctor->firstName = $row->firstName;
			$proctor->middleName = $row->middleName;
			$proctor->lastName = $row->lastName;

			$rows[] = $proctor;

		}

		return $rows;
	}

}