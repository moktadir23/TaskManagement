<?php if ( ! defined('BASEPATH')) {exit('No direct script access allowed');}

session_start();

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->library("pagination");
        $this->load->model('registration_model');      
        $this->load->model('employee_database');
        $this->load->library('table');       
        $this->load->library('session');

//        $this->load->database();
//        $this->load->library('Excel');
        
        $user_id = $this->session->userdata('user_id');
        $id = $this->session->userdata('id');
        $u_type = $this->session->userdata('u_type');
     
        if ($user_id == NULL) {
            redirect('index.php/admin', 'refresh');
        }    
       
    }
    public function index(){  
        
//...............................................................................................................
         $department = $this->session->userdata('department');
         $id = $this->session->userdata('id');
         $einfo = $this->registration_model->check_einfo($id);
         
         $email=$einfo->email;
         $mobile_munber=$einfo->mobile_munber;
         $ip_phone=$einfo->ip_phone;
         $Designation=$einfo->Designation;
         $file_name=$einfo->file_name;

         
        $update_log_info=array();
        if($email == null || $mobile_munber == null || $ip_phone == null || $Designation == null || $file_name == null ){
            $update_log_info['p_info_session']='not_allow';
            $this->session->set_userdata($update_log_info); 
            
           redirect('index.php/nmc_c/profile'); 
        }
        
        $update_log_info['p_info_session']='allow';
        $this->session->set_userdata($update_log_info); 
// ................................................ CS .............................................................       
         
        if($department=='CS' || $department=='FONOC_Admin' || $department=='CS_Admin'){
            
           redirect('index.php/welcome/CS_DB'); 
        }
//.................................................NOC NMC VPN ..................................................................
        if($department == "NOC" || $department == "VPN" || $department == "NOC_Admin" || $department == "NMC" ){
            
           redirect('index.php/welcome/noc_db'); 
        }
//................................................... .WI .................................................................
         if ($department == "Wireless_Infra" || $department == 'POWER') {
             
             redirect('index.php/welcome/wi_db');  
         }
//  ............................................. ERT ............................................................................
       if ($department == "ERT" ) {
             
             redirect('index.php/welcome/ert_db');  
         }  
// ..........................................................................................................................     
//  ............................................. IPTS .......................................................................
       if ($department == "IPTS" ) {
             
             redirect('index.php/welcome/ipts_db');  
         }  
// ..........................................................................................................................   
 //  ............................................. FONOC  .......................................................................
       if ($department == "FONOC" || $department == "FONOC_Admin") {
             
             redirect('index.php/welcome/fonoc_db');  
         }  
// ..........................................................................................................................  
 //  ............................................. SD  .......................................................................
       if ($department == "SD" ) {
             
             redirect('index.php/welcome/sd_db');  
         }  
// ..........................................................................................................................      
  //  ............................................. FI .......................................................................
       if ($department == "FI" ) {
             
             redirect('index.php/welcome/fi_db');  
         }  
// ..........................................................................................................................    
         
//  ............................................. Marketing.......................................................................
       if ($department == "corporate" ) {
             
             redirect('index.php/corporate_c/corporate_db');  
        } 
        
        if ($department == "ctg_mkt" ) {
             
             redirect('index.php/corporate_c/ctg_mkt');  
        }
        if ($department == "Strategic" ) {
             
             redirect('index.php/corporate_c/Strategic_db');  
        } 
        if ($department == "Bank_NBFI" ) {
             
             redirect('index.php/corporate_c/bank_nbfi_db');  
        } 
        if ($department == "KAM" ) {
             
             redirect('index.php/corporate_c/kam_db');  
        } 
// .......................................................................................................................... 
        $data=array(); 
//        $data['result']=$this->registration_model->dashbroad_model();
//        $data['NOC_task_result']=$this->registration_model->NOC_dashbroad_task_model();
//        
//        $data['CS_result']=$this->registration_model->CS_dashbroad_model();
//        $data['CS_result_zone']=$this->registration_model->CS_dashbroad_zone_model();
//        $data['CS_tki_status']=$this->registration_model->CS_pick_tki_status_model();
//         
//        $data['FONOC_result']=$this->employee_database->FONOC_dashbroad_model();
//        
////        $data['ERT_result']=$this->ert_model->ERT_dashbroad_model();
//         $data['ERT_Zone_result']=$this->employee_database->ERT_type_task_dashbroad_model();
//         $data['ERT_result']=$this->employee_database->ERT_dashbroad_model();
//        
////         $data['WI_Zone']=$this->employee_database->WI_pick_zone_model();
//        $data['WI_Details']=$this->employee_database->Wi_Details_model();
//        
//        $data['IPTS_Details']=$this->employee_database->ipts_Details_model();
//        
//        
//        $data['FI_Zone_result']=$this->employee_database->FI_type_task_dashbroad_model(); 
//        $data['FI_Zone_done_result']=$this->employee_database->FI_done_task_dashbroad_model();
//        
//        $data['SD_result']=$this->registration_model->sd_task_summery();
//        $data['SD_details_result']=$this->registration_model->sd_task_details();
//        
//        $data['NMC_result']=$this->registration_model->nmc_task_summery();
//        $data['NMC_details_result']=$this->registration_model->nmc_task_details();
//...........................................................................................................
        
        $data['maincontent']= $this->load->view('dashboard_page',$data,true);
        $this->load->view('home',$data);   
    }
//    public function registration(){  
//            $this->load->view('registration_page');
//    }
    
    
//    public function save_user(){
//            $data=array();
//            $data['id']=$this->input->post('id',true);   
//            $data['name']=$this->input->post('name',true); 
//            $data['email']=$this->input->post('email',true);  
//            $data['password']=$this->input->post('password',true);           
//            $data['department']=$this->input->post('department',true);
//            $data['type_user']=$this->input->post('type_user',true);
//
//            $this->load->model('registration_model');
//            $this->registration_model->save_user_info($data);    
//            
////            $_SESSION["email"] = $email;
////            $_SESSION["password"] = $password;
////            $_SESSION["id"] = $id;
//            
//            $sdata=array();
//            $sdata['message']='Done susscefully Registration';
//            $this->session->set_userdata($sdata);
//            redirect("index.php/welcome/index");
//       
//    }
    public function logout(){
        
        $data = array();
        $data['user_id'] = $this->session->userdata('user_id');
        $data['id'] = $this->session->userdata('id');
        $data['name'] = $this->session->userdata('name');
        $data['department'] = $this->session->userdata('department');
        $data['Zone'] = $this->session->userdata('Zone');
        $data['act'] = 'logout';
        
        $this->registration_model->user_lock($data);
        
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('department');
        $this->session->unset_userdata('Zone');
        $this->session->unset_userdata($sdata);
        $this->session->unset_userdata($update_log_info);
        $sdata = array();
        $sdata['message'] = 'Your are successfully logout !';
        $this->session->set_userdata($sdata);
        redirect("index.php/admin/index");
            
    } 
    public function assin_task_funcation(){
        
        $data = array();
        $data['result'] = $this->registration_model->assign_task_page_category();
//$id = $this->session->userdata('id');
//            echo"<pre>";
//             print_r($id);
//             echo"</pre>";
        $data['maincontent'] = $this->load->view('assign_task_page', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    } 
    
    
//      public function Customer_Registration_funcation() {
//
//        $data = array();
//        $data['result'] = $this->mq_model->reg_page_category();
//        $data['result_entity'] = $this->mq_model->reg_page_entity();
////      $data['result_max_id']=$this->mq_model->max_retail_id();	
//        $data['maincontent'] = $this->load->view('Subscriber_Registration_page', $data, true);
//        $this->load->view('home', $data);
//    }
    
    public function Check_High_priority_time(){
     $s_date=$this->input->post('s_date');
     $new_start_date = date("Y-m-d h:i:s", strtotime($s_date));
//     $new_start_date='2018-07-24 00:00:00';
     
     $e_date=$this->input->post('e_date');
     $new_end_date = date("Y-m-d h:i:s", strtotime($e_date)); 
//     $new_end_date ='2018-07-26 00:00:00';
              
     $employee_id=$this->input->post('employee_id');     
     $priority_type=$this->input->post('priority_type');
//     $employee_id='L3T1181';
     
     $result_s = $this->registration_model->find_free_time_for_high_priority1($new_start_date,$new_end_date,$employee_id,$priority_type);
     $result_e = $this->registration_model->find_free_time_for_high_priority2($new_start_date,$new_end_date,$employee_id,$priority_type);
//    echo '<pre>';
//    echo 'S'.$new_start_date.'....'.$new_end_date;
//    print_r($result_s);
////    print_r($result_e);
//    echo '</pre>';
//     
 if( $result_s == null && $result_e == null ){
//echo 'Free That Time';
    $free_or_Not=0;
 }else{
//echo 'That Time is already assain another Task';
     $free_or_Not=1;
 }

    
    echo json_encode($free_or_Not);
        
    }

    public function save_task_info_funcation(){
            
          $id = $this->session->userdata('id');   
          $department = $this->session->userdata('department'); 
            $tdata = array();
            $tdata['create_date'] = date("Y-m-d");
            $tdata['create_id'] = $id;            
            $this->registration_model->save_ticket_info_model($tdata);
            $ticket_data = array();
            $ticket_data['result_ticket_id'] = $this->registration_model->find_ticket_Id($id);
//          $ticket_data['result_ticket_id']->ticket_id,
//          ticket_no
            $data=array();           
            $data['create_id']=$id;   
            $data['department']=$department;  
            $data['ticket_no']=$ticket_data['result_ticket_id']->ticket_id;
            $data['id']=$this->input->post('employee_id');
            $data['name']=$this->input->post('employee_name');
            $data['priority_type']=$this->input->post('priority_type');
            $data['type_task']=$this->input->post('type_task');   
            $data['sub_task']=$this->input->post('sub_task'); 
            $data['mis_mq_ticket_id']=$this->input->post('mis_mq_ticket_id');
            $data['client_bts_provider_name']=$this->input->post('client_bts_provider_name');
            $data['Receipt_Phone']=$this->input->post('Receipt_Phone');
            $data['assign_by']=$this->input->post('assign_by');  
            $data['transfer_to']=$this->input->post('transfer_to');
            
            $Date = $this->input->post('s_date');
            $new_start_date = date("Y-m-d H:i:s", strtotime($Date));
            
            $data['start_date']=$new_start_date; 
            $data['transfer_date']=$this->input->post('transfer_date');
            
            
            $Date1 = $this->input->post('e_date');
            $new_end_Date = date("Y-m-d H:i:s", strtotime($Date1));
            
            
            
            $data['end_date']= $new_end_Date;
            $data['states']=$this->input->post('states');
            $c_data['comments']=$this->input->post('comments');

            $this->load->model('registration_model');
            $this->registration_model->save_task_info_model($data);  
                        
            $c_data['id']=$id;
            $c_data['ticket_no']=$ticket_data['result_ticket_id']->ticket_id;
            $c_data['comments_date']=date("Y-m-d");
            $c_data['comments']=$this->input->post('comments');
            $this->registration_model->save_comments_model($c_data); 

            
            $sdata=array();
            $sdata['message']='Save Task successfully';
            $this->session->set_userdata($sdata);
            redirect("index.php/welcome/assin_task_funcation");
       
    }
    public function report_List_funcation(){            
	$data=array();
        
        $config["base_url"] = base_url() . "index.php/welcome/report_List_funcation/";
        $config["total_rows"] = $this->registration_model->record_count();
        $config["per_page"] = 4;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->registration_model->
                Pagination_select_model($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
                    
//           echo"<pre>";
//           print_r($data);
//           echo"</pre>";
        $data['maincontent']= $this->load->view('report_list_page',$data,true);
        $this->load->view('home',$data);       
    }
    
    public function delete_report_list_funcation($task_info_id){
        
         $this->registration_model->delete__report_list_model($task_info_id);
         redirect("index.php/welcome/report_List_funcation");        
    }
    public function edit_report_list_funcation($task_info_id){
        
        $data = array();

        $data['result'] = $this->registration_model->edit__report_model_funcation($task_info_id);

//            echo"<pre>";
//             print_r($data);
//             echo"</pre>";
        $data['maincontent'] = $this->load->view('edit_task_info_page', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    public function update_task_info_funcation(){
  
        $data=array();
        $data['type_task']=$this->input->post('type_task'); 
        $task_info_id = $this->input->post('task_info_id', true);
        $data['sub_task']=$this->input->post('sub_task'); 
        $data['assign_by']=$this->input->post('assign_by');  
        $data['transfer_to']=$this->input->post('transfer_to');
        $data['start_date']=$this->input->post('start_date');           
        $data['end_date']=$this->input->post('end_date');
        $data['states']=$this->input->post('states');
        $data['comments']=$this->input->post('comments');
               
        $this->registration_model->update_task_info_model($task_info_id, $data);  
        
        
        $sdata=array();
        $sdata['message']='Update information susscefully';
        $this->session->set_userdata($sdata);
        
        redirect("index.php/welcome/report_List_funcation");
    }

    
    public function edit_task_done_funcation($ticket_no){
        $data = array();
        $data['result'] = $this->registration_model->edit__task_done_model($ticket_no);

//           echo"<pre>";
//             print_r($data);
//             echo"</pre>";
        $data['maincontent'] = $this->load->view('edit_task_done_page', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }

    public function update_task_done_funcation($ticket_no){
        
        
        $data=array();
//        $ticket_no = $this->input->post('ticket_no');

//            $Date1 = $this->input->post('end_date');
//            $new_end_Date = date("Y-m-d ", strtotime($Date1)); 
//        $today = date("Y-m-d H:i:s"); 
        $data['end_date']=date("Y-m-d H:i:s");
        $data['states']="Done";

           
//        echo"<pre>";
//             print_r($data);
//        echo"</pre>";
        
        $this->registration_model->update_task_done_model($ticket_no, $data);  
        
        
        
//        eee
        
//        $id = $this->session->userdata('id');
//        $c_data['id']=$id;
//        $c_data['ticket_no']=$ticket_no;
//        $c_data['comments_date']=date("Y-m-d");
//        $c_data['comments']=$this->input->post('comments');
//        $this->registration_model->save_comments_model($c_data);
        
        
        $sdata=array();
        $sdata['message']='Task Complete susscefully';
        $this->session->set_userdata($sdata);
        
        redirect("index.php/welcome/Dashboard_funcation");
        
    }

    public function edit_task_transfe_funcation($tickte_no){
        
        
        
        
        
        
        
        
        
       $data = array();
       $data['result'] = $this->registration_model->edit__task_transfe_model($tickte_no);       
       $data['transfer_id'] = $this->registration_model->task_transfer_page_category();
//        echo"<pre>";
//        print_r($data);
//        echo"</pre>";

        $data['maincontent'] = $this->load->view('edit_task_transfe_page', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data); 
    }

    public function update_task_transfer_funcation(){
        
        
        $data=array();
        $id = $this->session->userdata('id');
        $ticket_no = $this->input->post('ticket_no');
        $data['id']=$this->input->post('transfer_to');        
        $data['transfer_to']=$this->input->post('transfer_to');
        $data['transfer_from']=$id;
        $data['name']=$this->input->post('transfer_name');
        $Date = $this->input->post('transfer_date');
        $new_transfer_date = date("Y-m-d", strtotime($Date));
        $data['transfer_date']=$new_transfer_date;
//        $data['comments']=$this->input->post('comments');
               
        $this->registration_model->update_task_transfer_model($ticket_no, $data);  
        
        $id = $this->session->userdata('id');
        $task_id_info['create_id']=$id;
        $task_id_info['ticket_no']=$this->input->post('ticket_no');
        $task_id_info['id']=$this->input->post('transfer_to');
        $this->registration_model->save_task_id_info_model($task_id_info); 
        
        
        $c_data['id']=$id;
        $c_data['ticket_no']=$ticket_no;
        $c_data['comments_date']=date("Y-m-d");
        $c_data['comments']=$this->input->post('comments');
        $this->registration_model->save_comments_model($c_data);
        
        
        $sdata=array();
        $sdata['message']='Task Transfer susscefully';
        $this->session->set_userdata($sdata);
        
        redirect("index.php/welcome/Dashboard_funcation");
        
        
        
        
  
    }

//................................ END Pending function.....................................

//    public function task_transfer_from_funcation(){
//            
//	$data=array();
//        $data['maincontent']=  $this->load->view('task_transfer_from_page','',true);
//        $this->load->view('home',$data);
//        
//    }
    public function task_transfer_list_funcation(){
            
	$data=array();
        
        $transfer_id = $this->session->userdata('transfer_id');
        $data['result'] = $this->registration_model->view_task_transfer_information($transfer_id);
        
//            echo"<pre>";
//           print_r($data);
//            echo"</pre>";
       
        $data['maincontent']=  $this->load->view('task_transfer_list_page',$data,true);
        $this->load->view('home',$data);       
    } 
    
     public function task_transfer_info_save(){
            $data=array();
            $data['id']=$this->input->post('id',true);   
            $data['receiver_id']=$this->input->post('receiver_id',true); 
            $data['type_task']=$this->input->post('type_task',true); 
            $data['transfer_date']=$this->input->post('transfer_date',true);  
            $data['end_date']=$this->input->post('end_date',true);           
            $data['transfer_comment']=$this->input->post('transfer_comment',true);

            $this->load->model('registration_model');
            $this->registration_model->task_transfer_info_save_model($data);           
            
//            $sdata=array();
//            $sdata['message']='Done susscefully Registration';
//            $this->session->set_userdata($sdata);
            redirect("index.php/welcome/task_transfer_list_funcation");
       
    }
    public function registration_list_funcation(){
        
        $data=array(); 
        
        $user_id=$this->session->userdata('user_id');
        $data['result']=$this->registration_model->registration_list_model_by_user_id($user_id); 
            
//           echo"<pre>";
//           print_r($data);
//           echo"</pre>";

        $data['maincontent']=  $this->load->view('registration_list_page',$data,true);
        $this->load->view('home',$data);
        
    }
    
    public function summary_of_task_funcation(){
        
        $data=array(); 
        $task_info_id=$this->session->userdata('task_info_id');
        $data['result']=$this->registration_model->view_summary_task_model($task_info_id);

        $data['maincontent']=  $this->load->view('summary_of_task_page',$data,true);
        $this->load->view('home',$data);
        
        
        
        
//        $t_data=array(); 
//        $t_data['result']=$this->registration_model->total_task_number_model($task_info_id);
//        $data['maincontent']=  $this->load->view('summary_of_task_page',$t_data,true);
//        $this->load->view('home',$t_data);
    }
       public function summary_done_task_by_employee_funcation(){
        
        $data=array(); 
//        $task_info_id=$this->session->userdata('task_info_id');
        $data['result']=$this->registration_model->view_summary_of_done_task_by_employee_model();

        $data['maincontent']=  $this->load->view('summary_of_done_task_page',$data,true);
        $this->load->view('home',$data);
        
    }
    
    
    
    public function search_task_funcation(){
        
        
        $data=array();       
        $data['maincontent']=  $this->load->view('search_task_page','',true);
        $this->load->view('home',$data);
    }
      public function search_task_by_id_funcation($id){
        
        $data = array();
//        $id=$this->session->userdata('id');
        $data['result']=$this->registration_model->search_task_by_id_model($id);


        
        $data['maincontent']=  $this->load->view('done_task_by_L3T1181_page',$data,true);
        $this->load->view('home',$data);
    }
   
    



    public function individual_task_list_funcation(){
        
        $data=array(); 
//        $id=$this->session->userdata('id');
        $data['result']=$this->registration_model->individual_task_list_model();
        
//        $task_info_id=$this->session->userdata('task_info_id');
//        $data['result']=$this->registration_model->view_summary_task_model($task_info_id);
        $data['maincontent']=  $this->load->view('individual_task_list_page',$data,true);
        $this->load->view('home',$data);
    
    }
    
    public function pending_infrastructure_funcation(){
        
        $data=array(); 
        $task_info_id=$this->session->userdata('task_info_id');
        $data['result']=$this->registration_model->pending_infrastructure_model($task_info_id);

        $data['maincontent']=  $this->load->view('pending_infrastructure_page',$data,true);
        $this->load->view('home',$data); 
    }
    public function pending_corporate_funcation(){
        
        $data=array(); 
        $task_info_id=$this->session->userdata('task_info_id');
        $data['result']=$this->registration_model->pending_corporate_model($task_info_id);

        $data['maincontent']=  $this->load->view('pending_corporate_page',$data,true);
        $this->load->view('home',$data);  
        
    }
   
    public function pending_R_D_funcation(){
        
        $data=array(); 
        $task_info_id=$this->session->userdata('task_info_id');
        $data['result']=$this->registration_model->pending_R_D_model($task_info_id);

        $data['maincontent']=  $this->load->view('pending_R&D_page',$data,true);
        $this->load->view('home',$data); 
    }
    public function pending_project_work_funcation(){
        
        $data=array(); 
        $task_info_id=$this->session->userdata('task_info_id');
        $data['result']=$this->registration_model->pending_project_work_model($task_info_id);

        $data['maincontent']=  $this->load->view('pending_project_work_page',$data,true);
        $this->load->view('home',$data);  
    }

    public function pending_FTTX_funcation(){
        
        $data=array(); 
        $task_info_id=$this->session->userdata('task_info_id');
        $data['result']=$this->registration_model->pending_FTTX_model($task_info_id);

        $data['maincontent']=  $this->load->view('pending_FTTX_page',$data,true);
        $this->load->view('home',$data);  
    }
    
    public function pending_task_detail_funcation($type_task){
 
        
        $data=array(); 
        
        $data['result']=$this->registration_model->pending_task_detail_model($type_task);
        
//         echo"<pre>";
//           print_r($data);
//           echo"</pre>"; 
        
        $data['maincontent']=  $this->load->view('pending_task_detail_page',$data,true);
        $this->load->view('home',$data);  
    }
    
    
//    ............................................................................................................................

   
    
//    .....................................................................................................................
    public function done_task_number_by_id_funcation($id){
        
        
        $data=array(); 
        $data['result']=$this->registration_model->done_task_number_by_id_model($id);

//           echo"<pre>";
//           print_r($data);
//           echo"</pre>";
        
        $data['maincontent']=  $this->load->view('done_task_number_by_id_page',$data,true);
        $this->load->view('home',$data);   
    }
    public function detail_task_by_id_funcation($id){
        
        $data=array(); 
        $data['result']=$this->registration_model->detail_task_by_id_model($id);

//           echo"<pre>";
//           print_r($data);
//           echo"</pre>";
        
        $data['maincontent']=  $this->load->view('detail_task_by_id_page',$data,true);
        $this->load->view('home',$data); 
    }
        
    public function find_task_info_by_date_funcation(){
//  $from = $_POST["from_date"];
//  $to = $_POST["end_date"];    

        $data=array();
       
        $data['from_date']=$this->input->post('from_date',true); 
        $data['to_date']=$this->input->post('to_date',true); 
        var_dump($data['from_date']);
        var_dump($data['to_date']);
        $data['result']=$this->registration_model->find_done_task_by_date_model();        
           
//        echo $from_date . "----" . $to_date . "<br>";
        
        
           echo"<pre>";
           print_r($data);
           echo"</pre>"; 
//        $data['maincontent']=  $this->load->view('search_result_by_date_for_done_task_details_page',$data,true);
//        $this->load->view('home',$data);       
    }
    public function all_pending_list_funcation(){
        
        $data=array(); 
        //$states=$this->session->userdata('$states');
//        $data['result']=$this->registration_model->view_report_list_model($task_info_id);
        
        
        $config["base_url"] = base_url() . "index.php/welcome/all_pending_list_funcation/";
        $config["total_rows"] = $this->registration_model->record_count_pending();
        $config["per_page"] =100;
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
        $data['maincontent']= $this->load->view('all_pending_list_page',$data,true);
        $this->load->view('home',$data);    
    }
    
    public function all_done_list_funcation(){
      
        $data=array(); 
//        $task_info_id=$this->session->userdata('task_info_id');
          $config["base_url"] = base_url() . "index.php/welcome/all_done_list_funcation/";
        $config["total_rows"] = $this->registration_model->record_count_done();
        $config["per_page"] =100;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->registration_model->
                done_task_with_Pagination_model($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        
//        $data['result']=$this->registration_model->all_done_list_model();
        $data['maincontent']= $this->load->view('all_done_list_page',$data,true);
        $this->load->view('home',$data);
    }

        public function search_done_task_by_employee_id_funcation(){
        
        $data=array(); 
        $task_info_id=$this->session->userdata('task_info_id'); 
        $data['result']=$this->registration_model->all_done_list_model($task_info_id);
        $data['maincontent']= $this->load->view('search_done_task_by_employee_id_page',$data,true);
        $this->load->view('home',$data); 
    }
        
    
      public function select_by_id() {
 
        $data=array(); 
        $data['search_id'] = $this->registration_model->search_page_category();
        $type_task = $this->input->post('type_task');
        $_SESSION["session_noc_task_type"] = $type_task;
        
        $id = $this->input->post('employee_id');
        $_SESSION["session_noc_id"] = $id;
        
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

        if($type_task=='0' && $id=='0'){
           $data['search_result'] = $this->registration_model->noc_task_show_by_data_model($date_array);
           $data['done_task_summery'] = $this->registration_model->noc_done_summerys_by_data_model($date_array); 
           $data['done_task_id_summery'] =$this->registration_model->noc_done_summerys_by_data_model_1($date_array); 
        }else if($type_task=='0' && $id!='0'){
            $data['search_result'] = $this->registration_model->show_data_by_id_model($id,$date_array);
            $data['done_task_summery'] = $this->registration_model->noc_done_by_Eng_ID_summery_model($id,$date_array);  
            $data['done_task_id_summery'] =null;
        }else if($id=='0' && $type_task!='0'){
            $data['search_result'] = $this->registration_model->noc_task_show_by_type_data_model($type_task,$date_array);
            $data['done_task_summery'] =null;
            $data['done_task_id_summery'] = $this->registration_model->noc_done_summerys_by_task_data_model($type_task,$date_array);
        }else if( $type_task!='0' && $id!='0' ){
            $data['search_result'] = $this->registration_model->noc_show_data_by_type_id_model($type_task,$id,$date_array);
            $data['done_task_summery'] = null;
            $data['done_task_id_summery']=null;
        }

        
        
        $data['maincontent']=  $this->load->view('show_data_by_id',$data,true);
        $this->load->view('home',$data);         

    }
    
public function createXLS_report_by_NOC_Employee_ID(){
                
//      load excel library
$this->load->library('excel');
        
/////////////////////////////////////////////////////////////////////////////////////////////////
$type_task=$_SESSION["session_noc_task_type"];
$Engineer_ID=$_SESSION["session_noc_id"];

$Date=$_SESSION["done_date_from_ID"];
$date_from = date("Y-m-d 00:00:00", strtotime($Date));
$date1 =  $date_from;

$Date1=$_SESSION["done_date_to_ID"];
$date_to = date("Y-m-d 23:59:59", strtotime($Date1));
$date2 = $date_to;

$date_array = array(
    'date1' => $date1,
    'date2' => $date2
);


if($type_task==null && $Engineer_ID==null){
//   $data['search_result'] = $this->registration_model->noc_task_show_by_data_model($date_array);  
   $empInfo =  $this->registration_model->noc_excel_done_task_List_by_date($date_array);
}else if($type_task==null){
//    $data['search_result'] = $this->registration_model->show_data_by_id_model($id,$date_array);
    $empInfo =  $this->registration_model->noc_excel_done_task_List_by_ID($Engineer_ID,$date_array);
}else if($Engineer_ID==null){
//    $data['search_result'] = $this->registration_model->noc_task_show_by_type_data_model($type_task,$date_array);
    $empInfo =  $this->registration_model->noc_excel_done_task_List_by_task_type($type_task,$date_array);
}else if( $type_task!=null && $Engineer_ID!=null ){
//    $data['search_result'] = $this->registration_model->noc_show_data_by_type_id_model($type_task,$Engineer_ID,$date_array);
    $empInfo =  $this->registration_model->noc_excel_done_task_List_by_ID_task_type($type_task,$Engineer_ID,$date_array);
}

///////////////////////////////////////////////////////////////////////////////////////////////    
 
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'ID');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Task Type');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Sub-Task');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Client/BTS/Provider Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'MIS / MQ ticket id');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Start Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'End Date');

        
       
        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {

            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['id']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['type_task']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['sub_task']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['client_bts_provider_name']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['mis_mq_ticket_id']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['assign_by']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element['start_date']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element['end_date']); 

            
            $rowCount++;
        }
// create file name   
        $date=date("Y-m-d h:i:sa");
        $fileName= $Engineer_ID.'_report.xls'; //.time()
         header("Content-Type: application/vnd.ms-excel");
       
      
       $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
       $objWriter->save('./css/'.$fileName);
// download file
 
        $this->load->helper('download');         
        ob_clean();      
        $data = file_get_contents(base_url().'css/'.$fileName);      
        force_download($fileName, $data);
        
         echo json_encode("DONE SUCCESSFULLY");
       
    }
    
     public function pending_data_by_id() {
        
        $data=array(); 
        $data['search_id'] = $this->registration_model->noc_id();
        
        $id = $this->input->post('employee_id');
        $data['search_result'] = $this->registration_model->show_pending_data_by_id_model($id);
        
// ................................ Comments ...............................................       
        $p_key_array=$data['search_result'];
        $id_comment_array=array();
//        
//        echo '<pre>';
//        print_r($data['search_result']);
//        
        foreach ($p_key_array as $value) {
            
                 $p_key=$value['ticket_no'];
                 
                 $id_comment = $this->registration_model->NOC_frist_comments_id_by_model($p_key);
                 
                 array_push($id_comment_array, $id_comment);      
        }
        
        $data['comments_result'] = $id_comment_array;
//  ..............................................................................      
        $data['maincontent']=  $this->load->view('pending_data_by_id_page',$data,true);
        $this->load->view('home',$data);         

    }
     public function DB_A_NOC_search_pending_task_by_id($id) {
        
        $data=array(); 
        $data['search_id'] = $this->registration_model->search_page_category();
        $data['search_result'] = $this->registration_model->show_pending_data_by_id_model($id);
        
             
// ................................ Comments ...............................................       
        $p_key_array=$data['search_result'];
        $id_comment_array=array();
//        
//        echo '<pre>';
//        print_r($data['search_result']);
//        
        foreach ($p_key_array as $value) {
            
                 $p_key=$value['ticket_no'];
                 
                 $id_comment = $this->registration_model->NOC_frist_comments_id_by_model($p_key);
                 
                 array_push($id_comment_array, $id_comment);      
        }
        
        $data['comments_result'] = $id_comment_array;
//  ..............................................................................   
        
        
        $data['maincontent']=  $this->load->view('pending_data_by_id_page',$data,true);
        $this->load->view('home',$data);         

    }
    
    
    public function show_data_by_type_of_task_funcation(){
      
        $data=array(); 
        $data['search_id'] = $this->registration_model->search_type_task_category();
        $type_task = $this->input->post('type_task');
        
        
        
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
        
//        if ($type_task != "") {
            $result = $this->registration_model->show_data_by_type_task_model($type_task,$date_array);
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
        $data['maincontent']=  $this->load->view('show_data_by_type_of_task',$data,true);
        $this->load->view('home',$data); 
    }
    
    
    public function pending_data_by_type_of_task_funcation(){
        
        $data=array();       
        $data['search_id'] = $this->registration_model->search_type_task_category();
        $type_task = $this->input->post('type_task');

//        if ($type_task != "") {
            $result = $this->registration_model->pending_data_by_type_task_model($type_task);
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
        $data['maincontent']=  $this->load->view('pending_data_by_type_of_task',$data,true);
        $this->load->view('home',$data); 
        
    }
    
     public function DB_A_NOC_s_pend_task_by_type_task($type_task){
        
        $data=array(); 
        
       $data['search_id'] = $this->registration_model->search_type_task_category();

//        if ($type_task != "") {
            $result = $this->registration_model->pending_data_by_type_task_model($type_task);
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
        $data['maincontent']=  $this->load->view('pending_data_by_type_of_task',$data,true);
        $this->load->view('home',$data); 
        
    }

        public function show_data_by_mis_mq_id(){
        
       $data=array(); 
      $mis_mq_ticket_id = $this->input->post('mis_mq_ticket_id');
       
       
        if ($mis_mq_ticket_id != "") {
            $result = $this->registration_model->show_data_by_mis_mq_id_model($mis_mq_ticket_id);
            if ($result != false) {
                $data['result_display'] = $result;
            } else {
                $data['result_display'] = "No record found !";
            }
        } else {
            $data = array(
                'id_error_message' => "Id field is required"
            );
        }
//        $data['show_table'] = $this->view_table();
        $data['maincontent']=  $this->load->view('show_data_by_mis_mq_id_page',$data,true);
        $this->load->view('home',$data); 
    }
    
    public function pending_data_by_mis_mq_id(){
        
      $data=array(); 
      $mis_mq_ticket_id = $this->input->post('mis_mq_ticket_id');
       
       
        if ($mis_mq_ticket_id != "") {
            $result = $this->registration_model->pending_data_by_mis_mq_id_model($mis_mq_ticket_id);
            if ($result != false) {
                $data['result_display'] = $result;
            } else {
                $data['result_display'] = "No record found !";
            }
        } else {
            $data = array(
                'id_error_message' => "Id field is required"
            );
        }
//        $data['show_table'] = $this->view_table();
        $data['maincontent']=  $this->load->view('pending_data_by_mis_mq_id_page',$data,true);
        $this->load->view('home',$data);    
    }

    


    public function select_by_date_range() {
          
        $Date = $this->input->post('date_from');
        $date_from = date("Y-m-d 00:00:00", strtotime($Date));
        $date1 =  $date_from;
        
        
        $Date1 = $this->input->post('date_to');
        $date_to = date("Y-m-d 23:59:59", strtotime($Date1));
        $date2 = $date_to;
        
        $data = array(
            'date1' => $date1,
            'date2' => $date2
        );
        if ($date1 == "" || $date2 == "") {
            $data['date_range_error_message'] = "Both date fields are required";
        } else {
            $result = $this->registration_model->show_data_by_date_range($data);
            if ($result != false) {
                $data['result_display'] = $result;
            } else {
                $data['result_display'] = "No record found !";
            }
        }
        
//        echo"<pre>";
//        print_r($data);
//        echo"</pre>";
        
        
        $data['maincontent']=  $this->load->view('show_data_by_date_range',$data,true);
        $this->load->view('home',$data); 
    }
    
    public function pending_data_by_date_range(){
        
        $Date = $this->input->post('date_from');
        $date_from = date("Y-m-d 00:00:00", strtotime($Date));
        $date1 =  $date_from;
        
        
        $Date1 = $this->input->post('date_to');
        $date_to = date("Y-m-d 23:59:59", strtotime($Date1));
        $date2 = $date_to;
        
        $data = array(
            'date1' => $date1,
            'date2' => $date2
        );
        if ($date1 == "" || $date2 == "") {
            $data['date_range_error_message'] = "Both date fields are required";
        } else {
            $result = $this->registration_model->pending_data_by_date_range($data);
            if ($result != false) {
                $data['result_display'] = $result;
            } else {
                $data['result_display'] = "No record found !";
            }
        }
        
//        echo"<pre>";
//        print_r($data);
//        echo"</pre>";
        
        
        $data['maincontent']=  $this->load->view('pending_data_by_date_range',$data,true);
        $this->load->view('home',$data); 
    }
    
    public function CS_DB(){
        
        $data=array();
        $u_type = $this->session->userdata('u_type');
        $s_ofc = $this->session->userdata('s_ofc');
        if( $u_type=='user'){
            $data['CS_result']=$this->registration_model->CS_user_dashbroad_model();
            $data['CS_result_zone']=$this->registration_model->CS_user_dashbroad_zone_model();
            $data['CS_tki_status']=$this->registration_model->CS_user_pick_tki_status_model();
        }elseif($u_type=='a_user'){
            $data['CS_result']=$this->registration_model->CS_dashbroad_model();
            $data['CS_result_zone']=$this->registration_model->CS_auser_dashbroad_zone_model($s_ofc);
            $data['CS_tki_status']=$this->registration_model->CS_pick_tki_status_model();
        }else{
           $data['CS_result']=$this->registration_model->CS_dashbroad_model();
           $data['CS_result_zone']=$this->registration_model->CS_dashbroad_zone_model();
           $data['CS_tki_status']=$this->registration_model->CS_pick_tki_status_model();  
        }
        
        $data['maincontent']= $this->load->view('cs_dashboard',$data,true);
        $this->load->view('home',$data); 
        
    }

    public function noc_db(){
        
        $data=array(); 
        $data['team_result']=$this->registration_model->noc_team_db_model();
        $data['result']=$this->registration_model->dashbroad_model();
        $data['NOC_task_result']=$this->registration_model->NOC_dashbroad_task_model();        
        $data['NOC_worktime_monthly']=$this->registration_model->NOC_worktime_monthly_model();
        
        
        
        $data['NMC_result']=$this->registration_model->nmc_task_summery();
        $data['NMC_details_result']=$this->registration_model->nmc_task_details();
        
        $data['maincontent']= $this->load->view('noc_db',$data,true);
        $this->load->view('home',$data); 
    }
    
     public function hd_db(){
        
        $data=array(); 
//        $data['result']=$this->registration_model->dashbroad_model();
//        $data['NOC_task_result']=$this->registration_model->NOC_dashbroad_task_model();
//        
        $data['NMC_result']=$this->registration_model->nmc_task_summery();
        $data['NMC_details_result']=$this->registration_model->nmc_task_details();
        
        $data['maincontent']= $this->load->view('hd_db',$data,true);
        $this->load->view('home',$data); 
    }

    public function wi_db(){
        $data=array(); 
         
        $data['WI_Details']=$this->employee_database->Wi_Details_model();
        
        $data['NMC_result']=$this->registration_model->nmc_task_summery();
        $data['NMC_details_result']=$this->registration_model->nmc_task_details();
        
        $data['maincontent']= $this->load->view('wi_db',$data,true);
        $this->load->view('home',$data);   
    }
    
    
    public function wi_report(){
    
    $data = array();
    $data['result'] = $this->registration_model->CS_pending_task_zone_page();

    /////////////////////////////////////////////////////////////////////////////////////////////////
    $Date = $this->input->post('date_from');
//    $_SESSION["date_from"] = $Date;
    $date_from = date("Y-m-d 00:00:00", strtotime($Date));
    $date1 =  $date_from;
    

    $Date1 = $this->input->post('date_to');
//    $_SESSION["date_to"] = $Date1;
    $date_to = date("Y-m-d 23:59:59", strtotime($Date1));
    $date2 = $date_to;

    $date_array = array(
        'date1' => $date1,
        'date2' => $date2
    );
   
//    $this->session->unset_userdata('date_from');
//    $this->session->unset_userdata('date_to'); 
//    $sdata=array();
//    $sdata['from_date']=$Date;
//    $sdata['to_date']=$Date1;
//    $this->session->set_userdata($sdata);
    
///////////////////////////////////////////////////////////////////////////////////////////////    
//  .............................................................................................        
//  .............................................................................................. 
    $Zone = $this->input->post('Zone');   
    
    if($Zone == '0'){         
        $data['installation_result'] = $this->registration_model->WI_installation_date_model($date_array);         
    }else{
        $data['installation_result'] = $this->registration_model->WI_installation_zone_date_model($Zone,$date_array);
    }
   
    $data['maincontent'] = $this->load->view('wi_report', $data, true);
//        $data['title'] = 'View Course';
    $this->load->view('home', $data); 
    }
    
    
    public function ert_db(){
        $data=array(); 
         
        $data['ERT_Zone_result']=$this->employee_database->ERT_type_task_dashbroad_model();
        $data['ERT_result']=$this->employee_database->ERT_dashbroad_model();
        $data['ERT_distributor']=$this->employee_database->ERT_distributor_model();
        
        
        $data['maincontent']= $this->load->view('ert_db',$data,true);
        
        $this->load->view('home',$data);   
    }
    
    public function ipts_db(){
        $data=array(); 
         
        $data['IPTS_Details']=$this->employee_database->ipts_Details_model();
        
        $data['maincontent']= $this->load->view('ipts_db',$data,true);
        
        $this->load->view('home',$data);   
    }
    
    public function fonoc_db(){
        $data=array(); 
         
        $data['FONOC_result']=$this->employee_database->FONOC_dashbroad_model();
        $data['FONOC_zonetask_summery']=$this->employee_database->FONOC_zonetask_summery_model();
        $data['FONOC_zonetask_donesummery']=$this->employee_database->FONOC_zonetask_donesummery_model();
        
        
        
        $data['NMC_result']=$this->registration_model->nmc_task_summery();
        $data['NMC_details_result']=$this->registration_model->nmc_task_details();
        
        $data['maincontent']= $this->load->view('fonoc_db',$data,true);
        
        $this->load->view('home',$data); 
    }
    
    public function sd_db(){
        $data=array(); 
         
        $data['SD_result']=$this->registration_model->sd_task_summery();
        $data['SD_details_result']=$this->registration_model->sd_task_details();
        
        $data['NMC_result']=$this->registration_model->nmc_task_summery();
        $data['NMC_details_result']=$this->registration_model->nmc_task_details();

        
        $data['maincontent']= $this->load->view('sd_db',$data,true);
        
        $this->load->view('home',$data);  
    }
    
    public function fi_db(){
       
        $data=array(); 
         
        $data['FI_Zone_result']=$this->employee_database->FI_type_task_dashbroad_model(); 
        $data['FI_Zone_done_result']=$this->employee_database->FI_done_task_dashbroad_model();
        
        $data['NMC_result']=$this->registration_model->nmc_task_summery();
        $data['NMC_details_result']=$this->registration_model->nmc_task_details();
        
        $data['maincontent']= $this->load->view('fi_db',$data,true);
        
        $this->load->view('home',$data);  
    }

    public function Dashboard_funcation(){
        
//        $department = $this->session->userdata('department');
//        $type_user = $this->session->userdata('type_user');
// ...............................................................................................................           
         $department = $this->session->userdata('department');
         $id = $this->session->userdata('id');
         $einfo = $this->registration_model->check_einfo($id);
         
         $email=$einfo->email;
         $mobile_munber=$einfo->mobile_munber;
         $ip_phone=$einfo->ip_phone;
         $Designation=$einfo->Designation;
         $file_name=$einfo->file_name;

         
        $update_log_info=array();
        if($email == null || $mobile_munber == null || $ip_phone == null || $Designation == null || $file_name == null ){
            $update_log_info['p_info_session']='not_allow';
            $this->session->set_userdata($update_log_info); 
            
           redirect('index.php/nmc_c/profile', 'refresh'); 
        }        
        
        $update_log_info['p_info_session']='allow';
        $this->session->set_userdata($update_log_info); 
      
//................................................ CS ................................................................            

        $department = $this->session->userdata('department');
        
        if($department=='CS' || $department=='FONOC_Admin' || $department=='CS_Admin'){
            
           redirect('index.php/welcome/CS_DB'); 
        }
//..................................................NOC NMC VPN ..............................................................

        if($department == "NOC" || $department == "BNG" || $department == "server" || $department == "VPN" || $department == "NOC_Admin" || $department == "NMC" ){
            
           redirect('index.php/welcome/noc_db'); 
        }        
// ..................................................WI ..............................................................
         if ($department == "Wireless_Infra" || $department == 'POWER') {
             
             redirect('index.php/welcome/wi_db');  
         }
// .............................................. ERT ................................................................
           if ( $department == "ERT" ) {
             
             redirect('index.php/welcome/ert_db');  
         } 
//..........................................................................................................................
 //  ............................................. IPTS .......................................................................
       if ($department == "IPTS" ) {
             
             redirect('index.php/welcome/ipts_db');  
         }  
// ..........................................................................................................................   
 //  ............................................. FONOC  .......................................................................
       if ($department == "FONOC" || $department == "FONOC_Admin") {
             
             redirect('index.php/welcome/fonoc_db');  
         }  
// ..........................................................................................................................          
  //  ............................................. SD  .......................................................................
       if ($department == "SD" ) {
             
             redirect('index.php/welcome/sd_db');  
         }  
// .......................................................................................................................... 
  //  ............................................. FI .......................................................................
       if ($department == "FI" ) {
             
             redirect('index.php/welcome/fi_db');  
         }  
// ..........................................................................................................................     
        if ($department == "HD" ) {
             
             redirect('index.php/welcome/hd_db');  
        } 
        
// ..........................................................................................................................     
        if ($department == "Corporate" ) {
             
             redirect('index.php/corporate_c/corporate_db');  
        }    
        
        if ($department == "ctg_mkt" ) {
             
             redirect('index.php/corporate_c/ctg_mkt');  
        } 
        if ($department == "Strategic" ) {
             
             redirect('index.php/corporate_c/Strategic_db');  
        } 
        if ($department == "Bank_NBFI" ) {
             
             redirect('index.php/corporate_c/bank_nbfi_db');  
        } 
        if ($department == "KAM" ) {
             
             redirect('index.php/corporate_c/kam_db');  
        } 
        $data=array(); 
//        $data['result']=$this->registration_model->dashbroad_model();
//        $data['NOC_task_result']=$this->registration_model->NOC_dashbroad_task_model();
//        
//        $data['CS_result']=$this->registration_model->CS_dashbroad_model();
//        $data['CS_result_zone']=$this->registration_model->CS_dashbroad_zone_model();
//        $data['CS_tki_status']=$this->registration_model->CS_pick_tki_status_model();
//         
//        $data['FONOC_result']=$this->employee_database->FONOC_dashbroad_model();
//        
////        $data['ERT_result']=$this->ert_model->ERT_dashbroad_model();
//         $data['ERT_Zone_result']=$this->employee_database->ERT_type_task_dashbroad_model();
//         $data['ERT_result']=$this->employee_database->ERT_dashbroad_model();
//        
////         $data['WI_Zone']=$this->employee_database->WI_pick_zone_model();
//        $data['WI_Details']=$this->employee_database->Wi_Details_model();
//        
//        $data['IPTS_Details']=$this->employee_database->ipts_Details_model();
//        
//        
//        $data['FI_Zone_result']=$this->employee_database->FI_type_task_dashbroad_model(); 
//        $data['FI_Zone_done_result']=$this->employee_database->FI_done_task_dashbroad_model();
//        
//        $data['SD_result']=$this->registration_model->sd_task_summery();
//        $data['SD_details_result']=$this->registration_model->sd_task_details();
//        
//        $data['NMC_result']=$this->registration_model->nmc_task_summery();
//        $data['NMC_details_result']=$this->registration_model->nmc_task_details();
//...........................................................................................................
        
        
        $data['maincontent']= $this->load->view('dashboard_page',$data,true);
        $this->load->view('home',$data); 
    }
    public function new_comments_funcation($ticket_no){
        
        $data = array();
        $data['result1'] = $this->registration_model->view_comments_model($ticket_no);
        $data['result'] = $this->registration_model->comments_model_funcation($ticket_no);
        $data['maincontent'] = $this->load->view('new_comments_page', $data, true);
        $this->load->view('home', $data);

    }
  
    public function update_new_comments_funcation($ticket_no){
  
        $data=array();
     
        $data['ticket_no']=$this->input->post('ticket_no');
        $id = $this->session->userdata('id');
        $data['id']=$id;
        $data['comments_date']=date("Y-m-d");
        $data['comments']=$this->input->post('comments');               
        $this->registration_model->update_new_comments_model( $data);  

        
        
        
//        $attach_file_data['USERNAME'] = $user;
//        $attach_file_data['upload_date'] = date("Y-m-d");
//        $attach_file_data['Attachment_File'] = $Attachment_File_des['file_name'];
//        $attach_file_data['Description'] = $this->input->post('Description');
//        $attach_file_data['Document_Type'] = $this->input->post('Document_Type');

//        $insert_info = $this->mq_model->save_attach_file_info($attach_file_data);
        $returnData = array(
            
            "id" =>  $data['id'],
            "comments_date" => $data['comments_date'],
            "comments" =>  $data['comments'],
//            "Document_Type" => $attach_file_data['Document_Type'],
        );
        echo json_encode($returnData);
        
        
        
        
        
        
//        $sdata=array();
//        $sdata['message']='Update information susscefully';
//        $this->session->set_userdata($sdata);        
//        redirect("index.php/welcome/summary_of_task_funcation");
    }
    
    public function done_task_with_comments_funcation($ticket_no){
        
        
        $data=array();
        
        $data['ticket_no']=$this->input->post('ticket_no');
        $id = $this->session->userdata('id');
        $data['id']=$id;
        $data['comments_date']=date("Y-m-d");
        $data['comments']=$this->input->post('comments');
//        $data['states']='Done';
        $this->registration_model->update_new_comments_model($data);  
        
         $done_data['states']='Done';
        $ticket_no=$this->input->post('ticket_no');
        $this->registration_model->update_task_done_model($ticket_no, $done_data);
        
        
//        $attach_file_data['USERNAME'] = $user;
//        $attach_file_data['upload_date'] = date("Y-m-d");
//        $attach_file_data['Attachment_File'] = $Attachment_File_des['file_name'];
//        $attach_file_data['Description'] = $this->input->post('Description');
//        $attach_file_data['Document_Type'] = $this->input->post('Document_Type');

//        $insert_info = $this->mq_model->save_attach_file_info($attach_file_data);
//        $returnData = array(
//            
//            "id" =>  $data['id'],
//            "comments_date" => $data['comments_date'],
//            "comments" =>  $data['comments'],
////            "Document_Type" => $attach_file_data['Document_Type'],
//        );
        
        
        
        $returnData='TEST';
        echo json_encode($returnData);  
        
        redirect("index.php/welcome/all_pending_list_funcation");
       
//        eee
        
        
    }

    













    public function search_all_info_by_id_and_date_and_typetask__funcation(){

//      $data=array(); 
        $id = $this->input->post('id');
        $type_task = $this->input->post('type_task');
        $date1 = $this->input->post('date_from');
        $date2 = $this->input->post('date_to');
        $data = array(
            'date1' => $date1,
            'date2' => $date2
        );
        if ($id != "") {
            $result = $this->registration_model->search_all_info_by_id_and_date_and_typetask__funcation($id,$type_task,$data);
            if ($result != false) {
                $data['result_display'] = $result;
            } else {
                $data['result_display'] = "No record found !";
            }
        } else {
            $data = array(
                'id_error_message' => "Id field is required"
            );
        }
        $data['maincontent']=  $this->load->view('search_all_info_by_id_and_date_and_typetask__page',$data,true);
        $this->load->view('home',$data); 
        
    }
    public function search_by_id_pending_list() {
        
        $data=array(); 
        $id = $this->input->post('id');
        if ($id != "") {
            $result = $this->registration_model->show_data_by_id_pending_list_model($id);
            if ($result != false) {
                $data['result_display'] = $result;
            } else {
                $data['result_display'] = "No record found !";
            }
        } else {
            $data = array(
                'id_error_message' => "Id field is required"
            );
        }
        $data['maincontent']=  $this->load->view('show_pending_data_by_id',$data,true);
        $this->load->view('home',$data);         

    }
    public function view_comments_funcation($ticket_no){
        
        $data = array();
        $data['result'] = $this->registration_model->view_comments_model($ticket_no);

//           echo"<pre>";
//             print_r($data);
//             echo"</pre>";

        $data['maincontent'] = $this->load->view('view_comments_page',$data,true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data); 
    }
    
    public function test_funcation(){  
        
        $data = array();
//        $data['result'] = $this->registration_model->test_model($task_info_id);
//           echo"<pre>";
//           print_r($data);
//           echo"</pre>";

//        $data['maincontent'] = $this->load->view('test_page', '', true);
        $this->load->view('test_page');   
    }
    
    public function change_password_funcation(){
        
         $data = array();
//          $id = $this->session->userdata('id');
//          $data['user_id']=$id;
//          echo $id;
//        $data['result'] = $this->registration_model->view_comments_model($ticket_no);

//           echo"<pre>";
//             print_r($data);
//             echo"</pre>";

        $data['maincontent'] = $this->load->view('change_password_page',$data,true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data); 
        
    }
    public function creat_new_password(){
        
        $pick_info= array();
        $id = $this->session->userdata('id');
        $pick_info['result'] = $this->registration_model->change_pw_info($id);
//            echo"<pre>";
//                print_r($pick_info['result']);
//                echo $pick_info['result']->password;
//            echo"</pre>";            
//          $old_pw=$this->input->post('old_pw');  
        
          $plan_old_pw=$this->input->post('old_pw'); 
          $old_pw=md5($plan_old_pw); 
          
          $update_pw=array();
          $updat_bck_pw=array();
          $plan_new_pw=$this->input->post('new_pw');
          $updat_bck_pw['pass_word']=$plan_new_pw; 
          $update_pw['pass_word']=md5($plan_new_pw); 
          if($old_pw==$pick_info['result']->pass_word){
//              echo 'Change PW';
//              echo $old_pw;
              $this->registration_model->update_password_model($id ,$update_pw); 
              $this->registration_model->update_bck_pwd_model($id ,$updat_bck_pw); 
              $data_message = 'Successfully Change Password';
          }else{
//            echo 'PW Error';  
//            echo $old_pw;
              $data_message = 'Invalid Old Password';
          }
             
//        $id = $this->session->userdata('id');
//        $pw_info['id']=$id;
//        $old_pw=$this->input->post('new_pw');
//        $pw_info['password']=$this->input->post('new_pw');
////        $pw_info['result'] = $this->registration_model->change_pw_info($pw_info);
//        
////        echo $pw_info['password'];
//        
//        $this->registration_model->update_password_model($id ,$old_pw,$pw_info); 
//          
//        
          
       $returnData = array(
//            "Contract" => $returninfo['Contract'],
//            "USERNAME" => $returninfo['USERNAME'],
//            "package_name" => $returninfo['package_name'],
//            "package_price" => $returninfo['package_price'],
//            "Effective_Date" => $returninfo['Effective_Date'],
//            "Order_Date" => $returninfo['Order_Date'],
//            "end_date" => $returninfo['end_date'],
            
            "messages" => $data_message,
        );
//
        echo json_encode($returnData);
//        redirect("index.php/welcome/change_password_funcation");
    }
///////////////////////////////////////////////////////////////////////////////////////////
//...................... CS Functation ......................................................................
////////////////////////////////////////////////////////////////////////////////////    
    
    public function CS_faulty_device_list(){
    $data = array();       
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
    $zone = $this->input->post('Zone');  
    $sub_zone = $this->input->post('Sub_Zone');    
    $data['pending_list_result'] = $this->registration_model->cs_device_faulty_list_model($zone,$sub_zone,$date_array);     
    $data['maincontent'] = $this->load->view('CS_faulty_device_list', $data, true);
    $this->load->view('home', $data);     
    }

    public function CS_device_RD_report(){
    $data = array();             
    $data['result'] = $this->registration_model->CS_pending_task_zone_page();
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
    $zone = $this->input->post('Zone');  
    $sub_zone = $this->input->post('Sub_Zone');
    $data['list_result'] = $this->registration_model->cs_device_RnD_model($zone,$sub_zone,$date_array);      
    $data['done_task_summery'] = $this->registration_model->device_testing_summery_model($zone,$sub_zone,$date_array);        
    $data['maincontent'] = $this->load->view('CS_device_RD_report', $data, true);
    $this->load->view('home', $data);     
    }
    
    public function cs_assign(){        
    $data = array();
    $data['result'] = $this->registration_model->CS_assign_task_page_category();        
    $id = $this->session->userdata('id');
    $data['total_p_task'] = $this->registration_model->cs_count_per_ptask($id);
    $data['maincontent'] = $this->load->view('cs_assign_task_page', $data, true);
    $this->load->view('home', $data);           
    }
    
    public function cs_pending_task($p_key){
    $data = array();        
    $data['result'] = $this->registration_model->CS_pending_task_page_category();        
    $data['pending_task_result'] = $this->registration_model->CS_pick_pending_task($p_key);
    $Client_ID=$data['pending_task_result']->Client_ID;
    $data['device_result'] = $this->registration_model->pick_Client_device_model($Client_ID);
    $data['maincontent'] = $this->load->view('cs_pending_task_page', $data, true);
    $this->load->view('home', $data);   
    }
    
    public function save_CS_task(){
        
            $data=array();
            $id = $this->session->userdata('id');
            $name = $this->session->userdata('name');
            $user_type = $this->session->userdata('u_type');
            $data['create_id']=$id;
            $data['Client_ID']=$this->input->post('Client_ID');   
            $data['Client_Name']=$this->input->post('Client_Name'); 
            
            $data['Zone']=$this->input->post('Zone');
            
            $data['BTS_Name']=$this->input->post('BTS_Name');
            $data['OLT_Name']=$this->input->post('OLT_Name');
            $data['PON']=$this->input->post('PON');
            $data['Port']=$this->input->post('Port');
              
            $data['Sub_Zone']=$this->input->post('Sub_Zone'); 
            
            if($user_type=='user'){  
                $data['Engineer_Name']=$name;
                $data['Engineer_ID']=$id;
            }else{
                $data['Engineer_Name']=$this->input->post('Engineer_Name');
                $data['Engineer_ID']=$this->input->post('Engineer_ID');   
            }
            
            $data['Client_Category']=$this->input->post('Client_Category');           
            $data['Support_Category']=$this->input->post('Support_Category');
            $data['CTID_Number_SR']=$this->input->post('CTID_Number_SR');
            $data['Initial_Problem_Category']=$this->input->post('Initial_Problem_Category');

            $Date = $this->input->post('cs_date');
            $new_start_date = date("Y-m-d H:i:s", strtotime($Date));            
            $data['start_date']=$new_start_date; 
            
            $Date = $this->input->post('s_date');
            $new_start_date = date("Y-m-d H:i:s", strtotime($Date));            
            $data['CS_come_time']=$new_start_date; 

            $data['CS_status_of_TKI']="Still Running";
            $data['Technician_Name']=$this->input->post('Technician_Name');
            $data['comments']=$this->input->post('comments');
            $this->load->model('registration_model');
            $this->registration_model->save_CS_task_info_model($data);    
            
//            .................................................................................
            $Client_ID=$this->input->post('Client_ID');
            $pick_max_p_key = array();
            $pick_max_p_key['result_p_key']=$this->registration_model->pick_max_p_key_model($Client_ID); 
//            $ticket_data = array();
//            $ticket_data['result_ticket_id'] = $this->registration_model->find_ticket_Id($id);
            
 
            $c_data=array();
            $c_data['Client_ID']=$this->input->post('Client_ID');  
            $c_data['p_key']=$pick_max_p_key['result_p_key']->p_key;  
            $c_data['id']=$id;          
            $c_data['comments']=$this->input->post('comments');
            $this->registration_model->CS_update_new_comments_model($c_data);
                
//            $_SESSION["email"] = $email;
//            $_SESSION["password"] = $password;
//            $_SESSION["id"] = $id;
            
            $sdata=array();
            $sdata['message']='Susscefully Done..';
            $this->session->set_userdata($sdata);
//            redirect("index.php/welcome/index"); 
    }
    
    public function CS_pending_list(){ 
        $data = array();
        $data['pending_list_result'] = $this->registration_model->CS_pending_list_by_model();   
        
        
//      .......................  pagination  ...................................................................  
        
        $config["base_url"] = base_url() . "index.php/welcome/CS_pending_list/";
        $nmuber = $this->registration_model->CS_pend_list_record_count();
        $i=0;
        foreach ($nmuber as $value) {
          $i++;  
        }
//        echo 'i......'.$i;
        $config["total_rows"] = $i;
        $config["per_page"] = 100;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->registration_model->
                CS_Pagination_select_model($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links(); 
        

//      ...............................................................................................  
        
        
        $p_key_array=$data['pending_list_result'];
        $id_comment_array=array();
        foreach ($p_key_array as $value) {
                 $p_key=$value['p_key'];
                 $id_comment = $this->registration_model->CS_last_comments_id_by_model($p_key);
                 array_push($id_comment_array, $id_comment);      
        }
        
       
        
        $lastComments_array=array();
        foreach ($id_comment_array as $id_comment_value) {
            $id_comment=$id_comment_value->id_comment;
            if($id_comment==null){
                
//                echo '.....id_comment NULL.......';
            }else{
//                echo $id_comment.'.....id_comment.......';               
                $comment_value = $this->registration_model->CS_last_comments_by_model($id_comment);
                 array_push($lastComments_array, $comment_value);   
                
                
            }
        }
//..................................................................................
// echo '<pre>';
//print_r($lastComments_array);
         
        $data['pending_list_last_comments']=$lastComments_array;
        
        $data['maincontent'] = $this->load->view('cs_pending_list', $data, true);
        $this->load->view('home', $data);    
    }
    
    public function cs_work_on_funcation($p_key,$category){
        
        $data = array();

        
        $data['work_start'] = date("Y-m-d H:i:s");            
        $data['work_status']=1; 
        $this->registration_model->CS_work_on_task_model($p_key,$data);
//.......................................Time Log on TKI..............................................................        
        $t_data=array();
        $id = $this->session->userdata('id');
        $t_data['create_id']=$id; 
        $t_data['p_key']=$p_key; 
        $t_data['category']=$category; 
        $t_data['work_status_start']='1';
        $t_data['starus']='working';
        $t_data['work_time_start']=date("H:i:s");
        $this->registration_model->CS_work_tki_time_log($t_data);
//......................................................................................................        
        redirect("index.php/welcome/CS_DB");  
    }

    

    public function CS_new_comments($p_key){
        $data = array();
        $data['pick_comments'] = $this->registration_model->CS_view_comments_model($p_key);        
//      $data['pick_p_key'] = $this->registration_model->CS_comments_model($p_key);        
        $data['pick_p_key'] = $this->registration_model->CS_pick_pending_task($p_key);  
        $data['maincontent'] = $this->load->view('cs_new_comments_page', $data, true);
        $this->load->view('home', $data);   
        
    }
    public function CS_update_new_comments(){

        $c_data=array();
     
        $c_data['p_key']=$this->input->post('p_key');
        $id = $this->session->userdata('id');
        $c_data['id']=$id;
//        $data['comments_date']=date("Y-m-d");
        $c_data['comments']=$this->input->post('comments');               
        $this->registration_model->CS_update_new_comments_model($c_data); 
        

//..................................Work Status..................................................       
        $data=array();
        $data['work_start'] = date("Y-m-d H:i:s"); 
        $data['comments']=$this->input->post('comments'); 
        $p_key=$this->input->post('p_key');
        $data['work_status']=2; 
        $this->registration_model->CS_work_on_task_model($p_key,$data);
// ......................................................................................   
//.......................................Time Log on TKI..............................................................        
        $t_data=array();
        $t_data['work_status_end']=2;
        $t_data['work_time_end']=date("H:i:s");
        $t_data['starus']='pause';
        $this->registration_model->CS_update_work_tki_time_log($p_key,$t_data);
//...................................................................................................................          
        $returnData = array(
            
            "id" =>  $c_data['id'],
            "comments_date" => $c_data['comments_date'],
            "comments" =>  $c_data['comments'],
//            "Document_Type" => $attach_file_data['Document_Type'],
        );
        echo json_encode($returnData);
        
        
        
        
        
        
    }
    
    public function search_cs_pending_task_by_id(){
        

        
    }
    
    public function search_DB_A_cs_pending_task_by_sub_zone($Sub_Zone){
     
    $data = array();
    $data['result'] = $this->registration_model->CS_pending_task_zone_page();

//    $Sub_Zone = $this->input->post('Sub_Zone');      
    $data['pending_list_result'] = $this->registration_model->CS_ALL_pending_list_by_zone_model($Sub_Zone);
   
//    echo '<pre>';
//    print_r($data['pending_list_result']);
//      ...............................................................................................  
        
        
        $p_key_array=$data['pending_list_result'];
        $id_comment_array=array();
        if($p_key_array != null){
            foreach ($p_key_array as $value) {
                     $p_key=$value['p_key'];
                     $id_comment = $this->registration_model->CS_last_comments_id_by_model($p_key);
                     array_push($id_comment_array, $id_comment);      
            }
        }
       
        
        $lastComments_array=array();
        foreach ($id_comment_array as $id_comment_value) {
            $id_comment=$id_comment_value->id_comment;
            if($id_comment==null){
                
//                echo '.....id_comment NULL.......';
            }else{
//                echo $id_comment.'.....id_comment.......';               
                $comment_value = $this->registration_model->CS_last_comments_by_model($id_comment);
                 array_push($lastComments_array, $comment_value);                   
                
            }
        }
//..................................................................................    
    $data['pending_list_last_comments']=$lastComments_array;
    
//    echo '<pre>';
//    print_r($data);
    
    
    $data['maincontent'] = $this->load->view('cs_pending_task_search_by_zone', $data, true);
    $this->load->view('home', $data); 
    }
    
    public function search_cs_pending_task_by_sub_zone(){
     
    $data = array();
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
    $data['pending_list_result'] = $this->registration_model->CS_pending_list_by_zone_model($Sub_Zone,$date_array);
   
//    echo '<pre>';
//    print_r($data['pending_list_result']);
//      ...............................................................................................  
        
        
        $p_key_array=$data['pending_list_result'];
        $id_comment_array=array();
        if($p_key_array != null){
            foreach ($p_key_array as $value) {
                     $p_key=$value['p_key'];
                     $id_comment = $this->registration_model->CS_last_comments_id_by_model($p_key);
                     array_push($id_comment_array, $id_comment);      
            }
        }
       
        
        $lastComments_array=array();
        foreach ($id_comment_array as $id_comment_value) {
            $id_comment=$id_comment_value->id_comment;
            if($id_comment==null){
                
//                echo '.....id_comment NULL.......';
            }else{
//                echo $id_comment.'.....id_comment.......';               
                $comment_value = $this->registration_model->CS_last_comments_by_model($id_comment);
                 array_push($lastComments_array, $comment_value);                   
                
            }
        }
//..................................................................................    
    $data['pending_list_last_comments']=$lastComments_array;
    
    
    $data['maincontent'] = $this->load->view('cs_pending_task_search_by_zone', $data, true);
//        $data['title'] = 'View Course';
    $this->load->view('home', $data); 
    }
    
    public function search_cs_pending_task_by_Client_ID(){
        
    $data = array();
//    $data['result'] = $this->registration_model->CS_pending_task_zone_page();
    
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

    $Client_ID = $this->input->post('Client_ID');      
    $data['pending_list_result'] = $this->registration_model->CS_pending_list_by_Client_ID_model($Client_ID,$date_array);
   
//    echo '<pre>';
//    print_r($data['pending_list_result']);
//      ...............................................................................................  
        
        
        $p_key_array=$data['pending_list_result'];
        $id_comment_array=array();
        if($p_key_array != null){
            foreach ($p_key_array as $value) {
                     $p_key=$value['p_key'];
                     $id_comment = $this->registration_model->CS_last_comments_id_by_model($p_key);
                     array_push($id_comment_array, $id_comment);      
            }
        }
       
        
        $lastComments_array=array();
        foreach ($id_comment_array as $id_comment_value) {
            $id_comment=$id_comment_value->id_comment;
            if($id_comment==null){
                
//                echo '.....id_comment NULL.......';
            }else{
//                echo $id_comment.'.....id_comment.......';               
                $comment_value = $this->registration_model->CS_last_comments_by_model($id_comment);
                 array_push($lastComments_array, $comment_value);                   
                
            }
        }
//..................................................................................    
    $data['pending_list_last_comments']=$lastComments_array;
    
    
    $data['maincontent'] = $this->load->view('CS_search_pending_task_by_client_id', $data, true);
//        $data['title'] = 'View Course';
    $this->load->view('home', $data);    
    }

    public function search_cs_pending_task_by_CTID_SR(){
     
            
    $data = array();
//    $data['result'] = $this->registration_model->CS_pending_task_zone_page();
    
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

    $CTID_Number_SR = $this->input->post('CTID_Number_SR');      
    $data['pending_list_result'] = $this->registration_model->CS_pending_list_by_CTID_Number_SR_model($CTID_Number_SR,$date_array);
   
//    echo '<pre>';
//    print_r($data['pending_list_result']);
//      ...............................................................................................  
        
        
        $p_key_array=$data['pending_list_result'];
        $id_comment_array=array();
        if($p_key_array != null){
            foreach ($p_key_array as $value) {
                     $p_key=$value['p_key'];
                     $id_comment = $this->registration_model->CS_last_comments_id_by_model($p_key);
                     array_push($id_comment_array, $id_comment);      
            }
        }
       
        
        $lastComments_array=array();
        foreach ($id_comment_array as $id_comment_value) {
            $id_comment=$id_comment_value->id_comment;
            if($id_comment==null){
                
//                echo '.....id_comment NULL.......';
            }else{
//                echo $id_comment.'.....id_comment.......';               
                $comment_value = $this->registration_model->CS_last_comments_by_model($id_comment);
                 array_push($lastComments_array, $comment_value);                   
                
            }
        }
//..................................................................................    
    $data['pending_list_last_comments']=$lastComments_array;
    
    
    $data['maincontent'] = $this->load->view('CS_search_pending_task_by_CTID_or_SR', $data, true);
//        $data['title'] = 'View Course';
    $this->load->view('home', $data);
        
    }
  public function DB_A_CS_search_pending_task_by_id($Engineer_ID){
      $data = array();       
//      $data['result'] = $this->registration_model->CS_search_pending_task_by_id_model($ticket_no);
       $data['result'] = $this->registration_model->CS_pending_task_zone_page();
/////////////////////////////////////////////////////////////////////////////////////////////////
//$Date = $this->input->post('date_from');
//$date_from = date("Y-m-d 00:00:00");
$date1 =  date("Y-m-d 00:00:00");


//$Date1 = $this->input->post('date_to');
//$date_to = date("Y-m-d 23:59:59");
$date2 = date("Y-m-d 23:59:59");

$date_array = array(
    'date1' => $date1,
    'date2' => $date2
);
///////////////////////////////////////////////////////////////////////////////////////////////    
//$Engineer_ID = $E_ID;
//echo $E_ID;

//if( $E_ID == null ){
//    $Engineer_ID = $E_ID;
//}else{
//    $Engineer_ID = $this->input->post('Engineer_ID'); 
//}   

//    $Engineer_ID = $this->input->post('Engineer_ID'); 


//        echo 'ID : '.$Engineer_ID.'Date : '.$date_array['date1'];


    $data['pending_list_result'] = $this->registration_model->CS_ALL_pending_list_by_Engineer_ID_model($Engineer_ID); 
     
//    echo '<pre>';
//    print_r($data['pending_list_result']);
//    echo '</pre>';
      //      ...............................................................................................  
        
        
        $p_key_array=$data['pending_list_result'];
        $id_comment_array=array();
        if($p_key_array != null){
        foreach ($p_key_array as $value) {
                 $p_key=$value['p_key'];
                 $id_comment = $this->registration_model->CS_last_comments_id_by_model($p_key);
                 array_push($id_comment_array, $id_comment);      
        }
        }
       
        
        $lastComments_array=array();
        foreach ($id_comment_array as $id_comment_value) {
            $id_comment=$id_comment_value->id_comment;
            if($id_comment==null){
                
//                echo '.....id_comment NULL.......';
            }else{
//                echo $id_comment.'.....id_comment.......';               
                $comment_value = $this->registration_model->CS_last_comments_by_model($id_comment);
                 array_push($lastComments_array, $comment_value);   
                
                
            }
        }
//..................................................................................
    
    $data['pending_list_last_comments']=$lastComments_array;
      
//    echo '<pre>';  
//    print_r($data);
//    echo '</pre>';
        $data['maincontent'] = $this->load->view('CS_search_pending_task_by_id_page', $data, true);
        $this->load->view('home', $data);
        
    }
    public function CS_search_pending_task_by_id(){
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
//$Engineer_ID = $E_ID;
//echo $E_ID;

//if( $E_ID == null ){
//    $Engineer_ID = $E_ID;
//}else{
//    $Engineer_ID = $this->input->post('Engineer_ID'); 
//}   

    $Engineer_ID = $this->input->post('Engineer_ID');  

    $data['pending_list_result'] = $this->registration_model->CS_pending_list_by_Engineer_ID_model($Engineer_ID,$date_array); 
     
//    echo '<pre>';
//    print_r($data['pending_list_result']);
      //      ...............................................................................................  
        
        
        $p_key_array=$data['pending_list_result'];
        $id_comment_array=array();
        if($p_key_array != null){
        foreach ($p_key_array as $value) {
                 $p_key=$value['p_key'];
                 $id_comment = $this->registration_model->CS_last_comments_id_by_model($p_key);
                 array_push($id_comment_array, $id_comment);      
        }
        }
       
        
        $lastComments_array=array();
        foreach ($id_comment_array as $id_comment_value) {
            $id_comment=$id_comment_value->id_comment;
            if($id_comment==null){
                
//                echo '.....id_comment NULL.......';
            }else{
//                echo $id_comment.'.....id_comment.......';               
                $comment_value = $this->registration_model->CS_last_comments_by_model($id_comment);
                 array_push($lastComments_array, $comment_value);   
                
                
            }
        }
//..................................................................................
    
    $data['pending_list_last_comments']=$lastComments_array;
      
        
        $data['maincontent'] = $this->load->view('CS_search_pending_task_by_id_page', $data, true);
        $this->load->view('home', $data);
        
    }

    public function search_cs_pending_task_by_date(){
        
        
    }
    
    public function pick_engineer_id(){
      
       $Engineer_Name=$this->input->post('Engineer_Name');   
//       $Engineer_Name='S M Zahirul Islam'
       $result = $this->registration_model->pick_Engineer_ID_model($Engineer_Name);
       echo json_encode($result);
        
    }
    
    
    public function Check_CTID_n_SR(){

       $CTID_Number_SR=$this->input->post('CTID_Number_SR');       
       $result = $this->registration_model->Check_CTID_n_SR_model($CTID_Number_SR);
       echo json_encode($result);
    }
     public function pick_Device_Model(){

       $device_type=$this->input->post('device_type');  
       
       $result = $this->registration_model->pick_device_type_model($device_type);
       echo json_encode($result);
    }
    
    public function pick_engineer_name(){
      
//       $Engineer_Name=$this->input->post('Engineer_Name');
       $Engineer_Name='islam';
//       $result = $this->registration_model->pick_Engineer_Name_model($Engineer_Name);
//       echo json_encode($result); 
//     if (isset($_GET['term'])) {
            $result = $this->registration_model->pick_Engineer_Name_model($Engineer_Name);
             $arr_result=array();
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->Engineer_Name;
                echo json_encode($arr_result);
            }
//        }  
        
    }
    
    
    
    public function CS_done_list(){
      
          $data = array();

//      .......................  pagination  ...................................................  
        
//        $config["base_url"] = base_url() . "index.php/welcome/CS_done_list/";
//        $done_nmuber_result = $this->registration_model->CS_Done_list_record_count();
//        $CS_done=0;
//        foreach ($done_nmuber_result as $doen_task_value) {
//          $CS_done++;  
//        }
////        echo 'i......'.$i;
//        $config["total_rows"] = $CS_done;
//        $config["per_page"] = 50;
//        $config["uri_segment"] = 3;
//
//        $this->pagination->initialize($config);
//        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
//        $data["done_list_result"] = $this->registration_model->
//                CS_Done_task_Pagination_select_model($config["per_page"], $page);
//        $data["CS_done_links"] = $this->pagination->create_links(); 
//        
////      .............................................................................................  
//        $data['tki_time_result'] = $this->registration_model->CS_tik_time_model();        
//  ....................................................................................................      

        
        
        $data['maincontent'] = $this->load->view('cs_done_task_page', $data, true);
//      $data['title'] = 'View Course';
        $this->load->view('home', $data); 
    }
    public function cs_done_task(){
        
    $data=array();
//    mmm
    $id = $this->session->userdata('id');
    $data['update_id']=$id;
    $data['update_date']= date("Y-m-d H:i:s");
    $p_key=$this->input->post('p_key');
    $data['CS_status_of_TKI']="Completed";  
    $data['Client_ID']=$this->input->post('Client_ID');
    $data['Client_Category']=$this->input->post('Client_Category');
    $data['TKI_Status']=$this->input->post('TKI_Status'); 
    $Support_Type=$this->input->post('Support_Type');
    $data['Support_Type']=$Support_Type;  
    $data['Final_Resolution']=$this->input->post('Final_Resolution');           
   
    $Date = $this->input->post('cs_date');
    $new_start_date = date("Y-m-d H:i:s", strtotime($Date));            
    $data['end_date']=$new_start_date; 
    
    $data['Technician_Name']=$this->input->post('Technician_Name');
    $data['old_device_SN']=$this->input->post('old_device_SN');
    $data['new_device_SN']=$this->input->post('new_device_SN');
    $new_device_SN=$this->input->post('new_device_SN');
    $data['work_status']=4; 
   
    $this->registration_model->CS_done_task_model($p_key,$data); 
    
//................................. Client Device Info .........................................................    
    $Client_ID=$this->input->post('Client_ID');
    $Client_device_info= $this->registration_model->pick_Client_device_model($Client_ID);
    $device_type=$this->input->post('device_type');
    if($Support_Type=='Field Support'){
        if($device_type=='ONU' || $device_type=='Fiber(P2M)' || $device_type=='Wireless (P2M)' || $device_type=='Wireless (P2P)'){
        $client_device=array();
        $client_device['create_id']=$id;
        
        $client_device['client_id']=$Client_ID;
        $client_device['device_type']=$this->input->post('device_type');
        
        $client_device['old_device_model']=$this->input->post('old_device_model');
        $client_device['device_model']=$this->input->post('new_device_model');
        $client_device['old_mac']=$this->input->post('old_device_mac');
        $client_device['mac']=$this->input->post('new_device_mac');
        $client_device['old_serial_number']=$this->input->post('old_device_SN');
        $client_device['serial_number']=$this->input->post('new_device_SN');
        if( $Client_device_info == null ){
           $this->registration_model->Client_device_model($client_device); 
        }else{
          if($new_device_SN != null){
          $u_client_device=array(); 
          $u_client_device['update_id']=$id;
          $u_client_device['update_time']=date("Y-m-d H:i:s");
          $u_client_device['device_type']=$this->input->post('device_type');
          $u_client_device['device_model']=$this->input->post('new_device_model');
          $u_client_device['mac']=$this->input->post('new_device_mac');
          $u_client_device['serial_number']=$this->input->post('new_device_SN');  
          $this->registration_model->update_client_device_info($Client_ID,$u_client_device);   
          }  
          
        }
    } 
    }
//    .............................R & D.......................................................
    
    
    $Final_Resolution=$this->input->post('Final_Resolution');
    if( $Final_Resolution == 'Link3 Device Faulty/Changed' || $Final_Resolution=='Device faulty/changed' ){   
    $RD_data['Zone']=$this->input->post('Zone');
    $RD_data['sub_Zone']=$this->input->post('sub_Zone');     
    $RD_data['return_by']=$id;
    $RD_data['Client_ID']=$Client_ID;
    $RD_data['return_issue']=$this->input->post('return_issue');
    $RD_data['device_serial_no']=$this->input->post('old_device_SN');
    $RD_data['device_model']=$this->input->post('old_device_model');
    $RD_data['status']='Not tested yet';
    $this->registration_model->save_RD_testing_device_model($RD_data); 
    }
    
                
//.......................................Time Log on TKI..............................................................        
        $t_data=array();
        $t_data['work_status_end']=4;
        $t_data['work_time_end']=date("H:i:s");
        $t_data['starus']='done';
        $this->registration_model->CS_update_work_tki_time_log($p_key,$t_data);
//...................................................................................................................    
//    print($p_key,$data);
//    echo $p_key;
    
//    $sdata=array();
//    $sdata['message']='Susscefully Done..';
//    $this->session->set_userdata($sdata);
    redirect("index.php/welcome/Dashboard_funcation"); 
    }
    
    public function update_device_testing_info(){
        
    $data=array();      
    $data['tested_date']=$this->input->post('tested_date');
    $serial_no=$this->input->post('serial_no');
    $data['tested_by']=$this->input->post('tested_by');
    $data['status']='close';
    $data['test_result']=$this->input->post('test_result');
    $data['remarks']=$this->input->post('comments');
    $data['final_status']=$this->input->post('final_status');
    $this->registration_model->update_testing_device_info($serial_no,$data);  
    }

    public function search_cs_done_task_by_Employee_ID(){
        
    $data = array();
    $data['result'] = $this->registration_model->CS_pending_task_zone_page();
    
/////////////////////////////////////////////////////////////////////////////////////////////////
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

    $Engineer_ID = $this->input->post('Engineer_ID');      
    $data['done_list_result'] = $this->registration_model->CS_Done_list_by_Engineer_ID_model($Engineer_ID,$date_array);
    
//    ................................................................................................................
    
   $data['tki_time_result'] = $this->registration_model->CS_tik_time_model();  
//    ..................................................................................................................
    
    $data['maincontent'] = $this->load->view('CS_search_done_task_by_Employee_Id', $data, true);
    $this->load->view('home', $data); 
        
    }
    
    public function search_cs_done_task_by_CTID_SR(){
        
    $data = array();
//    $data['result'] = $this->registration_model->CS_pending_task_zone_page();
    
/////////////////////////////////////////////////////////////////////////////////////////////////
$Date = $this->input->post('date_from');
$_SESSION["done_date_from_CTID_Number_SR"] = $Date;
$date_from = date("Y-m-d 00:00:00", strtotime($Date));
$date1 =  $date_from;


$Date1 = $this->input->post('date_to');
$_SESSION["done_date_to_CTID_Number_SR"] = $Date1;
$date_to = date("Y-m-d 23:59:59", strtotime($Date1));
$date2 = $date_to;

$date_array = array(
    'date1' => $date1,
    'date2' => $date2
);

    $CTID_Number_SR = $this->input->post('CTID_Number_SR');      
    $data['pending_list_result'] = $this->registration_model->CS_Done_list_by_CTID_SR_model($CTID_Number_SR,$date_array);
//      .............................................................................................  
    $data['tki_time_result'] = $this->registration_model->CS_tik_time_model();        
//  .................................................................................................... 
    $data['maincontent'] = $this->load->view('cs_done_task_search_by_CTID_SR', $data, true);
    $this->load->view('home', $data); 
        
    }
      public function search_cs_done_task_by_Client_ID(){
             
    $data = array();
/////////////////////////////////////////////////////////////////////////////////////////////////
$Date = $this->input->post('date_from');
$_SESSION["done_date_from_Client_ID"] = $Date;
$date_from = date("Y-m-d 00:00:00", strtotime($Date));
$date1 =  $date_from;


$Date1 = $this->input->post('date_to');
$_SESSION["done_date_to_Client_ID"] = $Date1;
$date_to = date("Y-m-d 23:59:59", strtotime($Date1));
$date2 = $date_to;

$date_array = array(
    'date1' => $date1,
    'date2' => $date2
);
    $Client_ID = $this->input->post('Client_ID');    
    $data['done_list_result'] = $this->registration_model->CS_Done_list_by_Client_ID_model($Client_ID,$date_array);
    //      .............................................................................................  
        $data['tki_time_result'] = $this->registration_model->CS_tik_time_model();        
//  .................................................................................................... 
    $data['maincontent'] = $this->load->view('cs_done_task_search_by_Client_ID', $data, true);
    $this->load->view('home', $data);   
        
    }
    public function search_cs_done_task_by_Zone(){
      
    $data = array();
    $data['result'] = $this->registration_model->CS_pending_task_zone_page();
$this->session->unset_userdata('date_from');
$this->session->unset_userdata('date_to');    
/////////////////////////////////////////////////////////////////////////////////////////////////
$Date = $this->input->post('date_from');
$_SESSION["date_from"] = $Date;
$date_from = date("Y-m-d 00:00:00", strtotime($Date));
$date1 =  $date_from;


$Date1 = $this->input->post('date_to');
$_SESSION["date_to"] = $Date1;
$date_to = date("Y-m-d 23:59:59", strtotime($Date1));
$date2 = $date_to;

$date_array = array(
    'date1' => $date1,
    'date2' => $date2
);
///////////////////////////////////////////////////////////////////////////////////////////////    
//      .............................................................................................  
        $data['tki_time_result'] = $this->registration_model->CS_tik_time_model();        
//  .................................................................................................... 
        
    $Sub_Zone = $this->input->post('Sub_Zone');
    
    $Zone = $this->input->post('Zone');
    
    if($Sub_Zone==null){
         $data['pending_list_result'] = $this->registration_model->CS_Done_list_by_zone_model($Zone,$date_array);
    }else{
         $data['pending_list_result'] = $this->registration_model->CS_Done_list_by_subzone_model($Sub_Zone,$date_array);
    }
    
   
    $data['maincontent'] = $this->load->view('CS_search_done_task_by_Zone', $data, true);
//        $data['title'] = 'View Course';
    $this->load->view('home', $data); 
    
    }

    public function createXLS($Sub_Zone) {

//      load excel library
        $this->load->library('excel');
        
/////////////////////////////////////////////////////////////////////////////////////////////////
//$Date = $this->input->post('start_date_id');
$Date=$_SESSION["date_from"];
$date_from = date("Y-m-d 00:00:00", strtotime($Date));
$date1 =  $date_from;


//$Date1 = $this->input->post('end_date_id');
$Date1=$_SESSION["date_to"];
$date_to = date("Y-m-d 23:59:59", strtotime($Date1));
$date2 = $date_to;

$date_array = array(
    'date1' => $date1,
    'date2' => $date2
);
print_r('SESSION from'.$_SESSION["date_from"].'date_to'.$_SESSION["date_to"]);
//exit();
$empInfo = $this->registration_model->excel_done_task_List($Sub_Zone,$date_array);
///////////////////////////////////////////////////////////////////////////////////////////////    

        
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Client ID');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Client Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Support Office');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Client Category');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Support Category');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'CTID Number/SR');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Initial Problem Category');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Engineer Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Start Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'TKI Status');
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'END Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Support Type');
        $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Final Resolution');
        $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Technician Name');

        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {

            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['Client_ID']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['Client_Name']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['Sub_Zone']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['Client_Category']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['Support_Category']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['CTID_Number_SR']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element['Initial_Problem_Category']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element['Engineer_Name']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element['start_date']);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element['TKI_Status']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $element['end_date']);
            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $element['Support_Type']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $element['Final_Resolution']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $element['Technician_Name']); 
            
            $rowCount++;
        }
// create file name   
        $date=date("Y-m-d h:i:sa");
        $fileName= $Sub_Zone.'_report.xls'; //.time()
         header("Content-Type: application/vnd.ms-excel");
       
      
       $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
       $objWriter->save('./css/'.$fileName);
// download file
 
        $this->load->helper('download');         
        ob_clean();      
        $data = file_get_contents(base_url().'css/'.$fileName);      
        force_download($fileName, $data);
        
         echo json_encode("DONE SUCCESSFULLY");
        
//        redirect("index.php/welcome/search_cs_done_task_by_Zone");  
        
    } 
    
    public function cs_done_task_report(){
      
    $data = array();
    $data['result'] = $this->registration_model->CS_pending_task_zone_page();   
    $data['maincontent'] = $this->load->view('cs_done_export', $data, true);
//        $data['title'] = 'View Course';
    $this->load->view('home', $data); 
    } 
    public function cs_report_export_file() {

//      load excel library
        $this->load->library('excel');
        
/////////////////////////////////////////////////////////////////////////////////////////////////
$zone = $this->input->post('Zone'); 
$sub_zone = $this->input->post('Sub_Zone');

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



if($zone=='0' && $sub_zone==null){
    $empInfo = $this->registration_model->excel_done_task_List_2($date_array);
}elseif ($zone!='0' && $sub_zone==null) {
    $empInfo = $this->registration_model->excel_done_task_List_1($zone,$date_array);       
}elseif($zone!='0' && $sub_zone!=null){
    $empInfo = $this->registration_model->excel_done_task_List($sub_zone,$date_array); 
}

//echo $zone.'......'.$sub_zone;

//exit();
///////////////////////////////////////////////////////////////////////////////////////////////    

        
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'BTS Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Client ID');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Client Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Support Office');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Client Category');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Support Category');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'CTID Number/SR');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Initial Problem Category');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Engineer Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Start Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'TKI Status');
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'END Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Support Type');
        $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Final Resolution');
        $objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Technician Name');

        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['BTS_Name']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['Client_ID']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['Client_Name']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['Sub_Zone']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['Client_Category']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['Support_Category']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element['CTID_Number_SR']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element['Initial_Problem_Category']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element['Engineer_Name']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element['start_date']);
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $element['TKI_Status']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $element['end_date']);
            $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $element['Support_Type']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $element['Final_Resolution']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $element['Technician_Name']); 
            
            $rowCount++;
        }
// create file name   
        $date=date("Y-m-d h:i:sa");
        $fileName= 'CS_Done_Task_List.xls'; //.time()
         header("Content-Type: application/vnd.ms-excel");
       
      
       $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
       $objWriter->save('./css/'.$fileName);
// download file
 
        $this->load->helper('download');         
        ob_clean();      
        $data = file_get_contents(base_url().'css/'.$fileName);      
        force_download($fileName, $data);
        
         echo json_encode("DONE SUCCESSFULLY");
        
//        redirect("index.php/welcome/search_cs_done_task_by_Zone");  
        
    }
    
    public function createXLS_report_by_Employee_ID($Engineer_ID){
        
        
//      load excel library
        $this->load->library('excel');
        
/////////////////////////////////////////////////////////////////////////////////////////////////
$Date=$_SESSION["done_date_from_ID"];
$date_from = date("Y-m-d 00:00:00", strtotime($Date));
$date1 =  $date_from;

$Date1=$_SESSION["done_date_to_ID"];
$date_to = date("Y-m-d 23:59:59", strtotime($Date1));
$date2 = $date_to;

$date_array = array(
    'date1' => $date1,
    'date2' => $date2
);
$empInfo =  $this->registration_model->CS_excel_done_task_List_by_Engineer_ID($Engineer_ID,$date_array);

///////////////////////////////////////////////////////////////////////////////////////////////    
 
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Client ID');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Client Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Support Office');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Client Category');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Support Category');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'CTID Number/SR');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Initial Problem Category');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Engineer Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Start Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'TKI Status');
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'END Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Support Type');
        $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Final Resolution');
        $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Technician Name');
        
       
        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {

            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['Client_ID']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['Client_Name']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['Sub_Zone']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['Client_Category']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['Support_Category']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['CTID_Number_SR']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element['Initial_Problem_Category']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element['Engineer_Name']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element['start_date']);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element['TKI_Status']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $element['end_date']);
            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $element['Support_Type']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $element['Final_Resolution']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $element['Technician_Name']); 
            
            $rowCount++;
        }
// create file name   
        $date=date("Y-m-d h:i:sa");
        $fileName= $Engineer_ID.'_report.xls'; //.time()
         header("Content-Type: application/vnd.ms-excel");
       
      
       $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
       $objWriter->save('./css/'.$fileName);
// download file
 
        $this->load->helper('download');         
        ob_clean();      
        $data = file_get_contents(base_url().'css/'.$fileName);      
        force_download($fileName, $data);
        
         echo json_encode("DONE SUCCESSFULLY");
       
    }
    
    public function createXLS_report_by_Client_ID($Client_ID){
        
        
//      load excel library
        $this->load->library('excel');
        
/////////////////////////////////////////////////////////////////////////////////////////////////
$Date=$_SESSION["done_date_from_Client_ID"];
$date_from = date("Y-m-d 00:00:00", strtotime($Date));
$date1 =  $date_from;

$Date1=$_SESSION["done_date_to_Client_ID"];
$date_to = date("Y-m-d 23:59:59", strtotime($Date1));
$date2 = $date_to;

$date_array = array(
    'date1' => $date1,
    'date2' => $date2
);
//print_r('SESSION from'.$_SESSION["done_date_from_ID"].'date_to'.$_SESSION["done_date_to_ID"]);
//exit();

$empInfo =  $this->registration_model->CS_excel_done_task_List_by_Client_ID($Client_ID,$date_array);

///////////////////////////////////////////////////////////////////////////////////////////////    
 
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Client ID');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Client Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Support Office');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Client Category');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Support Category');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'CTID Number/SR');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Initial Problem Category');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Engineer Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Start Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'TKI Status');
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'END Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Support Type');
        $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Final Resolution');
        $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Technician Name');

        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {
//            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['Client_Name']); 
//            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['Sub_Zone']); 
//            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['Engineer_Name']); 
//            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['CS_status_of_TKI']); 
            
            
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['Client_ID']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['Client_Name']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['Sub_Zone']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['Client_Category']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['Support_Category']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['CTID_Number_SR']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element['Initial_Problem_Category']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element['Engineer_Name']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element['start_date']);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element['TKI_Status']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $element['end_date']);
            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $element['Support_Type']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $element['Final_Resolution']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $element['Technician_Name']); 
            
            $rowCount++;
        }
// create file name   
        $fileName= $Client_ID.'_report.xls'; //.time()
         header("Content-Type: application/vnd.ms-excel");
             
       $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
       $objWriter->save('./css/'.$fileName);
// download file
 
        $this->load->helper('download');         
        ob_clean();      
        $data = file_get_contents(base_url().'css/'.$fileName);      
        force_download($fileName, $data);
        
         echo json_encode("DONE SUCCESSFULLY");
        
    }


    


    public function createXLS_done_task_by_CTID_Number_SR($CTID_Number_SR){
        
        
        
//      load excel library
        $this->load->library('excel');
        
/////////////////////////////////////////////////////////////////////////////////////////////////
$Date=$_SESSION["done_date_from_CTID_Number_SR"];
$date_from = date("Y-m-d 00:00:00", strtotime($Date));
$date1 =  $date_from;

$Date1=$_SESSION["done_date_to_CTID_Number_SR"];
$date_to = date("Y-m-d 23:59:59", strtotime($Date1));
$date2 = $date_to;

$date_array = array(
    'date1' => $date1,
    'date2' => $date2
);
//print_r('SESSION from'.$_SESSION["done_date_from_ID"].'date_to'.$_SESSION["done_date_to_ID"]);
//exit();

$empInfo =  $this->registration_model->CS_excel_done_task_List_by_CTID_Number_SR($CTID_Number_SR,$date_array);

///////////////////////////////////////////////////////////////////////////////////////////////    
 
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
//        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Client Name');
//        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Zone');
//        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Engineer_Name');
//        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'CS_status_of_TKI');
        
        
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Client ID');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Client Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Support Office');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Client Category');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Support Category');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'CTID Number/SR');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Initial Problem Category');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Engineer Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Start Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'TKI Status');
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'END Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Support Type');
        $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Final Resolution');
        $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Technician Name');
        
       
        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {
//            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['Client_Name']); 
//            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['Sub_Zone']); 
//            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['Engineer_Name']); 
//            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['CS_status_of_TKI']); 
            
            
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['Client_ID']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['Client_Name']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['Sub_Zone']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['Client_Category']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['Support_Category']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['CTID_Number_SR']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element['Initial_Problem_Category']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element['Engineer_Name']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element['start_date']);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element['TKI_Status']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $element['end_date']);
            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $element['Support_Type']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $element['Final_Resolution']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $element['Technician_Name']); 
            
            $rowCount++;
        }
// create file name   
//        $date=date("Y-m-d h:i:sa");
        $fileName= $CTID_Number_SR.'CTID_or_SRID_report.xls'; //.time()
         header("Content-Type: application/vnd.ms-excel");
       
      
       $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
       $objWriter->save('./css/'.$fileName);
// download file
 
        $this->load->helper('download');         
        ob_clean();      
        $data = file_get_contents(base_url().'css/'.$fileName);      
        force_download($fileName, $data);
        
         echo json_encode("DONE SUCCESSFULLY");
        
    }
    
  

    


    public function cs_task_transfer_funcation($p_key){
       $data = array();
//       $data['result'] = $this->registration_model->CS_transfer_task_page_category();
       $data['result'] = $this->registration_model->CS_pending_task_zone_page();
       $data['pick_p_key'] = $this->registration_model->CS_pick_pending_task($p_key);
       $data['maincontent'] = $this->load->view('cs_task_transfe_page', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data); 
    }
    
     public function CS_task_transfer_info_save(){
        
        
        $data=array();
        $id = $this->session->userdata('id');
        $ticket_no = $this->input->post('p_key'); 
        $data['cs_task_list_id']=$ticket_no;
        $data['From_ID']=$id;
        $data['Transfer_Engineer_Name']=$this->input->post('Engineer_Name');
        $data['Transfer_Engineer_ID']=$this->input->post('Engineer_ID');  
        $this->registration_model->CS_save_task_transfer_info_model($data);  
        
//        $id = $this->session->userdata('id');
//        $task_id_info['create_id']=$id;
//        $task_id_info['ticket_no']=$this->input->post('ticket_no');
        
        $task_id_info=array();
        $task_id_info['Engineer_Name']=$this->input->post('Engineer_Name');
        $task_id_info['Engineer_ID']=$this->input->post('Engineer_ID');
        $this->registration_model->Update_task_transfer_info_model($ticket_no,$task_id_info); 
         
        $c_data=array();
        $c_data['id']=$id;
        $c_data['Client_ID']=$this->input->post('Client_ID');  
        $c_data['p_key']=$this->input->post('p_key'); 
        $comments=$this->input->post('comments');
        $c_data['comments']='Transfer From ('. $id . ') : '.$comments;
        $this->registration_model->CS_update_new_comments_model($c_data);
        
        
        $sdata=array();
        $sdata['message']='Task Transfer susscefully Done';
        $this->session->set_userdata($sdata);
        
        redirect("index.php/welcome/CS_DB");
        
  
    }
    
    
    public function CS_edit_task($p_key){
       $data = array();
       $data['result'] = $this->registration_model->CS_edit_task_page_category();
//       $data['result'] = $this->registration_model->CS_transfer_task_page_category();
       $data['pick_p_key'] = $this->registration_model->CS_pick_pending_task($p_key);
//       echo '<pre>';
//       print_r($data['pick_p_key']);
       
       $data['maincontent'] = $this->load->view('cs_edit_task_page', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data); 
    }
    
    public function edit_CS_task(){
        
       
        $ticket_no = $this->input->post('p_key'); 
       
        $update=array();
        $id = $this->session->userdata('id');
        $update['update_id']=$id;
        $update['Client_ID']=$this->input->post('Client_ID');   
        $update['Client_Name']=$this->input->post('Client_Name'); 
        $update['Sub_Zone']=$this->input->post('Sub_Zone');  
        $update['Client_Category']=$this->input->post('Client_Category');           
        $update['Support_Category']=$this->input->post('Support_Category');
//        $update['CTID_Number_SR']=$this->input->post('CTID_Number_SR');
        $update['Initial_Problem_Category']=$this->input->post('Initial_Problem_Category');
        
        
        
        $this->registration_model->Update_cs_task_info_model($ticket_no,$update); 
        
//        $sdata=array();
//        $sdata['message']='Update Task Information';
//        $this->session->set_userdata($sdata);
        
        redirect("index.php/welcome/CS_pending_list");
 
  
    }
    
    public function cs_rept(){
          $data = array();
    $data['result'] = $this->registration_model->CS_pending_task_zone_page();

    /////////////////////////////////////////////////////////////////////////////////////////////////
    $Date = $this->input->post('date_from');
    $_SESSION["date_from"] = $Date;
    $date_from = date("Y-m-d 00:00:00", strtotime($Date));
    $date1 =  $date_from;
    

    $Date1 = $this->input->post('date_to');
    $_SESSION["date_to"] = $Date1;
    $date_to = date("Y-m-d 23:59:59", strtotime($Date1));
    $date2 = $date_to;

    $date_array = array(
        'date1' => $date1,
        'date2' => $date2
    );
   
    $this->session->unset_userdata('date_from');
    $this->session->unset_userdata('date_to'); 
    $sdata=array();
    $sdata['from_date']=$Date;
    $sdata['to_date']=$Date1;
    $this->session->set_userdata($sdata);
    
///////////////////////////////////////////////////////////////////////////////////////////////    
//  .............................................................................................        
//  .............................................................................................. 
    $Zone = $this->input->post('Zone');   
    $Sub_Zone = $this->input->post('Sub_Zone');      
    $Engineer_ID = $this->input->post('Engineer_ID'); 
    $data['cs_date_result']=null;
    if($Zone == '0' && $Sub_Zone == '0'){
         
         if($date_array==null){
//            $data['done_list_result'] = $this->registration_model->CS_report_model();
//            $data['installation_result'] = $this->registration_model->CS_installation_model();
         }else{
            $data['done_list_result'] = $this->registration_model->CS_report_date_model($date_array);
            $data['installation_result'] = $this->registration_model->CS_installation_date_model($date_array);
            $data['summerytask_result'] = $this->registration_model->CS_summerytask_date_model($date_array);
            $data['troubleshoot_result'] = $this->registration_model->CS_troubleshoot_date_model($date_array);
            $data['cs_troubleshoot_time'] = $this->registration_model->CS_date_result_cs_troubleshoot_time_model_1($date_array);
            $data['cs_attend'] = $this->registration_model->CS_attend_model($date_array);
         }
    }elseif ($Zone != '0' && $Sub_Zone == null) {
         if($date_array==null){
            $data['done_list_result'] = $this->registration_model->CS_report_zone_model($Zone);
         }else{
            $data['done_list_result'] = $this->registration_model->CS_report_zone_date_model($Zone,$date_array);
            
            $data['summerytask_result'] = $this->registration_model->CS_summerytask_zone_date_model($Zone,$date_array);
            $data['installation_result'] = $this->registration_model->CS_installation_zone_date_model($Zone,$date_array);
            $data['troubleshoot_result'] = $this->registration_model->CS_troubleshoot_zone_date_model($Zone,$date_array);
            $data['cs_troubleshoot_time'] = $this->registration_model->CS_date_result_cs_troubleshoot_time_model_1($date_array);
            $data['cs_attend'] = $this->registration_model->CS_attend_model($date_array);
         }   
    }elseif ($Zone != '0' && $Sub_Zone != '0' && $Engineer_ID == '0') {
           if($date_array==null){
            $data['done_list_result'] = $this->registration_model->CS_report_zone_szone_model($Zone,$Sub_Zone);
         }else{
            $data['done_list_result'] = $this->registration_model->CS_report_zone_szone_date_model($Zone,$Sub_Zone,$date_array);
            
            $data['summerytask_result'] = $this->registration_model->CS_summerytask_zone_szone_date_model($Zone,$Sub_Zone,$date_array);
            $data['installation_result'] = $this->registration_model->CS_installatio_zone_szone_date_model($Zone,$Sub_Zone,$date_array);
            $data['troubleshoot_result'] = $this->registration_model->CS_troubleshoot_zone_szone_date_model($Zone,$Sub_Zone,$date_array);
            $data['cs_troubleshoot_time'] = $this->registration_model->CS_date_result_cs_troubleshoot_time_model_1($date_array);
            $data['cs_attend'] = $this->registration_model->CS_attend_model($date_array);
        }  
    }
    elseif ($Zone != '0' && $Sub_Zone != '0' && $Engineer_ID != '0') {
           if($date_array==null){
            $data['done_list_result'] = $this->registration_model->CS_report_zone_szone_model($Zone,$Sub_Zone);
         }else{
            $data['done_list_result'] = $this->registration_model->CS_report_zone_szone_eng_date_model($Zone,$Sub_Zone,$Engineer_ID,$date_array);
            
            $data['summerytask_result'] = $this->registration_model->CS_summerytask_zone_szone_engdate_model($Zone,$Sub_Zone,$Engineer_ID,$date_array);
            $data['installation_result'] = $this->registration_model->CS_installatio_zone_szone_eng_date_model($Zone,$Sub_Zone,$Engineer_ID,$date_array);
            $data['troubleshoot_result'] = $this->registration_model->CS_troubleshoot_zone_szone_eng_date_model($Zone,$Sub_Zone,$Engineer_ID,$date_array);
            $data['cs_date_result'] = $this->registration_model->CS_date_result_zone_szone_eng_date_model($Zone,$Sub_Zone,$Engineer_ID,$date_array);
            $data['cs_troubleshoot_time'] = $this->registration_model->CS_date_result_cs_troubleshoot_time_model($Engineer_ID,$date_array);
            $data['cs_attend'] = $this->registration_model->CS_attend_model($date_array);
        }  
    }
   
    $data['maincontent'] = $this->load->view('cs_report', $data, true);
//        $data['title'] = 'View Course';
    $this->load->view('home', $data); 
    }
    
    
    public function cs_details_by_date_id(){
      
       $date=$this->input->post('date'); 
       $Engineer_ID=$this->input->post('Engineer_ID'); 
//       $Engineer_Name='S M Zahirul Islam'
       $result = $this->registration_model->cs_report_details_id_date_model($date,$Engineer_ID);
       echo json_encode($result);
        
    }
    
    public function cs_BTS_report_details_by_OLT(){
      
//       $date=$this->input->post('date'); 
    $BTS=$this->input->post('BTS'); 
    $Initial_Problem_Category=$_SESSION["Initial_Problem_Category"];
//    $Initial_Problem_Category='Bandwidth_Problem';
    $Date=$_SESSION["date_from"];
    $date_from = date("Y-m-d 00:00:00", strtotime($Date));
    $date1 =  $date_from;

    $Date1=$_SESSION["date_to"];
    $date_to = date("Y-m-d 23:59:59", strtotime($Date1));
    $date2 = $date_to;

    $date_array = array(
        'date1' => $date1,
        'date2' => $date2
    );
//  if($Initial_Problem_Category=='All' || $Initial_Problem_Category==null){
    $result['olt'] = $this->registration_model->cs_BTS_report_details_OLT_model($BTS,$Initial_Problem_Category,$date_array);
    $result['problem'] = $this->registration_model->cs_BTS_report_details_OLT_model_1($BTS,$Initial_Problem_Category,$date_array);       
    $result['slove'] = $this->registration_model->cs_BTS_report_details_OLT_model_2($BTS,$Initial_Problem_Category,$date_array);  
//  }else{
//    $result['olt'] = $this->registration_model->cs_BTS_report_TS_details_OLT_model($BTS,$Initial_Problem_Category,$date_array);
//    $result['problem'] = $this->registration_model->cs_BTS_report_details_OLT_model_1($BTS,$Initial_Problem_Category,$date_array);       
//    $result['slove'] = $this->registration_model->cs_BTS_report_details_OLT_model_2($BTS,$Initial_Problem_Category,$date_array);  
//  }
    
    echo json_encode($result);
        
    }
     public function cs_BTS_report_details_by_trobuleshoot(){
      
//       $date=$this->input->post('date'); 
       $OLT=$this->input->post('OLT_Name'); 
       
/////////////////////////////////////////////////////////////////////////////////////////////////
    $Date=$_SESSION["date_from"];
    $date_from = date("Y-m-d 00:00:00", strtotime($Date));
    $date1 =  $date_from;

    $Date1=$_SESSION["date_to"];
    $date_to = date("Y-m-d 23:59:59", strtotime($Date1));
    $date2 = $date_to;

    $date_array = array(
        'date1' => $date1,
        'date2' => $date2
    );
  
///////////////////////////////////////////////////////////////////////////////////////////////   
       $result['problem'] = $this->registration_model->cs_BTS_report_details_trobuleshoot_model($OLT,$date_array);       
       $result['slove'] = $this->registration_model->cs_BTS_report_details_solved_model($OLT,$date_array);
       echo json_encode($result);
        
    }
    
     public function cs_BTS_report_details_by_Final_Resolution(){
      

/////////////////////////////////////////////////////////////////////////////////////////////////
    $Date=$_SESSION["date_from"];
    $date_from = date("Y-m-d 00:00:00", strtotime($Date));
    $date1 =  $date_from;

    $Date1=$_SESSION["date_to"];
    $date_to = date("Y-m-d 23:59:59", strtotime($Date1));
    $date2 = $date_to;

    $date_array = array(
        'date1' => $date1,
        'date2' => $date2
    );
  
///////////////////////////////////////////////////////////////////////////////////////////////  
       $Initial_Problem_Category=$this->input->post('Initial_Problem_Category'); 
       $BTS_Name=$_SESSION["BTS_Name"];
       
       $OLT=$this->input->post('OLT_Name'); 
//       sss
      if($OLT!=null){
          $result['slove'] = $this->registration_model->cs_BTS_report_details_Initial_Prb_Catgoy_model($OLT,$Initial_Problem_Category,$date_array);
          echo json_encode($result);
      } else{
          $result['slove'] = $this->registration_model->cs_BTS_report_details_Initial_Prb_Catgoy_model_1($BTS_Name,$Initial_Problem_Category,$date_array);
          echo json_encode($result);
      }
     
        
    }
    
    public function cs_rept_tsk(){
    $data = array();
    $data['result'] = $this->registration_model->CS_pending_task_zone_page();
    $this->session->unset_userdata('date_from');
    $this->session->unset_userdata('date_to');   
    $this->session->unset_userdata('BTS_Name'); 
    $this->session->unset_userdata('Initial_Problem_Category');
    /////////////////////////////////////////////////////////////////////////////////////////////////
    $Date = $this->input->post('date_from');
    $_SESSION["date_from"] = $Date;
    $date_from = date("Y-m-d 00:00:00", strtotime($Date));
    $date1 =  $date_from;


    $Date1 = $this->input->post('date_to');
    $_SESSION["date_to"] = $Date1;
    $date_to = date("Y-m-d 23:59:59", strtotime($Date1));
    $date2 = $date_to;

    $date_array = array(
        'date1' => $date1,
        'date2' => $date2
    );
  
///////////////////////////////////////////////////////////////////////////////////////////////    
//  .............................................................................................        
//  .............................................................................................. 
    $Zone = $this->input->post('Zone');
    $Sub_Zone = $this->input->post('Sub_Zone');      
    $BTS_Name = $this->input->post('BTS_Name'); 
    $_SESSION["BTS_Name"] = $BTS_Name;
    
    $Initial_Problem_Category = $this->input->post('Initial_Problem_Category'); 
    $_SESSION["Initial_Problem_Category"] = $Initial_Problem_Category;
    
    
    if($Zone == '0' && $Sub_Zone == '0'){ 
        if( $Initial_Problem_Category == null || $Initial_Problem_Category == 'All' ){
            $data['monthly_task_Details'] = $this->registration_model->CS_BTS_report_monthly($date_array);
        }else{
            $data['monthly_task_Details'] = $this->registration_model->CS_BTS_TS_report_monthly($date_array,$Initial_Problem_Category);
        }
        
    }elseif ($Zone != '0' && $Sub_Zone == null && $BTS_Name == 'Select Name') {
        if( $Initial_Problem_Category == null || $Initial_Problem_Category == 'All' ){
           $data['monthly_task_Details'] = $this->registration_model->CS_BTS_report_zone_monthly($Zone,$date_array);   
        }else{
           $data['monthly_task_Details'] = $this->registration_model->CS_BTS_report_zone_TS_monthly($Zone,$Initial_Problem_Category,$date_array);
        }
             
    }elseif ($Zone != '0' && $Sub_Zone != null && $BTS_Name == 'Select Name') {
         if( $Initial_Problem_Category == null || $Initial_Problem_Category == 'All' ){
            $data['monthly_task_Details'] = $this->registration_model->CS_BTS_report_sub_zone_monthly($Sub_Zone,$date_array);     
         }else{
             $data['monthly_task_Details'] = $this->registration_model->CS_BTS_report_sub_zone_TS_monthly($Sub_Zone,$Initial_Problem_Category,$date_array); 
         }
            
    }elseif ($Zone != '0' && $Sub_Zone == null && $BTS_Name != 'Select Name' ) {
        if( $Initial_Problem_Category == null || $Initial_Problem_Category == 'All' ){
            $data['monthly_task_Details'] = $this->registration_model->CS_BTS_report_BTS_monthly($BTS_Name,$date_array); 
        }else{
            $data['monthly_task_Details'] = $this->registration_model->CS_BTS_report_BTS_TS_monthly($BTS_Name,$Initial_Problem_Category,$date_array); 
        }
            
    }
    
   
    $data['maincontent'] = $this->load->view('cs_report_task', $data, true);
//        $data['title'] = 'View Course';
    $this->load->view('home', $data); 
    }
    
    public function user_list(){
     
    $data = array();
//    $data['result'] = $this->registration_model->CS_task_report_category();
    $Zone = $this->input->post('Zone');   
    $department = $this->input->post('department');   
    if($department=='0' && $Zone=='0'){
        $data['user_result'] = $this->registration_model->user_list_model();
    }elseif ($department!='0' && $Zone=='0') {
        $data['user_result'] = $this->registration_model->user_list_by_dept_model($department);   
    } elseif ($department=='0' && $Zone!='0') {
        $data['user_result'] = $this->registration_model->user_list_by_zone_model($Zone);   
    }elseif ($department!='0' && $Zone!='0') {
        $data['user_result'] = $this->registration_model->user_list_by_dept_zone_model($department,$Zone);   
    }
        
    $data['maincontent'] = $this->load->view('user_info', $data, true);
//        $data['title'] = 'View Course';
    $this->load->view('home', $data); 
    }
    
     public function remove_user(){
        $data = array(); 

        $id=$this->input->post('id'); 
        $data['User_Status']=0;
        $this->registration_model->remove_user_model($id,$data);
//        $bw_result = $this->hd_model->pick_bw_model($bw_type,$sub_type);
        
        echo json_encode('Remove User Done');
    }
   
    public function find_ename(){
        
        $Name=$this->input->post('Name'); 
//        $data['User_Status']=0;
        $result=$this->registration_model->find_ename_model($Name);
        
        echo json_encode($result);   
    }
    
}