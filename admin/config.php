<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define("_DB_SERVERNAME", "127.0.0.1");
define("_DB_NAME", "iotcapst_backend");
define("_DB_USERNAME", "iotcapst_user");
define("_DB_PASSWORD", "bqX~qow-hJB#");
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>