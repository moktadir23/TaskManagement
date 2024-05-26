<!--<h1>under construction</h1>-->
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>
<?php
$id = $this->session->userdata('id');
$name = $this->session->userdata('name');
?>
<div class="container-fluid" onload="myFunction()">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              SD :  Edit Task
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
        
        
//        echo '<pre>';
//        print_r($pending_task_result);
        ?>
        <div class="col-lg-12">
        <form action="<?php echo base_url() ?>index.php/sd_controller/sd_edit_info" name="update_task_from" id="update_task_from" method="POST">
                <input type="hidden" name="hidden_id" value="<?php echo $id;?>" id="hidden_id">
                <input type="hidden" name="hidden_name" value="<?php echo $name;?>" id="hidden_name">
                <input type="hidden" name="p_key" value="<?php echo $pending_task_result->ticket_no;?>" id="p_key">
                <div class='row'>
                      <div class="col-lg-3">
                        <div class="form-group">
                            <label> Reference/Job Source<div style="color:red;float: right;">*</div> </label>
                            <input name="tki_id" id="tki_id"  readonly="readonly" onchange="Check_tki_id()" value="<?php echo $pending_task_result->tki_id; ?>" class="form-control" placeholder="Enter TKI ID" required="" autofocus/>
                            
                        </div>
                    </div>
                      <div class="col-lg-3"> 
                    <div class="form-group">
                            <label>Source <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Source" onchange="Check_tki_id()"  id="Source" required="">
                                <option value="<?php echo $pending_task_result->Source; ?>" ><?php echo $pending_task_result->Source; ?></option>
                            </select>
                    </div>  
                          </div> 
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Task Type <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="type_task" id="type_task">
                                <option value="<?php echo $pending_task_result->type_task; ?>" ><?php echo $pending_task_result->type_task; ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Customer ID<div style="color:red;float: right;"></div></label>
                            <input class="form-control" name="Client_id" value="<?php echo $pending_task_result->Client_id; ?>"  id="Client_id"  placeholder="Enter Client ID">
                        </div>
                    </div>
                </div>
                <div class='row'>

                   
                      
                    
                     <div class="col-lg-3">
                        <div class="form-group">
                          <label>Customer Name<div style="color:red;float: right;"></div></label>
                            <input class="form-control" name="Client_Name" value="<?php echo $pending_task_result->Client_name; ?>" id="Client_Name" placeholder="Enter Client Name">
                        </div>
                    </div>
                      <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Customer Category <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="Client_Category" id="Client_Category">
                               <option value="<?php echo $pending_task_result->Client_Category; ?>" ><?php echo $pending_task_result->Client_Category; ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Assign By <div style="color:red;float: right;"></div></label>
                            <select class="form-control" onchange="assign_check()" name="assign_by" id="assign_by">
                                <option value="<?php echo $pending_task_result->assign_by; ?>" ><?php echo $pending_task_result->assign_by; ?></option>
                            </select>
                        </div>
                    </div>
                   <div class="col-lg-3">
                        <div class="form-group">
                            <label>Employee Name <div style="color:red;float: right;">*</div> </label>
<!--                                <input type="text" name="id" class="form-control" placeholder="Enter Your ID"/>-->
                          <input class="form-control" readonly="readonly" name="Engineer_Name" value="<?php echo $pending_task_result->Engineer_Name; ?>" id="Engineer_Name">
                        </div>
                    </div> 
                    
                </div>
                <div class="row">
                    
                    <div class="col-lg-3">
                        <div class="form-group">
                            <input type="hidden" name="hidden_id" value="<?php echo $id;?>" id="hidden_id">
                            <label>Employee ID <div style="color:red;float: right;">*</div></label>
                            <input class="form-control" readonly="readonly" name="Engineer_ID" value="<?php echo $pending_task_result->Engineer_ID; ?>" id="Engineer_ID">
                        </div>
                    </div> 
                    
                    <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>Start Date<div style="color:red;float: right;">*</div> <i class="fa fa-calendar"></i></label>                                  
                            <input  class="form-control" readonly="readonly" id="s_date" value="<?php echo $pending_task_result->s_date; ?>" name="s_date"  placeholder="DD-MM-YYYY H:M:S" required="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group"><br>
                            <label></label>
                            <!--<textarea class="form-control" rows="2" name="comments" id="comments"></textarea>-->
                        <button type="submit" class="btn btn-default" value="save" >Update</button>
                        </div>
                    </div> 
                </div>  
                
                
            </form>
            
            
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
    $("form#assign_task_from").submit(function () {
        validateForm();
        if (submit_or_not == 1)
        {
            exit;
        }
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/welcome/save_task_info_funcation/'); ?>",
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
                alert('Sussfully Done');
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
<!--<script>
      $(function() {		
            $("#CS_status_of_TKI").change(function() {
               var Initial_Problem_Category=document.getElementById("Initial_Problem_Category").value;
//                alert("TEST"+Initial_Problem_Category);
                    $("#Final_Resolution").load("<?php echo base_url(); ?>CS_Final_Resolution/" + Initial_Problem_Category + ".txt");
            });
    });
</script>-->

<script>
      $(function() {		
            $("#Support_Type").change(function() {
               var Division=document.getElementById("Division").value;
//                alert("TEST"+Initial_Problem_Category);
                    $("#Technician_Name").load("<?php echo base_url(); ?>wi_technician_list/" + Division + ".txt");
            });
    });
</script>


<script>
    function check_status(){
        
        var Status=document.getElementById("Status").value;
        
//        var today=document.getElementById("today").value;
        if( Status == 'Completed' || Status == 'Canceled' ){
             document.getElementById("cs_date").value=document.getElementById("today").value;
        }else{
           document.getElementById("cs_date").value=null;  
        }
        
    }
 
</script>


<script type="text/javascript">    
function Check_tki_id(){
   
//    var tki_id = $('#tki_id').val();
    var tki_id = document.getElementById("tki_id").value
    var Source=document.getElementById("Source").value
    

    
    
    
    
if(Source == 'MIS' || Source == 'MQ'){
    
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
     alert("It's ( "+ result_tki_id +" ) Already Assign.Please try differen TKI ID");
}
 
        }, 'JSON');
        
}   
        
        

}
    
</script>