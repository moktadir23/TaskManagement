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
               Follow UP From ( <?php echo $department;?> Team)
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
                <input type="hidden" name="p_key" id="p_key" value="<?php  echo $pick_p_key->p_key;  ?>">
                
<!--                <input type="hidden" name="Zone" id="Zone" value="<?php  echo $pick_p_key->Zone;  ?>">
                <input type="hidden" name="area" id="area" value="<?php  echo $pick_p_key->area;  ?>">
                <input type="hidden" name="Client_ID" id="Client_ID" value="<?php  echo $pick_p_key->Client_ID;  ?>">
                <input type="hidden" name="Client_Name" id="Client_Name" value="<?php  echo $pick_p_key->Client_Name;  ?>">
                <input type="hidden" name="Contact_Name" id="Contact_Name" value="<?php  echo $pick_p_key->Contact_Name;  ?>">
                <input type="hidden" name="phone" id="phone" value="<?php  echo $pick_p_key->phone;  ?>">
                <input type="hidden" name="email" id="email" value="<?php  echo $pick_p_key->email;  ?>">
                <input type="hidden" name="address" id="address" value="<?php  echo $pick_p_key->address;  ?>">
                <input type="hidden" name="L3_service" id="L3_service" value="<?php  echo $pick_p_key->L3_service;  ?>">-->
                
                <div class="row">
<!--                    <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>Next Follow Up Date<div style="color:red;float: right;"></div> <i class="fa fa-calendar"></i></label>                                  
                            <input  class="form-control" onchange="chk_date();" readonly=""  id="start_date_id"  name="start_date_id"  placeholder="DD-MM-YYYY" >
                        </div>
                    </div>-->
                    <!--sale_amount-->
<!--                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Sales Amount <div style="color:red;float: right;"></div></label>
                            <input  class="form-control"  id="sale_amount"  name="sale_amount" >
                        </div>
                    </div>-->
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Price <div style="color:red;float: right;"></div></label>
                            <input  class="form-control"  id="lead_price"  name="lead_price" >
                        </div>
                    </div>
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Status <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="status" id="status" onchange="chk_follow_up()" required="">
                                <option value="" >Select Status</option>
                            </select>
                        </div>
                    </div>
                    

                     <div class="col-lg-6">
                        <div class="form-group">
                          <label>Remarks <div style="color:red;float: right;">*</div></label>
                            <textarea class="form-control" rows="2" name="remarks" id="remarks" required=""></textarea>
                        </div>
                    </div>
                    
                     <div class="col-lg-3">
                        <div class="form-group"><br>
<!--                          <label/label>
                            <textarea class="form-control" rows="2" name="comments" id="comments"></textarea>-->
                        <button type="submit" class="btn btn-default" value="save" >Update</button>
                        </div>
                    </div> 
                </div>  
 
                <!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                <!--<button type="submit" class="btn btn-default" value="save" >Save</button>-->
            </form>
            
            
            
             <h3>History</h3>        
        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Comments</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
<?php
//      echo '<pre>';
//      print_r($pick_comments);
   foreach ($pick_Comments as $key=>$values)
   {
?>  
                                    
                                    <tr> 
                                         <td><?php echo $values['crt_id']; ?></td>
                                         <td><?php echo $values['crt_date']; ?></td>
                                         <td><?php echo $values['remarks']; ?></td>  
                                    </tr>
<?php
//$p_key=$values['p_key'];
    }
?>
                                    <tr><td id='info_span'></td></tr>
                                </tbody>
                            </table>
                            </div>
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
    
      document.forms["assign_task_from"]["lead_price"].value = null;
      document.forms["assign_task_from"]["status"].selectedIndex=0;
      document.forms["assign_task_from"]["start_date_id"].selectedIndex=<?php echo date("d-m-Y");?>;
      
}
</script>

<script>
    $("form#assign_task_from").submit(function () {
       
//        alert("WORK ON PAGE .TRY AGAIN FEW MINUTE LATER");
//        exit();

        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/corporate_c/save_KAM_follow_up_info/'); ?>",
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
    function chk_follow_up(){
         document.getElementById("info_span").innerHTML = "";
         
         var status = document.forms["assign_task_from"]["status"].value;
         if(status=='Done'){
                document.getElementById("info_span").innerHTML = "Please Insert Price";
                document.getElementById("status").selectedIndex = 0;
                exit();
        }   
    }
    
    function chk_a_v(){
        
        var ref_service='';
        document.getElementById("info_span").innerHTML ="";
        document.getElementById("a_v").value=0;
        if( document.getElementById("anti_v").checked == true){
            document.getElementById("a_v").value=1;
            ref_service='Antivirus & Anti-spam solution';
        }else{
            document.getElementById("a_v").value=0;
        }
        
//                ....................................................................
        var p_key = $('#p_key').val();
        $.post('<?php echo base_url();?>index.php/corporate_c/Check_cross_sales_id', {
            p_key: p_key,
            ref_service:ref_service
        }, function (search_info_data) {

            var search_array = JSON.stringify(search_info_data);
            var new_search_array = JSON.parse(search_array);
            
//                alert("pkey...."+new_search_array["ref_p_key"] +'....ref_service....'+ new_search_array["ref_service"] );
                
            var service=new_search_array["L3_service"];
            if(service == 'Antivirus & Anti-spam solution'){
                 document.getElementById("anti_v").checked = false;
                 document.getElementById("a_v").value=0;
                 document.getElementById("info_span").innerHTML ="That's ( "+ service +" ) Service Already Assign.Please try different Cross Sale Service";
            }else{
                
            }
 
        }, 'JSON');

//                .......................................................................
    }
     function chk_cloud(){
        var ref_service='';
        document.getElementById("info_span").innerHTML ="";
        document.getElementById("cloud_v").value=0; 
        if( document.getElementById("cloud").checked == true){
            document.getElementById("cloud_v").value=1;
            var ref_service='E-mail Hosting solution';
        }else{
            document.getElementById("cloud_v").value=0;
        }
        var p_key = $('#p_key').val();
        
        $.post('<?php echo base_url();?>index.php/corporate_c/Check_cross_sales_id', {
            p_key: p_key,
            ref_service:ref_service
        }, function (search_info_data) {

            var search_array = JSON.stringify(search_info_data);
            var new_search_array = JSON.parse(search_array);
            
//                alert("pkey...."+new_search_array["ref_p_key"] +'....ref_service....'+ new_search_array["ref_service"] );
                
            var service=new_search_array["L3_service"];
            if(service == 'E-mail Hosting solution'){
                 document.getElementById("cloud").checked = false;
                  document.getElementById("cloud_v").value=0;
                  document.getElementById("info_span").innerHTML ="That's ( "+ service +" ) Service Already Assign.Please try different Cross Sale Service";
            }else{
//                 document.getElementById("anti_v").checked = false;
//                 alert("That's ( "+ service +" ) Service Already Assign.Please try different Cross Sale Service");
            }
 
        }, 'JSON');       
    }
     function chk_IPTS(){
         
        var ref_service='';
        document.getElementById("info_span").innerHTML ="";
        document.getElementById("IPTS_v").value=0;
        if( document.getElementById("IPTS").checked == true){
            document.getElementById("IPTS_v").value=1;
             var ref_service='IP Telephony Service';
        }else{
            document.getElementById("IPTS_v").value=0;
        }
        
        var p_key = $('#p_key').val();
       
        $.post('<?php echo base_url();?>index.php/corporate_c/Check_cross_sales_id', {
            p_key: p_key,
            ref_service:ref_service
        }, function (search_info_data) {

            var search_array = JSON.stringify(search_info_data);
            var new_search_array = JSON.parse(search_array);
            
//                alert("pkey...."+new_search_array["ref_p_key"] +'....ref_service....'+ new_search_array["ref_service"] );
                
            var service=new_search_array["L3_service"];
            if(service == 'IP Telephony Service'){
                 document.getElementById("IPTS").checked = false;
                  document.getElementById("IPTS_v").value=0;
                  document.getElementById("info_span").innerHTML ="That's ( "+ service +" )  Already Assign.Please try different Cross Sale Service";
            }else{
//                 document.getElementById("anti_v").checked = false;
//                 alert("That's ( "+ service +" ) Service Already Assign.Please try different Cross Sale Service");
            }
 
        }, 'JSON'); 
        
        
    }
     function chk_intrnt(){
        var ref_service='';
        document.getElementById("info_span").innerHTML ="";
        document.getElementById("intrnt_v").value=0; 
        if( document.getElementById("intrnt").checked == true){
            document.getElementById("intrnt_v").value=1;
             var ref_service='Internet  Connectivity';
        }else{
            document.getElementById("intrnt_v").value=0;
        }
        
        
         var p_key = $('#p_key').val();
       
        $.post('<?php echo base_url();?>index.php/corporate_c/Check_cross_sales_id', {
            p_key: p_key,
            ref_service:ref_service
        }, function (search_info_data) {

            var search_array = JSON.stringify(search_info_data);
            var new_search_array = JSON.parse(search_array);
            
//                alert("pkey...."+new_search_array["ref_p_key"] +'....ref_service....'+ new_search_array["ref_service"] );
                
            var service=new_search_array["L3_service"];
            if(service == 'Internet  Connectivity'){
                 document.getElementById("intrnt").checked = false;
                  document.getElementById("intrnt_v").value=0;
                  document.getElementById("info_span").innerHTML ="That's ( "+ service +" ) Service Already Assign.Please try different Cross Sale Service";
            }else{
//                 document.getElementById("anti_v").checked = false;
//                 alert("That's ( "+ service +" ) Service Already Assign.Please try different Cross Sale Service");
            }
 
        }, 'JSON'); 
        
    }
    
    
</script>    