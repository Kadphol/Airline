<?php
    
    #include("config/config.php");
    $db = mysqli_connect("localhost","root","","airline");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        
    $RouteID = mysqli_real_escape_string($db, $_POST["RouteID"]);
    $Duration = mysqli_real_escape_string($db, $_POST["Duration"]);
    $Departure = mysqli_real_escape_string($db, $_POST["Departure"]);
    $Arrival = mysqli_real_escape_string($db, $_POST["Arrival"]);
    $AirplaneID = mysqli_real_escape_string($db, $_POST["AirplaneID"]);
    $Gate = mysqli_real_escape_string($db, $_POST["Gate"]);
    $Status = mysqli_real_escape_string($db, $_POST["Status"]);

    
    $sql= "INSERT INTO flight (RouteID,DepartureTime,ArrivalTime,AirplaneID,Gate,Status)
    VALUES('$RouteID','$Departure','$Arrival','$AirplaneID','$Gate','$Status')";

    if (!mysqli_query($db,$sql)) {
        die('Error: ' . mysqli_error($db));
    }
    header('location: AirportInformation.php');

?>