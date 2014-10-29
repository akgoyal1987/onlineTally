<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Base_Controller extends CI_Controller {

	public function checkSession(){
		if($this->session->userdata('isLoggedIn')){
			return true;
		}
		else{
			return false;
		}
	}

	public function getParameters(){
		return (json_decode(file_get_contents('php://input'), true));
	}
}


?>



