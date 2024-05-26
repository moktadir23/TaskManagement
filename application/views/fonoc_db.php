


<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?php
                $Zone = $this->session->userdata('Zone'); 
                $department = $this->session->userdata('department');
                $user_type = $this->session->userdata('u_type');
                $nmc_module = $this->session->userdata('nmc_module');
                
                $this->session->unset_userdata('fonoc_zone_session');
                $this->session->unset_userdata('fonoc_task_type_session');
                $this->session->unset_userdata('fonoc_eid_session');
                
                
                if($department=='MTU'){
                   echo  $Zone.' Zone DashBoard';
                }else{
                   echo ' DashBoard '.$department;
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

<h3 class="FONOC_titel">FONOC TEAM</h3>

<!--.............................................................................-->
  <div class="row">
                    <div class="col-lg-9" style="">
                    <b>Report :</b> &nbsp; 
                    <?php if ($department == 'Admin' || $user_type == 's_user' ) { ?>  
                       <button type="button" class="btn " style="background-color: #336600; color: #ffffff;" onclick="location.href = '<?php echo base_url(); ?>index.php/welcome/cs_rept_tsk'" />  Troubleshoot Report</button> &nbsp;
                        
                        
                   <?php } ?> 
                    
                    </div>
                    <div class="col-lg-3">
                        <br>
                    </div>
                </div>


<!--..................................................................................-->


<?php 
$fonoc_id=$this->session->userdata('id');
$user_type=$this->session->userdata('u_type');
$user_zone=$this->session->userdata('Zone');
?>
                        <h3>  Daily Task Incomplete </h3>
                      <table class="table table-bordered table-hover">                          
                            <thead>
                                <tr>
                                    <th>Zone</th>
                                    <th>Installation</th>
                                    <th>Troubleshoot</th>
                                    <th>Shifting</th>
                                    <th>MAC Change</th>
                                    <th>Status Check</th>
                                    <th>Other</th>
                                    <th>Total Incomplete</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($FONOC_zonetask_summery as $key => $values) {
                                    $total=0;
                                    if($user_type=='s_user' || $user_type=='admin' || $department == "FONOC" || $department == 'MTU'){
                                        
                                        ?>  
                                        <tr> 
                                            <td><?php echo $zone=$values['engineer_zone']; ?> </td>
                                            <td><a href="<?php echo base_url(); ?>index.php/link3_controller/FONOC_DB_zone_pending/<?php echo $zone; ?>/Installation"><?php echo $Installation=$values['Installation']; ?></a></td>
                                            <td><a href="<?php echo base_url(); ?>index.php/link3_controller/FONOC_DB_zone_pending/<?php echo $zone; ?>/Troubleshoot"><?php echo $Troubleshoot=$values['Troubleshoot'] ?></a></td>
                                            <td><a href="<?php echo base_url(); ?>index.php/link3_controller/FONOC_DB_zone_pending/<?php echo $zone; ?>/Shifting"><?php echo $Shifting=$values['Shifting'] ?></a></td>
                                            <td><a href="<?php echo base_url(); ?>index.php/link3_controller/FONOC_DB_zone_pending/<?php echo $zone; ?>/MAC_Change"><?php echo $MAC_Change=$values['MAC_Change'] ?></a></td>
                                            <td><a href="<?php echo base_url(); ?>index.php/link3_controller/FONOC_DB_zone_pending/<?php echo $zone; ?>/Status_Check"><?php echo $Status_Check=$values['Status_Check'] ?></a></td>
                                             <td><a href="<?php echo base_url(); ?>index.php/link3_controller/FONOC_DB_zone_pending/<?php echo $zone; ?>/Other"><?php echo $Other=$values['Other'] ?></a></td>
                                            <td><a href="<?php echo base_url(); ?>index.php/link3_controller/FONOC_DB_zone_pending/<?php echo $zone; ?>/all"><?php echo $total=$Installation+ $Troubleshoot+$Shifting+$MAC_Change+ $Status_Check+$Other; ?></a></td>
                                            
                                        </tr>
                                        <?php
                                        } 
                                     } ?>
                            </tbody>
                        </table>  
                        
                        
 <h3>  Daily Task Completed (Today)</h3>                       
<table class="table table-bordered table-hover">                          
                            <thead>
                                <tr>
                                    <th>Zone</th>
                                    <th>Installation</th>
                                    <th>Troubleshoot</th>
                                    <th>Shifting</th>
                                    <th>MAC Change</th>
                                    <th>Status Check</th>
                                    <th>Other</th>
                                    <th>Generate OP</th>
                                    <th>Total Completed</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                  $T_Installation=0;
                                  $T_Troubleshoot=0;
                                  $T_Shifting=0;
                                  $T_MAC_Change=0;
                                  $T_Status_Check=0;
                                  $T_Other=0;
                                  $T_gt_op=0;
                                  $T_total=0;
                                foreach ($FONOC_zonetask_donesummery as $key => $values) {
                                    $total=0;
                                  
                                    if($user_type=='s_user' || $user_type=='admin' || $department == "FONOC" || $department == 'MTU'){
                                        
                                        ?>  
                                        <tr> 
                                            <td><?php echo $zone=$values['engineer_zone']; ?> </td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>index.php/link3_controller/FONOC_DB_zone_done/<?php echo $zone; ?>/Installation">
                                                <?php echo $Installation=$values['Installation']; $T_Installation=$T_Installation+$Installation; ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>index.php/link3_controller/FONOC_DB_zone_done/<?php echo $zone; ?>/Troubleshoot">
                                                <?php echo $Troubleshoot=$values['Troubleshoot']; $T_Troubleshoot=$T_Troubleshoot+$Troubleshoot; ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>index.php/link3_controller/FONOC_DB_zone_done/<?php echo $zone; ?>/Shifting">
                                                <?php echo $Shifting=$values['Shifting']; $T_Shifting=$T_Shifting+$Shifting; ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>index.php/link3_controller/FONOC_DB_zone_done/<?php echo $zone; ?>/MAC_Change">
                                                <?php echo $MAC_Change=$values['MAC_Change']; $T_MAC_Change=$T_MAC_Change+$MAC_Change; ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>index.php/link3_controller/FONOC_DB_zone_done/<?php echo $zone; ?>/Status_Check">
                                                <?php echo $Status_Check=$values['Status_Check']; $T_Status_Check=$T_Status_Check+$Status_Check;  ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>index.php/link3_controller/FONOC_DB_zone_done/<?php echo $zone; ?>/Other">
                                                <?php echo $Other=$values['Other']; $T_Other=$T_Other+$Other;  ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>index.php/link3_controller/FONOC_DB_zone_done/<?php echo $zone; ?>/gt_op">
                                                <?php echo $gt_op=$values['gt_op']; $T_gt_op=$T_gt_op+$gt_op;  ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>index.php/link3_controller/FONOC_DB_zone_done/<?php echo $zone; ?>/all">
                                                <?php echo $total=$Installation+ $Troubleshoot+$Shifting+$MAC_Change+ $Status_Check+$Other+$gt_op; $T_total=$T_total+$total; ?>
                                                </a>
                                            </td>
                                            
                                        </tr>
                                <?php } } ?>
                                      <tr>
                                         <td><b>Total</b></td>
                                         <td><b><?php echo $T_Installation; ?></b></td>
                                         <td><b><?php echo $T_Troubleshoot; ?></b></td>
                                         <td><b><?php echo $T_Shifting; ?></b></td>
                                         <td><b><?php echo $T_MAC_Change; ?></b></td>
                                         <td><b><?php echo $T_Status_Check; ?></b></td>
                                         <td><b><?php echo $T_Other; ?></b></td>
                                         <td><b><?php echo $T_gt_op; ?></b></td>
                                         <td><b><?php echo $T_total; ?></b></td>
                                     </tr>
                            </tbody>
                        </table>                          
                               
  </div>
    
    </div>

         
    
    
    
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
<?php 
if ($department == "FONOC" || $department == "FONOC_Admin" || $department == "Admin" || $department == 'MTU') { ?>   
                        <h3> FONOC Task Details </h3>
                      <table class="table table-bordered table-hover">                          
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>pending</th>
                                    <th>Done(today)</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $total_fonoc=0;
                                $total_fonoc_1=0;
                                 
                                foreach ($FONOC_result as $key => $values) {
                                    
                                    $employee_id=$values['employee_id'];
                                    $zone_value=$values['zone'];
                                    if($user_type=='s_user' || $user_type=='admin'){
                                         $total_fonoc = $values['pending'] + $values['done'];
                                        if ($total_fonoc > 0) {
                                        ?>  
                                        <tr> 
                                            <td><?php echo $values['employee_id']; ?> &nbsp; ( <?php echo $values['employee_name']; ?> )</td>
                                            <td><a href="<?php echo base_url(); ?>index.php/link3_controller/DB_A_FNOC_search_pending_task_by_id/<?php echo $values['employee_id']; ?>"><?php echo $values['pending']; ?></a></td>
                                            <td><?php echo $values['done']; ?></td>
                                            <td><?php echo $values['pending'] + $values['done']; ?></td>
                                        </tr>
                                        <?php
                                        } 
                                    
                                    }elseif ($user_type=='a_user' || $user_type=='user'){
                                         $total_fonoc_1 = $values['pending'] + $values['done'];
                                         $employee_id=$values['employee_id'];
                                        if ( $employee_id !== 'L3T102' || $employee_id !== 'L3T290' || $employee_id !== 'L3T192' ) {
                                        ?>  
                                        <tr> 
                                            <td><?php echo $values['employee_id']; ?> &nbsp; ( <?php echo $values['employee_name']; ?> )</td>
                                            <td><a href="<?php echo base_url(); ?>index.php/link3_controller/DB_A_FNOC_search_pending_task_by_id/<?php echo $values['employee_id']; ?>"><?php echo $values['pending']; ?></a></td>
                                            <td><?php echo $values['done']; ?></td>
                                            <td><?php echo $values['pending'] + $values['done']; ?></td>
                                        </tr>
                                <?php } }  } ?>
                            </tbody>
                        </table>  
                        
<?php }  ?>                  
           
  </div>
    
    </div>

                       
<!--........................................................................................................................-->                        
                        
 <?php if ($nmc_module==2 || $department == "Admin" ) { ?>  
                            <h3 class="FI_titel">NMC TEAM</h3>
            <div class="row">
                <div class="col-lg-12" style="">
                <b> Report :</b> &nbsp; 
                 <button type="button"  class="btn btn-success"  onclick="location.href = '<?php echo base_url(); ?>index.php/nmc_c/incident_report'">Incident Report</button>
                </div>
            </div>
                            <br>  <h4> Incident Summery </h4>           
 <table class="table table-bordered table-hover">
<!--                          <br><br><br> <h3 class="NOC_titel">NMC TEAM</h3>  
                            <br><br>  <h4> Incident Summery </h4>-->
                            <thead>
                                <tr>
                                    <th>Provider</th>
                                    <th>Incident Unresolved</th>
                                    <th>Incident Resolved</th>
                                    <th>Total Incident Occurred</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($NMC_result as $key => $values) {
                                    
                                ?>  
                                    <tr> 
                                        <td><?php echo $Vendor=$values['Vendor']; ?> </td>
                                        <td><?php echo $nmc_pending=$values['pending']; ?></td>
                                        <td><?php echo $nmc_done=$values['done']; ?> </td>
                                        <td>
                                            <?php
                                             echo $nmc_total=$nmc_pending+$nmc_done;
                                            ?> 
                                        </td>
                                    </tr>
                                <?php  } ?>
                            </tbody>
                            
                        </table>

<br><br>  <h4> Incident Details </h4>
<?php


    foreach ($NMC_result as $key => $values) {
        $Vendor=$values['Vendor'];
        $nmc_pending=$values['pending']; 
        if( $nmc_pending > 0 ){
?>  
<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th><?php echo $Vendor; ?></th>
                                    <th>Incident Type</th>
                                    <th>Duration</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($NMC_details_result as $key => $details_values) { 
                                    $Vendor1=$details_values['Vendor'];
                                    if($Vendor1==$Vendor){
                                ?>  
                                    <tr> 
                                        <td><?php echo $details_values['Name']; ?> </td>
                                        <!--<td><a href="<?php echo base_url(); ?>index.php/welcome/DB_A_NOC_s_pend_task_by_type_task/<?php echo $details_values['tki']; ?>"><?php echo $details_values['Name']; ?></a></td>-->
                                        <td><?php echo $details_values['type']; ?> </td>
                                        <td>
                                            <?php 
                                             $in_Occurred=$details_values['in_Occurred'];
                                           
                                             $date_time=date("Y-m-d H:i:s");
                                            
                                            $datetime1 = strtotime($in_Occurred);
                                            $datetime2 = strtotime($date_time);
                                            $total_time = $datetime2 - $datetime1;
                                            
                                            $hours = floor($total_time / 3600);
                                            $mins = floor(($total_time - $hours*3600) / 60);
                                            $s = $total_time - ($hours*3600 + $mins*60);
                                            $mins = ($mins<10?"0".$mins:"".$mins);
                                            $s = ($s<10?"0".$s:"".$s); 
                                            $total_Duration = ($hours>0?$hours.":":"").$mins.":".$s;
                                           
                                            echo $total_Duration;
                                            ?>
                                        </td>
                                    </tr>
        <?php } } } ?>
                            </tbody>
                            
                        </table>
<?php } ?>
 
                 
                        
<?php } ?>
</div>               

<script language="javascript">
window.setTimeout(function () {
  window.location.reload();
}, 30000);
</script>