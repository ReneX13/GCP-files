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
}else{ header("Location: login.php");  }


if(!empty($_GET)){
	echo $_GET["id"];
	$product = ProductsQuery::create()->findPk($_GET["id"]);
}
else if(!empty($_POST)){
	echo "here";
	if(!empty($_FILES)){
		
        	foreach($_FILES["img"] as $key=>$val)
			echo $key."  ".$val."<br>";
        	if(move_uploaded_file($_FILES["img"]["tmp_name"],"./images/".$_FILES["img"]["name"])){
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
.jumbotron{c
        #background-color: rgba(0,0,0,0);
}
.cus_title{
        margin-top: 10px;
        margin-bottom: 25px;
}
.custom-row{
	margin-top : 100px;-
}
.custom_panel{
	height : 250px;
}
</style>
<body>
<nav class="navbar navbar-inverse">

<div class="row text-center cus_title"> 
     <h1>ReneX13's Shop</h1>  
</div>
 
<div class="container" >
<div class="row"> 
   
   <ul class="nav navbar-nav navbar">
      <li><a href="index.php">Home</a></li>
      <li class ="active"><a href=""><span class="glyphicon glyphicon-cd"></span> Movies</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</a></li>
    </ul>
        <?php if($logged){
                echo "<form class='navbar-form navbar-right' action='logout.php'>
                        <button type='submit' class='btn btn-default'>Log Out</button>
                        </form>"; 
              } else{
                echo "<div class='navbar-right navbar-text'>
                                <small>or, <br> <a href='register.php'>Sign Up</a>!</small>
                        </div>
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

<input type = "text" id ="check_e" hidden >

	    <div class ="container">
	    <div class="panel panel-default">
  	      <div class="panel-body">
               <form enctype="multipart/form-data" method = "POST" id="form1" action ="edit-perform.php?id=<?php echo $_GET["id"];  ?>">
		 <div class = "row">
		   <div class ="col-md-4">
		   Name <input name ="name" class="form-control" type = "text" value="<?php echo $product->getName(); ?>" required/>
		   Rated <input name = "rated"  class="form-control" type = "text" value="<?php echo $product->getRated(); ?>" required/>
		   Price <input name ="price"type="number" class="form-control" min="0.0" max="10000.0" step ="0.01"  value="<?php  echo $product->getPrice();   ?>" required/>
		   Inventory <input name ="inventory" type="number" class="form-control" min="0" max="10000"  value="<?php echo $product->getInventory();  ?>" required/>
		   Description <textarea class="form-control" style ="resize: none;" 
				name="description" rows="10" cols="50" required><?php  echo $product->getDescription();  ?></textarea>
                    </div> 
	 	   <div class ="col-sm-2">
		   </div>
		   <div class ="col-sm-4">
			<input type ="checkbox" id ="changeImg" name ="changeImg" value ="true"> Change Image?
		    	<div class="input-group">
            			<span class="input-group-btn">
                			<span class="btn btn-default btn-file">
					Browse… <input type="file" name ="img" style ="display : block;" id="imgInp" required/>
                			</span>
            			</span>
				
				<input type="text" name ="filename"  class="form-control" id = "fileName" value =" <?php echo $product->getImgFile();  ?>  " >
				
			
		
			</div>
			<div id ="AlertFileCurrentName" class="alert alert-info" role="alert">
                         	Current file name : <?php echo $product->getImgFile();  ?>       
                        </div>
			<div id ="AlertFileType" class="alert alert-danger" role="alert">
  				Only JPG, JPEG adn PNG files.
			</div>
			<div id = "AlertFileName" class ="alert alert-danger" role="alert">
				File name already exists!
			</div>
				<div class="panel panel-default">
              			<div class="panel-body custom_panel">
				<img id='img-upload' src =" <?php  echo "./images/".$product->getImgFile();?> "/>
   		    		</div>
				</div>
		   
		 </div>    
		</div>
            	</form>	
		<form action = "index.php" id="form2" method ="POST")></form>
		<div class ="row custom-row">
  			<div class ="col-md-4">
				<button type="submit" form="form1" class="btn btn-default">Submit</button>
                                <button type="submit" form="form2" class="btn btn-default">Cancel</button>
                        	
	 		</div>
			
		</div>
	     
	 </div>
	 </div>
	 </div>
	


</body>

<script src = "edit-product.js"></script>
</html>
