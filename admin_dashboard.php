<?php
// Initialize the session
date_default_timezone_set('America/Denver');
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["admin_loggedin"]) || $_SESSION["admin_loggedin"] !== true){
    header("location: admin_login.php");
    exit;
}
require_once "database.php";
//$php_id = $_SESSION["admin_id"];
$check_query = "SELECT timestamp FROM pi_ping_data";
$result = db_query($check_query);
$num_online = 0;
$num_offline = 0;
$date = date('Y-m-d H:i:s');

$user_query = "SELECT username FROM users";
$user_result = db_query($user_query);
$numUsers = 0;

while($userRow = $user_result->fetch_assoc()) {
    $userResult[] = $userRow['username'];
}
foreach($userResult as $item) {
  $numUsers = $numUsers + 1;
}

while($row = $result->fetch_assoc()){
    $timestamps[] = $row['timestamp'];
  }

  foreach($timestamps as $item) {
    $difference_in_seconds = strtotime($date) - strtotime($item);
    (int) $difference_in_seconds;
    if ($difference_in_seconds > 350) {
        $num_offline = $num_offline + 1;
    }
    else {
      $num_online = $num_online + 1;
    }
  }
?>

<!DOCTYPE html><!--  This site was created in Webflow. https://www.webflow.com  -->
<!--  Last Published: Tue Sep 20 2022 22:34:46 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="632a394cfcc00bc1310719e9" data-wf-site="632a181108141a036b8932b7">
<head>
  <meta charset="utf-8">
  <title>Admin Dashboard</title>
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
              <a href="admin_dashboard.php" class="nav-link">Admin</a>
            </li>
            <li>
              <a href="admin_ping_data.php" class="nav-link">Ping</a>
            </li>
            <li>
              <a href="admin_user_data.php" class="nav-link">Users</a>
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
  <section class="hero-heading-center wf-section">
    <div class="container">
      <h1 class="centered-heading margin-bottom-32px">PI Dashboard</h1>
      <div class="hero-wrapper">
        <div class="hero-split">
          <p class="margin-bottom-24px">Number of PI's Online: <?php echo $num_online?></p>
          <p class="margin-bottom-24px">Number of PI's Offline: <?php echo $num_offline?></p>
        </div>
        <a href="admin_ping_data.php" class="button-primary-2 w-button">View Full Ping Data</a>
      </div>
    </div>
  </section>
  <section class="hero-heading-center wf-section">
    <div class="container">
      <h1 class="centered-heading margin-bottom-32px">Users</h1>
      <div class="hero-wrapper">
        <div class="hero-split">
          <p class="margin-bottom-24px">Number of Users: <?php echo $numUsers?></p>
        </div>
        <a href="admin_user_data.php" class="button-primary-2 w-button">View Full User Data</a>
      </div>
    </div>
  </section>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=632a181108141a036b8932b7" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>