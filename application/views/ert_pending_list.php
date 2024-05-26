
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                ERT Pending Task List
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
                    <button type="button" class="btn btn-primary" onclick="location.href = '<?php echo base_url(); ?>index.php/ert_controller/ERT_pending_task_by_id'" /> Employee ID</button> &nbsp;
                    <button type="button" class="btn btn-success"  onclick="location.href = '<?php echo base_url(); ?>index.php/ert_controller/ERT_pending_task_by_sub_zone'">Support Office</button> &nbsp;
                    <!--<button type="button" class="btn btn-info"  onclick="location.href = '<?php echo base_url(); ?>index.php/welcome/search_cs_pending_task_by_Client_ID'">Client ID</button> &nbsp;-->
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
                            <th>Client Address</th>
                            <th>Client Contact</th>
                            <th>Client Type</th>
                            <th>Zone</th>
                            <th>Entity</th>
                            <th>CTID /SR </th>
                            <th>Task Type</th>                                       
                            <th>Assign By</th>
                            <th>Employee Name</th>
                            <th>Employee ID</th>
                            <th>Technician Name</th>
                            <th>Start Date</th>
                            <th>Status</th>
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
   $p_key=$value['p_key'];
    ?>  

                            <tr> 

                                <td><?php echo $value['Client_id']; ?></td>
                                <td><?php echo $value['Client_Name']; ?></td>
                                <td><?php echo $value['Client_Address']; ?></td>
                                <td><?php echo $value['Client_Contact']; ?></td>
                                <td><?php echo $value['Client_Category']; ?></td>
                                <td><?php echo $value['Zone']; ?></td>
                                <td><?php echo $value['Sub_Zone']; ?></td>
                                <td><?php echo $value['CTID_SR']; ?></td>
                                <td><?php echo $value['type_task']; ?></td>
                                <td><?php echo $value['assign_by']; ?></td>
                                <td><?php echo $value['employee_name']; ?></td>
                                <td><?php echo $value['employee_id']; ?></td>
                                <td><?php echo $value['Technician_Name']; ?></td>
                                <td><?php echo $value['s_date']; ?></td>
                                <td><?php echo $value['Status']; ?></td>
                             
                                
<!--                            <td><?php echo $value->Client_id; ?></td>
                                <td><?php echo $value->Client_Name; ?></td>
                                <td><?php echo $value->Client_Address; ?></td>
                                <td><?php echo $value->Client_Contact; ?></td>
                                <td><?php echo $value->Client_Category; ?></td>
                                <td><?php echo $value->Zone; ?></td>
                                <td><?php echo $value->Sub_Zone; ?></td>
                                <td><?php echo $value->CTID_SR; ?></td>
                                <td><?php echo $value->type_task; ?></td>
                                <td><?php echo $value->assign_by; ?></td>
                                <td><?php echo $value->employee_name; ?></td>
                                <td><?php echo $value->employee_id; ?></td>
                                <td><?php echo $value->Technician_Name; ?></td>
                                <td><?php echo $value->s_date; ?></td>
                                <td><?php echo $value->Status; ?></td>-->
                                
                                
                                
                                
                             

                                
                                <td>
                                    <!--<a href="<?php echo base_url(); ?>index.php/welcome/CS_edit_task/<?php // echo $value['p_key']; ?>"><button>Edit</button></a> &nbsp;-->
                                    <a href="<?php echo base_url(); ?>index.php/ert_controller/ERT_new_comments/<?php echo $value['p_key']; ?>"><button>UPDATE</button></a> &nbsp;
                                    <!--<a href="<?php echo base_url(); ?>index.php/welcome/cs_pending_task/<?php echo $value['p_key']; ?>"><button>Done Task </button></a> &nbsp;--> 
                                    <!--<a href="<?php echo base_url(); ?>index.php/welcome/cs_task_transfer_funcation/<?php echo $value['p_key']; ?>" onclick="return check_transfer();"><button>Transfer Task</button> </a>-->
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
                    
                    
                    
<?php //   echo $links; ?>
                </div>
            </div>
        </div>

    </div>

</div>