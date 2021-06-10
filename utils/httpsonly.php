<?php
//ensures https protocal.
if(isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "on") {
    header("Location: http://{$_SERVER['HTTPS_HOST']}{$_SERVER['REQUEST_URI']}");
    exit;
}

?>