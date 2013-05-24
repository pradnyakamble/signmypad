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
		$this->load->model('manageuser_models');
		$userDataUpdate = $this->manageuser_models->editmanageuserdetails();
		if($userDataUpdate){
			$data['successmsg'] = 1;
		}else{
			$data['failmsg'] = 1;
		}
		$this->load->view('header');
		$this->load->view('admin/manageuser',$data);
		$this->load->view('footer');
		
	}
	
	function manageusersuccess()
	{
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('header');	
			$this->load->view('admin/manageusersuccess');
			$this->load->view('footer');
		}
		else
		{
			$this->load->view('header');
			$this->load->view('admin/editmanageuser');
			$this->load->view('footer');
		}
	}

}    