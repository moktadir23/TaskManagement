
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              NMC Team: UP Time Report
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
            <form action="<?php echo base_url('index.php/nmc_c/nmc_uptime_report/'); ?>" name="search_by_zone" id="search_by_zone" method="POST">
                <div class="row">
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Incident For <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Incident_for" id="Incident_for" onchange="select_name()"  required="">
                                <option value="" >Select Type</option>
                            </select>
                        </div>
                    </div> 
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Type <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="type" onchange="select_name()" id="type">
                                <option value="0" >All Type</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Specification<div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="Specification"  id="Specification">
                                <option value="0" >Select Specification </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Vendor <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="Vendor" onchange="pick_Name()"  id="Vendor">
                                <option value="0" >ALL Vendor</option>
                            </select>
                        </div>
                    </div>
                    
                     
                    
                </div>
                
                <div class="row">
                    <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>Site/POP/Link/Client Name<div style="color:red;float: right;"></div></label>  
                            
                            
                            <div id="input_field">
                                <input  class="form-control" name="Name" id="Name"  placeholder="Enter Site/POP Name" >
                            </div>
                            
                            <div id="select_field">
                             <select class="form-control" name="Name1" id="Name1" >
                                <option value="Select Name" >Select Name </option>
                            </select>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <label>Month</label>
<?php
// set the month array
$formattedMonthArray = array(
                    "1" => "January", "2" => "February", "3" => "March", "4" => "April",
                    "5" => "May", "6" => "June", "7" => "July", "8" => "August",
                    "9" => "September", "10" => "October", "11" => "November", "12" => "December",
                );
?>
<!-- displaying the dropdown list -->
<select class="form-control"  name="month" id="month">
    <option value="">Select Month</option>
    <?php
    $month_n=0;
    foreach ($formattedMonthArray as $month) {
        $month_n++;
        $month = str_pad($month, 2, "0", STR_PAD_LEFT);
        echo '<option value="'.$month_n.'">'.$month.'</option>';
    }
    ?>
</select>   

                    </div>
                    <div class="col-lg-3">
                        <label>Year </label>
<?php
// set start and end year range
$yearArray = range(2015, 2025);
?>
<!-- displaying the dropdown list -->
<select class="form-control" name="year" id="year">
    <option value="">Select Year</option>
    <?php
    foreach ($yearArray as $year) {
        // if you want to select a particular year
        $selected = ($year == 2021) ? 'selected' : '';
        echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
    }
    ?>
</select>
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
                    
                    <div class="col-lg-3"> <br>   
                        <input class="form-control" type="hidden" name="month_wise_report" id="month_wise_report" value="1">
                         <b> Month Wise</b>&nbsp; &nbsp;<input type="checkbox" onchange="checked_validation()" checked="checked" name="month_wise" id="month_wise">  &nbsp;
                              
                     </div>
                </div>
                
                 <div class="row">
                    <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>Start Date<div style="color:red;float: right;"></div> <i class="fa fa-calendar"></i></label>                                  
                            <input  class="form-control" id="s_date" onclick="check_date()" value="" name="s_date"  placeholder="DD-MM-YYYY H:M:S" disabled="disabled">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>End Date<div style="color:red;float: right;"></div> <i class="fa fa-calendar"></i></label>
                            <input  class="form-control" id="e_date" value="" name="e_date" onchange="validayion();"  placeholder="DD-MM-YYYY H:M:S" disabled="disabled">                                                 
                        </div>
                    </div>
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
                            <!--<th>TKI NO.</th>-->
                            <th>Name</th>
                            <th>Total Time (hour)</th>
                            <th>Downtime per Month</th>
                            <th>Availability</th>
                            <th>Downtime (%)</th>
                            <th>Action</th>
                            <!--<th>Informed To</th>-->
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
        $row++;
?>  
                        <tr> 
                            <td id="tbl_Incident_Name<?php echo $row; ?>"><?php echo $value['Name']; ?></td>
                            <td>
                                <?php 
                                 $total_day = $_SESSION["nmc_uptime_day"];
                                 $total_sec= intval($total_day)*24*60*60;
                                 echo $Total_hour= intval($total_day)*24;
                                 
                                ?>
                            </td>
                            <td>
                                <?php 
                                    $total_down_sec=$value['total_sec'];
                                    $hours = floor($total_down_sec / 3600);
                                    $mins = floor(($total_down_sec - $hours*3600) / 60);
                                    $s = $total_down_sec - ($hours*3600 + $mins*60);
                                    $mins = ($mins<10?"0".$mins:"".$mins);
                                    $s = ($s<10?"0".$s:"".$s); 
                                    $total_down_hour = ($hours>0?$hours.":":"").$mins.":".$s;
                                    echo  $total_down_hour;
                                ?>
                            </td>
                            <td>
                                <?php
                                    $total_availability_sec= $total_sec - $total_down_sec;
                                    $avg_uptime_sec= ( $total_availability_sec * 100 )/$total_sec;
                                    echo $avg_downtime = number_format($avg_uptime_sec, 3);
                                 ?>
                            </td>
                            <td>
                                <?php 
                                 $avg_downtime_sec= ( intval($total_down_sec)  * 100 )/$total_sec; 
                                 echo $avg_downtime = number_format($avg_downtime_sec, 3);
                                ?>
                            </td>
                                
                                <td id='<?php echo 'row'.$row; ?>'> <button type="button" class="btn btn-info" data-toggle='modal' data-target='#myModal' onclick="Incident_details(<?php echo $row; ?>)" data-backdrop='static'>Details</button> </td>
                                                     
                            </tr>                    
<?php } ?>
<div class="row">
        
<div class="col-lg-10">       
<?php 
//    echo '<b>Total Incident Number : </b>'.$total.'<br>';
//    echo '<b>Link3 : </b>'.$Link3.'&nbsp;&nbsp;&nbsp;&nbsp;';
//    echo '<b>GP : </b>'.$GP.'&nbsp;&nbsp;&nbsp;&nbsp;';
//    echo '<b>BL : </b>'.$BL.'&nbsp;&nbsp;&nbsp;&nbsp;';
//    echo '<b>SCL : </b>'.$SCL.'&nbsp;&nbsp;&nbsp;&nbsp;';
//    echo '<b>F@H : </b>'.$FH.'&nbsp;&nbsp;&nbsp;&nbsp;<br>';
//   
//    echo '<b>BTS : </b>'.$BTS.'&nbsp;&nbsp;&nbsp;&nbsp;';
//    echo '<b>Backbone : </b>'.$Backbone.'&nbsp;&nbsp;&nbsp;&nbsp;';
//    echo '<b>Datacenter : </b>'.$Datacenter.'&nbsp;&nbsp;&nbsp;&nbsp;';
//    echo '<b>iMPLS : </b>'.$iMPLS.'&nbsp;&nbsp;&nbsp;&nbsp;';
//    echo '<b>NTTN : </b>'.$NTTN.'&nbsp;&nbsp;&nbsp;&nbsp;';
//    echo '<b>Telco : </b>'.$Telco.'&nbsp;&nbsp;&nbsp;&nbsp;';
//    echo '<b>Upstream : </b>'.$Upstream.'&nbsp;&nbsp;&nbsp;&nbsp;';
?>
    
</div> 
    <div class="col-lg-2">
        <!--<button type="button" disabled="disabled"  class="btn btn-success"  onclick="location.href = '<?php echo base_url(); ?>index.php/nmc_c/export_incedent_report/'">Export Excel</button> &nbsp;<br><br>-->    
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
                        <h4 class="modal-title">Details Downtime Info</h4>
                        <?php 
                        
//                          echo  $Vendor= $_SESSION["nmc_s_vendor"];
//                          echo  $type=$_SESSION["nmc_s_type"];
//                          echo  $Specification=$_SESSION["nmc_s_Specification"];
                        
                        
                        ?>
                    </div>           
                </div>             
            </div>
<!--................................................................................................................................-->

<div class='row'>
                <div class="col-lg-12">
                    <div class="table-responsive">   
                        <table class="table table-bordered table-striped" id="modal_table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Specification </th>
                                    <th>In Occurred </th>
                                    <th>In Resolved</th>
                                    <th>Duration</th>
                                    <th>TKI NO.</th>
                                </tr>
                            </thead>
                            <tbody id="details_table"></tbody>
                            
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
  if(Incident_for==='Backbone' || Incident_for==='BTS' || Incident_for==='Telco' || Incident_for==='NTTN' || Incident_for==='iMPLS' ){
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
 
 
    if(Incident_for==='BTS' || Incident_for==='Backbone' || Incident_for==='Telco' || Incident_for==='NTTN' || Incident_for==='iMPLS'|| Incident_for==='Upstream' ){
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
    
 function Incident_details(row){
     
    var Incident_Name =document.getElementById('tbl_Incident_Name'+row).innerHTML;    
   
    $.post('<?php echo base_url();?>index.php/nmc_c/nmc_group_Incident_details', {
        Incident_Name:Incident_Name
//        Engineer_ID:Engineer_ID
    }, function (search_info_data) {
        var search_array = JSON.stringify(search_info_data);
        var new_search_array = JSON.parse(search_array);
//       alert(new_search_array); 
//        var tki_crt_cls=new_search_array["tki_crt_cls"];
//        var tki_result_comments=new_search_array["tki_result_comments"];
        
//        alert("Search ...."+tki_result_comments[0]['create_id']);
        
//.........................................................................

 var tableHTML = "";
    for (var key in new_search_array) {  
           tableHTML += "<tr>";
           tableHTML += "<td>" + new_search_array[key]["Name"]+ "</td>";
           tableHTML += "<td>" + new_search_array[key]["type"]+ "</td>";
           tableHTML += "<td>" + new_search_array[key]["Specification"]+ "</td>";
           tableHTML += "<td>" + new_search_array[key]["in_Occurred"]+ "</td>";
           tableHTML += "<td>" + new_search_array[key]["in_Resolved"]+ "</td>";
           tableHTML += "<td>" + new_search_array[key]["Duration"]+ "</td>";
           tableHTML += "<td>" + new_search_array[key]["tki"]+ "</td>";
           tableHTML += "</tr>";     
    }
    $("#details_table").html(tableHTML); 
//            .............................................................................
    }, 'JSON');
     
     
 }
 
 
 function checked_validation(){
 

  if( document.getElementById("month_wise").checked == true){
//       alert('TRUE');
 
            document.getElementById("month_wise_report").value=1;
            
            document.getElementById("month").selectedIndex=0;
            document.getElementById("year").selectedIndex=0;
            document.getElementById("month").disabled=false;
            document.getElementById("year").disabled=false;
            
            document.getElementById("s_date").value=null;
            document.getElementById("e_date").value=null;
            document.getElementById("s_date").disabled=true;
            document.getElementById("e_date").disabled=true;
            
        }else{
//             alert('FALSE');
 
            document.getElementById("month_wise_report").value=0;
            
            document.getElementById("month").selectedIndex=0;
            document.getElementById("year").selectedIndex=0;
            document.getElementById("month").disabled=true;
            document.getElementById("year").disabled=true;
            
            document.getElementById("s_date").value=null;
            document.getElementById("e_date").value=null;
            document.getElementById("s_date").disabled =false;
            document.getElementById("e_date").disabled=false;
        }
 
 
 }
 </script>