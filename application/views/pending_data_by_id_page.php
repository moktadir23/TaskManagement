
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
                Search from pending List By ID ..
            </h3>
            <!--                        <ol class="breadcrumb">
                                        <li>
                                            <i class="fa fa-dashboard"></i>  <a href="">Dashboard</a>
                                        </li>
                                        <li class="active">
                                            <i class="fa fa-edit"></i> Search By ID ....
                                        </li>
                                    </ol>-->
        </div> 
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="<?php echo base_url('index.php/welcome/pending_data_by_id/'); ?>" name="select_by_id_form" id="select_by_id_form" method="POST">
                <div class='row'> 
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Search </label>
                            <select class="form-control" name="employee_id" id="employee_id">
                                <option  value="0">Select Employee ID</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <br><button type="submit" class="btn btn-default" value="save">Search</button>
                        </div>
                    </div>

                </div> 
<!--                <div class="row">
                    <div class="col-lg-3">
                        <button type="submit" class="btn btn-default" value="save">Submit Button</button>
                    </div>
                </div>   -->
            </form>
            <br>

            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>                                     
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Type Task</th>
                                    <th>Sub-Task</th>
                                    <th>Client / BTS / Provider Name</th>
                                    <th>Assign By</th>
                                    <th>Transfer from</th>
                                    <th>MIS/MQ ticket_id</th>
                                    <th>Start Date</th>                                       
                                    <th>Transfer Date</th>
                                    <th>Pending Time</th>
                                    <th>First Comments</th>
                                    <th>States</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
//  echo '<pre>';
//  print_r($search_result);       
                                foreach ($search_result as $value) {
                                    
                                    $task_info_id=$value['id']; 
                                    
                                    $task_id=$value['ticket_no']; 
                                    ?>   
                                    <tr>
                                        <td> <?php echo $value['id']; ?></td>
                                        <td> <?php echo $value['name']; ?></td> 
                                        <td> <?php echo $value['type_task']; ?></td>
                                        <td> <?php echo $value['sub_task']; ?></td>
                                        <td> <?php echo $value['client_bts_provider_name']; ?></td>
                                        <td> <?php echo $value['assign_by']; ?></td> 
                                        <td> <?php echo $value['transfer_from']; ?></td>
                                        <td><?php echo $value['mis_mq_ticket_id']; ?></td>
                                        <td><?php echo $value['start_date']; ?></td>
                                        <td><?php echo $value['transfer_date']; ?></td>
                                        
                                        <td>
                                            <?php
//8$datetime1 = date_create('2016-2-1');
                                            $datetime1 = $value['start_date'];
                                            $datetime2 = date("d-m-Y");
//$interval = date_diff($datetime1, $datetime2);
                                            $dt1 = strtotime($datetime1);
                                            $dt2 = strtotime($datetime2);
                                            $seconds_diff = $dt2 - $dt1;
                                            $interval = floor($seconds_diff / 3600 / 24);
                                            echo $interval . "&nbsp;day ";
                                            ?>
                                        </td>
                                         <td>
                                             
                                             
                                             <?php
                                             
//   echo '<pre>';
//  print_r($comments_result);                                   
      if($comments_result != null){                                     
        foreach ($comments_result as $comments_value) {
//            
          $comment_ticket_no=$comments_value->ticket_no;
         if($comment_ticket_no == $task_id){
             
              echo $comments_value->comments;
         }
//        
      }
      
    } 
                                             
                                             
                                             
                                             ?>
                                         
                                         
                                         
                                         </td>
                                        <td><?php echo $value['states']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url() ;?>index.php/welcome/new_comments_funcation/<?php echo $value['ticket_no']; ?>"><button>Comments</button></a> &nbsp;
                                            <!--<a href="<?php echo base_url() ;?>index.php/welcome/edit_task_done_funcation/<?php echo $value['ticket_no']; ?>">Done Task </a>-->
                                            <a href="<?php echo base_url() ;?>index.php/welcome/update_task_done_funcation/<?php echo $value['ticket_no']; ?>"><button>Done Task </button></a> &nbsp;
                                             <a href="<?php echo base_url() ;?>index.php/welcome/edit_task_transfe_funcation/<?php echo $value['ticket_no']; ?>" onclick="return check_transfer(); "><button>Transfer Task</button> </a> 
                                        </td>
                                    </tr>                             

                                <?php } ?>                                 
      
                            </tbody>
                        </table>
                    </div>    
                </div>
            </div>
        </div>


    </div>
</div>


<?php
echo "<script type=\"text/javascript\">";
foreach ($search_id as $value) {
    echo "var x = document.getElementById(" . $value['Select_Name'] . ");";
    echo "var option = document.createElement(\"option\");";
    echo "option.text =" . $value['CateGory_Description'] . ";";
    echo "option.value =" . $value['D_Value'] . ";";
    echo "x.add(option,x[" . $value['Indexx'] . "]);";
}
echo "</script>";
?>