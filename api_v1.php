<?php
    require_once "database.php";
    date_default_timezone_set('America/Denver');
	
	// Initialize the session
    session_start();
    print_r($_POST);
    echo "Hello pi";
    $api_key = $hostname = isset($_POST['api_key']) ? $_POST["api_key"]: $hostname = "";

    if($api_key == "12345") {
        $api_function = isset($_POST['api_function']) ? $_POST["api_function"]: $hostname = "";
        if ($api_function == "ping") {
            echo "\n";
            echo "Correct function: ";
            echo $api_function;
            ping_func();
        }
        else {
            echo "Incorrect function";
        }
    }
    else {
        echo "Incorrect API Key";
    }

    function ping_func() {

        foreach ($_POST as $key=>$value) {
            echo '<pre>';
            print_r($value);
            echo '</pre>';
        }

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
        db_query($query);
    }
        

        
            
        
        
        


?>