  
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?php

                $Zone = $this->session->userdata('Zone'); 
                $department = $this->session->userdata('department');
                $user_type = $this->session->userdata('u_type');
                if($department=='MTU'){
                   echo  $Zone.' Zone DashBoard';
                }else{
                   echo ' DashBoard '.$department;
                }
                ?>
            </h1>
        </div>
    </div>

  <!--.....................................................NOC Team .................................................................-->                  
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-4" style=""></div>
                <div class="col-lg-6"></div>
                <div class="col-lg-3"></div>
            </div>
  
 <h3 class="cs_titel">NOC TEAM</h3>  
                    
<?php 

    if ($department == "NOC" || $department == "VPN" || $department == "NOC_Admin" || $department == "Admin" || $department == "BNG" || $department == "server") { 
      if($user_type=='a_user' || $user_type=='admin'){
    ?>   
                    
  
                         <h3> NOC & VPN Task Summery</h3>
                         

                        <table class="table table-bordered table-hover">                             
                            <thead>
                                <tr>
                                    <th>Task Type</th>
                                    <th>pending</th>
                                    <th>Done(today)</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $total_noc=0;
                                foreach ($NOC_task_result as $key => $values) {
                                    $total_noc = $values['pending'] + $values['done'];
                                    if ($total_noc > 0) {
                                        ?>  
                                        <tr> 
                                            <td><?php echo $values['type_task']; ?> </td>
                                            <td><a href="<?php echo base_url(); ?>index.php/welcome/DB_A_NOC_s_pend_task_by_type_task/<?php echo $values['type_task']; ?>"><?php echo $values['pending']; ?></a></td>
                                            <td><?php echo $values['done']; ?></td>
                                            <td><?php echo $values['pending'] + $values['done']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
      <?php } ?>
                         
                         
                         
<?php 
//   print_r($team_result);
?>                         
                         
                         
                         
                         
                         
<h3> Task Details </h3>

<?php 
foreach ($team_result as $key => $values) {
    $Team_department=$values['department'];

?>

<!--team_result-->

<table class="table table-bordered table-hover">                              
<thead>
    <tr>
        <th>Employee ID (<?php echo $Team_department. ' Team'; ?>)</th>
        <th>pending</th>
        <th>Done(today)</th>
        <th>Total</th>
    </tr>
</thead>
<tbody>

<?php
$user_type = $this->session->userdata('u_type');
$department = $this->session->userdata('department');

$total_r=0;
foreach ($result as $key => $values) {
$task_department=$values['department']; 
$e_id = $this->session->userdata('id');     
$employee_id=$values['id'];
$total_r = $values['pending'] + $values['done'];

if($Team_department==$task_department){
if( $department=='NOC_Admin' || $user_type=='admin'){            
if ($total_r > 0) {
?>  
<tr> 
<td><?php echo $values['id']; ?> &nbsp; ( <?php echo $values['name']; ?> )</td>
<td><a href="<?php echo base_url(); ?>index.php/welcome/DB_A_NOC_search_pending_task_by_id/<?php echo $values['id']; ?>"><?php echo $values['pending']; ?></a></td>
<td><?php echo $values['done']; ?></td>
<td><?php echo $values['pending'] + $values['done']; ?></td>
</tr>
<?php
}

}elseif ($user_type=='a_user' && $department==$task_department) {
?>    
<tr> 
<td><?php echo $values['id']; ?> &nbsp; ( <?php echo $values['name']; ?> )</td>
<td><a href="<?php echo base_url(); ?>index.php/welcome/DB_A_NOC_search_pending_task_by_id/<?php echo $values['id']; ?>"><?php echo $values['pending']; ?></a></td>
<td><?php echo $values['done']; ?></td>
<td><?php echo $values['pending'] + $values['done']; ?></td>
</tr>

<?php     
} else { 
$s_user_total= $values['pending'] + $values['done'];
if ($s_user_total > 0) {
if( $e_id==$employee_id){
?>

<tr> 
<td><?php echo $values['id']; ?> &nbsp; ( <?php echo $values['name']; ?> )</td>
<td><a href="<?php echo base_url(); ?>index.php/welcome/DB_A_NOC_search_pending_task_by_id/<?php echo $values['id']; ?>"><?php echo $values['pending']; ?></a></td>
<td><?php echo $values['done']; ?></td>
<td><?php echo $values['pending'] + $values['done']; ?></td>
</tr>

<?php }  }    }   } ?>

<?php } ?>
<?php } ?>

</tbody>
</table>







<?php } ?>     
                        



<?php 
if($department == "Admin" || $department == "NOC_Admin" || $department == "BNG"){
     if($user_type=='a_user' || $user_type=='admin' || $user_type=='s_user'){
 ?>   
    
                                <br>  <h4> Work Report </h4>           
 <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>L3T685( Dabashish Sarkar)</th>
                                    <th>L3T857 (Pankaz Roy)</th>
                                    <th>L3T941 (Md Jahid Hassan)</th>
                                    <th>L3T974 (Md. Jahidur Rahman)</th>
                                    <th>L3T1225 (Mahbubul Islam)</th>
                                    <th>L3T1637( Shidul Alam Kaisar)</th>
                                </tr>
                            </thead>
                            <tbody>
    <?php
//    echo '<pre>';
//    print_r($NOC_worktime_monthly);
//    echo '</pre>';
    foreach ($NOC_worktime_monthly as $key => $values) {
 ?>     
     <tr> 
        <td>
            <?php
            $originalDate =$values['work_day'];
            $newDate = date("d-M-y", strtotime($originalDate));
            echo $newDate; ?> 
        </td> 
        <td>
            <?php 
            $work_sec=$values['L3T685_WT'];
            $work_time=gmdate("H:i:s", $work_sec);
            echo $values['L3T685'].' ( '. $work_time .' )'; ?>
        </td>
        <td>
            <?php 
            $work_sec=$values['L3T857_WT'];
            $work_time=gmdate("H:i:s", $work_sec);
            echo $values['L3T857'].' ( '. $work_time .' )'; ?>
        </td>
        <td>
            <?php 
            $work_sec=$values['L3T941_WT'];
            $work_time=gmdate("H:i:s", $work_sec);
            echo $values['L3T941'].' ( '. $work_time .' )'; ?>
        </td>
        <td>
            <?php 
            $work_sec=$values['L3T974_WT'];
            $work_time=gmdate("H:i:s", $work_sec);
            echo $values['L3T941'].' ( '. $work_time .' )'; ?>
        </td>
        <td>
            <?php 
            $work_sec=$values['L3T1225_WT'];
            $work_time=gmdate("H:i:s", $work_sec);
            echo $values['L3T1225'].' ( '. $work_time .' )'; ?>
        </td>
        <td>
            <?php 
            $work_sec=$values['L3T1637_WT'];
            $work_time=gmdate("H:i:s", $work_sec);
            echo $values['L3T1637'].' ( '. $work_time .' )'; ?>
        </td>
    <tr>    
<?php  }  ?>    
  </tbody>
 </table>
<?php } } ?>







                        
<!--........................................................................................................................-->                        
                        
 <?php if ($department == "NMC" || $department == "NOC_Admin" || $department == "Admin") { ?>  
                            <h3 class="FI_titel">NMC TEAM</h3>  
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
                                        <td><a href="<?php echo base_url(); ?>index.php/nmc_c/DB_nmc_by_vendor/<?php echo $values['Vendor']; ?>"><?php echo $nmc_pending=$values['pending']; ?></a></td>
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
    </div>
</div>