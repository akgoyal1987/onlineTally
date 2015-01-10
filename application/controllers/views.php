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
	public function create_sitem(){
		if($this->checkSession()){
			$this->load->view('partials/create_sitem');
		}else{
			echo "You Are Not Logged In, Please Login!";
		}
	}
	public function view_sitem(){
		if($this->checkSession()){
			$this->load->view('partials/view_sitem');
		}else{
			echo "You Are Not Logged In, Please Login!";
		}
	}
	public function unit_of_measure(){
		if($this->checkSession()){
			$this->load->view('partials/unit_of_measure');
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
	public function purchase(){
		if($this->checkSession()){
			$this->load->view('partials/purchase_voucher');
		}else{
			echo "You Are Not Logged In, Please Login!";
		}
	}
	public function contra(){
		if($this->checkSession()){
			$this->load->view('partials/contra_voucher');
		}else{
			echo "You Are Not Logged In, Please Login!";
		}
	}
	public function payment(){
		if($this->checkSession()){
			$this->load->view('partials/payment_voucher');
		}else{
			echo "You Are Not Logged In, Please Login!";
		}
	}
	public function receipt(){
		if($this->checkSession()){
			$this->load->view('partials/receipt_voucher');
		}else{
			echo "You Are Not Logged In, Please Login!";
		}
	}
	public function trialBalance(){
		if($this->checkSession()){
			$this->load->view('partials/trial_balance');
		}else{
			echo "You Are Not Logged In, Please Login!";
		}
	}
	public function dayBook(){
		if($this->checkSession()){
			$this->load->view('partials/day_book');
		}else{
			echo "You Are Not Logged In, Please Login!";
		}
	}
	public function accountBook(){
		if($this->checkSession()){
			$this->load->view('partials/accountBook');
		}else{
			echo "You Are Not Logged In, Please Login!";
		}
	}
	public function inventoryBook(){
		if($this->checkSession()){
			$this->load->view('partials/inventoryBook');
		}else{
			echo "You Are Not Logged In, Please Login!";
		}
	}
	public function trialBalanceGrp(){
		if($this->checkSession()){
			$this->load->view('partials/trialBalanceGrp');
		}else{
			echo "You Are Not Logged In, Please Login!";
		}
	}
	public function showvouchers(){
		if($this->checkSession()){
			$this->load->view('partials/showvouchers');
		}else{
			echo "You Are Not Logged In, Please Login!";
		}
	}
	public function voucherDetail(){
		if($this->checkSession()){
			$this->load->view('partials/voucherDetail');
		}else{
			echo "You Are Not Logged In, Please Login!";
		}	
	}
}


?>



