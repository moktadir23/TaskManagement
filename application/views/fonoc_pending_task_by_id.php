
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
               FONOC Pending Task List 
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
            <form action="<?php echo base_url('index.php/link3_controller/fonoc_pending_data_by_id/'); ?>" name="select_by_id_form" id="select_by_id_form" method="POST">
                <div class='row'> 
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Search </label>
                            
                           
                            <?php
                            $user_type=$this->session->userdata('u_type'); 
                            $e_id=$this->session->userdata('id'); 
                            $fonoc_zone_session=$this->session->userdata('fonoc_zone_session');
                            
                            if($user_type=='a_user'){
                             ?>
                            <select class="form-control" name="search_id" id="search_id">
                                <option value="0">Select Employee ID</option>
                            </select>
                           <?php  }else{ ?>
                            <input class="form-control" name="search_id_own" id="search_id_own" value="<?php echo $e_id; ?>" readonly="readonly" required="">
                            <?php } ?>
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
                                        <th>Create ID</th>                                      
<!--                                        <th>BTS Name</th>
                                        <th>OLT Name</th>-->
                                        <!--<th>ONU Model</th>-->
                                        <th>Client ID</th>
                                        <th>Client Name</th>
                                        <th>TKI ID</th>
                                        <th>Zone </th>
                                        <th>Type Task</th>
                                        <th>Receipt Phone</th>                          
                                        <th>Receipt Time</th>
                                        <th>Pending Time</th>
                                        <th>Working By</th>
                                        <th>Working Time</th> 
                                        <th>Comments</th> 
                                        <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
//  echo '<pre>';
//  print_r($result_display);    
                                
  if($result_display != null){
  $row=0;    
                                foreach ($result_display as $value) {
                                    $working_id=$value->employee_id;
                                    $id = $this->session->userdata('id');
                                    $row++;
                                    $work_status=$value->work_status; 
                                    if( $work_status == '0' ){
                                    ?>   
                                    
                                    <tr bgcolor="#ffb3b3"> 
                                         <td><?php echo $value->create_id; ?></td>
                                        <td id='<?php echo 'client_id'.$row; ?>'><?php echo $value->Client_ID; ?></td>
                                        <td><?php echo $value->Client_Name; ?></td>
                                        <td><?php echo $value->tki_id; ?></td>
                                        <td><?php echo $value->engineer_zone; ?></td>
                                        <td><?php echo $value->task_type; ?></td>
                                        <td><?php echo $value->receipt_phone; ?></td>
                                        <td><?php echo $receipt_time=$value->receipt_time; ?></td>
                                        <td>
                                            <?php                                            
                                                $datetime1 = new DateTime();
                                                $datetime2 = new DateTime($receipt_time);
                                                $interval = $datetime1->diff($datetime2);
                                                $duration = $interval->format(' %a days %h hours %i min');
                                                echo $duration; 
                                            ?>
                                        </td>
                                        <td><?php echo $value->employee_id.'('.$value->employee_name.')'; ?></td>
                                        <td><?php // echo $value->start_date; ?></td>
                                         
                                        <td><?php echo $value->comments; ?></td>
                                       <td id='<?php echo 'row'.$row; ?>'>
                                       <?php 
                                       $create_from=$value->create_from;
                                       if($create_from == 'Daily Task'){
                                       ?>
                                            <a href="<?php echo base_url() ;?>index.php/link3_controller/fonoc_working/<?php echo $value->p_key; ?>"><button class="btn btn-danger">Working</button></a> <br><br>
                                       <?php } ?>
                                       <?php if($working_id==$id){?>    
                                            <a href="<?php echo base_url() ;?>index.php/link3_controller/fonoc_edit_task_done/<?php echo $value->p_key; ?>">  <button class="btn btn-success"> Close Task</button> </a><br><br>
                                       <?php } ?>  
                                        <!--<a href="<?php echo base_url() ;?>index.php/link3_controller/fonoc_olt_info_details/<?php echo $value->p_key; ?>">  <button class="btn btn-info"> OLT Details</button> </a>-->
                                        <button type="button" class="btn btn-info" data-toggle='modal' data-target='#myModal' onclick="tki_details(<?php echo $row; ?>)" data-backdrop='static'>Details</button> 
                                        </td>
                                    </tr>
                                    <?php }elseif ($work_status=='1') { ?> 
                                    
                                    <tr bgcolor="#99ffbb"> 
                                         <td><?php echo $value->create_id; ?></td>
                                        <td id='<?php echo 'client_id'.$row; ?>'><?php echo $value->Client_ID; ?></td>
                                        <td><?php echo $value->Client_Name; ?></td>
                                        <td><?php echo $value->tki_id; ?></td>
                                        <td><?php echo $value->engineer_zone; ?></td>
                                        <td><?php echo $value->task_type; ?></td>
                                        <td><?php echo $value->receipt_phone; ?></td>
                                        <td><?php echo $receipt_time=$value->receipt_time; ?></td>
                                        <td>
                                            <?php                                            
                                                $datetime1 = new DateTime();
                                                $datetime2 = new DateTime($receipt_time);
                                                $interval = $datetime1->diff($datetime2);
                                                $duration = $interval->format(' %a days %h hours %i min');
                                                echo $duration; 
                                            ?>
                                        </td>
                                        <td><?php echo $value->employee_id.'('.$value->employee_name.')'; ?></td>
                                        <td>
                                            <?php 
                                                $start_date=$value->start_date;
                                                $start_date = new DateTime($start_date);
                                                $interval_1 = $datetime1->diff($start_date);
                                                $work_time = $interval_1->format(' %a days %h hours %i min');
                                                echo $work_time; 
                                            ?>
                                        </td>
                                        
                                        <td><?php echo $value->comments; ?></td>
                                       <td id='<?php echo 'row'.$row; ?>'>
                                          
                                            
                                       <?php if($working_id==$id){?>   
                                       <?php 
                                       $create_from=$value->create_from;
                                       if($create_from == 'Daily Task'){
                                       ?> 
                                           <a href="<?php echo base_url() ;?>index.php/link3_controller/fonoc_revise_form/<?php echo $value->p_key; ?>"><button class="btn btn-warning">Return</button></a> <br><br>
                                       <?php } ?> 
                                            <a href="<?php echo base_url() ;?>index.php/link3_controller/fonoc_edit_task_done/<?php echo $value->p_key; ?>">  <button class="btn btn-success"> Close Task</button> </a><br><br>
                                       <?php } ?>  
                                        <!--<a href="<?php echo base_url() ;?>index.php/link3_controller/fonoc_olt_info_details/<?php echo $value->p_key; ?>">  <button class="btn btn-info"> OLT Details</button> </a>-->
                                        <button type="button" class="btn btn-info" data-toggle='modal' data-target='#myModal' onclick="tki_details(<?php echo $row; ?>)" data-backdrop='static'>Details</button> 
                                        </td>
                                    </tr>
                                    
                                    <?php } ?>
                                    

  <?php }    } ?>                                 
      
                            </tbody>
                        </table>
                    </div>    
                </div>
            </div>
        </div>


    </div>
</div>







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
                        <h4 class="modal-title">OLT Info Details</h4>
                    </div>           
                </div>             
            </div>
<!--................................................................................................................................-->
<br><div class='row'>
                    <div class="col-lg-4">
                        <div class="form-group">
                          BTS Name: <b id="BTS_Name"> </b>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">                            
                        <div class="form-group">
                           ONU ID : <b id="ONU_ID"> </b>
                        </div>
                    </div> 
                    <div class="col-lg-4">                            
                        <div class="form-group">
                          Client Name: <b id="Client_Name"> </b>
                        </div>
                    </div>
                   
                                 
</div><br>
<div class='row'>
                    <div class="col-lg-4">
                        <div class="form-group">
                          OLT Name : <b id="OLT_Name"> </b>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">                            
                        <div class="form-group">
                           MAC Address: <b id="MAC"> </b>
                        </div>
                    </div> 
                    <div class="col-lg-4">                            
                        <div class="form-group">
                            Data/Internet VLAN : <b id="VLAN"> </b>
                        </div>
                    </div>
                   
                                 
</div><br>
<div class='row'>
                    <div class="col-lg-4">                            
                           <div class="form-group">
                               Card Number : <b id="PON"> </b>
                           </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                          Serial No.: <b id="Serial_No"> </b>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">                            
                        <div class="form-group">
                           Connect LAN Port : <b id="LAN_Port"> </b>
                        </div>
                    </div> 
                    
                                 
</div><br>
<div class='row'>
                    <div class="col-lg-4">                            
                        <div class="form-group">
                            PON Port Number  : <b id="Port"> </b>
                        </div>
                    </div>
                    <div class="col-lg-4">                            
                        <div class="form-group">
                            OLT IP: <b id="OLT_IP"> </b>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                          Status : <b id="Status"> </b>
                        </div>
                    </div>
                                 
</div><br>
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div class='row'>
                    <div class="col-lg-12">
    <div class="table-responsive">   
    <h4>Comments Details</h4>
                        <table class="table table-bordered table-striped" id="modal_table">
                            <thead>
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Time </th>
                                    <th>Comments </th>
                                   
                                </tr>
                            </thead>
                            <tbody id="work_details_table"></tbody>
                            
                        </table>
                    </div>
                        </div>
    </div>

<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
    <div class="row">
                        <div class="col-md-10"></div>
                        <div class="col-md-2 ">
                            <button type="button" class="btn btn-default" data-dismiss="modal" id="clear_attach_file_value" onclick="clr_msg_value()">Close</button>
                        </div>
                    </div>
<br><br>
<!--.......................................................................................................................................-->
            
        </div>      
    </div>
</div> 


<!--...........................END  part..................................................................................-->









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
<script language="javascript">
//setInterval(function(){
//   window.location.reload(1);
//}, 30000);


window.setTimeout(function () {
  window.location.reload();
}, 30000);
</script>

<script>
    
 function tki_details(row){
     
    var Client_ID =document.getElementById('client_id'+row).innerHTML;    
   
    $.post('<?php echo base_url();?>index.php/hd_controller/fonoc_client_info', {
        Client_ID:Client_ID
//        Engineer_ID:Engineer_ID
    }, function (search_info_data) {
        var search_array = JSON.stringify(search_info_data);
        var new_search_array = JSON.parse(search_array);
      
        var pre_fonoc_task_info=new_search_array["pre_fonoc_task_info"];
        
//        alert("Search ...."+new_search_array['olt_info']['Client_Name']);
        document.getElementById('BTS_Name').innerHTML=new_search_array['olt_info']['BTS_Name'];
        document.getElementById('OLT_Name').innerHTML=new_search_array['olt_info']["OLT_Name"];
        document.getElementById('PON').innerHTML=new_search_array['olt_info']["PON"];
        document.getElementById('Port').innerHTML=new_search_array['olt_info']["Port"];
        document.getElementById('MAC').innerHTML=new_search_array['olt_info']["MAC_Address"];
        document.getElementById('ONU_ID').innerHTML=new_search_array['olt_info']["ONU_ID"];
        document.getElementById('Serial_No').innerHTML=new_search_array['olt_info']["Sl_Number"];
        document.getElementById('OLT_IP').innerHTML=new_search_array['olt_info']["OLT_IP"];
        document.getElementById('Client_Name').innerHTML=new_search_array['olt_info']["Client_Name"];
        document.getElementById('VLAN').innerHTML=new_search_array['olt_info']["V_LAN"];
        document.getElementById('LAN_Port').innerHTML=new_search_array['olt_info']["Conect_LAN_Port"];
        document.getElementById('Status').innerHTML=new_search_array['olt_info']["Status"];
        
//      .........................................................................

//.........................................................................

 var tableHTML = "";
    
     for (var key in pre_fonoc_task_info) {  
//        if (new_search_array.hasOwnProperty(key)) {
           tableHTML += "<tr>";
           tableHTML += "<td>" + pre_fonoc_task_info[key]["employee_id"]+ "</td>";
           tableHTML += "<td>" + pre_fonoc_task_info[key]["end_date"]+ "</td>";
           tableHTML += "<td>" + pre_fonoc_task_info[key]["comments"]+ "</td>";
           tableHTML += "</tr>";     
//        } 
    }
    $("#work_details_table").html(tableHTML); 
//            ............................................................................

//            .........................................................................

    }, 'JSON');
     
     
 }
 
 </script>