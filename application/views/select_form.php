<html>
    <head>
        <title>CodeIgniter Select Demo</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div id="main">
<!--            <div id="note"><span><b>Note : </b></span> In this DEMO we have used a default table for records. </div>-->
            <div class="message">
                <?php
                if (isset($read_set_value)) {
                    echo $read_set_value;
                }
                if (isset($message_display)) {
                    echo $message_display;
                }
                ?>
            </div>

            <div id="show_form">
                <h2>CodeIgniter Select By ID And Date</h2>
                <hr/>
                <?php
                echo form_open('select_tutorial/select_by_id');
                echo form_label('Select By ID : ');
                $data = array(
                    'name' => 'id',
                    'placeholder' => 'Please Enter ID'
                );
                echo form_input($data);
                echo "<div class='error_msg'>";
                if (isset($id_error_message)) {
                    echo $id_error_message;
                }

                echo "</div>";
                echo "<br/>";
                echo form_submit('submit', 'Show Record');
                echo form_close();
                echo "<hr/>";
                echo form_open('select_tutorial/select_by_date');
                echo form_label('Select By Date : ');
                $data = array(
                    'type' => 'date',
                    'name' => 'date',
                    'value' => '2015-01-01'
                );
                echo form_input($data);
                echo "<div class='error_msg'>";
                if (isset($date_error_message)) {
                    echo $date_error_message;
                }
                echo "</div>";
                echo "<br/>";
                echo form_submit('submit', 'Show Record');
                echo form_close();
                echo "<hr/>";
                echo form_open('select_tutorial/select_by_date_range');
                echo form_label('Select By Range Of Dates : ');
                echo "<br/>";

                echo "From : ";
                $data = array(
                    'type' => 'date',
                    'name' => 'date_from',
                    'value' => '2015-01-01'
                );
                echo form_input($data);
                echo "<br/>";
                echo "<br/>";
                echo " To : ";
                $data = array(
                    'type' => 'date',
                    'name' => 'date_to',
                    'value' => '2015-02-01'
                );
                echo form_input($data);
                echo "<div class='error_msg'>";
                if (isset($date_range_error_message)) {
                    echo $date_range_error_message;
                }
                echo "<br/>";
                echo "<br/>";
                echo form_submit('submit', 'Show Record');
                echo form_close();
                ?>
                <div class="message">
                    <?php
                    if (isset($result_display)) {
                        echo "<p><u>Result</u></p>";
                        if ($result_display == 'No record found !') {
                            echo $result_display;
                        } else {
                            echo "<table class='result_table'>";
                            echo '<tr><th>Employee ID</th><th>Employee Name</th><th>Joining Date</th><th>Address</th><th>Mobile</th><tr/>';
                            foreach ($result_display as $value) {
                                echo '<tr>' . '<td class="e_id">' . $value->emp_id . '</td>' . '<td>' . $value->emp_name . '</td>' . '<td class="j_date">' . $value->emp_date_of_join . '</td>' . '<td>' . $value->emp_address . '</td>' . '<td class="mob">' . $value->emp_mobile . '</td>' . '<tr/>';
                            }
                            echo '</table>';
                        }
                    }
                    ?>

                </div>
            </div>
            <?php
            if (isset($show_table)) {
                echo "<div class='emp_table'>";
                if ($show_table == 'Database is empty !') {
                    echo $show_table;
                } else {
                    echo '<caption>Employee Table</caption><br/><br/>';
                    echo "<table  width='500px'>";
                    echo '<tr><th class="e_id">Employee ID</th><th>Employee Name</th><th>Joining Date</th><tr/>';
                    foreach ($show_table as $value) {
                        echo "<tr>" . "<td class='e_id'>" . $value->emp_id . "</td>" . "<td>" . $value->emp_name . "</td>" . "<td>" . $value->emp_date_of_join . "</td>" . "<tr/>";
                    }
                    echo '</table>';
                }
                echo "</div>";
            }
            ?>
        </div>


    </body>
</html>