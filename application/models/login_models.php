<?php

class Login_models extends CI_Model{
    
    function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }

    public function checkUserLogin()
    {
        $this->db->select('*');
        $this->db->from('Users');
        $this->db->where('emailId',$this->input->post('email'));
        $this->db->where('Password',md5($this->input->post('password')));
        $this->db->where('Status','Active');
        $query = $this->db->get();
	//echo $this->db->last_query();

        return $query->result_array();
    }
    
    public function getUserDetail($email)
     {
	  $this->db->where('emailId',$email);
	  $query = $this->db->get('Users');
	  if($query->num_rows > 0)
	  {
	      return $query->row_array();
	  }
          else
          {
            $this->session->set_flashdata('message', 'Invalid email address or password entered');
            redirect('../login');
          }
	  
     }
	
	public function update_user($userdata, $u_id)
	{
		//print_r($u_id);die();
		$this->db->where('UserId', $u_id);
        $result = $this->db->update('Users', $userdata);
		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
    
	 public function getpass($u_id)
	 {
	 	      
        //$userSessData = $this->session->userdata('userdata');
	 	$this->db->where('UserId', $u_id);  
        //$this->db->where_not_in('UserId',$userSessData['user_id']); 
		$query = $this->db->get('Users');
		$arrResult = $query->result_array();
		
		//print_r($arrResult);die();
		return $arrResult;
		
	 }
	  public function update_pass($uid,$udata)
	 {
		 $this->db->where('UserId', $uid);
        $result = $this->db->update('Users', $udata);
		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}
	 }
	/*
	 public function getpass($UserId)
    {
        $this->db->select('*');
        $this->db->from('Users');
		$this->db->where('UserId', $u_id);
        $this->db->where('Password',($this->input->post('password')));
        $query = $this->db->get();
	    print_r($this->db->last_query()); die();

        return $query->result_array();
    }*/
	

}        