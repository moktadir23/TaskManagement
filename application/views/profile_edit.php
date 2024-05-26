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
    
    
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
               Profile
            </h3>
             <ol class="breadcrumb">
                <h3 class="text-center">
                    <?php 
                     $p_info_session = $this->session->userdata('p_info_session');
                    if($p_info_session=='not_allow'){?>
                    <span id="info_span">Please Update Your Information and Own Image</span>
                    <?php } ?>
                </h3>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <?php
              $file=$pick_result->file_name; 
              if( $file != null ){
            ?>      
                <img src="<?php echo base_url(); ?>css/upload_file/<?php echo $pick_result->file_name; ?>" alt="" width="120" height="140"><br> 
            <?php  }else { ?>
                <img src="<?php echo base_url(); ?>css/upload_file/default.jpg" alt="" width="120" height="140"><br>
            <?php } ?>     
               <br> <b> Click Here => <a data-toggle='modal' data-target='#myModal'><button>Change Photo</button></a></b>
<!--            <div>Format: <b>gif /jpg /png / jpeg </b></div>
            <div>Max Size:<b> 1 MB</b></div>
            <div>Dimensions:<b> 3.5x4.5 cm /<br> 1.38x1.77 inches/ 413x531 pixels</b></div>-->
        </div>
        <div class="col-lg-9">
            <div class="row"><h4>ID : <?php echo $id; ?></h4></div>
            <div class="row"><b>Name : <?php echo $name; ?></b></div>
            <div class="row"><b>Designation : <?php echo $pick_result->Designation; ?></b></div>
            <div class="row"><b>Team : <?php echo $pick_result->department; ?></b></div>
            <div class="row"><b> Zone : <?php echo $pick_result->Zone; ?></b></div>
        </div>
    </div>
    
    
    
    
    
    
    
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
               Edit Profile
            </h3>
           
        </div>
    </div>
    <!-- /.row -->
    <div class="row">        
        <div class="col-lg-12">
            <form method="POST" action="<?php echo base_url(); ?>index.php/nmc_c/update_user_info" id="registration_form" name="registration_form" enctype="multipart/form-data">
                          
                <div class="row">
                    <div class="col-lg-6"> 
                            <div class="form-group">
                                <label>ID <div style="color:red;float: right;">*</div></label>
                                <input type="text" readonly="readonly" name="id" value="<?php echo $id; ?>"  id="id" class="form-control" placeholder="Enter Your ID" required=""/>
                            </div>
                        </div>
                     <div class="col-lg-6">
                            <div class="form-group">
                                <label>Name <div style="color:red;float: right;">*</div></label>
                                <input type="text" name="name" readonly="readonly" id="name"  value="<?php echo $name; ?>" class="form-control" placeholder="Enter Your Name" required=""/>   
                            </div>
                      
                      </div>
                    </div>
                <div class="row">
                    <div class="col-lg-6"> 
                            <div class="form-group"> 
                                <label>Email address <div style="color:red;float: right;">*</div></label>
                                <input type="email" name="email" id="email" value="<?php echo $pick_result->email; ?>" class="form-control"  placeholder="Email" required="">
                            </div>
                        </div>
                     <div class="col-lg-6"> 
                             <div class="form-group">
                                <label>Mobile Number <div style="color:red;float: right;">*</div></label>
                                <input  name="mobile_munber" id="mobile_munber" value="<?php echo $pick_result->mobile_munber; ?>"  class="form-control" placeholder="Enter Your Mobile Number" required=""/>   
                            </div>
                         </div>
                    </div>
                <div class="row">
                    <div class="col-lg-6"> 
                            <div class="form-group">
                                <label>IP Phone Number <div style="color:red;float: right;">*</div></label>
                                <input name="ip_phone" id="ip_phone" value="<?php echo $pick_result->ip_phone; ?>" class="form-control" placeholder="Enter Your IP Phone" required=""/>   
                            </div>
                         </div>
                      <div class="col-lg-6"> 
                             <div class="form-group">
                                <label>Designation <div style="color:red;float: right;">*</div></label>
                                <input name="Designation" id="Designation" value="<?php echo $pick_result->Designation; ?>" class="form-control" placeholder="Enter Your Designation" required=""/>   
                            </div>
                          </div>
                    </div>
                 <div class="row">
                <div class="col-lg-6"> 
                             <div class="form-group">
                                 <label>Blood Group <div style="color:red;float: right;">*</div></label>
                                 <select name="blood_group" id="blood_group" class="form-control" required="">
                                   <?php 
                                    $blood_group=$pick_result->blood_group;
                                    if( $blood_group != null || $blood_group != 0){ 
                                        
                                    ?>
                                        <option value="<?php echo $pick_result->blood_group; ?>" ><?php echo $pick_result->blood_group; ?></option> 
                                  <?php  } else { ?>
                                   
                                   
                                    <option value="">--- Select Blood Group ---</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                  <?php } ?>
                                 </select>
                             </div>
                        </div>
                     <div class="col-lg-6">
                           <br>
                             <button type="submit"  value="save"  class="btn btn-default">UPDATE</button> &nbsp; 
                     </div>
                     
                    </div>
                           
              
                           
                          
                        </form>
            
            
            
            
            
            
            
        </div>
    </div>
 <!--.......................................................................................-->
 
    <div class="row">  
            <div class="row">
                <div class="col-lg-9"> </div>
                <div class="col-lg-3" style="">
                    <b> ADD Certification :</b> &nbsp; 
                    <button type="button" class="btn btn-primary" onclick="location.href = '<?php echo base_url(); ?>index.php/nmc_c/add_ctiftion'" /> Certification </button> &nbsp;
                </div>
               
            </div>


            <div class="row">
                <div class="col-lg-3">
                </div>
                <div class="col-lg-6"></div>
                <div class="col-lg-3"></div>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
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
  foreach ($res_crtification as $value) {  
//   $p_key=$value['p_key'];
    ?>  
                            <tr> 
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
                </table>
                <div class="col-lg-5"></div>
                <div class="col-lg-5">
                </div>
            </div>
        </div>

    </div>
    
    
</div>




<!--.........................................................................................................................-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">   
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Change Image</h4>
            </div>

          <form action="<?php echo base_url(); ?>index.php/hd_controller/change_image_fun/" name="image_change_form" id="image_change_form"  enctype="multipart/form-data" method="POST">
              
                <input type="hidden" name="id" value="<?php echo $id; ?>" id="id">
                <input type="hidden" name="number_of_image_change" value="<?php echo $pick_result->number_of_image_change; ?>" id="number_of_image_change">
                <input type="hidden" name="name" value="<?php echo $name; ?>" id="name">
              
              <div class="modal-body">
                    <span id="info_span"></span>
                    
                    <div class="row">
                    <div class="col-lg-9"> 
                            <div class="form-group">
                                <label> Select Image <div style="color:red;float: right;">*</div></label><br>
                                ( Format: <b>gif /jpg /png / jpeg</b>, Max Size:<b> 1 MB</b>,
                                 Dimensions:<b> 3.5x4.5 cm / 1.38x1.77 inches/ 413x531 pixels</b> )
                                <input type="file" class="form-control"  name="change_image_file" id="change_image_file" onchange="jQuery(this).next('input').val(this.value); chk_file();" required=""/>
                                <input type="hidden" class="form-control" id="C_file" name="C_file"  placeholder="no file selected" readonly="" required=""/>
                                <!--<input type="file" id="upload" name="upload"/>-->  
                            </div>
                         </div>
                      
                    </div>
                    
                </div>
                <div class="modal-footer">
 
                    <div class="row">
                        <div class="col-md-7 col-sm-7"></div>
                        <div class="col-md-5 col-sm-5">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary submitBtn" onclick="change_image()">SUBMIT</button>
                        </div>
                    </div>
                </div>
            </form> 
        </div>      
    </div>
</div>

<!--................................................................................................................................-->


<script type="text/javascript">
    function chk_file(){
       
//      var file = $(this)[0].files[0];
//       alert("TEST : " + file );
       
           if(fileExtValidate(this)) { // file extension validation function
	    	 if(fileSizeValidate(this)) { // file size validation function
	    	 	showImg(this);
                        alert('TEST..');
	    	 }	 
	    }   
       
    }
    
    
    $("#change_image_file").change(function () {
        
	    if(fileExtValidate(this)) { // file extension validation function
	    	 if(fileSizeValidate(this)) { // file size validation function
	    	 	showImg(this);
	    	 }	 
	    }    
    
    });
// function for  validate file extension
var validExt = ".png, .gif, .jpg, .jpeg";

function fileExtValidate(fdata) {
 var filePath = fdata.value;
 var getFileExt = filePath.substring(filePath.lastIndexOf('.') + 1).toLowerCase();
 var pos = validExt.indexOf(getFileExt);
 if(pos < 0) {
 	alert("This file is not allowed, please upload valid file( gif /jpg /png / jpeg ).");
        document.getElementById("change_image_file").value = null; 
 	return false;
  } else {
  	return true;
  }
}
//function for validate file size 
var maxSize = '1024';
function fileSizeValidate(fdata) {
	 if (fdata.files && fdata.files[0]) {
                var fsize = fdata.files[0].size/1024;
                if(fsize > maxSize) {
                    alert('Maximum file size(1 MB) exceed, This file size is: ' + fsize + "KB");
                    document.getElementById("change_image_file").value = null; 
                	 return false;
                } else {
                	return true;
                }
     }
 }
    
</script>    

