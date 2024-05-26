<?php

$ch = curl_init('https://office.link3.net/rsmapi/api/rsmapi/GetRsmTicketByClosedDate?sKey=1235&fromdate=16/02/2021%2000:00:00&todate=17/02/2021%2023:59:59');
curl_setopt_array($ch, array(
    CURLOPT_RETURNTRANSFER => TRUE
));

//var_dump(curl_exec($ch));
var_dump(curl_getinfo($ch));
//var_dump(curl_error($ch));

$response = curl_exec($ch);

echo $response;

/*
include_once "dbconnect_l.php";
$BTS_CODE = "SUBSCRIBER_COMPLAINT_PICK";



// run log
$start_log = "insert into specta.run_log (cron_name, start_end) values ('SUBSCRIBER_COMPLAINT_PICK', 'start')";
$start_log_result = mysql_query($start_log, $local_string) or die(mysql_error());

//dual process controll watchdog
$cur_stat = "select * from mynsure.BRAS_SPECTA where BTS_NAME = '$BTS_CODE'";
$stat_result = mysql_query($cur_stat, $local_string) or die(mysql_error());

$stat_row = mysql_fetch_row($stat_result);
$IP_UPDATE = $stat_row[2]; $ROUTER_UPDATE = $stat_row[3];

if($IP_UPDATE == 1 || $ROUTER_UPDATE == 1)
{
mysql_close($local_string); 
echo "going for exit";
exit;
}

$upd_time = date('d-m-Y H:i:s');

$update_query = "update mynsure.BRAS_SPECTA set IP_UPDATE = '1', last_upd = '$upd_time' where BTS_NAME = '$BTS_CODE'";
$local_update = mysql_query($update_query,$local_string)or die(mysql_error() . "saying update");
//dual process controll watchdog end


// start adding new subscriber
$key='1235';
//2020-09-30T18:51:34
echo $pre_date=date("d/m/Y", strtotime(' -1 day'));
echo '-----';
//$fromdate='01/09/2020%2000:00:00';
echo $fromdate=$pre_date.'%2000:00:00';
echo '------';
//$todate='30/09/2020%2023:59:59';
echo $todate=$pre_date.'%2023:59:59';


$ch = curl_init("https://office.link3.net/rsmapi/api/rsmapi/GetRsmTicketByClosedDate?sKey=$key&fromdate=$fromdate&todate=$todate");
curl_setopt_array($ch, array(
    CURLOPT_RETURNTRANSFER => TRUE
));

$response = curl_exec($ch);

//echo $response;

if($response === FALSE){
    die(curl_error($ch));
}

//.................................................................................................
$responseData = json_decode($response, TRUE);
//echo $responseData['CustomerID'];

if( isset($responseData))
{
    foreach ($responseData as $value){ 
        
        $TicketID=$value['TicketID'];
        $CustomerID=$value['CustomerID'];
        $TicketCreateDate=$value['TicketCreateDate'];
        $ComplainSource=$value['ComplainSource'];
        $TicketTypeName=$value['TicketTypeName'];
        $NatureName=$value['NatureName'];
        $TicketStatus=$value['TicketStatus'];
        $TicketClosedDate=$value['TicketClosedDate'];
        
//        online_staus
        $done_notice = "insert into specta.subscriber_complaint (TicketID, CustomerID, TicketCreateDate, ComplainSource,TicketTypeName,NatureName,TicketStatus,TicketClosedDate,specta_status) "
                . "values ('$TicketID', '$CustomerID' , '$TicketCreateDate', '$ComplainSource', '$TicketTypeName', '$NatureName', '$TicketStatus', '$TicketClosedDate', '1')";
        $done_notice_result = mysql_query($done_notice, $local_string) or die(mysql_error() . 'RSM API');
    }
}else{
    $done_notice = "insert into specta.subscriber_complaint (TicketID, CustomerID, TicketCreateDate, ComplainSource,TicketTypeName,NatureName,TicketStatus,TicketClosedDate) "
                . "values ('', '' , '', '', '', '', '', '')";
        $done_notice_result = mysql_query($done_notice, $local_string) or die(mysql_error() . 'RSM API ERROR');
}




// say end ofupdating
$upd_end_time = date('d-m-Y H:i:s');
$update_query = "update mynsure.BRAS_SPECTA set IP_UPDATE = '0', last_upd_end = '$upd_end_time' where BTS_NAME = '$BTS_CODE'";
$local_update = mysql_query($update_query,$local_string)or die(mysql_error() . "saying update end");
// say end ofupdating

// run log
$end_log = "insert into specta.run_log (cron_name, start_end) values ('SUBSCRIBER_COMPLAINT_PICK', 'end')";
$end_log_result = mysql_query($end_log, $local_string) or die(mysql_error());



mysql_close($local_string);

*/

?>

