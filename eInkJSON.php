<?php
    require_once "database.php";
    date_default_timezone_set('America/Denver');
	
	// Initialize the session
    session_start();

    $apiKey = $_GET["apiKey"];
    //echo "API KEY = " . $apiKey;

    if ($apiKey == 12345) {
	
	//query for bluetooth table Pi Locations------------------------------------
    	$query = "SELECT * FROM display_data";
    
    	$result = db_query($query); 
    
    while($row = $result->fetch_assoc()){
      $fname[] = $row['name'];
      $fpath[] = $row['image_path'];
      $Location[] = $row['location'];
      $Message[] = $row['message'];
      $Title[] = $row['title'];
      $idp[] = $row['pi_id'];
    }
	
    $result = array();

    // Information about the week
    $result['ID'] = $idp;
    $result['NAME'] = $fname;
    $result['TITLE'] = $Title;
    $result['MESSAGE'] = $Message;
    $result['LOCATION'] = $Location;

    $result['FILE PATH'] = $fpath;

    // Converts the result to JSON
    header('Content-type: application/json; charset=utf-8');
    
    // Converts the Result Array Into a JSON Object
    echo json_encode($result);
    }
    else {
	echo "missing api key";
    }
   	

?>