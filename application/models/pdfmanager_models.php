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
    public function checkExistPdfFileName($pdfFileName, $pdfId = FALSE) {
        $this->db->like('pdfFilename',$pdfFileName, 'none');
        if ($pdfId) {
            $this->db->where('pdfFileId !=', $pdfId);
        }
        $query = $this->db->get('Users');
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
        $result = $this->db->update('Users', $data);
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
   public function getUserNotMappedToPdf($pdfId){
        $this->db->select(' payment_details.*');
        $this->db->from(' payment_details');
        $this->db->where(' payment_details.accessAllowed',0);
        $this->db->where('PdfFileId', $pdfId);
        $query = $this->db->get();
        return $query->result_array();
   }
   
}    