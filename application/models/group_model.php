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

  public function update($group){
      $data = array('name'=>$group['name'],"group"=>$group['group']);    
       $this->db->where('id',$group['id']);     
    $this->db->update('group',$data);
    return ($this->db->affected_rows()>0)? TRUE:FALSE;
  }

  public function create($group){
    $data = array('name'=>$group['name'],"group"=>$group['group']);    
    $this->db->insert('group',$data);
    return ($this->db->affected_rows()>0)? TRUE:FALSE;
  }

  public function delete($id){
    $this->db->where('id',$id)->delete('group');
    return ($this->db->affected_rows()>0)? TRUE:FALSE;
  }

}







