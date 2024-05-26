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
                                        <th>Task</th>
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
//      print_r($results);
//   foreach ($result as $values)
       foreach ($results as $value)
   {
?>  
                                    
                                    <tr> 
                                         <td><?php echo $value->id; ?></td>
                                         <td><?php echo $value->type_task; ?></td>
                                         <td><?php echo $value->sub_task; ?></td>
                                         <td><?php echo $value->assign_by; ?></td>
                                         <td><?php echo $value->transfer_to; ?></td>
                                         <td><?php echo $value->start_date; ?></td>
                                         <td><?php echo $value->transfer_date; ?></td>
                                         <td><?php echo $value->end_date; ?></td>
                                         <td><?php echo $value->states; ?></td>
                                         <td><?php echo $value->comments; ?></td>
                                         
                                        <td>
                                                
                                            <a href="<?php echo base_url() ;?>index.php/welcome/edit_task_transfe_funcation/<?php echo $value->task_info_id; ?>" onclick="return check_transfer(); "><i class="fa fa-exchange"></i> </a> &nbsp;|&nbsp;                                                                                                                              
                                            <a href="<?php echo base_url() ;?>index.php/welcome/edit_report_list_funcation/<?php echo $value->task_info_id; ?>"><i class="fa fa-pencil-square-o"></i></a> &nbsp;|&nbsp;
                                            <a href="<?php echo base_url(); ?>index.php/welcome/delete_report_list_funcation/<?php echo $value->task_info_id; ?>"  onclick="return check_delete(); "><i class="fa fa-trash"></i>
                                        
                                        </td>   
                                    </tr>
<?php
    }
?>

                                </tbody>
                            </table>
                            
                            
                           
                                <div class="col-lg-5"></div>
                                <div class="col-lg-5">
<!--                                    <div id="pagination">-->
                                        <?php echo $links; ?>
<!--                                    </div>-->
                               
                                
                                
                                
                                
                                
                                
                                </div>
                            </div>    
                
                    </div>
                    
                </div>
 
            </div>