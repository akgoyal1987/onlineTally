<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ledger_Model extends CI_Model {

  
  public function getAll(){

    $result= $this->db->get('ledger')->result_array();
    // The results of the query are stored in $login.
    // If a value exists, then the user account exists and is validated
    if ( is_array($result)) {
        return $result;
    }
    else{
      return array();
    }
  }

  public function update($ledger){

     $data = array('name'=>$ledger['name'], "mobile_no"=>$ledger['mobile_no'], "address"=>$ledger['address'], "city"=>$ledger['city'], "state"=>$ledger['state']['name'], "district"=>$ledger['district']['name'], "mobile_no"=>$ledger['mobile_no'],"pin_code"=>$ledger['pin_code'],"email"=>$ledger['email'],"user_id"=>$ledger['user_id'],"tin_no"=>$ledger['tin_no'],"opening_bal"=>$ledger['opening_bal'],"type"=>$ledger['type']);    
    $this->db->where('s_no',$ledger['s_no']);     
    $this->db->update('ledger',$data);
    return ($this->db->affected_rows()>0)? TRUE:FALSE;
  }

  public function create($ledger){

    $data = array('name'=>$ledger['name'], "mobile_no"=>$ledger['mobile_no'], "address"=>$ledger['address'], "city"=>$ledger['city'], "state"=>$ledger['state']['name'], "district"=>$ledger['district']['name'], "mobile_no"=>$ledger['mobile_no'],"pin_code"=>$ledger['pin_code'],"email"=>$ledger['email'],"user_id"=>$ledger['user_id'],"tin_no"=>$ledger['tin_no'],"opening_bal"=>$ledger['opening_balance'],"type"=>$ledger['type'],"group_id"=>$ledger['group_id']);    
    $this->db->insert('ledger',$data);
    return ($this->db->affected_rows()>0)? TRUE:FALSE;
  }

  public function delete($id){
    $this->db->where('s_no',$id)->delete('ledger');
    return ($this->db->affected_rows()>0)? TRUE:FALSE;
  }

}







