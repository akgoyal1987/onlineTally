<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class States extends CI_Controller {

	public function index(){
		if($this->checkSession()){
			$this->load->model('state');
			$data['states'] = $this->state->getAll();			
			$data['pagename'] = "States";
			$this->load->view('states', $data);
		}else{
			redirect('logins/login');
		}
	}
	
	public function delete(){
		if($this->checkSession()){
			$this->load->model('state');
			$jsonresponse = array();
			if($this->state->delete())	
				$jsonresponse['message']= "success";
			else
				$jsonresponse['message']= "failed";
			echo json_encode($jsonresponse);
		}else{
			$jsonresponse['message']= "Please Login First";
			echo json_encode($jsonresponse);
		}
 	}

 	public function update(){
		if($this->checkSession()){
			$this->load->model('state');
			$jsonresponse = array();
			if($this->state->createOrUpdate())	
				$jsonresponse['message']= "success";
			else
				$jsonresponse['message']= "failed";
			echo json_encode($jsonresponse);
		}else{
			$jsonresponse['message']= "Please Login First";
			echo json_encode($jsonresponse);
		}
 	}

	function checkSession(){
		if($this->session->userdata('isLoggedIn')){
			return true;
		}
		else{
			return false;
		}
	}
}


?>



