<?php

class Link3_controller extends CI_Controller {
    
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
    
    
    

    public function index(){            
    $data=array();
    $data['maincontent']=  $this->load->view('home_message','',true);
    $this->load->view('home',$data);
    }
    
    public function fonoc_assin_task(){
        
        $data = array();
//        $data['result'] = $this->registration_model->assign_task_page_category();
        $data['maincontent'] = $this->load->view('fonoc_assin_task', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    } 
    
     public function fonoc_all_pending_list_funcation(){
        
        $data=array(); 
        //$states=$this->session->userdata('$states');
//        $data['result']=$this->registration_model->view_report_list_model($task_info_id);
        
        
        $config["base_url"] = base_url() . "index.php/welcome/all_pending_list_funcation/";
        $config["total_rows"] = $this->registration_model->record_count_pending();
        $config["per_page"] =10;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->registration_model->
                pending_task_with_Pagination_model($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
     
        
//         $data['result']=$this->registration_model->all_pending_list_model();
//           echo"<pre>";
//           print_r($data);
//           echo"</pre>";
        $data['maincontent']= $this->load->view('fonoc_pending_list',$data,true);
        $this->load->view('home',$data);    
    }
    
    public function fonoc_all_done_list_funcation(){
    
          $data=array(); 
        //$states=$this->session->userdata('$states');
//        $data['result']=$this->registration_model->view_report_list_model($task_info_id);
        
        
        $config["base_url"] = base_url() . "index.php/welcome/all_pending_list_funcation/";
        $config["total_rows"] = $this->registration_model->record_count_pending();
        $config["per_page"] =10;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->registration_model->
                pending_task_with_Pagination_model($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
     
        
//         $data['result']=$this->registration_model->all_pending_list_model();
//           echo"<pre>";
//           print_r($data);
//           echo"</pre>";
        $data['maincontent']= $this->load->view('fonoc_done_list',$data,true);
        $this->load->view('home',$data);    
        
        
    }
  
}

?>