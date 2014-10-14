<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sub_categories extends CI_Model {

	
	public function getAll()
	{

		$result= $this->db->get('sub_categories')->result_array();
    // The results of the query are stored in $login.
    // If a value exists, then the user account exists and is validated
    if ( is_array($result)) {
        return $result;
    }
    else{
			return array();
		}
	}

  public function delete(){
    $this->db->where('id',$this->input->post('id'))->delete('sub_categories');
    return ($this->db->affected_rows()>0)? TRUE:FALSE;
  } 

  public function createOrUpdate(){
    $data = array('name'=>$this->input->post('name'), "category"=>$this->input->post('category'));
    if($this->input->post('id') && $this->input->post('id') !=null){
      $this->db->where('id',$this->input->post('id'));      
      $this->db->update('sub_categories',$data);
      return ($this->db->affected_rows()>0)? TRUE:FALSE;
    }else{
      $this->db->insert('sub_categories',$data);
      return ($this->db->affected_rows()>0)? TRUE:FALSE;
    }
 } 
}







