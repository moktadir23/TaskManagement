<!--<h1>under construction</h1>-->

<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              Change Password
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
//        $message = $this->session->userdata('message');
//        if (isset($message)) {
//            echo $message;
//            $this->session->unset_userdata('message');
//        }
        ?>
        <div class="col-lg-12">
            <form action="" name="change_password_from" id="change_password_from" method="Post">
                
                <div class='row'> 
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Old Password*</label>
                            <input type="password" name="old_pw" id="old_pw" class="form-control" placeholder="Enter Old Password" required=""/>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>New Password*</label>
                            <input type="password" name="new_pw" id="new_pw" class="form-control" placeholder="Enter New Password" required=""/>
                        </div>
                    </div>
<!--                    <div class="col-lg-3">
                        <div class="form-group">
                            <label> Repeat New password* </label>
                                <input type="password" name="repeat_pw" id="repeat_pw" class="form-control" placeholder="Enter Repeat New Password" required=""/>
                        </div>
                    </div>-->
                    
                </div>
                
                                     
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-default" value="save" >Save</button>
            </form>
        </div>
    </div>
</div>

<!--<script>
    function validateForm() {

        document.getElementById("info_span").innerHTML = "";
//    $('html,body').scrollTop(0);

        var x = document.forms["change_password_from"]["new_pw"].value;
        var y = document.forms["change_password_from"]["repeat_pw"].value;
//        if (x == null || x == 0) {
//            document.getElementById("info_span").innerHTML = "Please Provide New Password";
//            submit_or_not = 1;
//            return false;
//        }
//        if (y == null || y == 0) {
//            document.getElementById("info_span").innerHTML = "Please Provide Repeat Password";
//            submit_or_not = 1;
//            return false;
//        }
        if( x==y ){
            
            document.getElementById("info_span").innerHTML = "Please Provide same Password in new and repeat password";
            submit_or_not = 1;
            return false;
        }

    }

    
</script>-->

<script>
function null_from(){
    
      document.forms["change_password_from"]["old_pw"].value = null;
      document.forms["change_password_from"]["new_pw"].value = null; 
      
}
</script>


<script>
    $("form#change_password_from").submit(function () {
        
//         validateForm();
//        if (submit_or_not == 1)
//        {
//            exit;
//        }
 document.getElementById("info_span").innerHTML=null;
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/welcome/creat_new_password/'); ?>",
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
//                alert('Sussfully Change your Password');
            null_from();
//            alert(data);
            data = $.parseJSON(data);                        
            $('#info_span').append(data.messages);
            },
            cache: false,
            contentType: false,
            processData: false
        });
        return false;
    }
      
    );
</script>   
<!--




<script src="../../js/jquery.min.js" type="text/javascript"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>
		$(function() {
		
			$("#type_task").change(function() {
				$("#sub_task").load("<?php echo base_url(); ?>textdata/" + $(this).val() + ".txt");
			});
		});
</script>
-->

