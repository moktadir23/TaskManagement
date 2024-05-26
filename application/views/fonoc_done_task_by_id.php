
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
               FONOC Search from Done List By ID 
            </h3>
            <!--                        <ol class="breadcrumb">
                                        <li>
                                            <i class="fa fa-dashboard"></i>  <a href="">Dashboard</a>
                                        </li>
                                        <li class="active">
                                            <i class="fa fa-edit"></i> Search By ID ....
                                        </li>
                                    </ol>-->
        </div> 
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="<?php echo base_url('index.php/link3_controller/fonoc_done_data_by_id/'); ?>" name="select_by_id_form" id="select_by_id_form" method="POST">
                <div class='row'> 
                    <div id="info">...</div>
                        
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Search </label>
                            <select class="form-control" name="search_id" id="search_id">
                                <option  value="0">Select Employee ID</option>
                            </select>
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
                        <div class="form-group">
                            <br><button type="submit" class="btn btn-default" value="save">Search</button>
                        </div>
                    </div>

                </div> 
<!--                <div class="row">
                    <div class="col-lg-3">
                        <button type="submit" class="btn btn-default" value="save">Submit Button</button>
                    </div>
                </div>   -->
            </form>
            <br>

            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        
                        <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Task Type</th>
                            <th>Number</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
//    echo '<pre>';
//    print_r($done_task_summery);
$total_task=0;
if($done_task_summery != null){
    
foreach ($done_task_summery as $n_value) {
    ?>  
        <tr> 
                <td><?php echo $n_value['Problem_Catagory']; ?></td>
                <td><?php echo $task_number=$n_value['task_number']; ?></td>                      
        </tr>                           
<?php 
$total_task=$total_task+$task_number;
}
echo '<h2>Total Task :'.$total_task.'</h2>';

} ?>            
                    </tbody>
                </table>
                        
             <h2>Details Task </h2>           
                        
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>                                     
                                        <th>ID (Name)</th>                                      
                                        <th>BTS Name</th>
                                        <th>OLT Name</th>
                                        <th>ONU Model</th>
                                        <th>Client ID</th>
                                        <th>Client Category </th>
                                        <th>Problem Category </th>
                                                                               
                                        <th>Start Date</th> 
                                        <th>End Date</th>
                                        <th>Comments</th>
                                        <th>Status</th>
                                      
                                </tr>
                            </thead>
                            <tbody>

                                <?php
  if($result_display != null){
                                foreach ($result_display as $value) {
                                    ?>   
                                    <tr>
                                        <td><?php
                                        $employee_id=$value->employee_id;
                                        echo $value->employee_id; ?> (<?php echo $value->employee_name; ?>)</td>
                                        <td><?php echo $value->BTS_Name; ?></td>
                                        <td><?php echo $value->OLT_Name; ?></td>
                                        <td><?php echo $value->ONU_Model; ?></td>
                                        <td><?php echo $value->Client_ID; ?></td>
                                        <td><?php echo $value->Client_Category; ?></td>
                                        
                                        <td><?php echo $value->Problem_Catagory; ?></td>
                                        
                                        <td><?php echo $value->start_date; ?></td>
                                        <td><?php echo $value->end_date; ?></td>
                                        <td><?php echo $value->comments; ?></td>
                                        <td><?php echo $value->status; ?></td>
                                        
                                    </tr>                             

  <?php }    ?>                              
      
                            </tbody> 
 <div class="row">        
 <div class="col-lg-10"></div>                                    
    <div class="col-lg-2">
         <button type="button" class="btn btn-success"  onclick="location.href = '<?php echo base_url(); ?>index.php/link3_controller/FONOC_report_by_Employee_ID/<?php echo $employee_id; ?>'">Export Excel</button> &nbsp;<br><br>         
    </div>                       
</div>     
  <?php } ?>                            
                        </table>

                
                    </div>    
                </div>
            </div>
        </div>


    </div>
</div>


<?php
//            [Id] => 192
//            [Select_Name] => "search_id"
//            [CateGory_name] => search_id
//            [CateGory_Description] => "L3T102"
//            [CateGory_Purpose] => FONOC_id
//            [Status] => 1
//            [Indexx] => 1
//            [D_Value] => "L3T102"


$Select_Name='"'. "search_id" . '"' ;
$id='L3T1181';
$id='"'. $id . '"' ;
//echo '<pre>';
//print_r($search_id);

echo "<script type=\"text/javascript\">";
$number=1;
foreach ($search_id as $value) {
 $number++;   
$name_id='"'. $value['name'].'-' .$value['id'] . '"' ;
$id='"'. $value['id'] . '"' ;

//    echo "var x = document.getElementById(" . $Select_Name . ");";
//    echo "var option = document.createElement(\"option\");";
//    echo "option.text =" . $value['CateGory_Description'] . ";";
//    echo "option.value =" . $value['D_Value'] . ";";
//    echo "x.add(option,x[" . $value['Indexx'] . "]);";
    
    echo "var x = document.getElementById(" . $Select_Name . ");";
    echo "var option = document.createElement(\"option\");";
    echo "option.text =" . $name_id . ";";
    echo "option.value =" . $id . ";";
    echo "x.add(option,x[" . $number . "]);";
}
echo "</script>";
?>

<!--<script type="text/javascript">
var OLT_array = JSON.stringify(search_id);
var new_OLT_Array = JSON.parse(OLT_array);

alert(search_id['id']);

for (var i in new_OLT_Array) {
                        //    alert("splite...."+newArr[i]["OLT_Name"]);
    select = document.getElementById("search_id");
    var opt = document.createElement('option');
    opt.value = new_OLT_Array[i]["id"];
    opt.innerHTML = new_OLT_Array[i]["id"];
    select.appendChild(opt);
}
</script>-->


