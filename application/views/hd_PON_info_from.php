<?php
$id = $this->session->userdata('id');
$name = $this->session->userdata('name');


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
 
$btssql = "select BTS_Name from fonoc_bts_tbl Where Type='Link3 Own' Order by BTS_Name ";
$btsresult = $conn->query($btssql);
$conn->close();

?>



<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
               PON SMS Information
            </h3>
            <ol class="breadcrumb">
                <!--<div class="col-lg-4"></div>-->
                <h3 class="text-center"><span id="info_span"></span></h3>
            </ol>
        </div>
    </div>
    <div class="row">
        <?php
        $message = $this->session->userdata('message');
        if (isset($message)) {
            echo $message;
            $this->session->unset_userdata('message');
        }
        ?>
        <div class="col-lg-12">
            <form  name="assign_task_from" id="assign_task_from">
                <!--<input type="hidden" name="hidden_id" value="<?php echo $id;?>" id="hidden_id">-->
                <div class='row'>
                     <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>Date & time<div style="color:red;float: right;">*</div> <i class="fa fa-calendar"></i></label>                                  
                            <input  class="form-control" id="s_date" value="<?php echo date("d-m-Y H:i:s"); ?>" name="s_date"  placeholder="DD-MM-YYYY H:M:S" required="">
                        </div>
                    </div> 
                    
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>BTS Name<div style="color:red;float: right;">*</div></label>
<!--                            <select class="form-control" name="bts" onchange="pick_olt()" id="bts" required="">
                                <option value="" >Select BTS<option>
                              
                            </select>-->
                            <select class="form-control" name="bts" onchange="pick_olt()" id="bts"required="">
                                <option value="">Select OLT NAME</option>
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
                            <label>OLT Name <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="olt" id="olt" required="">
                                 <option value="">Select OLT NAME</option>
                            </select>
                        </div>
                    </div>  
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>PON/Port<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="pon_port" id="pon_port" placeholder="Enter PON/Port" required="">
                        </div>
                    </div>
                </div>
                
                 
                <div class="row">
                     
                     <div class="col-lg-3">
                        <div class="form-group">
                          <label>Number of MIS Client<div style="color:red;float: right;">*</div></label>
                          <input class="form-control" name="mis_n" onchange="total_clnt();" id="mis_n" placeholder="Enter MIS Client Number" required="">
                        </div>
                    </div>
                   <div class="col-lg-3">
                        <div class="form-group">
                          <label>Number of MQ Client<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="mq_n" onchange="total_clnt();" id="mq_n" placeholder="Enter MQ Client Number" required="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Total Client Number<div style="color:red;float: right;">*</div></label>
                          <input class="form-control" readonly="readonly" name="total" id="total" placeholder="Total Client Number" required="">
                        </div>
                    </div>
<!--                    <div class="col-lg-3">
                        <label>HD Zone</label>
                            <select class="form-control" name="Zone" id="Zone"  required="">
                                 <option value="">Select Zone</option>
                                 <option value="">CTG</option>
                                 <option value=""></option>
                            </select>    
                    </div> -->
                    <div class="col-lg-3">
                        <label>Employee Name</label>
                        <input class="form-control" readonly="readonly" name="Engineer_Name" id="Engineer_Name" value="<?php echo $name; ?>" placeholder="Enter Engineer Name" required="">
<!--                            <select class="form-control" name="Engineer_Name" id="Engineer_Name" onchange="pick_engineer_id();"  required="">
                                 <option value="">Select Engineer Name</option>
                            </select>    -->
                    </div>
                     
                </div>  
                
                <div class="row">
                    
                    <div class="col-lg-3">
                        <label>Employee ID</label>
                         <input class="form-control" readonly="readonly" name="Engineer_ID" id="Engineer_ID" value="<?php echo $id; ?>" placeholder="Enter Engineer ID" required="">
<!--                         <select class="form-control" name="Engineer_ID" id="Engineer_ID" required="">
                                 <option value="">Select Engineer ID</option>
                            </select>-->
                    </div>
                   <div class="col-lg-6">
                        <div class="form-group">
                          <label>Remarks<div style="color:red;float: right;">*</div></label>
                           <textarea class="form-control" rows="2" name="remarks" id="remarks"></textarea>
                        </div>
                    </div>
                     
                </div>
                <div class="row">
                    
                    <div class="col-lg-3">
                        <div class="form-group"><br><br>
                            <label></label>
                            <!--<textarea class="form-control" rows="2" name="comments" id="comments"></textarea>-->
                        <button type="submit" class="btn btn-default" value="save" >Save</button>
                        </div>
                    </div> 
                </div>
            </form>
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
                    $("#Engineer_Name").load("<?php echo base_url(); ?>hd_employee_list/" + $(this).val() + ".txt");
            });
    });
</script>

<script>
function null_from(){
    
      document.forms["assign_task_from"]["s_date"].value = <?php echo date("d-m-Y H:i:s");?>;
      document.forms["assign_task_from"]["bts"].value= null;
      document.forms["assign_task_from"]["olt"].value = null;
      document.forms["assign_task_from"]["mis_n"].value = null;
      document.forms["assign_task_from"]["mq_n"].value = null;
      document.forms["assign_task_from"]["total"].value = null;
      document.forms["assign_task_from"]["pon_port"].value=null;
//      document.forms["assign_task_from"]["Zone"].selectedIndex=0;
//      document.forms["assign_task_from"]["Engineer_Name"].value=0;
//      document.forms["assign_task_from"]["Engineer_ID"].value=0;   
      document.forms["assign_task_from"]["remarks"].value = null; 
//      document.getElementById("mis_n").value
      
}
</script>

<script>
    $("form#assign_task_from").submit(function () {
       
//        alert("WORK ON PAGE .TRY AGAIN FEW MINUTE LATER");
//        exit();
       
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/hd_controller/save_olt_info/'); ?>",
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
                alert('Successfully Done');
                null_from();
//                
//                
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
 

<script type="text/javascript">
    
 function total_clnt(){
    
    var mis_n = document.getElementById("mis_n").value;
    var mq_n =  document.getElementById("mq_n").value;
    document.getElementById("total").value=null; 
    if(mis_n != '' && mq_n != ''){
      var total = parseInt(mis_n)+ parseInt(mq_n) ;
      if(total>0){
        document.getElementById("total").value=total; 
      }
    }
    
 }   
    
function pick_engineer_id(){
    var Engineer_Name = $('#Engineer_Name').val();
//    var Engineer_Name = 'S M Zahirul Islam';
//    alert(Engineer_Name);
        $.post('<?php echo base_url();?>index.php/ert_controller/pick_engineer_id', {
            Engineer_Name: Engineer_Name
        }, function (search_info_data) {

//alert(search_info_data);

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
 