


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

<h3 class="ERT_titel"> ERT TEAM </h3>

<?php 
 $user_type = $this->session->userdata('u_type');
if ($department == "ERT" || $department == 'Admin') {
    if($user_type=='a_user' || $user_type=='s_user' || $user_type == 'admin'){
    ?>  
        <h3> ONU Status Summery in 2019</h3>
                      <table class="table table-bordered table-hover">                          
                            <thead>
                                <tr>
                                    <th>STATUS</th>
                                    <th>BOGRA</th>
                                    <th>CTG</th>
                                    <th>DHAKA </th>                                    
                                    <th>KHULNA</th>
                                    <th>SYLHET</th>
                                    <th>TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $total=0;
                               
                                foreach ($ERT_Zone_result as $key => $values) {
                                    $total = $values['Bogra'] + $values['CTG']+ $values['Dhaka']+ $values['Khulna']+ $values['Sylhet'];
                                    if ($total > 0) {
                                        
                                        ?>  
                                        <tr> 
                                            <td><?php echo $values['Status']; ?></td>
                                            <td><?php echo $values['Bogra']; ?></td>
                                            <td><?php echo $values['CTG']; ?></td>
                                            <td><?php echo $values['Dhaka']; ?></td>
                                            <td><?php echo $values['Khulna']; ?></td>
                                            <td><?php echo $values['Sylhet'];?></td>
                                            <td><?php echo $total;?></td>
                                        </tr>
                                        <?php
                                      }
                                   }
                               
                                ?>
                            </tbody>
                        </table>                
    <!--..................................................................................................................................-->                      
   <?php  }  ?>  
    
   <?php
   
   if($user_type=='distributor' || $user_type=='s_user' || $user_type == 'admin') {?> 
    <h3> Distributor ONU Collection Summery in 2019</h3>
                      <table class="table table-bordered table-hover">                          
                            <thead>
                                <tr>
                                    <th>Distributor Name</th>
                                    <th>Re-Active</th>
                                    <th>Collected</th>
                                    <th>Device Lost </th>  
                                    <th>Total </th> 
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $total=0;
                               
                                foreach ($ERT_distributor as $key => $values) {
                                    $total =  $values['Collected']+ $values['Device_lost'];
                                    if ($total > 0) {
                                        
                                        ?>  
                                        <tr> 
                                            <td><?php echo $values['Distributor']; ?></td>
                                            <td><?php echo $values['Active']; ?></td>
                                            <td><?php echo $values['Collected']; ?></td>
                                            <td><?php echo $values['Device_lost']; ?></td>
                                            <td><?php echo $total;?></td>
                                        </tr>
                                        <?php
                                      }
                                   }
                               
                                ?>
                            </tbody>
                        </table>   
   <?php }  ?>
<!--........................................................................................................-->                        
                        <h3> ERT Task Details </h3>
                      <table class="table table-bordered table-hover">                          
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>pending</th>
                                    <th>Done(today)</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $total_ERT=0;
                               
                                $e_id=$this->session->userdata('id');
                                foreach ($ERT_result as $key => $values) {
                                    $employee_id=$values['employee_id'];
                                    $total_ERT = $values['pending'] + $values['done'];
                                    if ($total_ERT > 0) {
                                        if($user_type=='a_user' || $user_type=='s_user' || $user_type == 'admin'){
                                        ?>  
                                        <tr> 
                                            <td><?php echo $values['employee_id']; ?> &nbsp; ( <?php echo $values['employee_name']; ?> )</td>
                                            <td><?php echo $values['pending']; ?></td>
                                            <td><?php echo $values['done']; ?></td>
                                            <td><?php echo $values['pending'] + $values['done']; ?></td>
                                        </tr>
                                        <?php
                                    }else{  
                                        if($e_id==$employee_id){
                                        ?>
                                         <tr> 
                                            <td><?php echo $values['employee_id']; ?> &nbsp; ( <?php echo $values['employee_name']; ?> )</td>
                                            <td><?php echo $values['pending']; ?></td>
                                            <td><?php echo $values['done']; ?></td>
                                            <td><?php echo $values['pending'] + $values['done']; ?></td>
                                        </tr>
                                        
                                        <?php  }  }
                                    
                                }
                                }
                                ?>
                            </tbody>
                        </table>  
                        
<?php } ?>                    
           
  </div></div></div>               