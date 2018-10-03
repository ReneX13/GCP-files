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
if(!empty($_POST)){
	foreach($_POST as $key=>$val){
		echo $key."  ".$val."<br>";
	}
	$product = ProductsQuery::create()->findPk($_GET["id"]);
        $product->setName($_POST["name"]);
        $product->setRated($_POST["rated"]);
        $product->setPrice($_POST["price"]);
        $product->setInventory($_POST["inventory"]);
        $product->setDescription($_POST["description"]);
        //$product->setImgFile($_POST["filename"]);
	//$product->save();
	
	if(isset($_POST["changeImg"])){
		echo "yup!";
		chmod('./images/'.$product->getImgFile(), 0777);
		//unlink('./images/'.$product->getImgFile());
		if (unlink('./images/'.$product->getImgFile())) {
    		  echo 'File deleted';
   		} else {
      		  echo 'Cannot remove that file';
   		}
		if(move_uploaded_file($_FILES["img"]["tmp_name"],"./images/".$_POST["filename"])){
			echo "it should had changed....";
			$product->setImgFile($_POST["filename"]);
		}else{echo "did not change file<br>";}
	}else{
		echo "nope!";
	}
	$product->save();
}
header("Location: admin.php");
?>

