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
<!--                        <form action="<?php echo base_url();?>index.php/welcome/select_by_date_range" method="post" >
                            <div class="row">
                                <div class="row">
                                    <div class="col-lg-3"><h3>Find Task..</h3></div>
                                </div>
                                <div class="col-lg-4">
                                    <label>From Date</label>
                                    <input type="date" name="date_from" id="start_date_id" class="form-control" placeholder="Enter from Date"/>
                                </div>
                                <div class="col-lg-4">
                                    <label>To Date</label>
                                    <input type="date" name="date_to" id="end_date_id" class="form-control" placeholder="Enter To Date"/>
                                </div>
                            </div>
                            </br>
                            <div class="row">
                                <div class="col-lg-3">
                                    <button type="submit" class="btn btn-default" value="save">Search</button>
                             </div>
                            </div>
                        </form>-->
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
                                        <th>Sub-Task</th>
                                        <th>Assign By</th>
                                        <th>Transfer From</th>
                                        <th>Start Date</th>
                                        <th>Transfer Date</th>
                                        <th>End Date</th>                                        
                                        <th>Status</th>
                                        <!--<th>Comments</th>-->
<!--                                        <th>Action</th>-->
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
                                        <td><?php echo $values['transfer_from']; ?></td>
                                        <td><?php echo $values['start_date']; ?></td>
                                        <td><?php echo $values['transfer_date']; ?></td>
                                        <td><?php echo $values['end_date']; ?></td>
                                        <td><?php echo $values['states']; ?></td>
                                        <!--<td><?php echo $values['comments']; ?></td>-->
<!--                                        <td>
                                           
                                            <a href="<?php echo base_url() ;?>index.php/welcome/edit_task_done_funcation/<?php echo $values['task_info_id']; ?>"><i class="fa fa-check-square-o"></i> </a> &nbsp;|                                           
                                            <a href="<?php echo base_url() ;?>index.php/welcome/edit_task_transfe_funcation/<?php echo $values['task_info_id']; ?>" onclick="return check_transfer(); "><i class="fa fa-exchange"></i> </a><br>                                                                                                                               
                                            <a href="<?php echo base_url() ;?>index.php/welcome/edit_report_list_funcation/<?php echo $values['task_info_id']; ?>"><i class="fa fa-pencil-square-o"></i></a> &nbsp;|&nbsp;
                                            <a href="<?php echo base_url(); ?>index.php/welcome/delete_report_list_funcation/<?php echo $values['task_info_id']; ?>"  onclick="return check_delete(); "><i class="fa fa-trash"></i>
                                        
                                        </td>   -->
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