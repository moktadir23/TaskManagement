        



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
<?php if ( $department == 'Admin' ) {
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
       
                
 <!--.................................................................................................................-->               
   <h3> KAM Task (Today: <?php echo $yesterday=date('Y-m-d');?> )</h3>             
  <table class="table table-bordered table-hover">                          
                            <thead>
                                <tr>
                                    <th>Employee Name(ID)</th>
                                    <th>CR</th>
                                    <th>Credit Note</th>
                                    <th>Existing Client Follow up</th>
                                    <th>Leads</th>
                                    <th>Survey</th>
                                    <th>TKI</th>
                                    <th>Other</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
//                            echo '<pre>';
//                            print_r($task_Details);  
                                foreach ($daily_task_Details as $key => $task_values) {
                                    $employee_id= $task_values['e_id'];
                                     if( $user_type=='s_user' || $user_type == 'admin'){
                                        ?>  
                                        <tr> 
                                           
                                            <td>
                                              <!--<a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_daily_task/<?php echo $task_values['e_id']; ?>">-->
                                              <?php echo $task_values['e_name']; ?> &nbsp; ( <?php echo $task_values['e_id']; ?> )
                                              <!--</a>-->
                                            </td>
                                            <td><?php echo $task_values['CR']; ?></td>
                                            <td><?php echo $task_values['Credit_Note']; ?></td>
                                            <td><?php echo $task_values['Existing_Client_Follow_up']; ?></td>
                                            <td><?php echo $task_values['Leads']; ?></td>
                                            <td><?php echo $task_values['Survey']; ?></td>
                                            <td><?php echo $task_values['TKI']; ?></td>
                                            <td><?php echo $task_values['Other']; ?></td>
                                        </tr>
                                <?php
                                } else{ 
                                    if($e_id==$employee_id){
                                    ?>
                                          <tr> 
                                            <td>
<!--                                              <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_daily_task/<?php echo $task_values['e_id']; ?>">-->
                                              <?php echo $task_values['e_name']; ?> &nbsp; ( <?php echo $task_values['e_id']; ?> )
                                              <!--</a>-->
                                            </td>
                                            <td><?php echo $task_values['CR']; ?></td>
                                            <td><?php echo $task_values['Credit_Note']; ?></td>
                                            <td><?php echo $task_values['Existing_Client_Follow_up']; ?></td>
                                            <td><?php echo $task_values['Leads']; ?></td>
                                            <td><?php echo $task_values['Survey']; ?></td>
                                            <td><?php echo $task_values['TKI']; ?></td>
                                            <td><?php echo $task_values['Other']; ?></td>
                                            
                                        </tr>
                                <?php
                                    }
                                  }
                                }
                                ?>
                                        
                            </tbody>
                        </table>               
                
                
                
                
 <!--......................................KAM Team................................................................-->                       
                        
<?php if ($department == "Admin" ||  $department=='KAM') { ?>   
                       <h3> KAM Task (Monthly in
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
                       
        <!--</h3>-->
                      <table class="table table-bordered table-hover">                          
                            <thead>
                                <tr>
                                    <th>Employee Name(ID)</th>
                                    <th>CR</th>
                                    <th>Credit Note</th>
                                    <th>Existing Client Follow up</th>
                                    <th>Leads</th>
                                    <th>Survey</th>
                                    <th>TKI</th>
                                    <th>Other</th>
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
                                              <!--<a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_daily_task/<?php echo $task_values['e_id']; ?>">-->
                                              <?php echo $task_values['e_name']; ?> &nbsp; ( <?php echo $task_values['e_id']; ?> )
                                              <!--</a>-->
                                            </td>
                                            <td><?php echo $task_values['CR']; ?></td>
                                            <td><?php echo $task_values['Credit_Note']; ?></td>
                                            <td><?php echo $task_values['Existing_Client_Follow_up']; ?></td>
                                            <td><?php echo $task_values['Leads']; ?></td>
                                            <td><?php echo $task_values['Survey']; ?></td>
                                            <td><?php echo $task_values['TKI']; ?></td>
                                            <td><?php echo $task_values['Other']; ?></td>
                                        </tr>
                                <?php
                                } else{ 
                                    if($e_id==$employee_id){
                                    ?>
                                          <tr> 
                                            <td>
<!--                                              <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_daily_task/<?php echo $task_values['e_id']; ?>">-->
                                              <?php echo $task_values['e_name']; ?> &nbsp; ( <?php echo $task_values['e_id']; ?> )
                                              <!--</a>-->
                                            </td>
                                            <td><?php echo $task_values['CR']; ?></td>
                                            <td><?php echo $task_values['Credit_Note']; ?></td>
                                            <td><?php echo $task_values['Existing_Client_Follow_up']; ?></td>
                                            <td><?php echo $task_values['Leads']; ?></td>
                                            <td><?php echo $task_values['Survey']; ?></td>
                                            <td><?php echo $task_values['TKI']; ?></td>
                                            <td><?php echo $task_values['Other']; ?></td>
                                            
                                        </tr>
                                <?php
                                    }
                                  }
                                }
                                ?>
                                        
                            </tbody>
                        </table>  
 <!--...................................................................................................................................-->       
 <h3> Leads Task
                        <?php
//                            $month = date('m');
////                            $month= date('m', strtotime('last month'));
//                            if($month == 1){
//                               echo "January";
//                            } elseif ($month == 2) {
//                               echo "February";
//                            } elseif ($month == 3) {
//                               echo "March";
//                            } elseif ($month == 4) {
//                               echo "April";
//                            } elseif ($month == 5) {
//                               echo "May";
//                            } elseif ($month == 6) {
//                               echo "June";
//                            } elseif ($month == 7) {
//                               echo "July";
//                            } elseif ($month == 8) {
//                               echo "August";
//                            } elseif ($month == 9) {
//                               echo "September";
//                            } elseif ($month == 10) {
//                               echo "October";
//                            } elseif ($month == 11) {
//                               echo "November";
//                            } elseif ($month == 12) {
//                               echo "December";
//                            }
                        ?></h3>  

 <table class="table table-bordered table-hover">                          
                            <thead>
                                <tr>
                                    <th>Employee Name(ID)</th>
                                    <th>Working Process</th>
                                    <th>Current Month Incomplete</th>
                                    <th>Current Month Complete</th>
                                    <th>Sales Amount</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
//                            echo '<pre>';
//                            print_r($task_Details);  
                                foreach ($lead_task as $key => $lead_values) {
                                    $employee_id= $lead_values['e_id'];
                                     if( $user_type=='s_user' || $user_type == 'admin'){
                                        ?>  
                                        <tr> 
                                           
                                            <td>
                                              <a href="<?php echo base_url(); ?>index.php/corporate_c/kam_leads_task_monthly/<?php echo $lead_values['e_id']; ?>">
                                              <?php echo $lead_values['e_name']; ?> &nbsp; ( <?php echo $lead_values['e_id']; ?> )
                                              </a>
                                            </td>
                                            <td><?php echo $lead_values['Working_Process']; ?></td>
                                            <td><?php echo $lead_values['Incomplete']; ?></td>
                                            <td><?php echo $lead_values['Done']; ?></td>
                                            <td><?php echo $lead_values['sales_amount']; ?></td>
                                        </tr>
                                <?php
                                } else{ 
                                    if($e_id==$employee_id){
                                    ?>
                                          <tr> 
                                            <td>
<!--                                              <a href="<?php echo base_url(); ?>index.php/corporate_c/corporate_daily_task/<?php echo $lead_values['e_id']; ?>">-->
                                              <?php echo $lead_values['e_name']; ?> &nbsp; ( <?php echo $lead_values['e_id']; ?> )
                                              <!--</a>-->
                                            </td>
                                            <td><?php echo $lead_values['Working_Process']; ?></td>
                                            <td><?php echo $lead_values['Incomplete']; ?></td>
                                            <td><?php echo $lead_values['Done']; ?></td>
                                            <td><?php echo $lead_values['sales_amount']; ?></td>
                                            
                                        </tr>
                                <?php
                                    }
                                  }
                                }
                                ?>
                                        
                            </tbody>
                        </table> 
        
<?php } ?> 
     
        
                     
<?php if ($department == "Admin" ||  $department=='KAM') { ?>  
        
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
                                      if( $user_type=='a_user' || $user_type == 'admin'){
                                   
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
      
                
 </div>
    </div>
</div>



<!--..................................................................................................................-->

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