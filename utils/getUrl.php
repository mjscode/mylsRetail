<?php
    //checks if root is myslRetail, if so returns url minus mylsRetail.
    function getRootUrl($urlString){
        if( strstr($urlString,'mylsRetail') ){
            $inner = strstr($urlString,'mylsRetail');
            $newString = strstr($inner,'/');
        } else{
            $newString = $urlString;
        }
        if(strpos($newString,'/',+1)){
            return substr($newString,0,strpos($newString,'/',+1));
        }
        return $newString;
    }
    function getUrl($urlString){
        $getRootUrl = getRootUrl($urlString);
        if( strstr($getRootUrl,'?') ){
            return substr($getRootUrl,0,strpos($getRootUrl,'?'));
        }
        return $getRootUrl;
    }
?>