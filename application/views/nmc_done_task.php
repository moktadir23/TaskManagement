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
               Done Task From ( NMC )
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
            <form name="assign_task_from" action="<?php echo base_url() ?>index.php/nmc_c/update_nmc_task" id="assign_task_from" method="POST">
                <input type="hidden" name="tki" value="<?php echo $pick_data->tki; ?>" id="tki">
                <input type="hidden" name="Incident_for" value="<?php echo $pick_data->Incident_for; ?>" id="Incident_for">
                <input type="hidden" name="in_Occurred" value="<?php echo $pick_data->in_Occurred; ?>" id="in_Occurred">
                <div class='row'> 
                     <div class="col-lg-3">
                        <div class="form-group">
                          <label> Incident Resolved <i class="fa fa-calendar"></i>  <div style="color:red;float: right;">*</div></label>
                           
                          <input  class="form-control" onchange="calculate_Duration();" id="s_date" value="<?php echo date("d-m-Y H:i:s"); ?>" name="s_date"  placeholder="DD-MM-YYYY H:M:S" required="">
                        </div>
                    </div>
                    
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Duration<div style="color:red;float: right;"> *</div></label>
                            <input class="form-control" name="Duration" id="Duration" placeholder="0 Days HH:mm:ss" required="">
                        </div>
                    </div> 
                     <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Final Reason <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Final_Reason" id="Final_Reason" required="">
                                <option value="" >Select Type</option>
                            </select>
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
                  
                </div>
                <div class="row"> 
                      <div class="col-lg-3">
                        <div class="form-group">
                            <!--<input type="hidden" name="hidden_id" value="<?php echo $id;?>" id="hidden_id">-->
                            <label>Employee ID <div style="color:red;float: right;">*</div></label>
                            <input type="text" name="Engineer_ID" readonly="readonly" id="Engineer_ID" class="form-control" value="<?php echo $id;?>" placeholder="Enter Your ID"/>
<!--                            <select class="form-control" name="Engineer_ID" id="Engineer_ID" required="" onchange="change_sub_items()">
                                <option  value="">Select Employee ID</option>
                            </select>-->
                        </div>
                    </div>
                    
                    
                    
                    
                    <div class="col-lg-6">                            
                        <div class="form-group">
                          <label>Comments <div style="color:red;float: right;"></div></label>
                            <textarea class="form-control" rows="2" name="comments" id="comments"></textarea>
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
      document.forms["assign_task_from"]["s_date"].value=<?php echo date("d-m-Y H:i:s");?>;
      document.forms["assign_task_from"]["Final_Reason"].selectedIndex = 0;
      document.forms["assign_task_from"]["comments"].value=null;

//      document.getElementById("myTextarea").value
      
}
</script>

<script>
//    $("form#assign_task_from").submit(function () {
//       
////        alert("WORK ON PAGE .TRY AGAIN FEW MINUTE LATER");
////        exit();
//       
//       
//       
//        var formData = new FormData($(this)[0]);
//        $.ajax({
//            url: "<?php echo base_url('index.php/nmc_c/update_nmc_task/'); ?>",
//            type: 'POST',
//            data: formData,
//            async: false,
//            success: function (data) {
//                alert('Successfully Done');
//                null_from();
////                
////                
////            data = $.parseJSON(data);                                   
////            $('#info_span').append(data.messages);
//            },
//            cache: false,
//            contentType: false,
//            processData: false
//        });
//        return false;
//        window.location.href = "<?php echo base_url('index.php/welcome/Dashboard_funcation/'); ?>";
//    }
//      
//    );
</script>




<script src="../../js/jquery.min.js" type="text/javascript"></script>
 <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->


<script>
    $(function() {		
                var Incident_for=document.getElementById("Incident_for").value;
                 $("#Final_Reason").load("<?php echo base_url(); ?>nmc_Final_Reason/" + Incident_for + ".txt");
                 
                 
//................... Dutation TIME .............................................................

    
   var in_Occurred=document.getElementById("in_Occurred").value;
   var Occurred = in_Occurred.split(" ");
   var date1=Occurred[0];
   var time1=Occurred[1];
   var new_in_Occurred=date1+' '+time1;
   var datetime1 = new Date(new_in_Occurred);

   var in_Resolved=document.getElementById("s_date").value;
   var Resolved = in_Resolved.split(" ");
   var date2=Resolved[0];
   var new_date2= date2.split("-");
   var day=new_date2[0];
   var month=new_date2[1];
   var year=new_date2[2];
   var time2=Resolved[1];
   var new_in_Resolved=year+'-'+month+'-'+day+' '+time2;
   var datetime2 = new Date(new_in_Resolved);
       
    var res = Math.abs(datetime2 - datetime1) / 1000;
    var days = Math.floor(res / 86400);      
    var hours = Math.floor(res / 3600) % 24;        
    var minutes = Math.floor(res / 60) % 60;
    var seconds = res % 60;
//        .............................................................................................
    var date_vallid=date_vallidation(datetime2,datetime1);
//    alert(date_vallid);
    if(date_vallid==1){
          document.getElementById("Duration").value = days + ' Days ' + hours +':'+ minutes + ':'+ seconds ;
    }else{
          document.getElementById("Duration").value = null ;
    }


    });
    
    
    
</script>

<!--<script type="text/javascript">
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

</script>-->




<script type="text/javascript">

function calculate_Duration(){
    
   var in_Occurred=document.getElementById("in_Occurred").value;
   var Occurred = in_Occurred.split(" ");
   var date1=Occurred[0];
   var time1=Occurred[1];
   var new_in_Occurred=date1+' '+time1;
   var datetime1 = new Date(new_in_Occurred);

   var in_Resolved=document.getElementById("s_date").value;
   var Resolved = in_Resolved.split(" ");
   var date2=Resolved[0];
   var new_date2= date2.split("-");
   var day=new_date2[0];
   var month=new_date2[1];
   var year=new_date2[2];
   var time2=Resolved[1];
   var new_in_Resolved=year+'-'+month+'-'+day+' '+time2;
   var datetime2 = new Date(new_in_Resolved);
       
    var res = Math.abs(datetime2 - datetime1) / 1000;
    var days = Math.floor(res / 86400);      
    var hours = Math.floor(res / 3600) % 24;        
    var minutes = Math.floor(res / 60) % 60;
    var seconds = res % 60;
//        .............................................................................................
    var date_vallid=date_vallidation(datetime2,datetime1);
//    alert(date_vallid);
    if(date_vallid==1){
          document.getElementById("Duration").value = days + ' Days ' + hours +':'+ minutes + ':'+ seconds ;
    }else{
          document.getElementById("Duration").value = null ;
    }
  
  
}

function date_vallidation(datetime2,datetime1){
    
    
    document.getElementById("info_span").innerHTML =null;
    if ( datetime1 > datetime2 ) {
//        alert('Incident Resolved should be greater than Incident Occurred.');
        document.getElementById("info_span").innerHTML ='Incident Resolved should be greater than Incident Occurred.';
        document.getElementById("s_date").value=null; 
//        alert('NOT');
        return 0;
    }
    
//  .......................................................................................................    
   
    var Incident_resolved_datetime=document.getElementById("s_date").value;
    var split_date = Incident_resolved_datetime.split(" ");
    var Incident_resolved_date=split_date[0];
   
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    var today = dd + '-' + mm + '-' + yyyy;
    
    if( Incident_resolved_date > today){
        
        document.getElementById("info_span").innerHTML ='NOT Allow to Select Next Date.Please Try again.';
        document.getElementById("s_date").value=null; 
//        alert('NOT');
        return 0;
    }
    
    return 1;
    
    
}
</script>   


