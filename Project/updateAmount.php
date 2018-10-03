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
else{
	
}
if($_REQUEST["type"] == 0){
	echo "testing1 <br>";
	foreach($_SESSION["cart"] as $key=>$val){
                        if($val["id"] == $_REQUEST["q"])
                                $_SESSION["cart"][$key]["amount"] --;  
        }  

	//$_SESSION["cart"][$_REQUEST["q"]]["amount"] --;
}

else if($_REQUEST["type"] == 1){
	 echo "testing2 <br>";  
	 foreach($_SESSION["cart"] as $key=>$val){
                        if($val["id"] == $_REQUEST["q"])
				$_SESSION["cart"][$key]["amount"] ++;  
        }   
       // $_SESSION["cart"][$_REQUEST["q"]]["amount"] ++;
}
else if($_REQUEST["type"]==3){
	echo "testing3 <br>";
	foreach($_SESSION["cart"] as $key=>$val){
		if($val["id"] == $_REQUEST["q"]){
			unset($_SESSION["cart"][$key]);
			$item = CartQuery::create()->filterByUserId($id)->filterByProductId($val["id"]);
			if(!empty($item)){
				$item->delete();
			}
		}
	}	
}

foreach($_SESSION["cart"] as $key=>$val){
                        echo $key."  ".$val['id']."  ".$val['amount']."<br>";
}  

//echo $_REQUEST["q"]."  ".$_REQUEST["type"]."  ";

?>
