<!--<h1>under construction</h1>-->
<?php
$id = $this->session->userdata('id');
$name = $this->session->userdata('name');
?>
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
    var select_field = document.getElementById("select_field");
    
//    input_field.style.display = "block";
    select_field.style.display = "none";
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
               New Incident From ( NMC )
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
                <div class='row'>
                     <div class="col-lg-3">
                        <div class="form-group">
                          <label> Start Time  <i class="fa fa-calendar"></i>  <div style="color:red;float: right;">*</div></label>
                           
                        <input  class="form-control" id="s_date" value="<?php echo date("d-m-Y H:i:s"); ?>" onchange="date_validation()" name="s_date"  placeholder="DD-MM-YYYY H:M:S" required="">
                        </div>
                    </div>
                    
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Ticket ID<div style="color:red;float: right;"></div></label>
                            <input class="form-control" name="tki" onkeyup="tki_space_remove()" id="tki" placeholder="Enter Ticket ID" >
                        </div>
                    </div> 
                    
                    
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Organisation<div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="organisation" id="organisation" required="">
                                <option value="" >Select Organisation</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Incident For <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Incident_for" id="Incident_for" onchange="select_name()"  required="">
                                <option value="" >Select Type</option>
                            </select>
                        </div>
                    </div> 
                    
                </div>
                
            
                <div class="row">
                    
                     <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Incident Type <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="type" id="type"  required="">
                                <option value="" >Select Type</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Incident Specification<div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="Specification" id="Specification" required="">
                                <option value="" >Select Specification </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Provider <div style="color:red;float: right;">*</div></label>
                            <!--<input class="form-control" onchange="check_client_id()" name="Client_id" id="Client_id" placeholder="Enter Vendor/Media converter" required="">-->
                            <select class="form-control" name="Vendor" id="Vendor" onchange="pick_Name()" required="">
                                <option value="" >Select Provider </option>
                            </select>
                        </div>
                    </div>
                     <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>Site/ POP/ Link Name / Client Name<div style="color:red;float: right;"></div></label>  
                            
                            
                            <div id="input_field">
                                <input  class="form-control" name="Name" id="Name" placeholder="Enter Site/POP Name" >
                            </div>
                            
                            <div id="select_field">
                             <select class="form-control" name="Name1" id="Name1" >
                                <option value="" >Select Name </option>
                            </select>
                            </div>
                            
                        </div>
                    </div>
                  
                    
                    
                </div>  
                
                <div class="row"> 
                      
                   <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>SCR / Circuit  ID<div style="color:red;float: right;"> </div></label>
                            <input class="form-control" name="scr_curt_id" id="scr_curt_id" placeholder="Enter SCR / Circuit ID" >
                        </div>
                    </div> 
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Employee Name <div style="color:red;float: right;">*</div> </label>
                            <input type="text" name="Engineer_Name" readonly="readonly" id="Engineer_Name" class="form-control" value="<?php echo $name;?>" placeholder="Enter Your Name"/>
<!--                            <select class="form-control" name="Engineer_Name" id="Engineer_Name" onchange="pick_engineer_id()" required="">
                                <option value="">Select Name</option>
                            </select>-->
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Employee ID <div style="color:red;float: right;">*</div></label>
                            <input type="text" name="Engineer_ID" readonly="readonly" id="Engineer_ID" class="form-control" value="<?php echo $id;?>" placeholder="Enter Your ID"/>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Informed To<div style="color:red;float: right;">*</div> </label>
                             <textarea class="form-control" rows="2" name="informed_id" id="informed_id" required=""></textarea>
                        </div>
                    </div>
                                     
                   

                </div>
                
                <div class="row">
                   <div class="col-lg-3">
                        <div class="form-group">
                            <label>Informed Time <i class="fa fa-calendar"></i> <div style="color:red;float: right;"> </div> &nbsp; <input type="checkbox" onchange="chk_infrom_time()" name="infrom_time_chk_value" id="infrom_time_chk_value"> </label>
                            <input  class="form-control" id="e_date" value="<?php echo date("d-m-Y H:i:s"); ?>" name="e_date"  placeholder="DD-MM-YYYY H:M:S" >
                        </div>
                    </div> 
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Primary Finding<div style="color:red;float: right;">*</div></label>
                             <textarea class="form-control" rows="2" name="pri_find" id="pri_find" required=""></textarea>
                        </div>
                    </div>
                     <div class="col-lg-3"> <br>   
                         <input class="form-control" type="hidden" name="sms_v" id="sms_v" placeholder="Enter Ticket ID">
                         <input class="form-control" type="hidden" name="email_v" id="email_v" placeholder="Enter Ticket ID">
                              <b> SMS</b>&nbsp; &nbsp;<input type="checkbox" onchange="chk_sms()" name="sms" id="sms">  &nbsp;
                              <b> Mail</b>&nbsp; &nbsp;<input type="checkbox" onchange="chk_email()" name="email" id="email">  &nbsp;
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

<script type="text/javascript">
function null_from(){
    
      document.forms["assign_task_from"]["s_date"].value=<?php echo date("d-m-Y H:i:s");?>;
      document.forms["assign_task_from"]["tki"].value = null;
      document.forms["assign_task_from"]["incident_for"].selectedIndex = 0;
      document.forms["assign_task_from"]["type"].selectedIndex= 0;
      document.forms["assign_task_from"]["Specification"].selectedIndex = 0;
      document.forms["assign_task_from"]["Vendor"].selectedIndex=0;
      document.forms["assign_task_from"]["Name"].value=null;
      document.forms["assign_task_from"]["scr_curt_id"].value=null;
      document.forms["assign_task_from"]["informed_id"].value=null;
      document.forms["assign_task_from"]["pri_find"].value=null;
//      document.getElementById("myTextarea").value
      
}
</script>

<script>
    $("form#assign_task_from").submit(function () {
       
//        alert("WORK ON PAGE .TRY AGAIN FEW MINUTE LATER");
//        exit();
       
       
       
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/nmc_c/save_task_info_funcation/'); ?>",
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
            $("#Incident_for").change(function() {
                    $("#Specification").load("<?php echo base_url(); ?>NMC_Incident_Specification/" + $(this).val() + ".txt");
            });
    });
</script>
<script>
    $(function() {		
           
                    $("#Engineer_Name").load("<?php echo base_url(); ?>NMC_Incident_Specification/nmc_eng.txt");
         
    });
    
    function chk_sms(){
        if( document.getElementById("sms").checked == true){
            document.getElementById("sms_v").value=1;
        }else{
            document.getElementById("sms_v").value=0;
        }
    }
     function chk_email(){
        if( document.getElementById("email").checked == true){
            document.getElementById("email_v").value=1;
        }else{
            document.getElementById("email_v").value=0;
        }
    }
     document.getElementById("e_date").value='00-00-0000 00:00:00';
    function chk_infrom_time(){
        if( document.getElementById("infrom_time_chk_value").checked == true){
            document.getElementById("e_date").value=null;
        }else{
            document.getElementById("e_date").value='00-00-0000 00:00:00';
        }
    }
    
function tki_space_remove(){
//    alert('TEST');
       var old_tki_id = document.getElementById("tki").value;
    
        var tki_id = old_tki_id.replace(/\s/g,'');
         
        document.getElementById("tki").value=tki_id;
   
}  



function date_validation(){
    document.getElementById("info_span").innerHTML =null;
    
    var Incident_Occurred_datetime=document.getElementById("s_date").value;
    var split_date = Incident_Occurred_datetime.split(" ");
    var Incident_Occurred_date=split_date[0];
    var new_Incident_Occurred_date = Incident_Occurred_date.split("-").reverse().join("-");
    
    
    var today = new Date();
    
    today.setDate(today.getDate() - 2);
    
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    var previous_date = dd + '-' + mm + '-' + yyyy;
    var new_previous_date = previous_date.split("-").reverse().join("-");

//   alert(new_previous_date + '.....' + new_Incident_Occurred_date);
   if(new_previous_date < new_Incident_Occurred_date){
//       alert('Allow');
       document.getElementById("info_span").innerHTML =null;
   }else{
//       alert('NOT Allow');
        document.getElementById("info_span").innerHTML ='NOT Allow to Select that Date.Please Try again.';
        document.getElementById("s_date").value=null;
   }
   
   
   
}
</script>

<script type="text/javascript">

function pick_Name(){
    
    var Incident_for = $('#Incident_for').val();
    var Specification = $('#Specification').val();
    var Vendor = $('#Vendor').val();
 
 
    if(Incident_for==='BTS' || Incident_for==='Backbone' || Incident_for==='Telco' || Incident_for==='NTTN' || Incident_for==='iMPLS'|| Incident_for==='Upstream' ||  Incident_for==='BML_DC'){
        $.post('<?php echo base_url(); ?>index.php/nmc_c/pick_nmc_category_name', {
            Incident_for: Incident_for,
            Specification:Specification,
            Vendor:Vendor
            
        }, function (OLT_data) {
                
                    var OLT_array = JSON.stringify(OLT_data);
                    var new_OLT_Array = JSON.parse(OLT_array);
                    
//                    alert("OLT NAME ...."+new_OLT_Array[1]["OLT_Name"]);
                    var select_OLT = 0;
                    document.getElementById("Name1").innerHTML = null;
                    document.getElementById("Name1").value = null;
                    for (var i in new_OLT_Array) {
                        //    alert("splite...."+newArr[i]["OLT_Name"]);
                        if (select_OLT == 0) {
                            select = document.getElementById("Name1");
                            var opt = document.createElement('option');
                            opt.value = "Select Name";
                            opt.innerHTML = "Select NAME";
                            select.appendChild(opt);

                            var select_OLT = 1;
                        }
                        if( Incident_for==='BTS'  ){
                           select = document.getElementById("Name1");
                           var opt = document.createElement('option');
                           opt.value = new_OLT_Array[i]["BTS_Name"];
                           opt.innerHTML = new_OLT_Array[i]["BTS_Name"];
                           select.appendChild(opt); 
                        }else{
                        
                        select = document.getElementById("Name1");
                        var opt = document.createElement('option');
                        opt.value = new_OLT_Array[i]["Name"];
                        opt.innerHTML = new_OLT_Array[i]["Name"];
                        select.appendChild(opt);
                       }
                    }        
        }, 'JSON');
        
    }   

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
//    ......................................   select_name  ...............................................................................


var input_field = document.getElementById("input_field");
var select_field = document.getElementById("select_field");  
input_field.style.display = "block";
select_field.style.display = "none";

function select_name(){
  var Incident_for = document.getElementById("Incident_for").value;
  var input_field = document.getElementById("input_field");
  var select_field = document.getElementById("select_field");
  if(Incident_for==='Backbone' || Incident_for==='BTS' || Incident_for==='Telco' || Incident_for==='NTTN' || Incident_for==='iMPLS' || Incident_for==='Upstream' || Incident_for==='BML_DC'){
//     alert('TEST'); 
     select_field.style.display = "block";
     input_field.style.display = "none";
     
  }else{

     input_field.style.display = "block";
     select_field.style.display = "none";
  }
}
</script>   


