

<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            FONOC Done Task From
                        </h3>
                    </div>
                </div>
                <!-- /.row -->
               <div class="row">
                       <?php
//    $message=$this->session->userdata('message');
//    if(isset($message))
//    {
//        echo $message;
//        $this->session->unset_userdata('message');
//    }
    ?>
                    <div class="col-lg-12">
                        
                        <form action="<?php echo base_url();?>index.php/link3_controller/fonoc_update_task_done/" method="post">
                              
                            <!--<input type="hidden" name="task_info_id" id="task_info_id" class="form-control" value="<?php echo $result['ticket_no'] ?>">-->
                            <input type="hidden" class="form-control" name="p_key" id="p_key"  value="<?php echo $result['p_key']; ?>"> 
                            <input type="hidden" class="form-control" name="pre_comments" id="pre_comments"  value="<?php echo $result['comments']; ?>"> 
                          <div class='row'>   
                              <div class="col-lg-3">
<!--                                <div class="form-group">
                                    <label>Select Category <div style="color:red;float: right;">*</div></label>
                                    <select class="form-control" id="Problem_Category" name="Problem_Category" required="">
                                        <option selected="selected" value="0">Select Category</option>  
                                    </select>
                                </div>-->
                                  
                                  
                        <div class="form-group">
                            
                            <label>Problem Category <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Problem_Category" id="Problem_Category" required="">
                                <option  value="">Select Problem Category</option>
                            </select>
                        </div> 
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                            </div>
                               <div class="col-lg-3">
                                <div class="form-group">
                                    <label>End Date <i class="fa fa-calendar"></i><div style="color:red;float: right;">*</div></label>
                                    <input class="form-control" readonly="readonly" id="end_date_id" name="end_date"  placeholder="Enter End Date" value="<?php echo date('Y-m-d H:i:s') ?>">                               
                                </div>
                            </div>
                           <div class="col-lg-3">
                                <div class="form-group">
                                    <label>ONU Port Block<div style="color:red;float: right;">*</div></label>
                                    <select class="form-control" id="port_block" name="port_block" required="">
                                        <option  value="">Select ONU Port Block</option>
                                        <option  value="YES">YES</option>
                                        <option  value="Single Port">Single Port</option>
                                        <option  value="No Need">No Need</option>
                                    </select>
                                </div>
                            </div>
                              <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Selects Status</label>
                                    <select class="form-control" id="states" name="states">
                                        <!--<option>Pending</option>-->
                                        <!--<option selected="selected">Done</option>-->  
                                    </select>
                                </div>
                            </div>
                             
                        </div>
                            
                        <div class="row">
                             <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Comments</label>
                                    <textarea class="form-control" rows="2" name="comments" id="comments"></textarea>
                                </div>
                            </div>
                             <div class="col-lg-3">
                        <div class="form-group">
                            <label></label><br><br>
                            <button type="submit" class="btn btn-default" value="Save">CLOSE</button>
                        </div>
                    </div>
                             
                         </div>   
                        
                    </form>

                    </div>
                   
                </div>
            </div>

<?php
//    echo '<pre>';
//    print_r($C_result);

echo "<script type=\"text/javascript\">";
foreach ($C_result as $value) {
    echo "var x = document.getElementById(" . $value['Select_Name'] . ");";
    echo "var option = document.createElement(\"option\");";
    echo "option.text =" . $value['CateGory_Description'] . ";";
    echo "option.value =" . $value['D_Value'] . ";";
    echo "x.add(option,x[" . $value['Indexx'] . "]);";
}
echo "</script>";
?>

