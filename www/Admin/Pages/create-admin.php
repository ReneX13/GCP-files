<?php require_once '../Controllers/create-admin-controller.php'; ?>

<html>
<head>
<title>Renex</title>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Css/create-admin.php">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style></style>
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

		<small>
                        UNDER DEVELOPMENT:
                        <br>
                        Change a Users password, click <a href = "../../Project/Pages/password_recovery.php">here</a>!
                </small>
		<?php require_once '../Templates/admin-tables.php'   ?>
            </div>
        </div>
    </body>
</html>
