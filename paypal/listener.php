<?php
	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		header('Location: ../index.php');
		exit();
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
	file_put_contents("logs/test.txt", $response);
	if ($response == "VERIFIED" && $_POST['receiver_email'] == "rfreyes-facilitator@outlook.com") {
		$cEmail = $_POST['payer_email'];
		$name = $_POST['first_name'] . " " . $_POST['last_name'];

		$price = $_POST['mc_gross'];
		$currency = $_POST['mc_currency'];
		$item = $_POST['item_number'];
		$paymentStatus = $_POST['payment_status'];			
		if ($item == "wordpressPlugin" && $currency == "USD" && $paymentStatus == "Completed" && $price == 67) {
			
		}
		$results ="";
                foreach($_POST as $key=>$val){
                        $results .= $key."  ".$val."\n";
                }
                file_put_contents("logs/test.txt", $results.$response. ": All Verified!");
	 
	}else{
		$results ="";
		foreach($_POST as $key=>$val){
			$results .= $key."  ".$val."\n";
		}
		file_put_contents("logs/test.txt", "failed! \n ".$results);
	}
?>
