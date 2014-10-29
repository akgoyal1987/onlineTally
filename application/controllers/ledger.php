<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ledger extends CI_Controller {

	public function get(){
		if($this->checkSession()){			
			$this->load->model('Ledger_Model');
			$data['ledgers'] =  $this->Ledger_Model->getAll();
		    echo json_encode($data['ledgers']);
		}else{
			redirect('logins/login');
		}
	}

	public function update(){
		if($this->checkSession()){
			$params = $this->getParameters();	
			$this->load->model('Ledger_Model');
			$data['result'] =  $this->Ledger_Model->update($params);
		    echo json_encode($data['result']);
		}else{
			redirect('logins/login');
		}
	}

	public function create(){
		if($this->checkSession()){
			$params = $this->getParameters();	
			$this->load->model('Ledger_Model');
			$data['result'] =  $this->Ledger_Model->create($params);
		    echo json_encode($data['result']);
		}else{
			redirect('logins/login');
		}
	}
	
	public function delete(){
		if($this->checkSession()){
			$params = $this->getParameters();	
			$this->load->model('Ledger_Model');
			$data['result'] =  $this->Ledger_Model->delete($params['id']);
		    echo json_encode($data['result']);
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

	private function getParameters(){
		return (json_decode(file_get_contents('php://input'), true));
	}
}


?>



