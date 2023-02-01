<?php
// Initialize the session
date_default_timezone_set('America/Denver');
session_start();
$date = date('Y-m-d H:i:s');
 
// Check if the user is logged in, if not then redirect him to login page
require_once "database.php";
//$php_id = $_SESSION["admin_id"];
$check_query = "SELECT * FROM ring_data";
$result = db_query($check_query);
$result1 = db_query($check_query);






?>

<!DOCTYPE html><!--  This site was created in Webflow. https://www.webflow.com  -->
<!--  Last Published: Tue Sep 20 2022 22:34:46 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="632a394cfcc00bc1310719e9" data-wf-site="632a181108141a036b8932b7">
<head>
  <meta charset="utf-8">
  <title>Security Dashboard</title>
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
<body class="body">
  <div class="navbar-logo-left wf-section">
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
                <a href="login.php" class="button-primary w-button">Login</a>
              </li>
            </ul>
          </nav>
          <div class="menu-button w-nav-button">
            <div class="w-icon-nav-menu"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class='hero-heading-center wf-section'>
  <div class = 'container'>
    <div class='hero-wrapper'>
      <div class='hero-split'>
        <h1 class="centered-heading margin-bottom-32px">Security Dashboard</h1>
      </div>
    </div>
  </div>
  </section>

  <?php
  $secure = 1;
  while($row = $result->fetch_assoc()){
    
    if ($row['device_state'] == "on") {
      $secure = 0;
      
  }
}
  echo "<section class='hero-heading-center wf-section'>";
    echo "<div class='container'>";
      echo "<div class='hero-wrapper'>";
      if ($secure == 0) {
        echo "<h1 class='centered-heading margin-bottom-32px' style='color:red;'>The 2nd Floor is not secure.</h1>";
      }
      elseif ($secure == 1) {
        echo "<h1 class='centered-heading margin-bottom-32px' style='color:#66FF00;'>The 2nd Floor is secure.</h1>";
      }
  
        echo "</div>";
      echo "</div>";
    echo "</div>";
  echo "</section>";
  echo "<section class='hero-heading-center wf-section'>";
    echo "<div class='container'>";
    echo "<table>";
      echo "<tr>";
        echo "<th style= 'width: 25%; font-size: 30px; '>Device Room</th>";
        echo "<th style= 'width: 25%; font-size: 30px; '>Type</th>" ;
        echo "<th style= 'width: 25%; font-size: 30px; '>State</th>";
    echo "</tr>";
    while($row = $result1->fetch_assoc()) {
      echo"<tr>";
        echo "<td style='text-align: center; height: 50px; vertical-align: bottom; font-size: 25px;'>".$row['device_room']."</td>";
        echo "<td style='text-align: center; height: 50px; vertical-align: bottom; font-size: 25px;'>".$row['device_type']."</td>";
        
        if($row['device_type'] == "contact" && $row['device_state'] == 'on') {
          echo"<td style='text-align: center; height: 50px; vertical-align: bottom; color:red; font-size: 25px;'>Door Open </td>";
        }
        elseif($row['device_type'] == "contact" && $row['device_state'] == 'off') {
          echo"<td style='text-align: center; height: 50px; vertical-align: bottom; color:#66FF00; font-size: 25px;'>Door Closed</td>";
        }
        elseif($row['device_type'] == "motion" && $row['device_state'] == 'on') {
          echo"<td style='text-align: center; height: 50px; vertical-align: bottom; color:red; font-size: 25px;'>Motion Detected</td>";
        }
        elseif($row['device_type'] == "motion" && $row['device_state'] == 'off') {
          echo"<td style='text-align: center; height: 50px; vertical-align: bottom; color:#66FF00; font-size: 25px;'>No Motion Detected</td>";
        }
        
      echo"</tr>";
    }
      
    echo"</table>";
    echo "</div>";
    echo "</div>";
  echo "</section>";
  echo "<section class='hero-heading-center wf-section'>";

  ?>
  
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=632a181108141a036b8932b7" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>