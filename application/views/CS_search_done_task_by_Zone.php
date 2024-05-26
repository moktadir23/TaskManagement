
 <!--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
<!--<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>      Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              Search Done Task by Support Office.
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
        $message = $this->session->userdata('message');
        if (isset($message)) {
            echo $message;
            $this->session->unset_userdata('message');
        }
        ?>
        <div class="col-lg-12">
 <form action="<?php echo base_url('index.php/welcome/search_cs_done_task_by_Zone/'); ?>" name="search_by_zone" id="search_by_zone" method="POST">            
<div class="row">
<!--    <form action="<?php echo base_url('index.php/welcome/search_cs_done_task_by_Zone/'); ?>" name="search_by_zone" id="search_by_zone" method="POST">-->
    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label> Zone <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Zone" id="Zone" required="">
                                <option value="" >Select Zone</option>
                            </select>
                        </div>
    </div>    
    <div class="col-lg-3" style="">
            <div class="form-group">
                <label>Search By Support Office: <div style="color:red;float: right;"></div></label>
                <select class="form-control" name="Sub_Zone" id="Sub_Zone" >
                    <option value="" >Select Support Office</option>
                </select><br>                         
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
             <button type="submit" class="btn btn-default" value="save">Search</button>
<!--            &nbsp;<button type="button" class="btn btn-primary" onclick="location.href = '#'" /> Search </button>
            <button type="button" class="btn btn-primary" onclick="search();" /> Search </button>-->
        </div> 
</div>
</form>             
            
            <div class="table-responsive">
               
               
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Client ID</th>
                            <th>Client Name</th>
                            <th>Sub Zone</th>
                            <th>Client Category</th>
                            <th>Support Category</th>
                            <th>CTID Number SR</th>
                            <th>Initial Problem Category</th>
                            <th>Engineer Name</th>
                            <th>Assign Time</th>
                            <th>Support Time on TKI</th>
                            <th>CS status of TKI</th>
                            <th>TKI_Status</th>
                            <th>Support_Type</th>
                            <th>Final_Resolution</th>
                            <th>End Date</th>
                            <th>Technician_Name</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
//      echo '<pre>';
//      print_r($pending_list_result);
$total=0;

$Change_Request=0;
$Installation=0;        
$Survey=0;
$Troubleshoot=0;

$BANK=0;
$CORPORATE=0;
$COMPLEMENTARY=0;
$MQ=0;
$NBFI=0;
$RETAIL_CORPORATION=0;
$RETAIL_HOME=0;
 

if($pending_list_result != null){
foreach ($pending_list_result as $value) {
    $p_key=$value['p_key'];
    ?>  

                            <tr> 
                                <td><?php echo $value['Client_ID']; ?></td>
                                <td><?php echo $value['Client_Name']; ?></td>
                                <td><?php echo $value['Sub_Zone']; ?></td>
                                <td><?php echo $value['Client_Category']; ?></td>
                                <td><?php echo $value['Support_Category']; ?></td>
                                <td><?php echo $value['CTID_Number_SR']; ?></td>
                                <td><?php echo $value['Initial_Problem_Category']; ?></td>                                
                                <td><?php echo $value['Engineer_Name']; ?></td>                                
                                <td> <?php echo $value['start_date']; ?> </td>
                                
                                <td>
                                <?php 
                                $total_tki_time=0;
                                if( $tki_time_result != null ){
                                foreach ($tki_time_result as $t_value) {
                                    $t_p_key = $t_value['p_key'];
                                    if($t_p_key==$p_key){
                                        
                                       $work_time_start=$t_value['work_time_start'];
                                       $time1 = strtotime($work_time_start);
                                       
                                       $work_time_end=$t_value['work_time_end'];
                                       $time2 = strtotime($work_time_end);
                                       
                                      $tki_time = $time2 - $time1;   
                                      $total_tki_time += $tki_time;
                                      $total_time= gmdate('H:i:s', $total_tki_time);
                                      
                                    }
                                   
                                }
                                    echo $total_time;
                                }else{
                                  echo 'N/A'; 
                                }
                                ?>
                                </td>
                                
                                
                                
                                
                                
                                <td><?php echo $value['CS_status_of_TKI']; ?></td>
                                <td><?php echo $value['TKI_Status']; ?></td>
                                <td><?php echo $value['Support_Type']; ?></td>
                                <td><?php echo $value['Final_Resolution']; ?></td>
                                <td><?php echo $value['end_date']; ?></td>
                                <td><?php echo $value['Technician_Name']; ?></td>
                                <?php 
                               if($value['Support_Category']=='Change_Request'){
                                   $Change_Request++;
                               }elseif ($value['Support_Category']=='Installation') {
                                   $Installation++;        
                               }elseif ($value['Support_Category']=='Survey') {
                                   $Survey++;         
                               }elseif ($value['Support_Category']=='Troubleshoot') {
                                  $Troubleshoot++;
                               }
                               
                               
                                if($value['Client_Category']=='BANK'){
                                   $BANK++;
                               }elseif ($value['Client_Category']=='CORPORATE') {
                                   $CORPORATE++;        
                               }elseif ($value['Client_Category']=='COMPLEMENTARY') {
                                   $COMPLEMENTARY++;         
                               }elseif ($value['Client_Category']=='MQ') {
                                  $MQ++;
                               }elseif ($value['Client_Category']=='NBFI') {
                                  $NBFI++;
                               }elseif ($value['Client_Category']=='RETAIL CORPORATION') {
                                  $RETAIL_CORPORATION++;
                               }elseif ($value['Client_Category']=='RETAIL HOME') {
                                  $RETAIL_HOME++;
                               }
                               
                               
                               $total++;
                               ?> 
                                
                                
                                
<?php } ?> 
    <div class="row">
        <div class="col-lg-10">
 <?php 
    echo '<b>Total Number : </b>'.$total.'<br>';
    echo '<b>Change Request : </b>'.$Change_Request.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>Installation : </b>'.$Installation.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>Survey : </b>'.$Survey.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>Troubleshoot : </b>'.$Troubleshoot.'&nbsp;&nbsp;&nbsp;&nbsp;<br>';
    
    echo '<b>BANK : </b>'.$BANK.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>CORPORATE : </b>'.$CORPORATE.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>COMPLEMENTARY : </b>'.$COMPLEMENTARY.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>MQ : </b>'.$MQ.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>NBFI : </b>'.$NBFI.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>RETAIL CORPORATION : </b>'.$RETAIL_CORPORATION.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>RETAIL HOME : </b>'.$RETAIL_HOME.'&nbsp;&nbsp;&nbsp;&nbsp;';
?>
        </div>   
    <div class="col-lg-2">
         <button type="button" class="btn btn-success"  onclick="location.href = '<?php echo base_url(); ?>index.php/welcome/createXLS/<?php echo $value['Sub_Zone']; ?>'">Export Excel</button> &nbsp;<br><br>  
       
    </div>                       
</div>

 <?php  }?>
                                
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
    $(function() {		
            $("#Zone").change(function() {
                    $("#Sub_Zone").load("<?php echo base_url(); ?>CS_sub_zone_list/" + $(this).val() + ".txt");
            });
    });
</script>
<!--<script>
    $("form#search_by_zone").submit(function () {
//        validateForm();
//        if (submit_or_not == 1)
//        {
//            exit;
//        }
validation();
alert("test ...");
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/welcome/createXLS/'); ?>",
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
                alert('Sussfully Done');
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
      
    );
</script>-->

<!--<script src="../../js/jquery.min.js" type="text/javascript"></script>-->

<script type="text/javascript">
    
    function validation(){
        
        var Sub_Zone = document.getElementById("Sub_Zone").selectedIndex;
        if (Sub_Zone == null || Sub_Zone == 0) {
//            clicks = clicks - 1;
            document.getElementById("info_span").innerHTML = "Please Select Sub Zone";
            $('#error_message').show();
            $('html,body').scrollTop(0);
            exit();
        }
        
        var start_date_id = document.getElementById("start_date_id").value;
        if (start_date_id == null || start_date_id == 0) {
            document.getElementById("info_span").innerHTML = "Please Input From Date  ";
            $('#error_message').show();
            $('html,body').scrollTop(0);
            exit();
        }
        
        var end_date_id = document.getElementById("end_date_id").value;
        if (end_date_id == null || end_date_id == 0) {
            document.getElementById("info_span").innerHTML = "Please Input TO Date  ";
            $('#error_message').show();
            $('html,body').scrollTop(0);
            exit();
        }
    }
    
    function test(){
        
   
//        var Sub_Zone = $("#Sub_Zone").val();
//        var start_date_id = $("#start_date_id").val();
//        var end_date_id = $("#end_date_id").val();
        
//        validation();
//       
//        alert("DONE");
//     exit();    
//         $.ajax({
//                    type: "POST",
//                    url: '<?php echo base_url() ?>index.php/welcome/createXLS/',
//                    data: {
//                        Sub_Zone: Sub_Zone,
//                        start_date_id: start_date_id,
//                        end_date_id:end_date_id
//                    },
//                    success: function (returndata)
//                    {
//                        
//                    alert("SAVE Successfully");  
////                document.getElementById("info_span").innerHTML = response;
////                        $('html,body').scrollTop(0);
////                    document.getElementById("info_span").innerHTML = " Please Try Again... ";
////                            alert(returndata);
////                            document.getElementById("info_span").innerHTML = "Successfully Done MRN... ";
////                            document.getElementById("new_clk").checked = false;
////                            document.getElementById("Assets_ID").disabled = false;
////                            document.getElementById("Assets_ID").value = returndata;
////                            document.getElementById("Show_message").value = "Successfully Create Assets ID is".returndata;
//
//                    },
//                    error: function (){
//                        alert('fail');
//                    }
//                });
        
//        
//        var formData = new FormData($(this)[0]);
//        $.ajax({
//            url: "<?php echo base_url('index.php/welcome/createXLS/'); ?>",
//            type: 'POST',
//            data: formData,
//            async: false,
//            success: function (data) {
//                alert('Sussfully Done');
////                null_from();
////            data = $.parseJSON(data);                                   
////            $('#info_span').append(data.messages);
//            },
//            cache: false,
//            contentType: false,
//            processData: false
//        });
//        return false;
        
    }
</script>    

