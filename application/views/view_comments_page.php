<div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Done Task List
                        </h1>
                            
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Done Task List
                                
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                      
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>                                        
                                        <th>Date</th>
                                        <th>Comments</th>                                        
<!--                                        <th>Status</th>
                                        <th>Comments</th>
                                        <th>Action</th>-->
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
                                        <td><?php echo $values['comments_date']; ?></td>
                                        <td><?php echo $values['comments']; ?></td>

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