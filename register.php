<!DOCTYPE html>
<html lang="en">
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
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="office_sign.html">Office Signs</a></li>
                    <li><a href="#">Weather Station</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="button" value="Submit">
            </div>
            <p>Already have an account? <a class="a1" href="office_sign_login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>