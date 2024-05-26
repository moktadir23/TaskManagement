
<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Search by MIS / MQ ID
                       </h3>
<!--                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Search by type of Task 
                            </li>
                        </ol>-->
                    </div>
                </div>
                <!-- /.row -->
               <div class="row">
                    <div class="col-lg-12">
<!--                        <h3 class="page-header">
                            Forms
                        </h3>-->

                        <form action="<?php echo base_url();?>index.php/welcome/show_data_by_mis_mq_id" method="post">
                          <div class='row'> 
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Search</label>
                                    <input class="form-control" name="mis_mq_ticket_id" placeholder="Enter MIS/MQ ID ">
                                </div>
                            </div>
                         <div class="col-lg-3">
                                <div class="form-group">
<!--                                    <label>Search</label>
                                    <input class="form-control" name="mis_mq_ticket_id" placeholder="Enter MIS/MQ ID ">-->
                                <br><button type="submit" class="btn btn-default" value="save">Search</button>
                                </div>
                            </div>
                          </div>   
<!--                            <div class="row">
                                <div class="col-lg-3">
                            <button type="submit" class="btn btn-default" value="save">Search</button>
                                </div>
                            </div>-->
                            </form>
<br>



<div class="row">
    <div class="col-lg-12">
<div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                       <th>ID (Name)</th>
                                        <th>Priority Type</th>
                                        <th>Type Task</th>
                                        <th>Sub Task</th>
                                        <th>Assign By</th>
                                        <th>MQ/MIS ID</th>
                                        <th>Client/BTS/Provider Name</th>
                                        <th>Start Date</th>                                      
                                        <th>End Date</th>                                        
<!--                                        <th>Status</th>
                                        <th>Comments</th> -->
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
                    </div>
                   
                   
                </div>
            </div>
