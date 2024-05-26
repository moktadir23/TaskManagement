<?php
//session_start();

//header("Access-Control-Allow-Origin: *");
//require(APPPATH . '/libraries/REST_Controller.php');

defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'libraries/REST_Controller.php');


class Mis_client_api extends CI_Controller  {
//    
//        public function __construct() {
//        parent::__construct();
//        $this->load->helper("url");
//        $this->load->library("pagination");
//        
//        $this->load->helper('file');
//        $this->load->helper(array('form', 'url'));
////        $this->load->model('registration_model');
////        $this->load->model('ert_model');
//        $this->load->model('hd_model');
//        $this->load->library('table');
//        $this->load->library('session');
//       
////        $this->load->database();
////        $this->load->library('Excel');
//        
//        $user_id = $this->session->userdata('user_id');
//        $id = $this->session->userdata('id');
//     
//        if ($user_id == NULL) {
//            redirect('index.php/admin', 'refresh');
//        }
//       
//    }
   
    public function test_api(){
        echo 'TEST.... ';  
         $this->response($this->post());
    }
    
    
    
}