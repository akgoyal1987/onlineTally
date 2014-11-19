<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stock_items extends MY_Base_Controller{

	public function get(){
		if($this->checkSession()){			
			$this->load->model('Sitem_Model');
			$data['groups'] =  $this->Sitem_Model->getAll();
		    echo json_encode($data['groups']);
		}else{
			redirect('logins/login');
		}
	}

	public function update(){
		if($this->checkSession()){
			$params = $this->getParameters();	
			$this->load->model('Sitem_Model');
			$data['result'] =  $this->Sitem_Model->update($params);
		    echo json_encode($data['result']);
		}else{
			redirect('logins/login');
		}
	}

	public function create(){
		if($this->checkSession()){
			$params = $this->getParameters();	
			$this->load->model('Sitem_Model');
			$data['result'] =  $this->Sitem_Model->create($params);
		    echo json_encode($data['result']);
		}else{
			redirect('logins/login');
		}
	}
	
	public function delete(){
		if($this->checkSession()){
			$params = $this->getParameters();
			$this->load->model('Sitem_Model');
			$data['result'] =  $this->Sitem_Model->delete($params['id']);
		    echo json_encode($data['result']);
		}else{
			redirect('logins/login');
		}
	}

}


?>



