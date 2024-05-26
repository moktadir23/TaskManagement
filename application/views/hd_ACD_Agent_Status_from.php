<!--<h1>under construction</h1>-->
<?php
//$id = $this->session->userdata('id');
$Zone = $this->session->userdata('Zone');
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
               ACD Agent From
            </h3>
            <ol class="breadcrumb">
                <!--<div class="col-lg-4"></div>-->
                <h3 class="text-center"><span id="info_span"></span></h3>
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
                        <label>Zone <div style="color:red;float: right;">*</div></label>
                        <input type="hidden"  name="s_zone" id="s_zone" value="<?php echo $Zone; ?>">
                            <select class="form-control" name="Zone" id="Zone"  required="">
                                 <option value="">Select Zone</option>
                            </select>    
                    </div>
                    
                    <div class="col-lg-3">
                        <label>Employee Name <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Engineer_Name" id="Engineer_Name" onchange="pick_engineer_id();"  required="">
                                 <option value="">Select Engineer Name</option>
                            </select>    
                    </div>
                    <div class="col-lg-3">
                        <label>Employee ID <div style="color:red;float: right;">*</div></label>
                         <select class="form-control" name="Engineer_ID" id="Engineer_ID" required="">
                                 <option value="">Select Engineer ID</option>
                            </select>
                    </div> 
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Agent SIP<div style="color:red;float: right;">*</div></label>
                          <input class="form-control" readonly="readonly" name="sip" id="sip" placeholder="Enter SIP Number" required="">
                        </div>
                    </div>
                    
                </div>
                 
                <div class="row">
                    <div class="col-lg-3">                                
                        <div class="form-group">
                            <label> LOGIN Time<div style="color:red;float: right;">*</div> <i class="fa fa-calendar"></i></label>                                  
                            <input  class="form-control" id="s_date" readonly="readonly" value="<?php echo date("d-m-Y H:i:s"); ?>" name="s_date"  placeholder="DD-MM-YYYY H:M:S" required="">
                        </div>
                    </div> 
                     <div class="col-lg-3">                                
                        <div class="form-group">
                            <label> LOGOUT Time<div style="color:red;float: right;">*</div> <i class="fa fa-calendar"></i></label>                                  
                            <input  class="form-control" id="e_date" readonly="readonly" value="<?php echo date("d-m-Y H:i:s"); ?>" name="e_date"  placeholder="DD-MM-YYYY H:M:S" required="">
                        </div>
                    </div>
                   <div class="col-lg-3">
                        <div class="form-group">
                          <label>Total Call<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="t_call" id="t_call" placeholder="Enter Total Call" required="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>MIS TKI<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="mis_tki" id="mis_tki" placeholder="Enter MIS TKI" required="">
                        </div>
                    </div>
                     
                    
                     
                </div>  
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>MQ TKI<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="mq_tki" id="mq_tki" placeholder="Enter MQ TKI" required="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>SMS<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="sms" id="sms" placeholder="Enter Send SMS Qty" required="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Mail<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="mail" id="mail" placeholder="Enter Send Mail Qty" required="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Self Care<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="selfcare" id="selfcare" placeholder="Enter Solved by Self Care" required="">
                        </div>
                    </div>
                 
                    </div>
                     
                <div class="row">
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label>Facebook<div style="color:red;float: right;">*</div></label>
                           <input class="form-control" name="facebook" id="facebook" placeholder="Enter Solved by Facebook" required="">
                        </div>
                      </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Billing Query<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="b_query" id="b_query" placeholder="Enter Billing Query" required="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Solved by Specta<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="solve" id="solve" placeholder="Enter Solved by Specta" required="">
                        </div>
                    </div>
                   <div class="col-lg-3">
                        <div class="form-group">
                          <label>Remarks<div style="color:red;float: right;">*</div></label>
                           <textarea class="form-control" rows="2" name="remark" id="remark"></textarea>
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
//echo '<pre>';
//print_r($result);
//echo '</pre>';
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
            $("#Zone").change(function() {
                    $("#Engineer_Name").load("<?php echo base_url(); ?>hd_employee_list/" + $(this).val() + ".txt");
                    
                
            });
    });
    
     $(function() {		
            var s_zone=document.getElementById("s_zone").value;
            document.getElementById("Zone").value=document.getElementById("s_zone").value;
            $("#Engineer_Name").load("<?php echo base_url(); ?>hd_employee_list/" + s_zone + ".txt");
    });
  
</script>

<script>
function null_from(){
    
      document.forms["assign_task_from"]["Zone"].selectedIndex = 0;
      document.forms["assign_task_from"]["Engineer_Name"].selectedIndex = 0;
      document.forms["assign_task_from"]["Engineer_ID"].selectedIndex=0;
      document.forms["assign_task_from"]["sip"].value=null;
      document.forms["assign_task_from"]["t_call"].value=null;
      document.forms["assign_task_from"]["mis_tki"].value = null;   
      document.forms["assign_task_from"]["mq_tki"].value = null;
     
      document.forms["assign_task_from"]["b_query"].value=0;
      document.forms["assign_task_from"]["solve"].value = null;
      document.forms["assign_task_from"]["s_date"].selectedIndex=<?php echo date("d-m-Y H:i:s");?>;
      document.forms["assign_task_from"]["e_date"].selectedIndex=<?php echo date("d-m-Y H:i:s");?>;
      document.forms["assign_task_from"]["remark"].value = null; 
//      document.getElementById("myTextarea").value
      
}
</script>

<script>
    $("form#assign_task_from").submit(function () {
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/hd_controller/save_agent_d_p/'); ?>",
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

               var e_id=new_search_array["Engineer_ID"];
               pick_acd_info(e_id);

        }, 'JSON');
     

}

 
    function pick_acd_info(e_id){
      
    var user = e_id;
   
     document.getElementById("sip").value=null;
                 document.getElementById("s_date").value=null;
                 document.getElementById("e_date").value=null;
//                 
//    var Engineer_Name = 'S M Zahirul Islam';
//    alert(Engineer_Name);
        $.post('<?php echo base_url();?>index.php/hd_controller/pick_user_log', {
            user: user
        }, function (search_info_data) {

//alert(search_info_data);

            var search_array = JSON.stringify(search_info_data);
            var new_search_array = JSON.parse(search_array);
            
//                alert("Search Engineer_ID...."+new_search_array[1]["event"]);
                
//                 document.getElementById("s_date").value=<?php // echo date("d-m-Y H:i:s");?>;
//                 document.getElementById("e_date").value=<?php //  echo date("d-m-Y H:i:s");?>;
                 
//                document.getElementById("Engineer_ID").innerHTML=null;
//                document.getElementById("sip").value=new_search_array["server_phone"];
               
//                if(event=='LOGIN'){
//                     document.getElementById("s_date").value=new_search_array["event_date"];
//                }
//               
//                if(event=='LOGOUT'){
//                     document.getElementById("e_date").value=new_search_array["event_date"];
//                }
            if(new_search_array != null){
               log=0;
                for (var i in new_search_array) {
                     var event=new_search_array[i]["event"];
                    if(log==0 && event=='LOGIN'){
                        document.getElementById("s_date").value=new_search_array[i]["event_date"];
                        document.getElementById("sip").value=new_search_array[i]["server_phone"];
                    }
                    if(event=='LOGOUT'){
                        document.getElementById("e_date").value=new_search_array[i]["event_date"];
                    }
                 
                 log=1;   
                }
            }
         
        }, 'JSON');
         return;
    }
</script>
 


