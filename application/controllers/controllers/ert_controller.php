<?php

class Ert_controller extends CI_Controller {
    
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
    

        public function ert_assin_task(){
        
//            echo 'TEST'; 
            
        $data = array();
        $data['result'] = $this->ert_model->ert_assign_task_page_category();
        $data['maincontent'] = $this->load->view('ert_assin_task', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
        
    } 
    
    
     public function save_task_info_funcation(){
            
           $id = $this->session->userdata('id');
    
//            $tdata = array();
//            $tdata['create_date'] = date("Y-m-d");
//            $tdata['create_id'] = $id;            
//            $this->registration_model->save_ticket_info_model($tdata);
//            $ticket_data = array();
//            $ticket_data['result_ticket_id'] = $this->registration_model->find_ticket_Id($id);
//          $ticket_data['result_ticket_id']->ticket_id,
//          ticket_no
            $data=array();           
            $data['create_id']=$id;          
//            $data['ticket_no']=$ticket_data['result_ticket_id']->ticket_id;
            
            $data['Client_id']=$this->input->post('Client_id');
            $data['Client_Name']=$this->input->post('Client_Name');
            $data['Client_Address']=$this->input->post('Client_Address');
            $data['Client_Contact']=$this->input->post('Client_Contact');   
            $data['Client_Category']=$this->input->post('Client_Category'); 
            $data['Zone']=$this->input->post('Zone');
            $data['Sub_Zone']=$this->input->post('Sub_Zone');
            $data['CTID_SR']=$this->input->post('CTID_SR');  
            $data['type_task']=$this->input->post('type_task');
            $data['assign_by']=$this->input->post('assign_by');
            $data['employee_name']=$this->input->post('Engineer_Name');
            $data['employee_id']=$this->input->post('Engineer_ID');
            $data['Technician_Name']=$this->input->post('Technician_Name');
            
            $Date = $this->input->post('s_date');
            $new_start_date = date("Y-m-d h:i:s", strtotime($Date));
            $data['s_date']=$new_start_date; 

            
//            $Date1 = $this->input->post('e_date');
//            $new_end_Date = date("Y-m-d h:i:s", strtotime($Date1));
//            $data['e_date']= $new_end_Date;
            
            $data['Status']=$this->input->post('status');
//            $c_data['comments']=$this->input->post('comments');

            $result=$this->ert_model->save_task_info_model($data);  
                    
            echo '<pre>';
            print_r($result);
            echo '</pre>';
            
            
//            $c_data['id']=$id;
//            $c_data['ticket_no']=$ticket_data['result_ticket_id']->ticket_id;
//            $c_data['comments_date']=date("Y-m-d");
//            $c_data['comments']=$this->input->post('comments');
//            $this->registration_model->save_comments_model($c_data); 
            
//            $sdata=array();
//            $sdata['message']='Save Task successfully';
//            $this->session->set_userdata($sdata);
//            redirect("index.php/ert_controller/ert_assin_task");
       
    }
    
      
    public function pick_engineer_id(){
      
       $Engineer_Name=$this->input->post('Engineer_Name');   
       $result = $this->registration_model->pick_Engineer_ID_model($Engineer_Name);
       echo json_encode($result);
        
    }
    
    public function ert_pending_task(){
        
        $data = array();
//        $data['result'] = $this->ert_model->ert_assign_task_page_category();
        
        $data['pending_task_result'] = $this->ert_model->ERT_pick_pending_task();
        $data['maincontent'] = $this->load->view('ert_pending_list', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    
    public function ert_done_task(){
        
        $data = array();
//        $data['result'] = $this->ert_model->ert_assign_task_page_category();
        
        $data['done_task_result'] = $this->ert_model->CS_pick_done_task();
        $data['maincontent'] = $this->load->view('ert_done_list', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    
    public function ERT_new_comments($p_key){
     
        $data = array();
        $data['pick_comments'] = $this->ert_model->ERT_view_comments_model($p_key);      
        $data['result'] = $this->ert_model->ERT_pick_status_catogry($p_key); 
//        $data['pick_p_key'] = $this->ert_model->CS_pick_pending_task($p_key); 
        $data['maincontent'] = $this->load->view('ert_update_task', $data, true);
//        $data['title'] = 'View Course';
        $this->load->view('home', $data);
    }
    public function ERT_update_commments(){
        
    }

        public function ERT_pending_task_by_id(){
        
    }
     public function ERT_pending_task_by_sub_zone(){
        
    }
}

?>