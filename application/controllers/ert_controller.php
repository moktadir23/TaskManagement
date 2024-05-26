<?php

class Ert_controller extends CI_Controller {
    
        public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->library("pagination");
        $this->load->model('registration_model');
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
    

        public function ert_assin_task(){
        
//            echo 'TEST'; 
            
        $data = array();
        $data['result'] = $this->ert_model->ert_assign_task_page_category();
        $data['maincontent'] = $this->load->view('ert_assin_task', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    } 
    
    
 public function save_task_info_funcation(){
            
           $id = $this->session->userdata('id');
    
//            $tdata = array();
//            $tdata['create_date'] = date("Y-m-d");
//            $tdata['create_id'] = $id;            
//            $this->registration_model->save_ticket_info_model($tdata);
//            $ticket_data = array();
//            $ticket_data['result_ticket_id'] = $this->registration_model->find_ticket_Id($id);
//          $ticket_data['result_ticket_id']->ticket_id,
//          ticket_no
            $data=array();           
            $data['create_id']=$id;          
//            $data['ticket_no']=$ticket_data['result_ticket_id']->ticket_id;
            
            $data['Client_id']=$this->input->post('Client_id');
            $data['Client_Name']=$this->input->post('Client_Name');
            $data['Client_Address']=$this->input->post('Client_Address');
            $data['Client_Contact']=$this->input->post('Client_Contact');   
            $data['Client_Category']=$this->input->post('Client_Category'); 
            $data['Zone']=$this->input->post('Zone');
            $data['Sub_Zone']=$this->input->post('Sub_Zone');
            $data['Distributor']=$this->input->post('Distributor');
            $data['support_type']=$this->input->post('support_type');
            $data['CTID_SR']=$this->input->post('CTID_SR');  
            $data['type_task']=$this->input->post('type_task');
            $data['assign_by']=$this->input->post('assign_by');
            $data['employee_name']=$this->input->post('Engineer_Name');
            $data['employee_id']=$this->input->post('Engineer_ID');
            $data['Technician_Name']=$this->input->post('Technician_Name');
            
            $Date = $this->input->post('s_date');
            $new_start_date = date("Y-m-d h:i:s", strtotime($Date));
            $data['s_date']=$new_start_date; 
            
            $data['Status']=$this->input->post('status');
            $Status=$this->input->post('status');
        if($Status == 'Active' || $Status == 'Collected' || $Status == 'Device lost' ){
            
           $data['e_date']=$new_start_date;
           $data['ONU_opration_status']=1;  
        }
            
            
            
        $result=$this->ert_model->save_task_info_model($data);  
// sss                   
//            echo '<pre>';
//            print_r($result);
//            echo '</pre>';
            
//........................................................................................            
       $pick_data=array(); 
//       $pick_data['p_key']=$this->ert_model->ert_max_p_key_model();      
          $pick_pkey=$this->ert_model->ert_max_p_key_model($id);  
                     
          
        $c_data=array();     
        $c_data['p_key']=$pick_pkey->p_key;  
        $c_data['Zone']=$this->input->post('Zone');
        $c_data['Sub_Zone']=$this->input->post('Sub_Zone');
        $c_data['employee_id']=$this->input->post('Engineer_ID');
        $c_data['support_type']=$this->input->post('support_type'); 
        $c_data['comments']=$this->input->post('comments');               
        $this->ert_model->ERT_update_new_comments_model($c_data);
        
//.........................................................................................        
      
        
            
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
    
    public function ert_pending_task(){
        
        $data = array();
//        $data['result'] = $this->ert_model->ert_assign_task_page_category();
        
  //      .......................  pagination  ...................................................................  
        
//        $config["base_url"] = base_url() . "index.php/ert_controller/ert_pending_task/";
//        $nmuber = $this->ert_model->ert_pending_list_record_count();
//        $i=0;
//        foreach ($nmuber as $value) {
//         $i++;  
//        }
//        echo '<br>i......'.$i;
//        
//        $config["total_rows"] = $i;
//        $config["per_page"] = 5;
//        $config["uri_segment"] = 3;
//
//        $this->pagination->initialize($config);
//        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
//        $data["pending_task_result"] = $this->ert_model->
//                ERT_Pagination_pending_model($config["per_page"], $page);
//        
//        $data["links"] = $this->pagination->create_links(); 
//      ...............................................................................................      
//sss        
        
        
        
        
        
        $data['pending_task_result'] = $this->ert_model->ERT_pick_pending_task();
        $data['maincontent'] = $this->load->view('ert_pending_list', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    
    public function ert_done_task(){
        
        $data = array();
//        $data['result'] = $this->ert_model->ert_assign_task_page_category();
        
        $data['done_task_result'] = $this->ert_model->ERT_pick_done_task();
        $data['maincontent'] = $this->load->view('ert_done_list', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    
    public function ERT_new_comments($p_key){
     
        $data = array();
        $data['pick_comments'] = $this->ert_model->ERT_view_comments_model($p_key);      
        $data['result'] = $this->ert_model->ERT_pick_status_catogry($p_key);        
        $data['pick_p_key'] = $this->ert_model->ERT_pick_p_key($p_key); 
        
        $data['maincontent'] = $this->load->view('ert_update_task', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    public function ERT_update_new_comments(){
        
        $c_data=array();     
        $c_data['p_key']=$this->input->post('p_key');
        $id = $this->session->userdata('id');        
        $c_data['employee_id']=$id;
        $c_data['Zone']=$this->input->post('Zone');
        $c_data['Sub_Zone']=$this->input->post('Sub_Zone');
        $c_data['support_type']=$this->input->post('support_type'); 
        $c_data['comments']=$this->input->post('comments');               
        $this->ert_model->ERT_update_new_comments_model($c_data);  
//..........................................................
        $data=array();
        $p_key=$this->input->post('p_key');       
        $Date = $this->input->post('e_date');
        $end_date = date("Y-m-d H:i:s", strtotime($Date));
        $data['e_date']=$end_date;
        $data['Status']=$this->input->post('status');
        $data['employee_name']=$this->input->post('Engineer_Name');
        $data['employee_id']=$this->input->post('Engineer_ID');
        $data['Technician_Name']=$this->input->post('Technician_Name');
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
    public function ERT_pending_task_by_id(){
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
    
    $data['pending_list_result'] = $this->ert_model->ERT_pending_list_by_Engineer_ID_model($Engineer_ID,$date_array); 
     
//    echo '<pre>';
////    echo 'E ID :'.$Engineer_ID;
//    print_r($data['pending_list_result']);
      //      ...............................................................................................  
         
       $data['maincontent'] = $this->load->view('ert_pending_task_by_id', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    }
     public function ERT_pending_task_by_sub_zone(){
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
   
    $Zone = $this->input->post('Zone'); 
    $Sub_Zone = $this->input->post('Sub_Zone');  
    $status = $this->input->post('status');
//                    $Engineer_ID ='L3T112';
   if($status=='All'){
        if($Sub_Zone==null){
           
            $data['pending_list_result'] = $this->ert_model->ERT_pending_list_by_zone_model($Zone,$date_array); 
           
        }else{            
                
            $data['pending_list_result'] = $this->ert_model->ERT_pending_list_by_sub_zone_model($Sub_Zone,$date_array); 
        }
   }else{
        if($Sub_Zone==null){
            $data['pending_list_result'] = $this->ert_model->ERT_pending_list_by_status_zone_model($status,$Zone,$date_array);      
           
        }else{            
            $data['pending_list_result'] = $this->ert_model->ERT_pending_list_by_status_sub_zone_model($status,$Sub_Zone,$date_array);      
            
        }              
   } 
    
    
    
    
    
    
    
    
//                    $Engineer_ID ='L3T112';
    
   
     
//    echo '<pre>';
////    echo 'E ID :'.$Engineer_ID;
//    print_r($data['pending_list_result']);
      //      ...............................................................................................  
       
//        
        $data['maincontent'] = $this->load->view('ert_pending_task_by_sub_zone', $data, true);
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
    $data['visit_result'] = $this->ert_model->ERT_visit_count_by_id_model($Engineer_ID,$date_array);
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
    $Zone = $this->input->post('Zone'); 
    $Sub_Zone = $this->input->post('Sub_Zone');  
    $Distributor = $this->input->post('Distributor'); 
//     $Distributor = 'Hello Net Communication'; 
    $status = $this->input->post('status');
    
    
    if($Zone=='all_zone' && $status=='All'){
        $data['done_list_result'] = $this->ert_model->ERT_done_list_search_by_all_zone_model($date_array);      
        $data['visit_result'] = $this->ert_model->ERT_visit_count_by_all_zone_model($date_array);
    }elseif ($Zone=='all_zone' && $status!='All') {
        $data['done_list_result'] = $this->ert_model->ERT_done_list_by_status_n_all_zone_model($status,$date_array);      
        $data['visit_result'] = $this->ert_model->ERT_visit_count_by_all_zone_model($date_array); 
    }elseif ($Zone!='all_zone' && $status=='All') {
        if($Sub_Zone==null  && $Distributor==null){
            $data['done_list_result'] = $this->ert_model->ERT_done_list_search_by_zone_model($Zone,$date_array);      
            $data['visit_result'] = $this->ert_model->ERT_visit_count_by_zone_model($Zone,$date_array);
        }elseif($Sub_Zone!=null && $Distributor==null){
            $data['done_list_result'] = $this->ert_model->ERT_done_list_by_sub_zone_model($Sub_Zone,$date_array);      
            $data['visit_result'] = $this->ert_model->ERT_visit_count_by_sub_zone_model($Sub_Zone,$date_array);
        }elseif ($Sub_Zone!=null && $Distributor!=null){
            $data['done_list_result'] = $this->ert_model->ERT_done_list_by_sub_zone_distributor_model($Sub_Zone,$Distributor,$date_array);      
            $data['visit_result'] = $this->ert_model->ERT_visit_count_by_sub_zone_model($Sub_Zone,$date_array);
        }
          
    }elseif ($Zone!='all_zone' && $status!='All') {
        if($Sub_Zone==null && $Distributor==null){
            $data['done_list_result'] = $this->ert_model->ERT_done_list_by_status_n_zone_model($status,$Zone,$date_array);      
            $data['visit_result'] = $this->ert_model->ERT_visit_count_by_zone_model($Zone,$date_array); 
        }elseif ($Sub_Zone!=null && $Distributor!=null){
            $data['done_list_result'] = $this->ert_model->ERT_done_by_status_n_sub_zone_n_distributor_model($status,$Sub_Zone,$Distributor,$date_array);      
            $data['visit_result'] = $this->ert_model->ERT_visit_count_by_sub_zone_model($Sub_Zone,$date_array);
        }elseif ($Sub_Zone!=null && $Distributor==null) {
            $data['done_list_result'] = $this->ert_model->ERT_done_by_status_n_sub_zone_model($status,$Sub_Zone,$date_array);      
            $data['visit_result'] = $this->ert_model->ERT_visit_count_by_sub_zone_model($Sub_Zone,$date_array);     
        }
    }
    
    
//    if($Zone=='all_zone'){
//         if($status=='All'){
//             
//                $data['done_list_result'] = $this->ert_model->ERT_done_list_search_by_all_zone_model($date_array);      
//                $data['visit_result'] = $this->ert_model->ERT_visit_count_by_all_zone_model($date_array);  
//          
//            }else{
//                $data['done_list_result'] = $this->ert_model->ERT_done_list_by_status_n_all_zone_model($status,$date_array);      
//                $data['visit_result'] = $this->ert_model->ERT_visit_count_by_all_zone_model($date_array); 
//                         
//          }
//        
//    } else {
//
//        if($status=='All'){
//             if($Sub_Zone==null){
//                 $data['done_list_result'] = $this->ert_model->ERT_done_list_search_by_zone_model($Zone,$date_array);      
//                 $data['visit_result'] = $this->ert_model->ERT_visit_count_by_zone_model($Zone,$date_array); 
//             }else{            
//                 $data['done_list_result'] = $this->ert_model->ERT_done_list_by_sub_zone_model($Sub_Zone,$date_array);      
//                 $data['visit_result'] = $this->ert_model->ERT_visit_count_by_sub_zone_model($Sub_Zone,$date_array); 
//             }
//        }else{
//             if($Sub_Zone==null){
//                 $data['done_list_result'] = $this->ert_model->ERT_done_list_by_status_n_zone_model($status,$Zone,$date_array);      
//                 $data['visit_result'] = $this->ert_model->ERT_visit_count_by_zone_model($Zone,$date_array); 
//             }else{ 
//                 if($Distributor==null){
//                    $data['done_list_result'] = $this->ert_model->ERT_done_by_status_n_sub_zone_model($status,$Sub_Zone,$date_array);      
//                    $data['visit_result'] = $this->ert_model->ERT_visit_count_by_sub_zone_model($Sub_Zone,$date_array); 
//                 }else{
//                    $data['done_list_result'] = $this->ert_model->ERT_done_by_status_n_sub_zone_n_distributor_model($status,$Sub_Zone,$Distributor,$date_array);      
//                    $data['visit_result'] = $this->ert_model->ERT_visit_count_by_sub_zone_model($Sub_Zone,$date_array);  
//                 }
//                 
//             }              
//        }   
//    }
//    echo '<pre>';
////    echo 'E ID :'.$Engineer_ID;
//    print_r($data['pending_list_result']);
      //      ...............................................................................................  
      
//        
        $data['maincontent'] = $this->load->view('ert_done_task_by_sub_zone', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
   
        
    }
       public function ERT_distributor(){
        
        
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

       
    $data['done_list_result'] = $this->ert_model->ERT_distributo_search_model($date_array); 
    
    
//    echo '<pre>';
//    print_r($data['done_list_result']);
    
    
    
     
        $data['maincontent'] = $this->load->view('ERT_distributor_page', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
   
        
    }
    public function Check_Client_id_function(){

       $Client_id=$this->input->post('Client_id');       
       $result = $this->ert_model->Check_client_id_model($Client_id);
       echo json_encode($result);
    }
    
    
}

?>