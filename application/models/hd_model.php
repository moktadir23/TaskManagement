<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hd_Model extends CI_Controller {

    function __construct() {
        parent::__construct();
        //load our second db and put in $db2
        $this->db2 = $this->load->database('otherdb', TRUE);
        
        $this->db3 = $this->load->database('mqdb', TRUE);
        
        $this->db4 = $this->load->database('mq_user', TRUE);
    }

    public function Check_kra_model($Engineer_ID, $month, $year) {

        $query = $this->db->query("select Engineer_ID from hd_kra_tbl Where Engineer_ID='$Engineer_ID' and month='$month' and year='$year'");
        return $query->row();
    }

    public function save_kra_info_model($data) {
        $this->db->insert('hd_kra_tbl', $data);
    }

    public function update_kra_info_model($pkey,$data){
        $this->db->where('id',$pkey);
        $this->db->update('hd_kra_tbl',$data);

    }

        public function HD_pick_info() {
        $query = $this->db2->query("select * from mok_test_tbl");
        return $query->result_array();
    }

    public function hd_list_record_count() {

        $query = $this->db2->query("select * from mok_test_tbl");
        return $query->result_array();
    }

    public function hd_Done_task_Pagination_select_model($per_page, $offset) {
        $this->db2->select('*');
        $this->db2->from('mok_test_tbl');
        $this->db2->where('address', 'CTG');
        $query = $this->db2->get('', $per_page, $offset);
        $data = array();
        foreach ($query->result() as $row)
            $data[] = $row;
        return $data;
    }

    public function pick_call_center_Performance($date_array) {

        $start_time = $date_array['date1'];
        $end_time = $date_array['date2'];
        $this->db2 = $this->load->database('otherdb', TRUE);
        $query = $this->db2->query("select campaign_id,call_date,length_in_sec,status,phone_code,phone_number,user,queue_seconds,called_count from vicidial_closer_log where call_date BETWEEN '$start_time' and '$end_time'");
        return $query->result_array();
    }

    public function pick_drop_call_list($date_array) {

        $start_time = $date_array['date1'];
        $end_time = $date_array['date2'];
        $this->db2 = $this->load->database('otherdb', TRUE);
        $query = $this->db2->query("select call_date,length_in_sec,status,phone_code,phone_number,user,queue_seconds,called_count from vicidial_closer_log where call_date BETWEEN '$start_time' and '$end_time'");
        return $query->result_array();
    }

    public function pick_agent_performance_list($Engineer_ID, $date_array) {

        $start_time = $date_array['date1'];
        $end_time = $date_array['date2'];
        $this->db2 = $this->load->database('otherdb', TRUE);
        $query = $this->db2->query("select user,event_time,pause_sec,wait_sec,talk_sec,dispo_sec,status,"
                . "user_group,comments,sub_status,dead_sec,processed,uniqueid,pause_type from vicidial_agent_log where user='$Engineer_ID' and event_time BETWEEN '$start_time' and '$end_time'");
        return $query->result_array();

//    $start_time=$date_array['date1'];
//    $end_time=$date_array['date2'];     
//    $this->db2 = $this->load->database('otherdb', TRUE);
//    $query = $this->db2->query("select call_date,length_in_sec,status,phone_code,phone_number,user,queue_seconds,called_count from vicidial_closer_log where call_date BETWEEN '$start_time' and '$end_time'");  
//    return $query->result_array();   
    }

    public function pick_agent_log_time($Engineer_ID, $date_array) {

        $start_time = $date_array['date1'];
        $end_time = $date_array['date2'];
        $this->db2 = $this->load->database('otherdb', TRUE);
        $query = $this->db2->query("select user,event,event_date from vicidial_user_log where user='$Engineer_ID' and event_date BETWEEN '$start_time' and '$end_time'");
        return $query->result_array();
    }

    public function hd_pick_zone() {
        $query = $this->db->query("select * from category where CateGory_name = 'Zone' and CateGory_Purpose='hd_kra' and Status = '1'  order by Indexx");
        return $query->result_array();
    }

    public function hd_pick_kra() {
        $query = $this->db->query("select * from category where CateGory_Purpose='hd_kra' and Status = '1'  order by Indexx");
        return $query->result_array();
    }

    public function pick_call_status_list($date_array) {
        $start_time = $date_array['date1'];
        $end_time = $date_array['date2'];
        $this->db2 = $this->load->database('otherdb', TRUE);
        $query = $this->db2->query("select entry_date,status,user,phone_number,called_count from vicidial_list where entry_date BETWEEN '$start_time' and '$end_time'");
        return $query->result_array();
    }

    public function pick_problem_group($date_array) {
        $start_time = $date_array['date1'];
        $end_time = $date_array['date2'];
        $this->db2 = $this->load->database('otherdb', TRUE);
        $query = $this->db2->query("select COUNT(user) as number,entry_date,status from vicidial_list where  entry_date BETWEEN '$start_time' and '$end_time' group by status ORDER BY number DESC");
        return $query->result_array();
    }

    public function KRA_result_model() {    
        $query = $this->db->query("select id,Zone,month,Engineer_Name,Engineer_ID,Rating_Point,
                                sum(case when month = 'July' then Rating_Point else 0 end) July,
                                sum(case when month = 'August' then Rating_Point else 0 end) August,
                                sum(case when month = 'September' then Rating_Point else 0 end) September,
                                sum(case when month = 'October' then Rating_Point else 0 end) October,
                                sum(case when month = 'November' then Rating_Point else 0 end) November,
                                sum(case when month = 'December' then Rating_Point else 0 end) December,
                                sum(case when month = 'January' then Rating_Point else 0 end) January,
                                sum(case when month = 'February' then Rating_Point else 0 end) February,
                                sum(case when month = 'March' then Rating_Point else 0 end) March,
                                sum(case when month = 'April' then Rating_Point else 0 end) April,
                                sum(case when month = 'May' then Rating_Point else 0 end) May,
                                sum(case when month = 'June' then Rating_Point else 0 end) June
                                from hd_kra_tbl where year='2018-2019' group by Engineer_ID ORDER BY Zone,Engineer_Name ASC");
        return $query->result_array();
    }
    
    public function KRA_result_model_19_20() {    
        $query = $this->db->query("select id,Zone,month,Engineer_Name,Engineer_ID,Rating_Point,
                                sum(case when month = 'July' then Rating_Point else 0 end) July,
                                sum(case when month = 'August' then Rating_Point else 0 end) August,
                                sum(case when month = 'September' then Rating_Point else 0 end) September,
                                sum(case when month = 'October' then Rating_Point else 0 end) October,
                                sum(case when month = 'November' then Rating_Point else 0 end) November,
                                sum(case when month = 'December' then Rating_Point else 0 end) December,
                                sum(case when month = 'January' then Rating_Point else 0 end) January,
                                sum(case when month = 'February' then Rating_Point else 0 end) February,
                                sum(case when month = 'March' then Rating_Point else 0 end) March,
                                sum(case when month = 'April' then Rating_Point else 0 end) April,
                                sum(case when month = 'May' then Rating_Point else 0 end) May,
                                sum(case when month = 'June' then Rating_Point else 0 end) June
                                from hd_kra_tbl where year='2019-2020' group by Engineer_ID ORDER BY Zone,Engineer_Name ASC");
        return $query->result_array();
    }

    public function single_KRA_result_model($Engineer_ID, $month) {
        $query = $this->db->query("select * from hd_kra_tbl Where Engineer_ID='$Engineer_ID' and month='$month'");
        return $query->row_array();
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
//    ...............................................................................................................
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function save_s_care($data) {
        $this->db->insert('hd_selfcare', $data);
    }

    public function hd_problem_category() {
        $query = $this->db->query("select * from category where  CateGory_Purpose='s_care' and Status = '1'  order by Indexx");
        return $query->result_array();
    }

    public function hd_pick_traceless_category(){
         $query = $this->db->query("select * from category where  CateGory_Purpose='traceless' and Status = '1'  order by Indexx");
        return $query->result_array();
    }
    
    public function save_traceless($data){
        $this->db->insert('hd_traceless_sms', $data); 
    }
    
    
    public function pick_olt_m($bts){
      $query = $this->db3->query("select OLT_Name from cre_olt where BTS_Name='$bts' Order by OLT_Name ASC");
      return $query->result_array();
    }
    
    public function save_olt_m($data){
       $this->db->insert('hd_olt', $data);   
    }
    
    public function pick_user_log_m($user){
        
     $start_time=date("Y-m-d 00:00:00");
     $end_time=date("Y-m-d 23:59:59");
     $query=$this->db2->query("select user, event, event_date, server_phone  from vicidial_user_log Where user='$user' and event_date between '$start_time' and  '$end_time'");
//     return $query->row();
     return $query->result_array();
    }
    public function save_agent_dp_m($data){
       $this->db->insert('hd_agent_daily_activity', $data);    
    }
      public function hd_nmc_type() {
        $query = $this->db->query("select * from category where CateGory_Purpose='hd_nmc' and Status = '1'  order by Indexx");
        return $query->result_array();
    }
    public function save_hd_nmc_m($data){
         $this->db->insert('hd_nmc_tbl', $data); 
    }
    
    public function hd_pending_nmc_info(){
        $query = $this->db->query("select * from hd_nmc_tbl where status = '0'  order by id ASC");
        return $query->result_array();
    }

    public function hd_pick_single_info($id){
         $query = $this->db->query("select id,tki,down_time,remark from hd_nmc_tbl Where id='$id'");
        return $query->row();
    }

    public function update_hd_nmc($tki,$data){
        $this->db->where('tki',$tki);
        $this->db->update('hd_nmc_tbl',$data);
    }
    
      public function nmc_outbound_report_by_date($date_array){
              
      $condition = "status =" . "'". '1' . "'"." AND " . "up_time  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('*');
        $this->db->from('hd_nmc_tbl');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    
       public function scare_report_by_date($date_array){
              
      $condition = "date_time  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('*');
        $this->db->from('hd_selfcare');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    
      public function tsms_report_by_date($date_array){
              
      $condition = "sms_time  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('*');
        $this->db->from('hd_traceless_sms');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    public function pon_report_by_date($date_array){
      
        $condition = "date_time  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('*');
        $this->db->from('hd_olt');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
    }
    public function acd_agent_report_by_date($date_array){
      
            $condition = "logout  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('*');
        $this->db->from('hd_agent_daily_activity');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
    }
    
     public function hd_p_list_by_date($date_array){
              
      $condition = "status =" . "'". '0' . "'"." AND " . "down_time  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('id,n_type,node_client,down_time,sms_down_time,tki,fw_team,remark');
        $this->db->from('hd_nmc_tbl');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    
    //    .................................. Import Excel Data .................................................................
    public function importData($data_import,$data) {
//        $data = $this->_batchImport;
//        $this->db->insert_batch('bulk_sms_import', $data);
        
//         $data_import = array(
//            array(
//            'contact_no'=> '111111'
//            ),
//            array(
//            'contact_no'=> '2222222'
//            )
//        );
//echo '<pre>';
//print_r($data);

$comments=$data['comments'];
$sms_time=$data['sms_time'];
$Engineer_ID=$data['Engineer_ID'];
$Engineer_Name=$data['Engineer_Name'];
//echo $data->comments;
    
$i=0;
foreach ($data_import as $vaule){
    
//    echo $data_import[$i];
    
     $a= array(
         'contact_no'=> $data_import[$i],
         'sms_time'=> $sms_time,
         'Engineer_ID'=> $Engineer_ID,
         'Engineer_Name'=> $Engineer_Name,
         'remarks'=> $comments,
         
         );
    $i++;
  
   $this->db->insert('hd_bulk_sms_import', $a);
}

}

function import_Email_Data($email_data,$data){
  
$comments=$data['comments'];
//$sms_time=$data['sms_time'];
$Engineer_ID=$data['Engineer_ID'];
$Engineer_Name=$data['Engineer_Name'];  
$i=0;

//    echo '<pre>'; 
//    print_r($email_data);
//    echo '<pre>';

foreach ($email_data as $vaule){

     $a= array(
         'email_time'=> $vaule['email_time'],
         'email'=> $vaule['email_address'],
         'subject'=> $vaule['subject'],
         'client_name'=> $vaule['client_name'],
         'tki_time'=> $vaule['tki_time'],
         'tki_id'=> $vaule['tki_id'],
         'reply_time'=> $vaule['reply_time'],
         'reason'=> $vaule['reason'],
         'email_remarks'=> $vaule['remarks'],
         'Engineer_ID'=> $Engineer_ID,
         'Engineer_Name'=> $Engineer_Name,
         'remarks'=> $comments,        
         );
    $i++;
    
    $email_address=$vaule['email_address'];
        if( $email_address!=null){
           $this->db->insert('hd_email', $a); 
        }
    }
}

    public function bulk_report_by_date($date_array){
      
        $condition = "sms_time  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('*');
        $this->db->from('hd_bulk_sms_import');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
    }
    
      public function email_report_by_date($date_array){
      
        $condition = "email_time  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('*');
        $this->db->from('hd_email');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////
//    .......................................NMC PART...............................................................
    ///////////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function save_nmc_m($data){
         $this->db->insert('nmc_task', $data); 
    }
     
    public function nmc_assign_task_page_category(){
            $query = $this->db->query("select * from category where Category_Purpose = 'NMC_task' and ( CateGory_name = 'organisation' or CateGory_name = 'Vendor' or CateGory_name = 'Incident_for'or CateGory_name = 'type' )  and Status = '1'  order by Indexx");
           return $query->result_array();

    }
    public function nmc_add_category_model(){
        $query = $this->db->query("select * from category where Category_Purpose = 'NMC_task' and ( CateGory_name = 'Incident_for' or CateGory_name = 'Vendor' ) and Status = '1'  order by Indexx");
        return $query->result_array();  
    }
    
    public function save_nmc_ctgory($data){
         $this->db->insert('nmc_category', $data);
    }
    public function Check_name_model($Name){
       
//     $query=$this->db->query("select Client_id from ert_task_list Where Client_id='$Client_id' and ONU_opration_status='0'");
    $query=$this->db->query("select Name from nmc_category Where Name='$Name'");
     return $query->row();
    }
    public function save_nmc_comments($c_data){
         $this->db->insert('nmc_comments', $c_data); 
    }    
    public function save_nmc_emly_info($e_data){
         $this->db->insert('nmc_employee_tbl', $e_data); 
    }
    public function nmc_pick_single_info($id){
        $query = $this->db->query("select in_Occurred,type,tki,Incident_for from nmc_task Where id='$id'");
        return $query->row();
    }
    public function update_nmc_task($tki,$data){
        $this->db->where('tki',$tki);
        $this->db->update('nmc_task',$data);
    }
    public function nmc_pending_task(){ 
    $query=$this->db->query("select id,organisation,in_Occurred,tki,incident_for,type,Specification,Vendor,Name,scr_curt_id,informed_id,informed_time,etr,rfo,sms,email,pri_find,comments from nmc_task Where tki_status='0'order by id DESC");
    return $query->result_array();  
    }
    public function NMC_last_comments($tki){  
       $condition = "tki =" . "'" . $tki . "'";
       $query = $this->db->query("select max(id) as m_id,tki,comments from nmc_comments where " . $condition);
      return $query->row();    
    }
    public function nmc_view_comments($tki){
            $query=$this->db->query("select * from nmc_comments Where tki='$tki'");
            return $query->result_array();   
    }
    public function nmc_p_list_by_date($date_array){
              
      $condition = "tki_status =" . "'". '0' . "'"." AND " . "in_Occurred  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('id,in_Occurred,tki,incident_for,type,Specification,Vendor,Name,scr_curt_id,informed_id,informed_time,etr,rfo,sms,email');
        $this->db->from('nmc_task');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
     public function nmc_p_list_by_vendor($Vendor,$date_array){
              
      $condition = "Vendor =" . "'". $Vendor . "'"." AND " . "tki_status =" . "'". '0' . "'"." AND " . "in_Occurred  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('id,in_Occurred,tki,incident_for,type,Specification,Vendor,Name,scr_curt_id,informed_id,sms,email');
        $this->db->from('nmc_task');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
     public function nmc_p_list_by_type($type,$date_array){
              
      $condition = "type =" . "'". $type . "'"." AND " ."tki_status =" . "'". '0' . "'"." AND " . "in_Occurred  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('id,in_Occurred,tki,incident_for,type,Specification,Vendor,Name,scr_curt_id,informed_id,sms,email');
        $this->db->from('nmc_task');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    public function nmc_pending_by_vendor($Vendor){
      
         $condition = "Vendor =" . "'". $Vendor . "'"." AND " ."tki_status =" . "'". '0' . "'";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('id,in_Occurred,tki,incident_for,type,Specification,Vendor,Name,scr_curt_id,informed_id,sms,email,etr,rfo,informed_time');
        $this->db->from('nmc_task');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
    }

    public function nmc_p_list_by_type_vendor($Vendor,$type,$date_array){
              
      $condition = "Vendor =" . "'". $Vendor . "'"." AND " . "type =" . "'". $type . "'"." AND " . "tki_status =" . "'". '0' . "'"." AND " . "in_Occurred  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('id,in_Occurred,tki,incident_for,type,Specification,Vendor,Name,scr_curt_id,informed_id,sms,email');
        $this->db->from('nmc_task');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
     public function nmc_incident_report_by_date($date_array){
              
      $condition = "tki_status =" . "'". '1' . "'"." AND " . "in_Resolved  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' order by id DESC";
        $this->db->select('*');
        $this->db->from('nmc_task');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    public function nmc_report_value(){
      $query = $this->db->query("select * from category where (CateGory_name = 'Vendor' or CateGory_name = 'type' or CateGory_name = 'Incident_for' ) and Status = '1'  order by Indexx");
       return $query->result_array();   
        
    }
    public function nmc_stype(){
       $query = $this->db->query("select * from category where CateGory_name = 'bw_type' order by Indexx");
        return $query->result_array();     
        
    }

    public function nmc_incident_report_by_vendor($Vendor,$date_array){
      
      $condition = "tki_status =" . "'". '1' . "'"." AND " . "Vendor =" . "'". $Vendor . "'"." AND " . "in_Resolved  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' order by id DESC";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('*');
        $this->db->from('nmc_task');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }  
    }
    public function nmc_incident_report_by_type($Incident_for,$date_array){
      
      $condition = "tki_status =" . "'". '1' . "'"." AND " . "Incident_for =" . "'". $Incident_for . "'"." AND " . "in_Resolved  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' order by id DESC";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('*');
        $this->db->from('nmc_task');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }  
    }
     public function nmc_incident_report_by_type_Specification($Incident_for,$Specification,$date_array){
      
      $condition = "tki_status =" . "'". '1' . "'"." AND " . "Incident_for =" . "'". $Incident_for . "'"." AND " . "Specification =" . "'". $Specification . "'"." AND " . "in_Resolved  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' order by id DESC";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('*');
        $this->db->from('nmc_task');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }  
    }
     public function nmc_incident_report_by_type_vendor($Vendor,$Incident_for,$date_array){
      
      $condition = "tki_status =" . "'". '1' . "'"." AND " . "Vendor =" . "'". $Vendor . "'"." AND " . "Incident_for =" . "'". $Incident_for . "'"." AND " . "in_Resolved  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' order by id DESC";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('*');
        $this->db->from('nmc_task');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }  
    }
    public function nmc_incident_report_by_type_vendor_name($Vendor,$Incident_for,$Name,$date_array){
      
      $condition = "tki_status =" . "'". '1' . "'"." AND " . "Vendor =" . "'". $Vendor . "'"." AND " . "Incident_for =" . "'". $Incident_for . "'"." AND " ."Name =" . "'". $Name . "'"." AND " . "in_Resolved  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' order by id DESC";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('*');
        $this->db->from('nmc_task');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }  
    }
      public function nmc_incident_report_by_name_date($Name,$date_array){
      
      $condition = "tki_status =" . "'". '1' . "'"." AND " ."Name =" . "'". $Name . "'"." AND " . "in_Resolved  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' order by id DESC";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('*');
        $this->db->from('nmc_task');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }  
    }
    
     public function nmc_incident_report_by_incedient_for_type_vendor_specification_name_date($Incident_for,$type,$Vendor,$Specification,$Name1,$date_array){
         
        $condition = "tki_status =" . "'". '1' . "'"." AND " . "Name =" . "'". $Name1 . "'"." AND " . "type =" . "'". $type . "'"." AND " . "Vendor =" . "'". $Vendor . "'"." AND " . "Incident_for =" . "'". $Incident_for . "'"." AND " ."Specification =" . "'". $Specification . "'"." AND " . "in_Resolved  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' order by id DESC";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('*');
        $this->db->from('nmc_task');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        } 
    }
    
    public function nmc_all_incident_report_by_date($date_array){
       
        $condition = "tki_status =" . "'". '1' . "'"." AND " . "in_Resolved  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' order by id DESC";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('*');
        $this->db->from('nmc_task');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
    }

        public function nmc_incident_report_by_type_vendor_specification_name_date($Incident_for,$Vendor,$Specification,$Name1,$date_array){
         
        $condition = "tki_status =" . "'". '1' . "'"." AND " . "Name =" . "'". $Name1 . "'"." AND " . "Vendor =" . "'". $Vendor . "'"." AND " . "Incident_for =" . "'". $Incident_for . "'"." AND " ."Specification =" . "'". $Specification . "'"." AND " . "in_Resolved  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' order by id DESC";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('*');
        $this->db->from('nmc_task');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        } 
    }

    public function nmc_incident_report_by_type_vendor_specification_date($Incident_for,$Vendor,$Specification,$date_array){
         
        $condition = "tki_status =" . "'". '1' . "'"." AND " . "Vendor =" . "'". $Vendor . "'"." AND " . "Incident_for =" . "'". $Incident_for . "'"." AND " ."Specification =" . "'". $Specification . "'"." AND " . "in_Resolved  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' order by id DESC";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('*');
        $this->db->from('nmc_task');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        } 
    }
    
    public function nmc_ereport($Engineer_ID,$date_array){
     
              
      $condition = "e_id =" . "'". $Engineer_ID . "'"." AND " . "create_time  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('*');
        $this->db->from('nmc_employee_tbl');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }  
    }
    
    public function enmc_latency_report_by_date($date_array){
        
        $condition = "e.date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select(array('e.date','e.time','e.ip_4221_l','e.yahoo_l', 'e.google_l'));
        $this->db->from('nmc_latancy_tbl as e');
        $this->db->where($condition.' order by date,time ASC');
        $query = $this->db->get();
        return $query->result_array(); 
        
    }

        public function enmc_session_report_by_date($date_array){
//      id,in_Occurred,tki,incident_for,type,Specification,Vendor,Name,scr_curt_id,informed_id,sms,email
         
        $condition = "e.date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select(array('e.date','e.time','e.type','e.sub_type', 'e.up', 'e.down'));
        
//        $this->db->select(array('e.tki','e.in_Occurred', 'e.in_Resolved'));
        $this->db->from('nmc_bwu_tbl as e');
        $this->db->where($condition.' order by date,time,type,sub_type ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function enmc_session_report_by_type($type,$date_array){
      
        $condition = "e.type =" . "'" . $type . "'"." AND " . "e.date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select(array('e.date','e.time','e.type','e.sub_type', 'e.up', 'e.down'));
        $this->db->from('nmc_bwu_tbl as e');
        $this->db->where($condition.' order by date,time,type,sub_type ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function enmc_session_report_by_zone($type,$zone,$date_array){
        
        $condition = "e.type =" . "'" . $type . "'"." AND " . "e.sub_type =" . "'" . $zone . "'"." AND " . "e.date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select(array('e.date','e.time','e.type','e.sub_type', 'e.up', 'e.down'));
        $this->db->from('nmc_bwu_tbl as e');
        $this->db->where($condition.' order by date,time,type,sub_type ASC');
        $query = $this->db->get();
        return $query->result_array();  
    }

        public function enmc_incident_report_by_date($date_array){
//        $condition = "e.tki_status =" . "'". '1' . "'"." AND " . "e.in_Resolved  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//        $this->db->select(array('e.tki','e.in_Occurred','e.in_Resolved','e.Duration', 'e.incident_for', 'e.type','e.Specification','e.Name', 'e.scr_curt_id','e.Specification','e.Final_Reason','e.Vendor'));
//        $this->db->from('nmc_task as e');
//        $this->db->where($condition);
//        $query = $this->db->get();
//        return $query->result_array();
        
        $nmc_mobule = $this->session->userdata('nmc_module'); 
        if($nmc_mobule=='2'){
             $condition = "e.Vendor !=" . "'" . 'Cybergate' . "'". " AND " . "e.tki_status =" . "'". '1' . "'"." AND " . "e.in_Resolved  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
            $this->db->select(array('e.tki','e.in_Occurred','e.in_Resolved','e.Duration', 'e.incident_for', 'e.type','e.Specification','e.Name', 'e.scr_curt_id','e.Specification','e.Final_Reason','e.Vendor'));
            $this->db->from('nmc_task as e');
            $this->db->where($condition);
            $query = $this->db->get();
            return $query->result_array(); 
        }else{
            $condition = "e.tki_status =" . "'". '1' . "'"." AND " . "e.in_Resolved  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
            $this->db->select(array('e.tki','e.in_Occurred','e.in_Resolved','e.Duration', 'e.incident_for', 'e.type','e.Specification','e.Name', 'e.scr_curt_id','e.Specification','e.Final_Reason','e.Vendor'));
            $this->db->from('nmc_task as e');
            $this->db->where($condition);
            $query = $this->db->get();
            return $query->result_array();
        }
        
        
    }
     public function enmc_pending_report_by_date($date_array){
//        id,in_Occurred,tki,incident_for,type,Specification,Vendor,Name,scr_curt_id,informed_id,sms,email
//        $date_array['date1']='2018-11-11 00:00:00';
//        $date_array['date2']='2019-11-11 00:00:00';
        $condition = "e.tki_status =" . "'". '0' . "'"." AND " . "e.in_Occurred  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select(array('e.tki','e.in_Occurred', 'e.incident_for', 'e.type','e.Specification','e.Vendor','e.Name', 'e.scr_curt_id', 'e.informed_id', 'e.informed_time','e.Vendor')); 
        $this->db->from('nmc_task as e');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function enmc_incident_report_by_Incident_for_date($Incident_for,$date_array){
      
        $condition = "e.incident_for =" . "'" . $Incident_for . "'". " AND " . "e.tki_status =" . "'". '1' . "'"." AND " . "e.in_Resolved  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select(array('e.tki','e.in_Occurred','e.in_Resolved','e.Duration', 'e.incident_for', 'e.type','e.Specification','e.Name', 'e.scr_curt_id','e.Specification','e.Final_Reason','e.Vendor'));
        $this->db->from('nmc_task as e');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result_array();
    }

     public function enmc_incident_report_by_vendor($Vendor,$date_array){
      
        $condition = "e.Vendor =" . "'" . $Vendor . "'". " AND " . "e.tki_status =" . "'". '1' . "'"." AND " . "e.in_Resolved  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select(array('e.tki','e.in_Occurred','e.in_Resolved','e.Duration', 'e.incident_for', 'e.type','e.Specification','e.Name', 'e.scr_curt_id','e.Specification','e.Final_Reason','e.Vendor'));
        $this->db->from('nmc_task as e');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result_array();
    }
    
     public function enmc_incident_report_by_name_date($Name,$date_array){
      
        $condition = "e.Name =" . "'" . $Name . "'". " AND " . "e.tki_status =" . "'". '1' . "'"." AND " . "e.in_Resolved  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select(array('e.tki','e.in_Occurred', 'e.incident_for', 'e.type','e.Specification','e.Vendor','e.Name', 'e.scr_curt_id', 'e.informed_id', 'e.informed_time','e.Vendor')); 
        $this->db->from('nmc_task as e');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function enmc_pending_report_by_vendor($Vendor,$date_array){
      
        $condition = "e.Vendor =" . "'" . $Vendor . "'". " AND " . "e.tki_status =" . "'". '0' . "'"." AND " . "e.in_Occurred  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
           $this->db->select(array('e.tki','e.in_Occurred', 'e.incident_for', 'e.type','e.Specification','e.Name', 'e.scr_curt_id','e.Vendor'));
        $this->db->from('nmc_task as e');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result_array();
    }
     public function enmc_incident_report_by_type($type,$date_array){
      
//        $condition = "e.type =" . "'" . $type . "'". " AND " . "e.tki_status =" . "'". '1' . "'"." AND " . "e.in_Resolved  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//        $this->db->select(array('e.tki','e.in_Occurred','e.in_Resolved','e.Duration', 'e.incident_for', 'e.type','e.Specification','e.Name', 'e.scr_curt_id','e.Specification','e.Final_Reason','e.Vendor'));
//        $this->db->from('nmc_task as e');
//        $this->db->where($condition);
//        $query = $this->db->get();
//        return $query->result_array();
          $nmc_mobule = $this->session->userdata('nmc_module'); 
           if($nmc_mobule=='2'){
                $condition = "e.Vendor !=" . "'" . 'Cybergate' . "'". " AND " ."e.type =" . "'" . $type . "'". " AND " . "e.tki_status =" . "'". '1' . "'"." AND " . "e.in_Resolved  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
                $this->db->select(array('e.tki','e.in_Occurred','e.in_Resolved','e.Duration', 'e.incident_for', 'e.type','e.Specification','e.Name', 'e.scr_curt_id','e.Specification','e.Final_Reason','e.Vendor'));
                $this->db->from('nmc_task as e');
                $this->db->where($condition);
                $query = $this->db->get();
                return $query->result_array();
           }else{
                $condition = "e.type =" . "'" . $type . "'". " AND " . "e.tki_status =" . "'". '1' . "'"." AND " . "e.in_Resolved  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
                $this->db->select(array('e.tki','e.in_Occurred','e.in_Resolved','e.Duration', 'e.incident_for', 'e.type','e.Specification','e.Name', 'e.scr_curt_id','e.Specification','e.Final_Reason','e.Vendor'));
                $this->db->from('nmc_task as e');
                $this->db->where($condition);
                $query = $this->db->get();
                return $query->result_array();
           }
        
        
    }
    public function enmc_incident_report_by_type_Specification($type,$Specification,$date_array){
      
        $nmc_mobule = $this->session->userdata('nmc_module'); 
        if($nmc_mobule=='2'){
            $condition = "e.Vendor !=" . "'" . 'Cybergate' . "'". " AND " . "e.type =" . "'" . $type . "'". " AND " . "e.Specification =" . "'". $Specification . "'"." AND " ."e.tki_status =" . "'". '1' . "'"." AND " . "e.in_Resolved  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
            $this->db->select(array('e.tki','e.in_Occurred','e.in_Resolved','e.Duration', 'e.incident_for', 'e.type','e.Specification','e.Name', 'e.scr_curt_id','e.Specification','e.Final_Reason','e.Vendor'));
            $this->db->from('nmc_task as e');
            $this->db->where($condition);
            $query = $this->db->get();
            return $query->result_array();
        }else{
            $condition = "e.type =" . "'" . $type . "'". " AND " . "e.Specification =" . "'". $Specification . "'"." AND " ."e.tki_status =" . "'". '1' . "'"." AND " . "e.in_Resolved  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
            $this->db->select(array('e.tki','e.in_Occurred','e.in_Resolved','e.Duration', 'e.incident_for', 'e.type','e.Specification','e.Name', 'e.scr_curt_id','e.Specification','e.Final_Reason','e.Vendor'));
            $this->db->from('nmc_task as e');
            $this->db->where($condition);
            $query = $this->db->get();
            return $query->result_array();
        }
        
        
        
    }
    public function enmc_pending_report_by_type($type,$date_array){
      
        $condition = "e.type =" . "'" . $type . "'". " AND " . "e.tki_status =" . "'". '0' . "'"." AND " . "e.in_Occurred  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
         $this->db->select(array('e.tki','e.in_Occurred', 'e.incident_for', 'e.type','e.Specification','e.Name', 'e.scr_curt_id'));
        $this->db->from('nmc_task as e');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result_array();
    }
     public function enmc_incident_report_by_type_vendor($Vendor,$type,$date_array){
      
        $condition = "e.type =" . "'" . $type . "'". " AND " . "e.Vendor =" . "'" . $Vendor . "'". " AND " . "e.tki_status =" . "'". '1' . "'"." AND " . "e.in_Resolved  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select(array('e.tki','e.in_Occurred','e.in_Resolved','e.Duration', 'e.incident_for', 'e.type','e.Specification','e.Name', 'e.scr_curt_id','e.Specification','e.Final_Reason','e.Vendor'));
         $this->db->from('nmc_task as e');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result_array();
    }
     public function enmc_incident_report_by_type_vendor_name($Vendor,$type,$Name,$date_array){
      
        $condition = "e.type =" . "'" . $type . "'". " AND " . "e.Name =" . "'" . $Name . "'". " AND " . "e.Vendor =" . "'" . $Vendor . "'". " AND " . "e.tki_status =" . "'". '1' . "'"." AND " . "e.in_Resolved  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select(array('e.tki','e.in_Occurred','e.in_Resolved','e.Duration', 'e.incident_for', 'e.type','e.Specification','e.Name', 'e.scr_curt_id','e.Specification','e.Final_Reason','e.Vendor'));
         $this->db->from('nmc_task as e');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result_array();
    }
     public function enmc_incident_report_by_type_vendor_specification_date($type,$Vendor,$Specification,$date_array){
      
        $condition = "e.type =" . "'" . $type . "'". " AND " . "e.Specification =" . "'" . $Specification . "'". " AND " . "e.Vendor =" . "'" . $Vendor . "'". " AND " . "e.tki_status =" . "'". '1' . "'"." AND " . "e.in_Resolved  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select(array('e.tki','e.in_Occurred','e.in_Resolved','e.Duration', 'e.incident_for', 'e.type','e.Specification','e.Name', 'e.scr_curt_id','e.Specification','e.Final_Reason','e.Vendor'));
         $this->db->from('nmc_task as e');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function enmc_incident_report_by_type_vendor_incident_for_specification_name_date($Incident_for,$type,$Vendor,$Specification,$Name1,$date_array){
      
        $condition = "e.Incident_for =" . "'" . $Incident_for . "'". " AND " . "e.type =" . "'" . $type . "'". " AND " . "e.Name =" . "'" . $Name1 . "'". " AND " ."e.Specification =" . "'" . $Specification . "'". " AND " . "e.Vendor =" . "'" . $Vendor . "'". " AND " . "e.tki_status =" . "'". '1' . "'"." AND " . "e.in_Resolved  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select(array('e.tki','e.in_Occurred','e.in_Resolved','e.Duration', 'e.Incident_for', 'e.type','e.Specification','e.Name', 'e.scr_curt_id','e.Specification','e.Final_Reason','e.Vendor'));
         $this->db->from('nmc_task as e');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function enmc_all_incident_report_by_date($date_array){
        $condition =  "e.tki_status =" . "'". '1' . "'"." AND " . "e.in_Resolved  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select(array('e.tki','e.in_Occurred','e.in_Resolved','e.Duration', 'e.Incident_for', 'e.type','e.Specification','e.Name', 'e.scr_curt_id','e.Specification','e.Final_Reason','e.Vendor'));
         $this->db->from('nmc_task as e');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result_array();   
    }

    public function enmc_incident_report_by_type_vendor_specification_name_date($Incident_for,$Vendor,$Specification,$Name1,$date_array){
      
        $condition = "e.Incident_for =" . "'" . $Incident_for . "'". " AND " . "e.Name =" . "'" . $Name1 . "'". " AND " ."e.Specification =" . "'" . $Specification . "'". " AND " . "e.Vendor =" . "'" . $Vendor . "'". " AND " . "e.tki_status =" . "'". '1' . "'"." AND " . "e.in_Resolved  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select(array('e.tki','e.in_Occurred','e.in_Resolved','e.Duration', 'e.Incident_for', 'e.type','e.Specification','e.Name', 'e.scr_curt_id','e.Specification','e.Final_Reason','e.Vendor'));
         $this->db->from('nmc_task as e');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result_array();
    }
    
     public function enmc_pending_report_by_type_vendor($Vendor,$type,$date_array){
      
        $condition = "e.type =" . "'" . $type . "'". " AND " . "e.Vendor =" . "'" . $Vendor . "'". " AND " . "e.tki_status =" . "'". '0' . "'"." AND " . "e.in_Occurred  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
         $this->db->select(array('e.tki','e.in_Occurred', 'e.Incident_for', 'e.type','e.Specification','e.Name', 'e.scr_curt_id'));
         $this->db->from('nmc_task as e');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function nmc_done_record_count(){
      
        $query = $this->db->query("select id from nmc_task where tki_status = '1'");
        return $query->result_array();
    }
    public function nmc_Pagination_done_model($per_page, $offset) {
        $this->db->select('*');
        $this->db->from('nmc_task');
        $this->db->where('tki_status','1'.'order by id DESC');
//        ,'ORDER BY id ASC'
        
//        $this->db->where('','order by id DESC');
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data;
        
    }
    
    public function nmc_edit_info_model($id){
        
       $query = $this->db->query("select id,organisation,in_Occurred,tki,incident_for,type,Specification,Vendor,Name,scr_curt_id,informed_id,informed_time,sms,email,etr,rfo from nmc_task Where id='$id'");
//        $query=$this->db->query("select id,in_Occurred,tki,incident_for,type,Specification,Vendor,Name,scr_curt_id,informed_id,sms,email from nmc_task Where tki_status='0'order by id DESC");
       return $query->row(); 
    }
    
      public function edit_nmc_task_info_model($id,$date){
       
        $this->db->where('id',$id);
        $this->db->update('nmc_task',$date);    
    }
    
     public function edit_profile_model($e_id){
        
       $query = $this->db->query("select * from registration Where id='$e_id'");
       return $query->row(); 
    }
    
    public function update_user_info_model($e_id,$date){
        
       $this->db->where('id',$e_id);
       $this->db->update('registration',$date);  
    }
    
    public function save_citicication_info($data){
        
      $this->db->insert('crtfition_tbl', $data);   
    }

    public function pick_citifition_model($e_id){
        
        $query = $this->db->query("select * from crtfition_tbl where crat_id='$e_id' order by vdor,e_nam ASC");
        return $query->result_array();
    }
    
     public function crifiticate_category(){
            $query = $this->db->query("select * from category where Category_Purpose = 'certification' and Status = '1'  order by Indexx");
           return $query->result_array();

    }
    public function crifiticate_list_category(){
            $query = $this->db->query("select * from category where ( CateGory_name = 'vdor' or CateGory_name = 'dept' ) and Status = '1'  order by Indexx");
           return $query->result_array();
    }
    public function crificate_list1($vdor,$dept){
       $query = $this->db->query("select * from crtfition_tbl where vdor='$vdor' and dept='$dept' order by crt_name,vdor asc");
        return $query->result_array();  
    }
    public function crificate_list2($vdor){
       $query = $this->db->query("select * from crtfition_tbl where vdor='$vdor' order by dept,crt_name,vdor asc");
        return $query->result_array();  
    }
     public function crificate_list3($dept){
       $query = $this->db->query("select * from crtfition_tbl where dept='$dept' order by dept,crt_name,vdor asc");
        return $query->result_array();  
    }
    public function crificate_list4(){
        $query = $this->db->query("select * from crtfition_tbl order by dept,crt_name,vdor asc");
        return $query->result_array();
    }
    
     public function export_crificate_list1($vdor,$dept){
        $condition = "e.vdor =" . "'". $vdor . "'"." AND " . "e.dept = " . "'"  . $dept . "'";
        $this->db->select(array('e.vdor','e.ctftion_name','e.ctftion_id','e.levl', 'e.e_nam', 'e.ex_nbr','e.ctfition_dat','e.vlid_dat'));
        $this->db->from('crtfition_tbl as e');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result_array();
        
    }
     public function export_crificate_list2($vdor){
        $condition = "e.vdor =" . "'". $vdor . "'";
        $this->db->select(array('e.vdor','e.ctftion_name','e.ctftion_id','e.levl', 'e.e_nam', 'e.ex_nbr','e.ctfition_dat','e.vlid_dat'));
        $this->db->from('crtfition_tbl as e');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result_array();
        
    }
     public function export_crificate_list3($dept){
        $condition = "e.dept =" . "'". $dept . "'";
        $this->db->select(array('e.vdor','e.ctftion_name','e.ctftion_id','e.levl', 'e.e_nam', 'e.ex_nbr','e.ctfition_dat','e.vlid_dat'));
        $this->db->from('crtfition_tbl as e');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result_array();
        
    }
     public function export_crificate_list4(){
//        $condition = "e.vdor =" . "'". $vdor . "'"." AND " . "e.dept = " . "'"  . $dept . "'";
        $this->db->select(array('e.dept','e.crat_id','e.crt_name','e.vdor','e.ctftion_name','e.ctftion_id','e.levl', 'e.e_nam', 'e.ex_nbr','e.ctfition_dat','e.vlid_dat'));
        $this->db->from('crtfition_tbl as e');
//        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result_array();
        
    }
    public function save_hd_bulk($data){
         $this->db->insert('hd_bulk_sms', $data); 
    }
    
    public function nmc_tki_report($tki){
          $query = $this->db->query("select * from nmc_task Where tki='$tki'");
//        $query=$this->db->query("select id,in_Occurred,tki,incident_for,type,Specification,Vendor,Name,scr_curt_id,informed_id,sms,email from nmc_task Where tki_status='0'order by id DESC");
       return $query->row(); 
    }
    public function nmc_tki_crt_cls_report($tki){
        $query = $this->db->query("select create_time,tki,e_name,e_id,status from nmc_employee_tbl Where tki='$tki'");
        return $query->result_array();  
    }
    public function nmc_tki_comments_report($tki){
       $query = $this->db->query("select create_id,create_time,tki,comments from nmc_comments Where tki='$tki'");
       return $query->result_array();  
    }
    public function noc_tki_comments_report($tki){
       $query = $this->db->query("select * from new_comments_table Where ticket_no='$tki'");
       return $query->result_array();   
    }
     public function pick_cilent_info_model($Client_ID){
      
        if ( strstr( $Client_ID, 'L3R' ) ) {
                $query=$this->db3->query("select Client_Name,Category,BTS_Name,OLT_Name,PON,Port,MAC_Address,ONU_ID,ONU_Model,V_LAN,OLT_IP,Sl_Number,Status,Conect_LAN_Port from fonoc_subscriber_tbl where MQ_or_MIS_ID='$Client_ID' Order by OLT_Name ");
                return $query->row(); 
        } else if( strstr( $Client_ID, 'CC' ) ) {
                $query=$this->db3->query("select Client_Name,Category,BTS_Name,OLT_Name,PON,Port,MAC_Address,ONU_ID,ONU_Model,V_LAN,OLT_IP,Sl_Number,Status,Conect_LAN_Port from fonoc_subscriber_tbl where C_Code like '$Client_ID%' Order by OLT_Name ");
                return $query->row(); 
        }          
//     $query=$this->db3->query("select * from fonoc_subscriber_tbl where MQ_or_MIS_ID='$Client_ID'");
//     return $query->row();
//     return $query->result_array();
    }
    public function pre_fonoc_task_info_model ($Client_ID){
        $query = $this->db->query("select * from fonoc_task_list Where Client_ID='$Client_ID' and status ='Incomplete'");
       return $query->result_array();
    }

    public function update_image_model($id, $update_image_data) {
        $this->db->where('id', $id);
        $this->db->update('registration', $update_image_data);
    }
    
    public function pick_nmc_category_model($Incident_for,$Specification,$Vendor){
      
     if($Incident_for=='Backbone'){
         $query=$this->db->query("select Name from nmc_category Where type='$Incident_for' and Specification='$Specification' and Vendor='$Vendor' order by Name");
    
     }else if( $Incident_for=='Telco' || $Incident_for=='NTTN' || $Incident_for=='iMPLS' || $Incident_for=='Upstream' || $Incident_for=='BML_DC' ){
         $query=$this->db->query("select Name from nmc_category Where type='$Incident_for' and Vendor='$Vendor' order by Name");
    
     }else if( $Incident_for=='BTS' ){
          $query=$this->db3->query("select BTS_Name from fonoc_bts_tbl Order by BTS_Name ");
     }  
      return $query->result_array();
    }
    
    
    public function pick_BTS_Name($Zone){
        
       if($Zone=='Bogura'){
           $query=$this->db3->query("select BTS_Name from fonoc_bts_tbl where ( Division='RAJSHAHI' or  Division='RANGPUR' ) Order by BTS_Name ");   
       }else{
            $query=$this->db3->query("select BTS_Name from fonoc_bts_tbl where Division='$Zone' Order by BTS_Name ");
       }
        
        
         return $query->result_array();
    }

        public function nmc_bw_category(){
           $query = $this->db->query("select * from category where Category_Purpose = 'bw_u_categoy' and Status = '1'  order by Indexx");
           return $query->result_array();
    }
    
    public function pick_nmc_bwu_category_model($bw_type){
          $query=$this->db->query("select Name from nmc_category Where type='$bw_type' and Specification='BWU' order by Name");
          return $query->result_array();
    }
     public function save_nmc_bwu_model($data){
         $this->db->insert('nmc_bwu_tbl', $data); 
    }
    public function save_nmc_latancy_model($data){
         $this->db->insert('nmc_latancy_tbl', $data); 
    }
    
    
    public function pick_latancy_model(){

        $date=date("Y-m-d");
        
        $condition = "date =" . "'" . $date . "' order by date,time DESC";
        $this->db->select('*');
        $this->db->from('nmc_latancy_tbl');
        $this->db->where($condition);
        $query = $this->db->get();
                
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    public function pick_bw_model($bw_type){
        
        $date=date("Y-m-d");
        
        $condition = "date =" . "'" . $date . "'and type =" . "'" . $bw_type . "' order by time DESC";
        $this->db->select('*');
        $this->db->from('nmc_bwu_tbl');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result_array();        
        
        
//        if ($query->num_rows() > 0) {
//            return $query->result();
//        } else {
//            return false;
//        } 
    }
    public function checK_dublicate_bw_model($date,$time,$bw_type){
        
    
        
        $condition = "date =" . "'" . $date . "'and time =" . "'" . $time . "'and type =" . "'" . $bw_type . "'";
        $this->db->select('*');
        $this->db->from('nmc_bwu_tbl');
        $this->db->where($condition);
        $query = $this->db->get();
                
        if ($query->num_rows() > 0) {
            
            return $query->row();
        } else {
            return false;
        } 
    }
    
   public function update_bw_model($bw_type,$sub_type,$date,$time,$data){
       
         $condition = "date =" . "'" . $date . "' and time =" . "'" . $time . "'and type =" . "'" . $bw_type . "' and sub_type =". "'" . $sub_type . "'";
//        $this->db->where('type',$bw_type);
//        $this->db->where('sub_type',$sub_type);
//        $this->db->where('date',$date);
        $this->db->where($condition);
        $this->db->update('nmc_bwu_tbl',$data);
    }
 
    
    public function nmc_bwu_by_date($date_array){
     
//        echo 'TEST .....'.$type; 
//         
//     if( $type == 0 ){
         $condition ="date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' order by date,time,type,sub_type ASC ";

//     }else{
//        $condition = "type =" . "'". $type . "'"." AND " . "date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' order by id DESC";
// 
//     }    
       
        $this->db->select('*');
        $this->db->from('nmc_bwu_tbl');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    
    public function nmc_bwu_by_type_date($type,$date_array){
     
//        $condition = "type = " . "'". 'Link3' . "'"." AND " . "date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' order by id DESC"; 
        $condition = "type =" . "'". $type . "'"." AND " . "date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' order by date,time,type,sub_type ASC ";

        $this->db->select('*');
        $this->db->from('nmc_bwu_tbl');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }  
    }
    
     public function nmc_bwu_by_subtype_date($type,$sub_type,$date_array){
     
//        $condition = "type = " . "'". 'Link3' . "'"." AND " . "date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' order by id DESC"; 
        $condition = "type =" . "'". $type . "'"." AND " ."sub_type =" . "'". $sub_type . "'"." AND " . "date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' order by date,time,type,sub_type ASC ";

        $this->db->select('*');
        $this->db->from('nmc_bwu_tbl');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }  
    }

    

    public function nmc_latancy_by_date($date_array){
       
        $condition ="date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' order by date,time ASC";
        $this->db->select('*');
        $this->db->from('nmc_latancy_tbl');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
    }
    
    
public function returnItems($orderid){

      // set HTTP header
$headers = array('Content-Type: application/json',);

// the url of the API you are contacting to 'consume' 
//$url = 'https://someservice.com/jsonOrderItems/'.$orderid ; 

$url = 'https://203.76.110.131/link3api/frm_subscriber_info.aspx?api_user=31254&api_pass=WfaXq!2&subscriberid=17670' ; 
// Open connection
$ch = curl_init();

// Set the url, number of GET vars, GET data
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// Execute request
$result = curl_exec($ch);

// Close connection
curl_close($ch);

// get the result and parse to JSON
$items = json_decode($result);

echo '<br>MODEL<br>';
print_r($items);

if(isset($items)){ return $items ; }

else { return FALSE ; }


}// 


 public function nmc_downtime_report_by_date_model($date_array){        
        $start_time = $date_array['date1'];
        $end_time = $date_array['date2'];
        $query = $this->db->query("select sum(TIMESTAMPDIFF(SECOND,in_Occurred,in_Resolved)) as total_sec,Name from nmc_task where tki_status='1' and in_Resolved BETWEEN '$start_time' and '$end_time' group by Name order by total_sec,Name DESC");
        return $query->result_array();
    }
    
    public function nmc_group_Incident_model($Incident_Name,$date_array){
        $condition = "Name =" . "'" . $Incident_Name . "'". " AND " . "tki_status =" . "'". '1' . "'"." AND " . "in_Resolved  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select('id,type,Name,in_Occurred,in_Resolved,Duration,tki,Specification');
        $this->db->from('nmc_task');
        $this->db->where($condition);
        $query = $this->db->get();
                
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        } 
    }
    
     public function nmc_group_Incident_model_1($Incident_Name,$Specification,$date_array){
        $condition = "Name =" . "'" . $Incident_Name . "'". " AND " . "Specification =" . "'". $Specification . "'"." AND " . "tki_status =" . "'". '1' . "'"." AND " . "in_Resolved  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select('id,Name,type,in_Occurred,in_Resolved,Duration,tki,Specification');
        $this->db->from('nmc_task');
        $this->db->where($condition);
        $query = $this->db->get();
                
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        } 
    }
  
public function nmc_downtime_report_by_vendor($Vendor,$date_array){        
        $start_time = $date_array['date1'];
        $end_time = $date_array['date2'];
        $query = $this->db->query("select sum(TIMESTAMPDIFF(SECOND,in_Occurred,in_Resolved)) as total_sec,Name from nmc_task where tki_status='1' and Vendor='$Vendor' and in_Resolved BETWEEN '$start_time' and '$end_time' group by Name order by total_sec,Name DESC");
        return $query->result_array();
    }    
  
public function nmc_downtime_report_by_type($Incident_for,$date_array){        
        $start_time = $date_array['date1'];
        $end_time = $date_array['date2'];
        $query = $this->db->query("select sum(TIMESTAMPDIFF(SECOND,in_Occurred,in_Resolved)) as total_sec,Name from nmc_task where tki_status='1' and Incident_for='$Incident_for' and in_Resolved BETWEEN '$start_time' and '$end_time' group by Name order by total_sec,Name DESC");
        return $query->result_array();
} 

public function nmc_downtime_report_by_type_Specification($Incident_for,$Specification,$date_array){        
        $start_time = $date_array['date1'];
        $end_time = $date_array['date2'];
        $query = $this->db->query("select sum(TIMESTAMPDIFF(SECOND,in_Occurred,in_Resolved)) as total_sec,Name from nmc_task where tki_status='1' and Incident_for='$Incident_for'and Specification='$Specification' and in_Resolved BETWEEN '$start_time' and '$end_time' group by Name order by total_sec,Name DESC");
        return $query->result_array();
} 

public function nmc_downtime_report_by_type_vendor_Specification($Vendor,$Incident_for,$Specification,$date_array){        
        $start_time = $date_array['date1'];
        $end_time = $date_array['date2'];
        $query = $this->db->query("select sum(TIMESTAMPDIFF(SECOND,in_Occurred,in_Resolved)) as total_sec,Name from nmc_task where tki_status='1' and Vendor='$Vendor'and Incident_for='$Incident_for'and Specification='$Specification' and in_Resolved BETWEEN '$start_time' and '$end_time' group by Name order by total_sec,Name DESC");
        return $query->result_array();
}

public function nmc_downtime_report_by_type_vendor($Vendor,$Incident_for,$date_array){
    
        $start_time = $date_array['date1'];
        $end_time = $date_array['date2'];
        $query = $this->db->query("select sum(TIMESTAMPDIFF(SECOND,in_Occurred,in_Resolved)) as total_sec,Name from nmc_task where tki_status='1' and Incident_for='$Incident_for'and Vendor='$Vendor' and in_Resolved BETWEEN '$start_time' and '$end_time' group by Name order by total_sec,Name DESC");
        return $query->result_array();
}

public function nmc_downtime_report_by_type_vendor_name($Vendor,$Incident_for,$Name,$date_array){
   
    $start_time = $date_array['date1'];
    $end_time = $date_array['date2'];
    $query = $this->db->query("select sum(TIMESTAMPDIFF(SECOND,in_Occurred,in_Resolved)) as total_sec,Name from nmc_task where tki_status='1' and Incident_for='$Incident_for'and Vendor='$Vendor' and Name='$Name' and in_Resolved BETWEEN '$start_time' and '$end_time' group by Name order by total_sec,Name DESC");
    return $query->result_array();
}

public function pick_mq_client_info($Client_ID) {
    $query=$this->db4->query("select user_id,F_Name,L_Name,MOBILE,Email,Address,ZIP,City,package,stats from JCON where user_id='$Client_ID'");
    return $query->row(); 
}

}
