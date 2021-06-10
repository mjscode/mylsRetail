<?php

function getLink($replace = []) {
    //replace is what you're looking to change.
    //index.php is the automatic page.
    $link = "index.php?";

    //combines the current url with the replacement.
    $params = array_merge($_GET, $replace);

    // builds a new link.
    $link .= http_build_query($params);

    return $link;
}

?>