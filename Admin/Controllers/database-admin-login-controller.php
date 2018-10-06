<?php 
// invoke autoload to get access to the propel generated models
require_once '../../vendor/autoload.php';

// require the config file that propel init created with your db connection information
require_once '../../generated-conf/config.php';



$flag1 = false;
$flag2 = false;
$flag3 = false;

session_start();
//echo $_SESSION['id'];
if(!empty($_SESSION)){
    header('Location: ../../Project');
}


if(!empty($_POST)){
        $conn = mysqli_connect('localhost', $_POST["username"], $_POST["password"]);
        if($conn){
                session_start();
		        $_SESSION["level"]=2;         
	       	    $_POST = array();	
                header("Location: create-admin.php");
        }
        else{
                header("Location: Refresh:0");
        }
        
}
else{

}



?>