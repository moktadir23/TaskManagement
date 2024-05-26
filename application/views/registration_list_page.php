<div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Registration List
                        </h1>
                            
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i>  Registration List
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
<!--                                <h3>Registration List</h3>-->
                            </div>
                            <div class="col-lg-3">
                               
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        
                                        <th>ID</th>
                                        <th>Name </th>
                                        <th>Email Address</th>
                                        <th>Password</th>
                                        <th>Type User</th>
                                        <th>Department</th>                                      
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody> 
  <?php
//      echo '<pre>';
//      print_r($result);
   foreach ($result as $key=>$values)
  {
  ?>  
                                    
                                    <tr>  
                                       <td><?php echo $values['id']; ?></td>
                                        <td><?php echo $values['name']; ?></td>
                                        <td><?php echo $values['email']; ?></td>
                                         <td><?php echo $values['password']; ?></td>
                                         <td><?php echo $values['type_user']; ?></td>
                                        <td><?php echo $values['department']; ?></td>
                                        
                                        <td>
                                            <a>Edit </a>| 
                                              <a>Delete</a>
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
                <!-- /.row -->

                
                <!-- /.row -->

                
                <!-- /.row -->

            </div>