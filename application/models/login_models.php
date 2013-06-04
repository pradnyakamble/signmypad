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


}        