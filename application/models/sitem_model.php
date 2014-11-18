<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sitem_Model extends CI_Model {

  
  public function getAll(){
    $this->db->where('user_id',$this->session->userdata('user_id'));
    $result= $this->db->get('stock_item')->result_array();
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
      $data = array('name'=>$group['name'],"group_id"=>$group['group_id']['id'],"unit_id"=>$group['unit_id']['id'],"rate_of_duty"=>$group['rate_of_duty'],"quantity"=>$group['quantity'],"rate"=>$group['rate'],"value"=>$group['value'],"user_id"=>$this->session->userdata('user_id'));  
       $this->db->where('id',$group['id']);     
    $this->db->update('stock_item',$data);
    return ($this->db->affected_rows()>0)? TRUE:FALSE;
  }

  public function create($group){
    $data = array('name'=>$group['name'],"group_id"=>$group['group_id']['id'],"unit_id"=>$group['unit_id']['id'],"rate_of_duty"=>$group['rate_of_duty'],"quantity"=>$group['quantity'],"rate"=>$group['rate'],"value"=>$group['value'],"user_id"=>$this->session->userdata('user_id'));    
    $this->db->insert('stock_item',$data);
    return ($this->db->affected_rows()>0)? TRUE:FALSE;
  }

  public function delete($id){
    $this->db->where('id',$id)->delete('stock_item');
    return ($this->db->affected_rows()>0)? TRUE:FALSE;
  }

}







