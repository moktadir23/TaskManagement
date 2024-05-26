

<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Revise Task From
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
                        
                        <form action="<?php echo base_url();?>index.php/link3_controller/fonoc_revise/" method="post">
                              
                            <!--<input type="hidden" name="task_info_id" id="task_info_id" class="form-control" value="<?php echo $result['ticket_no'] ?>">-->
                            <input type="hidden" class="form-control" name="p_key" id="p_key"  value="<?php echo $result['p_key']; ?>"> 
                            <input type="hidden" class="form-control" name="pre_comments" id="pre_comments"  value="<?php echo $result['comments']; ?>">                           
                            
                        <div class="row">
                             <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Comments</label>
                                    <textarea class="form-control" rows="4" name="comments" id="comments"></textarea>
                                </div>
                            </div>
                             <div class="col-lg-3">
                        <div class="form-group">
                            <label></label><br><br>
                            <button type="submit" class="btn btn-default" value="Save">Revise</button>
                        </div>
                    </div>
                             
                         </div>   
                        
                    </form>

                    </div>
                   
                </div>
            </div>

