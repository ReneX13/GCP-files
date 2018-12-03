
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
	 if($_SESSION['level'] == 1){
        header('Location: ../');
     }
     
    else if($_SESSION['level'] == 0){
        header('Location: ../../Project/');
    }
}
else if(!empty($_POST)){
	$u = AdminQuery::create()->findOneByUsername($_POST["username"]);
	if(empty($u)){
		$flag1 = true;	
	}else{
		if($u->login($_POST['password'])){
			$flag3 = true;

			$_SESSION['id'] = $u->getId();
            $_SESSION['level'] = 1;
			header("Location: ../");
		}else{
			$flag2 = true;
		}
	}
}
?>