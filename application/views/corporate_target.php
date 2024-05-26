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
               Set Target From ( <?php echo $department;?> Team)
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
                 <input type="hidden" name="hidden_dept" value="<?php echo $department;?>" id="hidden_dept">
                
                <div class="row">
                 
                    
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Employee Name<div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="e_name" onchange="pick_engineer_id();" id="e_name" required="">
                                <option value="0" >All Employee  </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Employee ID<div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="e_id" id="e_id" required="">
                                <option value="0" >select Employee ID</option>
                            </select>
                            <!--<input class="form-control" name="Client_ID" id="Client_ID" placeholder="Enter Employee ID" >-->
                        </div>
                    </div> 
                    <div class="col-lg-3">                                
                        <div class="form-group">
                           <label>Month<div style="color:red;float: right;">*</div></label>
                                <select class="form-control" name="month" id="month" onchange="mrk_Check_id()" required="">
                                    <option value="">Select Month</option>
                                </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>New Visit<div style="color:red;float: right;">*</div></label>
                          <input class="form-control" name="daily_new_visit" id="daily_new_visit" placeholder="Enter New Visit" required="">
                        </div>
                    </div>  
                    
                    
                </div>  
 
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Existing Visit<div style="color:red;float: right;">*</div></label>
                          <input class="form-control" name="daily_ex_visit" id="daily_ex_visit" placeholder="Enter Existing Visit" required="">
                        </div>
                    </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                          <label>MRC (monthly recurring cost)<div style="color:red;float: right;">*</div></label>
                          <input class="form-control" name="target_mrc" onchange="chk_numeric_vlu(this.value,'target_mrc');" id="target_mrc" placeholder="Enter Monthly Recurring Cost" required="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>OTC (one time sales) <div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="target_otc" id="target_otc" onchange="chk_numeric_vlu(this.value,'target_otc');" placeholder="Enter One Time Sales" required="">
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
            url: "<?php echo base_url('index.php/corporate_c/save_sale_target_info/'); ?>",
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

<script>
    
function mrk_Check_id(){
    
    var e_id = $('#e_id').val();
    var month = $('#month').val();
    
//    alert(e_id);
        $.post('<?php echo base_url();?>index.php/corporate_c/mrk_Check_id', {
            e_id:e_id,    
            month: month
        }, function (search_info_data) {

            var search_array = JSON.stringify(search_info_data);
            var new_search_array = JSON.parse(search_array);
//                alert("Search CTID_Number_SR...."+new_search_array["CTID_Number_SR"]);
                        var result_Engineer_ID=new_search_array["e_id"];
        if( result_Engineer_ID == null){

        }else{
             document.getElementById("month").selectedIndex=0;
             alert(" "+ e_id +" Target of The  "+ month +" is Already  Set Up.Please try Differen ID or Month");


        }

                }, 'JSON');
    
}
</script>