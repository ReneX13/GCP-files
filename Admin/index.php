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

	if(!empty($_FILES)){
		
        	foreach($_FILES["img"] as $key=>$val)
			echo $key."  ".$val."<br>";
        	if(move_uploaded_file($_FILES["img"]["tmp_name"],"./images/".$_POST["filename"])){
			
			$new_product = new Products();
			$new_product->setName($_POST["name"]);
			$new_product->setRated($_POST["rated"]);
			$new_product->setPrice($_POST["price"]);
			$new_product->setInventory($_POST["inventory"]);
			$new_product->setDescription($_POST["description"]);
			$new_product->setImgFile($_POST["filename"]);
			$new_product->save();
		
			echo "Success!";
        	}
        	else{
                	echo "Failed!";
       		}
	}else{echo "files is empty";}
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
      <li class ="active"><a href=""><span class="glyphicon glyphicon-cd"></span>Movies</a></li>
      <li><a href="customers.php"><span class="glyphicon glyphicon-shopping-cart"></span>Customers</a></li>
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


<form enctype="multipart/form-data" method = "POST">
	    <div class ="container">
	    <div class="panel panel-default">
  	      <div class="panel-body">
                <div class = "row">
		   <div class ="col-md-4">
                        Name <input name ="name" class="form-control" type = "text" required>
			Rated <input name="rated" class="form-control" type = "text" required>
			Price <input name="price" type="number" class="form-control" min="0.00" max="10000.00" step="0.01" required/>
			Inventory <input name="inventory" type="number" class="form-control" min="0" max="10000"  required/>
			Description <textarea name = "description" class="form-control" style ="resize: none;" name="description" rows="10" cols="50" required>Enter description...</textarea>
                    </div> 

	 	   <div class ="col-sm-2">
		   </div>
		   <div class ="col-sm-4">
		    	<div class="input-group">
            			<span class="input-group-btn">
                			<span class="btn btn-default btn-file">
                    				Browse… <input type="file" name ="img" style ="display : block;" id="imgInp" required>
                			</span>c
            			</span>
				
            			<input type="text" class="form-control" id = "fileName" name ="filename" required>
        		</div>
			<div id ="AlertFileType" class="alert alert-danger" role="alert">
  				Only JPG, JPEG adn PNG files.
			</div>
			<div id ="AlertFileName" class ="alert alert-danger" role ="alert">
				File name exists!	
			</div>
				<div class="panel panel-default">
              			<div class="panel-body custom_panel">
        				<img id='img-upload'/>
    		    		</div>
				</div>
		   
		 </div>    
		</div>
            	
		<div class ="row custom-row">
  			<div class ="col-md-4">
				<button type="submit" class="btn btn-default">Submit</button>
	 		</div>
		</div>
	  </div>
	 </div>
	 </div>
	
</form>

<?php
$products = ProductsQuery::create()->find();
?>		<div class = "container">
		<div class="table-responsive">
			<table class="table table-bordered">
			   <thead>
				 <tr>
				 <th scope="col">ID</th>
				 <th scope="col">Cover</th>
				 <th scope="col">Rated</th>
				 <th scope="col">Price</th>
				 <th scope="col">Inventory</th>
				 <th scope="col">Description</th>
			         </tr>
			   </thead>
		   <tbody>
<?php
foreach($products as $p){

?>		
			<tr>
				<th scope="row"><?php echo $p->getId(); ?></th>
					<td><img class = "image-settings" src =<?php  echo "'./images/".$p->getImgFile()."'"; ?>></img>
					<form method ="POST" action ="edit-product.php?id=<?php echo $p->getId(); ?>">
					
						<button type = "submit">Edit</button>
					</form>
				</td>
				<td><?php echo $p->getRated(); ?></td>
				<td><?php echo $p->getPrice(); ?></td>
				<td><?php echo $p->getInventory(); ?></td>
				<td><?php echo $p->getDescription(); ?></td>
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
