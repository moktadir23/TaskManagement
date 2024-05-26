
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              SD: Pending Task Search By TKI
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
            <form action="<?php echo base_url('index.php/sd_controller/sd_pending_task_by_tki/'); ?>" name="search_by_zone" id="search_by_zone" method="POST">
                <div class="row">

                    <div class="col-lg-3" style="">
                        <div class="form-group">
                            <label>TKI ID <div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="tki_id" id="tki_id" placeholder="Enter TKI ID" required="">
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
                            <th>Task Type</th>
                            <th>Start Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
<?php

if($pending_list_result != null){ 
    
foreach ($pending_list_result as $value) {
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
                                <td><?php echo $value['Status']; ?></td> 
                                 <td>
                                    
                                    <a href="<?php echo base_url(); ?>index.php/sd_controller/sd_edit_tsk/<?php echo $value['ticket_no'];  ?>"><button>Edit</button></a> &nbsp;
                                    <a href="<?php echo base_url(); ?>index.php/sd_controller/sd_followup_task_from/<?php echo $value['ticket_no']; ?>"><button>Update</button></a> &nbsp;
                                      <!--<a href="<?php echo base_url(); ?>index.php/sd_controller/sd_review/<?php echo $value->id; ?>"><button>Review</button></a> &nbsp;-->
                                    </td>
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





