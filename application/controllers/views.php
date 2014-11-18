<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Views extends MY_Base_Controller{

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
	public function view_ledger(){
		if($this->checkSession()){
			$this->load->view('partials/view_ledger');
		}else{
			echo "You Are Not Logged In, Please Login!";
		}
	}

	public function stock_group(){
		if($this->checkSession()){
			$this->load->view('partials/stock_group');
		}else{
			echo "You Are Not Logged In, Please Login!";
		}
	}
	public function stock_item(){
		if($this->checkSession()){
			$this->load->view('partials/stock_item');
		}else{
			echo "You Are Not Logged In, Please Login!";
		}
	}
	public function unit_of_measure(){
		if($this->checkSession()){
			$this->load->view('partialssales_voucher/unit_of_measure');
		}else{
			echo "You Are Not Logged In, Please Login!";
		}
	}
	public function sales_voucher(){
		if($this->checkSession()){
			$this->load->view('partials/sales_voucher');
		}else{
			echo "You Are Not Logged In, Please Login!";
		}
	}

}


?>



