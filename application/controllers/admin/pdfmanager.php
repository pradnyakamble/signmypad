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
     // $str = "Isfsdfsdfsd am with";
      //$str = substr_replace($str,'',strpos($str, ' ',(strpos($str, ' ')+1)),1);
      //echo $str;
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
   public function mappUserToPdf($pdfId){
        $this->form_validation->set_rules('User[]', 'Select User', 'required');
        if ($this->form_validation->run() === FALSE){	
            $mapUserToPdf = $this->Pdfmanager_models->getUserNotMappedToPdf($pdfId);
            $data['mapUserToPdf'] = $mapUserToPdf;
            $data['pdfId'] = $pdfId;
        }else{
           $retmsg = $this->Pdfmanager_models->setUserPdfAccess($pdfId);
            if($retmsg){
                $this->session->set_flashdata('allowAccess_success', $retmsg);
            }else{
               $this->session->set_flashdata('allowAccess_unsuccess', $retmsg); 
            }    
            redirect('admin/pdfmanager/index'); 
        }  
        $this->load->view('header');
        $this->load->view('footer');
        $this->load->view('assignPdfToUser',$data);
        
   }
   
   public function addNewPdfFile(){
      
       if(isset($_POST['Upload'])){
           if(empty($_FILES['uploadfile']['name'])){
            $retmsg = 1;
            $this->session->set_flashdata('upload_fail', $retmsg);
           }else{
               $path = './public/upload/';
               $pdf_path    = array($path);
               $pdf_files    = array('uploadfile'); // FILE INPUT NAME
               $PDFUpload    = $this -> UploadPDF($pdf_path, $pdf_files);
               if($PDFUpload){
                   $PdfId = $this->Pdfmanager_models->addPdf();
                   if($PdfId !==False){
                       if(isset($_POST['User']) && !empty($_POST['User'])){
                        $msg = $this->Pdfmanager_models->setUserPdfAccess($PdfId);
                       }
                     $retmsg = 1;
                     $this->session->set_flashdata('add_success', $retmsg);
                     redirect('admin/pdfmanager/index');
                   }else{
                      $retmsg = 1;
                      $this->session->set_flashdata('add_unsuccess', $retmsg);
                      redirect('admin/pdfmanager/index'); 
                   } 
               }else{
                $retmsg = 1;
                $this->session->set_flashdata('upload_fail', $retmsg);   
               }
           } 
       }else{
          $mapUserToPdf = $this->Pdfmanager_models->getUserNotMappedToPdf();
          $data['mapUserToPdf'] = $mapUserToPdf;  
       }
       
       $this->load->view('header');
       $this->load->view('footer');
       $this->load->view('addNewPdf',$data);
   }
   
    function UploadPDF($upload_path=array(),$files=array())
    {
        $this -> load -> library('upload'); // moved outside loop
        $config['allowed_types']= '*';
        $pdfPath[]        = array();
        $data[]            = array();
                        
        $count_files         = count($files);
                        
        for($i = 0; $i < $count_files; $i++)
        {
            $config['upload_path'] = $upload_path[$i];
            $this->upload->initialize($config); // added
            if(isset($files[$i]) || is_array($files[$i]))
            {
                if(!$this -> upload -> do_upload($files[$i]))
                {
                    $this->upload->display_errors('<p>', '</p>');
                }
                else
                {
                        $data[$i]     = array('upload_data' => $this->upload->data());
                    $pdfPath[$i]     = $data[$i]['upload_data']['full_path'];
                                            
                    return $pdfPath;
                }
            }
        }
        return FALSE;
    }  
    
         
    
}    