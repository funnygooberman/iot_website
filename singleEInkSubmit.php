<?php

    // Initialize the session
    session_start();
     
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: office_sign_login.php");
        exit;
    }
    

include "database.php";
// Query Database to only update new things
$php_id = $_SESSION["id"];
$check_query = "SELECT * FROM display_data WHERE userID = $php_id;";
$result = db_query($check_query);
$name2 = "";
$file_path2="";
$location2="";
$message2="";
$title2="";
$pi_id="";
while($row = $result->fetch_assoc()){
  $name2 = $row['name'];
  $file_path2 = $row['image_path'];
  $location2 = $row['location'];
  $message2 = $row['message'];
  $title2 = $row['title'];
  $pi_id = $row['pi_id'];
}


$target_dir = "images/einkimages/";
$uploadOk = 1;

// Check if image file is a actual image or fake image


if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;


  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}


$ogFile = basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($ogFile,PATHINFO_EXTENSION));

if (strcmp($imageFileType, "") == 0) {
    $target_file = $file_path2;
}
else
{
	$target_file = $target_dir . str_replace(' ', '', $name2);
	$target_file = str_replace('.', '', $target_file) . $php_id . ".";
	$target_file = $target_file . $imageFileType;
}




// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "") {
  $target_file= $file_path2;
  header("Location: officesign_dashboard.php");
  $uploadOk = 0;
}

$imgHash = password_hash($target_file, PASSWORD_BCRYPT);



// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
// if everything is ok, try to upload file
} 
else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
  } else {
	header("Location: officesign_dashboard.php");
  }
}




$php_name= $_POST['name'];

$php_title= $_POST['title'];

$php_message= $_POST['message'];

$php_location= $_POST['location'];

$php_pi_id= $_POST['pi_id'];


$base_directory = "images/einkimages/";


if (empty($php_name) == 0) {

	$php_name = $name2;
}

if (empty($php_message) == 0) {

	$php_message = $message2;
}

if (empty($php_title) == 0) {

	$php_title = $title2;
}

if (empty($php_location) == 0) {

	$php_location = $location2;
} 

if (empty($php_pi_id) == 0) {

	$php_pi_id = $pi_id;
} 


$query = "UPDATE display_data SET name = \"" .$php_name. "\",  title = \"" .$php_title. "\",  message = \"".$php_message. "\", location =  \"".$php_location."\", image_path = \"".$target_file."\", pi_id = \"".$php_pi_id."\" WHERE userID =".db_quote($php_id);

db_query($query);

//$imgHashQuery = "UPDATE image_hashes SET hash = \"" .$imgHash. "\" WHERE id =".db_quote($php_id);

//db_query($imgHashQuery);







$_SESSION['message'] = 'Successfully Updated your E-Ink @';
 
date_default_timezone_set("America/Denver");

$timeDate = date('m/d/Y h:i:s a', time());

$_SESSION['message'] = $_SESSION['message'] . $timeDate;

header("Location: officesign_dashboard.php");
?>