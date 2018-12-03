<?php 
    // invoke autoload to get access to the propel generated models
    require_once '../../vendor/autoload.php';

    // require the config file that propel init created with your db connection information
    require_once '../../generated-conf/config.php';
    $page = 4;
    $flag = false;
    session_start();
    if($_SESSION){
	$logged= true;
		
	if($_POST){
		$check_u = UsersQuery::create()->findOneByEmail($_POST["email"]);

		if(sizeof($check_u) > 0){
			$flag = true;	
		}else{
        		$u =  UsersQuery::create()->findOneById($_SESSION["id"]);

        		$u->setEmail($_POST['email']);
			$u->save();
			header("Location: ../");
		}
	}
        
    
    }
    else{
	header("Location: ../");
    }
?>
