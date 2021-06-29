<?php
    if($_SESSION['admin']){//ensures proper authoriztion.
        if ( strstr($fullUrl, 'userUpgrade')){
            include 'models/userUpgrade.php';
            exit;
        }
        if ( strstr($fullUrl, 'updateItem')){
            include 'models/updateModel.php';
            exit;
        }
        if ( strstr($fullUrl, 'addItem')){
            include 'models/addItemModel.php';
            exit;
        }
        if ( strstr( $fullUrl,'deleteItem')){
            include 'models/deleteModel.php';
            exit;
        }
        http_response_code(404);
        die("$fullUrl is not valid");
        exit;
    };
?>