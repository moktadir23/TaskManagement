
<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Transfer Task
                        </h3>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Assign Task
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
               <div class="row">
                       <?php
    $message=$this->session->userdata('message');
    if(isset($message))
    {
        echo $message;
        $this->session->unset_userdata('message');
    }
    ?>
                    <div class="col-lg-12">

<!--task_transfer_info_save-->

<form action="<?php echo base_url(); ?>index.php/welcome/CS_task_transfer_info_save" id="task_transfer_form" name="task_transfer_form" method="post">

    <input type="hidden" name="p_key" id="p_key" class="form-control" value="<?php  echo $pick_p_key->p_key;  ?>">
    <input type="hidden" name="Client_ID" id="Client_ID" class="form-control" value="<?php  echo $pick_p_key->Client_ID;  ?>">
    <div class='row'>
         <div class="col-lg-3"> 
                        <div class="form-group">
                            <label> Zone <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Zone" id="Zone" required="">
                                <option value="" >Select Zone</option>
                            </select>
                        </div>
                    </div>
        <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Support Office <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Sub_Zone" id="Sub_Zone" required="">
                                <option value="" >Select Support Office</option>
                            </select>
                        </div>
        </div>
        <div class="col-lg-3" style="">
            <div class="form-group">
                <label>Transfer to Employee Name: <div style="color:red;float: right;">*</div></label>
                <!--<input class="form-control" name="Engineer_Name" onkeyup="find_employee_id();" onchange="pick_engineer_id()" id="Engineer_Name" placeholder="Enter Employee Name" required="">-->
                    <select class="form-control" name="Engineer_Name" id="Engineer_Name" onchange="pick_engineer_id()"  required="">
                                 <option value="">Select Engineer Name</option>
                    </select>
            </div>
        </div>
        <div class="col-lg-3" style="">
            <div class="form-group">
                <label>Transfer to Employee ID: <div style="color:red;float: right;">*</div></label>
                  <!--<input class="form-control" name="Engineer_ID" id="Engineer_ID" placeholder="Enter Employee ID" required="">-->
                <select class="form-control" name="Engineer_ID" id="Engineer_ID" required="">
                    <option value="" >Select Employee ID</option>
                </select>                         
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>Comments <div style="color:red;float: right;">*</div></label>
                <textarea class="form-control" rows="2" name="comments" id="comments" required=""></textarea>
            </div>
        </div> 
        
    </div>
    <button type="submit" class="btn btn-default" value="Save">Transfer Button</button>
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
            $("#Sub_Zone").change(function() {
//                alert('TEST');
                    $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + $(this).val() + ".txt");
            });
    });
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
                    $("#Sub_Zone").load("<?php echo base_url(); ?>CS_sub_zone_list/" + $(this).val() + ".txt");
            });
    });
</script>
