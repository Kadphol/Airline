<?php
    session_start();

    unset($_SESSION['loggedIN']); //unset session
    session_destroy();  //destroy session
    header('location: index.php');
    exit();
?>