<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group_Model extends CI_Model {

  
  public function getAll(){
    $this->db->where('user_id',$this->session->userdata('user_id'));
    $this->db->or_where('user_id', null);
    $result= $this->db->get('group')->result_array();
    if ( is_array($result)) {
        return $result;
    }
    else{
      return array();
    }
  }

  public function update($group){
      $data = array('name'=>$group['name'],"group"=>$group['group']['id']);    
       $this->db->where('id',$group['id']);     
    $this->db->update('group',$data);
    return ($this->db->affected_rows()>0)? TRUE:FALSE;
  }

  public function create($group){
    $data = array('name'=>$group['name'],"group"=>$group['group']['id'],"user_id"=>$this->session->userdata('user_id'));    
    $this->db->insert('group',$data);
    return ($this->db->affected_rows()>0)? TRUE:FALSE;
  }

  public function delete($id){
    $this->db->where('id',$id)->delete('group');
    return ($this->db->affected_rows()>0)? TRUE:FALSE;
  }

}







