<!--<h1>under construction</h1>-->
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>
<?php  $id = $this->session->userdata('id'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
             Return device R&D Report
            </h3>
            <ol class="breadcrumb">
                <!--<div class="col-lg-4"></div>-->
                <h3 class="text-center"><span id="info_span"></span></h3>
                <!--<div class="col-lg-4"></div>-->
                <!--                            <li>
                                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                                            </li>
                                            <li class="active">
                                                <i class="fa fa-edit"></i> Assign Task
                                            </li>-->
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <?php
        $message = $this->session->userdata('message');
        if (isset($message)) {
            echo $message;
            $this->session->unset_userdata('message');
        }
        ?>
        <div class="col-lg-12">
<!--            <form action="" name="CS_task_from" id="CS_task_from" method="">
                <div class='row'> 
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Sub Zone <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Sub_Zone" id="Sub_Zone" required="">
                                <option value="" >Select Task Type</option>
                            </select>
                        </div>
                    </div>
                    
                </div>
               
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-default" value="save" >Save</button>
            </form>-->

    <form action="<?php echo base_url('index.php/welcome/CS_device_RD_report/'); ?>" name="search_by_zone" id="search_by_zone" method="POST">
       <div class="row">
        <div class="col-lg-3"> 
                        <div class="form-group">
                            <label> Zone <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="Zone" id="Zone" required="">
                                <option value="0" >All Zone</option>
                            </select>
                        </div>
        </div>
           
        <div class="col-lg-3" style="">
            <div class="form-group">
                <label>Search By Support Office: <div style="color:red;float: right;"></div></label>
                <select class="form-control" name="Sub_Zone" id="Sub_Zone">
                    <option value="0" >All Support Office</option>
                </select><br>                         
            </div>
        </div>
        <div class="col-lg-3">
            <label>From Date</label>
            <input type="" name="date_from" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="start_date_id" class="form-control" placeholder="Enter from Date" required=""/>
        </div>
        <div class="col-lg-3">
            <label>To Date</label>
            <input type="" name="date_to" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="end_date_id" class="form-control" placeholder="Enter To Date" required=""/>
        </div>
</div>        
<div class="row">       
        <div class="col-lg-3"><br>
             <button type="submit" class="btn btn-default" value="save">Search</button>
<!--            &nbsp;<button type="button" class="btn btn-primary" onclick="location.href = '#'" /> Search </button>
            <button type="button" class="btn btn-primary" onclick="search();" /> Search </button>-->
        </div>
        </div>
        
    </form>  

            
    <div class="row"><div class="col-lg-3">
  
    <br></div></div>           
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Support Office</th>
                            <th>Testing pending</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
//    echo '<pre>';
//    print_r($done_task_summery);
$total=0;
if($done_task_summery != null){
    
foreach ($done_task_summery as $n_value) {
    ?>  
        <tr> 
                <td><?php echo $n_value['Sub_Zone']; ?></td>
                <td><?php echo $task_number=$n_value['pending_test']; ?></td>                      
        </tr>                           
<?php 
$total=$total+$task_number;
}
echo '<h2>Total Need to Testing Device Number :'.$total.'</h2>';

} ?>            
                    </tbody>
                </table>
                
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Date Time</th>
                            <th>Support Office</th>
                            <th>Client ID</th>
                            <th>Device Serial No.</th>
                            <th>Device Model</th>                         
                            <th>Return Issue</th>
                            <th>Return By</th>                
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
<?php
//      echo '<pre>';
//      print_r($pending_list_result);
if($list_result!=null){
$row=0;    
foreach ($list_result as $value) {
$row++;    
    $p_key=$value['Id'];
     $device_SN=$value['device_serial_no'];
    if( $device_SN != null ){
    ?>  
                            <tr> 
                                <td><?php echo $value['create_time']; ?></td>
                                <td><?php echo $value['Sub_Zone']; ?></td>
                                <td><?php echo $value['Client_ID']; ?></td>
                                <td id="device_serial_no_<?php echo $row; ?>"><?php echo $value['device_serial_no']; ?></td>
                                <td><?php echo $value['device_model']; ?></td>
                                <td><?php echo $value['return_issue']; ?></td>
                                <td><?php echo $value['return_by']; ?></td>
                                <td id='<?php echo 'row'.$row; ?>'> <button type="button"  class="btn btn-danger" data-toggle='modal' id="details_<?php echo $row; ?>" name="details_<?php echo $row; ?>" data-target='#myModal' onclick="details_report(<?php echo $row; ?>)" data-backdrop='static'>Need to Tested</button> </td>
                            </tr> 
                                
      <!--Id,create_time,Client_ID,return_issue,device_serial_no,device_model,return_by-->                          
    <?php } } }?>
                                
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


<div></div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">   
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="row"> 

                    <div class="col-md-8 col-sm-8">
                        <h4 class="modal-title"> Device Tested Information From</h4>
                    </div>           
                </div>             
            </div>

            <form method="" name="testing_from" id="testing_from" enctype="multipart/form-data">
                <div class="modal-body">
                    <span id="info_span"></span>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-lg-3">
                        <div class="form-group">
                            <label>Final Status</label>
                            <select class="form-control" name="final_status" id="final_status" required="required" >
                                <option>Reusable</option>
                                <option>Need Further Test by F0N0C</option> 
                                <option>Need Further Test by Wireless Infra.</option> 
                            </select>
                            <input type="hidden" class="form-control" name="serial_no" id="serial_no">
                            <input type="hidden" class="form-control" name="tested_date" id="tested_date" value="<?php echo date('Y-m-d');?>">
                            <input type="hidden" class="form-control" name="tested_by" id="tested_by" value="<?php echo $id;?>">
                            <input type="hidden" class="form-control" name="row_no" id="row_no">
                        </div>
                    </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                          <label>Test Result <div style="color:red;float: right;">*</div></label>
                          <textarea class="form-control" rows="4" name="test_result" id="test_result" required="required"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                          <label>Remark <div style="color:red;float: right;"></div></label>
                            <textarea class="form-control" rows="4" name="comments" id="comments"></textarea>
                        </div>
                    </div>     
                    </div> 
                    
                    <div class="row">
                        <div class="col-md-7 col-sm-7"></div>
                        <div class="col-md-5 col-sm-5">
                            <!--<input type="hidden" name="upload_id" value="<?php echo $Subscriber_id_for_file; ?>" id="upload_id">-->
                            <button id="save" name="save" type="submit" class="btn btn-success"  value="save" onclick="testing_done()">Save</button>
                            <button type="button" class="btn btn-info" data-dismiss="modal" id="clear_attach_file_value" onclick="clr_msg_value()">Close</button>
                        </div>
                    </div>
                </div>
            </form> 
        </div>      
    </div>
</div>





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


<script src="../../js/jquery.min.js" type="text/javascript"></script>
 <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->


  


<script>
    
 function details_report(row){
    document.getElementById("row_no").value = row; 
    var device_serial_no =document.getElementById('device_serial_no_'+row).innerHTML;        
    document.getElementById("serial_no").value = device_serial_no;   
    document.getElementById("test_result").value = null;   
    document.getElementById("comments").value = null; 
    document.getElementById("final_status").selectedIndex = 0; 
    document.getElementById("save").disabled  = false; 
 
 }
 
 </script>
 
 <script>
    $("form#testing_from").submit(function () {
       var row_no=document.getElementById("row_no").value;
       document.getElementById("save").disabled  = true; 
       document.getElementById("details_"+row_no).disabled = true; 
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/welcome/update_device_testing_info/'); ?>",
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
                alert('Successfully Device Testing complete ');
//                null_from();
//            data = $.parseJSON(data);                                   
//            $('#info_span').append(data.messages);
            },
            cache: false,
            contentType: false,
            processData: false
        });
        return false;
    }
      
    );

</script>


<script type="text/javascript">
//function testing_done(){
//       
//        alert("WORK ON PAGE .TRY AGAIN FEW MINUTE LATER");
//        
//    var states = $('#states').val();
//    var tested_date = $('#tested_date').val();
//    var serial_no = $('#serial_no').val();
//    var tested_by = $('#tested_by').val();
//    var test_result = $('#test_result').val();
//    
//        $.post('<?php echo base_url();?>index.php/welcome/update_device_testing_info', {
//            states: states,
//            tested_date:tested_date,
//            serial_no:serial_no,
//            tested_by:tested_by,
//            test_result:test_result
//        }, function (search_info_data) {
////alert(search_info_data);
//            var search_array = JSON.stringify(search_info_data);
//            var new_search_array = JSON.parse(search_array);
//            
//                alert("UPDATE DONE....");
//
//
//        }, 'JSON');
//
//}

</script>