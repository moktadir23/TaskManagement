
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              NMC Team: Bandwidth and Latency Report
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
            <form action="<?php echo base_url('index.php/nmc_c/nmc_session_report'); ?>" name="search_by_zone" id="search_by_zone" method="POST">
                <div class="row">
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Type <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="bw_type" id="bw_type" onchange="pick_zone_or_cybergate();" required="">
                                <option value="0" >Select Type</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Zone / Upstream <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="sub_type" id="sub_type" >
                                <option value="0" >ALL</option>
                            </select>
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
                   
                </div>
                
                <div class="row">
                     <div class="col-lg-3"><br>
                        <input type="hidden" name="r_type" id="r_type" >
                         <label></label>
                         <b>BW Utilization</b> &nbsp; <input type="radio" name="tm" id="tm1" onclick="report_v(this.value);" value="1"> &nbsp;&nbsp;
                       <b> Latency </b>&nbsp; <input type="radio" name="tm" id="tm2" onclick="report_v(this.value);" value="2"> 
                    </div>
                    <div class="col-lg-3">
                       &nbsp;<br>
                        <button type="submit" class="btn btn-default" value="save">Search</button>
                    </div> 
                </div>    
                
            </form>  
            <br><br>
            
<?php  if ($bw_result == 'No record found !') { 
    
//    echo 'No record found !';
    
}else{
    if ($bw_result != null) { 
    ?>           
             <h2>Bandwidth Utilization Report</h2>
            <div class="table-responsive" id="bwu_tbl">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Type</th>
                            <th>Zone / Upstream </th>
                            <th>In (mbps)</th>
                            <th>Out (mbps)</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                       
                            $total = 0;
                            $Link3 = 0;
                            $t_down = 0;
                            $t_up = 0;
                            foreach ($bw_result as $value) {
                                ?>  
                                <tr> 
   
                                    <td>
                                        <?php
                                        $date=$value['date'];
                                        $new_date= date("d-m-Y", strtotime($date));
                                        echo $new_date;
                                        ?>
                                    </td>
                                    <td><?php echo $value['time']; ?></td>
                                    <td><?php echo $type=$value['type']; ?></td>
                                    <td><?php echo $value['sub_type']; ?></td>
                                  
<!--                                    ..............Down=In................
                                    ..............Up=Out.................-->
                                    <td>
                                        <?php
                                        echo $down=$value['down']; 
                                        $t_down=$t_down + $down;
                                        $down_g=$t_down / 1000;
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $up=$value['up'];
                                        $t_up=$t_up + $up;
                                        $up_g=$t_up / 1000;
                                        ?>
                                    </td>

                                </tr>                    
                            <?php } ?>
                        <div class="row">
<div class="col-lg-2"> </div>
                            <div class="col-lg-8">       
    <?php
                            echo '<h4> <b>' . $type . '</b>&nbsp;&nbsp;&nbsp;';
                            echo '<b>Total IN (Gbps): </b>' . $down_g . '&nbsp;&nbsp; and &nbsp;&nbsp;';
                            echo '<b>Total OUT (Gbps ): </b>' . $up_g .'</h4>';
    ?>

                            </div> 
                            <div class="col-lg-2">
                                <button type="button"  class="btn btn-success"  onclick="location.href = '<?php echo base_url(); ?>index.php/nmc_c/export_nmc_session_report/'">Export Excel</button> &nbsp;<br><br>    
                            </div>                       
                        </div><br>

<?php } ?>




                    </tbody>
                </table>
                <div class="col-lg-5"></div>
                <div class="col-lg-5">
<?php // echo $links;  ?>
                </div>
            </div>
 <?php } ?>          
  <!--..............................................................................................................-->
  
  <?php if ($latancy_result == 'No record found !') {
      
//         echo 'No record found !';
         
  } else {
      if ($latancy_result != null) {
  
      ?>
  <h2>Latency Report</h2>
  <div class="table-responsive" id="latancy_tbl">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>4.2.2.1</th>
                            <th>yahoo.com.sg </th>
                            <th>google.com.sg </th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                            $total = 0;
                            $Link3 = 0;

                            foreach ($latancy_result as $value) {
                                ?>  
                                <tr> 
   
                                    <td>
                                        <?php 
                                        $date_l=$value['date'];
                                        $new_date_l= date("d-m-Y", strtotime($date_l));
                                        echo $new_date_l; 
                                        ?>
                                    </td>
                                    <td><?php echo $value['time']; ?></td>
                                    <td><?php echo $value['ip_4221_l'].'( PL-'. $value['ip_4221_pl'] .'% )'; ?></td>
                                    <td><?php echo $value['yahoo_l'].'( PL-'. $value['yahoo_pl'] .'% )'; ?></td>
                                    <td><?php echo $value['google_l'].'( PL-'. $value['google_pl'] .'% )'; ?></td>


                                </tr>                    
                            <?php } } ?>
                        <div class="row">

                            <div class="col-lg-10">       
    <?php
//    echo '<b>Total Incident Number : </b>'.$total.'<br>';
//    echo '<b>Link3 : </b>'.$Link3.'&nbsp;&nbsp;&nbsp;&nbsp;';
//    echo '<b>GP : </b>'.$GP.'&nbsp;&nbsp;&nbsp;&nbsp;';
//    echo '<b>BL : </b>'.$BL.'&nbsp;&nbsp;&nbsp;&nbsp;';
//    echo '<b>SCL : </b>'.$SCL.'&nbsp;&nbsp;&nbsp;&nbsp;';
//    echo '<b>F@H : </b>'.$FH.'&nbsp;&nbsp;&nbsp;&nbsp;<br>';
    ?>

                            </div> 
                            <div class="col-lg-2">
                                <button type="button"  class="btn btn-success"  onclick="location.href = '<?php echo base_url(); ?>index.php/nmc_c/export_Latency_report/'">Export Excel</button> &nbsp;<br><br>    
                            </div>                       
                        </div>






                    </tbody>
                </table>
                <div class="col-lg-5"></div>
                <div class="col-lg-5">
<?php // echo $links;  ?>
                </div>
            </div>
<?php } ?>            
            
            
            
        </div>
    </div>
</div>

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
    function report_v(report_value){
   
    document.getElementById("r_type").value=report_value; 
    
    bwu_tbl.style.display = "block";
    latancy_tbl.style.display = "none";
    
    if(report_value==='2'){
     latancy_tbl.style.display = "block";
     bwu_tbl.style.display = "none";  
       
    }else{
     bwu_tbl.style.display = "block";
     latancy_tbl.style.display = "none"; 
   } 
       
    }
</script>

<script type="text/javascript">

function pick_zone_or_cybergate(){
    
    var bw_type = $('#bw_type').val();
    
//    document.getElementById("bw_type1").innerHTML = null;
//    document.getElementById("bw_type2").innerHTML = null;
//    
//   if(bw_type == 'Link3'){
////       alert('TEST');
//       document.getElementById("bw_type1").innerHTML = '(mbps)';
//       document.getElementById("bw_type2").innerHTML = '(mbps)';
//   }else if(bw_type == 'Cybergate'){
//       document.getElementById("bw_type1").innerHTML = '(gbps)';
//       document.getElementById("bw_type2").innerHTML = '(gbps)';
//   }
   

        $.post('<?php echo base_url(); ?>index.php/nmc_c/pick_nmc_bwu_category_name', {
            bw_type: bw_type
            
        }, function (OLT_data) {
                
                    var OLT_array = JSON.stringify(OLT_data);
                    var new_OLT_Array = JSON.parse(OLT_array);
                    
//                    alert("OLT NAME ...."+new_OLT_Array[1]["OLT_Name"]);
                    var select_OLT = 0;
                    document.getElementById("sub_type").innerHTML = null;
                    document.getElementById("sub_type").value = null;
                    for (var i in new_OLT_Array) {
                        //    alert("splite...."+newArr[i]["OLT_Name"]);
                        if (select_OLT == 0) {
                            select = document.getElementById("sub_type");
                            var opt = document.createElement('option');
                            opt.value = "0";
                            opt.innerHTML = "ALL";
                            select.appendChild(opt);

                            var select_OLT = 1;
                       }
                       select = document.getElementById("sub_type");
                       var opt = document.createElement('option');
                       opt.value = new_OLT_Array[i]["Name"];
                       opt.innerHTML = new_OLT_Array[i]["Name"];
                       select.appendChild(opt); 
                    }        
        }, 'JSON');
           

}

</script>
