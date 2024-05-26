<!--<h1>under construction</h1>-->
<?php
$id = $this->session->userdata('id');
$name= $this->session->userdata('name');
$department= $this->session->userdata('department');
?>
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
    
    var SerialNumber_clicks=0;
    
    var Technician_clicks=0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
               Customer Information From ( <?php echo $department;?> Team)
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
            <form action="" name="assign_task_from" id="assign_task_from" method="">
                <input type="hidden" name="hidden_id" value="<?php echo $id;?>" id="hidden_id">
                <input type="hidden" name="hidden_dept" value="<?php echo $department;?>" id="hidden_dept">
                <input type="hidden" name="today" value="<?php echo date("Y-m-d H:i:s")?>" id="today">
                
                <!--................................................................................................................-->
                <input type="hidden" name="p_key" value="" id="p_key">
                
                <input type="hidden" class="form-control" name="loop_number" id="loop_number">
                <input type="hidden" class="form-control" name="c_name_array" id="c_name_array">
                <input type="hidden" class="form-control" name="c_designation_array" id="c_designation_array">
                <input type="hidden" class="form-control" name="c_email_array" id="c_email_array">
                <input type="hidden" class="form-control" name="c_phone_array" id="c_phone_array">

                <!--.................................................................................................................-->
                <div class='row'>
                   
                     <div class="col-lg-3">
                        <div class="form-group">
                          <label>Client Category<div style="color:red;float: right;">*</div></label>
                          <select class="form-control" name="Client_Category" id="Client_Category" required="">
                                <option value="" >Select Client Category</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Client ID<div style="color:red;float: right;">*</div></label>
                          <input class="form-control" name="Client_ID" id="Client_ID" placeholder="Enter Client ID" required="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Client Name<div style="color:red;float: right;">*</div></label>
                          <input class="form-control" name="Client_Name" id="Client_Name" onkeyup="uper_case_client_name(this)" onchange="pick_cilent_info()"  placeholder="Enter Client Name" required="">
                        </div>
                    </div>
                    
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Office Type<div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="ofc_type" id="ofc_type" required="">
                                <option value="" >Select Office Type</option>
                            </select>
                        </div>
                    </div> 
                </div>
               
                   <div class="row">
                  <div class="col-lg-3">
                        <div class="form-group">
                          <label>Building Name<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="house_name" id="house_name" placeholder="Enter Building Name" required="">
                        </div>
                    </div>     
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Plot /Building /House NO.<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="house_no" id="house_no" placeholder="Enter Plot /Building /House NO." required="">
                        </div>
                    </div>
                        <div class="col-lg-3">
                        <div class="form-group">
                          <label>Road No/Name<div style="color:red;float: right;">*</div></label>
                          <input class="form-control" name="road_no" id="road_no" placeholder="Enter Road No/Name" required="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label> Sector/ Section/ Word NO.<div style="color:red;float: right;">*</div></label>
                          <input class="form-control" name="word" id="word" placeholder="Enter Sector/ Section/ word No" required="">
                        </div>
                    </div>
                    
                     
                </div>
                
                
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Thana/ Post Office<div style="color:red;float: right;"></div></label>
                          <input class="form-control" name="thana" id="thana" placeholder="Enter Thana/ Post Office" required="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Post Code<div style="color:red;float: right;">*</div></label>
                          <input class="form-control" name="post_code" id="post_code" placeholder="Enter Post Code" required="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>District<div style="color:red;float: right;">*</div></label>
                          <input class="form-control" name="district" id="district" onkeyup="uper_case_dis(this)" placeholder="Enter District" required="">
                        </div>
                    </div>
                     <div class="col-lg-6">
                        <div class="form-group"><br>
                        
                        <label>Address As Like : <div style="color:red;float: right;"> </div></label>&nbsp;&nbsp;
                        HO <input type="radio" name="add" id="add1" onclick="pick_address_info(this.value);" value="Head Office"> &nbsp;&nbsp;&nbsp;
                        HOIT <input type="radio" name="add" id="add2" onclick="pick_address_info(this.value);" value="HOIT"> &nbsp;&nbsp;&nbsp;
                        ADC <input type="radio" name="add" id="add3" onclick="pick_address_info(this.value);" value="ADC"> &nbsp;&nbsp;&nbsp;
                        FEO <input type="radio" name="add" id="add4" onclick="pick_address_info(this.value);" value="FEO"> 
                        </div>
                    </div>     
                   
                </div> 
                
                <div class="row">
                      
                    <div class="col-lg-6">
                        <div class="form-group"><br>
                            <button type="submit" class="btn btn-default" id="save_btn" name="save_btn" value="save" >Save</button>
                            <button type="button" disabled="disabled" id="update_btn" name="update_btn" class="btn btn-success"  onclick="update_info();"> Update</button>
                            <button type="button" class="btn btn-info" data-toggle='modal' id="add_c_info" data-target='#myModal' onclick="pass_serial_item_name()" data-backdrop='static'>ADD Contact Person Info</button>
                        </div>
                    </div>
                </div> 
                  
                <!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                <!--<button type="submit" class="btn btn-default" value="save" >Save</button>-->
            </form>
            
        </div>
    </div>
    
    
    
    
    <!--.............................................................................................-->
    
            <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Client ID</th>
                                <th>Client Name</th>
                                <th>Office Type </th>
                                <th>Contact Person Name</th>
                                <th>Designation</th>
                                <th>Phone </th>
                                <th>Email </th>
                                <th>Address </th>
                                <th>Action </th>
                            </tr>
                        </thead>
                        <tbody id="client_info_tbl"> </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!--................................................................................................-->
</div>



<!--...........................................ADD Contact Info.......................................................................-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">   
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                
                
                
                <button type="button" class="close" data-dismiss="modal">&times;</button>
<div class="row"> 
                
    <div class="col-md-8 col-sm-8">
                <h4 class="modal-title"> ADD Contact Person Information</h4>
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
                                <th>Contact Person Name</th>
                                <th>Designation</th>
                                <th>Email Address</th>
                                <th>Phone Number</th>
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
                                       
                                        <button type="button" class="btn btn-default" data-dismiss="modal" id="clear_attach_file_value" onclick="clr_msg_value()">Close</button>
                                        
                                        
                                    </div>
                </div>
            </div>
            
              </form> 
            
            
            
            
        </div>      
    </div>
</div> 

<!--..................................................................................................................-->

 <div class="modal fade" id="edit_Modal" role="dialog">
    <div class="modal-dialog">   
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                
                
                
                <button type="button" class="close" data-dismiss="modal">&times;</button>
<div class="row"> 
                
    <div class="col-md-8 col-sm-8">
                <h4 class="modal-title"> Edit Contact Person Information</h4>
     </div>           
                <div class="col-md-4 col-sm-4">
<!--                <button type="button" class="btn btn-info" id="serial_number_add_button" onclick="SerialNumber_CreateFunction()">ADD</button></a>
                <button type="button" class="btn btn-default" id="serial_number_update_button" onclick="SerialNumber_DeleteFunction()">Delete</button>-->
                </div>
    </div>             
            </div>
            
            <!--<form>-->
            <div class="modal-body">
    <span id="info_span"></span>
            </div>
            <div class="modal-footer">
                
                <div class="table-responsive">   
                    
                    <table class="table table-bordered table-striped" id="modal_table">
                            <thead>
                                <tr>
                                    <th>Contact Person Name</th>
                                    <th>Designation</th>
                                    <th>Email Address</th>
                                    <th>Phone Number</th>
                                </tr>
                            </thead>
                            <tbody id="edit_c_table">
                                <tr>
                                    <td>
                                       <input class="form-control" name="e_contact_name" id="e_contact_name"  required="">
                                    </td>
                                    <td>
                                       <input class="form-control" name="e_designation" id="e_designation"  required="">
                                    </td>
                                    <td>
                                       <input class="form-control" name="e_email" id="e_email"  required="">
                                    </td>
                                    <td>
                                       <input class="form-control" name="e_phone" id="e_phone"  required="">
                                    </td>
                                </tr>
                            </tbody> 

                        </table>
                    
                </div> 
                <div class="row">
                                    <div class="col-md-7 col-sm-7"></div>
                                    <div class="col-md-5 col-sm-5">
                                        <!--<input type="hidden" name="upload_id" value="<?php echo $Subscriber_id_for_file; ?>" id="upload_id">-->
                                        <!--<button id="" type="submit" class="btn btn-info"  value="save" onclick="save_serial_number_function()">Save</button>-->
                                        <button type="button" class="btn btn-info" id="update_contact_btn" name="update_contact_btn" onclick="update_contact_info()">UPDATE</button>
                                       
                                        <button type="button" class="btn btn-default" data-dismiss="modal" id="clear_attach_file_value" >Close</button>
                                        
                                        
                                    </div>
                </div>
            </div>
            
              <!--</form>--> 
            
            
            
            
        </div>      
    </div>
</div>



<!--........................................................................................................................-->


<!-- <script src="http://cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js" type="text/javascript"></script>
 <script>
    webshims.setOptions('forms-ext', {types: 'date'});
    webshims.polyfill('forms forms-ext');

</script>-->

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
function null_from(){
      document.forms["assign_task_from"]["Client_Category"].selectedIndex=0;
      document.forms["assign_task_from"]["ofc_type"].selectedIndex = 0;
      document.forms["assign_task_from"]["Client_Name"].value = null;
      document.forms["assign_task_from"]["Client_ID"].value = null;
      document.forms["assign_task_from"]["Contact_Name"].value= null;
      document.forms["assign_task_from"]["designation"].value= null;
      document.forms["assign_task_from"]["phone"].value = '+880';
      document.forms["assign_task_from"]["email"].value = null;
      document.forms["assign_task_from"]["house_no"].value = null;       
      document.forms["assign_task_from"]["road_no"].value = null;
      document.forms["assign_task_from"]["word"].value = null;
      document.forms["assign_task_from"]["thana"].value = null;
      document.forms["assign_task_from"]["post_code"].value = null;
      document.forms["assign_task_from"]["district"].value = null;
//      document.getElementById("myTextarea").value
      
}
</script>

<script>
    $("form#assign_task_from").submit(function () {
       
//       chk_phone_number();
       
    if ( SerialNumber_clicks == 0 )
        {
            alert('Please ADD Contact Person Information !');
            exit();
        }else{
            
        
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/corporate_c/save_bank_client_info/'); ?>",
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
        return false;
         document.getElementById("update_btn").disabled = true; 
         document.getElementById("save_btn").disabled = true; 
    }
    }      
      
    );
</script>




<script src="../../js/jquery.min.js" type="text/javascript"></script>
 <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->
<!--<script>
		$(function() {
		
			$("#type_task").change(function() {
				$("#sub_task").load("<?php echo base_url(); ?>textdata/" + $(this).val() + ".txt");
			});
		});
</script>-->

<script>
    $(function() {		
            $("#Zone").change(function() {
                   $("#area").load("<?php echo base_url(); ?>corporate/" + $(this).val() + ".txt");
            });
    });
</script>

<script type="text/javascript">
    
 function uper_case(SerialNumber_clicks){
    var value = document.getElementById("Contact_Name"+SerialNumber_clicks).value;
    var new_value = value.toUpperCase();
    document.getElementById("Contact_Name"+SerialNumber_clicks).value=new_value;    
 }   
 
 function uper_case_dig(field_value){
    var value = field_value.value;
    var new_value = value.toUpperCase();
    document.getElementById("designation").value=new_value; 
 }
 
 function uper_case_dis(field_value){
    var value = field_value.value;
    var new_value = value.toUpperCase();
    document.getElementById("district").value=new_value;    
 }
   
 function uper_case_client_name(field_value){
    var value = field_value.value;
    var new_value = value.toUpperCase();
    document.getElementById("Client_Name").value=new_value;    
 }
 
function pick_cilent_info(){
    document.getElementById("update_btn").disabled = true; 
    var Client_Name = $('#Client_Name').val();
    
        $.post('<?php echo base_url();?>index.php/corporate_c/pick_bank_client_info', {
            Client_Name: Client_Name
        }, function (search_info_data) {

//alert(search_info_data);

            var search_array = JSON.stringify(search_info_data);
            var new_search_array = JSON.parse(search_array);

var row_no=0;
var tableHTML = "";

    for (var key in new_search_array) {  
        if (new_search_array.hasOwnProperty(key)) {
            
           row_no=row_no+1; 
           tableHTML += "<tr>";
           tableHTML += "<td id=" + row_no+'Client_id' + ">" + new_search_array[key]["Client_id"]+"</td>";
           tableHTML += "<td id=" + row_no+'Client_Name' + ">" + new_search_array[key]["Client_Name"]+"</td>";
           tableHTML += "<td id=" + row_no+'ofc_type' + ">" + new_search_array[key]["ofc_type"]+"</td>";
           tableHTML += "<td id=" + row_no+'Contact_Name' + ">" + new_search_array[key]["Contact_Name"]+"</td>";
           tableHTML += "<td id=" + row_no+'designation' + ">" + new_search_array[key]["designation"]+"</td>";
           tableHTML += "<td id=" + row_no+'phone' + ">" + new_search_array[key]["phone"]+"</td>";
           tableHTML += "<td id=" + row_no+'email' + ">" + new_search_array[key]["email"]+"</td>";
           
           tableHTML += "<td id=" + row_no+'address' + " hidden>" + new_search_array[key]["house_name"]+'$'+ new_search_array[key]["house_no"]+'$'+ new_search_array[key]["road_no"] + '$'
                   + new_search_array[key]["word"] + '$' + new_search_array[key]["thana"] + '$' + new_search_array[key]["post_code"] + '$' + new_search_array[key]["district"] +"</td>";
           
            tableHTML += "<td>" + new_search_array[key]["house_name"]+',<br> Plot /Building /House No. : '+ new_search_array[key]["house_no"]+'<br> Road :'+ new_search_array[key]["road_no"] + ' / '
                   + new_search_array[key]["word"] + ' ,<br>' + new_search_array[key]["thana"] + ' , ' + new_search_array[key]["district"] + '-' + new_search_array[key]["post_code"] +",<br>Bangladesh.</td>";
           
           
           
           tableHTML += "<td id=" + row_no + ">" + '<a onclick='+"edit_bwu('"+ row_no +"')"+' > <button> Edit </a> </button> <br><br> \n\
                        <a onclick='+"cancel_bwu()"+' > <button> Cancel </button> </a>  <br><br> \n\ \n\
                        <a onclick='+"edit_contact('"+ row_no +"')"+' > <button type="button" data-toggle="modal" id="edit_c_info" data-target="#edit_Modal" onclick="pass_serial_item_name()" data-backdrop="static">Edit Contact </button> </a>' +"</td> ";
            tableHTML += "<td id=" + row_no+'p_key' + " hidden>" + new_search_array[key]["Id"]+"</td>";
           tableHTML += "</tr>"; 
        } 
        
    }   
    $("#client_info_tbl").html(tableHTML); 
            
        }, 'JSON');

}


</script>



<script>

 function edit_bwu(row_no){
//  update_btn    
  document.getElementById("update_btn").disabled = false;  
  document.getElementById("save_btn").disabled = true;
  document.getElementById("add_c_info").disabled = true;
  
 document.getElementById("Client_ID").disabled  = true;
 document.getElementById("Client_Name").value  = document.getElementById(+row_no+'Client_Name').innerHTML;
 document.getElementById("Client_ID").value  = document.getElementById(+row_no+'Client_id').innerHTML;
 document.getElementById("p_key").value  = document.getElementById(+row_no+'p_key').innerHTML;
// document.getElementById("Contact_Name").value = document.getElementById(+row_no+'Contact_Name').innerHTML;
// document.getElementById("designation").value  = document.getElementById(+row_no+'designation').innerHTML;
// document.getElementById("phone").value  = document.getElementById(+row_no+'phone').innerHTML;
// document.getElementById("email").value  = document.getElementById(+row_no+'email').innerHTML;
var address  = document.getElementById(+row_no+'address').innerHTML;
var array_address = address.split("$");
document.getElementById("house_name").value  = array_address[0];
document.getElementById("house_no").value  = array_address[1];
document.getElementById("road_no").value  = array_address[2];
document.getElementById("word").value  = array_address[3];
document.getElementById("thana").value  = array_address[4];
document.getElementById("post_code").value  = array_address[5];
document.getElementById("district").value  = array_address[6];


}

function cancel_bwu(){
 document.getElementById("update_btn").disabled = true; 
 document.getElementById("save_btn").disabled = false;
 document.getElementById("add_c_info").disabled = false;
 
 document.getElementById("Client_ID").disabled  = false;
 document.getElementById("Client_Name").value  = null;
 document.getElementById("Client_ID").value  = null;
// document.getElementById("Contact_Name").value = null;
// document.getElementById("designation").value  = null;
// document.getElementById("phone").value  = null;
// document.getElementById("email").value  =null;
document.getElementById("house_no").value  = null;
document.getElementById("road_no").value  = null;
document.getElementById("word").value  = null;
document.getElementById("thana").value  = null;
document.getElementById("post_code").value  = null;
document.getElementById("district").value  = null;
document.getElementById("p_key").value  = null;
}


function update_info(){
    
    var Client_Name=document.getElementById("Client_Name").value;
    var Client_ID=document.getElementById("Client_ID").value;
//    var Contact_Name=document.getElementById("Contact_Name").value;
//    var designation=document.getElementById("designation").value;
//    var phone=document.getElementById("phone").value;
    var house_name=document.getElementById("house_name").value;
    var house_no=document.getElementById("house_no").value;
    var road_no=document.getElementById("road_no").value;
    var word=document.getElementById("word").value;
    var thana=document.getElementById("thana").value;
    var post_code=document.getElementById("post_code").value;
    var district=document.getElementById("district").value;
    var p_key=document.getElementById("p_key").value;
//    exit();
    $.post('<?php echo base_url();?>index.php/corporate_c/update_bank_client_info', {
        Client_Name:Client_Name,
        Client_ID:Client_ID,
        house_name:house_name,
        house_no:house_no,
        road_no:road_no,
        word:word,
        thana:thana,
        post_code:post_code,
        district:district,
        p_key:p_key
    }, function (bwu_info) {
        
        alert('Successfully Update information');  

 document.getElementById("update_btn").disabled = true; 
    }, 'JSON');
 }
</script>   
   
<script type="text/javascript">

function chk_phone_number(SerialNumber_clicks){
        document.getElementById("info_span").innerHTML = "";
    
    

    
        var Registered_Mobile = document.getElementById("phone"+SerialNumber_clicks).value; 
        
     
        if(Registered_Mobile == null || Registered_Mobile == 0){
            document.getElementById("info_span").innerHTML = "Please Input Registered Mobile Number ";
            document.getElementById("phone"+SerialNumber_clicks).value='+880';
            $('html,body').scrollTop(0);
            exit();
        }
        var new_mobile = Registered_Mobile.split("+", 2);
        
// alert(new_mobile[1]);
        var  Registered_Mobile=new_mobile[1];
               
        if (/^\d{13}$/.test(Registered_Mobile) == true) {
//                            alert("DONE valid mobile number.");
                document.getElementById("info_span").innerHTML = "";
        else if (/^\d{8}$/.test(Registered_Mobile) == true) {
             document.getElementById("info_span").innerHTML = "";
        }else {
//            document.getElementById("info_span").innerHTML = "Please Insert a valid Modile Number !";
            alert('Please Insert a valid Modile Number !');
            document.getElementById("phone"+SerialNumber_clicks).value='+880';
            $('html,body').scrollTop(0);
            exit();
        }

        var gp = Registered_Mobile.search("88017");
        var gp1 = Registered_Mobile.search("88013");
        var b_link = Registered_Mobile.search("88019");
        var b_link1 = Registered_Mobile.search("88014");
        var robi = Registered_Mobile.search("88018");
        var teletalk = Registered_Mobile.search("88015");
        var airtle = Registered_Mobile.search("88016");
        var match = 0;
        if (gp == match || gp1 == match || b_link == match || b_link1 == match || robi == match || teletalk == match || airtle == match) {
//                       alert("YES Operate"+"G...."+gp+"B...."+b_link+"R...."+robi+"T.."+teletalk+"A..."+airtle);   
                document.getElementById("info_span").innerHTML = "";       
        } else {
//                       alert("Moblie Operate NULL "+"G...."+gp+"B...."+b_link+"R..."+robi+"T.."+teletalk+"A..."+airtle);
//            document.getElementById("info_span").innerHTML = "Please Insert a valid Modile operators Number !";
             alert('Please Insert a valid Modile operators Number !');
             document.getElementById("phone"+SerialNumber_clicks).value='+880';
            $('html,body').scrollTop(0);
            exit();
        }
}

function chk_email(SerialNumber_clicks){
    var email = document.getElementById("email"+SerialNumber_clicks).value; 
     
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
     
      if (re.test(email) == true) {
         
      } else{
           alert('Please Insert Valid Email Address ! ');
           document.getElementById("email"+SerialNumber_clicks).value='';
      }  
}
</script>

<script type="text/javascript">
    function pick_address_info(office_type){
//        alert("TEST..."+t);
//       document.getElementById("tm_v").value=office_type;
       
      var  Client_Name=document.getElementById("Client_Name").value;
      
      
      if(Client_Name==null || Client_Name=='') {
            document.getElementById("info_span").innerHTML = "Please Insert Client Name !";
//            document.getElementById("phone").value='+880';
            $('html,body').scrollTop(0);
            exit();
        }
      
       $.post('<?php echo base_url();?>index.php/corporate_c/pick_bank_client_address', {
            Client_Name: Client_Name,
            office_type:office_type
        }, function (search_info_data) {

//alert(search_info_data);

            var search_array = JSON.stringify(search_info_data);
            var new_search_array = JSON.parse(search_array);
//new_search_array[key]["Client_id"]
var house_no=new_search_array["house_no"]
if( typeof house_no !== 'undefined'){
    document.getElementById("house_no").value  = new_search_array["house_no"];
    document.getElementById("road_no").value  =  new_search_array["road_no"];
    document.getElementById("word").value  = new_search_array["word"];
    document.getElementById("thana").value  =  new_search_array["thana"];
    document.getElementById("post_code").value  =  new_search_array["post_code"];
    document.getElementById("district").value  =  new_search_array["district"];
}else{
    document.getElementById("house_no").value  = null;
    document.getElementById("road_no").value  =  null;
    document.getElementById("word").value  = null;
    document.getElementById("thana").value  =  null;
    document.getElementById("post_code").value  =  null;
    document.getElementById("district").value  =  null;
}

        }, 'JSON');
      
    }
</script>


<script>
  
    function SerialNumber_CreateFunction() {       
//       alert('TEST');

    var table = document.getElementById("SerialNumber_table");
    var row = table.insertRow(0);
    SerialNumber_clicks += 1;
    
    validation();  
   var cell1 = row.insertCell(0);
   cell1.innerHTML = cell1.innerHTML +'<input class="form-control" type="text"  name="Contact_Name'+SerialNumber_clicks+'"  onkeyup="uper_case('+SerialNumber_clicks+')" id="Contact_Name'+SerialNumber_clicks+'" value="" class="form-control required" required="">';

    var cell2 = row.insertCell(1);
    cell2.innerHTML = cell2.innerHTML +'<select class="form-control" name="designation'+SerialNumber_clicks+'" id="designation'+SerialNumber_clicks+'"  required=""><option value="">Select Designation </option><option value="MD">MD</option><option value="Chairman">Chairman</option><option value="Head of IT">Head of IT</option><option value="Focal Point">Focal Point</option></select>';
//   style="visibility:hidden;"  
    var cell3 = row.insertCell(2);
    cell3.innerHTML = cell3.innerHTML +'<input class="form-control" type="email" name="email'+SerialNumber_clicks+'"  id="email'+SerialNumber_clicks+'" value="" onchange="chk_email('+SerialNumber_clicks+');" class="form-control" required="">';
    
    var cell4 = row.insertCell(3);
    cell4.innerHTML = cell4.innerHTML +'<input class="form-control" type="text" name="phone'+SerialNumber_clicks+'"  id="phone'+SerialNumber_clicks+'" value="+880" onchange="chk_phone_number('+SerialNumber_clicks+');" class="form-control required" required="">';
//     alert(clicks);
     
//    var cell4 = row.insertCell(3);
//    cell4.innerHTML = cell4.innerHTML +'<INPUT type="button"  class="btn_medium" value="Remove" onclick="this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); remove_function();" />';
//load_engineer_name(SerialNumber_clicks);
  
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
</script>    

<script>
function load_engineer_name(SerialNumber_clicks){
    var Zone=document.getElementById("Zone").value;
    $('#Engineer_name'+SerialNumber_clicks).load("<?php echo base_url(); ?>FI_engineer_list/"+ Zone +".txt");
//    $('#Engineer_name'+SerialNumber_clicks).load("<?php echo base_url(); ?>FI_engineer_list/Engineer_list.txt");
}  



function validation(){

    document.getElementById("info_span").innerHTML = "";
    
     if (SerialNumber_clicks==1){
//       alert(" test...."+y); 
        }else{
        var y=SerialNumber_clicks-1;

        var designation = document.getElementById("designation"+y).selectedIndex;
      
        if(designation == null || designation == 0){
            
//        alert("pre"+clicks);
        SerialNumber_clicks=SerialNumber_clicks-1;
//        alert("Post"+clicks);
// alert('Please Insert Engineer Name !');
            document.getElementById("info_span").innerHTML = "Please Select Designation ";
//            $('html,body').scrollTop(0);
            exit();
        }
      
        var Contact_Name = document.getElementById("Contact_Name"+y).value;
        if(Contact_Name == null || Contact_Name == 0){
            SerialNumber_clicks=SerialNumber_clicks-1;        
            document.getElementById("info_span").innerHTML = "Please Insert Contact Name !";
            $('html,body').scrollTop(0);
            exit();
        }
        
        var email = document.getElementById("email"+y).value;
        if(email == null || email == 0){
            SerialNumber_clicks=SerialNumber_clicks-1;        
            document.getElementById("info_span").innerHTML = "Please Insert Contact Person Email Address !";
            $('html,body').scrollTop(0);
            exit();
        }
        
        var phone = document.getElementById("phone"+y).value;
        if(phone == null || phone == 0){
            SerialNumber_clicks=SerialNumber_clicks-1;        
            document.getElementById("info_span").innerHTML = "Please Insert Contact Person phone !";
            $('html,body').scrollTop(0);
            exit();
        }
   
        
        
     document.getElementById("Contact_Name"+y).disabled=true;       
     document.getElementById("designation"+y).disabled=true; 
     document.getElementById("phone"+y).disabled=true; 
     document.getElementById("email"+y).disabled=true; 
    }
    
    
    
    
    
}
</script>
 
<script>

      $(document).ready(function(){
        $("#serial_number_form").submit(function(e){
            e.preventDefault();

//// ................. Serial Number Items  ..............................
//alert("TEST..."+SerialNumber_clicks)
    var c_name_js=[]; 
    var c_designation_js=[];
    var c_email_js=[];
    var c_phone_js=[]; 
    var loop_serial_number_js=SerialNumber_clicks;
    for (loop = 1; loop <= SerialNumber_clicks; loop++) {
//     "Item_name"+clicks
//alert('loop'+loop);
     c_name_js[loop] = $("#Contact_Name"+loop).val(); 
     c_designation_js[loop] = $("#designation"+loop).val();
     c_email_js[loop] = $("#email"+loop).val(); 
     c_phone_js[loop] = $("#phone"+loop).val();
     


document.getElementById("Contact_Name"+loop).disabled = true;
document.getElementById("designation"+loop).disabled = true;
document.getElementById("email"+loop).disabled = true;
document.getElementById("phone"+loop).disabled = true;
    }
    
//    alert('TEST ..' + Engineer_name_js +'.....' + Engineer_ID_js + ' ...... ' + support_type_js);

     document.getElementById("loop_number").value=loop_serial_number_js; 
     document.getElementById("c_name_array").value=c_name_js;    
     document.getElementById("c_designation_array").value=c_designation_js;
     document.getElementById("c_email_array").value=c_email_js;
     document.getElementById("c_phone_array").value=c_phone_js;
     
     document.getElementById("save_eng_list").disabled = true;
     document.getElementById("serial_number_add_button").disabled = true;
     document.getElementById("serial_number_update_button").disabled = true;
    exit();
    
            
        });
        
    });

        
        
//    }
</script>

<script type="text/javascript">
    
    function edit_contact(row_no){
    var p_key=document.getElementById( row_no + "p_key").innerHTML ;
    document.getElementById("p_key").value=p_key;
//    exit();
    $.post('<?php echo base_url();?>index.php/corporate_c/edit_contact_info', {
        p_key:p_key
    }, function (search_info_data) {
        
            var search_array = JSON.stringify(search_info_data);
            var new_search_array = JSON.parse(search_array);
            
    var Contact_Name=new_search_array["Contact_Name"];
    var designation=new_search_array["designation"];
    var email=new_search_array["email"];
    var phone=new_search_array["phone"];
    
    document.getElementById("e_contact_name").value=Contact_Name; 
    document.getElementById("e_designation").value=designation; 
    document.getElementById("e_email").value=email; 
    document.getElementById("e_phone").value=phone; 
//        alert('Successfully ContacctUpdate information');  

// document.getElementById("update_btn").disabled = true; 
    }, 'JSON');
    }
     
     
    function update_contact_info(){

    var p_key=document.getElementById("p_key").value; 
    var e_contact_name=document.getElementById("e_contact_name").value;
    var e_designation=document.getElementById("e_designation").value;
    var e_email=document.getElementById("e_email").value;
    var e_phone=document.getElementById("e_phone").value;
        
//    exit();
    $.post('<?php echo base_url();?>index.php/corporate_c/update_bank_contact_info', {
        e_contact_name:e_contact_name,
        e_designation:e_designation,
        e_email:e_email,
        e_phone:e_phone,
        p_key:p_key
    }, function (update_contact) {
        
        alert('Successfully Update Contact Information');  

    document.getElementById("e_contact_name").disabled=true;
    document.getElementById("e_designation").disabled=true;
    document.getElementById("e_email").disabled=true;
    document.getElementById("e_phone").disabled=true;
    document.getElementById("update_contact_btn").disabled=true;
 
    }, 'JSON');
    }
     
</script>        