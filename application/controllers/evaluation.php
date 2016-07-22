<?php



class Evaluation extends CI_Controller{



	function __construct(){

		parent::__construct();
		$this->load->helper('url');
	}


	public function process(){


		$this->load->library('session');

		$evaluation = $this->session->userdata('evaluation');

		$uid = $this->input->post('uid');
		$currentUid = $evaluation['uid'];
		$currentStep = $this->input->post('currentStep');


		if($this->input->post()){


			switch ($currentStep) {
				case 1:


					$faculty = $this->input->post('faculty');
					$course = $this->input->post('course');
					$schedule = $this->input->post('schedule');
					$proctor = $this->input->post('proctor');
					$semester = $this->input->post('semester');
					$schoolYear = $this->input->post('schoolYear');
					$date = $this->input->post('date');
					$subjectId = $this->input->post('subject');
					$sectionId = $this->input->post('section');

					$evaluation['facultyId'] = $faculty;
					$evaluation['courseId'] = $course;
					$evaluation['schedule'] = $schedule;
					$evaluation['proctorId'] = $proctor;
					$evaluation['semesterId'] = $semester;
					$evaluation['schoolYear'] = $schoolYear;
					$evaluation['date'] = $date;
					$evaluation['subjectId'] = $subjectId;
					$evaluation['sectionId'] = $sectionId;

					$this->session->set_userdata('evaluation',$evaluation);
					//var_dump($faculty);
					redirect("/evaluation/start?type=student&uid=$uid&step=2");
					break;
				
				case 2:



					$answers = $this->input->post('answers');


					$evaluation['prof_responsibilities'] = $answers;

					$this->session->set_userdata('evaluation',$evaluation);

					redirect("/evaluation/start?type=student&uid=$uid&step=3");
					break;


				case 3:



					$instrucAnswer = $this->input->post('answers');	
					$comment = $this->input->post('comment');

					$profAnswer = $evaluation['prof_responsibilities'];


					//$evaluation['instruc_responsibilities'] = $answers;

					$this->load->Model('EvaluationModel');


					$data = array(
						'facultyId' => $evaluation['facultyId'],
						'type'  => 'Student',
						'date' => $evaluation['date'],
						
						'courseId' => $evaluation['courseId'],
						'evaluatedBy' => $evaluation['studentCode'],
						'instrucScore' => array_sum($instrucAnswer),
						'profScore' => array_sum($profAnswer),
						'comment' => $comment
						);

					$insertedId = $this->EvaluationModel->Save($data);

					if($insertedId > 0){


						$profNumber = 1;


						foreach($profAnswer as $prof){

							$this->EvaluationModel->SaveProfAnswer($insertedId,$prof, $profNumber);


							$profNumber++;

						}


						$instructNumber = 1;

						foreach($instrucAnswer as $instruct){


							$this->EvaluationModel->SaveInstructAnswert($insertedId,$instruct, $instructNumber);

							$instructNumber++;

						}


						$this->load->Model('CodeModel');


						$this->CodeModel->SetInActive($evaluation['studentCode']);
					}





					$this->session->unset_userdata('evaluation');
		
					$this->session->sess_destroy();
					
					redirect("/evaluation/success?type=student&uid=$uid");


					break;
				default:
					



					break;
			}

			

		}else{


			redirect('/');
		}
	}

	public function success(){


				$this->output->set_template('default');
		$this->load->view('evaluation_success.html');


	}


	public function start(){



		$this->load->library('session');

		$evaluation = $this->session->userdata('evaluation');

		$uid = $this->input->get('uid');
		$currentUid = $evaluation['uid'];


		if($evaluation && $uid && $uid == $currentUid){

			$step = $this->input->get('step');
			$type = $this->input->get('type');

			switch ($step) {
				case 1:
					
					$this->ShowStepOne($evaluation);

					break;
				
				case 2:

					$this->ShowStepTwo($evaluation);

					break;

				case 3:

					$this->ShowStepThree($evaluation);

					break;
				default:
					# code...
					break;
			}

		}else{

			redirect('/');
		}


	}

	function ShowStepOne($data){

		//inlclude 'Facult.php'

		$this->load->Model('FacultyModel');
		$this->load->Model('CourseModel');
		$this->load->Model('SubjectModel');
		$this->load->Model('SemesterModel');//hehehhe moa guro ni doihehe, save dawokmana

		$this->load->Model('SectionModel');


		$data['faculties'] =  $this->FacultyModel->GetAll();
		$data['course'] = $this->CourseModel->GetAll();
		$data['subjects'] = $this->SubjectModel->GetAll();
		$data['semester'] = $this->SemesterModel->GetCurrent();
		$data['sections'] = $this->SectionModel->GetAll();

		$this->output->set_template('default');

		//include "welcome.html"
		//data = array('faculty'=>$this->Faculty->GetAll();)
		$this->load->view("welcome.html",$data);

	}

	function ShowStepTwo($data){


		$this->output->set_template('default');
		$this->load->view("student_form.html",$data);

	}

	function ShowStepThree($data){


		$this->output->set_template('default');
		$this->load->view("student_form_2.html",$data);

	}

}