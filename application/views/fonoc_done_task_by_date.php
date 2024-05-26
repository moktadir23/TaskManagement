
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
               FONOC Report By Date Range
            </h3>
        </div> 
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="<?php echo base_url('index.php/link3_controller/fonoc_done_by_date_range/'); ?>" name="select_by_id_form" id="select_by_id_form" method="POST">
                <div class='row'> 
                     <div class="col-lg-3"> 
                        
                            <label> Zone <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="Zone" id="Zone">
                                <option value="0" >All Zone</option>
                            </select>
                        </div>
                    <div class="col-lg-3">
                        <label>From Date</label>
                        <input type="" name="date_from" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="start_date_id" class="form-control" placeholder="Enter from Date" required=""/>
                    </div>
                    <div class="col-lg-3">
                        <label>To Date</label>
                        <input type="" name="date_to" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="end_date_id" class="form-control" placeholder="Enter To Date" required=""/>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <br><button type="submit" class="btn btn-default" value="save">Search</button>
                        </div>
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
$RETAIL_instllation = 0;
$retail_c_instllation = 0;
$retail_h_instllation = 0;
$retail_soho_instllation = 0;
$SECURITIES_CSE_instllation = 0;
$SECURITIES_DSE_instllation = 0;
$STRATEGIC_INITIATIVE_instllation = 0;

//echo '<pre>';
//print_r($installation_result);

if ($installation_result != null) {


    foreach ($installation_result as $int_value) {
        $BANK_instllation = $BANK_instllation + $int_value['BANK'];
        $CORPORATE_instllation = $CORPORATE_instllation + $int_value['CORPORATE'];
        $COMPLEMENTARY_instllation = $COMPLEMENTARY_instllation + $int_value['COMPLEMENTARY'];
        $nbfi_instllation = $nbfi_instllation + $int_value['NBFI'];
        $RETAIL_instllation = $RETAIL_instllation + $int_value['RETAIL'];
        $retail_c_instllation = $retail_c_instllation + $int_value['RETAIL_CORPORATION'];
        $retail_h_instllation = $retail_h_instllation + $int_value['RETAIL_HOME'];
        $retail_soho_instllation = $retail_soho_instllation + $int_value['RETAIL_SOHO'];
        $SECURITIES_CSE_instllation = $SECURITIES_CSE_instllation + $int_value['SECURITIES_CSE'];
        $SECURITIES_DSE_instllation = $SECURITIES_DSE_instllation + $int_value['SECURITIES_DSE'];
        $STRATEGIC_INITIATIVE_instllation = $STRATEGIC_INITIATIVE_instllation + $int_value['STRATEGIC_INITIATIVE'];
        
       
    }

    $int_total = $SECURITIES_CSE_instllation+$SECURITIES_DSE_instllation+$STRATEGIC_INITIATIVE_instllation+$BANK_instllation + $CORPORATE_instllation + $nbfi_instllation + $COMPLEMENTARY_instllation + $retail_soho_instllation + $RETAIL_instllation + $retail_c_instllation + $retail_h_instllation;
if( $int_total > 0){
    $avg_BANK = ($BANK_instllation / $int_total) * 100;
    $avg_CORPORATE = ($CORPORATE_instllation / $int_total) * 100;
    $avg_COMPLEMENTARY = ($COMPLEMENTARY_instllation / $int_total) * 100;
    $avg_RETAIL = ($RETAIL_instllation / $int_total) * 100;
    $avg_nbfi = ($nbfi_instllation / $int_total) * 100;
    $avg_retail_c = ($retail_c_instllation / $int_total) * 100;
    $avg_retail_h = ($retail_h_instllation / $int_total) * 100;
    $avg_retail_soho = ($retail_soho_instllation / $int_total) * 100;
    $avg_SECURITIES_CSE = ($SECURITIES_CSE_instllation / $int_total) * 100;
    $avg_SECURITIES_DSE = ($SECURITIES_DSE_instllation / $int_total) * 100;
    $avg_STRATEGIC_INITIATIVE = ($STRATEGIC_INITIATIVE_instllation / $int_total) * 100;
    
    $dataPoints = array(
        array("label" => "BANK", "y" => $avg_BANK),
        array("label" => "CORPORATE", "y" => $avg_CORPORATE),
        array("label" => "COMPLEMENTARY", "y" => $avg_COMPLEMENTARY),
        array("label" => "RETAIL", "y" => $avg_RETAIL),
        array("label" => "NBFI", "y" => $avg_nbfi),
        array("label" => "RETAIL CORPORATION", "y" => $avg_retail_c),
        array("label" => "RETAIL HOME", "y" => $avg_retail_h),
        array("label" => "RETAIL SOHO", "y" => $avg_retail_soho),
        array("label" => "SECURITIES CSE", "y" => $SECURITIES_CSE_instllation),
        array("label" => "SECURITIES DSE", "y" => $SECURITIES_DSE_instllation),
        array("label" => "STRATEGIC INITIATIVE", "y" => $avg_STRATEGIC_INITIATIVE)
    );
}    
}

?>            
 
<input type="hidden" name="all_installation" id="all_installation"  value="<?php echo $int_total; ?>"/>
<input type="hidden" name="bank_installation" id="bank_installation"  value="<?php echo $BANK_instllation; ?>"/>
<input type="hidden" name="nbfi_installation" id="nbfi_installation"  value="<?php echo $nbfi_instllation; ?>"/>
<input type="hidden" name="corporate_installation" id="corporate_installation"  value="<?php echo $CORPORATE_instllation; ?>"/>
<input type="hidden" name="complementery_installation" id="complementery_installation"  value="<?php echo $COMPLEMENTARY_instllation; ?>"/>
<input type="hidden" name="RETAIL_installation" id="RETAIL_installation"  value="<?php echo $RETAIL_instllation; ?>"/>
<input type="hidden" name="retail_c_installation" id="retail_c_installation"  value="<?php echo $retail_c_instllation; ?>"/>
<input type="hidden" name="retail_h_installation" id="retail_h_installation"  value="<?php echo $retail_h_instllation; ?>"/>
<input type="hidden" name="retail_soho_installation" id="retail_soho_installation"  value="<?php echo $retail_soho_instllation; ?>"/>
<input type="hidden" name="SECURITIES_CSE" id="SECURITIES_CSE"  value="<?php echo $SECURITIES_CSE_instllation; ?>"/>
<input type="hidden" name="SECURITIES_DSE" id="SECURITIES_DSE"  value="<?php echo $SECURITIES_DSE_instllation; ?>"/>
<input type="hidden" name="STRATEGIC_INITIATIVE" id="STRATEGIC_INITIATIVE"  value="<?php echo $STRATEGIC_INITIATIVE_instllation; ?>"/>
            
<?php
                    $total_troubleshoot = 0;
                    if ($troubleshoot_result != null) {

$Accessnet=0;
$Accessnet_CR=0;
$Accessnet_SR=0;
$Accessnet_Troubleshoot=0;
$CR=0;
$Device_Migration=0;
$Faulty_ONU_Check=0;
$Link_Redundancy=0;
$Lock_or_Unlock=0;
$MAC_change=0;
$IP_Change=0;
$IPTV_Troubleshoot=0;
$Migration=0;
$MIS_TKI=0;
$MRTG=0;
$Others=0;
$Package_Active=0;
$Planing=0;
$OLT_Troubleshoot=0;
$Package_Upgrade=0;
$Reactive=0;
$Rechecked=0;
$Released_Device_Collectation_List=0;
$Reporting_Work=0;
$Retail_TKI=0;
$Routing_Switching=0;
$Shifting=0;
$SR=0;
$Status_check=0;
$Troubleshoot=0;
                        foreach ($troubleshoot_result as $t_value) {
                            $Accessnet = $Accessnet + $t_value['Accessnet'];
                            $Accessnet_CR = $Accessnet_CR + $t_value['Accessnet_CR'];
                            $Accessnet_SR = $Accessnet_SR + $t_value['Accessnet_SR'];
                            $Accessnet_Troubleshoot = $Accessnet_Troubleshoot + $t_value['Accessnet_Troubleshoot'];
                            $CR = $CR + $t_value['CR'];
                            $Device_Migration = $Device_Migration + $t_value['Device_Migration'];
                            $Faulty_ONU_Check = $Faulty_ONU_Check + $t_value['Faulty_ONU_Check'];
                            $Link_Redundancy = $Link_Redundancy + $t_value['Link_Redundancy'];
                            $Lock_or_Unlock = $Lock_or_Unlock + $t_value['Lock_or_Unlock'];
                            $MAC_change = $MAC_change + $t_value['MAC_change'];
                            $IP_Change = $IP_Change + $t_value['IP_Change'];
                            $IPTV_Troubleshoot = $IPTV_Troubleshoot + $t_value['IPTV_Troubleshoot'];
                            $Migration = $Migration + $t_value['Migration'];
                            $MIS_TKI = $MIS_TKI + $t_value['MIS_TKI'];
                            $MRTG = $MRTG + $t_value['MRTG'];
                            $Others = $Others + $t_value['Others'];
                            $Package_Active = $Package_Active + $t_value['Package_Active'];
                            $Planing = $Planing + $t_value['Planing'];
                            $OLT_Troubleshoot = $OLT_Troubleshoot + $t_value['OLT_Troubleshoot'];
                            $Package_Upgrade = $Package_Upgrade + $t_value['Package_Upgrade'];
                            $Reactive = $Reactive + $t_value['Reactive'];
                            $Rechecked = $Rechecked + $t_value['Rechecked'];
                            $Released_Device_Collectation_List = $Released_Device_Collectation_List + $t_value['Released_Device_Collectation_List'];
                            $Reporting_Work = $Reporting_Work + $t_value['Reporting_Work'];
                            $Retail_TKI = $Retail_TKI + $t_value['Retail_TKI'];
                            $Routing_Switching = $Routing_Switching + $t_value['Routing_Switching'];
                            $Shifting = $Shifting + $t_value['Shifting'];
                            $SR = $Rechecked + $t_value['SR'];
                            $Status_check = $Status_check + $t_value['Status_check'];
                            $Troubleshoot = $Troubleshoot + $t_value['Troubleshoot'];
                        }
                        $total_troubleshoot = $Accessnet+$Accessnet_CR+$Accessnet_SR+$Accessnet_Troubleshoot;
                        
                       $bardataPoints = array(
                        array("y" => $Accessnet, "label" => "Accessnet"),
                        array("y" => $Accessnet_CR, "label" => "Accessnet_CR"),
                        array("y" => $Accessnet_SR, "label" => "Accessnet_SR"),    
                        array("y" => $Accessnet_Troubleshoot, "label" => "Accessnet_Troubleshoot"),
                        array("y" => $CR, "label" => "CR"),
                        array("y" => $Device_Migration, "label" => "Device_Migration"),
                        array("y" => $Faulty_ONU_Check, "label" => "Faulty_ONU_Check"),    
                        array("y" => $Link_Redundancy, "label" => "Link_Redundancy"),
                        array("y" => $Lock_or_Unlock, "label" => "Lock_or_Unlock"),
                        array("y" => $MAC_change, "label" => "MAC change"),
                        array("y" => $IP_Change, "label" => "IP_Change"),
                        array("y" => $IPTV_Troubleshoot, "label" => "IPTV_Troubleshoot"),
                        array("y" => $Migration, "label" => "Migration"),
                        array("y" => $MIS_TKI, "label" => "MIS_TKI"),
                        array("y" => $MRTG, "label" => "MRTG"),   
                        array("y" => $Others, "label" => "Others"),
                        array("y" => $Package_Active, "label" => "Package_Active"),
                        array("y" => $Planing, "label" => "Planing"),
                        array("y" => $OLT_Troubleshoot, "label" => "OLT_Troubleshoot"),
                        array("y" => $Package_Upgrade, "label" => "Package_Upgrade"),
                        array("y" => $Reactive, "label" => "Reactive"),
                        array("y" => $Rechecked, "label" => "Rechecked"),
                        array("y" => $Released_Device_Collectation_List, "label" => "Released_Device_Collectation_List"),
                        array("y" => $Reporting_Work, "label" => "Reporting_Work"),
                        array("y" => $Retail_TKI, "label" => "Retail_TKI"),
                        array("y" => $Routing_Switching, "label" => "Routing_Switching"),
                        array("y" => $Shifting, "label" => "Shifting"),
                        array("y" => $SR, "label" => "SR"),
                        array("y" => $Status_check, "label" => "Status_check"),
                        array("y" => $Troubleshoot, "label" => "Troubleshoot"),
                        );
                    }
                   
                    ?> 


<div class="row">    
<div class="col-lg-12">
<?php 
    $zone=$_SESSION["fonoc_zone"];
    if($zone=='0'){ $zone='All'; }else{ $zone=$zone; }
    $from=$_SESSION["fonoc_d_date1"];
    $from = date("d-m-Y", strtotime($from));
    $to=$_SESSION["fonoc_d_date2"];    
    $to = date("d-m-Y", strtotime($to));
    if($from!='01-01-1970'){
    echo '<h2> ZONE : '.$zone .'  FROM : '.$from.' TO : '.$to.'</h2>';
}

?>
<div id="pie_chartContainer" style="height: 370px; width: 100%;"></div>
</div> 
</div>

<div class="row">          
<div class="col-lg-12">
    <input type="hidden" name="total_troubleshoot" id="total_troubleshoot"  value="<?php echo $total_troubleshoot; ?>"/>
    <div id="bar_chartContainer" style="height: 370px; width: 100%;"></div><br>
</div>
</div>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        
                        <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Task Type</th>
                            <th>Number</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
//    echo '<pre>';
//    print_r($done_task_summery);
$total_task=0;
if($done_task_summery != null){
    
foreach ($done_task_summery as $n_value) {
    ?>  
        <tr> 
                <td><?php echo $n_value['Problem_Catagory']; ?></td>
                <td><?php echo $task_number=$n_value['task_number']; ?></td>                      
        </tr>                           
<?php 
$total_task=$total_task+$task_number;
}
//echo '<h2>Total Task :'.$total_task.'</h2>';

} ?>            
                    </tbody>
<div class="row">
<div class="col-lg-4"> <?php echo "<b>Total Task : </b>".$total_task.'<br>';?></div>
<div class="col-lg-6">       
</div> 
<div class="col-lg-2">
    <button type="button"  class="btn btn-success"  onclick="location.href = '<?php echo base_url(); ?>index.php/link3_controller/export_fonoc_report/'">Export Excel</button> &nbsp;<br><br>    
</div>                       
</div>                    
                </table>
                        
                        
                        
                        
                        
     <!--<h2>Details Task </h2>-->                       
                        
                        <!--<table class="table table-bordered table-hover">-->
<!--                            <thead>
                                <tr>                                     
                                        <th>ID (Name)</th>                                      
                                        <th>BTS Name</th>
                                        <th>OLT Name</th>
                                        <th>ONU Model</th>
                                        <th>Client ID</th>
                                        <th>Client Category </th>
                                        <th>Problem Category </th>
                                        <th>Assign By</th>                                        
                                        <th>Start Date</th>                                                                                                               
                                        <th>Status</th>
                                      
                                </tr>
                            </thead>-->
<!--                            <tbody>

                                <?php
//  echo '<pre>';
//  print_r($result_display);  
// $Total=0; 
// $Installation=0;
// $Troubleshoot=0;
// $MIS_TKI=0;
// $MQ_TKI=0;
// $CR=0;
// $SR=0;
// $MAC_change=0;
// $Status_check=0;
// $Shifting=0;
// $Lock_or_Unlock=0;
// 
//  if($result_display != null){
//                                foreach ($result_display as $value) {
                                    ?>   
                                    <tr>
                                        <td><?php echo $value->employee_id; ?> (<?php echo $value->employee_name; ?>)</td>
                                        <td><?php echo $value->BTS_Name; ?></td>
                                        <td><?php echo $value->OLT_Name; ?></td>
                                        <td><?php echo $value->ONU_Model; ?></td>
                                        <td><?php echo $value->Client_ID; ?></td>
                                        <td><?php echo $value->Client_Category; ?></td>
                                        
                                        <?php
//                                        $Total++;
//                                        $Catagory=$value->Problem_Catagory;
//                                        if($Catagory == 'Troubleshoot'){
//                                         $Troubleshoot++;
//                                        }elseif ($Catagory=='Installation') {
//                                           $Installation++;         
//                                        }elseif ($Catagory=='MIS TKI') {
//                                          $MIS_TKI++;          
//                                        }elseif ($Catagory=='MQ TKI') {
//                                          $MQ_TKI++;             
//                                        }elseif ($Catagory=='CR') {
//                                          $CR++;          
//                                        }elseif ($Catagory=='SR') {
//                                         $SR;           
//                                        }elseif ($Catagory=='MAC change') {
//                                         $MAC_change++;          
//                                        }elseif ($Catagory=='Status check') {
//                                           $Status_check++;         
//                                        }elseif ($Catagory=='Shifting') {
//                                          $Shifting++;          
//                                        }elseif ($Catagory=='Lock_or_Unlock') {
//                                          $Lock_or_Unlock++;          
//                                        }
                                        
                                        ?>
                                        <td><?php echo $value->Problem_Catagory; ?></td>
                                        <td></td>
                                        <td><?php echo $value->start_date; ?></td>
                                        <td><?php echo $value->status; ?></td>
                                        
                                    </tr>                             

  <?php
//  }  
//  echo "<b>Total : </b>".$Total.'<br>';
//} ?>                                 

                            </tbody>                           -->
                        <!--</table>-->
                    </div>    
                </div>
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
<script>
window.onload = function () {

//..................................... PIE Chart .........................................................
 var all_installation=document.getElementById("all_installation").value;
 
 var bank_installation=document.getElementById("bank_installation").value;
 var nbfi_installation=document.getElementById("nbfi_installation").value;
 var corporate_installation=document.getElementById("corporate_installation").value;
 var complementery_installation=document.getElementById("complementery_installation").value;
 var RETAIL_installation=document.getElementById("RETAIL_installation").value;
 var retail_c_installation=document.getElementById("retail_c_installation").value;
 var retail_h_installation=document.getElementById("retail_h_installation").value;
 var retail_soho_installation=document.getElementById("retail_soho_installation").value;
 var SECURITIES_DSE=document.getElementById("SECURITIES_DSE").value;
 var SECURITIES_CSE=document.getElementById("SECURITIES_CSE").value;
 var STRATEGIC_INITIATIVE=document.getElementById("STRATEGIC_INITIATIVE").value;
 
 
var pie_chart = new CanvasJS.Chart("pie_chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
        title: {
		text: "Total Installation : "+all_installation
	},
	subtitles: [{
		text: "BANK : " + bank_installation  + "    NBFI : " + nbfi_installation + "   CORPORATE : " + corporate_installation +  "   COMPLEMENTERY : " + complementery_installation + "   RETAIL : " + RETAIL_installation + "   Retail Corporate : " + retail_c_installation + "   Retail Home : " + retail_h_installation + "   Retail SOHO : " + retail_soho_installation+ " SECURITIES DSE : " + SECURITIES_DSE + " SECURITIES CSE : " + SECURITIES_CSE + " STRATEGIC INITIATIVE : " + STRATEGIC_INITIATIVE  
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

//...............................BAR CHAT.......................................................................
var total_troubleshoot=document.getElementById("total_troubleshoot").value;

var bar_chart = new CanvasJS.Chart("bar_chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: " Troubleshoot  " 
	},
	data: [{
		type: "bar", //change type to bar, line, area, pie, etc, column
		indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
		dataPoints: <?php echo json_encode($bardataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
bar_chart.render();

}
</script>
