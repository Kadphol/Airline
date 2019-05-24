<?php
    
    #include("config/config.php");
    $db = mysqli_connect("localhost","root","","airline");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    #error_reporting(~E_NOTICE);
    $AirportID = mysqli_real_escape_string($db, $_POST["AirportID"]);
    $Email = mysqli_real_escape_string($db, $_POST["Email"]);
    $Password = mysqli_real_escape_string($db, $_POST["Password"]);
    $Passport = mysqli_real_escape_string($db, $_POST["Passport"]);
    $FirstName = mysqli_real_escape_string($db, $_POST["FirstName"]);
    $LastName = mysqli_real_escape_string($db, $_POST["LastName"]);
    $sex = mysqli_real_escape_string($db, $_POST["sex"]);
    $DOB = mysqli_real_escape_string($db, $_POST["DOB"]);
    $Country = mysqli_real_escape_string($db, $_POST["Country"]);
    $PhoneNumber = mysqli_real_escape_string($db, $_POST["PhoneNumber"]);
    $Address = mysqli_real_escape_string($db, $_POST["Address"]);
    $Position = mysqli_real_escape_string($db, $_POST["Position"]);

    $sql= "INSERT INTO staff (AirportID,Email,Password,FirstName,LastName,sex,DOB,Country,PhoneNumber,Address,Passport,Position)
    VALUES('$AirportID','$Email','$Password','$FirstName','$LastName','$sex','$DOB','$Country','$PhoneNumber','$Address','$Passport','$Position')";

if (!mysqli_query($db,$sql)) {
    die('Error: ' . mysqli_error($db));
    }
    //echo "record added";
    header('location: WelcomeStaff.php');
    exit(0);

?>