
<?php
    // invoke autoload to get access to the propel generated models
    require_once '../../vendor/autoload.php';

    // require the config file that propel init created with your db connection information
    require_once '../../generated-conf/config.php';

    //$address = 'http://rfreyes1991.mynetgear.com/';
    $address = 'http://35.225.165.236/';
    $itemlist = "";
    //session_start();
    if($_SESSION){
	

	$subtotal = 0;
    	$counter = 1;
       
	$taxes = 0;

	$cart = CartQuery::create()->filterByUserId($_SESSION["id"]);
       foreach($cart as $c){
	       $product = ProductsQuery::create()->findOneById($c->getProductId());
	       if($product->getInventory() > 0){
                        $subtotal += $product->getPrice()*$c->getAmount();
			$itemlist .= "<input type='hidden' name='item_name_".$counter."' value='".$product->getName()."'>".
            	"<input type='hidden' name='quantity_".$counter."' value='".$c->getAmount()."'>".
            	"<input type='hidden' name='amount_".$counter."' value='".$product->getPrice()."'>";
			$counter++;
	       }
        }
        $taxes += $subtotal * 0.0825; 
    } 

?>
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
    
    <input type="hidden" name="cmd" value="_cart">
    <input type="hidden" name="upload" value="1">
    <input type="hidden" name="business" value="rfreyes-facilitator@outlook.com">
    <input type="hidden" name="custom" value ="<?php echo $_SESSION["id"]; ?>">
    
	<?php  echo $itemlist;  ?>

    <input type="hidden" name="tax_cart" value ="<?php echo $taxes; ?>">
    <input type="hidden" name="return" value="<?php echo $address; ?>Project/">
    <input type="hidden" name="cancel_return" value="<?php echo $address; ?>Project/">
   
    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
    <input type="hidden" name="notify_url" value="<?php  echo $address; ?>/paypal/listener.php">
<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1"> 
</form>

