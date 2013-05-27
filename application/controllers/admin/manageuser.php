<?php
class Manageuser extends CI_Controller{
	
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('is_user_logged_in') != 1) {
            redirect('../login');
        }
        $this->load->library('form_validation');
        $this->load->model('manageuser_models');
    } 
	 
   public function index(){	
		$this->load->model('manageuser_models');
		$data['query'] = $this->manageuser_models->manageuser();
		$this->load->view('header');	
        $this->load->view('admin/manageuser',$data);
		$this->load->view('footer');
	}

		public function editmanageuser()
	{   
 		$id = $_GET['id'];	
 		$this->load->model('manageuser_models');
		$arrData = $this->manageuser_models->editmanageuser($id);
		$data['arrData'] = $arrData;
		$this->load->view('header');	
		$this->load->view('admin/editmanageuser',$data);
		$this->load->view('footer');
	}

	public function editmanageuserdetail($userid)
	{
		//echo "11111";  die;
		$this->form_validation->set_rules('FirstName', 'Frist Name', 'required');
		$this->form_validation->set_rules('LastName', 'Last Name', 'required');
		$this->form_validation->set_rules('UserName', 'User Name', 'required');
		$this->form_validation->set_rules('mobileNo', 'Mobile No', 'required');
		$this->form_validation->set_rules('emailId', 'Email Id', 'required');
        if ($this->form_validation->run() === FALSE){
        	 $data['userId']=$userid;
            if(!is_numeric($data['userId'] )){
                redirect('admin/manageuser/index');
            }
			$userDetails= $this->manageuser_models->getUserDetail($userid);
			//echo "<pre>";
			//print_r($userDetails);
            $data['userDetails'] = $userDetails[0];
            if(empty($data['userDetails'])){
                redirect('admin/manageuser/index');
            }
	        
        }else{
			$emailId = $this->input->post('emailId');
			$UserId = $this->input->post('UserId');
	        $UserNameExist = $this->manageuser_models->checkExistmanageUser ($emailId, $UserId);
	       	 if(empty($UserNameExist)){
	           // $data['UserName'] = $UserName;  
	            $retmsg = $this->manageuser_models->setUserInfo($UserId);
	            if($retmsg){
	                $this->session->set_flashdata('edit_success', $retmsg);
	            }else{
	               $this->session->set_flashdata('edit_unsuccess', $retmsg); 
	            }    
	            redirect('admin/manageuser/index');
         }else{
            $retmsg = 1;
            $this->session->set_flashdata('edit_unsuccess', $retmsg);
            redirect('admin/manageuser/editmanageuserdetail/'.$UserId);
         }
        }
		$this->load->view('header');
		$this->load->view('admin/editmanageuser',$data);
		$this->load->view('footer');
		}
	

    public function addmanageuser(){
    	$this->manageuser_models->addmanageuser();
		$this->load->view('header');	
        $this->load->view('admin/addmanageuser', $data);
		$this->load->view('footer');
	}
	

}    