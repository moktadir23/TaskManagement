
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              HD Team: NMC & Outbound Report
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
            <form action="<?php echo base_url('index.php/hd_controller/hd_nmc_outbound_report/'); ?>" name="search_by_zone" id="search_by_zone" method="POST">
                <div class="row">
                    
                    
                     <div class="col-lg-3">
                        <label>From Date</label>
                        <input type="" name="date_from" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="start_date_id" class="form-control" placeholder="Enter from Date" required=""/>
                    </div>
                    <div class="col-lg-3">
                        <label>To Date</label>
                        <input type="" name="date_to" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="end_date_id" class="form-control" placeholder="Enter To Date" required=""/>
                    </div>
                    <div class="col-lg-3">
                        <label>Time</label>
                        <input type="" readonly="readonly" name="tm_v" id="tm_v"  class="form-control" value="00:00:00-23:59:59" placeholder="Enter Time" required=""/>
                    
                        <!--<input type="" name="date_to" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="end_date_id" class="form-control" placeholder="Enter To Date" required=""/>-->
<!--                        sift 1 :<input type="radio" name="time" id="time" value="08:00:00-15:59:59"> 
                        sift 2 :<input type="radio" name="time" id="time" value="10:00:00-17:59:50"> 
                        sift 3 :<input type="radio" name="time" id="time" value="14:00:00-21:59:59"> 
                        sift 4 :<input type="radio" name="time" id="time" value="22:00:00-07:59:59"> -->
                    </div>
                     <div class="col-lg-3">
                        
                        <!--<input type=""  class="form-control" placeholder="Enter Time" required=""/>-->
                    <br>
                       
                        sift 1 :<input type="radio" name="tm" id="tm1" onclick="time(this.value);" value="08:00:00-15:59:59"> 
                        sift 2 :<input type="radio" name="tm" id="tm2" onclick="time(this.value);" value="10:00:00-17:59:50"> 
                        sift 3 :<input type="radio" name="tm" id="tm3" onclick="time(this.value);" value="14:00:00-21:59:59"> 
                        sift 4 :<input type="radio" name="tm" id="tm4" onclick="time(this.value);" value="22:00:00-07:59:59"> 
                    </div>
                </div>
                
                <div class="row">
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

                            <th>TYPE</th>
                            <th>NODE</th>
                            <th>Down Time</th>                                       
                            <th>SMS Down Time</th>
                            <th>UP Time </th>                          
                            <th>SMS UP Time</th>
                            <th>Total Down Time</th>
                            <th>FW Team</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
<?php

if($result != null){
 $total=0; 
// $Link3=0; $GP=0; $BL=0; $SCL =0; $FH=0;
// $BTS=0; $Backbone=0; $Datacenter=0; $iMPLS=0; $NTTN=0; $Telco=0; $Upstream=0;
 
    foreach ($result as $value) {
?>  
                        <tr> 
                              
                                <td><?php echo $value['n_type']; ?></td>
                                <td><?php echo $value['node_client']; ?></td>
                                <td><?php echo $value['down_time']; ?></td>
                                <td><?php echo $value['sms_down_time']; ?></td>
                                <!--<td>-->
                                    <?php 
//                                    echo $type=$value['type'];
//                                    if($type=='BTS'){
//                                       $BTS++;
//                                   }elseif ($type=='Backbone') {
//                                       $Backbone++;        
//                                   }elseif ($type=='Datacenter') {
//                                       $Datacenter++;        
//                                   }elseif ($type=='iMPLS') {
//                                       $iMPLS++;         
//                                   }elseif ($type=='NTTN') {
//                                       $NTTN++;         
//                                   }elseif ($type=='Telco') {
//                                       $Telco++;         
//                                   }elseif ($type=='Upstream') {
//                                       $Upstream++;         
//                                   }
                                    ?>
                                <!--</td>-->
                                <td><?php echo $value['up_time']; ?></td>
                                <td><?php echo $value['sms_up_time']; ?></td>
                                <td><?php echo $value['total_down_time']; ?></td>
                                <td><?php echo $value['fw_team']; ?></td> 
                                <td><?php echo $value['remark']; ?></td> 
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
?>
    
</div> 
    <div class="col-lg-2">
        <button type="button" disabled="disabled"  class="btn btn-success"  onclick="location.href = '<?php echo base_url(); ?>index.php/nmc_c/export_incedent_report/'">Export Excel</button> &nbsp;<br><br>    
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

<?php
//echo "<script type=\"text/javascript\">";
//foreach ($from_value as $value) {
//    echo "var x = document.getElementById(" . $value['Select_Name'] . ");";
//    echo "var option = document.createElement(\"option\");";
//    echo "option.text =" . $value['CateGory_Description'] . ";";
//    echo "option.value =" . $value['D_Value'] . ";";
//    echo "x.add(option,x[" . $value['Indexx'] . "]);";
//}
//echo "</script>";
?>

<script src="../../js/jquery.min.js" type="text/javascript"></script>



<script type="text/javascript">
    function time(t){
//        alert("TEST..."+t);
       document.getElementById("tm_v").value=t; 
    }
</script>    