<!--<h1>under construction</h1>-->
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   
<!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              CS Edit Task From
            </h3>
            <ol class="breadcrumb">
                <!--<div class="col-lg-4"></div>-->
                        <h3 class="text-center">
                            <span id="update_message" style="color: #00cc44;">
<?php
//$message = $this->session->userdata('message');
//if (isset($message)) {
//echo $message;
//$this->session->unset_userdata('message');
//}
?>
                            </span>
                        </h3>
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
            <?php
//            echo '<pre>';
//            print_r($pick_p_key);
            
            ?>
            
            <form action="<?php echo base_url('index.php/welcome/edit_CS_task/'); ?>" name="CS_edit_task_from" id="CS_edit_task_from" method="POST">
                <div class='row'> 
                    <div class="col-lg-3">
                        <div class="form-group">
                            <input type="hidden" name="p_key" id="p_key" class="form-control" value="<?php  echo $pick_p_key->p_key;  ?>">
                            <label>Client ID <div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="Client_ID" id="Client_ID" value="<?php  echo $pick_p_key->Client_ID;  ?>" placeholder="Enter Client ID" required="">
                      
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label> Client Name <div style="color:red;float: right;">*</div> </label>
<!--                                <input type="text" name="id" class="form-control" placeholder="Enter Your ID"/>-->
                            <input class="form-control" name="Client_Name" id="Client_Name" value="<?php  echo $pick_p_key->Client_Name;  ?>" placeholder="Enter Client Name" required="">
                      
                        </div>
                    </div>
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Support Office <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Sub_Zone" id="Sub_Zone" required="">
                                
                                
                                <option  value="" >Select Support Office</option>
                                <?php 
                                $Sub_Zone= $pick_p_key->Sub_Zone;
                                if( $Sub_Zone == null ){?>
                                <!--<option selected="selected" value="" >Select Support Office</option>-->
                                <?php }else{ ?>
                                <option selected="selected" value="<?php echo $Sub_Zone?>" > <?php  echo $Sub_Zone;  ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Client Category <div style="color:red;float: right;">*</div></label>
                            <!--<input class="form-control" name="sub_task" id="sub_task" placeholder="Enter Sub Task">-->
                            
                             <select class="form-control" name="Client_Category" id="Client_Category" required="">
                                <option value="" >Select Client Category</option>
                                <?php 
                                $Client_Category= $pick_p_key->Client_Category;
                                if( $Client_Category == null ){?>
                                <!--<option selected="selected" value="" >Select Support Office</option>-->
                                <?php }else{ ?>
                                <option selected="selected" value="<?php echo $Client_Category?>" > <?php  echo $Client_Category;  ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Support Category<div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Support_Category" id="Support_Category" required="">
                                <option value="" >Select Support Category</option>
                                  <?php 
                               echo $Support_Category= $pick_p_key->Support_Category;
                                if( $Support_Category == null ){?>
                                <!--<option selected="selected" value="" >Select Support Category</option>-->
                                <?php }else{ ?>
                                <option selected="selected" value="<?php echo $Support_Category; ?>" > <?php  echo $Support_Category;  ?></option>
                                <?php } ?>
                            </select> 
                        </div>
                    </div>
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>CTID Number/SR <div style="color:red;float: right;">*</div></label>
                            <input class="form-control" readonly="readonly" name="CTID_Number_SR" value="<?php  echo $pick_p_key->CTID_Number_SR;  ?>" onchange="Check_CTID_Number_SR();" id="CTID_Number_SR" placeholder="Enter CTID Number / SR" required="">
                        </div>
                    </div>
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Initial Problem Category 
                                <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Initial_Problem_Category" id="Initial_Problem_Category" required="">
                                <option value="">Select Initial Problem</option>
                                <?php 
                               echo $Initial_Problem_Category= $pick_p_key->Initial_Problem_Category;
                                if( $Initial_Problem_Category == null ){?>
                                <!--<option selected="selected" value="" >Select Initial Problem</option>-->
                                <?php }else{ ?>
                                <option selected="selected" value="<?php echo $Initial_Problem_Category; ?>" > <?php  echo $Initial_Problem_Category;  ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>Assign time<div style="color:red;float: right;">*</div> <i class="fa fa-calendar"></i></label> 
                            <?php
                            
                            
                            
$Date1=$pick_p_key->start_date;
$date_to = date("d-m-Y H:i:s", strtotime($Date1));
$date2 = $date_to;
                            ?>
                            <input  class="form-control" id="cs_date" disabled="disabled" name="cs_date" value="<?php  echo $date2;  ?>" readonly="readonly"  placeholder="DD-MM-YYYY">
                        </div>
                    </div>                    
                </div>
                <!--<div class="row">-->
<!--                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Engineer Name<div style="color:red;float: right;">*</div></label>                                                                          
                            <select class="form-control" name="Engineer_Name" id="Engineer_Name" value="<?php  echo $pick_p_key->Engineer_Name;  ?>" onchange="pick_engineer_id()"  required="">
                                 <option value="">Select Engineer Name</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Engineer ID<div style="color:red;float: right;">*</div></label>
                             <input class="form-control" name="Engineer_ID" id="Engineer_ID" placeholder="Enter Engineer ID" required="">
                      
                            <select class="form-control" name="Engineer_ID" id="Engineer_ID" value="<?php  echo $pick_p_key->Engineer_ID;  ?>" required="" > 
                                 <option value="">Select Engineer ID</option>
                            </select>
                        </div>
                    </div> -->
<!--                     <div class="col-lg-6">
                        <div class="form-group">
                            <label>Comments</label>
                             <input class="form-control" name="Engineer_ID" id="Engineer_ID" placeholder="Enter Engineer ID" required="">
                      
                             <textarea class="form-control" rows="2" name="comments" value="<?php  echo $pick_p_key->comments;  ?>" id="comments"></textarea>
                        </div>
                    </div>  -->
                    
                <!--</div>-->
                
                
                
                
                
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" onclick="Update_function()" class="btn btn-default" id="update_button" name="update_button" value="save" >UPDATE</button>
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



<!--<script type="text/javascript">
//   function Update_function(){ 
    $("form#CS_edit_task_from").submit(function () {
//        validateForm();
//        if (submit_or_not == 1)
//        {
//            exit;
//        }
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/welcome/edit_CS_task/'); ?>",
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
                alert('Successfully Update .');
//                null_from();
//            data = $.parseJSON(data);                                   
//            $('#info_span').append(data.messages);
//update_button
document.getElementById("update_message").innerHTML = "UPDATE TASK INFORMATION SUCCESSFULLY.";
document.getElementById("update_button").disabled = true;
            },
            cache: false,
            contentType: false,
            processData: false
        });
        return false;
    }
      
    );
//}
</script>-->

<script src="../../js/jquery.min.js" type="text/javascript"></script>
 <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->
<script>
    $(function() {		
            $("#Support_Category").change(function() {
                    $("#Initial_Problem_Category").load("<?php echo base_url(); ?>CS_textdata/" + $(this).val() + ".txt");
            });
    });
</script>
<script>
    $(function() {		
            $("#Sub_Zone").change(function() {
                    $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + $(this).val() + ".txt");
            });
    });
</script>

<script type="text/javascript">
function pick_engineer_id(){
    var Engineer_Name = $('#Engineer_Name').val();
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



function Check_CTID_Number_SR(){
    var CTID_Number_SR = $('#CTID_Number_SR').val();
        $.post('<?php echo base_url();?>index.php/welcome/Check_CTID_n_SR', {
            CTID_Number_SR: CTID_Number_SR
        }, function (search_info_data) {

            var search_array = JSON.stringify(search_info_data);
            var new_search_array = JSON.parse(search_array);
//                alert("Search CTID_Number_SR...."+new_search_array["CTID_Number_SR"]);
                var result_CTID_Number_SR=new_search_array["CTID_Number_SR"];
if( result_CTID_Number_SR == null){
    
}else{
     document.getElementById("CTID_Number_SR").value=null; 
     alert("It's ( "+ result_CTID_Number_SR +" ) Already Assign.Please try differen CTID Number/SR");
}
 
        }, 'JSON');

}
</script>    


