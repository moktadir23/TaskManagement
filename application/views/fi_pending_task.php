
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                 Fiber INFRA : Pending Task List
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
                    <button type="button" class="btn btn-primary" onclick="location.href = '<?php echo base_url(); ?>index.php/fi_controller/fi_pending_task_search'" /> Work Schedule </button> &nbsp;
                    <!--<button type="button" disabled="disabled" class="btn btn-success"  onclick="location.href = '<?php echo base_url(); ?>index.php/wi_controller/wi_pending_task_by_bts'">Date Range</button> &nbsp;-->
                    <!--<button type="button" disabled="disabled" class="btn btn-info"  onclick="location.href = '<?php echo base_url(); ?>index.php/wi_controller/search_cs_pending_task_by_Client_ID'">Client ID</button> &nbsp;-->
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
                          
                            <th>TKI Receive Date </th>
                            <th>Client ID</th>
                            <th>Client Name</th>
                            <th>Client Category </th>
                            <th>Contact Number</th>   
                            <th>Contact Address</th>
                            <th>TKI ID</th>
                            <th>Type Task</th>                          
                            <th>Work Schedule</th>
                            <th>Support Office</th>  
                            <th>Connection Type</th>
                            <th>Priority Status</th>
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

                            
                                <td><?php echo $value->TKI_Receive_Date_time; ?></td>
                                <td><?php echo $value->Client_id; ?></td>
                                <td><?php echo $value->Client_Name; ?></td>
                                <td><?php echo $value->Client_Category; ?></td>
                                <td><?php echo $value->C_Contact_number; ?></td>
                                <td><?php echo $value->Client_Address; ?></td>
                                <td><?php echo $value->tki_id; ?></td>
                                <td><?php echo $value->type_task; ?></td>
                                <td><?php echo $value->Work_Schedule; ?></td>
                                <!--<td><?php echo $value->Zone; ?></td>-->
                                <td><?php echo $value->Support_Office; ?></td>
                                <td><?php echo $value->Connection_Type; ?></td>
                                <td><?php echo $value->Priority_Status; ?></td>
                             

                                
                                <td>
                                    <?php
                                     $status=$value->status; 
                                     $type_task=$value->type_task;
                                     if($status=='1' && $type_task=='Troubleshoot'){ 
                                    ?>
                                    <a href="<?php echo base_url(); ?>index.php/fi_controller/fi_link_from/<?php echo $value->p_key; ?>">
                                        <button class="btn btn-success" >Troubleshoot</button>
                                    </a> &nbsp;
                                     <?php } elseif ($status=='2') {  ?>
                                     <a href="<?php echo base_url(); ?>index.php/fi_controller/fi_handover_from/<?php echo $value->p_key; ?>">
                                         <button class="btn btn-warning" >Update Handover </button>
                                     </a> &nbsp;
                                    
                                     <?php } elseif ($status=='3') {  ?> 
                                     <a href="<?php echo base_url(); ?>index.php/fi_controller/fi_accessories_from/<?php echo $value->p_key; ?>">
                                         <button class="btn btn-info">Update Accessories</button>
                                     </a> &nbsp;                                    
                                   
                                    <?php } elseif ($status=='1') {  ?> 
                                     <a href="<?php echo base_url(); ?>index.php/fi_controller/fi_link_from/<?php echo $value->p_key; ?>">
                                         <button class="btn btn-danger" >Update Physical Link </button>
                                     </a> &nbsp;<br>
                                     <a href="<?php echo base_url(); ?>index.php/fi_controller/fi_edit_from/<?php echo $value->p_key; ?>">
                                         <button class="btn btn-default">Edit </button>
                                     </a> &nbsp; 
                                  <?php } ?>
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