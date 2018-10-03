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
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
body{
	height = 100%;
}
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
.image-settings{
        max-height: 100px;
        width: auto;

}
.border-3 {
    border-width:3px !important;
}
</style>

<body>



<div class ="container-fluid">
<div id = "test">testing </div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="movies.php" ><span class="glyphicon glyphicon-cd"></span> Movies</a>
            </li>
            <li class="nav-item">
                <li><a class="nav-link" href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</a>
            </li>
        </ul>
    </div>


<span  class="navbar-brand mb-0 h1">Renex Shop</span>
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


<div class ="container">

<table class="table table-dark table-striped" style ="margin-top : 50px ">
    <thead>
      <tr>
        <th>Movie</th>
        <th>Rated</th>
	<th>Amount</th>
	<th>Price</th>
	<th> </th>
      </tr>
    </thead>
    <tbody>
<?php
    	$totalBeforeTax  = 0;    
	if(!empty($_SESSION)){
		foreach($_SESSION["cart"] as $key=>$val){
		 	//echo $key."  ".$val["id"]." ".$val["amount"]."<br>";
			$product = ProductsQuery::create()->findPk($val['id']);
			$totalBeforeTax += $product->getPrice()*$val["amount"];
?>	
			<tr>
				<td>
				     <div class="container"> 
					 <div class = "row"> <?php echo $product->getName();  ?> </div>
					 <div class = "row"> <img class ="image-settings border-dark border border-3 rounded-right" src = "../Admin/images/<?php echo $product->getImgFile(); ?>"> </img>  </div>

				     </div>
				</div>
				<td>  <?php echo $product->getRated();  ?> </td>
				<td> 
					<!--<input type = "number" value = "<?php echo $val["amount"];  ?>"/ ></td>-->
					<div class="input-group mb-3 amountControl">
						<input type ="number" id ="movieID"value = "<?php echo $val['id']; ?>" hidden />
                                		<div class="input-group-prepend" id =" mButtonDiv">
                                    			<button class="btn btn-dark btn-sm minus-btn" id="minus-btn"><i class="fa fa-minus"></i></button>
                                		</div>
						<input type="number" id="qty_input" class="form-control form-control-sm" style ="width : 20px" value="<?php echo $val["amount"]; ?>" min="1">
                                		<div class="input-group-prepend" id ="pButtonDiv">
                                    			<button class="btn btn-dark btn-sm plus-btn" id="plus-btn"><i class="fa fa-plus"></i></button>
						<span class="glyphicon glyphicon-print"></span>
						</div>
					</div>
				</td>
				<td id="totalPrice"><input type="number" id = "price" value="<?php echo $product->getPrice(); ?>" hidden/> <div id="priceDisplay"> <?php echo $product->getPrice()*$val["amount"];  ?></div>  </td>
			
				<td id="remove-btn"> <button class ="btn btn-default" id ="removeButton"style = "font-weight: bold"> Remove </button> </td>
			</tr>
<?php	
		}
	}
?>
			<tfoot id ="TOTALS" class ="border-top border-3" >
				<td></td>
				<td></td>
				<td>
					<div class = "container">
						<div class ="row" >Subtotal</div>
						<div class ="row" >Taxes 8.25%</div>
						<div class ="row border-top" >Total</div>
					</div>
				</td>
				<td>
					<div class = "container">
						<div class ="row" id="subTotal"><?php echo $totalBeforeTax; ?></div>
						<div class ="row" id="taxes"><?php echo round(0.0825*$totalBeforeTax, 2); ?></div>
                                        	<div class ="row border-top" id="total"><?php echo round(1.0825*$totalBeforeTax, 2); ?></div>
                                        </div>
				</td>
				<td><button class ="btn btn-default" style = "font-weight: bold">Checkout</button></td>
			</tfoot>
    </tbody>
</table>
</div>





<script src = "shopping-cart.js"></script>

</body>
<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2018 Copyright:
<a href="https://mdbootstrap.com/bootstrap-tutorial/"> MDBootstrap.com</a>
  </div>
  <!-- Copyright -->

</footer>
</html>
