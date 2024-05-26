<!--<h1>under construction</h1>-->
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>  


<?php
$Zone = $this->session->userdata('Zone'); 
$name = $this->session->userdata('name'); 
$id = $this->session->userdata('id'); 
$user_type = $this->session->userdata('u_type');
?>
<!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              CS New / Assign Task From.....
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
            <form action="" name="CS_task_from" id="CS_task_from" method="">
                <div class='row'> 
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Client ID <div style="color:red;float: right;"></div></label>
                            <input type="hidden" class="form-control" name="BTS_Name" id="BTS_Name" >
                            <input type="hidden" class="form-control" name="OLT_Name" id="OLT_Name" >
                            <input type="hidden" class="form-control" name="PON" id="PON" >
                            <input type="hidden" class="form-control" name="Port" id="Port" >
                            
                            <input class="form-control" onchange="pick_client()" name="Client_ID" id="Client_ID" placeholder="Enter Client ID">
                      
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label> Client Name <div style="color:red;float: right;">*</div> </label>
<!--                                <input type="text" name="id" class="form-control" placeholder="Enter Your ID"/>-->
                            <input class="form-control" name="Client_Name" id="Client_Name" placeholder="Enter Client Name" required="">
                      
                        </div>
                    </div>
                    
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label> Zone <div style="color:red;float: right;">*</div></label>
                            <input type="hidden"  name="s_zone" id="s_zone" value="<?php echo $Zone; ?>">
                            <select class="form-control" name="Zone" id="Zone" required="">
                                <option value="" >Select Zone</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Support Office <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Sub_Zone" id="Sub_Zone" required="">
                                <option value="" >Select Support Office</option>
                            </select>
                        </div>
                    </div>
<!--                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Client Category <div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="sub_task" id="sub_task" placeholder="Enter Sub Task">
                            
                             <select class="form-control" name="Client_Category" id="Client_Category" required="">
                                <option value="" >Select Client Category</option>
                            </select>
                        </div>
                    </div>-->
                </div>
                <div class='row'>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Client Category <div style="color:red;float: right;"></div></label>
                            <!--<input class="form-control" name="sub_task" id="sub_task" placeholder="Enter Sub Task">-->
                            
                             <select class="form-control" name="Client_Category" id="Client_Category">
                                <option value="" >Select Client Category</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Support Category<div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="Support_Category" id="Support_Category" required="">
                                <!--<option value="" >Select Support Category</option>-->
                            </select> 
                        </div>
                    </div>
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>CTID Number/SR <div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="CTID_Number_SR" onchange="Check_CTID_Number_SR();" id="CTID_Number_SR" placeholder="Enter CTID Number / SR" required="">
                        </div>
                    </div>
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Initial Problem Category 
                                <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Initial_Problem_Category" id="Initial_Problem_Category" required="">
                                <option value="">Select Initial Problem</option>
                            </select>
                        </div>
                    </div>
<!--                    <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>Assign time<div style="color:red;float: right;">*</div> <i class="fa fa-calendar"></i></label>                                  
                            <input  class="form-control" id="cs_date" name="cs_date" readonly="readonly" value="<?php echo date("d-m-Y h:i:s");?>" placeholder="DD-MM-YYYY">
                        </div>
                    </div>                    -->
                </div>
                <div class="row">
                    <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>Assign time<div style="color:red;float: right;">*</div> <i class="fa fa-calendar"></i></label>                                  
                            <input  class="form-control" id="cs_date" name="cs_date" readonly="readonly" value="<?php echo date("d-m-Y H:i:s");?>" placeholder="DD-MM-YYYY">
                            <input type="hidden" name="today" value="<?php echo date("Y-m-d H:i:s")?>" id="today">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Engineer Name<div style="color:red;float: right;">*</div></label>                                                                          
                             <?php
                                if($user_type=='user'){
                            ?>
                               <input class="form-control" name="n_Engineer_Name" id="n_Engineer_Name" value="<?php echo $name; ?>" readonly="readonly" required="">
                            <?php }else{ ?>
                                <select class="form-control" name="Engineer_Name" id="Engineer_Name" onchange="pick_engineer_id()"  required="">
                                 <option value="">Select Engineer Name</option>
                                </select>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Engineer ID<div style="color:red;float: right;">*</div></label>
                             <?php
                                if($user_type=='user'){
                            ?>
                               <input class="form-control" name="n_Engineer_ID" id="n_Engineer_ID" value="<?php echo $id; ?>" readonly="readonly" required="">
                            <?php }else{ ?>
                                <select class="form-control" name="Engineer_ID" id="Engineer_ID" required="" > 
                                </select>
                            <?php } ?>
                        </div>
                    </div> 
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Name of Technician if used</label>
                            <select class="form-control" name="Technician_Name" id="Technician_Name" >
                              <option value="">Select Name of Technician</option>
                            </select>
                        </div>
                    </div>  
                    
                </div>
                
                <div class="row">
                   
                     <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>TKI Assign date to CS<div style="color:red;float: right;">*</div> <i class="fa fa-calendar"></i></label>                                  
                            <input  class="form-control" id="s_date" name="s_date" readonly="readonly" value="<?php echo date("d-m-Y H:i:s");?>" placeholder="DD-MM-YYYY">
                            <input type="hidden" name="today" value="<?php echo date("Y-m-d H:i:s")?>" id="today">
                        </div>
                    </div>
                    
                     <div class="col-lg-6">
                        <div class="form-group">
                            <label>Comments</label>
                             <!--<input class="form-control" name="Engineer_ID" id="Engineer_ID" placeholder="Enter Engineer ID" required="">-->
                      
                             <textarea class="form-control" rows="2" name="comments" id="comments"></textarea>
                        </div>
                    </div>
                     <div class="col-lg-3">                                
                        <div class="form-group">
                            <label></label><br>
                            
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php 
                             $totalpending_task=$total_p_task->c_number;
                            if($totalpending_task > 20){
                            ?>    
                                <button type="submit" disabled="disabled" class="btn btn-default" value="save" >Save</button>
                                <b> <font color="red"> Your Pending Task Quata Cross The Limit (20).To Continue New Input Please Close Your Pending Task .</font></b>


                           <?php }else{ ?>
                                <!--echo 'allow';-->
                                 <button type="submit" class="btn btn-default" value="save" >Save</button>
                            <?php } ?>

                        </div>
                    </div>
                    
                </div>
                
                
              
                
            </form>
        </div>
        
        
    </div>
    <br><br>
    <h3>Client Information </h3>
    <div class="row">
        <div class="col-lg-3">
            <div class="form-group">
                <b id="Sub_id"></b>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <b id="Sub_name"></b>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <b id="C_name"></b>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label> </label>
                <b id="email"></b>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="form-group">
                <b id="Address"></b>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">

                <b id="Package"></b>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">

                <b id="Phone"></b>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label> </label>
                <b id="Status"></b>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered table-hover">
                    <thead>
                        <tr>                        
                            <th>BTS Name</th>
                            <th>OLT Name</th>
                            <th>PON Port</th>
                            <th>ONU ID</th>
                            <th>ONU Model</th>
                            <th>MAC Address</th>
                            <th>VLAN</th>
                        </tr>
                    </thead>
                    <tbody id="client_tbl">  </tbody>
                </table>
        </div>
    </div>
        
    
</div>

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
    $("form#CS_task_from").submit(function () {
//        validateForm();
//        if (submit_or_not == 1)
//        {
//            exit;
//        }
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/welcome/save_CS_task/'); ?>",
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
                alert('Successfully Done');
                null_from();
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
<script>
    $(function() {		
            $("#Support_Category").change(function() {
                    $("#Initial_Problem_Category").load("<?php echo base_url(); ?>CS_textdata/" + $(this).val() + ".txt");
            });
    });
     $(function() {		
//            $("#Support_Category").change(function() {
                    var Support_Category=document.getElementById("Support_Category").value;
                    $("#Initial_Problem_Category").load("<?php echo base_url(); ?>CS_textdata/" + Support_Category + ".txt");
//            });
    });
</script>
<script>
    $(function() {		
            $("#Sub_Zone").change(function() {
                    $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + $(this).val() + ".txt");
            });
    });
    
</script>
<script>
$(function() {		
$("#Sub_Zone").change(function() {
var Zone=document.getElementById("Zone").value;
var sub_Zone=document.getElementById("Sub_Zone").value;
if(Zone != 'Bogura'){
    $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
}else{
    $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + sub_Zone + ".txt");
}
});
});   
</script>
<script>
    $(function() {		
            $("#Zone").change(function() {
                    $("#Sub_Zone").load("<?php echo base_url(); ?>CS_sub_zone_list/" + $(this).val() + ".txt");
            });
    });
     $(function() {		
            var s_zone=document.getElementById("s_zone").value;
            $("#Sub_Zone").load("<?php echo base_url(); ?>CS_sub_zone_list/" + s_zone + ".txt");
    });
</script>

<script type="text/javascript">
function pick_engineer_id(){
    var Engineer_Name = $('#Engineer_Name').val();
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



function Check_CTID_Number_SR(){
    
    var CTID_Number_SR = $('#CTID_Number_SR').val();
        $.post('<?php echo base_url();?>index.php/welcome/Check_CTID_n_SR', {
            CTID_Number_SR: CTID_Number_SR
        }, function (search_info_data) {

            var search_array = JSON.stringify(search_info_data);
            var new_search_array = JSON.parse(search_array);
//                alert("Search CTID_Number_SR...."+new_search_array["CTID_Number_SR"]);
                var result_CTID_Number_SR=new_search_array["CTID_Number_SR"];
if( result_CTID_Number_SR == null){
    
}else{
     document.getElementById("CTID_Number_SR").value=null; 
     alert("It's ( "+ result_CTID_Number_SR +" ) Already Assign.Please try differen CTID Number/SR");
}
 
        }, 'JSON');

}

</script>    


<script>
    
    
function pick_client(){
    
  document.getElementById("Sub_name").innerHTML=null;
  document.getElementById("Sub_id").innerHTML=null;
  document.getElementById("C_name").innerHTML=null;
  document.getElementById("email").innerHTML=null;      
  document.getElementById("Address").innerHTML=null;
  document.getElementById("Package").innerHTML=null;
  document.getElementById("Phone").innerHTML=null;
  document.getElementById("Status").innerHTML=null;
  var tableHTML = "";
  $("#client_tbl").html(tableHTML);

    var ID = $('#Client_ID').val();
    var number = ID.search("CC-");
    if(number==0){
        var Client_ID = ID.replace("CC-", "");
        document.getElementById("Client_ID").value=Client_ID; 
    }else{
        var Client_ID = $('#Client_ID').val();
    }
        $.post('<?php echo base_url();?>index.php/hd_controller/client_info', {
            Client_ID: Client_ID
        }, function (search_info_data) {

            var search_array = JSON.stringify(search_info_data);
            var new_search_array = JSON.parse(search_array);

                var mis_Client_Name=new_search_array['olt_info']['Client_Name'];
                
                var mq_Client_Name=new_search_array['client_info']['F_Name'];
                
//                alert(mq_Client_Name);
                
                var Client_Name=new_search_array["Client_Name"];
                var Client_Category=new_search_array["Category"];
                var BTS_Name=new_search_array["BTS_Name"];
                var OLT_Name=new_search_array["OLT_Name"];
                var PON=new_search_array["PON"];
                var Port=new_search_array["Port"];
                var MAC_Address=new_search_array["MAC_Address"];
                var ONU_ID=new_search_array["ONU_ID"];
                var ONU_Model=new_search_array["ONU_Model"];
                var V_LAN=new_search_array["V_LAN"];
  
//  alert(Client_Name);
if( Client_Name === undefined && mis_Client_Name === undefined){
    
     document.getElementById("Client_Name").value=null; 
     document.getElementById("Client_Category").selectedIndex = 0;
     document.getElementById("Zone").selectedIndex = 0; 
     document.getElementById("Sub_Zone").selectedIndex = 0; 
     
// ............................... MIS .............................................................
  document.getElementById("Sub_name").innerHTML=null;
  document.getElementById("Sub_id").innerHTML=null;
  document.getElementById("C_name").innerHTML=null;
  document.getElementById("email").innerHTML=null;      
  document.getElementById("Address").innerHTML=null;
  document.getElementById("Package").innerHTML=null;
  document.getElementById("Phone").innerHTML=null;
  document.getElementById("Status").innerHTML=null;
//................................... MQ ............................................................ 


// ......................................................................................................
     
    var tableHTML = "";
    $("#client_tbl").html(tableHTML);
     
}else if( Client_Name === undefined && mis_Client_Name != undefined){
   
    document.getElementById("Client_Name").value=new_search_array['olt_info']["Client_Name"];
    var Client_Category=new_search_array['olt_info']["Category"];
    
    if(Client_Category==='RETAIL'){
       document.getElementById("Client_Category").selectedIndex = 9; 
    }else if(Client_Category==='CORPORATE'){
       document.getElementById("Client_Category").selectedIndex = 2; 
    }else if(Client_Category==='BANK'){
       document.getElementById("Client_Category").selectedIndex = 1; 
    }else if(Client_Category==='COMPLEMENTARY'){
       document.getElementById("Client_Category").selectedIndex = 3; 
    }else if(Client_Category==='NBFI'){
       document.getElementById("Client_Category").selectedIndex = 5; 
    }else if(Client_Category==='SECURITIES'){
       document.getElementById("Client_Category").selectedIndex = 10; 
    }else if(Client_Category==='RETAIL (HOME)'){
       document.getElementById("Client_Category").selectedIndex = 7; 
    }else if(Client_Category==='RETAIL (SOHO)'){
       document.getElementById("Client_Category").selectedIndex = 11; 
    }else if(Client_Category==='RETAIL(CORPORATION)'){
       document.getElementById("Client_Category").selectedIndex = 6; 
    }
    
//  ...........................................................................................................................
var BTS_Name=new_search_array['olt_info']["BTS_Name"];
 if(BTS_Name==='Banani SMC BTS' || BTS_Name==='Bulu BTS' || BTS_Name==='Gulshan land view BTS' || BTS_Name==='Nikunjo BTS' || BTS_Name==='Chairman Sir Residenc BTS' || 
       BTS_Name==='Banani 28 Road BTS' || BTS_Name==='Banosree BTS' || BTS_Name==='Tejgaon BTS' || BTS_Name==='Mohanagar Project BTS' || BTS_Name==='DIT Project BTS' ||
       BTS_Name==='Mohakhali DOHS BTS' || BTS_Name==='Ahmed Tower BTS' || BTS_Name==='Gulshan 1 BTS' || BTS_Name==='Banani 28 BTS'){
        
        document.getElementById("Zone").selectedIndex = 3;
        var support_ofc='Banani';
        document.getElementById("Sub_Zone").value = support_ofc;
        $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
        
        var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
        
    }else if(BTS_Name==='Bashundhara BTS'){
        
       document.getElementById("Zone").selectedIndex = 3; 
       var support_ofc='Bashundhara';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
        var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
        
    }else if(BTS_Name==='Ghorashal BTS' || BTS_Name==='Madhobdi BTS' || BTS_Name==='Bhairab BTS' || BTS_Name==='Ashugonj BTS'){
        
       document.getElementById("Zone").selectedIndex = 3; 
       var support_ofc='Ashugonj';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
        var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if(BTS_Name==='Akhuara BTS' || BTS_Name==='Comilla BTS' || BTS_Name==='Daudkandi BTS' || BTS_Name==='Chadpur BTS'){
        
       document.getElementById("Zone").selectedIndex = 3; 
       var support_ofc='Comilla';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
        var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if(BTS_Name==='Concord BTS' || BTS_Name==='Dhanmondi Office BTS' || BTS_Name==='Monipuripara BTS' || BTS_Name==='Hatirpul BTS' || BTS_Name==='Mohammadpur BTS' || BTS_Name==='Kawranbazar BTS'){
        
       document.getElementById("Zone").selectedIndex = 3; 
       var support_ofc='Dhanmondi';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
        var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if(BTS_Name==='Gazipur BTS' || BTS_Name==='Mawna BTS' || BTS_Name==='Joypara BTS'){
        
       document.getElementById("Zone").selectedIndex = 3; 
       var support_ofc='Gazipur';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
        var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Joypara BTS'){
        
       document.getElementById("Zone").selectedIndex = 3; 
       var support_ofc='Joypara';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
        var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Easkaton BTS' || BTS_Name==='Wari BTS' ||  BTS_Name==='Jatrabari BTS' ||  BTS_Name==='Khilgaon BTS' || 
              BTS_Name==='Malek Mension BTS' ||  BTS_Name==='Imamgonj BTS' ||   BTS_Name==='Segunbagicha BTS'){
        
       document.getElementById("Zone").selectedIndex = 3; 
       var support_ofc='Motijheel';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
        var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Mirpur (Banarosi polli) BTS' || BTS_Name==='Mirpur DOHS BTS' || BTS_Name==='Mirpur-2 BTS'){
        
       document.getElementById("Zone").selectedIndex = 3; 
       var support_ofc='Mirpur_DOHS';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
        var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    } else if( BTS_Name==='Kishoregonj BTS' || BTS_Name==='M.Sing BTS' || BTS_Name==='Vhaluka BTS'){
        
       document.getElementById("Zone").selectedIndex = 3; 
       var support_ofc='Mymensing';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
        var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    } else if( BTS_Name==='Narayangonj BTS' || BTS_Name==='Munshigonj BTS' || BTS_Name==='Siddirgonj BTS'){
        
       document.getElementById("Zone").selectedIndex = 3; 
       var support_ofc='Narayongonj';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
        var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    } else if( BTS_Name==='Savar EPZ BTS' || BTS_Name==='Savar Bazar BTS' || BTS_Name==='Manikgonj BTS' || BTS_Name==='Jamgora BTS'){
        
       document.getElementById("Zone").selectedIndex = 3; 
       var support_ofc='Savar';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
        var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Tangail BTS'){
        
       document.getElementById("Zone").selectedIndex = 3; 
       var support_ofc='Tangail';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
        var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Tongi BTS'){
        
       document.getElementById("Zone").selectedIndex = 3; 
       var support_ofc='Tongi';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
        var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='BNS BTS' || BTS_Name==='Uttara Office 4 BTS' || BTS_Name==='Uttara Sector 13 BTS' || BTS_Name==='Dhaka Airport BTS'){
        
       document.getElementById("Zone").selectedIndex = 3; 
       var support_ofc='Uttara';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
        var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Bogra BTS' || BTS_Name==='Naogoan BTS' || BTS_Name==='Joypurhat BTS' ){
        
       document.getElementById("Zone").selectedIndex = 1; 
       var support_ofc='Bogura';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
        var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Dinajpur BTS'){
        
       document.getElementById("Zone").selectedIndex = 1; 
       var support_ofc='Dinajpur';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
        var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Nator BTS' || BTS_Name==='Pabna BTS' || BTS_Name==='Ataikula BTS'){
        
       document.getElementById("Zone").selectedIndex = 1; 
       var support_ofc='Natore';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
        var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Rajshahi BTS' || BTS_Name==='Chapai BTS'){
        
       document.getElementById("Zone").selectedIndex = 1; 
       var support_ofc='Rajshahi';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
        var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Rangpur BTS' || BTS_Name==='Sayedpur BTS'){
        
       document.getElementById("Zone").selectedIndex = 1; 
       var support_ofc='Rangpur';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
        var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='CC Belkuchi BTS' || BTS_Name==='Sirajgonj POP'){
        
       document.getElementById("Zone").selectedIndex = 1; 
       var support_ofc='Sirajgonj';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
        var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Barishal BTS' || BTS_Name==='Potuakhali BTS' || BTS_Name==='Borguna BTS' || BTS_Name==='Mirhat BTS'){
        
       document.getElementById("Zone").selectedIndex = 4; 
       var support_ofc='Barisal';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
        var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Faridpur BTS' ){
        
       document.getElementById("Zone").selectedIndex = 4; 
       var support_ofc='Faridpur';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
        var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Jessore BTS' || BTS_Name==='Benapole BTS' || BTS_Name==='BL.Noapara' ){
        
       document.getElementById("Zone").selectedIndex = 4; 
       var support_ofc='Jessore';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
        var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Khulna BTS' || BTS_Name==='Mongla BTS' || BTS_Name==='Shatkhira BTS' || BTS_Name==='Fultala BTS' || BTS_Name==='Glaxomor BTS' 
            || BTS_Name==='Daulatpur BTS' || BTS_Name==='Gopalgonj BTS' ){ 
        
       document.getElementById("Zone").selectedIndex = 4; 
       var support_ofc='Khulna';   
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
        var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Kustia BTS' || BTS_Name==='Chuadanga BTS' ){ 
        
       document.getElementById("Zone").selectedIndex = 4; 
       var support_ofc='Kustia';   
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
        var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='C&F Tower BTS' || BTS_Name==='Ali Plaza BTS' || BTS_Name==='KEPZ BTS' || BTS_Name==='Sagorika BTS' || BTS_Name==='CTG Airport BTS' 
            || BTS_Name==='Khatungonj BTS' || BTS_Name==='Nazumiyarhat BTS' || BTS_Name==='Potia BTS' || BTS_Name==='Kaptai BTS' ){ 
        
       document.getElementById("Zone").selectedIndex = 2; 
       var support_ofc='Agrabad';   
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
        var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Coxs Bazar BTS' || BTS_Name==='Idgha BTS' || BTS_Name==='Lohagora BTS' || BTS_Name==='Chokoria BTS' ){ 
        
       document.getElementById("Zone").selectedIndex = 2; 
       var support_ofc='Coxs_bazar';   
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
        var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Khulshi BTS' || BTS_Name==='Kalurghat BTS' || BTS_Name==='Oxygen More BTS' || BTS_Name==='Mehedi Tower BTS' ){ 
        
       document.getElementById("Zone").selectedIndex = 2; 
       var support_ofc='Khulshi';   
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
        var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Chowmohoni BTS' || BTS_Name==='BL.Laxmipur' || BTS_Name==='BL.Raipur'){ 
        
       document.getElementById("Zone").selectedIndex = 2; 
       var support_ofc='Noakhali';   
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
        var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }  
//  ............................................................................................................................     
document.getElementById("BTS_Name").value=new_search_array['olt_info']["BTS_Name"];
document.getElementById("OLT_Name").value=new_search_array['olt_info']["OLT_Name"];
document.getElementById("PON").value=new_search_array['olt_info']["PON"];
document.getElementById("Port").value=new_search_array['olt_info']["Port"];

   tableHTML += "<tr>";
        tableHTML += "<td>" + new_search_array['olt_info']["BTS_Name"] + "</td>";
        tableHTML += "<td>" + new_search_array['olt_info']["OLT_Name"] + "</td>";
        tableHTML += "<td>" + new_search_array['olt_info']["PON"] + " / " + new_search_array['olt_info']["Port"] + "</td>";
        tableHTML += "<td>" + new_search_array['olt_info']["ONU_ID"] + "</td>";
        tableHTML += "<td>" + new_search_array['olt_info']["ONU_Model"] + "</td>";
        tableHTML += "<td>" + new_search_array['olt_info']["MAC_Address"] + "</td>";
        tableHTML += "<td>" + new_search_array['olt_info']["V_LAN"] + "</td>";
    tableHTML += "</tr>";
    
    $("#client_tbl").html(tableHTML);
//  ......................................................................................................................  

//alert(" Category ...."+new_search_array['client_info']['AddressLine1']);\
if(mq_Client_Name===undefined){
  document.getElementById("Sub_name").innerHTML='Subscriber Name : '+new_search_array['client_info']['SubscriberName'];
  document.getElementById("Sub_id").innerHTML='Subscriber ID : '+new_search_array['client_info']['SubscriberID'];
  document.getElementById("C_name").innerHTML='Contact Person : '+new_search_array['client_info']['ContactPerson'];
  document.getElementById("email").innerHTML='Email : '+new_search_array['client_info']['Email'];
  document.getElementById("Address").innerHTML='Address : '+new_search_array['client_info']['AddressLine1'];
  document.getElementById("Package").innerHTML='Package : '+new_search_array['client_info']['PackageBW'];
  document.getElementById("Phone").innerHTML='Phone : '+new_search_array['client_info']['PhoneNo'];
  document.getElementById("Status").innerHTML=new_search_array['client_info']['SubscriberStatus'];  
}else if(mq_Client_Name != null){
    document.getElementById("Sub_name").innerHTML='Subscriber Name : '+new_search_array['client_info']['F_Name'] + ' '+new_search_array['client_info']['L_Name'];
    document.getElementById("Sub_id").innerHTML='Subscriber ID :' +new_search_array['client_info']['user_id'] ;
    document.getElementById("C_name").innerHTML='Contact Person : '+new_search_array['client_info']['F_Name'] + ' '+new_search_array['client_info']['L_Name'];
    document.getElementById("email").innerHTML='Email : '+new_search_array['client_info']['Email'] ;
    document.getElementById("Address").innerHTML='Address : '+new_search_array['client_info']['Address'] +', '+ new_search_array['client_info']['City'] + ', '+  new_search_array['client_info']['ZIP'];
    document.getElementById("Package").innerHTML='Package : '+ new_search_array['client_info']['package'] ;
    document.getElementById("Phone").innerHTML='Mobile : '+new_search_array['client_info']['MOBILE'] ;
    var status=new_search_array['client_info']['stats'];
    if(status=='1'){
       document.getElementById("Status").innerHTML=' Status : Active';  
    }else{
       document.getElementById("Status").innerHTML=' Status : Inactive';
    }
     
}
 

}else if( Client_Name != undefined && mis_Client_Name === undefined){
    
//    document.getElementById("Sub_name").innerHTML='Subscriber Name : '+new_search_array['client_info']['F_Name'] + ' '+new_search_array['client_info']['L_Name'];
//    document.getElementById("Sub_id").innerHTML=null;
//    document.getElementById("C_name").innerHTML=null;
//    document.getElementById("email").innerHTML='Email : '+new_search_array['client_info']['Email'] ;
//    document.getElementById("Address").innerHTML=null;
//    document.getElementById("Package").innerHTML=null;
//    document.getElementById("Phone").innerHTML='Mobile : '+new_search_array['client_info']['MOBILE'] ;;
//    document.getElementById("Status").innerHTML=null;
//    
//    document.getElementById("Client_Name").value=new_search_array["Client_Name"];
    
    if(Client_Category==='RETAIL'){
       document.getElementById("Client_Category").selectedIndex = 9; 
    }else if(Client_Category==='CORPORATE'){
       document.getElementById("Client_Category").selectedIndex = 2; 
    }else if(Client_Category==='BANK'){
       document.getElementById("Client_Category").selectedIndex = 1; 
    }else if(Client_Category==='COMPLEMENTARY'){
       document.getElementById("Client_Category").selectedIndex = 3; 
    }else if(Client_Category==='NBFI'){
       document.getElementById("Client_Category").selectedIndex = 5; 
    }else if(Client_Category==='SECURITIES'){
       document.getElementById("Client_Category").selectedIndex = 10; 
    }else if(Client_Category==='RETAIL (HOME)'){
       document.getElementById("Client_Category").selectedIndex = 7; 
    }else if(Client_Category==='RETAIL (SOHO)'){
       document.getElementById("Client_Category").selectedIndex = 11; 
    }else if(Client_Category==='RETAIL(CORPORATION)'){
       document.getElementById("Client_Category").selectedIndex = 6; 
    }
    
    if(BTS_Name==='Banani SMC BTS' || BTS_Name==='Bulu BTS' || BTS_Name==='Gulshan land view BTS' || BTS_Name==='Nikunjo BTS' || BTS_Name==='Chairman Sir Residenc BTS' || 
       BTS_Name==='Banani 28 Road BTS' || BTS_Name==='Banosree BTS' || BTS_Name==='Tejgaon BTS' || BTS_Name==='Mohanagar Project BTS' || BTS_Name==='DIT Project BTS' ||
       BTS_Name==='Mohakhali DOHS BTS' || BTS_Name==='Ahmed Tower BTS'){
        
        
        document.getElementById("Zone").selectedIndex = 3;
        var support_ofc='Banani';
        document.getElementById("Sub_Zone").value = support_ofc; 
        $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
        
        var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
        
    }else if(BTS_Name==='Bashundhara BTS'){
        
       document.getElementById("Zone").selectedIndex = 3; 
       var support_ofc='Bashundhara';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
       var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if(BTS_Name==='B.Baria BTS'){
        
       document.getElementById("Zone").selectedIndex = 3; 
       var support_ofc='Bbaria';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
       var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if(BTS_Name==='Akhuara BTS' || BTS_Name==='Comilla BTS' || BTS_Name==='Daudkandi BTS' || BTS_Name==='Chadpur BTS'){
        
       document.getElementById("Zone").selectedIndex = 3; 
       var support_ofc='Comilla';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
       var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if(BTS_Name==='Concord BTS' || BTS_Name==='Dhanmondi Office BTS' || BTS_Name==='Monipuripara BTS' || BTS_Name==='Hatirpul BTS' || BTS_Name==='Mohammadpur BTS' || BTS_Name==='Kawranbazar BTS'){
        
       document.getElementById("Zone").selectedIndex = 3; 
       var support_ofc='Dhanmondi';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
       var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if(BTS_Name==='Gazipur BTS' || BTS_Name==='Mawna BTS' || BTS_Name==='Joypara BTS'){
        
       document.getElementById("Zone").selectedIndex = 3; 
       var support_ofc='Gazipur';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
       var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Joypara BTS'){
        
       document.getElementById("Zone").selectedIndex = 3; 
       var support_ofc='Joypara';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
       var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Easkaton BTS' || BTS_Name==='Wari BTS' ||  BTS_Name==='Jatrabari BTS' ||  BTS_Name==='Khilgaon BTS' || 
              BTS_Name==='Malek Mension BTS' ||  BTS_Name==='Imamgonj BTS' ||   BTS_Name==='Segunbagicha BTS'){
        
       document.getElementById("Zone").selectedIndex = 3; 
       var support_ofc='Motijheel';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
       var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Mirpur (Banarosi polli) BTS' || BTS_Name==='Mirpur DOHS BTS' || BTS_Name==='Mirpur-2 BTS' || BTS_Name==='Mirpur 10 BTS' ){
        
       document.getElementById("Zone").selectedIndex = 3; 
       var support_ofc='Mirpur_DOHS';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
       var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    } else if( BTS_Name==='Kishoregonj BTS' || BTS_Name==='M.Sing BTS' || BTS_Name==='Vhaluka BTS'){
        
       document.getElementById("Zone").selectedIndex = 3; 
       var support_ofc='Mymensing';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
       var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    } else if( BTS_Name==='Narayangonj BTS' || BTS_Name==='Munshigonj BTS' || BTS_Name==='Siddirgonj BTS'){
        
       document.getElementById("Zone").selectedIndex = 3; 
       var support_ofc='Narayongonj';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
       var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    } else if( BTS_Name==='Savar EPZ BTS' || BTS_Name==='Savar Bazar BTS' || BTS_Name==='Manikgonj BTS' || BTS_Name==='Jamgora BTS'){
        
       document.getElementById("Zone").selectedIndex = 3; 
       var support_ofc='Savar';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
       var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Tangail BTS'){
        
       document.getElementById("Zone").selectedIndex = 3; 
       var support_ofc='Tangail';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
       var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Tongi BTS'){
        
       document.getElementById("Zone").selectedIndex = 3; 
       var support_ofc='Tongi';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
    }else if( BTS_Name==='BNS BTS' || BTS_Name==='Uttara Office 4 BTS' || BTS_Name==='Uttara Sector 13 BTS' || BTS_Name==='Dhaka Airport BTS'){
        
       document.getElementById("Zone").selectedIndex = 3; 
       var support_ofc='Uttara';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
    }else if( BTS_Name==='Bogra BTS' || BTS_Name==='Naogoan BTS' || BTS_Name==='Joypurhat BTS' ){
        
       document.getElementById("Zone").selectedIndex = 1; 
       var support_ofc='Bogura';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
       var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Dinajpur BTS'){
        
       document.getElementById("Zone").selectedIndex = 1; 
       var support_ofc='Dinajpur';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
       var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Nator BTS' || BTS_Name==='Pabna BTS' || BTS_Name==='Ataikula BTS'){
        
       document.getElementById("Zone").selectedIndex = 1; 
       var support_ofc='Natore';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
    }else if( BTS_Name==='Rajshahi BTS' || BTS_Name==='Chapai BTS'){
        
       document.getElementById("Zone").selectedIndex = 1; 
       var support_ofc='Rajshahi';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
       var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Rangpur BTS' || BTS_Name==='Sayedpur BTS'){
        
       document.getElementById("Zone").selectedIndex = 1; 
       var support_ofc='Rangpur';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
       var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='CC Belkuchi BTS' || BTS_Name==='Sirajgonj POP'){
        
       document.getElementById("Zone").selectedIndex = 1; 
       var support_ofc='Sirajgonj';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
       var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Barishal BTS' || BTS_Name==='Potuakhali BTS' || BTS_Name==='Borguna BTS' || BTS_Name==='Mirhat BTS'){
        
       document.getElementById("Zone").selectedIndex = 4; 
       var support_ofc='Barisal';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
       var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Faridpur BTS' ){
        
       document.getElementById("Zone").selectedIndex = 4; 
       var support_ofc='Faridpur';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
       var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Jessore BTS' || BTS_Name==='Benapole BTS' || BTS_Name==='BL.Noapara' ){
        
       document.getElementById("Zone").selectedIndex = 4; 
       var support_ofc='Jessore';
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
       var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Khulna BTS' || BTS_Name==='Mongla BTS' || BTS_Name==='Shatkhira BTS' || BTS_Name==='Fultala BTS' || BTS_Name==='Glaxomor BTS' 
            || BTS_Name==='Daulatpur BTS' || BTS_Name==='Gopalgonj BTS' ){ 
        
       document.getElementById("Zone").selectedIndex = 4; 
       var support_ofc='Khulna';   
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
       var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Kustia BTS' || BTS_Name==='Chuadanga BTS' ){ 
        
       document.getElementById("Zone").selectedIndex = 4; 
       var support_ofc='Kustia';   
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
       var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='C&F Tower BTS' || BTS_Name==='Ali Plaza BTS' || BTS_Name==='KEPZ BTS' || BTS_Name==='Sagorika BTS' || BTS_Name==='CTG Airport BTS' 
            || BTS_Name==='Khatungonj BTS' || BTS_Name==='Nazumiyarhat BTS' || BTS_Name==='Potia BTS' || BTS_Name==='Kaptai BTS' ){ 
        
       document.getElementById("Zone").selectedIndex = 2; 
       var support_ofc='Agrabad';   
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
       var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Coxs Bazar BTS' || BTS_Name==='Idgha BTS' || BTS_Name==='Lohagora BTS' || BTS_Name==='Chokoria BTS' ){ 
        
       document.getElementById("Zone").selectedIndex = 2; 
       var support_ofc='Coxs_bazar';   
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
       var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Khulshi BTS' || BTS_Name==='Kalurghat BTS' || BTS_Name==='Oxygen More BTS' || BTS_Name==='Mehedi Tower BTS' ){ 
        
       document.getElementById("Zone").selectedIndex = 2; 
       var support_ofc='Khulshi';   
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
       var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }else if( BTS_Name==='Chowmohoni BTS' || BTS_Name==='BL.Laxmipur' || BTS_Name==='BL.Raipur'){ 
        
       document.getElementById("Zone").selectedIndex = 2; 
       var support_ofc='Noakhali';   
       document.getElementById("Sub_Zone").value = support_ofc; 
       $("#Engineer_Name").load("<?php echo base_url(); ?>CS_engineer_list/" + support_ofc + ".txt");
       
       var Zone=document.getElementById("Zone").value;
        if(Zone != 'Bogura'){
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/" + Zone + ".txt");
        }else{
            $("#Technician_Name").load("<?php echo base_url(); ?>CS_technician_name_list/subzone/" + support_ofc + ".txt");
        }
    }
    
    
    
    
    
    
//        ............................................ TABLE client Info .............................................................................
//    var tableHTML = "";
     
    tableHTML += "<tr>";
        tableHTML += "<td>" + BTS_Name + "</td>";
        tableHTML += "<td>" + OLT_Name + "</td>";
        tableHTML += "<td>" + PON + " / " + Port + "</td>";
        tableHTML += "<td>" + ONU_ID + "</td>";
        tableHTML += "<td>" + ONU_Model + "</td>";
        tableHTML += "<td>" + MAC_Address + "</td>";
        tableHTML += "<td>" + V_LAN + "</td>";
    tableHTML += "</tr>";
    
    $("#client_tbl").html(tableHTML);
     
}
 
        }, 'JSON');
    
}
    
</script>    








