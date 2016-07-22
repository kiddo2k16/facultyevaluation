<?php

class SectionModel extends CI_Model{
	

	var $id = 0;
	var $name = '';
	var $description = '';



	function __construct(){

		parent::__construct();


		$this->load->database();

	}


	public function GetAll(){


		$query = $this->db->get('sections');

		$rows = array();

		foreach($query->result() as $row){

				$sections = new SectionModel();
				$sections->id = $row->id;
				$sections->name = $row->name;
				$sections->description = $row->description;

				$rows[] = $sections;
		}

		return $rows;
	}

	public function Save($params){

		$sections = array(
					
			'name' => $params['name'],
			'description' => $params['description']
			);


		
		$this->db->insert('sections',$sections);
		$lastInsertedID = $this->db->insert_id();



		return $lastInsertedID;
	}

	public function delete($id){
		$this->db->delete('sections', array('id' => $id)); 
		return $this->db->affected_rows();
	}

	public function update($params,$id){
		$this->db->update('sections', $params, "id = $id");
		return $this->db->affected_rows();

	}

	public function find_by_id($id) {

		$this->db->where('id',$id);

   	 	$sql = $this->db->get('sections');

   	 	$row = $sql->row();

   	 	if ($row->id>0){

			$sections = new SectionModel();
			$sections->id = $row->id;
			$sections->name = $row->name;
			$sections->description = $row->description;
		

			return $sections;

   	 	}else {
   	 		return new SectionModel();
   	 	}
	}

}