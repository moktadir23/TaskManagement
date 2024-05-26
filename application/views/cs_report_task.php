<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script> 


<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
                BTS Report
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
        $message = $this->session->userdata('message');
        if (isset($message)) {
            echo $message;
            $this->session->unset_userdata('message');
        }
        ?>
        <div class="col-lg-12">
            <form action="<?php echo base_url('index.php/welcome/cs_rept_tsk/'); ?>" name="search_by_zone" id="search_by_zone" method="POST"> 
                <input type="hidden" class="form-control" name="s_zone" id="s_zone" value="<?php echo $zone = $this->session->userdata('Zone'); ?>">
                <input type="hidden" class="form-control" name="user_type" id="user_type" value="<?php echo $user_type = $this->session->userdata('u_type'); ?>">
                <input type="hidden" class="form-control" name="department" id="department" value="<?php echo $user_type = $this->session->userdata('department'); ?>">
                
                <div class="row">
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label> Zone <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="Zone" id="Zone" onchange="chk_zone(); pick_BTS();">
                                <option value="0" >All Zone</option>
                            </select>
                        </div>
                    </div>    
                    <div class="col-lg-3" style="">
                        <div class="form-group">
                            <label>Support Office <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="Sub_Zone" id="Sub_Zone" >
                                <option value="0" >All Support Office</option>
                            </select><br>                         
                        </div>
                    </div>

                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label> BTS Name<div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="BTS_Name" id="BTS_Name">
                                <option value="0" >ALL BTS</option>
                            </select>
                        </div>
                    </div>    
<div class="col-lg-3">                            
                        <div class="form-group">
                            <label> Problem Category 
                                <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="Initial_Problem_Category" id="Initial_Problem_Category">
                                <option value="">Select Initial Problem</option>
                            </select>
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
                        <button  type="submit" class="btn btn-default" value="save">Search</button>
                    </div> 
                </div>  
            </form>  
            <br>
            <h2>
                Report By BTS <br>
                <?php 
                echo 'From : '.$date_from =  $_SESSION["date_from"] ; ?> &nbsp;&nbsp;&nbsp;
                 <?php  echo 'To : '.$date_to =  $_SESSION["date_to"] ; ?>
            </h2>

            <div class="table-responsive">


                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>

                            <th>Zone</th>
                            <th>Support office</th>
                            <th>BTS Name</th>
<!--                            <th>OLT Name</th>
                            <th>PON Port</th>-->
                            <th>Troubleshoot Number</th>
                            <th>Action</th>                                       
                            
                        </tr>
                    </thead>
                    <tbody>
                     
                    
                    <?php 
                    $row=0;
                    foreach ($monthly_task_Details as $key => $values) {
                    $row++; 
                     ?>
                        <tr>
                         <td><?php echo $values['Zone']; ?></td>
                         <td><?php echo $values['Sub_Zone']; ?></td>
                         <td id="tbl_BTS<?php echo $row; ?>"><?php echo $values['BTS_Name']; ?></td>
                         <td><?php echo $values['Support_Category']; ?></td>
                         <td id='<?php echo 'row'.$row; ?>'> <button type="button"  class="btn btn-info" data-toggle='modal' data-target='#myModal' onclick="details_report(<?php echo $row; ?>)" data-backdrop='static'>Details</button> </td>
                        </tr> 
                         
                    <?php } ?>    
                    </tbody>  
                    <div class="row">
                        <div class="col-lg-12" align="center">
                         
                        </div>                        
                    </div>
                </table>              
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
                        <h4 class="modal-title"> Details</h4>
                    </div>           
                </div>             
            </div>

            <form method="" name="serial_number_form" id="serial_number_form" enctype="multipart/form-data">
                <div class="modal-body">
                    <span id="info_span"></span>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <h4>OLT Table</h4>
                            <p id="bts"></p>   
                            <div class="table-responsive">   
                                <table class="table table-bordered table-striped" id="modal_table">
                                    <thead>
                                        <tr>
                                            <th>OLT NAME</th>
                                            <th>Number</th>
        <!--                                <th>Support Type</th> -->
                                    </thead>
                                    <tbody id="work_details_table"></tbody>
                                </table>
                            </div>
                        </div> 
                    
                    <div class="col-md-4 col-sm-4">
                        <h4>Troubleshoot Table</h4>  
                        <p id="olt"></p>
                        <div class="table-responsive">   
                            <table class="table table-bordered table-striped" id="modal_Troubleshoot_table">
                                <thead>
                                    <tr>
                                        <th>Problem Category </th>
                                        <th>Number</th>
    <!--                                <th>Support Type</th> -->
                                </thead>
                                <tbody id="Troubleshoot_details_table"></tbody>
                            </table>
                        </div>          
                    </div> 
                        
                        <div class="col-md-4 col-sm-4">
                        <h4>Final Resolution Table</h4>  
                        <p id="Problem_Category_name"></p>
                        <div class="table-responsive">   
                            <table class="table table-bordered table-striped" id="modal_Troubleshoot_table">
                                <thead>
                                    <tr>
                                        <th>Final Resolution</th>
                                        <th>Number</th>
    <!--                                <th>Support Type</th> -->
                                </thead>
                                <tbody id="solution_details_table"></tbody>
                            </table>
                        </div>          
                    </div> 
                        
                </div> 
                    
<!--solution_details_table-->
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
    $(function () {
        $("#Zone").change(function () {
            $("#Sub_Zone").load("<?php echo base_url(); ?>CS_sub_zone_list/" + $(this).val() + ".txt");
        });
    });
</script> 
<script>
    $(function () {
        $("#Sub_Zone").change(function () {
            $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + $(this).val() + ".txt");
        });
    });
</script>

<script>
    $(function() {		
//            $("#Support_Category").change(function() {
                    $("#Initial_Problem_Category").load("<?php echo base_url(); ?>CS_textdata/TS.txt");
//            });
    });
//     $(function() {		
////            $("#Support_Category").change(function() {
//                    var Support_Category=document.getElementById("Support_Category").value;
//                    $("#Initial_Problem_Category").load("<?php echo base_url(); ?>CS_textdata/" + Support_Category + ".txt");
////            });
//    });
</script>
<script>



    function chk_zone() {

//alert("TEST");
        var user_type = document.getElementById("user_type").value;
        var s_zone = document.getElementById("s_zone").value;
        var zone = document.getElementById("Zone").value; 
        var department = document.getElementById("department").value; 

        if ( department == 'CS' ) {
            if (s_zone == zone) {

            } else {
                alert("you are not allow to see other zone report");
                document.getElementById("Zone").value = 0;
            }
        }else{
            
        }

    }




    function pick_BTS() {

        var Zone = $('#Zone').val();
        
        if(Zone=='CTG'){
           Zone='chittagong'; 
        }

        $.post('<?php echo base_url(); ?>index.php/nmc_c/pick_BTS_Name', {
            Zone: Zone
        }, function (data) {

            var array = JSON.stringify(data);
            var new_Array = JSON.parse(array);

            var select = 0;
            document.getElementById("BTS_Name").innerHTML = null;
            document.getElementById("BTS_Name").value = null;
            
            select = document.getElementById("BTS_Name");
            var opt = document.createElement('option');
            opt.value = "Select Name";
            opt.innerHTML = "Select NAME";
            select.appendChild(opt);
            for (var i in new_Array) {
                //    alert("splite...."+newArr[i]["OLT_Name"]);
                    select = document.getElementById("BTS_Name");
                    var opt = document.createElement('option');
                    opt.value = new_Array[i]["BTS_Name"];
                    opt.innerHTML = new_Array[i]["BTS_Name"];
                    select.appendChild(opt);
            }
            
        }, 'JSON');



    }

</script>  



<script>
    
 function details_report(row){
     
//    var date =document.getElementById('tbl_date'+row).innerHTML;
    var BTS =document.getElementById('tbl_BTS'+row).innerHTML;
    
    
    document.getElementById("bts").innerHTML = BTS;
    document.getElementById("olt").innerHTML = BTS;
    document.getElementById("Problem_Category_name").innerHTML = BTS;
//    alert('test.....'+ row +'...........'+ date +'..........' + Engineer_ID);
    $.post('<?php echo base_url();?>index.php/welcome/cs_BTS_report_details_by_OLT', {
//        date:date,
        BTS:BTS
    }, function (search_info_data) {
//       alert(new_search_array); 
//        alert("Search Engineer_ID...."+new_search_array[0]["Engineer_ID"]);
//................................................OLT ......................................................................
    var search_olt_array = JSON.stringify(search_info_data['olt']);
    var new_search_olt_array = JSON.parse(search_olt_array);
    var tableHTML = "";
    for (var key in new_search_olt_array) {  
//        if (new_search_array.hasOwnProperty(key)) {
    var OLT_Name=new_search_olt_array[key]["OLT_Name"];
           tableHTML += "<tr>";
           tableHTML += "<td> <a onclick='olt_trobuleshoot(\""+OLT_Name+"\");'>" + new_search_olt_array[key]["OLT_Name"]+ "</a></td>";
           tableHTML += "<td>" + new_search_olt_array[key]["olt_number"]+ "</td>";
           tableHTML += "</tr>";     
//        } 
    }   
    $("#work_details_table").html(tableHTML); 

// ..................................................................................................................

//  ................................  Initial_Problem_Category  ........................................................................       
        var search_problem_array = JSON.stringify(search_info_data['problem']);
        var new_search_problem_array = JSON.parse(search_problem_array);

 var tableHTML_t = "";
    for (var key in new_search_problem_array) {  
//        if (new_search_array.hasOwnProperty(key)) {
var Initial_Problem_Category=new_search_problem_array[key]["Initial_Problem_Category"]
           tableHTML_t += "<tr>";
           tableHTML_t += "<td><a onclick='Final_Resolution(\""+OLT_Name+"\",\""+Initial_Problem_Category+"\");'>" + new_search_problem_array[key]["Initial_Problem_Category"]+ "</a></td>";
           tableHTML_t += "<td>" + new_search_problem_array[key]["problem_number"]+ "</td>";
           tableHTML_t += "</tr>";     
//        } 
//  onClick="homeForm(\''+myForm+'\',\''+divName+'\')" />'
    }   
    $("#Troubleshoot_details_table").html(tableHTML_t); 
// .......................................................................................................................................


//  ................................  Final_Resolution  ........................................................................       
        var search_slove_array = JSON.stringify(search_info_data['slove']);
        var new_search_slove_array = JSON.parse(search_slove_array);

 var tableHTML_s = "";
    for (var key in new_search_slove_array) {  
//        if (new_search_array.hasOwnProperty(key)) {

           tableHTML_s += "<tr>";
           tableHTML_s += "<td>" + new_search_slove_array[key]["Final_Resolution"]+ "</td>";
           tableHTML_s += "<td>" + new_search_slove_array[key]["slove_number"]+ "</td>";
           tableHTML_s += "</tr>";     
//        } 
    }   
    $("#solution_details_table").html(tableHTML_s); 
// .......................................................................................................................................








    }, 'JSON');
     
     
 }
 
 
 
 function olt_trobuleshoot(OLT_Name){

    document.getElementById("olt").innerHTML = OLT_Name;
    document.getElementById("Problem_Category_name").innerHTML = OLT_Name;

    $.post('<?php echo base_url();?>index.php/welcome/cs_BTS_report_details_by_trobuleshoot', {
//        date:date,
        OLT_Name:OLT_Name
    }, function (search_info_data) {
        
//  ................................  Initial_Problem_Category  ........................................................................       
        var search_problem_array = JSON.stringify(search_info_data['problem']);
        var new_search_problem_array = JSON.parse(search_problem_array);

 var tableHTML_t = "";
    for (var key in new_search_problem_array) {  
//        if (new_search_array.hasOwnProperty(key)) {
var Initial_Problem_Category=new_search_problem_array[key]["Initial_Problem_Category"]
           tableHTML_t += "<tr>";
           tableHTML_t += "<td><a onclick='Final_Resolution(\""+OLT_Name+"\",\""+Initial_Problem_Category+"\");'>" + new_search_problem_array[key]["Initial_Problem_Category"]+ "</a></td>";
           tableHTML_t += "<td>" + new_search_problem_array[key]["problem_number"]+ "</td>";
           tableHTML_t += "</tr>";     
//        } 
//  onClick="homeForm(\''+myForm+'\',\''+divName+'\')" />'
    }   
    $("#Troubleshoot_details_table").html(tableHTML_t); 
// .......................................................................................................................................


//  ................................  Final_Resolution  ........................................................................       
        var search_slove_array = JSON.stringify(search_info_data['slove']);
        var new_search_slove_array = JSON.parse(search_slove_array);

 var tableHTML_s = "";
    for (var key in new_search_slove_array) {  
//        if (new_search_array.hasOwnProperty(key)) {

           tableHTML_s += "<tr>";
           tableHTML_s += "<td>" + new_search_slove_array[key]["Final_Resolution"]+ "</td>";
           tableHTML_s += "<td>" + new_search_slove_array[key]["slove_number"]+ "</td>";
           tableHTML_s += "</tr>";     
//        } 
    }   
    $("#solution_details_table").html(tableHTML_s); 
// .......................................................................................................................................

    }, 'JSON');
     
 
 }
 
 
 function Final_Resolution(OLT_Name,Initial_Problem_Category){
  
  document.getElementById("Problem_Category_name").innerHTML = Initial_Problem_Category;
    
//    exit();
    $.post('<?php echo base_url();?>index.php/welcome/cs_BTS_report_details_by_Final_Resolution', {
//        date:date,
        OLT_Name:OLT_Name,
        Initial_Problem_Category:Initial_Problem_Category
    }, function (search_info_data) {
        
//  ................................  Final_Resolution  ........................................................................       
        var search_slove_array = JSON.stringify(search_info_data['slove']);
        var new_search_slove_array = JSON.parse(search_slove_array);

 var tableHTML_s = "";
    for (var key in new_search_slove_array) {  
//        if (new_search_array.hasOwnProperty(key)) {

           tableHTML_s += "<tr>";
           tableHTML_s += "<td>" + new_search_slove_array[key]["Final_Resolution"]+ "</td>";
           tableHTML_s += "<td>" + new_search_slove_array[key]["slove_number"]+ "</td>";
           tableHTML_s += "</tr>";     
//        } 
    }   
    $("#solution_details_table").html(tableHTML_s); 
// .......................................................................................................................................

    }, 'JSON');
 
 
 
 }
 
 </script>