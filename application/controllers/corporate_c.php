<?php

class Corporate_c extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->library("pagination");
        $this->load->model('mrk_model');
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

    public function corporate_db() {
        $data = array();

        $data['sales_Details'] = $this->mrk_model->corporate_sales_Details_monthly();
        $data['sales_year'] = $this->mrk_model->corporate_sales_Details_year();
        $data['task_Details'] = $this->mrk_model->corporate_task_Details_daily();
        $data['weekly_task_Details'] = $this->mrk_model->corporate_task_Details_weekly();
        $data['monthly_task_Details'] = $this->mrk_model->corporate_task_Details_monthly();
        $data['maincontent'] = $this->load->view('corporate_db', $data, true);

        $this->load->view('home', $data);
    }
    public function bank_nbfi_db() {
        
        $data = array();

        $data['sales_Details'] = $this->mrk_model->bank_sales_Details_monthly();
        $data['sales_year'] = $this->mrk_model->bank_sales_Details_year();
        
        $data['task_Details'] = $this->mrk_model->bank_task_Details_daily();
        $data['weekly_task_Details'] = $this->mrk_model->bank_task_Details_weekly();
        $data['monthly_task_Details'] = $this->mrk_model->bank_task_Details_monthly();
        $data['maincontent'] = $this->load->view('bank_nbfi_db_page', $data, true);

        $this->load->view('home', $data);
    }
    
    public function corporate_dy_month(){
        
       $month=$this->input->post('month'); 
       $date=date("Y").'-'.$month;
       $result = $this->mrk_model->corporate_sales_dy_monthly($date);
       echo json_encode($result);
    }
    
    public function bank_dy_month(){
        
       $month=$this->input->post('month'); 
       $date=date("Y").'-'.$month;
       $result = $this->mrk_model->bank_sales_dy_monthly($date);
       echo json_encode($result);
    }
    
    public function ctg_mkt() {
        $data = array();

        $data['sales_Details'] = $this->mrk_model->ctg_sales_Details_monthly();
        $data['sales_year'] = $this->mrk_model->ctg_sales_Details_year();        
        $data['task_Details'] = $this->mrk_model->ctg_task_Details_daily();
        $data['weekly_task_Details'] = $this->mrk_model->ctg_task_Details_weekly();

        $data['maincontent'] = $this->load->view('mrk_ctg_db', $data, true);

        $this->load->view('home', $data);
    }

    public function corporate_assin_task() {
        $data = array();
        $data['result'] = $this->mrk_model->corporate_assign_category();
        $data['maincontent'] = $this->load->view('corporate_assin_task', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }

     public function bank_assin_task() {
        $data = array();
        $data['result'] = $this->mrk_model->bank_assign_category();
        $data['result_1'] = $this->mrk_model->bank_client_category();
        $data['maincontent'] = $this->load->view('bank_assin_task', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
     public function client_info_mrk() {
        $data = array();
        $data['result'] = $this->mrk_model->bank_client_category_1();
        
        $data['maincontent'] = $this->load->view('customer_info_from', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    
    public function save_selas_info() {

        $id = $this->session->userdata('id');
        $Zone = $this->session->userdata('Zone'); 
        $department = $this->session->userdata('department');
        $data = array();
        $data['crt_id'] = $id;
        $data['zone'] = $Zone;
        $data['department'] = $department;
        $data['month'] = date("m");
        $Date = $this->input->post('start_date_id');
        $new_start_date = date("Y-m-d", strtotime($Date));
        $data['date'] = $new_start_date;
        $data['e_id'] = $this->input->post('employee_id');
        $data['e_name'] = $this->input->post('employee_name');
        $data['L3_service'] = $this->input->post('L3_service');
        $data['Client_Name'] = $this->input->post('Client_Name');
        $data['otc'] = $this->input->post('otc');
        $data['mrc'] = $this->input->post('mrc');

        $result = $this->mrk_model->corporate_sales_info_save($data);
    }
    
    public function save_bank_client_info(){
        
        $id = $this->session->userdata('id'); 
        $department = $this->session->userdata('department');
        $data = array();
        $data['crt_id'] = $id;
        $data['department'] = $department;
        $date = date("Y-m-d");
        $data['date'] = $date;
        $data['Client_Category'] = $this->input->post('Client_Category');
        $data['ofc_type'] = $this->input->post('ofc_type');
        $data['Client_id'] = $this->input->post('Client_ID');
        $data['Client_Name'] = $this->input->post('Client_Name');  
        $data['house_name'] = $this->input->post('house_name');
        $data['house_no'] = $this->input->post('house_no');
        $data['road_no'] = $this->input->post('road_no');
        $data['word'] = $this->input->post('word');
        $data['thana'] = $this->input->post('thana');
        $data['post_code'] = $this->input->post('post_code');
        $data['district'] = $this->input->post('district');
        
//       $data['Contact_Name'] = $this->input->post('Contact_Name');
//       $data['designation'] = $this->input->post('designation');
//       $data['email'] = $this->input->post('email');
//       $data['phone'] = $this->input->post('phone');  
        
       //        .................................ADD Engineer Part...........................................................
        
$loop_number = $this->input->post('loop_number');
$c_name_array= $this->input->post('c_name_array');
$c_designation_array = $this->input->post('c_designation_array');
$c_email_array = $this->input->post('c_email_array');
$c_phone_array = $this->input->post('c_phone_array');       
  
$split_name_array=(explode(",",$c_name_array));
$split_designation_array=(explode(",",$c_designation_array));
$split_email_array=(explode(",",$c_email_array));
$split_phone_array=(explode(",",$c_phone_array));
$work_data=array();
for($i=0;$i<=$loop_number;$i++){
    
   $c_name=$split_name_array[$i];
   $c_designation=$split_designation_array[$i];
   $c_email=$split_email_array[$i];
   $c_phone=$split_phone_array[$i];
   
   $data['Contact_Name']=$c_name;
   $data['designation']=$c_designation;
   $data['email']=$c_email;
   $data['phone']=$c_phone;
   
   if($c_name!=null){
//       $this->ert_model->add_engineer_model($work_data); 
       $this->mrk_model->save_mkt_client_info($data);
   }   
} 

//        $result = $this->mrk_model->save_mkt_client_info($data);
        
    }
    
  public function bank_customer_list(){
   
    $data = array();            
    $data['cat_result'] = $this->mrk_model->bank_client_category_2();
    $type = $this->input->post('Client_Category'); 
    $name = $this->input->post('Client_Name'); 
    $_SESSION["type_bank_nbfi"]=$type;
    $_SESSION["bank_name"]=$name;
    
    if($type!='0' && $name!='0'){
        $data['customer_list'] = $this->mrk_model->customer_list2($name);
    }elseif($type!='0' && $name=='0'){
          $data['customer_list'] = $this->mrk_model->customer_list1($type);
    }else{
        $data['customer_list'] = $this->mrk_model->customer_list();
    }
    
    
    
    $data['maincontent'] = $this->load->view('customer_list', $data, true);
//        $data['title'] = 'View Course';
    $this->load->view('home', $data);  
    }    
    

        public function save_corporate_task_info_(){
        
        $id = $this->session->userdata('id');
        $department = $this->session->userdata('department');
//        .............................................................................
        
        $tdata = array();
        $tdata['create_id'] = $id;            
        $this->mrk_model->coprprate_ticket_info_model($tdata);
        $ticket_data = array();
        $ticket_data['result_ticket_id'] = $this->mrk_model->find_ticket_Id($id);

//        ..............................................................................
        $data = array();
        $data['crt_id'] = $id;
        $data['department'] = $department;
        $data['p_key']=$ticket_data['result_ticket_id']->p_key;
        $Date = $this->input->post('s_date');
        $new_start_date = date("Y-m-d H:i:s", strtotime($Date));
        $data['start_date'] = $new_start_date;
        
        $data['type_task'] = $this->input->post('type_task');
        $data['Zone'] = $this->input->post('Zone');
        $data['area'] = $this->input->post('area');
        $data['Client_ID'] = $this->input->post('Client_ID');
        $data['Client_Name'] = $this->input->post('Client_Name');
        
        $Contact_TName= $this->input->post('Contact_TName');
        $Contact_FName= $this->input->post('Contact_FName');
        $Contact_LName = $this->input->post('Contact_LName');
        $data['Contact_Name'] = $Contact_TName.' '.$Contact_FName.' '.$Contact_LName;
        
        
        $data['phone'] = $this->input->post('phone');
        $data['email'] = $this->input->post('email');
        $data['address'] = $this->input->post('address');
        $data['L3_service'] = $this->input->post('L3_service');
        $data['e_name'] = $this->input->post('e_name');
        $data['e_id'] = $this->input->post('e_id');
        $offer_value = $this->input->post('offer_value');
        $data['offer_value'] = $offer_value;
        
        if($offer_value=='1'){
        $data['amount'] = $this->input->post('amount');
        $Date = $this->input->post('start_date_id');
        $new_start_date = date("Y-m-d", strtotime($Date));
        $data['follow_up_date'] = $new_start_date;
        }
        
        $data['survey_value'] = $this->input->post('survey_value');
        
        $status = $this->input->post('status');
        
        if($status=='Sales Close'){
           $data['end_date'] = $new_start_date; 
        } else  {
            $follow_up_data=array();
            $follow_up_data['crt_id'] = $id;
            $follow_up_data['p_key']=$ticket_data['result_ticket_id']->p_key;
            $Date = $this->input->post('start_date_id');
            $new_start_date = date("Y-m-d", strtotime($Date));
            $follow_up_data['follow_up_date'] = $new_start_date;
            $follow_up_data['remarks'] = $this->input->post('remarks');
            
            $this->mrk_model->corporate_follow_up_task($follow_up_data);
        }
        $data['status'] = $status;
        $data['remarks'] = $this->input->post('remarks');
        $result = $this->mrk_model->corporate_task_info_save($data); 
    }

    
        public function save_bank_task_info_(){
        
        $id = $this->session->userdata('id');
        $department = $this->session->userdata('department');
//        .............................................................................
        
        $tdata = array();
        $tdata['create_id'] = $id;            
        $this->mrk_model->coprprate_ticket_info_model($tdata);
        $ticket_data = array();
        $ticket_data['result_ticket_id'] = $this->mrk_model->find_ticket_Id($id);

//        ..............................................................................
        $data = array();
        $data['crt_id'] = $id;
        $data['department'] = $department;
        $data['p_key']=$ticket_data['result_ticket_id']->p_key;
        $Date = $this->input->post('s_date');
        $new_start_date = date("Y-m-d H:i:s", strtotime($Date));
        $data['start_date'] = $new_start_date;
        
        $data['type_task'] = $this->input->post('type_task');
        $data['sub_task'] = $this->input->post('sub_task');
        $data['designation'] = $this->input->post('designation');
        $data['Client_ID'] = $this->input->post('Client_ID');
        $data['Client_Name'] = $this->input->post('Client_Name');
        $data['Contact_Name'] = $this->input->post('Contact_Name');
        $data['phone'] = $this->input->post('phone');
        $data['email'] = $this->input->post('email');
        $data['address'] = $this->input->post('address');
        $data['L3_service'] = $this->input->post('L3_service');
        $data['e_name'] = $this->input->post('e_name');
        $data['e_id'] = $this->input->post('e_id');
        $offer_value = $this->input->post('offer_value');
        $data['offer_value'] = $offer_value;
        $data['Site_Number'] = $this->input->post('Site_Number');
        
        if($offer_value=='1'){
        $data['amount'] = $this->input->post('amount');
        $Date = $this->input->post('start_date_id');
        $new_start_date = date("Y-m-d", strtotime($Date));
        $data['follow_up_date'] = $new_start_date;
        }
        
        $data['survey_value'] = $this->input->post('survey_value');
        $status = $this->input->post('status');
        
        if($status=='Sales Close'){
           $data['end_date'] = $new_start_date; 
        } else  {
            $follow_up_data=array();
            $follow_up_data['crt_id'] = $id;
            $follow_up_data['p_key']=$ticket_data['result_ticket_id']->p_key;
            $Date = $this->input->post('start_date_id');
            $new_start_date = date("Y-m-d", strtotime($Date));
            $follow_up_data['follow_up_date'] = $new_start_date;
            $follow_up_data['remarks'] = $this->input->post('remarks');
            $this->mrk_model->corporate_follow_up_task($follow_up_data);
        }
        $data['status'] = $status;
        $data['remarks'] = $this->input->post('remarks');
        $result = $this->mrk_model->bank_task_info_save($data); 
    }
    
    public function corporate_sales_from() {

        $data = array();
        $data['result'] = $this->mrk_model->corporate_sales_category();
        $data['maincontent'] = $this->load->view('corporate_sales', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    
     public function corporate_followup_from($p_key) {

        $data = array();
        $data['result'] = $this->mrk_model->corporate_followup_category();
        
        $data['pick_p_key'] = $this->mrk_model->pick_corporate_follow_up_info($p_key);
        
        $data['pick_Comments'] = $this->mrk_model->pick_corporate_Comments_info($p_key);
        $data['maincontent'] = $this->load->view('corporate_follow_up_from', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
        
        
    }
    
     public function kam_followup_from($p_key) {

        $data = array();        
        $data['result'] = $this->mrk_model->kam_followup_category();        
        $data['pick_p_key'] = $this->mrk_model->pick_kam_follow_up_info($p_key);
        $data['pick_Comments'] = $this->mrk_model->pick_kam_Comments_info($p_key);
        $data['maincontent'] = $this->load->view('kam_follow_up_from', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
        
        
    }
    
     public function bank_followup_from($p_key) {

        $data = array();
        $data['result'] = $this->mrk_model->corporate_followup_category();
        
        $data['pick_p_key'] = $this->mrk_model->pick_bank_follow_up_info($p_key);
        $data['pick_Comments'] = $this->mrk_model->pick_corporate_Comments_info($p_key);
        $data['maincontent'] = $this->load->view('bank_follow_up_from', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    
    public function save_follow_up_info(){
        
        $follow_up_data=array();
        $id = $this->session->userdata('id');
        $follow_up_data['crt_id'] = $id;
        $p_key=$this->input->post('p_key');
        $follow_up_data['p_key']= $this->input->post('p_key');
        $Date = $this->input->post('start_date_id');
        $new_start_date = date("Y-m-d", strtotime($Date));
        $follow_up_data['follow_up_date'] = $new_start_date;
        $follow_up_data['remarks'] = $this->input->post('remarks');
        
        $status = $this->input->post('status');
        
        $data=array(); 
        if($status=='Sales Close'){
           $data['end_date'] = date("Y-m-d H:i:s") ; 
           $data['remarks'] = $this->input->post('remarks');
           $data['status'] = $status;
           $data['sale_amount'] = $this->input->post('sale_amount');
           $data['c_sales_status'] ='Done';
        }else{
            
           $data['follow_up_date'] = $new_start_date; 
           $data['remarks'] = $this->input->post('remarks');
           $data['status'] = $status; 
        }
        
        
        $this->mrk_model->update_corporate_task($p_key,$data);
        
        $this->mrk_model->corporate_follow_up_task($follow_up_data);
        
//................... CROSS SALES ............................................................
        
        $cloud = $this->input->post('cloud_v');
        $IPTS = $this->input->post('IPTS_v');
        $intrnt = $this->input->post('intrnt_v');
        $a_v = $this->input->post('a_v');
        
        $cross_data=array();
        $cross_data['e_id'] = $id;
        $cross_data['cloud'] = $cloud;
        $cross_data['IPTS'] = $IPTS;
        $cross_data['intrnt'] = $intrnt;
        $cross_data['a_v'] = $a_v;
        $cross_data['p_key'] = $p_key;
        $cross_data['L3_service'] = $this->input->post('L3_service');
        $this->mrk_model->corporate_cross_sales($cross_data);
        
        
        
        
 ///////////////////////////////////////////////////////////////////////////////////////////////       
//............................. IP Telephony Service ...............................................................  
///////////////////////////////////////////////////////////////////////////////////////////////        

         
//.........................................................................................        
        
        $id = $this->session->userdata('id');
        $department = $this->session->userdata('department');
//.........................................................................................
        
        $tdata = array();
        $tdata['create_id'] = $id;            
        $this->mrk_model->coprprate_ticket_info_model($tdata);
        $ticket_data = array();
        $ticket_data['result_ticket_id'] = $this->mrk_model->find_ticket_Id($id);

//        ..............................................................................
        $data_C = array();
        $data_C['crt_id'] = $id;
        $data_C['department'] = $department;
        $data_C['p_key']=$ticket_data['result_ticket_id']->p_key;
        $Date = $this->input->post('s_date');
        $new_start_date = date("Y-m-d H:i:s");
        $data_C['start_date'] = $new_start_date;
        $data_C['type_task'] = 'Cross Sales';
        $data_C['Zone'] = $this->input->post('Zone');
        $data_C['area'] = $this->input->post('area');
        $data_C['Client_ID'] = $this->input->post('Client_ID');
        $data_C['Client_Name'] = $this->input->post('Client_Name');
        $data_C['Contact_Name'] = $this->input->post('Contact_Name');
        $data_C['phone'] = $this->input->post('phone');
        $data_C['email'] = $this->input->post('email');
        $data_C['address'] = $this->input->post('address');
        $ref_service = $this->input->post('L3_service');
        $data_C['ref_service'] = $ref_service;
        $data_C['status'] = 'Interested';  
        $data_C['c_sales_status'] = 'pending';
        $data_C['ref_p_key'] = $p_key;
        $data_C['ref_eid'] = $id;
        
       if($IPTS=='1'){   
        $data_C['L3_service'] ='IP Telephony Service';  
        $data_C['e_name'] ='Md. Mehebub Alam';
        $data_C['e_id'] ='L3T1648';
        $result = $this->mrk_model->corporate_task_info_save($data_C); 
       }

       if($intrnt=='1'){   
        $data_C['L3_service'] ='Internet  Connectivity';   
        $data_C['e_name'] ='MOHAMMED SOIEB';
        $data_C['e_id'] ='L3T1597';
        $result = $this->mrk_model->corporate_task_info_save($data_C); 
       }
       
       if($a_v=='1'){  
        $data_C['L3_service'] ='Antivirus & Anti-spam solution'; 
        $data_C['e_name'] ='Christopher Raju Gomes';
        $data_C['e_id'] ='L3T809';
        $result = $this->mrk_model->corporate_task_info_save($data_C); 
       }
       
       if($cloud=='1'){   
        $data_C['L3_service'] ='E-mail Hosting solution';  
        $data_C['e_name'] ='KHANDAKER ZAHID BIN';
        $data_C['e_id'] ='L3T1152';
        $result = $this->mrk_model->corporate_task_info_save($data_C); 
       }
//............................................................................................        
     
    }
    
    public function save_KAM_follow_up_info(){
        
       $follow_up_data=array();
       $id = $this->session->userdata('id');
       $follow_up_data['crt_id'] = $id;
       $p_key=$this->input->post('p_key');
       $follow_up_data['p_key']= $this->input->post('p_key');
       $remarks= $this->input->post('remarks');
       $status = $this->input->post('status'); 
       $follow_up_data['remarks'] = $remarks;  
       $follow_up_data['status'] = $status; 
       $this->mrk_model->kam_follow_up_task($follow_up_data);
       
       $data=array();
       $data['lead_price'] = $this->input->post('lead_price');
       $data['remarks'] = $this->input->post('remarks');
       $data['status'] = $status; 
       $this->mrk_model->update_kam_task($p_key,$data);   
    }

        public function Check_cross_sales_id(){
        
       $p_key=$this->input->post('p_key');      
       $service=$this->input->post('ref_service'); 
       $result = $this->mrk_model->Check_cross_sales_model($p_key,$service);
       echo json_encode($result);
    }

    public function save_bank_follow_up_info(){
        
        $follow_up_data=array();
        $id = $this->session->userdata('id');
        $follow_up_data['crt_id'] = $id;
        $p_key=$this->input->post('p_key');
        $follow_up_data['p_key']= $this->input->post('p_key');
        $Date = $this->input->post('start_date_id');
        $new_start_date = date("Y-m-d", strtotime($Date));
        $follow_up_data['follow_up_date'] = $new_start_date;
        $follow_up_data['remarks'] = $this->input->post('remarks');
        
        $status = $this->input->post('status');
        
        $data=array(); 
        if($status=='Sales Close'){
           $data['end_date'] = date("Y-m-d H:i:s") ; 
           $data['remarks'] = $this->input->post('remarks');
           $data['status'] = $status;
        }else{
            
           $data['follow_up_date'] = $new_start_date; 
           $data['remarks'] = $this->input->post('remarks');
           $data['status'] = $status; 
        }
        
        
        $this->mrk_model->update_bank_task($p_key,$data);
        
        $this->mrk_model->corporate_follow_up_task($follow_up_data);
    }
    
    public function pick_engineer_id() {

        $Engineer_Name = $this->input->post('Engineer_Name');
        $result = $this->mrk_model->pick_Engineer_ID_model_2($Engineer_Name);
        echo json_encode($result);
    }

    public function corporate_daily_task($e_id){
        
        $data = array();
        $data['result'] = $this->mrk_model->corporate_followup_category();
        
        
        
//      .......................  pagination  ...................................................................  
        $config["base_url"] = base_url() . "index.php/corporate_c/corporate_task_list/";
        $nmuber = $this->mrk_model->corporate_count_daily_task($e_id);
        $i=0;
        foreach ($nmuber as $value) {
         $i++;  
        }
//        echo 'i......'.$i;
        
        
        $config["total_rows"] = $i;
        $config["per_page"] = 100;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["follow_up_list"] = $this->mrk_model->
                corporate_daily_task_details($config["per_page"], $page,$e_id);
        
        $data["links"] = $this->pagination->create_links(); 
//      ...............................................................................................
        
//        $data["follow_up_list"] = $this->mrk_model->corporate_daily_task_details($e_id);
        
        $data['maincontent'] = $this->load->view('corporate_task_list', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    }
   
    public function corporate_weekly_task($e_id){
        
        
        $data = array();
        $data['result'] = $this->mrk_model->corporate_followup_category();
        
        
        
//      .......................  pagination  ...................................................................  
        $config["base_url"] = base_url() . "index.php/corporate_c/corporate_weekly_task/";
        $nmuber = $this->mrk_model->corporate_count_daily_task($e_id);
        
        $i=0;
        foreach ($nmuber as $value) { $i++; }

        $config["total_rows"] = $i;
        $config["per_page"] = 50;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["follow_up_list"] = $this->mrk_model->
                corporate_weekly_task_details($config["per_page"], $page,$e_id);
        
        $data["links"] = $this->pagination->create_links(); 
//      ...............................................................................................

        $data['maincontent'] = $this->load->view('corporate_task_list', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    
    public function corporate_monthly_task($e_id){
        
        $data = array();
        $data['result'] = $this->mrk_model->corporate_followup_category();
        
        
        
//      .......................  pagination  ...................................................................  
        $config["base_url"] = base_url() . "index.php/corporate_c/corporate_monthly_task/";
        $nmuber = $this->mrk_model->corporate_count_daily_task($e_id);
        
        $i=0;
        foreach ($nmuber as $value) { $i++; }

        $config["total_rows"] = $i;
        $config["per_page"] = 100;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["follow_up_list"] = $this->mrk_model->
                corporate_monthly_task_details($config["per_page"], $page,$e_id);
        
        $data["links"] = $this->pagination->create_links(); 
//      ...............................................................................................

        $data['maincontent'] = $this->load->view('corporate_task_list', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    }

    public function corporate_follow_up_task($e_id){
        
        $data = array();
        $data['from_value'] = $this->mrk_model->corporate_sales_report_value();
        
        
        
//      .......................  pagination  ...................................................................  
        $config["base_url"] = base_url() . "index.php/corporate_c/corporate_follow_up_task/";
        $nmuber = $this->mrk_model->corporate_follow_up_count_daily($e_id);
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
        $data["follow_up_list"] = $this->mrk_model->
                corporate_follow_up_task_details($config["per_page"], $page,$e_id);
        
        $data["links"] = $this->pagination->create_links(); 
//      ...............................................................................................
        
//        $data["follow_up_list"] = $this->mrk_model->corporate_daily_task_details($e_id);
        
        $data['maincontent'] = $this->load->view('corporate_task_list', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    }
    
    public function pending_cross_sale($e_id){
         $data = array();
        $data['from_value'] = $this->mrk_model->corporate_sales_report_value();

//      .......................  pagination  ...................................................................  
        $config["base_url"] = base_url() . "index.php/corporate_c/pending_cross_sale/";
        $nmuber = $this->mrk_model->pending_cross_sale_count($e_id);
        $i=0;
        foreach ($nmuber as $value) {
         $i++;  
        }
//        echo 'i......'.$i;

        $config["total_rows"] = $i;
        $config["per_page"] = 100;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["follow_up_list"] = $this->mrk_model->
                pending_cross_sale_details($config["per_page"], $page,$e_id);
        
        $data["links"] = $this->pagination->create_links(); 
//      ...............................................................................................
        
//        $data["follow_up_list"] = $this->mrk_model->corporate_daily_task_details($e_id);
        
        $data['maincontent'] = $this->load->view('corporate_task_list', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }

        public function corporate_sales_monthly_by_id($e_id){
        
         $data = array();
         $data['from_value'] = $this->mrk_model->corporate_sales_report_value();

//      .......................  pagination  ...................................................................  
        $config["base_url"] = base_url() . "index.php/corporate_c/corporate_sales_monthly_by_id/";
        $nmuber = $this->mrk_model->corporate_sales_report_by_id_count($e_id);
        $i=0;
        foreach ($nmuber as $value) {
         $i++;  
        }
//        echo 'i......'.$i;
        
        
        $config["total_rows"] = $i;
        $config["per_page"] = 100;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["result"] = $this->mrk_model->
                corporate_sales_report_by_id($config["per_page"], $page,$e_id);
        
        $data["links"] = $this->pagination->create_links(); 
         

//        $data['result'] = $this->mrk_model->corporate_sales_report_by_date($e_id);
            
// .......................................................................................................
        $data['maincontent'] = $this->load->view('corporate_sales_report', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    }
      public function corporate_sales_report() {

            $data = array();
            
            $department = $this->session->userdata('department');
            $data['from_value'] = $this->mrk_model->corporate_sales_report_value();
//......................................................................................................
/////////////////////////////////////////////////////////////////////////////////////////////////

            $Date = $this->input->post('date_from');
            $date_from = date("Y-m-d", strtotime($Date));
            $date1 = $date_from;

            $Date2 = $this->input->post('date_to');
            $date_to = date("Y-m-d", strtotime($Date2));
            $date2 = $date_to;
            
            $date_array = array(
                'date1' => $date1,
                'date2' => $date2
            );
///////////////////////////////////////////////////////////////////////////////////////////////    

            $service = $this->input->post('L3_service'); 
            $_SESSION["service"] = $service;
            
            $e_id = $this->input->post('e_id'); 
            $_SESSION["e_id"] = $e_id;
if( $e_id != '0' && $service != '0'){
//  .......................  pagination  ...................................................................  
        $config["base_url"] = base_url() . "index.php/corporate_c/corporate_sales_report/";
        $nmuber = $this->mrk_model->corporate_sales_report_by_date_service_id_count($date_array,$service,$e_id,$department);
        $i=0;
        foreach ($nmuber as $value) { $i++; }
        $config["total_rows"] = $i;
        $config["per_page"] = 500;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["result"] = $this->mrk_model->
                corporate_sales_report_by_date_service_id($config["per_page"], $page,$date_array,$service,$e_id,$department);
        $data["links"] = $this->pagination->create_links();            
// .............................................................................................................  
}elseif ($e_id == '0' && $service != '0') {
//  .......................  pagination  ...................................................................  
        $config["base_url"] = base_url() . "index.php/corporate_c/corporate_sales_report/";
        $nmuber = $this->mrk_model->corporate_sales_report_by_date_service_count($date_array,$service,$department);
        $i=0;
        foreach ($nmuber as $value) { $i++; }
        $config["total_rows"] = $i;
        $config["per_page"] = 500;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["result"] = $this->mrk_model->
                corporate_sales_report_by_date_service($config["per_page"], $page,$date_array,$service,$department);
        $data["links"] = $this->pagination->create_links();            
// .............................................................................................................        
}elseif ($e_id != '0' && $service == '0') {
//  .......................  pagination  ...................................................................  
        $config["base_url"] = base_url() . "index.php/corporate_c/corporate_sales_report/";
        $nmuber = $this->mrk_model->corporate_sales_report_by_date_id_count($date_array,$e_id,$department);
        $i=0;
        foreach ($nmuber as $value) { $i++; }
        $config["total_rows"] = $i;
        $config["per_page"] = 500;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["result"] = $this->mrk_model->
                corporate_sales_report_by_date_id($config["per_page"], $page,$date_array,$e_id,$department);
        $data["links"] = $this->pagination->create_links();            
// .............................................................................................................        
}else{
//  .......................  pagination  ...................................................................  
        $config["base_url"] = base_url() . "index.php/corporate_c/corporate_sales_report/";
        $nmuber = $this->mrk_model->corporate_sales_report_by_date_count($date_array,$department);
        $i=0;
        foreach ($nmuber as $value) { $i++; }
        $config["total_rows"] = $i;
        $config["per_page"] = 500;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["result"] = $this->mrk_model->
                corporate_sales_report_by_date($config["per_page"], $page,$date_array,$department);
        $data["links"] = $this->pagination->create_links();            
// .............................................................................................................   
}
        $data['maincontent'] = $this->load->view('corporate_sales_report', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    
    

    public function corporate_task_list() {

        $data = array();
        $data['result'] = $this->mrk_model->corporate_followup_category();
        $department = $this->session->userdata('department');
        
        //......................................................................................................
/////////////////////////////////////////////////////////////////////////////////////////////////

            $Date = $this->input->post('date_from');
            $date_from = date("Y-m-d", strtotime($Date));
            $date1 = $date_from;

            $Date2 = $this->input->post('date_to');
            $date_to = date("Y-m-d", strtotime($Date2));
            $date2 = $date_to;
            
            $date_array = array(
                'date1' => $date1,
                'date2' => $date2
            );
///////////////////////////////////////////////////////////////////////////////////////////////    

            $status = $this->input->post('status'); 
            $_SESSION["status"] = $status;
            
            $e_id = $this->input->post('e_id'); 
            $_SESSION["e_id"] = $e_id;
        
 if( $e_id != '0' && $status != '0'){
       $config["base_url"] = base_url() . "index.php/corporate_c/corporate_task_list/";
        $nmuber = $this->mrk_model->corporate_task_count_date_id_status($date_array,$e_id,$status);
        $i=0;
        foreach ($nmuber as $value) { $i++; }
//        echo 'i......'.$i;
        $config["total_rows"] = $i;
        $config["per_page"] = 1000;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["follow_up_list"] = $this->mrk_model->
                corporate_task_list_date_id_status($config["per_page"], $page,$date_array,$e_id,$status);
        
        $data["links"] = $this->pagination->create_links();    
 }elseif ( $e_id != '0' && $status == '0') {
     
//  .......................  pagination  .......................................................... 
        $config["base_url"] = base_url() . "index.php/corporate_c/corporate_task_list/";
        $nmuber = $this->mrk_model->corporate_task_count_date_id($date_array,$e_id);
        $i=0;
        foreach ($nmuber as $value) { $i++; }
//        echo 'i......'.$i;
        $config["total_rows"] = $i;
        $config["per_page"] = 1000;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["follow_up_list"] = $this->mrk_model->
                corporate_task_list_date_id($config["per_page"], $page,$date_array,$e_id);
        
        $data["links"] = $this->pagination->create_links(); 
//      ...............................................................................................           
 }elseif ( $e_id == '0' && $status != '0') {
     
//  .......................  pagination  .......................................................... 
        $config["base_url"] = base_url() . "index.php/corporate_c/corporate_task_list/";
        $nmuber = $this->mrk_model->corporate_task_count_date_status($date_array,$status,$department);
        $i=0;
        foreach ($nmuber as $value) { $i++; }
//        echo 'i......'.$i;
        $config["total_rows"] = $i;
        $config["per_page"] = 1000;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["follow_up_list"] = $this->mrk_model->
                corporate_task_list_date_status($config["per_page"], $page,$date_array,$status,$department);
        
        $data["links"] = $this->pagination->create_links(); 
//      ...............................................................................................          
 }elseif ( $e_id == '0' && $status == '0') {
//  .......................  pagination  .......................................................... 
        $config["base_url"] = base_url() . "index.php/corporate_c/corporate_task_list/";
        $nmuber = $this->mrk_model->corporate_task_count_date($date_array,$department);
        $i=0;
        foreach ($nmuber as $value) { $i++; }
//        echo 'i......'.$i;
        $config["total_rows"] = $i;
        $config["per_page"] = 1000;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["follow_up_list"] = $this->mrk_model->
                corporate_task_list_date($config["per_page"], $page,$date_array,$department);
        
        $data["links"] = $this->pagination->create_links(); 
//      ...............................................................................................      
 }    
        $data['maincontent'] = $this->load->view('corporate_task_list', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    
    public function bank_task_list() {

        $data = array();
//        $data['result'] = $this->mrk_model->corporate_followup_category();
        
        $department = $this->session->userdata('department');
///////////////////////////////////////////////////////////////////////////////////////////////////////        
//.....................................................................................................
///////////////////////////////////////////////////////////////////////////////////////////////////////

            $Date = $this->input->post('date_from');
            $date_from = date("Y-m-d", strtotime($Date));
            $date1 = $date_from;

            $Date2 = $this->input->post('date_to');
            $date_to = date("Y-m-d", strtotime($Date2));
            $date2 = $date_to;
            
            $date_array = array(
                'date1' => $date1,
                'date2' => $date2
            );
///////////////////////////////////////////////////////////////////////////////////////////////    

//            $status = $this->input->post('status'); 
//            $_SESSION["status"] = $status;
            
            $e_id = $this->input->post('e_id'); 
            $_SESSION["e_id"] = $e_id;
        
 if ( $e_id != '0' ) {
     
//  .......................  pagination  .......................................................... 
        $config["base_url"] = base_url() . "index.php/corporate_c/bank_task_list/";
        $nmuber = $this->mrk_model->bank_task_count_date_id($date_array,$e_id);
        $i=0;
        foreach ($nmuber as $value) { $i++; }
//        echo 'i......'.$i;
        $config["total_rows"] = $i;
        $config["per_page"] = 1000;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["follow_up_list"] = $this->mrk_model->
                bank_task_list_date_id($config["per_page"], $page,$date_array,$e_id);
        
        $data["links"] = $this->pagination->create_links(); 
//      ...............................................................................................           
 }elseif ( $e_id == '0') {
//  .......................  pagination  .......................................................... 
        $config["base_url"] = base_url() . "index.php/corporate_c/bank_task_list/";
        $nmuber = $this->mrk_model->bank_task_count_date($date_array);
        $i=0;
        foreach ($nmuber as $value) { $i++; }
//        echo 'i......'.$i;
        $config["total_rows"] = $i;
        $config["per_page"] = 1000;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["follow_up_list"] = $this->mrk_model->
                bank_task_list_date($config["per_page"], $page,$date_array);
        
        $data["links"] = $this->pagination->create_links(); 
//      ...............................................................................................      
 }    
        $data['maincontent'] = $this->load->view('bank_task_list', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    
    
    function Strategic_db(){
        $data = array();

        $data['sales_Details'] = $this->mrk_model->Strategic_sales_Details_monthly();
        $data['sales_year'] = $this->mrk_model->Strategic_sales_Details_year();        
        $data['task_Details'] = $this->mrk_model->Strategic_task_Details_daily();
        $data['weekly_task_Details'] = $this->mrk_model->Strategic_task_Details_weekly();

        $data['maincontent'] = $this->load->view('Strategic_db', $data, true);

        $this->load->view('home', $data);
        
    }
    
    function corporate_target(){
        $data = array();
        $data['result'] = $this->mrk_model->pick_month();
        $data['maincontent'] = $this->load->view('corporate_target', $data, true);
        $this->load->view('home', $data); 
    }
    
     public function mrk_Check_id() {
       $e_id = $this->input->post('e_id');
       $month_name=$this->input->post('month');
       if($month_name=='January'){
            $month='01';
        }elseif ($month_name=='February') {
             $month='02';
        }elseif ($month_name=='March') {
             $month='03';
        }elseif ($month_name=='April') {
             $month='04';
        }elseif ($month_name=='May') {
             $month='05';
        }elseif ($month_name=='June') {
             $month='06';
        }elseif ($month_name=='July') {
             $month='07';
        }elseif ($month_name=='August') {
             $month='08';
        }elseif ($month_name=='September') {
             $month='09';
        }elseif ($month_name=='October') {
             $month='10';
        }elseif ($month_name=='November') {
             $month='11';
        }elseif ($month_name=='December') {
             $month='12';
        }
        
        $year=date('Y');
        $month= $year.'-'.$month;

        $result = $this->mrk_model->mrk_Check_id_model($e_id, $month);
        echo json_encode($result);
    }
    
     public function save_sale_target_info() {

        $id = $this->session->userdata('id');
        $department = $this->session->userdata('department');
        $data = array();
        $data['crt_id'] = $id;
        $data['department'] = $department;
        $month_name=$this->input->post('month');
       if($month_name=='January'){
            $month='01';
        }elseif ($month_name=='February') {
             $month='02';
        }elseif ($month_name=='March') {
             $month='03';
        }elseif ($month_name=='April') {
             $month='04';
        }elseif ($month_name=='May') {
             $month='05';
        }elseif ($month_name=='June') {
             $month='06';
        }elseif ($month_name=='July') {
             $month='07';
        }elseif ($month_name=='August') {
             $month='08';
        }elseif ($month_name=='September') {
             $month='09';
        }elseif ($month_name=='October') {
             $month='10';
        }elseif ($month_name=='November') {
             $month='11';
        }elseif ($month_name=='December') {
             $month='12';
        }
        
        $year=date('Y');
        $data['month'] = $year.'-'.$month;
        $data['e_id'] = $this->input->post('e_id');
        $data['e_name'] = $this->input->post('e_name');
        $data['daily_new_visit'] = $this->input->post('daily_new_visit');
        $data['daily_ex_visit'] = $this->input->post('daily_ex_visit');
        $data['target_otc'] = $this->input->post('target_otc');
        $data['target_mrc'] = $this->input->post('target_mrc');

        $result = $this->mrk_model->corporate_sales_target_info_save($data);
    }
    
     public function pick_client_info(){
      
       $Client_ID=$this->input->post('Client_ID');   
       $result = $this->mrk_model->pick_client_info_model($Client_ID);
       echo json_encode($result);
        
    }
    
    public function pick_bank_client_info(){
      
       $Client_Name=$this->input->post('Client_Name');   
       $result = $this->mrk_model->pick_bank_client_info_model($Client_Name);
       echo json_encode($result);
        
    }
    
    public function edit_contact_info(){
      
       $p_key=$this->input->post('p_key');   
       $result = $this->mrk_model->pick_bank_contact_info_model($p_key);
       echo json_encode($result);
        
    }
    
    public function pick_bank_client_address(){
      
       $Client_Name=$this->input->post('Client_Name');  
       $office_type=$this->input->post('office_type'); 
       $result = $this->mrk_model->pick_bank_client_address_model($Client_Name,$office_type);
       echo json_encode($result);
        
    }
    
    public function update_bank_client_info(){
        $data = array(); 
        $new_start_date = date("Y-m-d");
        $data['date']=$new_start_date; 
        $data['Client_Name']=$this->input->post('Client_Name');
        $data['Client_Name']=$this->input->post('Client_Name');
        $p_key=$this->input->post('p_key');
        $Client_ID=$this->input->post('Client_ID');
//        $data['Contact_Name']=$this->input->post('Contact_Name');
//        $data['designation']=$this->input->post('designation');
//        $data['phone']=$this->input->post('phone');
//        $data['email']=$this->input->post('email');
        $data['house_name']=$this->input->post('house_name');
        $data['house_no']=$this->input->post('house_no');
        $data['road_no']=$this->input->post('road_no');
        $data['word']=$this->input->post('word');
        $data['thana']=$this->input->post('thana');
        $data['post_code']=$this->input->post('post_code');
        $data['district']=$this->input->post('district');
        $this->mrk_model->update_bank_client_model($p_key,$data);
        
        echo json_encode('update Done');
    }
    
    function update_bank_contact_info(){
        $data = array(); 
        $data['contact_name']=$this->input->post('e_contact_name');
        $data['designation']=$this->input->post('e_designation');
        $data['email']=$this->input->post('e_email');
        $data['phone']=$this->input->post('e_phone');
        $p_key=$this->input->post('p_key');
        $this->mrk_model->update_bank_contact_model($p_key,$data); 
        
        echo json_encode('update Contact Done');
    }


    
     public function pick_bank_name(){
      
       $Client_Category=$this->input->post('Client_Category');  
       $result = $this->mrk_model->pick_bank_model($Client_Category);
       echo json_encode($result);
        
    }
    
    public function pick_bank_info(){
        
       $Client_Name=$this->input->post('Client_Name'); 
       $ofc_type=$this->input->post('ofc_type'); 
       $designation=$this->input->post('designation'); 
       $result = $this->mrk_model->pick_bank_info_model($Client_Name,$ofc_type,$designation);
       echo json_encode($result);  
    }

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   
// ...........................................   KAM   .....................................................................................
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
    public function kam_task(){
        
        $data = array();
        $data['result'] = $this->mrk_model->kam_assign_category();
        $data['maincontent'] = $this->load->view('kam_task_from', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    
    public function kam_termination(){
        $data = array();
        $data['result'] = $this->mrk_model->kam_termination_category();
        $data['maincontent'] = $this->load->view('kam_termination_from', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    
    public function kam_task_lst(){
        
        
        $data = array();
        $data['result'] = $this->mrk_model->kam_category();
        $department = $this->session->userdata('department');
        
        //......................................................................................................
/////////////////////////////////////////////////////////////////////////////////////////////////

            $Date = $this->input->post('date_from');
            $date_from = date("Y-m-d", strtotime($Date));
            $date1 = $date_from;

            $Date2 = $this->input->post('date_to');
            $date_to = date("Y-m-d", strtotime($Date2));
            $date2 = $date_to;
            
            $date_array = array(
                'date1' => $date1,
                'date2' => $date2
            );
///////////////////////////////////////////////////////////////////////////////////////////////    

            $type_task = $this->input->post('type_task'); 
            $_SESSION["status"] = $type_task;
            
            $e_id = $this->input->post('e_id'); 
            $_SESSION["e_id"] = $e_id;
        
 if( $e_id != '0' && $type_task != '0'){
       $config["base_url"] = base_url() . "index.php/corporate_c/kam_task_lst/";
        $nmuber = $this->mrk_model->kam_task_count_date_id_status($date_array,$e_id,$type_task);
        $i=0;
        foreach ($nmuber as $value) { $i++; }
//        echo 'i......'.$i;
        $config["total_rows"] = $i;
        $config["per_page"] = 1000;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["follow_up_list"] = $this->mrk_model->
                kam_task_list_date_id_task($config["per_page"], $page,$date_array,$e_id,$type_task);
        
        $data["links"] = $this->pagination->create_links();    
 }elseif ( $e_id != '0' && $type_task == '0') {
     
//  .......................  pagination  .......................................................... 
        $config["base_url"] = base_url() . "index.php/corporate_c/kam_task_lst/";
        $nmuber = $this->mrk_model->kam_task_count_date_id($date_array,$e_id);
        $i=0;
        foreach ($nmuber as $value) { $i++; }
//        echo 'i......'.$i;
        $config["total_rows"] = $i;
        $config["per_page"] = 1000;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["follow_up_list"] = $this->mrk_model->
                kam_task_list_date_id($config["per_page"], $page,$date_array,$e_id);
        
        $data["links"] = $this->pagination->create_links(); 
//      ...............................................................................................           
 }elseif ( $e_id == '0' && $type_task != '0') {
     
//  .......................  pagination  .......................................................... 
        $config["base_url"] = base_url() . "index.php/corporate_c/kam_task_lst/";
        $nmuber = $this->mrk_model->kam_task_count_date_task($date_array,$type_task);
        $i=0;
        foreach ($nmuber as $value) { $i++; }
//        echo 'i......'.$i;
        $config["total_rows"] = $i;
        $config["per_page"] = 1000;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["follow_up_list"] = $this->mrk_model->
                kam_task_list_date_task($config["per_page"], $page,$date_array,$type_task);
        
        $data["links"] = $this->pagination->create_links(); 
//      ...............................................................................................          
 }elseif ( $e_id == '0' && $type_task == '0') {
//  .......................  pagination  .......................................................... 
        $config["base_url"] = base_url() . "index.php/corporate_c/kam_task_lst/";
        $nmuber = $this->mrk_model->kam_task_count_date($date_array);
        $i=0;
        foreach ($nmuber as $value) { $i++; }
//        echo 'i......'.$i;
        $config["total_rows"] = $i;
        $config["per_page"] = 1000;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["follow_up_list"] = $this->mrk_model->
                kam_task_list_date($config["per_page"], $page,$date_array);
        
        $data["links"] = $this->pagination->create_links(); 
//      ...............................................................................................      
 }    
        $data['maincontent'] = $this->load->view('KAM_task_list', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
         
    public function kam_termination_lst(){
      
$data = array();       

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

       
        $data['done_list_result'] = $this->mrk_model->kam_termination_model($date_array); 
     
        $data['maincontent'] = $this->load->view('KAM_termination_list', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    
    public function save_termination_info(){
        
        $id = $this->session->userdata('id');
        $data = array();
        $data['crt_id'] = $id;
        $data['employee_name'] = $this->input->post('employee_name');
        $data['employee_id'] = $this->input->post('employee_id');
        $data['reference'] = $this->input->post('reference');
        $data['Client_id'] = $this->input->post('Client_id');
        $data['Client_Name'] = $this->input->post('Client_Name');
        $data['mrc'] = $this->input->post('mrc');
        $data['Details'] = $this->input->post('Details');
        $data['reason'] = $this->input->post('reason');
        $data['mkt_person'] = $this->input->post('mkt_person');
        $date = $this->input->post('start_date_id');
        $date_1 = date("Y-m-d", strtotime($date));
        $data['date'] = $date_1;
        $result = $this->mrk_model->save_termination_info_model($data);
        
    }
    
    public function save_kam_task_info_(){
//.................................Create P_KEY....................................................        
        $id = $this->session->userdata('id');
        $tdata = array();
        $tdata['create_id'] = $id;            
        $this->mrk_model->coprprate_ticket_info_model($tdata);
        $ticket_data = array();
        $ticket_data['result_ticket_id'] = $this->mrk_model->find_ticket_Id($id);

//        ..............................................................................
        $data = array();
        $data['crt_id'] = $id;
        $data['p_key']=$ticket_data['result_ticket_id']->p_key;
        $data['tki_id'] = $this->input->post('tki_id');
        $data['Client_ID'] = $this->input->post('Client_ID');
        $data['Client_Name'] = $this->input->post('Client_Name');
        $data['type_task'] = $this->input->post('type_task');
        $data['sub_task'] = $this->input->post('sub_task');
        $data['phone'] = $this->input->post('phone');
        $data['email'] = $this->input->post('email');
        $date = $this->input->post('s_date');
        $date_1 = date("Y-m-d H:i:s", strtotime($date));
        $data['date'] = $date_1;
        $data['e_name'] = $this->input->post('e_name');
        $data['e_id'] = $this->input->post('e_id');
        $data['status'] = $this->input->post('status');
        $data['remarks'] = $this->input->post('remarks');
        $result = $this->mrk_model->save_kam_task_model($data);
//    .............................Follow up....................................................
       $follow_up_data=array();
       $follow_up_data['crt_id'] = $id;
       $follow_up_data['p_key']= $ticket_data['result_ticket_id']->p_key;
       $follow_up_data['remarks'] = $this->input->post('remarks');  
       $follow_up_data['status'] = $this->input->post('status'); 
       $this->mrk_model->kam_follow_up_task($follow_up_data);
        
        
    }
    public function kam_db(){
        $data = array();

        $data['monthly_task_Details'] = $this->mrk_model->corporate_task_Details_monthly();
        $data['sales_Details'] = $this->mrk_model->corporate_sales_Details_monthly();
        $data['sales_year'] = $this->mrk_model->corporate_sales_Details_year();
        $data['daily_task_Details'] = $this->mrk_model->kam_task_daily();
        $data['task_Details'] = $this->mrk_model->kam_task_montly();
        $data['lead_task'] = $this->mrk_model->kam_lead_montly();
        $data['maincontent'] = $this->load->view('kam_db', $data, true);

        $this->load->view('home', $data);  
        
    }
    
     public function kam_leads_task_monthly($e_id){
        
        $data = array();
        $data['result'] = $this->mrk_model->kam_category();
// echo $e_id.'......';
//      .......................  pagination  ...................................................................  
        $config["base_url"] = base_url() . "index.php/corporate_c/kam_leads_task_monthly/";
        $nmuber = $this->mrk_model->kam_count_monthly_leads_task($e_id);
        $i=0;
        foreach ($nmuber as $value) {
         $i++;  
        }
//        echo 'i......'.$i;        
        $config["total_rows"] = $i;
        $config["per_page"] = 100;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["follow_up_list"] = $this->mrk_model->
                kam_lead_task_monthly_details($config["per_page"], $page,$e_id);
        
        $data["links"] = $this->pagination->create_links(); 
//      ...............................................................................................
        $data['maincontent'] = $this->load->view('KAM_task_list', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    }
    

}

?>