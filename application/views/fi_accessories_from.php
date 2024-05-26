<!--<h1>under construction</h1>-->
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid" onload="myFunction()">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
             Fiber INFRA  : Accessories From
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
        <form action="<?php echo base_url() ?>index.php/fi_controller/fi_update_accessories_info" name="assign_task_from" id="assign_task_from" method="POST">
              
        <input type="hidden" class="form-control" id="p_key" name="p_key" value="<?php echo $pending_task_result->p_key; ?> "> 
        <input type="hidden" class="form-control" id="Client_id" name="Client_id" value="<?php echo $pending_task_result->Client_id; ?> "> 
        
        
        
        
                <div class="row">    
                   
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Cable Type & ID<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="Cable_Type_ID" id="Cable_Type_ID" placeholder="Enter Cable Type & ID" required="">   
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Start meter<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="Cable_Start_meter" id="Cable_Start_meter" placeholder="Enter Cable Start meter" required="">   
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>End Mete<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="Cable_End_meter" id="Cable_End_meter" placeholder="Enter Cable End meter" required="">
                        
                        </div>
                    </div> 
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label> Device model<div style="color:red;float: right;">*</div></label>
                         <!--<input class="form-control" name="Device_model" id="Device_model" placeholder="Enter Device model" required="">-->
                          <select class="form-control" name="Device_model" id="Device_model" >
                              <option value="">Select Device Model</option>
                            </select>
                        </div>
                    </div> 
                    
                     
                </div>
         <div class="row">    
                   
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Device serial No<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="serial_No" id="serial_No" placeholder="Enter Device serial No" required="">   
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Device MAC<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="MAC" id="MAC" placeholder="Enter Device MAC Address" required="">   
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>TJ Box Qty<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="TJ" id="TJ" placeholder="Enter TJ Box Qty" required="">
                        
                        </div>
                    </div> 
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Patch Cord Qty<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="Patch_Cord_Qty" id="Patch_Cord_Qty" placeholder="Enter Patch Cord Qty" required="">   
                        </div>
                    </div>
                    
                     
                </div>
            <div class="row">    
                   
                    
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Cable Tie Qty<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="Cable_Tie_Qty" id="Cable_Tie_Qty" placeholder="Enter Cable Tie Qty" required="">   
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Rj45 Connector Qty<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="Rj45_Qty" id="Rj45_Qty" placeholder="Enter Rj45 Connector Qty" required="">
                        
                        </div>
                    </div> 
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label> Sale Order Number <div style="color:red;float: right;">*</div></label>
                         <input class="form-control" name="Sale_Order_Number" id="Sale_Order_Number" placeholder="Enter Sale Order Number" required="">
                        </div>
                    </div> 
                    
                     
                </div>
                
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-default" value="save" >Update</button>
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

<script src="../../js/jquery.min.js" type="text/javascript"></script>

<script>
      $(function() {		     
           
                    $("#Engineer_name").load("<?php echo base_url(); ?>FI_engineer_list/Engineer_list.txt");
           
    });
</script>
<script>
      $(function() {		     
           
                    $("#Technician_name").load("<?php echo base_url(); ?>FI_technician_name_list/fi_technician_name.txt");
           
    });
</script>
<script type="text/javascript">
function pick_engineer_id(){
    var Engineer_Name = $('#Engineer_name').val();
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