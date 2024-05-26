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
//        $plain_password = $this->input->post('password', true);
//        $password=md5($plain_password);
        
        $password=$this->input->post('password', true);
        $result = $this->registration_model->check_login_model($id, $password);
//            echo"<pre>";
//             print_r($result);
//             echo"</pre>";
        $sdata = array();
        if ($result == TRUE) {
            $sdata['user_id'] = $result->user_id;
            $sdata['id'] = $result->id;
            $sdata['name'] = $result->name;
            $sdata['department'] = $result->department;
            $sdata['Zone'] = $result->Zone;
            //  $sdata['message'] = 'user entry successfully!';
            $this->session->set_userdata($sdata);
            redirect('index.php/welcome/Dashboard_funcation');
        } else {
//            echo"<pre>";
//             print_r($email);
//             print_r($password);
//             print_r($id);
//             echo"</pre>";
            $sdata['message'] = 'Invlite your User Id or password!';
            $this->session->set_userdata($sdata);
            redirect('index.php/admin/index');
        }
    }
    
     public function registration(){  
            $this->load->view('registration_page');
    }
     public function save_user(){
            $data=array();
            $data['id']=$this->input->post('id');   
            $data['name']=$this->input->post('name'); 
            $data['email']=$this->input->post('email');  
//            $plain_password=$this->input->post('password');
//            $data['pass_word']=md5($plain_password); 
            $data['pass_word']=$this->input->post('password');
            $data['Designation']=$this->input->post('Designation'); 
            $data['department']=$this->input->post('department');
            $data['Zone']=$this->input->post('Zone');

            $this->load->model('registration_model');
            $this->registration_model->save_user_info($data);    
            
//            $return_message='Successfully Registration Done';
//             echo json_encode($return_message);
             
//            $_SESSION["email"] = $email;
//            $_SESSION["password"] = $password;
//            $_SESSION["id"] = $id;
            
            $sdata=array();
            $sdata['message']='Successfully Registration Done';
            $this->session->set_userdata($sdata);
            redirect('index.php/admin/registration');
       
    }

}
