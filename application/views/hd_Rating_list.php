

 <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?php
                $Zone = $this->session->userdata('Zone'); 
                $department = $this->session->userdata('department');
                $id = $this->session->userdata('id');
                $user_type = $this->session->userdata('u_type');
                $file_name = $this->session->userdata('file_name');
                
               
                ?>
            </h1>
        </div>
    </div>

<div class="row">                        
                <div class="col-lg-12">
   <h3> RATING TABLE </h3>
<table class="table table-bordered table-hover">                          
<thead>
    <tr>
        <th>RATING</th>
        <th>RATING NAME (short)</th>
        <th>NUMERIC RANGE</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td> A</td>
        <td> Outstanding (OS)</td>
        <td> Above 8</td>
    </tr> 
     <tr>
        <td> B</td>
        <td> Exceeds Expectation (EE)</td>
        <td> 7.5 to  8</td>
     </tr>
      <tr>
        <td> C</td>
        <td> Meets Expectation (ME)</td>
        <td> 6.1 to 7.49</td>
      </tr>
       <tr>
        <td> D</td>
        <td> Improvement Required (IR)</td>
        <td> 5 to 6</td>
       </tr>
        <tr>
        <td> E</td>
        <td> Unsatisfactory (UN)</td>
        <td> Below 5</td>
        </tr>
</tbody>
</table>
</div>
</div>


<div class="row">                        
                <div class="col-lg-12">


   <h3> KRA Details (2018-2019)</h3>
                      <table class="table table-bordered table-hover">                          
                            <thead>
                                <tr>
                                    <th>Employee Name ( ID )</th>
                                   
                                    <th>July (2018)</th>
                                    <th>August (2018)</th>
                                    <th>September (2018)</th>
                                    <th>October (2018)</th>
                                    <th>November (2018)</th>
                                    <th>December (2018)</th>
                                    <th>January (2019)</th>
                                    <th>February (2019)</th>
                                    <th>March (2019)</th>
                                    <th>April (2019)</th>
                                    <th>May (2019)</th>
                                    <th>June (2019)</th>
                                    <th>Total</th>
                                    <th>Avg. KRA</th>
                                    <th>RATING</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
//                                $total_KRA=0;
//                                echo '<pre>';
//                                print_r($KRA_result);
                                
                                foreach ($KRA_result as $key => $values) {
                                     $Engineer_ID = $values['Engineer_ID'];
                                    if($user_type=='auser' || $user_type=='admin'){
                                   $number=0;
//                                    if ($total_fonoc > 0) {
                                        ?>  
                                        <tr> 
                                            <td><?php echo $values['Engineer_Name']; ?> &nbsp; ( <?php echo $values['Engineer_ID']; ?> )</td>
                                            <!--<td><a href="<?php echo base_url(); ?>index.php/welcome/DB_A_FNOC_search_pending_task_by_id/<?php echo $values['employee_id']; ?>"><?php echo $values['pending']; ?></a></td>-->
                                            
                                            <td>
                                            <?php
                                             $July=$values['July']; 
                                            if( $July == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>
                                                <!--echo $July;-->
                                           <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/July">
                                           <?php 
                                           $number++;
                                           echo $July; ?>
                                           </a>     
                                                
                                          <?php  } ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $August=$values['August'];
                                            if( $August == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>    
                                                <!--echo $August;-->
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/August">
                                            <?php
                                             $number++;
                                            echo $August; ?>
                                           </a> 
                                                
                                           <?php } ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $September=$values['September']; 
                                             if( $September == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>    
                                                <!--echo $September;-->
                                               <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/September">
                                            <?php 
                                             $number++;
                                            echo $September; ?>
                                           </a>   
                                            <?php } ?>
                                            </td>
                                            <td>
                                            <?php
                                            $October=$values['October'];
                                            if( $October == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                                ?>
                                                <!--echo $October;-->
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/October">
                                            <?php 
                                             $number++;
                                            echo $October; ?>
                                           </a>      
                                           <?php }  ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $November=$values['November']; 
                                            if( $November == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>
                                                <!--echo $November;-->
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/November">
                                            <?php
                                             $number++;
                                            echo $November; ?>
                                           </a>    
                                            <?php } ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $December=$values['December']; 
                                            if( $December == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                                ?>
                                                <!--echo $December;-->
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/December">
                                            <?php 
                                             $number++;
                                            echo $December; ?>
                                            </a>      
                                           <?php } ?>
                                            </td>
                                            <td>
                                            <?php
                                            $January=$values['January'];
                                             if( $January == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>    
<!--//                                                echo $January;-->
                                             <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/January">
                                            <?php 
                                             $number++;
                                            echo $January; ?>
                                            </a>     
                                          <?php } ?>
                                            </td>
                                            <td>
                                            <?php
                                            $February=$values['February']; 
                                            if( $February == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                                ?>
                                                <!--echo $February;-->
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/February">
                                            <?php
                                             $number++;
                                            echo $February; ?>
                                            </a>  
                                            <?php }  ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $March=$values['March']; 
                                             if( $March == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>    
                                                <!--echo $March;-->
                                                
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/March">
                                            <?php
                                             $number++;
                                            echo $March; ?>
                                            </a>    
                                                
                                           <?php } ?>
                                            </td>
                                            <td>
                                            <?php
                                            $April=$values['April'];
                                            if( $April == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>
                                                <!--echo $April;-->
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/April">
                                            <?php 
                                             $number++;
                                            echo $April; ?>
                                            </a>   
                                                
                                            <?php } ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $May=$values['May']; 
                                            if( $May == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                           
                                            ?>
<!--//                                                echo $May;-->
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/May">
                                            <?php 
                                             $number++;
                                            echo $May; ?>
                                            </a>   
                                           <?php  } ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $June=$values['June']; 
                                            if( $June == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>
                                                <!--echo $June;-->
                                             <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/June">
                                            <?php 
                                             $number++;
                                            echo $June; ?>
                                            </a>     
                                            <?php } ?>
                                            </td>
                                            <td>
                                                <?php  
                                               echo $total_KRA = $values['July'] + $values['August'] + $values['September'] + $values['October'] + $values['November'] + $values['December']
                                                        + $values['January'] + $values['February'] + $values['March'] + $values['April'] + $values['May'] + $values['June'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                if($total_KRA != 0){
                                                     $avg=$total_KRA/$number;
                                                     echo  $avg = number_format($avg, 2);
                                                }else{
                                                    echo 0;
                                                }
                                               
                                                ?>
                                            </td>
                                            <td>
                                              <?php 
//                                                    if($avg >= 8.00){
//                                                        echo 'A';
//                                                    }elseif ( $avg < 8.00 || $avg > 7.50 ) {
//                                                        echo 'B';
//                                                    }elseif ( $avg < 7.50 || $avg > 6.00 ) {
//                                                        echo 'C';
//                                                    }elseif ( $avg < 6.00 || $avg > 5.00 ) {
//                                                        echo 'D';
//                                                    }elseif ( $avg < 5.00 ) {
//                                                        echo 'E';
//                                                    }
                                              
                                              switch($avg) {
                                                case $avg >= 8.00:
                                                    echo ' A (OS)';
                                                    break;
                                                case $avg < 8.00  and $avg >= 7.50:
                                                    echo 'B (EE)';
                                                    break;
                                                case $avg < 7.50 and $avg >= 6.00:
                                                    echo 'C (ME)';
                                                    break;
                                                case $avg > 7.50 and $avg >= 6.00:
                                                    echo 'D (IR)';
                                                    break;
                                                case $avg < 5.00 :
                                                    echo 'E (UN)';
                                                    break;
                                                default:
                                                    
                                                echo ' ..';
                                                }
                                              
                                              
                                              
                                              ?>  
                                                
                                            </td>
                                        </tr>
                                        <?php
                                    }else{
                                        $number=0;
                                        if( $id == $Engineer_ID ){
                                            if($file_name!=null){
                                            
                                        ?>
                                        <tr> 
                                            <td><?php echo $values['Engineer_Name']; ?> &nbsp; ( <?php echo $values['Engineer_ID']; ?> )</td>
                                            <!--<td><a href="<?php echo base_url(); ?>index.php/welcome/DB_A_FNOC_search_pending_task_by_id/<?php echo $values['employee_id']; ?>"><?php echo $values['pending']; ?></a></td>-->
                                            <td>
                                            <?php 
                                            $June=$values['June']; 
                                            if( $June == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>
                                                <!--echo $June;-->
                                             <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/June">
                                            <?php 
                                             $number++;
                                            echo $June; ?>
                                            </a>     
                                            <?php } ?>
                                            </td>
                                            <td>
                                            <?php
                                             $July=$values['July']; 
                                            if( $July == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>
                                                <!--echo $July;-->
                                           <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/July">
                                           <?php 
                                           $number++;
                                           echo $July; ?>
                                           </a>     
                                                
                                          <?php  } ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $August=$values['August'];
                                            if( $August == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>    
                                                <!--echo $August;-->
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/August">
                                            <?php
                                             $number++;
                                            echo $August; ?>
                                           </a> 
                                                
                                           <?php } ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $September=$values['September']; 
                                             if( $September == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>    
                                                <!--echo $September;-->
                                               <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/September">
                                            <?php 
                                             $number++;
                                            echo $September; ?>
                                           </a>   
                                            <?php } ?>
                                            </td>
                                            <td>
                                            <?php
                                            $October=$values['October'];
                                            if( $October == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                                ?>
                                                <!--echo $October;-->
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/October">
                                            <?php 
                                             $number++;
                                            echo $October; ?>
                                           </a>      
                                           <?php }  ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $November=$values['November']; 
                                            if( $November == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>
                                                <!--echo $November;-->
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/November">
                                            <?php
                                             $number++;
                                            echo $November; ?>
                                           </a>    
                                            <?php } ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $December=$values['December']; 
                                            if( $December == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                                ?>
                                                <!--echo $December;-->
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/December">
                                            <?php 
                                             $number++;
                                            echo $December; ?>
                                            </a>      
                                           <?php } ?>
                                            </td>
                                            <td>
                                            <?php
                                            $January=$values['January'];
                                             if( $January == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>    
<!--//                                                echo $January;-->
                                             <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/January">
                                            <?php 
                                             $number++;
                                            echo $January; ?>
                                            </a>     
                                          <?php } ?>
                                            </td>
                                            <td>
                                            <?php
                                            $February=$values['February']; 
                                            if( $February == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                                ?>
                                                <!--echo $February;-->
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/February">
                                            <?php
                                             $number++;
                                            echo $February; ?>
                                            </a>  
                                            <?php }  ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $March=$values['March']; 
                                             if( $March == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>    
                                                <!--echo $March;-->
                                                
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/March">
                                            <?php
                                             $number++;
                                            echo $March; ?>
                                            </a>    
                                                
                                           <?php } ?>
                                            </td>
                                            <td>
                                            <?php
                                            $April=$values['April'];
                                            if( $April == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>
                                                <!--echo $April;-->
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/April">
                                            <?php 
                                             $number++;
                                            echo $April; ?>
                                            </a>   
                                                
                                            <?php } ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $May=$values['May']; 
                                            if( $May == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                           
                                            ?>
<!--//                                                echo $May;-->
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/May">
                                            <?php 
                                             $number++;
                                            echo $May; ?>
                                            </a>   
                                           <?php  } ?>
                                            </td>
                                            
                                            <td>
                                                <?php  
                                               echo $total_KRA = $values['July'] + $values['August'] + $values['September'] + $values['October'] + $values['November'] + $values['December']
                                                        + $values['January'] + $values['February'] + $values['March'] + $values['April'] + $values['May'] + $values['June'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                if($total_KRA != 0){
                                                     $avg=$total_KRA/$number;
                                                     echo  $avg = number_format($avg, 2);
                                                }else{
                                                    echo 0;
                                                }
                                               
                                                ?>
                                            </td>
                                            <td>
                                              <?php 
                                              switch($avg) {
                                                case $avg >= 8.00:
                                                    echo ' A (OS)';
                                                    break;
                                                case $avg < 8.00  and $avg >= 7.50:
                                                    echo 'B (EE)';
                                                    break;
                                                case $avg < 7.50 and $avg >= 6.00:
                                                    echo 'C (ME)';
                                                    break;
                                                case $avg > 7.50 and $avg >= 6.00:
                                                    echo 'D (IR)';
                                                    break;
                                                case $avg < 5.00 :
                                                    echo 'E (UN)';
                                                    break;
                                                default:
                                                    
                                                echo ' ..';
                                                }
                                              ?>  
                                                
                                            </td>
                                        </tr>
                                        
                                        
                                        
                            <?php } ?>
                            <h2><span id="info_span">  Please  Update Profile ..</span></h2>
                            <?php            }  }   } ?>
                            </tbody>
                        </table>
<!--   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   .............................................................................................................................................
   ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
               
                
   <h3> KRA Details (2019-2020)</h3>             
                <table class="table table-bordered table-hover">                          
                            <thead>
                                <tr>
                                    <th>Employee Name ( ID )</th>
                                   
                                    <th>July (2019)</th>
                                    <th>August (2019)</th>
                                    <th>September (2019)</th>
                                    <th>October (2019)</th>
                                    <th>November (2019)</th>
                                    <th>December (2019)</th>
                                    <th>January (2020)</th>
                                    <th>February (2020)</th>
                                    <th>March (2020)</th>
                                    <th>April (2020)</th>
                                    <th>May (2020)</th>
                                    <th>June (2020)</th>
                                    <th>Total</th>
                                    <th>Avg. KRA</th>
                                    <th>RATING</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
//                                $total_KRA=0;
//                                echo '<pre>';
//                                print_r($KRA_result);
                                
                                foreach ($KRA_result_19_20 as $key => $values) {
                                     $Engineer_ID = $values['Engineer_ID'];
                                    if($user_type=='auser' || $user_type=='admin'){
                                   $number=0;
//                                    if ($total_fonoc > 0) {
                                        ?>  
                                        <tr> 
                                            <td><?php echo $values['Engineer_Name']; ?> &nbsp; ( <?php echo $values['Engineer_ID']; ?> )</td>
                                            <!--<td><a href="<?php echo base_url(); ?>index.php/welcome/DB_A_FNOC_search_pending_task_by_id/<?php echo $values['employee_id']; ?>"><?php echo $values['pending']; ?></a></td>-->
                                            
                                            <td>
                                            <?php
                                             $July=$values['July']; 
                                            if( $July == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>
                                                <!--echo $July;-->
                                           <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/July">
                                           <?php 
                                           $number++;
                                           echo $July; ?>
                                           </a>     
                                                
                                          <?php  } ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $August=$values['August'];
                                            if( $August == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>    
                                                <!--echo $August;-->
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/August">
                                            <?php
                                             $number++;
                                            echo $August; ?>
                                           </a> 
                                                
                                           <?php } ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $September=$values['September']; 
                                             if( $September == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>    
                                                <!--echo $September;-->
                                               <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/September">
                                            <?php 
                                             $number++;
                                            echo $September; ?>
                                           </a>   
                                            <?php } ?>
                                            </td>
                                            <td>
                                            <?php
                                            $October=$values['October'];
                                            if( $October == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                                ?>
                                                <!--echo $October;-->
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/October">
                                            <?php 
                                             $number++;
                                            echo $October; ?>
                                           </a>      
                                           <?php }  ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $November=$values['November']; 
                                            if( $November == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>
                                                <!--echo $November;-->
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/November">
                                            <?php
                                             $number++;
                                            echo $November; ?>
                                           </a>    
                                            <?php } ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $December=$values['December']; 
                                            if( $December == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                                ?>
                                                <!--echo $December;-->
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/December">
                                            <?php 
                                             $number++;
                                            echo $December; ?>
                                            </a>      
                                           <?php } ?>
                                            </td>
                                            <td>
                                            <?php
                                            $January=$values['January'];
                                             if( $January == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>    
<!--//                                                echo $January;-->
                                             <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/January">
                                            <?php 
                                             $number++;
                                            echo $January; ?>
                                            </a>     
                                          <?php } ?>
                                            </td>
                                            <td>
                                            <?php
                                            $February=$values['February']; 
                                            if( $February == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                                ?>
                                                <!--echo $February;-->
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/February">
                                            <?php
                                             $number++;
                                            echo $February; ?>
                                            </a>  
                                            <?php }  ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $March=$values['March']; 
                                             if( $March == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>    
                                                <!--echo $March;-->
                                                
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/March">
                                            <?php
                                             $number++;
                                            echo $March; ?>
                                            </a>    
                                                
                                           <?php } ?>
                                            </td>
                                            <td>
                                            <?php
                                            $April=$values['April'];
                                            if( $April == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>
                                                <!--echo $April;-->
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/April">
                                            <?php 
                                             $number++;
                                            echo $April; ?>
                                            </a>   
                                                
                                            <?php } ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $May=$values['May']; 
                                            if( $May == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                           
                                            ?>
<!--//                                                echo $May;-->
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/May">
                                            <?php 
                                             $number++;
                                            echo $May; ?>
                                            </a>   
                                           <?php  } ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $June=$values['June']; 
                                            if( $June == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>
                                                <!--echo $June;-->
                                             <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/June">
                                            <?php 
                                             $number++;
                                            echo $June; ?>
                                            </a>     
                                            <?php } ?>
                                            </td>
                                            <td>
                                                <?php  
                                               echo $total_KRA = $values['July'] + $values['August'] + $values['September'] + $values['October'] + $values['November'] + $values['December']
                                                        + $values['January'] + $values['February'] + $values['March'] + $values['April'] + $values['May'] + $values['June'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                if($total_KRA != 0){
                                                     $avg=$total_KRA/$number;
                                                     echo  $avg = number_format($avg, 2);
                                                }else{
                                                    echo 0;
                                                }
                                               
                                                ?>
                                            </td>
                                            <td>
                                              <?php 
//                                                    if($avg >= 8.00){
//                                                        echo 'A';
//                                                    }elseif ( $avg < 8.00 || $avg > 7.50 ) {
//                                                        echo 'B';
//                                                    }elseif ( $avg < 7.50 || $avg > 6.00 ) {
//                                                        echo 'C';
//                                                    }elseif ( $avg < 6.00 || $avg > 5.00 ) {
//                                                        echo 'D';
//                                                    }elseif ( $avg < 5.00 ) {
//                                                        echo 'E';
//                                                    }
                                              
                                              switch($avg) {
                                                case $avg >= 8.00:
                                                    echo ' A (OS)';
                                                    break;
                                                case $avg < 8.00  and $avg >= 7.50:
                                                    echo 'B (EE)';
                                                    break;
                                                case $avg < 7.50 and $avg >= 6.00:
                                                    echo 'C (ME)';
                                                    break;
                                                case $avg > 7.50 and $avg >= 6.00:
                                                    echo 'D (IR)';
                                                    break;
                                                case $avg < 5.00 :
                                                    echo 'E (UN)';
                                                    break;
                                                default:
                                                    
                                                echo ' ..';
                                                }
                                              
                                              
                                              
                                              ?>  
                                                
                                            </td>
                                        </tr>
                                        <?php
                                    }else{
                                        $number=0;
                                        if( $id == $Engineer_ID ){
                                            if($file_name!=null){
                                            
                                        ?>
                                        <tr> 
                                            <td><?php echo $values['Engineer_Name']; ?> &nbsp; ( <?php echo $values['Engineer_ID']; ?> )</td>
                                            <!--<td><a href="<?php echo base_url(); ?>index.php/welcome/DB_A_FNOC_search_pending_task_by_id/<?php echo $values['employee_id']; ?>"><?php echo $values['pending']; ?></a></td>-->
                                            <td>
                                            <?php 
                                            $June=$values['June']; 
                                            if( $June == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>
                                                <!--echo $June;-->
                                             <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/June">
                                            <?php 
                                             $number++;
                                            echo $June; ?>
                                            </a>     
                                            <?php } ?>
                                            </td>
                                            <td>
                                            <?php
                                             $July=$values['July']; 
                                            if( $July == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>
                                                <!--echo $July;-->
                                           <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/July">
                                           <?php 
                                           $number++;
                                           echo $July; ?>
                                           </a>     
                                                
                                          <?php  } ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $August=$values['August'];
                                            if( $August == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>    
                                                <!--echo $August;-->
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/August">
                                            <?php
                                             $number++;
                                            echo $August; ?>
                                           </a> 
                                                
                                           <?php } ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $September=$values['September']; 
                                             if( $September == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>    
                                                <!--echo $September;-->
                                               <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/September">
                                            <?php 
                                             $number++;
                                            echo $September; ?>
                                           </a>   
                                            <?php } ?>
                                            </td>
                                            <td>
                                            <?php
                                            $October=$values['October'];
                                            if( $October == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                                ?>
                                                <!--echo $October;-->
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/October">
                                            <?php 
                                             $number++;
                                            echo $October; ?>
                                           </a>      
                                           <?php }  ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $November=$values['November']; 
                                            if( $November == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>
                                                <!--echo $November;-->
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/November">
                                            <?php
                                             $number++;
                                            echo $November; ?>
                                           </a>    
                                            <?php } ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $December=$values['December']; 
                                            if( $December == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                                ?>
                                                <!--echo $December;-->
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/December">
                                            <?php 
                                             $number++;
                                            echo $December; ?>
                                            </a>      
                                           <?php } ?>
                                            </td>
                                            <td>
                                            <?php
                                            $January=$values['January'];
                                             if( $January == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>    
<!--//                                                echo $January;-->
                                             <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/January">
                                            <?php 
                                             $number++;
                                            echo $January; ?>
                                            </a>     
                                          <?php } ?>
                                            </td>
                                            <td>
                                            <?php
                                            $February=$values['February']; 
                                            if( $February == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                                ?>
                                                <!--echo $February;-->
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/February">
                                            <?php
                                             $number++;
                                            echo $February; ?>
                                            </a>  
                                            <?php }  ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $March=$values['March']; 
                                             if( $March == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>    
                                                <!--echo $March;-->
                                                
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/March">
                                            <?php
                                             $number++;
                                            echo $March; ?>
                                            </a>    
                                                
                                           <?php } ?>
                                            </td>
                                            <td>
                                            <?php
                                            $April=$values['April'];
                                            if( $April == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                            ?>
                                                <!--echo $April;-->
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/April">
                                            <?php 
                                             $number++;
                                            echo $April; ?>
                                            </a>   
                                                
                                            <?php } ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $May=$values['May']; 
                                            if( $May == '0.00' ){
                                                echo 'NULL';
                                            }else{
                                           
                                            ?>
<!--//                                                echo $May;-->
                                            <a href="<?php echo base_url(); ?>index.php/hd_controller/Show_KRA/<?php echo $values['Engineer_ID']; ?>/May">
                                            <?php 
                                             $number++;
                                            echo $May; ?>
                                            </a>   
                                           <?php  } ?>
                                            </td>
                                            
                                            <td>
                                                <?php  
                                               echo $total_KRA = $values['July'] + $values['August'] + $values['September'] + $values['October'] + $values['November'] + $values['December']
                                                        + $values['January'] + $values['February'] + $values['March'] + $values['April'] + $values['May'] + $values['June'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                if($total_KRA != 0){
                                                     $avg=$total_KRA/$number;
                                                     echo  $avg = number_format($avg, 2);
                                                }else{
                                                    echo 0;
                                                }
                                               
                                                ?>
                                            </td>
                                            <td>
                                              <?php 
                                              switch($avg) {
                                                case $avg >= 8.00:
                                                    echo ' A (OS)';
                                                    break;
                                                case $avg < 8.00  and $avg >= 7.50:
                                                    echo 'B (EE)';
                                                    break;
                                                case $avg < 7.50 and $avg >= 6.00:
                                                    echo 'C (ME)';
                                                    break;
                                                case $avg > 7.50 and $avg >= 6.00:
                                                    echo 'D (IR)';
                                                    break;
                                                case $avg < 5.00 :
                                                    echo 'E (UN)';
                                                    break;
                                                default:
                                                    
                                                echo ' ..';
                                                }
                                              ?>  
                                                
                                            </td>
                                        </tr>
                                        
                                        
                                        
                            <?php } ?>
                            <h2><span id="info_span">  Please  Update Profile ..</span></h2>
                            <?php            }  }   } ?>
                            </tbody>
                        </table>
                
                
                
                </div></div>



