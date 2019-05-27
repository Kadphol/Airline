<?php
    
    #include("config/config.php");
    $db = mysqli_connect("localhost","root","","airline");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    $Departure = mysqli_real_escape_string($db, $_POST["Departure"]);
    $Arrival = mysqli_real_escape_string($db, $_POST["Arrival"]);
    $RouteID = mysqli_real_escape_string($db, $_POST["RouteID"]);
    $AirplaneID = mysqli_real_escape_string($db, $_POST["AirplaneID"]);
    $Gate = mysqli_real_escape_string($db, $_POST["Gate"]);
    $Status = mysqli_real_escape_string($db, $_POST["Status"]);
    $Price = mysqli_real_escape_string($db, $_POST["Price"]);

    $sql= "INSERT INTO flight (RouteID,DepartureDate,ArrivalDate,AirplaneID,Gate,Status,Price)
    VALUES('$RouteID','$Departure','$Arrival','$AirplaneID','$Gate','$Status',$Price)";

    if (!mysqli_query($db,$sql)) {
        die('Error: ' . mysqli_error($db));
    }
    header('location: AirportInformation.php');

?>