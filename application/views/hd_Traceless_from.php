<?php
$id = $this->session->userdata('id');
$name = $this->session->userdata('name');
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
               Traceless SMS From ( HD Team )
            </h3>
            <ol class="breadcrumb">
                <!--<div class="col-lg-4"></div>-->
                <h3 class="text-center">
                    <span iid="show_message" style="color: green;"></span>
                </h3>
            </ol>
        </div>
    </div>
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
                            <label>SOI(Call/Mail/SMS/Selfcare/FB)<div style="color:red;float: right;">*</div> <i class="fa fa-calendar"></i></label>                                  
                            <select class="form-control" name="soi" id="soi"  required="">
                                 <option value="">Select SOI</option>
                            </select>  
                        </div>
                    </div> 
                    
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Client Mobile Number <div style="color:red;float: right;">*</div></label>
                           <input class="form-control" name="C_mobile" id="C_mobile" placeholder="Enter Client Mobile Number" required="">
                        </div>
                    </div>
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Client Code(If any)<div style="color:red;float: right;"></div></label>
                            <input class="form-control" name="client_id" id="client_id" onchange="Check_CTID_Number_SR()" placeholder="Enter Client Code" >
                        </div>
                    </div>
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>SMS time<div style="color:red;float: right;">*</div></label>

                              <input  class="form-control" id="s_date" value="<?php echo date("d-m-Y H:i:s"); ?>" name="s_date"  placeholder="DD-MM-YYYY H:M:S" required="">
                        </div>
                    </div> 
                </div>
                
                <div class="row">
                   
<!--                     <div class="col-lg-3">
                        <label>Zone</label>
                            <select class="form-control" name="Zone" id="Zone"  required="">
                                 <option value="">Select Zone</option>
                                 <option value="">CTG</option>
                                 <option value=""></option>
                            </select>    
                    </div>-->
                    <div class="col-lg-3">
                        <label>Employee Name</label>
                        <input class="form-control" readonly="readonly" name="Engineer_Name" id="Engineer_Name" value="<?php echo $name; ?>" placeholder="Enter Engineer Name" required="">
<!--                            <select class="form-control" name="Engineer_Name" id="Engineer_Name" onchange="pick_engineer_id();"  required="">
                                 <option value="">Select Engineer Name</option>
                            </select>    -->
                    </div>
                    <div class="col-lg-3">
                        <label>Employee ID</label>
                        <input class="form-control" readonly="readonly" name="Engineer_ID" id="Engineer_ID" value="<?php echo $id; ?>" placeholder="Enter Engineer ID" required="">
<!--                         <select class="form-control" name="Engineer_ID" id="Engineer_ID" required="">
                                 <option value="">Select Engineer ID</option>
                            </select>-->
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                          <label>Remarks<div style="color:red;float: right;">*</div></label>
                            <!--<input class="form-control" name="remarks" id="remarks" placeholder="Enter Client Name" required="">-->
                             <textarea class="form-control" rows="2" name="remarks" id="remarks"></textarea>
                        </div>
                    </div>
                   
                    
                </div>  
                
                <div class="row">
                   
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
<?php
echo "<script type=\"text/javascript\">";
foreach ($result_traceless as $value) {
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
                    $("#Engineer_Name").load("<?php echo base_url(); ?>hd_employee_list/" + $(this).val() + ".txt");
            });
    });
</script>

<script>
function null_from(){
      document.forms["assign_task_from"]["soi"].selectedIndex=0;
      document.forms["assign_task_from"]["C_mobile"].value = null;
      document.forms["assign_task_from"]["client_id"].value = null;
      document.forms["assign_task_from"]["s_date"].selectedIndex=<?php echo date("d-m-Y H:i:s");?>;
//      document.forms["assign_task_from"]["Zone"].selectedIndex=0;
//      document.forms["assign_task_from"]["Engineer_Name"].selectedIndex=0;
//      document.forms["assign_task_from"]["Engineer_ID"].selectedIndex=0;
      document.forms["assign_task_from"]["remarks"].value = null;       
}
</script>

<!--<script>
    $("form#assign_task_from").submit(function () {
       
//        alert("WORK ON PAGE .TRY AGAIN FEW MINUTE LATER");
//        exit();
       document.getElementById("show_message").innerHTML = "";
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/hd_controller/save_traceless_info/'); ?>",
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
                alert('Successfully Done');
                null_from();
        document.getElementById("show_message").innerHTML = "Successfully Save ";             
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
</script>-->
<script>
    $("form#assign_task_from").submit(function () {
//        validateForm();
//        if (submit_or_not == 1)
//        {
//            exit;
//        }

        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/hd_controller/save_traceless_info/'); ?>",
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
                alert('Successfully Done');
                null_from();
//                document.getElementById("show_message").innerHTML = "Successfully Save ";
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
 


