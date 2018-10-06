<?php
    $products = ProductsQuery::create()->find();
?>
<div class = "container">
<?php
        $counter = 0;

        foreach($products as $p){
            if($counter == 0){
                $counter = 4;
                echo  "<div class = 'row custom-row'>";
            }
            $counter --;
?>              

    <div class = "col col-md-3">
        <div class="card" style="width: 16rem;">
            <img class="card-img-top custom-img" src="../../Admin/images/<?php echo $p->getImgFile();  ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?php echo $p->getName();  ?></h5>
                <p class="card-text"><?php echo substr($p->getDescription(),0,100)." ..."  ?></p>

                <!-- Button to Open the Modal -->
                <button type="button" class="btn btn-primary btnOpen" id ="btnOpen" data-toggle="modal" 
                href="#<?php echo $p->getId()."modal"; ?>">
                More Details
                </button>
<?php
                 $notInCart = false;
                if($logged){
                   
                    foreach($_SESSION["cart"] as $key=>$val){
                        if($p->getId() == $val['id']){

                            $notInCart = true;
                            break;
                        }

                    }
                }
                if($logged){
                    if(!$notInCart){
                       
                    }
                    else{
                          echo "<div class = 'alert alert-success'> Already In Cart</div>";    
                    }

                }
                
?>
                <!-- The Modal -->
                <div class="modal fade" id="<?php echo $p->getId()."modal"; ?>">
                    <div class="modal-dialog  modal-lg">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title"><?php echo $p->getName();  ?></h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class ="container">
                                    <div class = "row">
                                        <div class = "col col-md-3">
                                            <img class="card-img-top custom-img" src="../../Admin/images/<?php echo $p->getImgFile();  ?>" alt="Card image cap">
                                        </div>
                                        <div class ="col col-lg-9">
                                            <div class = "row">
                                                <?php  echo $p->getDescription();  ?>
                                            </div>
                                            <br>
                                            <div class = "row">
                                                <div class ="col col-lg-3"><h3 style ="font-weight: 900"><?php echo $p->getRated();  ?></h3> </div>
                                                <div class ="col col-lg-3"><h3 style ="font-weight: 900">$<?php echo $p->getPrice();  ?></h3> </div> 	
                                            </div>			
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer" >
                                <form   method = "post">
                                    <input type = 'hidden' name="movieId" value ="<?php echo $p->getId(); ?>">
                                    <?php 
                                         if($logged){
                                            if(!$notInCart){
                                                echo "<button type='sumbit' class='btn btn-secondary' >Add To Cart</button>";
                                            }
                                            else{
                                                  echo "<button type='sumbit' class='btn btn-success' disabled>Already In Cart</button>";    
                                            }
                                            
                                        }
                                    ?>
                                    
                                </form>

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
        if($counter == 0){
            echo "</div>";
        }
    }

?>
</div>
