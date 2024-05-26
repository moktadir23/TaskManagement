<!--<h1>under construction</h1>-->
<?php
$id = $this->session->userdata('id');
?>
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->


 <!--<script src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>-->
 <!--<link rel="stylesheet" href="<?php base_url(); ?>style/format.css">-->

<script src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url(); ?>ckeditor/samples/js/sample.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>ckeditor/samples/css/samples.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
 
 
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
               Email Page
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
            <form action="" name="assign_task_from" id="assign_task_from" method="">
                <div class='row'>
                    <div class="col-lg-12">                            
                        <div class="form-group">
                            <label>To<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="to_send" id="to_send" placeholder="Enter Sender Address">
                        </div>
                    </div>  
                </div>
                <div class='row'>
                    <div class="col-lg-12">                            
                        <div class="form-group">
                            <label>CC<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="to_send" id="to_send" placeholder="Enter Sender Address">
                        </div>
                    </div>  
                </div>
                <div class='row'>
                    <div class="col-lg-12">                            
                        <div class="form-group">
                            <label>Subject<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="suject" id="suject" placeholder="Enter Email Subject">
                        </div>
                    </div>  
                </div>
                <div class='row'>
                    <div class="col-lg-12">                            
                        <div class="form-group">
                            <label>Attach File <div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="mis_mq_ticket_id" id="mis_mq_ticket_id" placeholder="Enter Attach File ">
                        </div>
                    </div>  
                </div>
                <div class='row'>
                    <div class="col-lg-12">                            
                        <div class="form-group">
                            <div id="main">
                                            <div id="editor">
                                                <h1>Dear Concern,</h1>
                                                <p></p>
                                            </div>
                                <script>
                                    initSample();
                                </script>

                            </div>
                            
                            
                        </div>
                    </div>  
                </div>
                
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-default" value="save" >Save</button>
            </form>
        </div>
    </div>
</div>

<!-- <script src="http://cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js" type="text/javascript"></script>
 <script>
    webshims.setOptions('forms-ext', {types: 'date'});
    webshims.polyfill('forms forms-ext');

</script>-->

