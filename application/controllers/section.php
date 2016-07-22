<?php

class section extends Security{
	

	function __construct(){

		parent::__construct();

		$this->load->helper('url');
		$this->load->library('session');
	}	


	public function index(){



		$this->load->Model('SectionModel');


		$data = array(
				'sections' =>$this->SectionModel->GetAll()
			);

		$this->load->view('section/section_list.html',$data);


	}


	

	public function add(){

		
		$successMessage = $this->session->flashdata('successMessage') ? $this->session->flashdata('successMessage') : '';


		//check kung naay sulod ag post
		if($this->input->post()){


			$this->load->Model('SectionModel');
					  //_POST
			$params = $this->input->post();

			
			if($this->SectionModel->Save($params)){


					$this->session->set_flashdata('successMessage','Successfully added..');

					redirect('/section/add');


			}


		}


		$this->load->view('section/add.html',array('successMessage'=>$successMessage));

	}


	public function edit(){


		$successMessage = $this->session->flashdata('successMessage') ? $this->session->flashdata('successMessage') : '';

		$this->load->Model('SectionModel');
		$id = $this->input->get('id');

		if($this->input->post()){

			$params = $this->input->post();

			
			if($this->SectionModel->update($params,$id)){


					$this->session->set_flashdata('successMessage','Successfully edited..');

					redirect('/section/edit?id='. $id);


			}


		}



		$sections = $this->SectionModel->find_by_id($id);

		$this->load->view('section/edit.html', array('section'=>$sections,'id'=>$id,'successMessage'=>$successMessage));
	}

	public function delete(){

		$this->load->Model('SectionModel');
		$id = $this->input->get('id');

		$this->SectionModel->delete($id);

		redirect('/section');
	}
}
