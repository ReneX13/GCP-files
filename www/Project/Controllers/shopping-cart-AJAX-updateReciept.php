<?php 
    // invoke autoload to get access to the propel generated models
    require_once '../../vendor/autoload.php';

    // require the config file that propel init created with your db connection information
    require_once '../../generated-conf/config.php';

    $logged = false;
    $id = -1;

    session_start();
    //echo $_SESSION['id'];
    if(!empty($_SESSION)){
        $logged = true;
        $id = $_SESSION['id'];
	$reciept_render = "<div class = 'row'><table> <thead><tr><td></td><td>Name</td><td>amount</td><td>price</td></tr></thead>";

    	$cart = CartQuery::create()->filterByUserId($_SESSION["id"]);
    	foreach($cart  as $p){
        //echo $key."  ".$val["id"]." ".$val["amount"]."<br>";
		$product = ProductsQuery::create()->findOneById($p->getProductId());
		if($prodcut->getInventory() > 0){
        		$totalBeforeTax += $product->getPrice()*$p->getAmount();
        		$info =   $p->getAmount()."x".$product->getName()."       ".$product->getPrice();
        		$reciept_render .= "<tr>
                                    <td>
                                        <img class='card-img-top image-settings' src='../../Admin/images/".$product->getImgFile()."' alt='Card image cap'>  
                                    </td>
                                    <td>".$product->getName()."</td>
                                    <td>".$p->getAmount()."</td>
                                    <td>".$product->getPrice()."</td>
			    </tr>"; 
		}		     
    	}
	$reciept_render .= "</table></div>";
	echo $reciept_render;
   }

?>
