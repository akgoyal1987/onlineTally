<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Model {

	
	public function can_login()
	{
		$this->db->where('user_id', $this->input->post('email'));
		$this->db->where('password', md5($this->input->post('password')));
		$result= $this->db->get('users')->result();
    // The results of the query are stored in $login.
    // If a value exists, then the user account exists and is validated
    if ( is_array($result) && count($result) == 1 ) {
        $this->set_session($result[0]);
        return true;
    }
    else{
			return false;
		}
	}
  public function insert_user(){
      $date = $this->input->post('date');
      $name = $this->input->post('name');
      $mobile = $this->input->post('mobile');
      $email = $this->input->post('email');


      $degree_name= $this->input->post('degree');
      $college= $this->input->post('college');
      $branch= $this->input->post('branch');
      $marks= $this->input->post('gmarks');
      $course= $this->input->post('course');

      $sql = "INSERT INTO reg_user (date,name,mobile,email)
      VALUES(" . $this->db->escape($date) . "," . $this->db->escape($name) . "," . $this->db->escape($mobile) . "," . $this->db->escape($email) . ")";
      $sqll = "INSERT INTO graduation (email,degree,college,branch,marks,course)
      VALUES(" . $this->db->escape($email) . "," . $this->db->escape($degree_name) . "," . $this->db->escape($college) . "," . $this->db->escape($branch) . "," . $this->db->escape($marks) . "," . $this->db->escape($course) . ")";

      $this->db->query($sql);
      $this->db->query($sqll);
  }

  function set_session($userinfo) {
      if($userinfo->role=="user")
        $home = "user_home";
      else if($userinfo->role=="admin")
        $home = "admin_home";
      else{
        $home = "company_home";      
        $this->db->where('user_id',$userinfo->user_id);
        $result= $this->db->get('company_info')->result();
        if ( is_array($result) && count($result) == 1 ) {
       $this->session->set_userdata( array(
              'id'=>$userinfo->s_no,
              'username'=> $result[0]->company_name,  
              'user_id'=>$result[0]->user_id,            
              'role'=> $userinfo->role,
              'home'=> $home,
              'isLoggedIn'=>true
          )
      );
        return true;
    }
    else{
      return false;
    }
          }
      }
      
  }







