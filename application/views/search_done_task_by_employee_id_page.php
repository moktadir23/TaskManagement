<?php
            $sql = "SELECT * FROM task_info_table ";

            if (isset($_POST['search'])) {

                $search_term = mysql_real_escape_string($_POST['search-box']);

                $sql .= "WHERE id = '{$search_term}' ";
            }

            $query = mysql_query($sql) or die(mysql_error());
            ?>
<div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Search BY ID
                        </h1>
                            
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Report List                                
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        
                        <div class="row">
                            <form action="<?php echo base_url();?>index.php/welcome/search_done_task_by_employee_id_funcation" method="post" >
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label>Search </label>
                                        <input type="text" name="search-box" class="form-control" placeholder="Search"/>
                                        <br>
                                        <input type="submit" name="search" class="form-control" value="submit Botton"/>
<!--                                        <button type="submit" name="search" class="btn btn-default" value="save">Search</button>-->
                                    </div>
                                </div>
                                </br>
                                
                        </form>
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
                                        <td><?php echo $values['transfer_to']; ?></td>
                                        <td><?php echo $values['start_date']; ?></td>
                                        <td><?php echo $values['transfer_date']; ?></td>
                                        <td><?php echo $values['end_date']; ?></td>
                                        <td><?php echo $values['states']; ?></td>
                                        <td><?php echo $values['comments']; ?></td>
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