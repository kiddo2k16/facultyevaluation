<?php

class schedule extends Security{
	

	function __construct(){

		parent::__construct();

		$this->load->helper('url');
		$this->load->library('session');
	}	


	public function index(){



		$this->load->Model('ScheduleModel');


		$data = array(
				'schedules' =>$this->ScheduleModel->GetAll()
			);

		$this->load->view('faculty/faculty_profile.html',$data);


	}


	

	public function add(){

		
		$successMessage = $this->session->flashdata('successMessage') ? $this->session->flashdata('successMessage') : '';


		//check kung naay sulod ag post
		if($this->input->post()){


			$this->load->Model('ScheduleModel');
					  //_POST
			$params = $this->input->post();

			
			if($this->ScheduleModel->Save($params)){


					$this->session->set_flashdata('successMessage','Successfully added..');

					redirect('/faculty/faculty_profile#Schedule');


			}


		}


		$this->load->view('/faculty/faculty_profile#Schedule',array('successMessage'=>$successMessage));

	}


	public function edit(){


		$successMessage = $this->session->flashdata('successMessage') ? $this->session->flashdata('successMessage') : '';

		$this->load->Model('ScheduleModel');
		$id = $this->input->get('id');

		if($this->input->post()){

			$params = $this->input->post();

			
			if($this->ScheduleModel->update($params,$id)){


					$this->session->set_flashdata('successMessage','Successfully edited..');

					redirect('/faculty/faculty_profile#Schedule?id='. $id);


			}


		}



		$schedule = $this->ScheduleModel->find_by_id($id);

		$this->load->view('/faculty/faculty_profile#Schedule', array('schedule'=>$schedule,'id'=>$id,'successMessage'=>$successMessage));
	}

	public function delete(){

		$this->load->Model('ScheduleModel');
		$id = $this->input->get('id');

		$this->ScheduleModel->delete($id);

		redirect('/faculty/faculty_profile#Schedule');
	}
}
