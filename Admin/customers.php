
i<?php 
// invoke autoload to get access to the propel generated models
require_once '../vendor/autoload.php';

// require the config file that propel init created with your db connection information
require_once '../generated-conf/config.php';

$logged = false;
$id = -1;

session_start();
//echo $_SESSION['id'];
if(!empty($_SESSION)){
        $logged = true;
       // $id = $_SESSION['id'];
}

if(!$logged){
   header('Location: login.php');
}

if(!empty($_POST)){


}
?>

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
.jumbotron{
        #background-color: rgba(0,0,0,0);
}
.cus_title{
        margin-top: 10px;
        margin-bottom: 25px;
}
.custom-row{
	margin-top : 100px;
}
</style>
<nav class="navbar navbar-inverse">

<div class="row text-center cus_title"> 
     <h1>ReneX13's Shop</h1>  
</div>
 
<div class="container" >
<div class="row"> 
   
   <ul class="nav navbar-nav navbar">
      <li><a href="index.php"><span class="glyphicon glyphicon-cd"></span>Movies</a></li>
      <li class="active"><a href=""><span class="glyphicon glyphicon-shopping-cart"></span>Customers</a></li>
    </ul>
        <?php if($logged){
                echo "<form class='navbar-form navbar-right' action='logout.php'>
                        <button type='submit' class='btn btn-default'>Log Out</button>
                        </form>"; 
              } else{
                echo "
                        <form class='navbar-form navbar-right' action='login.php'>
                        <button type='submit' class='btn btn-default'>Login</button>
                        </form>";
              }
        ?>
 
    <form class="navbar-form navbar-right" action="/action_page.php">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
      </div>
      <button type = "submit"> Submit</button> 
    </form>
 </div>
</div>
</nav>


<?php
$users = UsersQuery::create()->find();
?>		<div class = "container">
		<div class="table-responsive">
			<table class="table table-bordered">
			   <thead>
				 <tr>
				 <th scope="col">ID</th>
				 <th scope="col">First Name</th>
				 <th scope="col">Last Name</th>
				 <th scope="col">Email</th>
				 <th scope="col">Paypal</th>
				 <th scope="col">Join Date</th>
			         </tr>
			   </thead>
		   <tbody>
<?php
foreach($users as $p){

?>		
			<tr>
				<th scope="row"><?php echo $p->getId(); ?></th>
				<td><?php echo $p->getFirstName(); ?></td>
				<td><?php echo $p->getLastName(); ?></td>
				<td><?php echo $p->getEmail(); ?></td>
				<td><?php echo $p->getPaypalEmail(); ?></td>
				<td><?php echo $p->getJoinDate()->format('m/d/y h:i a'); ?></td>
			</tr>
			

<?php }

?>
		    </tbody>
		      </table>
		</div>
		</div>

<input type = 'text' id = 'check_e' value ="empty" />
</body>

<script src = "admin.js"></script>
</html>
