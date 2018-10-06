<?php
// invoke autoload to get access to the propel generated models
require_once '../../vendor/autoload.php';

// require the config file that propel init created with your db connection information
require_once '../../generated-conf/config.php';



$flag1 = false;
$flag2 = false;
$flag3 = false;

session_start();
if(!empty($_SESSION)){
	header("Location: ../");
}

if(!empty($_POST)){
	
	$u = UsersQuery::create()->findOneByEmail($_POST["email"]);
	if(empty($u)){
		$flag1 = true;	
	}else{
		if($u->login($_POST['password'])){
			$flag3 = true;
			//echo "Successfull!";
			session_start();
			$_SESSION['id'] = $u->getId();
			$_SESSION['cart'] = array();
            $_SESSION['level'] = 0;
			$cart = CartQuery::create()->filterByUserId($u->getId());
			foreach($cart as $c){
				array_push($_SESSION['cart'], array('id'=>$c->getProductId(), 'amount'=>$c->getAmount())); 
			}
			header("Location: ../");
		}else{
			$flag2 = true;
		}
	}
}
else{

}


?>