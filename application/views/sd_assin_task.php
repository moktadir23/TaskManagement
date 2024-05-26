<!--<h1>under construction</h1>-->
<?php
$id = $this->session->userdata('id');
$name = $this->session->userdata('name');
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
  <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
               New / Assign Task From ( SD )
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
                <input type="hidden" name="hidden_name" value="<?php echo $name;?>" id="hidden_name">
                <div class='row'>
                      
                    

                   
                      <div class="col-lg-3">
                        <div class="form-group">
                            <label> Reference/Job Source<div style="color:red;float: right;">*</div> </label>
                            <input name="tki_id" id="tki_id"  class="form-control" onkeyup="tki_space_remove();" placeholder="Enter TKI ID" required="" autofocus/>
                            
                        </div>
                    </div>
                      <div class="col-lg-3"> 
                    <div class="form-group">
                            <label>Source <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="Source"  id="Source" >
                                <option value="" >Select Source </option>
                            </select>
                    </div>  
                          </div> 
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Task Type <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="type_task" id="type_task">
                                <option value="" >Select Task Type</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Action Type <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="action_type" id="action_type" onchange="Check_tki_id();">
                                <option value="" >Select Action Type</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class='row'>

                   
                      <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Customer ID<div style="color:red;float: right;"></div></label>
                            <input class="form-control" name="Client_id" id="Client_id" placeholder="Enter Client ID">
                        </div>
                    </div>
                    
                     <div class="col-lg-3">
                        <div class="form-group">
                          <label>Customer Name<div style="color:red;float: right;"></div></label>
                            <input class="form-control" name="Client_Name" id="Client_Name" placeholder="Enter Client Name">
                        </div>
                    </div>
                      <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Customer Category <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="Client_Category" id="Client_Category">
                                <option value="" >Select Client Category</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Assign By <div style="color:red;float: right;"></div></label>
                            <select class="form-control" onchange="assign_check()" name="assign_by" id="assign_by">
                                <option value="Self" >Self</option>
                                <!--<option value="Self" selected>Self</option>-->
                                
                            </select>
                             <!--<input class="form-control" name="assign_by" id="assign_by" required="">-->
                        
                        </div>
                    </div>
                    
                    
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Employee Name <div style="color:red;float: right;">*</div> </label>
<!--                                <input type="text" name="id" class="form-control" placeholder="Enter Your ID"/>-->
                          <input type="hidden" name="hidden_name" value="<?php echo $name;?>" id="hidden_name">
                            <select class="form-control" name="Engineer_Name" id="Engineer_Name" onchange="pick_engineer_id()" required="">
                                <option value="<?php echo $name; ?>"><?php echo $name; ?></option>
                            </select>
                        </div>
                    </div>
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
                            <input  class="form-control"  id="s_date" value="<?php echo date("d-m-Y H:i:s"); ?>" name="s_date"  placeholder="DD-MM-YYYY H:M:S" required="">
                        </div>
                    </div>
                    <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>End Date<div style="color:red;float: right;"></div> <i class="fa fa-calendar"></i></label>                                  
                            <input  class="form-control"  id="e_date" value="<?php echo date("d-m-Y H:i:s"); ?>" name="e_date"  placeholder="DD-MM-YYYY H:M:S">
                            <input type="hidden"  class="form-control" id="today" value="<?php echo date("d-m-Y H:i:s"); ?>" name="today">
                        </div>
                    </div>
                </div>  
                
                <div class="row">
                    <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>Task Date<div style="color:red;float: right;">*</div> <i class="fa fa-calendar"></i></label>                                  
                            <input  class="form-control"  id="cs_date" value="<?php echo date("d-m-Y H:i:s"); ?>" name="action_time"  placeholder="DD-MM-YYYY H:M:S" required="">
                        </div>
                    </div>
                    <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>Status<div style="color:red;float: right;"></div></label>                                  
                             <select class="form-control" name="Status" id="Status" onchange="check_status()" required="">
                                <!--<option  value="">Select Status</option>-->
                            </select>    
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                          <label>Comments <div style="color:red;float: right;"></div></label>
                            <textarea class="form-control" rows="2" maxlength="50" name="comments" id="comments"></textarea>
                        </div>
                    </div>
                    
                </div><br>
                <div class="row">
                    <div class="col-lg-11"></div>
                        <!--<div class="form-group"><br><br>-->
                            <label></label>
                            <!--<textarea class="form-control" rows="2" name="comments" id="comments"></textarea>-->
                       <div class="col-lg-1">
                           <button type="submit" class="btn btn-default" value="save" >Save</button>
                        </div>
                    </div> 
                </div>
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

      document.forms["assign_task_from"]["tki_id"].value = null;  
      document.forms["assign_task_from"]["Source"].selectedIndex=0;
      document.forms["assign_task_from"]["type_task"].selectedIndex=0;
      document.forms["assign_task_from"]["action_type"].selectedIndex=0;
      document.forms["assign_task_from"]["Client_id"].value = null;
      document.forms["assign_task_from"]["Client_Name"].value = null;   
      document.forms["assign_task_from"]["Client_Category"].selectedIndex=0;
      document.forms["assign_task_from"]["assign_by"].selectedIndex=0;
      document.forms["assign_task_from"]["status"].selectedIndex=0;
      document.forms["assign_task_from"]["s_date"].selectedIndex=<?php echo date("d-m-Y H:i:s");?>;
      document.forms["assign_task_from"]["e_date"].selectedIndex=<?php echo date("d-m-Y H:i:s");?>;
      document.forms["assign_task_from"]["comments"].value = null; 
      
}
  $( function() {
    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    $( "#Client_id" ).autocomplete({
      source: availableTags
    });
  } );
    
    
        function find_BTS() {

        var Client_id = document.getElementById("Client_id").value;
        
            $.post('/template/find_bts_name.php', {Client_id: Client_id}, function (data) {
                if (data.exists) {
                } else {

                    var array = JSON.stringify(data);
                    var newArray = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua &amp; Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia &amp; Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre &amp; Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts &amp; Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad &amp; Tobago","Tunisia","Turkey","Turkmenistan","Turks &amp; Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];
                   
                    $("#Client_id").autocomplete({
                        source: newArray
                    });
                }
            }, 'JSON');
        
    }


</script>

<script>
    $("form#assign_task_from").submit(function () {
       
//        alert("WORK ON PAGE .TRY AGAIN FEW MINUTE LATER");
//        exit();
       
//       var test=check_TKI();
//       var chkid=Check_tki_id();
//       
//       alert('TEST'+ test + 'chk id' + chkid);
//       
//       exit();

        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/sd_controller/save_task_info_funcation/'); ?>",
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
//                sss
//                alert('Successfully Done');
                null_from();
//             document.getElementById("info_span").innerHTML = "Successfully Done The Task";//                
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

<!--<script>
    $(function() {		
            $("#Division").change(function() {
                    $("#bts").load("<?php echo base_url(); ?>BTS_list/" + $(this).val() + ".txt");
            });
    });
</script>-->
<!--<script>
    $(function() {		
            $("#type_task").change(function() {
                    $("#Initial_Problem_Category").load("<?php echo base_url(); ?>IPTS_Initial_Problem_Category/" + $(this).val() + ".txt");
            });
    });
</script>-->
<script>
    $(function() {		
//            $("#Sub_Zone").change(function() {
//var assign_by= document.getElementById("assign_by").value;
//var name= document.getElementById("hidden_name").value;
//var id= document.getElementById("hidden_id").value;

document.getElementById("Engineer_Name").selectedIndex=document.getElementById("hidden_name").value;
document.getElementById("Engineer_ID").selectedIndex=document.getElementById("hidden_id").value;

//if(assign_by == 'Self'){
//    document.getElementById("Engineer_Name").value=name;
//    document.getElementById("Engineer_ID").value=id;
//}



//    $("#Engineer_Name").load("<?php echo base_url(); ?>SD_engineer_name_list/SD_engineer_list.txt");
//            });
    });
    
function assign_check(){
var assign_by= document.getElementById("assign_by").value;
var name= document.getElementById("hidden_name").value;
var id= document.getElementById("hidden_id").value;
if(assign_by== 'Self'){
    document.getElementById("Engineer_Name").value=name;
    document.getElementById("Engineer_ID").value=id;
}else{
     $("#Engineer_Name").load("<?php echo base_url(); ?>SD_engineer_name_list/SD_engineer_list.txt");
     document.getElementById("Engineer_ID").value=null;
}  
}
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

<script>
    function check_TKI(){
        var Source=document.getElementById("Source").value;
        var tki_id=document.getElementById("tki_id").value;
//        alert( Source + '....' + tki_id );
     document.getElementById("info_span").innerHTML = "";
     
     if(Source == 0){
        document.getElementById("info_span").innerHTML = "Please Select Job Source !";
        document.getElementById("tki_id").value=null;
        $('html,body').scrollTop(0);
        return 0;
        exit();
     }
     
     
     
        if(Source == 'MIS' || Source == 'MQ'){
            
            
            if( tki_id == null || tki_id == 0){
           
                   document.getElementById("Source").selectedIndex=0;
                   document.getElementById("info_span").innerHTML = "Please Enter TKI ID Before select Job Source (MIS/MQ) !";
//                   document.getElementById("e_date").value=null;
                   $('html,body').scrollTop(0);
                   return 0;
                   exit();
            }else{
                  return 1;
            }
        }       
    }
    
    
    function check_status(){
        
        var Status=document.getElementById("Status").value;
        if( Status == 'Completed' || Status == 'Canceled' ){
             document.getElementById("e_date").value=document.getElementById("today").value;
        }else{
           document.getElementById("e_date").value=null;  
        }     
    }
 
</script>
<script type="text/javascript">  
    
function tki_space_remove(){
       var old_tki_id = document.getElementById("tki_id").value;
    
//        var tki_id = old_tki_id.replace(/\s/g,'');
        var tki_id=old_tki_id.trim();
        document.getElementById("tki_id").value=tki_id;
   
}    
    
function Check_tki_id(){
   
//    var tki_id = $('#tki_id').val();
    var tki_id = document.getElementById("tki_id").value;    
    var Source=document.getElementById("Source").value;    
//    alert('TEST');
    
    
//if(Source == 'MIS' || Source == 'MQ'){
   
    
        $.post('<?php echo base_url();?>index.php/sd_controller/Check_tki_id', {
            tki_id: tki_id
        }, function (search_info_data) {

            var search_array = JSON.stringify(search_info_data);
            var new_search_array = JSON.parse(search_array);
//                alert("Search CTID_Number_SR...."+new_search_array["CTID_Number_SR"]);
                var result_tki_id=new_search_array["tki_id"];
if( result_tki_id == null){
    
}else{
     document.getElementById("tki_id").value=null; 
     alert("That's TKI ( "+ result_tki_id +" ) Already Review Done.Please try differen TKI ID");
}
 
        }, 'JSON');
        
//}

}
    
</script>
