
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                CS Pending Task List ....
            </h1>

            <!--                        <ol class="breadcrumb">
                                        <li>
                                            <i class="fa fa-dashboard"></i>  <a href="#">Dashboard</a>
                                        </li>
                                        <li class="active">
                                            <i class="fa fa-table"></i> Pending List
                                            
                                        </li>
                                    </ol>-->
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">

            
            <div class="row">
                <div class="col-lg-9" style="">
                    <b> search by :</b> &nbsp; 
                    <button type="button" class="btn btn-primary" onclick="location.href = '<?php echo base_url(); ?>index.php/welcome/CS_search_pending_task_by_id'" /> Employee ID</button> &nbsp;
                    <button type="button" class="btn btn-success"  onclick="location.href = '<?php echo base_url(); ?>index.php/welcome/search_cs_pending_task_by_sub_zone'">Support Office</button> &nbsp;
                    <button type="button" class="btn btn-info"  onclick="location.href = '<?php echo base_url(); ?>index.php/welcome/search_cs_pending_task_by_Client_ID'">Client ID</button> &nbsp;
                    <button type="button" class="btn btn-danger" onclick="location.href = '<?php echo base_url(); ?>index.php/welcome/search_cs_pending_task_by_CTID_SR'">CTID Number/SR .</button>

                </div>
                <div class="col-lg-3">

                    <br>
                </div>

            </div>


            <div class="row">
                <div class="col-lg-3">
                </div>
                <div class="col-lg-6"></div>
                <div class="col-lg-3"></div>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Client ID</th>
                            <th>Client Name</th>
                            <th>Support Office</th>
                            <th>Client Category</th>
                            <th>Support Category</th>
                            <th>CTID Number SR</th>
                            <th>Initial Problem Category</th>
                            <th>Engineer Name</th>
                            <th>Assign Time</th> 
                            <th>Work Start Time</th> 
                            <th>Last Comments</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>                       
<?php
  foreach ($results as $value) {  
   $p_key=$value->p_key;
   $work_status=$value->work_status;
   
?>
                        
                        
<?php 
    if($work_status=='1'){
?> <!--.............................................PENDING status=1 (Working).............................................................................--> 
                            <tr bgcolor="#99ffbb"> 
                                <td><?php echo $value->Client_ID; ?></td>
                                <td><?php echo $value->Client_Name; ?></td>
                                <td><?php echo $value->Sub_Zone; ?></td>
                                <td><?php echo $value->Client_Category; ?></td>
                                <td><?php echo $value->Support_Category; ?></td>
                                <td><?php echo $value->CTID_Number_SR; ?></td>
                                <td><?php echo $value->Initial_Problem_Category; ?></td>                                
                                <td><?php echo $value->Engineer_Name; ?></td>                                
                                <td><?php echo $value->start_date; ?> </td> 
                                <td><?php
                                echo $work_start=$value->work_start; 
//                                if($work_start != null){
//                                    echo $work_start;
//                                }else{
//                                    echo 'N/A';
//                                }
                                ?> </td> 
                                <td>
                                    
 <?php 
////      echo '<pre>';
////      print_r($pending_list_last_comments);
     foreach ($pending_list_last_comments as $last_comments_value) {
           $comment_p_key=$last_comments_value->p_key; 
           
         if($comment_p_key==$p_key){
              echo $last_comments_value->comments;
         }
        
     } 
?>                                       
                                    
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>index.php/welcome/CS_edit_task/<?php echo $value->p_key; ?>"><button>Edit</button></a> &nbsp;
                                    <a href="<?php echo base_url(); ?>index.php/welcome/CS_new_comments/<?php echo $value->p_key; ?>"><button>pause</button></a> &nbsp;
                                    <a href="<?php echo base_url(); ?>index.php/welcome/cs_pending_task/<?php echo $value->p_key; ?>"><button>Done</button></a> &nbsp; 
                                    <a href="<?php echo base_url(); ?>index.php/welcome/cs_task_transfer_funcation/<?php echo $value->p_key; ?>" onclick="return check_transfer();"><button>Transfer</button> </a>                               
                                </td>
                           </tr>
    <?php }elseif ($work_status=='2') {?>
    <!--.............................................PENDING status=2 (pause)..............................................................................-->                         
           <tr bgcolor="#ffffb3"> 
                                <td><?php echo $value->Client_ID; ?></td>
                                <td><?php echo $value->Client_Name; ?></td>
                                <td><?php echo $value->Sub_Zone; ?></td>
                                <td><?php echo $value->Client_Category; ?></td>
                                <td><?php echo $value->Support_Category; ?></td>
                                <td><?php echo $value->CTID_Number_SR; ?></td>
                                <td><?php echo $value->Initial_Problem_Category; ?></td>                                
                                <td><?php echo $value->Engineer_Name; ?></td>                                
                                <td> <?php echo $value->start_date; ?> </td>  
                                <td> <?php  echo 'last Work on :'.$value->work_start; ?></td>
                                <td>
                                    
 <?php 
////      echo '<pre>';
////      print_r($pending_list_last_comments);
     foreach ($pending_list_last_comments as $last_comments_value) {
           $comment_p_key=$last_comments_value->p_key; 
           
         if($comment_p_key==$p_key){
              echo $last_comments_value->comments;
         }
        
     } 
?>                                       
                                    
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>index.php/welcome/CS_edit_task/<?php echo $value->p_key; ?>"><button>Edit</button></a> &nbsp;
                                    <!--<a href="<?php echo base_url(); ?>index.php/welcome/CS_new_comments/<?php echo $value->p_key; ?>"><button>pause</button></a> &nbsp;-->
                                    <!--<a href="<?php echo base_url(); ?>index.php/welcome/cs_pending_task/<?php echo $value->p_key; ?>"><button>Done</button></a> &nbsp;--> 
                                    <a href="<?php echo base_url(); ?>index.php/welcome/cs_task_transfer_funcation/<?php echo $value->p_key; ?>" onclick="return check_transfer();"><button>Transfer</button> </a>
                                    <a href="<?php echo base_url(); ?>index.php/welcome/cs_work_on_funcation/<?php echo $value->p_key; ?>"><button>Working</button> </a>                                 
                                </td>
                           </tr>                 
 
                           
    <?php }else{ ?> 
      <!--.............................................PENDING status=0..............................................................................-->                     
           <tr bgcolor="#ffb3b3"> 
                                <td><?php echo $value->Client_ID; ?></td>
                                <td><?php echo $value->Client_Name; ?></td>
                                <td><?php echo $value->Sub_Zone; ?></td>
                                <td><?php echo $value->Client_Category; ?></td>
                                <td><?php echo $value->Support_Category; ?></td>
                                <td><?php echo $value->CTID_Number_SR; ?></td>
                                <td><?php echo $value->Initial_Problem_Category; ?></td>                                
                                <td><?php echo $value->Engineer_Name; ?></td>                                
                                <td> <?php echo $value->start_date; ?> </td> 
                                <td> <?php echo 'Not Yet'; ?> </td> 
                                <td>
                                    
 <?php 
////      echo '<pre>';
////      print_r($pending_list_last_comments);
     foreach ($pending_list_last_comments as $last_comments_value) {
           $comment_p_key=$last_comments_value->p_key; 
           
         if($comment_p_key==$p_key){
              echo $last_comments_value->comments;
         }
        
     } 
?>                                       
            
                                    
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>index.php/welcome/CS_edit_task/<?php echo $value->p_key; ?>"><button>Edit</button></a> &nbsp;
                                    <!--<a href="<?php echo base_url(); ?>index.php/welcome/CS_new_comments/<?php echo $value->p_key; ?>"><button>pause</button></a> &nbsp;-->
                                    <!--<a href="<?php echo base_url(); ?>index.php/welcome/cs_pending_task/<?php echo $value->p_key; ?>"><button>Done</button></a> &nbsp;--> 
                                    <a href="<?php echo base_url(); ?>index.php/welcome/cs_task_transfer_funcation/<?php echo $value->p_key; ?>" onclick="return check_transfer();"><button>Transfer</button> </a>  
                                    <a href="<?php echo base_url(); ?>index.php/welcome/cs_work_on_funcation/<?php echo $value->p_key; ?>"><button>Working</button> </a> 
                                </td>
                           </tr>                 
    <?php } ?>
           
                           
                           
                           
                           
                           
                           
                           
                           
                           
<?php } ?>
                              
                    </tbody>
                </table>
                <div class="col-lg-5"></div>
                <div class="col-lg-5">
<?php  echo $links; ?>
                </div>
            </div>
        </div>

    </div>

</div>