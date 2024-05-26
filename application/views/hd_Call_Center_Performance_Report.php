
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<!--<script>
    var submit_or_not = 0;
</script>-->
<?php 
$total=0;
$drop=0;
$actual_call=0;
$actual_drop=0;
$PhUnr=0;
$NotRes=0;

$BANGLAINBOUND=0;
$BANGLAINBOUND_talk_time=0;
$BANGLAINBOUND_Queue_time=0;
$BANGLAINBOUND_answer_call=0;
$BANGLAINBOUND_drop_call=0;
$BANGLAINBOUND_avg=0;
$avg_BANGLAINBOUND_Queue_time=0;

$DHAKAINBOUND=0;
$DHAKAINBOUND_talk_time=0;
$DHAKAINBOUND_Queue_time=0;
$DHAKAINBOUND_answer_call=0;
$DHAKAINBOUND_drop_call=0;
$DHAKAINBOUND_avg=0;
$avg_DHAKAINBOUND_Queue_time=0;

$CORPORATEINBOUND=0;
$CORPORATEINBOUND_drop_call=0;
$CORPORATEINBOUND_answer_call=0;
$CORPORATEINBOUND_talk_time=0;
$CORPORATEINBOUND_Queue_time=0;
$CORPORATEINBOUND_avg=0;
$avg_CORPORATEINBOUND_Queue_time=0;

$DHAKAINBOUNDENGLISH=0;
$DHAKAINBOUNDENGLISH_drop_call=0;
$DHAKAINBOUNDENGLISH_answer_call=0;
$DHAKAINBOUNDENGLISH_talk_time=0;
$DHAKAINBOUNDENGLISH_Queue_time=0;
$DHAKAINBOUNDENGLISH_avg=0;
$avg_DHAKAINBOUNDENGLISH_Queue_time=0;

$ENGLISHINBOUND=0;
$ENGLISHINBOUND_drop_call=0;
$ENGLISHINBOUND_answer_call=0;
$ENGLISHINBOUND_talk_time=0;
$ENGLISHINBOUND_Queue_time=0;
$ENGLISHINBOUND_avg=0;
$avg_ENGLISHINBOUND_Queue_time=0;

?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              Call Center Performance Report: 
            </h3>
        </div>
    </div>
    <!-- /.row -->
    <div class="row"> 
        <div class="col-lg-12">
            <form action="<?php echo base_url('index.php/hd_controller/Call_Center_Performance_Report/'); ?>" name="Drop_call" id="Drop_call" method="POST">
                
                <div class="row">
                    <div class="col-lg-3">
                        <label>From Date</label>
                        <input type="" name="date_from" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="start_date_id" class="form-control" placeholder="Enter from Date" required=""/>
                    </div>
                    <div class="col-lg-3">
                        <label>To Date</label>
                        <input type="" name="date_to" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="end_date_id" class="form-control" placeholder="Enter To Date" required=""/>
                    </div>
                    <div class="col-lg-3"><br>
                       &nbsp;
                        <button type="submit" class="btn btn-default" value="save">Search</button>
                    </div> 
                </div>
            </form>  
            <br>


            <div class="table-responsive">
                
                <!--<table class="table table-bordered table-hover">-->
<!--                    <thead>
                        <tr>                          
                            <th>Campeign </th>
                            <th>Talk Time</th>
                            <th>Received Call</th>
                            <th>Queue Time </th>
                        </tr>
                    </thead>-->
                    <!--<tbody>-->
<?php
//      echo '<pre>';
//      print_r($drop_call_list);
if($call_center_Performance != null){
foreach ($call_center_Performance as $value) {
    $status=$value["status"];
?>  
    <tr>
        <td>
            <?php  $campaign_id=$value["campaign_id"];
            
        if($campaign_id=='BanglaInbound'){
           $BANGLAINBOUND++; 
           if($status=='DROP'){
                $BANGLAINBOUND_drop_call++;  
           }else{
                $BANGLAINBOUND_answer_call++;  
           }
           
           $BANGLAINBOUND_talk_time += $value["length_in_sec"];
           $BANGLAINBOUND_Queue_time += $value["queue_seconds"];
           
        }
        
        if($campaign_id=='DHAKAINBOUND'){
           $DHAKAINBOUND++; 
           if($status=='DROP'){
                $DHAKAINBOUND_drop_call++;  
           }else{
                $DHAKAINBOUND_answer_call++;  
           }
           
           $DHAKAINBOUND_talk_time += $value["length_in_sec"];
           $DHAKAINBOUND_Queue_time += $value["queue_seconds"];
           
        }
        if($campaign_id=='CORPORATEINBOUND'){
           $CORPORATEINBOUND++; 
           if($status=='DROP'){
                $CORPORATEINBOUND_drop_call++;  
           }else{
                $CORPORATEINBOUND_answer_call++;  
           }
            $CORPORATEINBOUND_talk_time += $value["length_in_sec"];
            $CORPORATEINBOUND_Queue_time += $value["queue_seconds"];
           
        }
        if($campaign_id=='DHAKAINBOUNDENGLISH'){
           $DHAKAINBOUNDENGLISH++; 
           
           if($status=='DROP'){
                $DHAKAINBOUNDENGLISH_drop_call++;  
           }else{
                $DHAKAINBOUNDENGLISH_answer_call++;  
           }
            $DHAKAINBOUNDENGLISH_talk_time += $value["length_in_sec"];
            $DHAKAINBOUNDENGLISH_Queue_time += $value["queue_seconds"];
        }
        
        if($campaign_id=='ENGLISHINBOUND'){
           $ENGLISHINBOUND++; 
           
           if($status=='DROP'){
                $ENGLISHINBOUND_drop_call++;  
           }else{
                $ENGLISHINBOUND_answer_call++;  
           }
            $ENGLISHINBOUND_talk_time += $value["length_in_sec"];
            $ENGLISHINBOUND_Queue_time += $value["queue_seconds"];
        }
        ?>
        
        </td>
        <td><?php $value["length_in_sec"]; ?></td>
        <td>
            <?php
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

             $value["status"]; 

            ?>
        </td>

        <td><?php $value["queue_seconds"]; ?></td>        
    </tr>             
<?php
$total++;

} ?>
  
                                
    <div class="row">
        
<div class="col-lg-8">       
<?php 

if($BANGLAINBOUND_talk_time != 0){
$BANGLAINBOUND_avg=$BANGLAINBOUND_talk_time/$BANGLAINBOUND_answer_call;
//echo ' AVG DHAKAINBOUNDENGLISH talk time'.gmdate('H:i:s', $DHAKAINBOUNDENGLISH_avg).'<br>';
$avg_BANGLAINBOUND_Queue_time=$BANGLAINBOUND_Queue_time/$BANGLAINBOUND;
//echo ' AVG DHAKAINBOUNDENGLISH Queue_time'.gmdate('H:i:s', $avg_DHAKAINBOUNDENGLISH_Queue_time).'<br><br><br>';
}

//echo 'DHAKAINBOUNDENGLISH_talk_time :   '.gmdate('H:i:s', $DHAKAINBOUNDENGLISH_talk_time).'<br>';
//echo 'DHAKAINBOUNDENGLISH_Queue_time  :     '.gmdate('H:i:s', $DHAKAINBOUNDENGLISH_Queue_time).'<br>';
if($DHAKAINBOUNDENGLISH_talk_time != 0){
$DHAKAINBOUNDENGLISH_avg=$DHAKAINBOUNDENGLISH_talk_time/$DHAKAINBOUNDENGLISH_answer_call;
//echo ' AVG DHAKAINBOUNDENGLISH talk time'.gmdate('H:i:s', $DHAKAINBOUNDENGLISH_avg).'<br>';
$avg_DHAKAINBOUNDENGLISH_Queue_time=$DHAKAINBOUNDENGLISH_Queue_time/$DHAKAINBOUNDENGLISH;
//echo ' AVG DHAKAINBOUNDENGLISH Queue_time'.gmdate('H:i:s', $avg_DHAKAINBOUNDENGLISH_Queue_time).'<br><br><br>';
}


if($DHAKAINBOUND_talk_time != 0){
//echo 'DHAKAINBOUND :   '.gmdate('H:i:s', $DHAKAINBOUND_talk_time).'<br>';
//echo 'DHAKAINBOUND_Queue  :     '.gmdate('H:i:s', $DHAKAINBOUND_Queue_time).'<br>';
$DHAKAINBOUND_avg=$DHAKAINBOUND_talk_time/$DHAKAINBOUND_answer_call;
//echo ' AVG DHAKAINBOUND_Queue talk time'.gmdate('H:i:s', $DHAKAINBOUND_avg).'<br>';
$avg_DHAKAINBOUND_Queue_time=$DHAKAINBOUND_Queue_time/$DHAKAINBOUND;
//echo ' AVG DHAKAINBOUND_Queue Queue_time'.gmdate('H:i:s', $avg_DHAKAINBOUND_Queue_time).'<br><br><br>';
}

if($CORPORATEINBOUND_talk_time != 0){
$CORPORATEINBOUND_avg=$CORPORATEINBOUND_talk_time/$CORPORATEINBOUND_answer_call;
$avg_CORPORATEINBOUND_Queue_time=$CORPORATEINBOUND_Queue_time/$CORPORATEINBOUND;
}

if($ENGLISHINBOUND_talk_time != 0){
$ENGLISHINBOUND_avg=$ENGLISHINBOUND_talk_time/$ENGLISHINBOUND_answer_call;
$avg_ENGLISHINBOUND_Queue_time=$ENGLISHINBOUND_Queue_time/$ENGLISHINBOUND;
}

?>
    
    
 
    
</div>         
</div>

 <?php   }?>
                                
<!--                    </tbody>
                </table>-->
                
                
    
<!--............................................................................................-->
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Campeign</th>
            <th>BANGLA IN BOUND</th>
            <th>DHAKA IN BOUND</th>
            <th>CORPORATE IN BOUND</th>
            <th>DHAKA IN BOUND ENGLISH</th>
            <th>ENGLISH IN BOUND</th>
        </tr>
    </thead>
    <tbody>
<?php 
if($call_center_Performance != null){
?>
        <tr>

            <td><?php echo 'Total Call'; ?></td>    
            <td><?php echo $BANGLAINBOUND; ?></td>  
            <td><?php echo $DHAKAINBOUND; ?></td>
            <td><?php echo $CORPORATEINBOUND; ?></td> 
            <td><?php echo $DHAKAINBOUNDENGLISH; ?></td>
            <td><?php echo $ENGLISHINBOUND; ?></td>
        </tr> 
         <tr>

            <td><?php echo 'Total Answer'; ?></td>    
            <td><?php echo $BANGLAINBOUND_answer_call; ?></td> 
            <td><?php echo $DHAKAINBOUND_answer_call; ?></td> 
            <td><?php echo $CORPORATEINBOUND_answer_call; ?></td> 
            <td><?php echo $DHAKAINBOUNDENGLISH_answer_call; ?></td> 
            <td><?php echo $ENGLISHINBOUND_answer_call; ?></td>
        </tr>
         <tr>

            <td><?php echo 'Total Talk Time'; ?></td>    
            <td><?php echo gmdate('H:i:s', $BANGLAINBOUND_talk_time); ?></td> 
            <td><?php echo gmdate('H:i:s', $DHAKAINBOUND_talk_time); ?></td>
            <td><?php echo gmdate('H:i:s', $CORPORATEINBOUND_talk_time); ?></td> 
            <td><?php echo gmdate('H:i:s', $DHAKAINBOUNDENGLISH_talk_time); ?></td> 
            <td><?php echo gmdate('H:i:s', $ENGLISHINBOUND_talk_time); ?></td> 
        </tr>
         <tr>

            <td><?php echo 'Average Talk Time'; ?></td>    
            <td><?php echo gmdate('H:i:s', $BANGLAINBOUND_avg); ?></td> 
            <td><?php echo gmdate('H:i:s', $DHAKAINBOUND_avg); ?></td>
            <td><?php echo gmdate('H:i:s', $CORPORATEINBOUND_avg); ?></td> 
            <td><?php echo gmdate('H:i:s', $DHAKAINBOUNDENGLISH_avg); ?></td> 
            <td><?php echo gmdate('H:i:s', $ENGLISHINBOUND_avg); ?></td> 
        </tr>
         <tr>

            <td><?php echo 'Total Queue Time'; ?></td>    
            <td><?php echo gmdate('H:i:s', $BANGLAINBOUND_Queue_time); ?></td> 
            <td><?php echo gmdate('H:i:s', $DHAKAINBOUND_Queue_time); ?></td>
            <td><?php echo gmdate('H:i:s', $CORPORATEINBOUND_Queue_time); ?></td> 
            <td><?php echo gmdate('H:i:s', $DHAKAINBOUNDENGLISH_Queue_time); ?></td> 
            <td><?php echo gmdate('H:i:s', $ENGLISHINBOUND_Queue_time); ?></td> 
        </tr>
         <tr>

            <td><?php echo 'Average Queue'; ?></td>    
            <td><?php echo gmdate('H:i:s', $avg_BANGLAINBOUND_Queue_time); ?></td> 
            <td><?php echo gmdate('H:i:s', $avg_DHAKAINBOUND_Queue_time); ?></td>
            <td><?php echo gmdate('H:i:s', $avg_CORPORATEINBOUND_Queue_time); ?></td> 
            <td><?php echo gmdate('H:i:s', $avg_DHAKAINBOUNDENGLISH_Queue_time); ?></td> 
            <td><?php echo gmdate('H:i:s', $avg_ENGLISHINBOUND_Queue_time); ?></td> 
        </tr>
         <tr>

            <td><?php echo 'Total Abandon Calls'; ?></td>    
            <td><?php echo $BANGLAINBOUND_drop_call; ?></td>
            <td><?php echo $DHAKAINBOUND_drop_call; ?></td>
            <td><?php echo $CORPORATEINBOUND_drop_call; ?></td> 
            <td><?php echo $DHAKAINBOUNDENGLISH_drop_call; ?></td> 
            <td><?php echo $ENGLISHINBOUND_drop_call; ?></td> 
        </tr>
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
