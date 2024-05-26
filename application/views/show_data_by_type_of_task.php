
<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                           NOC Search Done Task by type of Task 
                       </h3>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Search by type of Task 
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

                        <form action="<?php echo base_url();?>index.php/welcome/show_data_by_type_of_task_funcation" method="post">
                          <div class='row'> 
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Search</label>
<select class="form-control" name="type_task" id="type_task">
                                <option  value="0">Select Task Type</option>
</select>
                                    
                                    <!--<input class="form-control" name="type_task" placeholder="Enter Type of Task">-->
                                </div>
                            </div>
                         <div class="col-lg-3">
                                    <label>From Date</label>
                                    <input type="" name="date_from" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="start_date_id" class="form-control" placeholder="Enter from Date" required=""/>
                                </div>
                                <div class="col-lg-3">
                                    <label>To Date</label>
                                    <input type="" name="date_to" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="end_date_id" class="form-control" placeholder="Enter To Date" required=""/>
                                </div>
                                <div class="col-lg-3">
                                   
                                  <br>  <button type="submit" class="btn btn-default" value="save">Search</button>
                                </div>
                          </div>   
<!--                            <div class="row">
                                <div class="col-lg-3">
                            <button type="submit" class="btn btn-default" value="save">Search</button>
                                </div>
                            </div>-->
                            </form>
<br>



<div class="row">
    <div class="col-lg-12">
<div class="table-responsive">
 
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID (Name)</th>
                                        <th>Priority Type</th>
                                        <th>Type Task</th>
                                        <th>Sub-Task</th>
                                        <th>Assign By</th>
                                        <th>MIS / MQ ticket id</th>
                                        <th>Client / BTS / Provider Name</th>
                                       
                                        <th>Start Date</th>
                                      
                                        <th>End Date</th>  
                                    </tr>
                                </thead>
                                
                                <tbody>
  <?php
  $total=0;
//                    if (isset($result_display)) {
//                        echo "<p><u>Result</u></p>";
//                        if ($result_display == 'No record found !') {
//                            echo $result_display;
//                        } else {
  if( $result_display != null ){
    
                               foreach ($result_display as $value) {
                                   $total++;
                                echo '<tr>'
                                           . '<td class="e_id">' . $value->id .'('.$value->name. ') </td>' 
                                            .'<td>' . $value->priority_type . '</td>'
                                            .'<td>' . $value->type_task . '</td>' 
                                            .'<td>' . $value->sub_task . '</td>'
                                            .'<td>' . $value->assign_by . '</td>'
                                            .'<td>' . $value->mis_mq_ticket_id . '</td>'
                                            .'<td>' . $value->client_bts_provider_name . '</td>'
                                            . '<td>' . $value->start_date . '</td>'
                                            . '<td>' . $value->end_date . '</td>'
                                  .  '<tr/>';
                                }
  echo '<b>Total Number : </b>'.$total.'<br>';                                 
                            echo '</table>';
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


<?php
//echo '<pre>';
//print_r($search_id);


echo "<script type=\"text/javascript\">";
foreach ($search_id as $value) {
    echo "var x = document.getElementById(" . $value['Select_Name'] . ");";
    echo "var option = document.createElement(\"option\");";
    echo "option.text =" . $value['CateGory_Description'] . ";";
    echo "option.value =" . $value['D_Value'] . ";";
    echo "x.add(option,x[" . $value['Indexx'] . "]);";
}
echo "</script>";
?>