        



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
    if ( $user_type == 's_user' || $user_type == 'admin' ) {
    ?>            
                <div class="row">
                    <div class="col-lg-9" style="">
                        <b>DashBroad By :</b> &nbsp; 
                        <button type="button" class="btn btn-primary" onclick="location.href = '<?php echo base_url(); ?>index.php/corporate_c/ctg_mkt'" /> CTG Zone</button> &nbsp;
                        <button type="button" class="btn btn-success"  onclick="location.href = '<?php echo base_url(); ?>index.php/corporate_c/corporate_db'"> Corporate Team</button> &nbsp;
                        <button type="button" class="btn btn-info" onclick="location.href = '<?php echo base_url(); ?>index.php/corporate_c/Strategic_db'">Strategic Team</button> &nbsp;
                        <!--<button type="button" class="btn btn-danger" onclick="location.href = '<?php echo base_url(); ?>index.php/welcome/search_cs_pending_task_by_CTID_SR'">CTID Number/SR </button> <br>-->
                    </div>
                    <div class="col-lg-3">
                        <br>
                    </div>
                </div><br>
<?php } }  ?> 
                      
 <!--......................................WI Team................................................................-->                       
                        
<?php if ($department == "Admin" ||  $department=='Corporate'||  $department=='ctg_mkt') { ?>   
                       <h3> CTG Task (Yesterday: <?php echo $yesterday=date('Y-m-d',strtotime("-1 days"));?> )</h3>
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
        
        <h3> CTG Task (Previous Week :
            <?php
                echo $firstday = date('Y-m-d', strtotime("saturday -2 week")).' to '; 
                echo $lastday = date('Y-m-d', strtotime("thursday -1 week")); 
            ?>
            )</h3>
         <table class="table table-bordered table-hover">                          
                            <thead>
                                <tr>
                                    <th>Employee Name(ID)</th>
                                    <th>Target New Visit</th>
                                    <th>New Customer Visit</th>
                                    <th>Target Existing Visit</th>
                                    <th>Existing Customer Visit</th>
                                    <th>Total Visit</th>
                                    <th>percentage Of Visit</th>
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
                                            <td><?php echo $Target_new_visit=15; ?></td>
                                            <td>
                                                <?php
                                               echo  $weekly_New_Visit=$task_values['New_Visit'];
                                                ?>
                                            </td>
                                             <td><?php echo $Target_existing_visit=10; ?></td>
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
                                            <td>
                                                <?php
                                                 $percentage_weekly_Visit= ( $weekly_total_Visit / 25 ) * 100; 
                                                  echo '<b>'.$percentage_weekly_Visit.'%</b>';
                                                ?>
                                            </td>
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
                                            <td><?php echo $Target_new_visit=15; ?></td>
                                            <td><?php echo $weekly_New_Visit=$task_values['New_Visit']; ?></td>
                                            <td><?php echo $Target_existing_visit=10; ?></td>
                                            <td><?php echo $weekly_Existing_Visit=$task_values['Existing_Visit']; ?></td>
                                            <td>
                                                <?php
                                                echo $weekly_total_Visit=$weekly_New_Visit+$weekly_Existing_Visit; 
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                 $percentage_weekly_Visit= ( $weekly_total_Visit / 25 ) * 100; 
                                                  echo '<b>'.$percentage_weekly_Visit.'%</b>';
                                                ?>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                  }
                                }
                                ?>
                                        
                            </tbody>
                        </table>
                        
<?php } ?> 
     
                     
<?php if ($department == "Admin" ||  $department=='Corporate'||  $department=='ctg_mkt') { ?>   
                        <h3> CTG Sales (Monthly in
                        <?php
                            $month = date('m');
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
                                                 <a href="<?php echo base_url(); ?>index.php/corporate_c/t/<?php echo $sales_values['e_id']; ?>">
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
 
        
        
<?php if ($department == "Admin" || $department == "Corporate"|| $department == "ctg_mkt") { 
    if( $user_type=='s_user' || $user_type == 'admin' ){
    ?>   
                        <h3> CTG Sales Year(2019-2020 ) </h3>
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
                                $mrc_month=845000;
                                $otc_month=2140000;

                                $total_mrc_year=0;
                                $total_otc_year=0;
                                
                                $target_mrc_year=0;
                                $target_otc_year=0;
                                foreach ($sales_year as $key => $sales_year) {
                                ?>  
                                        <tr>
                                            <td>
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
                                            <td><?php
                                            $total_mrc_year;
                                            $lac_total_mrc_year=$total_mrc_year / 100000;
                                            echo number_format($lac_total_mrc_year, 2). ' Lac';
                                          
                                            ?></td>
                                            <td>
                                                <?php 
                                                $avg_mrc_year=( $total_mrc_year / $target_mrc_year ) * 100;
                                                echo '<b>'.number_format($avg_mrc_year, 2).'%</b>'; 
                                                ?>
                                            </td>
                                            <td><?php 
                                            $target_otc_year;
                                            $lac_target_otc_year=$target_otc_year / 100000;
                                            echo $lac_target_otc_year.' Lac';
                                            ?></td>
                                            <td><?php
                                            $total_otc_year; 
                                            $total_otc_year=$total_otc_year / 100000;
                                          
                                            echo number_format($total_otc_year, 2). ' Lac';
                                            ?></td>
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