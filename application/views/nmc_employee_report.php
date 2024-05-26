
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              NMC Team: Employee Report
            </h3>
            <ol class="breadcrumb">
                <!--<div class="col-lg-4"></div>-->
                <h3 class="text-center"><span id="info_span"></span></h3>
                <!--<div class="col-lg-4"></div>-->
                <!--                            <li>
                                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                                            </li>
                                            <li class="active">
                                                <i class="fa fa-edit"></i> Assign Task
                                            </li>-->
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <?php
        $message = $this->session->userdata('message');
        if (isset($message)) {
            echo $message;
            $this->session->unset_userdata('message');
        }
        ?>
        <div class="col-lg-12">
            <form action="<?php echo base_url('index.php/nmc_c/nmc_ereport/'); ?>" name="search_by_zone" id="search_by_zone" method="POST">
                <div class="row">
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Employee Name <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="Engineer_Name" onchange="pick_engineer_id()" id="Engineer_Name" required="">
                                <option value="0" >Select Engineer Name</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Employee ID <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="Engineer_ID" id="Engineer_ID" required="">
                                <option value="0" >Select Engineer ID</option>
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
                </div>
                
                <div class="row">
                    <div class="col-lg-3">
                       &nbsp;<br>
                        <button type="submit" class="btn btn-default" value="save">Search</button>
                    </div> 
                </div>    
                
            </form>  
            <br><br>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <!--<th>TKI NO.</th>-->
                            <th>TKI No.</th>
                            <th>DateTime</th>
                            <th>Employee ID (Name)</th>
                            <th>Status</th>

                        </tr>
                    </thead>
                    <tbody>
<?php

if($result != null){
 $total=0; 
 $open=0; $close=0;
 
    foreach ($result as $value) {
?>  
                        <tr> 
                            
                                <td><?php echo $value['tki']; ?></td>
                                <td><?php echo $value['create_time']; ?></td>
                                <td><?php echo $value['e_id'].' ( '. $value['e_name'] . ')'; ?></td>

                                <td>
                                    <?php 
                                     $status=$value['status'];
                                    
                                    
                                    if($status=='0'){
                                       echo 'Open'; 
                                       $open++;
                                   }elseif ($status=='1') {
                                       echo 'Close';
                                       $close++;        
                                   }
                                   $total++;
                                    ?>
                                </td>
                                                          
                            </tr>                    
<?php } ?>
<div class="row">
        
<div class="col-lg-10">       
<?php 
    echo '<b>Total TKI NO. : </b>'.$total.'<br>';
    echo '<b>Open TKI : </b>'.$open.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>Close TKI : </b>'.$close.'&nbsp;&nbsp;&nbsp;&nbsp;';
?>
    
</div> 
    <div class="col-lg-2">
        <button type="button" disabled="disabled" class="btn btn-success"  onclick="location.href = '<?php echo base_url(); ?>index.php/welcome/createXLS_report_by_NOC_Employee_ID/<?php echo $value['id']; ?>'">Export Excel</button> &nbsp;<br><br>  
       
    </div>                       
</div>



                             <?php   } ?>
  
                                
                    </tbody>
                </table>
                <div class="col-lg-5"></div>
                <div class="col-lg-5">
<?php // echo $links; ?>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
function pick_engineer_id(){

    var Engineer_Name = $('#Engineer_Name').val();
//        alert('TEST'+Engineer_Name);
        $.post('<?php echo base_url();?>index.php/welcome/pick_engineer_id', {
            Engineer_Name: Engineer_Name
        }, function (search_info_data) {

            var search_array = JSON.stringify(search_info_data);
            var new_search_array = JSON.parse(search_array);
//                alert("Search Engineer_ID...."+new_search_array["Engineer_ID"]);
                document.getElementById("Engineer_ID").innerHTML=null;
                document.getElementById("Engineer_ID").value=null;
                select = document.getElementById("Engineer_ID");
                var opt = document.createElement('option');
                opt.value = new_search_array["Engineer_ID"];
                opt.innerHTML = new_search_array["Engineer_ID"];
                select.appendChild(opt); 

        }, 'JSON');

}
</script>
<script>
    $(function() {		
                    $("#Engineer_Name").load("<?php echo base_url(); ?>nmc_Final_Reason/nmc_employee.txt");
    });
</script>

<?php
echo "<script type=\"text/javascript\">";

foreach ($employee_name as $value) {
    echo "var x = document.getElementById(" . $value['Select_Name'] . ");";
    echo "var option = document.createElement(\"option\");";
    echo "option.text =" . $value['CateGory_Description'] . ";";
    echo "option.value =" . $value['D_Value'] . ";";
    echo "x.add(option,x[" . $value['Indexx'] . "]);";
}
echo "</script>";
?>