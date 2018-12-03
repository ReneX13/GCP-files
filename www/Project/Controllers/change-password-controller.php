<?php 
    // invoke autoload to get access to the propel generated models
    require_once '../../vendor/autoload.php';

    // require the config file that propel init created with your db connection information
    require_once '../../generated-conf/config.php';
$page = 4;
    session_start();
    if($_SESSION){
	$logged= true;
		
    	if($_POST){
        	$u =  UsersQuery::create()->findOneById($_SESSION["id"]);


        	$u->setPasswordHash($_POST['password']);
		$u->save();
		header("Location: ../");
	}
        
    
    }
    else{
	header("Location: ../");
    }
?>
