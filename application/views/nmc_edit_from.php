<!--<h1>under construction</h1>-->
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
               Edit Task From ( NMC )
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
            <form name="assign_task_from" action="<?php echo base_url() ?>index.php/nmc_c/edit_nmc_task" id="assign_task_from" method="POST">
                <input type="hidden" name="id" value="<?php echo $pick_result->id; ?>" id="id">
                <div class='row'>
                     <div class="col-lg-3">
                        <div class="form-group">
                          <label> Incident Occurred  <i class="fa fa-calendar"></i>  <div style="color:red;float: right;">*</div></label>
                           <?php
                           $in_Occurred=$pick_result->in_Occurred;
                           $new_in_Occurred = date("d-m-Y H:i:s", strtotime($in_Occurred));
                           
                           ?>
                        <input  class="form-control" id="s_date" value="<?php echo $new_in_Occurred ?>" name="s_date"  placeholder="DD-MM-YYYY H:M:S" required="">
                        </div>
                    </div>
                    
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Ticket ID<div style="color:red;float: right;"></div></label>
                            <input class="form-control" name="tki" id="tki" value="<?php echo $pick_result->tki; ?>" placeholder="Enter Ticket ID" >
                        </div>
                    </div> 
                     <div class="col-lg-3"> <br>   
<!--                         <input class="form-control" type="text" name="sms_v" id="sms_v" placeholder="Enter Ticket ID">
                         <input class="form-control" type="text" name="email_v" id="email_v" placeholder="Enter Ticket ID">-->
                             <?php 
                             $sms=$pick_result->sms;
                             if($sms=='1'){
                            ?>     
                            <b> SMS</b>&nbsp; &nbsp;<input type="checkbox" onchange="chk_sms()" checked="checked" name="sms" id="sms">  &nbsp;
                            <?php }else{ ?>
                            <b> SMS</b>&nbsp; &nbsp;<input type="checkbox" onchange="chk_sms()" name="sms" id="sms">  &nbsp;
                             <?php } ?> 
                            
                            <?php 
                             $email=$pick_result->email;
                             if($email=='1'){
                            ?>     
                            <b> Mail</b>&nbsp; &nbsp;<input type="checkbox" onchange="chk_email()" checked="checked" name="email" id="email">  &nbsp;
                            <?php }else{ ?>
                            <b> Mail</b>&nbsp; &nbsp;<input type="checkbox" onchange="chk_email()" name="email" id="email">  &nbsp;
                             <?php } ?> 
                            <input class="form-control" type="hidden" value="<?php echo $sms; ?>" name="sms_v" id="sms_v" placeholder="Enter Ticket ID">
                            <input class="form-control" type="hidden" value="<?php echo $email; ?>" name="email_v" id="email_v" placeholder="Enter Ticket ID">
                            <!--<b> Mail</b>&nbsp; &nbsp;<input type="checkbox" onchange="chk_email()" name="email" id="email">  &nbsp;-->
                              
                     </div>
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Organisation<div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="organisation" id="organisation" required="">
                                <option value="" >Select Organisation</option>
                                 <?php 
                                 $organisation= $pick_result->organisation;
                                if( $organisation == null ){?>
                                <?php }else{ ?>
                                <option selected="selected" value="<?php echo $organisation; ?>" > <?php  echo $organisation;  ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Incident For <div style="color:red;float: right;">*</div></label>
                            
                            <select class="form-control" name="Incident_for" id="Incident_for" required="">
                                <option value="" >Select Incident For</option>
                                <?php 
                                 $incident_for= $pick_result->incident_for;
                                if( $incident_for == null ){?>
                                <?php }else{ ?>
                                <option selected="selected" value="<?php echo $incident_for; ?>" > <?php  echo $incident_for;  ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Incident Type <div style="color:red;float: right;">*</div></label>
                             <select class="form-control" name="type" id="type" required="">
                                <option value="" >Select Type</option>
                                <?php 
                                 $type= $pick_result->type;
                                if( $type == null ){?>
                                <?php }else{ ?>
                                <option selected="selected" value="<?php echo $type; ?>" > <?php  echo $type;  ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Incident Specification<div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="Specification" id="Specification" required="">
                                <option value="" >Select Specification</option>
                                <?php 
                                 $Specification= $pick_result->Specification;
                                if( $Specification == null ){?>
                                <?php }else{ ?>
                                <option selected="selected" value="<?php echo $Specification; ?>" > <?php  echo $Specification;  ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Vendor <div style="color:red;float: right;">*</div></label>
                             <select class="form-control" name="Vendor" id="Vendor" required="">
                                <option value="" >Select Provider</option>
                                <?php 
                                 $Vendor= $pick_result->Vendor;
                                if( $Vendor == null ){?>
                                <?php }else{ ?>
                                <option selected="selected" value="<?php echo $Vendor; ?>" > <?php  echo $Vendor;  ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                     
                </div>
                <div class="row"> 
                    <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>Site/ POP/ Link Name / Client Name<div style="color:red;float: right;">*</div></label>                                  
                            <input class="form-control" name="Name" id="Name" value="<?php echo $pick_result->Name; ?>" placeholder="Enter Site/POP Name" required="">
                        </div>
                    </div>
                      <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>SCR / Circuit  ID<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="scr_curt_id" id="scr_curt_id" value="<?php echo $pick_result->scr_curt_id; ?>"  placeholder="Enter SCR / Circuit ID" required="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Informed To<div style="color:red;float: right;">*</div> </label>
                             <textarea class="form-control" rows="2" name="informed_id" id="informed_id"  required=""><?php echo $pick_result->informed_id; ?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Informed Time<div style="color:red;float: right;"></div> </label>
                            <?php 
                                $informed_time=$pick_result->informed_time;
                                if($informed_time==='0000-00-00 00:00:00'){
                                    $new_informed_time = '';
                                } else {
                                    $new_informed_time = date("d-m-Y H:i:s", strtotime($informed_time));
                                }
                                
                                
                           
                            ?>
                        <input  class="form-control" id="e_date" value="<?php echo $new_informed_time; ?>" name="e_date"  placeholder="DD-MM-YYYY H:M:S">
                        </div>
                    </div>                 
                    
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>ETR<div style="color:red;float: right;"> </div> </label>
                            <?php
                               $etr=$pick_result->etr;
                                if($etr==='0000-00-00 00:00:00'){
                                    $new_etr = '';
                                } else {
                                    $new_etr = date("d-m-Y H:i:s", strtotime($etr));
                                }
                            ?>
                            <input  class="form-control" id="cs_date" name="etr" value="<?php echo $new_etr; ?>"  placeholder="DD-MM-YYYY H:M:S" >
                        </div>
                    </div> 
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>RFO<div style="color:red;float: right;">*</div> </label>
                            <textarea class="form-control" rows="2" name="rfo" id="rfo"  required=""><?php echo $pick_result->rfo; ?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group"><br>
<!--                          <label/label>
                            <textarea class="form-control" rows="2" name="comments" id="comments"></textarea>-->
                        <button type="submit" class="btn btn-default" value="save" >UPDATE</button>
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
    $(function() {		
            $("#Incident_for").change(function() {
                    $("#Specification").load("<?php echo base_url(); ?>NMC_Incident_Specification/" + $(this).val() + ".txt");
            });
    });
    
    
    
      function chk_sms(){
        if( document.getElementById("sms").checked == true){
            document.getElementById("sms_v").value=1;
        }else{
            document.getElementById("sms_v").value=0;
        }
    }
     function chk_email(){
        if( document.getElementById("email").checked == true){
            document.getElementById("email_v").value=1;
        }else{
            document.getElementById("email_v").value=0;
        }
    }
</script>
<script>
function null_from(){
      document.forms["assign_task_from"]["s_date"].value=<?php echo date("d-m-Y H:i:s");?>;
      document.forms["assign_task_from"]["Final_Reason"].selectedIndex = 0;
      document.forms["assign_task_from"]["comments"].value=null;

//      document.getElementById("myTextarea").value
      
}
</script>

<!--<script>
    $("form#assign_task_from").submit(function () {
       
//        alert("WORK ON PAGE .TRY AGAIN FEW MINUTE LATER");
//        exit();
       
       
       
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/nmc_c/update_nmc_task/'); ?>",
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
        window.location.href = "<?php echo base_url('index.php/welcome/Dashboard_funcation/'); ?>";
    }
      
    );
</script>-->




<script src="../../js/jquery.min.js" type="text/javascript"></script>
 <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->


<script>
    $(function() {		
                var type=document.getElementById("type").value;
                 $("#Final_Reason").load("<?php echo base_url(); ?>nmc_Final_Reason/" + type + ".txt");
                 
                 
//................... Dutation TIME .............................................................

    
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
          document.getElementById("Duration").value = days + ' Days ' + hours +':'+ minutes + ':'+ seconds ;
    }else{
          document.getElementById("Duration").value = null ;
    }


    });
    
    
    
</script>

<!--<script type="text/javascript">
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

</script>-->




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
          document.getElementById("Duration").value = days + ' Days ' + hours +':'+ minutes + ':'+ seconds ;
    }else{
          document.getElementById("Duration").value = null ;
    }
  
  
}

function date_vallidation(datetime2,datetime1){
    if ( datetime1 > datetime2 ) { 
        return 0;
    }
        return 1;
}
</script>   


