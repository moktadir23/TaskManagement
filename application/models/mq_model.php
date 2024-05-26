<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mq_Model extends CI_Controller {

    function __construct() {
        parent::__construct();
        //load our second db and put in $db2
        $this->db3 = $this->load->database('mqdb', TRUE);
    }
    
//     public function HD_pick_info() {
//        $query = $this->db2->query("select * from mok_test_tbl");
//        return $query->result_array();
//    }
    
    public function pick_olt_m($bts){
       
     $query=$this->db3->query("select OLT_Name from cre_olt where BTS_Name='$bts' Order by OLT_Name ");
//     return $query->row();
     return $query->result_array();
    }

}
