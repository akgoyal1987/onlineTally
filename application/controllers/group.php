<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group extends MY_Base_Controller{

	public function get(){
		if($this->checkSession()){			
			$this->load->model('Group_Model');
			$data['groups'] =  $this->Group_Model->getAll();
		    echo json_encode($data['groups']);
		}else{
			redirect('logins/login');
		}
	}

	public function update(){
		if($this->checkSession()){
			$params = $this->getParameters();	
			$this->load->model('Group_Model');
			print_r($params);
			$data['result'] =  $this->Group_Model->update($params);

		    echo json_encode($data['result']);
		}else{
			redirect('logins/login');
		}
	}

	public function create(){
		if($this->checkSession()){
			$params = $this->getParameters();	
			$this->load->model('Group_Model');
			$data['result'] =  $this->Group_Model->create($params);
		    echo json_encode($data['result']);
		}else{
			redirect('logins/login');
		}
	}
	
	public function delete(){
		if($this->checkSession()){
			$params = $this->getParameters();
			$this->load->model('Group_Model');
			$data['result'] =  $this->Group_Model->delete($params['id']);
		    echo json_encode($data['result']);
		}else{
			redirect('logins/login');
		}
	}

}


?>



