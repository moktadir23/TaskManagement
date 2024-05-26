<!--<h1>under construction</h1>-->
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
    
    var SerialNumber_clicks=0;
    
    var Technician_clicks=0;

</script>

<div class="container-fluid" onload="myFunction()">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
             Fiber INFRA  : Handover From
            </h3>
            <ol class="breadcrumb">
                <!--<div class="col-lg-4"></div>-->
                <h3 class="text-center"></h3>
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
//        $message = $this->session->userdata('message');
//        if (isset($message)) {
//            echo $message;
//            $this->session->unset_userdata('message');
//        }
        ?>
<?php
session_start();
?>
        <div class="col-lg-12">
        <form action="" name="assign_task_from" id="assign_task_from" method="">
              
        <input type="hidden" class="form-control" id="p_key" name="p_key" value="<?php echo $pending_task_result->p_key; ?> "> 
        <input type="hidden" id="Zone" name="Zone" value="<?php echo $pending_task_result->Zone; ?>">
                <div class="row">    
                   
<!--                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Assign Engineer Name<div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Engineer_name" id="Engineer_name" onchange="pick_engineer_id()" required="">
                                <option value="">Select Engineer Name</option>
                            </select>    
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Engineer ID<div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Engineer_ID" id="Engineer_ID" required="">
                                <option value="">Select Engineer ID</option>
                            </select>    
                        </div>
                    </div>-->
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Assign  Date & Time<div style="color:red;float: right;">*</div></label>
                            <input  class="form-control" id="s_date" name="Assign_time" value="<?php echo date("d-m-Y H:i:s");?>" placeholder="DD-MM-YYYY" required="">
                       
                        
                        </div>
                    </div> 
<!--                    <div class="col-lg-3">
                        <div class="form-group">
                          <label> Assigned Technician <div style="color:red;float: right;">*</div></label>
                         <select class="form-control" name="Technician_name" id="Technician_name" required="">
                                <option value="">Select Technician Name</option>
                            </select> 
                        </div>
                    </div> -->
                   <div class="col-lg-3">
                        <div class="form-group">
                            <label>Client End Reach time <i class="fa fa-calendar"></i> <div style="color:red;float: right;">*</div></label>
                            <input  class="form-control" id="cs_date" name="Reach_time" value="<?php echo date("d-m-Y H:i:s");?>" placeholder="DD-MM-YYYY" required="">
                        
                        </div>
                    </div>
                   
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>link  Handover Date & Time <i class="fa fa-calendar"></i><div style="color:red;float: right;">*</div></label>
                            <input  class="form-control" id="e_date" name="Completion_time" value="<?php echo date("d-m-Y H:i:s");?>" placeholder="DD-MM-YYYY" required="">
                            
                        </div>
                    </div> 
                     <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Root Cause for Delay <div style="color:red;float: right;"></div></label>
                            <input class="form-control" name="Cause_for_Delay" id="Cause_for_Delay" placeholder="Enter Root Cause for Delay">
                        </div>
                    </div>
                </div>
            <div class="row"> 
                
                
                
<!--                <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Root Cause for Delay <div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="Cause_for_Delay" id="Cause_for_Delay" placeholder="Enter Root Cause for Delay" required="">
                        </div>
                    </div>-->



<!--                    <div class="col-lg-3">
                        <div class="form-group">
                          <label> Assigned Engineer <div style="color:red;float: right;">*</div></label>
                         <select class="form-control" name="Technician_name" id="Technician_name" required="">
                                <option value="">Select Technician Name</option>
                            </select> 
                        </div>
                    </div> 
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label> Assigned Technician <div style="color:red;float: right;">*</div></label>
                         <select class="form-control" name="Technician_name" id="Technician_name" required="">
                                <option value="">Select Technician Name</option>
                         </select> 
                        </div>
                    </div> -->

                    <div class="col-lg-6">
                        <div class="form-group">
                          <label>Remarks </label>
                          <textarea class="form-control" rows="2" name="comments" id="comments"></textarea>
                        
                        </div>
                    </div> 
                    
                     
                </div>
        <input type="hidden" class="form-control" name="loop_number" id="loop_number">
        <input type="hidden" class="form-control" name="engineer_name_array" id="engineer_name_array">
        <input type="hidden" class="form-control" name="engineer_id_array" id="engineer_id_array">
        <input type="hidden" class="form-control" name="details_array" id="details_array">
        
        <!--..................................... TTT ..........................................................-->

        <input type="hidden" class="form-control" name="Technician_loop_number" id="Technician_loop_number">
        <input type="hidden" class="form-control" name="Technician_name_array" id="Technician_name_array">
        <input type="hidden" class="form-control" name="Technician_details_array" id="Technician_details_array">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!--<button type="submit" class="btn btn-default" id="save" name="save" value="save" >Update</button>-->
                <button type="submit" class="btn btn-default" id="update_info_btn" onclick="check_tki_status()" name="update_info_btn" value="save" >Update</button>
                
                 <button type="button" class="btn btn-info" data-toggle='modal' data-target='#myModal' onclick="pass_serial_item_name()" data-backdrop='static'>ADD Engineer</button>
                 
                 <button type="button" class="btn btn-success" data-toggle='modal' data-target='#Technician_Modal' onclick="pass_serial_item_name()" data-backdrop='static'>ADD Technician</button>
            </form>
        </div>
    </div>
</div>






<!--.........................Model ADD Serial Number part.....................................................-->
<div></div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">   
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                
                
                
                <button type="button" class="close" data-dismiss="modal">&times;</button>
<div class="row"> 
                
    <div class="col-md-8 col-sm-8">
                <h4 class="modal-title"> ADD Engineer Name</h4>
     </div>           
                <div class="col-md-4 col-sm-4">
                <button type="button" class="btn btn-info" id="serial_number_add_button" onclick="SerialNumber_CreateFunction()">ADD</button></a>
                <button type="button" class="btn btn-default" id="serial_number_update_button" onclick="SerialNumber_DeleteFunction()">Delete</button>
                </div>
    </div>             
            </div>
            
            <form method="" name="serial_number_form" id="serial_number_form" enctype="multipart/form-data">
            <div class="modal-body">
<!--                 <div class="row"> 
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                             <div class="col-md-8 col-sm-8">
                           
                             </div>
                             <div class="col-md-4 col-sm-4">
                            <button type="button" class="btn btn-info" id="serial_number_add_button" onclick="SerialNumber_CreateFunction()">ADD</button></a>
                            <button type="button" class="btn btn-default" id="serial_number_update_button" onclick="SerialNumber_DeleteFunction()">Update</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div> -->

    <span id="info_span"></span>
            </div>
            <div class="modal-footer">
                
                <div class="table-responsive">   
                    <table class="table table-bordered table-striped" id="modal_table">
                        <thead>
                            <tr>
                                <th>Engineer Name</th>
                                <th>Engineer ID </th>
                                <th>Work Details</th>
                                <!--<th>Action</th>-->
                            </tr>
                        </thead>
                        <tbody id="SerialNumber_table">
                   
                        </tbody> 
                        
                    </table>
                </div> 
                <div class="row">
                                    <div class="col-md-7 col-sm-7"></div>
                                    <div class="col-md-5 col-sm-5">
                                        <!--<input type="hidden" name="upload_id" value="<?php echo $Subscriber_id_for_file; ?>" id="upload_id">-->
                                        <!--<button id="" type="submit" class="btn btn-info"  value="save" onclick="save_serial_number_function()">Save</button>-->
                                        <button type="submit" class="btn btn-info" id="save_eng_list" name="save_eng_list" onclick="" value="save">Save</button>
                                        
                                        
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
<!--...........................................................ADD Technician Module................................................................................-->

<div class="modal fade" id="Technician_Modal" role="dialog">
    <div class="modal-dialog">   
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                
                
                
                <button type="button" class="close" data-dismiss="modal">&times;</button>
<div class="row"> 
                
    <div class="col-md-8 col-sm-8">
                <h4 class="modal-title"> ADD Technician Name</h4>
     </div>           
                <div class="col-md-4 col-sm-4">
                <button type="button" class="btn btn-info" id="Technician_add_button" onclick="Technician_CreateFunction()">ADD</button></a>
                <button type="button" class="btn btn-default" id="Technician_update_button" onclick="Technician_DeleteFunction()">Delete</button>
                </div>
    </div>             
            </div>
            
            <form method="" name="Technician_form" id="Technician_form" enctype="multipart/form-data">
            <div class="modal-body">

    <span id="Technician_info_span"></span>
            </div>
            <div class="modal-footer">
                
                <div class="table-responsive">   
                    <table class="table table-bordered table-striped" id="modal_table">
                        <thead>
                            <tr>
                                <th>Technician Name</th>
                                <!--<th>Technician ID </th>-->
                                <th>Work Details</th>
                                <!--<th>Action</th>-->
                            </tr>
                        </thead>
                        <tbody id="Technician_table">
                   
                        </tbody> 
                        
                    </table>
                </div> 
                <div class="row">
                                    <div class="col-md-7 col-sm-7"></div>
                                    <div class="col-md-5 col-sm-5">
                                        <!--<input type="hidden" name="upload_id" value="<?php echo $Subscriber_id_for_file; ?>" id="upload_id">-->
                                        <!--<button id="" type="submit" class="btn btn-info"  value="save" onclick="save_serial_number_function()">Save</button>-->
                                        <button type="submit" class="btn btn-info" id="save_technician_list" name="save_technician_list" onclick="" value="save">Save</button>
                                        
                                        
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

<!--..................................................................................................................................................-->

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

<script type="text/javascript">
function check_tki_status(){

     var p_key = document.getElementById("p_key").value;
        $.post('<?php echo base_url();?>index.php/fi_controller/fi_check_handover_status', {
            p_key: p_key
        }, function (search_info_data) {

//          alert('pick status  '+search_info_data);
            var search_array = JSON.stringify(search_info_data);
            var new_search_array = JSON.parse(search_array);
            
//          alert("Search status ...."+new_search_array["status"]);
          
        var status=new_search_array["status"];
         
//        alert(status);
        
 if( status == '3'){
    alert('you already update HandOver Information that TKI');
    window.location.replace("<?php echo base_url();?>index.php/fi_controller/fi_pending_task"); 
//    alert("NOP "+status);
//   redirect_function();
   
}else{
//    alert("TEST CAN "+status);
//    alert('CAN');
}
         
        
        }, 'JSON');

}

</script>







<script>
    $("form#assign_task_from").submit(function () {
       
//        alert("WORK ON PAGE .TRY AGAIN FEW MINUTE LATER");
//        exit();

        if (SerialNumber_clicks == 0 && Technician_clicks == 0)
        {
            alert('Please ADD Engineer Name or Technician Name');
            exit();
        }else{
       
       
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/fi_controller/fi_update_Handover_info/'); ?>",
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
                alert('Successfully Done');
                null_from();
//                
//                
//            data = $.parseJSON(data);                                   
//            $('#info_span').append(data.messages);
            },
            cache: false,
            contentType: false,
            processData: false
        });
        
}    
        
        
        return false;

document.getElementById("update_info_btn").disabled = true;
    }
      
    );
</script>

<script src="../../js/jquery.min.js" type="text/javascript"></script>


<script>


function load_engineer_name(SerialNumber_clicks){
//    $('#Engineer_name'+SerialNumber_clicks).load("<?php echo base_url(); ?>FI_engineer_list/Engineer_list.txt");
      var Zone=document.getElementById("Zone").value;
    $('#Engineer_name'+SerialNumber_clicks).load("<?php echo base_url(); ?>FI_engineer_list/"+ Zone +".txt"); 
    
}    
</script>



<script>
  function load_Technician_name(Technician_clicks){
//    $('#Technician_name'+Technician_clicks).load("<?php echo base_url(); ?>FI_technician_name_list/fi_technician_name.txt");
       var Zone=document.getElementById("Zone").value;
    $('#Technician_name'+Technician_clicks).load("<?php echo base_url(); ?>FI_technician_name_list/"+ Zone +".txt");
}  
</script>
<script type="text/javascript">
function pick_engineer_id(e_name){
    
//    alert(e_name+'..............'+SerialNumber_clicks);
    
//    var Engineer_Name = $('#Engineer_name').val();
     var Engineer_Name = e_name;
     
     var loop=e_name.slice(-1);
//     alert("LOOP"+loop);
     
//    var Engineer_Name = 'S M Zahirul Islam';
//    alert(Engineer_Name);
        $.post('<?php echo base_url();?>index.php/ert_controller/pick_engineer_id', {
            Engineer_Name: Engineer_Name
        }, function (search_info_data) {

//alert(search_info_data);

            var search_array = JSON.stringify(search_info_data);
            var new_search_array = JSON.parse(search_array);
//                alert("Search Engineer_ID...."+new_search_array["Engineer_ID"]);
                
//                document.getElementById("Engineer_ID").innerHTML=null;
                document.getElementById("Engineer_ID"+SerialNumber_clicks).value=new_search_array["Engineer_ID"];
//                select = document.getElementById("Engineer_ID");
//                var opt = document.createElement('option');
//                opt.value = new_search_array["Engineer_ID"];
//                opt.innerHTML = new_search_array["Engineer_ID"];
//                select.appendChild(opt); 

        }, 'JSON');

}

</script>

<!--..................................... ADD multiple field ..........................................................................-->
<script src="../../js/add_field_jquery.js"></script>


<script>
function validation(){
    
    
    
    document.getElementById("info_span").innerHTML = "";
    
     if (SerialNumber_clicks==1){
//       alert(" test...."+y); 
        }else{
        var y=SerialNumber_clicks-1;

        var Engineer_name = document.getElementById("Engineer_name"+y).selectedIndex;
      
        if(Engineer_name == null || Engineer_name == 0){
            
//        alert("pre"+clicks);
        SerialNumber_clicks=SerialNumber_clicks-1;
//        alert("Post"+clicks);
// alert('Please Insert Engineer Name !');
            document.getElementById("info_span").innerHTML = "Please Select Engineer_name ";
//            $('html,body').scrollTop(0);
            exit();
        }
      
        var details = document.getElementById("details"+y).value;
        if(details == null || details == 0){
            SerialNumber_clicks=SerialNumber_clicks-1;
            
//            alert('Please Insert details !');
            document.getElementById("info_span").innerHTML = "Please Insert details !";
            $('html,body').scrollTop(0);
            exit();
        }
   
        
        
     document.getElementById("Engineer_name"+y).disabled=true;       
     document.getElementById("Engineer_ID"+y).disabled=true; 
     document.getElementById("details"+y).disabled=true; 
    }
    
    
    
    
    
}


    function SerialNumber_CreateFunction() {
       
       
//       alert('TEST');
       
       
    var table = document.getElementById("SerialNumber_table");
    var row = table.insertRow(0);
    SerialNumber_clicks += 1;
    
   
    validation();
   var cell1 = row.insertCell(0);
   cell1.innerHTML = cell1.innerHTML +'<select class="form-control" name="Engineer_name'+SerialNumber_clicks+'" id="Engineer_name'+SerialNumber_clicks+'" onchange="pick_engineer_id($(this).val(),SerialNumber_clicks)" required=""><option value="">Select Engineer Name</option></select>';

    var cell2 = row.insertCell(1);
    cell2.innerHTML = cell2.innerHTML +'<input type="text" name="Engineer_ID'+SerialNumber_clicks+'" readonly="readonly"  id="Engineer_ID'+SerialNumber_clicks+'" value="" class="form-control required">';
//   style="visibility:hidden;"  
    var cell3 = row.insertCell(2);
    cell3.innerHTML = cell3.innerHTML +'<input type="text" name="details'+SerialNumber_clicks+'"  id="details'+SerialNumber_clicks+'" value="" class="form-control required" required="">';
//     alert(clicks);
     
//    var cell4 = row.insertCell(3);
//    cell4.innerHTML = cell4.innerHTML +'<INPUT type="button"  class="btn_medium" value="Remove" onclick="this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); remove_function();" />';
load_engineer_name(SerialNumber_clicks);
  
  }
  
  
  
  
  
  
  
function SerialNumber_DeleteFunction() {
    document.getElementById("SerialNumber_table").deleteRow(0);
    
    SerialNumber_clicks=SerialNumber_clicks-1;
    
}

function remove_function(){
//     alert("Pre"+clicks);
        SerialNumber_clicks=SerialNumber_clicks-1;
//     alert("POST"+clicks);
}

function pass_serial_item_name(){

    var status_serial_item_js=[];
//    var Serial_Item_Name=[];

//alert('kk');
document.getElementById("Item_name_serial_number").options.length =0;
   
        for (i = 0; i <= clicks; i++) {
        
    status_serial_item_js[i] = $("#status_serial_item"+i).val(); 
//     alert(Item_name_js[i]);

//alert(Serial_Item_Name);
        if(status_serial_item_js[i]==1){
//    var Serial_Item_Name=0;
//    var serial_item=0;
               Serial_Item_Name =  $("#Item_name"+i).val();
//               alert("YES, Serial Item Name.."+Serial_Item_Name)
               
               select = document.getElementById("Item_name_serial_number");
               serial_item = document.createElement('option');    
               serial_item.value = Serial_Item_Name;
               serial_item.innerHTML = Serial_Item_Name;
               select.appendChild(serial_item);
//clicks=clicks-1;
        }else{
//            alert("No, Non-Serial Item");
        }
//     total_price_js[i] = $("#total_price"+i).val(); 
//serial_number_validation();
    }   
 
}

</script>


<script>

      $(document).ready(function(){
        $("#serial_number_form").submit(function(e){
            e.preventDefault();
                
//			 alert("PICK id"+ITEM_UNITES_ID); 
//			exit();	
				
//            validateForm();
//            if(submit_or_not == 1)
//            {
//                exit;
//            }

//serial_number_validation();
//calculate_price();
//exit();
//hidden_MRN_serial_number

//kkk
//    var Item_name_serial_number_js = $("#Item_name_serial_number").val();   
//    var hidden_MRN_serial_number_js = $("#hidden_MRN_serial_number").val(); 
//// ................. Serial Number Items  ..............................
//alert("TEST..."+SerialNumber_clicks)
    var Engineer_name_js=[]; 
    var details_js=[]; 
    var Engineer_ID_js=[]; 
    var loop_serial_number_js=SerialNumber_clicks;
    for (loop = 1; loop <= SerialNumber_clicks; loop++) {
//     "Item_name"+clicks
//alert('loop'+loop);
     Engineer_name_js[loop] = $("#Engineer_name"+loop).val(); 
     Engineer_ID_js[loop] = $("#Engineer_ID"+loop).val();
     details_js[loop] = $("#details"+loop).val(); 
     
//     status_serial_item_js[i] = $("#status_serial_item"+i).val(); 

document.getElementById("Engineer_name"+loop).disabled = true;
document.getElementById("details"+loop).disabled = true;
    }
    
//    alert('TEST ..' + Engineer_name_js +'.....' + Engineer_ID_js + ' ...... ' + details_js);

     document.getElementById("loop_number").value=loop_serial_number_js; 
     document.getElementById("engineer_name_array").value=Engineer_name_js;    
     document.getElementById("engineer_id_array").value=Engineer_ID_js;
     document.getElementById("details_array").value=details_js;
     
     document.getElementById("save_eng_list").disabled = true;
     document.getElementById("serial_number_add_button").disabled = true;
     document.getElementById("serial_number_update_button").disabled = true;
    exit();
    
            
        });
        
    });

        
        
//    }
</script>



<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
...................................................ADD Technician JS..............................................................................
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->





<script>
function Technician_validation(){
    
    
    
    document.getElementById("Technician_info_span").innerHTML = "";
    
     if (Technician_clicks==1){
//       alert(" test...."+y); 
        }else{
        var x=Technician_clicks-1;

        var Technician_name = document.getElementById("Technician_name"+x).selectedIndex;
      
        if(Technician_name == null || Technician_name == 0){
            
//        alert("pre"+clicks);
        Technician_clicks=Technician_clicks-1;
//        alert("Post"+clicks);
// alert('Please Insert Technician Name !');
            document.getElementById("Technician_info_span").innerHTML = "Please Select Technician Name ";
//            $('html,body').scrollTop(0);
            exit();
        }
      
        var Technician_details = document.getElementById("Technician_details"+x).value;
        if(Technician_details == null || Technician_details == 0){
            Technician_clicks=Technician_clicks-1;
            
//            alert('Please Insert details !');
            document.getElementById("Technician_info_span").innerHTML = "Please Insert Technician details !";
            $('html,body').scrollTop(0);
            exit();
        }
   
        
        
     document.getElementById("Technician_name"+x).disabled=true;       
//     document.getElementById("Engineer_ID"+y).disabled=true; 
     document.getElementById("Technician_details"+x).disabled=true; 
    }
    
    
    
    
    
}


    function Technician_CreateFunction() {
       
       
//       alert('TEST');
       
       
    var table = document.getElementById("Technician_table");
    var row = table.insertRow(0);
    Technician_clicks += 1;
    
   
    Technician_validation();

   var cell1 = row.insertCell(0);
   cell1.innerHTML = cell1.innerHTML +'<select class="form-control" name="Technician_name'+Technician_clicks+'" id="Technician_name'+Technician_clicks+'" onchange="pick_engineer_id($(this).val())" required=""><option value="">Select Technician Name</option></select>';

//    var cell2 = row.insertCell(1);
//    cell2.innerHTML = cell2.innerHTML +'<input type="text" name="Technician_ID'+Technician_clicks+'" readonly="readonly"  id="Technician_ID'+Technician_clicks+'" value="" class="form-control required">';
//   style="visibility:hidden;"  
    var cell2 = row.insertCell(1);
    cell2.innerHTML = cell2.innerHTML +'<input type="text" name="Technician_details'+Technician_clicks+'"  id="Technician_details'+Technician_clicks+'" value="" class="form-control required" required="">';

load_Technician_name(Technician_clicks);


}

function Technician_DeleteFunction() {
    document.getElementById("Technician_table").deleteRow(0);
    
    Technician_clicks=Technician_clicks-1;
    
}

function Technician_remove_function(){
//     alert("Pre"+clicks);
        Technician_clicks=Technician_clicks-1;
//     alert("POST"+clicks);
}


</script>


<script>

      $(document).ready(function(){
        $("#Technician_form").submit(function(e){
            e.preventDefault();
//// ................. Technician save  ..............................
//alert("TEST..."+Technician_clicks)
    var Technician_name_js=[]; 
    var Technician_details_js=[]; 
//    var Technician_ID_js=[]; 
    var Technician_number=Technician_clicks;
    
    for (T_loop = 1; T_loop <= Technician_clicks; T_loop++) {
//     "Item_name"+clicks
//alert('loop'+loop);
     Technician_name_js[T_loop] = $("#Technician_name"+T_loop).val(); 
//     Engineer_ID_js[loop] = $("#Engineer_ID"+loop).val();
     Technician_details_js[T_loop] = $("#Technician_details"+T_loop).val(); 
     
//     status_serial_item_js[i] = $("#status_serial_item"+i).val(); 

document.getElementById("Technician_name"+T_loop).disabled = true;
document.getElementById("Technician_details"+T_loop).disabled = true;
    }
    
//    alert('TEST ..' + Technician_name_js +'.....' + Technician_number + ' ...... ' + Technician_details_js);
     
     document.getElementById("Technician_loop_number").value=Technician_number; 
     document.getElementById("Technician_name_array").value=Technician_name_js;    
     document.getElementById("Technician_details_array").value=Technician_details_js;
     
     
     
     document.getElementById("save_technician_list").disabled = true;
     document.getElementById("Technician_add_button").disabled = true;
     document.getElementById("Technician_update_button").disabled = true;
    exit();
    
            
        });
        
    });

        
        
//    }
</script>