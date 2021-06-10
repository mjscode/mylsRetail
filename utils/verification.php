<?php
    //checks if client is logged in if not sends him to log in page. Used in profile page.
   if(empty($_SESSION['logged'])){
    header("Location: index.php?action=signin");
}
?>
