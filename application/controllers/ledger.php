<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ledger extends CI_Controller {

	
	public function get(){
		if($this->checkSession()){			
			$this->load->model('Ledger_Model');
			$data['ledgers'] =  $this->Ledger_Model->getAll();
			//json_encode($ledgers);
			$ledgers = array(); // it will wrap all of your value
		    foreach($data['ledgers'] as $row){
				unset($temp); // Release the contained value of the variable from the last loop
				$temp = array();

				// It guess your client side will need the id to extract, and distinguish the ScoreCH data
				$temp['s_no'] = $row['s_no'];
				$temp['name'] = $row['name'];

				array_push($ledgers,$row);
		    }
		    echo json_encode($ledgers);
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



