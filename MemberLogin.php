<?php
    #include("admin/config/config.php");
    session_start();
    $db = mysqli_connect("localhost","root","","airline");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MYSQL: ".mysqli_connect_error();
    } 
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $password = mysqli_real_escape_string($db,$_POST['password']);
    
    $query = "SELECT Email,FirstName FROM Member WHERE Email = '$email' AND Password = '$password'";
    $result = mysqli_query($db,$query);
    if($row = mysqli_fetch_array($result)) {
        $_SESSION['MEmail'] = $row['Email'];
        $_SESSION['MName'] = $row['FirstName'];
        header('location: index.php');
    }
?>