<?php
    require_once "database.php";
    date_default_timezone_set('America/Denver');
	
	// Initialize the session
    session_start();
    print_r($_POST);
    //echo "Hello pi";
    $api_key = isset($_POST['api_key']) ?? "default";

    if($api_key == "12345") {
        //$api_function = isset($_POST['api_function']) ? $_POST["api_function"]: $hostname = "";
        //if ($api_function == "ping") {
            echo "\n";
            echo "Correct function: ";
            //echo $api_function;
            ping_func();
        }
        //else {
            //echo "Incorrect function";
        //}
    else {
        echo "Incorrect API Key";
    }

    function ping_func() {
        $data = json_decode($_POST['data']);
        foreach ($data as $key=>$value) {
            print_r($value);
            foreach($value as $key1=>$value1) {
                $array[$key1] = $value1;
            }
            $hostname = isset($array['hostname']) ? $array["hostname"]: $hostname = "";
            $network = isset($array['network']) ? $array["network"]: $array = "";
            $ip_addr = isset($array['ip']) ? $array["ip"]: $ip_addr = "";
            $timestamp = isset($array['timestamp']) ? $array["timestamp"]: $timestamp = "";
            $payload = isset($array['payload']) ? $array["payload"]: $payload = "";
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

        
        
        
}
        

        
            
        
        
        


?>