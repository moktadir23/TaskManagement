<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script> 
<?
session_start();
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              Wireless Report
            </h3>
            <ol class="breadcrumb">
                <!--<div class="col-lg-4"></div>-->
                <h3 class="text-center"><span id="info_span"></span></h3>
             
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <?php
   
        $from_date = $this->session->userdata('from_date');
        $to_date = $this->session->userdata('to_date');
        if (isset($from_date)) {
//            echo '.......'.$from_date;
//            echo '.......'.$to_date;
        }
        ?>
        <div class="col-lg-12">
 <form action="<?php echo base_url('index.php/welcome/wi_report/'); ?>" name="search_by_zone" id="search_by_zone" method="POST"> 
     <input type="hidden" class="form-control" name="s_zone" id="s_zone" value="<?php echo $zone = $this->session->userdata('Zone'); ?>">
     <input type="hidden" class="form-control" name="s_support_ofc" id="s_support_ofc" value="<?php echo $support_ofc = $this->session->userdata('s_ofc'); ?>">
     <input type="hidden" class="form-control" name="user_type" id="user_type" value="<?php echo $user_type = $this->session->userdata('u_type'); ?>">
<div class="row">
    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label> Zone <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="Zone" id="Zone" onchange="chk_zone();">
                                <option value="0" >All Zone</option>
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
        <div class="col-lg-3"><br>
             <button type="submit" class="btn btn-default" value="save">Search</button>
        </div>
    
</div> 
       
</form>  
            
            
            
            
            <br>
            
<?php
$int_total=0;

$BANK_instllation = 0;
$CORPORATE_instllation = 0;
$nbfi_instllation = 0;
$COMPLEMENTARY_instllation = 0;
$mq_instllation = 0;
$retail_c_instllation = 0;
$retail_h_instllation = 0;
$link3_own_installation = 0;
$Link3_Own_ins=0;

//echo '<pre>';
//print_r($installation_result);

if ($installation_result != null) {


    foreach ($installation_result as $int_value) {
        $BANK_instllation = $BANK_instllation + $int_value['BANK'];
        $CORPORATE_instllation = $CORPORATE_instllation + $int_value['CORPORATE'];
        $COMPLEMENTARY_instllation = $COMPLEMENTARY_instllation + $int_value['COMPLEMENTARY'];
        $nbfi_instllation = $nbfi_instllation + $int_value['NBFI'];
        $mq_instllation = $mq_instllation + $int_value['MQ'];
        $retail_c_instllation = $retail_c_instllation + $int_value['RETAIL_CORPORATION'];
        $retail_h_instllation = $retail_h_instllation + $int_value['RETAIL_HOME'];
        $int_value['Link3_Own']=$Link3_Own_ins;
        if($int_value['Link3_Own']!=null){
            $link3_own_installation=$link3_own_installation+$int_value['Link3_Own'];
        }
        
       
    }

    $int_total = $BANK_instllation + $CORPORATE_instllation + $nbfi_instllation + $COMPLEMENTARY_instllation + $mq_instllation + $retail_c_instllation + $retail_h_instllation + $link3_own_installation;

    $avg_BANK = ($BANK_instllation / $int_total) * 100;
    $avg_CORPORATE = ($CORPORATE_instllation / $int_total) * 100;
    $avg_COMPLEMENTARY = ($COMPLEMENTARY_instllation / $int_total) * 100;
    $avg_mq = ($mq_instllation / $int_total) * 100;
    $avg_nbfi = ($nbfi_instllation / $int_total) * 100;
    $avg_retail_c = ($retail_c_instllation / $int_total) * 100;
    $avg_retail_h = ($retail_h_instllation / $int_total) * 100;

    $dataPoints = array(
        array("label" => "BANK", "y" => $avg_BANK),
        array("label" => "CORPORATE", "y" => $avg_CORPORATE),
        array("label" => "COMPLEMENTARY", "y" => $avg_COMPLEMENTARY),
        array("label" => "MQ", "y" => $avg_mq),
        array("label" => "NBFI", "y" => $avg_nbfi),
        array("label" => "RETAIL CORPORATION", "y" => $avg_retail_c),
        array("label" => "RETAIL HOME", "y" => $avg_retail_h)
    );
    
}

?>

<?php
 
//$dataPoints = array(
//	array("label"=> "Food + Drinks", "y"=> 590),
//	array("label"=> "Activities and Entertainments", "y"=> 261),
//	array("label"=> "Health and Fitness", "y"=> 158),
//	array("label"=> "Shopping & Misc", "y"=> 72),
//	array("label"=> "Transportation", "y"=> 191),
//	array("label"=> "Rent", "y"=> 573),
//	array("label"=> "Travel Insurance", "y"=> 126)
//);
	
?>

                            
                  
                <input type="hidden" name="all_installation" id="all_installation"  value="<?php echo $int_total; ?>"/>
                <input type="hidden" name="bank_installation" id="bank_installation"  value="<?php echo $BANK_instllation; ?>"/>
                <input type="hidden" name="nbfi_installation" id="nbfi_installation"  value="<?php echo $nbfi_instllation; ?>"/>
                <input type="hidden" name="corporate_installation" id="corporate_installation"  value="<?php echo $CORPORATE_instllation; ?>"/>
                <input type="hidden" name="complementery_installation" id="complementery_installation"  value="<?php echo $COMPLEMENTARY_instllation; ?>"/>
                <input type="hidden" name="mq_installation" id="mq_installation"  value="<?php echo $mq_instllation; ?>"/>
                <input type="hidden" name="retail_c_installation" id="retail_c_installation"  value="<?php echo $retail_c_instllation; ?>"/>
                <input type="hidden" name="retail_h_installation" id="retail_h_installation"  value="<?php echo $retail_h_instllation; ?>"/>
                <input type="hidden" name="link3_own_installation" id="link3_own_installation"  value="<?php echo $link3_own_installation; ?>"/>
               
            <div class="row">    
<!--                <div class="col-lg-6">
                        <div id="pie_chartContainer" style="height: 370px; width: 100%;"></div>
                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                </div>-->
                <div class="col-lg-12">
                        <div id="pie_chartContainer" style="height: 370px; width: 100%;"></div>
               
                </div> 
            </div>
            
            
            <div class="table-responsive">
                
               
<?php
//$totaltime = '';
//$times=0;
//foreach ($cs_troubleshoot_time as $value_time) {
//   $time=$value_time['time_Diff'];  
//   $timestamp = strtotime($time);
//   $totaltime += $timestamp;
////  echo '<br>';
// $times++; 
//}
//
//$average_time = ($totaltime/$times);
//
//echo ' <b>Average Troubleshoot Time  </b>: '.date('H:i:s',$average_time);
//

?>                
                             
            </div>
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


<!--.....................................Pie Chart............................................................-->
<!--
<script>
window.onload = function() {
 var all_installation=document.getElementById("all_installation").value;
 
 var bank_installation=document.getElementById("bank_installation").value;
 var nbfi_installation=document.getElementById("nbfi_installation").value;
 var corporate_installation=document.getElementById("corporate_installation").value;
 var complementery_installation=document.getElementById("complementery_installation").value;
 var mq_installation=document.getElementById("mq_installation").value;
 var retail_c_installation=document.getElementById("retail_c_installation").value;
 var retail_h_installation=document.getElementById("retail_h_installation").value;
 
 var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
        exportEnabled: true,
	title: {
		text: "Total Installation : "+all_installation
	},
	subtitles: [{
		text: "BANK : " + bank_installation  + "    NBFI : " + nbfi_installation + "   CORPORATE : " + corporate_installation +  "   COMPLEMENTERY : " + complementery_installation + "   MQ : " + mq_installation + " \n\ \n\
                     Retail Corporate : " + retail_c_installation + "   Retail Home : " + retail_h_installation
	}],
	data: [{
		type: "pie",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php // echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
<!--............................Bar Chart................................................-->




<script>
window.onload = function () {

//..................................... PIE Chart .........................................................
 var all_installation=document.getElementById("all_installation").value;
 
 var bank_installation=document.getElementById("bank_installation").value;
 var nbfi_installation=document.getElementById("nbfi_installation").value;
 var corporate_installation=document.getElementById("corporate_installation").value;
 var complementery_installation=document.getElementById("complementery_installation").value;
 var mq_installation=document.getElementById("mq_installation").value;
 var retail_c_installation=document.getElementById("retail_c_installation").value;
 var retail_h_installation=document.getElementById("retail_h_installation").value;
 var link3_own_installation=document.getElementById("link3_own_installation").value;
 
 
var pie_chart = new CanvasJS.Chart("pie_chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
        title: {
		text: "Total Installation : "+all_installation
	},
	subtitles: [{
		text: "BANK : " + bank_installation  + "    NBFI : " + nbfi_installation + "   CORPORATE : " + corporate_installation +  "   COMPLEMENTERY : " + complementery_installation + "   MQ : " + mq_installation + "   Retail Corporate : " + retail_c_installation + "   Retail Home : " + retail_h_installation + "   Link3 Own : " + link3_own_installation
	}],
	data: [{
		type: "pie", //change type to bar, line, area, pie, etc, column
//		indexLabel: "{y}", //Shows y value on all Data Points
//		indexLabelFontColor: "#5A5757",
//		indexLabelPlacement: "outside",   
		yValueFormatString: "#,##0.00\"%\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});


pie_chart.render();

}
</script>

<script>
//window.onload = function () {
// 
//var chart = new CanvasJS.Chart("chartContainer", {
//	animationEnabled: true,
//	exportEnabled: true,
//	title:{
//		text: "Average Expense Per Day  in Thai Baht"
//	},
//	subtitles: [{
//		text: "Currency Used: Thai Baht (?)"
//	}],
//	data: [{
//		type: "pie",
//		showInLegend: "true",
//		legendText: "{label}",
//		indexLabelFontSize: 16,
//		indexLabel: "{label} - #percent%",
//		yValueFormatString: "?#,##0",
//		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
//	}]
//});
//chart.render();
// 
//}
</script>
   