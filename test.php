<?php
// Initialize the session
date_default_timezone_set('America/Denver');
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
require_once "database.php";
//$php_id = $_SESSION["admin_id"];
$check_query = "SELECT * FROM pi_ping_data";
$result = db_query($check_query);
$num_online = 0;
$num_offline = 0;
echo "Hello \n";
echo "num_online: ";
echo $num_online;
echo "\n num_offline: ";
echo $num_offline;


while($row = $result->fetch_assoc()){
    $hostname = $row['hostname'];
    $network = $row['network'];
    $ip_addr = $row['ip_addr'];
    $timestamp = $row['timestamp'];
    $payload = $row['payload'];
  }

  foreach($timestamp as $item) {
    echo $item;
    $date = date('Y-m-d H:i:s');
    $difference_in_seconds = strtotime($date) - strtotime($item);
    if ($different_in_seconds > 350) {
      $num_offline = $num_offline + 1;
    }
    else {
      $num_online = $num_online + 1;
    }
  }
?>