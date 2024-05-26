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
               New / Assign Task From ( NOC )
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
                <div class='row'>
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Assign By <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="assign_by" id="assign_by" onchange="select_ID_Name();" required="">
                                <!--<option value="">Select Assign By</option>-->
                            </select>
                        </div>
                    </div> 
                    <div class="col-lg-3">
                        <div class="form-group">
                            <input type="hidden" name="hidden_id" value="<?php echo $id;?>" id="hidden_id">
                            <label>ID <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="employee_id" id="employee_id" required="" onchange="change_sub_items()">
                                <option  value="<?php echo $id; ?>"><?php echo $id; ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label> Name <div style="color:red;float: right;">*</div> </label>
<!--                                <input type="text" name="id" class="form-control" placeholder="Enter Your ID"/>-->
                            <select class="form-control" name="employee_name" id="employee_name" onchange="change_id()" required="">
                                <option value="<?php echo $name; ?>"><?php echo $name; ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Priority Type <div style="color:red;float: right;"></div></label>
<!--                            <select class="form-control" name="priority_type" id="priority_type"  onchange="date_select()">
                                
                            </select>-->
                            <select class="form-control" name="priority_type" id="priority_type" required="" onchange="date_select()">
                                
                            </select>
                        </div>
                    </div>
<!--                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Task Type <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="type_task" id="type_task" required="">
                                <option value="" >Select Task Type</option>
                            </select>
                        </div>
                    </div>-->
                    
                </div>
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
                            <!--<input class="form-control" name="sub_task" id="sub_task" placeholder="Enter Sub Task">-->
                            
                             <select class="form-control" name="sub_task" id="sub_task" required="">
                                <option value="" >Select Sub-Task</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Client / BTS / Provider Name<div style="color:red;float: right;">*</div></label>
                            <input class="form-control" name="client_bts_provider_name" id="client_bts_provider_name" placeholder="Enter Client/BTS/Provider name" required="">
                        </div>
                    </div>
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>MIS / MQ Ticket ID </label>
                            <input class="form-control" name="mis_mq_ticket_id" id="mis_mq_ticket_id" placeholder="Enter MIS / MQ Ticket ID">
                        </div>
                    </div>
<!--                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Assign By <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="assign_by" id="assign_by" onchange="select_ID_Name();" required="">
                                <option value="">Select Assign By</option>
                            </select>
                        </div>
                    </div>                    -->
                </div>
                <div class="row">
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Receipt Phone Number </label>
                            <input class="form-control" name="Receipt_Phone" id="Receipt_Phone" placeholder="Enter Receipt Phone Number">
                        </div>
                    </div>
                    <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>Start Date<div style="color:red;float: right;">*</div> <i class="fa fa-calendar"></i></label>                                  
                            <input  class="form-control" id="s_date" onclick="check_date()" value="" name="s_date"  placeholder="DD-MM-YYYY H:M:S" required="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>End Date<div style="color:red;float: right;">*</div> <i class="fa fa-calendar"></i></label>
                            <input  class="form-control" id="e_date" onclick="check_date()" value="" name="e_date" onchange="check_high_p_time();"  placeholder="DD-MM-YYYY H:M:S" required="">                                                 
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="states" id="states" >
                                <option>Pending</option>
                                <!--                                        <option>continue</option>-->
                                <option selected="selected">Done</option>  
                            </select>
                        </div>
                    </div> 
                </div>  
                
                <div class="row">
                 <div class="col-lg-6">
                        <div class="form-group">
                          <label>Comments <div style="color:red;float: right;"></div></label>
                            <textarea class="form-control" rows="3" name="comments" id="comments"></textarea>
                        </div>
                    </div>  
                    
                    <div class="col-lg-6">
                        <div class="form-group"><br><br>
                          <button type="submit" class="btn btn-default" value="save" >Save</button>
                        </div>
                    </div>
                </div>
                
                <!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
<!--                <button type="submit" class="btn btn-default" value="save" >Save</button>-->
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
   
function date_select(){    
       var priority_type= document.getElementById("priority_type").value;

        if( priority_type == 'High'){
           document.getElementById("s_date").value=null;
           document.getElementById("e_date").value=null;
        }else{

//           document.getElementById("s_date").value='t';
//           document.getElementById("e_date").value=<?php // echo date("d-m-Y h:i:sa"); ?> ;
        }  
       
    }





</script>




<script type="text/javascript">    
    function select_ID_Name(){
        var id= document.getElementById("hidden_id").value;
        var assign_by= document.getElementById("assign_by").value;
        if(assign_by == 'Self'){
           document.getElementById("employee_id").value=id;
           change_sub_items();
        }else{
//           document.getElementById["employee_name"].selectedIndex = 0; 
//           document.getElementById["employee_id"].selectedIndex = 0;
           document.forms["assign_task_from"]["employee_id"].selectedIndex=0;
           document.forms["assign_task_from"]["employee_name"].selectedIndex=0;
        }
      
//       $("#assign_by").change(function() {
//		$("#sub_task").load("<?php echo base_url(); ?>textdata/" + $(this).val() + ".txt");
//	});
       
    }
    
</script>
<script>
    function validateForm() {

        document.getElementById("info_span").innerHTML = "";
//    $('html,body').scrollTop(0);

//        var x = document.forms["assign_task_from"]["employee_id"].selectedIndex;
//        if (x == null || x == 0) {
//            document.getElementById("info_span").innerHTML = "Please Select Employee ID";
//            submit_or_not = 1;
//        }
//
//        var x = document.forms["assign_task_from"]["employee_name"].selectedIndex;
//        if (x == null || x == 0) {
//            document.getElementById("info_span").innerHTML = "Please Select Employee Name";
//            submit_or_not = 1;
//        }

        var x = document.forms["assign_task_from"]["type_task"].selectedIndex;
        if (x == null || x == 0) {
            document.getElementById("info_span").innerHTML = "Please Select Type Task";
            submit_or_not = 1;
        }

        var x = document.forms["assign_task_from"]["sub_task"].value;
        if (x == null || x == "") {
            document.getElementById("info_span").innerHTML = "Please Select Task Details";
            submit_or_not = 1;
        }
        
//         var x = document.forms["assign_task_from"]["assign_by"].selectedIndex;
//        if (x == null || x == 0) {
//            document.getElementById("info_span").innerHTML = "Please Select Assign By";
//            submit_or_not = 1;
//        }
        
//        var x = document.forms["assign_task_from"]["start_date_id"].value;
//        if (x == null || x == "") {
//            document.getElementById("info_span").innerHTML = "Please Provide Start Date.";
//            submit_or_not = 1;
////      return false;
//        }

    }

    function change_sub_items()
    {
        var x = document.forms["assign_task_from"]["employee_id"].selectedIndex;
        if (x == 1)
        {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 1;
        }
        else if (x == 2) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 2;
        }
        else if (x == 3) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 3;
        }
        else if (x == 4) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 4;
        }
        else if (x == 5) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 5;
        }
        else if (x == 6) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 6;
        }
        else if (x == 7) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 7;
        }
        else if (x == 8) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 8;
        }
        else if (x == 9) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 9;
        }
        else if (x == 10) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 10;
        }
        else if (x == 11) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 11;
        }
        else if (x == 12) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 12;
        }
        else if (x == 13) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 13;
        }
        else if (x == 14) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 14;
        }
        else if (x == 15) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 15;
        }
        else if (x == 16) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 16;
        }
        else if (x == 17) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 17;
        }
        else if (x == 18) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 18;
        }
        else if (x == 19) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 19;
        }
        else if (x == 20) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 20;
        }
        else if (x == 21) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 21;
        }
        else if (x == 22) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 22;
        }
        else if (x == 23) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 23;
        }
        else if (x == 24) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 24;
        }
         else if (x == 25) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 25;
        }
         else if (x == 26) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 26;
        }
         else if (x == 27) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 27;
        }
         else if (x == 28) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 28;
        }        
         else if (x == 29) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 29;
        }      
         else if (x == 30) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 30;
        }      
         else if (x == 31) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 31;
        }
        else if (x == 32) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 32;
        }
        else if (x == 33) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 33;
        }
        else if (x == 34) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 34;
        }
        else if (x == 35) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 35;
        }
        else if (x == 36) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 36;
        }
        else if (x == 37) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 37;
        }
        else if (x == 38) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 38;
        }
        else if (x == 39) {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 39;
        }
        else {
            document.forms["assign_task_from"]["employee_name"].selectedIndex = 0;
        }

    }
//            .................................................................................





 function change_id()
    {
        var x = document.forms["assign_task_from"]["employee_name"].selectedIndex;
        if (x == 1)
        {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 1;
        }
        else if (x == 2) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 2;
        }
        else if (x == 3) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 3;
        }
        else if (x == 4) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 4;
        }
        else if (x == 5) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 5;
        }
        else if (x == 6) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 6;
        }
        else if (x == 7) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 7;
        }
        else if (x == 8) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 8;
        }
        else if (x == 9) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 9;
        }
        else if (x == 10) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 10;
        }
        else if (x == 11) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 11;
        }
        else if (x == 12) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 12;
        }
        else if (x == 13) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 13;
        }
        else if (x == 14) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 14;
        }
        else if (x == 15) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 15;
        }
        else if (x == 16) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 16;
        }
        else if (x == 17) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 17;
        }
        else if (x == 18) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 18;
        }
        else if (x == 19) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 19;
        }
        else if (x == 20) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 20;
        }
        else if (x == 21) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 21;
        }
        else if (x == 22) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 22;
        }
        else if (x == 23) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 23;
        }
        else if (x == 24) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 24;
        }
         else if (x == 25) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 25;
        }
         else if (x == 26) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 26;
        }
         else if (x == 27) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 27;
        }
         else if (x == 28) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 28;
        }
         else if (x == 29) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 29;
        }
         else if (x == 30) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 30;
        }
         else if (x == 31) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 31;
        }
         else if (x == 32) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 32;
        }else if (x == 33) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 33;
        }else if (x == 34) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 34;
        }else if (x == 35) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 35;
        }else if (x == 36) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 36;
        }else if (x == 37) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 37;
        }else if (x == 38) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 38;
        }else if (x == 39) {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 39;
        }
        else {
            document.forms["assign_task_from"]["employee_id"].selectedIndex = 0;
        }

    }
</script>



<script type="text/javascript">
    function check_high_p_time(){


// ................................................................................................

        var s_date=document.getElementById("s_date").value; 
        var splite_s_date_time = s_date.split(' ');
        var splite_s_date=splite_s_date_time[0];
        var new_s_date = splite_s_date.split("-").reverse().join("-");
        //alert('NEW Start DATE  '+new_s_date);

        var e_date=document.getElementById("e_date").value; 
        var splite_e_date_time = e_date.split(' ');
        var splite_e_date=splite_e_date_time[0];
        var new_e_date = splite_e_date.split("-").reverse().join("-");
        //alert('NEW End DATE  '+new_e_date);

        if ((Date.parse(new_e_date) < Date.parse(new_s_date))) {
        //alert("End date should be greater than Start date");
        document.getElementById("info_span").innerHTML = "End Date should be greater than Start Date !";
        document.getElementById("e_date").value=null;
        $('html,body').scrollTop(0);
        exit();
        }else{
        //alert('NOT WORK');
        }
//..............................................................................................        

        
        var employee_id = document.getElementById("employee_id").value;
        if (employee_id == null || employee_id == 0) {
            document.getElementById("info_span").innerHTML = "Please Select Employee ID ..!";
            document.getElementById("e_date").value=null;
            $('html,body').scrollTop(0);
            exit();
        }
        var s_date = document.getElementById("s_date").value;
        if (s_date == null || s_date == 0) {
        document.getElementById("info_span").innerHTML = "Please Select Start Date!";
        document.getElementById("e_date").value=null;
        $('html,body').scrollTop(0);
        exit();
        }  
        
        
     var s_date=document.getElementById("s_date").value; 
//     var s_date='24-07-2018 00:00:00'; 
     var e_date=document.getElementById("e_date").value;  
//     var e_date='24-07-2018 10:00:00';
     var employee_id=document.getElementById("employee_id").value;
    
//     var employee_id='L3T1181';
     
//     new_start_date='2018-07-24 00:00:00';
//     alert("S date  "+s_date+'e date   '+ e_date);
     
       
            $.post('<?php echo base_url('index.php/welcome/Check_High_priority_time/'); ?>', {s_date: s_date,e_date: e_date,employee_id:employee_id},
            function (data) {
//                alert(data);
                
                if( data == '1' ){
//                    alert("Already High Priority Task Assign in that Time.Please Different Time to Assign That Task. ");
                document.getElementById("info_span").innerHTML = employee_id+" Already High Priority Task Assign in that Time.Please Try Different Time to Assign That Task. ";
                }else{
                    document.getElementById("info_span").innerHTML = null;
                }
                
//                if (data.exists) {
//                    
//                    alert("YES ");
//                } else {
//                      alert("NO ");
////                    var array = JSON.stringify(data);
////                    var newArray = JSON.parse(array);
////                    $("#search_by_BTS_Name").autocomplete({
////                        source: newArray
////                    });
//                }
            }, 'JSON');
        
     
     
     
     
    }
</script>    



<script>
function null_from(){
    
      document.forms["assign_task_from"]["employee_id"].selectedIndex = 0;
      document.forms["assign_task_from"]["employee_name"].selectedIndex = 0;
      document.forms["assign_task_from"]["type_task"].selectedIndex=0;
      document.forms["assign_task_from"]["priority_type"].selectedIndex=0;
      document.forms["assign_task_from"]["states"].selectedIndex=0;
      document.forms["assign_task_from"]["sub_task"].value = null;
      document.forms["assign_task_from"]["s_date"].value = <?php echo date("d-m-Y H:i:s");?>;
      document.forms["assign_task_from"]["e_date"].value = <?php echo date("d-m-Y H:i:s");?>;
      document.forms["assign_task_from"]["mis_mq_ticket_id"].value = null; 
      document.forms["assign_task_from"]["client_bts_provider_name"].value = null; 
      document.forms["assign_task_from"]["assign_by"].selectedIndex=0;
      document.forms["assign_task_from"]["comments"].value = null; 
//      document.getElementById("myTextarea").value
      
}
</script>

<script>
    $("form#assign_task_from").submit(function () {
        
//        var submit_or_not=check_save_info();
//        alert("TEST...."+submit_or_not);
      
        validateForm();
        
//        if (submit_or_not == 'true')
//        {
//            alert('YES');
//        }else{
//            alert('NO');
//        }
//       exit();
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/welcome/save_task_info_funcation/'); ?>",
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
		
			$("#type_task").change(function() {
				$("#sub_task").load("<?php echo base_url(); ?>textdata/" + $(this).val() + ".txt");
			});
		});
</script>


