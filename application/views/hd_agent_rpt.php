
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              HD Team: ACD Agent Report
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
            <form action="<?php echo base_url('index.php/hd_controller/hd_agent_report/'); ?>" name="search_by_zone" id="search_by_zone" method="POST">
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
                            <th>Name (ID)</th>
                            <th>SIP</th>
                            <th>Login Time</th>
                            <th>LogOut Time</th>
                            <th>Total Call</th>                                       
                            <th>MIS TKI Number</th>  
                            <th>MQ TKI Number</th>  
                           
                            <th>SMS</th>
                            <th>EMAIL</th>
                            <th>Self Care</th>
                            <th>Facebook</th> 
                            <th>Billing Query</th>
                            <th>Solve By Specta</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
<?php

if($result != null){
 $total=0; 
// $Link3=0; $GP=0; $BL=0; $SCL =0; $FH=0;
 $total_call=0; $total_mis_tki=0; $total_mq_tki=0; $total_sms=0; $total_mail=0; $total_selfcare=0; $total_facebook=0;
 $total_b_query=0; $total_solve=0; 
    foreach ($result as $value) {
?>  
                        <tr> 
                              
                                
                                <td><?php echo $value['Engineer_Name'].' ( '.$value['Engineer_ID'].' )'; ?></td>
                                <td><?php echo $value['sip']; ?></td>
                                <td><?php echo $value['login']; ?></td>
                                <td><?php echo $value['logout']; ?></td>
                                <td><?php echo $t_call=$value['t_call']; $total_call=$total_call+$t_call; ?></td>
                                <td><?php echo $mis_tki=$value['mis_tki']; $total_mis_tki=$total_mis_tki+$mis_tki; ?></td>
                                <td><?php echo $mq_tki=$value['mq_tki'];  $total_mq_tki=$total_mq_tki+$mq_tki; ?></td> 
                                <td><?php echo $sms=$value['sms']; $total_sms=$total_sms+$sms; ?></td>
                                <td><?php echo $mail=$value['mail']; $total_mail=$total_mail+$mail ?></td>
                                <td><?php echo $selfcare=$value['selfcare']; $total_selfcare=$total_selfcare+$selfcare; ?></td>
                                <td><?php echo $facebook=$value['facebook']; $total_facebook=$total_facebook+$facebook; ?></td> 
                                <td><?php echo $b_query=$value['b_query']; $total_b_query=$total_b_query+$b_query; ?></td> 
                                <td><?php echo $solve=$value['solve']; $total_solve=$total_solve+$solve; ?></td>
                                <td><?php echo $value['remark']; ?></td>
                            </tr>                    
<?php } ?>
<div class="row">
        
<div class="col-lg-10">       
<?php 
//    echo '<b>Total Incident Number : </b>'.$total.'<br>';
//    echo '<b>Link3 : </b>'.$Link3.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>TOTAL CALL : </b>'.$total_call.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>MIS TKI : </b>'.$total_mis_tki.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>MQ TKI : </b>'.$total_mq_tki.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>SMS : </b>'.$total_sms.'&nbsp;&nbsp;&nbsp;&nbsp;<br>';
    echo '<b>MAIL : </b>'.$total_mail.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>SELF CARE : </b>'.$total_selfcare.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>FACEBOOK : </b>'.$total_facebook.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>BILL QUERY : </b>'.$total_b_query.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>SPECTA SOLVE : </b>'.$total_solve.'&nbsp;&nbsp;&nbsp;&nbsp;';
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