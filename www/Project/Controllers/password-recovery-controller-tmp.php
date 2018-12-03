<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");

// invoke autoload to get access to the propel generated models
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once '../../vendor/autoload.php';

// require the config file that propel init created with your db connection information
require_once '../../generated-conf/config.php';


    session_start();
    if(!empty($_SESSION)){
        if($_SESSION["level"] != 2){
            session_unset();
            session_destroy();
            header("Location: ../../Project/");
        }
        else if(!empty($_POST)){
		$u = UsersQuery::create()->findOneByEmail($_POST["email"]);                
            if($u){
	    	$u->setPasswordHash($_POST["password"]);
	    	$u->save();
	    }
                session_unset();
                session_destroy();
                header("Location: ../");
           
        }
    }
    else{
        header("Location: ../");
    }
?>
?>
