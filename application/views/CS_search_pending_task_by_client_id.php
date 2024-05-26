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
              Search Pending Task by Client ID
            </h3>
            <ol class="breadcrumb">
                <!--<div class="col-lg-4"></div>-->
                <h3 class="text-center"><span id="info_span"></span></h3>
             
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
<div class="row">
    <form action="<?php echo base_url('index.php/welcome/search_cs_pending_task_by_Client_ID/'); ?>" name="search_by_zone" id="search_by_zone" method="POST">
        <div class="col-lg-3" style="">
            <div class="form-group">
                <label>Search By Client ID: <div style="color:red;float: right;">*</div></label>
                <input class="form-control" name="Client_ID" id="Client_ID" placeholder="Enter Client ID" required="">                       
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
        
        
        <div class="col-lg-3"><br>
             <button type="submit" class="btn btn-default" value="save">Search</button>
<!--            &nbsp;<button type="button" class="btn btn-primary" onclick="location.href = '#'" /> Search </button>
            <button type="button" class="btn btn-primary" onclick="search();" /> Search </button>-->
        </div>
    </form>  
</div>
            
            
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
<!--                                        <th>Status</th>
                            <th>Comments</th>
                            <th>Action</th>-->
                        </tr>
                    </thead>
                    <tbody>
<?php
//      echo '<pre>';
//      print_r($pending_list_result);
      
if($pending_list_result != null){
foreach ($pending_list_result as $value) {
    $p_key=$value['p_key'];
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
                                <td><?php echo $value['Support_Category']; ?></td>
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
                                <td><?php echo $value['Support_Category']; ?></td>
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
                                    <a href="<?php echo base_url(); ?>index.php/welcome/cs_work_on_funcation/<?php echo $value['p_key']; ?>"><button>Working</button> </a> 
                                </td>
                            </tr>
               
               
       <?php }else{ ?> 
      <!--.............................................PENDING status=0..............................................................................-->                     
           <tr bgcolor="#ffb3b3">             
                      <td><?php echo $value['Client_ID']; ?></td>
                                <td><?php echo $value['Client_Name']; ?></td>
                                <td><?php echo $value['Sub_Zone']; ?></td>
                                <td><?php echo $value['Client_Category']; ?></td>
                                <td><?php echo $value['Support_Category']; ?></td>
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
                                    <a href="<?php echo base_url(); ?>index.php/welcome/cs_work_on_funcation/<?php echo $value['p_key']; ?>"><button>Working</button> </a> 
                                </td>
                            </tr>
               
    <?php } ?>            
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////              
  .................................................................................................................             
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
               
      
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
<?php } }else{ 
    
}?>
                                
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
    


