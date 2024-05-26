
<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Search By ID
                        </h3>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Search By ID
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
               <div class="row">
 
                    <div class="col-lg-12">
<!--                        <h3 class="page-header">
                            Forms
                        </h3>-->

                        <form action="<?php echo base_url();?>index.php/welcome/select_by_id" method="post">
                          <div class='row'> 
                              <div class="col-lg-3"> 
                                <div class="form-group">
                                    <label>Task Type <div style="color:red;float: right;"></div></label>
                                    <select class="form-control" name="type_task" id="type_task">
                                        <option value="0" >Select Task Type</option>
                                    </select>
                                </div>
                            </div>
                              
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Search</label>
                                    <select class="form-control" name="employee_id" id="employee_id">
                                        <option  value="0">Select Employee ID</option>
                                    </select>
                                </div>
                            </div>
                              
                              
                                <div class="col-lg-3">
                                    <label>From Date</label>
                                    <input type="" name="date_from" readonly="readonly" value="" id="start_date_id" class="form-control" placeholder="Enter from Date" required=""/>
                                </div>
                                <div class="col-lg-3">
                                    <label>To Date</label>
                                    <input type="" name="date_to" readonly="readonly" value="" id="end_date_id" class="form-control" placeholder="Enter To Date" required=""/>
                                </div>
                               
                            
                         
                          </div> 
                            <div class="row">
                                 <div class="col-lg-3">
                                  <br>  <button type="submit" class="btn btn-default" value="save">Search</button>
                                </div> 
                                </div>   
                        </form>
<br>



<div class="row">
    <div class="col-lg-12">
<div class="table-responsive">
    
<?php 
$total_task=0;
if($done_task_summery != null){
 ?>   
    <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Task Type</th>
                            <th>Number</th>
                        </tr>
                    </thead>
                    <tbody>
<?php    
foreach ($done_task_summery as $n_value) {
?>  
        <tr> 
                <td><?php echo $n_value['type_task']; ?></td>
                <td><?php echo $task_number=$n_value['task_number']; ?></td>                      
        </tr>                           
<?php 
$total_task=$total_task+$task_number;
}
echo '<h2>Total Task :'.$total_task.'</h2>';
?>
          
                    </tbody>
</table>
<?php } ?>

    
    
<?php 
$total_task1=0;
if($done_task_id_summery != null){
 ?>   
    <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>Number</th>
                        </tr>
                    </thead>
                    <tbody>
<?php    
foreach ($done_task_id_summery as $n_value) {
?>  
        <tr> 
                <td><?php echo $n_value['id']; ?></td>
                <td><?php echo $task_number=$n_value['task_number']; ?></td>                      
        </tr>                           
<?php 
$total_task1=$total_task1+$task_number;
}
echo '<h2>Total Task :'.$total_task1.'</h2>';
?>
          
                    </tbody>
</table>
<?php } ?>    
    
    <h2>Details</h2>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>

                                        <th>ID (Name)</th>
                                        <th>Priority Type</th>
                                        <th>Type Task</th>
                                        <th>Sub-Task</th>
                                        <th>Assign By</th>
                                        <th>MIS / MQ ticket id</th>
                                        <th>Client / BTS / Provider Name</th>
                                        <th>Start Date</th>
                                        <th>End Date</th> 
                                        <th>Duration</th>
                                        <th>Transfer From</th>
                                        <th>Transfer Date</th>
                                        <th>Action</th>                                 

                                    </tr>
                                </thead>
                              <tbody>
                                  
                                  
<?php
//$Infrastructure_System=0;
//$Infrastructure_Network=0;
//$Corporate=0;
//$FTTX=0;
//$Project_Work=0;
//$Meeting=0;
//$R_and_D=0;
//$DC_or_DR=0;
//$Documentation_or_Report=0;
//$Training=0;
//$Other=0;
//$total=0;
$row=0;
$total_interval=0;
if($search_result != null){
   foreach ($search_result as $value){
   $row++;
?>   
                                  <tr>
                                       <td> <?php  echo $value['id']; ?> (<?php  echo $value['name']; ?>)</td>
                                       <td><?php echo $value['priority_type']; ?></td>   
                                       <td><?php echo $value['type_task']; ?></td>
                                       <td> <?php  echo $value['sub_task']; ?></td>
                                       <td> <?php  echo $value['assign_by']; ?></td>
                                       <td> <?php  echo $value['mis_mq_ticket_id']; ?></td>
                                       <td> <?php  echo $value['client_bts_provider_name']; ?></td>
                                       
                                       <td><?php echo $value['start_date']; ?></td>
                                       <td> <?php  echo $value['end_date']; ?></td>
                                       <td>
                                            <?php        
                                                $start_date=$value['start_date'];
                                                $end_date=$value['end_date'];
                                                $datetime1 = new DateTime($start_date);
                                                $datetime2 = new DateTime($end_date);
                                                $interval = $datetime2->diff($datetime1);
//                                                $t_interval=$interval;
//                                                $t_interval_1=$t_interval_1+$t_interval;
                                                $duration = $interval->format(' %a days %h hours %i min');
                                                echo $duration; 
                                            ?>
                                       </td>
                                       <td><?php echo $value['transfer_from']; ?></td>
                                       <td><?php echo $value['transfer_date']; ?></td>
                                       <td style="display:none;" id="tbl_tki<?php echo $row; ?>"><?php echo $value['ticket_no']; ?></td>
                                       <td id='<?php echo 'row'.$row; ?>'> <button type="button" class="btn btn-info" data-toggle='modal' data-target='#myModal' onclick="tki_details(<?php echo $row; ?>)" data-backdrop='static'>Details</button> </td>
                                  </tr>                             
                                  
                                  
                                  
                                  
                                  
   <?php }

   ?> 
 
 <div class="row">
        
<div class="col-lg-10">       
<?php 
    echo '<b>Total Number : </b>'.$row.'<br>';
//     $T_duration = $t_interval_1->format(' %a days %h hours %i min');
//    echo '<b>Total Duration : </b>'.$T_duration.'&nbsp;&nbsp;&nbsp;&nbsp;';
//    
//    echo '<b>Infrastructure System : </b>'.$Infrastructure_System.'&nbsp;&nbsp;&nbsp;&nbsp;';
//    echo '<b>Corporate : </b>'.$Corporate.'&nbsp;&nbsp;&nbsp;&nbsp;';
//    echo '<b>FTTX : </b>'.$FTTX.'&nbsp;&nbsp;&nbsp;&nbsp;';
//    echo '<b>Project_Work : </b>'.$Project_Work.'&nbsp;&nbsp;&nbsp;&nbsp;';
//    echo '<b>Meeting : </b>'.$Meeting.'&nbsp;&nbsp;&nbsp;&nbsp;<br>';
//    echo '<b>R & D : </b>'.$R_and_D.'&nbsp;&nbsp;&nbsp;&nbsp;';
//    echo '<b>DC / DR : </b>'.$DC_or_DR.'&nbsp;&nbsp;&nbsp;&nbsp;';
//    echo '<b>Documentation / Report : </b>'.$Documentation_or_Report.'&nbsp;&nbsp;&nbsp;&nbsp;';
//    echo '<b>Training : </b>'.$Training.'&nbsp;&nbsp;&nbsp;&nbsp;';
//    echo '<b>Other : </b>'.$Other.'&nbsp;&nbsp;&nbsp;&nbsp;';
?>
    
</div> 
    <div class="col-lg-2">
         <button type="button" class="btn btn-success"  onclick="location.href = '<?php echo base_url(); ?>index.php/welcome/createXLS_report_by_NOC_Employee_ID/'">Export Excel</button> &nbsp;<br><br>  
       
    </div>                       
</div>                                  
<?php } ?>                                     
                   
                                    
                                </tbody>
                                
                                
                            </table>
                        </div>    
</div>
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
                        <h4>Comments Details</h4>
                    </div>           
                </div>             
            </div>
<!--.........................................................................................................................................-->
<div class='row'>
                    <div class="col-lg-12">
    <div class="table-responsive">   
    
                        <table class="table table-bordered table-striped" id="modal_table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Time </th>
                                    <th>Comments </th>
                                </tr>
                            </thead>
                            <tbody id="work_details_table"></tbody>
                        </table>
                    </div>
                        </div>
    </div>
<!--.......................................................................................................................................-->
            
        </div>      
    </div>
</div>











<?php
//echo "<script type=\"text/javascript\">";
//foreach ($result as $value) {
//    echo "var x = document.getElementById(" . $value['Select_Name'] . ");";
//    echo "var option = document.createElement(\"option\");";
//    echo "option.text =" . $value['CateGory_Description'] . ";";
//    echo "option.value =" . $value['D_Value'] . ";";
//    echo "x.add(option,x[" . $value['Indexx'] . "]);";
//}
//echo "</script>";
?>




<?php
echo "<script type=\"text/javascript\">";
foreach ($search_id as $value) {
    echo "var x = document.getElementById(" . $value['Select_Name'] . ");";
    echo "var option = document.createElement(\"option\");";
    echo "option.text =" . $value['CateGory_Description'] . ";";
    echo "option.value =" . $value['D_Value'] . ";";
    echo "x.add(option,x[" . $value['Indexx'] . "]);";
}
echo "</script>";
?>



<script>
    
 function tki_details(row){
     
    var tbl_tki =document.getElementById('tbl_tki'+row).innerHTML;    
   
    $.post('<?php echo base_url();?>index.php/nmc_c/noc_tki_details', {
        tbl_tki:tbl_tki
    }, function (search_info_data) {
        
        var search_array = JSON.stringify(search_info_data);
        var new_search_array = JSON.parse(search_array);
        var tki_result_comments=new_search_array["tki_result_comments"];    
//      alert("Search ...."+tki_result_comments[0]['id']);      

var tableHTML = ""; 
     for (var key in tki_result_comments) {
           tableHTML += "<tr>";
           tableHTML += "<td>" + tki_result_comments[key]["id"]+ "</td>";
           tableHTML += "<td>" + tki_result_comments[key]["comments_time"]+ "</td>";
           tableHTML += "<td>" + tki_result_comments[key]["comments"]+ "</td>";
           tableHTML += "</tr>";     
    }
    $("#work_details_table").html(tableHTML); 
    }, 'JSON');
     
     
 }
 
 </script>