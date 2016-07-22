<?php


class SemesterModel extends CI_Model{



	var $id = 0;
	var $name = '';
	var $description = '';	
	var $iscurrent = '';



	function __construct(){


		parent::__construct();


		$this->load->database();

	}


	public function GetCurrent(){


		$this->db->where('isCurrent',1);

   	 	$sql = $this->db->get('semesters');

   	 	$row = $sql->row();

   	 	if ($row->id>0){

			$semester = new SemesterModel();
			$semester->id = $row->id;
			$semester->name = $row->name;
			$semester->description = $row->description;
		

			return $semester;

   	 	}else {
   	 		return new SubjectModel();
   	 	}
	
	}


	public function GetAll(){

					//SELECT * FROM semesters;
		$query = $this->db->get('semesters');

		$rows = array();

		foreach($query->result() as $row){

			$semester = new SemesterModel();

			$semester->id = $row->id;
			$semester->name = $row->name;
			$semester->description = $row->description;
			//$semester->iscurrent = $row->iscurrent;
//heheheheh ok na?yupx. ehehe tnx xD
			$rows[] = $semester;

		}

		return $rows;

	}


}