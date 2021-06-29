<?php
include_once "utils/link.php";

if(!isset($page)) {//default value.
    $page = 0;
}
?>

<div class="row">
    <ul class="pager">   
        <li class="previous"><a class="btn"  
        <?php if ($page > 0){ //if there are previous items to display than button is an active link otherwise disable.
        echo 'href="'.getLink('catalog',["page" => $page - 1]).'"'; 
        }
        if ($page === 0) 
        echo " disabled";
        ?>
        >prev</a></li>
        <li class="next"><a class="btn" <?php
        if($more){//if there are more...
        echo 'href="'.getLink('catalog',["page" => $page + 1]).'"';
        }else{
            echo " disabled";
        }
        ?>
        >next</a></li>
        </ul>

</div>