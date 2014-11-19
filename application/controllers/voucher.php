<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Voucher extends MY_Base_Controller{
	
	public function getCompany(){
		if($this->checkSession()){			
			$this->load->model('Userinfo_Model');
			$data['response']['company'] =  $this->Userinfo_Model->getCompanyAll();
			$data['response']['success'] = true;
			$data['response']['message'] = "Database Error!!!!!!!!!!!";
		    echo json_encode($data['response']);
		}else{
			redirect('logins/login');
		}
	}
	public function create(){
		if($this->checkSession()){
			$params = $this->getParameters();	
			$this->load->model('Voucher_Model');
			$data['response']['voucherid'] =  $this->Voucher_Model->create($params);
		    echo json_encode($data['response']);
		}else{
			redirect('logins/login');
		}
	}
}
?>



