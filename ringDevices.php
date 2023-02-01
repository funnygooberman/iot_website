<?php
    date_default_timezone_set('America/Denver');
	
	// Initialize the session
    session_start();

    $apiKey = $_GET["apiKey"];
    //echo "API KEY = " . $apiKey;

    if ($apiKey == 12345) {
	
        $data = '{"Contact Sensors": { "94666689-412c-4964-b980-454dbcdd03f6" : "ACCR Backdoor", "2b94d6b0-081f-48e0-90aa-7ad6f5643d91" : "Cyber City Door", "ed41f91b-0f18-4c77-8321-ed377c8503a0" : "ACCR Frontdoor"}, "Motion Sensors": {"64ad57dc-b977-4bd2-9bf6-2eaae271a8a6" : "Cyber City Motion"}}';
    	echo($data);
    }
    else {
	echo "missing api key";
    }
   	

?>