
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              SD: Done Task Search By Client ID
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
            <form action="<?php echo base_url('index.php/sd_controller/sd_done_task_by_client_id/'); ?>" name="search_by_zone" id="search_by_zone" method="POST">
                <div class="row">

                    <div class="col-lg-3" style="">
                        <div class="form-group">
                            <label>Client ID<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="Client_id" id="Client_id" placeholder="Enter Client ID" required="">
                         
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
                            <th>Client Category</th>
                            <th>TKI ID</th>
                            <th>Source</th>
                            <th>Type Task</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Employee ID (Name)</th>  
                            <th>Action Type</th>
                            <th>Action Time</th> 
                            <th>comments</th>
                        </tr>
                    </thead>
                    <tbody>
<?php

if($done_list_result != null){
//    echo '<pre>';
//    print_r($pending_list_result);
    
    
    
foreach ($done_list_result as $value) {
    $ticket_no=$value['ticket_no'];
    ?>  

                        <tr> 
                               
                                <td><?php echo $value['Client_id']; ?></td>
                                <td><?php echo $value['Client_name']; ?></td>
                                <td><?php echo $value['Client_Category']; ?></td>
                                <td><?php echo $value['tki_id']; ?></td>
                                <td><?php echo $value['Source']; ?></td>
                                <td><?php echo $value['type_task']; ?></td>
                                <td><?php echo $value['s_date']; ?></td>
                                <td><?php echo $value['e_date']; ?></td>
                                <td><?php echo $value['Engineer_Name']; ?> ( <?php echo $value['Engineer_ID']; ?> )</td>
                                <td><?php echo $value['action_type']; ?></td>
                                <td><?php echo $value['action_time']; ?></td>
                                <td><?php echo $value['comments']; ?></td>   
                                
                            </tr>
                                
                                
                                
<?php } } ?>
  
                                
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


