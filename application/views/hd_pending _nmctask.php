
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                HD: Pending NMC Status & Outbound 
            </h1>

            <!--                        <ol class="breadcrumb">
                                        <li>
                                            <i class="fa fa-dashboard"></i>  <a href="#">Dashboard</a>
                                        </li>
                                        <li class="active">
                                            <i class="fa fa-table"></i> Pending List
                                            
                                        </li>
                                    </ol>-->
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">

            
            <div class="row">
                <div class="col-lg-9" style="">
                    <b> search by :</b> &nbsp; 
                    <button type="button" class="btn btn-primary" onclick="location.href = '<?php echo base_url(); ?>index.php/hd_controller/hd_ptask_by_date'" /> Pending Task </button> &nbsp;
                    <!--<button type="button" disabled="disabled" class="btn btn-success"  onclick="location.href = '<?php echo base_url(); ?>index.php/ipts_controller/ipts_pending_task_by_date'">Date Range</button> &nbsp;-->
                    <!--<button type="button" disabled="disabled" class="btn btn-info"  onclick="location.href = '<?php echo base_url(); ?>index.php/ipts_controller/ipts_pending_task_by_C_N'">Client Name</button> &nbsp;-->
                    <!--<button type="button" class="btn btn-danger" onclick="location.href = '<?php echo base_url(); ?>index.php/welcome/search_cs_pending_task_by_CTID_SR'">Date Range</button>-->

                </div>
                <div class="col-lg-3">

                    <br>
                </div>

            </div>


            <div class="row">
                <div class="col-lg-3">
                </div>
                <div class="col-lg-6"></div>
                <div class="col-lg-3"></div>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Node Client</th>
                            <th>Down Time</th>
                            <th>SMS Down Time</th>
                            <th>TKI NO.</th>
                            <th>FW Team</th>
                            <th>Remark</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>                       
<?php
  foreach ($pending_task_result as $value) {  
   $id=$value['id'];
    ?>  

                            <tr> 
                                <td><?php echo $tki=$value['n_type']; ?></td>
                                <td><?php echo $value['node_client']; ?></td>
                                <td><?php echo $value['down_time']; ?> </td>
                                <td><?php echo $value['sms_down_time']; ?></td>
                                <td><?php echo $value['tki']; ?></td>
                                <td><?php echo $value['fw_team']; ?></td>
                                <td><?php echo $value['remark']; ?></td>
                                <td>
                                   <a href="<?php echo base_url(); ?>index.php/hd_controller/hd_nmc_done/<?php echo $value['id']; ?>"><button>Done Task</button></a>
                                </td>
                            </tr>    
<?php } ?>
                              
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