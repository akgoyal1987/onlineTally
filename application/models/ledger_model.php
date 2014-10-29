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

  public function create($ledger){

    $data = array('name'=>$ledger['name'], "mobile_no"=>$ledger['mobile_no'], "address"=>$ledger['address'], "city"=>$ledger['city'], "state"=>$ledger['state']['name'], "district"=>$ledger['district']['name'], "mobile_no"=>$ledger['mobile_no']);    
    $this->db->insert('ledger',$data);
    return ($this->db->affected_rows()>0)? TRUE:FALSE;
  }

  public function delete($id){
    $this->db->where('s_no',$id)->delete('ledger');
    return ($this->db->affected_rows()>0)? TRUE:FALSE;
  }

}







