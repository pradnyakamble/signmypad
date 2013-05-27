<?php

class Manageuser_models extends CI_Model{
    
    function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }
    
    	 public function manageuser()
	 {
		$query = $this->db->get('Users');
		$arrResult = $query->result_array();
		return $arrResult;
	 }
	 
	   function getManageUsers($UserId){
        $this->db->select('Users.UserId');
        $this->db->from('Users');
        $this->db->where('Users.Status','Active');
        $this->db->where('Users.Status','1');
        $this->db->where('Users.UserId',$UserId);
        $query = $this->db->get();
	//echo $this->db->last_query();
        return $query->result_array();
    }
	   
	   function editmanageuser($UserId){
        $this->db->select('Users.FirstName,Users.LastName,Users.UserName,Users.mobileNo,Users.emailId');
        $this->db->from('Users');
        $this->db->where('Users.Status','Active');
        $this->db->where('Users.UserId',$UserId);
        $query = $this->db->get();
		//echo $this->db->last_query();
        return $query->result_array();
    }
	   
	   
	    function getUserDetail($UserId){
        $this->db->select('Users.FirstName,Users.LastName,Users.UserName,Users.mobileNo,Users.emailId,Users.UserId');
        $this->db->from('Users');
        $this->db->where('Users.Status','Active');
        $this->db->where('Users.UserId',$UserId);
        $query = $this->db->get();
		//echo $this->db->last_query();
        return $query->result_array();
    }
	   
	      function editmanageuserdetail($UserId){
        //echo "here";die;
        $this->db->select('Users.*');
        $this->db->from('Users');
        $this->db->where('Users.UserId',$UserId);
        $query = $this->db->get();
        //echo "<pre>";
        //echo $this->db->last_query();
        return $query->result_array();
    }
	   
	 public function checkExistmanageUser($emailId, $UserId = FALSE) {
        $this->db->like('emailId',$emailId, 'none');
        if ($UserId) {
            $this->db->where('UserId !=', $UserId);
        }
        $query = $this->db->get('Users');
        return $query->result_array();
    }
	 
	   public function setUserInfo($UserId) {
        $data = array('FirstName'=>$_POST['FirstName'],
        			  'LastName' => $_POST['LastName'],
				      'UserName' => $_POST['UserName'],
					  'mobileNo' => $_POST['mobileNo'],
					  'emailId' => $_POST['emailId'],);
        $this->db->where('UserId', $UserId);
        $result = $this->db->update('Users', $data);
       return $result;
    }	 
	   
	    public function delManageUser($UserId){
      $result =  $this->db->delete('Users', array('UserId' => $UserId)); 
      return $result;
   }
		
	   public function addManageUser(){
	       $fileData = $_FILES;
	       $fileName = substr($fileData['uploadfile']['name'],0,strpos($fileData['uploadfile']['name'],'.'));
	       $userSessData = $this->session->userdata('userdata');
	       $data = array(
	        'pdfFilename' => $fileName,
	        'CreatedBy' => $userSessData['user_id'],
	       'status' =>'published'
	       );
	       $insertResult = $this->db->insert('pdf_resources', $data); 
	       
	   }
	
}    