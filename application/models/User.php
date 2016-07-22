<?php


class User extends CI_Model{

	var $accessLevel = UserAccessLevel::ADMIN;
	var $username = '';
	var $password = '';


	function __construct(){


		parent::__construct();

		$this->load->database();
	}

	public function LoginUsingUsernameAndPassword($username,$password)
	{
		$row = $this->db->get_where('users',array('username'=>$username,'password'=>$password))->row();
		
		$user = new User();
		
		if($row){
			$user->id= $row->id;
			$user->accessLevel = $row->accessLevel;
			$user->username = $row->username;
			
		}
		
		
		return $user;
	}


public function GetAll(){


		$query = $this->db->get('users');

		$rows = array();

		foreach($query->result() as $row){

				$users = new User();
				$users->id = $row->id;
				$users->username = $row->username;
				$users->password = $row->password;
				$users->accessLevel = $row->accessLevel;

				$rows[] = $users;
		}

		return $rows;
	}

	public function Save($params){

					$this->load->library('encrypt');

					$password = $this->encrypt->sha1($params['password']);


		$users = array(

					
			'username' => $params['username'],
			'password' => $password,
			'accessLevel' => "admin"
			);


		
		$this->db->insert('users',$users);
		$lastInsertedID = $this->db->insert_id();



		return $lastInsertedID;
	}

	public function delete($id){
		$this->db->delete('users', array('id' => $id)); 
		return $this->db->affected_rows();
	}

	public function update($params,$id){
		$this->db->update('users', $params, "id = $id");
		return $this->db->affected_rows();

	}

	public function find_by_id($id) {

		$this->db->where('id',$id);

   	 	$sql = $this->db->get('users');

   	 	$row = $sql->row();

   	 	if ($row->id>0){

			$users = new User();
			$users->id = $row->id;
			$users->username = $row->username;
			$users->password = $row->password;
			$users->accessLevel = $row->accessLevel;
		

			return $users;

   	 	}else {
   	 		return new User();
   	 	}
	}



}

class UserAccessLevel{
	

	const  ADMIN = 'admin';
	const FACULTY = 'faculty';

}







