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
                        <!--<form action="<?php echo base_url();?>index.php/welcome/update_new_comments_funcation" method="post">-->
                              <input type="hidden" name="ticket_no" id="ticket_no" class="form-control" value="<?php echo $result['ticket_no']; ?>">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                <label>Comments<div style="color:red;float: right;">*</div></label>
                                 <textarea class="form-control" rows="2" name="comments" id="comments" required=""></textarea>
                                </div>
                            </div>
                        </div> 
                       <div class="row">  
                           
                         <button type="button" class="btn btn-info" onclick="location.href = '<?php echo base_url(); ?>index.php/welcome/pending_data_by_id'">Back</button>  
                        <!--<button type="button" class="btn btn-default" name="back_pending_list" id="back_pending_list" onclick="back_pending_list()" >Back</button> &nbsp;&nbsp;&nbsp;-->  
                        <button type="submit" class="btn btn-default" value="Save" id="update_comments">Update Comments</button> 
                         <input type="checkbox" name="chk" id="chk" > Comments with Done Task
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
                                        <!--<th>Date</th>-->
                                        <th>Date Time</th>
                                        <th>Comments</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
<?php
//      echo '<pre>';
//      print_r($result1);
//   foreach ($result as $values)
   foreach ($result1 as $key=>$values)
   {
?>  
                                    
                                    <tr> 
                                         <td><?php echo $values['id']; ?></td>
                                         <!--<td><?php echo $values['comments_date']; ?></td>-->
                                         <td><?php echo $values['comments_time']; ?></td>
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
//    function validateForm() {
//
//        document.getElementById("info_span").innerHTML = "";
////    $('html,body').scrollTop(0);
//
//        var x = document.forms["comments_from"]["ticket_no"].value;
//        if (x == null || x == 0) {
//            document.getElementById("info_span").innerHTML = "Please Comments";
//            submit_or_not = 1;
//        }
//        
//         var x = document.forms["comments_from"]["comments"].value;
//        if (x == null || x == 0) {
//            document.getElementById("info_span").innerHTML = "Please Comments in textBox";
//            submit_or_not = 1;
//        }
//    }


</script>

<script>
    $("form#comments_from").submit(function () {
        
        
        
        
//             alert('Sussfully FROM....................');
        
//        validateForm();
//        if (submit_or_not == 1)
//        {
//            exit;
//        }
// var done_task_value = document.getElementById("done_task").value;
// 
// if(done_task_value==1){
// alert("Done"+done_task_value);    
// }else{
//  alert("Comments");   
// }
// exit();
//document.getElementsId('chk').checked;
var formData = new FormData($(this)[0]);
if ( document.getElementById("chk").checked == true ) {
//    alert("YES"); 
    $.ajax({
            url: "<?php echo base_url('index.php/welcome/done_task_with_comments_funcation/'); ?>",
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
//                alert(data);
                alert('Task Done successfully');
                
                
//                data = $.parseJSON(data);
//                $('#info_span').append(data.messages);
//            data = $.parseJSON(data);                                   
//            $('#info_span').append(data.messages);
            },
            cache: false,
            contentType: false,
            processData: false
        });
        
        
      
     document.getElementById("update_comments").disabled = true;
        
        
}else{
//    alert("NO"); 
//    var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/welcome/update_new_comments_funcation/'); ?>",
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
                alert('Comments Save Successfully');
                
                
                data = $.parseJSON(data);
                $('#info_span').append(data.messages);
//            data = $.parseJSON(data);                                   
//            $('#info_span').append(data.messages);
            },
            cache: false,
            contentType: false,
            processData: false
        });
}

//exit();
//        var formData = new FormData($(this)[0]);
//        $.ajax({
//            url: "<?php echo base_url('index.php/welcome/update_new_comments_funcation/'); ?>",
//            type: 'POST',
//            data: formData,
//            async: false,
//            success: function (data) {
//                alert('Comments Save Successfully');
//                
//                
//                data = $.parseJSON(data);
//                $('#info_span').append(data.messages);
////            data = $.parseJSON(data);                                   
////            $('#info_span').append(data.messages);
//            },
//            cache: false,
//            contentType: false,
//            processData: false
//        });
        
        
        
        
        
        
        return false;
        
    });
    
</script>

<script type="text/javascript">
//    
      function back_pending_list(){

//  var formData1 = new FormData($(this)[0]);
  alert(" back_pending_list ");
//  exit();
  
//  var test = 'TEst';
  
//  $.ajax({
//            url: "<?php echo base_url('index.php/welcome/done_task_with_comments_funcation/'); ?>",
//            type: 'POST',
//            data: null,
//            async: false,
//            success: function (data) {
//                alert('Task Done successfully');
//                
//                
////                data = $.parseJSON(data);
////                $('#info_span').append(data.messages);
////            data = $.parseJSON(data);                                   
////            $('#info_span').append(data.messages);
//            },
//            cache: false,
//            contentType: false,
//            processData: false
//        });
//        return false;

    }
    
</script>    