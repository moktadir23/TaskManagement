<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<?php
$id = $this->session->userdata('id');
?>
<div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                          ERT Task Update Page
                        </h3>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="#">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Comments Page &nbsp;Time: <?php echo date('H:i:s'); ?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
               <div class="row">
                    <div class="col-lg-12">
                        
                        <form action="" name="ERT_comments_from" id="ERT_comments_from" method="">                
                        <!--<form action="<?php echo base_url();?>index.php/welcome/update_new_comments_funcation" method="post">-->
                             
                            <input type="hidden" name="p_key" id="p_key" class="form-control" value="<?php echo $pick_p_key->p_key;  ?>">
                             <input type="hidden" name="Zone" id="Zone" class="form-control" value="<?php echo $pick_p_key->Zone;  ?>">
                            <input type="hidden" name="Sub_Zone" id="Sub_Zone" class="form-control" value="<?php echo $pick_p_key->Sub_Zone;  ?>">
                            
                            <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                <label>Date<div style="color:red;float: right;">*</div></label>
                                <input  class="form-control" readonly="readonly" id="e_date" value="<?php echo date("d-m-Y H:i:s"); ?>" name="e_date"  placeholder="DD-MM-YYYY H:M:S" required="">
                                </div>
                            </div>
                            
 <?php 
$Status = $pick_p_key->Status; 
 if($Status == 'Active' || $Status == 'Collected' || $Status == 'Device lost' ){
 
 ?> 
                            <div class="col-lg-3">
                                <div class="form-group">
                                <label>Status<div style="color:red;float: right;">*</div> </label>
                                <select class="form-control" name="" id="" disabled="disabled" required="">
                                    <option value="">Select status </option>
                                </select> 
                                </div>
                            </div>
 <?php } else { ?>                                  
                            <div class="col-lg-3">
                                <div class="form-group">
                                <label>Status<div style="color:red;float: right;">*</div> </label>
                                <select class="form-control" name="status" id="status" required="">
                                    <option value="">Select status </option>
                                </select> 
                                </div>
                            </div>
 <?php } ?>                                  
                            
                                
                          <div class="col-lg-3">
                        <div class="form-group">
                            <label>Employee Name <div style="color:red;float: right;">*</div> </label>
<!--                                <input type="text" name="id" class="form-control" placeholder="Enter Your ID"/>-->
                            <select class="form-control" name="Engineer_Name" id="Engineer_Name" onchange="pick_engineer_id()" required="">
                                <option value="">Select Name</option>
                            </select>
                        </div>
                    </div>       
                       <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            
                            <label>Employee ID <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Engineer_ID" id="Engineer_ID" required="" onchange="change_sub_items()">
                                <option  value="">Select Employee ID</option>
                            </select>
                        </div>
                    </div>         
                                
                                
                                
                          
                        </div>
                            <div class="row">
                            <div class="col-lg-3"> 
                                <div class="form-group">
                                    <label>Support Type <div style="color:red;float: right;">*</div></label>
                                    <select class="form-control" name="support_type" id="support_type" required="">
                                        <option value="" >Select Support Type</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                <label>Technician Name<div style="color:red;float: right;">*</div></label>
                                <?php //  echo $pick_p_key; ?>                               
                                   <select class="form-control" name="Technician_Name" id="Technician_Name">
                                        <option value="" >Select Technician Name</option>
                                    </select>
                                </div>
                            </div>
                                <div class="col-lg-3">
                                <div class="form-group">
                                <label>Comments<div style="color:red;float: right;">*</div></label>
                                <?php //  echo $pick_p_key; ?>                               
                                
                                <textarea class="form-control" rows="2" name="comments" id="comments" required=""></textarea>
                                </div>
                            </div>
                                <div class="col-lg-3">
   
                        <button type="submit" class="btn btn-default" value="Save" id="update_comments">Update</button>
                        
                     
                        
                        <!--<button class="btn btn-default" id="done_task" onclick="done_task_with_comments();" >Done Task</button>-->
                            
                                </div>
                                </div>
                        </form>

                    </div>
                </div>
                
                
                
                
               <br> 
                
                
                
                
                <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <!--<th>Time</th>-->
                                        <th>Comments</th>  
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    
<?php
//      echo '<pre>';
//      print_r($pick_comments);
   foreach ($pick_comments as $key=>$values)
   {
?>  
                                    
                                    <tr> 
                                         <td><?php echo $values['employee_id']; ?></td>
                                         <td><?php echo $values['comments_date']; ?></td>
                                        
                                         <td><?php echo $values['comments']; ?></td> 
                                    </tr>
<?php
    }
?>
                                    <tr><td id='info_span'></td></tr>
                                </tbody>
                            </table>
                            </div> 
      
             
            </div>


 
<script>
    $("form#ERT_comments_from").submit(function () {
             
        var formData = new FormData($(this)[0]);
        
//        alert("WORK ON PAGE .TRY AGAIN FEW MINUTE LATER");
//        exit();
        
        $.ajax({
            url: "<?php echo base_url('index.php/ert_controller/ERT_update_new_comments/'); ?>",
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
                
//                alert('successfully Done'+data);
              
              
                data = $.parseJSON(data);
                $('#info_span').append(data.messages);
              
//              var status=document.getElementById("status").value;

           
                
//            data = $.parseJSON(data); 
//                                              
//            $('#info_span').append(data.messages);
            },
            cache: false,
            contentType: false,
            processData: false
        });
        return false;
        
        
        
        
    });
    
</script>



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
  		
            $("#support_type").change(function() {  
                
               var Sub_Zone=document.getElementById("Sub_Zone").value;
               var support_type=document.getElementById("support_type").value;
               if( support_type == 'Field' ){
                    $("#Technician_Name").load("<?php echo base_url(); ?>ert_technician_name_list/" + Sub_Zone + ".txt");
          
               }
            });
  
</script>

<script>
  		
            $("#status").change(function() {
               var Sub_Zone=document.getElementById("Sub_Zone").value;
//               var support_type=document.getElementById("support_type").value;
                    $("#Engineer_Name").load("<?php echo base_url(); ?>ert_employee_name_list/" + Sub_Zone + ".txt");
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