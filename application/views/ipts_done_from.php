<!--<h1>under construction</h1>-->
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid" onload="myFunction()">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              IPTS : Done Task From
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
        <form action="<?php echo base_url() ?>index.php/ipts_controller/ipts_update_task" name="update_task_from" id="update_task_from" method="POST">
              
        <input type="hidden" class="form-control" id="p_key" name="p_key" value="<?php echo $pending_task_result->p_key; ?> "> 
        <input type="hidden" id="Initial_Problem_Category" name="Initial_Problem_Category" value="<?php echo $pending_task_result->Initial_Problem_Category; ?>"> 
       
                <div class="row">    
                   
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>End date & time <div style="color:red;float: right;"></div><i class="fa fa-calendar"></i><div style="color:red;float: right;">*</div></label>
                          <input  class="form-control" id="cs_date" name="cs_date" readonly="readonly" value="<?php echo date("d-m-Y H:i:s");?>" placeholder="DD-MM-YYYY" required="">
                        </div>
                    </div> 
                    <div class="col-lg-6">
                        <div class="form-group">
                          <label>Comments <div style="color:red;float: right;"></div><div style="color:red;float: right;">*</div></label>
                          <textarea class="form-control" rows="2" name="comments" id="comments" required=""><?php echo $pending_task_result->comments; ?></textarea>
                        
                        </div>
                    </div>
                     
                </div>
                
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-default" value="save" >Update</button>
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
    $("form#assign_task_from").submit(function () {
        validateForm();
        if (submit_or_not == 1)
        {
            exit;
        }
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/welcome/save_task_info_funcation/'); ?>",
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
<!--<script>
      $(function() {		
            $("#CS_status_of_TKI").change(function() {
               var Initial_Problem_Category=document.getElementById("Initial_Problem_Category").value;
//                alert("TEST"+Initial_Problem_Category);
                    $("#Final_Resolution").load("<?php echo base_url(); ?>CS_Final_Resolution/" + Initial_Problem_Category + ".txt");
            });
    });
</script>-->

<script>
      $(function() {		
            $("#Support_Type").change(function() {
               var Division=document.getElementById("Division").value;
//                alert("TEST"+Initial_Problem_Category);
                    $("#Technician_Name").load("<?php echo base_url(); ?>wi_technician_list/" + Division + ".txt");
            });
    });
</script>