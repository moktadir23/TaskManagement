<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Registration_Model extends CI_Model {
    
    public function save_user_info($data) {
          
        $this->db->insert( 'registration',$data);                       
    }
    public function bck_u($bck_data) {
          
        $this->db->insert( 'u_bck',$bck_data);                       
    }    
    public function user_lock($sdata){

        $this->db->insert( 'user_lock',$sdata); 
    }

        public function check_login_model($id,$password){
            
            $this->db->select('*');
            $this->db->from('registration');
//            $this->db->where('email',$email);
            $this->db->where('id',$id);
            $this->db->where('pass_word',$password);
            $this->db->where('User_Status','1');
            $query_result=$this->db->get();
            $result=$query_result->row();
            return $result;
        }
        
        public function check_einfo($id){
            
            $this->db->select('*');
            $this->db->from('registration');
//            $this->db->where('email',$email);
            $this->db->where('id',$id);
            $this->db->where('User_Status','1');
            $query_result=$this->db->get();
            $result=$query_result->row();
            return $result;
        }
        public function assign_task_page_category(){
            $query = $this->db->query("select * from category where Category_Purpose = 'assign_task' and Status = '1'  order by Indexx");
           return $query->result_array();
            
//            $query=$this->db->query("select * from category");
//            return $query->result_array();
        }
        public function save_ticket_info_model($tdata){
            
           $this->db->insert('ticket_tbl',$tdata);
        }
        public function find_ticket_Id($id) {               // service Order page ( pick Mix Contract) 

        $condition = "create_id =" . "'" . $id . "'";
        $query = $this->db->query("select max(ticket_id) as ticket_id from ticket_tbl where " . $condition);
        return $query->row();
        }
        public function save_task_info_model($data) 
        {
          $this->db->insert( 'task_info_table',$data);           
            
        }
        

        public function save_comments_model($c_data){
            
             $this->db->insert('new_comments_table',$c_data);
        }

        public function save_RD_testing_device_model($RD_data){
            
             $this->db->insert('cs_return_device_r_n_d',$RD_data);
        }
        
        public function task_transfer_info_save_model($data) 
        {
          $this->db->insert( 'task_transfer_table',$data);           
            
        }
          
        public function view_report_list_model(){
            $query=$this->db->query("select * from task_info_table");
            return $query->result_array();
        }
        public function delete__report_list_model($task_info_id){
            
            $this->db->where('task_info_id',$task_info_id);
            $this->db->delete('task_info_table');
            
            
        }

       
        public function update_task_info_model($task_info_id, $data){
            
            $this->db->where('task_info_id',$task_info_id);
           $this->db->update('task_info_table',$data);
        }
        
        
        public function edit__task_done_model($ticket_no){
            
            $query=$this->db->query("select * from task_info_table Where ticket_no=$ticket_no");
            return $query->row_array(); 
            
        }
        public function update_task_done_model($ticket_no, $done_data){
            
            $this->db->where('ticket_no',$ticket_no);
            $this->db->update('task_info_table',$done_data);  
        }

        
        
        public function task_transfer_page_category(){
            $query = $this->db->query("select * from category where Category_Purpose = 'task_transfer' and Status = '1'  order by Indexx");
           return $query->result_array();

        }
        public function search_page_category(){   //assign_task    employee_name
            $query = $this->db->query("select * from category where  (Category_Purpose = 'assign_task'  and (CateGory_name = 'employee_id' or  CateGory_name = 'type_task')) and Status = '1'  order by Indexx");
           return $query->result_array();

        }
         public function noc_id(){   //assign_task
            $query = $this->db->query("select * from category where Category_Purpose = 'assign_task' and CateGory_name = 'employee_id'  and Status = '1'  order by Indexx");
           return $query->result_array();

        }
        public function search_type_task_category(){
           $query = $this->db->query("select * from category where CateGory_name = 'type_task' and Status = '1'  order by Indexx");
           return $query->result_array();   
        }

                public function search_by_type_task_category(){
            $query = $this->db->query("select * from category where Category_Purpose = 'search' and Status = '1'  order by Indexx");
           return $query->result_array();

        }
        public function edit__task_transfe_model($ticket_no){
            
            $query=$this->db->query("select * from task_info_table Where ticket_no=$ticket_no");
            return $query->row_array();  
        }
        
        public function update_task_transfer_model($ticket_no, $data){
           
           $this->db->where('ticket_no',$ticket_no);
            $this->db->update('task_info_table',$data);    
        }
           public function save_task_id_info_model($task_id_info)      // ............ save Ticket  information .............
        {
          $this->db->insert( 'tbl_task_id',$task_id_info);           
            
        }

        public function view_task_transfer_information($transfer_id) 
        {
           $query=$this->db->query("select * from task_transfer_table");
           return $query->result_array();          
            
        }
        

        public function registration_list_model_by_user_id($user_id){
            
            $query=$this->db->query("select * from registration");
            return $query->result_array();
            
        }
        public function view_summary_task_model(){
                      
            $query=$this->db->query("select type_task,states,count(*) from task_info_table Where states='pending' GROUP BY type_task"); 

//              $query=$this->db->query("select type_task,count(*) from task_info_table GROUP BY type_task")
//              $query=$this->db->query("select count(*) from task_info_table");
//              $query=$this->db->query("select * from task_info_table");
            
            return $query->result_array();
            
        }
        public function view_summary_of_done_task_by_employee_model(){
            
            $query=$this->db->query("select id,states,count(*) from task_info_table Where states='done' GROUP BY id");             
            return $query->result_array();
        }

        public function individual_task_list_model($id){
            
            $query=$this->db->query("select * from task_info_table Where id=$id");  
            return $query->result_array();
  
          

//    $query=$this->db->query("select * from task_info_table Where task_info_id=$task_info_id");
//    return $query->row_array();
        
//    how pick data through ID                $query=$this->db->query("select * from task_info_table Where task_info_id=6");
//    how to pick data same catgore product   $query=$this->db->query("select * from task_info_table Where id=12 and type_task='FTTX'");
//    how to  COUNT TOTAL                     $query=$this->db->query("select type_task, count(*) from task_info_table GROUP BY type_task='FTTX' or type_task='Infrastructure' or type_task='Project Work'"); 
        }
        
        
    
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    public function total_task_number_model() {
     
        $query=$this->db->query("select type_task, count(*) from task_info_table GROUP BY type_task='FTTX' and type_task='Infrastructure'and type_task='Project Work'"); 
////            $query=$this->db->query("select count(*) from task_info_table");
////            $query=$this->db->query("select * from task_info_table");
//            
        return $query->result_array(); 
        
    }
   public function search_task_by_id_model(){
     
//        $query=$this->db->query("select * from task_info_table Where states='pending' and type_task='FTTX'"); 
//        $query=$this->db->query("select * from task_info_table like id='12'");   
//        SELECT * FROM pet WHERE name LIKE 'b%'
        $query=$this->db->query("select id,count(*) from task_info_table Where states='done'and id='L3T1181' and type_task='FTTX'");
        return $query->result_array(); 
    }
//    public function pending_infrastructure_model(){
//        
//        $query=$this->db->query("select * from task_info_table Where states='pending' and type_task='Infrastructure'");
//        return $query->result_array();
//        
//    }
//    public function pending_corporate_model(){
//        
//        $query=$this->db->query("select * from task_info_table Where states='pending' and type_task='Corporate'");
//        return $query->result_array();  
//    }
//    public function pending_R_D_model(){
//        
//      $query=$this->db->query("select * from task_info_table Where states='pending' and type_task='R&D'");
//        return $query->result_array();    
//    }
//
//    public function pending_project_work_model(){
//        
//       $query=$this->db->query("select * from task_info_table Where states='pending' and type_task='Project Work'");
//        return $query->result_array();    
//    }
//
//    public function pending_FTTX_model(){
//        
//        $query=$this->db->query("select * from task_info_table Where states='pending' and type_task='FTTX'");
//        return $query->result_array();  
//    }
    public function pending_task_detail_model($type_task){
  
        $query=$this->db->query("select * from task_info_table Where type_task='$type_task'and states='pending'");
        return $query->result_array();
    }

   
    public function done_task_number_by_id_model($id){

       $query=$this->db->query("select type_task,count(*) from task_info_table where id='$id' and states='done' GROUP BY type_task");
//            $query=$this->db->query("select * from task_info_table Where id='$id'");
        
           return $query->result_array();  
    }
    public function detail_task_by_id_model($id){
        
       $query=$this->db->query("select * from task_info_table where id='$id' and states='done'");
//            $query=$this->db->query("select * from task_info_table Where id='$id'");
        
           return $query->result_array();   
        
    }
    public function find_free_time_for_high_priority1($new_start_date,$new_end_date,$employee_id){
     
//         $query= "select * from task_info_table where end_date between '$new_start_date' and '$new_end_date' and status = 'Pending'";  
       $query= $this->db->query("select * from task_info_table where start_date between '$new_start_date' and '$new_end_date' and states = 'Pending' and priority_type='High' and id = '$employee_id' ");  
       return $query->result_array(); 
    }

    public function find_free_time_for_high_priority2($new_start_date,$new_end_date,$employee_id){
     
//         $query= "select * from task_info_table where end_date between '$new_start_date' and '$new_end_date' and status = 'Pending'";  
       $query= $this->db->query("select * from task_info_table where end_date between '$new_start_date' and '$new_end_date' and states = 'Pending' and priority_type='High' and id = '$employee_id' ");  
       return $query->result_array(); 
    }
        public function find_done_task_by_date_model($from_date,$to_date){
        
         $query=$this->db->query( "select * from task_info_table where end_date between '$from_date' and '$to_date' and status = 'done'");  
         return $query->result_array(); 

    }
    
    public function all_pending_list_model(){
        
//        $query=$this->db->query("select * from task_info_table ");
        
          $query=$this->db->query("select * from task_info_table where states='Pending'");
        return $query->result_array();
    }
    
    public function all_done_list_model(){
      
          $query=$this->db->query("select * from task_info_table where states='done'");
        return $query->result_array();
    }
    public function view_pending_task_by_employee_model(){
        
        $query=$this->db->query("select id,states,count(*) from task_info_table Where states='Pending' GROUP BY id");
      
        return $query->result_array();
    }
    public function view_done_task_by_employee_model(){
        
        $query=$this->db->query("select id,states,count(*) from task_info_table Where states='done' GROUP BY id");
      
        return $query->result_array();
    }
    
//    .............. select DATA from DB Through ID ........................
    public function show_data_by_id($id) {
        $condition = "id =" . "'" . $id . "'";
        $this->db->select('*');
        $this->db->from('task_info_table');
        $this->db->where($condition);
        $this->db->where("states = 'done'");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function show_data_by_type_task_model($type_task,$date_array){
        
        $condition = "type_task =" . "'" . $type_task . "'". " AND " . "states =" . "'". 'done' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select('*');
        $this->db->from('task_info_table');
        $this->db->where($condition);
        $query = $this->db->get();
                
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }  
        
    }
     public function pending_data_by_type_task_model($type_task){
        
        $condition = "type_task =" . "'" . $type_task . "'";
        $this->db->select('*');
        $this->db->from('task_info_table');
        $this->db->where($condition);
        $this->db->where("states = 'Pending'");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        } 
        
    }
    public function show_data_by_mis_mq_id_model($mis_mq_ticket_id){
        
//        $mis_mq_ticket_id="L3T10";
        $condition = "mis_mq_ticket_id =" . "'" . $mis_mq_ticket_id . "'";
        $this->db->select('*');
        $this->db->from('task_info_table');
        $this->db->where($condition);
        $this->db->where("states = 'done'");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        } 
        
    }
    
     public function pending_data_by_mis_mq_id_model($mis_mq_ticket_id){
        
//        $mis_mq_ticket_id="L3T10";
        $condition = "mis_mq_ticket_id =" . "'" . $mis_mq_ticket_id . "'";
        $this->db->select('*');
        $this->db->from('task_info_table');
        $this->db->where($condition);
        $this->db->where("states = 'pending'");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        } 
        
    }

        public function show_data_by_date_range($data) {
        $condition = "end_date  BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'";
        $this->db->select('*');
        $this->db->from('task_info_table');
        $this->db->where($condition);
        $this->db->where("states = 'done'");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    public function pending_data_by_date_range($data) {
        $condition = "end_date  BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'";
        $this->db->select('*');
        $this->db->from('task_info_table');
        $this->db->where($condition);
        $this->db->where("states = 'pending'");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    public function dashbroad_model(){
        $start_time=date("Y-m-d 00:00:00");
        $end_time=date("Y-m-d 23:59:59");
        $query=$this->db->query("select id,name,type_task,department,
                                sum(case when states = 'pending' then 1 else 0 end) pending,
                                sum(case when states = 'Done' and end_date BETWEEN '$start_time' and '$end_time' then 1 else 0 end) done
                                from task_info_table group by id,department order by department ");
        
        return $query->result_array(); 
     
    }
    
    public function noc_team_db_model(){
 
        $start_time=date("Y-m-d 00:00:00");
        $end_time=date("Y-m-d 23:59:59");
        $query=$this->db->query("select department,
                                sum(case when states = 'pending' then 1 else 0 end) pending,
                                sum(case when states = 'Done' and end_date BETWEEN '$start_time' and '$end_time' then 1 else 0 end) done
                                from task_info_table where department is not null group by department order by department ");
        
        return $query->result_array(); 

    }

        public function sd_task_summery(){
        $start_time=date("Y-m-d 00:00:00");
        $end_time=date("Y-m-d 23:59:59");
        $query=$this->db->query("select ticket_no,type_task,
                                sum(case when task_Status = '0' then 1 else 0 end) pending,
                                sum(case when task_Status = '1' and e_date BETWEEN '$start_time' and '$end_time' then 1 else 0 end) done
                                from sd_task_tbl where type_task !='' and type_task != '0'  group by type_task");
        
        return $query->result_array();         
    }
    
     public function sd_task_details(){
        $start_time=date("Y-m-d 00:00:00");
        $end_time=date("Y-m-d 23:59:59");
        $query=$this->db->query("select Engineer_ID,Engineer_Name,action_type,
                                sum(case when action_type = 'Follow Up' and action_time BETWEEN '$start_time' and '$end_time' then 1 else 0 end) Follow_Up,
                                sum(case when action_type = 'Mail' and action_time BETWEEN '$start_time' and '$end_time' then 1 else 0 end) Mail,
                                sum(case when action_type = 'Phone' and action_time BETWEEN '$start_time' and '$end_time' then 1 else 0 end) Phone,
                                sum(case when action_type = 'Communication' and action_time BETWEEN '$start_time' and '$end_time' then 1 else 0 end) Communication,
                                sum(case when action_type = 'Coordination' and action_time BETWEEN '$start_time' and '$end_time' then 1 else 0 end) Coordination,
                                sum(case when action_type = 'Report' and action_time BETWEEN '$start_time' and '$end_time' then 1 else 0 end) Report,
                                    sum(case when action_type = 'Other' and action_time BETWEEN '$start_time' and '$end_time' then 1 else 0 end) Other,
                                sum(case when action_type = 'Review' and action_time BETWEEN '$start_time' and '$end_time' then 1 else 0 end) Review,
                                sum(case when action_type = 'Forward' and action_time BETWEEN '$start_time' and '$end_time' then 1 else 0 end) Forward
                                from sd_eng_tsk group by Engineer_ID");
        
        return $query->result_array();         
    }
     public function update_new_comments_model($data){
         
      $this->db->insert( 'new_comments_table',$data);

        }
        
        public function search_all_info_by_id_and_date_and_typetask__funcation($id,$type_task,$data){
     
//             $condition = "end_date  BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'";
            
            
            
        $condition = "id =" . "'" . $id . "'". " AND " . "type_task =" . "'". $type_task. "'"." AND " . "end_date  BETWEEN " . "'"  . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'";
        
        $this->db->select('*');
        $this->db->from('task_info_table');
        $this->db->where($condition);
        $this->db->where("states = 'done'");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
        }
          public function show_data_by_id_pending_list_model($id) {
        $condition = "id =" . "'" . $id . "'";
        $this->db->select('*');
        $this->db->from('task_info_table');
        $this->db->where($condition);
        $this->db->where("states = 'Pending'");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function view_comments_model($ticket_no){
            $query=$this->db->query("select * from new_comments_table Where ticket_no=$ticket_no");
            return $query->result_array();   
    }
    public function comments_model_funcation($ticket_no){
            
             $query=$this->db->query("select * from new_comments_table Where ticket_no=$ticket_no");
             return $query->row_array();
    }
// .....................................Pagination .................................       

     public function Pagination_select_model($per_page, $offset) {
        $this->db->select('*');
        $this->db->from('task_info_table');
        $query = $this->db->get('', $per_page, $offset);
        foreach ($query->result() as $row)
            $data[] = $row;
        return $data;
    }
   

   public function record_count(){
        return $this->db->count_all("task_info_table");
    }
//  .....................................Pagination .................................    
     public function pending_task_with_Pagination_model($per_page, $offset) {
        $this->db->select('*');
        $this->db->from('task_info_table');
        $this->db->where('states','Pending');
        $query = $this->db->get('', $per_page, $offset);
        $data=$query->result();
//        foreach ($query->result() as $row)
//            $data[] = $row;
        return $data;   
     }
    
     public function record_count_pending(){
        return $this->db->count_all("task_info_table");
    }
    
    
    
     public function record_count_done(){
        return $this->db->count_all("task_info_table");
    }
  public function done_task_with_Pagination_model($per_page, $offset) {
        $this->db->select('*');
        $this->db->from('task_info_table');
        $this->db->where('states','Done');
        $query = $this->db->get('', $per_page, $offset);
        $data=$query->result();
//        foreach ($query->result() as $row)
//            $data[] = $row;
        return $data;   
     }
     
     
     public function show_data_by_id_model($id,$date_array){
       
        $condition = "id =" . "'" . $id . "'". " AND " . "states =" . "'". 'done' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select('*');
        $this->db->from('task_info_table');
        $this->db->where($condition);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array(); 
        } else {
            return false;
        }  
    }
    
     public function noc_done_by_Eng_ID_summery_model($id,$date_array){
//      $query = $this->db->query("select * from wi_task_tbl where status='Done' and Status = '1'  order by Indexx");
//       return $query->result_array();   
       
        $condition = "id =" . "'" . $id . "'". " AND " . "states =" . "'". 'done' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'GROUP BY type_task ORDER BY type_task";
        $this->db->select('type_task,count(ticket_no) as task_number');
        $this->db->from('task_info_table');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }

    
    public function noc_task_show_by_type_data_model($type_task,$date_array){
       
        $condition = "type_task =" . "'" . $type_task . "'". " AND " . "states =" . "'". 'done' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select('*');
        $this->db->from('task_info_table');
        $this->db->where($condition);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array(); 
        } else {
            return false;
        }  
    }
    
     public function noc_done_summerys_by_task_data_model($type_task,$date_array){
//      $query = $this->db->query("select * from wi_task_tbl where status='Done' and Status = '1'  order by Indexx");
//       return $query->result_array();   
       
        $condition = "type_task =" . "'" . $type_task . "'". " AND " . "states =" . "'". 'done' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'GROUP BY id ORDER BY id";      
        $this->db->select('id,count(ticket_no) as task_number');
        $this->db->from('task_info_table');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }

    
     public function noc_show_data_by_type_id_model($type_task,$id,$date_array){
       
        $condition = "type_task =" . "'" . $type_task . "'". " AND " ."id =" . "'" . $id . "'". " AND " . "states =" . "'". 'done' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select('*');
        $this->db->from('task_info_table');
        $this->db->where($condition);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array(); 
        } else {
            return false;
        }  
    }
    public function noc_task_show_by_data_model($date_array){
       
        $condition = "states =" . "'". 'done' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select('*');
        $this->db->from('task_info_table');
        $this->db->where($condition);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array(); 
        } else {
            return false;
        }  
    }
    
    
     public function noc_done_summerys_by_data_model($date_array){

        $condition = "states =" . "'". 'done' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'GROUP BY type_task ORDER BY type_task";
        $this->db->select('type_task,count(ticket_no) as task_number');
        $this->db->from('task_info_table');
        $this->db->where($condition);
        $query = $this->db->get();
 
        if ($query->num_rows() > 0) {
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    
    public function noc_done_summerys_by_data_model_1($date_array){

        $condition = "states =" . "'". 'done' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'GROUP BY id ORDER BY id";
        $this->db->select('id,count(ticket_no) as task_number');
        $this->db->from('task_info_table');
        $this->db->where($condition);
        $query = $this->db->get();
 
        if ($query->num_rows() > 0) {
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    
    public function show_pending_data_by_id_model($id){
       
       $query=$this->db->query("select * from task_info_table Where id='$id' and states='Pending'");
       return $query->result_array();
        
        
        
        
//         $query = $this->db->query("select * from category where Category_Purpose = 'search_by_page' and Status = '1'  order by Indexx");
//           return $query->result_array();
    }
    
    public function NOC_frist_comments_id_by_model($p_key){  
 
       $condition = "ticket_no =" . "'" . $p_key . "'";
       $query = $this->db->query("select ticket_no,comments from new_comments_table where " . $condition);
       return $query->row();      
    }
     
//    .......................................................................................
    
    
           
    public function test_model($task_info_id){
            
             $query=$this->db->query("select * from new_comments_table Where task_info_id=$task_info_id");
             return $query->row_array();
        }
        
        
    public function change_pw_info($id){
            
             $query=$this->db->query("select * from registration Where id='$id'");
             return $query->row();
        }
        
    public function update_password_model($id ,$update_pw){
        $this->db->where('id',$id);
        $this->db->update('registration',$update_pw);    
    }
     public function update_bck_pwd_model($id ,$update_pw){
        $this->db->where('id',$id);
        $this->db->update('u_bck',$update_pw);  
    }
    
 //////////////////////////////////////////////////////////////////////////////////////////////////////
//...............................  CS MOdel  ....................................................................
///////////////////////////////////////////////////////////////////////////////////////////////////////
    
      public function cs_device_faulty_list_model($zone,$sub_zone,$date_array){
            
     
       if( $zone == '0' && $sub_zone == '0'){
          $condition = "Final_Resolution =" . "'" . 'Link3 Device Faulty/Changed' . "'". " AND " ."end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
          
       }elseif ($zone != '0' && $sub_zone == null) {
             $condition = "Final_Resolution =" . "'" . 'Link3 Device Faulty/Changed' . "'". " AND " ."Zone =" . "'" . $zone . "'". " AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
     
        }elseif ($zone != '0' && $sub_zone != null) {
           $condition = "Final_Resolution =" . "'" . 'Link3 Device Faulty/Changed' . "'". " AND " ."Zone =" . "'" . $zone . "'". " AND " . "Sub_Zone =" . "'". $sub_zone . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
     
        }

        
        $this->db->select('p_key,Client_ID,Client_Name,end_date,Sub_Zone,CTID_Number_SR,Engineer_Name,old_device_SN,new_device_SN');
        $this->db->from('cs_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    
     public function cs_device_RnD_model($zone,$sub_zone,$date_array){
            
     
       if( $zone == '0' && $sub_zone == '0'){
          $condition = "status =" . "'" . 'Not tested yet' . "'". " AND " ."create_time  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
          
       }elseif ($zone != '0' && $sub_zone == null) {
          $condition = "status =" . "'" . 'Not tested yet' . "'". " AND " ."Zone =" . "'" . $zone . "'". " AND " . "create_time  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
     
        }elseif ($zone != '0' && $sub_zone != null) {
          $condition = "status =" . "'" . 'Not tested yet' . "'". " AND " ."Zone =" . "'" . $zone . "'". " AND " . "Sub_Zone =" . "'". $sub_zone . "'"." AND " . "create_time  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
     
        }
        
        $this->db->select('Id,create_time,Sub_Zone,Client_ID,return_issue,device_serial_no,device_model,return_by');
        $this->db->from('cs_return_device_r_n_d');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    
     public function device_testing_summery_model($zone,$sub_zone,$date_array){  
        
       if( $zone == '0' && $sub_zone == '0'){
          $condition = "status =" . "'" . 'Not tested yet' . "'". " AND " ."create_time  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'GROUP BY Sub_Zone ORDER BY Sub_Zone";
          
       }elseif ($zone != '0' && $sub_zone == null) {
          $condition = "status =" . "'" . 'Not tested yet' . "'". " AND " ."Zone =" . "'" . $zone . "'". " AND " . "create_time  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'GROUP BY Sub_Zone ORDER BY Sub_Zone";
     
       }elseif ($zone != '0' && $sub_zone != null) {
          $condition = "status =" . "'" . 'Not tested yet' . "'". " AND " ."Zone =" . "'" . $zone . "'". " AND " . "Sub_Zone =" . "'". $sub_zone . "'"." AND " . "create_time  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'GROUP BY Sub_Zone ORDER BY Sub_Zone";
     
       } 
         
//        $condition = "( status =" . "'". 'Done' . "'"." OR " . "status =" . "'". 'Forwarded to CS' . "'"." OR " . "status =" . "'". 'Forward' . "'".") AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' GROUP BY Problem_Catagory ORDER BY Problem_Catagory";
        $this->db->select('Sub_Zone,count(device_serial_no) as pending_test');
        $this->db->from('cs_return_device_r_n_d');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    
    public function CS_assign_task_page_category(){
            $query = $this->db->query("select * from cs_category_tbl where Category_Purpose = 'CS_assign_task' and Status = '1'  order by Indexx");
           return $query->result_array();
    }
     public function CS_edit_task_page_category(){
            $query = $this->db->query("select * from cs_category_tbl where ( CateGory_name = 'Support_Category' or CateGory_name = 'Client_Category' ) and Status = '1'  order by Indexx");
           return $query->result_array();
    }
   public function CS_pending_task_page_category(){

       $query = $this->db->query("select * from cs_category_tbl where Category_Purpose = 'CS_pending_task' and Status = '1'  order by Indexx");
           return $query->result_array();
   }
   public function save_CS_task_info_model($data){
     
       $this->db->insert('cs_task_list',$data);  
   }
   public function pick_max_p_key_model($Client_ID){
//    ccc
       $condition = "Client_ID =" . "'" . $Client_ID . "'";
       $query = $this->db->query("select max(p_key) as p_key from cs_task_list where " . $condition);
       return $query->row();
       
   }

    public function nmc_task_summery(){
        $start_time=date("Y-m-d 00:00:00");
        $end_time=date("Y-m-d 23:59:59");         
        $query=$this->db->query("select id,Vendor,
                                sum(case when tki_status = '0' then 1 else 0 end) pending,
                                sum(case when tki_status = '1' and in_Resolved BETWEEN '$start_time' and '$end_time' then 1 else 0 end) done
                                from nmc_task group by Vendor");        
        return $query->result_array(); 
    }
    public function nmc_task_details(){
        $query=$this->db->query("select id,Vendor,Name,in_Occurred,type,tki from nmc_task where tki_status = '0' Order by type ASC"); 
        return $query->result_array();   
        
    }
   
   public function CS_dashbroad_model(){
        $start_time=date("Y-m-d 00:00:00");
        $end_time=date("Y-m-d 23:59:59");        
        $query=$this->db->query("select p_key,Engineer_ID,Engineer_Name,Sub_Zone,Zone,CS_status_of_TKI,CTID_Number_SR,work_status,
                                sum(case when CS_status_of_TKI = 'Still Running' then 1 else 0 end) pending,
                                sum(case when start_date BETWEEN '$start_time' and '$end_time' then 1 else 0 end) today_generate_tki,
                                sum(case when CS_status_of_TKI = 'Still Running' and start_date BETWEEN '$start_time' and '$end_time' then 1 else 0 end) today_pending,
                                sum(case when CS_status_of_TKI = 'Completed' and start_date BETWEEN '$start_time' and '$end_time' then 1 else 0 end) today_done, 
                                sum(case when CS_status_of_TKI = 'Completed' and end_date BETWEEN '$start_time' and '$end_time' then 1 else 0 end) done
                                from cs_task_list group by Engineer_Name,Engineer_ID");        
        return $query->result_array(); 
    }
    public function CS_user_dashbroad_model(){
        $id = $this->session->userdata('id');
        $start_time=date("Y-m-d 00:00:00");
        $end_time=date("Y-m-d 23:59:59");        
        $query=$this->db->query("select p_key,Engineer_ID,Engineer_Name,Sub_Zone,Zone,CS_status_of_TKI,CTID_Number_SR,work_status,
                                sum(case when CS_status_of_TKI = 'Still Running' then 1 else 0 end) pending,
                                sum(case when start_date BETWEEN '$start_time' and '$end_time' then 1 else 0 end) today_generate_tki,
                                sum(case when CS_status_of_TKI = 'Still Running' and start_date BETWEEN '$start_time' and '$end_time' then 1 else 0 end) today_pending,
                                sum(case when CS_status_of_TKI = 'Completed' and start_date BETWEEN '$start_time' and '$end_time' then 1 else 0 end) today_done, 
                                sum(case when CS_status_of_TKI = 'Completed' and end_date BETWEEN '$start_time' and '$end_time' then 1 else 0 end) done
                                from cs_task_list where Engineer_ID='$id' group by Engineer_Name,Engineer_ID");        
        return $query->result_array(); 
    }
    
    public function CS_pick_tki_status_model(){
     
        $query = $this->db->query("select Engineer_ID,work_status,CTID_Number_SR from cs_task_list where work_status = '1'");
        return $query->result_array();
    }

    public function CS_user_pick_tki_status_model(){
         $id = $this->session->userdata('id');
        $query = $this->db->query("select Engineer_ID,work_status,CTID_Number_SR from cs_task_list where work_status = '1' and Engineer_ID='$id'");
        return $query->result_array();
    }
    
    public function CS_dashbroad_zone_model(){
      
        $start_time=date("Y-m-d 00:00:00");
        $end_time=date("Y-m-d 23:59:59");
        $query=$this->db->query("select p_key,Sub_Zone,Engineer_ID,Engineer_Name,Zone,
                                sum(case when CS_status_of_TKI = 'Still Running' then 1 else 0 end) pending,
                                sum(case when start_date BETWEEN '$start_time' and '$end_time' then 1 else 0 end) today_generate_tki,
                                sum(case when CS_status_of_TKI = 'Still Running' and start_date BETWEEN '$start_time' and '$end_time' then 1 else 0 end) today_pending,
                                sum(case when CS_status_of_TKI = 'Completed' and start_date BETWEEN '$start_time' and '$end_time' then 1 else 0 end) today_done,
                                sum(case when CS_status_of_TKI = 'Completed' and end_date BETWEEN '$start_time' and '$end_time' then 1 else 0 end) done
                                from cs_task_list group by Sub_Zone");
        
        return $query->result_array();     
    }
    
    public function CS_auser_dashbroad_zone_model($s_ofc){
      
        $start_time=date("Y-m-d 00:00:00");
        $end_time=date("Y-m-d 23:59:59");
        $query=$this->db->query("select p_key,Sub_Zone,Engineer_ID,Engineer_Name,Zone,
                                sum(case when CS_status_of_TKI = 'Still Running' then 1 else 0 end) pending,
                                sum(case when start_date BETWEEN '$start_time' and '$end_time' then 1 else 0 end) today_generate_tki,
                                sum(case when CS_status_of_TKI = 'Still Running' and start_date BETWEEN '$start_time' and '$end_time' then 1 else 0 end) today_pending,
                                sum(case when CS_status_of_TKI = 'Completed' and start_date BETWEEN '$start_time' and '$end_time' then 1 else 0 end) today_done,
                                sum(case when CS_status_of_TKI = 'Completed' and end_date BETWEEN '$start_time' and '$end_time' then 1 else 0 end) done
                                from cs_task_list where Sub_Zone='$s_ofc' group by Sub_Zone");
        
        return $query->result_array(); 
    }

        public function CS_user_dashbroad_zone_model(){
        $id = $this->session->userdata('id');
        $start_time=date("Y-m-d 00:00:00");
        $end_time=date("Y-m-d 23:59:59");
        $query=$this->db->query("select p_key,Sub_Zone,Engineer_ID,Engineer_Name,Zone,
                                sum(case when CS_status_of_TKI = 'Still Running' then 1 else 0 end) pending,
                                sum(case when start_date BETWEEN '$start_time' and '$end_time' then 1 else 0 end) today_generate_tki,
                                sum(case when CS_status_of_TKI = 'Still Running' and start_date BETWEEN '$start_time' and '$end_time' then 1 else 0 end) today_pending,
                                sum(case when CS_status_of_TKI = 'Completed' and start_date BETWEEN '$start_time' and '$end_time' then 1 else 0 end) today_done,
                                sum(case when CS_status_of_TKI = 'Completed' and end_date BETWEEN '$start_time' and '$end_time' then 1 else 0 end) done
                                from cs_task_list where Engineer_ID='$id' group by Sub_Zone");
        
        return $query->result_array();     
    }
    
     public function NOC_dashbroad_task_model(){ 
        $start_time=date("Y-m-d 00:00:00");
        $end_time=date("Y-m-d 23:59:59");
        $query=$this->db->query("select type_task,
                                sum(case when states = 'pending' then 1 else 0 end) pending,
                                sum(case when states = 'Done' and end_date BETWEEN '$start_time' and '$end_time' then 1 else 0 end) done
                                from task_info_table group by type_task");
        
        return $query->result_array();      
    }
    
     public function NOC_worktime_monthly_model(){ 
        $start_time=date("Y-m-01 00:00:00");
        $end_time=date("Y-m-31 23:59:59");
        $query=$this->db->query("select CAST(end_date AS DATE) as work_day,
                                sum(case when id = 'L3T685' then 1 else 0 end) L3T685,
                                sum(case when id = 'L3T685' then TIMESTAMPDIFF(second, start_date, end_date) else 0 end) L3T685_WT,
                                sum(case when id = 'L3T857' then 1 else 0 end) L3T857,
                                sum(case when id = 'L3T857' then TIMESTAMPDIFF(second, start_date, end_date) else 0 end) L3T857_WT,
                                sum(case when id = 'L3T941' then 1 else 0 end) L3T941,
                                sum(case when id = 'L3T941' then TIMESTAMPDIFF(second, start_date, end_date) else 0 end) L3T941_WT,
                                sum(case when id = 'L3T974' then 1 else 0 end) L3T974,
                                sum(case when id = 'L3T974' then TIMESTAMPDIFF(second, start_date, end_date) else 0 end) L3T974_WT,
                                sum(case when id = 'L3T1225' then 1 else 0 end) L3T1225,
                                sum(case when id = 'L3T1225' then TIMESTAMPDIFF(second, start_date, end_date) else 0 end) L3T1225_WT,
                                sum(case when id = 'L3T1637' then 1 else 0 end) L3T1637,
                                sum(case when id = 'L3T1637' then TIMESTAMPDIFF(second, start_date, end_date) else 0 end) L3T1637_WT
                                from task_info_table where states = 'Done' and end_date BETWEEN '$start_time' and '$end_time' group by work_day");
        
        return $query->result_array();      
    }

    public function CS_pending_list_by_model(){
        
       $query = $this->db->query("select * from cs_task_list where CS_status_of_TKI = 'Still Running' order by p_key");
       return $query->result_array();  
    }
        
    public function pick_Engineer_ID_model($Engineer_Name){
       
     $query=$this->db->query("select Engineer_ID from cs_engineer_tbl Where Engineer_Name='$Engineer_Name'");
     return $query->row();
    }
    public function Check_CTID_n_SR_model($CTID_Number_SR){
       
     $query=$this->db->query("select CTID_Number_SR from cs_task_list Where CTID_Number_SR='$CTID_Number_SR' and ( TKI_Status='Close' or CS_status_of_TKI='Still Running' )");
     return $query->row();
    }
    public function pick_Engineer_Name_model($Engineer_Name){
       
//     $query=$this->db->query("select Engineer_Name from cs_engineer_tbl Where Engineer_Name LIKE '%$Engineer_Name%'");
//     return $query->result_array();
$this->db->like('Engineer_Name', $Engineer_Name , 'both');
$this->db->order_by('Engineer_Name', 'ASC');
$this->db->limit(10);
return $this->db->get('cs_engineer_tbl')->result();   
     
  
    }
    
    function pick_device_type_model($device_type){
        
        if ($device_type==='Fiber(P2M)') {
                    $query=$this->db->query("select * from cs_category_tbl where Category_Purpose = 'CS_pending_task' and
                                         Status = '1' and Category_name ='new_device_model' and ( D_Value like '%ONU%' or D_Value like '%IPTV%' )  order by Indexx");
        }elseif ($device_type==='Fiber(P2P)') {
                     $query=$this->db->query("select * from cs_category_tbl where Category_Purpose = 'CS_pending_task' and
                                         Status = '1' and Category_name ='new_device_model' and D_Value like '%Media%'  order by Indexx");
        }elseif ($device_type==='Wireless (P2P)' || $device_type==='Wireless (P2M)' ) {
            $query=$this->db->query("select * from cs_category_tbl where Category_Purpose = 'CS_pending_task' and
                                         Status = '1' and Category_name ='new_device_model' and ( D_Value not like '%Media%'and  D_Value not like '%ONU%' ) order by Indexx");
        }
        return $query->result_array();
    }
    

    public function CS_pick_pending_task($p_key){
     
    $query=$this->db->query("select p_key,Initial_Problem_Category,Zone,Support_Category,Sub_Zone,Client_ID,Client_Name,CTID_Number_SR,start_date,Client_Category,Technician_Name from cs_task_list Where p_key='$p_key'");
    return $query->row();   
    
    }
           
    public function CS_done_list_by_model(){
     
       $query = $this->db->query("select * from cs_task_list where CS_status_of_TKI = 'Completed' order by p_key");
       return $query->result_array();         
    }
    public function CS_tik_time_model(){
     
       $query = $this->db->query("select p_key,work_time_start,work_time_end from cs_log_tki_time_tbl where work_status_end = '4' order by p_key");
       return $query->result_array();         
    }
    public function CS_done_task_model($p_key, $data){
      
//        $this->db->insert( 'CS_task_list',$data);         
        $this->db->where('p_key',$p_key);
        $this->db->update('cs_task_list',$data);
    }
    public function Client_device_model($client_device){
      $this->db->insert( 'client_device_info',$client_device);     
    }
     public function pick_Client_device_model($Client_ID){
     
    $query=$this->db->query("select device_model,mac,serial_number from client_device_info Where client_id='$Client_ID'");
    return $query->row();   
    }
    public function update_client_device_info($Client_ID,$u_client_device){
        $this->db->where('client_id',$Client_ID);
        $this->db->update('client_device_info',$u_client_device);   
    }
    
    public function update_testing_device_info($serial_no,$data){
        $this->db->where('device_serial_no',$serial_no);
        $this->db->update('cs_return_device_r_n_d',$data);   
    }
        public function CS_work_on_task_model($p_key, $data){
      
//        $this->db->insert( 'CS_task_list',$data);         
        $this->db->where('p_key',$p_key);
        $this->db->update('cs_task_list',$data);
    }
     public function CS_update_work_tki_time_log($p_key, $t_data){
              
        $this->db->where('p_key',$p_key);
        $this->db->update('cs_log_tki_time_tbl',$t_data);
    }
    public function CS_work_tki_time_log($t_data){
        
        $this->db->insert( 'cs_log_tki_time_tbl',$t_data);
    }

    public function CS_pending_task_zone_page(){
       $query = $this->db->query("select * from cs_category_tbl where Category_Purpose = 'CS_assign_task' and CateGory_name='Zone' and Status = '1'  order by Indexx");
       return $query->result_array();
    }
    
    public function CS_task_report_category(){
       $query = $this->db->query("select * from cs_category_tbl where Category_Purpose = 'CS_assign_task' and (CateGory_name='Zone' or CateGory_name='Client_Category' or CateGory_name='Support_Category' )and Status = '1'  order by Indexx");
       return $query->result_array();
    }
     public function CS_task_BTS_report_category(){
       $query = $this->db->query("select * from cs_category_tbl where Category_Purpose = 'CS_assign_task' and (CateGory_name='Zone' or CateGory_name='Support_Category' )and Status = '1'  order by Indexx");
       return $query->result_array();
    }
    public function pick_BTS_name_model($Zone){
       $query = $this->db->query("select BTS_Name from cs_task_list where Zone='$Zone' group by BTS_Name order by BTS_Name ");
       return $query->result_array();
    }
    public function CS_ALL_pending_list_by_zone_model($Sub_Zone){
             
        $condition = "Sub_Zone =" . "'" . $Sub_Zone . "'". " AND " . "CS_status_of_TKI =" . "'". 'Still Running' . "'";
        $this->db->select('*');
        $this->db->from('cs_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        } 
    }
    
    public function CS_pending_list_by_zone_model($Sub_Zone,$date_array){
             
        $condition = "Sub_Zone =" . "'" . $Sub_Zone . "'". " AND " . "CS_status_of_TKI =" . "'". 'Still Running' . "'"." AND " . "start_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select('*');
        $this->db->from('cs_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        } 
      
      
      
      
    }
    
     public function CS_ALL_pending_list_by_Engineer_ID_model($Engineer_ID){
        
//      $query = $this->db->query("select * from cs_task_list where CS_status_of_TKI = 'Still Running' and Engineer_ID='$Engineer_ID' order by p_key");
//      return $query->result_array();  
         
        $condition = "Engineer_ID =" . "'" . $Engineer_ID . "'". " AND " . "CS_status_of_TKI =" . "'". 'Still Running' . "'";
        $this->db->select('*');
        $this->db->from('cs_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
    }
    
     public function CS_pending_list_by_Engineer_ID_model($Engineer_ID,$date_array){
        
//      $query = $this->db->query("select * from cs_task_list where CS_status_of_TKI = 'Still Running' and Engineer_ID='$Engineer_ID' order by p_key");
//      return $query->result_array();  
         
        $condition = "Engineer_ID =" . "'" . $Engineer_ID . "'". " AND " . "CS_status_of_TKI =" . "'". 'Still Running' . "'"." AND " . "start_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select('*');
        $this->db->from('cs_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
    }
    
    public function CS_pending_list_by_Client_ID_model($Client_ID,$date_array){
       
        
        $condition = "Client_ID =" . "'" . $Client_ID . "'". " AND " . "CS_status_of_TKI =" . "'". 'Still Running' . "'"." AND " . "start_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select('*');
        $this->db->from('cs_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
    }
    
    public function CS_pending_list_by_CTID_Number_SR_model($CTID_Number_SR,$date_array){
        
        $condition = "CTID_Number_SR =" . "'" . $CTID_Number_SR . "'". " AND " . "CS_status_of_TKI =" . "'". 'Still Running' . "'"." AND " . "start_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select('*');
        $this->db->from('cs_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }   
    }

    public function CS_view_comments_model($p_key){
            $query=$this->db->query("select * from cs_comments_tbl Where p_key=$p_key");
            return $query->result_array();
    }
        
    public function CS_update_new_comments_model($c_data){
         
         $this->db->insert( 'cs_comments_tbl',$c_data);
    }
    public function CS_last_comments_id_by_model($p_key){  
 
       $condition = "p_key =" . "'" . $p_key . "'";
       $query = $this->db->query("select max(id_comment) as id_comment,p_key from cs_comments_tbl where " . $condition);
       return $query->row();      
    }
    
    public function CS_last_comments_by_model($id_comment){
        
       $condition = "id_comment =" . "'" . $id_comment . "'";
       $query = $this->db->query("select id_comment,p_key,comments from cs_comments_tbl where " . $condition);
       return $query->row(); 
    }
    
    public function CS_pend_list_record_count(){
       
//      return $this->db->count_all("cs_task_list");
       $status='Still Running';
       $condition = "CS_status_of_TKI =" . "'" . $status . "'";
       $query = $this->db->query("select p_key from cs_task_list where " . $condition);
       return $query->result_array(); 
          
    }

    public function CS_search_pending_task_by_id_model(){
//        zzz
    }

        public function CS_Pagination_select_model($per_page, $offset) {
        $this->db->select('p_key,Client_ID,Client_Name,Sub_Zone,Client_Category,Support_Category,CTID_Number_SR,'
                . 'Initial_Problem_Category,Engineer_Name,start_date,work_start,work_status');
        $this->db->from('cs_task_list');
        $this->db->where('CS_status_of_TKI','Still Running');
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data;
        
    }
    
    public function CS_Done_list_record_count(){
       $date_array['date1']=date("Y-m-d 00:00:00");
       $date_array['date2']=date("Y-m-d 23:59:59");
       $status='Completed';
       $condition ="CS_status_of_TKI =" . "'". 'Completed' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'ORDER BY p_key DESC";
       $query = $this->db->query("select p_key from cs_task_list where " . $condition);
       return $query->result_array(); 
    }
    
     public function CS_Done_task_Pagination_select_model($per_page, $offset) {
         
        $date_array['date1']=date("Y-m-d 00:00:00");
        $date_array['date2']=date("Y-m-d 23:59:59");
//        $condition = "CS_status_of_TKI =" . "'" . 'Completed' . "' ORDER BY p_key DESC ";
        $condition ="CS_status_of_TKI =" . "'". 'Completed' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'ORDER BY p_key DESC";
        $this->db->select('*');
        $this->db->from('cs_task_list');
        $this->db->where($condition);
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)
            $data[] = $row;
        return $data;
    }
    
    public function CS_Done_list_by_zone_model($Zone,$date_array){
     
        $condition = "Zone =" . "'" . $Zone . "'". " AND " . "CS_status_of_TKI =" . "'". 'Completed' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select('*');
        $this->db->from('cs_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        } 
      
    }
    
    public function CS_Done_list_by_subzone_model($Sub_Zone,$date_array){
     
        $condition = "Sub_Zone =" . "'" . $Sub_Zone . "'". " AND " . "CS_status_of_TKI =" . "'". 'Completed' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select('*');
        $this->db->from('cs_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        } 
      
    }
    
    
     public function excel_done_task_List($Sub_Zone,$date_array) {
         
        $condition = "e.Sub_Zone =" . "'" . $Sub_Zone . "'". " AND " . "e.CS_status_of_TKI =" . "'". 'Completed' . "'"." AND " . "e.end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//        $this->db->select(array('e.Client_Name', 'e.Sub_Zone', 'e.Engineer_Name', 'e.CS_status_of_TKI'));
       $this->db->select(array('e.BTS_Name','e.Client_ID','e.Client_Name', 'e.Sub_Zone', 'e.Client_Category','e.Support_Category','e.CTID_Number_SR','e.Initial_Problem_Category', 'e.Engineer_Name','e.start_date', 'e.TKI_Status','e.end_date','e.Support_Type','e.Final_Resolution','e.Technician_Name'));
        $this->db->from('cs_task_list as e');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result_array();
    }
    
      public function excel_done_task_List_1($zone,$date_array) {
         
        $condition = "e.Zone =" . "'" . $zone . "'". " AND " . "e.CS_status_of_TKI =" . "'". 'Completed' . "'"." AND " . "e.end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//        $this->db->select(array('e.Client_Name', 'e.Sub_Zone', 'e.Engineer_Name', 'e.CS_status_of_TKI'));
       $this->db->select(array('e.BTS_Name','e.Client_ID','e.Client_Name', 'e.Sub_Zone', 'e.Client_Category','e.Support_Category','e.CTID_Number_SR','e.Initial_Problem_Category', 'e.Engineer_Name','e.start_date', 'e.TKI_Status','e.end_date','e.Support_Type','e.Final_Resolution','e.Technician_Name'));
        $this->db->from('cs_task_list as e');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result_array();
   
    }
    
    public function excel_done_task_List_2($date_array) {
         
        $condition = "e.CS_status_of_TKI =" . "'". 'Completed' . "'"." AND " . "e.end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//        $this->db->select(array('e.Client_Name', 'e.Sub_Zone', 'e.Engineer_Name', 'e.CS_status_of_TKI'));
       $this->db->select(array('e.BTS_Name','e.Client_ID','e.Client_Name', 'e.Sub_Zone', 'e.Client_Category','e.Support_Category','e.CTID_Number_SR','e.Initial_Problem_Category', 'e.Engineer_Name','e.start_date', 'e.TKI_Status','e.end_date','e.Support_Type','e.Final_Resolution','e.Technician_Name'));
        $this->db->from('cs_task_list as e');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function CS_Done_list_by_Engineer_ID_model($Engineer_ID,$date_array){
     
        $condition = "Engineer_ID =" . "'" . $Engineer_ID . "'". " AND " . "CS_status_of_TKI =" . "'". 'Completed' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select('*');
        $this->db->from('cs_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }
    
    public function CS_Done_list_by_Client_ID_model($Client_ID,$date_array){
        
      $condition = "Client_ID =" . "'" . $Client_ID . "'". " AND " . "CS_status_of_TKI =" . "'". 'Completed' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select('*');
        $this->db->from('cs_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }  
    }

        public function CS_Done_list_by_CTID_SR_model($CTID_Number_SR,$date_array){
     
//        $condition = "CTID_Number_SR =" . "'" . $CTID_Number_SR . "'". " AND " . "CS_status_of_TKI =" . "'". 'Completed' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        
        
        
        
        $condition = "CTID_Number_SR =" . "'" . $CTID_Number_SR . "'"." AND " . "start_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        
        
        $this->db->select('*');
        $this->db->from('cs_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
//            return $query->result();
            return $query->result_array(); 
        } else {
            return false;
        }
        
    }    
    
    public function CS_excel_done_task_List_by_CTID_Number_SR($CTID_Number_SR,$date_array){
        
        $condition = "e.CTID_Number_SR =" . "'" . $CTID_Number_SR . "'". " AND " . "e.CS_status_of_TKI =" . "'". 'Completed' . "'"." AND " . "e.end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//        $this->db->select(array('e.Client_Name', 'e.Sub_Zone', 'e.Engineer_Name', 'e.CS_status_of_TKI'));
       $this->db->select(array('e.Client_ID','e.Client_Name', 'e.Sub_Zone', 'e.Client_Category','e.Support_Category','e.CTID_Number_SR','e.Initial_Problem_Category', 'e.Engineer_Name','e.start_date', 'e.TKI_Status','e.end_date','e.Support_Type','e.Final_Resolution','e.Technician_Name'));
        $this->db->from('cs_task_list as e');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result_array(); 
        
    }

    public function CS_transfer_task_page_category(){
            $query = $this->db->query("select * from cs_category_tbl where CateGory_name = 'Sub_Zone' and Status = '1'  order by Indexx");
           return $query->result_array();
           }
    
     public function CS_save_task_transfer_info_model($data) {
          
        $this->db->insert( 'cs_task_transfer_table',$data);                       
        }
        
     public function Update_task_transfer_info_model($ticket_no ,$task_id_info){
            
        $this->db->where('p_key',$ticket_no);
        $this->db->update('cs_task_list',$task_id_info);  
        
        
    }  
    public function Update_cs_task_info_model($ticket_no,$update){
       
        $this->db->where('p_key',$ticket_no);
        $this->db->update('cs_task_list',$update);    
    }

    
    public function noc_excel_done_task_List_by_ID($Engineer_ID,$date_array){
      
        $condition = "e.id =" . "'" . $Engineer_ID . "'". " AND " . "e.states =" . "'". 'Done' . "'"." AND " . "e.end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select(array('e.id','e.name', 'e.type_task', 'e.sub_task','e.client_bts_provider_name','e.mis_mq_ticket_id','e.assign_by', 'e.start_date','e.end_date','e.states'));
        $this->db->from('task_info_table as e');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function noc_excel_done_task_List_by_date($date_array){
      
        $condition = "e.states =" . "'". 'Done' . "'"." AND " . "e.end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select(array('e.id','e.name', 'e.type_task', 'e.sub_task','e.client_bts_provider_name','e.mis_mq_ticket_id','e.assign_by', 'e.start_date','e.end_date','e.states'));
        $this->db->from('task_info_table as e');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function noc_excel_done_task_List_by_task_type($type_task,$date_array){
      
        $condition = "e.type_task =" . "'" . $type_task . "'". " AND " . "e.states =" . "'". 'Done' . "'"." AND " . "e.end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select(array('e.id','e.name', 'e.type_task', 'e.sub_task','e.client_bts_provider_name','e.mis_mq_ticket_id','e.assign_by', 'e.start_date','e.end_date','e.states'));
        $this->db->from('task_info_table as e');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function noc_excel_done_task_List_by_ID_task_type($type_task,$Engineer_ID,$date_array){
      
        $condition = "e.type_task =" . "'" . $type_task . "'". " AND " . "e.id =" . "'" . $Engineer_ID . "'". " AND " . "e.states =" . "'". 'Done' . "'"." AND " . "e.end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select(array('e.id','e.name', 'e.type_task', 'e.sub_task','e.client_bts_provider_name','e.mis_mq_ticket_id','e.assign_by', 'e.start_date','e.end_date','e.states'));
        $this->db->from('task_info_table as e');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function CS_excel_done_task_List_by_Engineer_ID($Engineer_ID,$date_array){
      
        $condition = "e.Engineer_ID =" . "'" . $Engineer_ID . "'". " AND " . "e.CS_status_of_TKI =" . "'". 'Completed' . "'"." AND " . "e.end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select(array('e.Client_ID','e.Client_Name', 'e.Sub_Zone', 'e.Client_Category','e.Support_Category','e.CTID_Number_SR','e.Initial_Problem_Category', 'e.Engineer_Name','e.start_date', 'e.TKI_Status','e.end_date','e.Support_Type','e.Final_Resolution','e.Technician_Name'));
        $this->db->from('cs_task_list as e');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function CS_excel_done_task_List_by_Client_ID($Client_ID,$date_array){
        
       $condition = "e.Client_ID =" . "'" . $Client_ID . "'". " AND " . "e.CS_status_of_TKI =" . "'". 'Completed' . "'"." AND " . "e.end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select(array('e.Client_ID','e.Client_Name', 'e.Sub_Zone', 'e.Client_Category','e.Support_Category','e.CTID_Number_SR','e.Initial_Problem_Category', 'e.Engineer_Name','e.start_date', 'e.TKI_Status','e.end_date','e.Support_Type','e.Final_Resolution','e.Technician_Name'));
        $this->db->from('cs_task_list as e');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result_array();  
    }
    public function cs_count_per_ptask($id){
     
           $query = $this->db->query("select count(p_key) as c_number from cs_task_list where Engineer_ID = '$id' and CS_status_of_TKI = 'Still Running'");
//           return $query->result_array();
            return $query->row();
         
    }
    
     public function CS_report_model(){
          $query=$this->db->query("select p_key,Zone,Sub_Zone,Engineer_ID,Engineer_Name,Support_Type,
                                sum(case when Support_Category = 'Change_Request' then 1 else 0 end) Change_Request,
                                sum(case when Support_Category = 'Installation' then 1 else 0 end) Installation,
                                sum(case when Support_Category = 'Survey' then 1 else 0 end) Survey,
                                sum(case when Support_Category = 'Troubleshoot' then 1 else 0 end) Troubleshoot,
                                sum(case when Support_Type = 'Over Phone' then 1 else 0 end) Over_Phone,
                                sum(case when Support_Type = 'Field Support' then 1 else 0 end) Field_Support,
                                sum(case when Support_Type = 'Automatic UP' then 1 else 0 end) Automatic_UP
                                from cs_task_list where ( work_status=4 ) group by Engineer_ID ORDER BY Zone,Sub_Zone,Engineer_Name ASC");        
        return $query->result_array(); 
      
    }
    public function CS_report_date_model($date_array){
          $condition =  "work_status =" . "'". '4' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
          $query=$this->db->query("select p_key,Zone,Sub_Zone,Engineer_ID,Engineer_Name,Support_Type,
                                sum(case when Support_Category = 'Change_Request' then 1 else 0 end) Change_Request,
                                sum(case when Support_Category = 'Installation' then 1 else 0 end) Installation,
                                sum(case when Support_Category = 'Survey' then 1 else 0 end) Survey,
                                sum(case when Support_Category = 'Troubleshoot' then 1 else 0 end) Troubleshoot,
                                sum(case when Support_Type = 'Over Phone' then 1 else 0 end) Over_Phone,
                                sum(case when Support_Type = 'Field Support' then 1 else 0 end) Field_Support,
                                sum(case when Support_Type = 'Automatic UP' then 1 else 0 end) Automatic_UP
                                from cs_task_list where ( $condition ) group by Engineer_ID ORDER BY Zone,Sub_Zone,Engineer_Name ASC");        
        return $query->result_array(); 
    }
    public function CS_report_zone_model($Zone){
        $condition =  "work_status =" . "'". '4' . "'"." AND " . "Zone=" . "'"  . $Zone . "'";
          $query=$this->db->query("select p_key,Zone,Sub_Zone,Engineer_ID,Engineer_Name,Support_Type,
                                sum(case when Support_Category = 'Change_Request' then 1 else 0 end) Change_Request,
                                sum(case when Support_Category = 'Installation' then 1 else 0 end) Installation,
                                sum(case when Support_Category = 'Survey' then 1 else 0 end) Survey,
                                sum(case when Support_Category = 'Troubleshoot' then 1 else 0 end) Troubleshoot,
                                sum(case when Support_Type = 'Over Phone' then 1 else 0 end) Over_Phone,
                                sum(case when Support_Type = 'Field Support' then 1 else 0 end) Field_Support,
                                sum(case when Support_Type = 'Automatic UP' then 1 else 0 end) Automatic_UP
                                from cs_task_list where ( $condition ) group by Engineer_ID ORDER BY Zone,Sub_Zone,Engineer_Name ASC");        
        return $query->result_array(); 
    }
    public function CS_report_zone_date_model($Zone,$date_array){
          $condition =  "work_status =" . "'". '4' . "'"." AND " ." Zone =" . "'". $Zone . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
          $query=$this->db->query("select p_key,Zone,Sub_Zone,Engineer_ID,Engineer_Name,Support_Type,
                                sum(case when Support_Category = 'Change_Request' then 1 else 0 end) Change_Request,
                                sum(case when Support_Category = 'Installation' then 1 else 0 end) Installation,
                                sum(case when Support_Category = 'Survey' then 1 else 0 end) Survey,
                                sum(case when Support_Category = 'Troubleshoot' then 1 else 0 end) Troubleshoot,
                                sum(case when Support_Type = 'Over Phone' then 1 else 0 end) Over_Phone,
                                sum(case when Support_Type = 'Field Support' then 1 else 0 end) Field_Support,
                                sum(case when Support_Type = 'Automatic UP' then 1 else 0 end) Automatic_UP
                                from cs_task_list where ( $condition ) group by Engineer_ID ORDER BY Zone,Sub_Zone,Engineer_Name ASC");        
        return $query->result_array();
    }
    public function CS_report_zone_szone_model($Zone){
         $condition =  "work_status =" . "'". '4' . "'"." AND " ." Zone =" . "'". $Zone . "'"." AND " ." Sub_Zone =" . "'". $Sub_Zone . "'";
          $query=$this->db->query("select p_key,Zone,Sub_Zone,Engineer_ID,Engineer_Name,Support_Type,
                                sum(case when Support_Category = 'Change_Request' then 1 else 0 end) Change_Request,
                                sum(case when Support_Category = 'Installation' then 1 else 0 end) Installation,
                                sum(case when Support_Category = 'Survey' then 1 else 0 end) Survey,
                                sum(case when Support_Category = 'Troubleshoot' then 1 else 0 end) Troubleshoot,
                                sum(case when Support_Type = 'Over Phone' then 1 else 0 end) Over_Phone,
                                sum(case when Support_Type = 'Field Support' then 1 else 0 end) Field_Support,
                                sum(case when Support_Type = 'Automatic UP' then 1 else 0 end) Automatic_UP
                                from cs_task_list where ( $condition ) group by Engineer_ID ORDER BY Zone,Sub_Zone,Engineer_Name ASC");        
        return $query->result_array();
    }
    public function CS_report_zone_szone_date_model($Zone,$Sub_Zone,$date_array){
           $condition =  "work_status =" . "'". '4' . "'"." AND " ." Zone =" . "'". $Zone . "'"." AND " ." Sub_Zone =" . "'". $Sub_Zone . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
          $query=$this->db->query("select p_key,Zone,Sub_Zone,Engineer_ID,Engineer_Name,Support_Type,
                                sum(case when Support_Category = 'Change_Request' then 1 else 0 end) Change_Request,
                                sum(case when Support_Category = 'Installation' then 1 else 0 end) Installation,
                                sum(case when Support_Category = 'Survey' then 1 else 0 end) Survey,
                                sum(case when Support_Category = 'Troubleshoot' then 1 else 0 end) Troubleshoot,
                                sum(case when Support_Type = 'Over Phone' then 1 else 0 end) Over_Phone,
                                sum(case when Support_Type = 'Field Support' then 1 else 0 end) Field_Support,
                                sum(case when Support_Type = 'Automatic UP' then 1 else 0 end) Automatic_UP
                                from cs_task_list where ( $condition ) group by Engineer_ID ORDER BY Zone,Sub_Zone,Engineer_Name ASC");        
        return $query->result_array();
    }
    public function CS_report_zone_szone_eng_date_model($Zone,$Sub_Zone,$Engineer_ID,$date_array){
          $condition =  "Engineer_ID =" . "'". $Engineer_ID . "'"." AND " ."work_status =" . "'". '4' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
          $query=$this->db->query("select p_key,Zone,Sub_Zone,Engineer_ID,Engineer_Name,Support_Type,
                                sum(case when Support_Category = 'Change_Request' then 1 else 0 end) Change_Request,
                                sum(case when Support_Category = 'Installation' then 1 else 0 end) Installation,
                                sum(case when Support_Category = 'Survey' then 1 else 0 end) Survey,
                                sum(case when Support_Category = 'Troubleshoot' then 1 else 0 end) Troubleshoot,
                                sum(case when Support_Type = 'Over Phone' then 1 else 0 end) Over_Phone,
                                sum(case when Support_Type = 'Field Support' then 1 else 0 end) Field_Support,
                                sum(case when Support_Type = 'Automatic UP' then 1 else 0 end) Automatic_UP
                                from cs_task_list where ( $condition ) group by Engineer_ID ORDER BY Zone,Sub_Zone,Engineer_Name ASC");        
        return $query->result_array();
    }
    
    public function CS_summerytask_date_model($date_array){
        $condition =  "work_status =" . "'". '4' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $query=$this->db->query("select Zone,
                                sum(case when Support_Category = 'Installation' then 1 else 0 end) Installation,
                                sum(case when Support_Category = 'Change_Request' then 1 else 0 end) Change_Request,
                                sum(case when Support_Category = 'Troubleshoot' then 1 else 0 end) Troubleshoot,
                                sum(case when Support_Category = 'Survey' then 1 else 0 end) Survey
                                from cs_task_list where ( $condition )  group by Zone ORDER BY Zone ASC");        
        return $query->result_array();
    }
    
     public function CS_summerytask_zone_date_model($Zone,$date_array){
        $condition =  "Zone =" . "'". $Zone . "'"." AND " ."work_status =" . "'". '4' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $query=$this->db->query("select Zone,
                                sum(case when Support_Category = 'Installation' then 1 else 0 end) Installation,
                                sum(case when Support_Category = 'Change_Request' then 1 else 0 end) Change_Request,
                                sum(case when Support_Category = 'Troubleshoot' then 1 else 0 end) Troubleshoot,
                                sum(case when Support_Category = 'Survey' then 1 else 0 end) Survey
                                from cs_task_list where ( $condition )  group by Zone ORDER BY Zone ASC");        
        return $query->result_array();
    }
    
    
     public function CS_summerytask_zone_szone_date_model($Zone,$Sub_Zone,$date_array){
        $condition =  "Zone =" . "'". $Zone . "'"." AND " ."Sub_Zone =" . "'". $Sub_Zone . "'"." AND " ."work_status =" . "'". '4' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $query=$this->db->query("select Zone,
                                sum(case when Support_Category = 'Installation' then 1 else 0 end) Installation,
                                sum(case when Support_Category = 'Change_Request' then 1 else 0 end) Change_Request,
                                sum(case when Support_Category = 'Troubleshoot' then 1 else 0 end) Troubleshoot,
                                sum(case when Support_Category = 'Survey' then 1 else 0 end) Survey
                                from cs_task_list where ( $condition )  group by Zone ORDER BY Zone ASC");        
        return $query->result_array();
    }

     public function CS_summerytask_zone_szone_engdate_model($Zone,$Sub_Zone,$Engineer_ID,$date_array){
        $condition =  "Engineer_ID =" . "'". $Engineer_ID . "'"." AND " ."work_status =" . "'". '4' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $query=$this->db->query("select Zone,
                                sum(case when Support_Category = 'Installation' then 1 else 0 end) Installation,
                                sum(case when Support_Category = 'Change_Request' then 1 else 0 end) Change_Request,
                                sum(case when Support_Category = 'Troubleshoot' then 1 else 0 end) Troubleshoot,
                                sum(case when Support_Category = 'Survey' then 1 else 0 end) Survey
                                from cs_task_list where ( $condition )  group by Zone ORDER BY Zone ASC");        
        return $query->result_array();
    }
    
    
    public function CS_installation_date_model($date_array){
          $condition =  "Support_Category =" . "'". 'Installation' . "'"." AND " ."work_status =" . "'". '4' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
          $query=$this->db->query("select p_key,Zone,Client_Category,
                                sum(case when Client_Category = 'BANK' then 1 else 0 end) BANK,
                                sum(case when Client_Category = 'CORPORATE' then 1 else 0 end) CORPORATE,
                                sum(case when Client_Category = 'COMPLEMENTARY' then 1 else 0 end) COMPLEMENTARY,
                                sum(case when Client_Category = 'MQ' then 1 else 0 end) MQ,
                                sum(case when Client_Category = 'NBFI' then 1 else 0 end) NBFI,
                                sum(case when Client_Category = 'RETAIL CORPORATION' then 1 else 0 end) RETAIL_CORPORATION,
                                sum(case when Client_Category = 'RETAIL HOME' then 1 else 0 end) RETAIL_HOME,
                                sum(case when Client_Category = 'Link3 Own' then 1 else 0 end) Link3_Own
                                from cs_task_list where ( $condition ) group by Zone ORDER BY Zone ASC");        
        return $query->result_array(); 
    }
    public function WI_installation_date_model($date_array){
          $condition =  "Support_Category =" . "'". 'Installation' . "'"." AND " ."Initial_Problem_Category =" . "'". 'Radio_Installation' . "'"." AND " ."work_status =" . "'". '4' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
          $query=$this->db->query("select p_key,Zone,Client_Category,
                                sum(case when Client_Category = 'BANK' then 1 else 0 end) BANK,
                                sum(case when Client_Category = 'CORPORATE' then 1 else 0 end) CORPORATE,
                                sum(case when Client_Category = 'COMPLEMENTARY' then 1 else 0 end) COMPLEMENTARY,
                                sum(case when Client_Category = 'MQ' then 1 else 0 end) MQ,
                                sum(case when Client_Category = 'NBFI' then 1 else 0 end) NBFI,
                                sum(case when Client_Category = 'RETAIL CORPORATION' then 1 else 0 end) RETAIL_CORPORATION,
                                sum(case when Client_Category = 'RETAIL HOME' then 1 else 0 end) RETAIL_HOME,
                                sum(case when Client_Category = 'Link3 Own' then 1 else 0 end) Link3_Own
                                from cs_task_list where ( $condition ) group by Zone ORDER BY Zone ASC");        
        return $query->result_array(); 
    }
    public function WI_installation_zone_date_model($Zone,$date_array){
          $condition =  "Zone =" . "'". $Zone . "'"." AND " ."Initial_Problem_Category =" . "'". 'Radio_Installation' . "'"." AND " ."Support_Category =" . "'". 'Installation' . "'"." AND " ."work_status =" . "'". '4' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
          $query=$this->db->query("select p_key,Zone,Client_Category,
                                sum(case when Client_Category = 'BANK' then 1 else 0 end) BANK,
                                sum(case when Client_Category = 'CORPORATE' then 1 else 0 end) CORPORATE,
                                sum(case when Client_Category = 'COMPLEMENTARY' then 1 else 0 end) COMPLEMENTARY,
                                sum(case when Client_Category = 'MQ' then 1 else 0 end) MQ,
                                sum(case when Client_Category = 'NBFI' then 1 else 0 end) NBFI,
                                sum(case when Client_Category = 'RETAIL CORPORATION' then 1 else 0 end) RETAIL_CORPORATION,
                                sum(case when Client_Category = 'RETAIL HOME' then 1 else 0 end) RETAIL_HOME
                                from cs_task_list where ( $condition ) group by Zone ORDER BY Zone ASC");        
        return $query->result_array(); 
    }
    public function CS_installation_zone_date_model($Zone,$date_array){
          $condition =  "Zone =" . "'". $Zone . "'"." AND " ."Support_Category =" . "'". 'Installation' . "'"." AND " ."work_status =" . "'". '4' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
          $query=$this->db->query("select p_key,Zone,Client_Category,
                                sum(case when Client_Category = 'BANK' then 1 else 0 end) BANK,
                                sum(case when Client_Category = 'CORPORATE' then 1 else 0 end) CORPORATE,
                                sum(case when Client_Category = 'COMPLEMENTARY' then 1 else 0 end) COMPLEMENTARY,
                                sum(case when Client_Category = 'MQ' then 1 else 0 end) MQ,
                                sum(case when Client_Category = 'NBFI' then 1 else 0 end) NBFI,
                                sum(case when Client_Category = 'RETAIL CORPORATION' then 1 else 0 end) RETAIL_CORPORATION,
                                sum(case when Client_Category = 'RETAIL HOME' then 1 else 0 end) RETAIL_HOME
                                from cs_task_list where ( $condition ) group by Zone ORDER BY Zone ASC");        
        return $query->result_array(); 
    }
    public function CS_installatio_zone_szone_date_model($Zone,$Sub_Zone,$date_array){
          $condition =  "Zone =" . "'". $Zone . "'"." AND " ."Sub_Zone =" . "'". $Sub_Zone . "'"." AND " ."Support_Category =" . "'". 'Installation' . "'"." AND " ."work_status =" . "'". '4' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
          $query=$this->db->query("select p_key,Zone,Client_Category,Sub_Zone,
                                sum(case when Client_Category = 'BANK' then 1 else 0 end) BANK,
                                sum(case when Client_Category = 'CORPORATE' then 1 else 0 end) CORPORATE,
                                sum(case when Client_Category = 'COMPLEMENTARY' then 1 else 0 end) COMPLEMENTARY,
                                sum(case when Client_Category = 'MQ' then 1 else 0 end) MQ,
                                sum(case when Client_Category = 'NBFI' then 1 else 0 end) NBFI,
                                sum(case when Client_Category = 'RETAIL CORPORATION' then 1 else 0 end) RETAIL_CORPORATION,
                                sum(case when Client_Category = 'RETAIL HOME' then 1 else 0 end) RETAIL_HOME,
                                sum(case when Client_Category = 'Link3 Own' then 1 else 0 end) Link3_Own
                                from cs_task_list where ( $condition ) group by Zone ORDER BY Zone ASC");        
        return $query->result_array();
    }
    public function CS_installatio_zone_szone_eng_date_model($Zone,$Sub_Zone,$Engineer_ID,$date_array){
          $condition =  "Engineer_ID =" . "'". $Engineer_ID . "'"." AND " ."Support_Category =" . "'". 'Installation' . "'"." AND " ."work_status =" . "'". '4' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        
           
          $query=$this->db->query("select p_key,Zone,Client_Category,Sub_Zone,
                                sum(case when Client_Category = 'BANK' then 1 else 0 end) BANK,
                                sum(case when Client_Category = 'CORPORATE' then 1 else 0 end) CORPORATE,
                                sum(case when Client_Category = 'COMPLEMENTARY' then 1 else 0 end) COMPLEMENTARY,
                                sum(case when Client_Category = 'MQ' then 1 else 0 end) MQ,
                                sum(case when Client_Category = 'NBFI' then 1 else 0 end) NBFI,
                                sum(case when Client_Category = 'RETAIL CORPORATION' then 1 else 0 end) RETAIL_CORPORATION,
                                sum(case when Client_Category = 'RETAIL HOME' then 1 else 0 end) RETAIL_HOME,
                                sum(case when Client_Category = 'Link3 Own' then 1 else 0 end) Link3_Own
                                from cs_task_list where ( $condition ) group by Zone ORDER BY Zone ASC");        
        return $query->result_array();
    }
    public function CS_troubleshoot_date_model($date_array){
          $condition =  "Support_Category =" . "'". 'Troubleshoot' . "'"." AND " ."work_status =" . "'". '4' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
          $query=$this->db->query("select p_key,Initial_Problem_Category,
                                sum(case when Initial_Problem_Category = 'Bandwidth_Problem' then 1 else 0 end) Bandwidth_Problem,
                                sum(case when Initial_Problem_Category = 'Device_Fault' then 1 else 0 end) Device_Fault,
                                sum(case when Initial_Problem_Category = 'IP_Blacklisted' then 1 else 0 end) IP_Blacklisted,
                                sum(case when Initial_Problem_Category = 'IP_Change' then 1 else 0 end) IP_Change,
                                sum(case when Initial_Problem_Category = 'IP_Phone_Problem' then 1 else 0 end) IP_Phone_Problem,
                                sum(case when Initial_Problem_Category = 'LAN_Support' then 1 else 0 end) LAN_Support,
                                sum(case when Initial_Problem_Category = 'Latency_High' then 1 else 0 end) Latency_High,
                                sum(case when Initial_Problem_Category = 'Link_Down' then 1 else 0 end) Link_Down,
                                sum(case when Initial_Problem_Category = 'Router_Configure' then 1 else 0 end) Router_Configure,
                                sum(case when Initial_Problem_Category = 'MQ_Login_Issue' then 1 else 0 end) MQ_Login_Issue,
                                sum(case when Initial_Problem_Category = 'Other_Problem' then 1 else 0 end) Other_Problem,
                                sum(case when Initial_Problem_Category = 'Packet_Loss' then 1 else 0 end) Packet_Loss,
                                sum(case when Initial_Problem_Category = 'Mail_Problem' then 1 else 0 end) Mail_Problem,
                                sum(case when Initial_Problem_Category = 'Plan_Change' then 1 else 0 end) Plan_Change,
                                sum(case when Initial_Problem_Category = 'Website_issue' then 1 else 0 end) Website_issue,
                                sum(case when Initial_Problem_Category = 'Wifi_Problem' then 1 else 0 end) Wifi_Problem,
                                sum(case when Initial_Problem_Category = 'Link_Interruption' then 1 else 0 end) Link_Interruption,
                                sum(case when Initial_Problem_Category = 'Password_Change' then 1 else 0 end) Password_Change
                                from cs_task_list where ( $condition ) group by Initial_Problem_Category ORDER BY Initial_Problem_Category ASC");        
        return $query->result_array(); 
    }
    
    public function CS_troubleshoot_zone_date_model($Zone,$date_array){
         $condition =  "Zone =" . "'". $Zone . "'"." AND " ."Support_Category =" . "'". 'Troubleshoot' . "'"." AND " ."work_status =" . "'". '4' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
          $query=$this->db->query("select p_key,Initial_Problem_Category,
                                sum(case when Initial_Problem_Category = 'Bandwidth_Problem' then 1 else 0 end) Bandwidth_Problem,
                                sum(case when Initial_Problem_Category = 'Device_Fault' then 1 else 0 end) Device_Fault,
                                sum(case when Initial_Problem_Category = 'IP_Blacklisted' then 1 else 0 end) IP_Blacklisted,
                                sum(case when Initial_Problem_Category = 'IP_Change' then 1 else 0 end) IP_Change,
                                sum(case when Initial_Problem_Category = 'IP_Phone_Problem' then 1 else 0 end) IP_Phone_Problem,
                                sum(case when Initial_Problem_Category = 'LAN_Support' then 1 else 0 end) LAN_Support,
                                sum(case when Initial_Problem_Category = 'Latency_High' then 1 else 0 end) Latency_High,
                                sum(case when Initial_Problem_Category = 'Link_Down' then 1 else 0 end) Link_Down,
                                sum(case when Initial_Problem_Category = 'Router_Configure' then 1 else 0 end) Router_Configure,
                                sum(case when Initial_Problem_Category = 'MQ_Login_Issue' then 1 else 0 end) MQ_Login_Issue,
                                sum(case when Initial_Problem_Category = 'Other_Problem' then 1 else 0 end) Other_Problem,
                                sum(case when Initial_Problem_Category = 'Packet_Loss' then 1 else 0 end) Packet_Loss,
                                sum(case when Initial_Problem_Category = 'Mail_Problem' then 1 else 0 end) Mail_Problem,
                                sum(case when Initial_Problem_Category = 'Plan_Change' then 1 else 0 end) Plan_Change,
                                sum(case when Initial_Problem_Category = 'Website_issue' then 1 else 0 end) Website_issue,
                                sum(case when Initial_Problem_Category = 'Wifi_Problem' then 1 else 0 end) Wifi_Problem,
                                sum(case when Initial_Problem_Category = 'Link_Interruption' then 1 else 0 end) Link_Interruption,
                                sum(case when Initial_Problem_Category = 'Password_Change' then 1 else 0 end) Password_Change
                                from cs_task_list where ( $condition ) group by Initial_Problem_Category ORDER BY Initial_Problem_Category ASC");        
        return $query->result_array(); 
    }
    public function CS_troubleshoot_zone_szone_date_model($Zone,$Sub_Zone,$date_array){
        $condition =  "Sub_Zone =" . "'". $Sub_Zone . "'"." AND " ."Zone =" . "'". $Zone . "'"." AND " ."Support_Category =" . "'". 'Troubleshoot' . "'"." AND " ."work_status =" . "'". '4' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
          $query=$this->db->query("select p_key,Initial_Problem_Category,Sub_Zone,
                                sum(case when Initial_Problem_Category = 'Bandwidth_Problem' then 1 else 0 end) Bandwidth_Problem,
                                sum(case when Initial_Problem_Category = 'Device_Fault' then 1 else 0 end) Device_Fault,
                                sum(case when Initial_Problem_Category = 'IP_Blacklisted' then 1 else 0 end) IP_Blacklisted,
                                sum(case when Initial_Problem_Category = 'IP_Change' then 1 else 0 end) IP_Change,
                                sum(case when Initial_Problem_Category = 'IP_Phone_Problem' then 1 else 0 end) IP_Phone_Problem,
                                sum(case when Initial_Problem_Category = 'LAN_Support' then 1 else 0 end) LAN_Support,
                                sum(case when Initial_Problem_Category = 'Latency_High' then 1 else 0 end) Latency_High,
                                sum(case when Initial_Problem_Category = 'Link_Down' then 1 else 0 end) Link_Down,
                                sum(case when Initial_Problem_Category = 'Router_Configure' then 1 else 0 end) Router_Configure,
                                sum(case when Initial_Problem_Category = 'MQ_Login_Issue' then 1 else 0 end) MQ_Login_Issue,
                                sum(case when Initial_Problem_Category = 'Other_Problem' then 1 else 0 end) Other_Problem,
                                sum(case when Initial_Problem_Category = 'Packet_Loss' then 1 else 0 end) Packet_Loss,
                                sum(case when Initial_Problem_Category = 'Mail_Problem' then 1 else 0 end) Mail_Problem,
                                sum(case when Initial_Problem_Category = 'Plan_Change' then 1 else 0 end) Plan_Change,
                                sum(case when Initial_Problem_Category = 'Website_issue' then 1 else 0 end) Website_issue,
                                sum(case when Initial_Problem_Category = 'Wifi_Problem' then 1 else 0 end) Wifi_Problem,
                                sum(case when Initial_Problem_Category = 'Link_Interruption' then 1 else 0 end) Link_Interruption,
                                sum(case when Initial_Problem_Category = 'Password_Change' then 1 else 0 end) Password_Change
                                from cs_task_list where ( $condition ) group by Initial_Problem_Category ORDER BY Initial_Problem_Category ASC");        
        return $query->result_array();  
    }
    public function CS_troubleshoot_zone_szone_eng_date_model($Zone,$Sub_Zone,$Engineer_ID,$date_array){
     
           $condition =  "Engineer_ID =" . "'". $Engineer_ID . "'"." AND " ."Support_Category =" . "'". 'Troubleshoot' . "'"." AND " ."work_status =" . "'". '4' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
         
         $query=$this->db->query("select p_key,Initial_Problem_Category,Sub_Zone,
                                sum(case when Initial_Problem_Category = 'Bandwidth_Problem' then 1 else 0 end) Bandwidth_Problem,
                                sum(case when Initial_Problem_Category = 'Device_Fault' then 1 else 0 end) Device_Fault,
                                sum(case when Initial_Problem_Category = 'IP_Blacklisted' then 1 else 0 end) IP_Blacklisted,
                                sum(case when Initial_Problem_Category = 'IP_Change' then 1 else 0 end) IP_Change,
                                sum(case when Initial_Problem_Category = 'IP_Phone_Problem' then 1 else 0 end) IP_Phone_Problem,
                                sum(case when Initial_Problem_Category = 'LAN_Support' then 1 else 0 end) LAN_Support,
                                sum(case when Initial_Problem_Category = 'Latency_High' then 1 else 0 end) Latency_High,
                                sum(case when Initial_Problem_Category = 'Link_Down' then 1 else 0 end) Link_Down,
                                sum(case when Initial_Problem_Category = 'Router_Configure' then 1 else 0 end) Router_Configure,
                                sum(case when Initial_Problem_Category = 'MQ_Login_Issue' then 1 else 0 end) MQ_Login_Issue,
                                sum(case when Initial_Problem_Category = 'Other_Problem' then 1 else 0 end) Other_Problem,
                                sum(case when Initial_Problem_Category = 'Packet_Loss' then 1 else 0 end) Packet_Loss,
                                sum(case when Initial_Problem_Category = 'Mail_Problem' then 1 else 0 end) Mail_Problem,
                                sum(case when Initial_Problem_Category = 'Plan_Change' then 1 else 0 end) Plan_Change,
                                sum(case when Initial_Problem_Category = 'Website_issue' then 1 else 0 end) Website_issue,
                                sum(case when Initial_Problem_Category = 'Wifi_Problem' then 1 else 0 end) Wifi_Problem,
                                sum(case when Initial_Problem_Category = 'Link_Interruption' then 1 else 0 end) Link_Interruption,
                                sum(case when Initial_Problem_Category = 'Password_Change' then 1 else 0 end) Password_Change
                                from cs_task_list where ( $condition ) group by Initial_Problem_Category ORDER BY Initial_Problem_Category ASC");        
        return $query->result_array();   
        
    }
    
    public function CS_date_result_zone_szone_eng_date_model($Zone,$Sub_Zone,$Engineer_ID,$date_array){
       
          $condition =  "Engineer_ID =" . "'". $Engineer_ID . "'"." AND " ."work_status =" . "'". '4' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
          $query=$this->db->query("select p_key,DATE(end_date) as date,Initial_Problem_Category,Zone,Sub_Zone,Engineer_ID,Engineer_Name,Support_Type,
                                sum(case when Support_Category = 'Change_Request' then 1 else 0 end) Change_Request,
                                sum(case when Support_Category = 'Installation' then 1 else 0 end) Installation,
                                sum(case when Support_Category = 'Survey' then 1 else 0 end) Survey,
                                sum(case when Support_Category = 'Troubleshoot' then 1 else 0 end) Troubleshoot,
                                sum(case when Support_Type = 'Over Phone' then 1 else 0 end) Over_Phone,
                                sum(case when Support_Type = 'Field Support' then 1 else 0 end) Field_Support,
                                sum(case when Support_Type = 'Automatic UP' then 1 else 0 end) Automatic_UP
                                from cs_task_list where ( $condition ) group by date ORDER BY date,Zone,Sub_Zone ASC");        
        return $query->result_array(); 
    }
    
    public function CS_date_result_cs_troubleshoot_time_model($Engineer_ID,$date_array){  //work_status_end
         
        $condition =  "create_id =" . "'". $Engineer_ID . "'"." AND " . "work_status_end =" . "'". '4' . "'"." AND " ."category =" . "'". 'Troubleshoot' . "'"." AND " . "create_time  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $query=$this->db->query("select create_id, TIMEDIFF( work_time_end,work_time_start) AS time_Diff
                                from cs_log_tki_time_tbl where ( $condition ) ORDER BY time_Diff ASC");        
        return $query->result_array(); 
    }
    
    public function CS_date_result_cs_troubleshoot_time_model_1($date_array){
        
        $condition =  "work_status_end =" . "'". '4' . "'"." AND " ."category =" . "'". 'Troubleshoot' . "'"." AND " . "create_time  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $query=$this->db->query("select create_id, TIMEDIFF( work_time_end,work_time_start) AS time_Diff
                                from cs_log_tki_time_tbl where ( $condition ) ORDER BY create_id,time_Diff ASC"); 
        
        return $query->result_array();
    }
    
    public function CS_attend_model($date_array){
        
        $condition = "create_time  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $query=$this->db->query("select create_id, DATE(create_time) as date
                                from cs_log_tki_time_tbl where ( $condition ) group by date,create_id");   
        return $query->result_array();
    }

    public function cs_report_details_id_date_model($date,$Engineer_ID){
        
//        $date_array['date1']='2019-02-11 00:00:00';
        $date_array['date1']=$date.' 00:00:00';
        
//        $date_array['date2']='2019-02-11 23:59:59';
        $date_array['date2']=$date.' 23:59:59';
        
//        $Engineer_ID='L3T1046';
        
        $condition = "Engineer_ID =" . "'" . $Engineer_ID . "'". " AND " . "work_status =" . "'". '4' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        $this->db->select('*');
        $this->db->from('cs_task_list');
        $this->db->where($condition);
        $query = $this->db->get();
                
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    public function cs_BTS_report_details_OLT_model($BTS,$Initial_Problem_Category,$date_array){
        
        if($Initial_Problem_Category=='All' || $Initial_Problem_Category==null){
             $condition = "BTS_Name =" . "'" . $BTS . "'". " AND " . "work_status =" . "'". '4' . "'". " AND " . "Support_Category =" . "'". 'Troubleshoot' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
            
        }else{
              $condition = "BTS_Name =" . "'" . $BTS . "'". " AND " . "Initial_Problem_Category =" . "'" . $Initial_Problem_Category . "'". " AND " . "work_status =" . "'". '4' . "'". " AND " . "Support_Category =" . "'". 'Troubleshoot' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
     
        }
//      $condition = "BTS_Name =" . "'" . $BTS . "'". " AND " . "work_status =" . "'". '4' . "'". " AND " . "Support_Category =" . "'". 'Troubleshoot' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//            
        $this->db->select('OLT_Name,count(OLT_Name) as olt_number');
        $this->db->from('cs_task_list');
        $this->db->where($condition.'Group by OLT_Name Order by olt_number DESC');
        $query = $this->db->get();
                
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
     public function cs_BTS_report_details_OLT_model_1($BTS,$Initial_Problem_Category,$date_array){
        
         
       if($Initial_Problem_Category == 'All' || $Initial_Problem_Category == null){
           $condition = "BTS_Name =" . "'" . $BTS . "'". " AND " . "work_status =" . "'". '4' . "'". " AND " . "Support_Category =" . "'". 'Troubleshoot' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//        
       }else{
         $condition = "BTS_Name =" . "'" . $BTS . "'". " AND " ."Initial_Problem_Category =" . "'" . $Initial_Problem_Category . "'". " AND " . "work_status =" . "'". '4' . "'". " AND " . "Support_Category =" . "'". 'Troubleshoot' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
//        
       }  
//        $condition = "BTS_Name =" . "'" . $BTS . "'". " AND " . "work_status =" . "'". '4' . "'". " AND " . "Support_Category =" . "'". 'Troubleshoot' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        
         
        $this->db->select('Initial_Problem_Category,count(Initial_Problem_Category) as problem_number');
        $this->db->from('cs_task_list');
        $this->db->where($condition.'Group by Initial_Problem_Category Order by problem_number DESC');
        $query = $this->db->get();
                
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
     public function cs_BTS_report_details_OLT_model_2($BTS,$Initial_Problem_Category,$date_array){
        
       if($Initial_Problem_Category == 'All' || $Initial_Problem_Category == null){
         $condition = "BTS_Name =" . "'" . $BTS . "'". " AND " . "work_status =" . "'". '4' . "'". " AND " . "Support_Category =" . "'". 'Troubleshoot' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
           
       }else{
         $condition = "BTS_Name =" . "'" . $BTS . "'". " AND " ."Initial_Problem_Category =" . "'" . $Initial_Problem_Category . "'". " AND " . "work_status =" . "'". '4' . "'". " AND " . "Support_Category =" . "'". 'Troubleshoot' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
           
       }
//       $condition = "BTS_Name =" . "'" . $BTS . "'". " AND " . "work_status =" . "'". '4' . "'". " AND " . "Support_Category =" . "'". 'Troubleshoot' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
         
        
        $this->db->select('Final_Resolution,count(Final_Resolution) as slove_number');
        $this->db->from('cs_task_list');
        $this->db->where($condition.'Group by Final_Resolution Order by slove_number DESC');
        $query = $this->db->get();
                
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
     public function cs_BTS_report_details_trobuleshoot_model($OLT,$date_array){
        
//        $date_array['date1']=$date.' 00:00:00';
//        $date_array['date2']=$date.' 23:59:59';        
//        $condition = "BTS_Name =" . "'" . $BTS . "'". " AND " . "work_status =" . "'". '4' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        
        $condition = "OLT_Name =" . "'" . $OLT . "'". " AND " . "work_status =" . "'". '4' . "'". " AND " . "Support_Category =" . "'". 'Troubleshoot' . "'" . "AND end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        
        $this->db->select('Initial_Problem_Category,count(Initial_Problem_Category) as problem_number');
        $this->db->from('cs_task_list');
        $this->db->where($condition.'Group by Initial_Problem_Category Order by problem_number DESC');
        $query = $this->db->get();
                
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    
       public function cs_BTS_report_details_solved_model($OLT,$date_array){
        
//        $date_array['date1']=$date.' 00:00:00';
//        $date_array['date2']=$date.' 23:59:59';        
//        $condition = "BTS_Name =" . "'" . $BTS . "'". " AND " . "work_status =" . "'". '4' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        
        $condition = "OLT_Name =" . "'" . $OLT . "'". " AND " . "work_status =" . "'". '4' . "'". " AND " . "Support_Category =" . "'". 'Troubleshoot' . "'" . " AND end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        
        $this->db->select('Final_Resolution,count(Final_Resolution) as slove_number');
        $this->db->from('cs_task_list');
        $this->db->where($condition.'Group by Final_Resolution Order by slove_number DESC');
        $query = $this->db->get();
                
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
      public function cs_BTS_report_details_Initial_Prb_Catgoy_model($OLT,$Initial_Problem_Category,$date_array){
        
//        $date_array['date1']=$date.' 00:00:00';
//        $date_array['date2']=$date.' 23:59:59';        
//        $condition = "BTS_Name =" . "'" . $BTS . "'". " AND " . "work_status =" . "'". '4' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        
        $condition = "Initial_Problem_Category =" . "'" . $Initial_Problem_Category . "'". " AND " ."OLT_Name =" . "'" . $OLT . "'". " AND " . "work_status =" . "'". '4' . "'". " AND " . "Support_Category =" . "'". 'Troubleshoot' . "'"."AND end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        
        $this->db->select('Final_Resolution,count(Final_Resolution) as slove_number');
        $this->db->from('cs_task_list');
        $this->db->where($condition.'Group by Final_Resolution Order by slove_number DESC');
        $query = $this->db->get();
                
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
      public function cs_BTS_report_details_Initial_Prb_Catgoy_model_1($BTS_Name,$Initial_Problem_Category,$date_array){
        
//        $date_array['date1']=$date.' 00:00:00';
//        $date_array['date2']=$date.' 23:59:59';        
//        $condition = "BTS_Name =" . "'" . $BTS . "'". " AND " . "work_status =" . "'". '4' . "'"." AND " . "end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        
        $condition = "Initial_Problem_Category =" . "'" . $Initial_Problem_Category . "'". " AND " ."BTS_Name =" . "'" . $BTS_Name . "'". " AND " . "work_status =" . "'". '4' . "'". " AND " . "Support_Category =" . "'". 'Troubleshoot' . "'"."AND end_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
        
        $this->db->select('Final_Resolution,count(Final_Resolution) as slove_number');
        $this->db->from('cs_task_list');
        $this->db->where($condition.'Group by Final_Resolution Order by slove_number DESC');
        $query = $this->db->get();
                
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    public function user_list_model(){
        
       $query = $this->db->query("select * from registration where  User_Status = '1'  order by Zone,department,support_ofc,name");
       return $query->result_array(); 
    }
    public function user_list_by_dept_model($department){
        
       $query = $this->db->query("select * from registration where department like '$department%' and  User_Status = '1'   order by Zone,department,support_ofc,name");
       return $query->result_array(); 
    }
    public function user_list_by_zone_model($Zone){
        
       $query = $this->db->query("select * from registration where Zone = '$Zone' and  User_Status = '1'   order by Zone,department,support_ofc,name");
       return $query->result_array(); 
    }
    public function user_list_by_dept_zone_model($department,$Zone){
        
       $query = $this->db->query("select * from registration where department like '$department%' and Zone = '$Zone' and  User_Status = '1'   order by Zone,department,support_ofc,name");
       return $query->result_array(); 
    }
    
    public function remove_user_model($id,$data){
        $condition = "id =" . "'" . $id . "'";
        $this->db->where($condition);
        $this->db->update('registration',$data);
    }
    public function find_ename_model($Name){
        $query = $this->db->query("select name from registration where name like '$Name%' and  User_Status = '1'   order by name");
       return $query->result_array(); 
        
    }
    
//    ........................................ CS Report...............................................................................
     public function CS_BTS_report_monthly($date_array){
        
          $condition =  "BTS_Name !=" . "'". '' . "'"." AND " ."CS_status_of_TKI =" . "'". 'Completed' . "'"." AND " ."Support_Category =" . "'". 'Troubleshoot' . "'"." AND " . "start_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
          $query=$this->db->query("select p_key,Zone,Sub_Zone,Engineer_ID,BTS_Name,Support_Type,
                                sum(case when Support_Category = 'Troubleshoot' then 1 else 0 end) Support_Category
                                from cs_task_list where ( $condition ) group by BTS_Name ORDER BY Zone,Support_Category DESC");        
        return $query->result_array(); 
        
    }
    
     public function CS_BTS_TS_report_monthly($date_array,$Initial_Problem_Category){
        
          $condition =  "BTS_Name !=" . "'". '' . "'"." AND " ."Initial_Problem_Category =" . "'". $Initial_Problem_Category . "'"." AND " ."CS_status_of_TKI =" . "'". 'Completed' . "'"." AND " ."Support_Category =" . "'". 'Troubleshoot' . "'"." AND " . "start_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
          $query=$this->db->query("select p_key,Zone,Sub_Zone,Engineer_ID,BTS_Name,Support_Type,
                                sum(case when Support_Category = 'Troubleshoot' then 1 else 0 end) Support_Category
                                from cs_task_list where ( $condition ) group by BTS_Name ORDER BY Zone,Support_Category DESC");        
        return $query->result_array(); 
        
    }
     public function CS_BTS_report_zone_monthly($Zone,$date_array){

          $condition = "BTS_Name !=" . "'". '' . "'"." AND " ."Zone =" . "'". $Zone . "'"." AND " . "CS_status_of_TKI =" . "'". 'Completed' . "'"." AND " ."Support_Category =" . "'". 'Troubleshoot' . "'"." AND " . "start_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
          $query=$this->db->query("select p_key,Zone,Sub_Zone,Engineer_ID,BTS_Name,Support_Type,
                                sum(case when Support_Category = 'Troubleshoot' then 1 else 0 end) Support_Category
                                from cs_task_list where ( $condition ) group by BTS_Name ORDER BY Zone,Support_Category  DESC");        
        return $query->result_array(); 
    }
    
     public function CS_BTS_report_zone_TS_monthly($Zone,$Initial_Problem_Category,$date_array){

          $condition = "BTS_Name !=" . "'". '' . "'"." AND " ."Zone =" . "'". $Zone . "'"." AND " . "Initial_Problem_Category =" . "'". $Initial_Problem_Category . "'"." AND " ."CS_status_of_TKI =" . "'". 'Completed' . "'"." AND " ."Support_Category =" . "'". 'Troubleshoot' . "'"." AND " . "start_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
          $query=$this->db->query("select p_key,Zone,Sub_Zone,Engineer_ID,BTS_Name,Support_Type,
                                sum(case when Support_Category = 'Troubleshoot' then 1 else 0 end) Support_Category
                                from cs_task_list where ( $condition ) group by BTS_Name ORDER BY Zone,Support_Category  DESC");        
        return $query->result_array(); 
    }
    
     public function CS_BTS_report_sub_zone_monthly($Sub_Zone,$date_array){

          $condition = "BTS_Name !=" . "'". '' . "'"." AND " ."Sub_Zone =" . "'". $Sub_Zone . "'"." AND " . "CS_status_of_TKI =" . "'". 'Completed' . "'"." AND " ."Support_Category =" . "'". 'Troubleshoot' . "'"." AND " . "start_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
          $query=$this->db->query("select p_key,Zone,Sub_Zone,Engineer_ID,BTS_Name,Support_Type,
                                sum(case when Support_Category = 'Troubleshoot' then 1 else 0 end) Support_Category
                                from cs_task_list where ( $condition ) group by BTS_Name ORDER BY Zone,Support_Category DESC");        
        return $query->result_array(); 
    }
    
    public function CS_BTS_report_sub_zone_TS_monthly($Sub_Zone,$Initial_Problem_Category,$date_array){

          $condition = "BTS_Name !=" . "'". '' . "'"." AND " ."Sub_Zone =" . "'". $Sub_Zone . "'"." AND " . "Initial_Problem_Category =" . "'". $Initial_Problem_Category . "'"." AND " ."CS_status_of_TKI =" . "'". 'Completed' . "'"." AND " ."Support_Category =" . "'". 'Troubleshoot' . "'"." AND " . "start_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
          $query=$this->db->query("select p_key,Zone,Sub_Zone,Engineer_ID,BTS_Name,Support_Type,
                                sum(case when Support_Category = 'Troubleshoot' then 1 else 0 end) Support_Category
                                from cs_task_list where ( $condition ) group by BTS_Name ORDER BY Zone,Support_Category DESC");        
        return $query->result_array(); 
    }
    
     public function CS_BTS_report_BTS_monthly($BTS_Name,$date_array){

          $condition = "BTS_Name =" . "'". $BTS_Name . "'"." AND " . "CS_status_of_TKI =" . "'". 'Completed' . "'"." AND " ."Support_Category =" . "'". 'Troubleshoot' . "'"." AND " . "start_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
          $query=$this->db->query("select p_key,Zone,Sub_Zone,Engineer_ID,BTS_Name,Support_Type,
                                sum(case when Support_Category = 'Troubleshoot' then 1 else 0 end) Support_Category
                                from cs_task_list where ( $condition ) group by BTS_Name ORDER BY Support_Category DESC");        
        return $query->result_array(); 
    }
    
    public function CS_BTS_report_BTS_TS_monthly($BTS_Name,$Initial_Problem_Category,$date_array){

          $condition = "BTS_Name =" . "'". $BTS_Name . "'"." AND " . "Initial_Problem_Category =" . "'". $Initial_Problem_Category . "'"." AND " ."CS_status_of_TKI =" . "'". 'Completed' . "'"." AND " ."Support_Category =" . "'". 'Troubleshoot' . "'"." AND " . "start_date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "'";
          $query=$this->db->query("select p_key,Zone,Sub_Zone,Engineer_ID,BTS_Name,Support_Type,
                                sum(case when Support_Category = 'Troubleshoot' then 1 else 0 end) Support_Category
                                from cs_task_list where ( $condition ) group by BTS_Name ORDER BY Support_Category DESC");        
        return $query->result_array(); 
    }
    
}