<?php
    //insures that the entire website will be protected by https protocol.
    // include "utils/httpsonly.php";
    // get link is use to keep the filter between pages.
    include "utils/link.php";
    include "utils/getUrl.php";
    //session will be used to store information.
    session_start();
if(empty($_SESSION)){
    //the starting values.
    $_SESSION['logged']=false;
    $_SESSION['admin']=false;
}

//default page of website is homepage.
$fullUrl = $_SERVER['REQUEST_URI'];
$request = getUrl($fullUrl);

switch($request) {
    case '/homepage':
    case "/":
        include 'controllers/homeController.php';
        exit;
    case "/signin": 
    include "controllers/signInController.php";
    exit;
    case "/catalog":
        include "controllers/catalogController.php";
        exit;
    case "/logout":
        include "utils/logOut.php";
        exit;
    case "/profile":
        include "controllers/profileController.php";
        exit;
    case "/admin":
        include "controllers/adminController.php";
        exit;
    case "/profileUpdate":
        include "models/profileUpdate.php";
        exit;
    default:
        http_response_code(404);
        die("$request is not valid");
        exit;
}
?>