

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?php
                $Zone = $this->session->userdata('Zone');
                $department = $this->session->userdata('department');
                $user_type = $this->session->userdata('u_type');
                if ($department == 'MTU') {
                    echo $Zone . ' Zone DashBoard';
                } else {
                    echo ' DashBoard ' . $department;
                }
                ?>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-4" style=""></div>
                <div class="col-lg-6"></div>
                <div class="col-lg-3"></div>
            </div>        
            <?php if ($department == 'CS' || $department == 'MTU' || $department == 'Admin' || $department == 'CS_Admin') { ?>            
                <div class="row">
                    <div class="col-lg-9" style="">
                        <b>CS Pending Task Search By :</b> &nbsp; 
                        <button type="button" class="btn btn-primary" onclick="location.href = '<?php echo base_url(); ?>index.php/welcome/CS_search_pending_task_by_id'" /> Employee ID</button> &nbsp;
                        <button type="button" class="btn btn-success"  onclick="location.href = '<?php echo base_url(); ?>index.php/welcome/search_cs_pending_task_by_sub_zone'">Support Office</button> &nbsp;
                        <button type="button" class="btn btn-info"  onclick="location.href = '<?php echo base_url(); ?>index.php/welcome/search_cs_pending_task_by_Client_ID'">Client ID</button> &nbsp;
                        <button type="button" class="btn btn-danger" onclick="location.href = '<?php echo base_url(); ?>index.php/welcome/search_cs_pending_task_by_CTID_SR'">CTID Number/SR </button> <br>
                    </div>
                    <div class="col-lg-3">
                        <br>
                    </div>
                </div><br>
            <?php } ?>            
                     
                <div class="row">
                    <div class="col-lg-9" style="">
                    <b>Report :</b> &nbsp; 
                    <?php if ($department == 'Admin' || $department == 'CS_Admin' || $user_type == 's_user' || $user_type == 'a_user' ) { ?>  
                        <button type="button" class="btn " style="background-color: #4d004d; color: #ffffff;" onclick="location.href = '<?php echo base_url(); ?>index.php/welcome/cs_rept'" /> CS Report by Employee</button> &nbsp;
                        
                        
                   <?php } ?> 
                    <button type="button" class="btn " style="background-color: #336600; color: #ffffff;" onclick="location.href = '<?php echo base_url(); ?>index.php/welcome/cs_rept_tsk'" /> BTS Report</button> &nbsp;
                    <button type="button" class="btn " style="background-color: #004466; color: #ffffff;" onclick="location.href = '<?php echo base_url(); ?>index.php/welcome/cs_done_task_report'" /> Export Report</button> &nbsp;
                    </div>
                    <div class="col-lg-3">
                        <br>
                    </div>
                </div>

            <div class="row">                        
                <div class="col-lg-12">
 <!--....................................CS Team....................................................-->
<?php
 $u_type = $this->session->userdata('u_type');
 if($u_type != 'user' ){
if ($department == "CS" || $department == "FONOC_Admin" || $department == 'MTU') {
    ?>
                        <br> <h3>CS Task Summary </h3>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Support Office </th>
                                    <th>Total Pending TKI</th>
                                    <th>Generate TKI Which On (<?php echo date("d-m-Y") ?>) </th>
                                    <th>Pending TKI Which Generate On (<?php echo date("d-m-Y") ?>) </th>
                                    <th>Done TKI Which Generate On (<?php echo date("d-m-Y") ?>) </th>
                                    <th>Total Done TKI (today)</th>
                                </tr>
                            </thead>
                            <tbody>                   
    <?php
//   echo '<pre>';
//   print_r($CS_result);
    $s_zone = $this->session->userdata('Zone');
    $total_pending_task = 0;
    
    foreach ($CS_result_zone as $key => $CS_zone_values) {
        $Zone = $CS_zone_values['Zone'];
        $total_pending_task = $CS_zone_values['pending'];

        if ($s_zone == $Zone) {
            $CS_zone_total = $CS_zone_values['pending'] + $CS_zone_values['done'];
            if ($CS_zone_total > 0) {
                ?>       
                                            <?php if ($total_pending_task > 100) {
                                                ?>    
                                                <tr bgcolor="#ff6666"> 
                                                    <td><?php echo $CS_zone_values['Sub_Zone']; ?></td>
                                                    <td><a href="<?php echo base_url(); ?>index.php/welcome/search_DB_A_cs_pending_task_by_sub_zone/<?php echo $CS_zone_values['Sub_Zone']; ?>"><?php echo $CS_zone_values['pending']; ?></a></td>
                                                    <td><?php echo $CS_zone_values['today_generate_tki']; ?></td> 
                                                    <td><?php echo $CS_zone_values['today_pending']; ?></td> 
                                                    <td><?php echo $CS_zone_values['today_done']; ?></td>
                                                    <td><?php echo $CS_zone_values['done']; ?></td>
                                                </tr> 
                <?php } else { ?>
                                                <tr> 
                                                    <td><?php echo $CS_zone_values['Sub_Zone']; ?></td>
                                                    <td><a href="<?php echo base_url(); ?>index.php/welcome/search_DB_A_cs_pending_task_by_sub_zone/<?php echo $CS_zone_values['Sub_Zone']; ?>"><?php echo $CS_zone_values['pending']; ?></a></td>
                                                    <td><?php echo $CS_zone_values['today_generate_tki']; ?></td> 
                                                    <td><?php echo $CS_zone_values['today_pending']; ?></td> 
                                                    <td><?php echo $CS_zone_values['today_done']; ?></td>
                                                    <td><?php echo $CS_zone_values['done']; ?></td>
                                                </tr>
    <?php
                }
            }
        }
    }
    ?>

                            </tbody>
                        </table>


<?php }  ?> 
                        
                        
                        
                        

                    <?php
                    if ($department == "CS" || $department == "FONOC_Admin" || $department == 'MTU') {
                        ?>
                        <br> <h3>CS Task Details</h3>                                                        
                        <?php
//  echo '<pre>';
//  print_r($CS_result);
                        $s_zone = $this->session->userdata('Zone');

                        foreach ($CS_result_zone as $key => $CS_zone_values) {
                            $Zone = $CS_zone_values['Zone'];
                            
                            if ($s_zone == $Zone) {
                                $CS_zone_total = $CS_zone_values['pending'] + $CS_zone_values['done'];
                                
                                if ($CS_zone_total > 0) {
                                    ?>
                                    <div class="row">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th><?php $zone = $CS_zone_values['Sub_Zone'];
                    echo $CS_zone_values['Sub_Zone'] . ' Support Office'; ?></th>
                                                    <th>Total Pending TKI</th>
                                                    <th>Work On TKI</th>
                                                    <th>Generate TKI Which On (<?php echo date("d-m-Y") ?>) </th>
                                                    <th>Pending TKI Which Generate On (<?php echo date("d-m-Y") ?>) </th>
                                                    <th>Done TKI Which Generate On (<?php echo date("d-m-Y") ?>) </th>
                                                    <th>Total Done TKI (today)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($CS_result as $key => $CS_values) {
                                                    $CS_total = $CS_values['pending'] + $CS_values['done'];
                                                    $zone1 = $CS_values['Sub_Zone'];

                                                    if ($zone == $zone1) {
                                                        if ($CS_total > 0) {
                                                            ?>  
                                                            <tr> 
                                                                <td>
                                                                    <?php
                                                                    $Engineer_ID = $CS_values['Engineer_ID'];
                                                                    echo $CS_values['Engineer_ID'];
                                                                    ?> ( <?php echo $CS_values['Engineer_Name']; ?> )
                                                                </td>
                                                                <td>
                                                                    <a href="<?php echo base_url(); ?>index.php/welcome/DB_A_CS_search_pending_task_by_id/<?php echo $CS_values['Engineer_ID']; ?>"><?php echo $CS_values['pending']; ?></a>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    $not_work = 0;
                                                                    foreach ($CS_tki_status as $key => $CS_status_values) {
                                                                        $Engineer_ID_tik = $CS_status_values['Engineer_ID'];
                                                                        $remove_space_Engineer_ID_tik = preg_replace('/\s+/', '', $Engineer_ID_tik);
                                                                        $remove_space_Engineer_ID = preg_replace('/\s+/', '', $Engineer_ID);
                                                                        if ($remove_space_Engineer_ID == $remove_space_Engineer_ID_tik) {
                                                                            echo '<font color="green">' . $CS_status_values['CTID_Number_SR'] . '</font> , ';
                                                                            $not_work = 1;
                                                                        }
                                                                    }
                                                                    if ($not_work == 0) {
                                                                        echo '<font color="red">still not working</font>';
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td><?php echo $CS_values['today_generate_tki']; ?></td> 
                                                                <td><?php echo $CS_values['today_pending']; ?></td> 
                                                                <td><?php echo $CS_values['today_done']; ?></td>
                                                                <td><?php echo $CS_values['done']; ?></td> 
                                                            </tr>                            
                                                        <?php
                                                        }
                                                    }
                                                }
                                                ?>                            
                                            </tbody>
                                        </table>    
                                    </div>
                                <?php
                                }
                            }
                        }
                        ?>

 <?php } } ?>    

<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////
...................................... CS USER .........................................................................
////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
      <?php
                    if ($department == "CS" || $department == "FONOC_Admin" || $department == 'MTU') {
                        
                        $u_type = $this->session->userdata('u_type');
                        if($u_type == 'user' ){
                        ?>
                        <br> <h3>CS Task Details</h3>                                                        
                        <?php
//  echo '<pre>';
//  print_r($CS_result);
//                        $s_zone = $this->session->userdata('Zone');
//
//                        foreach ($CS_result_zone as $key => $CS_zone_values) {
//                            $Zone = $CS_zone_values['Zone'];
//                            
//                            if ($s_zone == $Zone) {
//                                $CS_zone_total = $CS_zone_values['pending'] + $CS_zone_values['done'];
//                                
//                                if ($CS_zone_total > 0) {
                                    ?>
                                    <div class="row">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                      Employee ID(Name)
                                                    </th>
                                                    <th>Total Pending TKI</th>
                                                    <th>Work On TKI</th>
                                                    <th>Generate TKI Which On (<?php echo date("d-m-Y") ?>) </th>
                                                    <th>Pending TKI Which Generate On (<?php echo date("d-m-Y") ?>) </th>
                                                    <th>Done TKI Which Generate On (<?php echo date("d-m-Y") ?>) </th>
                                                    <th>Total Done TKI (today)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($CS_result as $key => $CS_values) {
                                                    $CS_total = $CS_values['pending'] + $CS_values['done'];
                                                    $zone1 = $CS_values['Sub_Zone'];

//                                                    if ($zone == $zone1) {
                                                        if ($CS_total > 0) {
                                                            ?>  
                                                            <tr> 
                                                                <td>
                                                                    <?php
                                                                    $Engineer_ID = $CS_values['Engineer_ID'];
                                                                    echo $CS_values['Engineer_ID'];
                                                                    ?> ( <?php echo $CS_values['Engineer_Name']; ?> )
                                                                </td>
                                                                <td>
                                                                    <a href="<?php echo base_url(); ?>index.php/welcome/DB_A_CS_search_pending_task_by_id/<?php echo $CS_values['Engineer_ID']; ?>"><?php echo $CS_values['pending']; ?></a>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    $not_work = 0;
                                                                    foreach ($CS_tki_status as $key => $CS_status_values) {
                                                                        $Engineer_ID_tik = $CS_status_values['Engineer_ID'];
                                                                        $remove_space_Engineer_ID_tik = preg_replace('/\s+/', '', $Engineer_ID_tik);
                                                                        $remove_space_Engineer_ID = preg_replace('/\s+/', '', $Engineer_ID);
                                                                        if ($remove_space_Engineer_ID == $remove_space_Engineer_ID_tik) {
                                                                            echo '<font color="green">' . $CS_status_values['CTID_Number_SR'] . '</font> , ';
                                                                            $not_work = 1;
                                                                        }
                                                                    }
                                                                    if ($not_work == 0) {
                                                                        echo '<font color="red">still not working</font>';
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td><?php echo $CS_values['today_generate_tki']; ?></td> 
                                                                <td><?php echo $CS_values['today_pending']; ?></td> 
                                                                <td><?php echo $CS_values['today_done']; ?></td>
                                                                <td><?php echo $CS_values['done']; ?></td> 
                                                            </tr>                            
                                                        <?php
//                                                        }
                                                    }
                                                }
                                                ?>                            
                                            </tbody>
                                        </table>    
                                    </div>
                                <?php
//                                }
//                            }
//                        }
                        ?>

                    <?php } } ?>    
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////                        
.....................................ADMIN.............................................................                        
/////////////////////////////////////////////////////////////////////////////////////////////////////////////                        -->
                    <?php
                    if ($department == "Admin" || $department == "CS_Admin") {
                        ?>
                        <!--<div class="col-lg-4"></div>-->
                        <h3 class="cs_titel">CS TEAM</h3>
                        <br> <h3>CS Task Summary </h3>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Support Office </th>
                                    <th>Total Pending TKI</th>
                                    <th>Generate TKI Which On (<?php echo date("d-m-Y") ?>) </th>
                                    <th>Pending TKI Which Generate On (<?php echo date("d-m-Y") ?>) </th>
                                    <th>Done TKI Which Generate On (<?php echo date("d-m-Y") ?>) </th>
                                    <th>Total Done TKI (today)</th>
                                </tr>
                            </thead>
                            <tbody>                   
                                <?php
//                                echo '<pre>';
//                                print_r($CS_result);
                                $total_pending_task = 0;
                                foreach ($CS_result_zone as $key => $CS_zone_values) {
                                    $total_pending_task = $CS_zone_values['pending'];
                                    $CS_zone_total = $CS_zone_values['pending'] + $CS_zone_values['done'];
                                    if ($CS_zone_total > 0) {
                                        ?>                     

                                        <?php if ($total_pending_task > 100) {
                                            ?>    
                                            <tr bgcolor="#ff6666"> 
                                                <td><?php echo $CS_zone_values['Sub_Zone']; ?></td>
                                                <td><a href="<?php echo base_url(); ?>index.php/welcome/search_DB_A_cs_pending_task_by_sub_zone/<?php echo $CS_zone_values['Sub_Zone']; ?>"><?php echo $CS_zone_values['pending']; ?></a></td>
                                                <td><?php echo $CS_zone_values['today_generate_tki']; ?></td> 
                                                <td><?php echo $CS_zone_values['today_pending']; ?></td> 
                                                <td><?php echo $CS_zone_values['today_done']; ?></td>
                                                <td><?php echo $CS_zone_values['done']; ?></td>
                                            </tr> 
            <?php } else { ?>
                                            <tr> 
                                                <td><?php echo $CS_zone_values['Sub_Zone']; ?></td>
                                                <td><a href="<?php echo base_url(); ?>index.php/welcome/search_DB_A_cs_pending_task_by_sub_zone/<?php echo $CS_zone_values['Sub_Zone']; ?>"><?php echo $CS_zone_values['pending']; ?></a></td>
                                                <td><?php echo $CS_zone_values['today_generate_tki']; ?></td> 
                                                <td><?php echo $CS_zone_values['today_pending']; ?></td> 
                                                <td><?php echo $CS_zone_values['today_done']; ?></td>
                                                <td><?php echo $CS_zone_values['done']; ?></td>
                                            </tr>
                                        <?php } ?>

                                    <?php }
                                }
                                ?>

                            </tbody>
                        </table>


                    <?php } ?>

                    <?php
                    if ($department == "Admin" || $department == "CS_Admin") {
                        ?>
                        <br> <h3>CS Task Details</h3>                                                        
                        <?php
//  echo '<pre>';
//  print_r($CS_result);
                        foreach ($CS_result_zone as $key => $CS_zone_values) {
                            $CS_zone_total = $CS_zone_values['pending'] + $CS_zone_values['done'];
                            if ($CS_zone_total > 0) {
                                ?>
                                <div class="row">

                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th><?php $zone = $CS_zone_values['Sub_Zone'];
                                echo $CS_zone_values['Sub_Zone'] . ' Support Office'; ?></th>
                                                <th>Total Pending TKI</th>
                                                <th>Work On TKI</th>
                                                <th>Generate TKI Which On (<?php echo date("d-m-Y") ?>) </th>
                                                <th>Pending TKI Which Generate On (<?php echo date("d-m-Y") ?>) </th>
                                                <th>Done TKI Which Generate On (<?php echo date("d-m-Y") ?>) </th>
                                                <th>Total Done TKI (today)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $tki = 0;


                                            foreach ($CS_result as $key => $CS_values) {
                                                $CS_total = $CS_values['pending'] + $CS_values['done'];
                                                $zone1 = $CS_values['Sub_Zone'];

                                                if ($zone == $zone1) {
                                                    if ($CS_total > 0) {
                                                        ?>  
                                                        <tr> 
                                                            <td><?php
                                                                $Engineer_ID = $CS_values['Engineer_ID'];
                                                                $Engineer_Name = $CS_values['Engineer_Name'];
                                                                $remove_space_Engineer_ID = str_replace(' ', '', $Engineer_ID);

                                                                echo $remove_space_Engineer_ID;
                                                                ?> ( <?php echo $CS_values['Engineer_Name']; ?> )</td>
                                                            <td><a href="<?php echo base_url(); ?>index.php/welcome/DB_A_CS_search_pending_task_by_id/<?php echo $CS_values['Engineer_ID']; ?>"><?php echo $CS_values['pending']; ?></a></td>
                                                            <td>
                                                                <?php
                                                                $not_work = 0;
                                                                foreach ($CS_tki_status as $key => $CS_status_values) {
                                                                    $Engineer_ID_tik = $CS_status_values['Engineer_ID'];
                                                                    $remove_space_Engineer_ID_tik = preg_replace('/\s+/', '', $Engineer_ID_tik);
                                                                    $remove_space_Engineer_ID = preg_replace('/\s+/', '', $Engineer_ID);
                                                                    if ($remove_space_Engineer_ID == $remove_space_Engineer_ID_tik) {
                                                                        echo '<font color="green">' . $CS_status_values['CTID_Number_SR'] . '</font> , ';
                                                                        $not_work = 1;
                                                                    }
                                                                }

                                                                if ($not_work == 0) {
                                                                    echo '<font color="red">still not working</font>';
                                                                }
                                                                ?>
                                                            </td> 
                                                            <td><?php echo $CS_values['today_generate_tki']; ?></td> 
                                                            <td><?php echo $CS_values['today_pending']; ?></td> 
                                                            <td><?php echo $CS_values['today_done']; ?></td>

                                                            <td><?php echo $CS_values['done']; ?></td> 
                                                            <!--<td><?php echo $CS_values['pending'] + $CS_values['done']; ?></td>-->
                                                        </tr>                            
                                                    <?php
                                                    }
                                                }
                                            }
                                            ?>                            
                                        </tbody>
                                    </table> 
                                </div>

        <?php
        }
    }
}
?>
                </div>
            </div>
        </div>
    </div>
</div>
