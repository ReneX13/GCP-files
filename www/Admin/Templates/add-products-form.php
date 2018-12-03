<div class ="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <form enctype="multipart/form-data" method = "POST" id="form1" action ="index.php">
                <div class = "row">
                    <div class ="col-md-4">
                        Name <input name ="name" class="form-control" type = "text" value="" required/>
                        Rated <input name = "rated"  class="form-control" type = "text" value="" required/>
                        Price <input name ="price"type="number" class="form-control" min="0.0" max="10000.0" step ="0.01"  value="" required/>
                        Inventory <input name ="inventory" type="number" class="form-control" min="0" max="10000"  value="" required/>
                        Description <textarea class="form-control" style ="resize: none;" 
                        name="description" rows="10" cols="50" required></textarea>
                    </div> 
                    <div class ="col-sm-2">

                    </div>
                    <div class ="col-sm-4">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-default btn-file">
                                    Browse… <input type="file" name ="img" style ="display : block;" id="imgInp" required/>
                                </span>
                            </span>

                            <input type="text" name ="filename"  class="form-control" id = "fileName" value ="" >
                        </div>
                        <div id ="AlertFileType" class="alert alert-danger" role="alert">
                            Only JPG, JPEG adn PNG files.
                        </div>
                        <div id = "AlertFileName" class ="alert alert-danger" role="alert">
                            File name already exists!
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-body custom_panel">
                                <img id='img-upload' src =""/>
                            </div>
                        </div>
                    </div>    
                </div>
            </form>	
            <form action = "../" id="form2" method ="POST")></form>
            <div class ="row custom-row">
                <div class ="col-md-4">
                    <button type="submit" form="form1" class="btn btn-default">Submit</button>
                    <button type ="reset" form="form1" class="btn btn-default">Reset</button>
                </div>
            </div>

        </div>
    </div>
</div>
