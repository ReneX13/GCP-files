<?php require_once '../Controllers/login-controller.php'; ?>

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
                <h2 class="form-signin-heading">Please sign in</h2>

                <?php
                    if($flag1){
                        echo "<div class='alert alert-danger'>
                            <strong>Info!</strong> Username Incorrect!
                            </div>";
                    }
                ?>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" name ="email" id="inputEmail" class="form-control custom_inputs" placeholder="Email address" required="" autofocus="">


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

            <form class="form-signin" data-toggle="validator" method = "POST" action = "index.php" >
                <button class="btn btn-lg btn-primary btn-block" type="submit">Cancel</button>
            </form>

		<small>Don't have an account,  <br> <a href="register.php">Sign Up</a>!</small><br>
		<small>
			UNDER DEVELOPMENT:
			<br>
			Forgot your password, click <a href = "../../Admin/Pages/database-admin-login.php">here</a>!
		</small>
            <?php
                if($flag3){
                    echo "<div class='alert alert-success'>
                        <strong>Info!</strong> Successful Login!
                        </div>";
                }
            ?>
        </div>
    </body>
</html>
