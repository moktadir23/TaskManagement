<div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Pending Task List.!
                        </h1>
                            
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Report List
                                
                            </li>
                        </ol>
                        <?php
    $message=$this->session->userdata('message');
    if(isset($message))
    {
        echo $message;
        $this->session->unset_userdata('message');
    }
    ?>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        
<!--                        <div class="row">
                       
                            <div class="col-lg-3" style="">
                               <h4>  ID :  <a href="#">  <?php echo $_SESSION["id"];?> </a> </h4>
                            </div>                           

                            <div class="col-lg-5">
                               <h4>   Name : <?php echo $_SESSION["name"];?></h4>
                            
                            </div>
                            <div class="col-lg-4">
                               <h4>  Department : <?php echo $_SESSION["department"];?> </h4>
                            </div>
                            <div class="col-lg-4">
                               Designation : Support Engineer
                            </div>
                        </div>-->
                        
                        
                        
                        <div class="row">
                            <div class="col-lg-4" style="">
                               
                            </div>
                            <div class="col-lg-6">
<!--                                <h2>Daily Report List</h2>-->
<br>
                            </div>
                            <div class="col-lg-3">
                               
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name </th>
                                        <th>Type Task</th>
                                        <th>Sub Task</th>
                                         <th>Client / BTS / Provider Name</th>
                                        <th>MIS / MQ Ticket ID </th>
                                        <th>Assign By</th>
                                        <th>Transfer from</th>
                                        <th>Start Date</th>
                                        <th>Transfer Date</th>
                                        <!--<th>End Date</th>-->                                        
                                        <th>Status</th>
                                        <th>Pending Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
//      echo '<pre>';
//      print_r($result);
   foreach ($result as $key=>$values)
   {
?>  
                                    
                                    <tr>
                                        <!--<td><?php //echo $values['ticket_no']; ?></td>-->
                                        <td><?php echo $values['id']; ?></td>
                                        <td><?php echo $values['name']; ?></td>
                                        <td><?php echo $values['type_task']; ?></td>
                                        <td><?php echo $values['sub_task']; ?></td>
                                        <td><?php echo $values['client_bts_provider_name']; ?></td>
                                        <td><?php echo $values['mis_mq_ticket_id']; ?></td>
                                        <td><?php echo $values['assign_by']; ?></td>
                                        <td><?php echo $values['transfer_from']; ?></td>
                                        <td><?php echo $values['start_date']; ?></td>
                                        <td><?php echo $values['transfer_date']; ?></td>
                                        <!--<td><?php echo $values['end_date']; ?></td>-->
                                        <td><?php echo $values['states']; ?></td>
                                        
                                        <td>
                                            <?php

//8$datetime1 = date_create('2016-2-1');
$datetime1 = $values['start_date'];
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
                                        <td>
                                           
                                           <a href="<?php echo base_url() ;?>index.php/welcome/new_comments_funcation/<?php echo $values['ticket_no']; ?>"><button>Comments</button></a> &nbsp;                                           
                                           <!--<a href="<?php echo base_url() ;?>index.php/welcome/view_comments_funcation/<?php echo $values['ticket_no']; ?>">View Comments</a> &nbsp;|-->
                                            <!--<a href="<?php echo base_url() ;?>index.php/welcome/edit_task_done_funcation/<?php echo $values['ticket_no']; ?>">Done Task </a>-->
                                            <a href="<?php echo base_url() ;?>index.php/welcome/update_task_done_funcation/<?php echo $values['ticket_no']; ?>"><button>Done Task</button></a>  &nbsp;                                         
                                            <a href="<?php echo base_url() ;?>index.php/welcome/edit_task_transfe_funcation/<?php echo $values['ticket_no']; ?>" onclick="return check_transfer(); "><button>Transfer Task</button></a>                                                                                                                               
                                            
                                        
                                        </td>   
                                    </tr>
<?php
    }
?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
                <!-- /.row -->

                
                <!-- /.row -->

                
                <!-- /.row -->

            </div>