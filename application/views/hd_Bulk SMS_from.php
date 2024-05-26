<?php
$id = $this->session->userdata('id');
$name = $this->session->userdata('name');
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
                BULK SMS From
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
            <form  name="assign_task_from" action="<?php echo base_url(); ?>index.php/hd_controller/save_bulk_info/" id="assign_task_from" enctype="multipart/form-data" method="POST">
                <div class='row'>
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>SMS time <i class="fa fa-calendar"></i> <div style="color:red;float: right;"> *</div></label>
                            <input  class="form-control" id="s_date" value="<?php echo date("d-m-Y H:i:s"); ?>" name="s_date"  placeholder="DD-MM-YYYY H:M:S" required="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <label>Employee Name</label>
                        <input class="form-control" readonly="readonly" name="Engineer_Name" id="Engineer_Name" value="<?php echo $name; ?>" placeholder="Enter Engineer Name" required="">
                    </div>
                    <div class="col-lg-3">
                        <label>Employee ID</label>
                        <input class="form-control" readonly="readonly" name="Engineer_ID" id="Engineer_ID" value="<?php echo $id; ?>" placeholder="Enter Engineer ID" required="">
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Remarks<div style="color:red;float: right;">*</div></label>
                            <textarea class="form-control" rows="2" name="comments" id="comments" required=""></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>File Upload<div style="color:red;float: right;">*</div></label>                                  
                            <!--<input type="file" name="importfile" id="importfile">-->
                            <input type="file" id="upload" name="upload"/>
                            
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label></label>
                            <!--<textarea class="form-control" rows="2" name="comments" id="comments"></textarea>-->
                            <button type="submit" class="btn btn-default" value="Submit" >Save</button>
                        </div>
                    </div> 
                </div>  
            </form>
        </div>
    </div>
</div>

<script>
    function null_from() {


        document.forms["assign_task_from"]["s_date"].selectedIndex =<?php echo date("d-m-Y H:i:s"); ?>;
        document.forms["assign_task_from"]["comments"].value = null;
//      document.getElementById("myTextarea").value

    }
</script>

<!--<script>//
    $("form#assign_task_from").submit(function () {
       
//        alert("WORK ON PAGE .TRY AGAIN FEW MINUTE LATER");
//        exit();
       
       
       
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/hd_controller/save_bulk_info/'); ?>",
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
//</script>-->




<script src="../../js/jquery.min.js" type="text/javascript"></script>




