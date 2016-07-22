<?php


class CodeModel extends CI_Model{


	var $id = 0;
	var $code = '';
	var $createdOn = '';
	var $status = '';



	function __construct(){


		parent::__construct();

		$this->load->database();

	}


	public function SetInActive($code){


		$this->db->update('code', array('status'=>'inactive'), "code = '$code'");
		return $this->db->affected_rows();
	}



	public function Exists($code){


		$this->db->where('code',$code);

		$this->db->where('status !=','inactive');

		$row = $this->db->get('code')->row();
		
		$code = new CodeModel();

		
		if($row){
		
			$code->id = $row->id;
			$code->code = $row->code;
			$code->status = $row->status;

		}

		return $code;
	}


	public function NotExists($code){

		$row = $this->db->get_where('code',array('code'=>$code))->row();
		
		
		if($row){
			return false;
			
		}else{

			return true;
		}


	}


	public function GetAllTempCodes(){

		$query = $this->db->get('temp_codes');

		$rows = array();

		foreach($query->result() as $row){

				$rows[] = $row->code;
		}

		return $rows;

	}


	public function GetAll(){


		$query = $this->db->get('code');

		$rows = array();

		foreach($query->result() as $row){


				$code = new CodeModel();


				$code->id = $row->id;
				$code->code = $row->code;
				$code->createdOn = $row->createdOn;
				$code->status = $row->status;

				$rows[] = $code;
		}

		return $rows;
	}



	public function SaveTempCode($code){

		$this->db->insert('temp_codes',array('code'=>$code));


	}

	public function DeleteTempCodes(){

		$this->db->delete('temp_codes');

	}


public function GetAllWithPagenation($limit,$offset){

		 $this->db->limit($limit, $offset);;
		$query = $this->db->get('code');

		$rows = array();

		foreach($query->result() as $row){


				$code = new CodeModel();


				$code->id = $row->id;
				$code->code = $row->code;
				$code->createdOn = $row->createdOn;
				$code->status = $row->status;

				$rows[] = $code;
		}

		return $rows;
	}

	public function Save($code){


		$sections = array(
					
			'code' => $code,
			'status' => 'for-printing'
			);


		$this->db->set('createdOn', 'NOW()', FALSE);
		$this->db->insert('code',$sections);
		$lastInsertedID = $this->db->insert_id();



		return $lastInsertedID;
	}






	  public function record_count() {
        return $this->db->count_all("code");
    }



    public function fetch_code ($limit,$offset){

        $this->db->limit($limit, $offset);;
        $query = $this->db->get("code");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

}