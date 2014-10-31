<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group_Model extends CI_Model {

  
  public function getAll(){

    $result= $this->db->get('group')->result_array();
    // The results of the query are stored in $login.
    // If a value exists, then the user account exists and is validated
    if ( is_array($result)) {
        return $result;
    }
    else{
      return array();
    }
  }

<<<<<<< HEAD
  public function update($group){
      $data = array('name'=>$group['name'],"group"=>$group['group']);    
       $this->db->where('id',$group['id']);     
    $this->db->update('group',$data);
    return ($this->db->affected_rows()>0)? TRUE:FALSE;
  }

  public function create($group){

    $data = array('name'=>$group['name'],"group"=>$group['group']);    
    $this->db->insert('group',$data);
=======
  public function update($ledger){

     $data = array('name'=>$ledger['name'], "mobile_no"=>$ledger['mobile_no'], "address"=>$ledger['address'], "city"=>$ledger['city'], "state"=>$ledger['state']['name'], "district"=>$ledger['district']['name'], "mobile_no"=>$ledger['mobile_no'],"pin_code"=>$ledger['pin_code'],"email"=>$ledger['email'],"user_id"=>$ledger['user_id'],"tin_no"=>$ledger['tin_no'],"opening_bal"=>$ledger['opening_bal'],"type"=>$ledger['type']);    
    $this->db->where('s_no',$ledger['s_no']);     
    $this->db->update('ledger',$data);
    return ($this->db->affected_rows()>0)? TRUE:FALSE;
  }

  public function create($ledger){

    $data = array('name'=>$ledger['name'], "mobile_no"=>$ledger['mobile_no'], "address"=>$ledger['address'], "city"=>$ledger['city'], "state"=>$ledger['state']['name'], "district"=>$ledger['district']['name'], "mobile_no"=>$ledger['mobile_no'],"pin_code"=>$ledger['pin_code'],"email"=>$ledger['email'],"user_id"=>$ledger['user_id'],"tin_no"=>$ledger['tin_no'],"opening_bal"=>$ledger['opening_balance'],"type"=>$ledger['type']);    
    $this->db->insert('ledger',$data);
>>>>>>> 07d675843de644eef8e648059c9bc99c4d78a9e7
    return ($this->db->affected_rows()>0)? TRUE:FALSE;
  }

  public function delete($id){
    $this->db->where('id',$id)->delete('group');
    return ($this->db->affected_rows()>0)? TRUE:FALSE;
  }

}







