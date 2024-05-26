<div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                           Summary of Task Done
                        </h3>
                            
                        <ol class="breadcrumb">
<!--                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-check"></i> Done Task
                                
                            </li>-->
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        
<!--                        <div class="row">
                       
                            <div class="col-lg-3" style="">
                               <h4>  ID :  <a href="#">  <?php echo $_SESSION["id"];?> </a> </h4>
                            </div>                           

                            <div class="col-lg-5">
                               <h4>   Name : <?php echo $_SESSION["name"];?></h4>
                            
                            </div>
                            <div class="col-lg-4">
                               <h4>  Department : <?php echo $_SESSION["department"];?> </h4>
                            </div>
                        </div>                      -->
                        <div class="row">
                            <div class="col-lg-4" style="">
                               
                            </div>
                            <div class="col-lg-6">
<br>
                            </div>
                            <div class="col-lg-3">
                               
                            </div>
                        </div>
<div class="row">                        
<!--    <div class="col-lg-6">
                                <h3>Done Task Details  Table</h3>
                            <table class="table table-bordered table-hover">
                                <thead> 
                                    <tr>      
                                        <th>Employee ID</th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                          L3T1181
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>index.php/welcome/done_task_by_L3T1181_funcation.html">show Number of Done Task </a>&nbsp;|&nbsp;
                                            <a href="<?php echo base_url(); ?>index.php/welcome/detail_task_by_L3T1181_funcation.html"> Details </a>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>
                                          L3T941
                                        </td>
                                        <td>
                                             <a href="<?php echo base_url(); ?>index.php/welcome/done_task_by_L3T941_funcation.html">show Number of Done Task</a> &nbsp;|&nbsp;   
                                             <a href="<?php echo base_url(); ?>index.php/welcome/detail_task_by_L3T941_funcation.html"> Details </a>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>
                                          L3T685
                                        </td>
                                        <td>
                                             <a href="<?php echo base_url(); ?>index.php/welcome/done_task_by_L3T685_funcation.html">show Number of Done Task</a> &nbsp;|&nbsp;   
                                              <a href="<?php echo base_url(); ?>index.php/welcome/detail_task_by_L3T685_funcation.html"> Details </a>                                        
                                        </td>
                                    </tr>
                                    
                                </tbody>
                              </table>
                            </div>-->
    
    
    
    
    
    
    <div class="col-lg-10">
                                <h3>Done Task Table</h3>
                            <table class="table table-bordered table-hover">
                                <thead> 
                                    <tr>      
                                        <th>Employee ID</th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
//                                            echo '<pre>';
//                                            print_r($result);
                                         foreach ($result as $key=>$values)
                                        {
                                    ?>
                                    <tr>
                                        <td><?php echo $values['id']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>index.php/welcome/done_task_number_by_id_funcation/<?php echo $values['id']; ?>">Total Number of Task </a>&nbsp;|&nbsp;
                                            <a href="<?php echo base_url(); ?>index.php/welcome/detail_task_by_id_funcation/<?php echo $values['id']; ?>"> Details  </a>
                                        </td>
                                    </tr> 
                                <?php
                                        }
                                    ?>
                                
                                </tbody>
                              </table>
                            </div>
    
    
                    </div>
                    </div>
                    
                </div>
            
            </div>