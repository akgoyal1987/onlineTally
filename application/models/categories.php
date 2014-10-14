<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Model {

	
	public function getAll()
	{

		$result= $this->db->get('categories')->result_array();
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
    $this->db->where('id',$this->input->post('id'))->delete('categories');
    return ($this->db->affected_rows()>0)? TRUE:FALSE;
  } 

  public function createOrUpdate(){
    if($this->input->post('id') && $this->input->post('id') !=null){
      $this->db->where('id',$this->input->post('id'));
      $data = array('name'=>$this->input->post('name'));
      $this->db->update('categories',$data);
      return ($this->db->affected_rows()>0)? TRUE:FALSE;
    }else{
      $data = array('name'=>$this->input->post('name'));
      $this->db->insert('categories',$data);
      return ($this->db->affected_rows()>0)? TRUE:FALSE;
    }
 } 
}







