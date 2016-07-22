<?php

class ProctorModel extends CI_Model{
	

	var $id = 0;
	var $firstName = '';
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
			
			$proctor = new ProctorModel();
			$proctor->id = $row->id;
			$proctor->firstName = $row->firstName;
			$proctor->middleName = $row->middleName;
			$proctor->lastName = $row->lastName;
			
			
			$rows[] = $proctor;
		}


		return $rows;
	}




	public function Save($params){


		$proctor = array(
							//_POST['firstName']
			'firstName' => $params['firstName'],
			'middleName' => $params['middleName'],
			'lastName' => $params['lastName'],
		
			);


		
		$this->db->insert('proctors',$proctor);
		//INSERT INTO(id) values ('0')

		$lastInsertedID = $this->db->insert_id();



		return $lastInsertedID;

	}
	public function delete($id){
		$this->db->delete('proctors', array('id' => $id)); 
		return $this->db->affected_rows();
	}


	public function update($params,$id){
		$this->db->update('proctors', $params, "id = $id");
		return $this->db->affected_rows();

	}

	public function find_by_id($id) {

		$this->db->where('id',$id);

   	 	$sql = $this->db->get('proctors');

   	 	$row = $sql->row();

   	 	if ($row->id>0){

			$proctor = new ProctorModel();
			$proctor->id = $row->id;
			$proctor->firstName = $row->firstName;
			$proctor->middleName = $row->middleName;
			$proctor->lastName = $row->lastName;
			

			return $proctor;

   	 	}else {
   	 		return new ProctorModel();
   	 	}
	}

}