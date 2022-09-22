<?php
// Initialize the session
date_default_timezone_set('America/Denver');
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
require_once "database.php";
//$php_id = $_SESSION["admin_id"];
$check_query = "SELECT timestamp FROM pi_ping_data";
$result = db_query($check_query);
$num_online = 0;
$num_offline = 0;
$date = date('Y-m-d H:i:s');
$difference = 350;



while($row = $result->fetch_assoc()){
    $timestamps[] = $row['timestamp'];
  }

  foreach($timestamps as $item) {
    $difference_in_seconds = strtotime($date) - strtotime($item);
    (int) $difference_in_seconds;
    echo "\n";
    echo $difference_in_seconds;
    if ($different_in_seconds > $difference) {
        echo "\n";
        echo "One offline!";
      $num_offline = $num_offline + 1;
    }
    else {
      $num_online = $num_online + 1;
    }
  }
  echo "Hello \n";
echo "num_online: ";
echo $num_online;
echo "\n num_offline: ";
echo $num_offline;

?>