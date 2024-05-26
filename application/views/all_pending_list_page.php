<div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           NOC Pending List
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        
                        <div class="row">
                            <div class="col-lg-9" style="">
                               <b> search by :</b> &nbsp;<button type="button" class="btn btn-primary" onclick="location.href='<?php echo base_url(); ?>index.php/welcome/pending_data_by_id.html'" /> Employee ID</button> &nbsp;
                                <?php $user_type = $this->session->userdata('u_type'); if($user_type=='a_user' || $user_type=='admin'){?> 
                                <button type="button" class="btn btn-success"  onclick="location.href='<?php echo base_url(); ?>index.php/welcome/pending_data_by_type_of_task_funcation.html'">Type of Task</button> &nbsp;
                                <button type="button" class="btn btn-info"  onclick="location.href='<?php echo base_url(); ?>index.php/welcome/pending_data_by_mis_mq_id.html'">MIS/MQ ID</button> &nbsp;
                                <button type="button" class="btn btn-danger" onclick="location.href='<?php echo base_url(); ?>index.php/welcome/pending_data_by_date_range.html'">Date Range</button>
                                <?php }?>       
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
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID (Name)</th>
                                      
                                        <th>Priority Type</th>
                                        <th>Type Task</th>
                                        <th>Sub-Task</th>
                                        <th>Client / BTS / Provider Name</th>
                                        <th>MIS / MQ Ticket ID </th>
                                        <th>Assign By</th>
                                        <!--<th>Transfer From</th>-->
                                        <th>Start Date</th>                                       
                                        <!--<th>Transfer Date</th>-->
                                        <th>Pending Time</th>
                                        <th>States</th>
                                        <th>Action</th>
<!--                                        <th>Status</th>
                                        <th>Comments</th>
                                        <th>Action</th>-->
                                    </tr>
                                </thead>
                                <tbody>
<?php
//      echo '<pre>';
//      print_r($results);
   foreach ($results as $value)
   {
?>  
                                    
                                    <tr> 
                                        <td><?php echo $value->id; ?> (<?php echo $value->name; ?>)</td>
                                        <td><?php echo $value->priority_type; ?></td>
                                        <td><?php echo $value->type_task; ?></td>
                                        <td><?php echo $value->sub_task; ?></td>
                                        <td><?php echo $value->client_bts_provider_name; ?></td>
                                        <td><?php echo $value->mis_mq_ticket_id; ?></td>
                                        <td><?php echo $value->assign_by; ?></td>
                                        <!--<td><?php echo $value->transfer_from; ?></td>-->
                                        <td><?php echo $value->start_date; ?></td>
                                        <!--<td><?php echo $value->transfer_date; ?></td>-->
                                        <td>
                                            <?php

//8$datetime1 = date_create('2016-2-1');
$datetime1 = $value->start_date;
$datetime2 = date("d-m-Y");
//$interval = date_diff($datetime1, $datetime2);
$dt1 = strtotime($datetime1);
$dt2 = strtotime($datetime2);

$seconds_diff = $dt2 - $dt1;
$interval = floor($seconds_diff/3600/24);

echo $interval. "&nbsp;day ";
//echo date("d-m-Y");
?>
                                        </td>
                                        <td><?php echo $value->states; ?></td>
                                        <td><a href="<?php echo base_url() ;?>index.php/welcome/new_comments_funcation/<?php echo $value->ticket_no; ?>"><button>Comments</button></a> <br><br>
                                        <a href="<?php echo base_url() ;?>index.php/welcome/edit_task_done_funcation/<?php echo $value->ticket_no; ?>"><button>Done Task</button></a><br><br>
                                        <a href="<?php echo base_url() ;?>index.php/welcome/edit_task_transfe_funcation/<?php echo $value->ticket_no; ?>" onclick="return check_transfer(); "><button>Transfer Task</button> </a>
                                        </td>
 
<?php
    }
?>

                                </tbody>
                            </table>
                            
                            
                            <div class="col-lg-5"></div>
                                <div class="col-lg-5">
                                        <?php echo $links; ?>
                                </div>
                        </div>
                    </div>
                    
                </div>
                <!-- /.row -->

                
                <!-- /.row -->

                
                <!-- /.row -->

            </div>