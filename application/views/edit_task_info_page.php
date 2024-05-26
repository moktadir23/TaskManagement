
<div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Assign Task
                        </h3>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Assign Task
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
               <div class="row">
                    <div class="col-lg-12">
                        <form action="<?php echo base_url();?>index.php/welcome/update_task_info_funcation" method="post">
                              <input type="hidden" name="task_info_id" class="form-control" value="<?php echo $result['task_info_id']; ?>">
                            
                          <div class='row'> 
                            <div class="col-lg-3">                    
                              <div class="form-group">
                                <label>Selects</label>
                                    <select class="form-control" name="type_task">
                                        <option>Type of Task</option>
                                        <option>Infrastructure</option>
                                        <option>Corporate</option>
                                        <option>FTTX</option>
                                        <option>Project Work</option>
                                        <option>Meeting / Presentation</option>
                                        <option>R&D </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Task</label>
                                    <input class="form-control" name="sub_task"  placeholder="Enter Sub Task" value="<?php echo $result['sub_task']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-3">                            
                               <div class="form-group">
                                <label>Selects Assign By</label>
                                    <select class="form-control" name="assign_by">
                                        <option>Self</option>
                                        <option>Mr. Md.Abdus Sattar</option>
                                        <option>Mr.Qazi Shamsud Tahmeed</option>
                                        <option>Mr.Mahboob Rashid</option>

                                    </select>
                                 </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>End Date <i class="fa fa-calendar"></i></label>
                                    <input class="form-control" id="dpd2" name="end_date"  placeholder="Enter End Date" value="<?php echo $result['end_date']; ?>">                               
                                </div>
                            </div>
                          </div>
                            
                        <div class='row'>
                        </div>                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                <label>Comments</label>
                                <textarea class="form-control" name="comments" rows="2">
                                    <?php echo $result['comments'] ?>
                                </textarea>
                                </div>
                            </div>
                        </div>                    
                        <button type="submit" class="btn btn-default" value="Save">Update</button>
                    </form>

                    </div>
                </div>
            </div>

