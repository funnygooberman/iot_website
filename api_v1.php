<?php
    require_once "database.php";
    date_default_timezone_set('America/Denver');
    function ring_func() {
        print_r("You are in the ring function");
        $data = json_decode($_POST['data']);
        foreach ($data as $key=>$value) {
            print_r($key);
            print_r($value);
            $array[$key] = $value;
        }
        $device_id = isset($array['device_id']) ? $array["device_id"]: $device_id = "";
        $device_type = isset($array['device_type']) ? $array["device_type"]: $array = "";
        $device_room = isset($array['device_room']) ? $array["device_room"]: $device_room = "";
        $device_state = isset($array['device_state']) ? $array["device_state"]: $device_state = "";
        $query = "INSERT INTO ring_data (device_id, device_type, device_room, device_state)
        VALUES (\"" .$device_id. "\",
        \"" .$device_type. "\",
        \"" .$device_room. "\",
        \"" .$device_state. "\") 
        ON DUPLICATE KEY UPDATE 
        device_type = \"" .$device_type. "\", 
        device_room = \"" .$device_room. "\", 
        device_state = \"" .$device_state. "\"";
        db_query($query);
        
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
    function bluetooth_func() {
        print_r("You are in the bluetooth function");
        $data = json_decode($_POST['data']);
        foreach ($data as $key=>$value) {
            print_r($key);
            print_r($value);
            $array[$key] = $value;
        }
        $beaconID = isset($array['BEACON']) ? $array["BEACON"]: $device_id = "";
        $beaconRSSI = isset($array['RSSI']) ? $array["RSSI"]: $array = "";
        $beaconTime = isset($array['TIMESTAMP']) ? $array["TIMESTAMP"]: $device_room = "";
        $beaconPI = isset($array['PI_ID']) ? $array["PI_ID"]: $device_room = "";
        $query = "UPDATE bluetooth_data SET 
        rssi = \"" .$beaconRSSI. "\", 
        timestamp = \"" .$beaconTime. "\", 
        pi_id = \"" .$beaconPI. "\" 
        WHERE bluetooth_id = \"" .$beaconID. "\"";
        db_query($query);
    
    }
	
	// Initialize the session
    session_start();
    print_r($_POST);
    //echo "Hello pi";
    $api_key = isset($_POST['api_key']) ?? "default";

    if($api_key == "12345") {
        print_r("Correct API key");
        //$api_function = isset($_POST['api_function']) ? $_POST["api_function"]: $hostname = "";
        #if ($api_function == "ping") {
            if($_POST["api_function"] == "ring") {
                print_r("Correct API function ring");
                ring_func();

            }
            if($_POST["api_function"] == "bluetooth") {
                print_r("Correct API function bluetooth");
                bluetooth_func();
            }
            //echo $api_function;
            else {
                print_r("Correct Function ping");
                ping_func();
            }
            
        }
        //else {
            //echo "Incorrect function";
        //}
    else {
        echo "Incorrect API Key";
    }
?>