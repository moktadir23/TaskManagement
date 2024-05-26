
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              FI Search Done Task 
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
            <form action="<?php echo base_url('index.php/fi_controller/fi_done_task_search/'); ?>" name="search_by_zone" id="search_by_zone" method="POST">
                <div class="row">
                     <div class="col-lg-3"> 
                        <div class="form-group">
                            <label> Zone <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="Zone" id="Zone">
                                <option value="0" >ALL Zone</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3" style="">
                        <div class="form-group">
                            <label>Support Office <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="Sub_Zone" id="Sub_Zone">
                                <option value="0" >ALL Support Office</option>
                            </select>
                        </div>
                    </div>
<!--                    <div class="col-lg-3" style="">
                        <div class="form-group">
                            <label>Employee Name: <div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="Engineer_Name" onkeyup="find_employee_id();" onchange="pick_engineer_id()" id="Engineer_Name" placeholder="Enter Employee Name" required="">
                            <select class="form-control" name="Engineer_Name" id="Engineer_Name" onchange="pick_engineer_id()"  required="">
                                 <option value="">Select Engineer Name</option>
                            </select>
                        </div>
                    </div>
-->                   
                        <div class="col-lg-3" style="">
                        <div class="form-group">
                            <label>Type Task <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="type_task" id="type_task">
                                <option value="0" >All Type Task</option>
                            </select><br>                         
                        </div>
 </div>   
<div class="col-lg-3">
    <div class="form-group">
                        <label>Work Schedule From Date</label>
                        <input type="" name="date_from" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="start_date_id" class="form-control" placeholder="Enter from Date" required=""/>
                    </div>
                   
                    </div>
                    
                </div>
                <div class="row">
<!--                    <div class="col-lg-3">
                        <label>From Date</label>
                        <input type="" name="date_from" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="start_date_id" class="form-control" placeholder="Enter from Date" required=""/>
                    </div>
                    <div class="col-lg-3">
                        <label>To Date</label>
                        <input type="" name="date_to" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="end_date_id" class="form-control" placeholder="Enter To Date" required=""/>
                    </div>-->
 <div class="col-lg-3">
                        <label>Work Schedule To Date</label>
                        <input type="" name="date_to" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="end_date_id" class="form-control" placeholder="Enter To Date" required=""/>
                    </div>
                    <div class="col-lg-3">
                        <button type="submit" class="btn btn-default" value="save">Search</button>
                    </div> 
                </div>
            </form>  
            <br><br>
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
$total=0;
$Shifting=0;
$Installation=0;
$Troubleshoot=0;
//      echo '<pre>';
//      print_r($pending_list_result);
      
if($pending_list_result != null){
foreach ($pending_list_result as $value) {
    $p_key=$value['p_key'];
    $total++;
    ?>  

                            <tr> 

                            
                                <td><?php echo $value['TKI_Receive_Date_time']; ?></td>
                                <td><?php echo $value['Client_id']; ?></td>
                                <td><?php echo $value['Client_Name']; ?></td>
                                <td><?php echo $value['Client_Category']; ?></td>
                                <td><?php echo $value['C_Contact_number']; ?></td>
                                <td><?php echo $value['Client_Address']; ?></td>
                                <td><?php echo $value['tki_id']; ?></td>
                                <td>
                                    <?php 
                                     $type_task=$value['type_task'];
                                    if( $type_task == 'Installation'){
                                       $Installation++; 
                                    }elseif ( $type_task == 'Shifting') {
                                       $Shifting++;       
                                    }elseif ( $type_task == 'Troubleshoot') {
                                       $Troubleshoot++;        
                                    }
                                   
                                    echo $type_task;
                                    ?>
                                </td>
                                <td><?php echo $value['Work_Schedule']; ?></td>
                                <!--<td><?php echo $value['Zone']; ?></td>-->
                                <td><?php echo $value['Support_Office']; ?></td>
                                <td><?php echo $value['Connection_Type']; ?></td>
                                <td><?php echo $value['Priority_Status']; ?></td>
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
                                
                                
                                <td><?php echo $value['Cable_Type_ID']; ?></td>
                                <td><?php echo $C_start=$value['Cable_Start_meter']; ?></td>
                                <td><?php echo $C_end=$value['Cable_End_meter']; ?></td>
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
                                
                                <td><?php echo $value['Device_model']; ?></td>
                                <td><?php echo $value['serial_No']; ?></td>
                                <td><?php echo $value['MAC']; ?></td>
                                <td><?php echo $value['TJ']; ?></td>
                                <td><?php echo $value['Patch_Cord_Qty']; ?></td>
                                <td><?php echo $value['Cable_Tie_Qty']; ?></td>
                                <td><?php echo $value['Rj45_Qty']; ?></td>
                                <td><?php echo $value['Sale_Order_Number']; ?></td>
                                
                               
                            </tr>
<?php }

echo '<b>Total Done Task : </b>'.$total.'<br>';
echo '<b>Installation : </b>'.$Installation.'&nbsp&nbsp&nbsp&nbsp <b>Shifting : </b>' . $Shifting .'&nbsp&nbsp&nbsp&nbsp <b>Troubleshoot : </b>'.$Troubleshoot;
}
?>
                            
                                
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
            $("#Sub_Zone").change(function() {
                    $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + $(this).val() + ".txt");
            });
    });
</script>
<script>
    $("form#CS_task_from").submit(function () {
//        validateForm();
//        if (submit_or_not == 1)
//        {
//            exit;
//        }
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/welcome/save_CS_task/'); ?>",
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
                alert('Sussfully Done');
                null_from();
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

<script src="../../js/jquery.min.js" type="text/javascript"></script>

<script>
    function find_employee_id(){
        
       
//    var availableTags = [
//      "ActionScript",
//      "AppleScript",
//      "Asp",
//      "BASIC",
//      "C",
//      "C++",
//      "Clojure",
//      "COBOL",
//      "ColdFusion",
//      "Erlang",
//      "Fortran",
//      "Groovy",
//      "Haskell",
//      "Java",
//      "JavaScript",
//      "Lisp",
//      "Perl",
//      "PHP",
//      "Python",
//      "Ruby",
//      "Scala",
//      "Scheme"
//    ];
//    alert(availableTags);
// $( "#Engineer_Name" ).autocomplete({
//      source: availableTags
//    });   
    
    
        var Engineer_Name = document.getElementById("Engineer_Name").value;
        if (Engineer_Name.length > 0) {
            $.post('<?php echo base_url();?>index.php/welcome/pick_engineer_name',
            {Engineer_Name: Engineer_Name}, function (data) {
                if (data.exists) {
                } else {

                    var array = JSON.stringify(data);
                    var newArray = JSON.parse(array);
//                   alert(newArray);
                    $("#Engineer_Name").autocomplete({
                        source: newArray
                    });
//            document.getElementById("Engineer_Name").value=array;          
                }
            }, 'JSON');
        }
        
        
    }
    
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

<script>
    $(function() {		
            $("#Zone").change(function() {
                    $("#Sub_Zone").load("<?php echo base_url(); ?>FI_support_office_list/" + $(this).val() + ".txt");
            });
    });
</script>

