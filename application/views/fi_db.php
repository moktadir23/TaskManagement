


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

  <h3 class="FI_titel"> Fiber INFRA TEAM </h3>
 <!--............................................ Fiber INFRA .....................................................................-->
                      
<?php if ($department == "FI" || $department == "Admin") { ?>  
         <h3>Fiber INFRA Pending Task Summary </h3> 
                      <table class="table table-bordered table-hover">                          
                        
                           <thead>
                                <tr>
                                    <th>Support_Office</th>
                                    <th>Installation</th>
                                    <th>Shifting</th>
                                    <th>Troubleshoot </th> 
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                
                                 $s_zone = $this->session->userdata('Zone');
                                
//                                foreach ($CS_result_zone as $key => $CS_zone_values) {
//                                    $Zone=$CS_zone_values['Zone'];
//                                    if( $s_zone == $Zone ){
                                
                                
                                
                                
                                
                                
                                
                                foreach ($FI_Zone_result as $key => $values) {
                                     $Zone=$values['Zone'];
                                    if( $s_zone == $Zone ){
                                    $total = $values['Installation'] + $values['Shifting']+ $values['Troubleshoot'];
                                    if ($total > 0) {
                                        ?>  
                                        
                                          <tr> 
                                            <td><?php echo $values['Support_Office']; ?></td>
                                            <td><a href="<?php echo base_url(); ?>index.php/fi_controller/DB_FI_search_pending_task/?var1=<?php echo $values['Support_Office'];?>&var2=<?php echo 'Installation';?>"> <?php echo $values['Installation']; ?></a></td>
                                            <td><a href="<?php echo base_url(); ?>index.php/fi_controller/DB_FI_search_pending_task/?var1=<?php echo $values['Support_Office'];?>&var2=<?php echo 'Shifting';?>"> <?php echo $values['Shifting']; ?></td>
                                            <td><a href="<?php echo base_url(); ?>index.php/fi_controller/DB_FI_search_pending_task/?var1=<?php echo $values['Support_Office'];?>&var2=<?php echo 'Troubleshoot';?>"> <?php echo $values['Troubleshoot']; ?></td>
                                            
                                            <td><?php 
                                            
                                            echo $total;
                                            
                                            ?></td>
                                        </tr>
                                        
                                        <?php
                                    }
                                  }  
                                }
                                ?>
                            </tbody>
                        </table> 
 
 
 <table class="table table-bordered table-hover">                          
                          <h3>Fiber INFRA Done Task Summary in  Today </h3>   <thead>
                                <tr>
                                    <th>Support_Office</th>
                                    <th>Installation</th>
                                    <th>Shifting</th>
                                    <th>Troubleshoot </th> 
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($FI_Zone_done_result as $key => $values) {
                                     $Zone=$values['Zone'];
                                    if( $s_zone == $Zone ){
                                    $total = $values['Installation'] + $values['Shifting']+ $values['Troubleshoot'];
                                    if ($total > 0) {
                                        ?>  
                                        <tr> 
                                            <td><?php echo $values['Support_Office']; ?></td>
                                            <td><?php echo $values['Installation']; ?></td>
                                            <td><?php echo $values['Shifting']; ?></td>
                                            <td><?php echo $values['Troubleshoot']; ?></td>
                                            <td><?php 
                                            
                                            echo $total;
                                            
                                            ?></td>
                                        </tr>
                                        <?php
                                    }
                                  }
                                }
                                ?>
                            </tbody>
                        </table>                 
                        
<?php } ?>
 <!--.......................................................................................................................-->  
           
  </div></div>


             
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