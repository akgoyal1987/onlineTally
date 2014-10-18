<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Views extends CI_Controller {

	public function home(){
		if($this->checkSession()){
			$this->load->view('partials/home');
		}else{
			echo "You Are Not Logged In, Please Login!";
		}
	}

	public function company_profile(){
		if($this->checkSession()){

			$this->load->view('partials/company_profile');
		}else{
			echo "You Are Not Logged In, Please Login!";
		}
	}
	public function group(){
		if($this->checkSession()){
			$data['pagename'] = "group";
			$this->load->view('partials/group',$data);
		}else{
			echo "You Are Not Logged In, Please Login!";
		}
	}
	public function ledger(){
		if($this->checkSession()){
			$data['pagename'] = "ledger";
			$this->load->view('partials/ledger',$data);
		}else{
			echo "You Are Not Logged In, Please Login!";
		}
	}
	public function create_ledger(){
		if($this->checkSession()){
			$this->load->view('partials/create_ledger');
		}else{
			echo "You Are Not Logged In, Please Login!";
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



