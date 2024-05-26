<div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           FONOC Pending List
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
                                <button type="button" class="btn btn-primary" onclick="location.href='<?php echo base_url(); ?>index.php/link3_controller/fonoc_pending_data_by_id'" /> Employee ID</button> &nbsp;
<!--                                <button type="button" class="btn btn-success"  onclick="location.href='<?php echo base_url(); ?>index.php/welcome/pending_data_by_type_of_task_funcation.html'">Type of Task</button> &nbsp;
                                <button type="button" class="btn btn-info"  onclick="location.href='<?php echo base_url(); ?>index.php/welcome/pending_data_by_mis_mq_id.html'">MIS/MQ ID</button> &nbsp;-->
                                <button disabled="disabled" type="button" class="btn btn-success" onclick="location.href='<?php echo base_url(); ?>index.php/link3_controller/fonoc_pending_data_by_id'">Date Range</button>
                             </div>
                            <div class="col-lg-3">
                                
<br>
                            </div>
                            
                        </div>
                        
                        
                         <div class="row">
                            <div class="col-lg-3">
<!--                               <form action="<?php echo base_url();?>index.php/welcome/search_by_id_pending_list" method="post">
                                    <div class='row'> 
                                      <div class="col-lg-12">
                                          <div class="form-group">
                                              <label>Search</label>
                                              <input class="form-control" name="id" placeholder="Enter id">
                                          </div>
                                      </div>

                                    </div> 
                                    <div class="row">
                                          <div class="col-lg-3">
                                    <button type="submit" class="btn btn-default" value="save">Search </button>
                                      </div>
                                    </div>   
                                </form>   -->
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
                                        <th>BTS Name</th>
                                        <th>OLT Name</th>
                                        <th>ONU Model</th>
                                        <th>Client ID</th>
                                        <th>Client Name</th>
                                        <th>Client Category </th>
                                        <th>Problem Category </th>
                                        <!--<th>Assign By</th>-->                                        
                                        <th>Start Date</th>                                                                                                               
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
                                        <td><?php echo $value->employee_id; ?> (<?php echo $value->employee_name; ?>)</td>
                                        <td><?php echo $value->BTS_Name; ?></td>
                                        <td><?php echo $value->OLT_Name; ?></td>
                                        <td><?php echo $value->ONU_Model; ?></td>
                                        <td><?php echo $value->Client_ID; ?></td>
                                        <td><?php echo $value->Client_Name; ?></td>
                                        <td><?php echo $value->Client_Category; ?></td>
                                        <td><?php echo $value->Problem_Catagory; ?></td>
                                        <!--<td></td>-->
                                        <td><?php echo $value->start_date; ?></td>
                                        <td><?php echo $value->status; ?></td>
                                        <td>
                                        <!--<a href="<?php echo base_url() ;?>index.php/welcome/new_comments_funcation/<?php echo $value->p_key; ?>">Comments</a> &nbsp;|-->
                                       <a href="<?php echo base_url() ;?>index.php/link3_controller/fonoc_edit_task_done/<?php echo $value->p_key; ?>">  <button> Done Task</button> </a>
                                        <!--<a href="<?php echo base_url() ;?>index.php/welcome/edit_task_transfe_funcation/<?php echo $value->p_key; ?>" onclick="return check_transfer(); ">Transfer Task </a>-->
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