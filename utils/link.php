<?php

function getLink($route,$replace = []) {
    //replace is what you're looking to change.
    //add a query string to route.

    //combines the current url with the replacement.
    $params = array_merge($_GET, $replace);
    if(empty($params)){
        return $route;
    }
    // builds a new link
    $route.='?';
    $route .= http_build_query($params);

    return $route;
}

?>