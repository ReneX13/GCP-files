  <form class="form-signin" data-toggle="validator" method = "POST">
                <h2 class="form-signin-heading">Change Password</h2>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" name ="password" id="inputPassword" onchange="alert(this.value)" class="form-control custom_inputs" placeholder="Password" 
                        pattern = ".{6,}" required
                        oninvalid="setCustomValidity('Minimum length is 6 characters')" 
                        oninput="setCustomValidity('')" />

                    <label for="inputConfirmPassword" class="sr-only">Confirm Password</label>
                    <input type="password" name ="confirmPassword" id="inputConfirmPassword" class="form-control custom_inputs" placeholder="Confirm Password" required="">
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

