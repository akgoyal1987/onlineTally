<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cities extends CI_Controller {

	public function index(){
		if($this->checkSession()){
			$this->load->model('city');
			$this->load->model('state');
			$data['states'] = $this->state->getAll();	
			$data['cities'] = $this->city->getAll();			
			$data['pagename'] = "Cities";
			$this->load->view('cities', $data);
		}else{
			redirect('logins/login');
		}
	}
	
	public function delete(){
		if($this->checkSession()){
			$this->load->model('city');
			$jsonresponse = array();
			if($this->city->delete())	
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
			$this->load->model('city');
			$jsonresponse = array();
			if($this->city->createOrUpdate())	
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



