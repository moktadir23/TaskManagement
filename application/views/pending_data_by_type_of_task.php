
<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Search by type of Task for Pending Task
                       </h3>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Search by type of Task ..
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

                        <form action="<?php echo base_url();?>index.php/welcome/pending_data_by_type_of_task_funcation" method="post">
                          <div class='row'> 
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Search </label>
                                    
                                    <!--<input class="form-control" name="type_task" placeholder="Enter Type of Task">-->
<select class="form-control" name="type_task" id="type_task">
                                <option  value="0">Select Task Type</option>
</select>
                                </div>
                            </div>
                         <div class="col-lg-3">
                                <div class="form-group">
                                   <br>
                                <button type="submit" class="btn btn-default" value="save">Search</button>
                                </div>
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
                                        <th>ID</th>
                                        <!--<th>Name</th>-->
                                        <th>Type Task</th>
                                        <th>Sub-Task</th>
                                        <th>Client / BTS / Provider Name</th>
                                         <th>MIS / MQ Ticket ID </th>
                                        <th>Assign By</th>
                                        <th>Transfer To</th>
                                        <!--<th>Start Date</th>-->                                       
                                        <th>Transfer Date</th>
                                        <th>Start Date & Pending Time</th>
                                        <th>States</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>                                  
                                                                 
<?php
//                    if (isset($result_display)) {
//                        echo "<p><u>Result</u></p>";
//                        if ($result_display == 'No record found !') {
//                            echo $result_display;
//                        } else {
if( $result_display != null ){
                               foreach ($result_display as $value) {
                                echo '<tr>' . '<td class="e_id">' . $value->id . '</td>' .'<td>' . $value->type_task . '</td>' .'<td>' . $value->sub_task . '</td>' .'<td>' . $value->client_bts_provider_name . '</td>' .'<td>' . $value->mis_mq_ticket_id . '</td>' .'<td>' . $value->assign_by . '</td>' . '<td>' . $value->transfer_to . '<td>' . $value->transfer_date . '</td>' .
                                        '<td>' .
                                            $datetime1 = $value->start_date;
                                            $datetime2 = date("d-m-Y");
//$interval = date_diff($datetime1, $datetime2);
                                            $dt1 = strtotime($datetime1);
                                            $dt2 = strtotime($datetime2);
                                            $seconds_diff = $dt2 - $dt1;
                                            $interval = floor($seconds_diff / 3600 / 24);
                                            echo '&nbsp &'."&nbsp;".$interval . "&nbsp;day ".'.'
                                        . '</td>' .
                                        
                                        
                                        '<td>' . $value->states . '</td>' . 
                                     '<td>' .'<a href="'.base_url().'index.php/welcome/new_comments_funcation/'.$value->ticket_no .'">'.'<button>Comments</button>' .'</a>'.  
                                     '  ' .'<a href="'.base_url().'index.php/welcome/edit_task_done_funcation/'.$value->ticket_no .'">'.'<button>Done Task</button>' .'</a>'.
                                     ' ' .'<a href="'.base_url().'index.php/welcome/edit_task_transfe_funcation/'.$value->ticket_no .'"  >'.'<button>Transfer Task</button>' .'</a>'.              
                                     '</td>' . 
                                     '<tr/>';
                                }
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