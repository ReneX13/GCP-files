<div class ="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <form enctype="multipart/form-data" method = "POST" id="form1" action ="../Controllers/edit-perform.php?id=<?php echo $_GET["id"];  ?>">
                <div class = "row">
                    <div class ="col-md-4">
                        Name <input name ="name" class="form-control" type = "text" value="<?php echo $product->getName(); ?>" required/>
                        Rated <input name = "rated"  class="form-control" type = "text" value="<?php echo $product->getRated(); ?>" required/>
                        Price <input name ="price"type="number" class="form-control" min="0.0" max="10000.0" step ="0.01"  value="<?php  echo $product->getPrice();   ?>" required/>
                        Inventory <input name ="inventory" type="number" class="form-control" min="0" max="10000"  value="<?php echo $product->getInventory();  ?>" required/>
                        Description <textarea class="form-control" style ="resize: none;" 
                        name="description" rows="10" cols="50" required><?php  echo $product->getDescription();  ?></textarea>
                    </div> 
                    <div class ="col-sm-2">

                    </div>
                    <div class ="col-sm-4">
                        <input type ="checkbox" id ="changeImg" name ="changeImg" value ="true"> Change Image?
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-default btn-file">
                                    Browse… <input type="file" name ="img" style ="display : block;" id="imgInp" required/>
                                </span>
                            </span>

                            <input type="text" name ="filename"  class="form-control" id = "fileName" value =" <?php echo $product->getImgFile();  ?>  " >
                        </div>
                        <div id ="AlertFileCurrentName" class="alert alert-info" role="alert">
                            Current file name : <?php echo $product->getImgFile();  ?>       
                        </div>
                        <div id ="AlertFileType" class="alert alert-danger" role="alert">
                            Only JPG, JPEG adn PNG files.
                        </div>
                        <div id = "AlertFileName" class ="alert alert-danger" role="alert">
                            File name already exists!
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-body custom_panel">
                                <img id='img-upload' src =" <?php  echo "../images/".$product->getImgFile();?> "/>
                            </div>
                        </div>
                    </div>    
                </div>
            </form>	
            <form action = "../" id="form2" method ="POST")></form>
            <div class ="row custom-row">
                <div class ="col-md-4">
                    <button type="submit" form="form1" class="btn btn-default">Submit</button>
                    <button type="submit" form="form2" class="btn btn-default">Cancel</button>
                </div>
            </div>

        </div>
    </div>
</div>