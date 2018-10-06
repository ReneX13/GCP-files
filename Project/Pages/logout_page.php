<?php 
    session_start();
    if(!empty($_SESSION)){
        header("Location: ../");
    }
?>

<html lang="en">
    <head><title>Renex</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <link href='https://fonts.googleapis.com/css?family=Lato:300,400,500' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">    
    </head>
    <body>
        <div class="container text-center" >
            <div class="jumbotron">
                <h3>Renex</h3>    
            </div>

            <h2 class="form-signin-heading">Logged</h2>
            You are logged out!<br> 
            Thank you, continue to the main page <a href = "../"> here </a>.                 
        </div>
    </body>
</html>
