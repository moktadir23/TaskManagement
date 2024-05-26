
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>
<?php
    $Zone = $this->session->userdata('Zone'); 
    $department = $this->session->userdata('department');
    $user_type = $this->session->userdata('u_type');
    $nmc_module = $this->session->userdata('nmc_module');
//    $nmc_module =0 .................... not allow
//    $nmc_module =1 ....................  allow all
//    $nmc_module =0 ....................  allow only LINK3
?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              NMC Team: Incident Report
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
            <form action="<?php echo base_url('index.php/nmc_c/incident_report/'); ?>" name="search_by_zone" id="search_by_zone" method="POST">
                <input type="hidden"  class="form-control" name="user_pre" id="user_pre" value="<?php echo $nmc_module; ?>">
                <div class="row">
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Incident For <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="Incident_for" id="Incident_for" onchange="select_name()" >
                                <option value="0" >All Incident</option>
                            </select>
                        </div>
                    </div> 
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Incident Type <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="type" onchange="select_name()"  id="type">
                                <option value="0" >All Type</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Incident Specification<div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="Specification" id="Specification">
                                <option value="0" >All Specification </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Provider <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="Vendor" onchange="pick_Name()"  id="Vendor">
                                <option value="0" >ALL Provider</option>
                            </select>
                        </div>
                    </div>
                   
                     
                    
                </div>
                
                <div class="row">
                     <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>Site/ POP/ Link Name / Client Name<div style="color:red;float: right;"></div></label>  
                            
                            
                            <div id="input_field">
                                <input  class="form-control" name="Name" id="Name" placeholder="Enter Site/POP Name" >
                            </div>
                            
                            <div id="select_field">
                             <select class="form-control" name="Name1" id="Name1" >
                                <option value="Select Name" >Select Name </option>
                            </select>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <label>From Date</label>
                        <input type="" name="date_from" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="start_date_id" class="form-control" placeholder="Enter from Date" required=""/>
                    </div>
                    <div class="col-lg-3">
                        <label>To Date</label>
                        <input type="" name="date_to" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="end_date_id" class="form-control" placeholder="Enter To Date" required=""/>
                    </div>
                    <!--<div class="col-lg-3">-->
                        <!--<label>Time</label>-->
                        <input type="hidden" readonly="readonly" name="tm_v" id="tm_v"  class="form-control" value="00:00:00-23:59:59" placeholder="Enter Time" required=""/>
                    <!--</div>-->
                    <!--
                    <div class="col-lg-3">
                    <br>
                       
                        Morning :<input type="radio" name="tm" id="tm1" onclick="time(this.value);" value="07:00:00-14:59:59"> 
                        Evening :<input type="radio" name="tm" id="tm2" onclick="time(this.value);" value="15:00:00-20:59:50"> 
                        Night :<input type="radio" name="tm" id="tm3" onclick="time(this.value);" value="21:00:00-06:59:59"> 
                        
                    </div>-->
                    <div class="col-lg-3">
                       &nbsp;<br>
                        <button type="submit" class="btn btn-default" value="save">Search</button>
                    </div> 
                </div>    
                
            </form>  
            <br><br>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>TKI No.</th>
                            <th>Start Time</th>
                            <th>Incident Resolved</th>
                            <th>Duration</th>
                            <th>ORG</th>
                            <th>Incident For</th>  
                            <th>Incident Type</th>                                       
                            <th>Incident Specification</th>
                            <th>Provider</th>                          
                            <th>Site/ POP/ Link Name / Client Name</th>
                            <th>Reason</th>
                            <th>SCR / Circuit ID</th>
                            <?php if( $nmc_module != 2 ){?>
                            <th>Action</th>
                            <?php }?>  
                        </tr>
                    </thead>
                    <tbody>
<?php

if($result != null){
 $row=0;
 $total=0; 
 $Link3=0; $GP=0; $BL=0; $SCL =0; $FH=0;
 $BTS=0; $Backbone=0; $Datacenter=0; $iMPLS=0; $NTTN=0; $Telco=0; $Upstream=0;
 
    foreach ($result as $value) {
     $Vendor=$value['Vendor'];
     $nmc_module;
     if ($Vendor =='Cybergate' && $nmc_module == 2) {  
//         echo 'TEST';
         }else{
        $row++;
?>  
                        <tr> 
                                <td id="tbl_tki<?php echo $row; ?>"><?php echo $value['tki']; ?></td>
                                <td><?php echo $value['in_Occurred']; ?></td>
                                <td><?php echo $value['in_Resolved']; ?></td>
                                <td><?php echo $value['Duration']; ?></td>
<!--                                <td><?php  $sms=$value['sms']; if($sms=='1'){ echo 'YES'; }else{ echo 'NO'; } ?></td>
                                <td><?php  $email=$value['email'];  if($email=='1'){ echo 'YES'; }else{ echo 'NO'; }  ?></td>-->
                                <td><?php echo $value['organisation']; ?></td>
                                <td>
                                    <?php 
                                    echo $Incident_for=$value['Incident_for'];
                                    if($Incident_for=='BTS'){
                                       $BTS++;
                                   }elseif ($Incident_for=='Backbone') {
                                       $Backbone++;        
                                   }elseif ($Incident_for=='Datacenter') {
                                       $Datacenter++;        
                                   }elseif ($Incident_for=='iMPLS') {
                                       $iMPLS++;         
                                   }elseif ($Incident_for=='NTTN') {
                                       $NTTN++;         
                                   }elseif ($Incident_for=='Telco') {
                                       $Telco++;         
                                   }elseif ($Incident_for=='Upstream') {
                                       $Upstream++;         
                                   }
                                    ?>
                                </td>
                                 <td><?php echo $value['type']; ?></td>
                                <td><?php echo $value['Specification']; ?></td>
                                <td>
                                <?php 
                                echo $Vendor=$value['Vendor'];
                                if($Vendor=='Link3'){
                                   $Link3++;
                               }elseif ($Vendor=='GP') {
                                   $GP++;        
                               }elseif ($Vendor=='BL') {
                                   $BL++;        
                               }elseif ($Vendor=='SCL') {
                                   $SCL++;         
                               }elseif ($Vendor=='F@H') {
                                   $FH++;         
                               }
                               $total++;
                                ?>
                                </td>
                                <td><?php echo $value['Name']; ?></td>
                                <td><?php echo $value['Final_Reason']; ?></td>
                                <td><?php echo $value['scr_curt_id']; ?></td>
                                <?php if( $nmc_module != 2 ){?>
                                <td id='<?php echo 'row'.$row; ?>'> <button type="button" class="btn btn-info" data-toggle='modal' data-target='#myModal' onclick="tki_details(<?php echo $row; ?>)" data-backdrop='static'>Details</button> </td>
                                <?php }?>                           
                            </tr>                    
    <?php // } else { ?>
                        
                    
    
    
     <?php } } ?>
<div class="row">
        
<div class="col-lg-10">       
<?php 
    echo '<b>Total Incident Number : </b>'.$total.'<br>';
    echo '<b>Link3 : </b>'.$Link3.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>GP : </b>'.$GP.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>BL : </b>'.$BL.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>SCL : </b>'.$SCL.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>F@H : </b>'.$FH.'&nbsp;&nbsp;&nbsp;&nbsp;<br>';
   
    echo '<b>BTS : </b>'.$BTS.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>Backbone : </b>'.$Backbone.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>Datacenter : </b>'.$Datacenter.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>iMPLS : </b>'.$iMPLS.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>NTTN : </b>'.$NTTN.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>Telco : </b>'.$Telco.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>Upstream : </b>'.$Upstream.'&nbsp;&nbsp;&nbsp;&nbsp;';
?>
    
</div> 
    <div class="col-lg-2">
       
        <button type="button"  class="btn btn-success"  onclick="location.href = '<?php echo base_url(); ?>index.php/nmc_c/export_incedent_report/'">Export Excel</button> &nbsp;<br><br>    
       
    </div>                       
</div>



                             <?php   } ?>
  
                                
                    </tbody>
                </table>
                <div class="col-lg-5"></div>
                <div class="col-lg-5">
<?php // echo $links; ?>
                </div>
            </div>
        </div>
    </div>
</div>






<!--.........................Model ADD Serial Number part.....................................................-->
<div></div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">   
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="row"> 

                    <div class="col-md-8 col-sm-8">
                        <h4 class="modal-title">TKI Details</h4>
                    </div>           
                </div>             
            </div>
<!--................................................................................................................................-->
<br><div class='row'>
                    <div class="col-lg-4">
                        <div class="form-group">
                          Start Time : <b id="s_in_Occurred"> </b>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">                            
                        <div class="form-group">
                           Incident Resolved : <b id="s_in_Resolved"> </b>
                        </div>
                    </div> 
                    <div class="col-lg-4">                            
                        <div class="form-group">
                            Duration: <b id="s_Duration"> </b>
                        </div>
                    </div>
                   
                                 
</div><br>
<div class='row'>
                    <div class="col-lg-4">
                        <div class="form-group">
                          TKI ID : <b id="s_tki"> </b>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">                            
                        <div class="form-group">
                           E-Mail: <b id="s_email"> </b>
                        </div>
                    </div> 
                    <div class="col-lg-4">                            
                        <div class="form-group">
                            SMS: <b id="s_sms"> </b>
                        </div>
                    </div>
                   
                                 
</div><br>
<div class='row'>
                    <div class="col-lg-4">                            
                           <div class="form-group">
                               ORG : <b id="s_incident_for"> </b>
                           </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                          Incident Type: <b id="s_type"> </b>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">                            
                        <div class="form-group">
                            Incident Specification : <b id="s_Specification"> </b>
                        </div>
                    </div> 
                    
                                 
</div><br>
<div class='row'>
                    <div class="col-lg-4">                            
                        <div class="form-group">
                            Provider  : <b id="s_Vendor"> </b>
                        </div>
                    </div>
                    <div class="col-lg-4">                            
                        <div class="form-group">
                            Site/ POP/ Link Name / Client Name: <b id="s_Name"> </b>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                          Final Reason: <b id="s_Final_Reason"> </b>
                        </div>
                    </div>
                    
                    
                                 
</div><br>
<div class='row'>
                    <div class="col-lg-4">                            
                        <div class="form-group">
                            SCR / Circuit ID: <b id="s_scr_curt_id"> </b>
                        </div>
                    </div> 
                    <div class="col-lg-4">                            
                        <div class="form-group">
                            Informed ID : <b id="s_informed_id"> </b>
                        </div>
                    </div>
                    <div class="col-lg-4">                            
                        <div class="form-group">
                            Informed Time: <b id="s_informed_time"> </b>
                        </div>
                    </div>
</div><br>
<div class='row'>
                    <div class="col-lg-4">
                        <div class="form-group">
                          ETR: <b id="s_etr"> </b>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">                            
                        <div class="form-group">
                            RFO: <b id="s_rfo"> </b>
                        </div>
                    </div> 
                    <div class="col-lg-4">                            
                        <div class="form-group">
                            primary find : <b id="s_pri_find"> </b>
                        </div>
                    </div>
                  
                                 
</div><br>
<!--.........................................................................................................................................-->
<div class='row'>
                    <div class="col-lg-12">
    <div class="table-responsive">   
    <h4>Comments Details</h4>
                        <table class="table table-bordered table-striped" id="modal_table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Time </th>
                                    <th>Action / Comments </th>
                                   
                                </tr>
                            </thead>
                            <tbody id="work_details_table"></tbody>
                            
                        </table>
                    </div>
                        </div>
    </div>
    <div class="row">
                        <div class="col-md-7 col-sm-7"></div>
                        <div class="col-md-5 col-sm-5">
                            <!--<input type="hidden" name="upload_id" value="<?php echo $Subscriber_id_for_file; ?>" id="upload_id">-->
                            <!--<button id="" type="submit" class="btn btn-info"  value="save" onclick="save_serial_number_function()">Save</button>-->
                            <!--<button type="submit" class="btn btn-info" id="save_eng_list" name="save_eng_list" onclick="" value="save">Save</button>-->
                            <!--remove_session_store()    kkk-->
                            <!--<button type="button" class="btn btn-info" onclick="remove_session_store()" >Cancel</button>-->
                            <button type="button" class="btn btn-default" data-dismiss="modal" id="clear_attach_file_value" onclick="clr_msg_value()">Close</button>
                        </div>
                    </div>
<br><br>
<!--.......................................................................................................................................-->
            
        </div>      
    </div>
</div> 


<!--...........................END Serial Number part..................................................................................-->

<?php
echo "<script type=\"text/javascript\">";
foreach ($from_value as $value) {
    echo "var x = document.getElementById(" . $value['Select_Name'] . ");";
    echo "var option = document.createElement(\"option\");";
    echo "option.text =" . $value['CateGory_Description'] . ";";
    echo "option.value =" . $value['D_Value'] . ";";
    echo "x.add(option,x[" . $value['Indexx'] . "]);";
}
echo "</script>";
?>

<script src="../../js/jquery.min.js" type="text/javascript"></script>




<script type="text/javascript">
    function time(t){
//        alert("TEST..."+t);
       document.getElementById("tm_v").value=t; 
    }
    
    
    
//    ......................................   select_name  ...............................................................................


var input_field = document.getElementById("input_field");
var select_field = document.getElementById("select_field");  
input_field.style.display = "block";
select_field.style.display = "none";

function select_name(){
  var Incident_for = document.getElementById("Incident_for").value;
  var input_field = document.getElementById("input_field");
  var select_field = document.getElementById("select_field");
  if(Incident_for==='Backbone' || Incident_for==='BTS' || Incident_for==='Telco' || Incident_for==='NTTN' || Incident_for==='iMPLS' || Incident_for==='Upstream' || Incident_for==='BML_DC' ){
//     alert('TEST'); 
     select_field.style.display = "block";
     input_field.style.display = "none";
     
  }else{

     input_field.style.display = "block";
     select_field.style.display = "none";
  }
}
</script>


<script type="text/javascript">


function pick_Name(){
    
    var Incident_for = $('#Incident_for').val();
    var Specification = $('#Specification').val();
    var Vendor = $('#Vendor').val();
 
 
    if(Incident_for==='BTS' || Incident_for==='Backbone' || Incident_for==='Telco' || Incident_for==='NTTN' || Incident_for==='iMPLS'|| Incident_for==='Upstream' ||  Incident_for==='BML_DC' ){
        $.post('<?php echo base_url(); ?>index.php/nmc_c/pick_nmc_category_name', {
            Incident_for: Incident_for,
            Specification:Specification,
            Vendor:Vendor
            
        }, function (OLT_data) {
                
                    var OLT_array = JSON.stringify(OLT_data);
                    var new_OLT_Array = JSON.parse(OLT_array);
                    
//                    alert("OLT NAME ...."+new_OLT_Array[1]["OLT_Name"]);
                    var select_OLT = 0;
                    document.getElementById("Name1").innerHTML = null;
                    document.getElementById("Name1").value = null;
                    for (var i in new_OLT_Array) {
                        //    alert("splite...."+newArr[i]["OLT_Name"]);
                        if (select_OLT == 0) {
                            select = document.getElementById("Name1");
                            var opt = document.createElement('option');
                            opt.value = "Select Name";
                            opt.innerHTML = "Select NAME";
                            select.appendChild(opt);

                            var select_OLT = 1;
                        }
                        if( Incident_for==='BTS'  ){
                           select = document.getElementById("Name1");
                           var opt = document.createElement('option');
                           opt.value = new_OLT_Array[i]["BTS_Name"];
                           opt.innerHTML = new_OLT_Array[i]["BTS_Name"];
                           select.appendChild(opt); 
                        }else{
                        
                        select = document.getElementById("Name1");
                        var opt = document.createElement('option');
                        opt.value = new_OLT_Array[i]["Name"];
                        opt.innerHTML = new_OLT_Array[i]["Name"];
                        select.appendChild(opt);
                       }
                    }        
        }, 'JSON');
        
    }   

}

</script>

<script>
    $(function() {		
            $("#Incident_for").change(function() {
                    $("#Specification").load("<?php echo base_url(); ?>NMC_Incident_Specification/" + $(this).val() + ".txt");
            });
    });
</script>



<script>
    
 function tki_details(row){
     
    var tbl_tki =document.getElementById('tbl_tki'+row).innerHTML;    
   
    $.post('<?php echo base_url();?>index.php/nmc_c/nmc_tki_details', {
        tbl_tki:tbl_tki
//        Engineer_ID:Engineer_ID
    }, function (search_info_data) {
        var search_array = JSON.stringify(search_info_data);
        var new_search_array = JSON.parse(search_array);
//       alert(new_search_array); 
        var tki_crt_cls=new_search_array["tki_crt_cls"];
        var tki_result_comments=new_search_array["tki_result_comments"];
        
//        alert("Search ...."+tki_result_comments[0]['create_id']);
        
        document.getElementById('s_in_Occurred').innerHTML=new_search_array["tki_details"]["in_Occurred"];
        document.getElementById('s_in_Resolved').innerHTML=new_search_array["tki_details"]["in_Resolved"];
        document.getElementById('s_Duration').innerHTML=new_search_array["tki_details"]["Duration"];
        document.getElementById('s_tki').innerHTML=new_search_array["tki_details"]["tki"];
        var sms=new_search_array["tki_details"]["sms"];
        
        if( sms === '1' ){
            document.getElementById('s_sms').innerHTML='YES';
        }else{
            document.getElementById('s_sms').innerHTML='NO';
        }
        
        var email=new_search_array["email"];
        
        if( email === '1' ){
            document.getElementById('s_email').innerHTML='YES';
        }else{
            document.getElementById('s_email').innerHTML='NO';
        }
        
        document.getElementById('s_incident_for').innerHTML=new_search_array["tki_details"]["incident_for"];
        document.getElementById('s_type').innerHTML=new_search_array["tki_details"]["type"];
        document.getElementById('s_Specification').innerHTML=new_search_array["tki_details"]["Specification"];
        document.getElementById('s_Vendor').innerHTML=new_search_array["tki_details"]["Vendor"];
        document.getElementById('s_Name').innerHTML=new_search_array["tki_details"]["Name"];
        document.getElementById('s_Final_Reason').innerHTML=new_search_array["tki_details"]["Final_Reason"];
        document.getElementById('s_scr_curt_id').innerHTML=new_search_array["tki_details"]["scr_curt_id"];
        document.getElementById('s_informed_id').innerHTML=new_search_array["tki_details"]["informed_id"];
        document.getElementById('s_informed_time').innerHTML=new_search_array["tki_details"]["informed_time"];
        document.getElementById('s_etr').innerHTML=new_search_array["tki_details"]["etr"];
        document.getElementById('s_rfo').innerHTML=new_search_array["tki_details"]["rfo"];
        document.getElementById('s_pri_find').innerHTML=new_search_array["tki_details"]["pri_find"];
//.........................................................................

 var tableHTML = "";
    for (var key in tki_crt_cls) {  
            var status=tki_crt_cls[key]["status"]
            if(status === '0'){
              var new_status='CRETAE'; 
            }else {
              var new_status='CLOSE';  
            }
           tableHTML += "<tr>";
           tableHTML += "<td>" + tki_crt_cls[key]["e_id"] + '(' + tki_crt_cls[key]["e_name"] + ')' + "</td>";
           tableHTML += "<td>" + tki_crt_cls[key]["create_time"] + "</td>";
           tableHTML += "<td>" + new_status + "</td>";
           tableHTML += "</tr>";     
    } 
     for (var key in tki_result_comments) {  
//        if (new_search_array.hasOwnProperty(key)) {
           tableHTML += "<tr>";
           tableHTML += "<td>" + tki_result_comments[key]["create_id"]+ "</td>";
           tableHTML += "<td>" + tki_result_comments[key]["create_time"]+ "</td>";
           tableHTML += "<td>" + tki_result_comments[key]["comments"]+ "</td>";
           tableHTML += "</tr>";     
//        } 
    }
    $("#work_details_table").html(tableHTML); 
//            .............................................................................
    }, 'JSON');
     
     
 }
 
 </script>