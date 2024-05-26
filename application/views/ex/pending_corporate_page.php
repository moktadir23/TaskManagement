<div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Report List
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
                                        <th>Type Task</th>
                                        <th>Sub Task</th>
                                        <th>Assign By</th>
                                        <th>Transfer To</th>
                                        <th>Start Date</th>
                                        <th>Transfer Date</th>
                                        <th>End Date</th>                                        
                                        <th>Status</th>
                                        <th>Comments</th>
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
                                        <td><?php echo $values['id']; ?></td>
                                        <td><?php echo $values['type_task']; ?></td>
                                        <td><?php echo $values['sub_task']; ?></td>
                                        <td><?php echo $values['assign_by']; ?></td>
                                        <td><?php echo $values['transfer_to']; ?></td>
                                        <td><?php echo $values['start_date']; ?></td>
                                        <td><?php echo $values['transfer_date']; ?></td>
                                        <td><?php echo $values['end_date']; ?></td>
                                        <td><?php echo $values['states']; ?></td>
                                        <td><?php echo $values['comments']; ?></td>
                                        <td>
                                           
                                            <a href="<?php echo base_url() ;?>index.php/welcome/edit_task_done_funcation/<?php echo $values['task_info_id']; ?>"><i class="fa fa-check-square-o"></i> </a> &nbsp;|                                           
                                            <a href="<?php echo base_url() ;?>index.php/welcome/edit_task_transfe_funcation/<?php echo $values['task_info_id']; ?>" onclick="return check_transfer(); "><i class="fa fa-exchange"></i> </a><br>                                                                                                                               
                                            
                                        
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