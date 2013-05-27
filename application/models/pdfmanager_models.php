<?php

class Pdfmanager_models extends CI_Model{
    
    function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }
    
    function getPdfList(){
        $this->db->select('pdf_resources.* ,Users.FirstName,Users.LastName');
        $this->db->from('pdf_resources');
        $this->db->join('Users', 'Users.UserId = pdf_resources.CreatedBy');
        //$this->db->where('pdf_resources.Status','published');
        $query = $this->db->get();
	//echo $this->db->last_query();
        return $query->result_array();
    }
    
    function getMappedUsers($pdfId){
        $this->db->select('pdf_access_details.PdfFileId,Users.FirstName,Users.LastName');
        $this->db->from('pdf_access_details');
        $this->db->join('Users', 'Users.UserId = pdf_access_details.UserId');
        $this->db->where('Users.Status','Active');
        $this->db->where('pdf_access_details.PaymentStatus','1');
        $this->db->where('pdf_access_details.PdfFileId',$pdfId);
        $query = $this->db->get();
	//echo $this->db->last_query();
        return $query->result_array();
    }
    
    function getPdfDetail($id){
        //echo "here";die;
        $this->db->select('pdf_resources.*');
        $this->db->from('pdf_resources');
        $this->db->where('pdf_resources.pdfFileId',$id);
        $query = $this->db->get();
        //echo "<pre>";
        return $query->result_array();
    }
    /**
     * checkExistPdfFileName
     *
     * checks pdf file name already exist or not
     * 
     * @author   pradnya kamble
     * @access	public
     * @return	array
     */
    public function checkExistPdfFileName($pdfFileName, $pdfId = '') {
        $this->db->select('*');
        
        if ($pdfId) {
            $this->db->where('pdfFileId !=', $pdfId);
        }
        $this->db->like('pdfFilename',$pdfFileName, 'none');
        $query = $this->db->get('pdf_resources');
        return $query->result_array();
    }
    /**
     * setPdfInfo
     *
     * Set Pdf data 
     * 
     * @author   pradnya kamble
     * @access	public
     * @return	int
     */
    public function setPdfInfo($pdfId) {
        $data = array('pdfFilename'=>$_POST['pdfFileName'],
                       'status' =>$_POST['status'] );
        $this->db->where('pdfFileId', $pdfId);
        $result = $this->db->update('pdf_resources', $data);
       return $result;
    }
    
    /**
     * delPdfFile
     * 
     * delete pdf file
     * @author pradnya kamble
     * @access public
     * @return int 
     */ 
   public function delPdfFile($pdfId){
      $result =  $this->db->delete('pdf_resources', array('pdfFileId' => $pdfId)); 
      return $result;
   }
   
   /**
    * getUserNotMappedToPdf
    * 
    * get list of user who have paid for pdf but not having access to the file
    * @author pradnya kamble
    * @access public
    * @return int 
    */
   public function getUserNotMappedToPdf($pdfId=''){
        $this->db->select('Users.UserId,Users.FirstName,Users.LastName');
        $this->db->from('Users');
        if(isset($pdfId) && $pdfId!=''){
            $where = "UserId  Not in (SELECT UserId FROM `pdf_access_details` WHERE `PdfFileId` =".$pdfId.") and `UserTypeId` =3";
             
            }else{
             $where =    "`UserTypeId` =3";
            }
       $this->db->where($where);
        $query = $this->db->get();
        return $query->result_array();
   }
   
   
   public function setUserPdfAccess($pdfId){
      // echo "<pre>";
       //print_r($_POST);die;
       $users = $_POST['User'];
      foreach($users as $user){
        $data = array(
                'UserId' => $user,
                'PaymentId' =>  '1',
                'PdfFileId' =>  $pdfId,
                'PaymentStatus'=>'1',
                'Access'=>'1',
                'comment'=>$_POST['comment'],
             );
       $resultInserted = $this->db->insert('pdf_access_details', $data); 
       /*if($resultInserted){
         $updatedata = array(
                'accessAllowed' =>'1'
              );
         $this->db->where('PaymentId', $paymentId);
         $updateResult = $this->db->update('payment_details',$updatedata);
         if($updateResult){
             return true;
         }else{
             $this->db->delete('pdf_access_details', array('AccessId' => $this->db->insert_id())); 
             return false;
         }

       }else{
           return false;
       }*/
       if(!$resultInserted){
           return false;
       }
      }
      if($resultInserted){
          return true;
      }
       
   }
   
   public function addPdf(){
       $fileData = $_FILES;
       $fileName = substr($fileData['uploadfile']['name'],0,strpos($fileData['uploadfile']['name'],'.'));
       $userSessData = $this->session->userdata('userdata');
       $data = array(
        'pdfFilename' => $fileName,
        'CreatedBy' => $userSessData['user_id'],
       'status' =>'published'
       );
       $this->db->set('createdOn', 'NOW()', FALSE);
       $insertResult = $this->db->insert('pdf_resources', $data); 
       if($insertResult){
       return  $this->db->insert_id();
       }else{
           return false;
       }
       
   }
   
}    