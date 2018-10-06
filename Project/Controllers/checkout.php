
<?php
    // invoke autoload to get access to the propel generated models
    require_once '../../vendor/autoload.php';

    // require the config file that propel init created with your db connection information
    require_once '../../generated-conf/config.php';

    $address = '127.0.0.1/Store/Project/';
    
    //session_start();
    if($_SESSION){
        $subtotal = 0;
     

?>
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
    
    <input type="hidden" name="cmd" value="_cart">
    <input type="hidden" name="upload" value="1">
    <input type="hidden" name="business" value="rfreyes-facilitator@outlook.com">

    
<?php
       $counter = 1;
       
       $taxes = 0;
       foreach($_SESSION["cart"] as $key=>$val){
			$product = ProductsQuery::create()->findPk($val['id']);
			$subtotal += $product->getPrice()*$val["amount"];
            echo "<input type='hidden' name='item_name_".$counter."' value='".$product->getName()."'>";
            echo "<input type='hidden' name='quantity_".$counter."' value='".$val["amount"]."'>";
            echo "<input type='hidden' name='amount_".$counter."' value='".$product->getPrice()."'>";
            $counter++;
        }
        $taxes += $subtotal * 0.0825; 
    }
?>
   
    <input type="hidden" name="tax_cart" value ="<?php echo $taxes; ?>">
    <input type="hidden" name="return" value="<?php echo $address; ?>">
    <input type="hidden" name="cancel_return" value="<?php echo $address; ?>">
   
    <input type="hidden" name="notify_url" value="http://rfreyes1991.mynetgear.com/paypal/listener.php">
    <button type="sumbit" class="btn btn-secondary" >Paypal</button> 
</form>

