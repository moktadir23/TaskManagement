<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Link3 Activity</title>
        <!--................ Auto Search .......................-->
        <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui.css">   <!--....... auto search CSS..... -->
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>css/sb-admin.css" rel="stylesheet">
        <!-- Morris Charts CSS -->
        <link href="<?php echo base_url(); ?>css/plugins/morris.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link href="<?php echo base_url(); ?>css/datepicker.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo base_url(); ?>css/select_from_css.css" rel="stylesheet" type="text/css"/>

        <!--..............................Calender File......................-->
                <!--<script src="<?php echo base_url(); ?>js/jquery-ui.js"></script> ....... auto search JS..... -->
        <script src="<?php echo base_url(); ?>js/jquery-1.9.1.js" type="text/javascript"></script>

        <link href="<?php echo base_url(); ?>css/calendar-win2k-1.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo base_url(); ?>js/calendar_min_06Feb2015.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/calendar-en.js" type="text/javascript"></script>

        <script type="text/javascript">
            function check_delete()
            {
                var check = confirm("Are You Sure to Delete This Record ! ");

                if (check)
                {
                    return true;
                } else
                {
                    return false;
                }
            }
        </script>
        <script type="text/javascript">
            function check_transfer()
            {
                var check = confirm("Are You Sure to Transfer This Task to Other Person !! ");

                if (check)
                {
                    return true;
                } else
                {
                    return false;
                }
            }
        </script>
        
        <script type="text/javascript">
            function check_save_info()
            {
                var check = confirm("Are You Sure to Save This Task  !! ");

                if (check)
                {
                    return true;
                } else
                {
                    return false;
                }
            }
        </script>
   <script type="text/javascript">
            function check_remove_user()
            {
                var check = confirm("Are You Sure to Remove This User !! ");

                if (check)
                {
                    return 1;
                } else
                {
                    return 0;
                }
            }
        </script>
        <style>
body {
  font-family: "Lato", sans-serif;
}

.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #111;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color: #444;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
</style>
    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                     <button class="openbtn" onclick="openNav()">Toggle Sidebar</button> 
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">Close</a>
                    <a class="navbar-brand" href="#">Link3 Technologies Ltd</a>
                </div>
                <!-- Top Menu Items -->

            <ul class="nav navbar-right top-nav">
                <li><a href="#" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Stats">
                    </a>
                </li>            
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Welcome <?php $name = $this->session->userdata('name'); ?>
                      
                          <!--<img src="<?php echo base_url(); ?>css/upload_file/default.jpg" alt="" width="20" height="20"><br>-->
                    <b style="color: #0073e6; "><?php echo "$name"; ?></b>  
                    <b class="fa fa-angle-down"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url(); ?>index.php/nmc_c/profile"><i class="fa fa-file-text"></i> Profile </a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/welcome/change_password_funcation.html"><i class="fa fa-key"></i> Change Password</a></li>
                        <li class="divider"></li>
                         <li>
                                <a href="<?php echo base_url(); ?>index.php/welcome/user_list"><i class="fa fa-user"></i> User List </a>
                        </li>
                        <li>
                                <a href="<?php echo base_url(); ?>index.php/nmc_c/crtfition_list"><i class="fa fa-file-text"></i>  Certifications List</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url(); ?>index.php/welcome/logout.html"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav" id="mySidebar">
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/welcome/Dashboard_funcation.html"><i class="fa fa-dashboard"></i>  Dashboard </a>
                        </li>
                        <?php
                        $department = $this->session->userdata('department');
                        if ($department == 'Admin') {
                            ?>
                            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#CSPages" data-parent="#exampleAccordion">
                                    CS &nbsp;&nbsp; <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="sidenav-second-level collapse" id="CSPages">
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/welcome/CS_DB.html"><i class="fa fa-fw fa-columns"></i>  CS Task Summery</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/welcome/cs_assign.html"><i class="fa fa-fw fa-edit"></i>  CS Assign Task </a>

                                    </li>
<!--                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/welcome/CS_pending_list.html"><i class="fa fa-exclamation"></i>  CS Pending Task List </a>

                                    </li>-->
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/welcome/CS_done_list.html"><i class="fa fa-file-text"></i> CS Done Task List</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/welcome/CS_faulty_device_list.html"><i class="fa fa-file-text"></i>Device Faulty/Changed List</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#ERTPages" data-parent="#exampleAccordion">
                                    ERT &nbsp;&nbsp; <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="sidenav-second-level collapse" id="ERTPages">
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/welcome/ert_db.html"><i class="fa fa-fw fa-columns"></i>   ERT Task Summery</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/ert_controller/ert_assin_task"><i class="fa fa-fw fa-edit"></i> New/Assign Task</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/ert_controller/ert_pending_task"><i class="fa fa-exclamation-circle"></i> Pending Task List</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/ert_controller/ert_done_task"><i class="fa fa-check"></i> Done Task List</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#FIPages" data-parent="#exampleAccordion">
                                    FI &nbsp;&nbsp; <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="sidenav-second-level collapse" id="FIPages">
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/welcome/fi_db.html"><i class="fa fa-fw fa-columns"></i>   FI Task Summery</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/fi_controller/assign_task"><i class="fa fa-fw fa-edit"></i> New/Assign Task</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/fi_controller/fi_pending_task"><i class="fa fa-check"></i>Pending Task</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/fi_controller/fi_done_task"><i class="fa fa-check"></i>Done Task</a>
                                    </li>
                                </ul>
                            </li>
                             <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#FONOCPages" data-parent="#exampleAccordion">
                                    FONOC &nbsp;&nbsp; <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="sidenav-second-level collapse" id="FONOCPages">
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/welcome/fonoc_db.html"><i class="fa fa-fw fa-columns"></i>  FONOC Task Summery</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/link3_controller/fonoc_assin_task.html"><i class="fa fa-fw fa-edit"></i> New/Assign Task</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/link3_controller/fonoc_all_pending_list_funcation"><i class="fa fa-exclamation-circle"></i> Summary of Pending Task</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/link3_controller/fonoc_all_done_list_funcation"><i class="fa fa-check"></i> Done Task List</a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#HDPages" data-parent="#exampleAccordion">
                                    HD &nbsp;&nbsp; <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="sidenav-second-level collapse" id="HDPages">
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/welcome/hd_db.html"><i class="fa fa-fw fa-columns"></i>  HD Task Summery</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/hd_assin_task"><i class="fa fa-fw fa-edit"></i> KRA </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/hd_Rating"><i class="fa fa-file"></i> KRA Report</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/Agent_Performance_Report"><i class="fa fa-file"></i> Agent Performance Report</a>
                                    </li>
                                     <li>
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/Drop_Call_Report"><i class="fa fa-file"></i> Drop Call Report</a>
                                    </li>
                                     <li>
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/Problem_Category_Report"><i class="fa fa-file"></i> Problem Category Report</a>
                                    </li>
                                     <li>
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/Call_Center_Performance_Report"><i class="fa fa-file"></i> Call Center Performance Report</a>
                                    </li>
                                    
                                    
                                    
        <!--............................................................................................................................-->                            
                                     <li>
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/NMC_Outbound"><i class="fa fa-fw fa-edit"></i> NMC & Outbound From</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/pending_NMC_Outbound"><i class="fa fa-exclamation-circle"></i> Pending NMC & Outbound List</a>
                                    </li>
                                     <li>
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/Send_Mail"><i class="fa fa-fw fa-edit"></i> Send Mail Report </a>
                                    </li>
                                     <li>
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/ACD_Agent"><i class="fa fa-fw fa-edit"></i> ACD Agent Information From</a>
                                    </li>
                                     <li>
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/PON_SMS"><i class="fa fa-fw fa-edit"></i> PON SMS Information From </a>
                                    </li>
                                     <li>
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/Bulk"><i class="fa fa-fw fa-edit"></i> Bulk SMS From</a>
                                    </li>
                                     <li>
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/Traceless"><i class="fa fa-fw fa-edit"></i> Traceless SMS From</a>
                                    </li>
                                     <li>
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/Selfcare"><i class="fa fa-fw fa-edit"></i> Selfcare From</a>
                                    </li>
            <!--...................................................................................................................................-->                        
                                </ul>
                            </li>
                            
                            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#IPTSPages" data-parent="#exampleAccordion">
                                    IPTS &nbsp;&nbsp; <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="sidenav-second-level collapse" id="IPTSPages">
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/welcome/ipts_db.html"><i class="fa fa-fw fa-columns"></i>  IPTS Task Summery</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/ipts_controller/assign_task"><i class="fa fa-fw fa-edit"></i> New/Assign Task</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/ipts_controller/ipts_pending_list"><i class="fa fa-exclamation-circle"></i> Pending Task</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/ipts_controller/ipts_done_task_list"><i class="fa fa-check"></i> Done Task</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#NOCPages" data-parent="#exampleAccordion">
                                    NOC &nbsp;&nbsp; <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="sidenav-second-level collapse" id="NOCPages">
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/welcome/noc_db.html"><i class="fa fa-fw fa-columns"></i>  NOC Task Summery</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/welcome/assin_task_funcation.html"><i class="fa fa-fw fa-edit"></i> New/Assign Task</a>
                                    </li>
<!--                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/welcome/summary_of_task_funcation.html"><i class="fa fa-exclamation-circle"></i> Summary of Pending Task</a>
                                    </li>

                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/welcome/summary_done_task_by_employee_funcation.html"><i class="fa fa-check"></i> Summary of Done Task</a>
                                    </li>-->    
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/welcome/all_pending_list_funcation.html"><i class="fa fa-exclamation-circle"></i> Pending Task List</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/welcome/all_done_list_funcation.html"><i class="fa fa-check"></i> Done Task List</a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#NMCPages" data-parent="#exampleAccordion">
                                    NMC &nbsp;&nbsp; <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="sidenav-second-level collapse" id="NMCPages">
                                    <li>
                                       <a href="<?php echo base_url(); ?>index.php/nmc_c/nmc_add_category_from"><i class="fa fa-fw fa-edit"></i>NMC ADD Category</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/nmc_c/nmc_assin_task"><i class="fa fa-fw fa-edit"></i> New/Assign Task</a>
                                    </li>
                                    <li>
                                       <a href="<?php echo base_url(); ?>index.php/nmc_c/bw_utilization_from"><i class="fa fa-fw fa-edit"></i>Bandwidth and Latency From</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/nmc_c/pending_list"><i class="fa fa-exclamation-circle"></i> Pending Task List</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/nmc_c/done_list"><i class="fa fa-check"></i> Done Task List</a>
                                    </li>
                                </ul>
                            </li>
                             <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#SDPages" data-parent="#exampleAccordion">
                                    SD &nbsp;&nbsp; <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="sidenav-second-level collapse" id="SDPages">
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/welcome/sd_db.html"><i class="fa fa-fw fa-columns"></i>  SD Task Summery</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/sd_controller/assign_task"><i class="fa fa-fw fa-edit"></i> New/Assign Task</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/sd_controller/sd_pending_task"><i class="fa fa-check"></i>Pending Task</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/sd_controller/sd_done_task"><i class="fa fa-check"></i>Done Task</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#wireless" data-parent="#exampleAccordion">
                                    Wireless INFRA &nbsp;&nbsp; <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="sidenav-second-level collapse" id="wireless">
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/welcome/wi_db.html"><i class="fa fa-fw fa-columns"></i>  WI Task Summery</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/wi_controller/assign_task"><i class="fa fa-fw fa-edit"></i> New/Assign Task</a>
                                    </li>   
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/wi_controller/wi_pending_task"><i class="fa fa-exclamation-circle"></i> Pending Task List</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/wi_controller/wi_done_task"><i class="fa fa-check"></i> Done Task List</a>
                                    </li>
                                </ul>
                            </li>

                        <?php } ?>
                        <?php
                        $department = $this->session->userdata('department');
                        if ($department == 'NOC' || $department == 'VPN' || $department == "NOC_Admin" ) {
//                            echo $p_info_session = $this->session->userdata('p_info_session');
//                             if($p_info_session=='allow'){
                            ?>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/welcome/assin_task_funcation.html"><i class="fa fa-fw fa-edit"></i>NOC New/Assign Task</a>
                            </li>
<!--                            <li>
                                <a href="<?php echo base_url(); ?>index.php/welcome/summary_of_task_funcation.html"><i class="fa fa-exclamation-circle"></i> Summary of Pending Task</a>
                            </li>

                            <li>
                                <a href="<?php echo base_url(); ?>index.php/welcome/summary_done_task_by_employee_funcation.html"><i class="fa fa-check"></i> Summary of Done Task</a>
                            </li>-->
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/welcome/all_pending_list_funcation.html"><i class="fa fa-exclamation-circle"></i>NOC Pending Task List</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/welcome/all_done_list_funcation.html"><i class="fa fa-check"></i>NOC Done Task List</a>
                            </li>
                        <?php }
//                        }
                        ?>
                          <?php
                        $department = $this->session->userdata('department');
                        $user_type = $this->session->userdata('u_type');
                        if ($department == 'NMC') {
                            ?>
                         <?php if($user_type=='a_user') { ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/nmc_c/nmc_add_category_from"><i class="fa fa-fw fa-edit"></i>NMC ADD Category</a>
                                </li>
                            
                         <?php }?>   
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/nmc_c/nmc_assin_task"><i class="fa fa-fw fa-edit"></i> New/Assign Task</a>
                                </li>
                                <li>
                                   <a href="<?php echo base_url(); ?>index.php/nmc_c/bw_utilization_from"><i class="fa fa-fw fa-edit"></i>Bandwidth and Latency  From</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/nmc_c/pending_list"><i class="fa fa-exclamation-circle"></i> Pending Task List</a>
                                </li>
                                
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/nmc_c/done_list"><i class="fa fa-check"></i> Done Task List</a>
                                </li>
                        <?php } ?>  
                                 <?php
                        $department = $this->session->userdata('department');
                        if ($department == 'NOC_Admin') {
                            ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/nmc_c/nmc_add_category_from"><i class="fa fa-fw fa-edit"></i>NMC ADD Category</a>
                                </li>
                                <li>
                                   <a href="<?php echo base_url(); ?>index.php/nmc_c/bw_utilization_from"><i class="fa fa-fw fa-edit"></i>Bandwidth and Latency  From</a>
                                </li>
                                  <li>
                                    <a href="<?php echo base_url(); ?>index.php/nmc_c/nmc_assin_task"><i class="fa fa-fw fa-edit"></i>NMC New/Assign Task</a>
                                </li>

                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/nmc_c/pending_list"><i class="fa fa-exclamation-circle"></i> NMC Pending Task List</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/nmc_c/done_list"><i class="fa fa-check"></i> NMC Done Task List</a>
                                </li>
                        <?php } ?>  
  <!--............................................................................................................-->
   <?php
                        $department = $this->session->userdata('department');
                        if ($department == 'MTU') {
                            ?>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/welcome/cs_assign.html"><i class="fa fa-fw fa-edit"></i>  CS Assign Task </a>
                            </li>
<!--                            <li>
                                <a href="<?php echo base_url(); ?>index.php/welcome/CS_pending_list.html"><i class="fa fa-exclamation"></i>  CS Pending Task List </a>

                            </li>-->
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/welcome/CS_done_list.html"><i class="fa fa-file-text"></i> CS Done Task List</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/welcome/CS_faulty_device_list.html"><i class="fa fa-file-text"></i> Device Faulty/Changed List</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/ert_controller/ert_assin_task"><i class="fa fa-fw fa-edit"></i> ERT New/Assign Task</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/ert_controller/ert_pending_task"><i class="fa fa-exclamation-circle"></i> ERT Pending Task List</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/ert_controller/ert_done_task"><i class="fa fa-check"></i> ERT Done Task List</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/fi_controller/assign_task"><i class="fa fa-fw fa-edit"></i> FI Assign Task</a>
                            </li>
                             <li>
                                <a href="<?php echo base_url(); ?>index.php/fi_controller/fi_pending_task"><i class="fa fa-exclamation"></i> FI Pending Task</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/fi_controller/fi_done_task"><i class="fa fa-check"></i> FI Done Task</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/wi_controller/assign_task"><i class="fa fa-fw fa-edit"></i> WI Assign Task</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/wi_controller/wi_pending_task"><i class="fa fa-exclamation"></i> WI Pending Task List</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/wi_controller/wi_done_task"><i class="fa fa-check"></i> WI Done Task List</a>
                            </li>
                           
                        <?php } ?>
 <!--.................................................ERT Team.............................................................-->
 
 <?php
                        $department = $this->session->userdata('department');
                        if ($department == 'ERT') {
                            ?>
                           
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/ert_controller/ert_assin_task"><i class="fa fa-fw fa-edit"></i> New/Assign Task</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/ert_controller/ert_pending_task"><i class="fa fa-exclamation-circle"></i> Pending Task List</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/ert_controller/ert_done_task"><i class="fa fa-check"></i> Done Task List</a>
                                    </li>
                            
                        <?php } ?>
                                
  <!--................................................. SD Team.............................................................-->
 
 <?php
                        $department = $this->session->userdata('department');
                        if ($department == 'SD') {
                            ?>
                           
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/sd_controller/assign_task"><i class="fa fa-fw fa-edit"></i> New/Assign Task</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/sd_controller/sd_pending_task"><i class="fa fa-check"></i>Pending Task</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/sd_controller/sd_done_task"><i class="fa fa-check"></i>Done Task</a>
                                    </li>
                            
                        <?php } ?>                                   
 <!--.......................................HDD Team................................................................................-->                                   
 
  <?php
                        $department = $this->session->userdata('department');
                        $hduser = $this->session->userdata('u_type');
                        if ($department == 'HD') {
                            ?>
 <?php if($hduser=='auser'){?>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/hd_assin_task"><i class="fa fa-fw fa-edit"></i> KRA </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/hd_Rating"><i class="fa fa-file"></i> KRA Report</a>
                                    </li>
                        <?php }?>                                   
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/Agent_Performance_Report"><i class="fa fa-file"></i> Agent Performance Report</a>
                                    </li>
                                     <li>
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/Drop_Call_Report"><i class="fa fa-file"></i> Drop Call Report</a>
                                    </li>
                                     <li>
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/Problem_Category_Report"><i class="fa fa-file"></i> Problem Category Report</a>
                                    </li>
                                     <li>
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/Call_Center_Performance_Report"><i class="fa fa-file"></i> Call Center Performance Report</a>
                                    </li>
                                    
  <!--................................................................................................................................-->
   <!--............................................................................................................................-->                            
                                     <li>
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/NMC_Outbound"><i class="fa fa-fw fa-edit"></i> NMC & Outbound From</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/pending_NMC_Outbound"><i class="fa fa-exclamation-circle"></i> Pending NMC & Outbound List</a>
                                    </li>
                                     <li>
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/Send_Mail"><i class="fa fa-fw fa-edit"></i> Send Mail Report </a>
                                    </li>
                                     <li>
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/ACD_Agent"><i class="fa fa-fw fa-edit"></i> ACD Agent Information From</a>
                                    </li>
                                     <li>
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/PON_SMS"><i class="fa fa-fw fa-edit"></i> PON SMS Information From </a>
                                    </li>
                                     <li>
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/Bulk"><i class="fa fa-fw fa-edit"></i> Bulk SMS From</a>
                                    </li>
                                     <li>
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/Traceless"><i class="fa fa-fw fa-edit"></i> Traceless SMS From</a>
                                    </li>
                                     <li>
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/Selfcare"><i class="fa fa-fw fa-edit"></i> Selfcare From</a>
                                    </li>
            <!--...................................................................................................................................-->                        
                              
                        <?php } ?>                                  
 <!--..............................................................................................................-->
                            

                        <?php
                        $department = $this->session->userdata('department');
                        if ($department == 'CS' || $department == "CS_Admin" || $department == "FONOC_Admin") {
                            ?>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/welcome/cs_assign.html"><i class="fa fa-fw fa-edit"></i>  CS Assign Task </a>

                            </li>
<!--                            <li>
                                <a href="<?php echo base_url(); ?>index.php/welcome/CS_pending_list.html"><i class="fa fa-exclamation"></i>  CS Pending Task List </a>

                            </li>-->
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/welcome/CS_done_list.html"><i class="fa fa-file-text"></i> CS Done Task List</a>
                            </li>
                            <li>
                                        <a href="<?php echo base_url(); ?>index.php/welcome/CS_faulty_device_list.html"><i class="fa fa-file-text"></i> CS Device Faulty/Changed List</a>
                            </li>
                        <?php } ?>

                            
                            <!--....................................FI...........................................................................-->                            
                        <?php
                        $department = $this->session->userdata('department');
                        if ($department == 'FI') {
                            ?>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/fi_controller/assign_task"><i class="fa fa-fw fa-edit"></i> New/Assign Task</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/fi_controller/fi_pending_task"><i class="fa fa-exclamation-circle"></i> Pending Task</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/fi_controller/fi_done_task"><i class="fa fa-check"></i> Done Task</a>
                                    </li>
                        <?php } ?> 
                            
                            
                            
<!--....................................FONOC...........................................................................-->                            
                        <?php
                        $department = $this->session->userdata('department');
                        if ($department == 'FONOC' || $department == "FONOC_Admin") {
                            ?>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/link3_controller/fonoc_assin_task.html"><i class="fa fa-fw fa-edit"></i> FONOC New/Assign Task</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/link3_controller/fonoc_all_pending_list_funcation"><i class="fa fa-exclamation-circle"></i> FONOC  Pending Task List</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/link3_controller/fonoc_all_done_list_funcation"><i class="fa fa-check"></i> FONOC Done Task List</a>
                            </li>
                        <?php } ?>                            
<!--....................................Wireless_Infra...........................................................................-->                            
                        <?php
                        $department = $this->session->userdata('department');
                        if ($department == 'Wireless_Infra' || $department == 'POWER') {
                            ?>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/wi_controller/assign_task"><i class="fa fa-fw fa-edit"></i> New/Assign Task</a>
                            </li>   
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/wi_controller/wi_pending_task"><i class="fa fa-exclamation-circle"></i> Pending Task List</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/wi_controller/wi_done_task"><i class="fa fa-check"></i> Done Task List</a>
                            </li>
                        <?php } ?>   
                            
                            <!--.................................... IPTS ...........................................................................-->                            
                        <?php
                        $department = $this->session->userdata('department');
                        if ($department == 'IPTS') {
                            ?>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/ipts_controller/assign_task"><i class="fa fa-fw fa-edit"></i> New/Assign Task</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/ipts_controller/ipts_pending_list"><i class="fa fa-exclamation-circle"></i> Pending Task</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/ipts_controller/ipts_done_task_list"><i class="fa fa-check"></i> Done Task</a>
                            </li>
                        <?php } ?> 
                    </ul>

                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">

                <!--<div class="container-fluid">-->
                <?php
                echo $maincontent;
                ?>

                <!--</div>-->
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
        <!--...................... AUTO Search jQuery.....................................................-->
         <!--<script src="<?php echo base_url(); ?>js/jquery-1.12.4.js"></script>-->
       <!--  <script src="<?php echo base_url(); ?>js/jquery-ui.js"></script> -->


        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>js/jquery.js"></script>
<!--        <script src="<?php // echo base_url();  ?>js/jquery-1.9.1.js" type="text/javascript"></script>-->
        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="<?php echo base_url(); ?>js/plugins/morris/raphael.min.js"></script>
        <script src="<?php echo base_url(); ?>js/plugins/morris/morris.min.js"></script>
        <script src="<?php echo base_url(); ?>js/plugins/morris/morris-data.js"></script>

        <!--     ................Firefox Date Picker JS ................  --> 
        <script src="<?php echo base_url(); ?>js/polyfiller.js"></script>
        
        <!--......................... GRAPH CHART ........................................-->
        <script src="<?php echo base_url(); ?>js/canvasjs.js"></script>

        <!--     ................ Date Picker JS ................  --> 

        <script type="text/javascript">
            Calendar.setup({
                inputField: 'start_date_id',
                ifFormat: '%d-%m-%Y',
                button: 'btnCalDOB',
                align: 'Br'
            });
        </script>

        <script type="text/javascript" language="javascript">

            //---
            var obj = "ctl00_uxPgCPH_uxOrderDate";
            var obj1 = document.getElementById("dpick1");
            if (obj != null && obj1 != null)
            {
                Calendar.setup(
                        {
                            inputField: "transfer_date", // ID of the input field 
                            ifFormat: "%d-%m-%Y", // the date format
                            button: "dpick1", // ID of the button
                            align: "Br",
                            showsTime: false
                        });
            }
            Calendar.setup(
                    {
                        inputField: "end_date_id", // ID of the input field
                        ifFormat: "%d-%m-%Y", //"", // the date format
                        button: "dpick2", // ID of the button
                        align: "Br",
                        showsTime: false
                    });

            Calendar.setup(
                    {
                        inputField: "cs_date", // ID of the input field 
                        ifFormat: "%d-%m-%Y" + " %H:%M:%S", // the date format
                        button: "dpick3", // ID of the button
                        align: "Br",
                        showsTime: true,
                        timeFormat: "24"

                    });
            Calendar.setup(
                    {
                        inputField: "cs_end_date", // ID of the input field 
                        ifFormat: "%d-%m-%Y" + " %H:%M:%S", // the date format
                        button: "dpick3", // ID of the button
                        align: "Br",
                        showsTime: true,
                        timeFormat: "24"

                    });
             Calendar.setup(
                    {
                        inputField: "s_date", // ID of the input field 
                        ifFormat: "%d-%m-%Y" + " %H:%M:%S", // the date format
                        button: "dpick3", // ID of the button
                        align: "Br",
                        showsTime: true,
                        timeFormat: "24"

                    });    
             Calendar.setup(
                    {
                        inputField: "e_date", // ID of the input field 
                        ifFormat: "%d-%m-%Y" + " %H:%M:%S", // the date format
                        button: "dpick3", // ID of the button
                        align: "Br",
                        showsTime: true,
                        timeFormat: "24"

                    });        

        </script>
<script>
function openNav() {
  
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("page-wrapper").style.marginRight = "1220px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "220px";
//  document.getElementById("page-wrapper").style.marginLeft = "250px";
//  document.getElementById("page-wrapper").style.marginLeft= "0";
}
</script>

        
    </body>

</html>
