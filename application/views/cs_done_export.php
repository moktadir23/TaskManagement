
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
             EXPORT Done Task..
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
 <form action="<?php echo base_url('index.php/welcome/cs_report_export_file/'); ?>" name="search_by_zone" id="search_by_zone" method="POST">            
<div class="row">
<!--    <form action="<?php echo base_url('index.php/welcome/search_cs_done_task_by_Zone/'); ?>" name="search_by_zone" id="search_by_zone" method="POST">-->
    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label> Zone <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Zone" id="Zone" required="">
                                <option value="0" >Select Zone</option>
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
             <button type="submit" class="btn btn-default" value="save">EXPORT</button>
<!--            &nbsp;<button type="button" class="btn btn-primary" onclick="location.href = '#'" /> Search </button>
            <button type="button" class="btn btn-primary" onclick="search();" /> Search </button>-->
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

