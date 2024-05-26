<?php

class Wi_controller extends CI_Controller {
    
        public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->library("pagination");
        $this->load->model('ert_model');
        $this->load->library('table');
        $this->load->library('session');
       
//        $this->load->database();
//        $this->load->library('Excel');
        
        $user_id = $this->session->userdata('user_id');
        $id = $this->session->userdata('id');
     
        if ($user_id == NULL) {
            redirect('index.php/admin', 'refresh');
        }
       
    }
    

        public function assign_task(){
        
//            echo 'TEST'; 
            
        $data = array();
        $data['result'] = $this->ert_model->wi_assign_task_page_category();
        $data['maincontent'] = $this->load->view('wi_assin_task', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    } 
    
    
 public function save_task_info_funcation(){
            
           $id = $this->session->userdata('id');
           $s_zone = $this->session->userdata('Zone');
            $data=array();           
            $data['create_id']=$id;    
            $data['zone_of_employee']=$s_zone;
            
            $Division=$this->input->post('Division');
           
            if($Division!=null){
                 $data['Division']=$Division;
            }else{
                 $data['Division']=$this->input->post('MTU_Zone');
            }
            
           
            
            $data['bts']=$this->input->post('bts');
            $data['Client_id']=$this->input->post('Client_id');
            $data['Client_Name']=$this->input->post('Client_Name');   
            $data['tki_id']=$this->input->post('tki_id'); 
            $data['type_task']=$this->input->post('type_task');
            $data['Initial_Problem_Category']=$this->input->post('Initial_Problem_Category');
            $data['Engineer_Name']=$this->input->post('Engineer_Name');
            $data['Engineer_ID']=$this->input->post('Engineer_ID');  
            

            $Date = $this->input->post('s_date');
            $new_start_date = date("Y-m-d h:i:s", strtotime($Date));
            $data['s_date']=$new_start_date; 
            $data['media']=$this->input->post('media');
            $data['comments']=$this->input->post('comments');
            $data['status']='pending';
            
            $result=$this->ert_model->wi_save_task_info_model($data);  
// sss                   
//            echo '<pre>';
//            print_r($result);
//            echo '</pre>';       
      
        
            
//            $sdata=array();
//            $sdata['message']='Save Task successfully';
//            $this->session->set_userdata($sdata);
//        redirect("index.php/ert_controller/ert_assin_task");
       
    }
    
      
    public function pick_engineer_id(){
      
       $Engineer_Name=$this->input->post('Engineer_Name');   
       $result = $this->registration_model->pick_Engineer_ID_model($Engineer_Name);
       echo json_encode($result);
        
    }
    
    public function wi_pending_task(){
        
        $data = array();
//      .......................  pagination  ...................................................................  
        
        $config["base_url"] = base_url() . "index.php/wi_controller/wi_pending_task/";
        $nmuber = $this->ert_model->wi_pending_list_record_count();
        $i=0;
        foreach ($nmuber as $value) {
         $i++;  
        }
//        echo 'i......'.$i;
        
        
        $config["total_rows"] = $i;
        $config["per_page"] = 50;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["pending_task_result"] = $this->ert_model->
                wi_Pagination_pending_model($config["per_page"], $page);
        
        $data["links"] = $this->pagination->create_links(); 
        

//      ...............................................................................................
        
//        $data['pending_task_result'] = $this->ert_model->wi_pick_pending_task();
        
        
        $data['maincontent'] = $this->load->view('wi_pending_list', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    
    public function wi_done_task(){
        
        $data = array();
//        $data['result'] = $this->ert_model->ert_assign_task_page_category();
        
        $data['done_task_result'] = $this->ert_model->wi_pick_done_task();
        $data['maincontent'] = $this->load->view('wi_done_list', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    
    public function wi_done_task_from($p_key){
     
        $data = array();
//        $data['pick_comments'] = $this->ert_model->ERT_view_comments_model($p_key);      
        $data['result'] = $this->ert_model->wi_pick_done_catogry();        
        $data['pending_task_result'] = $this->ert_model->wi_pick_pending_single_task($p_key); 
        
        $data['maincontent'] = $this->load->view('wi_done_task_from', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    public function ERT_update_new_comments(){
        
        $c_data=array();     
        $c_data['p_key']=$this->input->post('p_key');
        $id = $this->session->userdata('id');        
        $c_data['employee_id']=$id;
        $c_data['support_type']=$this->input->post('support_type'); 
        $c_data['comments']=$this->input->post('comments');               
        $this->ert_model->ERT_update_new_comments_model($c_data);  
//..........................................................
        $data=array();
        $p_key=$this->input->post('p_key');       
        $Date = $this->input->post('e_date');
        $end_date = date("Y-m-d H:i:s", strtotime($Date));

        $data['e_date']=$end_date;
//        $data['e_date']=date("Y-m-d H:i:s");
        $data['Status']=$this->input->post('status');
        $Status=$this->input->post('status');
        if($Status == 'Active' || $Status == 'Collected' || $Status == 'Device lost' ){
           $data['ONU_opration_status']=1;  
        }
//        $data['Status']='TEST';
        
        $update=$this->ert_model->ERT_update_status_model($p_key,$data);
        
//        echo '<pre>';
//        print_r($update);
        
        
//        $returnData = array(
//            
//            "id" =>  $c_data['employee_id'],
//            "comments_date" => 'test',
//            "comments" =>  $c_data['comments'],
////            "Document_Type" => $attach_file_data['Document_Type'],
//        );
        echo json_encode($update);
    }
     public function wi_DB_pending_task_by_id($Engineer_ID){
      $data = array();       
      
//      $data['result'] = $this->ert_model->pick_Division();
/////////////////////////////////////////////////////////////////////////////////////////////////
//$Date = $this->input->post('date_from');
//$date_from = date("Y-m-d 00:00:00", strtotime($Date));
//$date1 =  $date_from;
//
//
//$Date1 = $this->input->post('date_to');
//$date_to = date("Y-m-d 23:59:59", strtotime($Date1));
//$date2 = $date_to;
//
//$date_array = array(
//    'date1' => $date1,
//    'date2' => $date2
//);
///////////////////////////////////////////////////////////////////////////////////////////////    

//    $Engineer_ID = $this->input->post('Engineer_ID');  
//                    $Engineer_ID ='L3T112';
    
    $data['pending_list_result'] = $this->ert_model->wi_DB_pending_list_by_Engineer_ID_model($Engineer_ID); 
     
//    echo '<pre>';
////    echo 'E ID :'.$Engineer_ID;
//    print_r($data['pending_list_result']);
      //      ...............................................................................................  
         
       $data['maincontent'] = $this->load->view('wi_pending_task_by_id', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    }
    
    
    public function wi_pending_task_by_id(){
      $data = array();       
      
      $data['result'] = $this->ert_model->pick_Division();
/////////////////////////////////////////////////////////////////////////////////////////////////
$Date = $this->input->post('date_from');
$date_from = date("Y-m-d 00:00:00", strtotime($Date));
$date1 =  $date_from;


$Date1 = $this->input->post('date_to');
$date_to = date("Y-m-d 23:59:59", strtotime($Date1));
$date2 = $date_to;

$date_array = array(
    'date1' => $date1,
    'date2' => $date2
);
///////////////////////////////////////////////////////////////////////////////////////////////    

    $Engineer_ID = $this->input->post('Engineer_ID');  
//                    $Engineer_ID ='L3T112';
    
    $data['pending_list_result'] = $this->ert_model->wi_pending_list_by_Engineer_ID_model($Engineer_ID,$date_array); 
     
//    echo '<pre>';
////    echo 'E ID :'.$Engineer_ID;
//    print_r($data['pending_list_result']);
      //      ...............................................................................................  
         
       $data['maincontent'] = $this->load->view('wi_pending_task_by_id', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    }
      public function wi_done_task_by_id(){
      $data = array();          
      $data['result'] = $this->ert_model->pick_Division();
/////////////////////////////////////////////////////////////////////////////////////////////////
$Date = $this->input->post('date_from');
$date_from = date("Y-m-d 00:00:00", strtotime($Date));
$date1 =  $date_from;
$Date1 = $this->input->post('date_to');
$date_to = date("Y-m-d 23:59:59", strtotime($Date1));
$date2 = $date_to;
$date_array = array(
    'date1' => $date1,
    'date2' => $date2
);
///////////////////////////////////////////////////////////////////////////////////////////////    

    $Engineer_ID = $this->input->post('Engineer_ID');  
    $data['done_list_result'] = $this->ert_model->wi_done_list_by_Engineer_ID_model($Engineer_ID,$date_array); 
    
    $data['done_task_summery'] = $this->ert_model->wi_done_by_Eng_ID_summery_model($Engineer_ID,$date_array);  
    
//    echo '<pre>';
////    echo 'E ID :'.$Engineer_ID;
//    print_r($data['pending_list_result']);
      //      ...............................................................................................  
         
       $data['maincontent'] = $this->load->view('wi_done_task_by_id', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    }
    
     public function wi_pending_task_by_bts(){
 $data = array();       
//      $data['result'] = $this->registration_model->CS_search_pending_task_by_id_model($ticket_no);
       $data['result'] = $this->ert_model->pick_Division();
/////////////////////////////////////////////////////////////////////////////////////////////////
$Date = $this->input->post('date_from');
$date_from = date("Y-m-d 00:00:00", strtotime($Date));
$date1 =  $date_from;


$Date1 = $this->input->post('date_to');
$date_to = date("Y-m-d 23:59:59", strtotime($Date1));
$date2 = $date_to;

$date_array = array(
    'date1' => $date1,
    'date2' => $date2
);
///////////////////////////////////////////////////////////////////////////////////////////////    

    $BTS_name = $this->input->post('BTS_name');  
//                    $Engineer_ID ='L3T112';
    
    $data['pending_list_result'] = $this->ert_model->wi_pending_list_by_bts_model($BTS_name,$date_array); 
     
//    echo '<pre>';
////    echo 'E ID :'.$Engineer_ID;
//    print_r($data['pending_list_result']);
      //      ...............................................................................................  
     
//        
        $data['maincontent'] = $this->load->view('wi_pending_task_by_bts', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
   
    
      public function wi_done_task_by_bts(){
 $data = array();       
//      $data['result'] = $this->registration_model->CS_search_pending_task_by_id_model($ticket_no);
       $data['result'] = $this->ert_model->pick_Division();
/////////////////////////////////////////////////////////////////////////////////////////////////
$Date = $this->input->post('date_from');
$date_from = date("Y-m-d 00:00:00", strtotime($Date));
$date1 =  $date_from;


$Date1 = $this->input->post('date_to');
$date_to = date("Y-m-d 23:59:59", strtotime($Date1));
$date2 = $date_to;

$date_array = array(
    'date1' => $date1,
    'date2' => $date2
);
///////////////////////////////////////////////////////////////////////////////////////////////    

    $BTS_name = $this->input->post('BTS_name');  
//                    $Engineer_ID ='L3T112';
    
    $data['done_list_result'] = $this->ert_model->wi_done_list_by_bts_model($BTS_name,$date_array); 
    $data['done_task_summery'] = $this->ert_model->wi_done_summery_by_bts_model($BTS_name,$date_array);  
//    echo '<pre>';
////    echo 'E ID :'.$Engineer_ID;
//    print_r($data['pending_list_result']);
      //      ...............................................................................................  
     
//        
        $data['maincontent'] = $this->load->view('wi_done_task_by_bts', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    
    
    public function ERT_done_task_by_id(){
     
        
      $data = array();       
      
      $data['result'] = $this->registration_model->CS_pending_task_zone_page();
       
//       $data['result'] = $this->ert_model->ert_pick_employee_id(); 
     
       
       
       
/////////////////////////////////////////////////////////////////////////////////////////////////
$Date = $this->input->post('date_from');
$date_from = date("Y-m-d 00:00:00", strtotime($Date));
$date1 =  $date_from;


$Date1 = $this->input->post('date_to');
$date_to = date("Y-m-d 23:59:59", strtotime($Date1));
$date2 = $date_to;

$date_array = array(
    'date1' => $date1,
    'date2' => $date2
);
///////////////////////////////////////////////////////////////////////////////////////////////    

    $Engineer_ID = $this->input->post('Engineer_ID');  
//                    $Engineer_ID ='L3T112';
    
    $data['done_list_result'] = $this->ert_model->ERT_done_list_by_Engineer_ID_model($Engineer_ID,$date_array); 
     
//    echo '<pre>';
////    echo 'E ID :'.$Engineer_ID;
//    print_r($data['pending_list_result']);
      //      ...............................................................................................  
         
       $data['maincontent'] = $this->load->view('ert_done_task_by_id', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    
    public function ERT_done_task_by_sub_zone(){
        
        
 $data = array();       
//      $data['result'] = $this->registration_model->CS_search_pending_task_by_id_model($ticket_no);
       $data['result'] = $this->registration_model->CS_pending_task_zone_page();
/////////////////////////////////////////////////////////////////////////////////////////////////
$Date = $this->input->post('date_from');
$date_from = date("Y-m-d 00:00:00", strtotime($Date));
$date1 =  $date_from;


$Date1 = $this->input->post('date_to');
$date_to = date("Y-m-d 23:59:59", strtotime($Date1));
$date2 = $date_to;

$date_array = array(
    'date1' => $date1,
    'date2' => $date2
);
///////////////////////////////////////////////////////////////////////////////////////////////    

    $Sub_Zone = $this->input->post('Sub_Zone');  
//                    $Engineer_ID ='L3T112';
    
    $data['done_list_result'] = $this->ert_model->ERT_done_list_by_sub_zone_model($Sub_Zone,$date_array); 
     
//    echo '<pre>';
////    echo 'E ID :'.$Engineer_ID;
//    print_r($data['pending_list_result']);
      //      ...............................................................................................  
      ; 
//        
        $data['maincontent'] = $this->load->view('ert_done_task_by_sub_zone', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
   
        
    }
    
    public function Check_Client_id_function(){

       $Client_id=$this->input->post('Client_id');       
       $result = $this->ert_model->Check_client_id_model($Client_id);
       echo json_encode($result);
    }
    
   public function wi_done_from(){
        
    $data=array();
    $p_key=$this->input->post('p_key');
    $data['status']="Done";   
    $data['Support_Type']=$this->input->post('Support_Type');  
    $data['Final_Resolution']=$this->input->post('Final_Resolution');           
//    $data['end_date']=$this->input->post('cs_date');
    $Date = $this->input->post('cs_date');
    $new_start_date = date("Y-m-d H:i:s", strtotime($Date));            
    $data['e_date']=$new_start_date; 
    
    $data['Technician_Name']=$this->input->post('Technician_Name');
    
    $this->ert_model->wi_done_task_model($p_key,$data);   
     
//    print($p_key,$data);
//    echo $p_key;
   
    redirect("index.php/welcome/Dashboard_funcation"); 
    } 
    
}

?>