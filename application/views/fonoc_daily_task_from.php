<!--<h1>under construction</h1>-->

<?php
$name = $this->session->userdata('name'); 
$id = $this->session->userdata('id'); 
$zone = $this->session->userdata('Zone'); 


//$servername = "203.76.96.115";
//$username = "fonmok";
//$password = "f0nm0kMQR";
//$dbname = "FONOC";
//
//// Create connection
//$conn = mysqli_connect($servername, $username, $password, $dbname);
////print "<br>Checking Mysql Conectation/n";
//if (!$conn) {
//    die("Connection failed: " . mysqli_connect_error());
//}
// 
//$btssql = "select BTS_Name from fonoc_bts_tbl Order by BTS_Name ";
//$btsresult = $conn->query($btssql);
//$conn->close();

?>

<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>  
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
               Daily Task Form ( FONOC )
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
        <div class="col-lg-12">
            <!--<form action="<?php echo base_url(); ?>index.php/link3_controller/fonoc_save_task/" method="post">-->
             <form action="" name="fonoc_task_from" id="fonoc_task_from" method="">
<!--<input type="hidden" name="task_info_id" id="task_info_id" class="form-control" value="<?php echo $result['ticket_no'] ?>">-->
<!--<input type="hidden" class="form-control" name="p_key" id="p_key"  value="<?php echo $result['p_key']; ?>">--> 
                <div class='row'> 
                    <div class="col-lg-3">  
                        <div class="form-group">

                            <label>Zone <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="engineer_zone" id="engineer_zone" >
                                <option  value="<?php echo $zone; ?>"><?php echo $zone; ?></option>
                                <option  value="Dhaka">Dhaka</option>
                                <option  value="Bogura">Bogura</option>
                                <option  value="CTG">CTG</option>
                                <option  value="Khulna">Khulna</option>
                                <option  value="Sylhet">Sylhet</option>
                            </select>
                        </div> 

                    </div>
                    
                    <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>Receipt time<div style="color:red;float: right;">*</div> <i class="fa fa-calendar"></i></label>                                  
                            <input  class="form-control" id="cs_date" name="cs_date" readonly="readonly" value="<?php echo date("d-m-Y H:i:s");?>" placeholder="DD-MM-YYYY">
                            <input type="hidden" name="today" value="<?php echo date("Y-m-d H:i:s")?>" id="today">
                        </div>
                    </div>
                        
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Engineer Name<div style="color:red;float: right;">*</div></label>                                                                          
                            <input class="form-control" name="create_name" id="create_name" value="<?php echo $name; ?>" readonly="readonly" required="">
                        </div>
                    </div>
                        
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Engineer ID<div style="color:red;float: right;">*</div></label>                                                                          
                            <input class="form-control" name="create_id" id="create_id" value="<?php echo $id; ?>" readonly="readonly" required="">
                        </div>
                    </div>    
                    
                    </div>
                    
                    <div class='row'> 
                   
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Receipt Phone Number<div style="color:red;float: right;">*</div></label>                                                                          
                            <input class="form-control" name="receipt_phone" id="receipt_phone" required="">
                        </div>
                    </div>
                   <div class="col-lg-3">
                        <div class="form-group">
                            <label>Client ID .<div style="color:red;float: right;">*</div></label>                                                                          
                            <input class="form-control" name="Client_ID" id="Client_ID" onchange="client_id_fun()" required="">
                            <input type="hidden" class="form-control" name="BTS_Name" id="BTS_Name" >
                            <input type="hidden" class="form-control" name="OLT_Name" id="OLT_Name" >
                            <input type="hidden" class="form-control" name="PON" id="PON" >
                            <input type="hidden" class="form-control" name="Port" id="Port" >  
                            <input type="hidden" class="form-control" name="Client_Category" id="Client_Category" >
                            <input type="hidden" class="form-control" name="ONU_Model" id="ONU_Model" >
                            <input type="hidden" class="form-control" name="Client_Name" id="Client_Name" >
                        </div>
                    </div> 
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>TKI ID<div style="color:red;float: right;"></div></label>                                                                          
                            <input class="form-control" name="tki_id" id="tki_id" >
                        </div>
                    </div>
                   <div class="col-lg-3">  
                        <div class="form-group">

                            <label>Task Type <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="task_type" id="task_type" required="">
                                <option  value="">Select Task Type</option>
                                <option  value="Installation ">Installation </option>
                                <option  value="Troubleshoot">Troubleshoot</option>
                                <option  value="Shifting">Shifting</option>
                                <option  value="MAC_Change">MAC Change</option>
                                <option  value="Status_Check">Status Check</option>
                                <option  value="Other">Other</option>
                            </select>
                        </div> 

                    </div>
                     
                </div>
                 <div class='row'>
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>Comments</label>
                            <textarea class="form-control" rows="3" name="comments" id="comments"></textarea>
                        </div>
                    </div> 
                     <div class="col-lg-3">
                        <div class="form-group">
                            <label></label><br><br>
                             <button type="submit" class="btn btn-default" value="Save">SAVE</button>
                            <!--<textarea class="form-control" rows="2" name="comments" id="comments"></textarea>-->
                        </div>
                    </div>
                     
                      
                 </div>
                
               
            </form>
        </div>
    </div>





<br><br>
    <h3>OLT Information </h3>
    
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered table-hover">
                    <thead>
                        <tr>                        
                            <th>BTS Name</th>
                            <th>OLT Name</th>
                            <th>PON Port</th>
                            <th>ONU ID</th>
                            <th>ONU Model</th>
                            <th>MAC Address</th>
                            <th>VLAN</th>
                        </tr>
                    </thead>
                    <tbody id="client_tbl">  </tbody>
                </table>
        </div>
    </div>


</div>

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

<script type="text/javascript">

    function date_select() {
        var priority_type = document.getElementById("priority_type").value;

        if (priority_type == 'High') {
            document.getElementById("s_date").value = null;
            document.getElementById("e_date").value = null;
        } else {

//           document.getElementById("s_date").value='t';
//           document.getElementById("e_date").value=<?php // echo date("d-m-Y h:i:sa");  ?> ;
        }

    }

</script>

<script type="text/javascript">
    function select_ID_Name() {
        var id = document.getElementById("hidden_id").value;
        var assign_by = document.getElementById("assign_by").value;
        if (assign_by == 'Self') {
            document.getElementById("employee_id").value = id;
            change_sub_items();
        } else {
//           document.getElementById["employee_name"].selectedIndex = 0; 
//           document.getElementById["employee_id"].selectedIndex = 0;
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 0;
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 0;
        }

//       $("#assign_by").change(function() {
//		$("#sub_task").load("<?php echo base_url(); ?>textdata/" + $(this).val() + ".txt");
//	});

    }

</script>
<script>
    function validateForm() {

        document.getElementById("info_span").innerHTML = "";
//    $('html,body').scrollTop(0);

        var x = document.forms["assign_task_from"]["employee_id"].selectedIndex;
        if (x == null || x == 0) {
            document.getElementById("info_span").innerHTML = "Please Select Employee ID";
            submit_or_not = 1;
        }

        var x = document.forms["assign_task_from"]["employee_name"].selectedIndex;
        if (x == null || x == 0) {
            document.getElementById("info_span").innerHTML = "Please Select Employee Name";
            submit_or_not = 1;
        }

        var x = document.forms["assign_task_from"]["type_task"].selectedIndex;
        if (x == null || x == 0) {
            document.getElementById("info_span").innerHTML = "Please Select Type Task";
            submit_or_not = 1;
        }

        var x = document.forms["assign_task_from"]["sub_task"].value;
        if (x == null || x == "") {
            document.getElementById("info_span").innerHTML = "Please Select Task Details";
            submit_or_not = 1;
        }

        var x = document.forms["assign_task_from"]["assign_by"].selectedIndex;
        if (x == null || x == 0) {
            document.getElementById("info_span").innerHTML = "Please Select Assign By";
            submit_or_not = 1;
        }

    }
</script>

<script>    
function client_id_fun(){
     var Client_ID = document.getElementById("Client_ID").value;
     var NEW_Client_ID=Client_ID.replace(/\s/g,'');
     var NEW_Client_ID = NEW_Client_ID.toUpperCase();
     document.getElementById("Client_ID").value=NEW_Client_ID;
     
     pick_client();
}

function pick_client(){

  var tableHTML = "";
  $("#client_tbl").html(tableHTML);

    var ID = $('#Client_ID').val();
    var number = ID.search("CC-");
    if(number==0){
        var Client_ID = ID.replace("CC-", "");
        document.getElementById("Client_ID").value=Client_ID; 
    }else{
        var Client_ID = $('#Client_ID').val();
    }
        $.post('<?php echo base_url();?>index.php/hd_controller/client_info', {
            Client_ID: Client_ID
        }, function (search_info_data) {

            var search_array = JSON.stringify(search_info_data);
            var new_search_array = JSON.parse(search_array);

                var mis_Client_Name=new_search_array['olt_info']['Client_Name'];

//                alert(mq_Client_Name);
if(  mis_Client_Name === undefined){      
  var tableHTML = "";
  $("#client_tbl").html(tableHTML);   
  
}else if( mis_Client_Name != undefined ){
   
//document.getElementById("Client_Name").value=new_search_array['olt_info']["Client_Name"];        
document.getElementById("BTS_Name").value=new_search_array['olt_info']["BTS_Name"];
document.getElementById("OLT_Name").value=new_search_array['olt_info']["OLT_Name"];
document.getElementById("PON").value=new_search_array['olt_info']["PON"];
document.getElementById("Port").value=new_search_array['olt_info']["Port"];
document.getElementById("Client_Category").value=new_search_array['olt_info']["Client_Category"];
document.getElementById("ONU_Model").value=new_search_array['olt_info']["ONU_Model"];
document.getElementById("Client_Name").value=new_search_array['olt_info']["Client_Name"];



   tableHTML += "<tr>";
        tableHTML += "<td>" + new_search_array['olt_info']["BTS_Name"] + "</td>";
        tableHTML += "<td>" + new_search_array['olt_info']["OLT_Name"] + " ( " + new_search_array['olt_info']["OLT_IP"] + " ) " + "</td>";
        tableHTML += "<td>" + new_search_array['olt_info']["PON"] + " / " + new_search_array['olt_info']["Port"] + "</td>";
        tableHTML += "<td>" + new_search_array['olt_info']["ONU_ID"] + "</td>";
        tableHTML += "<td>" + new_search_array['olt_info']["ONU_Model"] + "</td>";
        tableHTML += "<td>" + new_search_array['olt_info']["MAC_Address"] + "</td>";
        tableHTML += "<td>" + new_search_array['olt_info']["V_LAN"] + "</td>";
    tableHTML += "</tr>";
    
    $("#client_tbl").html(tableHTML);
//  ......................................................................................................................  
}

}, 'JSON');
    
}
</script>


<script src="../../js/jquery.min.js" type="text/javascript"></script>
 <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->

<script>
    $("form#fonoc_task_from").submit(function () {
       
    var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/link3_controller/fonoc_save_daily_task/'); ?>",
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
//                sss
                alert('Successfully Done');
                null_from();
//             document.getElementById("info_span").innerHTML = "Successfully Done The Task";//                
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
