
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                IPTS Team: Pending Task List
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
                    <button type="button" class="btn btn-primary" onclick="location.href = '<?php echo base_url(); ?>index.php/ipts_controller/ipts_pending_task_by_id'" /> Employee ID</button> &nbsp;
                    <button type="button" class="btn btn-success"  onclick="location.href = '<?php echo base_url(); ?>index.php/ipts_controller/ipts_pending_task_by_date'">Date Range</button> &nbsp;
                    <button type="button" class="btn btn-info"  onclick="location.href = '<?php echo base_url(); ?>index.php/ipts_controller/ipts_pending_task_by_C_N'">Client Name</button> &nbsp;
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
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          
                            <th>Client ID</th>
                            <th>Client Name</th>
                            <th>TKI ID </th>
                            <th>Task Type</th>                                       
                            <th>Initial Problem Category</th>
                            <th>Employee ID (Name)</th>                          
                            <th>Start Date</th>
                            <th>Support type</th>
                           
                            <th>Status</th>
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
   $p_key=$value->p_key;
    ?>  

                            <tr> 

                            
                                <td><?php echo $value->Client_id; ?></td>
                                <td><?php echo $value->Client_Name; ?></td>
                                <td><?php echo $value->tki_id; ?></td>
                                <td><?php echo $value->type_task; ?></td>
                                <td><?php echo $value->Initial_Problem_Category; ?></td>
                                <td><?php echo $value->Engineer_Name; ?> ( <?php echo $value->Engineer_ID; ?> )</td>
     
                                <td><?php echo $value->s_date; ?></td>
                                <td><?php echo $value->support_type; ?></td>
                              
                               
                                <td><?php echo $value->status; ?></td>
                                <td><?php echo $value->comments; ?></td>
                                
                             

                                
                                <td>
                                    <!--<a href="<?php echo base_url(); ?>index.php/welcome/CS_edit_task/<?php // echo $value['p_key']; ?>"><button>Edit</button></a> &nbsp;-->
                                    <a href="<?php echo base_url(); ?>index.php/ipts_controller/ipts_done_task_from/<?php echo $value->p_key; ?>"><button>Done Task</button></a> &nbsp;
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
                    
                    
                    
<?php echo $links; ?>
                </div>
            </div>
        </div>

    </div>

</div>