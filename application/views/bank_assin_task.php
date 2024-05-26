<!--<h1>under construction</h1>-->
<?php
$id = $this->session->userdata('id');
$name= $this->session->userdata('name');
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
               New / Assign Task From ( <?php echo $department;?> Team)
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
                <input type="hidden" name="hidden_dept" value="<?php echo $department;?>" id="hidden_dept">
                <input type="hidden" name="today" value="<?php echo date("Y-m-d H:i:s")?>" id="today">
                <div class='row'>
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
                            <label>Sub Task <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="sub_task" id="sub_task" required="">
                                <option value="" >Select Sub Task </option>
                            </select>
                        </div>
                    </div>
                      <div class="col-lg-3"> 
                        <div class="form-group">
                            <label> Client Category <div style="color:red;float: right;">*</div></label>     
                            <select class="form-control" name="Client_Category" onchange="pick_Name()" id="Client_Category" required="">
                                <option value="" >Select Client Category</option>
                            </select>       
                        </div>
                      </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Client Name<div style="color:red;float: right;">*</div></label>
                          <select class="form-control" name="Client_Name" id="Client_Name" required="">
                                <option value="" >Select Task Type</option>
                            </select>
<!--                            <input class="form-control" name="Client_Name" id="Client_Name" placeholder="Enter Client Name" required="">-->
                        </div>
                    </div>
                   
                    
                </div>
                <div class='row'>
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label> Office Type  <div style="color:red;float: right;">*</div></label>     
                            <select class="form-control" name="ofc_type" id="ofc_type" required="">
                                <option value="" >Select Office Type </option>
                            </select>       
                        </div>
                      </div>
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label> Designation <div style="color:red;float: right;">*</div></label>     
                            <select class="form-control" name="designation" id="designation" onchange="pick_Bnak_info();"   required="">
                                <option value="0" selected="selected" >Select Designation </option>
                                <option value="MD">MD</option>
                                <option value="Head of IT">Head of IT</option>
                                <option value="Focal Point">Focal Point</option>
                            </select>       
                        </div>
                      </div>
<!--                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Client ID<div style="color:red;float: right;"></div></label>
                            <input class="form-control" name="Client_ID" id="Client_ID" placeholder="Enter Client ID">
                        </div>
                    </div>-->
                    
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Contact Person Name<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="Contact_Name" id="Contact_Name" placeholder="Enter Contact Name" required="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Phone Number<div style="color:red;float: right;"> </div></label>
                          <input class="form-control" name="phone" id="phone" onchange="chk_phone_number();" value="+880" placeholder="+880**********" >
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label>Email Address<div style="color:red;float: right;"></div></label>
                          <input type="email" class="form-control" name="email" id="email" placeholder="example@gmail.com" >
                        </div>
                    </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                          <label>Address<div style="color:red;float: right;"></div></label>
                            <input class="form-control" name="address" id="address" placeholder="Enter Address">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Requirement<div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="L3_service" id="L3_service" required="">
                                <option  value="">Select Requirement</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Employee Name <div style="color:red;float: right;">*</div> </label>
                             <input class="form-control" name="e_name" id="e_name" value="<?php echo $name; ?>" readonly="readonly" required="">
                           
                        </div>
                    </div>
                   
                </div>  
 
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            
                            <label>Employee ID <div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="e_id" id="e_id" value="<?php echo $id; ?>" readonly="readonly" required="">
                           
                        </div>
                    </div>
                    
                    <div class="col-lg-3">                                
                        <div class="form-group">
                            <label> Date<div style="color:red;float: right;">*</div> <i class="fa fa-calendar"></i></label>                                  
                            <input  class="form-control"  id="s_date" value="<?php echo date("d-m-Y H:i:s"); ?>" name="s_date"  placeholder="DD-MM-YYYY H:M:S" required="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Offer Amount <div style="color:red;float: right;"></div></label>
                            <input class="form-control" name="amount" id="amount" >
                           
                        </div>
                    </div> 
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Branch Number <div style="color:red;float: right;"></div></label>
                            <input class="form-control" name="Site_Number" id="Site_Number" >
                           
                        </div>
                    </div>
                    
                </div>
                
                
                <div class="row">
                    <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>Follow Up Date<div style="color:red;float: right;"></div> <i class="fa fa-calendar"></i></label>                                  
                            <input  class="form-control" onchange="chk_date();"  id="start_date_id"  name="start_date_id"  placeholder="DD-MM-YYYY" >
                        </div>
                    </div>
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Status <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" onchange="chk_follow_up_date();" name="status" id="status" required="">
                                <option value="" >Select Status</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3"> <br>   
                         <input class="form-control" type="hidden" name="sms_v" id="sms_v" placeholder="Enter Ticket ID">
                         <input class="form-control" type="hidden" name="email_v" id="email_v" placeholder="Enter Ticket ID">
                              <b> Survey</b>&nbsp; &nbsp;<input type="checkbox" onclick="chk_vlu('survey')" name="survey" id="survey">  &nbsp;
                              <input type="hidden" name="survey_value" value="0" id="survey_value">
                              <b> Offer</b>&nbsp; &nbsp;<input type="checkbox" onclick="chk_vlu('offer')" name="offer" id="offer">  &nbsp;
                              <input type="hidden" name="offer_value" value="0" id="offer_value">
                     </div>
                    
                    
                    
                     <div class="col-lg-3">
                        <div class="form-group">
                          <label>Remarks <div style="color:red;float: right;"></div></label>
                            <textarea class="form-control" rows="2" name="remarks" id="remarks"></textarea>
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

<?php
echo "<script type=\"text/javascript\">";
foreach ($result_1 as $value) {
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
            url: "<?php echo base_url('index.php/corporate_c/save_bank_task_info_/'); ?>",
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
          if(days > 2){
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


function chk_vlu(fid){
    
document.getElementById("info_span").innerHTML = null;
    
    if(fid=='survey'){
        if(document.getElementById(fid).checked == true){
           document.getElementById("survey_value").value=1; 
        }else{
            document.getElementById("survey_value").value=0;
        }
        
        
    }else if(fid=='offer'){
        if(document.getElementById(fid).checked == true){
            
            var x = document.forms["assign_task_from"]["amount"].value;
            if (x == null || x == "") {
                document.getElementById("info_span").innerHTML = "Please Input Offer Amount";
                document.getElementById("offer").checked = false;
                exit();
            }
            var x = document.forms["assign_task_from"]["start_date_id"].value;
            if (x == null || x == "") {
                document.getElementById("info_span").innerHTML = "Please Select Follow Up Date";
                document.getElementById("offer").checked = false;
                exit();
            }
            
           document.getElementById("offer_value").value=1; 
        }else{
            document.getElementById("offer_value").value=0;
            document.getElementById("amount").value=null;
            document.getElementById("start_date_id").value=null;
        }
    }
    
}

function chk_follow_up_date(){
    document.getElementById("info_span").innerHTML = "";
    var status = document.forms["assign_task_from"]["status"].value;
    if(status=='Follow Up'){
        var x = document.forms["assign_task_from"]["start_date_id"].value;
        if (x == null || x == "") {
            document.getElementById("info_span").innerHTML = "Please Select Follow Up Date";
             document.getElementById("status").selectedIndex = 0;
            exit();
        }
    }
    
}

function chk_phone_number(){
        document.getElementById("info_span").innerHTML = "";
    
        var Registered_Mobile = document.getElementById("phone").value;      
        if(Registered_Mobile == null || Registered_Mobile == 0){
            document.getElementById("info_span").innerHTML = "Please Input Registered Mobile Number ";
            document.getElementById("phone").value='+880';
            $('html,body').scrollTop(0);
            exit();
        }
        var new_mobile = Registered_Mobile.split("+", 2);
        
// alert(new_mobile[1]);
        var  Registered_Mobile=new_mobile[1];
          
        if (/^\d{13}$/.test(Registered_Mobile) == true) {
//                            alert("DONE valid mobile number.");
                document.getElementById("info_span").innerHTML = "";
        } else {
            document.getElementById("info_span").innerHTML = "Please Insert a valid Modile Number !";
            document.getElementById("phone").value='+880';
            $('html,body').scrollTop(0);
            exit();
        }

        var gp = Registered_Mobile.search("88017");
        var gp1 = Registered_Mobile.search("88013");
        var b_link = Registered_Mobile.search("88019");
        var b_link1 = Registered_Mobile.search("88014");
        var robi = Registered_Mobile.search("88018");
        var teletalk = Registered_Mobile.search("88015");
        var airtle = Registered_Mobile.search("88016");
        var match = 0;
        if (gp == match || gp1 == match || b_link == match || b_link1 == match || robi == match || teletalk == match || airtle == match) {
//                       alert("YES Operate"+"G...."+gp+"B...."+b_link+"R...."+robi+"T.."+teletalk+"A..."+airtle);   
                document.getElementById("info_span").innerHTML = "";       
        } else {
//                       alert("Moblie Operate NULL "+"G...."+gp+"B...."+b_link+"R..."+robi+"T.."+teletalk+"A..."+airtle);
            document.getElementById("info_span").innerHTML = "Please Insert a valid Modile operators Number !";
             document.getElementById("phone").value='+880';
            $('html,body').scrollTop(0);
            exit();
        }
}
</script>
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
                            opt.value = "Select Name";
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

function  pick_Bnak_info(){
    
     var Client_Name = $('#Client_Name').val();
     var ofc_type = $('#ofc_type').val();
     var designation= $('#designation').val();
      
        $.post('<?php echo base_url(); ?>index.php/corporate_c/pick_bank_info', {
            Client_Name:Client_Name,
            ofc_type: ofc_type,
            designation:designation
        }, function (bank_info_data) {
                
                    var bank_info_array = JSON.stringify(bank_info_data);
                    var new_bank_info_Array = JSON.parse(bank_info_array);
                   var Contact_Name = new_bank_info_Array["Contact_Name"];
                    
                   if(Contact_Name != null){
                    
//                    document.getElementById("Client_ID").value = new_bank_info_Array["Client_id"];
                    document.getElementById("Contact_Name").value = new_bank_info_Array["Contact_Name"];
                    document.getElementById("phone").value = new_bank_info_Array["phone"];
                    document.getElementById("email").value = new_bank_info_Array["email"];
                    document.getElementById("address").value = new_bank_info_Array["house_name"] + ','+new_bank_info_Array["house_no"] + ','+ new_bank_info_Array["road_no"] + '/'+
                            new_bank_info_Array["word"] + ', '+ new_bank_info_Array["thana"] + ',' + new_bank_info_Array["district"]+ '-' + new_bank_info_Array["post_code"];
                       
                  }else{
//                    document.getElementById("Client_ID").value = null;
                    document.getElementById("Contact_Name").value = null;
                    document.getElementById("phone").value = null;
                    document.getElementById("email").value = null;
                    document.getElementById("address").value = null;
                  }
        }, 'JSON'); 
}

</script>