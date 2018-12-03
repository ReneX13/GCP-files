<?php 
$user = UsersQuery::create()->findOneById($_SESSION["id"]);
$mail = MailingaddressQuery::create()->findOneByUserId($_SESSION["id"]);
?>
<div class ="container" id = "user-configuration-form">
    <div class="panel panel-default">
        <div class="panel-body">
            <form enctype="multipart/form-data" method = "POST" action ="../Controllers/edit-perform.php?id=<?php echo $_GET["id"];  ?>">
                <div class = "row">
                    <div class ="col-md-4">
		    	<fieldset><legend>User Information</legend>
				First Name
				<input type = 'text' class ='form-control' value = '<?php echo $user->getFirstName() ;?>' disabled/>
				Last Name
				<input type = 'text' class ='form-control' value = '<?php echo $user->getLastName() ;?>' disabled/>
				Email Name
                                <input type = 'text' class ='form-control' value = '<?php echo $user->getEmail() ;?>' disabled/>
			</fieldset>
		    </div>
		    <div class ="col-sm-2">
			
                    </div>
                    <div class ="col-sm-4">
		   	<fieldset><legend>User Information</legend>
                                Street
                                <input type = 'text' class ='form-control' value = '<?php echo $mail->getStreet() ;?>' disabled/>
                                City
                                <input type = 'text' class ='form-control' value = '<?php echo $mail->getCity() ;?>' disabled/>
                                State
                                <input type = 'text' class ='form-control' value = '<?php echo $mail->getState() ;?>' disabled/>
				Zip
                                <input type = 'text' class ='form-control' value = '<?php echo $mail->getZip() ;?>' disabled/>
                        </fieldset>
                    </div> 
		    </div>    
                </div>
            </form>     
	    <form action = "../Pages/change-password.php" id="form1" method ="POST")></form>
            <form action = "../Pages/change-email.php" id="form2" method ="POST")></form>
            <div class ="row custom-row">
                <div class ="col-md-4">
                    <button type="submit" form="form1" class="btn btn-default">Change Password</button>
                    <button type="submit" form="form2" class="btn btn-default">Change Email</button>
                </div>
            </div>

        </div>
    </div>

</div>
