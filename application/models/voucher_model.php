<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Voucher_Model extends CI_Model {

	
	public function getAll(){
    $this->db->where('user_id',$this->session->userdata('user_id'));
    $result= $this->db->get('stock_group')->result_array();
    // The results of the query are stored in $login.
    // If a value exists, then the user account exists and is validated
    if ( is_array($result)) {
        return $result;
    }
    else{
      return array();
    }
  }

  public function update($group){
      $data = array('name'=>$group['name'],"group_id"=>$group['group_id']['id']);    
       $this->db->where('id',$group['id']);     
    $this->db->update('stock_group',$data);
    return ($this->db->affected_rows()>0)? TRUE:FALSE;
  }

  public function create($params){
    $params['amount'] = 500;
    $data = array('cr_acc'=>$params['cr_acc']['s_no'],"dr_acc"=>$params['dr_acc']['s_no'],"date"=>date('Y-m-d', strtotime(str_replace('/', '-', $params['date']))),"amount"=>$params['amount'],"user_id"=>$this->session->userdata('user_id'),"voucher_type"=>$params['type']);    
    $this->db->insert('vouchers',$data);
    if($this->db->affected_rows()>0){
        $voucherid = $this->db->insert_id();
        foreach ($params['voucherEntries'] as $index => $voucher) {
          $data = array('item_id'=>$voucher['item_id']['id'],"quantity"=>$voucher['quantity'],"rate"=>$voucher['rate'],"value"=>$voucher['value'],"voucher_id"=>$voucherid,"user_id"=>$this->session->userdata('user_id'));    
          $this->db->insert('voucher_details',$data);
        }
    }
    return $voucherid;
  }

  public function delete($id){
    $this->db->where('id',$id)->delete('stock_group');
    return ($this->db->affected_rows()>0)? TRUE:FALSE;
  }

}







