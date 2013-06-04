<?php
class Login extends CI_Controller{
	public function __construct() 
    {
		parent::__construct();
		$this->load->library('form_validation');
	    $this->load->model('login_models');
	 } 
	 
	 public function index()
    {   
       if ($this->session->userdata('is_user_logged_in') == 1) 
        {
           redirect('../admin/welcome');
        }
        //$this->load->view('header');
        $this->load->view('/login');
        //$this->load->view('footer');
    }
 //csdgvdfgfdfgdfg
    public function authentication() 
    {    
    	 if(isset($_POST['btnlogin']))
        {
            $this->form_validation->set_rules('email','Username','required|valid_email|xss_clean');
            $this->form_validation->set_rules('password','Password','required|xss_clean');
            if($this->form_validation->run()===FALSE)
            {
        	redirect('login');
            }else{
            	$result = $this->login_models->checkUserLogin();
				//print_r($result);die();
                if (count($result) > 0){ 
                    $data = array(
                            'is_user_logged_in' => TRUE,
                            'userdata' => array(
                                'user_id' => $result[0]['UserId'],
                                'user_email' => $result[0]['emailId'],
                                'user_fname' => $result[0]['FirstName'],
                                'user_lname' => $result[0]['LastName'],
                                'user_mobile' => $result[0]['mobileNo'],
                                'User_TypeId'=> $result[0]['UserTypeId']
                            )
                        );
                    $this->session->set_userdata($data);
                    if($this->input->post('remember')=='remember'){
                        $server=$_SERVER['HTTP_HOST'];
                        $cookieEmail = array(
			    'name'   => 'email',
			    'value'  => $result[0]['emailId'],
			    'expire' => '15000000',
			    'domain' => $server,
			    'secure' => FALSE
			);
                        $this->input->set_cookie($cookieEmail);
                        $cookiePassword = array(
			    'name'   => 'password',
			    'value'  => $this->input->post('password'),
			    'expire' => '15000000',
			    'domain' => $server,
			    'secure' => FALSE
			);
			$this->input->set_cookie($cookiePassword);
                    }
                    
                    redirect('../admin/pdfmanager');
                }else{
                    $email=$this->input->post('email');
                    $enc_pass=md5($this->input->post('password'));
                    $cust_detail= $this->login_models->getUserDetail($email);
                    if($cust_detail['Status']=='Inactive')
                    {
                        $this->session->set_flashdata('message', 'Email id is banned');
                        redirect('../login');
                    }else{
                        $this->session->set_flashdata('message', 'Invalid email address or password entered');
                        redirect('../login');
                    }
                }    
            }
        }	
    }
    
    public function forgotPassword(){
        $this->load->view('forgot_password');
    }


	public function userDetail()
	{
		//echo "<pre>"; 
		//print_r($this->session->all_userdata()); 
		//die();
		$s_data = $this->session->all_userdata(); 
		$s_id = $s_data['userdata']['user_id'];
		$s_fname = $s_data['userdata']['user_fname'];
		$s_email = $s_data['userdata']['user_email'];
		//$s_pass = $s_data['userdata']['User_Password'];
		$data['s_id'] = $s_id;
		$data['s_fname'] = $s_fname;
		$data['s_email'] = $s_email;	
		//$data['s_pass'] = $s_pass;	
		$this->load->view('header');
        $this->load->view('/userDetail', $data);
        $this->load->view('footer');
	}
}