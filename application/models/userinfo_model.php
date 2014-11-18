<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userinfo_Model extends CI_Model {

  
  public function getCompanyAll(){
    $this->db->where('user_id',  $this->session->userdata('user_id'));
    $result= $this->db->get('company_info')->result_array();
   
    if ( is_array($result)) {
        return $result[0];
    }
    else{
      return array();
    }
  }

  public function updateCompany($group){
      $data = array('company_name'=>$group['company_name'],"address"=>$group['address'],"phone_no"=>$group['phone_no'],"email_id"=>$group['email_id'],"city"=>$group['city']['name'],"district"=>$group['district']['name'],"state"=>$group['state']['name'],"pin_code"=>$group['pin_code'],"tin_no"=>$group['tin_no'],"csl_no"=>$group['csl_no'],"financial_year"=>date('Y-m-d', strtotime(str_replace('/', '-', $group['financial_year']))),"book_begning"=>date('Y-m-d', strtotime(str_replace('/', '-', $group['book_begning']))));    
       $this->db->where('c_no',$group['c_no']);     
    $this->db->update('company_info',$data);
    return ($this->db->affected_rows()>0)? TRUE:FALSE;
  }


}







