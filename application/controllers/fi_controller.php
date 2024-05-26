<?php

class Fi_controller extends CI_Controller {
    
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
        $data['result'] = $this->ert_model->fi_assign_task_page_category();
        $data['maincontent'] = $this->load->view('fi_assign_task', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    } 
    
    public function fi_edit_from($p_key){
        
        $data = array();
        $data['pick_result'] = $this->ert_model->fi_pick_assign_information_model($p_key);
        $data['pick_comments'] = $this->ert_model->fi_pick_comments_model($p_key);
        
//        echo '<pre>';
//        print_r($data['pick_comments']);
        
        $data['maincontent'] = $this->load->view('fi_edit_workshedule', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    } 
    
 public function save_task_info_funcation(){
            
           $id = $this->session->userdata('id');
            $data=array();           
            $data['create_id']=$id;          
            
            $Date = $this->input->post('s_date');
            $new_start_date = date("Y-m-d H:i:s", strtotime($Date));
            $data['TKI_Receive_Date_time']=$new_start_date; 
           
            $data['Client_id']=$this->input->post('Client_id');
            $data['Client_Name']=$this->input->post('Client_Name');   
            $data['Client_Category']=$this->input->post('Client_Category');   
            $data['C_Contact_number']=$this->input->post('C_Contact_number');  
            $data['Client_Address']=$this->input->post('Client_Address');  
            $data['tki_id']=$this->input->post('tki_id'); 
            $data['type_task']=$this->input->post('type_task');
           
            $Date1 = $this->input->post('e_date');
            $new_start_date1 = date("Y-m-d", strtotime($Date1));
            $data['Work_Schedule']=$new_start_date1;
            
            $data['Zone']=$this->input->post('Zone');
            $data['Support_Office']=$this->input->post('Support_Office');
            $data['Connection_Type']=$this->input->post('Connection_Type');
            $data['Priority_Status']=$this->input->post('Priority_Status');
            

            
//            $data['comments']=$this->input->post('comments');
            $data['status']='1';
            $data['work_status']='pending';
            $this->ert_model->fi_save_task_info_model($data); 
//.........................................COMMENTS Part........................................................            
            $c_data=array();
            $pick_pkey=array();
            $pick_pkey['pkey_result']= $this->ert_model->fi_pick_pkey_model($id);

            $c_data['p_key']=$pick_pkey['pkey_result']->p_key;
            $c_data['employee_id']=$id;
            $c_data['type']='Assign Task';
            $c_data['comments']=$this->input->post('comments');
            
            $this->ert_model->fi_save_comments_model($c_data);

//            $sdata=array();
//            $sdata['message']='Save Task successfully';
//            $this->session->set_userdata($sdata);
//        redirect("index.php/ert_controller/ert_assin_task");
       
    }
 
    public function edit_task_info_funcation(){
        
            $c_data=array();
            $data=array();
            $id = $this->session->userdata('id');
            $p_key=$this->input->post('p_key');
            
            $Date1 = $this->input->post('e_date');
            $new_start_date1 = date("Y-m-d", strtotime($Date1));
            $data['Work_Schedule']=$new_start_date1;
            $data['Client_id']=$this->input->post('Client_id');
            $data['Client_Name']=$this->input->post('Client_Name');
            $data['C_Contact_number']=$this->input->post('C_Contact_number');
            $data['Client_Address']=$this->input->post('Client_Address');
            $this->ert_model->fi_update_work_shedule_model($p_key,$data);
            
            $c_data['p_key']=$p_key;
            $c_data['employee_id']=$id;
            $c_data['type']='update work Shedule';
            $c_data['comments']=$this->input->post('comments');
            
            $this->ert_model->fi_save_comments_model($c_data);   
    }
    
      public function Check_CTID_n_SR(){

       $tki_id=$this->input->post('tki_id');       
       $result = $this->ert_model->Check_CTID_n_SR_model($tki_id);
       echo json_encode($result);
    }

    public function pick_engineer_id(){
      
       $Engineer_Name=$this->input->post('Engineer_Name');   
       $result = $this->registration_model->pick_Engineer_ID_model($Engineer_Name);
       echo json_encode($result);
        
    }
    
     public function fi_check_handover_status(){
      
       $p_key=$this->input->post('p_key');   
       $result = $this->ert_model->check_handover_status_model($p_key);
       echo json_encode($result);
        
    }
    
    public function fi_pending_task(){
        
        $data = array();
//      .......................  pagination  ...................................................................  
        
        $config["base_url"] = base_url() . "index.php/fi_controller/fi_pending_task/";
        $nmuber = $this->ert_model->fi_pending_list_record_count();
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
                fi_Pagination_pending_model($config["per_page"], $page);
        
        $data["links"] = $this->pagination->create_links(); 
        

//      ...............................................................................................
        
//        $data['pending_task_result'] = $this->ert_model->wi_pick_pending_task();
        
        
        $data['maincontent'] = $this->load->view('fi_pending_task', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    
    public function fi_done_task(){
        
       $data = array();
//      .......................  pagination  ...................................................................  
        
        $config["base_url"] = base_url() . "index.php/fi_controller/fi_done_task/";
        $nmuber = $this->ert_model->fi_done_list_record_count();
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
                fi_Pagination_done_model($config["per_page"], $page);
        
        
//  mmm      
 $data["links"] = $this->pagination->create_links(); 
        
 $data['engineer_result'] = $this->ert_model->fi_pick_engineer_done_task();
 $data['technician_result'] = $this->ert_model->fi_pick_technician_done_task();

//      ...............................................................................................
        
        
        $data['maincontent'] = $this->load->view('fi_done_task', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    
    public function fi_link_from($p_key){
     
        $data = array();
//        $data['pick_comments'] = $this->ert_model->ERT_view_comments_model($p_key);      
//        $data['result'] = $this->ert_model->wi_pick_done_catogry();        
        $data['pending_task_result'] = $this->ert_model->fi_pick_pending_single_task($p_key); 
        
        $data['maincontent'] = $this->load->view('fi_update_link', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    public function fi_update_new_comments(){
        
//        $c_data=array();     
//        $c_data['p_key']=$this->input->post('p_key');
//        $id = $this->session->userdata('id');        
//        $c_data['employee_id']=$id;
//        $c_data['support_type']=$this->input->post('support_type'); 
//        $c_data['comments']=$this->input->post('comments');               
//        $this->ert_model->ERT_update_new_comments_model($c_data);  
//..........................................................
        $data=array();
        $p_key=$this->input->post('p_key');  
        
//        $data['Engineer_name'] = $this->input->post('Engineer_name');
//        $data['Engineer_id'] = $this->input->post('Engineer_ID');
        
        $Assign_time = $this->input->post('Assign_time');
        $N_Assign_time = date("Y-m-d H:i:s", strtotime($Assign_time));
        $data['Assign_time']=$N_Assign_time;
        
//        $data['Technician_name'] = $this->input->post('Technician_name');
        $Reach_time = $this->input->post('Reach_time');
        $N_Reach_time = date("Y-m-d H:i:s", strtotime($Reach_time));
        $data['Reach_time']=$N_Reach_time;
        
        $Completion_time = $this->input->post('Completion_time');
        $N_Completion_time = date("Y-m-d H:i:s", strtotime($Completion_time));
        $data['Completion_time']=$N_Completion_time;
        $data['Cause_for_Delay'] = $this->input->post('Cause_for_Delay');
        
        
        $type_task=$this->input->post('type_task');
        
        if( $type_task == 'Troubleshoot' ){
            $data['status']='3';
        }else{
            $data['status']='2';
        }
        
        
        
       $this->ert_model->fi_update_link_model($p_key,$data);
        
        
       
        
        
//        ...........................................................................................................
              
//        .................................ADD Engineer Part...........................................................
        
$loop_number = $this->input->post('loop_number');
$engineer_name_array = $this->input->post('engineer_name_array');
$engineer_id_array = $this->input->post('engineer_id_array');
$details_array = $this->input->post('details_array');
$support_type_array = $this->input->post('support_type_array');       
  
$split_engineer_name_array=(explode(",",$engineer_name_array));
$split_id_array_array=(explode(",",$engineer_id_array));
$split_details_array_array=(explode(",",$details_array));
$split_support_type_array=(explode(",",$support_type_array));
$work_data=array();
for($i=0;$i<=$loop_number;$i++){
    
     $engineer_name=$split_engineer_name_array[$i];
     $engineer_id=$split_id_array_array[$i];
     $details=$split_details_array_array[$i];
     $support_type=$split_support_type_array[$i];
     
   $id = $this->session->userdata('id');  
   $work_data['create_id']=$id;
   $work_data['p_key']=$p_key;
   $work_data['Engineer_name']=$engineer_name;
   $work_data['Engineer_ID']=$engineer_id;
   $work_data['support_type']=$support_type;
   $work_data['details']=$details;
   $work_data['task_type']='link_up';
   if($engineer_name!=null){
       $this->ert_model->add_engineer_model($work_data); 
   }   
}
//...................................  Technician  part ..............................................................
$Technician_loop_number = $this->input->post('Technician_loop_number');
$Technician_name_array = $this->input->post('Technician_name_array');
$Technician_details = $this->input->post('Technician_details_array');
       
  
$split_Technician_name_array=(explode(",",$Technician_name_array));
$split_Technician_details_array=(explode(",",$Technician_details));
$Technician_work_data=array();
for($x=0;$x<=$Technician_loop_number;$x++){
    
     $Technician_name=$split_Technician_name_array[$x];
     $Technician_details=$split_Technician_details_array[$x];
//   $id = $this->session->userdata('id');  
   $Technician_work_data['create_id']=$id;
   $Technician_work_data['p_key']=$p_key;
   $Technician_work_data['Technician_name']=$Technician_name;
   $Technician_work_data['Technician_work_details']=$Technician_details;
   $Technician_work_data['task_type']='link_up';
   if($Technician_name!=null){
       $this->ert_model->add_Technician_model($Technician_work_data); 
   }   
}
        
//        .............................................................................................
        
  //.........................................COMMENTS Part........................................................            
            $c_data=array();
//            $pick_pkey=array();
//            $pick_pkey['pkey_result']= $this->ert_model->fi_pick_pkey_model($id);

            $c_data['p_key']=$p_key;
            $c_data['employee_id']=$id;
            $c_data['type']='Physical Link Up';
            $c_data['comments']=$this->input->post('comments');
            
            $this->ert_model->fi_save_comments_model($c_data);      
        
        
        
        
        
        
          redirect("index.php/fi_controller/fi_pending_task");
        
    }
    
    public function fi_handover_from($p_key){
     
        $data = array();
//        $data['pick_comments'] = $this->ert_model->ERT_view_comments_model($p_key);      
//        $data['result'] = $this->ert_model->wi_pick_done_catogry();        
        $data['pending_task_result'] = $this->ert_model->fi_pick_pending_single_task($p_key); 
        
        $data['maincontent'] = $this->load->view('fi_handover_from', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    
    public function fi_update_Handover_info(){
        
//        $c_data=array();     
//        $c_data['p_key']=$this->input->post('p_key');
//        $id = $this->session->userdata('id');        
//        $c_data['employee_id']=$id;
//        $c_data['support_type']=$this->input->post('support_type'); 
//        $c_data['comments']=$this->input->post('comments');               
//        $this->ert_model->ERT_update_new_comments_model($c_data);  
//..........................................................
        $data=array();
        $p_key=$this->input->post('p_key');  
        
//        $data['H_Engineer_name'] = $this->input->post('Engineer_name');
//        $data['H_Engineer_id'] = $this->input->post('Engineer_ID');
        
        $Assign_time = $this->input->post('Assign_time');
        $N_Assign_time = date("Y-m-d H:i:s", strtotime($Assign_time));
        $data['H_Assign_time']=$N_Assign_time;
        
//        $data['H_Technician_name'] = $this->input->post('Technician_name');
        $Reach_time = $this->input->post('Reach_time');
        $N_Reach_time = date("Y-m-d H:i:s", strtotime($Reach_time));
        $data['H_Reach_time']=$N_Reach_time;
        
        $Completion_time = $this->input->post('Completion_time');
        $N_Completion_time = date("Y-m-d H:i:s", strtotime($Completion_time));
        $data['H_Completion_time']=$N_Completion_time;
        $data['H_Cause_for_Delay'] = $this->input->post('Cause_for_Delay');
        
        $data['status']='3';
        
        
        $this->ert_model->fi_update_Handover_model($p_key,$data);
      
//        .................................ADD Engineer Part...........................................................
        
$loop_number = $this->input->post('loop_number');
$engineer_name_array = $this->input->post('engineer_name_array');
$engineer_id_array = $this->input->post('engineer_id_array');
$details_array = $this->input->post('details_array');
       
  
$split_engineer_name_array=(explode(",",$engineer_name_array));
$split_id_array_array=(explode(",",$engineer_id_array));
$split_details_array_array=(explode(",",$details_array));
$work_data=array();
for($i=0;$i<=$loop_number;$i++){
    
     $engineer_name=$split_engineer_name_array[$i];
     $engineer_id=$split_id_array_array[$i];
     $details=$split_details_array_array[$i];
   $id = $this->session->userdata('id');  
   $work_data['create_id']=$id;
   $work_data['p_key']=$p_key;
   $work_data['Engineer_name']=$engineer_name;
   $work_data['Engineer_ID']=$engineer_id;
   $work_data['details']=$details;
   $work_data['task_type']='handover';
   if($engineer_name!=null){
       $this->ert_model->add_engineer_model($work_data); 
   }   
}
//...................................  Technician  part ..............................................................
$Technician_loop_number = $this->input->post('Technician_loop_number');
$Technician_name_array = $this->input->post('Technician_name_array');
$Technician_details = $this->input->post('Technician_details_array');
       
  
$split_Technician_name_array=(explode(",",$Technician_name_array));
$split_Technician_details_array=(explode(",",$Technician_details));
$Technician_work_data=array();
for($x=0;$x<=$Technician_loop_number;$x++){
    
     $Technician_name=$split_Technician_name_array[$x];
     $Technician_details=$split_Technician_details_array[$x];
//   $id = $this->session->userdata('id');  
   $Technician_work_data['create_id']=$id;
   $Technician_work_data['p_key']=$p_key;
   $Technician_work_data['Technician_name']=$Technician_name;
   $Technician_work_data['Technician_work_details']=$Technician_details;
   $Technician_work_data['task_type']='handover';
   if($Technician_name!=null){
       $this->ert_model->add_Technician_model($Technician_work_data); 
   }   
}
        
//        .............................................................................................
   //.........................................COMMENTS Part........................................................            
            $c_data=array();
//            $pick_pkey=array();
//            $pick_pkey['pkey_result']= $this->ert_model->fi_pick_pkey_model($id);

            $c_data['p_key']=$p_key;
            $c_data['employee_id']=$id;
            $c_data['type']='handover';
            $c_data['comments']=$this->input->post('comments');
            
            $this->ert_model->fi_save_comments_model($c_data);         
        
          redirect("index.php/fi_controller/fi_pending_task");
        
    }
    
    public function fi_accessories_from($p_key){
      
          $data = array();
//        $data['pick_comments'] = $this->ert_model->ERT_view_comments_model($p_key);      
        $data['result'] = $this->ert_model->fi_accessories_catogry();        
        $data['pending_task_result'] = $this->ert_model->fi_pick_pending_single_task($p_key); 
        
        $data['maincontent'] = $this->load->view('fi_accessories_from', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
        
    }
    public function fi_update_accessories_info(){
        
       
        
        
        $data=array();
        $p_key=$this->input->post('p_key');
        $data['p_key']=$p_key;  
         $id = $this->session->userdata('id');          
        $data['create_id']=$id;
        
        
        $data['Client_id'] = $this->input->post('Client_id');
        $data['Cable_Type_ID'] = $this->input->post('Cable_Type_ID');
        $data['Cable_Start_meter'] = $this->input->post('Cable_Start_meter');
        $data['Cable_End_meter'] = $this->input->post('Cable_End_meter');
        
        $data['Cable_qty'] = '';
        
        $data['Device_model'] = $this->input->post('Device_model');
        $data['serial_No'] = $this->input->post('serial_No');
        $data['MAC'] = $this->input->post('MAC');
        $data['TJ'] = $this->input->post('TJ');
        $data['Patch_Cord_Qty'] = $this->input->post('Patch_Cord_Qty');
        $data['Cable_Tie_Qty'] = $this->input->post('Cable_Tie_Qty');
        $data['Rj45_Qty'] = $this->input->post('Rj45_Qty');
        $data['Sale_Order_Number'] = $this->input->post('Sale_Order_Number');
        
         $this->ert_model->fi_update_accessories_model($data);
        
        
//        .................................Update TKI.............................................................
     
        $u_data=array(); 
        
        $u_data['status']='4';
        $u_data['work_status']='done';
        $u_data['e_date']=date("Y-m-d H:i:s");
        
        $this->ert_model->fi_update_tki_model($p_key,$u_data);
        
        redirect("index.php/fi_controller/fi_pending_task");
           
    }

    public function DB_FI_search_pending_task(){
    $data = array();    
    
     $data['result'] = $this->ert_model->pick_fi_zone();
    $Support_Office = $this->input->get('var1');
    $task_type = $this->input->get('var2');
    $data['pending_list_result'] = $this->ert_model->fi_DB_pending_list_search_model($Support_Office,$task_type); 
     
    
    

//    echo '<pre>';
//    echo 'Zone :'.$Zone.'.....'.$task_type;
//    print_r($data['pending_list_result']);
      //      ...............................................................................................  
         
       $data['maincontent'] = $this->load->view('fi_pending_task_search', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    }


    public function fi_pending_task_search(){
      $data = array();       
      
      $data['result'] = $this->ert_model->pick_fi_zone();
      
$Zone = $this->input->post('Zone'); 
$Sub_Zone = $this->input->post('Sub_Zone'); 
$task_type = $this->input->post('type_task');

//$Zone='Dhaka';
$Date = $this->input->post('date_from');
$date_from = date("Y-m-d", strtotime($Date));
$date1 =  $date_from;


$Date1 = $this->input->post('date_to');
$date_to = date("Y-m-d", strtotime($Date1));
$date2 = $date_to;

$date_array = array(
    'date1' => $date1,
    'date2' => $date2
);



    
    $data['pending_list_result'] = $this->ert_model->fi_pending_list_search_model($Zone,$Sub_Zone,$task_type,$date_array); 
     
//    echo '<pre>';
////    echo 'E ID :'.$Engineer_ID;
//    print_r($data['pending_list_result']);
//echo '$Zone.............'.$Zone.'$Sub_Zone..........'.$Sub_Zone.'$task_type........'.$task_type.'';
      //      ...............................................................................................  
         
       $data['maincontent'] = $this->load->view('fi_pending_task_search', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    }
    
    
    public function fi_done_task_search(){
      $data = array();       
      
      $data['result'] = $this->ert_model->pick_fi_zone();
      
$Zone = $this->input->post('Zone'); 
$Sub_Zone = $this->input->post('Sub_Zone'); 
$task_type = $this->input->post('type_task');

//$Zone='Dhaka';




//echo '$Zone.............'.$Zone.'$Sub_Zone..........'.$Sub_Zone.'$task_type........'.$task_type.'';

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

    $data['pending_list_result'] = $this->ert_model->fi_done_list_search_model($Zone,$Sub_Zone,$task_type,$date_array); 
     
//...............................................................................................................
//    $data["pending_task_result"] = $this->ert_model->fi_Pagination_done_model($config["per_page"], $page);
    $data['engineer_result'] = $this->ert_model->fi_pick_engineer_done_task();
    $data['technician_result'] = $this->ert_model->fi_pick_technician_done_task();
//...............................................................................................................  
         
       $data['maincontent'] = $this->load->view('fi_done_task_search', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    }
    
    
    
    
    
    
    
    
      public function wi_done_task_by_id(){
      $data = array();       
      
      $data['result'] = $this->ert_model->pick_Division();
/////////////////////////////////////////////////////////////////////////////////////////////////
$Date = $this->input->post('date_from');
$date_from = date("Y-m-d", strtotime($Date));
$date1 =  $date_from;


$Date1 = $this->input->post('date_to');
$date_to = date("Y-m-d", strtotime($Date1));
$date2 = $date_to;

$date_array = array(
    'date1' => $date1,
    'date2' => $date2
);
///////////////////////////////////////////////////////////////////////////////////////////////    

    $Engineer_ID = $this->input->post('Engineer_ID');  
//                    $Engineer_ID ='L3T112';
    
    $data['done_list_result'] = $this->ert_model->wi_done_list_by_Engineer_ID_model($Engineer_ID,$date_array); 
     
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
     
//    echo '<pre>';
////    echo 'E ID :'.$Engineer_ID;
//    print_r($data['pending_list_result']);
      //      ...............................................................................................  
     
//        
        $data['maincontent'] = $this->load->view('wi_done_task_by_bts', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    
    
    
    
     
    
}

?>