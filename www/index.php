<?php 
// invoke autoload to get access to the propel generated models
require_once 'vendor/autoload.php';

// require the config file that propel init created with your db connection information
require_once 'generated-conf/config.php';
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
	.jumbotron{
		background-color: rgba(0,0,0,0.5);
		color : green;
	}
	body{
		background-color: blue;
	}
</style>
<body>
	<div class="container text-center" >
		<div class="jumbotron">
		  <h1>Renex</h1>    
		</div>
	</div>

</body>
</html>
