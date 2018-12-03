<?php 
    // invoke autoload to get access to the propel generated models
    require_once '../../vendor/autoload.php';

    // require the config file that propel init created with your db connection information
    require_once '../../generated-conf/config.php';

    session_start();
    if($_SESSION){
	 
    	if($_POST){
        	$u =  UsersQuery::create()->findOneByEmail($_POST["email"]);


        	$u->setPasswordHash($_POST['password']);
		$u->save();
	}
        header('Location: ../Pages/user-configuration.php');
        
    
    }
    else{
	header("Location : ../");
    }
?>
