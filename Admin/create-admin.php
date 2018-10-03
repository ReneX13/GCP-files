
<?php 
// invoke autoload to get access to the propel generated models
require_once '../vendor/autoload.php';

// require the config file that propel init created with your db connection information
require_once '../generated-conf/config.php';



$flag1 = false;
$flag2 = false;
$flag3 = false;

$logged = false;

session_start();
if(!empty($_SESSION)){
	if($_SESSION["logged"] != 1){
		header("Location: admin.php");
	}
	session_unset();
        session_destroy();
}
else if(!empty($_POST)){
	echo $_POST["username"]."<br>";
	echo $_POST["password"]."<br>";

	//$hash = PHPassLib\Hash\BCrypt::hash($_POST["password"]);
	//echo $hash."<br>";
	$new_admin = new Admin();
	$new_admin->setUsername($_POST["username"]);
	$new_admin->setPasswordHash($_POST["password"]);
	$new_admin->save();

	//header("Location: login.php");
}else{
        header("Location: admin.php");
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
	background-color: red;
}

</style>
<body>
	<div class="container text-center" >
		<div class="jumbotron">
		  <h3>Renex</h3>    
			

	<form class="form-signin" method = "POST">
        	<h2 class="form-signin-heading">Enter New Admin Information</h2>
        	
		<?php
                        if($flag1){
                        echo "<div class='alert alert-danger'>
                                <strong>Info!</strong> Username Incorrect!
                              </div>";
			}
                ?>
		<label for="inputEmail" class="sr-only">New Admin Username</label>
       		<input type="text" name ="username" id="inputEmail" class="form-control custom_inputs" placeholder="New Admin Username" required="" autofocus="">
        	

 		<?php
                       if($flag2){
                        echo "<div class='alert alert-danger'>
                                <strong>Info!</strong> Password Incorrect!
                              </div>";
			}
                ?>
		<label for="inputPassword" class="sr-only">New Password</label>
        	<input type="password" name = "password" id="inputPassword" class="form-control custom_inputs" placeholder="New Password" required="">
       
        	<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	 </form>
	<form method = "POST" action = "login.php">
                <button class="btn btn-lg btn-primary btn-block" type="submit"> Cancel </button>
        </form>
	</div>
</body>
</html>
