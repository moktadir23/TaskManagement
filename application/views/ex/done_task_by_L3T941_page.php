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
                        <div class="table-responsive col-lg-6">
                            <table class="table table-bordered table-hover">
                                <thead> 
                                    <tr>      
                                        <th>Employee ID</th>
                                        <th>Total Number of Ticket Done</th>                                         
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
                                        <td>
                                         <?php echo $values['type_task']; ?>   
                                        </td>
                                        <td> <?php echo $values['count(*)']; ?></td>
                                    </tr>
                                   <?php
                                        }
                                    ?>
                                    
                                    
                                    
                                    
<!--                                    <tr>      
                                        <td>
                                         Total Number of Pending Ticket =  
                                        </td>
                                    <?php
//      echo '<pre>';
//      print_r($result);
                                         foreach ($result as $key=>$values)
                                        {
                                    ?>
                                        <td> <?php echo $values['count(*)']; ?></td>  
                                   <?php
                                        }
                                    ?>
                                    </tr>-->
                                    
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                    </div>
                    
                </div>
            
            </div>