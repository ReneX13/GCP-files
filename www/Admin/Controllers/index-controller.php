<?php 
// invoke autoload to get access to the propel generated models
require_once '../vendor/autoload.php';

// require the config file that propel init created with your db connection information
require_once '../generated-conf/config.php';
$page = 0;
$logged = false;
$id = -1;

session_start();
//echo $_SESSION['id'];
if(!empty($_SESSION)){
        
    if($_SESSION['level'] == 1){
        $logged = true;
        $id = $_SESSION['id'];
    }
}

if(!$logged){
   header('Location: Pages/login.php');
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
			header('Location: ./');
			echo "Success!";
        	}
        	else{
                	echo "Failed!";
       		}
	}else{echo "files is empty";}
}
?>
