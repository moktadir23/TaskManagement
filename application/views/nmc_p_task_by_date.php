
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              NMC Team: Pending Task Search
            </h3>
           
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
            <form action="<?php echo base_url('index.php/nmc_c/nmc_p_task_by_date/'); ?>" name="search_by_zone" id="search_by_zone" method="POST">
                <div class="row">
<!--                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Vendor<div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="Vendor" id="Vendor">
                                <option value="0" >ALL Vendor</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Incident Type <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="type" id="type">
                                <option value="0" >All Type</option>
                            </select>
                        </div>
                    </div>-->
                     <div class="col-lg-3">
                        <label>From Date</label>
                        <input type="" name="date_from" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="start_date_id" class="form-control" placeholder="Enter from Date" required=""/>
                    </div>
                    <div class="col-lg-3">
                        <label>To Date</label>
                        <input type="" name="date_to" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="end_date_id" class="form-control" placeholder="Enter To Date" required=""/>
                    </div>
        
                    <div class="col-lg-3">
                       &nbsp;<br>
                        <button type="submit" class="btn btn-default" value="save">Search</button>
                    </div>
                </div>
<!--                <div class="row">
                    <div class="col-lg-3">
                       &nbsp;<br>
                        <button type="submit" class="btn btn-default" value="save">Search</button>
                    </div> 
                </div>    -->
            </form>  
            <br><br>
            <div class="table-responsive" style="height: 480px; overflow-y: auto;">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ORG Name</th>
                            <th>Ticket-ID</th>
                            <th>Start Time</th>
                            <th>Incident-Type</th> 
                            <th>Incident-Name</th>
                            <th>Incident-Specification</th>
                            <th>Provider</th>
                            <th>SCR / Circuit ID</th>
                            <th>ETR</th>
                            <th>RFO</th>
                            <th>Informed-To</th>
                            <th>Informed-Time</th>
                            <th>SMS</th>
                            <th>Email</th>
                            <th>Comments</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
<?php

if($pending_list_result != null){ 
 $total=0; 
 $Link3=0; $GP=0; $BL=0; $SCL =0; $FH=0;
 $BTS=0; $Backbone=0; $Datacenter=0; $iMPLS=0; $NTTN=0; $Telco=0; $Upstream=0;   
foreach ($pending_list_result as $value) {
    $id=$value['id'];
    ?>  
                        <tr> 
                                 <td><?php echo $value['incident_for']; ?></td>
                                <td><b><?php echo $tki=$value['tki']; ?></b></td>
                                <td><b><?php echo $value['in_Occurred']; ?></b></td>
                                <td><?php echo $value['type']; ?></td>
                                <td><b><?php echo $value['Name']; ?></b></td>
                                <td><?php echo $value['Specification']; ?></td>
                                <td><?php echo $value['Vendor']; ?> </td>
                                <td><?php echo $value['scr_curt_id']; ?></td>
                                <td><?php echo $value['etr']; ?></td>
                                <td><?php echo $value['rfo']; ?></td>
                                <td><b><?php echo $value['informed_id']; ?></b></td>
                                <td><?php echo $value['informed_time']; ?></td>
                                <td><?php  $sms=$value['sms']; if($sms=='1'){ echo 'YES'; }else{ echo 'NO'; } ?></td>         
                                <td><?php  $email=$value['email'];  if($email=='1'){ echo 'YES'; }else{ echo 'NO'; }  ?></td>
                               
                                <td>
                                     <?php  
//                                   echo '<pre>';
//                                  print_r($comments_result);                                   
                                      if($comments_result != null){                                     
                                        foreach ($comments_result as $comments_value) {
                                          $tki_c=$comments_value->tki;
                                         if($tki == $tki_c){
                                              echo $comments_value->comments;
                                         }  
                                      }
                                    } 
                                ?>
                                </td>
                                
                                
                                <td>
                                    <a href="<?php echo base_url(); ?>index.php/nmc_c/done_task/<?php echo $value['id']; ?>"><button>Done Task</button></a><br><br>
                                    <a href="<?php echo base_url(); ?>index.php/nmc_c/nmc_comments/<?php  echo $value['tki']; ?>"><button>Comments</button></a>
                                </td>
                                
                            </tr>
                                
<?php 
$Vendor=$value['Vendor'];
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

$type=$value['type'];
if($type=='BTS'){
   $BTS++;
}elseif ($type=='Backbone') {
   $Backbone++;        
}elseif ($type=='Datacenter') {
   $Datacenter++;        
}elseif ($type=='iMPLS') {
   $iMPLS++;         
}elseif ($type=='NTTN') {
   $NTTN++;         
}elseif ($type=='Telco') {
   $Telco++;         
}elseif ($type=='Upstream') {
   $Upstream++;         
}
?>
                               
                                
<?php }?>
<div class="row">
        
<div class="col-lg-10">       
<?php 
    echo '<font color="red"><b>Total Pending Incident Number : </b>'.$total.'</font><br>';
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
        <button type="button" class="btn btn-success"  onclick="location.href = '<?php echo base_url(); ?>index.php/nmc_c/export_pending_report/'">Export Excel</button> &nbsp;<br><br>  
       
    </div>                       
</div>    
    
    
<?php } ?>
  
                                
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
