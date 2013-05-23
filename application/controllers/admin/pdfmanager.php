<?php
class Pdfmanager extends CI_Controller{
	
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('is_user_logged_in') != 1) {
            $this->load->view('/login');
        }
        $this->load->library('form_validation');
        $this->load->model('Pdfmanager_models');
    } 
	 
    public function index() {   
      
        $this->load->view('header');
        $pdflistDetails = array();
        $pdflistDetails = $this->Pdfmanager_models->getPdfList();
        $data['pdflistDetails'] = $pdflistDetails;
        //echo "<pre>";
        //print_r($pdflistDetails);die;
        $this->load->view('admin/pdflist',$data);
        $this->load->view('footer');
    }
}    