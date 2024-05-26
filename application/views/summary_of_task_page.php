<div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                           Summary of Pending Task..
                        </h3>
                            
                        <ol class="breadcrumb">
<!--                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-exclamation-circle"></i> Pending Task
                                
                            </li>-->

<div style="color: #00b300;" > <b>
 <?php
    $message=$this->session->userdata('message');
    if(isset($message))
    {
        echo $message;
        $this->session->unset_userdata('message');
    }
    ?>
</b></div>
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
                        </div>     
-->


           <br>
                        <div class="row">
                           
                        <div class="table-responsive col-lg-10">
                            <h3>Pending Task Table</h3>
                            <table class="table table-bordered table-hover">
                                <thead> 
                                    <tr>      
                                        <th>Type of Task</th>
                                        <th> Number of Pending Task</th>
                                   
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
                                        
                                         <a href="<?php echo base_url(); ?>index.php/welcome/pending_task_detail_funcation/<?php echo $values['type_task']; ?>"><?php echo $values['type_task']; ?></a>
                                        </td>
                                        <td> 
                                                <?php
                                                    $result = $values['count(*)'];

                                                    if ($result >= "0") {
                                                        echo $values['count(*)'];
                                                    } else {
                                                         echo "NULL";
                                                    }
                                                ?>
                                                 
                                        </td>
                                    </tr>
                                   <?php
                                        }
                                    ?>
                                
                                </tbody>
                            </table>
                        </div>
<!--                            <div class="col-lg-6">
                                <h3>Pending Task Details  Table</h3>
                            <table class="table table-bordered table-hover">
                                <thead> 
                                    <tr>      
                                        <th>Type of Task</th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>
                                          Infrastructure
                                        </td>
                                        <td>
                                             <a href="<?php echo base_url(); ?>index.php/welcome/pending_infrastructure_funcation.html">Details</a>    
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                          Corporate 	
                                        </td>
                                        <td>
                                             <a href="<?php echo base_url(); ?>index.php/welcome/pending_corporate_funcation.html">Details</a>    
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                          FTTX
                                        </td>
                                        <td>
                                             <a href="<?php echo base_url(); ?>index.php/welcome/pending_FTTX_funcation.html">Details</a>    
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                          Meeting / Presentati
                                        </td>
                                        <td>
                                             <a href="<?php echo base_url(); ?>index.php/welcome/pending_FTTX_funcation.html">Details</a>    
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>
                                          Project Work
                                        </td>
                                        <td>
                                             <a href="<?php echo base_url(); ?>index.php/welcome/pending_project_work_funcation.html">Details</a>    
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>
                                         R&D
                                        </td>
                                        <td>
                                             <a href="<?php echo base_url(); ?>index.php/welcome/pending_R_D_funcation.html">Details</a>    
                                        </td>
                                    </tr> 
                                </tbody>
                              </table>
                            </div>-->
                         </div>
                        </div>
                    </div>                    
                </div>
            </div>