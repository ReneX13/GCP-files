<?php
	// invoke autoload to get access to the propel generated models
 require_once '../vendor/autoload.php';
//
// // require the config file that propel init created with your db connection information 
require_once '../generated-conf/config.php';
		//$transaction = new Transactions();
                //$transaction->setConfirmation("asdfasdfasdf1234asdfg");
                //$transaction->setUserId(6/*$_SESSION["id"]*/);
                //$transaction->setPurchaseDatetime(date('Y-m-d H:i:s'));
//$transaction->save();
//
/*
$product = ProductsQuery::create()->findOneById(2);
echo $product->getName()."  ".$product->getInventory()."<br>";
$sum  = $product->getInventory() - 1;
echo $sum."<br>";
                        $product->setInventory($sum);
echo $product->getName()."  ".$product->getInventory()."<br>";
$product->save();
*/
	file_put_contents("logs/test2.txt", "at least im in");
	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		//header('Location: ../index.php');
		file_put_contents("logs/test.txt", "something random first again");
		//exit();
	}

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://ipnpb.sandbox.paypal.com/cgi-bin/webscr");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "cmd=_notify-validate&" . http_build_query($_POST));
	$response = curl_exec($ch);
	curl_close($ch);
	file_put_contents("logs/test.txt","something random");
	if ($response == "VERIFIED" && $_POST['receiver_email'] == "rfreyes-facilitator@outlook.com") {
		
		$results ="";
                foreach($_POST as $key=>$val){
			$results .= $key."  ".$val."\n";
			//substr($string, 0, strlen($query)) === $query
		}
		//session_start();
		$transaction = new Transactions();
		$transaction->setConfirmation($_POST["txn_id"]);
		$transaction->setUserId($_POST["custom"]);
		$transaction->setPurchaseDatetime($_POST["payment_date"]);
		$transaction->setGross($_POST["mc_gross"]);
		$transaction->setTaxes($_POST["tax"]);
		$transaction->save();
		file_put_contents("logs/".$_POST["txn_id"].".txt", $results.$response. ": All Verified!");

		$cart = CartQuery::create()->filterByUserId($_POST["custom"])->find();
		
		foreach($cart as $p){
			
			$product = ProductsQuery::create()->findOneById($p->getProductId());
			$product->setInventory($product->getInventory() - $p->getAmount());
			$p->delete();
			$product->save();
		}
	 
	}else{
		$results ="";
		foreach($_POST as $key=>$val){
			$results .= $key."  ".$val."\n";
		}

		file_put_contents("logs/test.txt", "failed! \n ".$results);
	}
?>
