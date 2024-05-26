<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mrk_Model extends CI_Controller {
    
    public function customer_list1($type){
        $query = $this->db->query("select * from client_info_tbl where Client_Category ='$type' order by Client_Name asc");
        return $query->result_array();  
    }
    
    public function customer_list2($name){
       $query = $this->db->query("select * from client_info_tbl where Client_Name ='$name' order by ofc_type asc");
        return $query->result_array();  
    }
    
    public function customer_list(){
       $query = $this->db->query("select * from client_info_tbl order by Client_Name asc");
        return $query->result_array();  
    }

    public function corporate_sales_category() {
        $query = $this->db->query("select * from category where Category_name = 'L3_service' and Status = '1'  order by Indexx");
        return $query->result_array();
    }
    
    public function Check_cross_sales_model($p_key,$service){
       
     $query=$this->db->query("select ref_p_key,L3_service from crpte_task_tbl Where ref_p_key= '$p_key' and L3_service='$service' ");
     return $query->row();
    }
    
    public function corporate_cross_sales($data){
          $this->db->insert('cross_sales_tbl',$data);
    }

        public function coprprate_ticket_info_model($tdata){
            
           $this->db->insert('crpte_tki_tbl',$tdata);
    }
    public function pick_corporate_follow_up_info($p_key){
        
        $condition = "p_key =" . "'" . $p_key . "'";
        $query = $this->db->query("select * from crpte_task_tbl where " . $condition);
        return $query->row(); 
    }
    public function pick_kam_follow_up_info($p_key){
        
        $condition = "p_key =" . "'" . $p_key . "'";
        $query = $this->db->query("select * from kam_task where " . $condition);
        return $query->row(); 
    }
    
    public function pick_bank_follow_up_info($p_key){
        
        $condition = "p_key =" . "'" . $p_key . "'";
        $query = $this->db->query("select p_key from bank_task_tbl where " . $condition);
        return $query->row(); 
    }
    
    public function pick_corporate_Comments_info($p_key){
        $condition = "p_key =" . "'" . $p_key . "'";
        $query = $this->db->query("select * from crpte_follow_up_tbl where " . $condition);
        return $query->result_array(); 
    }

    public function pick_kam_Comments_info($p_key){
        $condition = "p_key =" . "'" . $p_key . "'";
        $query = $this->db->query("select * from kam_follow_up_tbl where " . $condition);
        return $query->result_array(); 
    }
    

    public function find_ticket_Id($id) {               // service Order page ( pick Mix Contract) 

        $condition = "create_id =" . "'" . $id . "'";
        $query = $this->db->query("select max(p_key) as p_key from crpte_tki_tbl where " . $condition);
        return $query->row();
    }
    public function corporate_followup_category() {
        $query = $this->db->query("select * from category where Category_name = 'status' and Category_Purpose = 'mkt_c_assign' and Status = '1'  order by Indexx");
        return $query->result_array();
    }
    public function kam_followup_category() {
        $query = $this->db->query("select * from category where Category_name = 'status' and Category_Purpose = 'mkt_kam_assign' and Status = '1'  order by Indexx");
        return $query->result_array();
    }
    public function corporate_assign_category() {
        $query = $this->db->query("select * from category where Category_Purpose = 'mkt_c_assign' and Status = '1'  order by Indexx");
        return $query->result_array();
    }
    
    public function bank_assign_category(){
      $query = $this->db->query("select * from category where Category_Purpose = 'mkt_c_assign' and ( Category_name='type_task' or Category_name='status' or Category_name='L3_service') and Status = '1'  order by Indexx");
      return $query->result_array();  
    }

    public function bank_client_category() {
        $query = $this->db->query("select * from category where ( Category_Purpose = 'bank_client_category' or Category_Purpose = 'bank_assign') and Status = '1'  order by Indexx");
        return $query->result_array();
    }
    
    public function bank_client_category_1() {
        $query = $this->db->query("select * from category where  Category_Purpose = 'bank_client_category' and Status = '1'  order by Indexx");
        return $query->result_array();
    }
    public function bank_client_category_2() {
        $query = $this->db->query("select * from category where  Category_name = 'Client_Category' and Category_Purpose = 'bank_client_category' and Status = '1'  order by Indexx");
        return $query->result_array();
    }
    public function corporate_sales_info_save($data) {
        $this->db->insert('crpte_sales_tbl', $data);
    }
    
    public function save_mkt_client_info($data) {
        $this->db->insert('client_info_tbl', $data);
    }
    
    public function kam_follow_up_task($follow_up_data){
       $this->db->insert('kam_follow_up_tbl', $follow_up_data); 
    }
    public function corporate_follow_up_task($follow_up_data){
       $this->db->insert('crpte_follow_up_tbl', $follow_up_data); 
    }
    public function corporate_task_info_save($data){
       $this->db->insert('crpte_task_tbl', $data); 
    }
     public function bank_task_info_save($data){
       $this->db->insert('bank_task_tbl', $data); 
    }
    public function corporate_sales_Details_monthly() {
        $date = date("Y-m");
//        $date= date('Y-m', strtotime('last month'));
        $query = $this->db->query("select crpte_sales_tbl.e_id,crpte_sales_tbl.e_name,sum(crpte_sales_tbl.otc) as t_otc,sum(crpte_sales_tbl.mrc) as t_mrc,
                                crpte_trget.target_mrc,crpte_trget.target_otc   
                                from crpte_sales_tbl inner join crpte_trget on crpte_sales_tbl.e_id=crpte_trget.e_id
                                where crpte_sales_tbl.date like '$date%' and crpte_sales_tbl.department='Corporate' group by crpte_sales_tbl.e_id ORDER BY crpte_sales_tbl.e_name ASC");
        return $query->result_array();
    }
    public function bank_sales_Details_monthly() {
        $date = date("Y-m");
//        $date= date('Y-m', strtotime('last month'));
        $query = $this->db->query("select crpte_sales_tbl.e_id,crpte_sales_tbl.e_name,sum(crpte_sales_tbl.otc) as t_otc,sum(crpte_sales_tbl.mrc) as t_mrc,
                                crpte_trget.target_mrc,crpte_trget.target_otc   
                                from crpte_sales_tbl inner join crpte_trget on crpte_sales_tbl.e_id=crpte_trget.e_id
                                where crpte_sales_tbl.date like '$date%' and crpte_trget.month='$date' and crpte_sales_tbl.department='Bank_NBFI' group by crpte_sales_tbl.e_id ORDER BY crpte_sales_tbl.e_name ASC");
        return $query->result_array();
    }
    
    public function corporate_sales_dy_monthly($date) {
//        $date = date("Y-m");
//        $date= date('Y-m', strtotime('last month'));
        $query = $this->db->query("select crpte_sales_tbl.e_id,crpte_sales_tbl.e_name,sum(crpte_sales_tbl.otc) as t_otc,sum(crpte_sales_tbl.mrc) as t_mrc,
                                crpte_trget.target_mrc,crpte_trget.target_otc   
                                from crpte_sales_tbl inner join crpte_trget on crpte_sales_tbl.e_id=crpte_trget.e_id
                                where crpte_sales_tbl.date like '$date%' and crpte_sales_tbl.department='Corporate' group by crpte_sales_tbl.e_id ORDER BY crpte_sales_tbl.e_name ASC");
        return $query->result_array();
    }
    
    public function bank_sales_dy_monthly($date) {
//        $date = date("Y-m");
//        $date= date('Y-m', strtotime('last month'));
        $query = $this->db->query("select crpte_sales_tbl.e_id,crpte_sales_tbl.e_name,sum(crpte_sales_tbl.otc) as t_otc,sum(crpte_sales_tbl.mrc) as t_mrc,
                                crpte_trget.target_mrc,crpte_trget.target_otc   
                                from crpte_sales_tbl inner join crpte_trget on crpte_sales_tbl.e_id=crpte_trget.e_id
                                where crpte_sales_tbl.date like '$date%' and crpte_sales_tbl.department='Bank_NBFI' group by crpte_sales_tbl.e_id ORDER BY crpte_sales_tbl.e_name ASC");
        return $query->result_array();
    }
     public function ctg_sales_Details_monthly() {
//        $date = date("Y-m");
         $date= date('Y-m', strtotime('last month'));
        $query = $this->db->query("select crpte_sales_tbl.e_id,crpte_sales_tbl.e_name,sum(crpte_sales_tbl.otc) as t_otc,sum(crpte_sales_tbl.mrc) as t_mrc,
                                crpte_trget.target_mrc,crpte_trget.target_otc   
                                from crpte_sales_tbl inner join crpte_trget on crpte_sales_tbl.e_id=crpte_trget.e_id
                                where crpte_sales_tbl.date like '$date%' and crpte_sales_tbl.department='ctg_mkt' group by crpte_sales_tbl.e_id ORDER BY crpte_sales_tbl.e_name ASC");
        return $query->result_array();
    }
    
    public function Strategic_sales_Details_monthly() {
        $date = date("Y-m");
//        $date= date('Y-m', strtotime('last month'));
        $query = $this->db->query("select crpte_sales_tbl.e_id,crpte_sales_tbl.e_name,sum(crpte_sales_tbl.otc) as t_otc,sum(crpte_sales_tbl.mrc) as t_mrc,
                                crpte_trget.target_mrc,crpte_trget.target_otc   
                                from crpte_sales_tbl inner join crpte_trget on crpte_sales_tbl.e_id=crpte_trget.e_id
                                where crpte_sales_tbl.date like '$date%' and crpte_trget.month='$date' and crpte_sales_tbl.department='Strategic' and crpte_trget.month='$date' group by crpte_sales_tbl.e_id ORDER BY crpte_sales_tbl.e_name ASC");
        return $query->result_array();
    }
    public function corporate_task_Details_monthly(){

//        $firstday = date("Y-m-d", strtotime("first day of previous month")); 
        $firstday = date("Y-m-01"); 
        $firstday_time=$firstday.' 00:00:00';
//        $lastday = date("Y-m-d", strtotime("last day of previous month")); 
        $lastday = date("Y-m-d");
        $lastday_time=$lastday.' 23:59:59';
        $query=$this->db->query("select e_id,e_name,
                                sum(case when type_task = 'New Customer Visit' and start_date BETWEEN '$firstday_time' and '$lastday_time' then 1 else 0 end) New_Visit,
                                sum(case when type_task = 'Existing Customer Visit' and start_date BETWEEN '$firstday_time' and '$lastday_time' then 1 else 0 end) Existing_Visit,
                                sum(case when status = 'Interested' and start_date BETWEEN '$firstday_time' and '$lastday_time' then 1 else 0 end) Interested,
                                sum(case when status = 'Consideration' and start_date BETWEEN '$firstday_time' and '$lastday_time' then 1 else 0 end) Consideration,
                                sum(case when status = 'Offer Submit' and start_date BETWEEN '$firstday_time' and '$lastday_time' then 1 else 0 end) Offer_Submit,
                                sum(case when status = 'Final Stage' and start_date BETWEEN '$firstday_time' and '$lastday_time' then 1 else 0 end) Final_Stage,
                                sum(case when status = 'Sales Close' and end_date BETWEEN '$firstday_time' and '$lastday_time' then 1 else 0 end) Sales_Close
                                from crpte_task_tbl where department='Corporate' group by e_id ORDER BY e_name ASC");        
        return $query->result_array(); 

        
    }
    
    public function bank_task_Details_monthly(){

        $firstday = date("Y-m-d", strtotime("first day of previous month")); 
        $firstday_time=$firstday.' 00:00:00';
        $lastday = date("Y-m-d", strtotime("last day of previous month")); 
        $lastday_time=$lastday.' 23:59:59';
        $query=$this->db->query("select e_id,e_name,
                                sum(case when type_task = 'New Customer Visit' and start_date BETWEEN '$firstday_time' and '$lastday_time' then 1 else 0 end) New_Visit,
                                sum(case when type_task = 'Existing Customer Visit' and start_date BETWEEN '$firstday_time' and '$lastday_time' then 1 else 0 end) Existing_Visit,
                                sum(case when status = 'Interested' and start_date BETWEEN '$firstday_time' and '$lastday_time' then 1 else 0 end) Interested,
                                sum(case when status = 'Consideration' and start_date BETWEEN '$firstday_time' and '$lastday_time' then 1 else 0 end) Consideration,
                                sum(case when status = 'Offer Submit' and start_date BETWEEN '$firstday_time' and '$lastday_time' then 1 else 0 end) Offer_Submit,
                                sum(case when status = 'Final Stage' and start_date BETWEEN '$firstday_time' and '$lastday_time' then 1 else 0 end) Final_Stage,
                                sum(case when status = 'Sales Close' and end_date BETWEEN '$firstday_time' and '$lastday_time' then 1 else 0 end) Sales_Close
                                from bank_task_tbl where department='Bank_NBFI' group by e_id ORDER BY e_name ASC");        
        return $query->result_array(); 

        
    }

    public function corporate_sales_Details_year(){

        $query=$this->db->query("select month,sum(mrc) as month_mrc, sum(otc) as month_otc from crpte_sales_tbl where department='Corporate' and year='2020-2021' group by month ");        
        return $query->result_array(); 
    }
     public function bank_sales_Details_year(){

        $july='2019-07';
        $aug='2019-08';
        $query=$this->db->query("select month,sum(mrc) as month_mrc, sum(otc) as month_otc from crpte_sales_tbl where department='Bank_NBFI' group by month ");        
        return $query->result_array(); 
    }
    
    public function ctg_sales_Details_year(){

        $july='2019-07';
        $aug='2019-08';
        $query=$this->db->query("select month,sum(mrc) as month_mrc, sum(otc) as month_otc from crpte_sales_tbl where department='ctg_mkt' group by month ");        
        return $query->result_array(); 
    }
     public function Strategic_sales_Details_year(){

        $july='2019-07';
        $aug='2019-08';
        $query=$this->db->query("select month,sum(mrc) as month_mrc, sum(otc) as month_otc from crpte_sales_tbl where department='Strategic' group by month ");        
        return $query->result_array(); 
    }
    public function corporate_task_Details_daily(){
        $start_time=date("Y-m-d 00:00:00");
        $end_time=date("Y-m-d 23:59:59"); 
        $today=date("Y-m-d"); 
        
        $yesterday=date('Y-m-d',strtotime("-1 days"));
        $yesterday_start=$yesterday.' 00:00:00';
       
       $yesterday_end=$yesterday.' 23:59:59';
        $query=$this->db->query("select e_id,e_name,
                                sum(case when type_task = 'New Customer Visit' and start_date BETWEEN '$yesterday_start' and '$yesterday_end' then 1 else 0 end) New_Visit,
                                sum(case when type_task = 'Existing Customer Visit' and start_date BETWEEN '$yesterday_start' and '$yesterday_end' then 1 else 0 end) Existing_Visit,
                                sum(case when type_task = 'Cold Call' and start_date BETWEEN '$yesterday_start' and '$yesterday_end' then 1 else 0 end) Cold_Call,
                                sum(case when type_task = 'Prospective Call' and start_date BETWEEN '$yesterday_start' and '$yesterday_end' then 1 else 0 end) Prospective_Call,
                                sum(case when type_task = 'Follow Up Call' and start_date BETWEEN '$yesterday_start' and '$yesterday_end' then 1 else 0 end) Follow_Up_Call,
                                sum(case when type_task = 'Email' and start_date BETWEEN '$yesterday_start' and '$yesterday_end' then 1 else 0 end) Email,
                                sum(case when follow_up_date='$today' then 1 else 0 end) pending_Follow_Up
                                from crpte_task_tbl where department='Corporate' group by e_id ORDER BY e_name ASC");        
        return $query->result_array(); 
    }
    public function bank_task_Details_daily(){
        $start_time=date("Y-m-d 00:00:00");
        $end_time=date("Y-m-d 23:59:59"); 
        $today=date("Y-m-d"); 
        
        $yesterday=date('Y-m-d',strtotime("-1 days"));
        $yesterday_start=$yesterday.' 00:00:00';
       
       $yesterday_end=$yesterday.' 23:59:59';
        $query=$this->db->query("select e_id,e_name,
                                sum(case when type_task = 'New Customer Visit' and start_date BETWEEN '$yesterday_start' and '$yesterday_end' then 1 else 0 end) New_Visit,
                                sum(case when type_task = 'Existing Customer Visit' and start_date BETWEEN '$yesterday_start' and '$yesterday_end' then 1 else 0 end) Existing_Visit,
                                sum(case when type_task = 'Cold Call' and start_date BETWEEN '$yesterday_start' and '$yesterday_end' then 1 else 0 end) Cold_Call,
                                sum(case when type_task = 'Prospective Call' and start_date BETWEEN '$yesterday_start' and '$yesterday_end' then 1 else 0 end) Prospective_Call,
                                sum(case when type_task = 'Follow Up Call' and start_date BETWEEN '$yesterday_start' and '$yesterday_end' then 1 else 0 end) Follow_Up_Call,
                                sum(case when type_task = 'Email' and start_date BETWEEN '$yesterday_start' and '$yesterday_end' then 1 else 0 end) Email,
                                sum(case when follow_up_date='$today' then 1 else 0 end) pending_Follow_Up
                                from bank_task_tbl where department='Bank_NBFI' group by e_id ORDER BY e_name ASC");        
        return $query->result_array(); 
    }
     public function Strategic_task_Details_daily(){
        $start_time=date("Y-m-d 00:00:00");
        $end_time=date("Y-m-d 23:59:59"); 
        $today=date("Y-m-d"); 
        
        $yesterday=date('Y-m-d',strtotime("-1 days"));
        $yesterday_start=$yesterday.' 00:00:00';
        $yesterday_end=$yesterday.' 23:59:59';
        $query=$this->db->query("select e_id,e_name,
                                sum(case when type_task = 'New Customer Visit' and start_date BETWEEN '$yesterday_start' and '$yesterday_end' then 1 else 0 end) New_Visit,
                                sum(case when type_task = 'Existing Customer Visit' and start_date BETWEEN '$yesterday_start' and '$yesterday_end' then 1 else 0 end) Existing_Visit,
                                sum(case when type_task = 'Cold Call' and start_date BETWEEN '$yesterday_start' and '$yesterday_end' then 1 else 0 end) Cold_Call,
                                sum(case when type_task = 'Prospective Call' and start_date BETWEEN '$yesterday_start' and '$yesterday_end' then 1 else 0 end) Prospective_Call,
                                sum(case when type_task = 'Follow Up Call' and start_date BETWEEN '$yesterday_start' and '$yesterday_end' then 1 else 0 end) Follow_Up_Call,
                                sum(case when type_task = 'Email' and start_date BETWEEN '$yesterday_start' and '$yesterday_end' then 1 else 0 end) Email,
                                sum(case when follow_up_date='$today' then 1 else 0 end) pending_Follow_Up
                                from crpte_task_tbl where department='Strategic' group by e_id ORDER BY e_name ASC");        
        return $query->result_array(); 
    }
    public function ctg_task_Details_daily(){
        $start_time=date("Y-m-d 00:00:00");
        $end_time=date("Y-m-d 23:59:59"); 
        $today=date("Y-m-d"); 
        
        $yesterday=date('Y-m-d',strtotime("-1 days"));
        $yesterday_start=$yesterday.' 00:00:00';
        $yesterday_end=$yesterday.' 23:59:59';
        $query=$this->db->query("select e_id,e_name,
                                sum(case when type_task = 'New Customer Visit' and start_date BETWEEN '$yesterday_start' and '$yesterday_end' then 1 else 0 end) New_Visit,
                                sum(case when type_task = 'Existing Customer Visit' and start_date BETWEEN '$yesterday_start' and '$yesterday_end' then 1 else 0 end) Existing_Visit,
                                sum(case when type_task = 'Cold Call' and start_date BETWEEN '$yesterday_start' and '$yesterday_end' then 1 else 0 end) Cold_Call,
                                sum(case when type_task = 'Prospective Call' and start_date BETWEEN '$yesterday_start' and '$yesterday_end' then 1 else 0 end) Prospective_Call,
                                sum(case when type_task = 'Follow Up Call' and start_date BETWEEN '$yesterday_start' and '$yesterday_end' then 1 else 0 end) Follow_Up_Call,
                                sum(case when type_task = 'Email' and start_date BETWEEN '$yesterday_start' and '$yesterday_end' then 1 else 0 end) Email,
                                sum(case when follow_up_date='$today' then 1 else 0 end) pending_Follow_Up
                                from crpte_task_tbl where department='ctg_mkt' group by e_id ORDER BY e_name ASC");        
        return $query->result_array(); 
    }
    public function corporate_task_Details_weekly(){
        $firstday = date('Y-m-d', strtotime("saturday -2 week")); 
        $firstday_time=$firstday.' 00:00:00';
        $lastday = date('Y-m-d', strtotime("thursday -1 week")); 
        $lastday_time=$lastday.' 23:59:59';
        $query=$this->db->query("select e_id,e_name,
                                sum(case when type_task = 'New Customer Visit' and start_date BETWEEN '$firstday_time' and '$lastday_time' then 1 else 0 end) New_Visit,
                                sum(case when type_task = 'Existing Customer Visit' and start_date BETWEEN '$firstday_time' and '$lastday_time' then 1 else 0 end) Existing_Visit,
                                sum(case when type_task = 'Cross Sales' and c_sales_status = 'pending' then 1 else 0 end) pending_Cross_Sales,
                                    sum(case when type_task = 'Cross Sales' and c_sales_status = 'Done' and start_date BETWEEN '$firstday_time' and '$lastday_time' then 1 else 0 end) Done_Cross_Sales
                                from crpte_task_tbl where department='Corporate' group by e_id ORDER BY e_name ASC");        
        return $query->result_array(); 
    }
     public function bank_task_Details_weekly(){
        $firstday = date('Y-m-d', strtotime("saturday -2 week")); 
        $firstday_time=$firstday.' 00:00:00';
        $lastday = date('Y-m-d', strtotime("thursday -1 week")); 
        $lastday_time=$lastday.' 23:59:59';
        $query=$this->db->query("select e_id,e_name,
                                sum(case when type_task = 'New Customer Visit' and start_date BETWEEN '$firstday_time' and '$lastday_time' then 1 else 0 end) New_Visit,
                                sum(case when type_task = 'Existing Customer Visit' and start_date BETWEEN '$firstday_time' and '$lastday_time' then 1 else 0 end) Existing_Visit
                                from bank_task_tbl where department='Bank_NBFI' group by e_id ORDER BY e_name ASC");        
        return $query->result_array(); 
    }
     public function ctg_task_Details_weekly(){
        $firstday = date('Y-m-d', strtotime("saturday -2 week")); 
        $firstday_time=$firstday.' 00:00:00';
        $lastday = date('Y-m-d', strtotime("thursday -1 week")); 
        $lastday_time=$lastday.' 23:59:59';
        $query=$this->db->query("select e_id,e_name,
                                sum(case when type_task = 'New Customer Visit' and start_date BETWEEN '$firstday_time' and '$lastday_time' then 1 else 0 end) New_Visit,
                                sum(case when type_task = 'Existing Customer Visit' and start_date BETWEEN '$firstday_time' and '$lastday_time' then 1 else 0 end) Existing_Visit
                                from crpte_task_tbl where department='ctg_mkt' group by e_id ORDER BY e_name ASC");        
        return $query->result_array(); 
    }
    public function Strategic_task_Details_weekly(){
        $firstday = date('Y-m-d', strtotime("saturday -2 week")); 
        $firstday_time=$firstday.' 00:00:00';
        $lastday = date('Y-m-d', strtotime("thursday -1 week")); 
        $lastday_time=$lastday.' 23:59:59';
        $query=$this->db->query("select e_id,e_name,
                                sum(case when type_task = 'New Customer Visit' and start_date BETWEEN '$firstday_time' and '$lastday_time' then 1 else 0 end) New_Visit,
                                sum(case when type_task = 'Existing Customer Visit' and start_date BETWEEN '$firstday_time' and '$lastday_time' then 1 else 0 end) Existing_Visit
                                from crpte_task_tbl where department='Strategic' group by e_id ORDER BY e_name ASC");        
        return $query->result_array(); 
    }

    public function pick_corporate_target() {

        $query = $this->db->query("select * from crpte_trget group by e_id");
        return $query->result_array();
    }

    public function corporate_follow_up_count(){
      
        $query = $this->db->query("select Id from crpte_task_tbl where status = 'Follow Up'");
        return $query->result_array();
    }
    
    
     public function corporate_follow_up_list($per_page, $offset) {
        $this->db->select('*');
        $this->db->from('crpte_task_tbl');
        $this->db->where('status','Follow Up');
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data;
        
    }
    public function corporate_sales_report_value(){
      $query = $this->db->query("select * from category where CateGory_name = 'L3_service' and Status = '1'  order by Indexx");
       return $query->result_array();   
        
    }
    
     public function pick_Engineer_ID_model_2($Engineer_Name){
       
     $query=$this->db->query("select id from registration Where name='$Engineer_Name'");
     return $query->row();
    }
    
    public function update_corporate_task($p_key, $data){
        
        $this->db->where('p_key',$p_key);
        $this->db->update('crpte_task_tbl',$data);
    }
     public function update_kam_task($p_key, $data){
        
        $this->db->where('p_key',$p_key);
        $this->db->update('kam_task',$data);
    }
    
    public function update_bank_task($p_key, $data){
        
        $this->db->where('p_key',$p_key);
        $this->db->update('bank_task_tbl',$data);
    }
    
    public function corporate_daily_task_details($per_page, $offset,$e_id){
//    $start_time=date("Y-m-d 00:00:00");
//    $end_time=date("Y-m-d 23:59:59"); 
        $yesterday=date('Y-m-d',strtotime("-1 days"));
        $yesterday_start=$yesterday.' 00:00:00';
        $yesterday_end=$yesterday.' 23:59:59';


        $condition =  "e_id =" . "'" . $e_id . "'". " AND " ."start_date  BETWEEN " . "'"  . $yesterday_start . "'" . " AND " . "'" . $yesterday_end . "' order by L3_service ASC";
      
        $this->db->select('*');
        $this->db->from('crpte_task_tbl');
        $this->db->where($condition);
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data;
    
    
    }
    
    public function corporate_weekly_task_details($per_page, $offset,$e_id){
        $firstday = date('Y-m-d', strtotime("saturday -2 week")); 
        $firstday_time=$firstday.' 00:00:00';
        $lastday = date('Y-m-d', strtotime("thursday -1 week")); 
        $lastday_time=$lastday.' 23:59:59';

       $condition =  "( type_task =" . "'" . 'Existing Customer Visit' . "'". " OR " ."type_task =" . "'" . 'New Customer Visit' . "')". " AND " ."e_id =" . "'" . $e_id . "'". " AND " ."start_date  BETWEEN " . "'"  . $firstday_time . "'" . " AND " . "'" . $lastday_time . "' order by L3_service ASC";
//       $condition2="(type_task='New Customer Visit' or type_task='Existing Customer Visit')";
        $this->db->select('*');
        $this->db->from('crpte_task_tbl');
        $this->db->where("$condition");
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data; 
    }
    public function corporate_monthly_task_details($per_page, $offset,$e_id){
        $firstday = date("Y-m-d", strtotime("first day of previous month")); 
        $firstday_time=$firstday.' 00:00:00';
        $lastday = date("Y-m-d", strtotime("last day of previous month")); 
        $lastday_time=$lastday.' 23:59:59';


       $condition =  "( type_task =" . "'" . 'Existing Customer Visit' . "'". " OR " ."type_task =" . "'" . 'New Customer Visit' . "')". " AND " ."e_id =" . "'" . $e_id . "'". " AND " ."start_date  BETWEEN " . "'"  . $firstday_time . "'" . " AND " . "'" . $lastday_time . "' order by L3_service ASC";
//       $condition2="(type_task='New Customer Visit' or type_task='Existing Customer Visit')";
        $this->db->select('*');
        $this->db->from('crpte_task_tbl');
        $this->db->where("$condition");
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data; 
    }

        public function corporate_follow_up_task_details($per_page, $offset,$e_id){
        $start_time=date("Y-m-d");
        $end_time=date("Y-m-d");   

        $condition =  "status !=" . "'" . 'Sales Close' . "'". " AND " ."e_id =" . "'" . $e_id . "'". " AND " ."follow_up_date  BETWEEN " . "'"  . $start_time . "'" . " AND " . "'" . $end_time . "' order by L3_service ASC";
      
        $this->db->select('*');
        $this->db->from('crpte_task_tbl');
        $this->db->where($condition);
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data; 
    }
    
     public function pending_cross_sale_details($per_page, $offset,$e_id){
//        $start_time=date("Y-m-d");
//        $end_time=date("Y-m-d");   

        $condition =  "c_sales_status =" . "'" . 'pending' . "'". " AND " ."e_id =" . "'" . $e_id . "' order by L3_service ASC";
      
        $this->db->select('*');
        $this->db->from('crpte_task_tbl');
        $this->db->where($condition);
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data; 
    }

        public function corporate_count_daily_task($e_id){
//        $start_time=date("Y-m-d 00:00:00");
//        $end_time=date("Y-m-d 23:59:59");
        $yesterday=date('Y-m-d',strtotime("-1 days"));
        $yesterday_start=$yesterday.' 00:00:00';
        $yesterday_end=$yesterday.' 23:59:59';

        
        $query = $this->db->query("select Id from crpte_task_tbl where e_id = '$e_id' and start_date BETWEEN '$yesterday_start' and '$yesterday_end'");
        return $query->result_array();
    }
     public function corporate_count_monthly_task($e_id){
        
        $firstday = date("Y-m-d", strtotime("first day of previous month")); 
        $firstday_time=$firstday.' 00:00:00';
        $lastday = date("Y-m-d", strtotime("last day of previous month")); 
        $lastday_time=$lastday.' 23:59:59';

        $query = $this->db->query("select Id from crpte_task_tbl where e_id = '$e_id' and end_date BETWEEN '$firstday' and '$lastday_time'");
        return $query->result_array();
    }
    
     public function corporate_count_weekly_task($e_id){
        $firstday = date('Y-m-d', strtotime("saturday -1 week")); 
        $firstday_time=$firstday.' 00:00:00';
        $lastday = date('Y-m-d', strtotime("thursday 0 week")); 
        $lastday_time=$lastday.' 23:59:59';

        $query = $this->db->query("select Id from crpte_task_tbl where e_id = '$e_id' and start_date BETWEEN '$firstday_time' and '$lastday_time'");
        return $query->result_array();
    }
    public function corporate_follow_up_count_daily($e_id){
        $start_time=date("Y-m-d");
        $end_time=date("Y-m-d");
        $query = $this->db->query("select Id from crpte_task_tbl where e_id = '$e_id' and  status !='Sales Close' and follow_up_date BETWEEN '$start_time' and '$end_time'");
        return $query->result_array();
    }
     public function pending_cross_sale_count($e_id){
//        $start_time=date("Y-m-d");
//        $end_time=date("Y-m-d");
        $query = $this->db->query("select Id from crpte_task_tbl where e_id = '$e_id' and  c_sales_status='pending'");
        return $query->result_array();
    }
    public function corporate_sales_report_by_id_count($e_id){
//        $date=date("Y-m");
        
        $firstday = date("Y-m-d", strtotime("first day of previous month")); 
//        $firstday_time=$firstday.' 00:00:00';
        $lastday = date("Y-m-d", strtotime("last day of previous month")); 
//        $lastday_time=$lastday.' 23:59:59';

        
        $query = $this->db->query("select Id from crpte_sales_tbl where e_id = '$e_id' and date BETWEEN '$firstday' and '$lastday'");
        return $query->result_array();  
    }
    public function corporate_sales_report_by_id($per_page, $offset,$e_id){
        $date=date("Y-m");
//       $firstday = date("Y-m-d", strtotime("first day of previous month")); 
//        $firstday_time=$firstday.' 00:00:00';
//        $lastday = date("Y-m-d", strtotime("last day of previous month")); 
//        $condition = "e_id =" . "'" . $e_id . "'". " AND " ."date  BETWEEN " . "'"  . "$firstday" . "' and " ."'". "$lastday" ."'order by L3_service ASC";
        $date=date("Y-m");
        $condition = "e_id =" . "'" . $e_id . "'". " AND " ."date  like " . "'"  . "$date" . "%' order by L3_service ASC";
      
        $this->db->select('*');
        $this->db->from('crpte_sales_tbl');
        $this->db->where($condition);
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data; 
    }
    
    public function corporate_sales_report_by_date_count($date_array,$department){
        $start_time=$date_array['date1'];
        $end_time=$date_array['date2'];       
        $query = $this->db->query("select Id from crpte_sales_tbl where department='$department' and date BETWEEN '$start_time' and '$end_time'");
        return $query->result_array();   
    }
    public function corporate_sales_report_by_date($per_page, $offset,$date_array,$department){
        $condition =  "department =" . "'" . $department . "'". " AND " ."date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' order by date,e_name,L3_service ASC";
        $this->db->select('*');
        $this->db->from('crpte_sales_tbl');
        $this->db->where($condition);
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data; 
    }
    public function corporate_sales_report_by_date_id_count($date_array,$e_id,$department){
        $start_time=$date_array['date1'];
        $end_time=$date_array['date2'];       
        $query = $this->db->query("select Id from crpte_sales_tbl where department='$department' and e_id='$e_id' and department='$department' and  date BETWEEN '$start_time' and '$end_time'");
        return $query->result_array();   
    }
    
     public function corporate_sales_report_by_date_id($per_page, $offset,$date_array,$e_id,$department){
        $condition =  "e_id =" . "'" . $e_id . "'". " AND " ."department =" . "'" . $department . "'". " AND " ."date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' order by date,e_name,L3_service ASC";
        $this->db->select('*');
        $this->db->from('crpte_sales_tbl');
        $this->db->where($condition);
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data; 
    }
     public function corporate_sales_report_by_date_service_count($date_array,$service,$department){
        $start_time=$date_array['date1'];
        $end_time=$date_array['date2'];       
        $query = $this->db->query("select Id from crpte_sales_tbl where department='$department' and L3_service='$service' and date BETWEEN '$start_time' and '$end_time'");
        return $query->result_array();   
    }
    
    public function corporate_sales_report_by_date_service($per_page, $offset,$date_array,$service,$department){
        $condition =  "department =" . "'" . $department . "'". " AND " ."L3_service =" . "'" . $service . "'". " AND " ."date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' order by date,e_name,L3_service ASC";
        $this->db->select('*');
        $this->db->from('crpte_sales_tbl');
        $this->db->where($condition);
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data; 
    }
    
    public function corporate_sales_report_by_date_service_id_count($date_array,$service,$e_id,$department){
        $start_time=$date_array['date1'];
        $end_time=$date_array['date2'];       
        $query = $this->db->query("select Id from crpte_sales_tbl where e_id='$e_id' and department='$department' and L3_service='$service' and date BETWEEN '$start_time' and '$end_time'");
        return $query->result_array();   
    }
     public function corporate_sales_report_by_date_service_id($per_page, $offset,$date_array,$service,$e_id,$department){
        $condition =   "e_id =" . "'" . $e_id . "'". " AND " ."department =" . "'" . $department . "'". " AND " ."L3_service =" . "'" . $service . "'". " AND " ."date  BETWEEN " . "'"  . $date_array['date1'] . "'" . " AND " . "'" . $date_array['date2'] . "' order by date,e_name,L3_service ASC";
        $this->db->select('*');
        $this->db->from('crpte_sales_tbl');
        $this->db->where($condition);
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data; 
    }
    
    
    public function corporate_task_count_date($date_array,$department){
        $start_time=$date_array['date1'].' 00:00:00';
        $end_time=$date_array['date2'].' 23:59:59';       
        $query = $this->db->query("select Id from crpte_task_tbl where department='$department'and start_date BETWEEN '$start_time' and '$end_time'");
        return $query->result_array(); 
    }

     public function bank_task_count_date($date_array){
        $start_time=$date_array['date1'].' 00:00:00';
        $end_time=$date_array['date2'].' 23:59:59';       
        $query = $this->db->query("select Id from bank_task_tbl where start_date BETWEEN '$start_time' and '$end_time'");
        return $query->result_array(); 
    }
    
    public function corporate_task_list_date($per_page, $offset,$date_array,$department){
        $start_time=$date_array['date1'].' 00:00:00';
        $end_time=$date_array['date2'].' 23:59:59';  
        
        $condition =  "department =" . "'" . $department . "'". " AND " ."start_date  BETWEEN " . "'"  . $start_time . "'" . " AND " . "'" . $end_time . "' order by start_date,e_name,L3_service ASC";
        $this->db->select('*');
        $this->db->from('crpte_task_tbl');
        $this->db->where($condition);
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data; 
    }
    
    public function bank_task_list_date($per_page, $offset,$date_array){
        $start_time=$date_array['date1'].' 00:00:00';
        $end_time=$date_array['date2'].' 23:59:59';  
        
        $condition =  "start_date  BETWEEN " . "'"  . $start_time . "'" . " AND " . "'" . $end_time . "' order by start_date,e_name,L3_service ASC";
        $this->db->select('*');
        $this->db->from('bank_task_tbl');
        $this->db->where($condition);
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data; 
    }
    
    public function corporate_task_count_date_status($date_array,$status,$department){
        $start_time=$date_array['date1'].' 00:00:00';
        $end_time=$date_array['date2'].' 23:59:59'; 
        
        if($status=='Sales Close'){
            $query = $this->db->query("select Id from crpte_task_tbl where department='$department' and status='$status' and end_date BETWEEN '$start_time' and '$end_time'");
        }else{
            $query = $this->db->query("select Id from crpte_task_tbl where department='$department' and status='$status' and start_date BETWEEN '$start_time' and '$end_time'");
        }
        return $query->result_array(); 
    }

    public function corporate_task_list_date_status($per_page, $offset,$date_array,$status,$department){
         $start_time=$date_array['date1'].' 00:00:00';
         $end_time=$date_array['date2'].' 23:59:59'; 
        
        if($status=='Sales Close'){
         
            $condition =   "department =" . "'" . $department . "'". " AND " ."status =" . "'" . $status . "'". " AND " ."end_date  BETWEEN " . "'"  . $start_time . "'" . " AND " . "'" . $end_time . "' order by start_date,e_name,L3_service ASC";
           
        }else{
            
             $condition =    "department =" . "'" . $department . "'". " AND " ."status =" . "'" . $status . "'". " AND " ."start_date  BETWEEN " . "'"  . $start_time . "'" . " AND " . "'" . $end_time . "' order by start_date,e_name,L3_service ASC";
        
        }
        
        $this->db->select('*');
        $this->db->from('crpte_task_tbl');
        $this->db->where($condition);
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data; 
    }
    
   public function corporate_task_count_date_id($date_array,$e_id){
        $start_time=$date_array['date1'].' 00:00:00';
        $end_time=$date_array['date2'].' 23:59:59';
        $query = $this->db->query("select Id from crpte_task_tbl where e_id='$e_id' and start_date BETWEEN '$start_time' and '$end_time'");
        return $query->result_array(); 
    }

    public function bank_task_count_date_id($date_array,$e_id){
        $start_time=$date_array['date1'].' 00:00:00';
        $end_time=$date_array['date2'].' 23:59:59';
        $query = $this->db->query("select Id from bank_task_tbl where e_id='$e_id' and start_date BETWEEN '$start_time' and '$end_time'");
        return $query->result_array(); 
    }
    
     public function corporate_task_list_date_id($per_page, $offset,$date_array,$e_id){

        $start_time=$date_array['date1'].' 00:00:00';
        $end_time=$date_array['date2'].' 23:59:59';
        
        $condition =   "e_id =" . "'" . $e_id . "'". " AND " ."start_date  BETWEEN " . "'"  . $start_time . "'" . " AND " . "'" . $end_time . "' order by start_date,e_name,L3_service ASC";
        $this->db->select('*');
        $this->db->from('crpte_task_tbl');
        $this->db->where($condition);
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data; 
    }
    
    public function bank_task_list_date_id($per_page, $offset,$date_array,$e_id){

        $start_time=$date_array['date1'].' 00:00:00';
        $end_time=$date_array['date2'].' 23:59:59';
        
        $condition =   "e_id =" . "'" . $e_id . "'". " AND " ."start_date  BETWEEN " . "'"  . $start_time . "'" . " AND " . "'" . $end_time . "' order by start_date,e_name,L3_service ASC";
        $this->db->select('*');
        $this->db->from('bank_task_tbl');
        $this->db->where($condition);
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data; 
    }
    
    public function corporate_task_count_date_id_status($date_array,$e_id,$status){
        $start_time=$date_array['date1'].' 00:00:00';
        $end_time=$date_array['date2'].' 23:59:59';
        
        $query = $this->db->query("select Id from crpte_task_tbl where status='$status' and e_id='$e_id' and start_date BETWEEN '$start_time' and '$end_time'");
       
        
        return $query->result_array(); 
    }

    public function corporate_task_list_date_id_status($per_page, $offset,$date_array,$e_id,$status){

        $start_time=$date_array['date1'].' 00:00:00';
        $end_time=$date_array['date2'].' 23:59:59';
        
        
        
        $condition =   "status =" . "'" . $status . "'". " AND " ."e_id =" . "'" . $e_id . "'". " AND " ."start_date  BETWEEN " . "'"  . $start_time . "'" . " AND " . "'" . $end_time . "' order by start_date,e_name,L3_service ASC";
      
        
        
        
        $this->db->select('*');
        $this->db->from('crpte_task_tbl');
        $this->db->where($condition);
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data; 
    }
    
     public function pick_month() {
        $query = $this->db->query("select * from category where CateGory_name='month' and Status = '1'  order by Indexx");
        return $query->result_array();
    }
    
     public function mrk_Check_id_model($e_id, $month) {

        $query = $this->db->query("select e_id from crpte_trget Where e_id='$e_id' and month='$month'");
        return $query->row();
    }
     public function corporate_sales_target_info_save($data) {
        $this->db->insert('crpte_trget', $data);
    }
     public function pick_client_info_model($Client_ID){
       
     $query=$this->db->query("select * from client_info_tbl Where Client_id='$Client_ID'");
     return $query->row();
    }
    
    public function pick_bank_client_info_model($Client_Name){
       
     $query=$this->db->query("select * from client_info_tbl Where Client_Name='$Client_Name'");
     return $query->result_array(); 
    }
    
    public function pick_bank_contact_info_model($p_key){
       
     $query=$this->db->query("select * from client_info_tbl Where Id='$p_key'");
     return $query->row(); 
    }
    
     public function pick_bank_client_address_model($Client_Name,$office_type){
       
     $query=$this->db->query("select * from client_info_tbl Where Client_Name='$Client_Name' and ofc_type='$office_type'");
      return $query->row();
    }
    
    public function update_bank_client_model($p_key,$data){
       $this->db->where('Id',$p_key);
       $this->db->update('client_info_tbl',$data);
    }
     public function update_bank_contact_model($p_key,$data){
       $this->db->where('Id',$p_key);
       $this->db->update('client_info_tbl',$data);
    }
    public function pick_bank_model($Client_Category){

        $query=$this->db->query("select Client_Name from client_info_tbl Where Client_Category='$Client_Category' Group by Client_Name order by Client_Name ASC");
        return $query->result_array();
    }
    
    public function pick_bank_info_model($Client_Name,$ofc_type,$designation){
        
        $query=$this->db->query("select * from client_info_tbl Where Client_Name='$Client_Name' and ofc_type='$ofc_type' and designation='$designation' ");
        return $query->row();
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//    ............................................... KAM .......................................................................
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
     public function kam_category() {
        $query = $this->db->query("select * from category where CateGory_Purpose = 'mkt_kam_assign' and CateGory_name ='type_task' and Status = '1'  order by Indexx");
        return $query->result_array();
    }
    
     public function kam_assign_category() {
        $query = $this->db->query("select * from category where CateGory_Purpose = 'mkt_kam_assign' and Status = '1'  order by Indexx");
        return $query->result_array();
    }
    
    public function kam_termination_category() {
        $query = $this->db->query("select * from category where CateGory_Purpose = 'kam_termination' and Status = '1'  order by Indexx");
        return $query->result_array();
    }
    
    public function kam_termination_model($date_array){
        
        $start_time=$date_array['date1'];
        $end_time=$date_array['date2'];      
//        $data['date1'] 
        $query=$this->db->query("select * from kam_termination_tbl where date BETWEEN '$start_time' and '$end_time'");
        return $query->result_array(); 
    }
    public function CS_pick_done_task(){
        
    $query=$this->db->query("select * from ert_task_list Where Status='Active' or Status='Collected' or Status='Device lost'");
    return $query->result_array();   
    }
    
    public function save_termination_info_model($data) {
        $this->db->insert('kam_termination_tbl', $data);
    }
    public function save_kam_task_model($data){
         $this->db->insert('kam_task', $data);
    }
     public function kam_task_daily(){
//        $start_date=date("Y-m-d 00:00:00");
//        $end_date=date("Y-m-d 23:59:59"); 
        
         $today=date('Y-m-d');
         $start_date=$today.' 00:00:00';
         $end_date=$today.' 23:59:59';
        
        $query=$this->db->query("select e_id,e_name,
                                sum(case when type_task = 'CR' and date BETWEEN '$start_date' and '$end_date' then 1 else 0 end) CR,
                                sum(case when type_task = 'Credit_Note' and date BETWEEN '$start_date' and '$end_date' then 1 else 0 end) Credit_Note,
                                sum(case when type_task = 'Existing_Client_Follow_up' and date BETWEEN '$start_date' and '$end_date' then 1 else 0 end) Existing_Client_Follow_up,
                                sum(case when type_task = 'Survey' and date BETWEEN '$start_date' and '$end_date' then 1 else 0 end) Survey,
                                sum(case when type_task = 'TKI' and date BETWEEN '$start_date' and '$end_date' then 1 else 0 end) TKI,
                                sum(case when type_task = 'Leads' and date BETWEEN '$start_date' and '$end_date' then 1 else 0 end) Leads,
                                sum(case when type_task = 'Other' and date BETWEEN '$start_date' and '$end_date' then 1 else 0 end) Other
                                from kam_task group by e_id ORDER BY e_name ASC");        
        return $query->result_array(); 
    }
    
     public function kam_task_montly(){
        $start_date=date("Y-m-01 00:00:00");
        $end_date=date("Y-m-d 23:59:59"); 
        $query=$this->db->query("select e_id,e_name,
                                sum(case when type_task = 'CR' and date BETWEEN '$start_date' and '$end_date' then 1 else 0 end) CR,
                                sum(case when type_task = 'Credit_Note' and date BETWEEN '$start_date' and '$end_date' then 1 else 0 end) Credit_Note,
                                sum(case when type_task = 'Existing_Client_Follow_up' and date BETWEEN '$start_date' and '$end_date' then 1 else 0 end) Existing_Client_Follow_up,
                                sum(case when type_task = 'Survey' and date BETWEEN '$start_date' and '$end_date' then 1 else 0 end) Survey,
                                sum(case when type_task = 'TKI' and date BETWEEN '$start_date' and '$end_date' then 1 else 0 end) TKI,
                                sum(case when type_task = 'Leads' and date BETWEEN '$start_date' and '$end_date' then 1 else 0 end) Leads,
                                sum(case when type_task = 'Other' and date BETWEEN '$start_date' and '$end_date' then 1 else 0 end) Other
                                from kam_task group by e_id ORDER BY e_name ASC");        
        return $query->result_array(); 
    }
    
     public function kam_lead_montly(){
        $start_date=date("Y-m-01 00:00:00");
        $end_date=date("Y-m-d 23:59:59"); 
        $query=$this->db->query("select e_id,e_name,
                                sum(case when type_task = 'Leads' and status='Working Process' then 1 else 0 end) Working_Process,
                                sum(case when type_task = 'Leads' and status='Incomplete' and date BETWEEN '$start_date' and '$end_date' then 1 else 0 end) Incomplete,                      
                                sum(case when type_task = 'Leads' and status='Done' and date BETWEEN '$start_date' and '$end_date' then 1 else 0 end) Done,
                                sum(case when type_task = 'Leads' and status='Done' and date BETWEEN '$start_date' and '$end_date' then lead_price else 0 end) sales_amount   
                                from kam_task group by e_id ORDER BY e_name ASC");        
        return $query->result_array(); 
    }
    
     public function kam_task_count_date($date_array){
        $start_time=$date_array['date1'].' 00:00:00';
        $end_time=$date_array['date2'].' 23:59:59';       
        $query = $this->db->query("select Id from kam_task where date BETWEEN '$start_time' and '$end_time'");
        return $query->result_array(); 
    }
     public function kam_task_list_date($per_page, $offset,$date_array){
        $start_time=$date_array['date1'].' 00:00:00';
        $end_time=$date_array['date2'].' 23:59:59';  
        
        $condition =  "date  BETWEEN " . "'"  . $start_time . "'" . " AND " . "'" . $end_time . "' order by date,e_name ASC";
        $this->db->select('*');
        $this->db->from('kam_task');
        $this->db->where($condition);
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data; 
    }
     public function kam_task_count_date_id($date_array,$e_id){
        $start_time=$date_array['date1'].' 00:00:00';
        $end_time=$date_array['date2'].' 23:59:59';
        $query = $this->db->query("select Id from kam_task where e_id='$e_id' and date BETWEEN '$start_time' and '$end_time'");
        return $query->result_array(); 
    }
    
      public function kam_task_count_date_task($date_array,$type_task){
        $start_time=$date_array['date1'].' 00:00:00';
        $end_time=$date_array['date2'].' 23:59:59';
        $query = $this->db->query("select Id from kam_task where type_task='$type_task' and date BETWEEN '$start_time' and '$end_time'");
        return $query->result_array(); 
    }
    
    public function kam_task_count_date_id_status($date_array,$e_id,$type_task){
        $start_time=$date_array['date1'].' 00:00:00';
        $end_time=$date_array['date2'].' 23:59:59';
        $query = $this->db->query("select Id from kam_task where e_id='$e_id' and type_task='$type_task' and date BETWEEN '$start_time' and '$end_time'");
        return $query->result_array(); 
    }
    
    public function kam_task_list_date_id($per_page, $offset,$date_array,$e_id){

        $start_time=$date_array['date1'].' 00:00:00';
        $end_time=$date_array['date2'].' 23:59:59';
        
        $condition =   "e_id =" . "'" . $e_id . "'". " AND " ."date  BETWEEN " . "'"  . $start_time . "'" . " AND " . "'" . $end_time . "' order by date,e_name ASC";
        $this->db->select('*');
        $this->db->from('kam_task');
        $this->db->where($condition);
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data; 
    }
     public function kam_task_list_date_task($per_page, $offset,$date_array,$type_task){

        $start_time=$date_array['date1'].' 00:00:00';
        $end_time=$date_array['date2'].' 23:59:59';
        
        $condition =   "type_task =" . "'" . $type_task . "'". " AND " ."date  BETWEEN " . "'"  . $start_time . "'" . " AND " . "'" . $end_time . "' order by date,e_name ASC";
        $this->db->select('*');
        $this->db->from('kam_task');
        $this->db->where($condition);
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data; 
    }
    
     public function kam_task_list_date_id_task($per_page, $offset,$date_array,$e_id,$type_task){

        $start_time=$date_array['date1'].' 00:00:00';
        $end_time=$date_array['date2'].' 23:59:59';
        
        $condition =   "e_id =" . "'" . $e_id . "'". " AND " . "type_task =" . "'" . $type_task . "'". " AND " ."date  BETWEEN " . "'"  . $start_time . "'" . " AND " . "'" . $end_time . "' order by date,e_name ASC";
        $this->db->select('*');
        $this->db->from('kam_task');
        $this->db->where($condition);
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data; 
    }
    
    public function kam_count_monthly_leads_task($e_id){
        $firstday = date("Y-m-d", strtotime("first day of this month")); 
        $firstday_time=$firstday.' 00:00:00';
        $lastday = date("Y-m-d", strtotime("last day of this month")); 
        $lastday_time=$lastday.' 23:59:59';
        
        $query = $this->db->query("select Id from kam_task where e_id = '$e_id' and type_task='Leads' and date BETWEEN '$firstday_time' and '$lastday_time'");
        return $query->result_array();
    }
    
    public function kam_lead_task_monthly_details($per_page, $offset,$e_id){
        $firstday = date("Y-m-d", strtotime("first day of this month")); 
        $firstday_time=$firstday.' 00:00:00';
        $lastday = date("Y-m-d", strtotime("last day of this month")); 
        $lastday_time=$lastday.' 23:59:59';


        $condition =  "(e_id =" . "'" . $e_id . "'". " AND " ."type_task =" . "'" . 'Leads' . "'". " AND " ."status =" . "'" . 'Working Process' . "'". " )OR " ." (type_task =" . "'" . 'Leads' . "'". " AND " ."e_id =" . "'" . $e_id . "'". " AND " ."date  BETWEEN " . "'"  . $firstday_time . "'" . " AND " . "'" . $lastday_time . "')";
      
        $this->db->select('*');
        $this->db->from('kam_task');
        $this->db->where($condition);
        $query = $this->db->get('', $per_page, $offset);
        $data=array();
        foreach ($query->result() as $row)            
            $data[] = $row;        
        return $data;
    
    
    }
}
