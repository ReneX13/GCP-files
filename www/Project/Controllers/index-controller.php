<?php 
    // invoke autoload to get access to the propel generated models
    require_once '../vendor/autoload.php';

    // require the config file that propel init created with your db connection information
    require_once '../generated-conf/config.php';

    $page = 1;
    $logged = false;
    $id = -1;

    session_start();
    if($_SESSION){
        $logged = true;
        $id = $_SESSION['id'];
    }
    else if($_POST){

    }
    else{

    }
?>