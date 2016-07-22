<?php

class course extends Security{
	

	function __construct(){

		parent::__construct();

		$this->load->helper('url');
		$this->load->library('session');
	}	


	public function index(){



		$this->load->Model('CourseModel');


		$data = array(
				'course' =>$this->CourseModel->GetAll()
			);

		$this->load->view('course/course_list.html',$data);


	}


	

	public function add(){

		
		$successMessage = $this->session->flashdata('successMessage') ? $this->session->flashdata('successMessage') : '';


		//check kung naay sulod ag post
		if($this->input->post()){


			$this->load->Model('CourseModel');
					  //_POST
			$params = $this->input->post();

			
			if($this->CourseModel->Save($params)){


					$this->session->set_flashdata('successMessage','Successfully added..');

					redirect('/course/add');


			}


		}


		$this->load->view('course/add.html',array('successMessage'=>$successMessage));

	}


	public function edit(){


		$successMessage = $this->session->flashdata('successMessage') ? $this->session->flashdata('successMessage') : '';

		$this->load->Model('CourseModel');
		$id = $this->input->get('id');

		if($this->input->post()){

			$params = $this->input->post();

			
			if($this->CourseModel->update($params,$id)){


					$this->session->set_flashdata('successMessage','Successfully added..');

					redirect('/course/edit?id='. $id);


			}


		}



		$course = $this->CourseModel->find_by_id($id);

		$this->load->view('course/edit.html', array('course'=>$course,'id'=>$id,'successMessage'=>$successMessage));
	}

	public function delete(){

		$this->load->Model('CourseModel');
		$id = $this->input->get('id');

		$this->CourseModel->delete($id);

		redirect('/course');
	}
}
