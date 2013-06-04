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
            $pdflistDetails[$key]['mapUserTo$pdflistDetailsPdf'] = $this->Pdfmanager_models->getUserNotMappedToPdf($pdflistDetail['pdfFileId']);
            $pdflistDetails[$key]['alreadyMapUserToPdf'] = $this->Pdfmanager_models->getMappedUsers($pdflistDetail['pdfFileId']);
            
        }
        //echo "<pre>";
       // print_r($pdflistDetails);
        $data['pdflistDetails'] = $pdflistDetails;
        $this->load->view('admin/pdflist',$data);
        $this->load->view('footer');
    }
    /**
    * deletePdfFile
    *
    * Delete the yard city 
    * 
    * @author   
    * @access	public
    * @return	void
    */
    public function deletePdfFile($pdfId){
        if(isset($pdfId) && $pdfId!=''){
            $pdflistDetails = $this->Pdfmanager_models->getMappedUsers($pdfId);
            //echo "<pre>";
            //print_r($pdflistDetails);die;
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
     * @author   
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
      
       /*if(isset($_POST['Upload'])){
           if(empty($_FILES['uploadfile_1']['name'])){
            $retmsg = 1;
            $this->session->set_flashdata('upload_fail', $retmsg);
           }else{
               echo "here";
               $this -> load -> library('upload');
               $config['allowed_types']= '*';
               $config['upload_path'] = './public/upload/';
               foreach ($_FILES as $key => $value){
                    if (!empty($key['name'])){
                         $this->upload->initialize($config);
                        if (!$this->upload->do_upload($key)){
                            $errors = $this->upload->display_errors();
                            flashMsg($errors);
                        }else{
                            echo "<pre>";
                            print_r($key);
                            print_r($value);die;
                        }
                    }
               }
              
               $fileDatas = $_FILES['uploadfile']['name'];
               if($PDFUpload){  
                   $fileName = substr($fileData,0,strpos($fileData,'.'));
                   $insertResult = $this->Pdfmanager_models->addPdf($fileName);
                   if($insertResult !==False){
                     $retmsg = 1;
                     $this->session->set_flashdata('add_success', $retmsg);
                     redirect('admin/pdfmanager/index');
                   }else{
                      $retmsg = 1;
                   } 
                   $this->session->set_flashdata('add_unsuccess', $retmsg);
                   redirect('admin/pdfmanager/index'); 
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
       $this->load->view('addNewPdf',$data);*/
       if(isset($_POST['Upload'])){
            if(empty($_FILES['uploadfile_1']['name'])){
            $retmsg = 1;
            $this->session->set_flashdata('upload_fail', $retmsg);
           }else{
               $this -> load -> library('upload');
               $config['allowed_types']= '*';
               $config['upload_path'] = UPLOAD_FILE_PATH;
               $this->upload->initialize($config);
               //echo "<pre>";
              // print_r($_FILES);die;
              foreach ($_FILES as $key => $value){
                if (!empty( $_FILES[$key]['name'])){
                    if(!$this -> upload -> do_upload($key)){
                        $this->upload->display_errors('<p>', '</p>');
                    }
                    else{
                      $file_data =   $this->upload->data();
                       $fileName = $file_data['file_name'];
                       $insertResult = $this->Pdfmanager_models->addPdf($fileName); 
                       if($insertResult ===False){
                          $retmsg = 1; 
                          $this->session->set_flashdata('add_unsuccess', $retmsg);
                          redirect('admin/pdfmanager/index');   
                       }
                    }
                }
              }
              if($insertResult !==False){
                $retmsg = 1;
                $this->session->set_flashdata('add_success', $retmsg);
                redirect('admin/pdfmanager/index');
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
   
    /*function UploadPDF($upload_path=array(),$files=array())
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
                    $data[$i]     =  array('upload_data' => $this->upload->data());
                    $pdfPath[$i]  =  $data[$i]['upload_data']['full_path'];
                                            
                   // return $pdfPath;
                }
            }
        }
        return FALSE;
    } */ 
    /**
     * downloadPdf
     * 
     * download pdf file
     * @author   
     * @access	public
     * @return	void
    */
   public function downloadPdf($pdfId){
     
      /*$this->load->helper('download');
      $pdfFileDetails= $this->Pdfmanager_models->getPdfDetail($pdfId);
      $filename = $pdfFileDetails[0]['pdfFilename']; 
      $fileLocation =UPLOAD_FILE_PATH.$filename;
      header("Content-Type: application/octet-stream");
      $data = file_get_contents($fileLocation); // Read the file's contents
      force_download($filename, $data); */
      $this->load->helper('file');
      $this -> load -> library('upload');
      $pdfFileDetails= $this->Pdfmanager_models->getPdfDetail($pdfId);
      $filename = $pdfFileDetails[0]['pdfFilename'];
      $fileLocation = './public/upload/'.$filename;
      //echo filemtime ($fileLocation);die;
      $mime = get_mime_by_extension($filename);
      header('Pragma: public');     // required
      header('Expires: 0');         // no cache
      header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
      //header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($fileLocation)).' GMT');
      header('Cache-Control: private',false);
      header('Content-Type: '.$mime);  // Add the mime type from Code igniter.
      header('Content-Disposition: attachment; filename="'.basename($fileLocation).'"');  // Add the file name
      header('Content-Transfer-Encoding: binary');
      header('Content-Length: '.filesize($fileLocation)); // provide file size
      header('Connection: close');
      readfile($fileLocation); // push it out
      exit(); 
   }
   
   /**
     * revokeUserFromPdf
     * 
     * revoke the accesss from user of PDF
     * @author   
     * @access	public
     * @return	void
    */
   public function revokeUserFromPdf($pdfId){
       $this->form_validation->set_rules('User[]', 'Select User To Revoke Permission', 'required');
       if ($this->form_validation->run() === FALSE){
           $UserList = $this->Pdfmanager_models->getUserNotMappedToPdf($pdfId);
           $revokeUserList = $this->Pdfmanager_models->getMappedUsers($pdfId);
           $data['UserList'] = $UserList;
           $data['revokeUserList'] = $revokeUserList;
           $data['pdfId'] = $pdfId;
       }else{
           $retmsg = $this->Pdfmanager_models->unsetUserPdfAccess($pdfId);
            if($retmsg){
                $this->session->set_flashdata('revokeAccess_success', $retmsg);
            }else{
               $this->session->set_flashdata('revokeAccess_unsuccess', $retmsg); 
            }    
            redirect('admin/pdfmanager/index'); 
       }
       $this->load->view('header');
       $this->load->view('footer');
       $this->load->view('admin/revokePdfFromUser',$data);
   }
   
  
         
    
}    