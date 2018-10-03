<?php 
// invoke autoload to get access to the propel generated models
require_once '../vendor/autoload.php';

// require the config file that propel init created with your db connection information
require_once '../generated-conf/config.php';

session_start();
if(!empty($_SESSION)){
        header("Location: index.php");
}

$flag = false;
if(!empty($_POST)){
	foreach($_POST as $key=>$val){
		//echo $key."  ".$val."<br>";
	}
	
	$u =  UsersQuery::create()->findOneByEmail($_POST["email"]);
	if(sizeof($u)>0){
		$flag = true;
		//echo "email exists<br>";
	}
	else{
	
	$new_user = new Users();
      
        $new_user->setFirstName($_POST["firstName"]);
        $new_user->setLastName($_POST["lastName"]);
        $new_user->setEmail($_POST["email"]);
	$new_user->setPaypalEmail($_POST["paypalEmail"]);
	
	
//	echo $_POST["username"]."<br>";
//	echo $_POST["password"]."<br>";
	
	
	$new_user->setPasswordHash($_POST['password']);
	$new_user->setJoinDate(date("Y-m-d H:i:s"));
	$new_user->save();
	//header('Location: registerComplete.php');
	}
}
else{
	//echo " Nothing!";
}

?>

<html>
<head>
<title>Renex</title>
        <meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    	<link href='https://fonts.googleapis.com/css?family=Lato:300,400,500' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">	

</head>
<style>
fieldset{
	margin-bottom: 50px;
}
.custom_inputs{
	margin-bottom: 15px;
}
</style>
<body>
        <div class="container text-center" >
                <div class="jumbotron">
                  <h3>Renex</h3>    
                </div>
        

        <form class="form-signin" data-toggle="validator" method = "POST">
                <h2 class="form-signin-heading">Register Account</h2>
		
<fieldset>
  <legend>Personal Info:</legend>
		<label for="inputFirstName" class="sr-only">First Name</label>
                	<input type="text" name ="firstName" id="inputFirstName" class="form-control custom_inputs" placeholder="First Name" required="" autofocus="">
                
		<label for="inputLastName" class="sr-only">Last Name</label>
                        <input type="text" name ="lastName" id="inputLstName" class="form-control custom_inputs" placeholder="Last Name" required="" autofocus="">
		<?php
			if($flag)
			echo "<div class='alert alert-danger'>
  				<strong>Info!</strong> Email you are trying to use has already been used. Try another one.
			      </div>";
		?>
		<label for="inputEmail" class="sr-only">Email address</label>
                	<input type="email" name ="email" id="inputEmail" class="form-control custom_inputs" placeholder="Email address" required="" autofocus="">
                
		<label for="inputPayPalEmail" class="sr-only">PayPal Email address</label>
                        <input type="email" name ="paypalEmail" id="inputPayPalEmail" class="form-control custom_inputs" placeholder="PayPal Email address" required="" autofocus="">
</fieldset>
<fieldset>
  <legend>Password:</legend>
  
		<label for="inputPassword" class="sr-only">Password</label>
              	  	<input type="password" name ="password" id="inputPassword" onchange="alert(this.value)" class="form-control custom_inputs" placeholder="Password" 
			pattern = ".{6,}" required
   			oninvalid="setCustomValidity('Minimum length is 6 characters')" 
  			oninput="setCustomValidity('')" />
               	
		<label for="inputConfirmPassword" class="sr-only">Confirm Password</label>
                        <input type="password" name ="confirmPassword" id="inputConfirmPassword" class="form-control custom_inputs" placeholder="Confirm Password" required="">
</fieldset>
<fieldset>
  <legend>Mailing Info:</legend>
                <label for="inpuCity" class="sr-only">City</label>
                        <input type="text" name ="city" id="inputCity" class="form-control custom_inputs" placeholder="City" required="" autofocus="">
                
                <label for="inputState" class="sr-only">State</label>
                        <input type="text" name ="state" id="inputState" class="form-control custom_inputs" placeholder="State" required="" autofocus="">

                <label for="inputAddress" class="sr-only">Address</label>
                        <input type="text" name ="address" id="inputyAddress" class="form-control custom_inputs" placeholder="Address" required="" autofocus="">
                
                <label for="inputZip" class="sr-only">Zip Code </label>
                        <input type="number" name ="zip" id="inputZip" class="form-control" placeholder="Zip Code" required="" autofocus="">
</fieldset>
		<div class="form-group">
                            <div class="g-recaptcha" data-sitekey="6LdkcXAUAAAAAOZbt3OFMvC05qNczb7xhhCW3-i5" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                            <div class="help-block with-errors"></div>
                </div>	
            
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up!</button>
        </form>
	<form class="form-signin" data-toggle="validator" method = "POST" action = "index.php" >

	<button class="btn btn-lg btn-primary btn-block" type="submit">Cancel</button>
	</form>
        </div>
<?php
//$password = "horriblepassword";

// Calculate a bcrypt hash from a password
//$hash = PHPassLib\Hash\BCrypt::hash($password);

//echo "First hash is: ".$hash."<br/>";
?>
</body>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
 <script src="validation.js"></script>
</html>
