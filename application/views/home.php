<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Activity</title>
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
<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css">-->
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
    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                 <div  class="navbar-header">
                    
                    <div id="DIV_open">
                    <div class="navbar-brand navbar-brand-left">Menu</div>
                    
                    <button type="button" class="navbar-toggle navbar-toggle-right" onclick="openFunction()" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    </div>
                    
                    <div id="DIV_close">
                    <div class="navbar-brand navbar-brand-left">Close</div>
                    <button type="button" class="navbar-toggle navbar-toggle-right" onclick="closeFunction()" data-toggle="collapse" data-target=".navbar-ex1-collapse">
<!--                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>-->
                        <i class="fa fa-close"></i>
                    </button>
                    </div>

                    <a class="navbar-brand navbar-brand-center" href="#">Task Management</a>
                    <a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown" style="float:right;"> Welcome <?php $name = $this->session->userdata('name'); ?>
<!--                        <b style="color: #0073e6; "><?php echo "$name"; ?></b>  -->
                        <font style="color: #b4d5fe; "><?php echo "$name"; ?></font> 
                        <b class="fa fa-angle-down"></b>
                    </a>
                    <ul class="dropdown-menu dropdownMenuLeft">
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
                </div>
                
                
                
                
                <!-- Top Menu Items -->

<!--            <ul class="nav navbar-right top-nav">
                <li><a href="#" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Stats">
                    </a>
                </li>            
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Welcome <?php $name = $this->session->userdata('name'); ?>
                      
                          <img src="<?php echo base_url(); ?>css/upload_file/default.jpg" alt="" width="20" height="20"><br>
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
            </ul>-->
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
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
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/welcome/CS_device_RD_report.html"><i class="fa fa-file-text"></i>Return Device R&D Report</a>
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
                                        <a href="<?php echo base_url(); ?>index.php/link3_controller/fonoc_DT.html"><i class="fa fa-fw fa-edit"></i> Daily Task Form</a>
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
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/Send_Mail"><i class="fa fa-fw fa-edit"></i> Send Mail From </a>
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
                                        <a href="<?php echo base_url(); ?>index.php/nmc_c/done_list"><i class="fa fa-check"></i> Report </a>
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

                            <!--...............................................................................................................-->
                            
                            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#CorporatePages" data-parent="#exampleAccordion">
                                   Corporate &nbsp;&nbsp; <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="sidenav-second-level collapse" id="CorporatePages">
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_db"><i class="fa fa-fw fa-columns"></i> Corporate Task Summery</a>
                                    </li>
                                    
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_target"><i class="fa fa-fw fa-columns"></i>Set Target</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_assin_task"><i class="fa fa-fw fa-edit"></i> New/Assign Task</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_sales_from"><i class="fa fa-fw fa-edit"></i> Corporate Sales From</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_task_list"><i class="fa fa-exclamation-circle"></i> Corporate Task List</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_sales_report"><i class="fa fa-check"></i> Corporate Sales Report</a>
                                    </li>
                                </ul>
                            </li>
                            
                             <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#bankPages" data-parent="#exampleAccordion">
                                   BANK & NBFI &nbsp;&nbsp; <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="sidenav-second-level collapse" id="bankPages">
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/bank_nbfi_db"><i class="fa fa-fw fa-columns"></i> BANK & NBFI Task Summery</a>
                                    </li>
                                     <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/client_info_mrk"><i class="fa fa-fw fa-edit"></i>Client From</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/bank_customer_list"><i class="fa fa-fw fa-columns"></i>Client List</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_target"><i class="fa fa-fw fa-columns"></i>Set Target</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/bank_assin_task"><i class="fa fa-fw fa-edit"></i> New/Assign Task</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_sales_from"><i class="fa fa-fw fa-edit"></i> Sales From</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/bank_task_list"><i class="fa fa-exclamation-circle"></i> Task List</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_sales_report"><i class="fa fa-check"></i> Sales Report</a>
                                    </li>
                                </ul>
                            </li>
                            
    <!--.......................................................................................................................................-->
                               <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#kamPages" data-parent="#exampleAccordion">
                                   KAM &nbsp;&nbsp; <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="sidenav-second-level collapse" id="kamPages">
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/KAM_db"><i class="fa fa-fw fa-columns"></i> KAM Task Summery</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/kam_task"><i class="fa fa-fw fa-edit"></i> New/Assign Task</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/kam_termination"><i class="fa fa-fw fa-edit"></i> Termination From</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/kam_task_lst"><i class="fa fa-check"></i>Task List</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/kam_termination_lst"><i class="fa fa-check"></i> Termination List</a>
                                    </li>
                                </ul>
                            </li>                       
    
    
                            
                        <?php } ?>
                        <?php
                        $department = $this->session->userdata('department');
                        if ($department == 'NOC' || $department == 'BNG' ||$department == 'server' || $department == 'VPN' || $department == "NOC_Admin" ) {
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
                                    <a href="<?php echo base_url(); ?>index.php/nmc_c/done_list"><i class="fa fa-check"></i>NMC Report</a>
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
                                    <a href="<?php echo base_url(); ?>index.php/nmc_c/done_list"><i class="fa fa-check"></i> NMC Report</a>
                                </li>
                        <?php } ?>  
  <!--............................................................................................................-->
   <?php
                        $department = $this->session->userdata('department');
                        if ($department == 'MTU') {
                            ?>                            
                            
          <!--...................................................   CS    ..................................................................................................................................-->                  
                           <?php 
                            $cs = $this->session->userdata('cs');
                            if($cs==1){
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
                            
                            
                            <?php } ?>
           <!--............................................ ERT .....................................................................................-->                 
                             <?php 
                            $ert= $this->session->userdata('ert');
                            if($ert==1){
                           ?> 
                            
                            
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
                            
                             <?php } ?>
                               <?php 
                            $fi= $this->session->userdata('ei');
                            if($fi==1){
                           ?> 
        <!--...............................................FI .........................................................................................-->                    
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
                            <?php } ?>
                            <?php 
                            $fonoc= $this->session->userdata('fonoc');
                            if($fonoc==1){
                           ?> 
<!--...........................................................FONOC..................................................................................................-->                            
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
                                        <a href="<?php echo base_url(); ?>index.php/link3_controller/fonoc_DT.html"><i class="fa fa-fw fa-edit"></i> Daily Task Form</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/link3_controller/fonoc_all_pending_list_funcation"><i class="fa fa-exclamation-circle"></i> Summary of Pending Task</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/link3_controller/fonoc_all_done_list_funcation"><i class="fa fa-check"></i> Done Task List</a>
                                    </li>
                                </ul>
                            </li>
                             <?php } ?>
                            <?php 
                            $hd= $this->session->userdata('hd');
                            if($hd==1){
                           ?>
<!--................................................ HD ...........................................................................................-->                            
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
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/Send_Mail"><i class="fa fa-fw fa-edit"></i> Send Mail From </a>
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
                               <?php } ?>
                            <?php 
                            $ipts= $this->session->userdata('ipts');
                            if($ipts==1){
                           ?>
      <!--..................................................... IPTS ...........................................................................................................-->                      
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
                               <?php } ?>
                            <?php 
                            $noc= $this->session->userdata('noc');
                            if($noc==1){
                           ?>
<!--..................................................... NOC .................................................................................-->
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
                            <?php } ?>
                            <?php 
                            $nmc= $this->session->userdata('nmc');
                            if($nmc==1){
                           ?>
     <!--..................................................... NMC ..................................................................................-->                       
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
                                        <a href="<?php echo base_url(); ?>index.php/nmc_c/done_list"><i class="fa fa-check"></i> Report </a>
                                    </li>
                                </ul>
                            </li>
   <!--................................................... SD ...................................................................................-->                         
                             <?php } ?>
                            <?php 
                            $sd= $this->session->userdata('sd');
                            if($sd==1){
                           ?> 
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
                            
           <!--.................................................. Wireless .....................................................................-->                 
                              <?php } ?>
                            <?php 
                            $wi= $this->session->userdata('wi');
                            if($wi==1){
                           ?> 
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

                            <!--............................................................ CORPORATE ...................................................-->
                              <?php } ?>
                            <?php 
                            $corporate= $this->session->userdata('corporate');
                            if($corporate==1){
                           ?> 
                            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#CorporatePages" data-parent="#exampleAccordion">
                                   Corporate &nbsp;&nbsp; <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="sidenav-second-level collapse" id="CorporatePages">
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_db"><i class="fa fa-fw fa-columns"></i> Corporate Task Summery</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_target"><i class="fa fa-fw fa-columns"></i>Set Target</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_assin_task"><i class="fa fa-fw fa-edit"></i> New/Assign Task</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_sales_from"><i class="fa fa-fw fa-edit"></i> Corporate Sales From</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_task_list"><i class="fa fa-exclamation-circle"></i> Corporate Task List</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_sales_report"><i class="fa fa-check"></i> Corporate Sales Report</a>
                                    </li>
                                </ul>
                            </li>
                            <?php } ?>









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
                                   
                        <?php }?>   
                                    
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
                                    
  <!--................................................................................................................................-->
   <!--............................................................................................................................-->                            
                                     <li>
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/NMC_Outbound"><i class="fa fa-fw fa-edit"></i> NMC & Outbound From</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/pending_NMC_Outbound"><i class="fa fa-exclamation-circle"></i> Pending NMC & Outbound List</a>
                                    </li>
                                     <li>
                                        <a href="<?php echo base_url(); ?>index.php/hd_controller/Send_Mail"><i class="fa fa-fw fa-edit"></i> Send Mail From </a>
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
                        if ($department == 'CS' || $department == "CS_Admin" ) {
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
                            <li>
                                        <a href="<?php echo base_url(); ?>index.php/welcome/CS_device_RD_report.html"><i class="fa fa-file-text"></i>Return Device R&D Report</a>
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
                                <a href="<?php echo base_url(); ?>index.php/link3_controller/fonoc_DT.html"><i class="fa fa-fw fa-edit"></i> Daily Task Form</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/link3_controller/fonoc_all_pending_list_funcation"><i class="fa fa-exclamation-circle"></i> FONOC  Pending Task List</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/link3_controller/fonoc_all_done_list_funcation"><i class="fa fa-check"></i> FONOC Done Task List</a>
                            </li>
                            <li>
                                        <a href="<?php echo base_url(); ?>index.php/welcome/CS_device_RD_report.html"><i class="fa fa-file-text"></i>Return Device R&D Report</a>
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
                            
     <!--...............................................................BANK NBFI.................................................................................-->                       
               <?php
                $department = $this->session->userdata('department');
                if ($department == 'Bank_NBFI') {
                    ?>  
<!--                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/bank_nbfi_db"><i class="fa fa-fw fa-columns"></i> BANK & NBFI Task Summery</a>
                                    </li>-->
                                     <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/client_info_mrk"><i class="fa fa-fw fa-edit"></i>ADD Client Info</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/bank_customer_list"><i class="fa fa-fw fa-columns"></i>Client List</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/bank_assin_task"><i class="fa fa-fw fa-edit"></i> New/Assign Task</a>
                                    </li>
                                    
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/bank_task_list"><i class="fa fa-exclamation-circle"></i> Task List</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_sales_from"><i class="fa fa-fw fa-edit"></i> Sales From</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_sales_report"><i class="fa fa-check"></i> Sales Report</a>
                                    </li>
     
                <?php } ?>                                         
  <!--................................................. Corporate Team.............................................................-->
 
  
                        <?php
                        $department = $this->session->userdata('department');
                        if ($department == 'Corporate' || $department == 'ctg_mkt' || $department == 'Strategic') {
                            ?>
                           
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_target"><i class="fa fa-fw fa-columns"></i>Set Target</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_assin_task"><i class="fa fa-fw fa-edit"></i> New/Assign Task</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_sales_from"><i class="fa fa-fw fa-edit"></i> Sales From</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_task_list"><i class="fa fa-exclamation-circle"></i>  Task List</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_sales_report"><i class="fa fa-check"></i>  Sales Report</a>
                                    </li>

                            
                        <?php } ?>  
                                    
                                                                 <!--.................................................KAM Team.............................................................-->
 
 <?php
                        $department = $this->session->userdata('department');
                        if ($department == 'KAM') {
                            ?>
                           
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/kam_task"><i class="fa fa-fw fa-edit"></i> New/Assign Task</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/kam_termination"><i class="fa fa-fw fa-edit"></i> Termination From</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/kam_task_lst"><i class="fa fa-check"></i>Task List</a>
                                    </li>
                                     <li>
                                        <a href="<?php echo base_url(); ?>index.php/corporate_c/kam_termination_lst"><i class="fa fa-check"></i> Termination List</a>
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


<!--...........................MENU................................................................-->
<script>
  var x = document.getElementById("DIV_open");
  var y = document.getElementById("DIV_close");
  y.style.display = "none";
    
function openFunction() {
  var x = document.getElementById("DIV_open");
  var y = document.getElementById("DIV_close");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
  } else {
    x.style.display = "none";
    y.style.display = "block";
  }
}

function closeFunction() {
  var x = document.getElementById("DIV_close");
  var y = document.getElementById("DIV_open");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
  } else {
    x.style.display = "none";
    y.style.display = "block";
  }
}

</script>
        
    </body>

</html>
