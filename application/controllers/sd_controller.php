<?php
session_start();

class Sd_controller extends CI_Controller {

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
    public function assign_task() {

//            echo 'TEST'; 

        $data = array();
        $data['result'] = $this->ert_model->sd_assign_task_page_category();
        $data['maincontent'] = $this->load->view('sd_assin_task', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    
      public function Check_tki_id(){

       $tki_id=$this->input->post('tki_id');  
//       $action_type=$this->input->post('action_type'); 
       $result = $this->ert_model->Check_Check_tki_model($tki_id);
       echo json_encode($result);
    }

    public function save_task_info_funcation() {

        $id = $this->session->userdata('id');
//...................................................................................           
        $tdata = array();
        $tdata['create_date'] = date("Y-m-d");
        $tdata['create_id'] = $id;
        $this->ert_model->save_ticket_info_model($tdata);

        $ticket_data = array();
        $ticket_data['result_ticket_id'] = $this->ert_model->find_ticket_Id($id);
// ....................................................................................

        $data = array();
        $data['create_id'] = $id;
        $data['ticket_no'] = $ticket_data['result_ticket_id']->ticket_id;
        $data['Client_id'] = $this->input->post('Client_id');
        $data['Client_name'] = $this->input->post('Client_Name');
        $data['Client_Category'] = $this->input->post('Client_Category');
        
        $tki_id = $this->input->post('tki_id');
        $New_tki_id= str_replace("_"," ",$tki_id);
        $data['tki_id'] = $New_tki_id;
        
        $data['Source'] = $this->input->post('Source');
        $data['type_task'] = $this->input->post('type_task');
        $data['assign_by'] = $this->input->post('assign_by');
        $data['Engineer_Name'] = $this->input->post('Engineer_Name');

        $data['Engineer_ID'] = $this->input->post('Engineer_ID');


        $Date = $this->input->post('s_date');
        $new_start_date = date("Y-m-d h:i:s", strtotime($Date));
        $data['s_date'] = $new_start_date;


        $data['Support_Type'] = $this->input->post('Support_Type');

        $Date1 = $this->input->post('e_date');
        $new_end_date = date("Y-m-d h:i:s", strtotime($Date1));
        $data['e_date'] = $new_end_date;

        $data['Status'] = $this->input->post('Status');
        $Status = $this->input->post('Status');
        if ($Status == 'Completed' || $Status == 'Canceled') {
            $data['task_Status'] = 1;
        }
//            $data['comments']=$this->input->post('comments');

        $this->ert_model->sd_save_task_info_model($data);

// sss                   
//            echo '<pre>';
//            print_r($result);
//            echo '</pre>';       
        $eng_task_action = array();
        $eng_task_action['ticket_no'] = $ticket_data['result_ticket_id']->ticket_id;
        $eng_task_action['tki_id'] =$New_tki_id;
       
        $Date = $this->input->post('action_time');
        $new_start_date = date("Y-m-d h:i:s", strtotime($Date));
        $eng_task_action['action_time'] = $new_start_date;
        
        
        $eng_task_action['Engineer_Name'] = $this->input->post('Engineer_Name');
        $eng_task_action['Engineer_ID'] = $this->input->post('Engineer_ID');
        $eng_task_action['action_type'] = $this->input->post('action_type');
        $eng_task_action['comments'] = $this->input->post('comments');
        $this->ert_model->sd_save_engineer_action_model($eng_task_action);
//            $sdata=array();
//            $sdata['message']='Save Task successfully';
//            $this->session->set_userdata($sdata);
//        redirect("index.php/ert_controller/ert_assin_task");
    }

    public function pick_engineer_id() {

        $Engineer_Name = $this->input->post('Engineer_Name');
        $result = $this->registration_model->pick_Engineer_ID_model($Engineer_Name);
        echo json_encode($result);
    }

    public function sd_pending_task() {

        $data = array();
//      .......................  pagination  ...................................................................  

        $config["base_url"] = base_url() . "index.php/sd_controller/sd_pending_task/";
        $nmuber = $this->ert_model->sd_pending_list_record_count();
        $i = 0;
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
                sd_Pagination_pending_model($config["per_page"], $page);

        $data["links"] = $this->pagination->create_links();


//      ...............................................................................................
//        $data['pending_task_result'] = $this->ert_model->wi_pick_pending_task();


        $data['maincontent'] = $this->load->view('sd_pending_task', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }

    public function sd_done_task() {

        $data = array();
//      .......................  pagination  ...................................................................  

        $config["base_url"] = base_url() . "index.php/sd_controller/sd_done_task/";
        $nmuber = $this->ert_model->sd_done_list_record_count();
        $i = 0;
        foreach ($nmuber as $value) {
            $i++;
        }
//        echo 'i......'.$i;


        $config["total_rows"] = $i;
        $config["per_page"] = 50;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["done_task_result"] = $this->ert_model->
                sd_Pagination_done_model($config["per_page"], $page);

        $data["links"] = $this->pagination->create_links();


//      ............................................................................................... 
//        $data['done_task_result'] = $this->ert_model->wi_pick_done_task();

        $data['maincontent'] = $this->load->view('sd_done_task', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }

    public function sd_followup_task_from($ticket_no) {

        $data = array();
//        $data['pick_comments'] = $this->ert_model->ERT_view_comments_model($p_key);      
        $data['result'] = $this->ert_model->sd_followup_page_category();

//         $data['result'] = $this->ert_model->sd_assign_task_page_category();
//        echo '<pre>';
//        print_r($data['result']);

        $data['pending_task_result'] = $this->ert_model->sd_pick_pending_single_task($ticket_no);
        $data['eng_task_result'] = $this->ert_model->sd_pick_eng_task($ticket_no);
        $data['maincontent'] = $this->load->view('sd_follow_up', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    

//   public function sd_review($p_key){
//     
//        $data = array();
////        $data['pick_comments'] = $this->ert_model->ERT_view_comments_model($p_key);      
//        $data['result'] = $this->ert_model->sd_followup_page_category();   
//        
//        $data['pending_task_result'] = $this->ert_model->sd_pick_pending_single_task($p_key); 
//        
//        $data['maincontent'] = $this->load->view('sd_review', $data, true);
////        $data['title'] = 'View Course';
//        $this->load->view('home', $data);
//    }

    public function sd_update_task() {

        $data = array();
        $ticket_no = $this->input->post('ticket_no');

        $Date = $this->input->post('cs_date');
        $end_date = date("Y-m-d H:i:s", strtotime($Date));
        $data['e_date'] = $end_date;
        $data['Status'] = $this->input->post('Status');
        $Status = $this->input->post('Status');

        if ($Status == 'Completed' || $Status == 'Canceled') {
            $data['task_Status'] = 1;
        }


        $this->ert_model->sd_update_task_model($ticket_no, $data);

///////////////////////////////////////////////////////////
        $eng_task_action = array();
        $eng_task_action['ticket_no'] = $this->input->post('ticket_no');
        $eng_task_action['tki_id'] = $this->input->post('tki_id');
        $eng_task_action['Engineer_Name'] = $this->input->post('Engineer_Name');
        $eng_task_action['Engineer_ID'] = $this->input->post('Engineer_ID');
        $eng_task_action['action_type'] = $this->input->post('action_type');
        $eng_task_action['comments'] = $this->input->post('comments');
        $this->ert_model->sd_save_engineer_action_model($eng_task_action);

//////////////////////////////////////////////////////////        

        redirect("index.php/welcome/Dashboard_funcation");
    }

       public function sd_edit_info() {

        $data = array();
        $ticket_no = $this->input->post('p_key');

        $data['tki_id'] = $this->input->post('tki_id');
        $data['Source'] = $this->input->post('Source');
        $data['type_task'] = $this->input->post('type_task');
        $data['Client_id'] = $this->input->post('Client_id');
        $data['Client_Name'] = $this->input->post('Client_Name');
        $data['Client_Category'] = $this->input->post('Client_Category');
        $data['assign_by'] = $this->input->post('assign_by');
        $Date = $this->input->post('s_date');
        $s_date = date("Y-m-d H:i:s", strtotime($Date));
        $data['s_date'] = $s_date;
        
        
        $this->ert_model->sd_edit_info_task_model($ticket_no, $data);  

        redirect("index.php/welcome/Dashboard_funcation");
    }
    public function sd_done_task_by_id() {
        $data = array();
/////////////////////////////////////////////////////////////////////////////////////////////////
        $Date = $this->input->post('date_from');
        $date_from = date("Y-m-d 00:00:00", strtotime($Date));
        $date1 = $date_from;


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

        $_SESSION["sd_Engineer_ID"]=$Engineer_ID;
        $_SESSION["sd_date1"]=$date_array['date1'];
        $_SESSION["sd_date2"]=$date_array['date2'];
        
        $data['done_list_result'] = $this->ert_model->sd_done_list_by_Engineer_ID_model($Engineer_ID, $date_array);

        $data['done_task_summery'] = $this->ert_model->sd_done_by_Eng_ID_summery_model($Engineer_ID,$date_array);  
//    echo '<pre>';
////    echo 'E ID :'.$Engineer_ID;
//    print_r($data['pending_list_result']);
        //      ...............................................................................................  

        $data['maincontent'] = $this->load->view('sd_done_task_by_id', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }

    public function sd_done_task_by_type_task() {
        $data = array();
        $data['result'] = $this->ert_model->sd_type_task_category();
        $Date = $this->input->post('date_from');
        $date_from = date("Y-m-d 00:00:00", strtotime($Date));
        $date1 = $date_from;
        $Date1 = $this->input->post('date_to');
        $date_to = date("Y-m-d 23:59:59", strtotime($Date1));
        $date2 = $date_to;
        $date_array = array(
            'date1' => $date1,
            'date2' => $date2
        ); 
        $type_task = $this->input->post('type_task');
        $data['done_list_result'] = $this->ert_model->sd_done_list_by_type_task_model($type_task, $date_array);
        $data['maincontent'] = $this->load->view('sd_done_task_by_type_task', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }

    public function sd_done_task_by_client_id() {
        $data = array();
        $Date = $this->input->post('date_from');
        $date_from = date("Y-m-d 00:00:00", strtotime($Date));
        $date1 = $date_from;
        $Date1 = $this->input->post('date_to');
        $date_to = date("Y-m-d 23:59:59", strtotime($Date1));
        $date2 = $date_to;
        $date_array = array(
            'date1' => $date1,
            'date2' => $date2
        );
        $Client_id = $this->input->post('Client_id');
        $data['done_list_result'] = $this->ert_model->sd_done_list_by_Client_id_model($Client_id, $date_array);
        $data['maincontent'] = $this->load->view('sd_done_task_by_client_id', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    
   public function sd_pending_task_by_type_task() {
        $data = array();
        $data['result'] = $this->ert_model->sd_type_task_category();
        $Date = $this->input->post('date_from');
        $date_from = date("Y-m-d 00:00:00", strtotime($Date));
        $date1 = $date_from;
        $Date1 = $this->input->post('date_to');
        $date_to = date("Y-m-d 23:59:59", strtotime($Date1));
        $date2 = $date_to;
        $date_array = array(
            'date1' => $date1,
            'date2' => $date2
        ); 
        $type_task = $this->input->post('type_task');
        $data['pending_list_result'] = $this->ert_model->sd_pending_list_by_type_task_model($type_task, $date_array);
        $data['maincontent'] = $this->load->view('sd_pend_task_by_type_task', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    } 
     public function DB_SD_search_pending_task($search){
     
        $data=array();       
        $data['result'] = $this->ert_model->sd_type_task_category();

        $data['pending_list_result']  = $this->ert_model->sd_db_pending_list_by_type_task($search);
//            if ($result != false) {
//        $data['pending_list_result'] = $result;
        $data['maincontent']=  $this->load->view('sd_pend_task_by_type_task',$data,true);
        $this->load->view('home',$data);
        
    }
    
      public function sd_pending_task_by_tki() {
        $data = array();
        $data['result'] = $this->ert_model->sd_type_task_category();
        $Date = $this->input->post('date_from');
        $date_from = date("Y-m-d 00:00:00", strtotime($Date));
        $date1 = $date_from;
        $Date1 = $this->input->post('date_to');
        $date_to = date("Y-m-d 23:59:59", strtotime($Date1));
        $date2 = $date_to;
        $date_array = array(
            'date1' => $date1,
            'date2' => $date2
        ); 
        $tki_id = $this->input->post('tki_id');
        $data['pending_list_result'] = $this->ert_model->sd_pending_list_by_tki_id_model($tki_id, $date_array);
        $data['maincontent'] = $this->load->view('sd_pend_task_by_tik', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    
      public function sd_edit_tsk($ticket_no) {

        $data = array();
//        $data['pick_comments'] = $this->ert_model->ERT_view_comments_model($p_key);    
          
//        $data['result'] = $this->ert_model->sd_followup_page_category();

        $data['result'] = $this->ert_model->sd_edit_task_page_category();

        $data['pending_task_result'] = $this->ert_model->sd_pick_edit_task_info($ticket_no);
//        echo '<pre>';
//        print_r($data['pending_task_result'] );
        
        
        
        $data['eng_task_result'] = $this->ert_model->sd_pick_eng_task($ticket_no);
        
        $data['maincontent'] = $this->load->view('sd_edit_task', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    public function sd_pending_task_by_e_id(){
      
        
        $data = array();
//        $data['result'] = $this->ert_model->sd_type_task_category();
        $Date = $this->input->post('date_from');
        $date_from = date("Y-m-d 00:00:00", strtotime($Date));
        $date1 = $date_from;
        $Date1 = $this->input->post('date_to');
        $date_to = date("Y-m-d 23:59:59", strtotime($Date1));
        $date2 = $date_to;
        $date_array = array(
            'date1' => $date1,
            'date2' => $date2
        ); 
        $Engineer_ID = $this->input->post('Engineer_ID');
        $data['pending_list_result'] = $this->ert_model->sd_pending_list_by_eid_model($Engineer_ID, $date_array);
        $data['maincontent'] = $this->load->view('sd_pending_task_by_id', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    
    
     public function export_sd_report(){
   
//      load excel library
 $this->load->library('excel');
        
/////////////////////////////////////////////////////////////////////////////////////////////////
 $date1=$_SESSION["sd_date1"];
 $date2=$_SESSION["sd_date2"];
 $Engineer_ID=$_SESSION["sd_Engineer_ID"]; 

$date_array = array(
    'date1' => $date1,
    'date2' => $date2
);

 $empInfo = $this->ert_model->esd_report_by_date($date_array,$Engineer_ID);
 
// print_r($empInfo);
// exit();

///////////////////////////////////////////////////////////////////////////////////////////////    

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Employee ID (Name)');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Task Type');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Action Type');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Start Time');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'END Time');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Client ID');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Client Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Client Catagory');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'TKI ID');
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Comments');
        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {
                 
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['Engineer_Name'].'('.$element['Engineer_ID'].')'); 
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['action_time']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['type_task']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['action_type']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['s_date']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['e_date']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element['Client_id']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element['Client_name']);
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element['Client_Category']);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element['tki_id']);
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $element['comments']);
            
            $rowCount++;
//            }
        }
// create file name   
        $date=date("Y-m-d h:i:sa");
        $fileName= 'SDD_report.xls'; //.time()
         header("Content-Type: application/vnd.ms-excel");
       
      
       $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
       $objWriter->save('./css/'.$fileName);
// download file
 

        $this->load->helper('download');         
        ob_clean();      
        $data = file_get_contents(base_url().'css/'.$fileName);      
        force_download($fileName, $data);
        
        unset($_SESSION['sd_date1']);
        unset($_SESSION['sd_date2']);
        unset($_SESSION['sd_Engineer_ID']);
        echo json_encode("DONE SUCCESSFULLY");
       
    }

}

?>