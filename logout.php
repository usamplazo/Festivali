<?php
    //odajava korisnika
    session_destroy();
    $_SESSION = array();
    header("Location:index.php");

?>