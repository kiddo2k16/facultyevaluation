<?php

class Proctor extends Security{


	function __construct(){

			parent::__construct();

			$this->load->helper('url');

			$this->load->library('session');

	}


	public function index(){



		$this->load->Model('ProctorModel');


		$data = array(
				'proctors' =>$this->ProctorModel->GetAll()
			);

		$this->load->view('proctor/list_of_proctor.html',$data);


	}


	

	public function add(){

		
		$successMessage = $this->session->flashdata('successMessage') ? $this->session->flashdata('successMessage') : '';


		//check kung naay sulod ag post
		if($this->input->post()){


			$this->load->Model('ProctorModel');
					  //_POST
			$params = $this->input->post();

			
			if($this->ProctorModel->Save($params)){


					$this->session->set_flashdata('successMessage','Successfully added..');

					redirect('/proctor/add');


			}


		}


		$this->load->view('proctor/add.html',array('successMessage'=>$successMessage));

	}


	public function edit(){


		$successMessage = $this->session->flashdata('successMessage') ? $this->session->flashdata('successMessage') : '';

		$this->load->Model('ProctorModel');
		$id = $this->input->get('id');

		if($this->input->post()){

			$params = $this->input->post();

			
			if($this->ProctorModel->update($params,$id)){


					$this->session->set_flashdata('successMessage','Successfully added..');

					redirect('/proctor/edit?id='. $id);


			}


		}



		$proctor = $this->ProctorModel->find_by_id($id);

		$this->load->view('proctor/edit.html', array('proctor'=>$proctor,'id'=>$id,'successMessage'=>$successMessage));
	}

	public function delete(){

		$this->load->Model('ProctorModel');
		$id = $this->input->get('id');

		$this->ProctorModel->delete($id);

		redirect('/proctor');
	}
}
