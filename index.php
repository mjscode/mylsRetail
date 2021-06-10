<?php
    //insures that the entire website will be protected by https protocol.
    // include "utils/httpsonly.php";
    // get link is use to keep the filter between pages.
    include "utils/link.php";
    //session will be used to store information.
    session_start();
if(empty($_SESSION)){
    //the starting values.
    $_SESSION['logged']=false;
    $_SESSION['admin']=false;
}

//default page of website is homepage.
$action = "homepage";
if(!empty($_GET["action"])) {
    $action = $_GET["action"];
}
//if someone calls for a different page...
//this website is built along th mvc model.
switch($action) {
    case "homepage":
    include 'controllers/homeController.php';;
    exit;
    case "signin": 
    include "controllers/signInController.php";
    exit;
    case "catalog":
        include "controllers/catalogController.php";
        exit;
    case "logout":
        include "utils/logOut.php";
        exit;
    case "profile":
        include "controllers/profileController.php";
        exit;
        //if not valid action.
    default:
        die("Dont know how to $action");
}
?>