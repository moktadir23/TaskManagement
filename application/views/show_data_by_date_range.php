<div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           NOC Search Done by Date Range
                        </h1>
                            
<!--                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Search by Date Range
                                
                            </li>
                        </ol>-->
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <form action="<?php echo base_url();?>index.php/welcome/select_by_date_range" method="post" >
                            <div class="row">
                                <div class="col-lg-3">
                                    <label>From Date</label>
                                    <input type="" name="date_from" id="start_date_id" class="form-control" placeholder="Enter from Date"/>
                                </div>
                                <div class="col-lg-3">
                                    <label>To Date</label>
                                    <input type="" name="date_to" id="end_date_id" class="form-control" placeholder="Enter To Date"/>
                                </div>
                                <div class="col-lg-3">
<!--                                    <label>To Date</label>
                                    <input type="" name="date_to" id="end_date_id" class="form-control" placeholder="Enter To Date"/>-->
                              <br><button type="submit" class="btn btn-default" value="save">Search</button>
                                </div>
                            </div>
                            </br>
<!--                            <div class="row">
                                <div class="col-lg-3">
                                    <button type="submit" class="btn btn-default" value="save">Search</button>
                             </div>
                            </div>-->
                        </form>
                        <div class="row">
                            <div class="col-lg-4" style="">
                               
                            </div>
                            <div class="col-lg-6">
<!--                                <h2>Daily Report List</h2>-->
<br>
                            </div>
                            <div class="col-lg-3">
                               
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID (Name)</th>
                                        <th>Priority Type</th>
                                        <th>Type Task</th>
                                        <th>Sub-Task</th>
                                        <th>Assign By</th>
                                        <th>MIS / MQ ticket id</th>
                                        <th>Client / BTS / Provider Name</th>
                                       
                                        <th>Start Date</th>
                                      
                                        <th>End Date</th>
<!--                                        <th>Action</th>-->
                                    </tr>
                                </thead>
                                <tbody>                                  
                              


                                    
  <?php
                    if (isset($result_display)) {
                        echo "<p><u>Result</u></p>";
                        if ($result_display == 'No record found !') {
                            echo $result_display;
                        } else {
                               foreach ($result_display as $value) {
                                echo '<tr>' 
                                            . '<td class="e_id">' . $value->id .'('.$value->name. ') </td>' 
                                            .'<td>' . $value->priority_type . '</td>'
                                            .'<td>' . $value->type_task . '</td>' 
                                            .'<td>' . $value->sub_task . '</td>'
                                            .'<td>' . $value->assign_by . '</td>'
                                            .'<td>' . $value->mis_mq_ticket_id . '</td>'
                                            .'<td>' . $value->client_bts_provider_name . '</td>'
                                            . '<td>' . $value->start_date . '</td>'
                                            . '<td>' . $value->end_date . '</td>'
                               .  '<tr/>';
                                }
                            echo '</table>';
                        }
                    }
                    ?>                                   
                                    
                                    
                                    
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
                <!-- /.row -->

                
                <!-- /.row -->

                
                <!-- /.row -->

            </div>