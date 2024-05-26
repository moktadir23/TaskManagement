
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              Distributor information search by Date
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
            <form action="<?php echo base_url('index.php/ert_controller/ERT_distributor/'); ?>" name="search_by_zone" id="search_by_zone" method="POST">
               
                <div class="row">
                     <div class="col-lg-3">
                        <label>From Date</label>
                        <input type="" name="date_from" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="start_date_id" class="form-control" placeholder="Enter from Date" required=""/>
                    </div>
                     <div class="col-lg-3">
                        <label>To Date</label>
                        <input type="" name="date_to" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="end_date_id" class="form-control" placeholder="Enter To Date" required=""/>
                    </div>
                    <div class="col-lg-3">
                       &nbsp;<br>
                        <button type="submit" class="btn btn-default" value="save">Search</button>
                    </div> 
                </div>
            </form>  
            <br><br>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Distributor Name</th>
                            <th>Re-Active</th>
                            <th>Collected</th>
                            <th>Device Lost </th>  
                            
                        </tr>
                    </thead>
                    <tbody>
<?php
 $Active=0;   
 $Collected=0;  
 $Device_lost=0;  
 $total_Collected=0;
if($done_list_result != null){
//    echo '<pre>';
//    print_r($pending_list_result); 
foreach ($done_list_result as $value) {
    $p_key=$value['p_key'];
    ?>  

                        <tr> 
                               
                                <td><?php echo $value['Distributor']; ?></td>
                                <td><?php echo $value['Active']; ?></td>
                                <td>
                                    <?php 
                                    echo $Collected=$value['Collected'];
                                    $total_Collected=$total_Collected+$Collected;
                                    ?>
                                </td>
                                <td><?php echo $value['Device_lost']; ?></td>
                                
                             
                                
                             

                                
<!--                                <td>
                                    <a href="<?php echo base_url(); ?>index.php/welcome/CS_edit_task/<?php // echo $value['p_key']; ?>"><button>Edit</button></a> &nbsp;
                                    <a href="<?php echo base_url(); ?>index.php/ert_controller/ERT_new_comments/<?php echo $value['p_key']; ?>"><button>UPDATE</button></a> &nbsp;
                                    <a href="<?php echo base_url(); ?>index.php/welcome/cs_pending_task/<?php echo $value['p_key']; ?>"><button>Done Task </button></a> &nbsp; 
                                    <a href="<?php echo base_url(); ?>index.php/welcome/cs_task_transfer_funcation/<?php echo $value['p_key']; ?>" onclick="return check_transfer();"><button>Transfer Task</button> </a>
                                </td>-->
                            </tr>
                                
                                
                                
<?php }  ?>
                           
                            
 <?php
 echo '<b>Collected Number : </b>'.$total_Collected.'<br>';
// echo '<b>Collected Number : </b>'.$Collected.'<br>';
// echo '<b>NO Device Found Number : </b>'.$Device_lost.'<br>';
 
}
 ?> 
                                
                    </tbody>
                </table>
                <div class="col-lg-5"></div>
                <div class="col-lg-5">
<?php // echo $links; ?>
                </div>
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
<script>
    $(function() {		
            $("#Sub_Zone").change(function() {
                    $("#Distributor").load("<?php echo base_url(); ?>ert_Distributor_list/" + $(this).val() + ".txt");
            });
    });
</script>

<script src="../../js/jquery.min.js" type="text/javascript"></script>

  

<script type="text/javascript">
function pick_engineer_id(){

    var Engineer_Name = $('#Engineer_Name').val();
//        alert('TEST'+Engineer_Name);
        $.post('<?php echo base_url();?>index.php/welcome/pick_engineer_id', {
            Engineer_Name: Engineer_Name
        }, function (search_info_data) {

            var search_array = JSON.stringify(search_info_data);
            var new_search_array = JSON.parse(search_array);
//                alert("Search Engineer_ID...."+new_search_array["Engineer_ID"]);
                document.getElementById("Engineer_ID").innerHTML=null;
                document.getElementById("Engineer_ID").value=null;
                select = document.getElementById("Engineer_ID");
                var opt = document.createElement('option');
                opt.value = new_search_array["Engineer_ID"];
                opt.innerHTML = new_search_array["Engineer_ID"];
                select.appendChild(opt); 

        }, 'JSON');

}
</script> 
<script>
    $(function() {		
            $("#Zone").change(function() {
                    $("#Sub_Zone").load("<?php echo base_url(); ?>CS_sub_zone_list/" + $(this).val() + ".txt");
            });
    });
</script>

