<?php
    //restarts session (going back to original values), client goes to login page.
    session_unset();
    http_response_code(302);
    header("Location: homepage");
?>   