<?php 
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
        $id = $_SESSION['id'];

  
}

if(!empty($_POST && $logged)){
	if($logged && isset($_POST["movieId"])){
		foreach($_POST as $key=>$val){
		       //echo $key."  ".$val."<br>";
		}
		
		$movieAlreadyInCart = false;
		foreach($_SESSION["cart"] as $key=>$val){
                        if($val['id'] == $_POST["movieId"]){
				$movieAlreadyInCart = true;
			}
                }  
		if(!$movieAlreadyInCart){
			array_push($_SESSION["cart"], array('id'=>$_POST["movieId"], "amount"=>1));
			$new_item = new Cart();
			$new_item->setUserId($id);
			$new_item->setProductId($_POST["movieId"]);	
			$new_item->setAmount(1);
			$new_item->save();
		}
		foreach($_SESSION["cart"] as $key=>$val){
                	echo $key."  ".$val['id']."  ".$val['amount']."<br>";
        	}  
	}	
	unset($_POST["movieId"]);	
}

?>

<html>
<head>
<title>Renex</title>
        <meta charset="utf-8">
<!--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    -->    

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
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
.custom-img{
	height : 16rem;
	max-width : 16rem;
		
}
.nav-item-custom{
  margin-right : 20px;
}
.custom-row{
 margin-bottom : 20px;
 margin-top : 20px;
}
</style>

<body>



<div class ="container-fluid">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="movies.php" ><span class="glyphicon glyphicon-cd"></span> Movies</a>
            </li>
            <li class="nav-item">
                <li><a class="nav-link" href="shopping-cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</a>
            </li>
        </ul>
    </div>


<span class="navbar-brand mb-0 h1">Renex Shop</span>
	<div class="navbar-collapse collapse w-100 order-md-3 dual-collapse2">
<?php if($logged){
                echo "
		<ul class='navbar-nav ml-auto'>
                <li class='nav-item nav-item-custom'>
			<form class='inline-form' action='logout.php'>
                        <button type='submit' class='btn btn-default'>Log Out</button>
                        </form>
		</li>
		</ul>
		"; 
              } else{
                echo "
		<ul class='navbar-nav ml-auto'>
                
		<li class='nav-item nav-item-custom'>
                    <form class='navbar-form navbar-right' action='login.php'>
                        <button type='submit' class='btn btn-default'>Login</button>
                    </form>
                </li>

		<li class='nav-item nav-item-custom'>
                                <small>or, <br> <a href='register.php'>Sign Up</a>!</small>
		</li>
	        </ul>";
              }
        ?>
    </div>

</nav>
</div>




<?php
$products = ProductsQuery::create()->find();
?>
<div class = "container">

<?php
$counter = 0;

foreach($products as $p){
if($counter == 0){
	$counter = 4;
	echo  "<div class = 'row custom-row'>";
}
$counter --;
?>              

<div class = "col col-md-3">
<div class="card" style="width: 16rem;">
  <img class="card-img-top custom-img" src="../Admin/images/<?php echo $p->getImgFile();  ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $p->getName();  ?></h5>
    <p class="card-text"><?php echo substr($p->getDescription(),0,100)." ..."  ?></p>
   
    <!-- Button to Open the Modal -->
  	<button type="button" class="btn btn-primary btnOpen" id ="btnOpen" data-toggle="modal" 
			href="#<?php echo $p->getId()."modal"; ?>">
    		More Details
  	</button>
	 <!-- The Modal -->
  <div class="modal fade" id="<?php echo $p->getId()."modal"; ?>">
    <div class="modal-dialog  modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
	<h4 class="modal-title"><?php echo $p->getName();  ?></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
	<div class="modal-body">
		<div class ="container">
			<div class = "row">
				<div class = "col col-md-3">
					<img class="card-img-top custom-img" src="../Admin/images/<?php echo $p->getImgFile();  ?>" alt="Card image cap">
				</div>
				<div class ="col col-lg-9">
					<div class = "row">
						<?php  echo $p->getDescription();  ?>
					</div>
					<br>
					<div class = "row">
						<div class ="col col-lg-3"><h3 style ="font-weight: 900"><?php echo $p->getRated();  ?></h3> </div>
						<div class ="col col-lg-3"><h3 style ="font-weight: 900">$<?php echo $p->getPrice();  ?></h3> </div> 	
					</div>			0
				</div>
			</div>
		</div>
	</div>
        
        <!-- Modal footer -->
        <div class="modal-footer" >
	  <form   method = "post">
		 <input type = 'hidden' name="movieId" value ="<?php echo $p->getId(); ?>">
		 <button type="sumbit" class="btn btn-secondary" >Add To Cart</button> 
	 </form>
	                                                                             
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>


  </div>
</div>
</div>


<?php
if($counter == 0){
        echo "</div>";
}
}

?>

     </div>
   <script src = "movies.js"></script>
</body>
<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2018 Copyright:
<a href="https://mdbootstrap.com/bootstrap-tutorial/"> MDBootstrap.com</a>
  </div>
  <!-- Copyright -->

</footer>
</html>