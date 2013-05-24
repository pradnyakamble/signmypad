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
    
    public function deletePdf($pdfId){
        if(isset($pdfId) && $pdfId!=''){
            $pdflistDetails = $this->Pdfmanager_models->getMappedUsers();
            
        }
    }     
        
    public function editPdfDetail($pdfId){
        $this->form_validation->set_rules('pdfFileName', 'Pdf File Name', 'required');
        if ($this->form_validation->run() === FALSE){	
            $data['pdfId']=$pdfId;
            if(!is_numeric ($data['pdfId'])){
                redirect('admin/pdfmanager/index');
            }
            $pdfFileDetails= $this->Pdfmanager_models->getPdfDetail($pdfId);
            $data['pdfFileDetails'] = $pdfFileDetails[0];
            if(empty($data['pdfFileDetails'])){
                redirect('admin/pdfmanager/index');
            }
        }else{
          $pdfFileName = $this->input->post('pdfFileName');
          $pdfFileExist = $this->Pdfmanager_models->checkExistPdfFileName($pdfFileName,$pdfId);
          if(empty($pdfFileExist)){
           /// $data['pdfFileName'] = $pdfFileName;  
            $retmsg = $this->Pdfmanager_models->setPdfInfo($pdfId);
            if($retmsg){
                $this->session->set_flashdata('edit_success', $retmsg);
            }else{
               $this->session->set_flashdata('edit_unsuccess', $retmsg); 
            }    
            redirect('admin/pdfmanager/index');
         }else{
            $retmsg = 1;
            $this->session->set_flashdata('edit_unsuccess', $retmsg);
            redirect('admin/pdfmanager/editPdfDetail/'.$pdfId);
         }
        }
        $this->load->view('header');
         $this->load->view('footer');
	$this->load->view('editPdfDetails',$data);
       

    }
        
    
         
    
}    