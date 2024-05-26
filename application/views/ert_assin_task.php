<!--<h1>under construction</h1>-->
<?php
$id = $this->session->userdata('id');
?>
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
               New / Assign Task From ( ERT )
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
                <div class='row'>
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Client ID<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" onchange="check_client_id()" name="Client_id" id="Client_id" placeholder="Enter MIS / MQ ID" required="">
                        </div>
                    </div>
                    
                     <div class="col-lg-3">
                        <div class="form-group">
                          <label>Client Name<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="Client_Name" id="Client_Name" placeholder="Enter Client Name" required="">
                        </div>
                    </div>
                    
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Client Address<div style="color:red;float: right;"></div></label>
                            <input class="form-control" name="Client_Address" id="Client_Address" placeholder="Enter Client Address">
                        </div>
                    </div> 
                    <div class="col-lg-3">
                        <div class="form-group">
                            
                            <label>Client Contact<div style="color:red;float: right;"></div></label>
                           <input class="form-control" name="Client_Contact" id="Client_Contact" placeholder="Enter Client Contact">
                       
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Client Type<div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Client_Category" id="Client_Category" required="">
                                <option value="" >Select Client Type</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Zone<div style="color:red;float: right;">*</div></label>
                           
                            <select class="form-control" name="Zone" id="Zone" required="" onchange="change_sub_items()">
                                <option  value="">Select Employee ID</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Entity<div style="color:red;float: right;">*</div></label>
                            <!--<input class="form-control" name="Entity" id="Entity" placeholder="Enter Entity" required="">-->
                            <select class="form-control" name="Sub_Zone" id="Sub_Zone" required="" onchange="change_sub_items()">
                                <option  value="">Select Entity</option>
                            </select>
                        </div>
                    </div> 
                    
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Distributor <div style="color:red;float: right;"></div></label>
                            <!--<input class="form-control" name="Entity" id="Entity" placeholder="Enter Entity" required="">-->
                            <select class="form-control" name="Distributor" id="Distributor" >
                                <option  value="">Select Distributor Name</option>
                            </select>
                        </div>
                    </div>
                    
                </div>
                <div class='row'>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label> CTID /SR </label>
                                <input type="text" name="CTID_SR" id="CTID_SR" class="form-control" placeholder="Enter CTID /SR"/>
                            
                        </div>
                    </div>
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Support Type <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="support_type" id="support_type" required="">
                                <option value="" >Select Support Type</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Task Type <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="type_task" id="type_task" required="">
                                <option value="" >Select Task Type</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Assign By <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="assign_by" id="assign_by" onchange="select_ID_Name();" required="">
                                <option value="">Select Assign By</option>
                            </select>
                        </div>
                    </div>
                    
<!--                    <div class="col-lg-3">
                        <div class="form-group">
                            <input type="hidden" name="hidden_id" value="<?php echo $id;?>" id="hidden_id">
                            <label>Employee ID <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Engineer_ID" id="Engineer_ID" required="" onchange="change_sub_items()">
                                <option  value="">Select Employee ID</option>
                            </select>
                        </div>
                    </div>-->
                    
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Employee Name <div style="color:red;float: right;">*</div> </label>
<!--                                <input type="text" name="id" class="form-control" placeholder="Enter Your ID"/>-->
                            <select class="form-control" name="Engineer_Name" id="Engineer_Name" onchange="pick_engineer_id()" required="">
                                <option value="">Select Name</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <input type="hidden" name="hidden_id" value="<?php echo $id;?>" id="hidden_id">
                            <label>Employee ID <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Engineer_ID" id="Engineer_ID" required="" onchange="change_sub_items()">
                                <option  value="">Select Employee ID</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Technician Name <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="Technician_Name" id="Technician_Name" onchange="">
                                <option value="">Select Technician Name</option>
                            </select>
                        </div>
                    </div> 
                    <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>Start Date<div style="color:red;float: right;">*</div> <i class="fa fa-calendar"></i></label>                                  
                            <input  class="form-control" readonly="readonly" id="s_date" value="<?php echo date("d-m-Y H:i:s"); ?>" name="s_date"  placeholder="DD-MM-YYYY H:M:S" required="">
                        </div>
                    </div>
                    
                    
<!--                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Comments <div style="color:red;float: right;"></div></label>
                            <textarea class="form-control" rows="2" name="comments" id="comments"></textarea>
                        </div>
                    </div>                    -->
                </div>  
                
                <div class="row"> 
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Status<div style="color:red;float: right;">*</div> </label>
                            <select class="form-control" name="status" id="status" required="">
                                <option value="">Select status </option>
                            </select>
                        </div>
                    </div>                     
                    <div class="col-lg-6">
                        <div class="form-group">
                          <label>Comments <div style="color:red;float: right;"></div></label>
                            <textarea class="form-control" rows="2" name="comments" id="comments"></textarea>
                        </div>
                    </div>  
                    
                    <div class="col-lg-3">
                        <div class="form-group"><br>
<!--                          <label/label>
                            <textarea class="form-control" rows="2" name="comments" id="comments"></textarea>-->

                        <button type="submit" class="btn btn-default" value="save" >Save</button>
                        </div>
                    </div> 
                </div>
                <!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                <!--<button type="submit" class="btn btn-default" value="save" >Save</button>-->
            </form>
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

<script>
function null_from(){
    
      document.forms["assign_task_from"]["Client_id"].value = null;
      document.forms["assign_task_from"]["Client_Name"].value = null;
      document.forms["assign_task_from"]["Client_Address"].value= null;
      document.forms["assign_task_from"]["Client_Contact"].value = '+880';
      document.forms["assign_task_from"]["Client_Category"].selectedIndex=0;
      document.forms["assign_task_from"]["Zone"].selectedIndex=0;
      document.forms["assign_task_from"]["Sub_Zone"].selectedIndex=0;
      document.forms["assign_task_from"]["CTID_SR"].value = null;       
      document.forms["assign_task_from"]["type_task"].selectedIndex=0;
      document.forms["assign_task_from"]["assign_by"].selectedIndex=0;
      document.forms["assign_task_from"]["Engineer_Name"].selectedIndex=0;
      document.forms["assign_task_from"]["Engineer_ID"].selectedIndex=0;
      document.forms["assign_task_from"]["Technician_Name"].selectedIndex=0;
      document.forms["assign_task_from"]["status"].selectedIndex=0;
       document.forms["assign_task_from"]["status"].selectedIndex=<?php echo date("d-m-Y H:i:s");?>;
      document.forms["assign_task_from"]["comments"].value = null; 
//      document.getElementById("myTextarea").value
      
}
</script>

<script>
    $("form#assign_task_from").submit(function () {
       
//        alert("WORK ON PAGE .TRY AGAIN FEW MINUTE LATER");
//        exit();
       
       
       
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/ert_controller/save_task_info_funcation/'); ?>",
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
                    $("#Sub_Zone").load("<?php echo base_url(); ?>CS_sub_zone_list/" + $(this).val() + ".txt");
            });
    });
</script>

<script>
    $(function() {		
            $("#Sub_Zone").change(function() {
                    $("#Distributor").load("<?php echo base_url(); ?>ert_Distributor_list/" + $(this).val() + ".txt");
            });
    });
</script>
<script>
    $(function() {		
            $("#Sub_Zone").change(function() {
                    $("#Engineer_Name").load("<?php echo base_url(); ?>ert_employee_name_list/" + $(this).val() + ".txt");
            });
    });
</script>
<script>
    $(function() {		
            $("#Sub_Zone").change(function() {
                    $("#Technician_Name").load("<?php echo base_url(); ?>ert_technician_name_list/" + $(this).val() + ".txt");
            });
    });
</script>


<script type="text/javascript">
function pick_engineer_id(){
    var Engineer_Name = $('#Engineer_Name').val();
//    var Engineer_Name = 'S M Zahirul Islam';
//    alert(Engineer_Name);
        $.post('<?php echo base_url();?>index.php/ert_controller/pick_engineer_id', {
            Engineer_Name: Engineer_Name
        }, function (search_info_data) {

//alert(search_info_data);

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




<script type="text/javascript">

function check_client_id(){
    
    
    var Client_id = $('#Client_id').val();
//    alert("TEST"+Client_id);
//    exit();
    
    
        $.post('<?php echo base_url();?>index.php/ert_controller/Check_Client_id_function', {
            Client_id: Client_id
        }, function (search_info_data) {

            var search_array = JSON.stringify(search_info_data);
            var new_search_array = JSON.parse(search_array);
//                alert("Search CTID_Number_SR...."+new_search_array["CTID_Number_SR"]);
                var result_client_id=new_search_array["Client_id"];
if( result_client_id == null){
    
}else{
     document.getElementById("Client_id").value=null; 
     alert("It's ( "+ result_client_id +" ) Client ID is Already Assign.Please try Differen Client ID ");
}
 
        }, 'JSON');
        
        

}
</script>   


