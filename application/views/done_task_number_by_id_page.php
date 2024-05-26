<div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Summary of Task Done
                        </h1>
                            
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Report List
                                
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
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
                        <div class="table-responsive col-lg-6">
                            <table class="table table-bordered table-hover">
                                <thead> 
                                    <tr>      
                                        <th>Type of Task</th>
                                        <th>Number of Ticket Done</th> 
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $T_T = 0;
//                                            echo '<pre>';
//                                            print_r($result);
//                                          $x=$values['count(*)'];
                                    
                                         foreach ($result as $key=>$values)
                                        {
                                    ?>
                                    <tr>
                                        <td>
                                          <?php echo $values['type_task']; ?>   
                                        </td>
                                        <td>
                                            <?php
                                               echo $values['count(*)']; 
                                               $T_T = $T_T + $values['count(*)'];                                        
                                           ?>
                                        </td>
                                    </tr>
                                
                                   <?php
                                        }        
                                    ?>
                                    
                                    <tr>
                                        <td><b> Total Task &nbsp; =</b></td>
                                        <td>
                                          <?php echo  $T_T; ?>   
                                        </td>
                                        
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                    </div>
                    
                </div>
            
            </div>