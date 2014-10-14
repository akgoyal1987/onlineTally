<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logins extends CI_Controller {
	public function index(){
		if($this->checkSession()){
			redirect('logins/home');
		}else{
			redirect('logins/login');
		}
	}
	
	public function home(){
		if($this->checkSession()){
			$data['pagename'] = "Dashboard";
			$this->load->view('home', $data);
		}else{
			$this->login();
		}		
	}
	
	public function login(){
		if($this->checkSession()){
			redirect('logins/home');
		}else{
			$data['pagename'] = "Vmarketx Login";
			$this->load->view('index', $data);
		}
	}
	
	public function signin(){
		$this->session->set_userdata( array(
              'id'=>$userinfo->id,
              'username'=> $userinfo->username,              
              'isLoggedIn'=>true
          	)
      	);
      	redirect('logins/home');
		// if($this->validate_credentials()){			
  //        	redirect('logins/home');
		// }else{
  //        	redirect('logins/');
		// }		
	}
	
	function validate_credentials(){
		$this->load->model('admin');
		return $this->admin->can_login();
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('logins/index');
	}
	
	public function registration(){
		$data['pagename'] = "Vmarketx Register";
		$this->load->view('registration', $data);
	} 
	
	public function signup_validation(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('date', 'Walk In Date', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required|alpha');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required|trim|numeric|exact_length[10]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[reg_user.email]');
		if ($this->form_validation->run() == FALSE){
			$this->load->view('registration');
		}	
		else{
			$this->load->model('model_users');
			$this->model_users->insert_user();
			redirect('site/thanks');              
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



