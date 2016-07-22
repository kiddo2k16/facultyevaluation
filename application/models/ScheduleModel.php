<?php

class ScheduleModel extends CI_Model{
	

	var $id = 0;
	var $days = 0;
	var $subject = 0;
	var $section = 0;
	var $from_time = '';
	var $to_time = '';


	function __construct(){

		parent::__construct();


		$this->load->database();

	}



	public function GetAllByFaculty($id){

		$this->db->where('faculty_id',$id);
		$query = $this->db->get('schedules');

		$rows = array();


		$this->load->Model('SectionModel');
		$this->load->Model('SubjectModel');

		foreach($query->result() as $row){

				$schedules = new ScheduleModel();
				$schedules->id = $row->id;
				$schedules->days = $row->days;
				$schedules->subject = $this->SectionModel->find_by_id($row->subject_id);
				$schedules->section = $this->SubjectModel->find_by_id($row->section_id);
				$schedules->from_time = $row->from_time;
				$schedules->to_time = $row->to_time;

				$rows[] = $schedules;
		}

		return $rows;

	}

	public function GetAll(){


		$query = $this->db->get('schedules');

		$rows = array();


		$this->load->Model('SectionModel');
		$this->load->Model('SubjectModel');

		foreach($query->result() as $row){

				$schedules = new ScheduleModel();
				$schedules->id = $row->id;
				$schedules->days = $row->days;
				$schedules->subject = $this->SectionModel->find_by_id($row->subject_id);
				$schedules->section = $this->SubjectModel->find_by_id($row->section_id);
				$schedules->from_time = $row->from_time;
				$schedules->to_time = $row->to_time;

				$rows[] = $schedules;
		}

		return $rows;
	}

	public function Save($params){

		$schedules = array(
					
			'days' => $params['days'],
			'subject_id' => $params['subject'],
			'section_id' => $params['section'],
			'from_time' => $params['from_time'],
			'to_time' => $params['to_time'],
			'faculty_id' => $params['faculty']
			);


		
		$this->db->insert('schedules',$schedules);
		$lastInsertedID = $this->db->insert_id();



		return $lastInsertedID;
	}

	public function delete($id){
		$this->db->delete('schedules', array('id' => $id)); 
		return $this->db->affected_rows();
	}

	public function update($params,$id){
		$this->db->update('schedules', $params, "id = $id");
		return $this->db->affected_rows();

	}

	public function find_by_id($id) {

		$this->db->where('id',$id);

   	 	$sql = $this->db->get('schedules');

   	 	$row = $sql->row();

   	 	if ($row->id>0){

			$schedules = new ScheduleModel();
			$schedules->id = $row->id;
			$schedules->days = $row->days;
			$schedules->subject = $row->subject;
			$schedules->section = $row->section;
			$schedules->time = $row->time;
		

			return $schedules;

   	 	}else {
   	 		return new ScheduleModel();
   	 	}
	}

}