
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              NMC Team: TKI Report
            </h3>
            <ol class="breadcrumb">
                <!--<div class="col-lg-4"></div>-->
                <h3 class="text-center"><span id="info_span"></span></h3>
                <!--<div class="col-lg-4"></div>-->
                <!--                            <li>
                                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                                            </li>
                                            <li class="active">
                                                <i class="fa fa-edit"></i> Assign Task
                                            </li>-->
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
            <form action="<?php echo base_url('index.php/nmc_c/nmc_tki_history/'); ?>" name="search_by_tki" id="search_by_tki" method="POST">
                <div class="row">
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>TKI ID <div style="color:red;float: right;"></div></label>
                            <input class="form-control" name="tki" id="tki" placeholder="Enter Ticket ID" >
                        </div>
                    </div>
                    <div class="col-lg-3">
                       &nbsp;<br>
                        <button type="submit" class="btn btn-default" value="save">Search</button>
                    </div> 
                    
                </div>
                
            </form> 
       
            <br><br>
            <form action="" name="assign_task_from" id="assign_task_from" method="">
        <?php 
          if($tki_result != null){
        ?>   
                <div class='row'>
                     <div class="col-lg-4">
                        <div class="form-group">
                          <label> Incident Occurred : </label>  <?php echo $tki_result->in_Occurred; ?>
                           
                        <!--<input  class="form-control" id="s_date" value="<?php echo $tki_result->in_Occurred; ?>" name="s_date"  placeholder="DD-MM-YYYY H:M:S" required="">-->
                        </div>
                    </div>
                    
                    <div class="col-lg-4">                            
                        <div class="form-group">
                            <label>Ticket ID : </label>  <?php echo $tki_result->tki; ?>
                          
                        </div>
                    </div> 
                    <div class="col-lg-4">                            
                        <div class="form-group">
                            <label>Incident For : </label>  <?php echo $tki_result->incident_for; ?>
                          
                        </div>
                    </div>
                    
                    
                    
                </div>
                <div class="row">
 
                    <div class="col-lg-4">                            
                        <div class="form-group">
                            <label>Incident Resolved : </label>  <?php echo $tki_result->in_Resolved; ?>
                          
                        </div>
                    </div> 
                    <div class="col-lg-4">                            
                        <div class="form-group">
                            <label>Duration : </label>  <?php echo $tki_result->Duration; ?>
                          
                        </div>
                    </div> 
                    <div class="col-lg-4">
                         <?php $sms=$tki_result->sms;
                         if($sms=='1'){
                         ?>
                          <b> SMS</b>&nbsp;&nbsp;: YES
                         <?php }else{?>
                           <b> SMS</b>&nbsp;&nbsp; : NO
                         <?php } ?>
                    
                           
                        <?php $email=$tki_result->email;
                         if($email=='1'){
                         ?>
                          <b> EMail</b>&nbsp; &nbsp;: YES
                         <?php }else{?>
                           <b>&nbsp;&nbsp; EMail</b>&nbsp;&nbsp;: NO
                         <?php } ?>  
                           
                     </div>
                </div> 
            
                <div class="row">
                    <div class="col-lg-4">                            
                        <div class="form-group">
                            <label>Incident Type: </label>  <?php echo $tki_result->type; ?>
                          
                        </div>
                    </div> 
                    <div class="col-lg-4">                            
                        <div class="form-group">
                            <label>Specification  : </label>  <?php echo $tki_result->Specification; ?>
                          
                        </div>
                    </div> 
                    <div class="col-lg-4">                            
                        <div class="form-group">
                            <label>Vendor : </label>  <?php echo $tki_result->Vendor; ?>
                          
                        </div>
                    </div> 
                </div>  
                <div class="row">
                    <div class="col-lg-4">                            
                        <div class="form-group">
                            <label>Site/ POP/ Link Name / Client Name: </label>  <?php echo $tki_result->Name; ?>
                          
                        </div>
                    </div> 
                    <div class="col-lg-4">                            
                        <div class="form-group">
                            <label>SCR / Circuit ID  : </label>  <?php echo $tki_result->scr_curt_id; ?>
                          
                        </div>
                    </div> 
                    <div class="col-lg-4">                            
                        <div class="form-group">
                            <label>Informed To : </label>  <?php echo $tki_result->informed_id; ?>
                          
                        </div>
                    </div> 
                </div>
                 <div class="row">
                    <div class="col-lg-4">                            
                        <div class="form-group">
                            <label>Primary Finding: </label>  <?php echo $tki_result->pri_find; ?>
                          
                        </div>
                    </div> 
                    <div class="col-lg-4">                            
                        <div class="form-group">
                            <label>Final Reason : </label>  <?php echo $tki_result->Final_Reason; ?>
                          
                        </div>
                    </div> <!--
                    <div class="col-lg-4">                            
                        <div class="form-group">
                            <label>Informed To : </label>  <?php echo $tki_result->informed_id; ?>
                          
                        </div>
                    </div> -->
                </div>
               <?php  } ?>
            </form>
        </div>
    </div>
    
    
    
    
    <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          
                            <th> Date Time</th>
                            <th>Engineer ID( Name )</th>
                            <th>Action</th>
                           
                        </tr>
                    </thead>
                    <tbody>                       
<?php
//      echo '<pre>';
//      print_r($tki_crt_cls);
if($tki_crt_cls != null){
  foreach ($tki_crt_cls as $value) {  
    ?>  

                            <tr> 
                                <td><b><?php echo $value['create_time']; ?></b></td>
                                <td><?php echo $value['e_id'].' ('. $value['e_name'].')'; ?></td>
                                <td>
                                    <?php  $status=$value['status'];
                                        if($status=='0'){  echo "CRETAE";
                                        }elseif ($status=='1') { echo "CLOSE";   }
                                    ?>
                                </td>
                            </tr>    
<?php }  } ?>
                            <?php
//      echo '<pre>';
//      print_r($tki_crt_cls);
  if($tki_result_comments != null){
  foreach ($tki_result_comments as $c_value) {  
    ?>  

                            <tr> 
                                <td><b><?php echo $c_value['create_time']; ?></b></td>
                                <td><?php echo $c_value['create_id']; ?></td>
                                <td>
                                    <?php echo $c_value['comments']; ?>
                                </td>
                            </tr>    
  <?php } } ?>
                    </tbody>
                </table>
            </div>
</div>

<script src="../../js/jquery.min.js" type="text/javascript"></script>

