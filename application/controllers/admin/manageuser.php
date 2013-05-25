<?php
class Manageuser extends CI_Controller{
	
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('is_user_logged_in') != 1) {
            $this->load->view('/login');
        }
        $this->load->library('form_validation');
        $this->load->model('manageuser_models');
    } 
	 
   public function index(){	
		$this->load->model('manageuser_models');
		$data['query'] = $this->manageuser_models->manage_user();
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

	public function editmanageuserdetails()
	{
		$this->form_validation->set_rules('FirstName', 'Frist Name', 'required');
        if ($this->form_validation->run() === FALSE){
	        $this->load->model('manageuser_models');
			$userDataUpdate = $this->manageuser_models->editmanageuserdetails();
			$data['userDataUpdate'] = $userDataUpdate;
	    if(!is_numeric ($data['userDataUpdate'])){
	        $this->load->view('header');
			$this->load->view('admin/manageuser',$data);
			$this->load->view('footer');
        }else{
	        $FirstName = $this->input->post('FirstName');
	        $FirstNameExist = $this->manageuser_models->checkExistFirstName ($FirstName ,$UserId);
	       	 if(empty($FirstNameExist)){
	           /// $data['FirstName'] = $FirstName;  
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
		$this->load->view('admin/manageuser',$data);
		$this->load->view('footer');
		}
	}

    public function addmanageuser(){	
		//$this->load->model('manageuser_models');
		//$data = $this->manageuser_models->addmanageuser();
		/*if(isset($_POST) && $_POST != '' ){
		$data = array(
		'FirstName' => $_POST['FirstName'],
		'LastName' => $_POST['LastName'],
		'UserName' => $_POST['UserName'],
		'Password' => $_POST['Password'],
		'Status' => $_POST['Status'],
		'UserTypeId' => $_POST['UserTypeId'],
		'mobileNo' => $_POST['mobileNo'],
		'emailId' => $_POST['emailId'],
	   	);
		$this->$data = $this->manageuser_models->addmanageuser($data);
		}*/
		$this->load->view('header');	
        $this->load->view('admin/addmanageuser');
		$this->load->view('footer');
	}
	

}    