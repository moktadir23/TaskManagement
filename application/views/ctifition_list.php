
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              Employee Career Certification List
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
            <form action="<?php echo base_url('index.php/nmc_c/crtfition_list/'); ?>" name="search_by_zone" id="search_by_zone" method="POST">
                <div class="row">
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Vendor <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="vdor" id="vdor">
                                <option value="0" >ALL Vendor</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Department <div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="dept" id="dept">
                                <option value="0" >All Department</option>
                            </select>
                        </div>
                    </div>
                     <div class="col-lg-3">
                       &nbsp;<br>
                       <button  type="submit" class="btn btn-default" value="save">Search</button>
                    </div> 
                    
                </div>
                
<!--                <div class="row">
                    <div class="col-lg-3">
                       &nbsp;<br>
                       <button disabled="disabled" type="submit" class="btn btn-default" value="save">Search</button>
                    </div> 
                </div>    -->
                
            </form>  
            <br><br>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Department</th>
                            <th>Employee Name (ID)</th>
                            <th>Vendor</th>
                            <th>Certification</th>
                            <th>Certification ID</th>
                            <th>Level</th> 
                            <th>Exam Name</th>
                            <th>Exam Number</th>
                            <th>Certification Date</th>
                            <th>Valid Through</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>                       
<?php
//      echo '<pre>';
//      print_r($results);
$total=0;
  foreach ($res_crtification as $value) {  
   $total++;
?>  
                            <tr> 
                                <td><?php echo $value['dept']; ?></td>
                                <td><?php echo $value['crt_name'].'( '.$value['crat_id'].' )'; ?></td>
                                <td><?php echo $value['vdor']; ?></td>
                                <td><?php echo $value['ctftion_name']; ?></td>
                                <td><?php echo $value['ctftion_id']; ?></td>
                                <td><?php echo $value['levl']; ?></td>
                                <td><?php echo $value['e_nam']; ?></td>
                                <td><?php echo $value['ex_nbr']; ?></td> 
                                <td><?php echo $value['ctfition_dat']; ?></td> 
                                <td><?php echo $vlid_dat=$value['vlid_dat']; ?></td> 
                                
                                    <?php
                                       $todate=date("Y-m-d");
                                       $curdate=strtotime($todate);
                                       $citification_expir=strtotime($vlid_dat);
//                                       echo $curdate.'....'.$mydate.'<br>';
                                      if($curdate > $citification_expir)
                                      { ?>
                                            <td> <font color="red">Expired</font></td> 
                                       <?php }else { ?>
                                              <td><font color="green"> ACTIVE</font> </td> 
                                       <?php } ?>    
                               
                            </tr>    
<?php } ?>
                              
                    </tbody>
                    <div class="col-lg-10">
<?php 
    echo '<b>Total Number : </b>'.$total;
?>                        
                    </div>
                <div class="col-lg-2">
                    <button type="button"  class="btn btn-success"  onclick="location.href = '<?php echo base_url(); ?>index.php/nmc_c/export_ecertificate_report/'">Export Excel</button> <br> <br>
                </div> 
                </table>
                
            </div>
        </div>
    </div>
</div>


<?php
echo "<script type=\"text/javascript\">";
//echo '<pre>';
//print_r($employee_name);

foreach ($cat_result as $value) {
    echo "var x = document.getElementById(" . $value['Select_Name'] . ");";
    echo "var option = document.createElement(\"option\");";
    echo "option.text =" . $value['CateGory_Description'] . ";";
    echo "option.value =" . $value['D_Value'] . ";";
    echo "x.add(option,x[" . $value['Indexx'] . "]);";
}
echo "</script>";
?>

<script src="../../js/jquery.min.js" type="text/javascript"></script>



