<nav class="navbar navbar-inverse">

<div class="row text-center cus_title"> 
     <h1>ReneX13's Shop</h1>  
</div>
 
<div class="container" >
<div class="row"> 
   
   <ul class="nav navbar-nav navbar">
       <?php 
            if($page == 0){
                echo "<li class='active'><a href=''><span class='glyphicon glyphicon-cd'></span>Movies</a></li>
                      <li><a href='Pages/customers.php'><span class='glyphicon glyphicon-shopping-cart'></span>Customers</a></li>";
            }
            else if($page == 1){
                echo "<li><a href='../'><span class='glyphicon glyphicon-cd'></span>Movies</a></li>
                      <li class='active'><a href=''><span class='glyphicon glyphicon-shopping-cart'></span>Customers</a></li>";
            }else{
                
            }
       ?>
    </ul>
        <?php if($logged){
                echo "<form class='navbar-form navbar-right' action='";
                if($page != 0){
                    echo "../";
                }else{
                    
                }
                echo "Controllers/logout.php'>
                        <button type='submit' class='btn btn-default'>Log Out</button>
                        </form>"; 
              } else{
                echo "
                        <form class='navbar-form navbar-right' action='login.php'>
                        <button type='submit' class='btn btn-default'>Login</button>
                        </form>";
              }
        ?>
 
    <form class="navbar-form navbar-right" action="/action_page.php">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
      </div>
      <button type = "submit"> Submit</button> 
    </form>
 </div>
</div>
</nav>