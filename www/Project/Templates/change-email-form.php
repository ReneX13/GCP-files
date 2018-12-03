<div class = "container">
  <form class="form-signin" data-toggle="validator" method = "POST">
                <h2 class="form-signin-heading">Change Email</h2>

                    <label for="inputConfirmPassword" class="sr-only">Change Email</label>
		    <input type="email" name ="email" id="inputConfirmPassword" class="form-control custom_inputs" required>
		<?php
                        if($flag)
                        echo "<div class='alert alert-danger'>
                                <strong>Info!</strong> Email you are trying to use has already been used. Try another one.
                                </div>";
                    ?>
                </fieldset>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
            </form>
            
            <form class="form-signin" data-toggle="validator" method = "POST" action = "../Pages/user-configuration.php" >
                <button class="btn btn-lg btn-primary btn-block" type="submit">Cancel</button>
            </form>
        </div>

    </body>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="../Scripts/validation.js"></script>
</div>
