
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                NMC: Pending Task List
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
                <div class="col-lg-9" style="">
                    <b> search by :</b> &nbsp; 
                    <button type="button" class="btn btn-primary" onclick="location.href = '<?php echo base_url(); ?>index.php/nmc_c/nmc_p_task_by_date'" /> Pending Task </button> &nbsp;
                    <!--<button type="button" disabled="disabled" class="btn btn-success"  onclick="location.href = '<?php echo base_url(); ?>index.php/ipts_controller/ipts_pending_task_by_date'">Date Range</button> &nbsp;-->
                    <!--<button type="button" disabled="disabled" class="btn btn-info"  onclick="location.href = '<?php echo base_url(); ?>index.php/ipts_controller/ipts_pending_task_by_C_N'">Client Name</button> &nbsp;-->
                    <!--<button type="button" class="btn btn-danger" onclick="location.href = '<?php echo base_url(); ?>index.php/welcome/search_cs_pending_task_by_CTID_SR'">Date Range</button>-->

                </div>
                <div class="col-lg-3">

                    <br>
                </div>

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
                          
                            <th>ORG Name</th>
                            <th>Ticket-ID</th>
                            <th>Start Time</th>
                            <th>Incident-For</th> 
                            <th>Incident-Type</th> 
                            <th>Incident-Name</th>
                            <th>Incident-Specification</th>
                            <th>Provider</th>
                            <th>SCR / Circuit ID</th>
                            <th>ETR</th>
                            <th>RFO</th>
                            <th>Informed-To</th>
                            <th>Informed-Time</th>
                            <th>SMS</th>
                            <th>Email</th>
                            <th>Comments</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>                       
<?php
//      echo '<pre>';
//      print_r($pending_task_result);
//foreach ($pending_list_result as $value) {
//if(isset($results)){
//    echo 'VALUE';


  foreach ($pending_task_result as $value) {  
   $id=$value['id'];
    ?>  

                            <tr> 
                                <td><?php echo $value['organisation']; ?></td>
                                <td><b><?php echo $tki=$value['tki']; ?></b></td>
                                <td><b><?php echo $value['in_Occurred']; ?></b></td>
                                <td><?php echo $value['incident_for']; ?></td>
                                <td><?php echo $value['type']; ?></td>
                                <td><b><?php echo $value['Name']; ?></b></td>
                                <td><?php echo $value['Specification']; ?></td>
                                <td><?php echo $value['Vendor']; ?> </td>
                                <td><?php echo $value['scr_curt_id']; ?></td>
                                <td><?php echo $value['etr']; ?></td>
                                <td><?php echo $value['rfo']; ?></td>
                                <td><b><?php echo $value['informed_id']; ?></b></td>
                                <td><?php echo $value['informed_time']; ?></td>
                                 
                                
                                
                                
                                <td><?php  $sms=$value['sms']; if($sms=='1'){ echo 'YES'; }else{ echo 'NO'; } ?></td>
                                 
                                <td><?php  $email=$value['email'];  if($email=='1'){ echo 'YES'; }else{ echo 'NO'; }  ?></td>
                                
                                

                               
                               
                               
                              
                                <td>
                                     <?php  
//                                   echo '<pre>';
//                                  print_r($comments_result);                                   
//                                      if($comments_result != null){                                     
//                                        foreach ($comments_result as $comments_value) {
//                                          $tki_c=$comments_value->tki;
//                                         if($tki == $tki_c){
//                                              echo $comments_value->comments;
//                                         }  
//                                      }
//                                    } 
                                    echo '<b>Frist Comment </b>: '. $value['pri_find'].'<br>'; 
                                    echo '<b>Last Comment </b>: '. $value['comments'];
                                ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>index.php/nmc_c/nmc_efrom/<?php echo $value['id']; ?>"><button>Edit</button></a><br><br>
                                    <a href="<?php echo base_url(); ?>index.php/nmc_c/done_task/<?php echo $value['id']; ?>"><button>Done Task</button></a><br><br>
                                    <a href="<?php echo base_url(); ?>index.php/nmc_c/nmc_comments/<?php  echo $value['tki']; ?>"><button>Comments</button></a>
                                    </td>
                            </tr>    
<?php }

//         }else{
//   echo '<b>NO Pending Task Available ... </b>';
//} ?>
                              
                    </tbody>
                </table>
                <div class="col-lg-5"></div>
                <div class="col-lg-5">
                    
                    
                    
<?php // echo $links; ?>
                </div>
            </div>
        </div>

    </div>

</div>