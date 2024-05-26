
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<!--<script>
    var submit_or_not = 0;
</script>-->

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
                Problem Category Report
            </h3>
        </div>
    </div>
    <!-- /.row -->
    <div class="row"> 
        <div class="col-lg-12">
            <form action="<?php echo base_url('index.php/hd_controller/Problem_Category_Report/'); ?>" name="Drop_call" id="Drop_call" method="POST">
                
                <div class="row">
<!--                    <div class="col-lg-3">
                        <label>Zone</label>
                            <select class="form-control" name="Zone" id="Zone"  required="">
                                 <option value="">Select Zone</option>
                                 <option value="">CTG</option>
                                 <option value=""></option>
                            </select>    
                    </div>-->
                    
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
                       &nbsp;
                        <button type="submit" class="btn btn-default" value="save">Search</button>
                    </div> 
                </div>
            </form>  
            <br>
            
            
            <div class="table-responsive">
                <h2>Summery of Problem</h2>
  <!--........................................................................................................................-->              
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <!--<th>entry_date</th>-->
                            <th>Status</th>
                            <th>Total Nuber</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
//      echo '<pre>';
//      print_r($drop_call_list);
//$total=0;
$total_number=0;

if($problem_group != null){
foreach ($problem_group as $G_value) {
    $status=$G_value["status"];
    $number=$G_value["number"];
    ?>  
    
<?php
if($status=='BILISU' || $status=='BrowPr' || $status=='BsyWtn' || $status=='BTS' || $status=='BWPrb' || $status=='BWUFUL' || $status=='CabRea' ||
   $status=='CineHb' || $status=='DevFal' || $status=='DlayAc' || $status=='DwnGrd' || $status=='E1Prb' || $status=='ERI' || $status=='FibCut' 
  || $status=='GamePr' || $status=='INBND' || $status=='InfoQu' || $status=='IPBlok' || $status=='IPC' || $status=='IPChng'  || $status=='IPConf' 
  || $status=='IPDNS' || $status=='IPPhn' || $status=='LANPrb' || $status=='LANPrb' || $status=='LnkDwn' || $status=='LnkTes' || $status=='LoseCn' || $status=='IPC' 
  || $status=='MailPr' || $status=='Maintn' || $status=='MQLog' || $status=='MRTG' || $status=='OLT' || $status=='Other' || $status=='PassCh' 
  || $status=='PatcPb' || $status=='PCLPrb'|| $status=='PhUnr'|| $status=='PktLos'|| $status=='PON'|| $status=='PQ'|| $status=='PwPrb'|| $status=='PwrPrb'
  || $status=='RoutPb'|| $status=='RtrCon'|| $status=='RtrPrb'|| $status=='Shift'|| $status=='SvrPrb'|| $status=='TemStp'|| $status=='Termnt'|| $status=='UndPrb'
  || $status=='UnsLnk'|| $status=='UPS'|| $status=='UTPPrb'|| $status=='WebPrb' || $status=='WiFi'){ 
?>
 
<?php
if($G_value["status"]=='INBND'){
    $full_m='';
}elseif ($G_value["status"]=='LnkDwn') {
     $full_m='Link Down';           
}elseif ($G_value["status"]=='BILISU') {
    $full_m='Billing Issue';          
}elseif ($G_value["status"]=='BWPrb') {
    $full_m='Bandwidth Problem';          
}elseif ($G_value["status"]=='Other') {
    $full_m='Other Problem';          
}elseif ($G_value["status"]=='DROP') {
    $full_m='';          
}elseif ($G_value["status"]=='QUEUE') {
    $full_m='';          
}elseif ($G_value["status"]=='Update') {
    $full_m='Client Update Status';          
}elseif ($G_value["status"]=='FCROTH') {
    $full_m='First call resulation others';          
}elseif ($G_value["status"]=='InfoQu') {
    $full_m='Informative Query';          
}elseif ($G_value["status"]=='PQ') {
    $full_m='Product Query';          
}elseif ($G_value["status"]=='PON') {
    $full_m='PON Down (Passive optical network)';          
}elseif ($G_value["status"]=='BTS') {
    $full_m='BTS (base transmission station) ';          
}elseif ($G_value["status"]=='NotRes') {
    $full_m='Not respond';          
}elseif ($G_value["status"]=='UPS') {
    $full_m='Upstream Issue';          
}elseif ($G_value["status"]=='FCRTS') {
    $full_m='First Call Resolution TroubleS ';          
}elseif ($G_value["status"]=='Shift') {
    $full_m='Shifting';          
}elseif ($G_value["status"]=='UnsLnk') {
    $full_m='Link Interruption or Unstable ';          
}elseif ($G_value["status"]=='TIMEOT') {
    $full_m='Time Out';          
}elseif ($G_value["status"]=='PlanCg') {
    $full_m='Plan Change';          
}elseif ($G_value["status"]=='RtrCon') {
    $full_m='Router Configure ';          
}elseif ($G_value["status"]=='INS') {
    $full_m='Installation ';          
}elseif ($G_value["status"]=='IpTv') {
    $full_m='IPTV Information';          
}elseif ($G_value["status"]=='WiFi') {
    $full_m='WIFI Related Issue';          
}elseif ($G_value["status"]=='AFTHRS') {
    $full_m='';          
}elseif ($G_value["status"]=='PassCh') {
    $full_m='Password change';          
}elseif ($G_value["status"]=='LoseCn') {
    $full_m='Lose Connection';          
}elseif ($G_value["status"]=='IPDNS') {
    $full_m='IP or DNS (Domain Name system) Information';          
}elseif ($G_value["status"]=='SOL') {
    $full_m='Problem Solved';          
}elseif ($G_value["status"]=='ReAct') {
    $full_m='Re-Active Issue';          
}elseif ($G_value["status"]=='WebPrb') {
    $full_m='Website Problem';          
}elseif ($G_value["status"]=='Termnt') {
    $full_m='Termination';          
}elseif ($G_value["status"]=='Maintn') {
    $full_m='Maintenance';          
}elseif ($G_value["status"]=='DevFal') {
    $full_m='Device Faulty';          
}elseif ($G_value["status"]=='CineHb') {
    $full_m='Cinehub Issue';          
}elseif ($G_value["status"]=='PktLos') {
    $full_m='Packet Loss /Latency Problem';          
}elseif ($G_value["status"]=='IPPhn') {
    $full_m='IP Phone Problem';          
}elseif ($G_value["status"]=='LANPrb') {
    $full_m='LAN Problem';          
}elseif ($G_value["status"]=='OLT') {
    $full_m='OLT Related Problem';          
}elseif ($G_value["status"]=='MailPr') {
    $full_m='Mail Problem';          
}elseif ($G_value["status"]=='DC') {
    $full_m='Disconnected Number';          
}elseif ($G_value["status"]=='INCALL') {
    $full_m='';          
}elseif ($G_value["status"]=='AutSol') {
    $full_m='Automatic Resolved';          
}elseif ($G_value["status"]=='IPChng') {
    $full_m='IP Change';          
}elseif ($G_value["status"]=='CALLBK') {
    $full_m='Call Back';          
}elseif ($G_value["status"]=='BrowPr') {
    $full_m='Browsing Problem';          
}elseif ($G_value["status"]=='FibCut') {
    $full_m='Fiber Cut';          
}elseif ($G_value["status"]=='GamePr') {
    $full_m='Gaming Problem';          
}elseif ($G_value["status"]=='RtrPrb') {
    $full_m='Router Problem';          
}elseif ($G_value["status"]=='PCLPrb') {
    $full_m='PC or Laptop Problem ';          
}elseif ($G_value["status"]=='LnkTes') {
    $full_m='Link Test';          
}elseif ($G_value["status"]=='BsyWtn') {
    $full_m='Busy/Waiting';          
}elseif ($G_value["status"]=='PhUnr') {
    $full_m='Phone Unreachable';          
}elseif ($G_value["status"]=='PwrPrb') {
    $full_m='Power Problem';          
}elseif ($G_value["status"]=='UndPrb') {
    $full_m='Undefined Problem';          
}elseif ($G_value["status"]=='CabRea') {
    $full_m='Cable Rearrange';          
}else{
    $full_m='';
}



?>                        
                        
                        
                        
                        
                        
<?php   if($number > 50){ ?>
    <tr bgcolor="#ffb3b3">
        <td><?php echo $full_m.' ('.$G_value["status"].')'; ?></td>       
        <td><?php echo $G_value["number"]; ?></td>
    </tr>
 <?php  } elseif($number > 25) { ?>
    <tr bgcolor="#ffffb3">
        <td><?php echo $full_m.' ('.$G_value["status"].')'; ?></td>       
        <td><?php echo $G_value["number"]; ?></td>
    </tr>
  <?php  } else { ?>

    <tr bgcolor="#99ffbb">
         <td><?php echo $full_m.' ('.$G_value["status"].')'; ?></td>    
        <td><?php echo $G_value["number"]; ?></td>
    </tr>
      
 <?php } ?>
    
        
        
        
<?php } ?>
               
<?php
$total_number += $G_value["number"];
    }
//    echo $total_number;
 } 
?>

                                
                    </tbody>
                </table>
                
<!--.....................................  Details.........................................................................-->                
                <table class="table table-bordered table-hover">
                     <h2>Problem Details</h2>
                    <thead>
                        <tr>
                            <th>entry_date</th>
                            <th>status</th>
                            <th>user</th>
                            <th>phone_number</th>
                            <th>called_count</th>
                          
                        </tr>
                    </thead>
                    <tbody>
<?php
//      echo '<pre>';
//      print_r($drop_call_list);
$total=0;
$drop=0;

if($call_list != null){
foreach ($call_list as $value) {
    ?>  
    <tr>
        <td><?php echo $value["entry_date"]; ?></td>
        <td><?php echo $value["status"]; ?></td>       
        <td><?php echo $value["user"]; ?></td>
        <td><?php echo $value["phone_number"]; ?></td>
        <td><?php echo $value["called_count"]; ?></td>

  
    </tr>             
<?php
$total++;

} ?>
  
                                
    <div class="row">
        
<div class="col-lg-10">       
<?php 
    echo '<b>Total Call Number : </b>'.$total.'<br>';
?>
</div>                       
</div>

 <?php   }?>
                                
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
