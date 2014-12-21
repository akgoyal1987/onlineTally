<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Display extends MY_Base_Controller{

	public function trialBalance(){
		if($this->checkSession()){			
			$this->load->model('Voucher_Model');
			$data['debitacc'] =  $this->Voucher_Model->getBalanceSumDebitAcc();
			$data['creditacc'] =  $this->Voucher_Model->getBalanceSumCreditAcc();
		    echo json_encode($data);
		}else{
			redirect('logins/login');
		}
	}

	public function getLedgersByIdArray(){
		if($this->checkSession()){
			$this->load->model('Ledger_Model');
			$params = $this->getParameters();	
			$data['ledgers'] =  $this->Ledger_Model->getGroupsByLedgers($params);
		    echo json_encode($data);
		}else{
			redirect('logins/login');
		}
	}

	public function create(){
		if($this->checkSession()){
			$params = $this->getParameters();	
			$this->load->model('Group_Model');
			$data['result'] =  $this->Group_Model->create($params);
		    echo json_encode($data['result']);
		}else{
			redirect('logins/login');
		}
	}
	
	public function delete(){
		if($this->checkSession()){
			$params = $this->getParameters();
			$this->load->model('Group_Model');
			$data['result'] =  $this->Group_Model->delete($params['id']);
		    echo json_encode($data['result']);
		}else{
			redirect('logins/login');
		}
	}

}


?>



