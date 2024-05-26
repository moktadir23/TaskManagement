<script>
$(function() {
$( ".datepicker" ).datepicker();
});
</script>

<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Transfer Task
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
                       <?php
    $message=$this->session->userdata('message');
    if(isset($message))
    {
        echo $message;
        $this->session->unset_userdata('message');
    }
    ?>
                    <div class="col-lg-12">
<!--                        <h3 class="page-header">
                            Forms
                        </h3>-->

                        <form action="<?php echo base_url();?>index.php/welcome/update_task_transfer_funcation" id="task_transfer_form" name="task_transfer_form" method="post">
                              <!--<input type="hidden" name="task_info_id" class="form-control" value="<?php echo $result['task_info_id'] ?>">-->
                               <input type="hidden" class="form-control" name="ticket_no" id="ticket_no" value="<?php echo $result['ticket_no']; ?>">
                          <div class='row'>                           
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Transfer To</label>
                                
                                    <select class="form-control" name="transfer_to" id="transfer_to" onchange="change_sub_items()">
                                        <option value="">Select ID</option>
<!--                                        <option>L3T1181</option>
                                        <option>L3T1111</option>
                                        <option>L3T981</option>
                                        <option>L3T941</option>
                                        <option>L3T685</option>
                                        <option>L3T456</option>-->
                                    </select>
                                </div>
                            </div>
                              
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label> Name <div style="color:red;float: right;"></div> </label>
        <!--                                <input type="text" name="id" class="form-control" placeholder="Enter Your ID"/>-->
                                    <select class="form-control" name="transfer_name" id="transfer_name" >
                                        <option value="">Select Name</option>
                                    </select>
                                </div>
                            </div>
                              
                              
                              
                              
                            <div class="col-lg-4">                                
                                <div class="form-group">
                                    <label>Transfer Date <i class="fa fa-calendar"></i></label>
                                    <input type=""class="form-control" id="start_date_id" name="transfer_date" value="<?php echo date('Y-m-d') ?>" placeholder="DD-MM-YYYY">
                                </div>
                            </div>
                              <div class="col-lg-6">
                        <div class="form-group">
                          <label>Comments <div style="color:red;float: right;">*</div></label>
                            <textarea class="form-control" rows="2" name="comments" id="comments" required=""></textarea>
                        </div>
                    </div> 
                        </div>                        
                        <button type="submit" class="btn btn-default" value="Save">Transfer Button</button>
                    </form>

                    </div>
                   
                </div>
                <!-- /.row -->
            </div>


<?php
echo "<script type=\"text/javascript\">";
foreach ($transfer_id as $value) {
    echo "var x = document.getElementById(" . $value['Select_Name'] . ");";
    echo "var option = document.createElement(\"option\");";
    echo "option.text =" . $value['CateGory_Description'] . ";";
    echo "option.value =" . $value['D_Value'] . ";";
    echo "x.add(option,x[" . $value['Indexx'] . "]);";
}
echo "</script>";
?>

<script>
     function change_sub_items()
    {
        var x = document.forms["task_transfer_form"]["transfer_to"].selectedIndex;
        if (x == 1)
        {
            document.forms["task_transfer_form"]["transfer_name"].selectedIndex = 1;
//    document.forms["Subscriber_Information"]["Category"].selectedIndex = 5;
//	document.getElementById("Billing_Paper").disabled = true;
//	document.forms["Subscriber_Information"]["Plan_Type"].selectedIndex = 1;
//	document.forms["Subscriber_Information"]["ID_Proof"].selectedIndex = 0;
//	document.forms["Subscriber_Information"]["Company_Name"].value = "";
        }
        else if (x == 2) {
            document.forms["task_transfer_form"]["transfer_name"].selectedIndex = 2;
        }
        else if (x == 3) {
            document.forms["task_transfer_form"]["transfer_name"].selectedIndex = 3;
        }
        else if (x == 4) {
            document.forms["task_transfer_form"]["transfer_name"].selectedIndex = 4;
        }
        else if (x == 5) {
            document.forms["task_transfer_form"]["transfer_name"].selectedIndex = 5;
        }
        else if (x == 6) {
            document.forms["task_transfer_form"]["transfer_name"].selectedIndex = 6;
        }
        else if (x == 7) {
            document.forms["task_transfer_form"]["transfer_name"].selectedIndex = 7;
        }
        else if (x == 8) {
            document.forms["task_transfer_form"]["transfer_name"].selectedIndex = 8;
        }
        else if (x == 9) {
            document.forms["task_transfer_form"]["transfer_name"].selectedIndex = 9;
        }
        else if (x == 10) {
            document.forms["task_transfer_form"]["transfer_name"].selectedIndex = 10;
        }
        else if (x == 11) {
            document.forms["task_transfer_form"]["transfer_name"].selectedIndex = 11;
        }
        else if (x == 12) {
            document.forms["task_transfer_form"]["transfer_name"].selectedIndex = 12;
        }
        else if (x == 13) {
            document.forms["task_transfer_form"]["transfer_name"].selectedIndex = 13;
        }
        else if (x == 14) {
            document.forms["task_transfer_form"]["transfer_name"].selectedIndex = 14;
        }
        else if (x == 15) {
            document.forms["task_transfer_form"]["transfer_name"].selectedIndex = 15;
        }
        else if (x == 16) {
            document.forms["task_transfer_form"]["transfer_name"].selectedIndex = 16;
        }
        else if (x == 17) {
            document.forms["task_transfer_form"]["transfer_name"].selectedIndex = 17;
        }
        else if (x == 18) {
            document.forms["task_transfer_form"]["transfer_name"].selectedIndex = 18;
        }
        else if (x == 19) {
            document.forms["task_transfer_form"]["transfer_name"].selectedIndex = 19;
        } else if (x == 20) {
            document.forms["task_transfer_form"]["transfer_name"].selectedIndex = 20;
        } else if (x == 21) {
            document.forms["task_transfer_form"]["transfer_name"].selectedIndex = 21;
        }
        else {
            document.forms["task_transfer_form"]["transfer_name"].selectedIndex = 0;
        }

    }
</script>    