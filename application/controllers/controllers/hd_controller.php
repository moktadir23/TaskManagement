<?php

class Hd_controller extends CI_Controller {
    
        public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->library("pagination");
        
        $this->load->model('registration_model');
        $this->load->library('table');
        $this->load->model('employee_database');
        $this->load->library('session');
       
//        $this->load->database();
//        $this->load->library('Excel');
        
        $user_id = $this->session->userdata('user_id');
        $id = $this->session->userdata('id');
     
        if ($user_id == NULL) {
            redirect('index.php/admin', 'refresh');
        }
       
    }
    

    public function hd_assin_task(){
        $data = array();
//        $data['result'] = $this->registration_model->assign_task_page_category();
        $data['maincontent'] = $this->load->view('hd_assin_task', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    }     
    public function Agent_Performance_Report(){
        $data = array();
//        $data['result'] = $this->registration_model->assign_task_page_category();
        $data['maincontent'] = $this->load->view('hd_Agent_Performance_Report', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    }    
    public function Drop_Call_Report(){
        $data = array();
//        $data['result'] = $this->registration_model->assign_task_page_category();
        $data['maincontent'] = $this->load->view('hd_Drop_Call_Report', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    }
    public function Problem_Category_Report(){
        $data = array();
//        $data['result'] = $this->registration_model->assign_task_page_category();
        $data['maincontent'] = $this->load->view('hd_Problem_Category_Report', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    }
    public function Call_Center_Performance_Report(){
        $data = array();
//        $data['result'] = $this->registration_model->assign_task_page_category();
        $data['maincontent'] = $this->load->view('hd_Call_Center_Performance_Report', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    }
    
    
    
}

?>