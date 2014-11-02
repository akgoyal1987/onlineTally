<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userinfo extends MY_Base_Controller{
	
	public function getCompany(){
		if($this->checkSession()){			
			$this->load->model('Userinfo_Model');
			$data['response']['company'] =  $this->Userinfo_Model->getCompanyAll();
			$data['response']['success'] = true;
			$data['response']['message'] = "company infor got Scucessfully";
		    echo json_encode($data['response']);
		}else{
			redirect('logins/login');
		}
	}
	public function updateCompany(){
		if($this->checkSession()){
			$params = $this->getParameters();	
			$this->load->model('Userinfo_Model');
			print_r($params);
			$data['result'] =  $this->Userinfo_Model->updateCompany($params);
		    echo json_encode($data['result']);
		}else{
			redirect('logins/login');
		}
	}

	

}


?>



