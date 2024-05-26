
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>
<?php
    $Zone = $this->session->userdata('Zone'); 
    $department = $this->session->userdata('department');
    $user_type = $this->session->userdata('u_type');
    $nmc_module = $this->session->userdata('nmc_module');
//    $nmc_module =0 .................... not allow
//    $nmc_module =1 ....................  allow all
//    $nmc_module =0 ....................  allow only LINK3
?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              <?php echo $department; ?> Sales Report
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
            <form action="<?php echo base_url('index.php/corporate_c/corporate_sales_report/'); ?>" name="search_by_zone" id="search_by_zone" method="POST">
                 <input type="hidden" name="hidden_dept" value="<?php echo $department;?>" id="hidden_dept">
                <div class="row">
                    
                    <div class="col-lg-4"> 
                        <div class="form-group">
                            <label>Service <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="L3_service"  id="L3_service">
                                <option value="0" >All Service</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">                            
                        <div class="form-group">
                            <label>Employee Name<div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="e_name" onchange="pick_engineer_id();" id="e_name">
                                <option value="0" >All Employee  </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">                            
                        <div class="form-group">
                            <label>Employee ID<div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="e_id" id="e_id">
                                <option value="0" >select Employee ID</option>
                            </select>
                            <!--<input class="form-control" name="Client_ID" id="Client_ID" placeholder="Enter Employee ID" >-->
                        </div>
                    </div>
                    
                    
                     
                    
                </div>
                
                <div class="row">
                    <div class="col-lg-4">
                        <label>From Date</label>
                        <input type="" name="date_from" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="start_date_id" class="form-control" placeholder="Enter from Date" required=""/>
                    </div>
                    <div class="col-lg-4">
                        <label>To Date</label>
                        <input type="" name="date_to" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="end_date_id" class="form-control" placeholder="Enter To Date" required=""/>
                    </div>
                    
                    <!--<div class="col-lg-3">-->
                        <!--<label>Time</label>-->
                        <!--<input type="hidden" readonly="readonly" name="tm_v" id="tm_v"  class="form-control" value="00:00:00-23:59:59" placeholder="Enter Time" required=""/>-->
                    <!--</div>-->
                    <!--
                    <div class="col-lg-3">
                    <br>
                       
                        Morning :<input type="radio" name="tm" id="tm1" onclick="time(this.value);" value="07:00:00-14:59:59"> 
                        Evening :<input type="radio" name="tm" id="tm2" onclick="time(this.value);" value="15:00:00-20:59:50"> 
                        Night :<input type="radio" name="tm" id="tm3" onclick="time(this.value);" value="21:00:00-06:59:59"> 
                        
                    </div>-->
                    <div class="col-lg-4">
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
                            <th>Date</th>
                            <th>Employee Name(ID)</th>
                            <th>Service</th>
                            <th>Client Name</th>
                            <th>MRC</th>
                            <th>OTC</th>                                       
                           
                        </tr>
                    </thead>
                    <tbody>
<?php
//        echo '<pre>';
//        print_r($result);

if($result != null){
 $total=0;
 $total_mrc=0; 
 $total_otc=0; 
    foreach ($result as $value) {
?>  
        <tr> 
            <td><?php echo $value->date; ?></td>
            <td><?php echo $value->e_name.'('. $value->e_id .')'; ?></td>
            <td><?php echo $value->L3_service; ?></td>
            <td><?php echo $value->Client_Name; ?></td>      
            <td><?php echo $mrc=$value->mrc; ?></td> 
            <td><?php echo $otc=$value->otc; ?></td> 
        </tr>                    
     <?php
     $total_mrc=$total_mrc+$mrc;
     $total_otc=$total_otc+$otc;
    }
    $total=$total_mrc+$total_otc;
    echo '<h2>Total Sales : '.$total.'<br>';
    echo '<b>MRC : </b>'.$total_mrc.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>OTC : </b>'.$total_otc.'</h2>&nbsp;&nbsp;&nbsp;&nbsp;';
    } ?>
      
                    </tbody>
                </table>
                <div class="col-lg-5"></div>
                <div class="col-lg-5">
<?php  echo $links; ?>
                </div>
            </div>
        </div>
    </div>
</div>


<!--...........................END Serial Number part..................................................................................-->

<?php
echo "<script type=\"text/javascript\">";
foreach ($from_value as $value) {
    echo "var x = document.getElementById(" . $value['Select_Name'] . ");";
    echo "var option = document.createElement(\"option\");";
    echo "option.text =" . $value['CateGory_Description'] . ";";
    echo "option.value =" . $value['D_Value'] . ";";
    echo "x.add(option,x[" . $value['Indexx'] . "]);";
}
echo "</script>";
?>

<script src="../../js/jquery.min.js" type="text/javascript"></script>

<script>
    $(function() {		
//            $("#e_name").change(function() {
var dept=document.getElementById("hidden_dept").value;
if(dept==='Corporate' || dept==='Admin'){
    $("#e_name").load("<?php echo base_url(); ?>corporate/corporate_employee.txt");
}else if(dept==='Strategic'){
    $("#e_name").load("<?php echo base_url(); ?>corporate/Strategic.txt");
}else if(dept==='ctg_mkt'){
    $("#e_name").load("<?php echo base_url(); ?>corporate/ctg_mkt.txt");
}else if(dept==='Bank_NBFI'){
    $("#e_name").load("<?php echo base_url(); ?>corporate/bank_nbfi.txt");
}
                   
//            });
    });
</script>





<script type="text/javascript">
function pick_engineer_id(){
    var Engineer_Name = $('#e_name').val();
        $.post('<?php echo base_url();?>index.php/corporate_c/pick_engineer_id', {
            Engineer_Name: Engineer_Name
        }, function (search_info_data) {

            var search_array = JSON.stringify(search_info_data);
            var new_search_array = JSON.parse(search_array);
//                alert("Search Engineer_ID...."+new_search_array["Engineer_ID"]);
var id=new_search_array["id"]
//alert(id);

if(typeof id !== 'undefined' ){
                document.getElementById("e_id").innerHTML=null;
                document.getElementById("e_id").value=null;
                select = document.getElementById("e_id");
                var opt = document.createElement('option');
                
                opt.value = new_search_array["id"];
                opt.innerHTML = new_search_array["id"];
                select.appendChild(opt); 
}else{
  
    document.getElementById("e_id").innerHTML=null;
    document.getElementById("e_id").value=null;
    select = document.getElementById("e_id");
    var opt = document.createElement('option');
    
    opt.value = 'o';
    opt.innerHTML = 'select Employee ID';
    select.appendChild(opt); 
    
}                

        }, 'JSON');

}

</script>



