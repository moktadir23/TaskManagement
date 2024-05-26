<?php
    $Zone = $this->session->userdata('Zone'); 
    $department = $this->session->userdata('department');
    $id = $this->session->userdata('id');
    $name = $this->session->userdata('name');
    $user_type = $this->session->userdata('u_type');
?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                 <?php echo $department; ?> Team: Task List
            </h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <form action="<?php echo base_url('index.php/corporate_c/kam_task_lst/'); ?>" name="search_by_zone" id="search_by_zone" method="POST">
                  <input type="hidden" name="hidden_dept" value="<?php echo $department;?>" id="hidden_dept">
                <div class="row">
                    
                    <div class="col-lg-4"> 
                        <div class="form-group">
                            <label>Task Type <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="type_task"  id="type_task">
                                <option value="0" >Select Task Type</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">                            
                        <div class="form-group">
                            <label>Employee Name<div style="color:red;float: right;"></div></label>
                            
                              <?php if($user_type=='s_user' || $user_type=='admin'){ ?>
                                    <select class="form-control" name="e_name" onchange="pick_engineer_id();" id="e_name">
                                        <option value="0" >All Employee  </option>
                                    </select>
                              <?php }else{ ?> 
                                    <select class="form-control" name="e_name_1" id="e_name_1">
                                        <option value="<?php echo $name;?>" ><?php echo $name;?></option>
                                    </select>
                            <!--<input class="form-control" value="<?php echo $name;?>" name="e_name_1" id="e_name_1" readonly="readonly" required="">-->
                              <?php } ?>
                            
                        </div>
                    </div>
                    <div class="col-lg-4">                            
                        <div class="form-group">
                            <label>Employee ID<div style="color:red;float: right;"></div></label>
                          
                            
                            <?php if($user_type=='s_user' || $user_type=='admin'){ ?>
                                      <select class="form-control" name="e_id" id="e_id">
                                        <option value="0" >select Employee ID</option>
                                    </select>
                            <?php }else{ ?> 
                                    <select class="form-control" name="e_id" id="e_id">
                                        <option value="<?php echo $id;?>" ><?php echo $id;?></option>
                                    </select>
                            <?php } ?>
                        </div>
                    </div>
                    
                    
                     
                    
                </div>
                
                <div class="row">
                    <div class="col-lg-4">
                        <label>From Date</label>
                        <input type="" name="date_from" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="start_date_id" class="form-control" placeholder="Enter from Date" required=""/>
                    </div>
                    <div class="col-lg-4">
                        <label>To Date</label>
                        <input type="" name="date_to" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="end_date_id" class="form-control" placeholder="Enter To Date" required=""/>
                    </div>
                    <div class="col-lg-4">
                       &nbsp;<br>
                        <button type="submit" class="btn btn-default" value="save">Search</button>
                    </div> 
                </div>    
                
            </form>  
            </div>
            
            <br>
            
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Type Task</th>
                            <th>Sub-Task</th>
                            <th>Client ID</th>
                            <th>Client Name </th>                                      
                            <th>phone Number</th>
                            <th>E-mail</th>    
                            <th>Employee Name (ID)</th>
                            <th>Sales Amount</th>
                            <th>Status</th>
                            <th>Last Remarks</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>                       
                        <?php
                        
//                        echo '<pre>';
//                        print_r($follow_up_list);
                        if($follow_up_list != null){
                        $total=0;
                        $Survey=0;
                        $TKI=0;
                        $CR=0;
                        $Credit_Note=0;
                        $Existing_Client_Follow_up=0;
                        $Leads=0;
                        $Working_Process=0;
                        $Incomplete=0;
                        $Complete=0;
                        $total_amount=0;
                        foreach ($follow_up_list as $value) {
                            $total++;
                                    $type_task=$value->type_task; 
                                    if($type_task=='TKI'){
                                        $TKI++; 
                                    }elseif($type_task=='CR'){
                                        $CR++;
                                    }elseif($type_task=='Survey'){
                                        $Survey++;
                                    }elseif($type_task=='Credit_Note'){
                                        $Credit_Note++;
                                    }elseif($type_task=='Existing_Client_Follow_up'){
                                        $Existing_Client_Follow_up++;
                                    }elseif($type_task=='Leads'){
                                        $Leads++;
                                    }
                                    $status=$value->status;
                                    if($type_task=='Leads' && $status=='Working Process'){
                                        $Working_Process++;
                                    }elseif($type_task=='Leads' && $status=='Incomplete'){
                                        $Incomplete++;
                                    }elseif($type_task=='Leads' && $status=='Done'){
                                        $Complete++;
                                    }
//                            $p_key = $value->id;
                            ?> 
                        <!--<tr bgcolor="#99ffbb">-->
                        <?php if($type_task=='Leads' && $status=='Working Process'){ ?>
                                <tr bgcolor="#ffffb3"> 
                                <td><?php echo $value->date; ?></td>   
                                <td><?php echo $type_task=$value->type_task;  ?></td>
                                <td><?php echo $value->sub_task; ?></td>
                                <td><?php echo $value->Client_ID; ?></td>
                                <td><?php echo $value->Client_Name; ?></td>
                                <td><?php echo $value->phone; ?></td>
                                <td><?php echo $value->email; ?></td>
                                <td><?php echo $value->e_name.'( '.$value->e_id.' )'; ?></td>
                                <td>
                                    <?php
                                     echo $amount=$value->lead_price;
                                     $total_amount=$total_amount+$amount;
                                    ?>
                                </td>
                                <td><?php echo $value->status; ?></td>  
                                <td><?php echo $value->remarks; ?></td>
                                <td>
                                    <?php 
                                    $status=$value->status; 
                                    if($type_task == 'Leads' && $status=='Working Process'){?>
                                    <button type="button"  class="btn btn-primary" onclick="location.href = '<?php echo base_url(); ?>index.php/corporate_c/kam_followup_from/<?php echo $value->p_key; ?>'" /> Update</button>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php }elseif($type_task=='Leads' && $status=='Incomplete'){ ?>
                                <tr bgcolor="#ffb3b3"> 
                                   <td><?php echo $value->date; ?></td>   
                                   <td><?php echo $type_task=$value->type_task;  ?></td>
                                   <td><?php echo $value->sub_task; ?></td>
                                   <td><?php echo $value->Client_ID; ?></td>
                                   <td><?php echo $value->Client_Name; ?></td>
                                   <td><?php echo $value->phone; ?></td>
                                   <td><?php echo $value->email; ?></td>
                                   <td><?php echo $value->e_name.'( '.$value->e_id.' )'; ?></td>
                                   <td>
                                       <?php
                                        echo $amount=$value->lead_price;
                                        $total_amount=$total_amount+$amount;
                                       ?>
                                   </td>
                                   <td><?php echo $value->status; ?></td>  
                                   <td><?php echo $value->remarks; ?></td>
                                   <td>
                                       <?php 
                                       $status=$value->status; 
                                       if($type_task == 'Leads' && $status=='Working Process'){?>
                                       <button type="button"  class="btn btn-primary" onclick="location.href = '<?php echo base_url(); ?>index.php/corporate_c/kam_followup_from/<?php echo $value->p_key; ?>'" /> Update</button>
                                       <?php } ?>
                                   </td>
                               </tr>
                        <?php }elseif ($type_task=='Leads' && $status=='Done') { ?>
                               <tr bgcolor="#99ffbb"> 
                                   <td><?php echo $value->date; ?></td>   
                                   <td><?php echo $type_task=$value->type_task;  ?></td>
                                   <td><?php echo $value->sub_task; ?></td>
                                   <td><?php echo $value->Client_ID; ?></td>
                                   <td><?php echo $value->Client_Name; ?></td>
                                   <td><?php echo $value->phone; ?></td>
                                   <td><?php echo $value->email; ?></td>
                                   <td><?php echo $value->e_name.'( '.$value->e_id.' )'; ?></td>
                                   <td>
                                       <?php
                                        echo $amount=$value->lead_price;
                                        $total_amount=$total_amount+$amount;
                                       ?>
                                   </td>
                                   <td><?php echo $value->status; ?></td>  
                                   <td><?php echo $value->remarks; ?></td>
                                   <td>
                                       <?php 
                                       $status=$value->status; 
                                       if($type_task == 'Leads' && $status=='Working Process'){?>
                                       <button type="button"  class="btn btn-primary" onclick="location.href = '<?php echo base_url(); ?>index.php/corporate_c/kam_followup_from/<?php echo $value->p_key; ?>'" /> Update</button>
                                       <?php } ?>
                                   </td>
                               </tr>            
                        <?php } else { ?>
                                <tr> 
                                   <td><?php echo $value->date; ?></td>   
                                   <td><?php echo $type_task=$value->type_task;  ?></td>
                                   <td><?php echo $value->sub_task; ?></td>
                                   <td><?php echo $value->Client_ID; ?></td>
                                   <td><?php echo $value->Client_Name; ?></td>
                                   <td><?php echo $value->phone; ?></td>
                                   <td><?php echo $value->email; ?></td>
                                   <td><?php echo $value->e_name.'( '.$value->e_id.' )'; ?></td>
                                   <td>
                                       <?php
                                        echo $amount=$value->lead_price;
                                        $total_amount=$total_amount+$amount;
                                       ?>
                                   </td>
                                   <td><?php echo $value->status; ?></td>  
                                   <td><?php echo $value->remarks; ?></td>
                                   <td>
                                       <?php 
                                       $status=$value->status; 
                                       if($type_task == 'Leads' && $status=='Working Process'){?>
                                       <button type="button"  class="btn btn-primary" onclick="location.href = '<?php echo base_url(); ?>index.php/corporate_c/kam_followup_from/<?php echo $value->p_key; ?>'" /> Update</button>
                                       <?php } ?>
                                   </td>
                               </tr>
                        <?php } ?>    
                               
                            
                            
                        <?php }
                        
                        echo '<h2>Total Task : '.$total.'<br>';
                        echo 'CR: '.$CR.'&nbsp;&nbsp;';
                        echo 'Survey: '.$Survey.'&nbsp;&nbsp;';
                        echo 'Leads: '.$Leads.'&nbsp;&nbsp;';
                        echo 'TKI: '.$TKI.'&nbsp;&nbsp;';
                        echo 'Credit Note: '.$Credit_Note.'&nbsp;&nbsp;';
                        echo 'Existing Client Follow Up: '.$Existing_Client_Follow_up.'&nbsp;&nbsp;<br>';
                        
                        if($Leads>0){
                            echo 'Total Sales Amount: '.$total_amount.'&nbsp;&nbsp;<br>';
                            echo '<font color="#cccc00">Working Process: </font>'.$Working_Process.'&nbsp;&nbsp;';
                            echo '<font color="red">Incomplete: </font>'.$Incomplete.'&nbsp;&nbsp;';
                            echo '<font color="green">Complete: </font>'.$Complete.'&nbsp;&nbsp;'; 
                        }
                       
                        }
                        ?>

                    </tbody>
                </table>
                <div class="col-lg-5"></div>
                <div class="col-lg-5">



                    <?php echo $links; ?>
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
//            $("#e_name").change(function() {
var dept=document.getElementById("hidden_dept").value;
if(dept==='KAM' || dept==='Admin'){
    $("#e_name").load("<?php echo base_url(); ?>corporate/kam_employee.txt");
}
    });
</script>

<script type="text/javascript">
function pick_engineer_id(){
    var Engineer_Name = $('#e_name').val();
        $.post('<?php echo base_url();?>index.php/corporate_c/pick_engineer_id', {
            Engineer_Name: Engineer_Name
        }, function (search_info_data) {

            var search_array = JSON.stringify(search_info_data);
            var new_search_array = JSON.parse(search_array);
//                alert("Search Engineer_ID...."+new_search_array["Engineer_ID"]);
var id=new_search_array["id"]
//alert(id);

if(typeof id !== 'undefined' ){
                document.getElementById("e_id").innerHTML=null;
                document.getElementById("e_id").value=null;
                select = document.getElementById("e_id");
                var opt = document.createElement('option');
                
                opt.value = new_search_array["id"];
                opt.innerHTML = new_search_array["id"];
                select.appendChild(opt); 
}else{
  
    document.getElementById("e_id").innerHTML=null;
    document.getElementById("e_id").value=null;
    select = document.getElementById("e_id");
    var opt = document.createElement('option');
    
    opt.value = 'o';
    opt.innerHTML = 'select Employee ID';
    select.appendChild(opt); 
    
}                

        }, 'JSON');

}

</script>
