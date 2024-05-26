<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Task Transfer Forms
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-exchange"></i>  Task Transfer form
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                   <div class="col-lg-12">
                       <form action="<?php echo base_url();?>index.php/welcome/task_transfer_info_save" method="post">
                          <div class='row'>
                            <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Transfer from</label>
                                                        <input class="form-control" name="id" placeholder="Enter Your ID ">
                                                    </div>
                            </div>
                            <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Transfer To</label>
                                                        <input class="form-control" name="receiver_id" placeholder="Enter Receiver ID">
                                                    </div>
                            </div>
                          </div>

                        <div class='row'>
                        <div class="col-lg-4">
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
                            <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Transfer Date <i class="fa fa-calendar"></i></label>
                                                        <input class="form-control fa fa-calendar" id="dpd1" name="transfer_date" placeholder="Enter End Date">                               
                                                    </div>
                            </div>
                            <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>End Date <i class="fa fa-calendar"></i></label>
                                                        <input class="form-control fa fa-calendar" id="dpd2" name="end_date" placeholder="Enter End Date">                               
                                                    </div>
                            </div>


                        </div>  

                            <div class="row">
                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Comments</label>
                                                        <textarea class="form-control" rows="3" name="transfer_comment"></textarea>
                                                    </div>
                                </div>
                            </div>




                                                    <button type="submit" class="btn btn-default">Submit Button</button>


                                                </form>

                    </div>
                   
                </div>
                <!-- /.row -->

            </div>