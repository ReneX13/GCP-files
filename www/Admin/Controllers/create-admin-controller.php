
<?php 
// invoke autoload to get access to the propel generated models
require_once '../../vendor/autoload.php';

// require the config file that propel init created with your db connection information
require_once '../../generated-conf/config.php';



$flag1 = false;
$flag2 = false;
$flag3 = false;

$logged = false;

    session_start();
    if(!empty($_SESSION)){
        if($_SESSION["level"] != 2){
            session_unset();
            session_destroy();
            header("Location: ../../Project/");
        }
        else if(!empty($_POST)){
		
	    $admin = AdminQuery::create()->findOneByUsername($_POST["username"]);
	    if(!$admin){
	        $new_admin = new Admin();
                $new_admin->setUsername($_POST["username"]);
                $new_admin->setPasswordHash($_POST["password"]);
                $new_admin->save();
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
