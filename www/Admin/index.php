<?php require_once 'Controllers/index-controller.php'; ?>

<html>
    <head><title>Renex</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="Css/index.css">
	<link rel="stylesheet" href="Css/edit-product.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <style></style>
    <body>
        <?php require_once 'Templates/navbar.php'; ?>

        <?php
        $products = ProductsQuery::create()->find();
	?>

	<?php require_once 'Templates/add-products-form.php'; ?>				
        <div class = "container">
            <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Rated</th>
                        <th scope="col">Price</th>
			<th scope="col">Inventory</th>
			<th scope="col">Total Value</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
			$total_value = 0;
                    foreach($products as $p){

                    ?>		
                    <tr>
                        <th scope="row"><?php echo $p->getId(); ?></th>
                        <td>
                            <img class = "image-settings" src ="<?php  echo "./images/".$p->getImgFile(); ?>" ></img>
                            <form method ="POST" action ="Pages/edit-product.php?id=<?php echo $p->getId(); ?>">
                                <button type = "submit">Edit</button>
                            </form>
                        </td>
                        <td><?php echo $p->getRated(); ?></td>
			<td><?php echo $p->getPrice(); ?></td>

			<td <?php if($p->getInventory() <= 0) echo "style = 'background-color : rgba(70,0,0,50);' ";?> ><?php echo $p->getInventory(); ?></td>
			<td><?php if($p->getInventory() <= 0){ echo 0;} else {echo $p->getInventory() * $p->getPrice(); $total_value += $p->getInventory() * $p->getPrice();} ?>
                        <td><?php echo $p->getDescription(); ?></td>
                    </tr>

                    <?php } ?>
                    </tbody>
		  <tfoot>
			<tr>
				<td> </td>
				<td> </td>
				<td> </td>
                                <td> </td>
				<td>Total Value </td>
                                <td><?php echo $total_value; ?> </td>
				<td> </td>
			</tr>
		  </tfoot>
                </table>
            </div>
        </div>
    </body>

    <script src = "Scripts/add-product.js"></script>
</html>
