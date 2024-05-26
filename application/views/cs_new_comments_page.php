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
                        
                        <form action="" name="cs_comments_from" id="cs_comments_from" method="">                
                        <!--<form action="<?php echo base_url();?>index.php/welcome/update_new_comments_funcation" method="post">-->
                              <input type="hidden" name="ticket_no" id="ticket_no" class="form-control" value="<?php // echo $result['p_key']; ?>">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                <label>Work Status<div style="color:red;float: right;">*</div></label>
                            
                                <input type="text" readonly=readonly"" name="Work_Status" id="Work_Status" value="Pause" class="form-control">
                               
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                <label>Comments<div style="color:red;float: right;">*</div></label>
                                <?php //  echo $pick_p_key; ?>                               
                                <input type="hidden" name="p_key" id="p_key" class="form-control" value="<?php  echo $pick_p_key->p_key;  ?>">
                                <textarea class="form-control" rows="2" name="comments" id="comments" required=""></textarea>
                                </div>
                            </div>
                        </div>                    
                        <button type="submit" class="btn btn-default" value="Save" id="update_comments">Update Comments</button>
                        <!--<button class="btn btn-default" id="done_task" onclick="done_task_with_comments();" >Done Task</button>-->
                    </form>

                    </div>
                </div>
                
                
                
                
               <br> 
                
                
                
                
                <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <!--<th>Time</th>-->
                                        <th>Comments</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
<?php
//      echo '<pre>';
//      print_r($pick_comments);
   foreach ($pick_comments as $key=>$values)
   {
?>  
                                    
                                    <tr> 
                                         <td><?php echo $values['id']; ?></td>
                                         <td><?php echo $values['comments_date']; ?></td>
                                        
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
    $("form#cs_comments_from").submit(function () {
              
//             alert('cs_comments_from FROM....................');

        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/welcome/CS_update_new_comments/'); ?>",
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
//                alert('successfully Done');
                
                
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