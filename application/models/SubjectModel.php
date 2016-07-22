<?php

class SubjectModel extends CI_Model{
	

	var $id = 0;
	var $name = '';
	var $description = '';



	function __construct(){

		parent::__construct();


		$this->load->database();

	}


	public function GetAll(){


		$query = $this->db->get('subjects');

		$rows = array();

		foreach($query->result() as $row){

				$subjects = new SubjectModel();
				$subjects->id = $row->id;
				$subjects->name = $row->name;
				$subjects->description = $row->description;

				$rows[] = $subjects;
		}

		return $rows;
	}

	public function Save($params){

		$subjects = array(
					
			'name' => $params['name'],
			'description' => $params['description']
			);


		
		$this->db->insert('subjects',$subjects);
		$lastInsertedID = $this->db->insert_id();



		return $lastInsertedID;
	}

	public function delete($id){
		$this->db->delete('subjects', array('id' => $id)); 
		return $this->db->affected_rows();
	}

	public function update($params,$id){
		$this->db->update('subjects', $params, "id = $id");
		return $this->db->affected_rows();

	}

	public function find_by_id($id) {

		$this->db->where('id',$id);

   	 	$sql = $this->db->get('subjects');

   	 	$row = $sql->row();

   	 	if ($row){

			$subjects = new SubjectModel();
			$subjects->id = $row->id;
			$subjects->name = $row->name;
			$subjects->description = $row->description;
		

			return $subjects;

   	 	}else {
   	 		return new SubjectModel();
   	 	}
	}

}