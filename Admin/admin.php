<?php 
// invoke autoload to get access to the propel generated models
require_once '../vendor/autoload.php';

// require the config file that propel init created with your db connection information
require_once '../generated-conf/config.php';



$flag1 = false;
$flag2 = false;
$flag3 = false;

if(!empty($_POST)){
        $conn = mysqli_connect('localhost', $_POST["username"], $_POST["password"]);
        if($conn){
                session_start();
		$_SESSION["logged"]=1;         
	       	$_POST = array();	
                header("Location: create-admin.php");
        }
        else{
                header("Location: admin.php");
        }
        
}
else{

}



?>

<html>
<head>
<title>Renex</title>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
.custom_inputs{
        margin-bottom: 20px;
}
body{
	background-color: Blue;
}
</style>
<body>
	<div class="container text-center" >
		<div class="jumbotron">
		  <h3>Renex</h3>    
		
	

	<form class="form-signin" method = "POST">
        	<h2 class="form-signin-heading">Create Admin Account: <br> Please sign in</h2>
        	
		<?php
                        if($flag1){
                        echo "<div class='alert alert-danger'>
                                <strong>Info!</strong> Username Incorrect!
                              </div>";
			}
                ?>
		<label for="inputEmail" class="sr-only">Username</label>
       		<input type="text" name ="username" id="inputEmail" class="form-control custom_inputs" placeholder="Username" required="" autofocus="">
        	

 		<?php
                       if($flag2){
                        echo "<div class='alert alert-danger'>
                                <strong>Info!</strong> Password Incorrect!
                              </div>";
			}
                ?>
		<label for="inputPassword" class="sr-only">Password</label>
        	<input type="password" name = "password" id="inputPassword" class="form-control custom_inputs" placeholder="Password" required="">
       
        	<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	 </form>
	<form method = "POST" action = "login.php">
                <button class="btn btn-lg btn-primary btn-block" type="submit"> Cancel </button>
        </form> 
	</div>

</body>
</html>
