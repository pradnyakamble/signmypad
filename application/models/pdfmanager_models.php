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
        $this->db->where('pdf_resources.Status','Active');
        $query = $this->db->get();
	//echo $this->db->last_query();
        return $query->result_array();
    }
}    