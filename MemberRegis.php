<?php
    session_start();
    $errors = array();
    $db = mysqli_connect("localhost","root","","airline");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MYSQL: ".mysqli_connect_error();
    } 
    $email = $_POST["Email"];
    $pwd = mysqli_real_escape_string($db,$_POST["Password"]);
    $passport = mysqli_real_escape_string($db,$_POST["Passport"]);
    $fname = mysqli_real_escape_string($db,$_POST["FirstName"]);
    $lname = mysqli_real_escape_string($db,$_POST["LastName"]);
    $sex = mysqli_real_escape_string($db,$_POST["sex"]);
    $DOB = mysqli_real_escape_string($db,$_POST["DOB"]);
    $country = mysqli_real_escape_string($db,$_POST["Country"]);
    $phone = mysqli_real_escape_string($db,$_POST["PhoneNumber"]);

    $check_query = "SELECT Email FROM Member WHERE Email = '$email' LIMIT 1";
    $result = mysqli_query($db,$check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['Email'] === $email) {
          array_push($errors, "email already exists");
        }
    }

    if(count($errors)==0) {
        $query = "INSERT INTO Member (Email,Password,Sex,FirstName,LastName,DOB,Country,PhoneNumber,Passport,MilesPoint)
        VALUES('$email',$pwd,'$sex','$fname','$lname','$DOB','$country',$phone,'$passport',0)";
        if (!mysqli_query($db,$query)) {
            die('Error: '.mysqli_error($db));
        } else{
            $_SESSION['MName'] = $fname;
            $_SESSION['MEmail'] = $email;
            echo "success";
        }
    }

?>