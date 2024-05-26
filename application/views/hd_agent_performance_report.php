
<?php
    $Zone = $this->session->userdata('Zone'); 
    $department = $this->session->userdata('department');
    $id = $this->session->userdata('id');
    $name = $this->session->userdata('name');
    $user_type = $this->session->userdata('u_type');
?>
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<!--<script>
    var submit_or_not = 0;
</script>-->

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
            Agent Performance
            </h3>
        </div>
    </div>
    <!-- /.row -->
    <div class="row"> 
        <div class="col-lg-12">
            <form action="<?php echo base_url('index.php/hd_controller/Agent_Performance_Report/'); ?>" name="Drop_call" id="Drop_call" method="POST">
                
                <div class="row">
                    <div class="col-lg-3">
                        <label>Zone</label>
                            <select class="form-control" name="Zone" id="Zone" >
                                 <option value="">Select Zone</option>
<!--                                 <option value="">CTG</option>
                                 <option value=""></option>-->
                            </select>    
                    </div>
                    <div class="col-lg-3">
                        <label>Employee Name</label>
                           
                        
                        <?php if($user_type=='s_user' || $user_type=='admin' || $user_type=='a_user'){ ?>
                                     <select class="form-control" name="Engineer_Name" id="Engineer_Name" onchange="pick_engineer_id();" >
                                        <option value="">Select Engineer Name</option>
                                   </select>
                              <?php }else{ ?> 
                                    <select class="form-control" name="e_name_1" id="e_name_1">
                                        <option value="<?php echo $name;?>" ><?php echo $name;?></option>
                                    </select>
                            <!--<input class="form-control" value="<?php echo $name;?>" name="e_name_1" id="e_name_1" readonly="readonly" required="">-->
                              <?php } ?>
                        
                        
                    </div>
                    <div class="col-lg-3">
                        <label>Employee ID</label>

                         <?php if($user_type=='s_user' || $user_type=='admin' || $user_type=='a_user'){ ?>
                                      <select class="form-control" name="Engineer_ID" id="Engineer_ID" >
                                 <option value="">Select Engineer ID</option>
                            </select>
                              <?php }else{ ?> 
                                    <select class="form-control" name="e_name_1" id="e_name_1">
                                        <option value="<?php echo $id;?>" ><?php echo $id;?></option>
                                    </select>
                            <!--<input class="form-control" value="<?php echo $name;?>" name="e_name_1" id="e_name_1" readonly="readonly" required="">-->
                              <?php } ?>
                    </div>
                    <div class="col-lg-3">
                        <label>From Date</label>
                        <input type="" name="date_from" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="start_date_id" class="form-control" placeholder="Enter from Date" required=""/>
                    </div>
<!--                    <div class="col-lg-3">
                        <label>To Date</label>
                        <input type="" name="date_to" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="end_date_id" class="form-control" placeholder="Enter To Date" required=""/>
                    </div>-->
                    </div>
                    <div class="row">
                    <div class="col-lg-3">
                        <label>To Date</label>
                        <input type="" name="date_to" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="end_date_id" class="form-control" placeholder="Enter To Date" required=""/>
                    </div>
                    <div class="col-lg-3"><br>
                       &nbsp;
                        <button type="submit" class="btn btn-default" value="save">Search</button>
                    </div> 
                </div>
            </form>  
            <br>
            
            
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>user</th>
                            <th>event_time</th>
                            <th>pause_sec</th>
                            <th>wait_sec</th>
                            <th>talk_sec</th>
                            <th>dispo_sec</th>
                            <th>Problem Category</th>
                            <th>user_group</th>
                            
                            <th>comments</th>
                            <th>sub_status</th>
                            
                            <th>dead_sec</th>
                            <!--<th>processed</th>-->
                            <th>unique id</th>
                            <th>pause_type</th>
                            
                        </tr>
                    </thead>
                    <tbody>
<?php
//      echo '<pre>';
//      print_r($drop_call_list);
$total=0;
$drop=0;
$count_call_number=0;
$total_talk_time=0;
$total_pause_sec=0;
$total_Inactive_pause=0;
$total_active_pause=0;
if($agent_performance_list != null){
foreach ($agent_performance_list as $value) {
    ?>  
    <tr>
        <td><?php echo $value["user"]; ?></td>
        <td><?php echo $value["event_time"]; ?></td>       
        <td><?php echo $pause_sec=$value["pause_sec"]; 
        if($pause_sec != null){
            $total_pause_sec += $pause_sec;
        }
        $sub_status=$value["sub_status"];
        
        if($sub_status=='BFR' || $sub_status=='Dinner' || $sub_status=='Brkfst'|| $sub_status=='Lunch'|| $sub_status=='Prayer'|| $sub_status=='TeaBrk' || $sub_status=='Washrm'){
           $total_Inactive_pause +=$pause_sec;
        }
        
        if($sub_status=='LOGIN' || $sub_status=='Cdata' || $sub_status=='INTCOM' || $sub_status=='MDial'|| $sub_status=='Report'|| $sub_status=='Selfca'|| $sub_status=='SMS' || $sub_status=='SMSChk'|| $sub_status=='SNMPC'|| $sub_status=='TG'|| $sub_status=='UpdTkt'|| $sub_status=='WLKC'){
           $total_active_pause += $pause_sec;
           
        }
        
        
        ?></td>
        <td><?php echo $value["wait_sec"]; ?></td>
        <td><?php echo $talk_sec=$value["talk_sec"]; 
        $total_talk_time += $talk_sec;
        ?></td>
        <td><?php echo $value["dispo_sec"]; ?></td>        
        <td><?php echo $status=$value["status"]; 
        if($status != null){
            $count_call_number++;
        }
        ?></td>
        <td><?php echo $value["user_group"]; ?></td>
         <td><?php echo $value["comments"]; ?></td>
        <td><?php echo $sub_status;
        if($sub_status=='LOGIN'){
            $login_time=$value["event_time"];
        }
        
        if($sub_status=='Report'){
            $logout_time=$value["event_time"];
        }
//        else{
//            $logout_time='1';
//        }
        
        
        ?></td>
        <td><?php echo $value["dead_sec"]; ?></td>
        <!--<td><?php // echo $value["processed"]; ?></td>-->
        <td><?php echo $value["uniqueid"]; ?></td>
        <td><?php echo $value["pause_type"]; ?></td>
  
    </tr>             
<?php
$total++;

} ?>
  
                                
    <div class="row">
        
<div class="col-lg-10">       
<?php    

foreach ($agent_time as $t_value) {
    $event=$t_value["event"];
     if($event=='LOGIN'){
            $login_time=$t_value["event_date"];
        }
        
        if($event=='LOGOUT'){
            $logout_time=$t_value["event_date"];
        }
}




$datetime1 = strtotime($login_time);
$datetime2 = strtotime($logout_time);
$total_time = $datetime2 - $datetime1;// == <seconds between the two times>

//if($logout_time==1){
//     echo '<b>Total Time : </b>'.' <font color="red">Agent Is LOGIN </font>'.'<br>';
//}else{
//    echo '<b>Total Time : </b>'.gmdate('H:i:s', $total_time).'<br>'; 
//}
   
//.......................... TOTAL TIME ..................................................

//$seconds = 153976; //example
$hours = floor($total_pause_sec / 3600);
$mins = floor(($total_pause_sec - $hours*3600) / 60);
$s = $total_pause_sec - ($hours*3600 + $mins*60);
$mins = ($mins<10?"0".$mins:"".$mins);
$s = ($s<10?"0".$s:"".$s); 
$total_pause_time = ($hours>0?$hours.":":"").$mins.":".$s;
//................... ACTIVE PAUSE TIME .............................................................
$actice_hours = floor($total_active_pause / 3600);
$active_mins = floor(($total_active_pause - $actice_hours*3600) / 60);
$active_s = $total_active_pause - ($actice_hours*3600 + $active_mins*60);

$active_mins = ($active_mins<10?"0".$active_mins:"".$active_mins);
$active_s = ($active_s<10?"0".$active_s:"".$active_s); 
$total_active_pause_time = ($actice_hours>0?$actice_hours.":":"").$active_mins.":".$active_s;
//......................INACTIVE PAUSE TIME ....................................................................
$inactive_hours = floor($total_Inactive_pause / 3600);
$inactive_mins = floor(($total_Inactive_pause - $inactive_hours*3600) / 60);
$inactive_s = $total_Inactive_pause - ($inactive_hours*3600 + $inactive_mins*60);

$inactive_mins = ($inactive_mins<10?"0".$inactive_mins:"".$inactive_mins);
$inactive_s = ($inactive_s<10?"0".$inactive_s:"".$inactive_s); 
$total_Inactive_pause_time = ($inactive_hours>0?$inactive_hours.":":"").$inactive_mins.":".$inactive_s;
//............................................................................
$talk_hours = floor($total_talk_time / 3600);
$talk_mins = floor(($total_talk_time - $talk_hours*3600) / 60);
$talk_s = $total_talk_time - ($talk_hours*3600 + $talk_mins*60);

$talk_mins = ($talk_mins<10?"0".$talk_mins:"".$talk_mins);
$talk_s = ($talk_s<10?"0".$talk_s:"".$talk_s); 
$new_total_talk_time = ($talk_hours>0?$talk_hours.":":"").$talk_mins.":".$talk_s;
//.............................................................................
    
    echo '<b>Total Call Received : </b>'.$count_call_number.'<br>';
    echo '<b>Total Talk Time : </b>'.$new_total_talk_time.'<br>';
    $avg_talk_time = $total_talk_time / $count_call_number;

    echo '<b>Average Talk Time : </b>'.gmdate('H:i:s', $avg_talk_time).'<br>';
    echo '<b>Total pause Time : </b>'.$total_pause_time.'<br>';
    echo '<b>Total Active pause Time : </b>'.$total_active_pause_time.'<br>';
    echo '<b>Total Inactive pause Time : </b>'.$total_Inactive_pause_time.'<br>';
?>
</div> 
    <div class="col-lg-2">
         <!--<button type="button" class="btn btn-success"  onclick="location.href = '<?php echo base_url(); ?>index.php/welcome/createXLS_report_by_Employee_ID/<?php echo $value['Engineer_ID']; ?>'">Export Excel</button> &nbsp;<br><br>-->  
       
    </div>                       
</div>

 <?php   }?>
                                
                    </tbody>
                </table>
                <div class="col-lg-5"></div>
                <div class="col-lg-5">
<?php // echo $links; ?>
                </div>
            </div>
            
        </div>
    </div>
</div>




<?php
//echo '<pre>';
//print_r($result);
//echo '</pre>';
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
                    $("#Engineer_Name").load("<?php echo base_url(); ?>hd_employee_list/" + $(this).val() + ".txt");
            });
    });
</script>
 

<script type="text/javascript">
function pick_engineer_id(){
    

    var Engineer_Name = $('#Engineer_Name').val();
//        alert('TEST'+Engineer_Name);
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