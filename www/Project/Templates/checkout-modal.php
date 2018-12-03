<?php
    $reciept_render = "<div class = 'row'><table> <thead><tr><td></td><td>Name</td><td>amount</td><td>price</td></tr></thead>";

    $cart = CartQuery::create()->filterByUserId($_SESSION["id"]);
    foreach($cart  as $p){
        //echo $key."  ".$val["id"]." ".$val["amount"]."<br>";
	    $product = ProductsQuery::create()->findPk($p->getProductId());
if($product->getInventory() > 0){
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
?> 

<!-- Button to Open the Modal -->
<button type="button" class="btn btn-default btn-checkout" id ="btn-checkout" data-toggle="modal" 
href="#checkout-modal">
Checkout
</button>

<!-- The Modal -->
<div class="modal fade" id="checkout-modal" style="color : black;">
    <div class="modal-dialog  modal-md">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Title</h4>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class ="container">
		   <div id = "RECIEPT">"
			 <?php echo $reciept_render; ?>
		   </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer" >
                <?php require_once '../Controllers/checkout.php'; ?>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
