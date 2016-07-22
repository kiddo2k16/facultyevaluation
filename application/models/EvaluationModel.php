<?php



class EvaluationModel extends CI_Model{



	var $id = 0;
	var $type = 'Student';
	var $date;
	var $proctor;
	var $course;
	var $evaluatedBy;
	var $profScore;
	var $instrucScore;


	function __construct(){


		parent::__construct();

		$this->load->database();
	}



	public function SaveProfAnswer($id,$answer,$number){


			$data = array('evaluation_id'=>$id);


			if($answer == 1) $data['choice_1'] = 1;	

			if($answer == 2) $data['choice_2'] = 2;	
			if($answer == 3) $data['choice_3'] = 3;	
			if($answer == 4) $data['choice_4'] = 4;	


			$data['num'] = $number;

			$this->db->insert('professional_answer',$data);
	}


	public function SaveInstructAnswert($id,$answer,$number){


			$data = array('evaluation_id'=>$id);


			if($answer == 1) $data['choice_1'] = 1;	

			if($answer == 2) $data['choice_2'] = 2;	
			if($answer == 3) $data['choice_3'] = 3;	
			if($answer == 4) $data['choice_4'] = 4;

			$data['num'] = $number;	

			$this->db->insert('instructional_answer',$data);

	}


	public function Save($params){



		$this->db->insert('evaluation',$params);
		//INSERT INTO(id) values ('0')

		$lastInsertedID = $this->db->insert_id();



		return $lastInsertedID;




	}


}
