<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
require_once "database.php";
$php_id = $_SESSION["id"];
$check_query = "SELECT * FROM display_data WHERE userID = $php_id;";
$result = db_query($check_query);


while($row = $result->fetch_assoc()){
    $name2 = $row['name'];
    $file_path2 = $row['image_path'];
    $location2 = $row['location'];
    $message2 = $row['message'];
    $title2 = $row['title'];
	$pi_id = $row['pi_id'];
    
  }
?>

<!DOCTYPE html><!--  This site was created in Webflow. https://www.webflow.com  -->
<!--  Last Published: Tue Sep 20 2022 22:34:46 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="632a394cfcc00bc1310719e9" data-wf-site="632a181108141a036b8932b7">
<head>
  <meta charset="utf-8">
  <title>Dashboard</title>
  <meta content="Dashboard" property="og:title">
  <meta content="Dashboard" property="twitter:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="css/taylors-awesome-site-ed8a4b.webflow.css" rel="stylesheet" type="text/css">
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon">
</head>
<body class="body-4">
  <div data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navbar-logo-left-container shadow-three w-nav">
    <div class="container">
      <div class="navbar-wrapper">
        <a href="#" class="navbar-brand w-nav-brand"><img src="images/USAFA-IOT-logos_transparent.png" loading="lazy" srcset="images/USAFA-IOT-logos_transparent.png 500w, images/USAFA-IOT-logos_transparent.png 957w" sizes="100vw" alt=""></a>
        <nav role="navigation" class="nav-menu-wrapper w-nav-menu">
          <ul role="list" class="nav-menu-two w-list-unstyled">
            <li>
              <a href="#" class="nav-link">Home</a>
            </li>
            <li>
              <a href="#" class="nav-link">About</a>
            </li>
            <li>
              <a href="#" class="nav-link">Contact</a>
            </li>
            <li>
              <div data-hover="true" data-delay="0" class="nav-dropdown w-dropdown">
                <div class="nav-dropdown-toggle w-dropdown-toggle">
                  <div class="nav-dropdown-icon w-icon-dropdown-toggle"></div>
                  <div class="text-block">Services</div>
                </div>
                <nav class="nav-dropdown-list shadow-three mobile-shadow-hide w-dropdown-list">
                  <a href="#" class="nav-dropdown-link w-dropdown-link">Office Signs</a>
                  <a href="#" class="nav-dropdown-link w-dropdown-link">Weather Station</a>
                  <a href="#" class="nav-dropdown-link w-dropdown-link">Parking Lot</a>
                </nav>
              </div>
            </li>
            <li>
              <div class="nav-divider"></div>
            </li>
            <li class="mobile-margin-top-10">
              <a href="logout.php" class="button-primary w-button">Logout</a>
            </li>
          </ul>
        </nav>
        <div class="menu-button w-nav-button">
          <div class="w-icon-nav-menu"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="form-block w-form">
    <form  action="singleEInkSubmit.php" method="post" class="form-4" enctype="multipart/form-data">
      <h1 class="heading-3">Office Sign Configuration</h1>
      <label for="name" class="field-label-4">Name</label>
      <input type="text" class="text-field-6 w-input" maxlength="256" name="name" data-name="Name" placeholder="Ex. John Smith" id="name" value = "<?php echo $name2; ?>">
      <label for="title" class="field-label-5">Title</label>
      <input type="text" class="text-field-7 w-input" maxlength="256" name="title" data-name="Title" placeholder="Ex. CEO of Company " id="title" value = "<?php echo $title2; ?>">
      <label for="message" class="field-label-6">Message</label>
      <textarea placeholder="Ex. Monday - Work" maxlength="5000" id="message" name="message" class="textarea w-input"><?php echo $message2; ?></textarea>
      <label for="location" class="field-label-7">Room Number</label>
      <input type="text" class="text-field-8 w-input" maxlength="256" name="location" placeholder="Ex. 1A23" id="location" value = "<?php echo $location2; ?>">
      <label for="image" class="field-label-8">Image Upload</label>
      <img src="<?php echo $file_path2 ?>" alt="Upload an image!"  style="height: 300%; width: 140%;">
      <input type="file" name="fileToUpload" id="fileToUpload" hidden/>
      <label class="button-2 w-button" for="fileToUpload">Upload Image</label>
      <label for="pi_id" class="field-label-9">PI ID</label>
      <input type="pi_id" class="text-field-9 w-input" maxlength="256" name="pi_id"  placeholder="Ex. rpi-1A23" id="pi_id" value = "<?php echo $pi_id; ?>">
      <input type="submit" value="Submit" class="submit-button-2 w-button">
    </form>
    
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=632a181108141a036b8932b7" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>