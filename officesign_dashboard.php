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
    $name2 = $row['faculty_name'];
    $file_path2 = $row['file_path'];
    $location2 = $row['location'];
    $message2 = $row['message'];
    $title2 = $row['title'];
    
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
	  left: 1%;	
	  width: 1000px;
	  height: 500px;
	}
	.absolute {
	  position: absolute;
	  top: 27%;
	  left: 37%;
	}
	div.absolute2 {
	  position: absolute;
	  top: 37%;
	  left: 37%;
	}
	div.absolute3 {
	  position: absolute;
	  top: 45%;
	  left: 69%;
	}
	div.absolute4 {
	  position: absolute;
	  top: 30%;
	  left: 92%;
	}
	div.absolute5 {
	  position: absolute;
	  top: 45%;
	  left: 37.2%;
	  width: 10%;
	  height: 20%;
	}
	div.absolute6 {
	  position: absolute;
	  top: 150%;
	  left: 72%;
	  width: 10%;
	  height: 10%;
	}	

	.alert {
	  padding: 20px;
	  background-color: #42a2b8;
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

    <h1> My Office Sign </h1>

      
    </head>



<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  <?php echo $_SESSION['message'];?>
</div>



<div class = "backG"> 
	<form action="singleEInkSubmit.php" align = "center" method="post" enctype="multipart/form-data">

	  <img src="bg11.png" alt="BG Image" style="width: 20vw; min-width: 2600px;" />	
	  <input class="absolute" <input type="text2" name="faculty_name" value = "<?php echo $name2; ?>" >
           <div class="absolute2"> <input type = "text" name="title" value = "<?php echo $title2; ?>" ></div>
	  <div class="absolute3"> <textarea rows = "23" cols = "56" name = "message"> <?php echo $message2; ?> </textarea></div>
	  <div class="absolute4"> <input type = "text" name = "location" value = "<?php echo $location2; ?>" ></div>
	  <div class="absolute5"> 
		<img src="<?php echo $file_path2 ?>" alt="User Image" style="height: 300%; width: 280%;"> 
		<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		<input type="file" name="fileToUpload" id="fileToUpload"></textarea> 
           </div>
	  <div class="absolute6"><button type="submit">Submit</button></div> 
	 </form>
</div>




		
        <br>
	    <br>
	<body>


    <?php //$connection->close(); ?>
	</body>
    </body>
</html>



