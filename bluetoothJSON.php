<?php
    date_default_timezone_set('America/Denver');
    require_once "database.php";
	
	// Initialize the session
    session_start();

    $apiKey = $_GET["apiKey"];
    //echo "API KEY = " . $apiKey;

    if ($apiKey == 12345) {
	
	//query for bluetooth table Pi Locations------------------------------------
    	$query = "SELECT * FROM bluetooth_data";
    
    	$result = db_query($query);
    
    while($row = $result->fetch_assoc()){
      $beacon[] = $row['bluetooth_id'];
      $owner[] = $row['owner'];
      $location[] = $row['location'];
      $timestamp[] = $row['timestamp'];
      $rssi[] = $row['rssi'];
      $piid[] = $row['pi_id'];
    }
	
    $result = array();

    // Information about the week
    $result['BEACON'] = $beacon;
    $result['OWNER'] = $owner;
    $result['LOCATION'] = $location;
    $result['TIMESTAMP'] = $timestamp;
    $result['RSSI'] = $rssi;
    $result['ID'] = $piid;
    

    // Converts the result to JSON
    header('Content-type: application/json; charset=utf-8');
    
    // Converts the Result Array Into a JSON Object
    echo json_encode($result);
    }
    else {
	echo "missing api key";
    }
   	

?>

