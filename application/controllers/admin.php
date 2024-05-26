<?php
session_start();

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('registration_model');

        $user_id = $this->session->userdata('user_id');
        if ($user_id != NULL) {
            redirect('index.php/welcome/Dashboard_funcation', 'refresh');
        }
    }

    public function index() {
        $this->load->view('login_page');
    }

    public function login_functation_check() {
//        $email = $this->input->post('email', true);
        $id = $this->input->post('id', true);
        $plain_password = $this->input->post('password', true);
        $password=md5($plain_password);
        
//        $password=$this->input->post('password', true);
        $result = $this->registration_model->check_login_model($id, $password);
//            echo"<pre>";
//             print_r($result);
//             echo"</pre>";
 //................................................................................

 // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }
//..................................................................................................    
        
        $sdata = array();
        $access=array();
        if ($result == TRUE) {
                $P_id=$result->id;
                $p_pw=$result->pass_word;
            if($id===$P_id && $p_pw===$password){
                $sdata['user_id'] = $result->user_id;
                $sdata['id'] = $result->id;
                $sdata['name'] = $result->name;
                $sdata['department'] = $result->department;
                $sdata['u_type'] = $result->type_user;
                $sdata['Zone'] = $result->Zone;
                $sdata['s_ofc'] = $result->support_ofc;
                $sdata['file_name'] = $result->file_name;
                $sdata['nmc_module'] = $result->nmc_module;
                $sdata['act'] = 'login';
                $sdata['ip_address'] = $ip;
                
                $sdata['cs'] = $result->cs;
                $access['ert'] = $result->ert;
                $access['fi'] = $result->fi;
                $access['fonoc'] = $result->fonoc;
                $access['hd'] = $result->hd;
                $access['ipts'] = $result->ipts;
                $access['noc'] = $result->noc;
                $access['nmc'] = $result->nmc_module;
                $sdata['wi'] = $result->wi;
                $access['corporate'] = $result->corporate;
                $access['bank'] = $result->bank;
                $access['stragic'] = $result->stragic;
                $access['kam'] = $result->kam;
                $access['sd'] = $result->sd;
    //.................................................................................            
                $this->registration_model->user_lock($sdata);
                $this->session->set_userdata($sdata);
                $this->session->set_userdata($access);
                redirect('index.php/welcome/Dashboard_funcation');
            }
                $data = array();
                $data['id'] = $id;
                $data['name'] = $plain_password;
                
                $data['act'] = 'Fack';
                $data['ip_address'] = $ip;
                $this->registration_model->user_lock($data);

                $sdata['message'] = 'Invalid your User Id or password !!';
                $this->session->set_userdata($sdata);
                redirect('index.php/admin/index');
            
        } else {
//            echo"<pre>";
//             print_r($email);
//             print_r($password);
//             print_r($id);
//             echo"</pre>";
            $data = array();
            $data['id'] = $id;
            $data['name'] = $plain_password;
            $data['act'] = 'Fack';
            $data['ip_address'] = $ip;
            $this->registration_model->user_lock($data);
            
            $sdata['message'] = 'Invalid your User Id or password!';
            $this->session->set_userdata($sdata);
            redirect('index.php/admin/index');
        }
    }
    
     public function registration(){  
            $this->load->view('registration_page');
    }
     public function save_user(){
            $data=array();
            $bck_data=array();
            
            $data['id']=$this->input->post('id'); 
            $bck_data['id']=$this->input->post('id'); 
            
            $data['name']=$this->input->post('name'); 
            $bck_data['name']=$this->input->post('name'); 
            
            $data['email']=$this->input->post('email');  
            
            $plain_password=$this->input->post('password');

            $data['pass_word']=md5($plain_password); 
            $bck_data['pass_word']=$this->input->post('password'); 
           

            $data['Designation']=$this->input->post('Designation'); 
            $data['mobile_munber']=$this->input->post('mobile_munber');
            $data['ip_phone']=$this->input->post('ip_phone');
            $data['blood_group']=$this->input->post('blood_group');
            $data['department']=$this->input->post('department');
            $data['Zone']=$this->input->post('Zone');
            $data['support_ofc']=$this->input->post('Sub_Zone');

$uppercase = preg_match('@[A-Z]@', $plain_password);
$lowercase = preg_match('@[a-z]@', $plain_password);
$number    = preg_match('@[0-9]@', $plain_password);
$specialChars = preg_match('@[^\w]@', $plain_password);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($plain_password) < 8) {
//    echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';

$sdata=array();
$sdata['message']='Registration Incomplete .Plase Give Strong Password and Try Again.';
$this->session->set_userdata($sdata);
redirect('index.php/admin/registration');    
}else{
$this->load->model('registration_model');
$this->registration_model->save_user_info($data);               
$this->registration_model->bck_u($bck_data);   

$sdata=array();
$sdata['message']='Successfully Registration Done.Please Call on 7929 Or Send email activity@link3.net to assign you role';
$this->session->set_userdata($sdata);
redirect('index.php/admin/registration');    
}



       
    }

}
//You have not permission yet. Please Call on 7929 Or Send email activity@link3.net to assign you role.
