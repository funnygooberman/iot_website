<?php
    require_once "database.php";
    date_default_timezone_set('America/Denver');
	
	// Initialize the session
    session_start();

    //$apiKey = $_GET["apiKey"];
    //echo "API KEY = " . $apiKey;

        $hostname = $_POST['hostname'];
        $network = $_POST['network'];
        $ip_addr = $_POST['ip'];
        $timestamp = $_POST['timestamp'];
        $payload = $_POST['payload'];
        $query1 = "SELECT hostname FROM pi_ping_data WHERE hostname = \"" .$hostname. "\"";
        $result = db_query($query1); 
        if ($result != $hostname) {
            $query3 = "UPDATE pi_ping_data SET hostname = \"" .$hostname. "\", network = \"" .$network. "\", ip_addr = \"" .$ip_addr. "\", timestamp = \"" .$timestamp. "\", payload = \"" .$payload. "\"";
            db_query($query3);
    	    
        }
        $query2 = "UPDATE pi_ping_data SET hostname = \"" .$hostname. "\", network = \"" .$network. "\", ip_addr = \"" .$ip_addr. "\", timestamp = \"" .$timestamp. "\", payload = \"" .$payload. "\" WHERE hostname = \"" .$hostname. "\"";
        db_query($query2);

?>