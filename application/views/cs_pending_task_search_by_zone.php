<!--<h1>under construction</h1>-->
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              Search Pending Task by Support Office
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
<!--            <form action="" name="CS_task_from" id="CS_task_from" method="">
                <div class='row'> 
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Sub Zone <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Sub_Zone" id="Sub_Zone" required="">
                                <option value="" >Select Task Type</option>
                            </select>
                        </div>
                    </div>
                    
                </div>
               
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-default" value="save" >Save</button>
            </form>-->

    <form action="<?php echo base_url('index.php/welcome/search_cs_pending_task_by_sub_zone/'); ?>" name="search_by_zone" id="search_by_zone" method="POST">
       <div class="row">
        <div class="col-lg-3"> 
                        <div class="form-group">
                            <label> Zone <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Zone" id="Zone" required="">
                                <option value="" >Select Zone</option>
                            </select>
                        </div>
        </div>
           
        <div class="col-lg-3" style="">
            <div class="form-group">
                <label>Search By Support Office: <div style="color:red;float: right;">*</div></label>
                <select class="form-control" name="Sub_Zone" id="Sub_Zone" required="">
                    <option value="" >Select Support Office</option>
                </select><br>                         
            </div>
        </div>
        <div class="col-lg-3">
            <label>From Date</label>
            <input type="" name="date_from" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="start_date_id" class="form-control" placeholder="Enter from Date" required=""/>
        </div>
        <div class="col-lg-3">
            <label>To Date</label>
            <input type="" name="date_to" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="end_date_id" class="form-control" placeholder="Enter To Date" required=""/>
        </div>
</div>        
<div class="row">       
        <div class="col-lg-3"><br>
             <button type="submit" class="btn btn-default" value="save">Search</button>
<!--            &nbsp;<button type="button" class="btn btn-primary" onclick="location.href = '#'" /> Search </button>
            <button type="button" class="btn btn-primary" onclick="search();" /> Search </button>-->
        </div>
        </div>
        
    </form>  

            
    <div class="row"><div class="col-lg-3">
  
    <br></div></div>           
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Client ID</th>
                            <th>Client Name</th>
                            <th>Sub Zone</th>
                            <th>Client Category</th>
                            <th>Support Category</th>
                            <th>CTID Number SR</th>
                            <th>Initial Problem Category</th>
                            <th>Engineer Name</th>
                            <th>Assign Time</th> 
                            <th>Work Start Time</th> 
                            <th>CS status of TKI</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
<?php
$total=0;
$Change_Request=0;
$Installation=0;  
$Troubleshoot=0;
$Survey=0;
      
if($pending_list_result != null){
foreach ($pending_list_result as $value) {
    $total++;
    $p_key=$value['p_key'];
    $Support_Category=$value['Support_Category'];
     if($Support_Category=='Change_Request'){
        $Change_Request++;
     }elseif ($Support_Category=='Installation') {
        $Installation++;        
     }elseif ($Support_Category=='Survey') {
        $Survey++;         
     }elseif ($Support_Category=='Troubleshoot') {
       $Troubleshoot++;
     }
   
    ?>  
<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                        
............................................................................................................................
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
                            
<?php 
     $work_status=$value['work_status'];
    if($work_status=='1'){
?> <!--.............................................PENDING status=1 (Working).............................................................................--> 
                            <tr bgcolor="#99ffbb">                         
                                <td><?php echo $value['Client_ID']; ?></td>
                                <td><?php echo $value['Client_Name']; ?></td>
                                <td><?php echo $value['Sub_Zone']; ?></td>
                                <td><?php echo $value['Client_Category']; ?></td>
                                <td><?php echo $Support_Category=$value['Support_Category']; ?></td>
                                <td><?php echo $value['CTID_Number_SR']; ?></td>
                                <td><?php echo $value['Initial_Problem_Category']; ?></td>
                                
                                <td><?php echo $value['Engineer_Name']; ?></td>
                                
                                <td> <?php echo $value['start_date']; ?></td>
                                <td> <?php echo $value['work_start']; ?></td>
                                <td>
<?php 
////      echo '<pre>';
////      print_r($pending_list_last_comments);
     foreach ($pending_list_last_comments as $last_comments_value) {
           $comment_p_key=$last_comments_value->p_key; 
           
         if($comment_p_key==$p_key){
              echo $last_comments_value->comments;
//              echo '.....'.$last_comments_value->id_comment;
         }
        
     } 
?>  
                                
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>index.php/welcome/CS_edit_task/<?php echo $value['p_key']; ?>"><button>Edit</button></a> &nbsp;
                                    <a href="<?php echo base_url(); ?>index.php/welcome/CS_new_comments/<?php echo $value['p_key']; ?>"><button>Pause</button></a> &nbsp;
                                    <a href="<?php echo base_url(); ?>index.php/welcome/cs_pending_task/<?php echo $value['p_key']; ?>"><button>Done Task </button></a> &nbsp; 
                                    <a href="<?php echo base_url(); ?>index.php/welcome/cs_task_transfer_funcation/<?php echo $value['p_key']; ?>" onclick="return check_transfer();"><button>Transfer Task</button> </a>
                                    <!--<a href="<?php echo base_url(); ?>index.php/welcome/cs_work_on_funcation/<?php echo $value['p_key']; ?>"><button>Working</button> </a>--> 
                                </td>
                            </tr>
                            
    <?php }elseif ($work_status=='2') {?>
    <!--.............................................PENDING status=2 (pause)..............................................................................-->                         
           <tr bgcolor="#ffffb3">                             
                                <td><?php echo $value['Client_ID']; ?></td>
                                <td><?php echo $value['Client_Name']; ?></td>
                                <td><?php echo $value['Sub_Zone']; ?></td>
                                <td><?php echo $value['Client_Category']; ?></td>
                                <td><?php echo $Support_Category=$value['Support_Category']; ?></td>
                                <td><?php echo $value['CTID_Number_SR']; ?></td>
                                <td><?php echo $value['Initial_Problem_Category']; ?></td>
                                
                                <td><?php echo $value['Engineer_Name']; ?></td>
                                
                                <td> <?php echo $value['start_date']; ?></td>
                                <td> <?php echo 'last Work on :'.$value['work_start']; ?></td>
                                <td>
<?php 
////      echo '<pre>';
////      print_r($pending_list_last_comments);
     foreach ($pending_list_last_comments as $last_comments_value) {
           $comment_p_key=$last_comments_value->p_key; 
           
         if($comment_p_key==$p_key){
              echo $last_comments_value->comments;
//              echo '.....'.$last_comments_value->id_comment;
         }
        
     } 
?>  
                                
                                </td>
                                <td>
                                    
                                    <a href="<?php echo base_url(); ?>index.php/welcome/CS_edit_task/<?php echo $value['p_key']; ?>"><button>Edit</button></a> &nbsp;
                                    <!--<a href="<?php echo base_url(); ?>index.php/welcome/CS_new_comments/<?php echo $value['p_key']; ?>"><button>Comments</button></a> &nbsp;-->
                                    <!--<a href="<?php echo base_url(); ?>index.php/welcome/cs_pending_task/<?php echo $value['p_key']; ?>"><button>Done Task </button></a> &nbsp;--> 
                                    <a href="<?php echo base_url(); ?>index.php/welcome/cs_task_transfer_funcation/<?php echo $value['p_key']; ?>" onclick="return check_transfer();"><button>Transfer Task</button> </a>
                                    <a href="<?php echo base_url(); ?>index.php/welcome/cs_work_on_funcation/<?php echo $value['p_key']; ?>/<?php echo $Support_Category; ?>"><button>Working</button> </a> 
                                </td>
                            </tr>
               
               
       <?php }else{ ?> 
      <!--.............................................PENDING status=0..............................................................................-->                     
           <tr bgcolor="#ffb3b3">             
                      <td><?php echo $value['Client_ID']; ?></td>
                                <td><?php echo $value['Client_Name']; ?></td>
                                <td><?php echo $value['Sub_Zone']; ?></td>
                                <td><?php echo $value['Client_Category']; ?></td>
                                <td><?php echo $Support_Category=$value['Support_Category']; ?></td>
                                <td><?php echo $value['CTID_Number_SR']; ?></td>
                                <td><?php echo $value['Initial_Problem_Category']; ?></td>
                                
                                <td><?php echo $value['Engineer_Name']; ?></td>
                                
                                <td> <?php echo $value['start_date']; ?></td>
                                 <td> <?php echo 'Not Yet'; ?></td>
                                <td>
<?php 
////      echo '<pre>';
////      print_r($pending_list_last_comments);
     foreach ($pending_list_last_comments as $last_comments_value) {
           $comment_p_key=$last_comments_value->p_key; 
           
         if($comment_p_key==$p_key){
              echo $last_comments_value->comments;
//              echo '.....'.$last_comments_value->id_comment;
         }
        
     } 
?>  
                                
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>index.php/welcome/CS_edit_task/<?php echo $value['p_key']; ?>"><button>Edit</button></a> &nbsp;
                                    <!--<a href="<?php echo base_url(); ?>index.php/welcome/CS_new_comments/<?php echo $value['p_key']; ?>"><button>Comments</button></a> &nbsp;-->
                                    <!--<a href="<?php echo base_url(); ?>index.php/welcome/cs_pending_task/<?php echo $value['p_key']; ?>"><button>Done Task </button></a> &nbsp;--> 
                                    <a href="<?php echo base_url(); ?>index.php/welcome/cs_task_transfer_funcation/<?php echo $value['p_key']; ?>" onclick="return check_transfer();"><button>Transfer Task</button> </a>
                                    <a href="<?php echo base_url(); ?>index.php/welcome/cs_work_on_funcation/<?php echo $value['p_key']; ?>/<?php echo $Support_Category; ?>"><button>Working</button> </a> 
                                </td>
                            </tr>
               
    <?php } ?>            
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////              
  .................................................................................................................             
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
               
               
               
               
                            
                            
                            
                            
                            
<?php } }else{ 
    
}
    echo '<b>Total Number : </b>'.$total.'<br>';
    echo '<b>Change Request : </b>'.$Change_Request.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>Installation : </b>'.$Installation.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>Survey : </b>'.$Survey.'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<b>Troubleshoot : </b>'.$Troubleshoot.'&nbsp;&nbsp;&nbsp;&nbsp;<br>';
?>
                                
                    </tbody>
                </table>
                <div class="col-lg-5"></div>
                <div class="col-lg-5">
<?php // echo $links; ?>
                </div>
            </div>
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
    $(function() {		
            $("#Zone").change(function() {
                    $("#Sub_Zone").load("<?php echo base_url(); ?>CS_sub_zone_list/" + $(this).val() + ".txt");
            });
    });
</script>



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
 <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->



<script type="text/javascript">
function pick_pending_list_by_zone(){
   
    var Sub_Zone = $('#Sub_Zone').val();
     alert("TEST"+Sub_Zone);
    exit();
        $.post('<?php echo base_url();?>index.php/welcome/pick_engineer_id', {
            Sub_Zone: Sub_Zone
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


