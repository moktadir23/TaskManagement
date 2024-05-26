<?php  
 //check_session.php  
 session_start();
 $last_activity = $_SESSION['last_activity'];
 $now = time();
 
 echo $idle_time = ($now - $last_activity);
 
?>