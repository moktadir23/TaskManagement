
<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Search By ID
                        </h3>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Search By ID
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
               <div class="row">
 
                    <div class="col-lg-12">
<!--                        <h3 class="page-header">
                            Forms
                        </h3>-->

                        <form action="<?php echo base_url();?>index.php/welcome/search_all_info_by_id_and_date_and_typetask__funcation" method="post">
                          <div class='row'> 
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Select</label>
                                        <select class="form-control" name="type_task">
                                            <option>Type of Task</option>
                                            <option>Infrastructure</option>
                                            <option>Corporate</option>
                                            <option>FTTX</option>
                                            <option>Project_Work</option>                                      
                                            <option>Meeting_or_Presentation</option>                                     
                                            <option>R_and_D </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>ID</label>
                                        <input type="text" name="id" class="form-control" placeholder="Enter ID"/>
                                    </div>
                                </div>
                                 
                                <div class="col-lg-3">
                                    <label>From Date</label>
                                    <input type="" name="date_from" id="start_date_id" class="form-control" placeholder="Enter from Date"/>
                                </div>
                                <div class="col-lg-3">
                                    <label>To Date</label>
                                    <input type="" name="date_to" id="end_date_id" class="form-control" placeholder="Enter To Date"/>
                                </div>
                                  
                        </div>
                            <div class="row">
                                <div class="col-lg-3">
                          <button type="submit" class="btn btn-default" value="save">Submit Button</button>
                            </div>
                                </div>   
                        </form>
<br>



<div class="row">
    <div class="col-lg-12">
<div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Sub Task</th>
                                        <th>Assign By</th>
                        
                                        <th>End Date</th>                                        
<!--                                        <th>Status</th>
                                        <th>Comments</th>
                                        <th>Action</th>-->
                                    </tr>
                                </thead>
<!--                                <tbody>
<?php
//      echo '<pre>';
//      print_r($result_display);
//      echo '</pre>';
//   foreach ($result_display as $key=>$values)
//         foreach ($result as $value)  
?>  
          

                                </tbody>-->
                                
                                
                                <tbody>
  <?php
                    if (isset($result_display)) {
                        echo "<p><u>Result</u></p>";
                        if ($result_display == 'No record found !') {
                            echo $result_display;
                        } else {
                               foreach ($result_display as $value) {
                                echo '<tr>' . '<td class="e_id">' . $value->id . '</td>' .'<td>' . $value->name . '</td>' .'<td>' . $value->sub_task . '</td>' .'<td>' . $value->assign_by . '</td>' . '<td>' . $value->end_date . '</td>' .  '<tr/>';
                                }
                            echo '</table>';
                        }
                    }
                    ?>        
                   
                                    
                                </tbody>
                                
                                
                            </table>
                        </div>    
</div>
    </div>
                    </div>
                   
                   
                </div>
            </div>
