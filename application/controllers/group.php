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
<<<<<<< HEAD
			$this->load->model('Group_Model');
			print_r($params);
			$data['result'] =  $this->Group_Model->update($params);
=======
			$this->load->model('Ledger_Model');
			$data['result'] =  $this->Ledger_Model->update($params);
>>>>>>> 07d675843de644eef8e648059c9bc99c4d78a9e7
		    echo json_encode($data['result']);
		}else{
			redirect('logins/login');
		}
	}

	public function create(){
		if($this->checkSession()){
			$params = $this->getParameters();	
<<<<<<< HEAD
			$this->load->model('Group_Model');
			$data['result'] =  $this->Group_Model->create($params);
=======
			$this->load->model('Ledger_Model');
			$data['result'] =  $this->Ledger_Model->create($params);
>>>>>>> 07d675843de644eef8e648059c9bc99c4d78a9e7
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



