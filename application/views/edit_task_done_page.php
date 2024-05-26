

<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Done Task From
                        </h3>
<!--                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Assign Task
                            </li>
                        </ol>-->
                    </div>
                </div>
                <!-- /.row -->
               <div class="row">
                       <?php
    $message=$this->session->userdata('message');
    if(isset($message))
    {
        echo $message;
        $this->session->unset_userdata('message');
    }
    ?>
                    <div class="col-lg-12">
                        
                        <form action="<?php echo base_url();?>index.php/welcome/update_task_done_funcation/" method="post">
                              
                            <!--<input type="hidden" name="task_info_id" id="task_info_id" class="form-control" value="<?php echo $result['ticket_no'] ?>">-->
                            <input type="hidden" class="form-control" name="ticket_no" id="ticket_no"  value="<?php echo $result['ticket_no']; ?>"> 
                          <div class='row'>   
                              
                               <div class="col-lg-3">
                                <div class="form-group">
                                    <label>End Date <i class="fa fa-calendar"></i></label>
                                    <input class="form-control" id="end_date_id" name="end_date"  placeholder="Enter End Date" value="<?php echo date('Y-m-d H:i:s') ?>">                               
                                </div>
                            </div>
                           <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Selects States</label>
                                    <select class="form-control" id="states" name="states">
                                        <!--<option>Pending</option>-->
                                        <option selected="selected">Done</option>  
                                    </select>
                                </div>
                            </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Comments</label>
                                    <textarea class="form-control" rows="2" name="comments" id="comments"></textarea>
                                </div>
                            </div>
                        </div>                        
                        <button type="submit" class="btn btn-default" value="Save">Done Button</button>
                    </form>

                    </div>
                   
                </div>
                <!-- /.row -->

            </div>

