

<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->
<script>
    var submit_or_not = 0;
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
              Search Done Task by CTID Number/SR Number
            </h3>
            <ol class="breadcrumb">
                <!--<div class="col-lg-4"></div>-->
                <h3 class="text-center"><span id="info_span"></span></h3>
             
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
<div class="row">
    <form action="<?php echo base_url('index.php/welcome/search_cs_done_task_by_CTID_SR/'); ?>" name="search_by_zone" id="search_by_zone" method="POST">
        <div class="col-lg-3" style="">
            <div class="form-group">
                <label>CTID Number/SR : <div style="color:red;float: right;">*</div></label>
                <input class="form-control" name="CTID_Number_SR" id="CTID_Number_SR" placeholder="Enter CTID Number/SR Number" required="">                       
            </div>
        </div>
        <div class="col-lg-3">
            <label>From Date</label>
            <input type="" name="date_from" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="start_date_id" class="form-control" placeholder="Enter from Date" required=""/>
        </div>
        <div class="col-lg-3">
            <label>To Date</label>
            <input type="" name="date_to" readonly="readonly" value="<?php  echo date("d-m-Y");?>" id="end_date_id" class="form-control" placeholder="Enter To Date" required=""/>
        </div>
        
        
        <div class="col-lg-3"><br>
             <button type="submit" class="btn btn-default" value="save">Search</button>
<!--            &nbsp;<button type="button" class="btn btn-primary" onclick="location.href = '#'" /> Search </button>
            <button type="button" class="btn btn-primary" onclick="search();" /> Search </button>-->
        </div>
    </form>  
</div>
            
            
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Client ID</th>
                            <th>Client Name</th>
                            <th>Sub Zone</th>
                            <th>Client Category</th>
                            <th>Support Category</th>
                            <th>CTID Number SR</th>
                            <th>Initial Problem Category</th>
                            <th>Engineer Name</th>
                            <th>Start Time</th>                                       
                            <th>CS status of TKI</th>
                            <th>TKI_Status</th>
                            <th>Support_Type</th>
                            <th>Final_Resolution</th>
                            <th>End Date</th>
                            <th>Technician_Name</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
//      echo '<pre>';
//      print_r($pending_list_result);
      
if($pending_list_result != null){
foreach ($pending_list_result as $value) {
    $p_key=$value['p_key'];
    ?>  

                            <tr> 
                                <td><?php echo $value['Client_ID']; ?></td>
                                <td><?php echo $value['Client_Name']; ?></td>
                                <td><?php echo $value['Sub_Zone']; ?></td>
                                <td><?php echo $value['Client_Category']; ?></td>
                                <td><?php echo $value['Support_Category']; ?></td>
                                <td><?php echo $value['CTID_Number_SR']; ?></td>
                                <td><?php echo $value['Initial_Problem_Category']; ?></td>                                
                                <td><?php echo $value['Engineer_Name']; ?></td>                                
                                <td> <?php echo $value['start_date']; ?> </td>
                                <td><?php echo $value['CS_status_of_TKI']; ?></td>
                                <td><?php echo $value['TKI_Status']; ?></td>
                                <td><?php echo $value['Support_Type']; ?></td>
                                <td><?php echo $value['Final_Resolution']; ?></td>
                                <td><?php echo $value['end_date']; ?></td>
                                <td><?php echo $value['Technician_Name']; ?></td>
                                
                                
                                
                                
<?php } ?> 
    <div class="row">
    <div class="col-lg-10"></div>   
    <div class="col-lg-2">
         <button type="button" class="btn btn-success"  onclick="location.href = '<?php echo base_url(); ?>index.php/welcome/createXLS_done_task_by_CTID_Number_SR/<?php echo $value['CTID_Number_SR']; ?>'">Export Excel</button> &nbsp;<br><br>  
       
    </div>                       
</div>

 <?php  }?>
                                
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
    $("form#CS_task_from").submit(function () {
//        validateForm();
//        if (submit_or_not == 1)
//        {
//            exit;
//        }
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/welcome/save_CS_task/'); ?>",
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
                alert('Sussfully Done');
                null_from();
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
    


