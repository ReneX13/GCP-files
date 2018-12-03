<?php 
    // invoke autoload to get access to the propel generated models
    require_once '../../vendor/autoload.php';

    // require the config file that propel init created with your db connection information
    require_once '../../generated-conf/config.php';

    session_start();
    if(!empty($_SESSION)){
            header("Location: ../");
    }

    $flag = false;
    if(!empty($_POST)){
        foreach($_POST as $key=>$val){
            //echo $key."  ".$val."<br>";
        }

        $u =  UsersQuery::create()->findOneByEmail($_POST["email"]);
        if(sizeof($u)>0){
            $flag = true;
            //echo "email exists<br>";
        }
        else{

        $new_user = new Users();

            $new_user->setFirstName($_POST["firstName"]);
            $new_user->setLastName($_POST["lastName"]);
            $new_user->setEmail($_POST["email"]);
        $new_user->setPaypalEmail($_POST["paypalEmail"]);
        $new_user->setPasswordHash($_POST['password']);
        $new_user->setJoinDate(date("Y-m-d H:i:s"));
	$new_user->save();

	$new_mailing = new Mailingaddress();
	$new_mailing->setUserId($new_user->getId());
	$new_mailing->setState($_POST["state"]);
	$new_mailing->setCity($_POST["city"]);
	$new_mailing->setZip($_POST["zip"]);
	$new_mailing->setStreet($_POST["street"]);
	$new_mailing->save();
        header('Location: registerComplete.php');
        }
    }
    else{

    }
?>
