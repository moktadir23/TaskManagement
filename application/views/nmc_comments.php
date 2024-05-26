<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->

<div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                           Comments Page
                        </h3>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="#">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Comments Page &nbsp;Time: <?php echo date('H:i:s'); ?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
               <div class="row">
                    <div class="col-lg-12">
                        
                        <form action="" name="comments_from" id="comments_from" method="">                
<?php 
foreach ($result as $key=>$values)
{
$tki=$values['tki'];
}
?>
                              <input type="hidden" name="tki" id="tki" class="form-control" value="<?php  echo $tki; ?>">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                <label>Comments<div style="color:red;float: right;">*</div></label>
                                 <textarea class="form-control" rows="2" name="comments" id="comments" required=""></textarea>
                                </div>
                            </div>
                        </div> 
                       <div class="row">  
                           
                         <button type="button" class="btn btn-info" onclick="location.href = '<?php echo base_url(); ?>index.php/nmc_c/pending_list'">Back</button>  
                        <!--<button type="button" class="btn btn-default" name="back_pending_list" id="back_pending_list" onclick="back_pending_list()" >Back</button> &nbsp;&nbsp;&nbsp;-->  
                        <button type="submit" class="btn btn-default" value="Save" id="update_comments">Update Comments</button> 
                         <!--<input type="checkbox" name="chk" id="chk" > Comments with Done Task-->
                         <!--<button type="submit" class="btn btn-default" id="done_task" onclick="done_task_with_comments()" >Done Task</button>-->
                    </form>
                        
                        <!--<a onclick="done_task_with_comments()" >test</a>-->
</div>     
</div>
                </div>
                
                
                
                
               <br> 
                
                
                
                
                <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date Time</th>
                                        <th>Comments</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
<?php
//      echo '<pre>';
//      print_r($result);
//   foreach ($result as $values)
   foreach ($result as $key=>$values)
   {
       $tki=$values['tki'];
?>  
                                    
                                    <tr> 
                                         <td><?php echo $values['create_id']; ?></td>
                                         <td><?php echo $values['create_time']; ?></td>
                                         <td><?php echo $values['comments']; ?></td>  
                                    </tr>
<?php
    }
?>
                                    <tr><td id='info_span'></td></tr>
                                </tbody>
                            </table>
                            </div> 
            </div>

<script>
    $("form#comments_from").submit(function () {
  
var formData = new FormData($(this)[0]);
//    alert("NO"); 
//    var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/nmc_c/update_nmc_comments/'); ?>",
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
                
//                alert('Comments Save Successfully');
                
                
                data = $.parseJSON(data);
                $('#info_span').append(data.messages);
//            data = $.parseJSON(data);                                   
//            $('#info_span').append(data.messages);
            },
            cache: false,
            contentType: false,
            processData: false
        });

        
        return false;
        
    });
    
</script>
