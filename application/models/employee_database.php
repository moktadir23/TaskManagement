<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee_Database extends CI_Controller {
    
    
     public function FI_type_task_dashbroad_model(){
              
        $query=$this->db->query("select p_key,type_task,Support_Office,Zone,
                                sum(case when type_task = 'Installation' then 1 else 0 end) Installation,
                                sum(case when type_task = 'Shifting' then 1 else 0 end) Shifting,
                                sum(case when type_task = 'Troubleshoot' then 1 else 0 end) Troubleshoot
                                from fi_task_tbl where work_status='pending' group by Support_Office ORDER BY Support_Office ASC");        
        return $query->result_array(); 
    }
    
     public function FI_done_task_dashbroad_model(){
        
        $start_time=date("Y-m-d 00:00:00");
        $end_time=date("Y-m-d 23:59:59");        
        $query=$this->db->query("select p_key,type_task,Support_Office,Zone,
                                sum(case when type_task = 'Installation' then 1 else 0 end) Installation,
                                sum(case when type_task = 'Shifting' then 1 else 0 end) Shifting,
                                sum(case when type_task = 'Troubleshoot' then 1 else 0 end) Troubleshoot
                                from fi_task_tbl where work_status='done' and  e_date BETWEEN '$start_time' and '$end_time' group by Support_Office ORDER BY Support_Office ASC");        
        return $query->result_array(); 
    }
    
     public function ipts_Details_model(){
        $start_time=date("Y-m-d 00:00:00");
        $end_time=date("Y-m-d 23:59:59");
        $query=$this->db->query("select Engineer_ID,Engineer_Name,
                                sum(case when status = 'Pending' then 1 else 0 end) pending,
                                sum(case when status = 'Done' and e_date BETWEEN '$start_time' and '$end_time' then 1 else 0 end) done
                                from ipts_task_tbl group by Engineer_ID");
        
        return $query->result_array(); 

    }
    
     public function Wi_Details_model(){
        $start_time=date("Y-m-d 00:00:00");
        $end_time=date("Y-m-d 23:59:59");
        $query=$this->db->query("select Engineer_ID,Engineer_Name,zone_of_employee,
                                sum(case when status = 'pending' then 1 else 0 end) pending,
                                sum(case when status = 'Done' and e_date BETWEEN '$start_time' and '$end_time' then 1 else 0 end) done
                                from wi_task_tbl group by Engineer_ID");
        
        return $query->result_array(); 

    }
    


    public function ERT_dashbroad_model(){
        $start_time=date("Y-m-d 00:00:00");
        $end_time=date("Y-m-d 23:59:59");        
        $query=$this->db->query("select p_key,employee_id,employee_name,Zone,
                                sum(case when ONU_opration_status = '0' then 1 else 0 end) pending,
                                sum(case when ONU_opration_status = '1' and e_date BETWEEN '$start_time' and '$end_time' then 1 else 0 end) done
                                from ert_task_list group by employee_name ORDER BY employee_name ASC");        
        return $query->result_array();  

    }
    
    public function ERT_type_task_dashbroad_model(){
        
        $start_time=date("2019-01-01 00:00:00");
        $end_time=date("Y-m-d 23:59:59");        
        $query=$this->db->query("select p_key,Zone,Status,
                                sum(case when Zone = 'Bogura' then 1 else 0 end) Bogra,
                                sum(case when Zone = 'CTG' then 1 else 0 end) CTG,
                                sum(case when Zone = 'Dhaka' then 1 else 0 end) Dhaka,
                                sum(case when Zone = 'Khulna' then 1 else 0 end) Khulna,
                                sum(case when Zone = 'Sylhet' then 1 else 0 end) Sylhet
                                from ert_task_list where ( ONU_opration_status=1 or ONU_opration_status=0 ) and e_date BETWEEN '$start_time' and '$end_time'   group by Status ORDER BY Status ASC");        
        return $query->result_array(); 
    }
    
    
     public function ERT_distributor_model(){
        
        $start_time=date("2019-01-01 00:00:00");
        $end_time=date("Y-m-d 23:59:59");        
        $query=$this->db->query("select p_key,Distributor,Status,
                                sum(case when Status = 'Active' then 1 else 0 end) Active,
                                sum(case when Status = 'Collected' then 1 else 0 end) Collected,
                                sum(case when Status = 'Device lost' then 1 else 0 end) Device_lost
                                from ert_task_list where ( ONU_opration_status=1 or ONU_opration_status=0 ) and  Client_Category='Distributor'  and e_date BETWEEN '$start_time' and '$end_time'   group by Distributor ORDER BY Distributor ASC");        
        return $query->result_array(); 
    }
    
    public function show_all_data() {
        $this->db->select('*');
        $this->db->from('employee_info');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function show_data_by_id($id) {
        $condition = "emp_id =" . "'" . $id . "'";
        $this->db->select('*');
        $this->db->from('employee_info');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function show_data_by_date($date) {
        $condition = "emp_date_of_join =" . "'" . $date . "'";
        $this->db->select('*');
        $this->db->from('employee_info');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function show_data_by_date_range($data) {
        $condition = "emp_date_of_join  BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'";
        $this->db->select('*');
        $this->db->from('employee_info');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
// ................................. FONOC .................................................................   
    public function record_count_pending(){
       
        return $this->db->count_all("task_info_table");
        
//        .......CS_pend_list_record_count.............................
//       $status='Still Running';
//       $condition = "CS_status_of_TKI =" . "'" . $status . "'";
//       $query = $this->db->query("select p_key from cs_task_list where " . $condition);
//       return $query->result_array(); 
        
        
    }
    
     public function pending_task_with_Pagination_model($per_page, $offset) {
        $this->db->select('*');
        $this->db->from('fonoc_task_list');
        $this->db->where('status','Pending');
        $query = $this->db->get('', $per_page, $offset);
        $data=$query->result();
//        foreach ($query->result() as $row)
//            $data[] = $row;
        return $data;   
     }
    
    public function edit__task_done_model($ticket_no){
            
        $query=$this->db->query("select * from fonoc_task_list Where p_key=$ticket_no");
        return $query->row_array();         
    }
    
    public function fonoc_working_task_model($ticket_no,$data){
          
        $this->db->where('p_key',$ticket_no);
        $this->db->where("work_status = '0'");
        $this->db->update('fonoc_task_list',$data);
       
//        $query=$this->db->query("select * from fonoc_task_list Where p_key=$ticket_no");
//        return $query->row_array();         
    }
public function fonoc_revise_task_model($ticket_no,$data){
          
        $this->db->where('p_key',$ticket_no);
        $this->db->where("work_status = '1'");
        $this->db->update('fonoc_task_list',$data);
       
//        $query=$this->db->query("select * from fonoc_task_list Where p_key=$ticket_no");
//        return $query->row_array();         
    }
    public function fonoc_update_task_done_model($ticket_no, $data){
            
            $this->db->where('p_key',$ticket_no);
            $this->db->update('fonoc_task_list',$data);  
   }
   
   public function fonoc_done_task_with_Pagination_model($per_page, $offset) {
        $this->db->select('*');
        $this->db->from('fonoc_task_list');
        $this->db->where('status','Done');
        $query = $this->db->get('', $per_page, $offset);
        $data=$query->result();
//        foreach ($query->result() as $row)
//            $data[] = $row;
        return $data;   
     }
     
     public function FONOC_dashbroad_model(){
        $start_time=date("Y-m-d 00:00:00");
        $end_time=date("Y-m-d 23:59:59");        
        $query=$this->db->query("select p_key,employee_id,employee_name,zone,
                                sum(case when status = 'Pending' and create_from = 'MQ_R_generated' then 1 else 0 end) pending,
                                sum(case when status in('Update','Done','Forwarded to CS','Forwarded to NOC','Forwarded to FI','Forward') and end_date BETWEEN '$start_time' and '$end_time' then 1 else 0 end) done
                                from fonoc_task_list group by employee_id ORDER BY employee_id ASC");        
        return $query->result_array(); 
    } 
    
     public function FONOC_zonetask_summery_model(){
        $start_time=date("Y-m-d 00:00:00");
        $end_time=date("Y-m-d 23:59:59");        
        $query=$this->db->query("select p_key,engineer_zone,
                                sum(case when task_type = 'Installation' then 1 else 0 end) Installation,
                                sum(case when task_type = 'Troubleshoot' then 1 else 0 end) Troubleshoot,
                                sum(case when task_type = 'Shifting' then 1 else 0 end) Shifting,
                                sum(case when task_type = 'MAC_Change' then 1 else 0 end) MAC_Change,
                                sum(case when task_type = 'Status_Check' then 1 else 0 end) Status_Check,
                                sum(case when task_type = 'Other' then 1 else 0 end) Other
                                from fonoc_task_list where work_status in ('0','1') and status='Pending' and engineer_zone is not null group by engineer_zone ORDER BY engineer_zone ASC");        
        return $query->result_array(); 
    }
    
    
    public function FONOC_zonetask_donesummery_model(){
        $start_time=date("Y-m-d 00:00:00");
        $end_time=date("Y-m-d 23:59:59");        
        $query=$this->db->query("select p_key,engineer_zone,
                                sum(case when task_type = 'Installation' then 1 else 0 end) Installation,
                                sum(case when task_type = 'Troubleshoot' then 1 else 0 end) Troubleshoot,
                                sum(case when task_type = 'Shifting' then 1 else 0 end) Shifting,
                                sum(case when task_type = 'MAC_Change' then 1 else 0 end) MAC_Change,
                                sum(case when task_type = 'Status_Check' then 1 else 0 end) Status_Check,
                                sum(case when task_type = 'Other' then 1 else 0 end) Other,
                                sum(case when create_from = 'MQ_R_generated' then 1 else 0 end) gt_op
                                from fonoc_task_list where status='Done' and end_date between '$start_time' and '$end_time' and engineer_zone is not null group by engineer_zone ORDER BY engineer_zone ASC");        
        return $query->result_array(); 
    }
    
    public function fonoc_done_zone_model($zone,$type){
        $start_time=date("Y-m-d 00:00:00");
        $end_time=date("Y-m-d 23:59:59");
        if($type=='all'){
             $condition = "engineer_zone =" . "'" . $zone . "'";
         }else if($type=='gt_op'){
             $condition = "engineer_zone =" . "'" . $zone . "'" . " AND " . "create_from =" . "'". 'MQ_R_generated' . "'";
         }else{
             $condition = "engineer_zone =" . "'" . $zone . "'" . " AND " . "task_type =" . "'". $type . "'";
         }
            
        $this->db->select('*');
        $this->db->from('fonoc_task_list');
        $this->db->where($condition);
        $this->db->where("status in ('Done','Forwarded to CS','Forwarded to SDD','Forwarded to FI','Forwarded to NOC','Forward','Update') and end_date  between '$start_time' and '$end_time' order by employee_id");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        } 
        
    }
    
    public function FONOC_task_category(){
        
        $query = $this->db->query("select * from category where Category_Purpose = 'FONOC_category_task' and Status = '1'  order by Indexx");
        return $query->result_array();
        
    }
    
    public function fonoc_pending_data_by_id_model($search_id){
        
        $condition = "employee_id =" . "'" . $search_id . "'";
        $this->db->select('*');
        $this->db->from('fonoc_task_list');
        $this->db->where($condition);
        $this->db->where("status = 'Pending'");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        } 
        
    }
    
     public function fonoc_pending_zone_model($zone,$type){
         
         if($type=='all'){
             $condition = "engineer_zone =" . "'" . $zone . "'" . " AND " . "create_from =" . "'". 'Daily Task' . "'";
         }else{
             $condition = "engineer_zone =" . "'" . $zone . "'" . " AND " . "task_type =" . "'". $type . "'";
         }
            
        $this->db->select('*');
        $this->db->from('fonoc_task_list');
        $this->db->where($condition);
        $this->db->where("status = 'Pending' and work_status in ('0','1')");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        } 
        
    }
    
    

    public function select_fonoc_id(){
//           $query = $this->db->query("select * from category where Category_Purpose = 'FONOC_id' and Status = '1'  order by Indexx");
 
           $query = $this->db->query("select id,name from registration where department like '%FONOC%' and User_Status='1' order by name ");
           return $query->result_array();   
    }
    
     public function fonoc_done_data_by_id_model($search_id,$date_array){
        
        $condition = "employee_id =" . "'" . $search_id . "'". " AND " . "( status =" . "'". 'Update' . "'"." OR " . "status =" . "'". 'Done' . "'"." OR " . "status =" . "'". 'Forwarded to NOC' . "'" . " OR " . "status =" . "'". 'Forwarded to FI' . "'" . " OR " .  "status =" . "'". 'Forwarded to CS' . "'"." OR " . "status =" . "'". 'Forward' . "'".") AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";       
        $this->db->select('*');
        $this->db->from('fonoc_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        } 
        
    }
    
    function FONOC_excel_done_task_List_by_Engineer_ID($Engineer_ID,$date_array){
//        $condition = "e.employee_id =" . "'" . $Engineer_ID . "'". " AND ". "( e.status =" . "'". 'Done' . "'"." OR " . "e.status =" . "'". 'Forwarded to FI' . "'" . " OR " .  "e.status =" . "'". 'Forwarded to CS' . "'"." OR " . "e.status =" . "'". 'Forward' . "'".") AND " . "e.end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//        $Engineer_ID='L3T1788';
        $condition = "e.employee_id =" . "'" . $Engineer_ID . "'"." AND " . "( e.status =" . "'". 'Update' . "'"." OR " . "e.status =" . "'". 'Done' . "'"." OR " . "e.status =" . "'". 'Forwarded to FI' . "'" . " OR " .  "e.status =" . "'". 'Forwarded to NOC' . "'"." OR " .  "e.status =" . "'". 'Forwarded to CS' . "'"." OR " . "e.status =" . "'". 'Forward' . "'".") AND " ."e.end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
      
        $this->db->select(array('e.employee_id','e.employee_name', 'e.BTS_Name', 'e.OLT_Name','e.ONU_Model','e.Client_ID','e.Client_Category', 'e.Problem_Catagory','e.start_date','e.end_date','e.comments','e.status'));
        $this->db->from('fonoc_task_list as e');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    
    
    public function fonoc_done_by_Eng_ID_summery_model($Engineer_ID,$date_array){
//      $query = $this->db->query("select * from wi_task_tbl where status='Done' and Status = '1'  order by Indexx");
//       return $query->result_array();   
       
        $condition = "employee_id =" . "'" . $Engineer_ID . "'". " AND " .  "( status =" . "'". 'Update' . "'"." OR " . "status =" . "'". 'Done' . "'"." OR " . "status =" . "'". 'Forwarded to NOC' . "'"." OR " . "status =" . "'". 'Forwarded to CS' . "'"." OR " .  "status =" . "'". 'Forwarded to FI' . "'"." OR " . "status =" . "'". 'Forward' . "'".") AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' GROUP BY Problem_Catagory ORDER BY Problem_Catagory";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('Problem_Catagory,count(p_key) as task_number');
        $this->db->from('fonoc_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
     public function fonoc_done_by_date_summery_model($date_array,$zone){
        if($zone=='0'){
        $condition = "( status =" . "'". 'Update' . "'"." OR " . "status =" . "'". 'Forwarded to NOC' . "'"." OR " ."status =" . "'". 'Forwarded to SDD' . "'"." OR " ."status =" . "'". 'Forwarded to FI' . "'"." OR " ."status =" . "'". 'Incomplete' . "'"." OR " ."status =" . "'". 'Done' . "'"." OR " . "status =" . "'". 'Forwarded to CS' . "'"." OR " . "status =" . "'". 'Forward' . "'".") AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' GROUP BY Problem_Catagory ORDER BY Problem_Catagory";
        }else{
        $condition = "zone =" . "'". $zone . "'"." AND " . "( status =" . "'". 'Update' . "'"." OR " . "status =" . "'". 'Forwarded to NOC' . "'"." OR " ."status =" . "'". 'Forwarded to SDD' . "'"." OR " ."status =" . "'". 'Forwarded to FI' . "'"." OR " ."status =" . "'". 'Incomplete' . "'"." OR " ."status =" . "'". 'Done' . "'"." OR " . "status =" . "'". 'Forwarded to CS' . "'"." OR " . "status =" . "'". 'Forward' . "'".")AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' GROUP BY Problem_Catagory ORDER BY Problem_Catagory";            
        }
        $this->db->select('Problem_Catagory,count(p_key) as task_number');
        $this->db->from('fonoc_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    
     public function efonoc_report_by_date($date_array,$zone){
        if($zone=='0'){
        $condition = "e.end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        }else{
        $condition = "e.Zone =" . "'"  . $zone . "'" . " AND " . "e.end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
             
        }
        $this->db->select(array('e.employee_id','e.employee_name','e.BTS_Name','e.OLT_Name','e.PON','e.Port','e.ONU_Model', 'e.Client_ID','e.Client_Category', 'e.Problem_Catagory', 'e.start_date', 'e.end_date', 'e.comments'));
   
        $this->db->from('fonoc_task_list as e');
        $this->db->where($condition.' order by BTS_Name,OLT_Name,Problem_Catagory ASC');
        $query = $this->db->get();
        return $query->result_array();   
    }
  
    
    public function fonoc_done_by_date_model($date_array){
        
        $condition = "( status =" . "'". 'Update' . "'"." OR " . "status =" . "'". 'Done' . "'"." OR " . "status =" . "'". 'Forwarded to CS' . "'"." OR " . "status =" . "'". 'Forward' . "'".") AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' ORDER BY Problem_Catagory";       
        $this->db->select('*');
        $this->db->from('fonoc_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        } 
        
    }
    
     public function fonoc_install_date_model($date_array,$zone){
        
        if($zone=='0'){
        $condition =  "Problem_Catagory =" . "'". 'Installation' . "'"." AND " ."status =" . "'". 'Done' ."'". " AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";       
        }else{
        $condition =  "zone =" . "'". $zone . "'"." AND " ."Problem_Catagory =" . "'". 'Installation' . "'"." AND " ."status =" . "'". 'Done' ."'". " AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";                   
        }
        $query=$this->db->query("select zone,Client_Category,
                                sum(case when Client_Category = 'BANK' then 1 else 0 end) BANK,
                                sum(case when Client_Category = 'NBFI' then 1 else 0 end) NBFI,
                                sum(case when Client_Category = 'CORPORATE' then 1 else 0 end) CORPORATE,
                                sum(case when Client_Category = 'COMPLEMENTARY' then 1 else 0 end) COMPLEMENTARY,
                                sum(case when Client_Category = 'RETAIL' then 1 else 0 end) RETAIL,
                                sum(case when Client_Category = 'RETAIL(CORPORATION)' then 1 else 0 end) RETAIL_CORPORATION,
                                sum(case when Client_Category = 'RETAIL (HOME)' then 1 else 0 end) RETAIL_HOME,
                                sum(case when Client_Category = 'RETAIL (SOHO)' then 1 else 0 end) RETAIL_SOHO,
                                sum(case when Client_Category = 'SECURITIES(CSE)' then 1 else 0 end) SECURITIES_CSE,
                                sum(case when Client_Category = 'SECURITIES(DSE)' then 1 else 0 end) SECURITIES_DSE,
                                sum(case when Client_Category = 'STRATEGIC INITIATIVE' then 1 else 0 end) STRATEGIC_INITIATIVE
                                from fonoc_task_list where ( $condition ) ");        
        return $query->result_array();
        
        
    }
    
     public function fonoc_ts_date_model($date_array,$zone){
          
        if($zone=='0'){
        $condition =  "Problem_Catagory !=" . "'". 'Installation' . "'"." AND " ."status =" . "'". 'Done' ."'". " AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";       
        }else{
        $condition =  "zone=" . "'". $zone . "'"." AND " ."Problem_Catagory !=" . "'". 'Installation' . "'"." AND " ."status =" . "'". 'Done' ."'". " AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";       
            
        }
        $query=$this->db->query("select zone,Problem_Catagory,
                                sum(case when Problem_Catagory = 'Accessnet' then 1 else 0 end) Accessnet,
                                sum(case when Problem_Catagory = 'Accessnet CR' then 1 else 0 end) Accessnet_CR,
                                sum(case when Problem_Catagory = 'Accessnet SR' then 1 else 0 end) Accessnet_SR,
                                sum(case when Problem_Catagory = 'Accessnet Troubleshoot' then 1 else 0 end) Accessnet_Troubleshoot,
                                sum(case when Problem_Catagory = 'CR' then 1 else 0 end) CR,
                                sum(case when Problem_Catagory = 'Device Migration' then 1 else 0 end) Device_Migration,
                                sum(case when Problem_Catagory = 'Faulty ONU Check' then 1 else 0 end) Faulty_ONU_Check,
                                sum(case when Problem_Catagory = 'Link Redundancy' then 1 else 0 end) Link_Redundancy,
                                sum(case when Problem_Catagory = 'Lock_or_Unlock' then 1 else 0 end) Lock_or_Unlock,
                                sum(case when Problem_Catagory = 'MAC change' then 1 else 0 end) MAC_change,
                                sum(case when Problem_Catagory = 'IP Change' then 1 else 0 end) IP_Change,
                                sum(case when Problem_Catagory = 'IPTV Troubleshoot' then 1 else 0 end) IPTV_Troubleshoot,
                                sum(case when Problem_Catagory = 'Migration' then 1 else 0 end) Migration,
                                sum(case when Problem_Catagory = 'MIS TKI' then 1 else 0 end) MIS_TKI,
                                sum(case when Problem_Catagory = 'MRTG' then 1 else 0 end) MRTG,
                                sum(case when Problem_Catagory = 'Others' then 1 else 0 end) Others,
                                sum(case when Problem_Catagory = 'Package Active' then 1 else 0 end) Package_Active,
                                sum(case when Problem_Catagory = 'Planing' then 1 else 0 end) Planing,
                                sum(case when Problem_Catagory = 'OLT Troubleshoot' then 1 else 0 end) OLT_Troubleshoot,
                                sum(case when Problem_Catagory = 'Package Upgrade' then 1 else 0 end) Package_Upgrade,
                                sum(case when Problem_Catagory = 'Reactive' then 1 else 0 end) Reactive,
                                sum(case when Problem_Catagory = 'Rechecked' then 1 else 0 end) Rechecked,
                                sum(case when Problem_Catagory = 'Released Device Collectation List' then 1 else 0 end) Released_Device_Collectation_List,
                                sum(case when Problem_Catagory = 'Reporting Work' then 1 else 0 end) Reporting_Work,
                                sum(case when Problem_Catagory = 'Retail TKI' then 1 else 0 end) Retail_TKI,
                                sum(case when Problem_Catagory = 'Routing/Switching' then 1 else 0 end) Routing_Switching,
                                sum(case when Problem_Catagory = 'Shifting' then 1 else 0 end) Shifting,
                                sum(case when Problem_Catagory = 'SR' then 1 else 0 end) SR,
                                sum(case when Problem_Catagory = 'Status check' then 1 else 0 end) Status_check,
                                sum(case when Problem_Catagory = 'Troubleshoot' then 1 else 0 end) Troubleshoot
                                from fonoc_task_list where ( $condition ) ");        
        return $query->result_array();
        
    }
    public function save_fonoc_task_info_model($data){
        
          $this->db->insert( 'fonoc_task_list',$data); 
    }
    public function save_fonoc_daliytask_info_model($data){
        
          $this->db->insert( 'fonoc_task_list',$data); 
    }
    
//    public function fonoc_pick_info_model($ticket_no){
//       $query=$this->db->query("select * from fonoc_task_list Where p_key=$ticket_no");
//       return $query->row_array();  
//    }
}
