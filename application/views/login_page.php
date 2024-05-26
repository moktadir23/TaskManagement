<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Link3</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="login-page-body">

    <div id="wrapper">

        <!-- Navigation -->
<!--        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
             Brand and toggle get grouped for better mobile display 
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">Link3 Technologies Ltd</a>
            </div>
             Top Menu Items 
            
             Sidebar Menu Items - These collapse to the responsive navigation menu on small screens 
            <div class="collapse navbar-collapse navbar-ex1-collapse">                
            </div>
             /.navbar-collapse 
        </nav>-->
        
        <!--<br><br>-->
        <!--<div id="page-wrapper">-->
            
           <div class="container-fluid">
                <!-- Page Heading -->
                
                <div class="row">
                    <div class="col-lg-4"></div>
                    
                    <div class="col-lg-4" id="login-page-wrapper">
    <?php
    $message=$this->session->userdata('message');
    if(isset($message))
    {
        echo $message;
        $this->session->unset_userdata('message');
    }
    ?>
                        <h1 class="page-header" style="text-align: center;">
                           ACTIVITY LOGIN <small></small>
                        </h1>
                        
                        <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                        <form method="POST"  action="<?php echo base_url()?>index.php/admin/login_functation_check">
                            <div class="form-group">
                              <label for="exampleInputEmail1">USER ID</label>
                              <!--<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">-->
                              <input type="" id="id" class="form-control" onkeyup="check_id();" name="id" placeholder="User Id" required="" autofocus="">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Password</label>
<!--                              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">-->
                              <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="">
                            </div>
                           <button type="submit" value="Login"  class="btn btn-default">Sign In</button>
                           
                          <b style="color: #ffffff;"> <a href="<?php echo base_url(); ?>index.php/admin/registration.html"> Need to Register </a></b>
                         
                        </form>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                    
                    
<!--                    <a class="btn btn-default" href="<?php echo base_url(); ?>index.php/admin/registration" role="button">Registration</a>
                   <a href="<?php echo base_url(); ?>index.php/welcome">  Test page</a>-->
                </div>
                  <div class="col-lg-4"></div>
            </div>
                
        <!-- /#page-wrapper -->
    </div> 
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url(); ?>js/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>js/plugins/morris/morris.min.js"></script>
    <script src="<?php echo base_url(); ?>js/plugins/morris/morris-data.js"></script>
    <script type="text/javascript">
    function check_id(){      
    var id = document.getElementById("id").value;
    var UperCase_id= id.toUpperCase();
    document.getElementById("id").value = UperCase_id;
//            mac_frmt();
}  
    </script>    
</body>

</html>
