
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                CS Done Task List
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
                    <button type="button" class="btn btn-primary" onclick="location.href = '<?php echo base_url(); ?>index.php/welcome/search_cs_done_task_by_Employee_ID'" /> Employee ID</button> &nbsp;
                    <button type="button" class="btn btn-success"  onclick="location.href = '<?php echo base_url(); ?>index.php/welcome/search_cs_done_task_by_Zone'">Support Office</button> &nbsp;
                    <button type="button" class="btn btn-info"  onclick="location.href = '<?php echo base_url(); ?>index.php/welcome/search_cs_done_task_by_Client_ID'">Client ID</button> &nbsp;
                    <button type="button" class="btn btn-danger" onclick="location.href = '<?php  echo base_url(); ?>index.php/welcome/search_cs_done_task_by_CTID_SR'">CTID Number/SR </button>
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
<!--            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Client ID</th>
                            <th>Client Name</th>
                            <th>Support Office</th>
                            <th>Client Category</th>
                            <th>Support Category</th>
                            <th>CTID Number SR</th>
                            <th>Initial Problem Category</th>
                            <th>Engineer Name</th>
                            <th>Assign time</th>                                       
                            <th>Support Time on TKI</th>
                            <th>TKI_Status</th>
                            <th>Support_Type</th>
                            <th>Final_Resolution</th>
                            <th>End Date</th>
                            <th>Technician_Name</th>
                                        <th>Status</th>
                            <th>Comments</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
//      echo '<pre>';
//      print_r($results);
foreach ($done_list_result as $value) {
    $p_key=$value->p_key;
    ?>  

                            <tr> 
                                <td><?php echo $value->Client_ID; ?></td>
                                <td><?php echo $value->Client_Name; ?></td>
                                <td><?php echo $value->Sub_Zone; ?></td>
                                <td><?php echo $value->Client_Category; ?></td>
                                <td><?php echo $value->Support_Category; ?></td>
                                <td><?php echo $value->CTID_Number_SR; ?></td>
                                <td><?php echo $value->Initial_Problem_Category; ?></td>
                                
                                <td><?php echo $value->Engineer_Name; ?></td>
                                
                                <td>
    <?php
//    $datetime1 = $value['start_date'];
//    $datetime2 = date("d-m-Y");
//    $dt1 = strtotime($datetime1);
//    $dt2 = strtotime($datetime2);
//    $seconds_diff = $dt2 - $dt1;
//    $interval = floor($seconds_diff / 3600 / 24);
//    echo $interval . "&nbsp;day ";
    ?>
                                <?php echo $value->start_date; ?>
                                </td>
                                
                                <td>
                                    
                                <?php 
                                $total_tki_time=0;
                                $total_time=0;
                                if( $tki_time_result != null ){
                                foreach ($tki_time_result as $t_value) {
                                    $t_p_key = $t_value['p_key'];
                                    if($t_p_key==$p_key){
                                        
                                       $work_time_start=$t_value['work_time_start'];
                                       $time1 = strtotime($work_time_start);
                                       
                                       $work_time_end=$t_value['work_time_end'];
                                       $time2 = strtotime($work_time_end);
                                       
                                      $tki_time = $time2 - $time1;   
                                      $total_tki_time += $tki_time;
//                                      $total_time= gmdate('H:i:s', $total_tki_time);
                                      
                                      
                                    }
                                   
                                }
                                
//                                if($total_tki_time > 0){
                                    
                                     $total_time= gmdate('H:i:s', $total_tki_time);
                                      echo $total_time;
//                                }
                                   
                                }else{
                                  echo 'N/A'; 
                                }
                                ?>
                                    
                                </td>
                                
                                
                                <td><?php echo $value->TKI_Status; ?></td>
                                <td><?php echo $value->Support_Type; ?></td>
                                <td><?php echo $value->Final_Resolution; ?></td>
                                <td><?php echo $value->end_date; ?></td>
                                <td><?php echo $value->Technician_Name; ?></td>
                                
<?php } ?>
                    </tbody>
                </table>
                <div class="col-lg-5"></div>
                <div class="col-lg-5">
<?php  echo $CS_done_links; ?>
                </div>
            </div>-->
        </div>

    </div>

</div>