<?php
    session_start();

    unset($_SESSION['loggedIN']);
    session_destroy();
    header('location: index.php');
    exit();
?>