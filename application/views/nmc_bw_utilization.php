<!--<h1>under construction</h1>-->
<!--..............Down=In................-->
<!--..............Up=Out.................-->
<?php
$id = $this->session->userdata('id');
$name = $this->session->userdata('name');
?>
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
    var select_field = document.getElementById("select_field");
    select_field.style.display = "none";
</script>

<div class="container-fluid">
    <!-- Page Heading -->
<div class="row">   
 <div class="col-lg-12">
       <h5> Select From : </h5> &nbsp; &nbsp;
        &nbsp; &nbsp;<input type="radio" name="f_n" id="f_n1" onclick="from_n(this.value);" value="1" checked=""> &nbsp;&nbsp; <b>BW From</b> 
        &nbsp;&nbsp;<input type="radio" name="f_n" id="f-n2" onclick="from_n(this.value); pick_latancy_info();" value="2"> &nbsp;&nbsp; <b>Latency From</b>
 </div> 
 </div>    
 <div id="bw_from">   
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              Bandwidth Utilization From
            </h3>
            <ol class="breadcrumb">
                <div class="col-lg-4"></div>
                <h3 class="text-center"><span id="info_span"></span></h3>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class="row" >
        <?php
        $message = $this->session->userdata('message');
        if (isset($message)) {
            echo $message;
            $this->session->unset_userdata('message');
        }
        ?>
        <div class="col-lg-12">
            <form action="" name="assign_task_from" id="assign_task_from" method="">
                <input type="hidden" name="hidden_id" value="<?php echo $id;?>" id="hidden_id">
                <input type="hidden" name="hidden_bwu" id="hidden_bwu">
                <div class='row'>
                     <div class="col-lg-4">
                        <div class="form-group">
                          <label> Date  <i class="fa fa-calendar"></i>  <div style="color:red;float: right;">*</div></label>
                           
                        <input  class="form-control"  id="s_date" value="<?php echo date("d-m-Y H:i:s"); ?>" name="bw_date"  placeholder="DD-MM-YYYY H:M:S" required="">
                        </div>
                    </div>
                    <div class="col-lg-4"> 
                        <div class="form-group">
                            <label>Type <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="bw_type" id="bw_type" onchange="pick_bw()"  required="">
                                
                                <!--pick_bw    pick_zone_or_cybergate-->
                                <option value="" >Select Type </option>
                            </select>
                        </div>
                    </div>
                    
                </div>
                
                
        <div class="row" id="bw_zone">
            <div class="col-lg-12">
                <div class="table-responsive">
                    
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Zone</th>
                                <th>IN (mbps)</th>
                                <th>OUT (mbps)</th>
                            </tr>
                        </thead>
                        <tbody> 
                            <tr>
                                <td><input  class="form-control" name="z_sub_type1" id="z_sub_type1" readonly="readonly" value="Dhaka" required=""></td>
                                <td><input  class="form-control" name="z_in1" id="z_in1" placeholder="Enter Bandwidth IN" required=""></td>
                                <td><input  class="form-control" name="z_out1" id="z_out1" placeholder="Enter Bandwidth OUT" required=""></td>
                            </tr>
                            <tr>
                                <td><input  class="form-control" name="z_sub_type2" id="z_sub_type2" readonly="readonly" value="CTG" required=""></td>
                                <td><input  class="form-control" name="z_in2" id="z_in2" placeholder="Enter Bandwidth IN" required=""></td>
                                <td><input  class="form-control" name="z_out2" id="z_out2" placeholder="Enter Bandwidth OUT" required=""></td>
                            </tr>
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>    
              
                
        <div class="row"  id="bw_Upstream">
            <div class="col-lg-12">
                <div class="table-responsive">

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Upstream</th>
                                <th>IN (mbps)</th>
                                <th>OUT (mbps)</th>
                            </tr>
                        </thead>
                        <tbody> 
                            
                            <tr>
                                <td><input  class="form-control" name="u_sub_type1" id="u_sub_type1" readonly="readonly" value="IPLC-1 (SMW4-01_CTG-SG_10G)" required=""></td>
                                <td><input  class="form-control" name="u_in1" id="u_in1" placeholder="Enter Bandwidth UP" required=""></td>
                                <td><input  class="form-control" name="u_out1" id="u_out1" placeholder="Enter Bandwidth UP" required=""></td>
                            </tr>
                            <tr>
                                <td><input  class="form-control" name="u_sub_type2" id="u_sub_type2" readonly="readonly" value="IPLC-2 (SMW4-02_DHK-SG_STM64)" required=""></td>
                                <td><input  class="form-control" name="u_in2" id="u_in2" placeholder="Enter Bandwidth UP" required=""></td>
                                <td><input  class="form-control" name="u_out2" id="u_out2" placeholder="Enter Bandwidth UP" required=""></td>
                            </tr>
                            <tr>
                                <td><input  class="form-control" name="u_sub_type3" id="u_sub_type3" readonly="readonly" value="IPLC-3 (SMW5-01_DHK-MRS_10G)" required=""></td>
                                <td><input  class="form-control" name="u_in3" id="u_in3" placeholder="Enter Bandwidth UP" required=""></td>
                                <td><input  class="form-control" name="u_out3" id="u_out3" placeholder="Enter Bandwidth UP" required=""></td>
                            </tr>
                            <tr>
                                <td><input  class="form-control" name="u_sub_type4" id="u_sub_type4" readonly="readonly" value="IPLC-4 (SMW5-02_DHK-SG_10G)" required=""></td>
                                <td><input  class="form-control" name="u_in4" id="u_in4" placeholder="Enter Bandwidth UP" required=""></td>
                                <td><input  class="form-control" name="u_out4" id="u_out4" placeholder="Enter Bandwidth UP" required=""></td>
                            </tr>
                            <tr>
                                <td><input  class="form-control" name="u_sub_type5" id="u_sub_type5" readonly="readonly" value="IPLC-5 (SMW5-03_DHK-SG_10G)"  required=""></td>
                                <td><input  class="form-control" name="u_in5" id="u_in5" placeholder="Enter Bandwidth UP" required=""></td>
                                <td><input  class="form-control" name="u_out5" id="u_out5" placeholder="Enter Bandwidth UP" required=""></td>
                            </tr>
                            <tr>
                                <td><input  class="form-control" name="u_sub_type6" id="u_sub_type6" readonly="readonly" value="IPLC-6 (SMW4-03_DHK-SG_10G)"  required=""></td>
                                <td><input  class="form-control" name="u_in6" id="u_in6" placeholder="Enter Bandwidth UP" required=""></td>
                                <td><input  class="form-control" name="u_out6" id="u_out6" placeholder="Enter Bandwidth UP" required=""></td>
                            </tr>
                            <tr>
                                <td><input  class="form-control" name="u_sub_type7" id="u_sub_type7" readonly="readonly" value="PCCW SG IP Transit - 2G" required=""></td>
                                <td><input  class="form-control" name="u_in7" id="u_in7" placeholder="Enter Bandwidth UP" required=""></td>
                                <td><input  class="form-control" name="u_out7" id="u_out7" placeholder="Enter Bandwidth UP" required=""></td>
                            </tr><!--
                            <tr>
                                <td><input  class="form-control" name="u_sub_type8" id="u_sub_type8" readonly="readonly" value="SMW4 CTG-SG EQX -10G via SCL" required=""></td>
                                <td><input  class="form-control" name="u_in8" id="u_in8" placeholder="Enter Bandwidth UP" required=""></td>
                                <td><input  class="form-control" name="u_out8" id="u_out8" placeholder="Enter Bandwidth UP" required=""></td>
                            </tr>
                            <tr>
                                <td><input  class="form-control" name="u_sub_type9" id="u_sub_type9" readonly="readonly" value="TOTAL (Aggregate)" required=""></td>
                                <td><input  class="form-control" name="u_in9" id="u_in9" placeholder="Enter Bandwidth UP" required=""></td>
                                <td><input  class="form-control" name="u_out9" id="u_out9" placeholder="Enter Bandwidth UP" required=""></td>
                            </tr>-->
                        </tbody>
                    </table>
 
                </div>
            </div>
        </div>
    
                
    <div class="row" id="update_bw_from">
            <div class="col-lg-12">
                <div class="table-responsive">
                    
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Zone/Upstream</th>
                                <th>IN (mbps)</th>
                                <th>OUT (mbps)</th>
                            </tr>
                        </thead>
                        <tbody> 
                            <tr>
                                <td><input  class="form-control" name="update_sub_type" id="update_sub_type" readonly="readonly" ></td>
                                <td><input  class="form-control" name="u_in" id="u_in" placeholder="Enter Bandwidth IN" ></td>
                                <td><input  class="form-control" name="u_out" id="u_out" placeholder="Enter Bandwidth OUT" ></td>
                            </tr>
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>            
                
                
        <div class="row">
                    <div class="col-lg-10"></div>
                    <div class="col-lg-2">
                        <div class="form-group"><br>
                       
                        <div id="btn1">   
                        <button type="submit" class="btn btn-default" id="save" value="save" >Save..</button>
                        </div>
<!--                        <div id="btn1">   
                        <button class="btn btn-default" onclick="cyberget_bwu()" >U Save</button>
                        </div>    -->
                        <div id="btn2">   
                            <button class="btn btn-default" onclick="update_bwu()" >update</button>
                        </div>
                        </div>
                    </div>   
                </div>        
                
                
            </form>
        </div>
<!--........................................... BW TABLE...............................................................-->   

<!--                            ..............Down=In................
                                ..............Up=Out.................-->
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Hour</th>
                                <th>Type</th>
                                <th>Zone / Upstream </th>
                                <th>In</th>
                                <th>Out</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="bwu_tbl"> </tbody>
                    </table>
                </div>
            </div>
        </div>
<!--.......................................................................................................................-->  
    </div>
 </div>   
 
 <!--.............................. 2nd Part .........................................................................-->
 <div id="l_from">
 <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              Latency From
            </h3>
              <div class="col-lg-4"></div>
                <h3 class="text-center"><span id="info_span"></span></h3>
            
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="" name="latancy_from" id="latancy_from" method="">
                <input type="hidden" name="hidden_id" value="<?php echo $id;?>" id="hidden_id">
                <div class='row'>
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label> Date  <i class="fa fa-calendar"></i>  <div style="color:red;float: right;">*</div></label>
                        <input  class="form-control" id="e_date" value="<?php echo date("d-m-Y H:i:s"); ?>" name="l_date"  placeholder="DD-MM-YYYY H:M:S" required="">
                        </div>
                    </div>
                    
<!--                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Hour<div style="color:red;float: right;"></div></label>
                            <input class="form-control" name="l_hour" id="l_hour" value="<?php echo date('H:i:s'); ?>" placeholder="Enter Ticket ID" >
                        </div>
                    </div>-->
                    <div class="col-lg-3">
                        <div class="form-group">
                        <label> 4.2.2.1 (Latency ms)<div style="color:red;float: right;">*</div></label>
                        <input  class="form-control" name="ip_4221_l" id="ip_4221_l" placeholder="Enter 4.2.2.1 Latancy" required="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                        <label> 4.2.2.1 (Packet Loss %)<div style="color:red;float: right;">*</div></label>
                        <input  class="form-control" name="ip_4221_pl" id="ip_4221_pl" placeholder="Enter 4.2.2.1 Packet Loss" required="">
                        </div>
                    </div>
                     
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>yahoo.com.sg (Latency ms) <div style="color:red;float: right;">*</div></label>
                            <input  class="form-control" name="yahoo_l" id="yahoo_l" placeholder="Enter Yahoo Latancy" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>yahoo.com.sg (Packet Loss %)<div style="color:red;float: right;">*</div></label>
                            <input  class="form-control" name="yahoo_pl" id="yahoo_pl" placeholder="Enter Yahoo Packet Loss" required="">
                        </div>
                    </div>
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>google.com.sg (Latency ms) <div style="color:red;float: right;">*</div></label>
                            <input  class="form-control" name="google_l" id="google_l" placeholder="Enter Google Latancy" required="">
                        </div>
                    </div>
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>google.com.sg (Packet Loss %)<div style="color:red;float: right;">*</div></label>
                            <input  class="form-control" name="google_pl" id="google_pl" placeholder="Enter Google Packet Loss" required="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group"><br>
                          
                        <button type="submit" class="btn btn-default" value="save" >update</button>
                   
                        </div>
                    </div> 
                </div>               
            </form>
        </div>
        
        
        
<!--........................................... Latency TABLE...............................................................-->        
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Hour</th>
                                <th>4.2.2.1 </th>
                                <th>yahoo.com.sg </th>
                                <th>google.com.sg</th>
                            </tr>
                        </thead>
                        <tbody id="latancy_tbl"> </tbody>
                    </table>
                </div>
            </div>
        </div>
<!--.......................................................................................................................-->        
    </div>
 </div>    
  <!--......................................................................................................................-->  
    
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
function null_from(){
    
      document.forms["assign_task_from"]["s_date"].value=<?php echo date("d-m-Y");?>;
      document.forms["assign_task_from"]["bw_hour"].value=<?php echo date("H:i:s");?>;
      document.forms["assign_task_from"]["bw_type"].selectedIndex=0;
      document.forms["assign_task_from"]["sub_type"].selectedIndex=0;
      document.forms["assign_task_from"]["up"].value=null;
      document.forms["assign_task_from"]["down"].value=null;
      
}
function null_from_latancy(){
    document.forms["latancy_from"]["e_date"].value=<?php echo date("d-m-Y");?>;
    document.forms["latancy_from"]["l_hour"].value=<?php echo date("H:i:s");?>;
    
    document.forms["latancy_from"]["ip_4221_l"].value=null;
    document.forms["latancy_from"]["ip_4221_pl"].value=null;
    document.forms["latancy_from"]["yahoo_l"].value=null;
    document.forms["latancy_from"]["yahoo_pl"].value=null;
    document.forms["latancy_from"]["google_l"].value=null;
    document.forms["latancy_from"]["google_pl"].value=null;
}
</script>

<script>
    $("form#assign_task_from").submit(function () {
       
var hidden_bwu=document.getElementById("hidden_bwu").value; 

      if(hidden_bwu != '2'){

       document.getElementById("save").disabled = false;
       
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/nmc_c/save_bwu_info/'); ?>",
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
                alert('Successfully Done');
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
        
        
    }
      
    );
    
//    function validation(){
//       document.getElementById("info_span").innerHTML = "";
//       submit_or_not = 1;
////    $('html,body').scrollTop(0);
//var bw_type = document.getElementById("bw_type").value;
//if(bw_type=='Link3'){
//    
//
//        var x = document.getElementById("z_in1").value;
//        if ( x == null || x == '' ) {
//            document.getElementById("info_span").innerHTML = "Please Input Dhaka IN (mbps)";
//            submit_or_not = 0;
//            return submit_or_not;
//        }
//        
//        var x = document.getElementById("z_in2").value;
//        if ( x == null || x == '' ) {
//            document.getElementById("info_span").innerHTML = "Please Input CTG IN (mbps)";
//            submit_or_not = 0;
//            return submit_or_not;
//        }
//        
//        var x = document.getElementById("z_out1").value;
//        if ( x == null || x == '' ) {
//            document.getElementById("info_span").innerHTML = "Please Input Dhaka OUT (mbps)";
//            submit_or_not = 0;
//            return submit_or_not;
//        }
//        
//        var x = document.getElementById("z_out2").value;
//        if ( x == null || x == '' ) {
//            document.getElementById("info_span").innerHTML = "Please Input CTG OUT (mbps)";
//            submit_or_not = 0;
//            return submit_or_not;
//        }
//        
//    return submit_or_not;    
//}
//
//if(bw_type=='Cybergate'){
//    var x = document.getElementById("u_in1").value;
//    if ( x == null || x == '' ) {
//        document.getElementById("info_span").innerHTML = "Please Input Cogent (Singapore) IN (mbps)";
//        submit_or_not = 0;
//    }
//    
//    var x = document.getElementById("u_out1").value;
//    if ( x == null || x == '' ) {
//        document.getElementById("info_span").innerHTML = "Please Input Cogent (Singapore) OUT (mbps)";
//        submit_or_not = 0;
//    }
//        
//    return submit_or_not;
//    
//}
//
//    }
</script>

<script>
    $("form#latancy_from").submit(function () {
       
//        alert("WORK ON PAGE .TRY AGAIN FEW MINUTE LATER");
//        exit();
//       save_bwu_info
       
       
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/nmc_c/save_latancy_info/'); ?>",
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
                alert('Successfully Done');
                null_from_latancy();  
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
 <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->

<script type="text/javascript">

function pick_zone_or_cybergate(duplicate){
    
    var bw_type = $('#bw_type').val();
//    alert('Chk...' + duplicate);
    
    
if(duplicate==0){ 
    if(bw_type=='Link3'){
        
        bw_zone.style.display = "block";
        bw_Upstream.style.display = "none";    
        
        document.getElementById("z_in1").value=null;
        document.getElementById("z_in2").value=null;
        document.getElementById("z_out1").value=null;
        document.getElementById("z_out2").value=null;
        
        document.getElementById("u_in1").value=0;
        document.getElementById("u_in2").value=0;
        document.getElementById("u_in3").value=0;
        document.getElementById("u_in4").value=0;
        document.getElementById("u_in5").value=0;
        document.getElementById("u_in6").value=0;
        document.getElementById("u_in7").value=0;
//        document.getElementById("u_in8").value=0;
//        document.getElementById("u_in9").value=0;
        
        document.getElementById("u_out1").value=0;
        document.getElementById("u_out2").value=0;
        document.getElementById("u_out3").value=0;
        document.getElementById("u_out4").value=0;
        document.getElementById("u_out5").value=0;
        document.getElementById("u_out6").value=0;
        document.getElementById("u_out7").value=0;
//        document.getElementById("u_out8").value=0;
//        document.getElementById("u_out9").value=0;
        
    }else if(bw_type=='Cybergate'){
        bw_zone.style.display = "none";
        bw_Upstream.style.display = "block";   
        
        document.getElementById("z_in1").value=0;
        document.getElementById("z_in2").value=0;
        document.getElementById("z_out1").value=0;
        document.getElementById("z_out2").value=0;
        
        document.getElementById("u_in1").value=null;
        document.getElementById("u_in2").value=null;
        document.getElementById("u_in3").value=null;
        document.getElementById("u_in4").value=null;
        document.getElementById("u_in5").value=null;
        document.getElementById("u_in6").value=null;
        document.getElementById("u_in7").value=null;
//        document.getElementById("u_in8").value=null;
//        document.getElementById("u_in9").value=null;
        
        document.getElementById("u_out1").value=null;
        document.getElementById("u_out2").value=null;
        document.getElementById("u_out3").value=null;
        document.getElementById("u_out4").value=null;
        document.getElementById("u_out5").value=null;
        document.getElementById("u_out6").value=null;
        document.getElementById("u_out7").value=null;
//        document.getElementById("u_out8").value=null;
//        document.getElementById("u_out9").value=null; 
        
        
    }
    
}
   

//        $.post('<?php echo base_url(); ?>index.php/nmc_c/pick_nmc_bwu_category_name', {
//            bw_type: bw_type
//            
//        }, function (OLT_data) {
//                
//                    var OLT_array = JSON.stringify(OLT_data);
//                    var new_OLT_Array = JSON.parse(OLT_array);
//                    
////                    alert("OLT NAME ...."+new_OLT_Array[1]["OLT_Name"]);
//                    var select_OLT = 0;
//                    document.getElementById("sub_type").innerHTML = null;
//                    document.getElementById("sub_type").value = null;
//                    for (var i in new_OLT_Array) {
//                        //    alert("splite...."+newArr[i]["OLT_Name"]);
//                        if (select_OLT == 0) {
//                            select = document.getElementById("sub_type");
//                            var opt = document.createElement('option');
//                            opt.value = "Select Name";
//                            opt.innerHTML = "Select NAME";
//                            select.appendChild(opt);
//
//                            var select_OLT = 1;
//                       }
//                       select = document.getElementById("sub_type");
//                       var opt = document.createElement('option');
//                       opt.value = new_OLT_Array[i]["Name"];
//                       opt.innerHTML = new_OLT_Array[i]["Name"];
//                       select.appendChild(opt); 
//                    }        
//        }, 'JSON');
           

}

</script>

<script type="text/javascript">

bw_from.style.display = "block";
l_from.style.display = "none";

bw_zone.style.display = "none";
bw_Upstream.style.display = "none"; 


function from_n(f_n){
    
//    document.getElementById("f_n1").value=f_n; 
//    alert('TEST' + f_n);
   
   if(f_n==='2'){
     l_from.style.display = "block";
     bw_from.style.display = "none";        
   }else{
     bw_from.style.display = "block";
     l_from.style.display = "none"; 
   }
        
}
</script>   


<script type="text/javascript">

bw_from.style.display = "block";
l_from.style.display = "none";


function from_n(f_n){
    
//    document.getElementById("f_n1").value=f_n; 
//    alert('TEST' + f_n);
   
   if(f_n==='2'){
     l_from.style.display = "block";
     bw_from.style.display = "none";        
   }else{
     bw_from.style.display = "block";
     l_from.style.display = "none"; 
   }
        
}
</script>



<script>
function pick_bw(){
    
    
//    alert('working.Please wait few minute');
//    exit();    
    var bw_type=document.getElementById("bw_type").value;
    var bw_date_time=document.getElementById("s_date").value;
    
//    var sub_type=document.getElementById("sub_type").value;
    
    $.post('<?php echo base_url();?>index.php/nmc_c/pick_bw_info', {
        bw_type:bw_type,
        bw_date_time:bw_date_time
    }, function (bwu_info) {
        var bwu_array = JSON.stringify(bwu_info);
        var new_bwu_array = JSON.parse(bwu_array);
        
//        alert('TEST.....'+new_bwu_array['bw_info']);
        

        if( new_bwu_array['bw_info'] == null ){
            if(bw_type=='Link3'){
                alert('Already Input Same Time Zone Vaule');   
               document.getElementById("bw_type").selectedIndex=0;
            }else if(bw_type=='Cybergate'){
               alert('Already Input Same Time Upstream Vaule');   
               document.getElementById("bw_type").selectedIndex=0; 
            }
            
           var duplicate=1;
        }else{
           duplicate=0;
        }

//.........................................................................
var bw_result=new_bwu_array['bw_result'];

//alert('TEST info..............'+bw_result[1]['sub_type']);

var row_no=0;
var tableHTML = "";

    for (var key in bw_result) {  
        if (bw_result.hasOwnProperty(key)) {
           
           row_no=row_no+1; 
           tableHTML += "<tr>";
           tableHTML += "<td id=" + row_no+'time' + ">" +  bw_result[key]["date"] + ' ' +  bw_result[key]["time"] + "</td>";
           tableHTML += "<td id=" + row_no+'type' + ">" + bw_result[key]["type"]+"</td>";
           tableHTML += "<td id=" + row_no+'sub_type' + ">" + bw_result[key]["sub_type"]+"</td>";
           tableHTML += "<td id=" + row_no+'down' + ">" + bw_result[key]["down"]+"</td>";
           tableHTML += "<td id=" + row_no+'up' + ">" + bw_result[key]["up"]+"</td>";
           tableHTML += "<td id=" + row_no + ">" + '<a onclick='+"edit_bwu('"+ row_no +"')"+' > <button> Edit </a> </button> <br><br> <a onclick='+"cancel_bwu()"+' > <button> Cancel </button> </a>'  +"</td>";
           tableHTML += "</tr>"; 
//           '"+ row_no +"'
        } 
    }   
    $("#bwu_tbl").html(tableHTML); 
//       alert(duplicate);
     pick_zone_or_cybergate(duplicate);
//            .............................................................................
    }, 'JSON');  
    
  
    
    
 
 }    
    
    
 function pick_latancy_info(){
     
    $.post('<?php echo base_url();?>index.php/nmc_c/pick_latancy_info', {
//        date:date,
    }, function (latancy_info) {
        var latancy_array = JSON.stringify(latancy_info);
        var new_latancy_array = JSON.parse(latancy_array);
//       alert(new_search_array); 
//        alert("Search ip_4221_l...." + new_search_array[0]["ip_4221_l"]);
//.........................................................................
 var tableHTML = "";
    for (var key in new_latancy_array) {  
        if (new_latancy_array.hasOwnProperty(key)) {
           tableHTML += "<tr>";
           tableHTML += "<td>" + new_latancy_array[key]["date"]+ "</td>";
           tableHTML += "<td>" + new_latancy_array[key]["time"]+ "</td>";
           tableHTML += "<td>" + new_latancy_array[key]["ip_4221_l"] +'( PL- '+ new_latancy_array[key]["ip_4221_pl"] + '% )' + "</td>";
           tableHTML += "<td>" + new_latancy_array[key]["yahoo_l"]+'( PL- '+ new_latancy_array[key]["yahoo_pl"] + '% )' + "</td>";
           tableHTML += "<td>" + new_latancy_array[key]["google_l"]+'( PL- '+ new_latancy_array[key]["google_pl"] + '% )' + "</td>";
           tableHTML += "</tr>";     
        } 
    }   
    $("#latancy_tbl").html(tableHTML); 
//            .............................................................................
    }, 'JSON');   
 }           
</script>  

<script type="text/javascript">
    
btn1.style.display = "block";
btn2.style.display = "none";  

update_bw_from.style.display = "none";

    function edit_bwu(row_no){
        
//        alert('TEST..' + row_no);

btn2.style.display = "block";
btn1.style.display = "none";

update_bw_from.style.display = "block";
bw_zone.style.display = "none";
bw_Upstream.style.display = "none"; 


 document.getElementById("s_date").value  = document.getElementById(+row_no+'time').innerHTML;
 document.getElementById("bw_type").value  = document.getElementById(+row_no+'type').innerHTML;

 document.getElementById("update_sub_type").value = document.getElementById(+row_no+'sub_type').innerHTML;
 document.getElementById("u_in").value  = document.getElementById(+row_no+'down').innerHTML;
 document.getElementById("u_out").value  = document.getElementById(+row_no+'up').innerHTML;



        var bwu_tbl = document.getElementById('bwu_tbl');
        
//          for(var i = 0; i < bwu_tbl.rows.length; i++)
//                {
//                    bwu_tbl.rows[i].onclick = function()
//                    {
//                         //rIndex = this.rowIndex;
//        document.getElementById("s_date").value=this.cells[0].innerHTML;
//        document.getElementById("down").value=this.cells[3].innerHTML;
//        document.getElementById("up").value=this.cells[4].innerHTML;
//                    };
//                }
                
    document.getElementById("hidden_bwu").value=2; 
//    alert('Update');
//    if()
//                hidden_bwu
    }     
    
 function update_bwu(){
    
//    alert("TEST ...");
    
    var s_date=document.getElementById("s_date").value;
    var bw_type=document.getElementById("bw_type").value;
    var sub_type=document.getElementById("update_sub_type").value;
    var up=document.getElementById("u_out").value;
    var down=document.getElementById("u_in").value;
    
    
    
//    exit();
    $.post('<?php echo base_url();?>index.php/nmc_c/update_bw_info', {
        s_date:s_date,
        bw_type:bw_type,
        sub_type:sub_type,
        up:up,
        down:down
    }, function (bwu_info) {
        
//        alert('TEST ...'+ bwu_info);
        
//        var bwu_array = JSON.stringify(bwu_info);
//        var new_bwu_array = JSON.parse(bwu_array);
//       alert(new_search_array); 
//        alert("Search ip_4221_l...." + new_search_array[0]["ip_4221_l"]);
//.........................................................................
//var row_no=0;
//var tableHTML = "";
//
//    for (var key in new_bwu_array) {  
//        if (new_bwu_array.hasOwnProperty(key)) {
//           
//           row_no=row_no+1; 
//           tableHTML += "<tr>";
//           tableHTML += "<td id=" + row_no+'time' + ">" + new_bwu_array[key]["time"]+"</td>";
//           tableHTML += "<td>" + new_bwu_array[key]["type"]+"</td>";
//           tableHTML += "<td>" + new_bwu_array[key]["sub_type"]+"</td>";
//           tableHTML += "<td id=" + row_no+'up' + ">" + new_bwu_array[key]["up"]+"</td>";
//           tableHTML += "<td id=" + row_no+'down' + ">" + new_bwu_array[key]["down"]+"</td>";
//           tableHTML += "<td id=" + row_no + ">" + '<a onclick='+"edit_bwu()"+' > Edit </a> <br> <a onclick='+"cancel_bwu()"+' > Cancel </a>'  +"</td>";
//           tableHTML += "</tr>"; 
//           
//        } 
//    }   
//    $("#bwu_tbl").html(tableHTML); 
//            .............................................................................
btn2.style.display = "none";
btn1.style.display = "none";

update_bw_from.style.display = "none";
bw_zone.style.display = "none";
bw_Upstream.style.display = "none";
bwu_tbl.style.display = "none";

    }, 'JSON');
 }   
    
</script> 

<script type="text/javascript">
      function cancel_bwu(){
       
      
        btn1.style.display = "block";
        btn2.style.display = "none";
        
        update_bw_from.style.display = "none";
        document.getElementById("bw_type").value =0;
        document.getElementById("hidden_bwu").value=null; 
//         alert('cancel');


//          for(var i = 0; i < bwu_tbl.rows.length; i++)
//                {
//                    bwu_tbl.rows[i].onclick = function()
//                    {
//                         //rIndex = this.rowIndex;
//                        document.getElementById("s_date").value='';
//                        document.getElementById("up").value='';
//                        document.getElementById("down").value='';
//        
//                    };
//                }
       
   } 
</script> 
    
