<!--<h1>under construction</h1>-->
<?php
$id = $this->session->userdata('id');
$name = $this->session->userdata('name');
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
               New / Assign Task From ( Wireless INFRA )
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
                <input type="hidden" name="today" value="<?php echo date("Y-m-d H:i:s")?>" id="today">
                <div class='row'>
                      <div class="col-lg-3"> 
                        <div class="form-group">
                            <label> Division <div style="color:red;float: right;">*</div></label>
            <?php
//                $Zone = $this->session->userdata('Zone'); 
//                $department = $this->session->userdata('department');
//                if($department=='MTU'){
            ?>       
                     <!--<input class="form-control" readonly="readonly" name="MTU_Zone" id="MTU_Zone" value="<?php echo $zone = $this->session->userdata('Zone');?>" required="">-->
              
            <?php // }else{ ?>   
                <select class="form-control" name="Division" id="Division">
                    <option value="" >Select Division</option>
                </select>
            <?php // } ?>
                           
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>BTS <div style="color:red;float: right;">*</div></label>
                           
                            <select class="form-control" name="bts" id="bts" required="" onchange="change_sub_items()">
                                <option  value="">Select BTS </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Client ID<div style="color:red;float: right;"></div></label>
                            <input class="form-control" onchange="check_client_id()" name="Client_id" id="Client_id" placeholder="Enter Client ID">
                        </div>
                    </div>
                    
                     <div class="col-lg-3">
                        <div class="form-group">
                          <label>Client Name<div style="color:red;float: right;"></div></label>
                            <input class="form-control" name="Client_Name" id="Client_Name" placeholder="Enter Client Name">
                        </div>
                    </div>
                                    
                </div>
                <div class='row'>
                    
                     
                        <div class="col-lg-3">
                        <div class="form-group">
                            <label> TKI ID </label>
                                <input type="text" name="tki_id" id="tki_id" class="form-control" placeholder="Enter TKI ID"/>
                            
                        </div>
                    
                    </div>
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Task Type <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="type_task" id="type_task" required="">
                                <option value="" >Select Task Type</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Initial Problem Category <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Initial_Problem_Category" id="Initial_Problem_Category" required="">
                                <option value="" >Select Problem Category</option>
                            </select>
                             <!--<input class="form-control" name="Initial_Problem_Category" id="Initial_Problem_Category" placeholder="Enter Problem Category" required="">-->
                        
                        </div>
                    </div>
                    
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Employee Name <div style="color:red;float: right;">*</div> </label>
<!--                                <input type="text" name="id" class="form-control" placeholder="Enter Your ID"/>-->
                            <select class="form-control" name="Engineer_Name" id="Engineer_Name" onchange="pick_engineer_id()" required="">
                                <option value="<?php echo $name; ?>"><?php echo $name; ?></option>
                            </select>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                   <div class="col-lg-3">
                        <div class="form-group">
                            <input type="hidden" name="hidden_id" value="<?php echo $id;?>" id="hidden_id">
                            <label>Employee ID <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Engineer_ID" id="Engineer_ID" required="" onchange="change_sub_items()">
                                <option  value="<?php echo $id; ?>"><?php echo $id; ?></option>
                            </select>
                        </div>
                    </div>  
                    
                    <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>Start Date<div style="color:red;float: right;">*</div> <i class="fa fa-calendar"></i></label>                                  
                            <input  class="form-control" onchange="chk_date();"  id="s_date" value="<?php echo date("d-m-Y H:i:s"); ?>" name="s_date"  placeholder="DD-MM-YYYY H:M:S" required="">
                        </div>
                    </div>
                    <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>Media Type<div style="color:red;float: right;">*</div> </label>                                  
                            <select class="form-control" name="media" id="media" required="">
                                <option  value="0">Select Media </option>
                                <option  value="P2P">P2P </option>
                                <option  value="P2M">P2M </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Comments <div style="color:red;float: right;"></div></label>
                            <textarea class="form-control" rows="3" name="comments" id="comments"></textarea>
                        </div>
                    </div>
                     
                </div>  
                
                <div class="row">
                    
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
    
      document.forms["assign_task_from"]["Client_id"].value = null;
      document.forms["assign_task_from"]["Client_Name"].value = null;
      document.forms["assign_task_from"]["Client_Address"].value= null;
      document.forms["assign_task_from"]["Client_Contact"].value = '+880';
      document.forms["assign_task_from"]["Client_Category"].selectedIndex=0;
      document.forms["assign_task_from"]["Zone"].selectedIndex=0;
      document.forms["assign_task_from"]["Sub_Zone"].selectedIndex=0;
      document.forms["assign_task_from"]["CTID_SR"].value = null;       
      document.forms["assign_task_from"]["type_task"].selectedIndex=0;
      document.forms["assign_task_from"]["assign_by"].selectedIndex=0;
      document.forms["assign_task_from"]["Engineer_Name"].selectedIndex=0;
      document.forms["assign_task_from"]["Engineer_ID"].selectedIndex=0;
      document.forms["assign_task_from"]["Technician_Name"].selectedIndex=0;
      document.forms["assign_task_from"]["status"].selectedIndex=0;
       document.forms["assign_task_from"]["status"].selectedIndex=<?php echo date("d-m-Y H:i:s");?>;
      document.forms["assign_task_from"]["comments"].value = null; 
//      document.getElementById("myTextarea").value
      
}
</script>

<script>
    $("form#assign_task_from").submit(function () {
       
//        alert("WORK ON PAGE .TRY AGAIN FEW MINUTE LATER");
//        exit();
       
       
       
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/wi_controller/save_task_info_funcation/'); ?>",
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
 <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->
<!--<script>
		$(function() {
		
			$("#type_task").change(function() {
				$("#sub_task").load("<?php echo base_url(); ?>textdata/" + $(this).val() + ".txt");
			});
		});
</script>-->

<script>
    $(function() {		
            $("#Division").change(function() {
                    $("#bts").load("<?php echo base_url(); ?>BTS_list/" + $(this).val() + ".txt");
            });
    });
</script>
<script>
    $(function() {		
                var MTU_Zone = $('#MTU_Zone').val();
                    $("#bts").load("<?php echo base_url(); ?>BTS_list/" + MTU_Zone + ".txt");
    });
</script>
<script>
    $(function() {		
            $("#Division").change(function() {
                    $("#Engineer_Name").load("<?php echo base_url(); ?>wi_employee_name_list/" + $(this).val() + ".txt");
            });
    });
</script>
<script>
    $(function() {		
                var MTU_Zone = $('#MTU_Zone').val();
                    $("#Engineer_Name").load("<?php echo base_url(); ?>wi_employee_name_list/" + MTU_Zone + ".txt");
    });
    
</script>


<script type="text/javascript">
function pick_engineer_id(){
    var Engineer_Name = $('#Engineer_Name').val();
//    var Engineer_Name = 'S M Zahirul Islam';
//    alert(Engineer_Name);
        $.post('<?php echo base_url();?>index.php/ert_controller/pick_engineer_id', {
            Engineer_Name: Engineer_Name
        }, function (search_info_data) {

//alert(search_info_data);

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
   


   var start_date=document.getElementById("s_date").value;
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
          if(days > 4){
                alert("You Are Not Allow to Entry 3 Days OLD Activity ! ");
                document.getElementById("s_date").value=null;
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
</script>