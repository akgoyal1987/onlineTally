<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logins extends CI_Controller{
	public function index()
	{
		if($this->checkSession())
		{
			redirect('logins/home');
		}
		else
		{
			redirect('logins/login');
		}
	}
	
	public function home()
	{
		if($this->checkSession())
		{
			$this->load->view($this->session->userdata('home'));
		}else
		{
			redirect('logins/login');
		}		
	}
	
	public function login(){
		if($this->checkSession())
		{
			redirect('logins/home');
		}
		else
		{
			$this->load->view('index');
		}
	}
	
	public function signin(){
		if($this->validate_credentials()){	
         	redirect('logins/home');
		}else{
         	redirect('logins/');
		}		
	}
	
	function validate_credentials(){
		$this->load->model('login');
		return $this->login->can_login();
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('logins/index');
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



