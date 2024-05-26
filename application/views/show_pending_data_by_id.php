
<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Search By ID
                        </h3>
                        <ol class="breadcrumb">
<!--                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Search By ID
                            </li>-->
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
               <div class="row">
 
                    <div class="col-lg-12">
<!--                        <h3 class="page-header">
                            Forms
                        </h3>-->

                        <form action="<?php echo base_url();?>index.php/welcome/search_by_id_pending_list" method="post">
                          <div class='row'> 
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Search</label>
                                    <input class="form-control" name="id" placeholder="Enter id">
                                </div>
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
                                        <th>Type Task</th>
                                        <th>Task</th>
                                        <th>Assign By</th>
                        
                                        <th>Start Date</th>
                                       
                                        <th>Pending Time</th>
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
                                echo '<tr>' . '<td class="e_id">' . $value->id . '</td>' .'<td>' . $value->type_task . '</td>'
                                            .'<td>' . $value->sub_task . '</td>' .'<td>' . $value->assign_by . '</td>' 
                                            . '<td>' . $value->start_date . '</td>' 
                                            . '<td>' .   


$datetime1 = $values['start_date'];
$datetime2 = date("d-m-Y");

$dt1 = strtotime($datetime1);
$dt2 = strtotime($datetime2);

$seconds_diff = $dt2 - $dt1;
$interval = floor($seconds_diff/3600/24);

echo $interval. "&nbsp;day ";
 '</td>'.
                                            '<tr/>';
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
