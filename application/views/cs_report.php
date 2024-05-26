<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script> 
<?
session_start();
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              CS Report
            </h3>
            <ol class="breadcrumb">
                <!--<div class="col-lg-4"></div>-->
                <h3 class="text-center"><span id="info_span"></span></h3>
             
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <?php
   
        $from_date = $this->session->userdata('from_date');
        $to_date = $this->session->userdata('to_date');
        if (isset($from_date)) {
//            echo '.......'.$from_date;
//            echo '.......'.$to_date;
        }
        ?>
        <div class="col-lg-12">
 <form action="<?php echo base_url('index.php/welcome/cs_rept/'); ?>" name="search_by_zone" id="search_by_zone" method="POST"> 
     <input type="hidden" class="form-control" name="s_zone" id="s_zone" value="<?php echo $zone = $this->session->userdata('Zone'); ?>">
     <input type="hidden" class="form-control" name="s_support_ofc" id="s_support_ofc" value="<?php echo $support_ofc = $this->session->userdata('s_ofc'); ?>">
     <input type="hidden" class="form-control" name="user_type" id="user_type" value="<?php echo $user_type = $this->session->userdata('u_type'); ?>">
<div class="row">
    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label> Zone <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="Zone" id="Zone" onchange="chk_zone();">
                                <option value="0" >All Zone</option>
                            </select>
                        </div>
        </div>    
    <div class="col-lg-3" style="">
            <div class="form-group">
                <label>Support Office <div style="color:red;float: right;"></div></label>
                <select class="form-control" name="Sub_Zone" id="Sub_Zone" onchange="chk_s_ofc();">
                    <option value="0" >All Support Office</option>
                </select><br>                         
            </div>
        </div>
        
    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label> Engineer Name <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="Engineer_Name" onchange="pick_engineer_id();" id="Engineer_Name">
                                <option value="0" >Select Engineer Name</option>
                            </select>
                        </div>
        </div>    
    <div class="col-lg-3" style="">
            <div class="form-group">
                <label>Engineer ID <div style="color:red;float: right;"></div></label>
                <select class="form-control" name="Engineer_ID" id="Engineer_ID" >
                    <option value="0" >Select Engineer ID</option>
                </select><br>                         
            </div>
        </div>
</div> 
     <div class="row">
         <div class="col-lg-3">
            <label>From Date</label>
            <input type="" name="date_from" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="start_date_id" class="form-control" placeholder="Enter from Date" required=""/>
        </div>
        <div class="col-lg-3">
            <label>To Date</label>
            <input type="" name="date_to" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="end_date_id" class="form-control" placeholder="Enter To Date" required=""/>
        </div>
         <div class="col-lg-3"><br>
             <button type="submit" class="btn btn-default" value="save">Search</button>
        </div> 
</div>  
</form>  
            
            
            
            
            <br>
            
                <!--<div class="col-lg-12">-->
                    <?php
                    $total_troubleshoot = 0;
                    if ($troubleshoot_result != null) {

                        $bw_pro = 0;
                        $Device_Fault_pro = 0;
                        $IP_Blacklisted_pro = 0;
                        $IP_Change_pro = 0;
                        $IP_Phone_pro = 0;
                        $LAN_Support_pro = 0;
                        $Latency_High_pro = 0;
                        $Link_Down_pro = 0;
                        $Router_Configure_pro = 0;
                        $MQ_Login_Issue_pro = 0;
                        $Other_Problem_pro = 0;
                        $Packet_Loss_pro = 0;
                        $Mail_Problem_pro = 0;
                        $Plan_Change_pro = 0;
                        $Website_issue_pro = 0;
                        $Wifi_Problem_pro = 0;
                        $Link_Interruption_pro = 0;
                        $Password_Change_pro = 0;

                        foreach ($troubleshoot_result as $t_value) {
                            $bw_pro = $bw_pro + $t_value['Bandwidth_Problem'];
                            $Device_Fault_pro = $Device_Fault_pro + $t_value['Device_Fault'];
                            $IP_Blacklisted_pro = $IP_Blacklisted_pro + $t_value['IP_Blacklisted'];
                            $IP_Change_pro = $IP_Change_pro + $t_value['IP_Change'];
                            $IP_Phone_pro = $IP_Phone_pro + $t_value['IP_Phone_Problem'];
                            $LAN_Support_pro = $LAN_Support_pro + $t_value['LAN_Support'];
                            $Latency_High_pro = $Latency_High_pro + $t_value['Latency_High'];
                            $Link_Down_pro = $Link_Down_pro + $t_value['Link_Down'];
                            $Router_Configure_pro = $Router_Configure_pro + $t_value['Router_Configure'];
                            $MQ_Login_Issue_pro = $MQ_Login_Issue_pro + $t_value['MQ_Login_Issue'];
                            $Other_Problem_pro = $Other_Problem_pro + $t_value['Other_Problem'];
                            $Packet_Loss_pro = $Packet_Loss_pro + $t_value['Packet_Loss'];
                            $Mail_Problem_pro = $Mail_Problem_pro + $t_value['Mail_Problem'];
                            $Plan_Change_pro = $Plan_Change_pro + $t_value['Plan_Change'];
                            $Website_issue_pro = $Website_issue_pro + $t_value['Website_issue'];
                            $Wifi_Problem_pro = $Wifi_Problem_pro + $t_value['Wifi_Problem'];
                            $Link_Interruption_pro = $Link_Interruption_pro + $t_value['Link_Interruption'];
                            $Password_Change_pro = $Password_Change_pro + $t_value['Password_Change'];
                        }
                        $total_troubleshoot = $bw_pro + $Device_Fault_pro + $IP_Blacklisted_pro + $IP_Change_pro + $IP_Phone_pro + $LAN_Support_pro + $Latency_High_pro + $Link_Down_pro +
                                $Router_Configure_pro + $MQ_Login_Issue_pro + $Other_Problem_pro + $Packet_Loss_pro + $Mail_Problem_pro + $Plan_Change_pro + $Website_issue_pro +
                                $Wifi_Problem_pro + $Link_Interruption_pro + $Password_Change_pro;
                        
                        $bardataPoints = array(
                        array("y" => $bw_pro, "label" => "BW Problem"),
                        array("y" => $Device_Fault_pro, "label" => "Device Fault"),
                        array("y" => $Wifi_Problem_pro, "label" => "Wifi Problem"),    
                        array("y" => $IP_Change_pro, "label" => "IP Change"),
                        array("y" => $Link_Down_pro, "label" => "Link Down"),
                        array("y" => $IP_Phone_pro, "label" => "IP Phone Problem"),
                        array("y" => $LAN_Support_pro, "label" => "LAN Support"),
                        array("y" => $Latency_High_pro, "label" => "Latency High"),  
                        array("y" => $Link_Interruption_pro, "label" => "Link Interruption"),    
                        array("y" => $MQ_Login_Issue_pro, "label" => "MQ Login Issue"),
                        array("y" => $Other_Problem_pro, "label" => "Other Problem"),
                        array("y" => $Packet_Loss_pro, "label" => "Packet Loss"),
                        array("y" => $Password_Change_pro, "label" => "Password Change"),
                        array("y" => $Plan_Change_pro, "label" => "Plan Change"),
                        array("y" => $Website_issue_pro, "label" => "Website Issue"),
                        array("y" => $IP_Blacklisted_pro, "label" => "IP Blacklisted"),
                        array("y" => $Router_Configure_pro, "label" => "Router Configure"),   
                        array("y" => $Mail_Problem_pro, "label" => "Mail Problem")
                        );
                    }
                   
                    ?> 

<?php
$int_total=0;

$BANK_instllation = 0;
$CORPORATE_instllation = 0;
$nbfi_instllation = 0;
$COMPLEMENTARY_instllation = 0;
$mq_instllation = 0;
$retail_c_instllation = 0;
$retail_h_instllation = 0;
$link3_own_installation = 0;
$Link3_Own_ins=0;
if ($installation_result != null) {


    foreach ($installation_result as $int_value) {
        $BANK_instllation = $BANK_instllation + $int_value['BANK'];
        $CORPORATE_instllation = $CORPORATE_instllation + $int_value['CORPORATE'];
        $COMPLEMENTARY_instllation = $COMPLEMENTARY_instllation + $int_value['COMPLEMENTARY'];
        $nbfi_instllation = $nbfi_instllation + $int_value['NBFI'];
        $mq_instllation = $mq_instllation + $int_value['MQ'];
        $retail_c_instllation = $retail_c_instllation + $int_value['RETAIL_CORPORATION'];
        $retail_h_instllation = $retail_h_instllation + $int_value['RETAIL_HOME'];
        $int_value['Link3_Own']=$Link3_Own_ins;
        if($int_value['Link3_Own']!=null){
            $link3_own_installation=$link3_own_installation+$int_value['Link3_Own'];
        }
        
       
    }

    $int_total = $BANK_instllation + $CORPORATE_instllation + $nbfi_instllation + $COMPLEMENTARY_instllation + $mq_instllation + $retail_c_instllation + $retail_h_instllation + $link3_own_installation;

    $avg_BANK = ($BANK_instllation / $int_total) * 100;
    $avg_CORPORATE = ($CORPORATE_instllation / $int_total) * 100;
    $avg_COMPLEMENTARY = ($COMPLEMENTARY_instllation / $int_total) * 100;
    $avg_mq = ($mq_instllation / $int_total) * 100;
    $avg_nbfi = ($nbfi_instllation / $int_total) * 100;
    $avg_retail_c = ($retail_c_instllation / $int_total) * 100;
    $avg_retail_h = ($retail_h_instllation / $int_total) * 100;

    $dataPoints = array(
        array("label" => "BANK", "y" => $avg_BANK),
        array("label" => "CORPORATE", "y" => $avg_CORPORATE),
        array("label" => "COMPLEMENTARY", "y" => $avg_COMPLEMENTARY),
        array("label" => "MQ", "y" => $avg_mq),
        array("label" => "NBFI", "y" => $avg_nbfi),
        array("label" => "RETAIL CORPORATION", "y" => $avg_retail_c),
        array("label" => "RETAIL HOME", "y" => $avg_retail_h)
    );
    
}

?>

                
                
<?php
//summerytask_result 
$total_summerytask=0;

$Installation_task=0;
$Change_Request_task=0;
$Troubleshoot_task=0;
$Survey_task=0;
$avg_Installation_task=0;
$avg_Change_Request_task=0;
$avg_Troubleshoot_task=0;
$avg_Survey_task=0;
if ($summerytask_result != null) {

    foreach ($summerytask_result as $tt_value) {
        $Installation_task = $Installation_task + $tt_value['Installation'];
        $Change_Request_task = $Change_Request_task + $tt_value['Change_Request'];
        $Troubleshoot_task = $Troubleshoot_task + $tt_value['Troubleshoot'];
        $Survey_task = $Survey_task + $tt_value['Survey'];
       
    }
    
$Installation_task;
$Change_Request_task;
$Troubleshoot_task;
$Survey_task;

   $total_summerytask = $Installation_task + $Change_Request_task + $Troubleshoot_task + $Survey_task;

    $avg_Installation_task = ($Installation_task / $total_summerytask) * 100;
    $avg_Change_Request_task = ($Change_Request_task / $total_summerytask) * 100;
    
    $avg_Troubleshoot_task_pre=$Troubleshoot_task / $total_summerytask;
    $avg_Troubleshoot_task_pre = number_format($avg_Troubleshoot_task_pre, 4);
    $avg_Troubleshoot_task = $avg_Troubleshoot_task_pre * 100;
    
    $avg_Survey_task_pre=$Survey_task / $total_summerytask;
    $avg_Survey_task_pre = number_format($avg_Survey_task_pre, 4);
    $avg_Survey_task = $avg_Survey_task_pre * 100;

}
$dataPoints_1 = array( 
	array("label"=>"Installation", "y"=>$avg_Installation_task),
	array("label"=>"Change_Request", "y"=>$avg_Change_Request_task),
	array("label"=>"Troubleshoot", "y"=>$avg_Troubleshoot_task),
	array("label"=>"Survey", "y"=>$avg_Survey_task)
)
        
//        $dataPoints_1 = array( 
//	array("label"=>"Industrial", "y"=>51.7),
//	array("label"=>"Transportation", "y"=>26.6),
//	array("label"=>"Residential", "y"=>13.9),
//	array("label"=>"Commercial", "y"=>7.8)
//)
 
?>                  
                  
                <input type="hidden" name="all_installation" id="all_installation"  value="<?php echo $int_total; ?>"/>
                <input type="hidden" name="bank_installation" id="bank_installation"  value="<?php echo $BANK_instllation; ?>"/>
                <input type="hidden" name="nbfi_installation" id="nbfi_installation"  value="<?php echo $nbfi_instllation; ?>"/>
                <input type="hidden" name="corporate_installation" id="corporate_installation"  value="<?php echo $CORPORATE_instllation; ?>"/>
                <input type="hidden" name="complementery_installation" id="complementery_installation"  value="<?php echo $COMPLEMENTARY_instllation; ?>"/>
                <input type="hidden" name="mq_installation" id="mq_installation"  value="<?php echo $mq_instllation; ?>"/>
                <input type="hidden" name="retail_c_installation" id="retail_c_installation"  value="<?php echo $retail_c_instllation; ?>"/>
                <input type="hidden" name="retail_h_installation" id="retail_h_installation"  value="<?php echo $retail_h_instllation; ?>"/>
                <input type="hidden" name="link3_own_installation" id="link3_own_installation"  value="<?php echo $link3_own_installation; ?>"/>
               
            <div class="row">    
                <div class="col-lg-6">
                    <!--<div id="chartContainer" style="height: 370px; width: 100%;"></div>-->
                        <div id="pie_chartContainer" style="height: 370px; width: 100%;"></div>
                </div>
                <div class="col-lg-6">
                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                </div>
            </div>
            
            <div class="row">
                
            <div class="col-lg-12">
                    <input type="hidden" name="total_troubleshoot" id="total_troubleshoot"  value="<?php echo $total_troubleshoot; ?>"/>
                    <div id="bar_chartContainer" style="height: 370px; width: 100%;"></div><br>
                   
                </div>
            </div>
            <div class="table-responsive">
                
               
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                         
                            <th>S. No</th>
                            <th>Zone</th>
                            <th>Support Office</th>
                            <th>Engineer ID( Name )</th>
                            <th>Change Request</th>                                       
                            <th>Installation</th>
                            <th>Survey</th>
                            <th>Troubleshoot</th>
                            <th>Attendance </th>
                            <th>Average Troubleshoot</th>
                            <th>Average Troubleshoot time</th>
                            <th>Support Type</th>
                            <th> Total</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
//      echo '<pre>';
//      print_r($results);

$no=0;
$total=0;
$all_total=0;

$Change_Request=0;
$Installation=0;
$Survey=0;
$total_Troubleshoot=0;

$total_auto_up=0;
$total_over_phone=0;
$total_field_support=0;

foreach ($done_list_result as $value) {
//    $p_key=$value->p_key;
    $no++;
    $total=$value['Change_Request']+$value['Installation']+$value['Survey']+$value['Troubleshoot'];
    
    $Change_Request=$Change_Request+$value['Change_Request'];
    $Installation=$Installation+$value['Installation'];
    $Survey=$Survey+$value['Survey'];
    $total_Troubleshoot=$total_Troubleshoot+$value['Troubleshoot'];
    
    $total_auto_up=$total_auto_up+$value['Automatic_UP'];
    $total_over_phone=$total_over_phone+$value['Over_Phone'];
    $total_field_support=$total_field_support+$value['Field_Support'];
    ?>  

                            <tr> 
                                <td><?php echo $no; ?></td>
                                <td><?php echo $value['Zone']; ?></td>
                                <td><?php echo $value['Sub_Zone']; ?></td>
                                <td>
                                    <?php $Engineer_ID=$value['Engineer_ID'];
                                        echo $value['Engineer_ID'] .'('. $value['Engineer_Name'] .')';
                                    ?>
                                </td>
                                <td><?php echo $value['Change_Request']; ?></td>
                                <td><?php echo $value['Installation']; ?></td>
                                <td><?php echo $value['Survey']; ?></td>
                                <td><?php echo $Troubleshoot=$value['Troubleshoot']; ?></td>
                                
                                
<?php
$attends=0;
$avg_Troubleshoot=0;
//print_r($cs_attend);
if ($cs_attend != null) {
foreach ($cs_attend as $value_attend) {
    $attend_id=$value_attend['create_id'];
    if($attend_id==$Engineer_ID){
      $attends++; 
    } 
  }
  if($attends > 0){
  $avg_Troubleshoot= $Troubleshoot / $attends;
  }
}
?>                                 
                                 <td><?php echo $attends; ?></td>
                                 <td><?php echo (int)$avg_Troubleshoot; ?></td>
<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////
...........................................................................................................
//////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<?php
$totaltime = '';
$times=0;
$avg_Troubleshoot_time='';
$average_time='';
if ($cs_troubleshoot_time != null) {
foreach ($cs_troubleshoot_time as $value_time) {
//    as $key => $CS_zone_values
    $create_id=$value_time['create_id'];
    if($create_id==$Engineer_ID){

        $time=$value_time['time_Diff'];      
        $timestamp = strtotime($time);
        @$totaltime += $timestamp;
     //  echo '<br>';
      $times++; 
    }
 
}
if( $times > 0){
$average_time = ($totaltime / $times);
$avg_Troubleshoot_time=date('H:i:s',$average_time);
}else{
$avg_Troubleshoot_time='00:00:00';    
}
}
?>                                  
<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////
...........................................................................................................
//////////////////////////////////////////////////////////////////////////////////////////////////////////-->                                
                                
                                
                               
                                <td><?php  echo $avg_Troubleshoot_time; ?></td>
                                <td>
                                    <?php 
                                    echo 'Automatic UP='.$value['Automatic_UP'].'<br>Over Phone='.$value['Over_Phone'].'<br>'.'Field Support='.$value['Field_Support'];
                                    ?>
                                </td>
                               <td><?php echo $total; ?></td>
                                
                                
<?php
$all_total+=(int)$total; 
}
?>
                    </tbody>
<div class="row">
    <div class="col-lg-12" align="center">
 <?php 
    echo '<h3>Total Task Number : '.$all_total.'</h3>';
    echo '<b>Change Request : </b>'.$Change_Request.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>Installation : </b>'.$Installation.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>Survey : </b>'.$Survey.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>Troubleshoot : </b>'.$total_Troubleshoot.'&nbsp;&nbsp;&nbsp;&nbsp;<br>';
    
    echo '<b>Automatic UP : </b>'.$total_auto_up.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>Over Phone : </b>'.$total_over_phone.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>Field Support : </b>'.$total_field_support.'&nbsp;&nbsp;&nbsp;&nbsp;<br><br><br>'
    
?>
    </div>                        
</div>
                </table>
<?php
//$totaltime = '';
//$times=0;
//foreach ($cs_troubleshoot_time as $value_time) {
//   $time=$value_time['time_Diff'];  
//   $timestamp = strtotime($time);
//   $totaltime += $timestamp;
////  echo '<br>';
// $times++; 
//}
//
//$average_time = ($totaltime/$times);
//
//echo ' <b>Average Troubleshoot Time  </b>: '.date('H:i:s',$average_time);
//

?>                
                
<?php if($cs_date_result!=null){ ?>                
    <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                         
                            <!--<th>S. No</th>-->
                            <th>DATE</th>
                            <th>Zone</th>
                            <th>Support Office</th>
                            <th>Engineer ID( Name )</th>
                            <th>Change Request</th>                                       
                            <th>Installation</th>
                            <th>Survey</th>
                            <th>Troubleshoot</th>
                            <th>Support Type</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
$row=0;
$day=0;
$total_Troubleshoot=0;
foreach ($cs_date_result as $value) {
//    $p_key=$value->p_key;
    $row++;
    $day++;
    $total=$value['Change_Request']+$value['Installation']+$value['Survey']+$value['Troubleshoot'];
    
    $Change_Request=$Change_Request+$value['Change_Request'];
    $Installation=$Installation+$value['Installation'];
    $Survey=$Survey+$value['Survey'];
    $Troubleshoot=$Troubleshoot+$value['Troubleshoot'];
    
    $total_auto_up=$total_auto_up+$value['Automatic_UP'];
    $total_over_phone=$total_over_phone+$value['Over_Phone'];
    $total_field_support=$total_field_support+$value['Field_Support'];
    ?>  

                            <tr> 
                               
                                <td id="tbl_date<?php echo $row; ?>"><?php echo $date=$value['date']; ?></td>
                                <td><?php echo $value['Zone']; ?></td>
                                <td><?php echo $value['Sub_Zone']; ?></td>
                                <td id="tbl_Engineer_ID<?php echo $row; ?>"><?php 
//                                    $Engineer_ID=$value['Engineer_ID'];
                                    echo $value['Engineer_ID'] .'('. $value['Engineer_Name'] .')';
                                ?></td>
                                <td><?php echo $value['Change_Request']; ?></td>
                                <td><?php echo $value['Installation']; ?></td>
                                <td><?php echo $value['Survey']; ?></td>
                                <td><?php echo $Troubleshoot=$value['Troubleshoot']; ?></td>
                                <td>
                                    <?php 
                                    echo 'Automatic UP='.$value['Automatic_UP'].'<br>Over Phone='.$value['Over_Phone'].'<br>'.'Field Support='.$value['Field_Support'];
                                    ?>
                                </td>
                               <td><?php echo $total; ?></td>
                               <td id='<?php echo 'row'.$row; ?>'> <button type="button" class="btn btn-info" data-toggle='modal' data-target='#myModal' onclick="details_suooprt(<?php echo $row; ?>)" data-backdrop='static'>Details</button> </td> 
                               <!--<button type="button" class="btn btn-info" data-toggle='modal' data-target='#myModal' onclick="pass_serial_item_name()" data-backdrop='static'>ADD Engineer</button>-->
<?php
//$all_total+=(int)$total; 
$total_Troubleshoot=$total_Troubleshoot+$Troubleshoot;
}
$avg_Troubleshoot=$total_Troubleshoot/$day;

//echo "<b>Average Troubleshoot </b>=".(int)$avg_Troubleshoot;
?>
                    </tbody>

                </table> 
<?php } ?>                
            </div>
        </div>
    </div>
  
</div>








<!--.........................Model ADD Serial Number part.....................................................-->
<div></div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">   
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="row"> 

                    <div class="col-md-8 col-sm-8">
                        <h4 class="modal-title">Work Details</h4>
                    </div>           
                </div>             
            </div>

            <form method="" name="serial_number_form" id="serial_number_form" enctype="multipart/form-data">
                <div class="modal-body">
                    <span id="info_span"></span>
                </div>
                <div class="modal-footer">

                    <div class="table-responsive">   
                        <table class="table table-bordered table-striped" id="modal_table">
                            <thead>
                                <tr>
                                    <th>Client ID ( Name )</th>
                                    <th>Client Category </th>
                                    <th>Support Type</th>
                                    <th>CTID Number/SR</th>
                                    <th>Initial Problem Category</th>
                                    <th>Assign time</th>
                                    <th>Support Complete date & time</th>
                                    <th>Final Resolution</th>
                                </tr>
                            </thead>
                            <tbody id="work_details_table"></tbody>
                            
                        </table>
                    </div> 
                    <div class="row">
                        <div class="col-md-7 col-sm-7"></div>
                        <div class="col-md-5 col-sm-5">
                            <!--<input type="hidden" name="upload_id" value="<?php echo $Subscriber_id_for_file; ?>" id="upload_id">-->
                            <!--<button id="" type="submit" class="btn btn-info"  value="save" onclick="save_serial_number_function()">Save</button>-->
                            <!--<button type="submit" class="btn btn-info" id="save_eng_list" name="save_eng_list" onclick="" value="save">Save</button>-->
                            <!--remove_session_store()    kkk-->
                            <!--<button type="button" class="btn btn-info" onclick="remove_session_store()" >Cancel</button>-->
                            <button type="button" class="btn btn-default" data-dismiss="modal" id="clear_attach_file_value" onclick="clr_msg_value()">Close</button>
                        </div>
                    </div>
                </div>
            </form> 
        </div>      
    </div>
</div> 


<!--...........................END Serial Number part..................................................................................-->









<?php
echo "<script type=\"text/javascript\">";
foreach ($result as $value) {
    echo "var x = document.getElementById(" . $value['Select_Name'] . ");";
    echo "var option = document.createElement(\"option\");";
    echo "option.text =" . $value['CateGory_Description'] . ";";
    echo "option.value =" . $value['D_Value'] . ";";
    echo "x.add(option,x[" . $value['Indexx'] . "]);";
}
echo "</script>";
?>

<script>
    $(function() {		
            $("#Zone").change(function() {
                    $("#Sub_Zone").load("<?php echo base_url(); ?>CS_sub_zone_list/" + $(this).val() + ".txt");
            });
    });
</script> 
<script>
    $(function() {		
            $("#Sub_Zone").change(function() {
                    $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + $(this).val() + ".txt");
            });
    });
</script>

<script type="text/javascript">
function pick_engineer_id(){
    var Engineer_Name = $('#Engineer_Name').val();
        $.post('<?php echo base_url();?>index.php/welcome/pick_engineer_id', {
            Engineer_Name: Engineer_Name
        }, function (search_info_data) {

            var search_array = JSON.stringify(search_info_data);
            var new_search_array = JSON.parse(search_array);
//                alert("Search Engineer_ID...."+new_search_array["Engineer_ID"]);
                document.getElementById("Engineer_ID").innerHTML=null;
                document.getElementById("Engineer_ID").value=null;
                select = document.getElementById("Engineer_ID");
                var opt = document.createElement('option');
                opt.value = new_search_array["Engineer_ID"];
                opt.innerHTML = new_search_array["Engineer_ID"];
                select.appendChild(opt); 

        }, 'JSON');

}
</script>
<!--.....................................Pie Chart............................................................-->
<script>
//window.onload = function() {
// var all_installation=document.getElementById("all_installation").value;
// 
// var bank_installation=document.getElementById("bank_installation").value;
// var nbfi_installation=document.getElementById("nbfi_installation").value;
// var corporate_installation=document.getElementById("corporate_installation").value;
// var complementery_installation=document.getElementById("complementery_installation").value;
// var mq_installation=document.getElementById("mq_installation").value;
// var retail_c_installation=document.getElementById("retail_c_installation").value;
// var retail_h_installation=document.getElementById("retail_h_installation").value;
// 
// var chart = new CanvasJS.Chart("chartContainer", {
//	animationEnabled: true,
//        exportEnabled: true,
//	title: {
//		text: "Total Installation : "+all_installation
//	},
//	subtitles: [{
//		text: "BANK : " + bank_installation  + "    NBFI : " + nbfi_installation + "   CORPORATE : " + corporate_installation +  "   COMPLEMENTERY : " + complementery_installation + "   MQ : " + mq_installation + " \n\ \n\
//                     Retail Corporate : " + retail_c_installation + "   Retail Home : " + retail_h_installation
//	}],
//	data: [{
//		type: "pie",
//		yValueFormatString: "#,##0.00\"%\"",
//		indexLabel: "{label} ({y})",
//		dataPoints: <?php // echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
//	}]
//});
//chart.render();
// 
//}
</script>
<!--............................Bar Chart................................................-->
<script>
window.onload = function () {
var total_troubleshoot=document.getElementById("total_troubleshoot").value;

var bar_chart = new CanvasJS.Chart("bar_chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Total Troubleshoot : " + total_troubleshoot
	},
	data: [{
		type: "bar", //change type to bar, line, area, pie, etc, column
		indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
		dataPoints: <?php echo json_encode($bardataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
bar_chart.render();

//..................................... PIE Chart .........................................................
 var all_installation=document.getElementById("all_installation").value;
 
 var bank_installation=document.getElementById("bank_installation").value;
 var nbfi_installation=document.getElementById("nbfi_installation").value;
 var corporate_installation=document.getElementById("corporate_installation").value;
 var complementery_installation=document.getElementById("complementery_installation").value;
 var mq_installation=document.getElementById("mq_installation").value;
 var retail_c_installation=document.getElementById("retail_c_installation").value;
 var retail_h_installation=document.getElementById("retail_h_installation").value;
 var link3_own_installation=document.getElementById("link3_own_installation").value;
 
 
var pie_chart = new CanvasJS.Chart("pie_chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
        title: {
		text: "Total Installation : "+all_installation
	},
	subtitles: [{
		text: "BANK : " + bank_installation  + "    NBFI : " + nbfi_installation + "   CORPORATE : " + corporate_installation +  "   COMPLEMENTERY : " + complementery_installation + "   MQ : " + mq_installation + "   Retail Corporate : " + retail_c_installation + "   Retail Home : " + retail_h_installation + "   Link3 Own : " + link3_own_installation
	}],
	data: [{
		type: "pie", //change type to bar, line, area, pie, etc, column
//		indexLabel: "{y}", //Shows y value on all Data Points
//		indexLabelFontColor: "#5A5757",
//		indexLabelPlacement: "outside",   
		yValueFormatString: "#,##0.00\"%\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});


pie_chart.render();
//////////////////////////////////////////////////////////////////////////////////////////////////
//.................................................................................................
/////////////////////////////////////////////////////////////////////////////////////////////////


  
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2",
        exportEnabled: true,
	animationEnabled: true,
	title: {
		text: "Total Summery Task "
	},
	data: [{
		type: "pie",
		indexLabel: "{y}",
		yValueFormatString: "#,##0.00\"%\"",
//		indexLabelPlacement: "inside",
//		indexLabelFontColor: "#36454F",
//		indexLabelFontSize: 18,
//		indexLabelFontWeight: "bolder",
		showInLegend: true,
		legendText: "{label}",
		dataPoints: <?php echo json_encode($dataPoints_1, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();



}
</script>








<script>
    
 function details_suooprt(row){
     
    var date =document.getElementById('tbl_date'+row).innerHTML;
    var Engineer_ID_name =document.getElementById('tbl_Engineer_ID'+row).innerHTML;
    var Engineer = Engineer_ID_name.split("(");
    var Engineer_ID=Engineer[0];
    
//    alert('test.....'+ row +'...........'+ date +'..........' + Engineer_ID);
    $.post('<?php echo base_url();?>index.php/welcome/cs_details_by_date_id', {
        date:date,
        Engineer_ID:Engineer_ID
    }, function (search_info_data) {
        var search_array = JSON.stringify(search_info_data);
        var new_search_array = JSON.parse(search_array);
//       alert(new_search_array); 
//        alert("Search Engineer_ID...."+new_search_array[0]["Engineer_ID"]);
//.........................................................................

 var tableHTML = "";
    for (var key in new_search_array) {  
//        if (new_search_array.hasOwnProperty(key)) {
           tableHTML += "<tr>";
           tableHTML += "<td>" + new_search_array[key]["Client_ID"] +'('+ new_search_array[key]["Client_Name"] + ')' + "</td>";
           tableHTML += "<td>" + new_search_array[key]["Client_Category"]+ "</td>";
           tableHTML += "<td>" + new_search_array[key]["Support_Category"]+ "</td>";
           tableHTML += "<td>" + new_search_array[key]["CTID_Number_SR"]+ "</td>";
           tableHTML += "<td>" + new_search_array[key]["Initial_Problem_Category"]+ "</td>";
           tableHTML += "<td>" + new_search_array[key]["start_date"]+ "</td>";
           tableHTML += "<td>" + new_search_array[key]["end_date"]+ "</td>";
           tableHTML += "<td>" + new_search_array[key]["Final_Resolution"]+ "</td>";
           tableHTML += "</tr>";     
//        } 
    }   
    $("#work_details_table").html(tableHTML); 
//            .............................................................................
    }, 'JSON');
     
     
 }   
   
   
function chk_zone(){

//alert("TEST");
var user_type=document.getElementById("user_type").value;
var s_zone=document.getElementById("s_zone").value;
var zone=document.getElementById("Zone").value;

if(user_type=='s_user' || user_type=='a_user' || user_type=='user'){
    if(s_zone==zone){

    }else{
        alert("you are not allow to see other zone report"); 
        document.getElementById("Zone").value=0;
    }
}

}

function chk_s_ofc(){
   
  var user_type=document.getElementById("user_type").value; 
  var Sub_Zone=document.getElementById("Sub_Zone").value;
  var s_support_ofc=document.getElementById("s_support_ofc").value;

//alert(s_support_ofc+'.....'+Sub_Zone);
     if(user_type=='a_user' || user_type=='user'){
         
      if(Sub_Zone==s_support_ofc){
            
        }else{
             alert("you are not allow to see other zone report"); 
            document.getElementById("Sub_Zone").value=0;
        }
    } 
    
}
   
</script>    