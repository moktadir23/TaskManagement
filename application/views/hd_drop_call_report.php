
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<!--<script>
    var submit_or_not = 0;
</script>-->

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              HDD Drop Call Report
            </h3>
        </div>
    </div>
    <!-- /.row -->
    <div class="row"> 
        <div class="col-lg-12">
            <form action="<?php echo base_url('index.php/hd_controller/Drop_Call_Report/'); ?>" name="Drop_call" id="Drop_call" method="POST">
                
                <div class="row">
                    <div class="col-lg-3">
                        <label>From Date</label>
                        <input type="" name="date_from" value="<?php  echo date("d-m-Y H:i:s");?>" id="s_date" class="form-control" placeholder="Enter from Date" required=""/>
                    </div>
                    <div class="col-lg-3">
                        <label>To Date</label>
                        <input type="" name="date_to" value="<?php  echo date("d-m-Y H:i:s");?>" id="e_date" class="form-control" placeholder="Enter To Date" required=""/>
                    </div>
                    <div class="col-lg-3"><br>
                       &nbsp;
                        <button type="submit" class="btn btn-default" value="save">Search</button>
                    </div> 
                </div>
            </form>  
            <br>
            
            
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Call Date</th>
                            <th>length in Sec</th>
                            <th>status</th>
                            <th>phone_code</th>
                            <th>phone_number</th>
                            <th>user</th>
                            <th>queue_seconds</th>
                            <th>called_count</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
//      echo '<pre>';
//      print_r($drop_call_list);
$total=0;
$drop=0;
$actual_call=0;
$actual_drop=0;
$PhUnr=0;
$NotRes=0;

if($drop_call_list != null){
foreach ($drop_call_list as $value) {
    ?>  
    <tr>
        <td><?php echo $value["call_date"]; ?></td>
        <td><?php echo $value["length_in_sec"]; ?></td>
        <td><?php
        $status=$value["status"];
        if($status=='DROP'){
          $drop++;  
        }
        
        if($status=='NotRes'){
           $NotRes++; 
        }
        
         if($status=='PhUnr'){
           $PhUnr++; 
        }
        
        echo $value["status"]; 
        
        ?></td>
        <td><?php echo $value["phone_code"]; ?></td>
        <td><?php echo $value["phone_number"];
        
        
        if($actual_call==0){
            $phone_number=$value["phone_number"];
            $actual_call=1;
             if($status=='DROP'){
                    $actual_drop++;  
                  }
        }elseif($actual_call > 0){
            
            if($phone_number==$value["phone_number"]){
                
            } else {
                $phone_number=$value["phone_number"];
                $actual_call++;
                
                 if($status=='DROP'){
                    $actual_drop++;  
                  }
            }
        }
        
        
        
        ?></td>
        <td><?php echo $value["user"]; ?></td>       
        <td><?php echo $value["queue_seconds"]; ?></td>
        <td><?php echo $value["called_count"]; ?></td>
        
        
        
    </tr>             
<?php
$total++;

} ?>
  
                                
    <div class="row">
        
<div class="col-lg-4">       
<?php 
    echo '<b>Total Call Number : </b>'.$total.'<br>';
     echo '<b>Total Drop Call Number : </b>'.$drop.'<br>';
     $a=100*$drop;
     $b=$a/$total;
     echo '<b>Total Drop Call Percentance : </b>'.$b.'% <br>';
//    echo '<b>Change Request : </b>'.$Change_Request.'&nbsp;&nbsp;&nbsp;&nbsp;';
?>
</div> 
<div class="col-lg-4">       
<?php 
     echo '<b> Actual Call Number : </b>'.$actual_call.'<br>';
     echo '<b>Actual Drop Call Number : </b>'.$actual_drop.'<br>';
     $x=100*$actual_drop;
     $y=$x/$actual_call;
     echo '<b>Actual Drop Call Percentance : </b>'.$y.'% <br>';
?>
</div>        
    <div class="col-lg-4">
<?php 
//     echo '<b>Actual Total Call Number : </b>'.$actual_call.'<br>';
//     echo '<b>After Call Back Drop Call Number : </b>'.''.'<br>';
     echo '<b>Not Response Call Number : </b>'.$NotRes.'<br>';
     echo '<b>Unreachable Call Number : </b>'.$PhUnr.'<br>';
     $x=100*$actual_drop;
     $y=$x/$actual_call;
//     echo '<b>After Call Back Drop Call Percentance : </b>'.''.'<br>';
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
