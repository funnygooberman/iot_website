<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard.php");
    exit;
}
 
// Include config file
require_once "database.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: dashboard.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
<!DOCTYPE html><!--  This site was created in Webflow. https://www.webflow.com  -->
<!--  Last Published: Tue Sep 20 2022 21:28:29 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="632a2694f17249dced877a2c" data-wf-site="632a181108141a036b8932b7">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta content="Login" property="og:title">
  <meta content="Login" property="twitter:title">
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
<body class="body-2">
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
                  <a href="development.html" class="nav-dropdown-link w-dropdown-link">Office Signs</a>
                  <a href="development.html" class="nav-dropdown-link w-dropdown-link">Weather Station</a>
                  <a href="development.html" class="nav-dropdown-link w-dropdown-link">Parking Lot</a>
                  <div class="w-container"></div>
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
  <div class="w-form">
  <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>
    <form action="login.php" id="wf-form-Login-Form" name="wf-form-Login-Form" method="post" class="form form-2 form-3">
      <h1 class="heading-2">Login</h1>
      <label for="username" class="field-label-2">Username</label>
      <input type="text" class="text-field w-input form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" maxlength="256" name="username" data-name="Username" placeholder="Enter your username" id="username">
      <label for="password" class="field-label">Password</label>
      <input type="password" class="text-field-2 w-input form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" maxlength="256" name="password" data-name="Password" placeholder="Enter your password" id="password" required="">
      <input type="submit" value="Login" class="submit-button w-button">
      <a href="register.php" class="button w-button">Register</a>
    </form>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=632a181108141a036b8932b7" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>