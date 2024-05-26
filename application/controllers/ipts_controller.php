<?php
session_start();
class Ipts_controller extends CI_Controller {
    
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
    

    public function assign_task(){     
        $data = array();
        $data['result'] = $this->ert_model->ipts_assign_task_page_category();
        $data['maincontent'] = $this->load->view('ipts_assign_task', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    } 
    
    
 public function save_task_info_funcation(){
            
           $id = $this->session->userdata('id');
            $data=array();           
            $data['create_id']=$id;          
            $data['Client_id']=$this->input->post('Client_id');
            $data['Client_Name']=$this->input->post('Client_Name');   
            $data['Client_Category']=$this->input->post('Client_Category');
            $data['tki_id']=$this->input->post('tki_id'); 
            $data['type_task']=$this->input->post('type_task');
            $data['Initial_Problem_Category']=$this->input->post('Initial_Problem_Category');
            $data['Engineer_Name']=$this->input->post('Engineer_Name');
            $data['Engineer_ID']=$this->input->post('Engineer_ID');  
            

            $Date = $this->input->post('s_date');
            $new_start_date = date("Y-m-d h:i:s", strtotime($Date));
            $data['s_date']=$new_start_date; 
            
            $Date1 = $this->input->post('e_date');
            $new_start_date1 = date("Y-m-d h:i:s", strtotime($Date1));
            $data['e_date']=$new_start_date1; 
           
            $data['Support_Type']=$this->input->post('Support_Type');
            $data['comments']=$this->input->post('comments');
            $data['status']=$this->input->post('Status');
            
            $result=$this->ert_model->ipts_save_task_info_model($data);  
// sss                   
//            echo '<pre>';
//            print_r($result);
//            echo '</pre>';       
      
        
            
//            $sdata=array();
//            $sdata['message']='Save Task successfully';
//            $this->session->set_userdata($sdata);
//        redirect("index.php/ert_controller/ert_assin_task");
       
    }
    
      public function DB_A_IPTS_pend_task_by_E_ID($Engineer_ID){
        
      $data = array();       
      
      $data['result'] = $this->ert_model->pick_Division();  
      $data['pending_list_result'] = $this->ert_model->DB_ipts_pending_list_by_Engineer_ID_model($Engineer_ID); 
      //      ...............................................................................................  
         
       $data['maincontent'] = $this->load->view('ipts_pending_task_by_id', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
//        mmm
    }
    public function ipts_pending_list(){
        
        $data = array();
//      .......................  pagination  ...................................................................  
        
        $config["base_url"] = base_url() . "index.php/ipts_controller/ipts_pending_list/";
        $nmuber = $this->ert_model->ipts_pending_list_record_count();
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
                ipts_Pagination_pending_model($config["per_page"], $page);
        
        $data["links"] = $this->pagination->create_links(); 
        

//      ...............................................................................................
        
//        $data['pending_task_result'] = $this->ert_model->wi_pick_pending_task();
        
        
        $data['maincontent'] = $this->load->view('ipts_pending_task', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
   
    public function ipts_done_task_from($p_key){
     
        $data = array();
//        $data['pick_comments'] = $this->ert_model->ERT_view_comments_model($p_key);      
//        $data['result'] = $this->ert_model->wi_pick_done_catogry();   
        
        $data['pending_task_result'] = $this->ert_model->ipts_pick_pending_single_task($p_key); 
        
//        echo '<pre>';
//        print_r($data['pending_task_result']);
        
        $data['maincontent'] = $this->load->view('ipts_done_from', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    public function ipts_update_task(){
       
        $data=array();
        $p_key=$this->input->post('p_key'); 
        
        $Date = $this->input->post('cs_date');
        $end_date = date("Y-m-d H:i:s", strtotime($Date));
        $data['e_date']=$end_date;
        
        $data['Status']='Done';
        $data['comments']=$this->input->post('comments');
        
        $update=$this->ert_model->ipts_update_status_model($p_key,$data);

        redirect("index.php/ipts_controller/ipts_pending_list"); 
    }
    public function ipts_pending_task_by_id(){
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
    
    $data['pending_list_result'] = $this->ert_model->ipts_pending_list_by_Engineer_ID_model($Engineer_ID,$date_array); 
     
//    echo '<pre>';
////    echo 'E ID :'.$Engineer_ID;
//    print_r($data['pending_list_result']);
      //      ...............................................................................................  
         
       $data['maincontent'] = $this->load->view('ipts_pending_task_by_id', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    }
    
    public function ipts_pending_task_by_C_N(){
    $data = array();       
    $Client_Name = $this->input->post('Client_Name');  
    $data['pending_list_result'] = $this->ert_model->ipts_pending_list_by_Client_Name_model($Client_Name); 
    $data['maincontent'] = $this->load->view('ipts_pending_task_by_Client_Name', $data, true);
//        $data['title'] = 'View Course';
    $this->load->view('home', $data);  
    }

        public function ipts_pending_task_by_date(){
      $data = array();       
      
//      $data['result'] = $this->ert_model->pick_Division();
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

//    $Engineer_ID = $this->input->post('Engineer_ID');  
//                    $Engineer_ID ='L3T112';
    
    $data['pending_list_result'] = $this->ert_model->ipts_pending_list_by_date_model($date_array); 
     
//    echo '<pre>';
////    echo 'E ID :'.$Engineer_ID;
//    print_r($data['pending_list_result']);
      //      ...............................................................................................  
         
       $data['maincontent'] = $this->load->view('ipts_pending_task_by_date', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    }
      public function ipts_done_task_by_id(){
      $data = array();       
      
      $data['result'] = $this->ert_model->pick_Division();
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
///////////////////////////////////////////////////////////////////////////////////////////////    

    $Engineer_ID = $this->input->post('Engineer_ID');  
//                    $Engineer_ID ='L3T1377';
                    
    
    $data['done_list_result'] = $this->ert_model->ipts_done_list_by_Engineer_ID_model($Engineer_ID,$date_array); 
    
    $data['done_task_summery'] = $this->ert_model->ipts_done_by_Eng_ID_summery_model($Engineer_ID,$date_array);
     
//    echo '<pre>';
////    echo 'E ID :'.$Engineer_ID;
//    print_r($data['done_list_result']);
      //      ...............................................................................................  
         
       $data['maincontent'] = $this->load->view('ipts_done_task_by_id', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    }
    
     public function ipts_done_task_by_date(){
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

//    $Engineer_ID = $this->input->post('Engineer_ID');  
//                    $Engineer_ID ='L3T1377';
                    
    
    $data['done_list_result'] = $this->ert_model->ipts_done_list_by_date_model($date_array); 
     
//    echo '<pre>';
////    echo 'E ID :'.$Engineer_ID;
//    print_r($data['done_list_result']);
      //      ...............................................................................................  
         
       $data['maincontent'] = $this->load->view('ipts_done_task_by_date', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    }
    
    
    public function ipts_done_task_list(){
        
        
        
        $data = array();
//      .......................  pagination  ...................................................................  
        
        $config["base_url"] = base_url() . "index.php/ipts_controller/ipts_done_task_list/";
        $nmuber = $this->ert_model->ipts_done_list_record_count();
        $i=0;
        foreach ($nmuber as $value) {
         $i++;  
        }
        
        $config["total_rows"] = $i;
        $config["per_page"] = 50;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["done_task_result"] = $this->ert_model->
                ipts_Pagination_done_model($config["per_page"], $page);
        
        $data["links"] = $this->pagination->create_links(); 
        

//      ...............................................................................................
        
//        $data['pending_task_result'] = $this->ert_model->wi_pick_pending_task();
        
        
        $data['maincontent'] = $this->load->view('ipts_done_task', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
   
        
    }
    
    
    public function createXLS_report_by_Employee_ID($Engineer_ID){
        
        
//      load excel library
        $this->load->library('excel');
        
/////////////////////////////////////////////////////////////////////////////////////////////////
$Date=$_SESSION["done_date_from_ID"];
echo $date_from = date("Y-m-d 00:00:00", strtotime($Date));
$date1 =  $date_from;
//$date1 =  '2018-11-02 07:07:54';

$Date1=$_SESSION["done_date_to_ID"];
echo $date_to = date("Y-m-d 23:59:59", strtotime($Date1));
$date2 = $date_to;
//$date2 = '2018-11-20 07:07:54';

$date_array = array(
    'date1' => $date1,
    'date2' => $date2
);
$empInfo =  $this->ert_model->IPTS_excel_done_task_List_by_Engineer_ID($Engineer_ID,$date_array);

///////////////////////////////////////////////////////////////////////////////////////////////    
 
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Client ID');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Client Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Client Category');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'TKI ID');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Type Task');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Initial Problem Category');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Employee Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Employee ID');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Start Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'End Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Support Type');
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Comments');

        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {

            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['Client_id']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['Client_Name']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['Client_Category']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['tki_id']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['type_task']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['Initial_Problem_Category']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element['Engineer_Name']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element['Engineer_ID']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element['s_date']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element['e_date']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $element['support_type']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $element['comments']); 
            
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
    
    
    
    public function MTU_search_pending_task_by_id(){
        
    }
    
    public function MTU_search_pending_task_by_sub_zone(){
     
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
            }else{             
                $comment_value = $this->registration_model->CS_last_comments_by_model($id_comment);
                 array_push($lastComments_array, $comment_value);                   
                
            }
        }
//..................................................................................    
    $data['pending_list_last_comments']=$lastComments_array;            
    $data['maincontent'] = $this->load->view('MTU_search_pending_task_by_sub_zone', $data, true);
    $this->load->view('home', $data);
    }
    
}

?>