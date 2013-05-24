<?php

class Manageuser_models extends CI_Model{
    
    function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }
    
    	 public function manage_user()
	 {
		$query = $this->db->get('Users');
		$arrResult = $query->result_array();
		return $arrResult;
	 }
	 
	 	function editmanageuser($id)
    {  
		$query = $this->db->get_where('Users',array('UserId' => $id));
		//echo $this->db->last_query();
		//exit;
		$arrResult = $query->result_array();
		return $arrResult;	
		
	}

	function editmanageuserdetails()
    {
    	//echo "Hi";
		
		//print_r($_POST);
		//die;
		$id=$_POST['UserId'];
		$data = array(
		'FirstName' => $_POST['FirstName'],
		'LastName' => $_POST['LastName'],
		'UserName' => $_POST['UserName'],
		'mobileNo' => $_POST['mobileNo'],
		'emailId' => $_POST['emailId'],
	   	);
		$this->db->where('UserId', $id);
		$querry = $this->db->update('Users', $data); 
		
	}
	
	
}    