
<?php $transactions = TransactionsQuery::create()->findByUserId($_SESSION["id"]); ?>
<div class ="container" id = "shoppingCartTable">

<table class='table table-dark table-striped' style ='margin-top : 50px '>
    <thead>
      <tr>
	<th>Confirmation</th>
        <th>Date</th>
        <th>Subtotal</th>
	<th>Taxes</th>
	<th>Total</th>
	<th> </th>
      </tr>
    </thead>
    <tbody>
    <?php

foreach($transactions as $t){

?>
	<tr>
	     <td><?php echo $t->getConfirmation(); ?></td>
	     <td><?php echo $t->getPurchaseDatetime()->format('Y-m-d H:i:s');; ?></td>
	     <td><?php echo $t->getGross() - $t->getTaxes(); ?></td>
	     <td><?php echo $t->getTaxes(); ?></td>
	     <td><?php echo $t->getGross(); ?></td>
	</tr>	
<?php
}
?>
    </tbody>
</table>
</div>
