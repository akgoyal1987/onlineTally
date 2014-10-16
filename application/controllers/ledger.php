<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ledger extends CI_Controller {

	public function create(){
		if($this->checkSession()){			
			$params = $this->getParameters();
			if(isset($params['firstname'])) {
				echo json_encode($params);
			}else{
				echo "first name not found";
			}
		}else{
			redirect('logins/login');
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

	private function getParameters(){
		return (json_decode(file_get_contents('php://input'), true));
	}
}


?>



