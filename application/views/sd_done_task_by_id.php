
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              SD: Done Task Search By Employee ID
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
            <form action="<?php echo base_url('index.php/sd_controller/sd_done_task_by_id/'); ?>" name="search_by_zone" id="search_by_zone" method="POST">
                <div class="row">

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
                            <th>Task Type</th>
                            <th>Number</th>
                        </tr>
                    </thead>
                    <tbody>
<?php

$total_task=0;
if($done_task_summery != null){
    
foreach ($done_task_summery as $n_value) {
    ?>  
        <tr> 
                <td><?php echo $n_value['action_type']; ?></td>
                <td><?php echo $task_number=$n_value['task_number']; ?></td>                      
        </tr>                           
<?php 
$total_task=$total_task+$task_number;
}
echo '<h2>Total Task :'.$total_task.'</h2>';

} ?>            
                    </tbody>
                </table>
                
                
        <h2>Details Task</h2>        
<div class="row">
<div class="col-lg-4"> </div>
<div class="col-lg-6">       
</div> 
<div class="col-lg-2">
    <button type="button"  class="btn btn-success"  onclick="location.href = '<?php echo base_url(); ?>index.php/sd_controller/export_sd_report/'">Export Excel</button> &nbsp;<br><br>    
</div>                       
</div>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Employee ID (Name)</th>  
                            <th>Date</th> 
                            <th>Task Type</th>
                            <th>Action Type</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Client ID</th>
                            <th>Client Name</th>
                            <th>Client Category</th>
                            <th>TKI ID</th>
                            <th>comments</th>
                        </tr>
                    </thead>
                    <tbody>
<?php

if($done_list_result != null){
//    echo '<pre>';
//    print_r($pending_list_result);
    
//$Follow_Up=0;
//$Forward=0;
//$Review=0;
//$Mail=0;
//$Phone=0;
//$Communication=0;
//$Coordination=0;
//$Other=0;

foreach ($done_list_result as $value) {
    $ticket_no=$value['ticket_no'];
    ?>  

                        <tr> 
                               
                                <td><?php echo $value['Engineer_Name']; ?> ( <?php echo $value['Engineer_ID']; ?> )</td>
                                <td><?php echo $value['action_time']; ?></td>
                                <td><?php echo $value['type_task']; ?></td>
                                <td><?php echo $action_type=$value['action_type']; ?></td>
                                <td><?php echo $value['s_date']; ?></td>
                                <td><?php echo $value['e_date']; ?></td>
                                <td><?php echo $value['Client_id']; ?></td>
                                <td><?php echo $value['Client_name']; ?></td>
                                <td><?php echo $value['Client_Category']; ?></td>
                                <td><?php echo $value['tki_id']; ?></td>
                                <td><?php echo $value['comments']; ?></td>
                                
                                
                                
                            </tr>
                                
                                
                                
<?php } 


//echo ' <b>Follow Up : </b>'. $Follow_Up .'<b> Forward : </b>'. $Forward .'<b> Review : </b>'.$Review.' <b> Mail : </b>'.$Mail.
//     '  <b> Phone : </b>'. $Phone .' <b> Communication : </b>'.$Communication.' <b> Coordination : </b>'.$Coordination.'<b> Other : </b>'.$Other.'';


                                } ?>
  
                                
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

<script src="../../js/jquery.min.js" type="text/javascript"></script>

<script>
    function find_employee_id(){    
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
            $("#Division").change(function() {
                    $("#Engineer_Name").load("<?php echo base_url(); ?>SD_engineer_name_list/SD_engineer_list.txt");
            });
    });
</script>



<script>
   $(function() {
       
     $("#Engineer_Name").load("<?php echo base_url(); ?>SD_engineer_name_list/SD_engineer_list.txt");
    
    });
    
    
 </script>   





