<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sub_category extends CI_Controller {

	public function index(){
		if($this->checkSession()){
			$this->load->model('categories');
			$this->load->model('sub_categories');
			$data['categories'] = $this->categories->getAll();	
			$data['sub_categories'] = $this->sub_categories->getAll();			
			$data['pagename'] = "Sub-Category";
			$this->load->view('sub_categories', $data);
		}
		else
		{
			redirect('logins/login');
		}
	}
	
	public function delete(){
		if($this->checkSession()){
			$this->load->model('sub_categories');
			$jsonresponse = array();
			if($this->sub_categories->delete())	
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
			$this->load->model('sub_categories');
			$jsonresponse = array();
			if($this->sub_categories->createOrUpdate())	
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