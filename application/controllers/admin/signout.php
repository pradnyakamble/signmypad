<?php
/**
* SignMyPad
*
* @package		SignmyPAd
* @subpackage           Controller
* @author		pradnya Kamble
* @copyright	        Copyright (c) 2012 - 2013 
* @since		Version 1.0
* @purpose              To handle signout process for administrator
*/
class Signout extends CI_Controller {
    public function __construct() {
        parent::__construct();

    }

    public function index() {
        $this->session->sess_destroy();
        redirect('../login');
    }
}