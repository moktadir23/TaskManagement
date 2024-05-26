<?php

class Hd_controller extends CI_Controller {
    

    public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->library("pagination");
        $this->load->model('hd_model');
        $this->load->model('mq_model');
        $this->load->library('table');
        $this->load->library('session');

//        $this->load->database();
        $this->load->library('Excel');

        $user_id = $this->session->userdata('user_id');
        $id = $this->session->userdata('id');

        if ($user_id == NULL) {
            redirect('index.php/admin', 'refresh');
        }   
    }

    public function hd_assin_task() {
        $data = array();
        $data['result'] = $this->hd_model->hd_pick_kra();
        $data['maincontent'] = $this->load->view('hd_assin_task', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }

    public function Check_kra() {
        $Engineer_ID = $this->input->post('Engineer_ID');
        $month = $this->input->post('month');
        $year = $this->input->post('year');
        $result = $this->hd_model->Check_kra_model($Engineer_ID, $month, $year);
        echo json_encode($result);
    }

    public function hd_Rating() {
        
        $data = array();
        $data['KRA_result'] = $this->hd_model->KRA_result_model();
        $data['KRA_result_19_20'] = $this->hd_model->KRA_result_model_19_20();
        $data['maincontent'] = $this->load->view('hd_Rating_list', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }

    public function Show_KRA($Engineer_ID, $month) {
//        echo $Engineer_ID . '...' . $month;

        $data = array();
//        $data['result'] = $this->hd_model->hd_pick_kra(); 
        $data['single_KRA_result'] = $this->hd_model->single_KRA_result_model($Engineer_ID, $month);
//        echo '<pre>';
//        print_r($data['single_KRA_result']);

        $data['maincontent'] = $this->load->view('single_KRA', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }

    public function save_kra_info_funcation() {

        $id = $this->session->userdata('id');
        $data = array();
        $data['create_id'] = $id;
        $data['Engineer_Name'] = $this->input->post('Engineer_Name');
        $data['Engineer_ID'] = $this->input->post('Engineer_ID');
        $data['Zone'] = $this->input->post('Zone');
        $data['month'] = $this->input->post('month');
        $data['year'] = $this->input->post('year');
        
        $data['Telephone_Etiquette'] = $this->input->post('Telephone_Etiquette');
        $data['Accurecy_of_Complain'] = $this->input->post('Accurecy_of_Complain');
        $data['Inbound_service_achieved'] = $this->input->post('Inbound_service_achieved');
        $data['Login_Hour'] = $this->input->post('Login_Hour');
        $data['Call'] = $this->input->post('Call');
        $data['Idle_Time'] = $this->input->post('Idle_Time');
        $data['Average_Call_After_Time'] = $this->input->post('Average_Call_After_Time');
        $data['Wrap_up_time'] = $this->input->post('Wrap_up_time');
        $data['First_Call_Resolution'] = $this->input->post('First_Call_Resolution');
        $data['Schedule_Adherence'] = $this->input->post('Schedule_Adherence');
        $data['Rating_Point'] = $this->input->post('Rating_Point');

        $this->hd_model->save_kra_info_model($data);

        $sdata = array();
        $sdata['message'] = 'Save Task successfully';
        $this->session->set_userdata($sdata);
        redirect("index.php/welcome/assin_task_funcation");
    }
    
     public function update_kra_info_funcation() {

        $id = $this->session->userdata('id');
        $data = array();
        $data['create_id'] = $id;
        $pkey = $this->input->post('id');
//        $data['Engineer_Name'] = $this->input->post('Engineer_Name');
//        $data['Engineer_ID'] = $this->input->post('Engineer_ID');
//        $data['Zone'] = $this->input->post('Zone');
//        $data['month'] = $this->input->post('month');

        $data['Telephone_Etiquette'] = $this->input->post('Telephone_Etiquette');
        $data['Accurecy_of_Complain'] = $this->input->post('Accurecy_of_Complain');
        $data['Inbound_service_achieved'] = $this->input->post('Inbound_service_achieved');
        $data['Login_Hour'] = $this->input->post('Login_Hour');
        $data['Call'] = $this->input->post('Call');
        $data['Idle_Time'] = $this->input->post('Idle_Time');
        $data['Average_Call_After_Time'] = $this->input->post('Average_Call_After_Time');
        $data['Wrap_up_time'] = $this->input->post('Wrap_up_time');
        $data['First_Call_Resolution'] = $this->input->post('First_Call_Resolution');
        $data['Schedule_Adherence'] = $this->input->post('Schedule_Adherence');
        $data['Rating_Point'] = $this->input->post('Rating_Point');

        $this->hd_model->update_kra_info_model($pkey,$data);

//        $sdata = array();
//        $sdata['message'] = 'Save Task successfully';
//        $this->session->set_userdata($sdata);
//        redirect("index.php/hd_controller/hd_Rating");
    }
    
    
    
    

    public function Agent_Performance_Report() {
        $data = array();

//        $data['result'] = $this->hd_model->assign_task_page_category();
//        $data['result'] = $this->hd_model->HD_pick_info();
//          echo '<pre>';
//          print_r($data['result'])  ;
//           echo '</pre>';
// ............................................................................................         
//              $data = array();
//      .......................  pagination  ...................................................................  
//        $config["base_url"] = base_url() . "index.php/hd_controller/Agent_Performance_Report/";
//        
//        $done_nmuber_result = $this->hd_model->hd_list_record_count();
//        $hd_done=0;
//        foreach ($done_nmuber_result as $doen_task_value) {
//          $hd_done++;  
//        }
////        echo 'i......'.$i;
//        $config["total_rows"] = $hd_done;
//        $config["per_page"] = 50;
//        $config["uri_segment"] = 3;
//
//        $this->pagination->initialize($config);
//        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
//        $data["done_list_result"] = $this->hd_model->
//                hd_Done_task_Pagination_select_model($config["per_page"], $page);
//        $data["CS_done_links"] = $this->pagination->create_links(); 
//............................................................................................          
    $data['result'] = $this->hd_model->hd_pick_zone();
    $id = $this->session->userdata('id');
    $user_type = $this->session->userdata('u_type');
        if($user_type=='Admin' || $user_type=='s_user' || $user_type=='a_user'){
          
            $Engineer_ID = $this->input->post('Engineer_ID');
        }else{
             $Engineer_ID= $id;
        }
        

//$Engineer_ID = 'L3T1183';  

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
//........................................................................................        
//        Agent_Performance_Report



        if ($Engineer_ID != null) {

            $data['agent_performance_list'] = $this->hd_model->pick_agent_performance_list($Engineer_ID, $date_array);
            $data['agent_time'] = $this->hd_model->pick_agent_log_time($Engineer_ID, $date_array);
        } else {
            $data['agent_performance_list'] = null;
            $data['agent_time'] = null;
        }

//         echo '<pre>';
//        print_r($data['agent_performance_list']);
//        echo '<pre>';



        $data['maincontent'] = $this->load->view('hd_agent_performance_report', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }

    public function Drop_Call_Report() {
        $data = array();
//.........................................................................................

        $Date = $this->input->post('date_from');
        $date_from = date("Y-m-d H:i:s", strtotime($Date));
        $date1 = $date_from;


        $Date1 = $this->input->post('date_to');
        $date_to = date("Y-m-d H:i:s", strtotime($Date1));
        $date2 = $date_to;

        $date_array = array(
            'date1' => $date1,
            'date2' => $date2
        );
//........................................................................................        

        $data['drop_call_list'] = $this->hd_model->pick_drop_call_list($date_array);

//        echo '<pre>';
//        print_r($data['drop_call_list']);
//        echo '</pre>';

        $data['maincontent'] = $this->load->view('hd_drop_call_report', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }

    public function Problem_Category_Report() {
        $data = array();

//.........................................................................................

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
//........................................................................................        

        $data['call_list'] = $this->hd_model->pick_call_status_list($date_array);
        $data['problem_group'] = $this->hd_model->pick_problem_group($date_array);




        $data['maincontent'] = $this->load->view('hd_Problem_Category_Report', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }

    public function Call_Center_Performance_Report() {
        $data = array();
//        $data['result'] = $this->registration_model->assign_task_page_category();
//.........................................................................................

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
//........................................................................................        

        $data['call_center_Performance'] = $this->hd_model->pick_call_center_Performance($date_array);

        $data['maincontent'] = $this->load->view('hd_Call_Center_Performance_Report', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////   
// ......................................................................................................   
    ///////////////////////////////////////////////////////////////////////////////////////////////////////
    public function NMC_Outbound() {
        $data = array();
//        $data['result'] = $this->hd_model->hd_pick_zone();
        $data['res_type'] = $this->hd_model->hd_nmc_type();
        $data['maincontent'] = $this->load->view('hd_NMC_Outbound_from', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }

    public function Send_Mail() {
        $data = array();
        $data['result'] = $this->hd_model->hd_pick_kra();
        $data['maincontent'] = $this->load->view('hd_Send_Mail_Report_from', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }

    public function ACD_Agent() {
        $data = array();
        $data['result'] = $this->hd_model->hd_pick_zone();
        $data['maincontent'] = $this->load->view('hd_ACD_Agent_Status_from', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }

    public function PON_SMS() {
        $data = array();
        $data['result'] = $this->hd_model->hd_pick_zone();
        $data['maincontent'] = $this->load->view('hd_PON_info_from', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }

    public function Bulk() {
        $data = array();
        $data['result'] = $this->hd_model->hd_pick_zone();
        $data['maincontent'] = $this->load->view('hd_Bulk SMS_from', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }

    public function Traceless() {
        $data = array();
        $data['result'] = $this->hd_model->hd_pick_zone();
        $data['result_traceless'] = $this->hd_model->hd_pick_traceless_category();
        $data['maincontent'] = $this->load->view('hd_Traceless_from', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }

    public function Selfcare() {
        $data = array();
        $data['result'] = $this->hd_model->hd_pick_zone();
        $data['problem_category'] = $this->hd_model->hd_problem_category();
        $data['maincontent'] = $this->load->view('hd_Selfcare_from', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }

    public function save_selfcare_info() {

        $id = $this->session->userdata('id');
        $data = array();
        $data['create_id'] = $id;
        $Date1 = $this->input->post('s_date');
        $date_to = date("Y-m-d 23:59:59", strtotime($Date1));
        $data['date_time'] = $date_to;
        $data['Category'] = $this->input->post('Category');
        $data['tki_id'] = $this->input->post('tki_id');
        $data['Zone'] = $this->input->post('Zone');
        $data['Client_id'] = $this->input->post('Client_id');
        $data['Engineer_Name'] = $this->input->post('Engineer_Name');
        $data['Engineer_ID'] = $this->input->post('Engineer_ID');
        $data['age'] = $this->input->post('age');
        $data['Remarks'] = $this->input->post('Remarks');


        $this->hd_model->save_s_care($data);

        $sdata = array();
        $sdata['message'] = 'Save Task successfully';
        $this->session->set_userdata($sdata);
        redirect("index.php/welcome/assin_task_funcation");
    }

    public function save_traceless_info() {

        $id = $this->session->userdata('id');
        $data = array();
        $data['Create_id'] = $id;
        $Date1 = $this->input->post('s_date');
        $date_to = date("Y-m-d 23:59:59", strtotime($Date1));
        $data['sms_time'] = $date_to;
        $data['soi'] = $this->input->post('soi');
        $data['mobile'] = $this->input->post('C_mobile');
        $data['Zone'] = $this->input->post('Zone');
        $data['Client_id'] = $this->input->post('client_id');
        $data['Engineer_Name'] = $this->input->post('Engineer_Name');
        $data['Engineer_ID'] = $this->input->post('Engineer_ID');
        $data['Remarks'] = $this->input->post('remarks');


        $this->hd_model->save_traceless($data);
    }

    public function pick_olt() {

        $bts = $this->input->post('bts');
        $result = $this->hd_model->pick_olt_m($bts);
        echo json_encode($result);
    }

    public function save_olt_info() {

        $id = $this->session->userdata('id');
        $data = array();
        $data['Create_id'] = $id;
        $Date1 = $this->input->post('s_date');
        $date_to = date("Y-m-d 23:59:59", strtotime($Date1));
        $data['date_time'] = $date_to;
//        $data['Zone'] = $this->input->post('Zone');
        $data['bts'] = $this->input->post('bts');
        $data['olt'] = $this->input->post('olt');
        $data['pon_port'] = $this->input->post('pon_port');
//         $data['pon_port'] = '2/1';
        $data['mis_n'] = $this->input->post('mis_n');
        $data['mq_n'] = $this->input->post('mq_n');
        $data['total'] = $this->input->post('total');
        $data['Engineer_Name'] = $this->input->post('Engineer_Name');
        $data['Engineer_ID'] = $this->input->post('Engineer_ID');
        $data['Remarks'] = $this->input->post('remarks');


        $this->hd_model->save_olt_m($data);
    }

    public function pick_user_log() {

        $user = $this->input->post('user');
        $result = $this->hd_model->pick_user_log_m($user);
        echo json_encode($result);
    }

    public function save_agent_d_p() {
        $id = $this->session->userdata('id');
        $data = array();
        $data['Create_id'] = $id;

        $Date1 = $this->input->post('s_date');
        $date_to = date("Y-m-d H:i:s", strtotime($Date1));
        $data['login'] = $date_to;

        $Date2 = $this->input->post('e_date');
        $date_to2 = date("Y-m-d H:i:s", strtotime($Date2));
        $data['logout'] = $date_to2;

        $data['Zone'] = $this->input->post('Zone');
        $data['Engineer_Name'] = $this->input->post('Engineer_Name');
        $data['Engineer_ID'] = $this->input->post('Engineer_ID');
        $data['sip'] = $this->input->post('sip');
        $data['t_call'] = $this->input->post('t_call');
        $data['mis_tki'] = $this->input->post('mis_tki');
        $data['mq_tki'] = $this->input->post('mq_tki');
        $data['mail'] = $this->input->post('mail');
        $data['sms'] = $this->input->post('sms');
        $data['selfcare'] = $this->input->post('selfcare');
        $data['facebook'] = $this->input->post('facebook');
        $data['b_query'] = $this->input->post('b_query');
        $data['solve'] = $this->input->post('solve');
        $data['remark'] = $this->input->post('remark');

        $this->hd_model->save_agent_dp_m($data);
    }

    public function save_nmc() {

        $id = $this->session->userdata('id');
        $data = array();
        $data['Create_id'] = $id;

        $Date1 = $this->input->post('s_date');
        $date_to = date("Y-m-d H:i:s", strtotime($Date1));
        $data['down_time'] = $date_to;

        $Date2 = $this->input->post('e_date');
        $date_to2 = date("Y-m-d H:i:s", strtotime($Date2));
        $data['sms_down_time'] = $date_to2;

        $data['Zone'] = $this->input->post('Zone');
        $data['Engineer_Name'] = $this->input->post('Engineer_Name');
        $data['Engineer_ID'] = $this->input->post('Engineer_ID');
        $data['n_type'] = $this->input->post('n_type');
        $data['node_client'] = $this->input->post('node_client');
        $data['tki'] = $this->input->post('tki');
        $data['fw_team'] = $this->input->post('fw_team');
        $data['status'] = 0;
        $data['remark'] = $this->input->post('remark');

        $this->hd_model->save_hd_nmc_m($data);
    }

    public function pending_NMC_Outbound() {

        $data = array();
//        $data['result'] = $this->hd_model->nmc_assign_task_page_category();
        $data['pending_task_result'] = $this->hd_model->hd_pending_nmc_info();
        $data['maincontent'] = $this->load->view('hd_pending _nmctask', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }

    public function hd_nmc_done($id) {
        $data = array();
        $data['pick_data'] = $this->hd_model->hd_pick_single_info($id);
        $data['maincontent'] = $this->load->view('hd_done_nmctask', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }

    public function update_nmc_task() {

        $e_id = $this->session->userdata('id');

        $tki = $this->input->post('tki');

//        $tki ='tki1';

        $data['cls_id'] = $e_id;

        $Date = $this->input->post('s_date');
        $new_start_date = date("Y-m-d H:i:s", strtotime($Date));
        $data['up_time'] = $new_start_date;

        $Date1 = $this->input->post('e_date');
        $sms_date = date("Y-m-d H:i:s", strtotime($Date1));
        $data['sms_up_time'] = $sms_date;

        $data['total_down_time'] = $this->input->post('Down_Time');
        $remark1 = $this->input->post('remark1');
        $remark2 = $this->input->post('remark2');
        $data['remark'] = 'Down remark: '.$remark1.'. Up remark: '.$remark2;
        $data['status'] = 1;

        $this->hd_model->update_hd_nmc($tki, $data);

        redirect('index.php/welcome/Dashboard_funcation');
    }

    public function hd_nmc_outbound_report() {

        $data = array();
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
            $data['result'] = $this->hd_model->nmc_outbound_report_by_date($date_array);
        } else {
            $data['result'] = null;
        }

        $data['maincontent'] = $this->load->view('hd_nmc_outbound_rpt', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    
    public function hd_selfcare_report(){
        $data = array();
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
            $data['result'] = $this->hd_model->scare_report_by_date($date_array);
        } else {
            $data['result'] = null;
        }

        $data['maincontent'] = $this->load->view('hd_scare_rpt', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data); 
    }
    
    public function hd_tsms_report(){
        
       $data = array();
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
            $data['result'] = $this->hd_model->tsms_report_by_date($date_array);
        } else {
            $data['result'] = null;
        }

        $data['maincontent'] = $this->load->view('hd_tsms_rpt', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);   
    }
    public function hd_pon_report(){
       
          $data = array();
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
            $data['result'] = $this->hd_model->pon_report_by_date($date_array);
        } else {
            $data['result'] = null;
        }

        $data['maincontent'] = $this->load->view('hd_pon_rpt', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);   
    }
    public function hd_agent_report(){
       
          $data = array();
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
            $data['result'] = $this->hd_model->acd_agent_report_by_date($date_array);
            
           
        } else {
            $data['result'] = null;
        }

        $data['maincontent'] = $this->load->view('hd_agent_rpt', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);   
    }
    
    
    public function hd_ptask_by_date(){
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
           $data['pending_task_result'] = $this->hd_model->hd_p_list_by_date($date_array);
    //  ..............................................................................  
           $data['maincontent'] = $this->load->view('hd_p_task_by_date', $data, true);
    //        $data['title'] = 'View Course';
            $this->load->view('home', $data);

    }
    public function save_bulk_info(){

        $data = array();

        $Date1 = $this->input->post('s_date');
        $newdate = date("Y-m-d H:i:s", strtotime($Date1));
        $data['sms_time'] = $newdate;
        $data['Engineer_Name'] = $this->input->post('Engineer_Name');
        $data['Engineer_ID'] = $this->input->post('Engineer_ID');
        $data['comments'] = $this->input->post('comments');
        
//        $this->hd_model->save_hd_bulk($data);  
        
//        ......................... Import Excel data .....................................................
 $file=$_FILES["upload"]["name"];
 
 echo $file.'<br>';
 $data_import=array();
        
$file = $_FILES['upload']['tmp_name'];
//load the excel library
$this->load->library('excel');
//read file from path
$objPHPExcel = PHPExcel_IOFactory::load($file);
//get only the Cell Collection
$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
//extract to a PHP readable array format
foreach ($cell_collection as $cell) {
 $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
 $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
 $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
 //header will/should be in row 1 only. 
 if ($row == 1) {
 $header[$row][$column] = $data_value;
 } else {
 $arr_data[$row][$column] = $data_value;
// $data_import['contact_no']=$data_value;
 array_push($data_import,$data_value);
 }
// echo $data_value.'<br>';
 
}

//echo '<pre>';
//print_r($data_import);

 $this->hd_model->importData($data_import,$data); 


//        ................................................................................
//        $data['result'] = $this->hd_model->hd_pick_zone();
        $data['maincontent'] = $this->load->view('hd_Bulk SMS_from', $data, true);
        $this->load->view('home', $data);
    }
    
      public function save_email_info(){

        $data = array();

        $Date1 = $this->input->post('s_date');
        $newdate = date("Y-m-d H:i:s", strtotime($Date1));
        $data['sms_time'] = $newdate;
        $data['Engineer_Name'] = $this->input->post('Engineer_Name');
        $data['Engineer_ID'] = $this->input->post('Engineer_ID');
        $data['comments'] = $this->input->post('comments');
//        ......................... Import Excel data .....................................................
$file=$_FILES["upload"]["name"];
$email_data_import=array();      
$file = $_FILES['upload']['tmp_name'];
//load the excel library
$this->load->library('excel');
//read file from path
$objPHPExcel = PHPExcel_IOFactory::load($file);
$email_data=array();
//$file = $_FILES['upload']['tmp_name'];
if(isset($_FILES["upload"]["name"]))
{
$path = $_FILES["upload"]["tmp_name"];
$object = PHPExcel_IOFactory::load($path);
foreach($object->getWorksheetIterator() as $worksheet)
{
$highestRow = $worksheet->getHighestRow();
$highestColumn = $worksheet->getHighestColumn();
for($row=2; $row<=$highestRow; $row++)
{
//.....................................EMAIL Time..............................................................    
echo $email_time = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
echo '<br>';
$find   = '.';
$pos = strpos($email_time, $find);
if ($pos === false) {
    
//    echo "The string '$findme' was not found in the string '$mystring'";    
    $date_time=(explode(" ",$email_time));
    $date=$date_time[0];
    $date=str_replace("/","-",$date);
    $date = date('Y-m-d',strtotime($date));
    $time=$date_time[1];
    $c=$date_time[2];
    $time_12_hours=$time.' '.$c;
    $time_in_24_hour_format  = date("H:i:s", strtotime($time_12_hours));
    echo 'EMAIL 12:..........'.$new_email_date=$date.' '.$time_in_24_hour_format;
} else {  
    $date_time=(explode(".",$email_time));
    $date=$date_time[0];
    $time=$date_time[1];
    $secondsInDay = 86400;
    # Time as a float must greater or equal to zero and less or equal to one.
    $dayAsFloat='0.'.$time;
    # Determine the number of seconds
    $totalSeconds = intval($secondsInDay * $dayAsFloat);
    # Calculate number of seconds
    $seconds = $totalSeconds % 60;
    $totalSeconds = $totalSeconds / 60;
    $minuntes = $totalSeconds % 60;
    $totalSeconds = $totalSeconds / 60;
    $hours = $totalSeconds % 60;
    $timeString = sprintf("%'2d:%'2d:%'2d", $hours, $minuntes, $seconds);
    $date = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($date_time[0]));
    echo 'EMAIL 24: ..........'.$new_email_date=$date.' '.$timeString;
}
echo '<br>';
//.............................................................................................
$email_address = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
$subject = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
$client_name = $worksheet->getCellByColumnAndRow(3, $row)->getValue();




//.....................................TKI Time..............................................................    
echo $tki_time = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
$find   = '.';
$pos_1 = strpos($tki_time, $find);
if ($pos_1 === false) {
    $date_time_1=(explode(" ",$tki_time));
    $date_1=$date_time_1[0];
    $date_1=str_replace("/","-",$date_1);
    $date_1  = date("Y-m-d", strtotime($date_1));   
    $time_1=$date_time_1[1];
    $c_1=$date_time_1[2];
    $time_12_hours_1=$time_1.' '.$c_1;
    $time_in_24_hour_format_1  = date("H:i:s", strtotime($time_12_hours_1));
    echo 'TKI 12: ........'.$tki_time=$date_1.' '.$time_in_24_hour_format_1;
}else{
    $date_time1=(explode(".",$tki_time));
    $date1=$date_time1[0];
    $time1=$date_time1[1];
    $secondsInDay = 86400;
    $dayAsFloat1='0.'.$time1;
    $totalSeconds1 = intval($secondsInDay * $dayAsFloat1);
    $seconds1 = $totalSeconds1 % 60;
    $totalSeconds1 = $totalSeconds1 / 60;
    $minuntes1 = $totalSeconds1 % 60;
    $totalSeconds1 = $totalSeconds1 / 60;
    $hours1 = $totalSeconds1 % 60;
    $timeString1 = sprintf("%'2d:%'2d:%'2d", $hours1, $minuntes1, $seconds1);
    $date1 = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($date_time1[0]));
    echo 'TKI 24: ........'.$tki_time=$date1.' '.$timeString1;
}
//.............................................................................................





$tki_id = $worksheet->getCellByColumnAndRow(5, $row)->getValue();






//.....................................Replay Time..............................................................    
//echo '<br>';
echo $reply_time = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
if( $reply_time == 'N/A' || $reply_time == 'n/a' ){
    $reply_time=$reply_time;
}else{

    $find   = '.';
    $pos_2 = strpos($reply_time, $find);
    if ($pos_2 === false) {
        $date_time_2=(explode(" ",$reply_time));
        $date_2=$date_time_2[0];       
        $date_2=str_replace("/","-",$date_2);
        $date_2  = date("Y-m-d", strtotime($date_2));
        $time_2=$date_time_2[1];
        $c_2=$date_time_2[2];
        $time_12_hours_2=$time_2.' '.$c_2;
        $time_in_24_hour_format_2  = date("H:i:s", strtotime($time_12_hours_2));
         echo 'Replay 12: ..........'. $reply_time=$date_2.' '.$time_in_24_hour_format_2;
    }else{
        $date_time2=(explode(".",$reply_time));
        $date2=$date_time2[0];
        $time2=$date_time2[1];
        $secondsInDay = 86400;
        $dayAsFloat2='0.'.$time2;
        $totalSeconds2 = intval($secondsInDay * $dayAsFloat2);
        $seconds2 = $totalSeconds2 % 60;
        $totalSeconds2 = $totalSeconds2 / 60;
        $minuntes2 = $totalSeconds2 % 60;
        $totalSeconds2 = $totalSeconds2 / 60;
        $hours2 = $totalSeconds2 % 60;
        $timeString2 = sprintf("%'2d:%'2d:%'2d", $hours2, $minuntes2, $seconds2);
        $date2 = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($date_time2[0]));
        echo 'Replay 24: ..........'.$reply_time=$date2.' '.$timeString2;
    }
}
echo '<br>';
//...........................................................................................................







$reason = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
$remarks = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
$email_data[] = array(
'email_time'  => $new_email_date,
'email_address'   => $email_address,
'subject'    => $subject,
'client_name'  => $client_name,
'tki_time'   => $tki_time,
'tki_id'   => $tki_id,
'reply_time'   => $reply_time,
'reason'   => $reason,
'remarks'   => $remarks
);
}
}
//echo '<pre>';
//print_r($email_data);
} 
      $this->hd_model->import_Email_Data($email_data,$data); 
//        ................................................................................
//        $data['result'] = $this->hd_model->hd_pick_zone();
//        $data['maincontent'] = $this->load->view('hd_Send_Mail_Report_from', $data, true);
//        $this->load->view('home', $data);
      redirect("index.php/hd_controller/Send_Mail"); 
        
    }
       
    public function hd_bulk_report(){
        
       
       
        $data = array();
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
            $data['result'] = $this->hd_model->bulk_report_by_date($date_array);
        } else {
            $data['result'] = null;
        }

        $data['maincontent'] = $this->load->view('hd_bulk_rpt', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);    
    }
    
    public function fonoc_client_info(){
      
    $Client_ID=$this->input->post('Client_ID');
    $result=array();
    if (preg_match("/L3R/i", $Client_ID)) {
         $result['olt_info']  = $this->hd_model->pick_cilent_info_model($Client_ID);
    } else {       
        if((preg_match("/08.01.001/i", $Client_ID))){
          $Client_ID=str_replace("08.01.001.","",$Client_ID);  
        }    
        $New_Client_ID='CC-'.$Client_ID;
        $result['olt_info'] = $this->hd_model->pick_cilent_info_model($New_Client_ID);
    }
    $result['pre_fonoc_task_info']  = $this->hd_model->pre_fonoc_task_info_model($Client_ID);
    
    echo json_encode($result);        
    }

    public function client_info(){
        
       $Client_ID=$this->input->post('Client_ID');

if (preg_match("/L3R/i", $Client_ID)) {
     $result['olt_info']  = $this->hd_model->pick_cilent_info_model($Client_ID);
     $result['client_info']  = $this->hd_model->pick_mq_client_info($Client_ID);
//     $result['fonoc_task_info']  = $this->hd_model->pick_fonoc_task_info($Client_ID);
} else {
   
    $result=array();
    
    
    if((preg_match("/08.01.001/i", $Client_ID))){
      $Client_ID=str_replace("08.01.001.","",$Client_ID);  
    }
    
    $New_Client_ID='CC-'.$Client_ID;
    $result['olt_info'] = $this->hd_model->pick_cilent_info_model($New_Client_ID);
    
    $api = "31254";
    $pass = "WfaXq!2";
    $subs = $Client_ID;  
    
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
    
    $result_array=array();
    $result_array=(explode("\n",$response));
    
   $SubscriberID=$result_array[4];
   $SubscriberName=$result_array[5];
   $ContactPerson=$result_array[6];
   $AddressLine1=$result_array[7];
   $PhoneNo=$result_array[9];
   $Email=$result_array[10];
   $ParentArea=$result_array[11];
   $Area=$result_array[12];
   $District=$result_array[13];
   $SubscriberStatus=$result_array[14];
   $SubscriberCategory=$result_array[20];
   $PackageBW=$result_array[21];
   $Create_Date=$result_array[23];
   
   
   $result['client_info']=array("AddressLine1"=>$AddressLine1,"PackageBW"=>$PackageBW,"PhoneNo"=>$PhoneNo,"SubscriberStatus"=>$SubscriberStatus,"SubscriberID"=>$SubscriberID,"SubscriberName"=>$SubscriberName,"ContactPerson"=>$ContactPerson,"Email"=>$Email);
   
//   array_push($result_mis,$result);
//   echo '<pre>';
//   print_r($result);
//   print_r($result_mis);
//        echo $result['client_info']['AddressLine1'];
//        echo $olt_info->MAC_Address;
//   echo '</pre>';
   
    }       
    echo json_encode($result);
}


public function tki_info(){
    
//    $Client_ID=$this->input->post('Client_ID');
   
//    $result=array();    
//    if((preg_match("/08.01.001/i", $Client_ID))){
//      $Client_ID=str_replace("08.01.001.","",$Client_ID);  
//    }
//    $api = "31254";
//    $pass = "WfaXq!2";
    $tki = '255393';          //247787  ---- CR-19Dec17-0049628  ----- SRS12199=>  [TicketType] => New Installation
    
//    $data = "api_user=".$api. "&api_pass=".$pass."&subscriberid=".$subs;
   
//    $url = "https://203.76.110.131/link3api/frm_subscriber_info.aspx?api_user=31254&api_pass=WfaXq!2&subscriberid=".$subs;
    $url = "https://office.link3.net/sandboxapi/api/ticketapi/GetTicketDetails?AuthenticationKey=1235&TicketID=".$tki;
// https://office.link3.net/sandboxapi/api/ticketapi/GetTicketDetails?AuthenticationKey=1235&TicketID=120
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
 
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);  
    $response = curl_exec($ch);
    curl_close($ch);
    $result_array=array();	
//    print_r($response);
    $result_array=json_decode($response,true);
    
//     echo var_dump($result_array) . "<br>";
//    echo $result_array->RSM_Ticket;
//    $result_array=json_encode($response);
    echo '------------------------------------------------------------';
    
//    $result_array=(explode("\n",$response));
    echo '<pre>';
//    print_r($result_array);
   $type=array();
  // Printing all the keys and values one by one
$keys = array_keys($result_array);
for($i = 0; $i < count($result_array); $i++) {
    $type=$keys[$i];  
    foreach($result_array[$keys[$i]] as $key => $value) {
//        echo $key . " : <br>";
//     if (empty($value) || !isset($value)) { echo 'NULL---';  }else{ echo 'NOT NULL---'; }
    
           foreach ($value as $key => $v1){  
            echo $key . " : <br>";    
//            print_r($v1); 
            echo 'SubscriberID => '.$v1['SubscriberID'].'<br/>';  
            echo 'TicketType => '.$v1['TicketType'].'<br/>';
            echo 'TicketCreateDate => '.$v1['TicketCreateDate'].'<br/>';
            echo 'LogDetails => <br/>';
            print_r($v1['LogDetails']);
    
    }
        
        
        
        
        
        
        
        
//            if (empty($value) || !isset($value)) {
//    echo 'NULL---';  }else{ echo 'NOT NULL---'; }
    
    }
//    echo "---------------}<br>";
}  







    
//foreach ($result_array as $value) {
//  echo "$value <br>";
//}
//     foreach ($result_array as $key => $value)
//    {
//        echo $MIS_Ticket=$value['MIS_Ticket'];
//        echo $RSM_Ticket=$value['RSM_Ticket'];
//    }
    
    
    
    
//    json_decode
//    echo $MIS_Ticket=$result_array['MIS_Ticket'];
//    echo $RSM_Ticket=$result_array['RSM_Ticket'];
//    print_r($result_array['RSM_Ticket']);
    echo '</pre>';
    echo '-------------------------TEST-----------------------------------';
    
//    if($MIS_Ticket!=null && $RSM_Ticket==null ){ echo 'MIS TKI-----'; }elseif($MIS_Ticket==null && $RSM_Ticket!=null ){ echo 'RSM TKI-----';}
    
    
    
    
//   $SubscriberID=$result_array[4];
//   $SubscriberName=$result_array[5];
//   $ContactPerson=$result_array[6];
//   $AddressLine1=$result_array[7];
//   $PhoneNo=$result_array[9];
//   $Email=$result_array[10];
//   $ParentArea=$result_array[11];
//   $Area=$result_array[12];
//   $District=$result_array[13];
//   $SubscriberStatus=$result_array[14];
//   $SubscriberCategory=$result_array[20];
//   $PackageBW=$result_array[21];
//   $Create_Date=$result_array[23];
//   
//   $result['client_info']=array("AddressLine1"=>$AddressLine1,"PackageBW"=>$PackageBW,"PhoneNo"=>$PhoneNo,"SubscriberStatus"=>$SubscriberStatus,"SubscriberID"=>$SubscriberID,"SubscriberName"=>$SubscriberName,"ContactPerson"=>$ContactPerson,"Email"=>$Email);
   
           
//    echo json_encode($result);
}

public function change_image_fun() {
        
//..............................Part A...................................................        
      
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $name1= str_replace(" ","_",$name);
        $name2= str_replace(".","",$name1);
        $name3=$id.'_'.$name2;
        
        $number_of_image_change = $this->input->post('number_of_image_change');
        $image_number = $number_of_image_change + 1;

        $file_name = $this->input->post('C_file');
        $split = explode(".", $file_name);
        $file_type = $split[1];
//..............................Part B................................................
        $config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/css/upload_file/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['file_name'] = $name3.$image_number;        
//      $config['max_size']	= '200';
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config);        
        echo '<pre>';
        print_r($_FILES);
//        exit();        

        $this->upload->do_upload('change_image_file');
        $image_des = $this->upload->data();
        echo '<pre>';
        print_r($image_des);
        
        
//          if(! $this->upload->do_upload('change_image_file'))
//            {
//                  $msg[]=$this->upload->display_errors();
//                  print_r($msg);
//            }else{
//                
//                $this->upload->do_upload('change_image_file');
//                $image_des = $this->upload->data();
//                echo '<pre>';
//                print_r($image_des);
//        
//            }
        
        $update_image_data = array();
        $update_image_data['file_name'] = $name3 . $image_number . '.' . $file_type;
        $update_image_data['number_of_image_change'] = $image_number;
        $this->hd_model->update_image_model($id, $update_image_data);
        redirect("index.php/nmc_c/profile");       
    }
    
    
    function hd_email_report(){
        
        $data = array();
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
            $data['result'] = $this->hd_model->email_report_by_date($date_array);
        } else {
            $data['result'] = null;
        }

        $data['maincontent'] = $this->load->view('hd_email_rpt', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);  
    }
    
}

?>