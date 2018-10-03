<?php 
// invoke autoload to get access to the propel generated models
require_once 'vendor/autoload.php';

// require the config file that propel init created with your db connection information
require_once 'generated-conf/config.php';
?>

<html>
<head>
<title>Renex</title>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style></style>
<body>
	<div class="container text-center" >
		<div class="jumbotron">
		  <h3>Renex</h3>    
		</div>
	</div>

<?php $p = ProductsQuery::create()->findOne(); ?>
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="rfreyes-facilitator@outlook.com">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="item_name" value=<?php echo "'".$p->getName()."'"; ?>>
<input type="hidden" name="item_number" value="1">
<input type="hidden" name="amount" value=<?php echo "'".$p->getPrice()."'"; ?>>
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="button_subtype" value="services">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="no_shipping" value="1">
<input type="hidden" name="rm" value="1">
<input type="hidden" name="return" value="http://rfreyes1991.mynetgear.com/">
<input type="hidden" name="cancel_return" value="http://rfreyes1991.mynetgear.com/">
<input type="hidden" name="tax_rate" value="0.00">
<input type="hidden" name="shipping" value="0">
<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
<input type="hidden" name="notify_url" value="http://rfreyes1991.mynetgear.com/paypal/listener.php">
<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

<?php
$p = ProductsQuery::create()->findOne();
echo $p->getId(). " <br>";
echo $p->getName(). " <br>";
echo $p->getPrice(). " <br>";
echo $p->getInventory(). " <br>";
echo $p->getImgFile(). " <br>";
?>
</body>
</html>