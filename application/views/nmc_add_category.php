<!--<h1>under construction</h1>-->
<?php
$id = $this->session->userdata('id');
$name = $this->session->userdata('name');
?>
<script src="../../js/jquery-1.9.1.js" type="text/javascript"></script>   <!--   Without refreshing submit from JS   -->

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
                ADD Category From ( NMC )
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
        <div class="col-lg-12">
            <form action="" name="assign_task_from" id="assign_task_from" method="">
                <input type="hidden" name="hidden_id" value="<?php echo $id; ?>" id="hidden_id">
                <div class="row">
                    <div class="col-lg-3"> 
                        <div class="form-group">
                            <label>Incident Type <div style="color:red;float: right;">*</div></label>
                            <select class="form-control" name="Incident_for" id="Incident_for" onchange="select_name()"  required="">
                                <option value="" >Select Type</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Incident Specification<div style="color:red;float: right;"></div></label>
                            <select class="form-control" name="Specification" id="Specification" required="">
                                <option value="" >Select Specification </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">                            
                        <div class="form-group">
                            <label>Vendor <div style="color:red;float: right;">*</div></label>
                            <!--<input class="form-control" onchange="check_client_id()" name="Client_id" id="Client_id" placeholder="Enter Vendor/Media converter" required="">-->
                            <select class="form-control" name="Vendor" id="Vendor" onchange="pick_Name()" required="">
                                <option value="" >Select Vendor </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">                                
                        <div class="form-group">
                            <label>Site/ POP/ Link Name / Client Name<div style="color:red;float: right;">*</div></label>  
                            <input  class="form-control" name="Name" id="Name" onchange="check_Name();" placeholder="Enter Site/POP Name" required="">

                        </div>
                    </div>   
                </div>  

                <div class="row">   
                    <div class="col-lg-3">
                        <div class="form-group"><br>
                            <!--                          <label/label>
                                                        <textarea class="form-control" rows="2" name="comments" id="comments"></textarea>-->
                            <button type="submit" class="btn btn-default" value="save" >Save</button>
                        </div>
                    </div>     
                </div>    
                <!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                <!--<button type="submit" class="btn btn-default" value="save" >Save</button>-->
            </form>
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
    function null_from() {

        document.forms["assign_task_from"]["type"].selectedIndex = 0;
        document.forms["assign_task_from"]["Specification"].selectedIndex = 0;
        document.forms["assign_task_from"]["Vendor"].selectedIndex = 0;
        document.forms["assign_task_from"]["Name"].value = null;

    }
</script>

<script>
    $("form#assign_task_from").submit(function () {

//        alert("WORK ON PAGE .TRY AGAIN FEW MINUTE LATER");
//        exit();



        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "<?php echo base_url('index.php/nmc_c/nmc_add_ctgry/'); ?>",
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
                alert('Successfully Save');
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
 <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->
<!--<script>
                $(function() {
                
                        $("#type_task").change(function() {
                                $("#sub_task").load("<?php echo base_url(); ?>textdata/" + $(this).val() + ".txt");
                        });
                });
</script>-->

<script>
    $(function () {
        $("#Incident_for").change(function () {
            $("#Specification").load("<?php echo base_url(); ?>NMC_Incident_Specification/" + $(this).val() + ".txt");
        });
    });
</script>

<script type="text/javascript">

    function check_Name() {


        var Name = $('#Name').val();
//    alert("TEST"+Client_id);
//    exit();


        $.post('<?php echo base_url(); ?>index.php/nmc_c/Check_nmc_ctgry', {
            Name: Name
        }, function (search_info_data) {

            var search_array = JSON.stringify(search_info_data);
            var new_search_array = JSON.parse(search_array);
//                alert("Search CTID_Number_SR...."+new_search_array["CTID_Number_SR"]);
            var Name = new_search_array["Name"];
            if (Name == null) {

            } else {
                document.getElementById("Name").value = null;
                alert("It's ( " + Name + " ) Name is Already Added.Please try Differen Name");
            }

        }, 'JSON');



    }
    
    
    function select_name(){
        
        var type = $('#type').val();
        if( type === 'BTS'){
            alert("Not allow to add BTS Name");
            null_from();
        }
        
    }
</script>   


