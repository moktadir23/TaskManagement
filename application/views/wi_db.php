        



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
                if($department=='MTU'){
                   echo  $Zone.' Zone DashBoard';
                }else{
                   echo ' DashBoard '.$department;
                }
                ?>
            </h1>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-4" style=""></div>
                <div class="col-lg-6"></div>
                <div class="col-lg-3"></div>
            </div>
                      
                <div class="row">
                    <div class="col-lg-9" style="">
                        <b>Wireless Report:</b> &nbsp; 
                        <button type="button" class="btn " style="background-color: #4d004d; color: #ffffff;" onclick="location.href = '<?php echo base_url(); ?>index.php/welcome/wi_report'" /> Wireless Report</button> &nbsp;
                            
                    </div>
                    <div class="col-lg-3">
                        <br>
                    </div>
                </div><br>
            
            
  <h3 class="FONOC_titel">Wireless_Infra TEAM</h3>             
 <!--......................................WI Team................................................................-->                       
                        
<?php if ($department == "Wireless_Infra" || $department == 'POWER' || $department == 'MTU') { ?>   
                        <h3> Wireless_Infra Task Details :
 <?php
 $s_wi_zone = $this->session->userdata('Zone');
 echo $s_wi_zone.' Zone';
?> </h3>
                      <table class="table table-bordered table-hover">                          
                            <thead>
                                <tr>
                                    <!--<th>Zone</th>-->
                                    <th>ID</th>
                                    <th>pending</th>
                                    <th>Done(today)</th>
                                    <th>Total</th>
                                    
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $total_WI=0;
                                
                                foreach ($WI_Details as $key => $WI_values) {
                                    $WI_Zone = $WI_values['zone_of_employee'];
                                    if( $s_wi_zone == $WI_Zone ){                                       
                                    $total_WI = $WI_values['pending'] + $WI_values['done'];
                                    if ($total_WI > 0) {
                                        ?>  
                                        <tr> 
                                            <!--<td><?php echo $WI_values['zone_of_employee'] ?></td>-->
                                            <td><?php echo $WI_values['Engineer_ID']; ?> &nbsp; ( <?php echo $WI_values['Engineer_Name']; ?> )</td>
                                            <td><a href="<?php echo base_url(); ?>index.php/wi_controller/wi_DB_pending_task_by_id/<?php echo $WI_values['Engineer_ID']; ?>"><?php echo $WI_values['pending']; ?></a></td>
                                            <td><?php echo $WI_values['done']; ?></td>
                                            <td><?php echo $WI_values['pending'] + $WI_values['done']; ?></td>
                                            
                                        </tr>
                                        <?php
                                    }
                                    } 
                                }
                                ?>
                                        
                            </tbody>
                        </table>  
                        
<?php } ?> 
     
                     
<?php if ($department == "Admin") { ?>   
                        <h3> Wireless_Infra Task Details :</h3>
                      <table class="table table-bordered table-hover">                          
                            <thead>
                                <tr>
                                    <!--<th>Zone</th>-->
                                    <th>ID</th>
                                    <th>pending</th>
                                    <th>Done(today)</th>
                                    <th>Total</th>
                                    
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $total_WI=0;
                                
                                foreach ($WI_Details as $key => $WI_values) {
                                    $WI_Zone = $WI_values['zone_of_employee'];
                                    
                                  
                                        
                                    $total_WI = $WI_values['pending'] + $WI_values['done'];
                                    if ($total_WI > 0) {
                                        ?>  
                                        <tr> 
                                            <!--<td><?php echo $WI_values['zone_of_employee'] ?></td>-->
                                            <td><?php echo $WI_values['Engineer_ID']; ?> &nbsp; ( <?php echo $WI_values['Engineer_Name']; ?> )</td>
                                            <td><a href="<?php echo base_url(); ?>index.php/wi_controller/wi_DB_pending_task_by_id/<?php echo $WI_values['Engineer_ID']; ?>"><?php echo $WI_values['pending']; ?></a></td>
                                            <td><?php echo $WI_values['done']; ?></td>
                                            <td><?php echo $WI_values['pending'] + $WI_values['done']; ?></td>
                                            
                                        </tr>
                                        <?php
                                    } 
                                }
                                ?>
                                        
                            </tbody>
                        </table>  
                        
<?php } ?> 
 
 </div></div>

                   
<!--........................................................................................................................-->                        
                        
 <?php if ($nmc_module==2 || $department == "Admin" ) { ?>  
                            <h3 class="FI_titel">NMC TEAM</h3>
            <div class="row">
                <div class="col-lg-12" style="">
                <b> Report :</b> &nbsp; 
                 <button type="button"  class="btn btn-success"  onclick="location.href = '<?php echo base_url(); ?>index.php/nmc_c/incident_report'">Incident Report</button>
                <button type="button"  class="btn" style="background-color: #4d004d; color: #ffffff;" onclick="location.href = '<?php echo base_url(); ?>index.php/nmc_c/nmc_uptime_report'">Uptime Report</button> &nbsp;

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