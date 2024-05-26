<!--<h1>under construction</h1>-->
<?php
$id = $this->session->userdata('id');


$servername = "203.76.96.115";
$username = "fonmok";
$password = "f0nm0kMQR";
$dbname = "FONOC";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
//print "<br>Checking Mysql Conectation/n";
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
$btssql = "select BTS_Name from fonoc_bts_tbl Order by BTS_Name ";
$btsresult = $conn->query($btssql);
$conn->close();

?>

<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>  
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
                New / Assign Task From ( FONOC )
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



<?php
$name = $this->session->userdata('name'); 
$id = $this->session->userdata('id'); 
//        $message = $this->session->userdata('message');
//        if (isset($message)) {
//            echo $message;
//            $this->session->unset_userdata('message');
//        }
    ?>


    <div class="row">
        <div class="col-lg-12">
            <!--<form action="<?php echo base_url(); ?>index.php/link3_controller/fonoc_save_task/" method="post">-->
             <form action="" name="fonoc_task_from" id="fonoc_task_from" method="">
<!--<input type="hidden" name="task_info_id" id="task_info_id" class="form-control" value="<?php echo $result['ticket_no'] ?>">-->
<!--<input type="hidden" class="form-control" name="p_key" id="p_key"  value="<?php echo $result['p_key']; ?>">--> 
                <div class='row'> 
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>BTS Name<div style="color:red;float: right;"></div></label>                                                                          
                            <!--<input class="form-control" name="bts" id="bts">-->
                            <select class="form-control" name="bts" onchange="pick_olt()" id="bts">
                                <option value="">Select BTS NAME</option>
                                <?php
                               if ($btsresult->num_rows > 0) {
                                    // output data of each row
                                    while($row = $btsresult->fetch_assoc()) {
                                        $BTS_Name=$row["BTS_Name"];
                                        if( $BTS_Name !== null ){
                                           echo "<option value=" . '"' . $row["BTS_Name"] . '"' . ">" . $row["BTS_Name"]."</option>"; 
                                        }
                                    }
                                }
                                ?> 
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>OLT Name<div style="color:red;float: right;"></div></label>                                                                          
                            <!--<input class="form-control" name="olt" id="olt">-->
                            <select class="form-control" name="olt" id="olt">
                                 <option value="">Select OLT NAME</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Client ID<div style="color:red;float: right;"></div></label>                                                                          
                            <input class="form-control" name="Client_ID" id="Client_ID" >
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Engineer Name<div style="color:red;float: right;">*</div></label>                                                                          
                            <input class="form-control" name="Engineer_Name" id="Engineer_Name" value="<?php echo $name; ?>" readonly="readonly" required="">
                        </div>
                    </div>
                    
                   
                    
                    </div>
                    
                    <div class='row'> 
                       
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Engineer ID<div style="color:red;float: right;">*</div></label>                                                                          
                            <input class="form-control" name="Engineer_ID" id="Engineer_ID" value="<?php echo $id; ?>" readonly="readonly" required="">
                        </div>
                    </div>    
                    <div class="col-lg-3">  
                        <div class="form-group">

                            <label>Select Category <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Problem_Category" id="Problem_Category" required="">
                                <option  value="">Select Category</option>
                            </select>
                        </div> 

                    </div>
                        <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>Start time<div style="color:red;float: right;">*</div> <i class="fa fa-calendar"></i></label>                                  
                            <input  class="form-control" id="cs_date" name="cs_date" readonly="readonly" value="<?php echo date("d-m-Y H:i:s");?>" placeholder="DD-MM-YYYY">
                            <input type="hidden" name="today" value="<?php echo date("Y-m-d H:i:s")?>" id="today">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>End Date<div style="color:red;float: right;">*</div>  <i class="fa fa-calendar"></i></label>
                            <input class="form-control" readonly="readonly" id="e_date" name="e_date"  placeholder="Enter End Date" value="<?php echo date('d-m-Y H:i:s') ?>" >                               
                        </div>
                    </div>
                    
                    
                </div>
                 <div class='row'>
                     <div class="col-lg-3">
                        <div class="form-group">
                            <label>Selects Status</label>
                            <select class="form-control" id="states" name="states">
                                <!--<option>Pending</option>-->
                                <!--<option selected="selected">Done</option>-->  
                            </select>
                        </div>
                    </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                            <label>Comments</label>
                            <textarea class="form-control" rows="2" name="comments" id="comments"></textarea>
                        </div>
                    </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                            <label></label><br><br>
                             <button type="submit" class="btn btn-default" value="Save">Done</button>
                            <!--<textarea class="form-control" rows="2" name="comments" id="comments"></textarea>-->
                        </div>
                    </div>
                     
                      
                 </div>
                
               
            </form>
        </div>
    </div>








</div>

<!-- <script src="http://cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js" type="text/javascript"></script>
 <script>
    webshims.setOptions('forms-ext', {types: 'date'});
    webshims.polyfill('forms forms-ext');

</script>-->
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

<script type="text/javascript">

    function date_select() {
        var priority_type = document.getElementById("priority_type").value;

        if (priority_type == 'High') {
            document.getElementById("s_date").value = null;
            document.getElementById("e_date").value = null;
        } else {

//           document.getElementById("s_date").value='t';
//           document.getElementById("e_date").value=<?php // echo date("d-m-Y h:i:sa");  ?> ;
        }

    }

</script>

<script type="text/javascript">
    function select_ID_Name() {
        var id = document.getElementById("hidden_id").value;
        var assign_by = document.getElementById("assign_by").value;
        if (assign_by == 'Self') {
            document.getElementById("employee_id").value = id;
            change_sub_items();
        } else {
//           document.getElementById["employee_name"].selectedIndex = 0; 
//           document.getElementById["employee_id"].selectedIndex = 0;
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 0;
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 0;
        }

//       $("#assign_by").change(function() {
//		$("#sub_task").load("<?php echo base_url(); ?>textdata/" + $(this).val() + ".txt");
//	});

    }

</script>
<script>
    function validateForm() {

        document.getElementById("info_span").innerHTML = "";
//    $('html,body').scrollTop(0);

        var x = document.forms["assign_task_from"]["employee_id"].selectedIndex;
        if (x == null || x == 0) {
            document.getElementById("info_span").innerHTML = "Please Select Employee ID";
            submit_or_not = 1;
        }

        var x = document.forms["assign_task_from"]["employee_name"].selectedIndex;
        if (x == null || x == 0) {
            document.getElementById("info_span").innerHTML = "Please Select Employee Name";
            submit_or_not = 1;
        }

        var x = document.forms["assign_task_from"]["type_task"].selectedIndex;
        if (x == null || x == 0) {
            document.getElementById("info_span").innerHTML = "Please Select Type Task";
            submit_or_not = 1;
        }

        var x = document.forms["assign_task_from"]["sub_task"].value;
        if (x == null || x == "") {
            document.getElementById("info_span").innerHTML = "Please Select Task Details";
            submit_or_not = 1;
        }

        var x = document.forms["assign_task_from"]["assign_by"].selectedIndex;
        if (x == null || x == 0) {
            document.getElementById("info_span").innerHTML = "Please Select Assign By";
            submit_or_not = 1;
        }

    }
</script>

<script>
    function null_from() {

        document.forms["assign_task_from"]["employee_id"].selectedIndex = 0;
        document.forms["assign_task_from"]["employee_name"].selectedIndex = 0;
        document.forms["assign_task_from"]["type_task"].selectedIndex = 0;
        document.forms["assign_task_from"]["sub_task"].value = null;
        document.forms["assign_task_from"]["mis_mq_ticket_id"].value = null;
        document.forms["assign_task_from"]["client_bts_provider_name"].value = null;
        document.forms["assign_task_from"]["assign_by"].selectedIndex = 0;
        document.forms["assign_task_from"]["comments"].value = null;
//      document.getElementById("myTextarea").value

    }
    
function pick_olt(){
    var bts = $('#bts').val();

        $.post('<?php echo base_url(); ?>index.php/hd_controller/pick_olt', {
            bts: bts
        }, function (OLT_data) {
                
                    var OLT_array = JSON.stringify(OLT_data);
                    var new_OLT_Array = JSON.parse(OLT_array);
                    
//                    alert("OLT NAME ...."+new_OLT_Array[1]["OLT_Name"]);
                    var select_OLT = 0;
                    document.getElementById("olt").innerHTML = null;
                    document.getElementById("olt").value = null;
                    for (var i in new_OLT_Array) {
                        //    alert("splite...."+newArr[i]["OLT_Name"]);
                        if (select_OLT == 0) {
                            select = document.getElementById("olt");
                            var opt = document.createElement('option');
                            opt.value = "Select OLT NAME";
                            opt.innerHTML = "Select OLT NAME";
                            select.appendChild(opt);

                            var select_OLT = 1;
                        }
                        select = document.getElementById("olt");
                        var opt = document.createElement('option');
                        opt.value = new_OLT_Array[i]["OLT_Name"];
                        opt.innerHTML = new_OLT_Array[i]["OLT_Name"];
                        select.appendChild(opt);
                    }        
        }, 'JSON');

}
</script>


<script src="../../js/jquery.min.js" type="text/javascript"></script>
 <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->

<script>
    $("form#fonoc_task_from").submit(function () {
       
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/link3_controller/fonoc_save_task/'); ?>",
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
//                sss
                alert('Successfully Done');
                null_from();
//             document.getElementById("info_span").innerHTML = "Successfully Done The Task";//                
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
