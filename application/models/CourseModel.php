<?php

class CourseModel extends CI_Model{
	

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

				$course = new CourseModel();
				$course->id = $row->id;
				$course->name = $row->name;
				$course->description = $row->description;

				$rows[] = $course;
		}

		return $rows;
	}

	public function Save($params){

		$course = array(
					
			'name' => $params['name'],
			'description' => $params['description']
			);


		
		$this->db->insert('course',$course);
		$lastInsertedID = $this->db->insert_id();



		return $lastInsertedID;
	}

	public function delete($id){
		$this->db->delete('course', array('id' => $id)); 
		return $this->db->affected_rows();
	}

	public function update($params,$id){
		$this->db->update('course', $params, "id = $id");
		return $this->db->affected_rows();

	}

	public function find_by_id($id) {

		$this->db->where('id',$id);

   	 	$sql = $this->db->get('course');

   	 	$row = $sql->row();

   	 	if ($row->id>0){

			$course = new CourseModel();
			$course->id = $row->id;
			$course->name = $row->name;
			$course->description = $row->description;
		

			return $course;

   	 	}else {
   	 		return new CourseModel();
   	 	}
	}

}