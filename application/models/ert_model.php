<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ert_Model extends CI_Controller {
   
    public function ert_assign_task_page_category(){
            $query = $this->db->query("select * from category where Category_Purpose = 'ert_assign_task' and Status = '1'  order by Indexx");
           return $query->result_array();

        }
    
    public function ERT_pick_pending_task(){
     
    $query=$this->db->query("select * from ert_task_list Where Status='Follow up' or Status='Scheduled' "
            . "or Status='Re-active later' or Status='No response' or Status='Device not in record' or "
            . "Status='Denied to return' or Status='Refund claimed' or Status='Need to contact later'"
            . " or Status='Documentation' or Status='Forwarded to Other team' ");
    return $query->result_array();  
    }

 public function ert_pending_list_record_count(){
     
    $query=$this->db->query("select p_key from ert_task_list Where Status='Follow up' or Status='Scheduled' "
            . "or Status='Re-active later' or Status='No response' or Status='Device not in record' or "
            . "Status='Denied to return' or Status='Refund claimed' or Status='Need to contact later'"
            . " or Status='Documentation' or Status='Forwarded to Other team'");
    return $query->result_array();  
    }
    
 public function ERT_Pagination_pending_model($per_page, $offset) {
        $this->db->select('*');
        $this->db->from('ert_task_list');
        $this->db->where('Status','Need to contact later');
//        $this->db->where('Status','Scheduled');
//        $this->db->where('Status','Re-active later');
//        $this->db->where('Status','No response');
//        $this->db->where('Status','Device not in record');
//        $this->db->where('Status','Documentation');
//        $this->db->where('Status','Forwarded to Other team');
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data;
        
    }

 public function ERT_distributo_search_model($date_array){
        
        $start_time=$date_array['date1'];
        $end_time=$date_array['date2'];      
//        $data['date1'] 
        
        
        $query=$this->db->query("select p_key,Distributor,Status,
                                sum(case when Status = 'Active' then 1 else 0 end) Active,
                                sum(case when Status = 'Collected' then 1 else 0 end) Collected,
                                sum(case when Status = 'Device lost' then 1 else 0 end) Device_lost
                                from ert_task_list where ( ONU_opration_status=1 or ONU_opration_status=0 ) and  Client_Category='Distributor'  and e_date BETWEEN '$start_time' and '$end_time'   group by Distributor ORDER BY Distributor ASC");        
        return $query->result_array(); 
    }
    
        
    public function CS_pick_done_task(){
        
    $query=$this->db->query("select * from ert_task_list Where Status='Active' or Status='Collected' or Status='Device lost'");
    return $query->result_array();   
    
    }

    



    public function save_task_info_model($data){
            $this->db->insert( 'ert_task_list',$data); 
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
    
    public function ERT_view_comments_model($p_key){
            $query=$this->db->query("select * from ert_comments_tbl Where p_key=$p_key");
            return $query->result_array();
    }
    
    public function ERT_pick_status_catogry(){
      
          $query = $this->db->query("select * from category where Category_Purpose = 'ert_comments' and Status = '1'  order by Indexx");
          return $query->result_array();

        }
        
    public function ERT_pick_p_key($p_key){
     
    $query=$this->db->query("select * from ert_task_list Where p_key='$p_key'");
    return $query->row();   
    }    
        
        public function ERT_update_new_comments_model($c_data){
                     $this->db->insert( 'ert_comments_tbl',$c_data);
        }
        public function ERT_update_status_model($p_key,$data){
            
            $this->db->where('p_key',$p_key);
            $this->db->update('ert_task_list',$data);
        }
        public function ERT_pick_done_task(){
           
             $query=$this->db->query("select * from ert_task_list Where Status='Active' or Status='Collected' "
            . "or Status='Device lost'");
           return $query->result_array();  
        }
     public function ERT_pending_list_by_Engineer_ID_model($Engineer_ID,$date_array){
              
      $condition = "employee_id =" . "'" . $Engineer_ID . "'". " AND " . "ONU_opration_status =" . "'". '0' . "'"." AND " . "s_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('*');
        $this->db->from('ert_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }    

     public function ERT_pending_list_by_sub_zone_model($Sub_Zone,$date_array){
              
      $condition = "Sub_Zone =" . "'" . $Sub_Zone . "'". " AND " . "ONU_opration_status =" . "'". '0' . "'"." AND " . "s_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'"; 
        $this->db->select('*');
        $this->db->from('ert_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    public function ERT_pending_list_by_zone_model($Zone,$date_array){
              
      $condition = "Zone =" . "'" . $Zone . "'". " AND " . "ONU_opration_status =" . "'". '0' . "'"." AND " . "s_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'"; 
        $this->db->select('*');
        $this->db->from('ert_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    
    public function ERT_pending_list_by_status_zone_model($status,$Zone,$date_array){
              
      $condition = "Status =" . "'" . $status . "'". " AND " ."Zone =" . "'" . $Zone . "'". " AND " . "ONU_opration_status =" . "'". '0' . "'"." AND " . "s_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'"; 
        $this->db->select('*');
        $this->db->from('ert_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
     public function ERT_pending_list_by_status_sub_zone_model($status,$Sub_Zone,$date_array){
              
      $condition = "Status =" . "'" . $status . "'". " AND " ."Sub_Zone =" . "'" . $Sub_Zone . "'". " AND " . "ONU_opration_status =" . "'". '0' . "'"." AND " . "s_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'"; 
        $this->db->select('*');
        $this->db->from('ert_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    
    public function ERT_done_list_by_Engineer_ID_model($Engineer_ID,$date_array){
     
        $condition = "employee_id =" . "'" . $Engineer_ID . "'". " AND " . "ONU_opration_status =" . "'". '1' . "'"." AND " . "e_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('*');
        $this->db->from('ert_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
    }
    
    public function ERT_done_list_by_sub_zone_model($Sub_Zone,$date_array){
      
         $condition = "Sub_Zone =" . "'" . $Sub_Zone . "'". " AND " . "ONU_opration_status =" . "'". '1' . "'"." AND " . "e_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'"; 
        $this->db->select('*');
        $this->db->from('ert_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    
     public function ERT_done_list_by_sub_zone_distributor_model($Sub_Zone,$Distributor,$date_array){
      
         $condition = "Sub_Zone =" . "'" . $Sub_Zone . "'". " AND " . "Distributor =" . "'" . $Distributor . "'". " AND " . "ONU_opration_status =" . "'". '1' . "'"." AND " . "e_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'"; 
        $this->db->select('*');
        $this->db->from('ert_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    
     public function ERT_done_list_search_by_zone_model($Zone,$date_array){
      
         $condition = "Zone =" . "'" . $Zone . "'". " AND " . "ONU_opration_status =" . "'". '1' . "'"." AND " . "e_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'"; 
        $this->db->select('*');
        $this->db->from('ert_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    
     public function ERT_done_list_search_by_all_zone_model($date_array){
      
         $condition = "ONU_opration_status =" . "'". '1' . "'"." AND " . "e_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'"; 
        $this->db->select('*');
        $this->db->from('ert_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
     public function ERT_done_list_by_status_n_zone_model($status,$Zone,$date_array){
      
         $condition = "Status =" . "'" . $status . "'". " AND " ."Zone =" . "'" . $Zone . "'". " AND " . "ONU_opration_status =" . "'". '1' . "'"." AND " . "e_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'"; 
        $this->db->select('*');
        $this->db->from('ert_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    
     public function ERT_done_list_by_status_n_all_zone_model($status,$date_array){
      
         $condition = "Status =" . "'" . $status . "'". " AND " . "ONU_opration_status =" . "'". '1' . "'"." AND " . "e_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'"; 
        $this->db->select('*');
        $this->db->from('ert_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    
     public function ERT_done_by_status_n_sub_zone_model($status,$Sub_Zone,$date_array){
      
         $condition = "Status =" . "'" . $status . "'". " AND " ."Sub_Zone =" . "'" . $Sub_Zone . "'". " AND " . "ONU_opration_status =" . "'". '1' . "'"." AND " . "e_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'"; 
        $this->db->select('*');
        $this->db->from('ert_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        
//        mok
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    
    
     public function ERT_done_by_status_n_sub_zone_n_distributor_model($status,$Sub_Zone,$Distributor,$date_array){
      
        $condition = "Status =" . "'" . $status . "'". " AND " ."Distributor =" . "'" . $Distributor . "'". " AND " ."Sub_Zone =" . "'" . $Sub_Zone . "'". " AND " . "ONU_opration_status =" . "'". '1' . "'"." AND " . "e_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'"; 
        $this->db->select('*');
        $this->db->from('ert_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        
//        mok
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    
     public function ERT_visit_count_by_zone_model($Zone,$date_array){
      
        $condition = "Zone =" . "'" . $Zone . "'". " AND " . "comments_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'group by comments_date"; 
        $this->db->select('p_key,support_type');
        $this->db->from('ert_comments_tbl');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
            return $query->result_array(); 
        } else {
            return false;
        }
     }    
     
//     public function ERT_visit_count_by_id_model($Engineer_ID,$date_array){
//      
//        $condition = "employee_id =" . "'" . $Engineer_ID . "'". " AND " . "comments_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'"; 
//        $this->db->select('p_key,support_type');
//        $this->db->from('ert_comments_tbl');
//        $this->db->where($condition);
//        $query = $this->db->get();
//        
//        
//        if ($query->num_rows() > 0) {
//            return $query->result_array(); 
//        } else {
//            return false;
//        }
//     }
     
      public function ERT_visit_count_by_id_model($Engineer_ID,$date_array){
      
        $condition = "employee_id =" . "'" . $Engineer_ID . "'". " AND " . "comments_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' GROUP BY support_type ORDER BY support_type,p_key"; 
//        $this->db->select('p_key,support_type');
        $this->db->select('support_type,count(p_key) as task_number,p_key');
        $this->db->from('ert_comments_tbl');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
            return $query->result_array(); 
        } else {
            return false;
        }
     }

     
     
     
     
     public function ERT_visit_count_by_all_zone_model($date_array){
      
        $condition ="comments_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' group by comments_date"; 
        $this->db->select('p_key,support_type');
        $this->db->from('ert_comments_tbl');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
            return $query->result_array(); 
        } else {
            return false;
        }  
     }    
//................................................................................................
//        $condition = "Zone =" . "'" . $Zone . "'". " AND " ."support_type =" . "'" . 'Field' . "'". " AND " . "comments_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'"; 
//        $this->db->select('COUNT(p_key) AS `counter`,`employee_id`');
//        $this->db->from('ert_comments_tbl GROUP BY `employee_id`');
//        $this->db->where($condition);
//        $query = $this->db->get();
//        
//        
//        if ($query->num_rows() > 0) {
//            return $query->result_array(); 
//        } else {
//            return false;
//        }        
//        ccc
//SELECT COUNT(column_name) AS `counter`, column_name 
//FROM tablename 
//GROUP BY column_name 
//WHERE COUNT(column_name) = 1   
         
//$query=$this->db->query("select COUNT(p_key) AS counter,employee_id from ert_comments_tbl GROUP BY employee_id Where support_type='Field'");
//return $query->result_array();     
         
    
    
    public function ERT_visit_count_by_sub_zone_model($Sub_Zone,$date_array){
      
        $condition = "Sub_Zone =" . "'" . $Sub_Zone . "'". " AND " . "comments_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'group by comments_date"; 
        $this->db->select('p_key,support_type');
        $this->db->from('ert_comments_tbl');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }

        public function ERT_done_list_by_zone_model($Zone,$date_array){
      
         $condition = "Zone =" . "'" . $Zone . "'". " AND " . "ONU_opration_status =" . "'". '1' . "'"." AND " . "s_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'"; 
        $this->db->select('*');
        $this->db->from('ert_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    
     public function Check_client_id_model($Client_id){
       
//     $query=$this->db->query("select Client_id from ert_task_list Where Client_id='$Client_id' and ONU_opration_status='0'");
    $query=$this->db->query("select Client_id from ert_task_list Where Client_id='$Client_id' and Status !='Active'");
     return $query->row();
    }
    
    public function ert_max_p_key_model($id){
     $query=$this->db->query("select max(p_key) as p_key from ert_task_list where create_id = '$id' ");
     return $query->row();   
    }
    
    
 
    
    
    
    
    
///////////////////////////////////////////////////////////////////////////////////////////////////
//...............................  WI & BTS..................................................................    
///////////////////////////////////////////////////////////////////////////////////////////////////
    
   public function wi_assign_task_page_category(){
            $query = $this->db->query("select * from category where Category_Purpose = 'wi_assign_task' and Status = '1'  order by Indexx");
           return $query->result_array();

        }   
    
    public function wi_save_task_info_model($data){
        $this->db->insert( 'wi_task_tbl',$data); 
    } 
    
   public function wi_pick_pending_task(){     
    $query=$this->db->query("select * from wi_task_tbl Where Status='pending'");
    return $query->result_array();  
    } 
    
   public function wi_pick_done_task(){
           
        $query=$this->db->query("select * from wi_task_tbl Where Status='Done' order by p_key DESC limit 500");
        return $query->result_array();  
   }
   public function wi_pick_pending_single_task($p_key){
     
    $query=$this->db->query("select * from wi_task_tbl Where p_key='$p_key'");
    return $query->row();   
    }
    
     public function ipts_pick_pending_single_task($p_key){
     
    $query=$this->db->query("select * from ipts_task_tbl Where p_key='$p_key'");
    return $query->row();   
    }
   
  public function wi_pick_done_catogry(){
      
          $query = $this->db->query("select * from category where Category_Purpose = 'wi_done_task' and Status = '1'  order by Indexx");
          return $query->result_array();

  }

   public function  wi_done_task_model($p_key, $data){
      
//        $this->db->insert( 'CS_task_list',$data);         
        $this->db->where('p_key',$p_key);
        $this->db->update('wi_task_tbl',$data);
    }
    
    public function pick_Division(){
      $query = $this->db->query("select * from category where CateGory_name = 'Division' and Status = '1'  order by Indexx");
       return $query->result_array();   
        
    }
     public function pick_fi_zone(){
      $query = $this->db->query("select * from category where CateGory_Purpose='fi_search' and Status = '1'  order by Indexx");
       return $query->result_array();   
        
    }
    public function wi_pending_list_by_Engineer_ID_model($Engineer_ID,$date_array){
              
      $condition = "Engineer_ID =" . "'" . $Engineer_ID . "'". " AND " . "status =" . "'". 'pending' . "'"." AND " . "s_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('*');
        $this->db->from('wi_task_tbl');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    } public function wi_DB_pending_list_by_Engineer_ID_model($Engineer_ID){
              
      $condition = "Engineer_ID =" . "'" . $Engineer_ID . "'". " AND " . "status =" . "'". 'pending' . "'";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('*');
        $this->db->from('wi_task_tbl');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
     public function wi_done_list_by_Engineer_ID_model($Engineer_ID,$date_array){
              
      $condition = "Engineer_ID =" . "'" . $Engineer_ID . "'". " AND " . "status =" . "'". 'Done' . "'"." AND " . "s_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('*');
        $this->db->from('wi_task_tbl');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    public function wi_done_by_Eng_ID_summery_model($Engineer_ID,$date_array){
//      $query = $this->db->query("select * from wi_task_tbl where status='Done' and Status = '1'  order by Indexx");
//       return $query->result_array();   
       
        $condition = "Engineer_ID =" . "'" . $Engineer_ID . "'". " AND " . "status =" . "'". 'Done' . "'"." AND " . "s_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' GROUP BY type_task ORDER BY type_task";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('type_task,count(p_key) as task_number');
        $this->db->from('wi_task_tbl');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    
     public function wi_pending_list_by_bts_model($BTS_name,$date_array){
              
      $condition = "bts =" . "'" . $BTS_name . "'". " AND " . "status =" . "'". 'pending' . "'"." AND " . "s_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'"; 
        $this->db->select('*');
        $this->db->from('wi_task_tbl');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    public function wi_done_list_by_bts_model($BTS_name,$date_array){
              
      $condition = "bts =" . "'" . $BTS_name . "'". " AND " . "status =" . "'". 'done' . "'"." AND " . "s_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'"; 
        $this->db->select('*');
        $this->db->from('wi_task_tbl');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
     public function wi_done_summery_by_bts_model($BTS_name,$date_array){
              
        $condition = "bts =" . "'" . $BTS_name . "'". " AND " . "status =" . "'". 'done' . "'"." AND " . "s_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'GROUP BY type_task ORDER BY type_task"; 
        $this->db->select('type_task,count(p_key) as task_number');
        $this->db->from('wi_task_tbl');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    public function wi_pending_list_record_count(){
      
        $query = $this->db->query("select p_key from wi_task_tbl where status = 'pending'");
        return $query->result_array();
    }
    
     public function wi_Pagination_pending_model($per_page, $offset) {
        $this->db->select('*');
        $this->db->from('wi_task_tbl');
        $this->db->where('status','pending');
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data;
        
    }
    
    
    
    
    
    
    
    
       
///////////////////////////////////////////////////////////////////////////////////////////////////
//...............................  IPTS TEAM ..................................................................    
///////////////////////////////////////////////////////////////////////////////////////////////////
    
   public function ipts_assign_task_page_category(){
            $query = $this->db->query("select * from category where Category_Purpose = 'ipts_assign_task' and Status = '1'  order by Indexx");
           return $query->result_array();

        } 
    public function ipts_save_task_info_model($data){
         $this->db->insert( 'ipts_task_tbl',$data); 
    }
     public function ipts_pending_list_record_count(){
      
        $query = $this->db->query("select p_key from ipts_task_tbl where status = 'Pending'");
        return $query->result_array();
    }
    public function ipts_done_list_record_count(){
      
        $query = $this->db->query("select p_key from ipts_task_tbl where status = 'Done'");
        return $query->result_array();
    }
     public function ipts_Pagination_pending_model($per_page, $offset) {
        $this->db->select('*');
        $this->db->from('ipts_task_tbl');
        $this->db->where('status','Pending');
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data;
        
    }
      public function ipts_Pagination_done_model($per_page, $offset) {
        $this->db->select('*');
        $this->db->from('ipts_task_tbl');
        $this->db->where('status','Done');
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data;
        
    }
     public function ipts_update_status_model($p_key,$data){
            
            $this->db->where('p_key',$p_key);
            $this->db->update('ipts_task_tbl',$data);
        }
        
        
    public function ipts_pending_list_by_Engineer_ID_model($Engineer_ID,$date_array){
              
      $condition = "Engineer_ID =" . "'" . $Engineer_ID . "'". " AND " . "status =" . "'". 'Pending' . "'"." AND " . "s_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('*');
        $this->db->from('ipts_task_tbl');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    
     public function ipts_pending_list_by_Client_Name_model($Client_Name){
              
      $condition = "Client_Name =" . "'" . $Client_Name . "'". " AND " . "status =" . "'". 'Pending' . "'";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('*');
        $this->db->from('ipts_task_tbl');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
     public function DB_ipts_pending_list_by_Engineer_ID_model($Engineer_ID){
              
      $condition = "Engineer_ID =" . "'" . $Engineer_ID . "'". " AND " . "status =" . "'". 'Pending' . "'";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('*');
        $this->db->from('ipts_task_tbl');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }

    public function ipts_done_list_by_Engineer_ID_model($Engineer_ID,$date_array){
              
      $condition = "Engineer_ID =" . "'" . $Engineer_ID . "'". " AND " . "status =" . "'". 'Done' . "'"." AND " . "e_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('*');
        $this->db->from('ipts_task_tbl');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    

     public function ipts_done_by_Eng_ID_summery_model($Engineer_ID,$date_array){
  
        $condition = "Engineer_ID =" . "'" . $Engineer_ID . "'". " AND " . "e_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' GROUP BY type_task ORDER BY type_task";
  
        $this->db->select('type_task,count(p_key) as task_number');
        $this->db->from('ipts_task_tbl');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    
    
    
    public function IPTS_excel_done_task_List_by_Engineer_ID($Engineer_ID,$date_array){
//        $from_date=$date_array['date1'].' 00:00:00';
//        $to_date=$date_array['date2'].' 23:59:59';
        $condition = "e.Engineer_ID =" . "'" . $Engineer_ID . "'". " AND " . "e.status =" . "'". 'Done' . "'"." AND " . "e.e_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select(array('e.Client_id','e.Client_Name', 'e.Client_Category', 'e.tki_id','e.type_task','e.Initial_Problem_Category','e.Engineer_Name','e.Engineer_ID','e.s_date','e.e_date','e.support_type','e.comments'));
        $this->db->from('ipts_task_tbl as e');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    
    
      public function ipts_done_list_by_date_model($date_array){
              
      $condition = "status =" . "'". 'Done' . "'"." AND " . "e_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('*');
        $this->db->from('ipts_task_tbl');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    } 
    
      public function ipts_pending_list_by_date_model($date_array){
              
      $condition = "status =" . "'". 'Pending' . "'"." AND " . "e_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('*');
        $this->db->from('ipts_task_tbl');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    
////////////////////////////////////////////////////////////////////////////////////////////
//.................................FI Module.........................................................
/////////////////////////////////////////////////////////////////////////////////////////////

 public function fi_assign_task_page_category(){
            $query = $this->db->query("select * from category where Category_Purpose = 'fi_assign_task' and Status = '1'  order by Indexx");
           return $query->result_array();

} 

public function fi_save_task_info_model($data){
        $this->db->insert( 'fi_task_tbl',$data); 
    }
public function fi_pending_list_record_count(){
      
        $query = $this->db->query("select p_key from fi_task_tbl where work_status = 'pending'");
        return $query->result_array();
    }    
    
public function fi_done_list_record_count(){
      
        $query = $this->db->query("select p_key from fi_task_tbl where work_status = 'done'");
        return $query->result_array();
    }    
public function fi_Pagination_pending_model($per_page, $offset) {
        $this->db->select('*');
        $this->db->from('fi_task_tbl');
        $this->db->where('work_status','pending');
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data;
        
    }   
public function fi_Pagination_done_model($per_page, $offset) {
//        $this->db->select('*');
//        $this->db->from('fi_task_tbl');
//        $this->db->where('work_status','done');
        
//        ...................................................................        
        
     $condition = "fi_task_tbl.work_status =" . "'" . 'done' . "'";
     $this->db->select('fi_task_tbl.p_key,fi_task_tbl.TKI_Receive_Date_time,fi_task_tbl.Client_id,fi_task_tbl.Client_Name,'
             . 'fi_task_tbl.Client_Category,fi_task_tbl.C_Contact_number,fi_task_tbl.Client_Address,fi_task_tbl.tki_id,fi_task_tbl.type_task,'
             . 'fi_task_tbl.Work_Schedule,fi_task_tbl.Zone,fi_task_tbl.Support_Office,fi_task_tbl.Connection_Type,fi_task_tbl.Priority_Status,'
             . 'fi_task_tbl.work_status,fi_accessories_info.Cable_Type_ID,fi_accessories_info.Cable_Start_meter,'
             . 'fi_accessories_info.Cable_End_meter,fi_accessories_info.Cable_qty,fi_accessories_info.Device_model,fi_accessories_info.serial_No,'
             . 'fi_accessories_info.MAC,fi_accessories_info.TJ,fi_accessories_info.Patch_Cord_Qty,fi_accessories_info.Cable_Tie_Qty,'
             . 'fi_accessories_info.Rj45_Qty,fi_accessories_info.Sale_Order_Number');     
     $this->db->from('fi_task_tbl');
     $this->db->join('fi_accessories_info', 'fi_task_tbl.p_key = fi_accessories_info.p_key');      
     $this->db->where($condition);

//        ...................................................................
        
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data;
        
    }
    
    public function fi_pick_engineer_done_task(){
        
        $query = $this->db->query("select p_key,Engineer_name,Engineer_ID,task_type from fi_eng_task_list");
        return $query->result_array();
        
    }

    public function fi_pick_technician_done_task(){
       
        $query = $this->db->query("select p_key,Technician_name,task_type from fi_technician_task_list");
        return $query->result_array();
    }

    public function fi_update_link_model($p_key,$data){
            
            $this->db->where('p_key',$p_key);
            $this->db->update('fi_task_tbl',$data);
        }    
public function fi_update_Handover_model($p_key,$data){
            
            $this->db->where('p_key',$p_key);
            $this->db->update('fi_task_tbl',$data);
        } 
public function add_engineer_model($work_data) {

        $this->db->insert('fi_eng_task_list',$work_data);
}     

public function add_Technician_model($Technician_work_data) {

        $this->db->insert('fi_technician_task_list',$Technician_work_data);
}

public function fi_pick_pkey_model($id){
   $query=$this->db->query("select max(p_key) as p_key from fi_task_tbl Where create_id='$id'");
   return $query->row();  
}

 public function Check_CTID_n_SR_model($tki_id){
       
     $query=$this->db->query("select tki_id from fi_task_tbl Where tki_id='$tki_id'");
     return $query->row();
}
public function fi_pick_comments_model($p_key){
   $query=$this->db->query("select * from fi_comments_tbl Where p_key='$p_key'");
//   Select Id,mid,userid,remarks from sample Where id<(select max(Id) from sample)
//   return $query->row();  
 return $query->result_array();   
}

public function fi_update_work_shedule_model($p_key,$data){
        
    $this->db->where('p_key',$p_key);
    $this->db->update('fi_task_tbl',$data);
}

public function fi_pick_assign_information_model($p_key){
   $query=$this->db->query("select * from fi_task_tbl Where p_key='$p_key'");
   return $query->row();     
}

public function fi_save_comments_model($c_data){
    $this->db->insert( 'fi_comments_tbl',$c_data);  
}

public function fi_pick_pending_single_task($p_key){

$query=$this->db->query("select p_key,Client_id,type_task,Zone from fi_task_tbl Where p_key='$p_key'");
return $query->row();   
}       
     

public function fi_update_accessories_model($data){
    
     $this->db->insert( 'fi_accessories_info',$data); 
}
public function fi_update_tki_model($p_key,$u_data){
    
    $this->db->where('p_key',$p_key);
    $this->db->update('fi_task_tbl',$u_data);
}

public function fi_accessories_catogry(){
      
          $query = $this->db->query("select * from category where Category_Purpose = 'fi_accessories' and Status = '1'  order by Indexx");
          return $query->result_array();

}
public function check_handover_status_model($p_key){
       
     $query=$this->db->query("select status from fi_task_tbl Where p_key='$p_key'");
     return $query->row();
    }
public function fi_pending_list_search_model($Zone,$Sub_Zone,$task_type,$date_array){
      
//    echo '$date_array.............'.$date_array;
//     $condition = "work_status =" . "'". 'Pending' . "'"." AND " . "Work_Schedule  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'"; 
    
     if($Zone=='0' && $Sub_Zone=='0'){
        if($task_type=='0' && $task_type=='0'){
             $condition = "work_status =" . "'". 'Pending' . "'"." AND " . "Work_Schedule  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'"; 
        }else{
             $condition = "type_task =" . "'" . $task_type . "'". " AND " . "work_status =" . "'". 'Pending' . "'"." AND " . "Work_Schedule  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";   
        }
      
    }elseif ($Zone != '0' && $Sub_Zone=='') {
        if($task_type=='0' && $task_type=='0'){
              $condition = "Zone =" . "'" . $Zone . "'". " AND " . "work_status =" . "'". 'Pending' . "'"." AND " . "Work_Schedule  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";         
         }else{ 
              $condition = "type_task =" . "'" . $task_type . "'". " AND " ."Zone =" . "'" . $Zone . "'". " AND " . "work_status =" . "'". 'Pending' . "'"." AND " . "Work_Schedule  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";         
        }
    }elseif ($Zone != '0' && $Sub_Zone != '0') {
             if($task_type=='0' && $task_type=='0'){
                $condition = "Zone =" . "'" . $Zone . "'". " AND " ."Support_Office =" . "'" . $Sub_Zone . "'". " AND " . "work_status =" . "'". 'Pending' . "'"." AND " . "Work_Schedule  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";         
      
            }else{ 
                $condition = "type_task =" . "'" . $task_type . "'". " AND " . "Zone =" . "'" . $Zone . "'". " AND " ."Support_Office =" . "'" . $Sub_Zone . "'". " AND " . "work_status =" . "'". 'Pending' . "'"." AND " . "Work_Schedule  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";         
      
            }
    }
    
        $this->db->select('*');
        $this->db->from('fi_task_tbl');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    
    
// .................................................................................................................  
    public function fi_DB_pending_list_search_model($Support_Office,$task_type){
    
    
    
        $condition = "type_task =" . "'" . $task_type . "'". " AND " ."Support_Office =" . "'" . $Support_Office . "'". " AND " . "work_status =" . "'". 'Pending' . "'";         
        $this->db->select('*');
        $this->db->from('fi_task_tbl');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    
    
public function fi_done_list_search_model($Zone,$Sub_Zone,$task_type,$date_array){
      
    
    
    if($Zone=='0' && $Sub_Zone=='0'){
        if($task_type=='0' && $task_type=='0'){
             $condition = "fi_task_tbl.work_status =" . "'". 'done' . "'"." AND " . "fi_task_tbl.Work_Schedule  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'"; 
      
             
             
        }else{
             $condition = "fi_task_tbl.type_task =" . "'" . $task_type . "'". " AND " . "fi_task_tbl.work_status =" . "'". 'done' . "'"." AND " . "fi_task_tbl.Work_Schedule  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";   
        }
      
    }elseif ($Zone != '0' && $Sub_Zone=='') {
        if($task_type=='0' && $task_type=='0'){
              $condition = "fi_task_tbl.Zone =" . "'" . $Zone . "'". " AND " . "fi_task_tbl.work_status =" . "'". 'done' . "'"." AND " . "fi_task_tbl.Work_Schedule  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";         
         }else{ 
              $condition = "fi_task_tbl.type_task =" . "'" . $task_type . "'". " AND " ."fi_task_tbl.Zone =" . "'" . $Zone . "'". " AND " . "fi_task_tbl.work_status =" . "'". 'done' . "'"." AND " . "fi_task_tbl.Work_Schedule  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";         
        }
    }elseif ($Zone != '0' && $Sub_Zone != '0') {
             if($task_type=='0' && $task_type=='0'){
                $condition = "fi_task_tbl.Zone =" . "'" . $Zone . "'". " AND " ."fi_task_tbl.Support_Office =" . "'" . $Sub_Zone . "'". " AND " . "fi_task_tbl.work_status =" . "'". 'done' . "'"." AND " . "fi_task_tbl.Work_Schedule  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";         
      
            }else{ 
                $condition = "fi_task_tbl.type_task =" . "'" . $task_type . "'". " AND " . "fi_task_tbl.Zone =" . "'" . $Zone . "'". " AND " ."fi_task_tbl.Support_Office =" . "'" . $Sub_Zone . "'". " AND " . "fi_task_tbl.work_status =" . "'". 'done' . "'"." AND " . "fi_task_tbl.Work_Schedule  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";         
      
            }
    }
    
    
    //        ...................................................................        
        
//     $condition = "fi_task_tbl.work_status =" . "'" . 'done' . "'";
     $this->db->select('fi_task_tbl.p_key,fi_task_tbl.TKI_Receive_Date_time,fi_task_tbl.Client_id,fi_task_tbl.Client_Name,'
             . 'fi_task_tbl.Client_Category,fi_task_tbl.C_Contact_number,fi_task_tbl.Client_Address,fi_task_tbl.tki_id,fi_task_tbl.type_task,'
             . 'fi_task_tbl.Work_Schedule,fi_task_tbl.Zone,fi_task_tbl.Support_Office,fi_task_tbl.Connection_Type,fi_task_tbl.Priority_Status,'
             . 'fi_task_tbl.work_status,fi_accessories_info.Cable_Type_ID,fi_accessories_info.Cable_Start_meter,'
             . 'fi_accessories_info.Cable_End_meter,fi_accessories_info.Cable_qty,fi_accessories_info.Device_model,fi_accessories_info.serial_No,'
             . 'fi_accessories_info.MAC,fi_accessories_info.TJ,fi_accessories_info.Patch_Cord_Qty,fi_accessories_info.Cable_Tie_Qty,'
             . 'fi_accessories_info.Rj45_Qty,fi_accessories_info.Sale_Order_Number');     
     $this->db->from('fi_task_tbl');
     $this->db->join('fi_accessories_info', 'fi_task_tbl.p_key = fi_accessories_info.p_key');      
     $this->db->where($condition);

//        ...................................................................
    
//        $this->db->select('*');
//        $this->db->from('fi_task_tbl');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }

    
    
    
///////////////////////////////////////////////////////////////////////////////////////////////////
//...............................  SD TEAM ..................................................................    
///////////////////////////////////////////////////////////////////////////////////////////////////
    
   public function sd_assign_task_page_category(){
            $query = $this->db->query("select * from category where Category_Purpose = 'sd_assign_task' and Status = '1'  order by Indexx");
           return $query->result_array();
    } 
    public function sd_edit_task_page_category(){
            $query = $this->db->query("select * from category where Category_Purpose = 'sd_assign_task' and ( CateGory_name='Source' or CateGory_name='Client_Category' or CateGory_name='type_task' or CateGory_name='assign_by' ) and Status = '1'  order by Indexx");
           return $query->result_array();
    } 
    public function sd_followup_page_category(){
            $query = $this->db->query("select * from category where Category_Purpose = 'sd_assign_task' and Status = '1'  and ( CateGory_name = 'Status' or CateGory_name = 'action_type' )   order by Indexx");
           return $query->result_array();

    } 
     public function sd_type_task_category(){
            $query = $this->db->query("select * from category where Category_Purpose = 'sd_assign_task' and Status = '1'  and  CateGory_name = 'type_task' order by Indexx");
           return $query->result_array();

    } 
    
     public function save_ticket_info_model($tdata){
            
           $this->db->insert('sd_ticket_tbl',$tdata);
    } 
    
    public function find_ticket_Id($id) {               // service Order page ( pick Mix Contract) 

        $condition = "create_id =" . "'" . $id . "'";
        $query = $this->db->query("select max(ticket_id) as ticket_id from sd_ticket_tbl where " . $condition);
        return $query->row();
    }
        
    public function sd_save_task_info_model($data){
        $this->db->insert( 'sd_task_tbl',$data); 
    }   
    
    public function sd_save_engineer_action_model($eng_task_action){
        $this->db->insert( 'sd_eng_tsk',$eng_task_action); 
    }
      public function sd_Pagination_pending_model($per_page, $offset) {
        $this->db->select('*');
        $this->db->from('sd_task_tbl');
        $this->db->where('task_Status','0');
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data;
        
    }
     public function sd_Pagination_done_model($per_page, $offset) {
        $this->db->select('*');
        $this->db->from('sd_task_tbl');
        $this->db->where('task_Status','1');
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data;
        
    }
     public function sd_pending_list_record_count(){
      
        $query = $this->db->query("select id from sd_task_tbl where task_Status = '0'");
        return $query->result_array();
    }
    
     public function sd_done_list_record_count(){
      
        $query = $this->db->query("select id from sd_task_tbl where task_Status = '1'");
        return $query->result_array();
    }
 
  public function sd_pick_pending_single_task($ticket_no){
     
    $query=$this->db->query("select * from sd_task_tbl Where ticket_no='$ticket_no'");
    return $query->row();   
  }   
  public function sd_pick_edit_task_info($ticket_no){
     
    $query=$this->db->query("select ticket_no,tki_id,Source,type_task,Client_id,Client_name,Client_Category,assign_by,Engineer_Name,Engineer_ID,s_date from sd_task_tbl Where ticket_no='$ticket_no'");
    return $query->row();   
  }
   public function sd_pick_eng_task($ticket_no){
     
    $query=$this->db->query("select * from sd_eng_tsk Where ticket_no='$ticket_no'");
    return $query->result_array();  
  } 
  
 public function sd_update_task_model($ticket_no,$data){
            
            $this->db->where('ticket_no',$ticket_no);
            $this->db->update('sd_task_tbl',$data);
 }
  public function sd_edit_info_task_model($ticket_no,$data){
            
            $this->db->where('ticket_no',$ticket_no);
            $this->db->update('sd_task_tbl',$data);
 }
   public function sd_done_list_by_Engineer_ID_model($Engineer_ID,$date_array){
              
     $condition = "sd_eng_tsk.Engineer_ID =" . "'" . $Engineer_ID . "'". " AND " . "sd_task_tbl.task_Status =" . "'". '1' . "'"." AND " . "sd_task_tbl.e_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//s_date
     $this->db->select('sd_eng_tsk.ticket_no,sd_eng_tsk.action_time,sd_eng_tsk.Engineer_ID,sd_eng_tsk.Engineer_Name,sd_task_tbl.type_task,sd_eng_tsk.action_type,'
             . 'sd_eng_tsk.comments,sd_task_tbl.s_date,sd_task_tbl.e_date,sd_task_tbl.Client_id,sd_task_tbl.Client_name,sd_task_tbl.Client_Category,sd_task_tbl.tki_id');     
     $this->db->from('sd_task_tbl');
     $this->db->join('sd_eng_tsk', 'sd_task_tbl.ticket_no = sd_eng_tsk.ticket_no');      
     $this->db->where($condition);
        
    $query = $this->db->get();    
    if ($query->num_rows() > 0) {
//            return $query->result();
        return $query->result_array(); 
    } else {
        return false;
    }
        
    }
    
     public function esd_report_by_date($date_array,$Engineer_ID){
//        $condition = "e.end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";        
//        $this->db->select(array('e.employee_id','e.employee_name','e.BTS_Name','e.OLT_Name','e.PON','e.Port','e.ONU_Model', 'e.Client_ID','e.Client_Category', 'e.Problem_Catagory', 'e.start_date', 'e.end_date', 'e.comments'));
//        $this->db->from('fonoc_task_list as e');
        
     $condition = "sd_eng_tsk.Engineer_ID =" . "'" . $Engineer_ID . "'". " AND " . "sd_task_tbl.task_Status =" . "'". '1' . "'"." AND " . "sd_task_tbl.e_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
     $this->db->select('sd_eng_tsk.ticket_no,sd_eng_tsk.action_time,sd_eng_tsk.Engineer_ID,sd_eng_tsk.Engineer_Name,sd_task_tbl.type_task,sd_eng_tsk.action_type,'
             . 'sd_eng_tsk.comments,sd_task_tbl.s_date,sd_task_tbl.e_date,sd_task_tbl.Client_id,sd_task_tbl.Client_name,sd_task_tbl.Client_Category,sd_task_tbl.tki_id');     
     $this->db->from('sd_task_tbl'); 
         
        $this->db->join('sd_eng_tsk', 'sd_task_tbl.ticket_no = sd_eng_tsk.ticket_no');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result_array();   
    }
    
    
     public function sd_done_by_Eng_ID_summery_model($Engineer_ID,$date_array){
//      $query = $this->db->query("select * from wi_task_tbl where status='Done' and Status = '1'  order by Indexx");
//       return $query->result_array();   
       
        $condition = "Engineer_ID =" . "'" . $Engineer_ID . "'". " AND " . "action_time  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' GROUP BY action_type ORDER BY action_type";
//        $condition = "employee_id =" . "'" . 'L3T112' . "'" . " AND " . "ONU_opration_status =" . "'". '0' . "'";
       
        $this->db->select('action_type,count(p_key) as task_number');
        $this->db->from('sd_eng_tsk');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }

    
 
    public function sd_done_list_by_type_task_model($type_task,$date_array){
              
//      $condition = "Engineer_ID =" . "'" . $Engineer_ID . "'". " AND " . "task_Status =" . "'". '1' . "'"." AND " . "e_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//   .............................................................................................   
      
//     $condition = "sd_task_tbl.task_Status =" . "'" . '1' . "'";
     
     $condition = "sd_task_tbl.type_task =" . "'" . $type_task . "'". " AND " . "sd_task_tbl.task_Status =" . "'". '1' . "'"." AND " . "sd_task_tbl.e_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";

     $this->db->select('sd_eng_tsk.ticket_no,sd_eng_tsk.action_time,sd_eng_tsk.Engineer_ID,sd_eng_tsk.Engineer_Name,sd_eng_tsk.action_type,'
             . 'sd_eng_tsk.comments,sd_task_tbl.Client_id,sd_task_tbl.Client_name,sd_task_tbl.Client_Category,sd_task_tbl.tki_id,'
             . 'sd_task_tbl.Source,sd_task_tbl.type_task,sd_task_tbl.s_date,sd_task_tbl.e_date');     
     $this->db->from('sd_task_tbl');
     $this->db->join('sd_eng_tsk', 'sd_task_tbl.ticket_no = sd_eng_tsk.ticket_no');      
     $this->db->where($condition);
//    .............................................................................................      
      
//        $this->db->select('*');
//        $this->db->from('sd_task_tbl');
//        $this->db->where($condition);
//        
        
        
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    
    public function sd_done_list_by_Client_id_model($Client_id, $date_array){
       
        
              
//      $condition = "Engineer_ID =" . "'" . $Engineer_ID . "'". " AND " . "task_Status =" . "'". '1' . "'"." AND " . "e_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//   .............................................................................................   
      
//     $condition = "sd_task_tbl.task_Status =" . "'" . '1' . "'";
     
     $condition = "sd_task_tbl.Client_id =" . "'" . $Client_id . "'". " AND " . "sd_task_tbl.task_Status =" . "'". '1' . "'"." AND " . "sd_task_tbl.e_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";

     $this->db->select('sd_eng_tsk.ticket_no,sd_eng_tsk.action_time,sd_eng_tsk.Engineer_ID,sd_eng_tsk.Engineer_Name,sd_eng_tsk.action_type,'
             . 'sd_eng_tsk.comments,sd_task_tbl.Client_id,sd_task_tbl.Client_name,sd_task_tbl.Client_Category,sd_task_tbl.tki_id,'
             . 'sd_task_tbl.Source,sd_task_tbl.type_task,sd_task_tbl.s_date,sd_task_tbl.e_date');     
     $this->db->from('sd_task_tbl');
     $this->db->join('sd_eng_tsk', 'sd_task_tbl.ticket_no = sd_eng_tsk.ticket_no');      
     $this->db->where($condition);
//    .............................................................................................      
      
//        $this->db->select('*');
//        $this->db->from('sd_task_tbl');
//        $this->db->where($condition);
//        
        
        
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    
    }
   
    
 public function sd_pending_list_by_type_task_model($type_task,$date_array){
              
        $condition = "type_task =" . "'" . $type_task . "'". " AND " . "task_Status =" . "'". '0' . "'"." AND " . "s_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";         
        $this->db->select('*');
        $this->db->from('sd_task_tbl');
        $this->db->where($condition);

        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    public function sd_pending_list_by_eid_model($Engineer_ID,$date_array){
              
        $condition = "Create_id =" . "'" . $Engineer_ID . "'". " AND " . "task_Status =" . "'". '0' . "'"." AND " . "s_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";         
        $this->db->select('*');
        $this->db->from('sd_task_tbl');
        $this->db->where($condition);

        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
public function sd_db_pending_list_by_type_task($type_task){
              
        $condition = "type_task =" . "'" . $type_task . "'". " AND " . "task_Status =" . "'". '0' . "'";         
        $this->db->select('*');
        $this->db->from('sd_task_tbl');
        $this->db->where($condition);

        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
}    
    public function sd_pending_list_by_tki_id_model($tki_id,$date_array){
        
        $condition = "tki_id =" . "'" . $tki_id . "'". " AND " . "task_Status =" . "'". '0' . "'"." AND " . "s_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";         
        $this->db->select('*');
        $this->db->from('sd_task_tbl');
        $this->db->where($condition);

        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }  
        
    }
    
    public function Check_Check_tki_model($tki_id){
       
     $query=$this->db->query("select tki_id from sd_eng_tsk Where tki_id='$tki_id' and action_type='Review' ");
     return $query->row();
    }    
    
}
