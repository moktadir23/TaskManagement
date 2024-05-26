<?php

class Email_c extends CI_Controller {

    public $data=array();
    public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->library("pagination");
        $this->load->model('ert_model');
        $this->load->library('table');
        $this->load->library('session');

        $user_id = $this->session->userdata('user_id');
        $id = $this->session->userdata('id');

        
        
//.............................................................................................................        

                //parent::Controller();
//                 parent::__construct(); for CI 2.x users
 
        $this->load->helper('ckeditor');
//Ckeditor's configuration
        $this->data['ckeditor'] = array(
            //ID of the textarea that will be replaced
            'id' => 'content',
            'path' => 'js/ckeditor',
            //Optionnal values
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "650px", //Setting a custom width
                'height' => '200px', //Setting a custom height
            ),
            //Replacing styles from the "Styles tool"
            'styles' => array(
                //Creating a new style named "style 1"
                'style 1' => array(
                    'name' => 'Blue Title',
                    'element' => 'h2',
                    'styles' => array(
                        'color' => 'Blue',
                        'font-weight' => 'bold'
                    )
                ),
                //Creating a new style named "style 2"
                'style 2' => array(
                    'name' => 'Red Title',
                    'element' => 'h2',
                    'styles' => array(
                        'color' => 'Red',
                        'font-weight' => 'bold',
                        'text-decoration' => 'underline'
                    )
                )
            )
        );

        $this->data['ckeditor_2'] = array(
            //ID of the textarea that will be replaced
            'id' => 'content_2',
            'path' => 'js/ckeditor',
            //Optionnal values
            'config' => array(
                'width' => "650px", //Setting a custom width
                'height' => '200px', //Setting a custom height
                'toolbar' => array(//Setting a custom toolbar
                    array('Bold', 'Italic'),
                    array('Underline', 'Strike', 'FontSize'),
                    array('Smiley'),
                    '/'
                )
            ),
            //Replacing styles from the "Styles tool"
            'styles' => array(
                //Creating a new style named "style 1"
                'style 3' => array(
                    'name' => 'Green Title',
                    'element' => 'h3',
                    'styles' => array(
                        'color' => 'Green',
                        'font-weight' => 'bold'
                    )
                )
            )
        );
//...............................................................................................................   

        
        if ($user_id == NULL) {
            redirect('index.php/admin', 'refresh');
        }
        
       
    }
    
    
    
    
    public function email_page(){
        $data = array();
//        .........................................................................................
       $this->load->library('ckeditor');
//$this->load->library('ckfinder');


//Add Ckfinder to Ckeditor
//$this->ckfinder->SetupCKEditor($this->ckeditor,'../../asset/ckfinder/');        
//        ........................................................................................
//        $data['result'] = $this->ert_model->sd_assign_task_page_category();
        $data['maincontent'] = $this->load->view('email', '', true);
//        $data['title'] = 'View Course';
        $this->load->view('home_2', $data);
    }

}

?>