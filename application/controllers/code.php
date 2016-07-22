<?php


class Code extends Security{






	function __construct(){


		parent::__construct();

		//$this->load->model("CodeModel");
        $this->load->library("pagination");
	}

	public function index($page =1){

			$this->load->Model('CodeModel');



				$config = array();
		        $config["base_url"] = base_url() . "code";
		        $config["total_rows"] = $this->CodeModel->record_count();
		        $config["per_page"] = 100;
		        $config["uri_segment"] = 2;
		 		$config['num_links'] = 2;
		 		$config['use_page_numbers'] = TRUE;


		        $this->pagination->initialize($config);
		 
		        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		        $data["results"] = $this->CodeModel->GetAllWithPagenation($config["per_page"], $page);
		        $data["links"] = $this->pagination->create_links();
		 	
		 		$data ['codes'] = $this->CodeModel->GetAllWithPagenation($config["per_page"], $page);




			$this->load->view('code.php',$data);

	}



	public function printpreview(){


		$this->load->Model('CodeModel');


		$data['codes'] = $this->CodeModel->GetAllTempCodes();


		$this->output->unset_template();

		$this->load->library('pdf');
		$this->pdf->load_view('codes.php',$data);
		$this->pdf->render();
		$this->pdf->stream("codes.pdf");


		//$this->CodeModel->DeleteTempCodes();

	}


	public function generate(){

		$this->load->Model('CodeModel');

		$code = $this->randString(15);

		$i = 0;

		

			$count = $this->input->get('count');

			$tempCodes = array();

		do{


			if($this->CodeModel->NotExists($code) && !in_array($code, $tempCodes)){

				$this->CodeModel->Save($code);
				$tempCodes[] = $code;

				$i++;

				$code = $this->randString(15);

			}



		}while($i < $count);


		foreach($tempCodes as $c){

			$this->CodeModel->SaveTempCode($c);

		}


		$this->output->unset_template();

			$this->output
    ->set_content_type('application/json')
    ->set_output(json_encode(array('success' => true)));


	}

	private function randString($length, $charset='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')
	{
    	$str = '';
    	$count = strlen($charset);
   	 	while ($length--) {
        	$str .= $charset[mt_rand(0, $count-1)];
    	}
    	return $str;
	}
}