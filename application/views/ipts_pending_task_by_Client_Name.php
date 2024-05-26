
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              IPTS Team: Pending Task Search By Client Name
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
            <form action="<?php echo base_url('index.php/ipts_controller/ipts_pending_task_by_C_N/'); ?>" name="search_by_zone" id="search_by_zone" method="POST">
                <div class="row">

                    <div class="col-lg-3" style="">
                        <div class="form-group">
                            <label>Client Name: <div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="Client_Name" id="Client_Name" placeholder="Enter Client Name" required="">
<!--                            <select class="form-control" name="Engineer_Name" id="Engineer_Name" onchange="pick_engineer_id()"  required="">
                                 <option value="">Select Engineer Name</option>
                            </select>-->
                        </div>
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
                            <th>TKI ID </th>
                            <th>Task Type</th>                                       
                            <th>Initial Problem Category</th>
                            <th>Employee ID (Name)</th>                          
                            <th>Support type</th>
                            <th>Start Date</th>
                            <th>Status</th>
                            <th>Comments</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
<?php

if($pending_list_result != null){
    
foreach ($pending_list_result as $value) {
    $p_key=$value['p_key'];
    ?>  

                        <tr> 
                                <td><?php echo $value['Client_id']; ?></td>
                                <td><?php echo $value['Client_Name']; ?></td>
                                <td><?php echo $value['tki_id']; ?></td>
                                <td><?php echo $value['type_task']; ?></td>
                                <td><?php echo $value['Initial_Problem_Category']; ?></td>
                                <td><?php echo $value['Engineer_Name']; ?> ( <?php echo $value['Engineer_ID']; ?> )</td>     
                                <td><?php echo $value['support_type']; ?></td>
                                <td><?php echo $value['s_date']; ?></td>
                                <td><?php echo $value['status']; ?></td>
                                <td><?php echo $value['comments']; ?></td>
                                
                             

                                
                                <td>
                                    <!--<a href="<?php echo base_url(); ?>index.php/welcome/CS_edit_task/<?php // echo $value['p_key']; ?>"><button>Edit</button></a> &nbsp;-->
                                    <a href="<?php echo base_url(); ?>index.php/ipts_controller/ipts_done_task_from/<?php echo $value['p_key']; ?>"><button>Done Task</button></a> &nbsp;
                                    <!--<a href="<?php echo base_url(); ?>index.php/welcome/cs_pending_task/<?php echo $value['p_key']; ?>"><button>Done Task </button></a> &nbsp;--> 
                                    <!--<a href="<?php echo base_url(); ?>index.php/welcome/cs_task_transfer_funcation/<?php echo $value['p_key']; ?>" onclick="return check_transfer();"><button>Transfer Task</button> </a>-->
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


