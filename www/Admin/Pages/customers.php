
<?php require_once '../Controllers/customers-controller.php'; ?>

<html>
<head>
<title>Renex</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="admin.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>

</style>
<body>
    <?php require_once '../Templates/navbar.php'; ?>
    <?php require_once '../Templates/customers-table.php'; ?>
    <?php require_once '../Templates/transaction-tables.php' ?>    
</body>

<script src = "admin.js"></script>
</html>
