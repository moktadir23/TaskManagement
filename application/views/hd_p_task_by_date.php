
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              HD Team: Pending Task Search
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
            <form action="<?php echo base_url('index.php/hd_controller/hd_ptask_by_date/'); ?>" name="search_by_zone" id="search_by_zone" method="POST">
                <div class="row">
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
if($pending_task_result != null){
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
<?php
echo "<script type=\"text/javascript\">";
foreach ($from_value as $value) {
    echo "var x = document.getElementById(" . $value['Select_Name'] . ");";
    echo "var option = document.createElement(\"option\");";
    echo "option.text =" . $value['CateGory_Description'] . ";";
    echo "option.value =" . $value['D_Value'] . ";";
    echo "x.add(option,x[" . $value['Indexx'] . "]);";
}
echo "</script>";
?>
