<!--<h1>under construction</h1>-->
<?php
$id = $this->session->userdata('id');
$name = $this->session->userdata('name');
?>
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
               Employee Career Certifications
            </h3>
         
        </div>
    </div>
    <!-- /.row -->
    <div class="row">        
        <div class="col-lg-12">
            <form method="POST" action="<?php echo base_url(); ?>index.php/nmc_c/save_citifition_info" id="registration_form" name="registration_form" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-lg-4"> 
                        <div class="form-group">
                            <label>Vendor <div style="color:red;float: right;">*</div></label>
                            <!--<input type="text" name="vdor"  id="vdor" class="form-control" placeholder="Enter Vendor Name" required=""/>-->
                            <select class="form-control" name="vdor" id="vdor"  required="">
                                <option value="0" >Select Vendor</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Certification Name <div style="color:red;float: right;">*</div></label>
                            <input type="text" name="ctftion_name"  id="ctftion_name"  class="form-control" placeholder="Enter Certification Name " required=""/>   
                        </div>

                    </div>
                    <div class="col-lg-4"> 
                        <div class="form-group"> 
                            <label>Certification ID <div style="color:red;float: right;">*</div></label>
                            <input type="text" name="ctftion_id" id="ctftion_id" class="form-control"  placeholder="Enter Certification ID" required="">
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-4"> 
                        <div class="form-group">
                            <label>Level <div style="color:red;float: right;">*</div></label>
                              <select class="form-control" name="levl" id="levl"  required="">
                                <option value="0" >Select Level</option>
                            </select>
                            <!--<input type="text" name="levl" id="levl"   class="form-control" placeholder="Enter Level" required=""/>-->   
                        </div>
                    </div>

                    <div class="col-lg-4"> 
                        <div class="form-group">
                            <label>Exam Name <div style="color:red;float: right;">*</div></label>
                            <input type="text" name="e_nam" id="e_nam" class="form-control" placeholder="Enter Exam Name "  required=""/>   
                        </div>
                    </div>
                    <div class="col-lg-4"> 
                        <div class="form-group">
                            <label>Exam Number/Code <div style="color:red;float: right;">*</div></label>
                            <input type="text" name="ex_nbr" id="ex_nbr" class="form-control" placeholder="Enter Exam Number "  required=""/>   
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4"> 
                        <div class="form-group">
                            <label>Certification Date<div style="color:red;float: right;">*</div></label>
                            <input type="" name="ctfition_dat" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="start_date_id" class="form-control" placeholder="Enter from Date" required=""/>
                        </div>
                    </div>
                    <div class="col-lg-4"> 
                        <div class="form-group">
                            <label>Valid Through <div style="color:red;float: right;">*</div></label>
                            <input type="" name="vlid_dat" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="end_date_id" class="form-control" placeholder="Enter To Date" required=""/>
                        </div>
                    </div>
                    <div class="col-lg-4"> <br><br>
                        <button type="submit"  value="save"  class="btn btn-default">SAVE</button> &nbsp; 
                    </div>
                </div>
            </form>


        </div>
    </div>

</div>


</div>


<?php
echo "<script type=\"text/javascript\">";
foreach ($result as $value) {
    echo "var x = document.getElementById(" . $value['Select_Name'] . ");";
    echo "var option = document.createElement(\"option\");";
    echo "option.text =" . $value['CateGory_Description'] . ";";
    echo "option.value =" . $value['D_Value'] . ";";
    echo "x.add(option,x[" . $value['Indexx'] . "]);";
}
echo "</script>";
?>