
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              Bank & NBFI Customer List
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
            <form action="<?php echo base_url('index.php/corporate_c/bank_customer_list/'); ?>" name="search_by" id="search_by" method="POST">
                <div class="row">
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Client Category<div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="Client_Category" id="Client_Category" onchange="pick_Name()">
                                <option value="0" >ALL Category</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Name <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="Client_Name" id="Client_Name">
                                <option value="0" >All Customer</option>
                            </select>
                        </div>
                    </div>
                     <div class="col-lg-3">
                       &nbsp;<br>
                       <button  type="submit" class="btn btn-default" value="save">Search</button>
                    </div> 
                    
                </div>
                
<!--                <div class="row">
                    <div class="col-lg-3">
                       &nbsp;<br>
                       <button disabled="disabled" type="submit" class="btn btn-default" value="save">Search</button>
                    </div> 
                </div>    -->
                
            </form>  
            <br><br>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Client ID</th>
                            <th>Client Name</th>
                            <th>Office Type</th>
                            <th>Designation</th>
                            <th>Contact Information</th>
                            <th>Address</th> 
                        </tr>
                    </thead>
                    <tbody>                       
<?php
//      echo '<pre>';
//      print_r($results);
$total=0;
  foreach ($customer_list as $value) {  
   $total++;
?>  
                            <tr> 
                                <td><?php echo $value['Client_id']; ?></td>
                                <td><?php echo $value['Client_Name']; ?></td>
                                <td><?php echo $value['ofc_type']; ?></td>
                                <td><?php echo $value['designation']; ?></td>
                                <td><?php echo $value['Contact_Name'].'<br>'.$value['email'].'<br>'.$value['phone']; ?></td>
                                <td><?php echo $value['house_name'] .'<br> '.$value['house_no'].', Road : '.$value['road_no'].'/'. $value['word'].'<br>'. $value['thana'] .','. $value['district'] . '-' . $value['post_code'] ; ?></td>
                                
                            </tr>    
<?php } ?>
                              
                    </tbody>
                    <div class="col-lg-10">
<?php 
    echo '<b>Total Number : </b>'.$total;
?>                        
                    </div>
                <div class="col-lg-2">
                    <!--<button type="button"  class="btn btn-success"  onclick="location.href = '<?php echo base_url(); ?>index.php/nmc_c/export_ecertificate_report/'">Export Excel</button> <br> <br>-->
                </div> 
                </table>
                
            </div>
        </div>
    </div>
</div>


<?php
echo "<script type=\"text/javascript\">";
//echo '<pre>';
//print_r($employee_name);

foreach ($cat_result as $value) {
    echo "var x = document.getElementById(" . $value['Select_Name'] . ");";
    echo "var option = document.createElement(\"option\");";
    echo "option.text =" . $value['CateGory_Description'] . ";";
    echo "option.value =" . $value['D_Value'] . ";";
    echo "x.add(option,x[" . $value['Indexx'] . "]);";
}
echo "</script>";
?>

<script src="../../js/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
    
function pick_Name(){
    var Client_Category = $('#Client_Category').val();
 
        $.post('<?php echo base_url(); ?>index.php/corporate_c/pick_bank_name', {
            Client_Category: Client_Category
        }, function (bank_data) {
                
                    var bank_array = JSON.stringify(bank_data);
                    var new_bank_Array = JSON.parse(bank_array);
                    
//                    alert("OLT NAME ...."+new_OLT_Array[1]["OLT_Name"]);
                    var select_Bank = 0;
                    document.getElementById("Client_Name").innerHTML = null;
                    document.getElementById("Client_Name").value = null;
                    for (var i in new_bank_Array) {
                        //    alert("splite...."+newArr[i]["OLT_Name"]);
                        if (select_Bank == 0) {
                            select = document.getElementById("Client_Name");
                            var opt = document.createElement('option');
                            opt.value = "0";
                            opt.innerHTML = "Select NAME";
                            select.appendChild(opt);

                            var select_Bank = 1;
                        }
                        
                        select = document.getElementById("Client_Name");
                        var opt = document.createElement('option');
                        opt.value = new_bank_Array[i]["Client_Name"];
                        opt.innerHTML = new_bank_Array[i]["Client_Name"];
                        select.appendChild(opt);
                       
                    }        
        }, 'JSON'); 

}
</script>
