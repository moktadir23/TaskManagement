<?php
    $Zone = $this->session->userdata('Zone'); 
    $department = $this->session->userdata('department');
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
                <form action="<?php echo base_url('index.php/corporate_c/bank_task_list/'); ?>" name="search_by_zone" id="search_by_zone" method="POST">
                  <input type="hidden" name="hidden_dept" value="<?php echo $department;?>" id="hidden_dept">
                <div class="row">
                    
<!--                    <div class="col-lg-4"> 
                        <div class="form-group">
                            <label>Status <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="status"  id="status">
                                <option value="0" >Select Status</option>
                            </select>
                        </div>
                    </div>-->
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Employee Name<div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="e_name" onchange="pick_engineer_id();" id="e_name">
                                <option value="0" >All Employee  </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Employee ID<div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="e_id" id="e_id">
                                <option value="0" >select Employee ID</option>
                            </select>
                            <!--<input class="form-control" name="Client_ID" id="Client_ID" placeholder="Enter Employee ID" >-->
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
                            <th>Type Task</th>
                            <th>Sub Task</th>
                            <!--<th>Client ID</th>-->
                            <th>Client Name </th>
                            <th>Contact Person Name</th>                                       
                            <th>phone Number</th>
                            <th>E-mail</th>                          
                            <th>Address</th>
                            <th>Requirement</th>
                            <th>Employee Name (ID)</th>
                            <th>survey</th>
                            <th>Offer</th>
                            <th>Site Number</th>
                            <th>Start Date</th>
                            <th>Follow UP </th>
                            <th>End Date</th>
                            <th>status</th>
                            <th>Last comments </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>                       
                        <?php
                        
//                        echo '<pre>';
//                        print_r($follow_up_list);
                        if($follow_up_list != null){
                        $total=0;
                        $Consideration=0;
                        $Sales_Close=0;
                        $Interested=0;
                        $Final_Stage=0;
                        $new_visit=0;
                        $Existing_visit=0;
                        $Cold_Call=0;
                        $Follow_Up_Call=0;
                        $Prospective_Call=0;
                        $email=0;
                        foreach ($follow_up_list as $value) {
                            $total++;
                            
//                            $p_key = $value->id;
                            ?>  
                            <tr> 
                                <td>
                                    <?php 
                                    echo $type_task=$value->type_task; 
                                    if($type_task=='New Customer Visit'){
                                        $new_visit++; 
                                    }elseif($type_task=='Existing Customer Visit'){
                                        $Existing_visit++;
                                    }elseif($type_task=='Cold Call'){
                                        $Cold_Call++;
                                    }elseif($type_task=='Prospective Call'){
                                        $Prospective_Call++;
                                    }elseif($type_task=='Follow Up Call'){
                                        $Follow_Up_Call++;
                                    }elseif($type_task=='E-mail'){
                                        $email++;
                                    }
                                    ?>
                                </td>
                                <td><?php echo $value->sub_task; ?></td>
                                <!--<td><?php // echo $value->Client_ID; ?></td>-->
                                <td><?php echo $value->Client_Name; ?></td>
                                <td><?php echo $value->Contact_Name; ?></td>
                                <td><?php echo $value->phone; ?></td>
                                <td><?php echo $value->email; ?></td>
                                <td><?php echo $value->address; ?></td>
                                <td><?php echo $value->L3_service; ?></td>
                                <td><?php echo $value->e_name.'( '.$value->e_id.' )'; ?></td>
                                
                                <td><?php echo $value->survey_value; ?></td>
                                <td><?php echo $value->offer_value; ?></td>
                                <td><?php echo $value->Site_Number; ?></td>
                                <td><?php echo $value->start_date; ?></td>
                                
                                <td><?php echo $value->follow_up_date; ?></td>
                                <td><?php echo $value->end_date; ?></td>
                                <td>
                                    <?php
                                    echo $status=$value->status; 
                                    if($status=='Consideration'){
                                        $Consideration++;
                                    }elseif ($status=='Sales Close') {
                                        $Sales_Close++;        
                                    }elseif ($status=='Interested') {
                                        $Interested++;
                                    }elseif ($status=='Final Stage') {
                                        $Final_Stage++;
                                    }
                                    ?></td> 
                                <td><?php echo $value->remarks; ?></td>                               
                                <td>
                                    <?php if($status == 'Sales Close' || $status == 'Done'){?>
                                    
                                    <?php }else{ ?>
                                             <button type="button"  class="btn btn-primary" onclick="location.href = '<?php echo base_url(); ?>index.php/corporate_c/bank_followup_from/<?php echo $value->p_key; ?>'" /> Update</button>
                                   
                                    <?php } ?>
                                </td>
                            </tr>   
                        <?php }
                        echo '<h2>Total Task : '.$total.'<br>';
                        echo 'Interested: '.$Interested.'&nbsp;&nbsp;';
                        echo 'Consideration: '.$Consideration.'&nbsp;&nbsp;';
                        echo 'Final Stage: '.$Final_Stage.'&nbsp;&nbsp;';
                        echo 'Sales Close: '.$Sales_Close.'&nbsp;&nbsp;<br>';
                        echo 'New Visit: '.$new_visit.'&nbsp;&nbsp;';
                        echo 'Existing  Visit: '.$Existing_visit.'&nbsp;&nbsp;';
                        echo 'Cold Call: '.$Cold_Call.'&nbsp;&nbsp;';
                        echo 'Prospective Call: '.$Prospective_Call.'&nbsp;&nbsp;';
                        echo 'Follow Up Call: '.$Follow_Up_Call.'&nbsp;&nbsp;';
                        echo 'E-mail: '.$email.'</h2>&nbsp;&nbsp;';
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

if(dept==='Bank_NBFI' || dept==='Admin'){
    $("#e_name").load("<?php echo base_url(); ?>corporate/bank_nbfi.txt");
}
                   
//            });
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
