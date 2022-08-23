<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "C00lbe@ns2014!!";
$db = "iotcapst_backend";
 
/* Attempt to connect to MySQL database */
$link = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>