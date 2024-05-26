<!--<h1>under construction</h1>-->
<?php
//$id = $this->session->userdata('id');
//$name = $this->session->userdata('name');
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
               HD: NMC & Outbound close From
            </h3>
            <ol class="breadcrumb">
                <!--<div class="col-lg-4"></div>-->
                <h3 class="text-center"><span id="info_span"></span></h3>
            </ol>
        </div>
    </div>
    <div class="row">
        <?php
//        $message = $this->session->userdata('message');
//        if (isset($message)) {
//            echo $message;
//            $this->session->unset_userdata('message');
//        }
        ?>
        <div class="col-lg-12">
            <form  name="hd_nmc" action="<?php echo base_url() ?>index.php/hd_controller/update_nmc_task" method="POST">
                <input type="hidden"  name="tki" value="<?php echo $pick_data->tki;?>" id="tki">
                <input type="hidden" name="in_Occurred" value="<?php echo $pick_data->down_time; ?>" id="in_Occurred">
                <input type="hidden" name="remark1" value="<?php echo $pick_data->remark; ?>" id="remark1">
                
                <div class='row'>
                    
                    <div class="col-lg-4">                                
                        <div class="form-group">
                            <label>UP Time & Date<div style="color:red;float: right;">*</div> <i class="fa fa-calendar"></i></label>                                  
                            <input  class="form-control" onchange="calculate_Duration();" id="s_date"   name="s_date"  placeholder="DD-MM-YYYY H:M:S" required="">
                        </div>
                    </div> 
                     <div class="col-lg-4">                                
                        <div class="form-group">
                            <label>UP SMS Time & Date<div style="color:red;float: right;">*</div> <i class="fa fa-calendar"></i></label>                                  
                            <input  class="form-control" id="e_date"  name="e_date"  placeholder="DD-MM-YYYY H:M:S" required="">
                        </div>
                    </div>
                    <div class="col-lg-4">                                
                        <div class="form-group">
                            <label>Total Down Time<div style="color:red;float: right;">*</div></label>                                  
                            <input class="form-control"  name="Down_Time" id="Down_Time" readonly="" placeholder="Enter Total Down Time" required="">
                        </div>
                    </div>
                    
                </div>
                
                <div class="row">
                    
                   <div class="col-lg-6">
                        <div class="form-group">
                          <label>Remarks<div style="color:red;float: right;">*</div></label>
                           <textarea class="form-control" rows="2" name="remark2" id="remark2" required=""></textarea>
                        </div>
                    </div>
                     <div class="col-lg-3">
                        <div class="form-group"><br><br>
                            <label></label>
                            <!--<textarea class="form-control" rows="2" name="comments" id="comments"></textarea>-->
                        <button type="submit" class="btn btn-default" value="save" >Update</button>
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

<?php
//echo '<pre>';
//print_r($res_type);
//echo '</pre>';
echo "<script type=\"text/javascript\">";
foreach ($res_type as $value1) {
    echo "var x = document.getElementById(" . $value1['Select_Name'] . ");";
    echo "var option = document.createElement(\"option\");";
    echo "option.text =" . $value1['CateGory_Description'] . ";";
    echo "option.value =" . $value1['D_Value'] . ";";
    echo "x.add(option,x[" . $value1['Indexx'] . "]);";
 
}
echo "</script>";
?>

<!--<script>
    $(function() {		
            $("#Zone").change(function() {
                    $("#Engineer_Name").load("<?php echo base_url(); ?>hd_employee_list/" + $(this).val() + ".txt");
                    
                
            });
    });
  
</script>-->

<script>
function null_from(){
    
      document.forms["assign_task_from"]["Zone"].selectedIndex = 0;
      document.forms["assign_task_from"]["Engineer_Name"].selectedIndex = 0;
      document.forms["assign_task_from"]["Engineer_ID"].selectedIndex=0;
      document.forms["assign_task_from"]["n_type"].value=null;
      document.forms["assign_task_from"]["node_client"].value=null;
      document.forms["assign_task_from"]["tki"].value=0;
      document.forms["assign_task_from"]["fw_team"].value = null;
      document.forms["assign_task_from"]["s_date"].selectedIndex=<?php echo date("d-m-Y H:i:s");?>;
      document.forms["assign_task_from"]["e_date"].selectedIndex=<?php echo date("d-m-Y H:i:s");?>;
      document.forms["assign_task_from"]["remark"].value = null; 
//      document.getElementById("myTextarea").value
      
}
</script>

<!--<script>
    $("form#assign_task_from").submit(function () {
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/hd_controller/save_nmc/'); ?>",
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
</script>-->




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

</script>
 


<script type="text/javascript">

function calculate_Duration(){
    
   var in_Occurred=document.getElementById("in_Occurred").value;
   var Occurred = in_Occurred.split(" ");
   var date1=Occurred[0];
   var time1=Occurred[1];
   var new_in_Occurred=date1+' '+time1;
   var datetime1 = new Date(new_in_Occurred);

   var in_Resolved=document.getElementById("s_date").value;
   var Resolved = in_Resolved.split(" ");
   var date2=Resolved[0];
   var new_date2= date2.split("-");
   var day=new_date2[0];
   var month=new_date2[1];
   var year=new_date2[2];
   var time2=Resolved[1];
   var new_in_Resolved=year+'-'+month+'-'+day+' '+time2;
   var datetime2 = new Date(new_in_Resolved);
       
    var res = Math.abs(datetime2 - datetime1) / 1000;
    var days = Math.floor(res / 86400);      
    var hours = Math.floor(res / 3600) % 24;        
    var minutes = Math.floor(res / 60) % 60;
    var seconds = res % 60;
//        .............................................................................................
    var date_vallid=date_vallidation(datetime2,datetime1);
//    alert(date_vallid);
    if(date_vallid==1){
          document.getElementById("Down_Time").value = days + ' Days ' + hours +':'+ minutes + ':'+ seconds ;
    }else{
          document.getElementById("Down_Time").value = null ;
    }
  
  
}

function date_vallidation(datetime2,datetime1){
    if ( datetime1 > datetime2 ) { 
        return 0;
    }
        return 1;
}
</script>  


