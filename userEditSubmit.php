<?php

    // Initialize the session
    session_start();
     
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["admin_loggedin"]) || $_SESSION["admin_loggedin"] !== true){
        header("location: admin_login.php");
        exit;
    }
    

include "database.php";
// Query Database to only update new things
$php_id = $_SESSION["id"];

$user_id = $_POST['id'];

$username= $_POST['username'];

$password = $_POST['password'];

$param_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "UPDATE users SET username = \"" .$username. "\",  password = \"" .$param_password. "\" WHERE id =\"".$user_id."\"";

db_query($sql);




 
date_default_timezone_set("America/Denver");

$timeDate = date('m/d/Y h:i:s a', time());


header("Location: admin_user_data.php");
?>