<?php


class Login extends CI_Controller{



	function __construct(){

		parent::__construct();

		$this->load->helper('url');

		$this->load->library('session');

	}


	private function SetUserSession($user)
	{
		$this->load->library('session');
		
		$data = array(
			//'firstName' => $user->firstName,
			//'lastName' => $user->lastName,
			//'middleName' => $user->middleName,
			'id'	=> $user->id,
			'accessLevel' => $user->accessLevel,
			'username' => $user->username
				
		);
		
		$this->session->set_userdata('loggedIn',$data);
		
	}

	public function index(){

		if($this->session->userdata('loggedIn')){

			redirect('/');

		}else{



			$hasErrors = $this->session->flashdata('hasErrors') ? $this->session->flashdata('hasErrors') : false;
			$isUsernameEmpty = $this->session->flashdata('isUsernameEmpty') ? $this->session->flashdata('isUsernameEmpty') : false;
			$isPasswordEmpty = $this->session->flashdata('isPasswordEmpty') ? $this->session->flashdata('isPasswordEmpty') : false;
			$isInvalidUsernamePassword = $this->session->flashdata('isInvalidUsernamePassword') ? $this->session->flashdata('isInvalidUsernamePassword') : false;

			if($this->input->post()){

				//load user model
				$this->load->model('User');

				$username = $this->input->post('username');
				$password= $this->input->post('password');

				if($username && $password){

					//load encrypt lib
					$this->load->library('encrypt');

					$password = $this->encrypt->sha1($password);


					$user = $this->User->LoginUsingUsernameAndPassword($username,$password);

					if($user->id > 0){

						$this->SetUserSession($user);

						redirect('/');

					}else{

						$this->session->set_flashdata('hasErrors',true);
						$this->session->set_flashdata('isInvalidUsernamePassword',true);
					}
				}else{
					$this->session->set_flashdata('hasErrors',true);
					if(empty($username) ){
						$this->session->set_flashdata('isUsernameEmpty', true);
					}
					if(empty($password)){
						$this->session->set_flashdata('isPasswordEmpty',true);
					}
				}
				redirect('/login');
			}


			$this->output->set_template('default');
			$data = array(
				'isUsernameEmpty'=>$isUsernameEmpty,
				'isPasswordEmpty'=>$isPasswordEmpty,
				'hasErrors'=>$hasErrors,
				'isInvalidUsernamePassword'=>$isInvalidUsernamePassword
				);
			$this->load->view('login.html',$data);


		}
	}

}