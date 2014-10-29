<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data extends CI_Controller {

	public function cities(){
		if($this->checkSession()){
			$this->load->model('city');
			$data['cities'] = $this->city->getAll();
			echo json_encode($data['cities']);
		}else{
			redirect('logins/login');
		}
	}
	
	public function states(){
		if($this->checkSession()){
			$this->load->model('state');
			$data['states'] = $this->state->getAll();	
			echo json_encode($data['states']);
		}else{
			redirect('logins/login');
		}
	}

	public function districts(){
		if($this->checkSession()){
			$this->load->model('districts');
			$data['districts'] = $this->districts->getAll();	
			echo json_encode($data['districts']);
		}else{
			redirect('logins/login');
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



