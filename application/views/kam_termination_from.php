<!--<h1>under construction</h1>-->
<?php
$id = $this->session->userdata('id');
$name= $this->session->userdata('name');
$Zone= $this->session->userdata('Zone');
$department= $this->session->userdata('department');
?>
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
               Termination From: ( <?php echo $department;?> Team)
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
            <form action="" name="assign_task_from" id="assign_task_from" method="">
                <input type="hidden" name="hidden_id" value="<?php echo $id;?>" id="hidden_id">
                <input type="hidden" name="today" value="<?php echo date("Y-m-d")?>" id="today">
               
                
                <div class="row">
                 <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>Termination Date<div style="color:red;float: right;">*</div> <i class="fa fa-calendar"></i></label>                                  
                            <input  class="form-control"  id="start_date_id" value="<?php echo date("d-m-Y"); ?>" name="start_date_id"  placeholder="DD-MM-YYYY" required="">
                        </div>
                    </div>
                    
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Employee Name <div style="color:red;float: right;">*</div> </label>
                            <input class="form-control" name="employee_name" id="employee_name" value="<?php echo $name; ?>" readonly="readonly" required="">
                           
                        </div>
                    </div>
                   <div class="col-lg-3">
                        <div class="form-group">
                            <input type="hidden" name="hidden_id" value="<?php echo $id;?>" id="hidden_id">
                            <label>Employee ID <div style="color:red;float: right;">*</div></label>
                           <input class="form-control" name="employee_id" id="employee_id" value="<?php echo $id; ?>" readonly="readonly" required="">
                           
                        </div>
                    </div>  
                    <div class="col-lg-3">
                        <div class="form-group">
                            <input type="hidden" name="hidden_id" value="<?php echo $id;?>" id="hidden_id">
                            <label>Reference  <div style="color:red;float: right;">*</div></label>
                             <input class="form-control" name="reference" id="reference" placeholder="Enter Reference" required="">
                        </div>
                    </div>  
                    
                    
                </div>  
 
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Client ID<div style="color:red;float: right;">*</div></label>
                          <input class="form-control" name="Client_id" id="Client_id" placeholder="Enter Client ID" required="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Client Name<div style="color:red;float: right;">*</div></label>
                          <input class="form-control" name="Client_Name" id="Client_Name" placeholder="Enter Client Name" required="">
                        </div>
                    </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                          <label>MRC (monthly recurring cost)<div style="color:red;float: right;">*</div></label>
                          <input class="form-control" name="mrc" onchange="chk_numeric_vlu(this.value,'mrc');" id="mrc" placeholder="Enter Monthly Recurring Cost" required="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Details <div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="Details" id="Details"  placeholder="Enter Details" required="">
                        </div>
                    </div>
                    
                </div>
                
                  <div class="row">
                    
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Reason <div style="color:red;float: right;">*</div></label>
                            <!--<input class="form-control" name="otc" id="otc" onchange="chk_numeric_vlu(this.value,'otc');" placeholder="Enter Reason" required="">-->
                            <select class="form-control" name="reason" id="reason" required="">
                                <option value="" >Select Reason</option>
                            </select>
                        </div>
                    </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                            <label>Marketing Person<div style="color:red;float: right;">*</div> </label>
                           <select class="form-control" name="mkt_person" id="mkt_person" mkt_person="">
                                <option  value="">Select Marketing Person</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group"><br>
<!--                          <label/label>
                            <textarea class="form-control" rows="2" name="comments" id="comments"></textarea>-->
                        <button type="submit" class="btn btn-default" value="save" >Save</button>
                        </div>
                    </div> 
                </div>
                <!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                <!--<button type="submit" class="btn btn-default" value="save" >Save</button>-->
            </form>
        </div>
    </div>
</div>

<!-- <script src="http://cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js" type="text/javascript"></script>
 <script>
    webshims.setOptions('forms-ext', {types: 'date'});
    webshims.polyfill('forms forms-ext');

</script>-->
<?php
echo "<script type=\"text/javascript\">";
foreach ($result as $value) {
    echo "var x = document.getElementById(" . $value['Select_Name'] . ");";
    echo "var option = document.createElement(\"option\");";
    echo "option.text =" . $value['CateGory_Description'] . ";";
    echo "option.value =" . $value['D_Value'] . ";";
    echo "x.add(option,x[" . $value['Indexx'] . "]);";
}
echo "</script>";
?>
<script>
    $(function() {	
                 $("#mkt_person").load("<?php echo base_url(); ?>corporate/corporate_employee.txt");
            });
    
</script>
<script>
    
function null_from(){
     
      document.forms["assign_task_from"]["reference"].value = null;
      document.forms["assign_task_from"]["Client_id"].value = null;
      document.forms["assign_task_from"]["Client_Name"].value = null;
      document.forms["assign_task_from"]["mrc"].value = null;
      document.forms["assign_task_from"]["Details"].value= null;
      document.forms["assign_task_from"]["reason"].selectedIndex=0;
      document.forms["assign_task_from"]["mkt_person"].selectedIndex=0;
      document.forms["assign_task_from"]["start_date_id"].selectedIndex=<?php echo date("d-m-Y");?>;
      
}
</script>

<script>
    $("form#assign_task_from").submit(function () {       
//        alert("WORK ON PAGE .TRY AGAIN FEW MINUTE LATER");
//        exit();

        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/corporate_c/save_termination_info/'); ?>",
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
                alert('Successfully Done');
                null_from();
//                
//                
//            data = $.parseJSON(data);                                   
//            $('#info_span').append(data.messages);
            },
            cache: false,
            contentType: false,
            processData: false
        });
        return false;
    }
      
    );
</script>

<script src="../../js/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">

function check_client_id(){
    
    var Client_id = $('#Client_id').val();
//    alert("TEST"+Client_id);
//    exit();
        $.post('<?php echo base_url();?>index.php/ert_controller/Check_Client_id_function', {
            Client_id: Client_id
        }, function (search_info_data) {

            var search_array = JSON.stringify(search_info_data);
            var new_search_array = JSON.parse(search_array);
//                alert("Search CTID_Number_SR...."+new_search_array["CTID_Number_SR"]);
                var result_client_id=new_search_array["Client_id"];
if( result_client_id == null){
    
}else{
     document.getElementById("Client_id").value=null; 
     alert("It's ( "+ result_client_id +" ) Client ID is Already Assign.Please try Differen Client ID ");
}
 
        }, 'JSON');
        
        

}
</script>   

<script type="text/javascript">

function chk_numeric_vlu(num_value,fid){
    
// alert(fid);
 
 
 if(isNaN(num_value)){
     alert('Please Enter numerical ');
     document.getElementById(fid).value=null;
//    document.write(num1 + " is not a number <br/>");
 }else{
//     alert('NO');
//    document.write(num1 + " is a number <br/>");
 }
 
}
</script>