


<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?php
                $Zone = $this->session->userdata('Zone'); 
                $department = $this->session->userdata('department');
                $user_type = $this->session->userdata('u_type');
                if($department=='MTU'){
                   echo  $Zone.' Zone DashBoard';
                }else{
                   echo ' DashBoard '.$department;
                }
                ?>
            </h1>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-4" style=""></div>
                <div class="col-lg-6"></div>
                <div class="col-lg-3"></div>
            </div>


<h3 class="IPTS_titel"> IPTS TEAM </h3>
 <!--......................................IPTS Team................................................................-->                       
                        
<?php if ($department == "IPTS" || $department == "Admin") { ?>   
                        <h3> IPTS Task Details </h3>
                      <table class="table table-bordered table-hover">                          
                            <thead>
                                <tr>
                                    <!--<th>Zone</th>-->
                                    <th>ID</th>
                                    <th>pending</th>
                                    <th>Done(today)</th>
                                    <th>Total</th>
                                    
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $total_IPTS=0;
                                foreach ($IPTS_Details as $key => $IPTS_values) {
                                    $total_IPTS = $IPTS_values['pending'] + $IPTS_values['done'];
                                    if ($total_IPTS > 0) {
                                        ?>  
                                        <tr> 
                                            <td><?php echo $IPTS_values['Engineer_ID']; ?> &nbsp; ( <?php echo $IPTS_values['Engineer_Name']; ?> )</td>
                                            <td><a href="<?php echo base_url(); ?>index.php/ipts_controller/DB_A_IPTS_pend_task_by_E_ID/<?php echo $IPTS_values['Engineer_ID']; ?>"><?php echo $IPTS_values['pending']; ?></a></td>
                                            <td><?php echo $IPTS_values['done']; ?></td>
                                            <td><?php echo $IPTS_values['pending'] + $IPTS_values['done']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>  
                        
<?php } ?>      
           
  </div></div></div>               