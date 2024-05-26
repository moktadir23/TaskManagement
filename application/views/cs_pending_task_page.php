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
              CS Done Task From
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
            <form action="<?php echo base_url() ?>index.php/welcome/cs_done_task" name="assign_task_from" id="assign_task_from" method="POST">
              
                <input type="hidden" class="form-control" id="p_key" name="p_key" value="<?php echo $pending_task_result->p_key; ?> "> 
                <input type="hidden" id="Initial_Problem_Category" name="Initial_Problem_Category" value="<?php echo $pending_task_result->Initial_Problem_Category; ?>"> 
                <input type="hidden" id="Zone" name="Zone" value="<?php echo $pending_task_result->Zone; ?>">
                <input type="hidden" id="sub_Zone" name="sub_Zone" value="<?php echo $pending_task_result->Sub_Zone; ?>">
                <input type="hidden" id="Support_Category" name="Support_Category" value="<?php echo $pending_task_result->Support_Category; ?>">
                <input type="hidden" id="pre_Technician_name" name="pre_Technician_name" value="<?php echo $pending_task_result->Technician_Name; ?>">
                <div class="row"> 
                    
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Client ID <div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="Client_ID" id="Client_ID" value="<?php echo $pending_task_result->Client_ID; ?>" placeholder="Enter Client ID" required="">
                      
                        </div>
                    </div>
                    
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Client Category <div style="color:red;float: right;">*</div></label>
                            <!--<input class="form-control" name="sub_task" id="sub_task" placeholder="Enter Sub Task">-->
                            
                             <select class="form-control" name="Client_Category" id="Client_Category" required="">
                                <option value="" >Select Client Category</option>
                                
                                <?php 
                                $Client_Category= $pending_task_result->Client_Category;
                                if( $Client_Category == null ){?>
                                <!--<option selected="selected" value="" >Select Support Office</option>-->
                                <?php }else{ ?>
                                <option selected="selected" value="<?php echo $Client_Category?>" > <?php  echo $Client_Category;  ?></option>
                                <?php } ?>
                                
                                
                            </select>
                        </div>
                    </div>
                    
                    
<!--                   <div class="col-lg-3">
                        <div class="form-group">
                            <label>CS Support status of TKI<div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="CS_status_of_TKI" id="CS_status_of_TKI" required="" > 
                                 <option value="">Select CS Support status</option>
                            </select>
                        </div>
                    </div> -->
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>TKI Status<div style="color:red;float: right;"></div></label>
                          <select class="form-control" name="TKI_Status" id="TKI_Status" >
                                 <!--<option value="">Select TKI Status</option>-->
                            </select> 
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Final Resolution<div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Final_Resolution" onchange="check_device_serial_number();" id="Final_Resolution" required="">
                                <option value="">Select Final Resolution</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                
                
                <div class="row">
                     
                    
                    
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Connected Type<div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="device_type" id="device_type" onchange="pick_Device_Model();" required="">
                                <option value="">Select Connected Type</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Old Device Model<div style="color:red;float: right;"></div><div style="color:red;float: right;"></div></label>
                          <select class="form-control" name="old_device_model"  id="old_device_model">
                                <option value="0">Select Old Model</option>
                                
                                <?php 
                                $device_model= $device_result->device_model;
                                if( $device_model == null ){?>
                                <!--<option selected="selected" value="" >Select Support Office</option>-->
                                <?php }else{ ?>
                                <option selected="selected" value="<?php echo $device_model?>" > <?php  echo $device_model;  ?></option>
                                <?php } ?>
                                
                                
                            </select>
                        </div>
                    </div> 
                    
                     <div class="col-lg-3">
                        <div class="form-group">
                            <label>New Device Model</label>
                           <select class="form-control" name="new_device_model" id="new_device_model" >
                                <option value="0">Select New Model</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                            <div class="form-group">
                                <label>OLD Device MAC</label>
                                <?php if($device_result!=null){
                                $mac=$device_result->mac;     
                                }else{
                                  $mac=0;  
                                }
                                ?>
                                <input  class="form-control" disabled="disabled"  onchange="check_old_mac()" name="old_device_mac" id="old_device_mac" value="<?php echo $mac; ?>">
                            </div>
                        </div>  
                   
                </div> 
                  
                  <div class="row">
                      
                      <div class="col-lg-3">
                        <div class="form-group">
                            <label>New Device MAC</label>
                            <input class="form-control" id="new_device_mac" onchange="check_mac()" name="new_device_mac">
                        </div>
                    </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label>Old device Serial Number <div style="color:red;float: right;"></div><div style="color:red;float: right;"></div></label>
                         
                           <?php if($device_result!=null){ 
                               $serial_number=$device_result->serial_number;
                           }else{
                               $serial_number=0;
                           }  
                           ?>
                          <input class="form-control" disabled="disabled" onchange="check_OLD_SN()" id="old_device_SN" value="<?php echo $serial_number; ?>" name="old_device_SN">
                                <?php // } else{ ?>
                                <!--<input class="form-control" readonly="readonly" id="old_device_SN1" name="old_device_SN1">-->
                                <?php // } ?>
                        </div>
                    </div> 
                    
                     <div class="col-lg-3">
                        <div class="form-group">
                            <label>New device Serial Number</label>
                            <input class="form-control" id="new_device_SN" onchange="check_SN()" name="new_device_SN">
                            <b> same as like MAC</b>&nbsp; &nbsp;<input type="checkbox" name="MAC_SN" id="MAC_SN" onclick="MAC_SN_function()" value="1">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Support Type<div style="color:red;float: right;"> *</div></label>
                            <select class="form-control" name="Support_Type" onchange="chk_device_info()" id="Support_Type" required="">
                                <option value="">Select Support Type</option>
                            </select>    
                        </div>
                    </div>
                    
                      
                </div>
                <div class="row">
                    
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Device Return Issue<div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="return_issue" id="return_issue" >
                                <option value="0">Select Return Issue</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Support Complete time <div style="color:red;float: right;"></div><i class="fa fa-calendar"></i><div style="color:red;float: right;">*</div></label>
                          <input  class="form-control" id="cs_date" name="cs_date" readonly="readonly" value="<?php echo date("d-m-Y H:i:s");?>" placeholder="DD-MM-YYYY" required="">
                        </div>
                    </div> 
                    
                     <div class="col-lg-3">
                        <div class="form-group">
                            <label>Name of Technician if used</label>
                            
                            <select class="form-control" name="Technician_Name" id="Technician_Name" >
                              <!--<option value="">Select Name of Technician</option>-->
                              
                                <?php 
                                $Technician_Name= $pending_task_result->Technician_Name;
                                if( $Technician_Name == null || $Technician_Name == '0'){?>
                                <option selected="selected" value="" >Select Technician Name</option>
                                <?php   }else{ ?>
                                <option selected="selected" value="<?php   echo $Technician_Name?>" > <?php  echo $Technician_Name;  ?></option>
                                <?php  } ?>
                               

                                
                              
                            </select>
                        </div>
                    </div>
                      
                    <div class="col-lg-3">
                        <div class="form-group"><br>
                             <button type="submit" class="btn btn-default" value="save" >Save</button>
                        </div>
                    </div>
                </div>    
<!--                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-default" value="save" >Save</button>-->
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
foreach ($result as $value) {
    $old_device_model=$value['CateGory_name'];
    if($old_device_model=='new_device_model'){
    echo "var old_device_model = document.getElementById(\"old_device_model\");";
    echo "var option = document.createElement(\"option\");";
    echo "option.text =" . $value['CateGory_Description'] . ";";
    echo "option.value =" . $value['D_Value'] . ";";
    echo "old_device_model.add(option,old_device_model[" . $value['Indexx'] . "]);";
    }
}
echo "</script>";
?>

<script type="text/javascript">
//function null_from(){
//    
//      document.forms["assign_task_from"]["employee_id"].selectedIndex = 0;
//      document.forms["assign_task_from"]["employee_name"].selectedIndex = 0;
//      document.forms["assign_task_from"]["type_task"].selectedIndex=0;
//      document.forms["assign_task_from"]["sub_task"].value = null;
//      document.forms["assign_task_from"]["mis_mq_ticket_id"].value = null; 
//      document.forms["assign_task_from"]["client_bts_provider_name"].value = null; 
//      document.forms["assign_task_from"]["assign_by"].selectedIndex=0;
//      document.forms["assign_task_from"]["comments"].value = null; 
////      document.getElementById("myTextarea").value
//      
//}
function check_device_serial_number(){
    
  var Final_Resolution = document.getElementById("Final_Resolution").value;
  document.getElementById("Support_Type").selectedIndex=0;
  if( Final_Resolution == 'Link3 Device Faulty/Changed' || Final_Resolution == 'Device faulty/changed' ){
       document.getElementById("old_device_SN").disabled = false;
       document.getElementById("old_device_SN").value=null;
      
      document.getElementById("old_device_mac").disabled = false;
      document.getElementById("old_device_mac").value=null;
      
   }else{
      
      document.getElementById("old_device_SN").disabled = true;
      document.getElementById("old_device_SN").value=0; 
       
      document.getElementById("old_device_mac").disabled = true;
      document.getElementById("old_device_mac").value=0;
       
   }
}
</script>
<script>
    function chk_device_info(){
//        
        var Support_Type = document.getElementById("Support_Type").value;
        var device_type = document.getElementById("device_type").value;
        var device_type = document.getElementById("device_type").value;
        var Final_Resolution = document.getElementById("Final_Resolution").value;
       
       if(Final_Resolution==null || Final_Resolution==''){
                alert("please Select Final Resolution ");  
                document.getElementById("Support_Type").selectedIndex=0;
                exit();
        }
       
         if(device_type==null || device_type==0){
                alert("please Select Device Type ");  
                document.getElementById("Support_Type").selectedIndex=0;
                exit();
          }
       
        if(Support_Type == 'Field Support'){
            if(device_type == 'ONU' || device_type == 'Fiber(P2M)' || device_type == 'Wireless (P2M)' || device_type == 'Wireless (P2P)'){
             
             var old_device_model = document.getElementById("old_device_model").value;
             var new_device_model = document.getElementById("new_device_model").value;
             if(old_device_model==0 && new_device_model==0){
                alert("please Select New Device Model ");  
                document.getElementById("Support_Type").selectedIndex=0;
             }
             
            var old_device_mac = document.getElementById("old_device_mac").value;
            var old_device_SN = document.getElementById("old_device_SN").value;
            var new_device_SN = document.getElementById("new_device_SN").value;
            var new_device_mac=document.getElementById("new_device_mac").value;  
            if(old_device_mac==0 && old_device_SN==0){
                if(new_device_mac==null || new_device_mac==0){
                alert("please input New Device MAC Address ");  
                document.getElementById("Support_Type").selectedIndex=0;
                exit();
                }
                if(new_device_SN==null || new_device_SN==0){
                alert("please input New Device Serial ");  
                document.getElementById("Support_Type").selectedIndex=0;
                 exit();
                }
              } 
            }
            
            
    /////////////////////////////////////////////////////////////////////////////////////////        
     
  if( Final_Resolution == 'Link3 Device Faulty/Changed' || Final_Resolution == 'Device faulty/changed' ){
//       document.getElementById("old_device_SN").disabled = false;
//       document.getElementById("old_device_SN").value=null;
      
        submit_or_not=0;
        
        var old_device_model = document.getElementById("old_device_model").value;
        if(old_device_model==null || old_device_model==0){
         alert("please input OLD Device Model "); 
         document.getElementById("Support_Type").selectedIndex=0;
         submit_or_not = 1;
         exit();
        }
        
        var old_device_SN = document.getElementById("old_device_SN").value;
        if(old_device_SN==null || old_device_SN==0){
         alert("please input OLD Device Serial "); 
         document.getElementById("Support_Type").selectedIndex=0;
         submit_or_not = 1;
         exit();
        }
        var new_device_SN = document.getElementById("new_device_SN").value;
        if(new_device_SN==null || new_device_SN==0){
         alert("please input NEW Device Serial ");  
          document.getElementById("Support_Type").selectedIndex=0;
         submit_or_not = 1;
         exit();
        }
        
        var return_issue = document.getElementById("return_issue").value;

        if( return_issue ==null || return_issue ==0  ){
         alert("please Select Device Return Issue  ");  
          document.getElementById("Support_Type").selectedIndex=0;
         submit_or_not = 1;
         exit();
        }
   }      
            
    ////////////////////////////////////////////////////////////////////////////////////////        
            
        } 
    }
    
    
    function MAC_SN_function(){
        
       
        if(document.getElementById("MAC_SN").checked == true){
           document.getElementById("new_device_SN").value=document.getElementById("new_device_mac").value;
        }else{
            document.getElementById("new_device_SN").value=null;
        }
        
        var Sl_Number = document.getElementById("new_device_SN").value;
        
        var number_colon = Sl_Number.search(":");
           if( number_colon > 0){
                document.getElementById("new_device_SN").value =  Sl_Number.replace(/:/g, '');
//                phrase.split('dog').join('')
           }else{
           }
           
           var number_dash = Sl_Number.search("-");
           if( number_dash > 0){
                document.getElementById("new_device_SN").value =  Sl_Number.replace(/-/g, '');
           }else{
           }
        
    }
</script>    

<script>
    $("form#assign_task_from").submit(function () {
        validateForm();
        if (submit_or_not == 1)
        {
            check_device_serial_number();
            exit;
        }
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/welcome/save_task_info_funcation/'); ?>",
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
                alert('Sussfully Done');
                null_from();
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
<script>
      $(function() {
          var Support_Category=document.getElementById("Support_Category").value;
          if(Support_Category == 'Survey'){
              document.getElementById("device_type").selectedIndex=7;
          }
          
//            $("#CS_status_of_TKI").change(function() {
                
               var Initial_Problem_Category=document.getElementById("Initial_Problem_Category").value;
//                alert("TEST"+Initial_Problem_Category);
                    $("#Final_Resolution").load("<?php echo base_url(); ?>CS_Final_Resolution/" + Initial_Problem_Category + ".txt");
//            });
    });
</script>

<script>
$(function() {		
    $("#Support_Type").change(function() {
        var Zone=document.getElementById("Zone").value;
        var sub_Zone=document.getElementById("sub_Zone").value;               
        var pre_Technician_name= document.getElementById("pre_Technician_name").value; 
//  alert('TEST...'+pre_Technician_name); 
        if(pre_Technician_name==null || pre_Technician_name=='0' || pre_Technician_name==''){
            if(Zone != 'Bogura'){
                $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
            }else{
                $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + sub_Zone + ".txt");
            }
        }else{
            document.getElementById("Technician_Name").value=document.getElementById("pre_Technician_Name").value;
        }
       
    });
});
    
    
    
</script>

<script type="text/javascript">
        
//        function mac_frmt(){
        var macAddress = document.getElementById("new_device_mac");
        function formatMAC(e) {
            var r = /([a-f0-9]{2})([a-f0-9]{2})/i,
                    str = e.target.value.replace(/[^a-f0-9]/ig, "");
            while (r.test(str)) {
                str = str.replace(r, '$1' + ':' + '$2');
            }
            e.target.value = str.slice(0, 17);
        }
        ;
        macAddress.addEventListener("keyup", formatMAC, false);
//        macAddress.addEventListener("paste", formatMAC, false);
        macAddress.addEventListener("mouseout",  formatMAC, false);
//        }

  
function check_mac(){
  
  

    document.getElementById("info_span").innerHTML=null;
    var MAC_Address = document.getElementById("new_device_mac").value;
    var MAC_lenth = MAC_Address.length;
//    alert(MAC_lenth);
    if(MAC_lenth > 16){
        var UperCase_MAC= MAC_Address.toUpperCase();
        document.getElementById("new_device_mac").value = UperCase_MAC;
    }else{
        document.getElementById("new_device_mac").value=null;
        document.getElementById("info_span").innerHTML='Please Insert FULL MAC ADDRESS !'; 
    }
} 

function check_old_mac(){
  
  

    document.getElementById("info_span").innerHTML=null;
    var MAC_Address = document.getElementById("old_device_mac").value;
    var MAC_lenth = MAC_Address.length;
//    alert(MAC_lenth);
    if(MAC_lenth > 16){
        var UperCase_MAC= MAC_Address.toUpperCase();
        document.getElementById("old_device_mac").value = UperCase_MAC;
    }else{
        document.getElementById("old_device_mac").value=null;
        document.getElementById("info_span").innerHTML='Please Insert OLD Device FULL MAC ADDRESS !'; 
    }
}

function check_SN(){
    
    document.getElementById("info_span").innerHTML=null;
    var new_device_SN = document.getElementById("new_device_SN").value;
    var device_SN_lenth = new_device_SN.length;
    if(device_SN_lenth > 8){
        var UperCase_device_SN= new_device_SN.toUpperCase();
        document.getElementById("new_device_SN").value = UperCase_device_SN;
    }else{
        document.getElementById("new_device_SN").value=null;
        document.getElementById("info_span").innerHTML='Please Insert FULL Serial Number !'; 
    }
    
    var Sl_Number = document.getElementById("new_device_SN").value;
        
    var number_colon = Sl_Number.search(":");
       if( number_colon > 0){
            document.getElementById("new_device_SN").value =  Sl_Number.replace(/:/g, '');
//                phrase.split('dog').join('')
       }else{
       }

       var number_dash = Sl_Number.search("-");
       if( number_dash > 0){
            document.getElementById("new_device_SN").value =  Sl_Number.replace(/-/g, '');
       }else{
       }
    
}

function check_OLD_SN(){
    
    document.getElementById("info_span").innerHTML=null;
    var old_device_SN = document.getElementById("old_device_SN").value;
    var device_SN_lenth = old_device_SN.length;
    if(device_SN_lenth > 8){
        var UperCase_device_SN= old_device_SN.toUpperCase();
        document.getElementById("old_device_SN").value = UperCase_device_SN;
    }else{
        document.getElementById("old_device_SN").value=null;
        document.getElementById("info_span").innerHTML='Please Insert Old Device FULL Serial Number !'; 
    }
    
    var Sl_Number = document.getElementById("old_device_SN").value;
        
    var number_colon = Sl_Number.search(":");
       if( number_colon > 0){
            document.getElementById("old_device_SN").value =  Sl_Number.replace(/:/g, '');
//                phrase.split('dog').join('')
       }else{
       }

       var number_dash = Sl_Number.search("-");
       if( number_dash > 0){
            document.getElementById("old_device_SN").value =  Sl_Number.replace(/-/g, '');
       }else{
       }
    
}
</script>

<script>
    
    function pick_Device_Model(){
        
        var device_type = $('#device_type').val();
        $.post('<?php echo base_url();?>index.php/welcome/pick_Device_Model', {
            device_type: device_type
        }, function (search_info_data) {

            var search_array = JSON.stringify(search_info_data);
            var new_search_array = JSON.parse(search_array);
//                alert("Search Engineer_ID...."+new_search_array["Engineer_ID"]);
                document.getElementById("new_device_model").innerHTML=null;
                document.getElementById("new_device_model").value=null;
                
                
                select = document.getElementById("new_device_model");
                var opt = document.createElement('option');
                opt.value = "0";
                opt.innerHTML = "Select New Model";
                select.appendChild(opt); 
                    
                   for (var i in new_search_array) { 
                           select = document.getElementById("new_device_model");
                            var opt = document.createElement('option');
                            opt.value = new_search_array[i]["D_Value"];
                            opt.innerHTML =  new_search_array[i]["D_Value"];
                            select.appendChild(opt);               
                     }

        }, 'JSON'); 
        
    }
    
</script>    