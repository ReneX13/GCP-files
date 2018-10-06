<?php require_once 'Controllers/index-controller.php'; ?>

<html>
    <head><title>Renex</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="Css/index.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <style></style>
    <body>
        <?php require_once 'Templates/navbar.php'; ?>

        <?php
        $products = ProductsQuery::create()->find();
        ?>		
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
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
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
                        <td><?php echo $p->getInventory(); ?></td>
                        <td><?php echo $p->getDescription(); ?></td>
                    </tr>

                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>

    <script src = "Scripts/admin.js"></script>
</html>
