<?php 
// invoke autoload to get access to the propel generated models
require_once '../../vendor/autoload.php';

// require the config file that propel init created with your db connection information
require_once '../../generated-conf/config.php';

$page = 2;
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