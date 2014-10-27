<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ledger_Model extends CI_Model {

  
  public function getAll()
  {

    $result= $this->db->get('ledger')->result_array();
    // The results of the query are stored in $login.
    // If a value exists, then the user account exists and is validated
    if ( is_array($result)) {
        return $result;
    }
    else{
      return array();
    }
  }

}







