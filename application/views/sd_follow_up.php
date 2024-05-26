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
              SD :  Update Task
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
        <form action="<?php echo base_url() ?>index.php/sd_controller/sd_update_task" name="update_task_from" id="update_task_from" method="POST">
              
            <input type="hidden" class="form-control" id="ticket_no" name="ticket_no" value="<?php echo $pending_task_result->ticket_no; ?> "> 
            <input type="hidden" class="form-control" id="tki_id" name="tki_id" value="<?php echo $pending_task_result->tki_id; ?> "> 
        <!--<input type="hidden" id="Initial_Problem_Category" name="Initial_Problem_Category" value="<?php echo $pending_task_result->Initial_Problem_Category; ?>">--> 
            
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Employee Name <div style="color:red;float: right;"></div> </label>
<!--                                <input type="text" name="id" class="form-control" placeholder="Enter Your ID"/>-->
                            <input class="form-control" readonly="readonly" name="Engineer_Name" value="<?php echo $name;?>" id="Engineer_Name">
<!--                            <select class="form-control" name="Engineer_Name" id="Engineer_Name" onchange="pick_engineer_id()">
                                <option value="<?php echo $name; ?>"><?php echo $name; ?></option>
                            </select>-->
                        </div>
                    </div> 
                    <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>Employee ID<div style="color:red;float: right;"></div></label>                                  
                            <input name="Engineer_ID" readonly="readonly" id="Engineer_ID" class="form-control" value="<?php echo $id;?>"placeholder="Enter TKI ID"/>  
                        </div>
                    </div>
                   <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>Action Type <div style="color:red;float: right;">*</div></label>                                  
                            <select class="form-control" name="action_type" id="action_type" required="">
                                <option  value="">Select Action Type</option>
                            </select>    
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>End date & time <div style="color:red;float: right;"></div><i class="fa fa-calendar"></i><div style="color:red;float: right;"></div></label>
                          <input type="hidden"  class="form-control" readonly="readonly" id="today" value="<?php echo date("d-m-Y H:i:s"); ?>" name="today">
                          <input  class="form-control" readonly="readonly" id="cs_date" name="cs_date" value="<?php echo date("d-m-Y H:i:s"); ?>" readonly="readonly" value="" placeholder="DD-MM-YYYY">
                        </div>
                    </div> 
                    
                    </div>
                    <div class="row"> 
                     <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>Status<div style="color:red;float: right;"></div></label>                                  
                            <select class="form-control" onchange="check_status();" name="Status" id="Status">
<!--                                <option  value="">Select Status</option>-->

                            </select>    
                        </div>
                    </div>   
                    <div class="col-lg-6">
                        <div class="form-group">
                          <label>Comments <div style="color:red;float: right;"></div><div style="color:red;float: right;"></div></label>
                          <textarea class="form-control" rows="2" name="comments" id="comments" ></textarea>
                        
                        </div>
                    </div>
                   <div class="col-lg-3">
                     <!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--><br><br>
                       <button type="submit" class="btn btn-default" value="save" >Update</button>
                   </div>    
                </div>
                
               
            </form>
            
 <!--.............................................................................................................-->           
 <div class="table-responsive">
     
     <h3>TKI Details :</h3> 
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>

                            <th>Data</th>
                            <th>Engineer Name ( Engineer ID )</th>
                            <th>Action Type</th>
                            <th>Comments</th>
                         
                        </tr>
                    </thead>
                    <tbody>                       
<?php
//      echo '<pre>';
//      print_r($pending_task_result);
//foreach ($pending_list_result as $value) {
//if(isset($results)){
//    echo 'VALUE';


  foreach ($eng_task_result as $value) {  
//   $p_key=$value->id;
    ?>  

                            <tr> 

                                <td><?php echo $value['action_time']; ?></td>
                                <td><?php echo $value['Engineer_Name']; ?> ( <?php echo $value['Engineer_ID']; ?> )</td>
                                <td><?php echo $value['action_type']; ?></td>
                                <td><?php echo $value['comments']; ?></td>
                                
                                
                            </tr>    
<?php }

//         }else{
//   echo '<b>NO Pending Task Available ... </b>';
//} ?>
                              
                    </tbody>
                </table>
                <div class="col-lg-5"></div>
                <div class="col-lg-5">
                   
                </div>
            </div>           
            
            
            
<!--.................................................................................................................--> 
            
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