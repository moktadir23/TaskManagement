<!--<h1>under construction</h1>-->
<?php
$id = $this->session->userdata('id');
$name= $this->session->userdata('name');
$department= $this->session->userdata('department');
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
               Follow UP From ( <?php echo $department;?> Team)
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
            <form action="" name="assign_task_from" id="assign_task_from" method="">
                <input type="hidden" name="hidden_id" value="<?php echo $id;?>" id="hidden_id">
                <input type="hidden" name="p_key" id="p_key" value="<?php  echo $pick_p_key->p_key;  ?>">
               
                
                <div class="row">
                 <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>Next Follow Up Date<div style="color:red;float: right;"></div> <i class="fa fa-calendar"></i></label>                                  
                            <input  class="form-control" onchange="chk_date();" readonly=""  id="start_date_id"  name="start_date_id"  placeholder="DD-MM-YYYY" >
                        </div>
                    </div>
                    
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Status <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="status" id="status" onchange="chk_follow_up()" required="">
                                <option value="" >Select Status</option>
                            </select>
                        </div>
                    </div>
                    
                     <div class="col-lg-6">
                        <div class="form-group">
                          <label>Remarks <div style="color:red;float: right;">*</div></label>
                            <textarea class="form-control" rows="2" name="remarks" id="remarks" required=""></textarea>
                        </div>
                    </div>
                    
                    
                </div>  
 
                <div class="row">
                    
                    
                    <div class="col-lg-3">
                        <div class="form-group"><br>
<!--                          <label/label>
                            <textarea class="form-control" rows="2" name="comments" id="comments"></textarea>-->
                        <button type="submit" class="btn btn-default" value="save" >Update</button>
                        </div>
                    </div> 
                </div>
                <!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                <!--<button type="submit" class="btn btn-default" value="save" >Save</button>-->
            </form>
            
            
            
             <h3>History</h3>        
        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Comments</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
<?php
//      echo '<pre>';
//      print_r($pick_comments);
   foreach ($pick_Comments as $key=>$values)
   {
?>  
                                    
                                    <tr> 
                                         <td><?php echo $values['crt_id']; ?></td>
                                         <td><?php echo $values['crt_date']; ?></td>
                                         <td><?php echo $values['remarks']; ?></td>  
                                    </tr>
<?php
//$p_key=$values['p_key'];
    }
?>
                                    <tr><td id='info_span'></td></tr>
                                </tbody>
                            </table>
                            </div>
        </div>
    </div>
</div>

<!-- <script src="http://cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js" type="text/javascript"></script>
 <script>
    webshims.setOptions('forms-ext', {types: 'date'});
    webshims.polyfill('forms forms-ext');

</script>-->
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
function null_from(){
    
      document.forms["assign_task_from"]["otc"].value = null;
      document.forms["assign_task_from"]["mrc"].value = null;
      document.forms["assign_task_from"]["Client_Name"].value= null;
      document.forms["assign_task_from"]["L3_service"].selectedIndex=0;
      document.forms["assign_task_from"]["start_date_id"].selectedIndex=<?php echo date("d-m-Y");?>;
      
}
</script>

<script>
    $("form#assign_task_from").submit(function () {
       
//        alert("WORK ON PAGE .TRY AGAIN FEW MINUTE LATER");
//        exit();

        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/corporate_c/save_bank_follow_up_info/'); ?>",
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
                alert('Successfully Done');
                null_from();
//                
//                
//            data = $.parseJSON(data);                                   
//            $('#info_span').append(data.messages);
            },
            cache: false,
            contentType: false,
            processData: false
        });
        return false;
    }
      
    );
</script>




<script src="../../js/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
    function chk_follow_up(){
         document.getElementById("info_span").innerHTML = "";
         var x = document.forms["assign_task_from"]["start_date_id"].value;
         var status = document.forms["assign_task_from"]["status"].value;
//         Done
         if(status=='Sales Close' || status=='Done'){
           
        }else{
             if (x == null || x == "") {
                document.getElementById("info_span").innerHTML = "Please Select Follow UP Date";
                document.getElementById("status").selectedIndex = 0;
                exit();
            }
            
        }

    }
    
</script>    