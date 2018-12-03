<?php require_once '../Controllers/password-recovery-controller.php'; ?>

<html>
    <head><title>Renex</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="../Css/login.css">
    </head>
    <style></style>
    <body>
        <div class="container text-center" >
            <div class="jumbotron">
                <h3>Renex</h3>    
            </div>


            <form class="form-signin" method = "POST">
                <h2 class="form-signin-heading">Password Recovery</h2>

		<?php

                ?>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" name ="email" id="inputEmail" class="form-control custom_inputs" placeholder="Email address" required="" autofocus="">
		
		<fieldset><legend>Password:</legend>

                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" name ="password" id="inputPassword" onchange="alert(this.value)" class="form-control custom_inputs" placeholder="Password" 
                        pattern = ".{6,}" required
                        oninvalid="setCustomValidity('Minimum length is 6 characters')" 
                        oninput="setCustomValidity('')" />

                    <label for="inputConfirmPassword" class="sr-only">Confirm Password</label>
                    <input type="password" name ="confirmPassword" id="inputConfirmPassword" class="form-control custom_inputs" placeholder="Confirm Password" required="">
                </fieldset>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>

            <form class="form-signin" data-toggle="validator" method = "POST" action = "index.php" >
                <button class="btn btn-lg btn-primary btn-block" type="submit">Cancel</button>
            </form>

        </div>
    </body>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="../Scripts/validation.js"></script>
</html>
