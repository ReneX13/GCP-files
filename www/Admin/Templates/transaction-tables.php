<div class = "container">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">User</th>
                    <th scope="col">Transaction</th>
                    <th scope="col">Text File</th>
                    <th scope="col">Purchase Date</th>
		    <th scope="col">Subtotal</th>
		    <th scope="col">Taxes</th>
		    <th scope="col">Total</th>       
		</tr>
            </thead>
            <tbody>
<?php
		    $sum_subtotal = 0;
		    $sum_taxes = 0;
		    $sum_total = 0;
                    $users = UsersQuery::create()->find();
                    foreach($users as $p){
	            $transactions = TransactionsQuery::create()->filterByUserId($p->getId())->find();
		 
                    foreach($transactions as $t){ 
	           ?>		
                <tr>
                    <th scope="row"><?php echo $p->getId()." - ".$p->getEmail(); ?></th>

<?php
			
		   
?>
		    <td><?php echo $t->getConfirmation(); ?></td>
		    <td><?php echo "<a href = '../../paypal/logs/".$t->getConfirmation().".txt'> View </a>" ?></td>
		    <td><?php echo $t->getPurchaseDatetime()->format('m/d/y h:i a'); ?></td>
		    <td><?php $sum_subtotal += $t->getGross() - $t->getTaxes();
			      echo $t->getGross() - $t->getTaxes(); ?></td>
		    <td><?php $sum_taxes += $t->getTaxes();
			      echo $t->getTaxes(); ?></td>
		    <td><?php $sum_total += $t->getGross();
			      echo $t->getGross(); ?></td>
		</tr>
		<?php } 

		}?>
		<tfoot>
		    <tr style = "background-color : black; color : green;">
			<td>TOTALS</td>
			<td></td>
			<td></td>
			<td></td>
			<td><?php  echo $sum_subtotal; ?></td>
			<td><?php  echo $sum_taxes; ?></td>
			<td><?php  echo $sum_total; ?></td>
		    </tr>
		</tfoot>
            </tbody>
        </table>
    </div>
</div>
