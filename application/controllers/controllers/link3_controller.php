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
    
    public function DB_A_FNOC_search_pending_task_by_id($search_id){
     
        $data=array();       
        $data['search_id'] = $this->employee_database->select_fonoc_id();
//        $search_id = $this->input->post('search_id');

//        if ($type_task != "") {
            $result = $this->employee_database->fonoc_pending_data_by_id_model($search_id);
//            if ($result != false) {
             $data['result_display'] = $result;
//            } else {
//                $data['result_display'] = "No record found !";
//            }
//        } else {
//            $data = array(
//                'id_error_message' => "Id field is required"
//            );
//        }
//        $data['show_table'] = $this->view_table();
        $data['maincontent']=  $this->load->view('fonoc_pending_task_by_id',$data,true);
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
        
        
        $config["base_url"] = base_url() . "index.php/link3_controller/fonoc_all_pending_list_funcation/";
        $config["total_rows"] = $this->employee_database->record_count_pending();
        $config["per_page"] =10;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->employee_database->
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
        
        
        $config["base_url"] = base_url() . "index.php/link3_controller/fonoc_all_done_list_funcation/";
        $config["total_rows"] = $this->employee_database->record_count_pending();
        $config["per_page"] =10;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->employee_database->
                fonoc_done_task_with_Pagination_model($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
     
        
//         $data['result']=$this->registration_model->all_pending_list_model();
//           echo"<pre>";
//           print_r($data);
//           echo"</pre>";
        $data['maincontent']= $this->load->view('fonoc_done_list',$data,true);
        $this->load->view('home',$data);    
    }
    
    
       public function fonoc_edit_task_done($ticket_no){
        $data = array();
        
         $data['C_result'] = $this->employee_database->FONOC_task_category();
        
        
        $data['result'] = $this->employee_database->edit__task_done_model($ticket_no);

//           echo"<pre>";
//             print_r($data);
//             echo"</pre>";
        $data['maincontent'] = $this->load->view('fonoc_edit_task_pending', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    
    
     public function fonoc_update_task_done(){
                
        $data=array();
        $data['Problem_Catagory']=$this->input->post('Problem_Category');        
        $data['end_date']=$this->input->post('end_date');
        $data['status']=$this->input->post('states');
        $data['comments']=$this->input->post('comments');  
//        echo"<pre>";
//             print_r($data);
//        echo"</pre>";
        $ticket_no = $this->input->post('p_key');
        
        $this->employee_database->fonoc_update_task_done_model($ticket_no, $data);  
        
        $sdata=array();
        $sdata['message']='Task Complete susscefully';
        $this->session->set_userdata($sdata);
        
        redirect("index.php/link3_controller/fonoc_all_pending_list_funcation");
        
    }
    
   public function fonoc_pending_data_by_id(){
        
        $data=array();       
        $data['search_id'] = $this->employee_database->select_fonoc_id();
        $search_id = $this->input->post('search_id');

//        if ($type_task != "") {
            $result = $this->employee_database->fonoc_pending_data_by_id_model($search_id);
//            if ($result != false) {
             $data['result_display'] = $result;
//            } else {
//                $data['result_display'] = "No record found !";
//            }
//        } else {
//            $data = array(
//                'id_error_message' => "Id field is required"
//            );
//        }
//        $data['show_table'] = $this->view_table();
        $data['maincontent']=  $this->load->view('fonoc_pending_task_by_id',$data,true);
        $this->load->view('home',$data); 
        
    }
    
    public function fonoc_done_data_by_id(){
        
        $data=array();       
        $data['search_id'] = $this->employee_database->select_fonoc_id();
        $search_id = $this->input->post('search_id');
        
        $Date = $this->input->post('date_from');
        $_SESSION["done_date_from_ID"] = $Date;

        $date_from = date("Y-m-d 00:00:00", strtotime($Date));
        $date1 =  $date_from;

        $Date1 = $this->input->post('date_to');
        $_SESSION["done_date_to_ID"] = $Date1;
        $date_to = date("Y-m-d 23:59:59", strtotime($Date1));
        $date2 = $date_to;

        $date_array = array(
            'date1' => $date1,
            'date2' => $date2
        );

            $result = $this->employee_database->fonoc_done_data_by_id_model($search_id,$date_array);

             $data['result_display'] = $result;
        $data['maincontent']=  $this->load->view('fonoc_done_task_by_id',$data,true);
        $this->load->view('home',$data); 
        
    }
   
    public function fonoc_done_by_date_range(){
        
        $data=array();       
       
        $Date = $this->input->post('date_from');
        $_SESSION["done_date_from_ID"] = $Date;

        $date_from = date("Y-m-d 00:00:00", strtotime($Date));
        $date1 =  $date_from;

        $Date1 = $this->input->post('date_to');
        $_SESSION["done_date_to_ID"] = $Date1;
        $date_to = date("Y-m-d 23:59:59", strtotime($Date1));
        $date2 = $date_to;

        $date_array = array(
            'date1' => $date1,
            'date2' => $date2
        );

            $result = $this->employee_database->fonoc_done_by_date_model($date_array);

             $data['result_display'] = $result;
        $data['maincontent']=  $this->load->view('fonoc_done_task_by_date',$data,true);
        $this->load->view('home',$data); 
        
    }
    
    
}

?>