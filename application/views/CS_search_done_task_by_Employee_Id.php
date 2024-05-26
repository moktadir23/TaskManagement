
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              CS Done Task Search By Employee ID
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
            <form action="<?php echo base_url('index.php/welcome/search_cs_done_task_by_Employee_ID/'); ?>" name="search_by_zone" id="search_by_zone" method="POST">
                <div class="row">

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
                            <label>Support Office <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Sub_Zone" id="Sub_Zone" required="">
                                <option value="" >Select Support Office</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3" style="">
                        <div class="form-group">
                            <label>Employee Name: <div style="color:red;float: right;">*</div></label>
                            <!--<input class="form-control" name="Engineer_Name" onkeyup="find_employee_id();" onchange="pick_engineer_id()" id="Engineer_Name" placeholder="Enter Employee Name" required="">-->
                            <select class="form-control" name="Engineer_Name" id="Engineer_Name" onchange="pick_engineer_id()"  required="">
                                 <option value="">Select Engineer Name</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3" style="">
                        <div class="form-group">
                            <label>Employee ID: <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Engineer_ID" id="Engineer_ID" required="">
                                <option value="" >Select Employee ID</option>
                            </select><br>                         
                        </div>
                    </div>
                    
                </div>
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
                       &nbsp;
                        <button type="submit" class="btn btn-default" value="save">Search</button>
                    </div> 
                </div>
            </form>  
            <br><br>
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
                            <th>CS status of TKI</th>
                            <th>Support Time On TKI</th>
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

if($done_list_result != null){
foreach ($done_list_result as $value) {
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
                                <td><?php echo $value['CS_status_of_TKI']; ?></td>
                                <td>
                                <?php 
                                $total_tki_time=0;
                                $total_time=0;
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
                                if($total_time > 0){
                                     echo $total_time;
                                }
                               
                                       
                                }else{
                                  echo 'N/A'; 
                                }
                                ?>
                                </td>
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
         <button type="button" class="btn btn-success"  onclick="location.href = '<?php echo base_url(); ?>index.php/welcome/createXLS_report_by_Employee_ID/<?php echo $value['Engineer_ID']; ?>'">Export Excel</button> &nbsp;<br><br>  
       
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
            $("#Sub_Zone").change(function() {
                    $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + $(this).val() + ".txt");
            });
    });
</script>
<script>
    $("form#CS_task_from").submit(function () {
//        validateForm();
//        if (submit_or_not == 1)
//        {
//            exit;
//        }
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/welcome/save_CS_task/'); ?>",
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
</script>

<script src="../../js/jquery.min.js" type="text/javascript"></script>

<script>
    function find_employee_id(){
        
       
//    var availableTags = [
//      "ActionScript",
//      "AppleScript",
//      "Asp",
//      "BASIC",
//      "C",
//      "C++",
//      "Clojure",
//      "COBOL",
//      "ColdFusion",
//      "Erlang",
//      "Fortran",
//      "Groovy",
//      "Haskell",
//      "Java",
//      "JavaScript",
//      "Lisp",
//      "Perl",
//      "PHP",
//      "Python",
//      "Ruby",
//      "Scala",
//      "Scheme"
//    ];
//    alert(availableTags);
// $( "#Engineer_Name" ).autocomplete({
//      source: availableTags
//    });   
    
    
        var Engineer_Name = document.getElementById("Engineer_Name").value;
        if (Engineer_Name.length > 0) {
            $.post('<?php echo base_url();?>index.php/welcome/pick_engineer_name',
            {Engineer_Name: Engineer_Name}, function (data) {
                if (data.exists) {
                } else {

                    var array = JSON.stringify(data);
                    var newArray = JSON.parse(array);
//                   alert(newArray);
                    $("#Engineer_Name").autocomplete({
                        source: newArray
                    });
//            document.getElementById("Engineer_Name").value=array;          
                }
            }, 'JSON');
        }
        
        
    }
    
</script>    

<script type="text/javascript">
function pick_engineer_id(){

    var Engineer_Name = $('#Engineer_Name').val();
//        alert('TEST'+Engineer_Name);
        $.post('<?php echo base_url();?>index.php/welcome/pick_engineer_id', {
            Engineer_Name: Engineer_Name
        }, function (search_info_data) {

            var search_array = JSON.stringify(search_info_data);
            var new_search_array = JSON.parse(search_array);
//                alert("Search Engineer_ID...."+new_search_array["Engineer_ID"]);
                document.getElementById("Engineer_ID").innerHTML=null;
                document.getElementById("Engineer_ID").value=null;
                select = document.getElementById("Engineer_ID");
                var opt = document.createElement('option');
                opt.value = new_search_array["Engineer_ID"];
                opt.innerHTML = new_search_array["Engineer_ID"];
                select.appendChild(opt); 

        }, 'JSON');

}
</script> 
<script>
    $(function() {		
            $("#Zone").change(function() {
                    $("#Sub_Zone").load("<?php echo base_url(); ?>CS_sub_zone_list/" + $(this).val() + ".txt");
            });
    });
</script>

