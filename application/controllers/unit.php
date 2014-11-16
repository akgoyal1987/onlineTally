<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Unit extends MY_Base_Controller{

	public function get(){
		if($this->checkSession()){			
			$this->load->model('Unit_Model');
			$data['groups'] =  $this->Unit_Model->getAll();
		    echo json_encode($data['groups']);
		}else{
			redirect('logins/login');
		}
	}

	public function update(){
		if($this->checkSession()){
			$params = $this->getParameters();	
			$this->load->model('Unit_Model');
			$data['result'] =  $this->Unit_Model->update($params);
		    echo json_encode($data['result']);
		}else{
			redirect('logins/login');
		}
	}

	public function create(){
		if($this->checkSession()){
			$params = $this->getParameters();	
			$this->load->model('Unit_Model');
			$data['result'] =  $this->Unit_Model->create($params);
		    echo json_encode($data['result']);
		}else{
			redirect('logins/login');
		}
	}
	
	public function delete(){
		if($this->checkSession()){
			$params = $this->getParameters();
			$this->load->model('Unit_Model');
			$data['result'] =  $this->Unit_Model->delete($params['id']);
		    echo json_encode($data['result']);
		}else{
			redirect('logins/login');
		}
	}

}


?>



