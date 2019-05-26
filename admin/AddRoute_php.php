<?php
     #include("config/config.php");
     $db = mysqli_connect("localhost","root","","airline");
     if (mysqli_connect_errno()) {
         echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

    $Origin = mysqli_real_escape_string($db, $_POST["Origin"]);
    $Destination = mysqli_real_escape_string($db, $_POST["Destination"]);
    $Miles = mysqli_real_escape_string($db, $_POST["Miles"]);

    $sql= "INSERT INTO route (Origin,Destination,Miles)
    VALUES('$Origin','$Destination',$Miles)";

    if (!mysqli_query($db,$sql)) {
        die('Error: ' . mysqli_error($db));
    }
    header('location: AirportInformation.php');
     
?>