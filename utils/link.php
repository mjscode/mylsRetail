<?php

function getLink($route,$replace = []) {
    //replace is what you're looking to change.
    //add a query string to route.
    $route.='?';

    //combines the current url with the replacement.
    $params = array_merge($_GET, $replace);

    // builds a new link
    $route .= http_build_query($params);

    return $route;
}

?>