<?php


class Student extends CI_Controller{



	function __construct(){

		parent::__construct();

		$this->load->helper('url');

	}



	public function check(){


		//var_dump($this->input->post());

		if($this->input->post()){



			$code = $this->input->post('code');

			if(empty($code)){

				$this->load->library('session');

				$this->session->set_flashdata('error',"Code is required.");


				redirect('/');
			}


			$this->load->Model('CodeModel');

			$existingCode = $this->CodeModel->Exists($code);

			if($existingCode->id > 0){


				$this->load->library('session');

				$uid = md5(uniqid(rand(), true));				


				$data = array(

					'uid' =>$uid,
					'studentCode' =>$code,
					'facultyId' =>'0',
					'courseId' => '0',
					'sectionId' => '0',
					'subjectId' => '0',
					'schedule' => '',
					'semesterId' => '0',
					'schoolYear' => '',
					'date' => '',
					'prof_responsibilities' =>array(0,0,0,0,0,0,0,0,0),
					'instruc_responsibilities' =>array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)

			
				);


				$this->session->set_userdata('evaluation',$data);

				redirect("/evaluation/start?type=student&uid=$uid&step=1");


			}else{

				$this->load->library('session');

				$this->session->set_flashdata('error',"Code $code does not exists.");

				redirect('/');

			}

		}else{

			redirect('/');

		}


	}

}