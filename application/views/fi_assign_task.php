<!--<h1>under construction</h1>-->
<?php
//$id = $this->session->userdata('id');
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
               New / Assign Task From ( Fiber INFRA )
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
            <form  name="assign_task_from" id="assign_task_from">
                <!--<input type="hidden" name="hidden_id" value="<?php echo $id;?>" id="hidden_id">-->
                <div class='row'>
                     <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>Ticket Receive Date & time<div style="color:red;float: right;">*</div> <i class="fa fa-calendar"></i></label>                                  
                            <input  class="form-control" id="s_date" value="<?php echo date("d-m-Y H:i:s"); ?>" name="s_date"  placeholder="DD-MM-YYYY H:M:S" required="">
                        </div>
                    </div> 
                    
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Task Type <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="type_task" onchange="Change_type_task()" id="type_task" required="">
                                <option value="" >Select Task Type</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Client ID<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="Client_id" id="Client_id" placeholder="Enter Client ID" required="">
                        </div>
                    </div>
                    
                     <div class="col-lg-3">
                        <div class="form-group">
                          <label>Client Name<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="Client_Name" id="Client_Name" placeholder="Enter Client Name" required="">
                        </div>
                    </div>
                    
                    
                </div>
                <div class='row'>
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Client Category <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Client_Category" id="Client_Category" required="">
                                <option value="" >Select Client Category</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Client Contact Number <div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="C_Contact_number" id="C_Contact_number" placeholder="Enter Client Contact Number " required="">
                        </div>
                    </div>
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Client Address<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="Client_Address" id="Client_Address" placeholder="Enter Client Address" required="">
                             <!--<input class="form-control" name="Initial_Problem_Category" id="Initial_Problem_Category" placeholder="Enter Problem Category" required="">-->
                        
                        </div>
                    </div>
                     <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>TKI ID / SR no.<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="tki_id" id="tki_id" onchange="Check_CTID_Number_SR()" placeholder="Enter TKI ID" required="">
                        </div>
                    </div>
                        
<!--                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Task Type <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="type_task" onchange="Change_type_task()" id="type_task" required="">
                                <option value="" >Select Task Type</option>
                            </select>
                        </div>
                    </div>-->
                    
                    
                   
                    
                </div>
                <div class="row">
                    <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>Work Schedule Date<div style="color:red;float: right;">*</div> <i class="fa fa-calendar"></i></label>                                  
                            <input  class="form-control"  id="e_date" value="<?php echo date("d-m-Y"); ?>" name="e_date"  placeholder="DD-MM-YYYY H:M:S" required="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Zone <div style="color:red;float: right;">*</div> </label>
<!--                                <input type="text" name="id" class="form-control" placeholder="Enter Your ID"/>-->
                            <select class="form-control" name="Zone" id="Zone" required="">
                                <option value="">Select Zone</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Support Office <div style="color:red;float: right;">*</div> </label>
<!--                                <input type="text" name="id" class="form-control" placeholder="Enter Your ID"/>-->
                            <select class="form-control" name="Support_Office" id="Support_Office" required="">
                                <option value="">Select Support Office</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>Connection Type<div style="color:red;float: right;">*</div></label>                                  
                             <select class="form-control" name="Connection_Type" id="Connection_Type" required="">
                                <option  value="">Select Connection Type</option>
                            </select>    
                        </div>
                    </div>
                </div>  
                
                <div class="row">
                    
                    <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>Priority Status<div style="color:red;float: right;">*</div> </label>                                  
                             <select class="form-control" name="Priority_Status" id="Priority_Status" required="">
                                <option  value="">Select Priority Status</option>
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
                        <div class="form-group"><br><br>
                            <label></label>
                            <!--<textarea class="form-control" rows="2" name="comments" id="comments"></textarea>-->
                        <button type="submit" class="btn btn-default" value="save" >Save</button>
                        </div>
                    </div> 
                </div>
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
            url: "<?php echo base_url('index.php/fi_controller/save_task_info_funcation/'); ?>",
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

<!--<script>
    $(function() {		
            $("#Division").change(function() {
                    $("#bts").load("<?php echo base_url(); ?>BTS_list/" + $(this).val() + ".txt");
            });
    });
</script>-->
<!--<script>
    $(function() {		
            $("#type_task").change(function() {
                    $("#Initial_Problem_Category").load("<?php echo base_url(); ?>IPTS_Initial_Problem_Category/" + $(this).val() + ".txt");
            });
    });
</script>-->
<script>
    $(function() {		
            $("#Zone").change(function() {
                    $("#Support_Office").load("<?php echo base_url(); ?>FI_support_office_list/" + $(this).val() + ".txt");
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

function Change_type_task(){
  
    var type_task = $('#type_task').val();

    if(type_task=='Other'){
//        alert('TEST');
    document.getElementById("Client_id").value='N/A';
    document.getElementById("Client_Name").value='N/A';
    document.getElementById("C_Contact_number").value='N/A';
    document.getElementById("Client_Address").value='N/A';
    document.getElementById("tki_id").value='N/A';
    }else{
    document.getElementById("Client_id").value=null;
    document.getElementById("Client_Name").value=null;
    document.getElementById("C_Contact_number").value=null;
    document.getElementById("Client_Address").value=null;
    document.getElementById("tki_id").value=null; 
    }
}



function Check_CTID_Number_SR(){
    
    
    
    var tki_id = $('#tki_id').val();
    var type_task = $('#type_task').val();
    if(type_task=='Other'){
//        alert('TEST');
    }else{
    
        $.post('<?php echo base_url();?>index.php/fi_controller/Check_CTID_n_SR', {
            tki_id: tki_id
        }, function (search_info_data) {

            var search_array = JSON.stringify(search_info_data);
            var new_search_array = JSON.parse(search_array);
//                alert("Search CTID_Number_SR...."+new_search_array["CTID_Number_SR"]);
                var result_CTID_Number_SR=new_search_array["tki_id"];
if( result_CTID_Number_SR == null){
    
}else{
     document.getElementById("tki_id").value=null; 
     alert("It's ( "+ result_CTID_Number_SR +" ) Already Assign.Please try differen TKI ID / SR No");
}
 
        }, 'JSON');
    }      
        
        

}


</script>
 


