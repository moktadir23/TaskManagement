
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                NMC: DONE Task List
            </h1>

            <!--                        <ol class="breadcrumb">
                                        <li>
                                            <i class="fa fa-dashboard"></i>  <a href="#">Dashboard</a>
                                        </li>
                                        <li class="active">
                                            <i class="fa fa-table"></i> Pending List
                                            
                                        </li>
                                    </ol>-->
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">

            
            <div class="row">
                <div class="col-lg-12" style="">
                    <b> search by :</b> &nbsp; 
                    <button type="button"  class="btn btn-primary" onclick="location.href = '<?php echo base_url(); ?>index.php/nmc_c/nmc_ereport'"> Employee Report</button> &nbsp;
                    <button type="button"  class="btn btn-success"  onclick="location.href = '<?php echo base_url(); ?>index.php/nmc_c/incident_report'">Incident Report</button> &nbsp;
                    <button type="button"  class="btn btn-info"  onclick="location.href = '<?php echo base_url(); ?>index.php/nmc_c/nmc_tki_history'">TKI Report</button> &nbsp;
                    <button type="button"  class="btn btn-danger"  onclick="location.href = '<?php echo base_url(); ?>index.php/nmc_c/nmc_session_report'">Bandwidth and Latency Report</button> &nbsp;
                    <button type="button"  class="btn" style="background-color: #4d004d; color: #ffffff;" onclick="location.href = '<?php echo base_url(); ?>index.php/nmc_c/nmc_uptime_report'">Uptime Report</button> &nbsp;

                </div>
<!--                <div class="col-lg-3">

                    <br>
                </div>-->

            </div>


            <div class="row">
                <div class="col-lg-3">
                </div>
                <div class="col-lg-6"></div>
                <div class="col-lg-3"></div>
            </div>
            <br>
            <div class="table-responsive" style="height: 480px; overflow-y: auto;">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          
                            <th>Incident Name</th>
                            <th>Start Time</th>
                            <th>Incident Resolved</th>
                            <th>Duration</th>
                            <th>SMS</th>
                            <th>Ticket-ID</th>
                            <th>Email</th>
                            <th>ORG</th>
                            <th>Incident-For</th>
                            <th>Incident-Type</th>                                       
                            <th>Incident-Specification</th>
                            <th>Final Reason</th>
                            <th>Provider</th>
                            <th>SCR / Circuit ID</th>
                            <th>Informed-To</th>

                            <!--<th>Action</th>-->
                        </tr>
                    </thead>
                    <tbody>                       
<?php
//      echo '<pre>';
//      print_r($pending_task_result);
//foreach ($pending_list_result as $value) {
//if(isset($results)){
//    echo 'VALUE';


  foreach ($done_task_result as $value) {  
   $id=$value->id;
    ?>  

                            <tr> 
                                <td><b><?php echo $value->Name; ?></b></td>
                                <td><?php echo $value->in_Occurred; ?></td>
                                <td><?php echo $value->in_Resolved; ?></td>
                                <td><b><?php echo $value->Duration; ?></b></td>
                                <td><?php  $sms=$value->sms; if($sms=='1'){ echo 'YES'; }else{ echo 'NO'; } ?></td>
                                <td><?php echo $value->tki; ?></td>
                                <td><?php  $email=$value->email;  if($email=='1'){ echo 'YES'; }else{ echo 'NO'; }  ?></td>
                                <td><?php echo $value->organisation; ?></td>
                                <td><?php echo $value->Incident_for; ?></td>
                                <td><?php echo $value->type; ?></td>
                                <td><?php echo $value->Specification; ?></td>
                                <td><b><?php echo $value->Final_Reason; ?></b></td>
                                <td><?php echo $value->Vendor; ?> </td>
                                <td><?php echo $value->scr_curt_id; ?></td>
                                <td><?php echo $value->informed_id; ?></td>
                            </tr>    
<?php } ?>
                              
                    </tbody>
                </table>
                <div class="col-lg-5"></div>
                <div class="col-lg-5"> 
<?php  echo $links; ?>
                </div>
            </div>
        </div>

    </div>

</div>