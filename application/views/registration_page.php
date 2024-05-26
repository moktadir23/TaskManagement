<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registration</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


<!--<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>      Without refreshing submit from JS   -->
<script src="../../js/jquery-3.1.0.min.js" type="text/javascript"></script>
<script>
   
     document.getElementById("Show_message").style.display="none";
     document.getElementById("error_message").style.display="block";
//$('#Show_message').hide();
//$('#error_message').hide();
$('#Show_message').hide();
 alert("HIDE/ Show");
</script>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
<!--                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>-->
                <a class="navbar-brand" href="index.html">Link3 Technologies Ltd</a>
            </div>
            <!-- Top Menu Items -->
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">                
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <div id="page-wrapper">
           <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <h3 class="page-header">
                            Registration<small>..</small>
                        </h3>
<!--                        <div id="error_message" class="panel panel-danger softhide">            
                            <div class="panel-heading">
                                <h2 id="info_span" class="panel-title"></h2>
                            </div>
                        </div>-->
                        <div class="panel panel-success softhide"  id="Show_message">
                            <div class="panel-heading">
                                <h2 id="save_message" class="panel-title">
<?php
    $message=$this->session->userdata('message');
    if(isset($message))
    {
        echo $message;
        $this->session->unset_userdata('message');
    }
?>                                    
                                </h2>
                            </div> 
                        </div>
                        
 
                         <form method="POST" action="<?php echo base_url(); ?>index.php/admin/save_user" id="registration_form" name="registration_form" enctype="multipart/form-data">
                          
                            <div class="form-group">
                                <label>ID <div style="color:red;float: right;">*</div></label>
                                <input type="text" name="id" id="id" class="form-control" placeholder="Enter Your ID" required=""/>
                            </div>
                            <div class="form-group">
                                <label>Name <div style="color:red;float: right;">*</div></label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name" required=""/>   
                            </div>
                             
                            <div class="form-group">
                                <label>Email address <div style="color:red;float: right;">*</div></label>
                                <input type="email" name="email" id="email" class="form-control"  placeholder="Email" required="">
                            </div>
                            <div class="form-group">
                                <label>Password <div style="color:red;float: right;">*</div> </label>
                                (Note: Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.)
                                <input type="password" name="password" id="password" class="form-control"  placeholder="Password" required="">
                            </div>
                             <div class="form-group">
                                <label>Mobile Number <div style="color:red;float: right;">*</div></label>
                                <input type="text" name="mobile_munber" id="mobile_munber" class="form-control" placeholder="Enter Your Mobile Number" required=""/>   
                            </div>
                             <div class="form-group">
                                <label>IP Phone Number <div style="color:red;float: right;"></div></label>
                                <input type="text" name="ip_phone" id="ip_phone" class="form-control" placeholder="Enter Your IP Phone"/>   
                            </div>
                             <div class="form-group">
                                <label>Designation <div style="color:red;float: right;">*</div></label>
                                <input type="text" name="Designation" id="Designation" class="form-control" placeholder="Enter Your Designation" required=""/>   
                            </div>
                             <div class="form-group">
                                <label>Blood Group <div style="color:red;float: right;">*</div></label>
                                <select name="blood_group" id="blood_group" class="form-control pointer required" required="">
                                    <option value="">--- Select Blood Group ---</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Department <div style="color:red;float: right;">*</div></label>
                                <select name="department" id="department" class="form-control pointer required" required="">
                                    <option value="">--- Select Department ---</option>
                                    <option value="Bank_NBFI">Bank & NBFI</option>
                                    <option value="CS">CS</option>
                                    <option value="Corporate">Corporate</option>
                                    <option value="ctg_mkt">CTG Marketing</option>
                                    <option value="ERT">ERT</option>
                                    <option value="FI">FI</option>
                                    <option value="FONOC">FONOC</option>
                                    <option value="IPTS">IPTS</option>
                                    <option value="HD">HD</option>
                                    <option value="NOC">NOC</option>
                                    <option value="NMC">NMC</option>
                                    <option value="POWER">POWER</option>
                                    <option value="SD">SD</option>
                                    <option value="VPN">VPN</option>
                                     <option value="Strategic">Strategic</option>
                                    <option value="Wireless_Infra">Wireless Infrasturcture</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Zone <div style="color:red;float: right;">*</div></label>
                                <select class="form-control" name="Zone" id="Zone" required="">
                                    <option value="0">--- Select Zone ---</option>
                                    <option value="Bogura">Bogura</option>
                                    <option value="CTG">CTG </option> 
                                    <option value="Dhaka">Dhaka</option>   
                                    <option value="Khulna">Khulna</option>                                   
                                    <option value="Sylhet">Sylhet</option> 
                                </select>
                            </div>
                             <div class="form-group">
                                <label>Support Office <div style="color:red;float: right;">*</div></label>
                                <select class="form-control" name="Sub_Zone" id="Sub_Zone" required="">
                                    <option value="0">--- Select Support Office ---</option> 
                                </select>
                            </div>
                            <br>

                            
                            <button type="submit" value="save"  class="btn btn-default">Submit</button> &nbsp; 
                            <b> <a href="<?php echo base_url(); ?>index.php/admin/">Back LOGIN </a></b>
                        </form>

                    </div>
                <div class="col-lg-2"></div>
                </div>               
            </div>
        </div>
    </div>

 <script>
    function validateForm(){
        
//        alert("TEST");
   document.getElementById("info_span").innerHTML = "";
        //        $('html,body').scrollTop(0);
           
        
        var id = document.getElementById("id").value;
        if (id == null || id == 0) {
            document.getElementById("info_span").innerHTML = "Please Insert Your ID ";
            $('html,body').scrollTop(0);
            $('#Show_message').hide();
            $('#error_message').show();
            exit();
        }
        var name = document.getElementById("name").value;
        if (name == null || name == 0) {
            document.getElementById("info_span").innerHTML = "Please Insert Your Name ";
            $('html,body').scrollTop(0);
            $('#Show_message').hide();
            $('#error_message').show();
            exit();
        }
        
        
        var email = document.getElementById("email").value;
        if (email == null || email == 0) {
            document.getElementById("info_span").innerHTML = "Please Insert Your Email ";
            $('html,body').scrollTop(0);
            $('#Show_message').hide();
            $('#error_message').show();
            exit();
        }
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (re.test(email) == true) {

            //            alert("YES");
        } else {
            document.getElementById("email").value=null;
            document.getElementById("info_span").innerHTML = "Please Insert Valid Email Address !";
            $('html,body').scrollTop(0);
            $('#Show_message').hide();
            $('#error_message').show();
            exit();
        }
        
        var password = document.getElementById("password").value;
        if (password == null || password == 0) {
            document.getElementById("info_span").innerHTML = "Please Insert Password !";
            $('html,body').scrollTop(0);
            $('#Show_message').hide();
            $('#error_message').show();
            exit();
        }
        var password_length = password.length;
        if (password_length < 8) {
             document.getElementById("password").value=null;
            document.getElementById("info_span").innerHTML = "Please Insert Minimun 8 carater for your Strong password!";
            $('html,body').scrollTop(0);
            $('#Show_message').hide();
            $('#error_message').show();
            exit();
        }
        
        var Designation = document.getElementById("Designation").value;
        if (Designation == null || Designation == 0) {
            document.getElementById("info_span").innerHTML = "Please Insert Your Designation ";
            $('html,body').scrollTop(0);
            $('#Show_message').hide();
            $('#error_message').show();
            exit();
        }
        var department = document.getElementById("department").selectedIndex;
        if (department == null || department == 0) {
            document.getElementById("info_span").innerHTML = "Please Select Department !";
            $('html,body').scrollTop(0);
            $('#Show_message').hide();
            $('#error_message').show();
            exit();
        }
  
 
        
        
    }
    
    
     function SAVE_INFO_FUNCTION() {
//            alert("TEST onclick ..");
            
//        validateForm();
          
//            exit();
        var id = $('#id').val();
        var name = $('#name').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var Designation=$('#Designation').val();
        var department = $('#department').val();
       

//        if (document.getElementById("Check_BOX").checked == true) {
            
            
            $.post("<?php echo base_url(); ?>index.php/admin/save_user", {
                id: id,
                name: name,
                email: email,
                password: password,
                Designation:Designation,
                department: department

            }, function (data) {
                var message_array = JSON.stringify(data);
                var show_message = JSON.parse(message_array);
//        alert(show_message);
//alert(" Onclick SAVE ....."+show_message);
                document.getElementById("id").value = null;
                document.getElementById("name").value = null;
                document.getElementById("email").value = null;
                document.getElementById("password").value = null;
                document.getElementById("Designation").value = null;
                document.getElementById("department").value = null;


                document.getElementById("save_message").innerHTML = show_message;
                $('#Show_message').show();
                $('#error_message').hide();
                $('html,body').scrollTop(0);

            }, 'JSON');

//        } else {
//            document.getElementById("info_span").innerHTML = "Please Cleck Chick Box..!";
//            $('html,body').scrollTop(0);
//
//        }







    }
</script>    

 
<script>
    $(function() {		
            $("#Zone").change(function() {
                    $("#Sub_Zone").load("<?php echo base_url(); ?>CS_sub_zone_list/" + $(this).val() + ".txt");
            });
    });

</script> 
    
    
<script>
//    $("form#registration_form").submit(function () {
//        validateForm();
////        if (submit_or_not == 1)
////        {
//            exit();
////        }
//alert("DONE ...");
//        var formData = new FormData($(this)[0]);
//        $.ajax({
//         
//            url: "<?php // echo base_url('index.php/admin/save_user/'); ?>",
//            type: 'POST',
//            data: formData,
//            async: false,
//            success: function (data) {
//                alert('Sussfully Done');
//                null_from();
////            data = $.parseJSON(data);                                   
////            $('#info_span').append(data.messages);
//            },
//            cache: false,
//            contentType: false,
//            processData: false
//        });
//        return false;
//    }
//      
//    );
</script>    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url(); ?>js/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>js/plugins/morris/morris.min.js"></script>
    <script src="<?php echo base_url(); ?>js/plugins/morris/morris-data.js"></script>

</body>

</html>
