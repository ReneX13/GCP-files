<div class ="container" id = "shoppingCartTable">

<?php echo "<table class='table table-dark table-striped' style ='margin-top : 50px '>
    <thead>
      <tr>
        <th>Movie</th>
        <th>Rated</th>
	<th>Amount</th>
	<th>Price</th>
	<th> </th>
      </tr>
    </thead>
    <tbody>";
?>

<?php
    	$totalBeforeTax  = 0;    
	if(!empty($_SESSION)){
		$cart = CartQuery::create()->filterByUserId($_SESSION["id"])->find();
		foreach($cart as $c){
		 	//echo $key."  ".$val["id"]." ".$val["amount"]."<br>";
			$product = ProductsQuery::create()->findPk($c->getProductId());

			if($product->getInventory()>0){
				$totalBeforeTax += $product->getPrice()*$c->getAmount();
			}
?>			
			<tr>
				<td>
				     <div class="container"> 
					 <div class = "row"> <?php echo $product->getName();  ?> </div>
					 <div class = "row"> <img class ="image-settings border-dark border border-3 rounded-right" src = "../../Admin/images/

<?php echo $product->getImgFile(); ?>"> </img>  </div>

				     </div>
				</div>
				<td>  <?php echo $product->getRated();  ?> </td>
				<td> 
					<!--<input type = "number" value = "<?php echo $val["amount"];  ?>"/ ></td>-->
					<div class="input-group mb-3 amountControl">
						<input type ="number" id ="movieID"value = "<?php echo $product->getId(); ?>" hidden />
						<div><?php echo $product->getInventory()."  In Stock";?></div>
                                		<div class="input-group-prepend" id =" mButtonDiv">
							<button class="btn btn-dark btn-sm minus-btn" id="minus-btn"><i class="fa fa-minus"
								<?php
			
									if($product->getInventory() >0){

									}else{
										echo "disabled";
									}
								?>></i></button>
                                		</div>
						<input type="number" id="qty_input" class="form-control form-control-sm" style ="width : 20px" value="<?php 
							if($product->getInventory()>0){
								echo $c->getAmount(); 

							}
							else{
								echo "0";
							}
			?>" min="1" max = "<?php  echo $product->getInventory();?>">
                                		<div class="input-group-prepend" id ="pButtonDiv" >
						<button class="btn btn-dark btn-sm plus-btn" id="plus-btn"><i class="fa fa-plus"<?php

							if($product->getInventory()>0)	{
							
							}
							else{
								echo "0";
							}
						?>></i></button>
						<span class="glyphicon glyphicon-print"></span>
						</div>
					</div>
				</td>
				<td id="totalPrice"><input type="number" id = "price" value="<?php 
					if($product->getInventory() > 0){
						echo $product->getPrice();
					}
					else{
						echo "0.00";
					}	
				?>" hidden/> 
				<div id="priceDisplay"> <?php 
					if($product->getInventory() > 0){	
						echo $product->getPrice()*$c->getAmount(); 
					}
					else{
						echo "0.00";
					}	
				?></div>  </td>
			
				<td id="remove-btn"> <button class ="btn btn-default" id ="removeButton"style = "font-weight: bold"> Remove </button> </td>
			</tr>
<?php	
		}
	}
?>
			<tfoot id ="TOTALS" class ="border-top border-3" >
				<td></td>
				<td></td>
				<td>
					<div class = "container">
						<div class ="row" >Subtotal</div>
						<div class ="row" >Taxes 8.25%</div>
						<div class ="row border-top" >Total</div>
					</div>
				</td>
				<td>
					<div class = "container">
						<div class ="row" id="subTotal"><?php echo $totalBeforeTax; ?></div>
						<div class ="row" id="taxes"><?php echo round(0.0825*$totalBeforeTax, 2); ?></div>
                                        	<div class ="row border-top" id="total"><?php echo round(1.0825*$totalBeforeTax, 2); ?></div>
                                        </div>
				</td>
				<td><?php require_once '../Templates/checkout-modal.php'; ?></td>
			</tfoot>
    </tbody>
</table>
</div>
