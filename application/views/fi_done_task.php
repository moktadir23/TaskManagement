
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                 Fiber INFRA : Done Task List
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
                    <button type="button" class="btn btn-primary" onclick="location.href = '<?php echo base_url(); ?>index.php/fi_controller/fi_done_task_search'" /> Work Schedule </button> &nbsp;
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
                            
                            <th>Status</th>
                            <th>Physical link up Engineer</th>
                            <th>Handover Engineer</th>
                            <th>Physical link up Technician</th>
                            <th>Handover Technician</th>
                            
                            <th>Cable Type ID</th>
                            <th>Cable Start meter</th>
                            <th>Cable End meter</th>
                            <th>Cable qty</th>
                            <th>Device model</th>
                            <th>serial No</th>
                            <th>MAC</th>
                            <th>TJ</th>
                            <th>Patch Cord Qty</th>
                            <th>Cable Tie Qty</th>
                            <th>Rj45 Qty</th>
                            <th>Sale_Order_Number</th>
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
                                <td><?php echo $value->work_status; ?></td>
                                

                                <td>   
                                <?php  
                                 foreach ($engineer_result as $e_value) {  
                                   $e_pkey=$e_value['p_key'];
                                   $e_task_type=$e_value['task_type'];
                                  if($e_pkey==$p_key){
                                      if($e_task_type=='link_up'){
                                      
                                          echo $e_value['Engineer_ID'].'('.$e_value['Engineer_name'].')<br>';
                                      }
                                  }
                                 }  
                                ?>  
                                  
                                </td>  
                                <td>   
                                <?php   
                                 foreach ($engineer_result as $e_value) {  
                                   $e_pkey=$e_value['p_key'];
                                   $e_task_type=$e_value['task_type'];
                                  if($e_pkey==$p_key){
                                      if($e_task_type=='handover'){
                                      
                                          echo $e_value['Engineer_ID'].'('.$e_value['Engineer_name'].')<br>';
                                      }
                                  }
                                }
                                ?>  
                                  
                                </td>
                                 
                                <td>   
                                <?php   
                                 foreach ($technician_result as $t_value) {  
                                   $t_pkey=$t_value['p_key'];
                                   $t_task_type=$t_value['task_type'];
                                  if($t_pkey==$p_key){
                                      if($t_task_type=='link_up'){
                                      
                                          echo $t_value['Technician_name'].'<br>';
                                      }
                                  }
                                }
                                ?>  
                                  
                                </td> 
                               <td>   
                                <?php   
                                 foreach ($technician_result as $t_value) {  
                                   $t_pkey=$t_value['p_key'];
                                   $t_task_type=$t_value['task_type'];
                                  if($t_pkey==$p_key){
                                      if($t_task_type=='handover'){
                                      
                                          echo $t_value['Technician_name'].'<br>';
                                      }
                                  }
                                }
                                ?>  
                                  
                                </td>
                                <td><?php echo $value->Cable_Type_ID; ?></td>
                                <td><?php echo $C_start=$value->Cable_Start_meter; ?></td>
                                <td><?php echo $C_end=$value->Cable_End_meter; ?></td>
                                <td>
                                    <?php 
                                        $Cable_qty=$C_start-$C_end;
                                        if($Cable_qty < 0){
                                            $Cable_qty= (-1) * $Cable_qty;
                                            echo $Cable_qty;
                                        }else{
                                            echo $Cable_qty;
                                        }
                                         
                                    ?>
                                </td>
                                <td><?php echo $value->Device_model; ?></td>
                                <td><?php echo $value->serial_No; ?></td>
                                <td><?php echo $value->MAC; ?></td>
                                <td><?php echo $value->TJ; ?></td>
                                <td><?php echo $value->Patch_Cord_Qty; ?></td>
                                <td><?php echo $value->Cable_Tie_Qty; ?></td>
                                <td><?php echo $value->Rj45_Qty; ?></td>
                                <td><?php echo $value->Sale_Order_Number; ?></td>
                              
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