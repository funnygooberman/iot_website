<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: office_sign_login.php");
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

<!DOCTYPE html>
<html>
    <head>
        <link href="http://fonts.googleapis.com/css?family=Open+Sans">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <meta charset="UTF-8">
        <title>USAFA IOT</title>
    </head>

    <style>
	
	input[type='text2'] { font-size: 36px; }

	div.backG{
	  position: relative;
	  top: 0px;
	  left: 15%;
	  width: 1000px;
	  height: 640px;
	  background-image: url("bg11.png")
	}
	.absolute {
	  position: absolute;
	  top: 12%;
	  left: 12%;
	}
	div.absolute2 {
	  position: absolute;
	  top: 27%;
	  left: 20%;
	  width: 70%;
	}
	div.absolute3 {
	  position: absolute;
	  top: 35%;
	  left: 30%;
	  width: 70%;
	}
	div.absolute4 {
	  position: absolute;
	  top: 12%;
	  left: 70%;
	  width: 35%;
	}
	div.absolute5 {
	  position: absolute;
	  top: 28%;
	  left: 12%;
	  width: 20%;
	  height: 16%;
	}
	div.absolute6 {
	  position: absolute;
	  top: 100%;
	  left: 15%;
	  width: 10%;
	  height: 10%;
	}	

	.alert {
	  padding: 20px;
	  background-color: blue;
	  color: white;
	}

	.closebtn {
	  margin-left: 15px;
	  color: white;
	  font-weight: bold;
	  float: right;
	  font-size: 22px;
	  line-height: 20px;
	  cursor: pointer;
	  transition: 0.3s;
	}

.closebtn:hover {
  color: black;
}

	</style>

    <body>
    <header>
        <div class="container">
            
            <img src="assets/logo.png" alt="logo" class="logo" width="300" heigh="300">
            <nav>
                <ul>
                    <li><a href="officesign_dashboard.php">Home</a></li>
                    <li><a href="office_sign_logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <p>My Office Sign</p>

      
    </head>





<div class = "backG"> 
	<form action="singleEInkSubmit.php" align = "center" method="post" enctype="multipart/form-data">
	
	  <input class="absolute" type="text2" name="name" style="width: 500px" value = "<?php echo $name2; ?>" >
           <div class="absolute2"> <input type = "text" name="title" style="width 200px" value = "<?php echo $title2; ?>" ></div>
	  <div class="absolute3"> <textarea rows = "23" cols = "56" name = "message"> <?php echo $message2; ?> </textarea></div>
	  <div class="absolute4"> <input type = "text" name = "location" style="100px" value = "<?php echo $location2; ?>" ></div>
	  <div class="absolute5"> 
		<img src="<?php echo $file_path2 ?>" alt="Upload an image!" id="fileToUpload" style="height: 300%; width: 140%;"> 
		<br>
		<input type="file" id="actual-btn" hidden/>
		<label class="button2" for="actual-btn">Choose File</label>
           </div>
	  
	  <div class="absolute6"><button class = "button" type="submit">Submit</button></div> 
	 </form>
</div>
<input type = "text" name = "location" style="100px" value = "<?php echo $pi_id; ?>">



		
        <br>
	    <br>
    <?php //$connection->close(); ?>
    </body>
</html>



