<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Locations extends CI_Controller {

	public function index(){
		if($this->checkSession()){
			$this->load->model('city');
			$this->load->model('state');
			$this->load->model('location');
			$data['states'] = $this->state->getAll();	
			$data['cities'] = $this->city->getAll();	
			$data['locations'] = $this->location->getAll();			
			$data['pagename'] = "Locations";
			$this->load->view('locations', $data);
		}else{
			redirect('logins/login');
		}
	}
	
	public function delete(){
		if($this->checkSession()){
			$this->load->model('location');
			$jsonresponse = array();
			if($this->location->delete())	
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
			$this->load->model('location');
			$jsonresponse = array();
			if($this->location->createOrUpdate())	
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



