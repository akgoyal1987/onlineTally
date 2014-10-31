<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userinfo_Model extends CI_Model {

  
  public function getCompanyAll(){
    $this->db->where('user_id',  $this->session->userdata('user_id'));
    echo $this->session->userdata('user_id');
    $result= $this->db->get('company_info')->result_array();
   
    if ( is_array($result)) {
        return $result;
    }
    else{
      return array();
    }
  }

  public function updateCompany($group){
      $data = array('name'=>$group['name'],"group"=>$group['group']);    
       $this->db->where('id',$group['id']);     
    $this->db->update('group',$data);
    return ($this->db->affected_rows()>0)? TRUE:FALSE;
  }


}







