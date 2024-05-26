

<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<!--<script>
    var submit_or_not = 0;
</script>-->

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
                KRA-Monthly
            </h3>
        </div>
    </div>
    <!-- /.row -->
    <div class="row"> 
        <div class="col-lg-12">
            <form action="" name="kra_from" id="kra_from" method="">

                <div class="row">
                    <div class="col-lg-3">
                        <label>Zone</label>
                        <select class="form-control" name="Zone" id="Zone"  required="">
                            <option value="">Select Zone</option>
                        </select>    
                    </div>
                    <div class="col-lg-3">
                        <label>Employee Name</label>
                        <select class="form-control" name="Engineer_Name" id="Engineer_Name" onchange="pick_engineer_id();"  required="">
                            <option value="">Select Engineer Name</option>
                        </select>    
                    </div>
                    <div class="col-lg-3">
                        <label>Employee ID</label>
                        <select class="form-control" name="Engineer_ID" id="Engineer_ID" required="">
                            <option value="">Select Engineer ID</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label>Month</label>
<!--                        <input type="" name="date_from" readonly="readonly" value="<?php echo date("d-m-Y"); ?>" id="start_date_id" class="form-control" placeholder="Enter from Date" required=""/>-->
                        <select class="form-control" name="month" id="month" onchange="check_duplicate_kra()" required="">
                            <option value="">Select Month</option>
                        </select>
                    </div>
                </div>
                
                
                <div class="row">
                    <div class="col-lg-3">
                        <label> Performance By</label>
                        <select class="form-control" name="year" id="year"  required="">
                            <option value="0">Select Session</option>
                            <option value="2018-2019">2018 - 2019</option>
                            <option selected="selected" value="2019-2020">2019 - 2020</option>
                            <option value="2020-2021">2020 - 2021</option>
                        </select>    
                    </div>
                </div>   
                
                
                
                
                <br><br>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-7">  
                                <label>Telephone Etiquette  /Quality assuranc /Ensure every operational process folowing  </label>
                                <div>
                                    <b>Measured by:</b>Random Sampling of Calls customer & Crossfunctional team/ quality of support folowing by process <br>
                                    <b> Base: </b>10-16call/ quality report or supervisor report.
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <input class="form-control" type="number" name="Telephone_Etiquette" id="Telephone_Etiquette"  value="0" required="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-7">  
                                <label>Accurecy of Complain /Adj nmc/Corp /Mail Adj </label>
                                <div>
                                    <b>Measured by:</b> Random Sampling of Complain Ticket within commited time <br>
                                    <b>Base:</b> 10 -16 ticket-Down/Up Log/SR-Ticket</div>
                            </div>
                            <div class="col-lg-5">
                                <input class="form-control" type="number" name="Accurecy_of_Complain" id="Accurecy_of_Complain"  value="0" required="">
                            </div>
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-7"> 
                                <label>Inbound service level achieved /Out ound/Monitor service level achieved</label>
                                <div>
                                    <b>Measured by:</b>Monthly Success Call Ratio and Calls of individual , base on Supervisior report  <br>
                                    <b> Base: </b> system information /Supervisor Monitoring</div>
                            </div>
                            <div class="col-lg-5">
                                <input class="form-control" type="number" name="Inbound_service_achieved" id="Inbound_service_achieved" value="0" required="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-7">   
                                <label>Total working Hour management/Total Login Hour</label>
                                <div>
                                    <b>Measured by:</b> Login , Logout, Report making , Oncall duty,sudden leave   <br>
                                    <b> Base: </b> 8 Hours</div>
                                </div>
                            <div class="col-lg-5">
                                <input class="form-control" type="number" name="Login_Hour" id="Login_Hour" value="0" required="">
                            </div>
                        </div>
                    </div>
                </div><br>


                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-7"> 
                                <label>Incharge(NMC/ACD//Mail) / Total Call  </label>
                                <div>
                                    <b>Measured by:</b> measured by Co-operate with agents, follow up to agent, Deceision making, Guideline,Call/Mail/SMS/Facebook distribution properl <br>
                                    <b> Base: </b> Reporting & Supervision or Supervisor Monitoring </div>
                            </div>
                            <div class="col-lg-5">
                                <input class="form-control" type="number" name="Call" id="Call" value="0" required="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-7">   
                                <label>Idle Time (  Avg Pause Time) / Daily Refresher  (session or end of the Session  ) </label>
                                <div>
                                    <b>Measured by:</b> Monthly call (system information)/ Willing to arrenge and guided Jr/co-worker <br>
                                    <b> Base:</b> Monthly individual Call/daily report /Supervisor Monitoring 
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <input class="form-control" type="number" name="Idle_Time" id="Idle_Time" value="0" required="">
                            </div>
                        </div>
                    </div>
                </div><br>


                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-7"> 
                                <label>Average Call After Time / Project Work /2pm-4pm work balance </label>
                                <div>
                                    <b>Measured by:</b> Monthly TG (system information)/Cross check  Work load /assign progect and report as per 2hours basis <br>
                                    <b> Base:</b> Monthly individual Call/Reporting /Data  
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <input class="form-control" type="number" name="Average_Call_After_Time" id="Average_Call_After_Time" value="0" required="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-7">    
                                <label>Wrap up time (Ave. Handling Time)/ TKI & CR relesed / Idea or Value added service/devlopment</label>
                                <div>
                                    <b>Measured by:</b> Monthly call (system information)/data/report /value add 
                                    <br><b> Base: </b>Monthly individual Call/Reporting Data /Performance Percentage </div>
                            </div>
                            <div class="col-lg-5">
                                <input class="form-control" type="number" name="Wrap_up_time" id="Wrap_up_time" value="0" required="">
                            </div>
                        </div>
                    </div>

                </div><br>


                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-7"> 
                                <label>First Call Resolution/session& opration update daily /FCR Bank&corp</label>
                                <div>
                                    <b>Measured by:</b> Monthly call (system information)/ incharge report<br>
                                    <b> Base:</b> 150 FCR/supervisor Monitoring/report</div>
                            </div>
                            <div class="col-lg-5">
                                <input class="form-control" type="number" name="First_Call_Resolution" id="First_Call_Resolution" value="0" required="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-7">    
                                <label>Schedule Adherence / Team Work & Monthly Report </label>
                                <div>
                                    <b>Measured by:</b> Monthly call (system information)/ incharge report <br>
                                    <b> Base: </b>Performance Percentage/report</div>
                            </div>
                            <div class="col-lg-5">
                                <input class="form-control"  type="number" name="Schedule_Adherence" id="Schedule_Adherence" value="0" required="">
                            </div>
                        </div>
                    </div>
                </div><br>
                
                  <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-7"> 
                                <label>Rating Point</label>
                            </div>
                            <div class="col-lg-5">
                                <input class="form-control" readonly="readonly" type="text" name="Rating_Point" id="Rating_Point" required="">
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-7">    
                                <input type="checkbox" name="Rating_chk" id="Rating_chk" onclick="sum_Rating_point()" value="1"> Click to  confirmation &nbsp; &nbsp;
                                <button type="submit" class="btn btn-default" value="save">Submit</button>
                            </div>
<!--                            <div class="col-lg-5">
                                <input class="form-control"  type="number" name="Schedule_Adherence" id="Schedule_Adherence" value="0" required="">
                            </div>-->
                        </div>
                    </div>
                </div><br>


<!--                <div class="row">
                    <div class="col-lg-3">
                        &nbsp;
                        <button type="submit" class="btn btn-default" value="save">Submit</button>
                    </div> 
                </div>-->

            </form>  
            <br>

        </div>
    </div>
</div>




<?php
//echo '<pre>';
//print_r($result);
//echo '</pre>';
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
            $("#Zone").change(function() {
                    $("#Engineer_Name").load("<?php echo base_url(); ?>hd_employee_list/" + $(this).val() + ".txt");
            });
    });
</script>
 

<script type="text/javascript">
function pick_engineer_id(){

    var Engineer_Name = $('#Engineer_Name').val();
//        alert('TEST'+Engineer_Name);
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
</script>
<script>
    function sum_Rating_point(){
       if( document.getElementById("Rating_chk").checked == true){
           var Telephone_Etiquette=document.getElementById("Telephone_Etiquette").value;
           var Accurecy_of_Complain=document.getElementById("Accurecy_of_Complain").value;
           var Inbound_service_achieved=document.getElementById("Inbound_service_achieved").value;
           var Login_Hour=document.getElementById("Login_Hour").value;
           var Call=document.getElementById("Call").value;
           var Idle_Time=document.getElementById("Idle_Time").value;
           var Average_Call_After_Time=document.getElementById("Average_Call_After_Time").value;
           var Wrap_up_time=document.getElementById("Wrap_up_time").value;
           var First_Call_Resolution=document.getElementById("First_Call_Resolution").value;
           var Schedule_Adherence=document.getElementById("Schedule_Adherence").value;
//           alert("TRUE");


           var total=  parseInt(Telephone_Etiquette) + parseInt(Accurecy_of_Complain)+ parseInt(Inbound_service_achieved)+ parseInt(Login_Hour)+ parseInt(Call)
                     + parseInt(Idle_Time)+ parseInt(Average_Call_After_Time)+ parseInt(Wrap_up_time)+ parseInt(First_Call_Resolution)+ parseInt(Schedule_Adherence);
            var avg_point=parseInt(total)/10;
           document.getElementById("Rating_Point").value=avg_point;
       }else{
//            alert("FALSE");
           document.getElementById("Rating_Point").value=null;
       }
    }
    
</script>    

<script>
    $("form#kra_from").submit(function () {
//        validateForm();
//        if (submit_or_not == 1)
//        {
//            exit;
//        }
if( document.getElementById("Rating_chk").checked == true){
 
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/hd_controller/save_kra_info_funcation/'); ?>",
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
}else{
    alert("Please Check CheckBox");
}
        
        
        
    }
      
    );
</script>
<script>
    
function check_duplicate_kra(){
    
    var Engineer_ID = $('#Engineer_ID').val();
    var month = $('#month').val();
    var year = $('#year').val();
    
    
        $.post('<?php echo base_url();?>index.php/hd_controller/Check_kra', {
            Engineer_ID:Engineer_ID,    
            month: month,
            year:year
        }, function (search_info_data) {

            var search_array = JSON.stringify(search_info_data);
            var new_search_array = JSON.parse(search_array);
//                alert("Search CTID_Number_SR...."+new_search_array["CTID_Number_SR"]);
                        var result_Engineer_ID=new_search_array["Engineer_ID"];
        if( result_Engineer_ID == null){

        }else{
             document.getElementById("month").value=null; 
             alert(" "+ Engineer_ID +" KRA in "+ month +"  Already  Done.Please try Differen ID or Month");


        }

                }, 'JSON');
    
}
</script>