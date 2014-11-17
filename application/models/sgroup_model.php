<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sgroup_Model extends CI_Model {

  
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

  public function create($group){
    $data = array('name'=>$group['name'],"group_id"=>$group['group_id']['id'],"user_id"=>$this->session->userdata('user_id'));    
    $this->db->insert('stock_group',$data);
    return ($this->db->affected_rows()>0)? TRUE:FALSE;
  }

  public function delete($id){
    $this->db->where('id',$id)->delete('stock_group');
    return ($this->db->affected_rows()>0)? TRUE:FALSE;
  }

}







