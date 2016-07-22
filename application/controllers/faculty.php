<?php

class Faculty extends Security{


	function __construct(){

			parent::__construct();

			$this->load->helper('url');

			$this->load->library('session');

	}


	public function index(){



		$this->load->Model('FacultyModel');


		$data = array(
				'faculties' =>$this->FacultyModel->GetAll()
			);


		$this->load->view('faculty/list_of_faculty.html',$data);


	}



   public function schedule($id){
		

   		//$result = 8 & 5;


   		//var_dump($result);

   		$fnameId = $id;
		$id = substr($id, strpos($id, '.')+1);


		$this->load->Model('ScheduleModel');

		$this->load->Model('SectionModel');
		$this->load->Model('SubjectModel');
		$this->load->Model('FacultyModel');


		$data = array(
				'sections' =>$this->SectionModel->GetAll(),
				'subjects' =>$this->SubjectModel->GetAll(),
				'schedules' =>$this->ScheduleModel->GetAllByFaculty($id),
				'faculty' => $this->FacultyModel->find_by_id($id)
			);


		if($this->input->post()){


			$days = $this->input->post('days');

			$section = $this->input->post('section');

			$subject = $this->input->post('subject');

			$from_time = $this->input->post('from_time');

			$to_time = $this->input->post('to_time');


			$this->load->Model('ScheduleModel');


			$data = array(
				'days' => array_sum($days),
				'section' => $section,
				'subject' => $subject,
				'from_time' => $from_time,
				'to_time' => $to_time,
				'faculty' => $id
				);


			if($this->ScheduleModel->Save($data)){

					$this->load->library('session');

					$this->session->set_flashdata('msg','Successfully added.');

					redirect('faculty/schedule/' . $fnameId);

			}


		}



		$this->load->view('faculty/schedule.php',$data);


	}


	public function faculty_profile($id){
		

		$id = substr($id, strpos($id, '.')+1);


		$this->load->Model('SectionModel');
		$this->load->Model('SubjectModel');
		$this->load->Model('FacultyModel');


		$data = array(
				'sections' =>$this->SectionModel->GetAll(),
				'subjects' =>$this->SubjectModel->GetAll(),
				'faculty' => $this->FacultyModel->find_by_id($id)
			);





		$this->load->view('faculty/faculty_profile.html',$data);


	}
	

	public function add(){

		
		$successMessage = $this->session->flashdata('successMessage') ? $this->session->flashdata('successMessage') : '';


		//check kung naay sulod ag post
		if($this->input->post()){


			$this->load->Model('FacultyModel');
					  //_POST
			$params = $this->input->post();

			
			if($this->FacultyModel->Save($params)){


					$this->session->set_flashdata('successMessage','Successfully added..');

					redirect('/faculty/add');


			}


		}


		$this->load->view('faculty/add.html',array('successMessage'=>$successMessage));

	}


	public function edit(){


		$successMessage = $this->session->flashdata('successMessage') ? $this->session->flashdata('successMessage') : '';

		$this->load->Model('FacultyModel');
		$id = $this->input->get('id');

		if($this->input->post()){

			$params = $this->input->post();

			
			if($this->FacultyModel->update($params,$id)){


					$this->session->set_flashdata('successMessage','Successfully edited..');

					redirect('/faculty/edit?id='. $id);


			}


		}



		$faculty = $this->FacultyModel->find_by_id($id);

		$this->load->view('faculty/edit.html', array('faculty'=>$faculty,'id'=>$id,'successMessage'=>$successMessage));
	}

	public function delete(){

		$this->load->Model('FacultyModel');
		$id = $this->input->get('id');

		$this->FacultyModel->delete($id);

		redirect('/faculty');
	}
}
