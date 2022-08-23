<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: office_sign_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="http://fonts.googleapis.com/css?family=Open+Sans">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <meta charset="UTF-8">
        <title>USAFA IOT</title>
    </head>

    <body>
    <header>
        <div class="container">
            
            <img src="assets/logo.png" alt="logo" class="logo" width="300" heigh="300">
            <nav>
                <ul>
                    <li><a href="officesign_dashboard.php">Home</a></li>
                    <li><a href="#">Creat Sign</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
    </body>
</html>