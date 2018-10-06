<div class ="container-fluid">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
<?php
    if($page == 1){
        echo "<li class='nav-item active'>
                <a class='nav-link active' >Home</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='Pages/movies.php' ><span class='glyphicon glyphicon-cd'></span> Movies</a>
            </li>";
        
        if($logged){
            echo "<li class='nav-item'>
                <li><a class='nav-link' href='Pages/shopping-cart.php'><span class='glyphicon glyphicon-shopping-cart'></span> Shopping Cart</a>
            </li>";
        }
    }
    else if($page == 2){
        echo "<li class='nav-item'>
                <a class='nav-link' href='../'>Home</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link active'><span class='glyphicon glyphicon-cd'></span> Movies</a>
            </li>";
        
        if($logged){
            echo "<li class='nav-item'>
                    <li><a class='nav-link' href='shopping-cart.php'><span class='glyphicon glyphicon-shopping-cart'></span> Shopping Cart</a>
                </li>";
        }
    }
    else if($page == 3){
        echo "<li class='nav-item'>
                <a class='nav-link' href='../'>Home</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link ' href='movies.php' ><span class='glyphicon glyphicon-cd'></span> Movies</a>
            </li>
            <li class='nav-item'>
                <li><a class='nav-link active'><span class='glyphicon glyphicon-shopping-cart'></span> Shopping Cart</a>
            </li>";
    }
    else{
        "ERROR: Invalid page!";
    }
?>
        </ul>
    </div>


    <span  class="navbar-brand mb-0 h1"><h1>Renex Shop</h1></span>
	<div class="navbar-collapse collapse w-100 order-md-3 dual-collapse2">
<?php 
        if($logged){
                echo "<ul class='navbar-nav ml-auto'>
                            <li class='nav-item nav-item-custom'>
                        <form class='inline-form' action='";
                if($page != 1)
                    echo "../";
                echo "Controllers/logout.php'>
                                    <button type='submit' class='btn btn-default'>Log Out</button>
                                    </form>
                    </li>
                    </ul>"; 
        } 
        else{
                echo "<ul class='navbar-nav ml-auto'>

                    <li class='nav-item nav-item-custom'>
                                <form class='navbar-form navbar-right' action='";
                if($page == 1)
                    echo "Pages/";
                echo "login.php'>
                                    <button type='submit' class='btn btn-default'>Login</button>
                                </form>
                            </li>

                    <li class='nav-item nav-item-custom'>
                                            <small>or, <br> <a href='";
                if($page == 1)
                    echo "Pages/";
                echo "register.php'>Sign Up</a>!</small>
                    </li>
                        </ul>";
        }
?>
    </div>

</nav>
</div>