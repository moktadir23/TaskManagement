<!--..........................AUTO search suggestion BTS Name ...........................................................-->
<!--<link rel="stylesheet" href="./css/Auto_search_jquery-ui.css">-->
<link href="<?php echo base_url(); ?>css/Auto_search_jquery-ui.css" rel="stylesheet" type="text/css"/>
<!--<script type="text/javascript" src="./js/Auto_search_jquery-ui.js"></script>-->
<script src="<?php echo base_url(); ?>js/Auto_search_jquery-ui.js" type="text/javascript"></script>
<!--..........................................................................................-->


<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <!--            <h1 class="page-header">
            <?php
//                $Zone = $this->session->userdata('Zone'); 
//                $department = $this->session->userdata('department');
//                $user_type = $this->session->userdata('u_type');
//                if($department=='MTU'){
//                   echo  $Zone.' Zone DashBoard';
//                }else{
//                   echo ' DashBoard '.$department;
//                }
            ?>
                        </h1>-->
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-4" style=""></div>
                <div class="col-lg-6"></div>
                <div class="col-lg-3"></div>
            </div>
            <h3>Search by:  </h3>    
            <form action="<?php echo base_url(); ?>index.php/welcome/user_list" method="post">
                <div class='row'> 
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Select department</label>
                            <select class="form-control" id="department" name="department">
                                <option value="0">--- Select Department ---</option>
                                <option value="CS">CS</option>
                                <option value="Corporate">Corporate</option>
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
                                <option value="Wireless_Infra">Wireless Infrasturcture</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Select Zone</label>
                            <select class="form-control" id="Zone" name="Zone">
                                <option value="0">--- Select Zone ---</option>
                                <option value="Bogura">Bogura</option>
                                <option value="CTG">CTG </option> 
                                <option value="Dhaka">Dhaka</option>   
                                <option value="Khulna">Khulna</option>                                   
                                <option value="Sylhet">Sylhet</option> 
                            </select>
                        </div>
                    </div>
<!--                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="Name" id="Name" onkeyup="find_name()" placeholder="Enter Name" >
                        </div>
                    </div>-->
                    <div class="col-lg-3"><br>
                        <button type="submit" class="btn btn-default" value="save">Scarch</button>
                    </div>

                </div>

            </form>
            <br>



            <h2>Activity Portal User List </h2>
            <table class="table table-bordered table-hover">                          
                <thead>
                    <tr>
                        <th>ID ( Name )</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>IP Phone </th>   
                        <th>Blood Group</th>
                        <th>Dept.</th>
                        <th>Support Office</th>
                        <th>Zone</th>
                        <th>Image</th>
                        <?php 
                           $u_type = $this->session->userdata('u_type');
                           if($u_type=='admin' || $u_type=='s_user' || $u_type=='CS_Admin'){   
                        ?>
                        <th> User Remove</th>
                       <?php }?>
                    </tr>
                </thead>
                <tbody id="u_tbl">

                    <?php
                    foreach ($user_result as $key => $values) {
                        ?>  
                        <tr> 
                            <td><?php echo $values['id'] . '( ' . $values['name'] . ')'; ?></td>
                            <td><?php echo $values['email']; ?></td>
                            <td><?php echo $values['mobile_munber']; ?></td>
                            <td><?php echo $values['ip_phone']; ?></td>
                            <td><?php echo $values['blood_group']; ?></td>
                            <td>
                                <?php
                                $department=$values['department']; 
                                if($department=='CS_Admin'){
                                    echo 'CS';
                                } elseif ($department=='FONOC_Admin') {
                                     echo 'FONOC';
                                } elseif ($department=='NOC_Admin') {
                                     echo 'NOC';
                                }else{
                                    echo $department;
                                }

                                ?>
                            </td>
                            <td>
                                <?php 
                                   $support_ofc=$values['support_ofc'];
                                   $department=$values['department']; 
                                if($department=='CS_Admin'){
                                    echo 'Dhaka';
                                } elseif ($department=='FONOC_Admin') {
                                     echo 'Dhaka';
                                } elseif ($department=='NOC_Admin') {
                                     echo 'Dhaka';
                                }else{
                                    echo $support_ofc;
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                  $Zone=$values['Zone']; 
                                 $support_ofc=$values['support_ofc'];
                                   $department=$values['department']; 
                                if($department=='CS_Admin'){
                                    echo 'Dhaka';
                                } elseif ($department=='FONOC_Admin') {
                                     echo 'Dhaka';
                                } elseif ($department=='NOC_Admin') {
                                     echo 'Dhaka';
                                }else{
                                    echo $Zone;
                                }
                               ?>
                            </td>
                            
                            <td>
                                <?php
                                $file = $values['file_name'];
                                if ($file != null) {
                                    ?>
                                    <img src="<?php echo base_url(); ?>css/upload_file/<?php echo $values['file_name']; ?>" alt="" width="100" height="100">
                                <?php } else { ?>
                                    <img src="<?php echo base_url(); ?>css/upload_file/default.jpg" alt="" width="100" height="100"><br>
                                <?Php } ?>
                            </td>
                               <?php 
                           $u_type = $this->session->userdata('u_type');
                           $S_department = $this->session->userdata('department');
                           $S_Zone = $this->session->userdata('Zone');
                           if($u_type=='admin' || $u_type=='s_user' || $u_type=='CS_Admin'){
                           
                           if($S_department==$department && $S_Zone==$Zone){
                               
                        ?>
                            <td> <a onclick="remove_user()"> <button> REMOVE </button> </a> </td>
                        <?php
                           }
                          }
                        ?>    
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>                                   

        </div>
    </div>
</div>


<script type="text/javascript">
    
    function remove_user(){
        
        var remove_value=check_remove_user();
        
//        alert(remove_value);
      
        
        if( remove_value == '1' ){
//              alert("REMOVE" + remove_value);
                 for(var i = 0; i < u_tbl.rows.length; i++)
                {
                    u_tbl.rows[i].onclick = function()
                    {
                         //rIndex = this.rowIndex;
                        var id_name=this.cells[0].innerHTML;                        
                        var new_id_name = id_name.split("(");
                        var id=new_id_name[0];
                        alert(id);
//........................................................................................
    $.post('<?php echo base_url();?>index.php/welcome/remove_user', {
        id:id
    }, function (remove_info) {
        
        alert('TEST ...'+ remove_info);
        
//        var bwu_array = JSON.stringify(bwu_info);
//        var new_bwu_array = JSON.parse(bwu_array);
//       alert(new_search_array); 
//        alert("Search ip_4221_l...." + new_search_array[0]["ip_4221_l"]);
//.........................................................................
//var row_no=0;
var tableHTML = "";
//
//    for (var key in new_bwu_array) {  
//        if (new_bwu_array.hasOwnProperty(key)) {
//           
//           row_no=row_no+1; 
//           tableHTML += "<tr>";
//           tableHTML += "<td id=" + row_no+'time' + ">" + new_bwu_array[key]["time"]+"</td>";
//           tableHTML += "<td>" + new_bwu_array[key]["type"]+"</td>";
//           tableHTML += "<td>" + new_bwu_array[key]["sub_type"]+"</td>";
//           tableHTML += "<td id=" + row_no+'up' + ">" + new_bwu_array[key]["up"]+"</td>";
//           tableHTML += "<td id=" + row_no+'down' + ">" + new_bwu_array[key]["down"]+"</td>";
//           tableHTML += "<td id=" + row_no + ">" + '<a onclick='+"edit_bwu()"+' > Edit </a> <br> <a onclick='+"cancel_bwu()"+' > Cancel </a>'  +"</td>";
//           tableHTML += "</tr>"; 
//           
//        } 
//    }   
    $("#u_tbl").html(tableHTML); 
//            .............................................................................
    }, 'JSON'); 
//..........................................................................................
                    };
                }
    
        }else{
//            alert("Not REMOVE" + remove_value);
        }
        
    }
    
</script>    



<script type="text/javascript">
function find_name() {

//alert("TEST");

        var Name = document.getElementById("Name").value;
        if (Name.length > 0) {
            $.post('<?php echo base_url();?>index.php/welcome/find_ename', {Name: Name}, function (data) {
                
                if (data.exists) {
                } else {

                    var array = JSON.stringify(data);
                    var newArray = JSON.parse(array);
                    
                    
                    $("#Name").autocomplete({
                        source: newArray
                    });
                    
                    
                }
                
            }, 'JSON');
        }
    }
</script>