<?php
class Pdfmanager extends CI_Controller{
	
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('is_user_logged_in') != 1) {
            redirect('../login');
        }
        $this->load->library('form_validation');
        $this->load->model('Pdfmanager_models');
    } 
	 
    public function index() {   
      
        $this->load->view('header');
        $pdflistDetails = array();
        $pdflistDetails = $this->Pdfmanager_models->getPdfList();
        foreach($pdflistDetails as $key =>$pdflistDetail){
            $pdflistDetails[$key]['mapUserToPdf'] = $this->Pdfmanager_models->getUserNotMappedToPdf($pdflistDetail['pdfFileId']);
        }
        $data['pdflistDetails'] = $pdflistDetails;
        $this->load->view('admin/pdflist',$data);
        $this->load->view('footer');
    }
    /**
    * deletePdfFile
    *
    * Delete the yard city 
    * 
    * @author   pradnya kamble
    * @access	public
    * @return	void
    */
    public function deletePdfFile($pdfId){
        if(isset($pdfId) && $pdfId!=''){
            $pdflistDetails = $this->Pdfmanager_models->getMappedUsers($pdfId);
             if(empty($pdflistDetails)){
                 $retmsg = $this->Pdfmanager_models->delPdfFile($pdfId);
                 $this->session->set_flashdata('del_success', $retmsg);
                 redirect('admin/pdfmanager/index');
             }else{
                $retmsg = 1;
                $this->session->set_flashdata('del_unsuccess', $retmsg);
                redirect('admin/pdfmanager/index');
             }
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
    
    
    /**
     * mappUserToPdf
     * 
     * allow the user(who have paid for that) to acccess pdf 
     * @author   pradnya kamble
     * @access	public
     * @return	void
    */
        
    
         
    
}    