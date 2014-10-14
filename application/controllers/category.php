<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

	public function index(){
		if($this->checkSession()){
			$this->load->model('categories');
			$data['categories'] = $this->categories->getAll();			
			$data['pagename'] = "Categories";
			$this->load->view('categories', $data);
		}else{
			redirect('logins/login');
		}
	}
	
	public function delete(){
		if($this->checkSession()){
			$this->load->model('categories');
			$jsonresponse = array();
			if($this->categories->delete())	
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
			$this->load->model('categories');
			$jsonresponse = array();
			if($this->categories->createOrUpdate())	
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



