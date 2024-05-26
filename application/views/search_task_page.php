<div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Search Page
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
                        <div>
                           <b> Search your Task</b>
                           <hr>
                        </div>
                        <form action="<?php echo base_url();?>index.php/welcome/search_task_by_id_funcation" method="get">
                            <div class='row'> 
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>ID</label>
                                        <input type="text" name="id" class="form-control" placeholder="Search By ID"/>
                                    </div>
                                </div>
                            </div>
                          </div>                  
                    &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
                        <button type="submit" class="btn btn-default" value="save">
                            Search
                        </button>
                        </form>
                    </div>
                
                
                
                
                
                
                
                
                
                
                </div>
            </div>
