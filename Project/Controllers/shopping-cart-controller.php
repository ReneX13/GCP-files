<?php 
    // invoke autoload to get access to the propel generated models
    require_once '../../vendor/autoload.php';

    // require the config file that propel init created with your db connection information
    require_once '../../generated-conf/config.php';

    $page = 3;
    $logged = false;
    $id = -1;

    session_start();
    //echo $_SESSION['id'];
    if(!empty($_SESSION)){
            $logged = true;
            $id = $_SESSION['id'];
    }else {
        header("Location: ../");
    }
?>