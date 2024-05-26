<?php
session_start();


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
//        $sdata=array();
//        $sdata['fonoc_eid_session'] = $search_id;
//        $this->session->set_userdata($sdata);

        $data['result_display'] = $this->employee_database->fonoc_pending_data_by_id_model($search_id);
        $data['maincontent']=  $this->load->view('fonoc_pending_task_by_id',$data,true);
        $this->load->view('home',$data);    
    }
    
    public function FONOC_DB_zone_pending($zone,$type){
     
        $data=array();       
        $data['search_id'] = $this->employee_database->select_fonoc_id();
//        $search_id = $this->input->post('search_id');
        $sdata=array();
        $sdata['fonoc_zone_session'] = $zone;
        $sdata['fonoc_task_type_session'] = $type;
        $this->session->set_userdata($sdata);
        $data['result_display'] = $this->employee_database->fonoc_pending_zone_model($zone,$type);
        $data['maincontent']=  $this->load->view('fonoc_pending_task_by_id',$data,true);
        $this->load->view('home',$data);    
    }
    
    public function FONOC_DB_zone_done($zone,$type){
     
        $data=array();       
        $data['search_id'] = $this->employee_database->select_fonoc_id();
//        $search_id = $this->input->post('search_id');
//        $sdata=array();
//        $sdata['fonoc_zone_session'] = $zone;
//        $sdata['fonoc_task_type_session'] = $type;
//        $this->session->set_userdata($sdata);
        $data['result_display'] = $this->employee_database->fonoc_done_zone_model($zone,$type);
        $data['maincontent']=  $this->load->view('fonoc_done_task_db',$data,true);
        $this->load->view('home',$data);    
    }
    
    public function FONOC_DB_zone_pending_1(){
      
        $data=array();      
        $zone = $this->session->userdata('fonoc_zone_session');
        $type = $this->session->userdata('fonoc_task_type_session');
        $data['result_display'] = $this->employee_database->fonoc_pending_zone_model($zone,$type);
        $data['maincontent']=  $this->load->view('fonoc_pending_task_by_id',$data,true);
        $this->load->view('home',$data); 
    }
    
    public function FONOC_DB_zone_pending_2(){
        
        $data=array();   
        $search_id = $this->session->userdata('id');
        $data['result_display'] = $this->employee_database->fonoc_pending_data_by_id_model($search_id);
        
//        print_r($data['result_display']);
        $data['maincontent']=  $this->load->view('fonoc_pending_task_by_id',$data,true);
        $this->load->view('home',$data);    
        
    }

    public function fonoc_assin_task(){        
        $data = array();
//        $data['result'] = $this->registration_model->assign_task_page_category();
        $data['result'] = $this->employee_database->FONOC_task_category();
        $data['maincontent'] = $this->load->view('fonoc_assin_task', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);        
    } 
    
    public function fonoc_DT(){
        
        $data = array();
//        $data['result'] = $this->registration_model->assign_task_page_category();
        $data['result'] = $this->employee_database->FONOC_task_category();
        $data['maincontent'] = $this->load->view('fonoc_daily_task_from', $data, true);
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
    
    public function fonoc_working($ticket_no){
        
        $data = array();
        $id = $this->session->userdata('id');
        $data['employee_id'] = $id;
        $name = $this->session->userdata('name');
        $data['employee_name'] = $name;
        $data['start_date'] = date("Y-m-d H:i:s");
        $data['work_status'] = '1';
        $result = $this->employee_database->fonoc_working_task_model($ticket_no,$data);
//           echo"<pre>";
//             print_r($data);
//             echo"</pre>";
        $data['maincontent'] = $this->load->view('fonoc_edit_task_pending', $data, true);
       redirect('index.php/link3_controller/FONOC_DB_zone_pending_1', 'refresh');
//        $data['title'] = 'View Course';
    }
    
    public function fonoc_revise_form($ticket_no){
        
        $data = array();
        $data['result'] = $this->employee_database->edit__task_done_model($ticket_no);
        $data['maincontent'] = $this->load->view('fonoc_revise_form', $data, true);
        $this->load->view('home', $data);
    }

        public function fonoc_revise(){
        
        $data = array();
        $id = $this->session->userdata('id');
        $data['employee_id'] = $id.'(revise)';
        $name = $this->session->userdata('name');
        $data['employee_name'] = $name;
        $data['start_date'] = date("Y-m-d H:i:s");
        $data['work_status'] = '0';
        
        $ticket_no=$this->input->post('p_key');
        $pre_comments=$this->input->post('pre_comments');
        $comments=$this->input->post('comments');
        $data['comments']='Pre-Comments : '.$pre_comments.'.  Revise reason:'.$comments; 
        
        $result = $this->employee_database->fonoc_revise_task_model($ticket_no,$data);
//           echo"<pre>";
//             print_r($data);
//             echo"</pre>";
        $data['maincontent'] = $this->load->view('fonoc_edit_task_pending', $data, true);
       redirect('index.php/link3_controller/FONOC_DB_zone_pending_1', 'refresh');
             
    }

    public function fonoc_update_task_done(){
                
        $data=array();
        $data['Problem_Catagory']=$this->input->post('Problem_Category');        
        $data['end_date']=$this->input->post('end_date');
        $data['port_block']=$this->input->post('port_block');
        $states=$this->input->post('states');
        $data['status']=$states;
        $pre_comments=$this->input->post('pre_comments');
        $comments=$this->input->post('comments'); 
        $data['comments']='Pre-Comments : '.$pre_comments.'.  Details:'.$comments; 
        
//        echo"<pre>";
//             print_r($data);
//        echo"</pre>";
        $ticket_no = $this->input->post('p_key');
        
        $this->employee_database->fonoc_update_task_done_model($ticket_no, $data);  
        
//        .................................. Forwarded to CS ....................................................
//        $cs_data=array();
//        if($states=='Forwarded to CS'){
//             $data['pick_info']=$this->employee_database->fonoc_pick_info_model($ticket_no);  
//            
//            $cs_data['Client_ID']=$data['pick_info']->Client_ID;
//            $cs_data['Client_Category']=$data['pick_info']->Client_Category;
//            $cs_data['Client_Name']=$data['pick_info']->Client_Name;
//            $BTS_Name=$data['pick_info']->BTS_Name;
//            
//            
////            $cs_data['Zone']=$data['pick_info']->Client_ID;
////            $cs_data['Sub_Zone']=$data['pick_info']->Client_ID;
//             
//            
//        }
//        
//        ......................................................................................
        
        
//        $sdata=array();
//        $sdata['message']='Task Complete susscefully';
//        $this->session->set_userdata($sdata);
        
       echo $e_id = $this->session->userdata('id');  //...   fonoc_eid_session
       echo $zone = $this->session->userdata('fonoc_zone_session');
if($zone!=null){
    redirect("index.php/link3_controller/FONOC_DB_zone_pending_1");
}else if($e_id!=null){
    redirect("index.php/link3_controller/FONOC_DB_zone_pending_2");
}
//        redirect("index.php/link3_controller/DB_A_FNOC_search_pending_task_by_id/$id");
     
    }
    
    
    public function fonoc_save_task(){
        
            $data=array();
            $id = $this->session->userdata('id');
            $data['create_id']=$id;
            $data['Client_ID']=$this->input->post('Client_ID');   
            $data['employee_name']=$this->input->post('Engineer_Name');
            $data['employee_id']=$this->input->post('Engineer_ID');           
            $data['BTS_Name']=$this->input->post('bts');
            $data['OLT_Name']=$this->input->post('olt');
            $data['Problem_Catagory']=$this->input->post('Problem_Category');
            $data['status']=$this->input->post('states');
            $data['comments']=$this->input->post('comments');
            
            $Date = $this->input->post('cs_date');
            $new_start_date = date("Y-m-d H:i:s", strtotime($Date));            
            $data['start_date']=$new_start_date; 

            $Date1 = $this->input->post('e_date');
            $new_end_date = date("Y-m-d H:i:s", strtotime($Date1));            
            $data['end_date']=$new_end_date;
            
            $this->employee_database->save_fonoc_task_info_model($data);  
    }
    
    public function fonoc_save_daily_task(){
        
        $data=array();
        $data['engineer_zone']=$this->input->post('engineer_zone');          
        $data['create_from']='Daily Task';
        $Date = $this->input->post('cs_date');
        $new_start_date = date("Y-m-d H:i:s", strtotime($Date));            
        $data['receipt_time']=$new_start_date; 
        $id = $this->session->userdata('id');
        $data['create_id']=$id;
        $name = $this->session->userdata('name');
        $data['create_name']=$name;
        
        $data['zone']=$this->input->post('engineer_zone');
        $data['BTS_Name']=$this->input->post('BTS_Name');
        $data['OLT_Name']=$this->input->post('OLT_Name');
        $data['PON']=$this->input->post('PON');
        $data['Port']=$this->input->post('Port'); 
        
        $data['Client_Name']=$this->input->post('Client_Name');
        $Client_ID=$this->input->post('Client_ID');  
        
        if (preg_match("/L3R/i", $Client_ID)) {
            $data['Client_ID']=$this->input->post('Client_ID'); 
        }else{
            $data['Client_ID']='CC-'.$Client_ID;
        }
        
        $data['Client_Category']=$this->input->post('Client_Category');
        $data['ONU_Model']=$this->input->post('ONU_Model'); 
        
        $data['tki_id']=$this->input->post('tki_id');
        $data['receipt_phone']=$this->input->post('receipt_phone');
        $data['task_type']=$this->input->post('task_type');                  
        $data['comments']=$this->input->post('comments');
        $data['status']='Pending';
        
        $this->employee_database->save_fonoc_daliytask_info_model($data);
        
    }

    public function fonoc_pending_data_by_id(){
        
        $data=array();       
        $data['search_id'] = $this->employee_database->select_fonoc_id();
        $search_id = $this->input->post('search_id');
        $search_id_own = $this->input->post('search_id_own');

        if($search_id=='0'){
          
             $result = $this->employee_database->fonoc_pending_data_by_id_model($search_id_own);  
        }else{
            $result = $this->employee_database->fonoc_pending_data_by_id_model($search_id);  
        }
//        if ($type_task != "") {
            
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
        $data['done_task_summery'] = $this->employee_database->fonoc_done_by_Eng_ID_summery_model($search_id,$date_array);  
        $data['maincontent']=  $this->load->view('fonoc_done_task_by_id',$data,true);
        $this->load->view('home',$data); 
        
    }
    
    
    
     public function FONOC_report_by_Employee_ID($Engineer_ID){
        
        
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
$empInfo =  $this->employee_database->FONOC_excel_done_task_List_by_Engineer_ID($Engineer_ID,$date_array);

//
//print_r($empInfo);
//exit();
///////////////////////////////////////////////////////////////////////////////////////////////    
 
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Employee ID');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Employee Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'BTS Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'OLT Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'ONU Model');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Client ID');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Client Category');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Problem Category');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Start Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'END Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Comments');
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Status');
   
        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {

            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['employee_id']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['employee_name']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['BTS_Name']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['OLT_Name']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['ONU_Model']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['Client_ID']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element['Client_Category']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element['Problem_Catagory']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element['start_date']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element['end_date']);
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $element['comments']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $element['status']); 
            
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
   
    public function fonoc_done_by_date_range(){
        
        $data=array();       
        $data['result'] = $this->registration_model->CS_pending_task_zone_page();
        $zone = $this->input->post('Zone');
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
        
           $_SESSION["fonoc_zone"]=$zone;
           $_SESSION["fonoc_d_date1"]=$date_array['date1'];
           $_SESSION["fonoc_d_date2"]=$date_array['date2'];

//        $data['result_display'] = $this->employee_database->fonoc_done_by_date_model($date_array);
        $data['installation_result'] = $this->employee_database->fonoc_install_date_model($date_array,$zone);
        $data['troubleshoot_result'] = $this->employee_database->fonoc_ts_date_model($date_array,$zone);
        $data['done_task_summery'] = $this->employee_database->fonoc_done_by_date_summery_model($date_array,$zone); 

        
        
        $data['maincontent']=  $this->load->view('fonoc_done_task_by_date',$data,true);
        $this->load->view('home',$data); 
        
    }
    
 public function export_fonoc_report(){
   
//      load excel library
 $this->load->library('excel');
        
/////////////////////////////////////////////////////////////////////////////////////////////////
 $date1=$_SESSION["fonoc_d_date1"];
 $date2=$_SESSION["fonoc_d_date2"];
 $zone=$_SESSION["fonoc_zone"]; 

//$nmc_module = $this->session->userdata('nmc_module');

$date_array = array(
    'date1' => $date1,
    'date2' => $date2
);

 $empInfo = $this->employee_database->efonoc_report_by_date($date_array,$zone);
 
// print_r($empInfo);
// exit();

///////////////////////////////////////////////////////////////////////////////////////////////    

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Employee ID');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Employee Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'BTS Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'OLT Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'ONU Model');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Client ID');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Client Category');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Problem Catagory');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Start Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'END Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Comments');
        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {
            
//           $Vendor=$element['Vendor'];
//            if ($Vendor =='Cybergate' && $nmc_module == 2) {  
////         echo 'TEST';
//            }else{
                
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['employee_id']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['employee_name']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['BTS_Name']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['OLT_Name']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['ONU_Model']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['Client_ID']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element['Client_Category']);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element['Problem_Catagory']);
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element['start_date']);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element['end_date']);
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $element['comments']);
            
            $rowCount++;
//            }
        }
// create file name   
        $date=date("Y-m-d h:i:sa");
        $fileName= 'fonoc_report.xls'; //.time()
         header("Content-Type: application/vnd.ms-excel");
       
      
       $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
       $objWriter->save('./css/'.$fileName);
// download file
 

        $this->load->helper('download');         
        ob_clean();      
        $data = file_get_contents(base_url().'css/'.$fileName);      
        force_download($fileName, $data);
        
        unset($_SESSION['fonoc_d_date1']);
        unset($_SESSION['fonoc_d_date2']);
        unset($_SESSION['fonoc_zone']);
        echo json_encode("DONE SUCCESSFULLY");
       
    }
    
    
}

?>