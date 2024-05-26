        



<div class="container-fluid">
    <!-- Page Heading -->
<!--    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?php
                $Zone = $this->session->userdata('Zone'); 
                $department = $this->session->userdata('department');
                $user_type = $this->session->userdata('u_type');
                $e_id=$this->session->userdata('id');
                if($department=='MTU'){
//                   echo  $Zone.' Zone DashBoard';
                }else{
//                   echo ' DashBoard '.$department;
                }
                ?>
            </h1>
        </div>
    </div>-->
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
<?php if ( $department == 'Corporate' || $department == 'Admin' ) {
    if ( $user_type == 's_user' || $user_type == 'admin' ) {   ?>        
                <div class="row">
                    <div class="col-lg-9" style="">
                        <b>DashBroad By :</b> &nbsp; 
                        <button type="button" class="btn btn-primary" onclick="location.href = '<?php echo base_url(); ?>index.php/corporate_c/ctg_mkt'" /> CTG Zone</button> &nbsp;
                        <button type="button" class="btn btn-success"  onclick="location.href = '<?php echo base_url(); ?>index.php/corporate_c/corporate_db'"> Corporate Team</button> &nbsp;
                        <button type="button" class="btn btn-info" onclick="location.href = '<?php echo base_url(); ?>index.php/corporate_c/Strategic_db'">Strategic Team</button> &nbsp;
                        <button type="button" class="btn btn-danger" onclick="location.href = '<?php echo base_url(); ?>index.php/corporate_c/bank_nbfi_db'">Bank and NBFI Team</button> &nbsp;
                    </div>
                    <div class="col-lg-3">
                        <br>
                    </div>
                </div><br>
<?php } } ?>   
                      
 <!--......................................Corporate Team................................................................-->                       
                        
<?php if ($department == "Admin" ||  $department=='Corporate') { ?>   
                       <h3> Corporate Task (Yesterday: <?php echo $yesterday=date('Y-m-d',strtotime("-1 days"));?> )</h3>
        <!--</h3>-->
                      <table class="table table-bordered table-hover">                          
                            <thead>
                                <tr>
                                    <th>Employee Name(ID)</th>
                                    <th>New Customer Visit</th>
                                    <th>Existing Customer Visit</th>
                                    <th>Cold Call</th>
                                    <th>Prospective Call</th>
                                    <th>Follow Up Call</th>
                                    <th>Email</th>
                                    <th>Need to Follow UP Today</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
//                            echo '<pre>';
//                            print_r($task_Details);  
                                foreach ($task_Details as $key => $task_values) {
                                    $employee_id= $task_values['e_id'];
                                     if( $user_type=='s_user' || $user_type == 'admin'){
                                        ?>  
                                        <tr> 
                                           
                                            <td>
                                              <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_daily_task/<?php echo $task_values['e_id']; ?>">
                                              <?php echo $task_values['e_name']; ?> &nbsp; ( <?php echo $task_values['e_id']; ?> )
                                              </a>
                                            </td>
                                            <td>
                                                <?php
                                                 $New_Visit=$task_values['New_Visit'];
                                                 if( $New_Visit > 2 ){
                                                     echo '<b>'.$New_Visit.'</b>';
                                                 }else{
                                                     echo '<b style="color:red">'.$New_Visit.'</b>';
                                                 }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $Existing_Visit=$task_values['Existing_Visit']; 
                                                if( $Existing_Visit > 1 ){
                                                     echo '<b>'.$Existing_Visit.'</b>';
                                                 }else{
                                                     echo '<b style="color:red">'.$Existing_Visit.'</b>';
                                                 }
                                                ?>
                                            </td>
                                            <td><?php echo $task_values['Cold_Call']; ?></td>
                                            <td><?php echo $task_values['Prospective_Call']; ?></td>
                                            <td><?php echo $task_values['Follow_Up_Call']; ?></td>
                                            <td><?php echo $task_values['Email']; ?></td>
                                            <td>
                                                <font color="red">
                                                    <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_follow_up_task/<?php echo $task_values['e_id']; ?>">
                                                    <?php
                                                        echo $pending_Follow_Up=$task_values['pending_Follow_Up'];
//                                                        
                                                    ?>
                                                    </a>    
                                                </font>
                                            </td>
                                        </tr>
                                <?php
                                } else{ 
                                    if($e_id==$employee_id){
                                    ?>
                                          <tr> 
                                           
                                            <td>
                                              <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_daily_task/<?php echo $task_values['e_id']; ?>">
                                              <?php echo $task_values['e_name']; ?> &nbsp; ( <?php echo $task_values['e_id']; ?> )
                                              </a>
                                            </td>
                                            <td><?php echo $task_values['New_Visit']; ?></td>
                                            <td><?php echo $task_values['Existing_Visit']; ?></td>
                                            <td><?php echo $task_values['Cold_Call']; ?></td>
                                            <td><?php echo $task_values['Prospective_Call']; ?></td>
                                            <td><?php echo $task_values['Follow_Up_Call']; ?></td>
                                            <td><?php echo $task_values['Email']; ?></td>
                                            <td>
                                                    <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_follow_up_task/<?php echo $task_values['e_id']; ?>">
                                                    <?php
                                                        echo $pending_Follow_Up=$task_values['pending_Follow_Up'];
//                                                        
                                                    ?>
                                                    </a> 
                                            </td>
                                        </tr>
                                <?php
                                    }
                                  }
                                }
                                ?>
                                        
                            </tbody>
                        </table>  
        
        <h3> Corporate Task (Previous Week :
            <?php
                echo $firstday = date('Y-m-d', strtotime("saturday -2 week")).' to '; 
                echo $lastday = date('Y-m-d', strtotime("thursday -1 week")); 
            ?>
            )</h3>
         <table class="table table-bordered table-hover">                          
                            <thead>
                                <tr>
                                    <th>Employee Name(ID)</th>
                                    <!--<th>Target New Visit</th>-->
                                    <th>New Customer Visit</th>
                                    <!--<th>Target Existing Visit</th>-->
                                    <th>Existing Customer Visit</th>
                                    <th>Total Visit</th>
                                    <th>Total Pending Cross Sales</th>
                                    <th>Done Cross Sales</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
//                            echo '<pre>';
//                            print_r($task_Details);  
                                foreach ($weekly_task_Details as $key => $task_values) {
                                    $employee_id= $task_values['e_id'];
                                     if( $user_type=='s_user' || $user_type == 'admin'){
                                        ?>  
                                        <tr> 
                                           
                                            <td>
                                              <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_weekly_task/<?php echo $task_values['e_id']; ?>">
                                              <?php echo $task_values['e_name']; ?> &nbsp; ( <?php echo $task_values['e_id']; ?> )
                                              </a>
                                            </td>
                                            <!--<td><?php echo $Target_new_visit=15; ?></td>-->
                                            <td>
                                                <?php
                                               echo  $weekly_New_Visit=$task_values['New_Visit'];
                                                ?>
                                            </td>
                                             <!--<td><?php echo $Target_existing_visit=10; ?></td>-->
                                            <td>
                                                <?php
                                                echo $weekly_Existing_Visit=$task_values['Existing_Visit']; 
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $weekly_total_Visit=$weekly_New_Visit+$weekly_Existing_Visit; 
                                                ?>
                                            </td>
<!--                                            <td>
                                                <?php
                                                 $percentage_weekly_Visit= ( $weekly_total_Visit / 25 ) * 100; 
                                                  echo '<b>'.$percentage_weekly_Visit.'%</b>';
                                                ?>
                                            </td>-->
                                            <td>
                                                <a href="<?php echo base_url(); ?>index.php/corporate_c/pending_cross_sale/<?php echo $task_values['e_id']; ?>">
                                                <?php echo $weekly_New_Visit=$task_values['pending_Cross_Sales']; ?>
                                                </a>    
                                            </td>
                                            <td><?php echo $weekly_New_Visit=$task_values['Done_Cross_Sales']; ?></td>
                                        </tr>
                                <?php
                                } else{ 
                                    if($e_id==$employee_id){
                                    ?>
                                          <tr> 
                                           
                                            <td>
                                              <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_weekly_task/<?php echo $task_values['e_id']; ?>">
                                              <?php echo $task_values['e_name']; ?> &nbsp; ( <?php echo $task_values['e_id']; ?> )
                                              </a>
                                            </td>
                                            <!--<td><?php echo $Target_new_visit=15; ?></td>-->
                                            <td><?php echo $weekly_New_Visit=$task_values['New_Visit']; ?></td>
                                            <!--<td><?php echo $Target_existing_visit=10; ?></td>-->
                                            <td><?php echo $weekly_Existing_Visit=$task_values['Existing_Visit']; ?></td>
                                            <td>
                                                <?php
                                                echo $weekly_total_Visit=$weekly_New_Visit+$weekly_Existing_Visit; 
                                                ?>
                                            </td>
<!--                                            <td>
                                                <?php
                                                 $percentage_weekly_Visit= ( $weekly_total_Visit / 25 ) * 100; 
                                                  echo '<b>'.$percentage_weekly_Visit.'%</b>';
                                                ?>
                                            </td>-->
                                            <td><?php echo $weekly_New_Visit=$task_values['pending_Cross_Sales']; ?></td>
                                            <td><?php echo $weekly_New_Visit=$task_values['Done_Cross_Sales']; ?></td>
                                        </tr>
                                <?php
                                    }
                                  }
                                }
                                ?>
                                        
                            </tbody>
                        </table>
        
        <!--...............................................................................................................-->
        <h3> Corporate Task (Current Month :
            <?php
//                echo $firstday = date("Y-m-d", strtotime("first day of previous month")).' to '; 
//                echo $lastday = date("Y-m-d", strtotime("last day of previous month")); 
             echo $firstday = date("Y-m-01").' to '; 
             echo $lastday = date("Y-m-d");
            ?>
            )</h3>
         <table class="table table-bordered table-hover">                          
                            <thead>
                                <tr>
                                    <th>Employee Name(ID)</th>
                                    <th>New Customer Visit</th>
                                    <th>Existing Customer Visit</th>
                                    <th>Total Visit</th>
                                    <th>Interested</th>
                                    <th>Consideration</th>
                                    <th>Offer Submit</th>
                                    <th>Final Stage</th>
                                    <th>Sales Close</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
//                            echo '<pre>';
//                            print_r($task_Details);  
                            $Total_monthly_New_Visit=0;    
                            $Total_monthly_Existing_Visit=0;
                            $Total_monthly_Visit=0;
                            $Total_monthly_Interested=0;
                            $Total_monthly_Consideration=0;
                            $Total_monthly_Offer_Submit=0;
                            $Total_monthly_Final_Stage=0;
                            $Total_monthly_Sales_Close=0;
                            $monthly_Visit=0;
                             
                                foreach ($monthly_task_Details as $key => $task_values) {
                                    $employee_id= $task_values['e_id'];
                                     if( $user_type=='s_user' || $user_type == 'admin'){
                                        ?>  
                                        <tr> 
                                           
                                            <td>
                                              <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_monthly_task/<?php echo $task_values['e_id']; ?>">
                                              <?php echo $task_values['e_name']; ?> &nbsp; ( <?php echo $task_values['e_id']; ?> )
                                              </a>
                                            </td>
                                            
                                            <td>
                                                <?php
                                               echo  $monthly_New_Visit=$task_values['New_Visit'];
                                               $Total_monthly_New_Visit=$Total_monthly_New_Visit+$monthly_New_Visit;
                                                ?>
                                            </td>
                                            
                                            <td>
                                                <?php
                                                echo $monthly_Existing_Visit=$task_values['Existing_Visit']; 
                                                 $Total_monthly_Existing_Visit=$Total_monthly_Existing_Visit+$monthly_Existing_Visit;
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $monthly_Visit=$monthly_New_Visit+$monthly_Existing_Visit; 
                                                $Total_monthly_Visit=$Total_monthly_Visit+$monthly_Visit;
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $monthly_Interested=$task_values['Interested'];
                                                    $Total_monthly_Interested=$Total_monthly_Interested+$monthly_Interested;
                                                 ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $monthly_Consideration=$task_values['Consideration'];
                                                $Total_monthly_Consideration=$Total_monthly_Consideration+$monthly_Consideration;
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                echo $monthly_Offer_Submit=$task_values['Offer_Submit'];
                                                $Total_monthly_Offer_Submit=$Total_monthly_Offer_Submit+$monthly_Offer_Submit;
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $monthly_Final_Stage=$task_values['Final_Stage'];
                                                $Total_monthly_Final_Stage=$Total_monthly_Final_Stage+$monthly_Final_Stage;
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                echo $monthly_Sales_Close=$task_values['Sales_Close'];
                                                $Total_monthly_Sales_Close=$Total_monthly_Sales_Close+$monthly_Sales_Close;
                                                ?>
                                            </td>
                                            
                                        </tr>
                                <?php
                                } else{ 
                                    
                                    if($e_id==$employee_id){
                                    ?>
                                          <tr> 
                                           
                                            <td>
                                              <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_monthly_task/<?php echo $task_values['e_id']; ?>">
                                              <?php echo $task_values['e_name']; ?> &nbsp; ( <?php echo $task_values['e_id']; ?> )
                                              </a>
                                            </td>
                                           
                                              <td>
                                                <?php
                                               echo  $monthly_New_Visit=$task_values['New_Visit'];
                                               $Total_monthly_New_Visit=$Total_monthly_New_Visit+$monthly_New_Visit;
                                                ?>
                                            </td>
                                            
                                            <td>
                                                <?php
                                                echo $monthly_Existing_Visit=$task_values['Existing_Visit']; 
                                                 $Total_monthly_Existing_Visit=$Total_monthly_Existing_Visit+$monthly_Existing_Visit;
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                 echo $monthly_Visit=$monthly_New_Visit+$monthly_Existing_Visit; 
                                                $Total_monthly_Visit=$Total_monthly_Visit+$monthly_Visit;
                                                ?>
                                                
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $monthly_Interested=$task_values['Interested'];
                                                    $Total_monthly_Interested=$Total_monthly_Interested+$monthly_Interested;
                                                 ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $monthly_Consideration=$task_values['Consideration'];
                                                $Total_monthly_Consideration=$Total_monthly_Consideration+$monthly_Consideration;
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                echo $monthly_Offer_Submit=$task_values['Offer_Submit'];
                                                $Total_monthly_Offer_Submit=$Total_monthly_Offer_Submit+$monthly_Offer_Submit;
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $monthly_Final_Stage=$task_values['Final_Stage'];
                                                $Total_monthly_Final_Stage=$Total_monthly_Final_Stage+$monthly_Final_Stage;
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                echo $monthly_Sales_Close=$task_values['Sales_Close'];
                                                $Total_monthly_Sales_Close=$Total_monthly_Sales_Close+$monthly_Sales_Close;
                                                ?>
                                            </td>
                                            
                                        </tr>
                                       
                                <?php
                                    }
                                  }
                                }
                                ?>
                                <tr> 
                                           
                                            <td>
                                                <b>Total</b>
                                            </td>
                                           
                                              <td>
                                                <?php
                                               echo $Total_monthly_New_Visit;
                                                ?>
                                            </td>
                                            
                                            <td>
                                                <?php
                                                echo  $Total_monthly_Existing_Visit;
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $Total_monthly_Visit;
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $Total_monthly_Interested;
                                                 ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $Total_monthly_Consideration;
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                echo $Total_monthly_Offer_Submit;
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $Total_monthly_Final_Stage;
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                echo $Total_monthly_Sales_Close;
                                                ?>
                                            </td>
                                            
                                </tr>         
                            </tbody>
                        </table>
        
        
                        
<?php } ?> 
     
                     
<?php if ($department == "Admin" ||  $department=='Corporate') { ?>   
                        <h3> Corporate Sales (Monthly in
                        <?php
                            $month = date('m');
//                            $month= date('m', strtotime('last month'));
                            if($month == 1){
                               echo "January";
                            } elseif ($month == 2) {
                               echo "February";
                            } elseif ($month == 3) {
                               echo "March";
                            } elseif ($month == 4) {
                               echo "April";
                            } elseif ($month == 5) {
                               echo "May";
                            } elseif ($month == 6) {
                               echo "June";
                            } elseif ($month == 7) {
                               echo "July";
                            } elseif ($month == 8) {
                               echo "August";
                            } elseif ($month == 9) {
                               echo "September";
                            } elseif ($month == 10) {
                               echo "October";
                            } elseif ($month == 11) {
                               echo "November";
                            } elseif ($month == 12) {
                               echo "December";
                            }
                        ?>)</h3>
                      <table class="table table-bordered table-hover">                          
                            <thead>
                                <tr>
                                    <th>Employee Name (ID)</th>
                                    <th>Target MRC</th>
                                    <th>MRC</th>
                                    <th>Remaining MRC</th>
                                    <th>percentage of MRC</th>
                                    <th>Target OTC</th>
                                    <th>OTC</th>
                                    <th>Remaining OTC</th>
                                    <th>percentage of OTC</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $total_sales=0;
                                $total_target_mrc=0;
                                $total_target_otc=0;
                                $total_mrc=0;
                                $total_otc=0;
                                $total_Remaining_MRT=0;
                                $total_Remaining_OTC=0;
                                foreach ($sales_Details as $key => $sales_values) {
                                    $employee_id=$sales_values['e_id'];
                                      if( $user_type=='s_user' || $user_type == 'admin'){
                                   
                                    $total_sales = $sales_values['t_mrc'] + $sales_values['t_otc'];
//                                    if ($total_sales > 0) {
                                        ?>  
                                        <tr>
                                            <td>
                                                 <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_sales_monthly_by_id/<?php echo $sales_values['e_id']; ?>">
                                                     
                                                <?php echo $sales_values['e_name']; ?> &nbsp; ( <?php echo $sales_values['e_id']; ?> )
                                                </a>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $target_mrc=$sales_values['target_mrc'];
                                                    $total_target_mrc=$total_target_mrc+$target_mrc;
                                                ?>
                                            </td>
                                            <td>
                                               
                                                <?php 
                                                    echo $mrc=$sales_values['t_mrc'];
                                                    $total_mrc=$total_mrc+$mrc;
                                                ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?php
                                                    $Remaining_MRC=$target_mrc - $mrc;
                                                    if( $Remaining_MRC > 0 ){
                                                         echo '<font color="red">'.$Remaining_MRC.'</font>';
                                                    }else{
                                                        
                                                        echo '<font color="green"> Achieve Target ( + '. $x= -1 * $Remaining_MRC .')</font>';
                                                   
                                                    }
                                                    
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                     $precentage_MRC= ( $mrc / $target_mrc ) * 100;
                                                     
                                                     if($precentage_MRC > 100){
                                                        echo '<font color="green"> 100% </font>';  
                                                     }else{
                                                        echo '<b>'.number_format($precentage_MRC, 2).'%</b>'; 
                                                     }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $target_otc=$sales_values['target_otc']; 
                                                    $total_target_otc=$total_target_otc+$target_otc;
                                                ?>
                                            </td>
                                            <td>
                                               
                                                    <?php
                                                    echo $otc=$sales_values['t_otc']; 
                                                    $total_otc=$total_otc+$otc;
                                                    ?>
                                                
                                            </td>
                                            <td>
                                                <?php 
                                                  $Remaining_OTC=$target_otc - $otc;
                                                 
                                                  if( $Remaining_OTC > 0 ){
                                                         echo '<font color="red">'.$Remaining_OTC.'</font>';
                                                    }else{
                                                        
                                                        echo '<font color="green"> Achieve Target ( + '. $y= -1 * $Remaining_OTC .')</font>';
                                                   
                                                    }
                                                 
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $precentage_OTC= ( $otc / $target_otc ) * 100;
                                                     if($precentage_OTC > 100){
                                                         echo '<font color="green"> 100% </font>'; 
                                                     }else{
                                                         echo '<b>'.number_format($precentage_OTC, 2).'%</b>';
                                                     }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }else {
                                        if($e_id==$employee_id){ 
                                        ?>
                                         <tr>
                                            <td>
                                                 <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_sales_monthly_by_id/<?php echo $sales_values['e_id']; ?>">
                                                <?php echo $sales_values['e_name']; ?> &nbsp; ( <?php echo $sales_values['e_id']; ?> )
                                                </a>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $target_mrc=$sales_values['target_mrc'];
                                                    $total_target_mrc=$total_target_mrc+$target_mrc;
                                                ?>
                                            </td>
                                            <td>
                                               
                                                <?php 
                                                    echo $mrc=$sales_values['t_mrc'];
                                                    $total_mrc=$total_mrc+$mrc;
                                                ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?php
                                                    $Remaining_MRC=$target_mrc - $mrc;
                                                    if( $Remaining_MRC > 0 ){
                                                         echo '<font color="red">'.$Remaining_MRC.'</font>';
                                                    }else{
                                                        
                                                        echo '<font color="green"> Achieve Target ( + '. $x= -1 * $Remaining_MRC .')</font>';
                                                   
                                                    }
                                                    
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                     $precentage_MRC= ( $mrc / $target_mrc ) * 100;
                                                     if($precentage_MRC > 100){
                                                         echo '<font color="green"> 100% </font>'; 
                                                     }else{
                                                        echo '<b>'.number_format($precentage_MRC, 2).'%</b>'; 
                                                     }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $target_otc=$sales_values['target_otc']; 
                                                    $total_target_otc=$total_target_otc+$target_otc;
                                                ?>
                                            </td>
                                            <td>
                                               
                                                    <?php
                                                    echo $otc=$sales_values['t_otc']; 
                                                    $total_otc=$total_otc+$otc;
                                                    ?>
                                                
                                            </td>
                                            <td>
                                                <?php 
                                                  $Remaining_OTC=$target_otc - $otc;
                                                 
                                                  if( $Remaining_OTC > 0 ){
                                                         echo '<font color="red">'.$Remaining_OTC.'</font>';
                                                    }else{
                                                        
                                                        echo '<font color="green"> Achieve Target ( + '. $y= -1 * $Remaining_OTC .')</font>';
                                                   
                                                    }
                                                 
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $precentage_OTC= ( $otc / $target_otc ) * 100;
                                                     if($precentage_OTC > 100){
                                                        echo '<font color="green"> 100% </font>'; 
                                                     }else{
                                                         echo '<b>'.number_format($precentage_OTC, 2).'%</b>';
                                                     }
                                                ?>
                                            </td>
                                        </tr>
                                        
                                 <?php    
                                        }
                                    } 
                                }
                                
                                
                                ?>
                                  <tr>
                                            <td><b>TOTAL</b></td>
                                            <td><?php echo $total_target_mrc; ?></td>
                                            <td><?php echo $total_mrc; ?></a></td>
                                           
                                            <td>
                                                <?php
                                                 echo $total_Remaining_MRT=$total_target_mrc - $total_mrc;
                                                 
                                                ?>
                                            </td>
                                             <td>
                                                <?php
                                                    if($total_mrc>0){
                                                        $total_precentage_MRC= ( $total_mrc / $total_target_mrc ) * 100;
                                                        if($total_precentage_MRC > 100){
                                                            echo '<font color="green"> 100% </font>'; 
                                                        }else{
                                                           echo '<b>'.number_format($total_precentage_MRC, 2).'%</b>'; 
                                                        }
                                                    } else{
                                                        echo '<b>0.00% </b>';
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $total_target_otc; ?></td>
                                            <td><?php echo $total_otc; ?></a></td>
                                            <td>
                                                <?php 
                                                 echo $total_Remaining_OTC=$total_target_otc - $total_otc;
                                                ?>
                                            </td>
                                            <td>
                                                 <?php
                                                 if($total_otc>0){
                                                    $total_precentage_OTC= ( $total_otc / $total_target_otc ) * 100;
                                                     if($total_precentage_OTC > 100){
                                                         echo '<font color="green"> 100% </font>'; 
                                                     }else{
                                                        echo '<b>'.number_format($total_precentage_OTC, 2).'%</b>'; 
                                                     }
                                                 } else{
                                                    echo '<b>0.00% </b>'; 
                                                 }
                                                ?>
                                            </td>
                                        </tr>      
                            </tbody>
                        </table>  
                        
<?php } ?> 
 
        
        
<?php if ($department == "Admin" || $department == "Corporate") { 
    if( $user_type=='s_user' || $user_type == 'admin'){
    ?>   
                        <h3> Corporate Sales Year(2020-2021 ) </h3>
                      <table class="table table-bordered table-hover">                          
                            <thead>
                                <tr>
                                    <th>Month</th>
                                    <th>Target MRC</th>
                                    <th>Achieved MRC</th>
                                    <th>percentage of MRC</th>
                                    <th>Target OTC</th>
                                    <th>Achieved OTC</th>
                                    <th>percentage of OTC</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
//                                $mrc_month=845000;
//                                $otc_month=2140000;

                                $mrc_month=750000;
                                $otc_month=2000000;
                                
                                $total_mrc_year=0;
                                $total_otc_year=0;
                                
                                $target_mrc_year=0;
                                $target_otc_year=0;
                                $row=0;
                                foreach ($sales_year as $key => $sales_year) {
                                    $row++;   
                                ?>  
                                        <tr>
                                            <td>
                                                <input type="hidden" id="month<?php echo $row; ?>" name="month<?php echo $row; ?>" value="<?php echo $sales_year['month']?>" />
                                                <a data-toggle='modal' data-target='#myModal' onclick="details_suooprt(<?php echo $row; ?>)" id="month_name<?php echo $row; ?>" data-backdrop='static'>
                                                <?php
                                                $month=$sales_year['month'];
                                                if($month=='07'){
                                                    echo 'July';
                                                }elseif ($month=='08') {
                                                    echo 'August';        
                                                }elseif ($month=='09') {
                                                    echo 'September';        
                                                }elseif ($month=='10') {
                                                    echo 'October';        
                                                }elseif ($month=='11') {
                                                    echo 'November';        
                                                }elseif ($month=='12') {
                                                    echo 'December';        
                                                }elseif ($month=='01') {
                                                    echo 'January';        
                                                }elseif ($month=='02') {
                                                    echo 'February';        
                                                }elseif ($month=='03') {
                                                    echo 'March';        
                                                }elseif ($month=='04') {
                                                    echo 'April';        
                                                }elseif ($month=='05') {
                                                    echo 'May';        
                                                }elseif ($month=='06') {
                                                    echo 'June';        
                                                }
                                                ?>
                                               </a>
                                            </td>
                                            <td>
                                                <?php 
                                                $mrc_month; 
                                                $lac_mrc_month=$mrc_month/100000;
                                                echo number_format($lac_mrc_month, 2).' Lac';
                                                 $target_mrc_year=$target_mrc_year+$mrc_month;
                                                 
                                                ?> 
                                            </td>
                                            <td>
                                                <?php
                                                    $mrc_m=$sales_year['month_mrc']; 
                                                    $lac_mrc_m=$mrc_m/100000;
                                                    echo number_format($lac_mrc_m, 2).' Lac';
                                                    
                                                    
                                                    $total_mrc_year=$total_mrc_year+$mrc_m;
                                                    
                                                ?> </td>
                                             <td>
                                                <?php
                                                      $per_month_mrc=($mrc_m / $mrc_month) * 100;
                                                      if($per_month_mrc > 100){
                                                          echo '<b>100%</b>';
                                                      }else{
                                                           echo '<b>'.number_format($per_month_mrc, 2).'%</b>'; 
                                                      }
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                $otc_month;
                                                $lac_otc_month=$otc_month/100000;
                                                echo number_format($lac_otc_month, 2).' Lac';
                                                
                                                
                                                $target_otc_year=$target_otc_year+$otc_month;
                                                ?> 
                                            </td>
                                            <td>
                                                <?php 
                                                    $otc_m=$sales_year['month_otc'];
                                                    $lac_otc_m=$otc_m/100000;
                                                    echo number_format($lac_otc_m, 2).' Lac';
                                                    
                                                    
                                                    
                                                    $total_otc_year=$total_otc_year+$otc_m;
                                                ?></td>
                                            <td>
                                                <?php
                                                      $per_month_otc=($otc_m / $otc_month) * 100;
                                                      if($per_month_otc > 100){
                                                           echo '<b>100%</b>';
                                                      }else{
                                                            echo '<b>'.number_format($per_month_otc, 2).'%</b>'; 
                                                      }
                                                ?>
                                            </td>
                                        </tr>
                                 <?php } ?>
                                        <tr>
                                            <td><b>Total</b></td>
                                            <td>
                                                <?php 
                                                $lac_target_mrc_year=$target_mrc_year / 100000;
                                                 echo  $lac_target_mrc_year.' Lac';
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $total_mrc_year;
                                                $lac_total_mrc_year=$total_mrc_year / 100000;
                                                echo number_format($lac_total_mrc_year, 2). ' Lac';

                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                $avg_mrc_year=( $total_mrc_year / $target_mrc_year ) * 100;
                                                echo '<b>'.number_format($avg_mrc_year, 2).'%</b>'; 
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                $target_otc_year;
                                                $lac_target_otc_year=$target_otc_year / 100000;
                                                echo $lac_target_otc_year.' Lac';
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $total_otc_year; 
                                                $lac_total_otc_year=$total_otc_year / 100000;

                                                echo number_format($lac_total_otc_year, 2). ' Lac';
                                                ?>
                                            </td>
                                            <td>
                                                 <?php
                                                 
                                                 $avg_otc_year=( $total_otc_year / $target_otc_year ) * 100;
                                                 echo '<b>'.number_format($avg_otc_year, 2).'%</b>'; 
                                                 ?>
                                            </td>
                                        </tr>    
                            </tbody>
                        </table>  
                        
    <?php } } ?>         
        
        
        
        
        
        
        
        
 </div>
    </div>
</div>



<!--..................................................................................................................-->

<!--.........................Model ADD Serial Number part.....................................................-->
<div></div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">   
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="row"> 

                    <div class="col-md-8 col-sm-8">
                        <h4 class="modal-title">Corporate Sales (Monthly in <b id="pop_month"> </b>)</h4>
                    </div>           
                </div>             
            </div>

            <form method="" name="serial_number_form" id="serial_number_form" enctype="multipart/form-data">
                <div class="modal-body">
                    <span id="info_span"></span>
                </div>
                <div class="modal-footer">

                    <div class="table-responsive">   
                        <table class="table table-bordered table-striped" id="modal_table">
                            <thead>
                                <tr>
                                    <th>Employee Name (ID)</th>
                                    <th>Target MRC</th>
                                    <th>MRC</th>
                                    <th>Remaining MRC</th>
                                    <th>percentage of MRC</th>
                                    <th>Target OTC</th>
                                    <th>OTC</th>
                                    <th>Remaining OTC</th>
                                    <th>percentage of OTC</th>
                                </tr>
                            </thead>
                            <tbody id="work_details_table"></tbody>
                            
                        </table>
                    </div> 
                    <div class="row">
                        <div class="col-md-7 col-sm-7"></div>
                        <div class="col-md-5 col-sm-5">
                            <!--<input type="hidden" name="upload_id" value="<?php echo $Subscriber_id_for_file; ?>" id="upload_id">-->
                            <!--<button id="" type="submit" class="btn btn-info"  value="save" onclick="save_serial_number_function()">Save</button>-->
                            <!--<button type="submit" class="btn btn-info" id="save_eng_list" name="save_eng_list" onclick="" value="save">Save</button>-->
                            <!--remove_session_store()    kkk-->
                            <!--<button type="button" class="btn btn-info" onclick="remove_session_store()" >Cancel</button>-->
                            <button type="button" class="btn btn-default" data-dismiss="modal" id="clear_attach_file_value" onclick="clr_msg_value()">Close</button>
                        </div>
                    </div>
                </div>
            </form> 
        </div>      
    </div>
</div> 


<!--...........................END Serial Number part..................................................................................-->



<script>
    
 function details_suooprt(row){
     
    var month =document.getElementById('month'+row).value;
    

    if(month=='07'){
        document.getElementById('pop_month').innerHTML='JULY';
    }else if(month=='08'){
       document.getElementById('pop_month').innerHTML='August'; 
    }else if(month=='09'){
       document.getElementById('pop_month').innerHTML='September'; 
    }else if(month=='10'){
       document.getElementById('pop_month').innerHTML='October'; 
    }else if(month=='11'){
       document.getElementById('pop_month').innerHTML='November'; 
    }else if(month=='12'){
       document.getElementById('pop_month').innerHTML='December'; 
    }else if(month=='01'){
       document.getElementById('pop_month').innerHTML='January'; 
    }else if(month=='02'){
       document.getElementById('pop_month').innerHTML='February'; 
    }else if(month=='03'){
       document.getElementById('pop_month').innerHTML='MARCH'; 
    }else if(month=='04'){
       document.getElementById('pop_month').innerHTML='APRIL'; 
    }else if(month=='05'){
       document.getElementById('pop_month').innerHTML='MAY'; 
    }else if(month=='06'){
       document.getElementById('pop_month').innerHTML='JUNE'; 
    }

    $.post('<?php echo base_url();?>index.php/corporate_c/corporate_dy_month', {
        month:month,  
    }, function (search_info_data) {
        var search_array = JSON.stringify(search_info_data);
        var new_search_array = JSON.parse(search_array);
//       alert(new_search_array); 
//        alert("Search Engineer_ID...."+new_search_array[0]["Engineer_ID"]);
//.........................................................................
var total_target_mrc=0;
var total_mrc=0;
var total_Remaining_MRC=0;

var total_target_otc=0;
var total_otc=0;
var total_Remaining_OTC=0;

 var tableHTML = "";
    for (var key in new_search_array) {  
//        if (new_search_array.hasOwnProperty(key)) {
           tableHTML += "<tr>";
           tableHTML += "<td>" + new_search_array[key]["e_name"] +'('+ new_search_array[key]["e_id"] + ')' + "</td>";
           
           var target_mrc=new_search_array[key]["target_mrc"];
           var target_mrc = parseInt(target_mrc, 10);
           total_target_mrc = total_target_mrc + target_mrc;
           tableHTML += "<td>" + new_search_array[key]["target_mrc"]+ "</td>";
           
           var mrc=new_search_array[key]["t_mrc"];
           var mrc = parseInt(mrc, 10);
           total_mrc = total_mrc + mrc;
           tableHTML += "<td>" + new_search_array[key]["t_mrc"]+ "</td>";
           
           var Remaining_MRC=target_mrc - mrc ;
           total_Remaining_MRC=total_Remaining_MRC+Remaining_MRC;
           if(Remaining_MRC > 0){
               tableHTML += "<td><font color='red'>" + Remaining_MRC + "</font></td>";
           }else{
               Remaining_MRC=Remaining_MRC * (-1);
               tableHTML += "<td><font color='green'> Achieve Target ( +" + Remaining_MRC + " ) </font></td>";
           }
           
           var total_precentage_MRC= ( mrc / target_mrc) * 100;
           var total_MRC_Float = parseFloat((total_precentage_MRC).toFixed(2));
           
           if(total_MRC_Float > 100 ){
              tableHTML += "<td><b> 100% </b></td>"; 
           }else{
              tableHTML += "<td><b>" + total_MRC_Float + "% </b></td>"; 
           }
           
           var target_otc=new_search_array[key]["target_otc"];
           var target_otc = parseInt(target_otc, 10);
           total_target_otc=total_target_otc+target_otc;
           tableHTML += "<td>" + new_search_array[key]["target_otc"]+ "</td>";
           
           var otc=new_search_array[key]["t_otc"];
           var otc = parseInt(otc, 10);
           total_otc=total_otc+otc;
           tableHTML += "<td>" + new_search_array[key]["t_otc"]+ "</td>";
           
           var Remaining_OTC=target_otc - otc ;
            total_Remaining_OTC=total_Remaining_OTC+Remaining_OTC;
           if(Remaining_OTC > 0){
               tableHTML += "<td><font color='red'>" + Remaining_OTC + "</font></td>";
           }else{
               Remaining_OTC=Remaining_OTC * (-1);
               tableHTML += "<td><font color='green'> Achieve Target ( +" + Remaining_OTC + ") </font></td>";
           }
           
           var total_precentage_OTC= ( otc / target_otc) * 100;
           var total_OTC_Float = parseFloat((total_precentage_OTC).toFixed(2));
           if(total_OTC_Float > 100 ){
              tableHTML += "<td><b> 100% </b></td>"; 
           }else{
              tableHTML += "<td><b>" + total_OTC_Float + "% </b></td>"; 
           }
           tableHTML += "</tr>"; 
    }   
    
  var  total_per_mrc= ( total_mrc / total_target_mrc ) * 100;
  var total_per_mrc = parseFloat((total_per_mrc).toFixed(2));
  var  total_per_otc= ( total_otc / total_target_otc ) * 100;
  var total_per_otc = parseFloat((total_per_otc).toFixed(2));
    tableHTML += "<tr>"; 
        tableHTML += "<td><b>Total</b></td>";
        tableHTML += "<td>"+ total_target_mrc +"</td>";
        tableHTML += "<td>"+ total_mrc +"</td>";
        tableHTML += "<td>"+ total_Remaining_MRC +"</td>";
        tableHTML += "<td>"+ total_per_mrc +"% </td>";
        tableHTML += "<td>"+total_target_otc+"</td>";
        tableHTML += "<td>"+total_otc+"</td>";
        tableHTML += "<td>"+total_Remaining_OTC+"</td>";
        tableHTML += "<td>"+ total_per_otc +"% </td>";
    tableHTML += "</tr>"; 
    $("#work_details_table").html(tableHTML); 
//            .............................................................................
    }, 'JSON');
     
     
 }
 
 </script>