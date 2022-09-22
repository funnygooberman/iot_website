<?php
    require_once "database.php";
    date_default_timezone_set('America/Denver');
	
	// Initialize the session
    session_start();

    $api_key = $_POST['api_key'];

    if($api_key == "12345") {
        $api_function = $_POST['api_function'];
        if ($api_function == "ping") {
            ping_func();
        }
    }

    else {
        echo "Incorrect API Key";
    }

    //$apiKey = $_GET["apiKey"];
    //echo "API KEY = " . $apiKey;

    function ping_func() {
        print_r($_POST);
        $hostname = isset($_POST['hostname']) ? $_POST["hostname"]: $hostname = "";
        $network = isset($_POST['network']) ? $_POST["network"]: $network = "";
        $ip_addr = isset($_POST['ip']) ? $_POST["ip"]: $ip_addr = "";
        $timestamp = isset($_POST['timestamp']) ? $_POST["timestamp"]: $timestamp = "";
        $payload = isset($_POST['payload']) ? $_POST["payload"]: $payload = "";
        $query = "INSERT INTO pi_ping_data (hostname, network, ip_addr, timestamp, payload) 
        VALUES (\"" .$hostname. "\",
         \"" .$network. "\",
         \"" .$ip_addr. "\",
         \"" .$timestamp. "\", 
        \"" .$payload. "\") 
        ON DUPLICATE KEY UPDATE 
        network = \"" .$network. "\", 
        ip_addr = \"" .$ip_addr. "\", 
        timestamp = \"" .$timestamp. "\", 
        payload = \"" .$payload. "\"";
    }
        

        
            
        
        
        


?>