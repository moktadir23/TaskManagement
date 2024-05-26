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
               Sales From ( <?php echo $department;?> Team)
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
                            <label> Date<div style="color:red;float: right;">*</div> <i class="fa fa-calendar"></i></label>                                  
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
                            <label>Service  <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="L3_service" id="L3_service" required="">
                                <option  value="">Select Service</option>
                            </select>
                        </div>
                    </div>  
                    
                    
                </div>  
 
                <div class="row">
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
                          <label>OTC (one time sales) <div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="otc" id="otc" onchange="chk_numeric_vlu(this.value,'otc');" placeholder="Enter One Time Sales" required="">
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
function null_from(){
    
      document.forms["assign_task_from"]["otc"].value = null;
      document.forms["assign_task_from"]["mrc"].value = null;
      document.forms["assign_task_from"]["Client_Name"].value= null;
      document.forms["assign_task_from"]["L3_service"].selectedIndex=0;
      document.forms["assign_task_from"]["start_date_id"].selectedIndex=<?php echo date("d-m-Y");?>;
      
}
</script>

<script>
    $("form#assign_task_from").submit(function () {
       
//        alert("WORK ON PAGE .TRY AGAIN FEW MINUTE LATER");
//        exit();

        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/corporate_c/save_selas_info/'); ?>",
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
//id="s_date" value="<?php // echo date("d-m-Y H:i:s"); ?>"
function chk_date(){
    
   var today=document.getElementById("today").value;
   var today_time = today.split(" ");
   var date1=today_time[0];
   var time1=today_time[1];
   var new_today_time=date1+' '+time1;
   var datetime1 = new Date(new_today_time);
   


   var start_date=document.getElementById("start_date_id").value;
   var s_date = start_date.split(" ");
   var date2=s_date[0];
   var new_date2= date2.split("-");
   var day=new_date2[0];
   var month=new_date2[1];
   var year=new_date2[2];
   var time2=s_date[1];
   var new_s_date=year+'-'+month+'-'+day+' '+time2;
   var datetime2 = new Date(new_s_date);
       
    var res = Math.abs(datetime2 - datetime1) / 1000;
    var days = Math.floor(res / 86400);      
//    var hours = Math.floor(res / 3600) % 24;        
//    var minutes = Math.floor(res / 60) % 60;
//    var seconds = res % 60;
//        .............................................................................................
    var date_vallid=date_vallidation(datetime2,datetime1);
//    alert(date_vallid);
    if(date_vallid==1){
          if(days > 2){
                alert("You Are Not Allow to Entry 3 Days OLD Activity ! ");
                document.getElementById("start_date_id").value=null;
          }
    }
//  if(days > 2){
//      alert("You Are Not Allow to Entry 3 Days OLD Activity ! ");
//      document.getElementById("s_date").value=null;
//  }else{
////      alert("ALLOW");
//  }
  
}

function date_vallidation(datetime2,datetime1){
    if ( datetime1 > datetime2 ) { 
        return 1;
    }
        return 0;
}

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