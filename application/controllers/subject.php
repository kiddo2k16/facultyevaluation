<?php

class subject extends Security{
	

	function __construct(){

		parent::__construct();

		$this->load->helper('url');
		$this->load->library('session');
	}	


	public function index(){



		$this->load->Model('SubjectModel');


		$data = array(
				'subjects' =>$this->SubjectModel->GetAll()
			);

		$this->load->view('subject/subject_list.html',$data);


	}


	

	public function add(){

		
		$successMessage = $this->session->flashdata('successMessage') ? $this->session->flashdata('successMessage') : '';


		//check kung naay sulod ag post
		if($this->input->post()){


			$this->load->Model('SubjectModel');
					  //_POST
			$params = $this->input->post();

			
			if($this->SubjectModel->Save($params)){


					$this->session->set_flashdata('successMessage','Successfully added..');

					redirect('/subject/add');


			}


		}


		$this->load->view('subject/add.html',array('successMessage'=>$successMessage));

	}


	public function edit(){


		$successMessage = $this->session->flashdata('successMessage') ? $this->session->flashdata('successMessage') : '';

		$this->load->Model('SubjectModel');
		$id = $this->input->get('id');

		if($this->input->post()){

			$params = $this->input->post();

			
			if($this->SubjectModel->update($params,$id)){


					$this->session->set_flashdata('successMessage','Successfully edited..');

					redirect('/subject/edit?id='. $id);


			}


		}



		$subject = $this->SubjectModel->find_by_id($id);

		$this->load->view('subject/edit.html', array('subject'=>$subject,'id'=>$id,'successMessage'=>$successMessage));
	}

	public function delete(){

		$this->load->Model('SubjectModel');
		$id = $this->input->get('id');

		$this->SubjectModel->delete($id);

		redirect('/subject');
	}
}
