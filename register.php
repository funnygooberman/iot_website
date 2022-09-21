<?php
// Include config file
require_once "database.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9.]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and periods.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    $query = "INSERT INTO display_data (userID) SELECT id FROM users WHERE username='$username'";
    db_query($query);
    
    // Close connection
    mysqli_close($link);
}
?>
<!DOCTYPE html><!--  This site was created in Webflow. https://www.webflow.com  -->
<!--  Last Published: Tue Sep 20 2022 21:28:29 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="632a2ebe8485e97018c7dbd7" data-wf-site="632a181108141a036b8932b7">
<head>
  <meta charset="utf-8">
  <title>Register</title>
  <meta content="Register" property="og:title">
  <meta content="Register" property="twitter:title">
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
<body class="body-3">
  <div data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navbar-logo-left-container shadow-three w-nav">
    <div class="container">
      <div class="navbar-wrapper">
        <a href="#" class="navbar-brand w-nav-brand"><img src="images/USAFA-IOT-logos_transparent.png" loading="lazy" srcset="images/USAFA-IOT-logos_transparent.png 500w, images/USAFA-IOT-logos_transparent.png 957w" sizes="100vw" alt=""></a>
        <nav role="navigation" class="nav-menu-wrapper w-nav-menu">
          <ul role="list" class="nav-menu-two w-list-unstyled">
            <li>
              <a href="http://index.html" class="nav-link">Home</a>
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
                  <div class="w-container"></div>
                </nav>
              </div>
            </li>
            <li>
              <div class="nav-divider"></div>
            </li>
            <li class="mobile-margin-top-10">
              <a href="http://login.php" class="button-primary w-button">Login</a>
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
    <form action="register.php" id="wf-form-Login-Form" name="wf-form-Login-Form" redirect="login.php" data-redirect="login.php" method="post" class="form form-2 form-3">
      <h1 class="heading-2">Register</h1>
      <label for="username" class="field-label-2">Username</label>
      <input type="text" class="text-field w-input form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" maxlength="256" name="username" data-name="Username" placeholder="Enter your username" id="username">
      <span class="invalid-feedback"><?php echo $username_err; ?></span>
      <label for="password" class="field-label">Password</label>
      <input type="password" class="text-field-2 w-input form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" maxlength="256" name="password" data-name="Password" placeholder="Enter your password" id="password" required="">
      <span class="invalid-feedback"><?php echo $password_err; ?></span>
      <label for="confirm_password" class="field-label-3">Confirm Password</label>
      <input type="password" class="text-field-3 text-field-4 w-input form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>" maxlength="256" name="confirm_password" data-name="Confirm_Password" placeholder="Confirm Password" id="confirm_password" required="">
      <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
      <input type="submit" value="Register" class="button w-button">
    </form>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=632a181108141a036b8932b7" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>