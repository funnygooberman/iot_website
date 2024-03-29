<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["admin_loggedin"]) || $_SESSION["admin_loggedin"] !== true){
    header("location: admin_login.php");
    exit;
}
require_once "database.php";
$php_id = $_SESSION["id"];
$result;
if (isset($_GET['entry_id'])) {
  $user_id = $_GET['entry_id'];
  $check_query = "SELECT * FROM users WHERE id = \"" .$user_id. "\"";
  $result = db_query($check_query);
}

while($row = $result->fetch_assoc()){
    $id = $row['id'];
    $username = $row['username'];
  }
?>

<!DOCTYPE html><!--  This site was created in Webflow. https://www.webflow.com  -->
<!--  Last Published: Tue Sep 20 2022 22:34:46 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="632a394cfcc00bc1310719e9" data-wf-site="632a181108141a036b8932b7">
<head>
  <meta charset="utf-8">
  <title>User Edit</title>
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
        <a href="index.html" class="navbar-brand w-nav-brand"><img src="images/USAFA-IOT-logos_transparent.png" loading="lazy" srcset="images/USAFA-IOT-logos_transparent.png 500w, images/USAFA-IOT-logos_transparent.png 957w" sizes="100vw" alt=""></a>
        <nav role="navigation" class="nav-menu-wrapper w-nav-menu">
          <ul role="list" class="nav-menu-two w-list-unstyled">
            <li>
              <a href="index.html" class="nav-link">Home</a>
            </li>
            <li>
              <a href="admin_dashboard.php" class="nav-link">Admin</a>
            </li>
            <li>
              <a href="development.html" class="nav-link">Contact</a>
            </li>
            <li>
              <div data-hover="true" data-delay="0" class="nav-dropdown w-dropdown">
                <div class="nav-dropdown-toggle w-dropdown-toggle">
                  <div class="nav-dropdown-icon w-icon-dropdown-toggle"></div>
                  <div class="text-block">Services</div>
                </div>
                <nav class="nav-dropdown-list shadow-three mobile-shadow-hide w-dropdown-list">
                  <a href="SecurityDashboard.php" class="nav-dropdown-link w-dropdown-link">Security Dashboard</a>
                  <a href="login.php" class="nav-dropdown-link w-dropdown-link">Office Signs</a>
                  <a href="beacons.php" class="nav-dropdown-link w-dropdown-link">Beacons</a>
                  <a href="development.html" class="nav-dropdown-link w-dropdown-link">Weather Station</a>
                  <a href="development.html" class="nav-dropdown-link w-dropdown-link">Parking Lot</a>
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
    
    <form  action="userEditSubmit.php" method="post" class="form-4" enctype="multipart/form-data">
      <h1 class="heading-3">Edit User</h1>
      <label for="id" class="field-label-5">ID: <?php echo $id; ?></label>
      <input type="hidden" name="id" data-name="ID" placeholder="ID" id="id" value = "<?php echo $id; ?>">
      <label for="username" class="field-label-5">Username</label>
      <input type="text" class="text-field-7 w-input" maxlength="256" name="username" data-name="Username" placeholder="Username" id="username" value = "<?php echo $username; ?>">
      <label for="password" class="field-label-5">New Password</label>
      <input type="password" class="text-field-7 w-input" maxlength="256" name="password" data-name="Password" placeholder="New Password" id="password">
      <input type="submit" value="Submit" class="submit-button-2 w-button">
    </form>
    
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=632a181108141a036b8932b7" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>