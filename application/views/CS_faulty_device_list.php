<!--<h1>under construction</h1>-->
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
             Device Faulty/Changed List 
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
<!--            <form action="" name="CS_task_from" id="CS_task_from" method="">
                <div class='row'> 
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Sub Zone <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Sub_Zone" id="Sub_Zone" required="">
                                <option value="" >Select Task Type</option>
                            </select>
                        </div>
                    </div>
                    
                </div>
               
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-default" value="save" >Save</button>
            </form>-->

    <form action="<?php echo base_url('index.php/welcome/CS_faulty_device_list/'); ?>" name="search_by_zone" id="search_by_zone" method="POST">
       <div class="row">
        <div class="col-lg-3"> 
                        <div class="form-group">
                            <label> Zone <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="Zone" id="Zone" required="">
                                <option value="0" >All Zone</option>
                            </select>
                        </div>
        </div>
           
        <div class="col-lg-3" style="">
            <div class="form-group">
                <label>Search By Support Office: <div style="color:red;float: right;"></div></label>
                <select class="form-control" name="Sub_Zone" id="Sub_Zone">
                    <option value="0" >All Support Office</option>
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

            
    <div class="row"><div class="col-lg-3">
  
    <br></div></div>           
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Client ID</th>
                            <th>Client Name</th>
                            <th>Date</th>
                            <th>Support Office</th>                         
                            <th>CTID Number SR</th>
                            <th>Engineer Name</th>                
                            <th>Old Device Serial Number</th>
                            <th>New Device Serial Number</th>

                        </tr>
                    </thead>
                    <tbody>
<?php
//      echo '<pre>';
//      print_r($pending_list_result);
if($pending_list_result!=null){
foreach ($pending_list_result as $value) {
    $p_key=$value['p_key'];
     $old_device_SN=$value['old_device_SN'];
     $new_device_SN=$value['new_device_SN'];
    if( $old_device_SN != null ||  $new_device_SN != null){
    ?>  
                            <tr> 
                                <td><?php echo $value['Client_ID']; ?></td>
                                <td><?php echo $value['Client_Name']; ?></td>
                                <td><?php echo $value['end_date']; ?></td>
                                <td><?php echo $value['Sub_Zone']; ?></td>
                                <td><?php echo $value['CTID_Number_SR']; ?></td>
                                <td><?php echo $value['Engineer_Name']; ?></td>
                                <td><?php echo $value['old_device_SN']; ?></td>
                                <td><?php echo $value['new_device_SN']; ?></td>
                            </tr> 
                                
                                
    <?php } } }?>
                                
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
 <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->



<script type="text/javascript">
function pick_pending_list_by_zone(){
   
    var Sub_Zone = $('#Sub_Zone').val();
     alert("TEST"+Sub_Zone);
    exit();
        $.post('<?php echo base_url();?>index.php/welcome/pick_engineer_id', {
            Sub_Zone: Sub_Zone
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


