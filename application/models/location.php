<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Location extends CI_Model {

	
	public function getAll()
	{

		$result= $this->db->get('locations')->result_array();
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
    $this->db->where('id',$this->input->post('id'))->delete('locations');
    return ($this->db->affected_rows()>0)? TRUE:FALSE;
  } 

  public function createOrUpdate(){
    $data = array('name'=>$this->input->post('name'), "city"=>$this->input->post('city'), "state"=>$this->input->post('state'));
    if($this->input->post('id') && $this->input->post('id') !=null){
      $this->db->where('id',$this->input->post('id'));
      $this->db->update('locations',$data);
      return ($this->db->affected_rows()>0)? TRUE:FALSE;
    }else{      
      $this->db->insert('locations',$data);
      return ($this->db->affected_rows()>0)? TRUE:FALSE;
    }
 } 
}







