<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Unit_Model extends CI_Model {

  
  public function getAll(){

    $result= $this->db->get('unit')->result_array();
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
      $data = array('name'=>$group['name']);    
       $this->db->where('id',$group['id']);     
    $this->db->update('unit',$data);
    return ($this->db->affected_rows()>0)? TRUE:FALSE;
  }

  public function create($group){
    $data = array('name'=>$group['name']);    
    $this->db->insert('unit',$data);
    return ($this->db->affected_rows()>0)? TRUE:FALSE;
  }

  public function delete($id){
    $this->db->where('id',$id)->delete('unit');
    return ($this->db->affected_rows()>0)? TRUE:FALSE;
  }

}







