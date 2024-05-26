
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              ERT Pending Task Search By Support Office
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
            <form action="<?php echo base_url('index.php/ert_controller/ERT_pending_task_by_sub_zone/'); ?>" name="search_by_zone" id="search_by_zone" method="POST">
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
                            <label>Support Office <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="Sub_Zone" id="Sub_Zone">
                                <option value="" >Select Support Office</option>
                                <!--<option selected="selected" value="All">All</option>-->
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                                <div class="form-group">
                                <label>Status<div style="color:red;float: right;">*</div> </label>
                                <select class="form-control" name="status" id="status" required="">
                                    <option value="">Select status </option>
                                    <option selected="selected" value="All">All</option>
                                    <option value="Scheduled">Scheduled</option>
                                    <option value="Re-active later">Re-active later</option>
                                    <option value="Need to contact later">Need to contact later</option>
                                </select> 
                                </div>
                    </div>
                    <div class="col-lg-3">
                        <label>From Date</label>
                        <input type="" name="date_from" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="start_date_id" class="form-control" placeholder="Enter from Date" required=""/>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-lg-3">
                        <label>To Date</label>
                        <input type="" name="date_to" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="end_date_id" class="form-control" placeholder="Enter To Date" required=""/>
                    </div>
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
                            <th>Client ID</th>
                            <th>Client Name</th>
                            <th>Client Address</th>
                            <th>Client Contact</th>
                            <th>Client Type</th>
                            <th>Zone</th>
                            <th>Entity</th>
                            <th>CTID /SR </th>
                            <th>Task Type</th>                                       
                            <th>Assign By</th>
                            <th>Employee Name</th>
                            <th>Employee ID</th>
                            <th>Technician Name</th>
                            <th>Start Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
<?php

if($pending_list_result != null){
//    echo '<pre>';
//    print_r($pending_list_result);
$total=0;
$Scheduled=0;
$Reactive_later=0;
$Need_contact=0;    
$other=0;
foreach ($pending_list_result as $value) {
    $total++;
    $p_key=$value['p_key'];
    ?>  

                        <tr> 

                                <td><?php echo $value['Client_id']; ?></td>
                                <td><?php echo $value['Client_Name']; ?></td>
                                <td><?php echo $value['Client_Address']; ?></td>
                                <td><?php echo $value['Client_Contact']; ?></td>
                                <td><?php echo $value['Client_Category']; ?></td>
                                <td><?php echo $value['Zone']; ?></td>
                                <td><?php echo $value['Sub_Zone']; ?></td>
                                <td><?php echo $value['CTID_SR']; ?></td>
                                <td><?php echo $value['type_task']; ?></td>
                                <td><?php echo $value['assign_by']; ?></td>
                                <td><?php echo $value['employee_name']; ?></td>
                                <td><?php echo $value['employee_id']; ?></td>
                                <td><?php echo $value['Technician_Name']; ?></td>
                                <td><?php echo $value['s_date']; ?></td>
                                <td><?php echo $status=$value['Status'];
                                
                                    if($status=='Scheduled'){
                                       $Scheduled++;
                                   } elseif ($status=='Re-active later') {
                                       $Reactive_later++;
                                   } elseif ($status=='Need to contact later') {
                                       $Need_contact++;
                                   }elseif ($status=='Others') {
                                       $other++;
                                   }
                                
                                ?></td>
                             
                                
                             

                                
                                <td>
                                    <!--<a href="<?php echo base_url(); ?>index.php/welcome/CS_edit_task/<?php // echo $value['p_key']; ?>"><button>Edit</button></a> &nbsp;-->
                                    <a href="<?php echo base_url(); ?>index.php/ert_controller/ERT_new_comments/<?php echo $value['p_key']; ?>"><button>UPDATE</button></a> &nbsp;
                                    <!--<a href="<?php echo base_url(); ?>index.php/welcome/cs_pending_task/<?php echo $value['p_key']; ?>"><button>Done Task </button></a> &nbsp;--> 
                                    <!--<a href="<?php echo base_url(); ?>index.php/welcome/cs_task_transfer_funcation/<?php echo $value['p_key']; ?>" onclick="return check_transfer();"><button>Transfer Task</button> </a>-->
                                </td>
                            </tr>
                                
                                
                                
<?php }
 echo '<b>Total pending  : </b>'.$total.'<br>';
 echo '<b>Scheduled  : </b>'.$Scheduled.'<br>';
 echo '<b>Re-active later  : </b>'.$Reactive_later.'<br>';
 echo '<b>Need to contact later  : </b>'.$Need_contact.'<br>';
 echo '<b>Other  : </b>'.$other.'<br>';
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
<script>
    $(function() {		
            $("#Sub_Zone").change(function() {
                    $("#Engineer_Name").load("<?php echo base_url(); ?>ert_employee_name_list/" + $(this).val() + ".txt");
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

