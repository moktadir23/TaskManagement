<?php
session_start();

class Nmc_c extends CI_Controller {
    
        public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->library("pagination");
//        $this->load->model('registration_model');
//        $this->load->model('ert_model');
        $this->load->model('hd_model');
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
    

        public function nmc_assin_task(){
        
//            echo 'TEST'; 
            
        $data = array();
//        $data['result'] = $this->ert_model->nmc_assign_task_page_category();
        $data['result'] = $this->hd_model->nmc_assign_task_page_category();
        $data['maincontent'] = $this->load->view('nmc_assin_task', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    } 
    
    
 public function save_task_info_funcation(){
            
            $id = $this->session->userdata('id');
            $data=array();           
            $data['create_id']=$id;            
            $tki=$this->input->post('tki');
            $data['tki']=str_replace(" ","",$tki);
            $data['organisation']=$this->input->post('organisation');
            $data['type']=$this->input->post('type');
           
            $incident_for=$this->input->post('Incident_for');
            $data['Incident_for']=$incident_for; 
            if($incident_for=='Backbone' || $incident_for=='BTS' || $incident_for==='Telco' || $incident_for==='NTTN' || $incident_for==='iMPLS'){
               $data['Name']=$this->input->post('Name1');  
            }else{
               $data['Name']=$this->input->post('Name');  
            }
            
            
//            $data['email']=$this->input->post('email_v');
//            $data['sms']=$this->input->post('sms_v');
            
            $email_v=$this->input->post('email_v');
            if($email_v==''){
                $data['email']=0;
            }else{
                $data['email']=$this->input->post('email_v');
            }
            $sms_v=$this->input->post('sms_v');
            if($sms_v==''){
                 $data['sms']=0;
            }else{
                 $data['sms']=$this->input->post('sms_v');
            }
            
            $data['Specification']=$this->input->post('Specification');   
            $data['Vendor']=$this->input->post('Vendor');  
            
            $data['scr_curt_id']=$this->input->post('scr_curt_id');  
            $data['informed_id']=$this->input->post('informed_id'); 
            
//            $informed_time = $this->input->post('e_date');
             $informed_time = $this->input->post('e_date');
            if($informed_time=='00-00-0000 00:00:00'){
                $new_informed_time = '0000-00-00 00:00:00';
            }else{
                $new_informed_time = date("Y-m-d H:i:s", strtotime($informed_time));
            }
            
            
//            $new_informed_time = date("Y-m-d H:i:s", strtotime($informed_time));
            $data['informed_time']=$new_informed_time; 
            
            $data['pri_find']=$this->input->post('pri_find');
            $Date = $this->input->post('s_date');
            $new_start_date = date("Y-m-d H:i:s", strtotime($Date));
            $data['in_Occurred']=$new_start_date; 
            $data['tki_status']=0;
            $data['comments']=$this->input->post('pri_find');
            $this->hd_model->save_nmc_m($data);  
//........................................................................................            
            $c_data=array();  
            $c_data['create_id']=$id;
            $c_data['tki']=$this->input->post('tki'); 
            $c_data['comments']=$this->input->post('pri_find');
            $c_data['tki_status']=0;
            $this->hd_model->save_nmc_comments($c_data);  
//.........................................................................................       
            $e_data=array(); 
            $e_data['create_id']=$id;
            $e_data['tki']=$this->input->post('tki');
            $e_data['e_name']=$this->input->post('Engineer_Name'); 
            $e_data['e_id']=$this->input->post('Engineer_ID');
            $e_data['status']=0;
            $this->hd_model->save_nmc_emly_info($e_data); 
//.........................................................................................        
       
    }
    
    public function nmc_add_category_from(){
      
        $data = array();
        $data['result'] = $this->hd_model->nmc_add_category_model();
        $data['maincontent'] = $this->load->view('nmc_add_category', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }

    public function nmc_add_ctgry(){
            
            $data = array();
            $id = $this->session->userdata('id');
            $data['create_by']=$id; 
            $data['type']=$this->input->post('Incident_for'); 
            $data['Specification']=$this->input->post('Specification');   
            $data['Vendor']=$this->input->post('Vendor');  
            $data['Name']=$this->input->post('Name'); 
            $this->hd_model->save_nmc_ctgory($data); 
        
    }
     public function Check_nmc_ctgry(){

       $Name=$this->input->post('Name');       
       $result = $this->hd_model->Check_name_model($Name);
       echo json_encode($result);
    }

        public function pending_list(){
        
        $data = array();
        $data['pending_task_result'] = $this->hd_model->nmc_pending_task();
 
// ................................ Comments ...............................................       
        $pending_list=$data['pending_task_result'];
        $comment_array=array();
        foreach ($pending_list as $value) {
                 $tki=$value['tki'];
                 $comment = $this->hd_model->NMC_last_comments($tki);
                 array_push($comment_array, $comment);      
        }
        $data['comments_result'] = $comment_array;
        
//  .............................................................................. 

        $data['maincontent'] = $this->load->view('nmc_pending_list', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
     public function done_list(){
        
        $data = array();
//        $data['done_task_result'] = $this->hd_model->nmc_done_task();
        
 //      .......................  pagination  ...................................................................  
        
        $config["base_url"] = base_url() . "index.php/nmc_c/done_list/";
        $nmuber = $this->hd_model->nmc_done_record_count();
        $i=0;
        foreach ($nmuber as $value) {
         $i++;  
        }
        
        $config["total_rows"] = $i;
        $config["per_page"] = 100;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["done_task_result"] = $this->hd_model->
                nmc_Pagination_done_model($config["per_page"], $page);
        
        $data["links"] = $this->pagination->create_links(); 
       
//      ...............................................................................................

        
        $data['maincontent'] = $this->load->view('nmc_done_list', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    public function done_task($id){

        $data = array();
        $data['result'] = $this->hd_model->nmc_assign_task_page_category();
        $data['pick_data'] = $this->hd_model->nmc_pick_single_info($id);
        $data['maincontent'] = $this->load->view('nmc_done_task', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    
    public function update_nmc_task(){
        $id = $this->session->userdata('id');
//        ..........................................................................................
        $tki=$this->input->post('tki');
        $data['Final_Reason']=$this->input->post('Final_Reason');  
        $data['Duration']=$this->input->post('Duration');
        $Date = $this->input->post('s_date');
        $new_start_date = date("Y-m-d H:i:s", strtotime($Date));
        $data['in_Resolved']=$new_start_date; 
        $data['tki_status']=1;
        $data['comments']=$this->input->post('comments');
        $this->hd_model->update_nmc_task($tki,$data);  
//        ................................................................................................
        $e_data=array(); 
        $e_data['create_id']=$id;
        $e_data['tki']=$tki;
        $e_data['e_name']=$this->input->post('Engineer_Name'); 
        $e_data['e_id']=$this->input->post('Engineer_ID');
        $e_data['status']=1;
        $this->hd_model->save_nmc_emly_info($e_data);  
//      ....................................................................................................
        $c_data=array();  
        $c_data['create_id']=$id;
        $c_data['tki']=$tki; 
        $c_data['comments']=$this->input->post('comments');
        $c_data['tki_status']=1;
        $this->hd_model->save_nmc_comments($c_data);
        
        redirect('index.php/welcome/Dashboard_funcation');
        
        
    }
    function nmc_comments($tki){
        $data = array();
        
        $data['result'] = $this->hd_model->nmc_view_comments($tki);
//        $data['result'] = $this->registration_model->comments_model_funcation($tki);
        $data['maincontent'] = $this->load->view('nmc_comments', $data, true);
        $this->load->view('home', $data);  
    }
      public function update_nmc_comments(){
        $c_data=array();  
        $id = $this->session->userdata('id');
        $c_data['create_id']=$id;
        $c_data['tki']=$this->input->post('tki'); 
        $c_data['comments']=$this->input->post('comments');
        $c_data['tki_status']=1;
        $this->hd_model->save_nmc_comments($c_data);
        
//        ........................................................
        $date=array();
        $tki=$this->input->post('tki');
        $data['comments']=$this->input->post('comments');
        $this->hd_model->update_nmc_task($tki,$data); 
//        ..........................................................
        $returnData = array(
            "id" =>  $id,
            "comments_date" => $data['comments_date'],
            "comments" =>  date("Y-m-d h:i:sa"),
//            "Document_Type" => $attach_file_data['Document_Type'],
        );
        echo json_encode($returnData);

    }
    
    public function DB_nmc_by_vendor($Vendor){
         $data = array();
         $data['from_value'] = $this->hd_model->nmc_report_value();
         $data['pending_list_result'] = $this->hd_model->nmc_pending_by_vendor($Vendor);
         
// ................................ Comments ...............................................       
        $pending_list=$data['pending_list_result'];
//        echo '<pre>';
//        print_r($pending_list)
        
        if($pending_list!=null){
        $comment_array=array();
        foreach ($pending_list as $value) {
                 $tki=$value['tki'];
                 $comment = $this->hd_model->NMC_last_comments($tki);
                 array_push($comment_array, $comment);      
        }
        $data['comments_result'] = $comment_array;
        }
//  ..............................................................................  
       $data['maincontent'] = $this->load->view('nmc_p_task_by_date', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
         
    }

public function nmc_p_task_by_date(){
      $data = array();            
     $data['from_value'] = $this->hd_model->nmc_report_value();
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
$_SESSION["nmc_s_date1"]=$date_array['date1'];
$_SESSION["nmc_s_date2"]=$date_array['date2'];

///////////////////////////////////////////////////////////////////////////////////////////////    
   $Vendor = $this->input->post('Vendor'); 
   $type = $this->input->post('type'); 
   
    
    
   if($Vendor=='0' && $type=='0'){
       $data['pending_list_result'] = $this->hd_model->nmc_p_list_by_date($date_array);
   }else if($Vendor!='0' && $type=='0'){
//       $data['result'] = $this->hd_model->nmc_incident_report_by_vendor($Vendor,$date_array);
       $data['pending_list_result'] = $this->hd_model->nmc_p_list_by_vendor($Vendor,$date_array);
   }else if($Vendor=='0' && $type!='0'){
//       $data['result'] = $this->hd_model->nmc_incident_report_by_type($type,$date_array);
       $data['pending_list_result'] = $this->hd_model->nmc_p_list_by_type($type,$date_array);
   }else{
//       $data['result'] = $this->hd_model->nmc_incident_report_by_type_vendor($Vendor,$type,$date_array);
       $data['pending_list_result'] = $this->hd_model->nmc_p_list_by_type_vendor($Vendor,$type,$date_array);
   }
   
   
// ................................ Comments ...............................................       
        $pending_list=$data['pending_list_result'];
//        echo '<pre>';
//        print_r($pending_list)
        
        if($pending_list!=null){
        $comment_array=array();
        foreach ($pending_list as $value) {
                 $tki=$value['tki'];
                 $comment = $this->hd_model->NMC_last_comments($tki);
                 array_push($comment_array, $comment);      
        }
        $data['comments_result'] = $comment_array;
        }
//  ..............................................................................  
       $data['maincontent'] = $this->load->view('nmc_p_task_by_date', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    }
    public function incident_report(){
        $data = array();            
        $data['from_value'] = $this->hd_model->nmc_report_value();
/////////////////////////////////////////////////////////////////////////////////////////////////

        $time = $this->input->post('tm_v');
        if ($time != null) {
//            $time="10:00:00-17:59:50";
            $time_v = (explode("-", $time));
            $s_time = $time_v[0];
            $e_time = $time_v[1];

            $Date = $this->input->post('date_from');
//$_SESSION["nmc_start_date"] = $Date;
            $date_from = date("Y-m-d", strtotime($Date));

            $date1 = $date_from . ' ' . $s_time;

            $Date2 = $this->input->post('date_to');
//$_SESSION["nmc_end_date"] = $Date2;
            $date_to = date("Y-m-d", strtotime($Date2));

            $date2 = $date_to . ' ' . $e_time;
            $date_array = array(
                'date1' => $date1,
                'date2' => $date2
            );
            


           $_SESSION["nmc_s_date1"]=$date_array['date1'];
           $_SESSION["nmc_s_date2"]=$date_array['date2'];

///////////////////////////////////////////////////////////////////////////////////////////////    
            $Vendor = $this->input->post('Vendor'); 
            $_SESSION["nmc_s_vendor"] = $Vendor;
            
            $Incident_for = $this->input->post('Incident_for'); 
            $_SESSION["nmc_Incident_for"] = $Incident_for;
            
            $type = $this->input->post('type'); 
            $_SESSION["nmc_s_type"] = $type;
            
            $Specification = $this->input->post('Specification'); 
            $_SESSION["nmc_s_Specification"] = $Specification;
            
            $Name = $this->input->post('Name'); 
            $_SESSION["nmc_s_name"] = $Name;
            $Name1 = $this->input->post('Name1');
            $_SESSION["nmc_s_name1"] = $Name1;
            
            if($Vendor !='0' && $type !='0' && $Incident_for !='0' && $Specification !='0' && $Name1!='Select Name' ){
                $data['result'] = $this->hd_model->nmc_incident_report_by_incedient_for_type_vendor_specification_name_date($Incident_for,$type,$Vendor,$Specification,$Name1,$date_array);
            }else if( $Vendor =='0' && $type =='0' && $Incident_for =='0' && $Specification =='0' && $Name1=='Select Name'  ){
                $data['result'] = $this->hd_model->nmc_all_incident_report_by_date($date_array);
            }else if($Vendor !='0' && $Incident_for !='0' && $Specification !='0' && $Name1!='Select Name' ){
                $data['result'] = $this->hd_model->nmc_incident_report_by_type_vendor_specification_name_date($Incident_for,$Vendor,$Specification,$Name1,$date_array);
            }else if($Vendor !='0' && $Incident_for !='0' && $Specification !='0' ){
                $data['result'] = $this->hd_model->nmc_incident_report_by_type_vendor_specification_date($Incident_for,$Vendor,$Specification,$date_array);
            }else if($Vendor=='0' && $Incident_for=='0' && $Specification=='0' && $Name!= null){
                $data['result'] = $this->hd_model->nmc_incident_report_by_name_date($Name,$date_array);
            }else if($Vendor=='0' && $Incident_for=='0' && $Specification=='0' && $Name== null ){
                $data['result'] = $this->hd_model->nmc_incident_report_by_date($date_array);
            }else if($Vendor!='0' && $Incident_for=='0'){
                $data['result'] = $this->hd_model->nmc_incident_report_by_vendor($Vendor,$date_array);
            }else if($Vendor=='0' && $Incident_for!='0'){
                if($Specification=='0' || $Specification==null){
                    $data['result'] = $this->hd_model->nmc_incident_report_by_type($Incident_for,$date_array);
                }else{
                    $data['result'] = $this->hd_model->nmc_incident_report_by_type_Specification($Incident_for,$Specification,$date_array);
                }
            }else{
                if($Name==null && $Name1=='Select Name'){
                    $data['result'] = $this->hd_model->nmc_incident_report_by_type_vendor($Vendor,$Incident_for,$date_array);
                }else{
                    if($Name1=='Select Name'){
                       $data['result'] = $this->hd_model->nmc_incident_report_by_type_vendor_name($Vendor,$Incident_for,$Name,$date_array); 
                    }else{
                        $data['result'] = $this->hd_model->nmc_incident_report_by_type_vendor_name($Vendor,$Incident_for,$Name1,$date_array);
                    }
                    
                }
               
            }   
    } else {
            $data['result'] = null;
    }
      
         
    $data['maincontent'] = $this->load->view('nmc_incident_report', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data); 
        
    }
    
    public function nmc_ereport(){
    
    $data = array();            
    $data['employee_name'] = $this->hd_model->nmc_report_value();
    
/////////////////////////////////////////////////////////////////////////////////////////////////
$Date = $this->input->post('date_from');
$date_from = date("Y-m-d 00:00:00", strtotime($Date));
$date1 =  $date_from;
$Date2 = $this->input->post('date_to');
$date_to = date("Y-m-d 23:59:59", strtotime($Date2));
$date2 = $date_to;
$date_array = array(
    'date1' => $date1,
    'date2' => $date2
);
///////////////////////////////////////////////////////////////////////////////////////////////    
    $Engineer_ID = $this->input->post('Engineer_ID'); 
    $data['result'] = $this->hd_model->nmc_ereport($Engineer_ID,$date_array);
    $data['maincontent'] = $this->load->view('nmc_employee_report', $data, true);
//        $data['title'] = 'View Course';
    $this->load->view('home', $data);    
    }
    

   public function export_incedent_report(){
        
        
//      load excel library
 $this->load->library('excel');
        
/////////////////////////////////////////////////////////////////////////////////////////////////
//$Date=$_SESSION["nmc_start_date"];
//$date_from = date("Y-m-d 00:00:00", strtotime($Date));
//$date1 =  $date_from;
//
//$end_Date=$_SESSION["nmc_end_date"];
//$date_to = date("Y-m-d 23:59:59", strtotime($end_Date));
//$date2 = $date_to;

 $date1=$_SESSION["nmc_s_date1"];
 $date2=$_SESSION["nmc_s_date2"];
 $nmc_module = $this->session->userdata('nmc_module');

$date_array = array(
    'date1' => $date1,
    'date2' => $date2
);

   $Vendor = $_SESSION["nmc_s_vendor"];
   $Incident_for=$_SESSION["nmc_Incident_for"];
   $type = $_SESSION["nmc_s_type"];
   $Specification = $_SESSION["nmc_s_Specification"];
   $Name = $_SESSION["nmc_s_name"];
   $Name1 = $_SESSION["nmc_s_name1"];
//    $empInfo = $this->hd_model->enmc_incident_report_by_date($date_array);
   
   if($Vendor !='0' && $type !='0' && $Incident_for !='0' && $Specification !='0' && $Name1!='Select Name' ){       
        $empInfo = $this->hd_model->enmc_incident_report_by_type_vendor_incident_for_specification_name_date($Incident_for,$type,$Vendor,$Specification,$Name1,$date_array);
   }else if($Vendor =='0' && $type =='0' && $Incident_for =='0' && $Specification =='0' && $Name1=='Select Name' ){       
        $empInfo = $this->hd_model->enmc_all_incident_report_by_date($date_array);
   }else if($Vendor !='0' && $type =='0' && $Incident_for !='0' && $Specification !='0' && $Name1!='Select Name' ){       
        $empInfo = $this->hd_model->enmc_incident_report_by_type_vendor_specification_name_date($Incident_for,$Vendor,$Specification,$Name1,$date_array);
   }else if($Vendor !='0' && $type !='0' && $Incident_for =='0' && $Specification !='0' && $Name == null){
        $empInfo = $this->hd_model->enmc_incident_report_by_type_vendor_specification_date($type,$Vendor,$Specification,$date_array);
   }else if($Vendor =='0' && $type =='0' && $Incident_for !='0' && $Specification =='0' && $Name == null){
        $empInfo = $this->hd_model->enmc_incident_report_by_Incident_for_date($Incident_for,$date_array);
   }else if($Vendor=='0' && $type=='0' && $Specification=='0' && $Name!= null){
        $empInfo = $this->hd_model->enmc_incident_report_by_name_date($Name,$date_array);
   }else if($Vendor=='0' && $type=='0' && $Specification=='0' && $Name== null ){
       $empInfo = $this->hd_model->enmc_incident_report_by_date($date_array);
   }else if($Vendor!='0' && $type=='0'){
       $empInfo = $this->hd_model->enmc_incident_report_by_vendor($Vendor,$date_array);
   }else if($Vendor=='0' && $type!='0'){
       if($Specification=='0'){
            $empInfo = $this->hd_model->enmc_incident_report_by_type($type,$date_array);
       }else{
            $empInfo = $this->hd_model->enmc_incident_report_by_type_Specification($type,$Specification,$date_array);
       }
   }else{
       
       if($Name==null && $Name1=='Select Name'){
           $empInfo = $this->hd_model->enmc_incident_report_by_type_vendor($Vendor,$type,$date_array);
        }else{
            if($Name1=='Select Name'){
               $empInfo = $this->hd_model->enmc_incident_report_by_type_vendor_name($Vendor,$type,$Name,$date_array); 
            }else{
               $empInfo = $this->hd_model->enmc_incident_report_by_type_vendor_name($Vendor,$type,$Name1,$date_array);
            }

        }
   }
   

//print_r($empInfo);


///////////////////////////////////////////////////////////////////////////////////////////////    
 
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'TKI');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Site/POP Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Specification');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Circuit ID');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Down Time');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Up Time');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Duration');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Reason');
      
       
        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {
            
//           $Vendor=$element['Vendor'];
//            if ($Vendor =='Cybergate' && $nmc_module == 2) {  
////         echo 'TEST';
//            }else{
                
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['tki']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['Name']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['Specification']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['scr_curt_id']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['in_Occurred']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['in_Resolved']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element['Duration']);    
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element['Final_Reason']); 
            
            
            $rowCount++;
//            }
        }
// create file name   
        $date=date("Y-m-d h:i:sa");
        $fileName='incident_report.xls'; //.time()
         header("Content-Type: application/vnd.ms-excel");
       
      
       $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
       $objWriter->save('./css/'.$fileName);
// download file
 
        $this->load->helper('download');         
        ob_clean();      
        $data = file_get_contents(base_url().'css/'.$fileName);      
        force_download($fileName, $data);
        
        unset($_SESSION['nmc_start_date']);
        unset($_SESSION['nmc_end_date']);
        unset($_SESSION['nmc_s_vendor']);
        unset($_SESSION['nmc_Incident_for']);
        unset($_SESSION['nmc_s_type']);
        unset($_SESSION['nmc_s_Specification']);
        unset($_SESSION['nmc_s_name']);
        unset($_SESSION['nmc_s_name1']);
//        echo json_encode("DONE SUCCESSFULLY");
        
        
        
     
       
    }    
    
    
    
  
     public function export_nmc_session_report(){
        
        
//      load excel library
 $this->load->library('excel');
        
/////////////////////////////////////////////////////////////////////////////////////////////////
$Date=$_SESSION["nmc_start_date"];
$date_from = date("Y-m-d 00:00:00", strtotime($Date));
$date1 =  $date_from;

$end_Date=$_SESSION["nmc_end_date"];
$date_to = date("Y-m-d 23:59:59", strtotime($end_Date));
$date2 = $date_to;

// $date1=$_SESSION["nmc_start_date"];
// $date2=$_SESSION["nmc_end_date"];
 $nmc_module = $this->session->userdata('nmc_module');

$date_array = array(
    'date1' => $date1,
    'date2' => $date2
);

   $type = $_SESSION["nmc_s_type"];
   $zone = $_SESSION["nmc_s_zone"];
//    $empInfo = $this->hd_model->enmc_incident_report_by_date($date_array);
   
   if($zone=='0' && $type=='0'){
       $empInfo = $this->hd_model->enmc_session_report_by_date($date_array);
   }else if($zone=='0' && $type!='0'){
            $empInfo = $this->hd_model->enmc_session_report_by_type($type,$date_array);
   }else if($zone!='0'){
            $empInfo = $this->hd_model->enmc_session_report_by_zone($type,$zone,$date_array);
   }
   
   
//$empInfo =  $this->registration_model->CS_excel_done_task_List_by_NOC_ID($Engineer_ID,$date_array);

///////////////////////////////////////////////////////////////////////////////////////////////    
 
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Time');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Type');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Zone / Upstream');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'In (mbps)');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Out (mbps)');
      
       
        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {
            
//           $Vendor=$element['Vendor'];
//            if ($Vendor =='Cybergate' && $nmc_module == 2) {  
////         echo 'TEST';
//            }else{
                
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['date']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['time']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['type']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['sub_type']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['down']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['up']); 
            
            
            $rowCount++;
//            }
        }
// create file name   
        $date=date("Y-m-d h:i:sa");
        $fileName= 'Session_Report.xls'; //.time()
         header("Content-Type: application/vnd.ms-excel");
       
      
       $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
       $objWriter->save('./css/'.$fileName);
// download file
 
        $this->load->helper('download');         
        ob_clean();      
        $data = file_get_contents(base_url().'css/'.$fileName);      
        force_download($fileName, $data);
        
        unset($_SESSION['nmc_start_date']);
        unset($_SESSION['nmc_end_date']);
        unset($_SESSION['nmc_s_type']);
        unset($_SESSION['nmc_s_zone']);
        echo json_encode("DONE SUCCESSFULLY");
       
    }
    
    public function export_Latency_report(){
        
           
//      load excel library
 $this->load->library('excel');
        
/////////////////////////////////////////////////////////////////////////////////////////////////
$Date=$_SESSION["nmc_start_date"];
$date_from = date("Y-m-d 00:00:00", strtotime($Date));
$date1 =  $date_from;

$end_Date=$_SESSION["nmc_end_date"];
$date_to = date("Y-m-d 23:59:59", strtotime($end_Date));
$date2 = $date_to;

// $date1=$_SESSION["nmc_start_date"];
// $date2=$_SESSION["nmc_end_date"];
 $nmc_module = $this->session->userdata('nmc_module');

$date_array = array(
    'date1' => $date1,
    'date2' => $date2
);

//    $empInfo = $this->hd_model->enmc_incident_report_by_date($date_array);
   
   $empInfo = $this->hd_model->enmc_latency_report_by_date($date_array);
   
//$empInfo =  $this->registration_model->CS_excel_done_task_List_by_NOC_ID($Engineer_ID,$date_array);

///////////////////////////////////////////////////////////////////////////////////////////////    
 
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Time');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', '4.2.2.1');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'yahoo.com.sg ');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'google.com.sg ');
        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {
            
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['date']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['time']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['ip_4221_l'].' ( PL-0% )');
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['yahoo_l'].' ( PL-0% )'); 
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['google_l'].' ( PL-0% )'); 
            
            
            $rowCount++;
//            }
        }
// create file name   
        $date=date("Y-m-d h:i:sa");
        $fileName= 'Latency_Report.xls'; //.time()
         header("Content-Type: application/vnd.ms-excel");
       
      
       $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
       $objWriter->save('./css/'.$fileName);
// download file
 
        $this->load->helper('download');         
        ob_clean();      
        $data = file_get_contents(base_url().'css/'.$fileName);      
        force_download($fileName, $data);
        
        unset($_SESSION['nmc_start_date']);
        unset($_SESSION['nmc_end_date']);
        echo json_encode("DONE SUCCESSFULLY"); 
    }

    

    public function nmc_efrom($id){
        
        $data = array();
        $data['result'] = $this->hd_model->nmc_assign_task_page_category();
        $data['pick_result'] = $this->hd_model->nmc_edit_info_model($id);
//        $data['pick_comments'] = $this->hd_model->fi_pick_comments_model($p_key);
//        echo '<pre>';
//        print_r($data['pick_result']);
        
        $data['maincontent'] = $this->load->view('nmc_edit_from', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    }
    
     public function edit_nmc_task(){
        
       
        $id = $this->input->post('id'); 
       
        $e_id = $this->session->userdata('id');
        $data=array();           
//        $data['create_id']=$e_id;            
        $data['tki']=$this->input->post('tki');
        $data['Incident_for']=$this->input->post('Incident_for');
        $data['type']=$this->input->post('type');
        $data['email']=$this->input->post('email_v');
        $data['sms']=$this->input->post('sms_v');
        $data['Specification']=$this->input->post('Specification');   
        $data['Vendor']=$this->input->post('Vendor');  
        $data['Name']=$this->input->post('Name');  
        $data['scr_curt_id']=$this->input->post('scr_curt_id');  
        $data['informed_id']=$this->input->post('informed_id');  
        $data['pri_find']=$this->input->post('pri_find');
        
        $Date = $this->input->post('s_date');
        $new_start_date = date("Y-m-d H:i:s", strtotime($Date));
        $data['in_Occurred']=$new_start_date; 
        
        $Date1 = $this->input->post('e_date');
        if($Date1==''){
            $data['informed_time']='0000-00-00 00:00:00'; 
        }else{
          $new_date1 = date("Y-m-d H:i:s", strtotime($Date1));
          $data['informed_time']=$new_date1;  
        }
       
        
//        $data['tki_status']=0;
    
        $Date2 = $this->input->post('etr');
        if($Date2==''){
            $data['etr']='0000-00-00 00:00:00';  
        }else{
          $new_date2 = date("Y-m-d H:i:s", strtotime($Date2));
          $data['etr']=$new_date2;  
        }
        
        
        $data['rfo']=$this->input->post('rfo');
        $this->hd_model->edit_nmc_task_info_model($id,$data); 
        
//        $sdata=array();
//        $sdata['message']='Update Task Information';
//        $this->session->set_userdata($sdata);
        
        redirect('index.php/welcome/Dashboard_funcation');
 
  
    }
    public function profile(){
        
        $data = array();
//        $data['result'] = $this->hd_model->nmc_assign_task_page_category();
        $e_id = $this->session->userdata('id');
        $data['pick_result'] = $this->hd_model->edit_profile_model($e_id);
        
        $data['res_crtification'] = $this->hd_model->pick_citifition_model($e_id);
//        echo '<pre>';
//        print_r($data['pick_result']);
        
        $data['maincontent'] = $this->load->view('profile_edit', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);   
        
    }
    
    public function update_user_info(){
       
        $e_id = $this->session->userdata('id');
        $data=array();           
//        $data['create_id']=$e_id;            
        $data['blood_group']=$this->input->post('blood_group');
        $data['email']=$this->input->post('email');
        $data['mobile_munber']=$this->input->post('mobile_munber');
        $data['ip_phone']=$this->input->post('ip_phone');
        $data['Designation']=$this->input->post('Designation');
     
        $this->hd_model->update_user_info_model($e_id,$data); 
        
       redirect('index.php/nmc_c/profile');   
    }
    
    public function add_ctiftion(){
        
       
        $data = array();
        $data['result'] = $this->hd_model->crifiticate_category();
//        echo '<pre>';
//        print_r($data['result']);
        
        
        
        $data['maincontent'] = $this->load->view('ctifition_from', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);     
    }
    
    public function save_citifition_info(){
        
        $e_id = $this->session->userdata('id');
        $dept = $this->session->userdata('department');
        $name = $this->session->userdata('name');
        
        $data=array();           
        $data['crat_id']=$e_id;
        $data['crt_name']=$name;
        
        if($dept=='NOC_Admin' || $dept=='Admin'){
            $data['dept']='NOC'; 
        }else{
            $data['dept']=$dept;
        }
        
        
        $data['vdor']=$this->input->post('vdor');
        $data['ctftion_name']=$this->input->post('ctftion_name');
        $data['ctftion_id']=$this->input->post('ctftion_id');
        $data['levl']=$this->input->post('levl');
        $data['e_nam']=$this->input->post('e_nam');
        $data['ex_nbr']=$this->input->post('ex_nbr');
        $Date = $this->input->post('ctfition_dat');
        $new_start_date = date("Y-m-d", strtotime($Date));
        $data['ctfition_dat']=$new_start_date; 
        
        $Date1 = $this->input->post('vlid_dat');
        $v_date = date("Y-m-d", strtotime($Date1));
        $data['vlid_dat']=$v_date;
        
        $this->hd_model->save_citicication_info($data); 
        
//        $sdata=array();
//        $sdata['message']='Update Task Information';
//        $this->session->set_userdata($sdata);
        
        redirect('index.php/nmc_c/profile'); 
    }
    public function crtfition_list(){
   
    $data = array();            
    $data['cat_result'] = $this->hd_model->crifiticate_list_category();
    $vdor = $this->input->post('vdor'); 
    $dept = $this->input->post('dept'); 
    $_SESSION["vdor"]=$vdor;
    $_SESSION["dept"]=$dept;
    if($vdor!='0' && $dept!='0'){
        $data['res_crtification'] = $this->hd_model->crificate_list1($vdor,$dept);
    }elseif($vdor!='0' && $dept=='0'){
        $data['res_crtification'] = $this->hd_model->crificate_list2($vdor);
    }elseif($vdor=='0' && $dept!='0'){
        $data['res_crtification'] = $this->hd_model->crificate_list3($dept);
    }else{
        $data['res_crtification'] = $this->hd_model->crificate_list4();
    }
    
    
    
    $data['maincontent'] = $this->load->view('ctifition_list', $data, true);
//        $data['title'] = 'View Course';
    $this->load->view('home', $data);  
    }
    
     public function export_ecertificate_report(){
        
        
//      load excel library
 $this->load->library('excel');

   $vdor = $_SESSION["vdor"];
   $dept = $_SESSION["dept"];

 if($vdor!='0' && $dept!='0'){
        $empInfo = $this->hd_model->export_crificate_list1($vdor,$dept);
    }elseif($vdor!='0' && $dept=='0'){
        $empInfo = $this->hd_model->export_crificate_list2($vdor);
    }elseif($vdor=='0' && $dept!='0'){
        $empInfo = $this->hd_model->export_crificate_list3($dept);
    }else{
        $empInfo = $this->hd_model->export_crificate_list4();
    }
   
   
//$empInfo =  $this->registration_model->CS_excel_done_task_List_by_NOC_ID($Engineer_ID,$date_array);

///////////////////////////////////////////////////////////////////////////////////////////////    
 
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Department');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Employee Name (ID)');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Vendor');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Certification');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Certification ID');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Level');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Exam Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Exam Number');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Certification Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Valid Through');
        
//       crt_name
        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['dept']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['crt_name'].'('.$element['crat_id'].')');
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['vdor']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['ctftion_name']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['ctftion_id']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['levl']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element['e_nam']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element['ex_nbr']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element['ctfition_dat']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element['vlid_dat']); 
            
            $rowCount++;
        }
// create file name   
        $date=date("Y-m-d h:i:sa");
        $fileName= 'certificate_list.xls'; //.time()
         header("Content-Type: application/vnd.ms-excel");
       
      
       $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
       $objWriter->save('./css/'.$fileName);
// download file
 
        $this->load->helper('download');         
        ob_clean();      
        $data = file_get_contents(base_url().'css/'.$fileName);      
        force_download($fileName, $data);
        
        unset($_SESSION['vdor']);
        unset($_SESSION['dept']);
        
        echo json_encode("DONE SUCCESSFULLY");
       
    }
    
    
    
public function export_pending_report(){      
//      load excel library
 $this->load->library('excel');
        
/////////////////////////////////////////////////////////////////////////////////////////////////
 $date1=$_SESSION["nmc_s_date1"];
 $date2=$_SESSION["nmc_s_date2"];
 
 
 
 //$Date=$_SESSION["nmc_start_date"];
//$date_from = date("Y-m-d 00:00:00", strtotime($Date));
//$date1 =  $date_from;
//
//$end_Date=$_SESSION["nmc_end_date"];
//$date_to = date("Y-m-d 23:59:59", strtotime($end_Date));
//$date2 = $date_to;

// $date1='2018-01-01 00:00:00';
// $date2='2019-03-01 00:00:00';
$date_array = array(
    'date1' => $date1,
    'date2' => $date2
);

   $Vendor = $_SESSION["nmc_s_vendor"];
   $type = $_SESSION["nmc_s_type"];
   
   
   
     $empInfo = $this->hd_model->enmc_pending_report_by_date($date_array);
   
//   if($Vendor == '0' && $type == '0'){
//       $empInfo = $this->hd_model->enmc_pending_report_by_date($date_array);
//   }else if($Vendor != '0' && $type == '0'){
//       $empInfo = $this->hd_model->enmc_pending_report_by_vendor($Vendor,$date_array);
//   }else if($Vendor == '0' && $type != '0'){
//       $empInfo = $this->hd_model->enmc_pending_report_by_type($type,$date_array);
//   }else{
//       $empInfo = $this->hd_model->enmc_incident_report_by_type_vendor($Vendor,$type,$date_array);
//   }
   
 

///////////////////////////////////////////////////////////////////////////////////////////////    
 
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'TKI');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Start Time');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Organisation');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Type');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Specification');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Provider');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'scr / curt id');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Informed ID');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Informed Time');
       
        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['tki']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['in_Occurred']);  
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['incident_for']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['type']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['Specification']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['Vendor']);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element['Name']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element['scr_curt_id']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element['informed_id']);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element['informed_time']);
            $rowCount++;
        }
// create file name   
        $date=date("Y-m-d h:i:sa");
        $fileName= 'pending_report.xls'; //.time()
         header("Content-Type: application/vnd.ms-excel");
       
      
       $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
       $objWriter->save('./css/'.$fileName);
// download file
 
        $this->load->helper('download');         
        ob_clean();      
        $data = file_get_contents(base_url().'css/'.$fileName);      
        force_download($fileName, $data);
        
        unset($_SESSION['nmc_start_date']);
        unset($_SESSION['nmc_end_date']);
        unset($_SESSION['nmc_s_vendor']);
        unset($_SESSION['nmc_s_type']);
        echo json_encode("DONE SUCCESSFULLY");
       
    }
    public function nmc_tki_history(){
       
        $data = array();            
        $tki = $this->input->post('tki'); 
        if($tki!=null){
        $data['tki_result'] = $this->hd_model->nmc_tki_report($tki);
        
        $data['tki_crt_cls'] = $this->hd_model->nmc_tki_crt_cls_report($tki);  
        $data['tki_result_comments'] = $this->hd_model->nmc_tki_comments_report($tki);
        }else{
          $data['tki_result'] = '';
          $data['tki_crt_cls'] = '';  
          $data['tki_result_comments'] = '';   
        }
        $data['maincontent'] = $this->load->view('nmc_tki_report', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);  
    }
    
    public function pick_nmc_category_name(){
      
       $Incident_for=$this->input->post('Incident_for');  
       $Specification=$this->input->post('Specification');  
       $Vendor=$this->input->post('Vendor');  
       $result = $this->hd_model->pick_nmc_category_model($Incident_for,$Specification,$Vendor);
       echo json_encode($result);
        
    } 
    
   public function pick_BTS_Name(){
      
       $Zone=$this->input->post('Zone'); 
       $result = $this->hd_model->pick_BTS_Name($Zone);
       echo json_encode($result);
        
    }
    
    public function bw_utilization_from(){
        $data = array();
        $data['result'] = $this->hd_model->nmc_bw_category();
        $data['maincontent'] = $this->load->view('nmc_bw_utilization', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data); 
    }
    
     public function pick_nmc_bwu_category_name(){
      
       $bw_type=$this->input->post('bw_type');  
       $result = $this->hd_model->pick_nmc_bwu_category_model($bw_type);
       echo json_encode($result);
        
    }
    
    public function save_bwu_info(){
        
        $data=array();
        $e_id = $this->session->userdata('id');
        $data['create_id']=$e_id;
        
        $Date_time = $this->input->post('bw_date');
        
        $Date_time1=(explode(" ",$Date_time));
        $date=$Date_time1[0];
        $new_start_date = date("Y-m-d", strtotime($date));
         
        
        
        $time=$Date_time1[1];
        $newtime=(explode(":",$time));
        
        
        $type=$this->input->post('bw_type');
//<!--..............Down=In................-->
//<!--..............Up=Out.................-->
        
        if( $type=='Link3' )
        {
            for($i=1;$i<=2;$i++){
            $data['date']=$new_start_date;
            $time=$newtime[0].':00:00';
            $data['time']=$newtime[0].':00:00';
            $data['type']=$type;
            $sub_type=$this->input->post('z_sub_type'.$i);
            $data['sub_type']=$this->input->post('z_sub_type'.$i);
            $data['u_key']=$new_start_date.'_'.$time.'_'.$sub_type;
            $data['up']=$this->input->post('z_out'.$i);
            $data['down']=$this->input->post('z_in'.$i);
            $this->hd_model->save_nmc_bwu_model($data);
            }
        }
         
        if( $type=='Cybergate' )
        {
            for($i=1;$i<=7;$i++){
            $data['date']=$new_start_date;
            $time=$newtime[0].':00:00';
            $data['time']=$newtime[0].':00:00';
            
            $data['type']=$type;
            $sub_type=$this->input->post('u_sub_type'.$i);
            $data['sub_type']=$this->input->post('u_sub_type'.$i);
            $data['u_key']=$new_start_date.'_'.$time.'_'.$sub_type;
            $data['up']=$this->input->post('u_out'.$i);
            $data['down']=$this->input->post('u_in'.$i);
            $this->hd_model->save_nmc_bwu_model($data);
            }
        }
        
        echo json_encode('done');
        
    }
    
    
    public function check_duplicate_bw(){
        
        $bw_type=$this->input->post('bw_type');
        
//        $sub_type=$this->input->post('sub_type');
        $bw_date_time=$this->input->post('bw_date_time');
        
        $Date_time1=(explode(" ",$bw_date_time));
        $date=$Date_time1[0];
        $new_date = date("Y-m-d", strtotime($date));        
        
        $oldtime=$Date_time1[1];
        $newtime=(explode(":",$oldtime));
        $time=$newtime[0].':00:00';
        
        
        $duplicate_result = $this->hd_model->checK_dublicate_bw_model($new_date,$time,$bw_type);
        
//        $result['bw_info']=$duplicate_result;
        
        if (isset($duplicate_result) && !empty($duplicate_result)) {
//            echo 'Yes duplicate<br>';
//            $bw_result = null;
            $result['bw_info']=null;
            $bw_result = $this->hd_model->pick_bw_model($bw_type);
            $result['bw_result']=$bw_result;
            
        }else{
//            echo 'NO duplicate<br>';
            $result['bw_info']='NO_duplicate';
            $bw_result = $this->hd_model->pick_bw_model($bw_type);
            $result['bw_result']=$bw_result;
        }

    }
    
    
    public function save_cyberget_bwu_info(){
        
        $data=array();
        $e_id = $this->session->userdata('id');
        $data['create_id']=$e_id;
        
        $Date_time = $this->input->post('bw_date');
        
        $Date_time1=(explode(" ",$Date_time));
        $date=$Date_time1[0];
        $new_start_date = date("Y-m-d", strtotime($date));
         
        
        
        $time=$Date_time1[1];
        $newtime=(explode(":",$time));
        
        
        $type=$this->input->post('bw_type');
        
            $data['date']=$new_start_date;
            $data['time']=$newtime[0].':00:00';
            $data['type']=$type;
            
            $data['sub_type']=$this->input->post('u_sub_type1');
            $data['up']=$this->input->post('u_out1');
            $data['down']=$this->input->post('u_in1');
//         u_sub_type1:u_sub_type1,
//        u_in1:u_in1,
//        u_out1:u_out1,
            
            $this->hd_model->save_nmc_bwu_model($data);
        
    }

        public function save_latancy_info(){
        $data=array();
        $e_id = $this->session->userdata('id');
        $data['create_id']=$e_id;
        $Date_time = $this->input->post('l_date');
        $Date_time1=(explode(" ",$Date_time));
        $date=$Date_time1[0];
        $new_start_date = date("Y-m-d", strtotime($date));
        $data['date']=$new_start_date; 
        
        $data['time']=$Date_time1[1];
        
        $data['ip_4221_l']=$this->input->post('ip_4221_l');  
        $data['ip_4221_pl']=$this->input->post('ip_4221_pl');
        $data['yahoo_l']=$this->input->post('yahoo_l');
        $data['yahoo_pl']=$this->input->post('yahoo_pl');
        $data['google_l']=$this->input->post('google_l');
        $data['google_pl']=$this->input->post('google_pl');
        $this->hd_model->save_nmc_latancy_model($data); 
        
//        echo json_encode('done');
    }
    public function pick_latancy_info(){
       $latancy_result = $this->hd_model->pick_latancy_model();
       echo json_encode($latancy_result);
        
    }
    public function pick_bw_info(){
        
        $bw_type=$this->input->post('bw_type');
        
//        $sub_type=$this->input->post('sub_type');
        $bw_date_time=$this->input->post('bw_date_time');
        
        $Date_time1=(explode(" ",$bw_date_time));
        $date=$Date_time1[0];
        $new_date = date("Y-m-d", strtotime($date));        
        
        $oldtime=$Date_time1[1];
        $newtime=(explode(":",$oldtime));
        $time=$newtime[0].':00:00';
        
//        2019-05-14 14:00:00
//        $date='2019-05-14';
//        $time='15:00:00';
//        $bw_type='Link3';
//        $sub_type='Sylhet';
        
        $duplicate_result = $this->hd_model->checK_dublicate_bw_model($new_date,$time,$bw_type);
        
//        $result['bw_info']=$duplicate_result;
        
        if (isset($duplicate_result) && !empty($duplicate_result)) {
//            echo 'Yes duplicate<br>';
//            $bw_result = null;
            $result['bw_info']=null;
            $bw_result = $this->hd_model->pick_bw_model($bw_type);
            $result['bw_result']=$bw_result;
            
        }else{
//            echo 'NO duplicate<br>';
            $result['bw_info']='NO_duplicate';
            $bw_result = $this->hd_model->pick_bw_model($bw_type);
            $result['bw_result']=$bw_result;
        }
//      print_r($duplicate_result);
        echo json_encode($result);
    }
    
    public function update_bw_info(){
        $data = array(); 
        $Date_time=$this->input->post('s_date');
        $Date_time1=(explode(" ",$Date_time));
        $date=$Date_time1[0];
        $new_start_date = date("Y-m-d", strtotime($date));
        $data['date']=$new_start_date; 
        $date=$new_start_date;
        $data['time']=$Date_time1[1];
        $time=$Date_time1[1];
        
        $bw_type=$this->input->post('bw_type');        
        $sub_type=$this->input->post('sub_type');
        
        $data['up']=$this->input->post('up');
        $data['down']=$this->input->post('down');
        
        
        $this->hd_model->update_bw_model($bw_type,$sub_type,$date,$time,$data);
//        $bw_result = $this->hd_model->pick_bw_model($bw_type,$sub_type);
        
        echo json_encode('update Done');
    }
    
    public function nmc_session_report(){
      $data = array();            
      $data['from_value'] = $this->hd_model->nmc_stype();
/////////////////////////////////////////////////////////////////////////////////////////////////
$Date = $this->input->post('date_from');
$_SESSION["nmc_start_date"] = $Date;
$date_from = date("Y-m-d 00:00:00", strtotime($Date));
$date1 =  $date_from;

$Date2 = $this->input->post('date_to');
$_SESSION["nmc_end_date"] = $Date2;
$date_to = date("Y-m-d 23:59:59", strtotime($Date2));
$date2 = $date_to;

$date_array = array(
    'date1' => $date1,
    'date2' => $date2
);

$r_type = $this->input->post('r_type');
$type = $this->input->post('bw_type');
$_SESSION["nmc_s_type"] = $type;
$sub_type = $this->input->post('sub_type');
$_SESSION["nmc_s_zone"]=$sub_type;



//echo '........................TEST,...........'.$type;

///////////////////////////////////////////////////////////////////////////////////////////////    

        if($r_type==1){
            if( $type == '0' ){
//                echo "T0";
                $data['bw_result'] = $this->hd_model->nmc_bwu_by_date($date_array); 
                $data['latancy_result'] = 'No record found !'; 
            }else if( $type != '0' &&  $sub_type == '0' ) {
//                echo "T1 0r T1";
                $data['bw_result'] = $this->hd_model->nmc_bwu_by_type_date($type,$date_array); 
                $data['latancy_result'] = 'No record found !'; 
            }else if( $type != '0' && $sub_type != '0') {
//                echo "T1 0r T1";
                $data['bw_result'] = $this->hd_model->nmc_bwu_by_subtype_date($type,$sub_type,$date_array); 
                $data['latancy_result'] = 'No record found !'; 
            }
        //    $bw_result = $this->hd_model->pick_bw_model($bw_type);
        }else if($r_type==2){
             $data['latancy_result'] = $this->hd_model->nmc_latancy_by_date($date_array);
              $data['bw_result'] = 'No record found !';
        }else{
           $data['latancy_result'] = 'No record found !'; 
           $data['bw_result'] = 'No record found !';
        }
        
        $data['maincontent'] = $this->load->view('nmc_session_report', $data, true);
    //        $data['title'] = 'View Course';
        $this->load->view('home', $data);  
//        
    }
    
    public function test_api(){
        
echo 'TEST...API';
         redirect('https://203.76.110.131/link3api/frm_subscriber_info.aspx?api_user=31254&api_pass=WfaXq!2&subscriberid=17670');
// $orderid=0;     
// if( ! $items = $this->hd_model->returnItems($orderid) )
//  {
////     $this->_showNoItemsForOrder($orderid) ; 
//            echo 'YES';
//            echo '<pre>';
//            print_r($items);
//            
//  } 
//  else{
////      $this->_showApiOrderItems($items) ; 
//            echo 'NO';
//  } 

//$this->load->library('curl');
//$result = $this->curl->simple_get('https://203.76.110.131/link3api/frm_subscriber_info.aspx?api_user=31254&api_pass=WfaXq!2&subscriberid=17670');
//var_dump($result);

}

public function nmc_tki_details(){
      
//       $date=$this->input->post('date'); 
//       $Engineer_ID=$this->input->post('Engineer_ID'); 
////       $Engineer_Name='S M Zahirul Islam'
//       $result = $this->registration_model->cs_report_details_id_date_model($date,$Engineer_ID);
        $tki=$this->input->post('tbl_tki'); 
        
        $result=array();
        $result['tki_details']= $this->hd_model->nmc_tki_report($tki);
        $result['tki_crt_cls'] = $this->hd_model->nmc_tki_crt_cls_report($tki);  
        $result['tki_result_comments'] = $this->hd_model->nmc_tki_comments_report($tki);
       
       
       echo json_encode($result);
        
    }
    
    public function noc_tki_details(){
        
        $tki=$this->input->post('tbl_tki');  
        $result=array();
        $result['tki_result_comments'] = $this->hd_model->noc_tki_comments_report($tki);
        echo json_encode($result);
    }

        public function nmc_uptime_report(){
        
        
$data = array();     

$data['from_value'] = $this->hd_model->nmc_report_value();
/////////////////////////////////////////////////////////////////////////////////////////////////

        $year = $this->input->post('year');
        $month = $this->input->post('month');
        
        $s_date= $this->input->post('s_date');
        $e_date = $this->input->post('e_date');
        $month_wise_report = $this->input->post('month_wise_report');
        

//        if ($month != null) {

            if($month_wise_report=='1'){
            $start_date='01';
            $end_date=cal_days_in_month(CAL_GREGORIAN,$month,$year);
            $_SESSION["nmc_uptime_day"]=$end_date;
            
            $date_from = $year . '-' . $month . '-' . $start_date;
            $date1 = $date_from . ' ' . '00:00:00';
            $date_to = $year . '-' . $month . '-' . $end_date;
            $date2 = $date_to . ' ' . '23:59:59';
            
            }elseif ($month_wise_report=='0') {
                    
            $date1 = date("Y-m-d H:i:s", strtotime($s_date));
            $date2 = date("Y-m-d H:i:s", strtotime($e_date));   
            
            $datetime1 = new DateTime($date1);
            $datetime2 = new DateTime($date2);
            $interval = $datetime1->diff($datetime2);
            $duration = $interval->format(' %a days %h hours %i min');
            $_SESSION["nmc_uptime_day"]=$duration;
            
            }
            
            $date_array = array(
                'date1' => $date1,
                'date2' => $date2
            );
            
           $_SESSION["nmc_s_date1"]=$date_array['date1'];
           $_SESSION["nmc_s_date2"]=$date_array['date2'];

///////////////////////////////////////////////////////////////////////////////////////////////    
            $Vendor = $this->input->post('Vendor'); 
            $_SESSION["nmc_s_vendor"] = $Vendor;
            
            $Incident_for = $this->input->post('Incident_for'); 
            $_SESSION["nmc_s_Incident_for"] = $Incident_for;
            
            $type = $this->input->post('type'); 
            $_SESSION["nmc_s_type"] = $type;
            
            $Specification = $this->input->post('Specification'); 
            $_SESSION["nmc_s_Specification"] = $Specification;

            
            $Name = $this->input->post('Name'); 
            $_SESSION["nmc_s_name"] = $Name;
            $Name1 = $this->input->post('Name1');
            $_SESSION["nmc_s_name1"] = $Name1;
            
            
            if($Vendor !='0' && $Incident_for !='0' && $Specification !='0' && $Name==null && $Name1=='Select Name'){
                 $data['result'] = $this->hd_model->nmc_downtime_report_by_type_vendor_Specification($Vendor,$Incident_for,$Specification,$date_array);
            }elseif($Vendor !='0' && $Incident_for !='0' && $Specification !='0' && $Name1!='Select Name' ){
                 $data['result'] = $this->hd_model->nmc_downtime_report_by_type_vendor_name($Vendor,$Incident_for,$Name1,$date_array);
            }elseif($Vendor=='0' && $Incident_for=='0' && $Specification=='0'){
               $data['result'] = $this->hd_model->nmc_downtime_report_by_date_model($date_array);     
            }elseif($Vendor!='0' && $Incident_for=='0'){
                $data['result'] = $this->hd_model->nmc_downtime_report_by_vendor($Vendor,$date_array);
            }elseif($Vendor=='0' && $Incident_for!='0'){                
                if($Specification=='0' || $Specification=='Select Specification'){
                     $data['result'] = $this->hd_model->nmc_downtime_report_by_type($Incident_for,$date_array);
                }else{
                    $data['result'] = $this->hd_model->nmc_downtime_report_by_type_Specification($Incident_for,$Specification,$date_array);
                }                 
            }elseif($Vendor!='0' && $Incident_for!='0') {
                
                    if($Specification=='0' || $Specification=='Select Specification'){
                     $data['result'] = $this->hd_model->nmc_downtime_report_by_type($Incident_for,$date_array);
                    }else{
                        $data['result'] = $this->hd_model->nmc_downtime_report_by_type_Specification($Incident_for,$Specification,$date_array);
                    } 
            }else{
                if($Name==null && $Name1=='Select Name'){
                    $data['result'] = $this->hd_model->nmc_downtime_report_by_type_vendor($Vendor,$Incident_for,$date_array);
                }else{
                    if($Name1=='Select Name'){
                       $data['result'] = $this->hd_model->nmc_downtime_report_by_type_vendor_name($Vendor,$Incident_for,$Name,$date_array); 
                    }else{
                        $data['result'] = $this->hd_model->nmc_downtime_report_by_type_vendor_name($Vendor,$Incident_for,$Name1,$date_array);
                    }
                    
                }
               
            }
            
//        } else {
//            $data['result'] = null;
//        }
      
            
         
        $data['maincontent'] = $this->load->view('nmc_uptime_report', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data); 
        
    }
         
    
  
public function nmc_group_Incident_details(){
      
    $Incident_Name=$this->input->post('Incident_Name'); 
    $date1=$_SESSION["nmc_s_date1"];
    $date2=$_SESSION["nmc_s_date2"];
    
    $Vendor= $_SESSION["nmc_s_vendor"];
    $type=$_SESSION["nmc_s_type"];
    $Specification=$_SESSION["nmc_s_Specification"];
    
    $date_array = array(
            'date1' => $date1,
            'date2' => $date2
        );

        if($Specification=='0' || $Specification=='Select Specification'){
             $result= $this->hd_model->nmc_group_Incident_model($Incident_Name,$date_array); 
        }else{
            $result= $this->hd_model->nmc_group_Incident_model_1($Incident_Name,$Specification,$date_array); 
        } 
      
   echo json_encode($result);
        
}  
    


public function api()
{
 
    $api = "31254";
    $pass = "WfaXq!2";
    $subs = "00234";  
    
    $data = "api_user=".$api. "&api_pass=".$pass."&subscriberid=".$subs;
   
    $url = "https://203.76.110.131/link3api/frm_subscriber_info.aspx?api_user=31254&api_pass=WfaXq!2&subscriberid=".$subs;
 
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);  
    $response = curl_exec($ch);
	curl_close($ch);
	
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://203.76.110.131/link3api/sXMLFile.xml');
 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);  
    $response = curl_exec($ch);

//    print_r("<pre>");
//    print_r($response);
     
// $str = $response;
    $result=array();
    $result=(explode("\n",$response));
//    print_r($result);
    
   
   echo 'ID : '. $SubscriberID=$result[4];
   echo '<br>';
   echo 'Name : '. $SubscriberName=$result[5];
   echo '<br>';
   echo 'ContactPerson : ' .$ContactPerson=$result[6];
   echo '<br>';
   echo 'Address1 : '.$AddressLine1=$result[7];
   echo '<br>';
   echo 'Phone : '.$PhoneNo=$result[9];
   echo '<br>';
   echo 'Email : '.$Email=$result[10];
   echo '<br>';
   echo 'Parent Area : '.$ParentArea=$result[11];
   echo '<br>';
   echo 'Area : '.$Area=$result[12];
   echo '<br>';
   echo 'Dis : '. $District=$result[13];
   echo '<br>';
    
   echo ' Status : ' .$SubscriberStatus=$result[14];
   echo '<br>';
   echo 'Category : '.$SubscriberCategory=$result[20];
   echo '<br>';
   echo 'BW : '.$PackageBW=$result[21];
   echo '<br>';
   echo 'Create Date : '.$Create_Date=$result[23];
    
// print_r ($str[5].'TEST');
    print_r("</pre>");
    
      
}


    
    
}