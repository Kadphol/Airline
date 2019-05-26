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
    $Start = mysqli_real_escape_string($db, $_POST["Start"]);
    $End = mysqli_real_escape_string($db, $_POST["End"]);
    $Status = mysqli_real_escape_string($db, $_POST["Status"]);
    $Temp = $_POST["DOO"];
    $Temp2 = '';
    for($i=0;$i<sizeof($Temp);$i++){
        $Temp2 = $Temp2.$Temp[$i].",";
       
    }
    $DOO  = substr($Temp2, 0, -1);
    
    $sql= "INSERT INTO flight (RouteID,DepartureTime,ArrivalTime,AirplaneID,Gate,StartOparation,EndOparation,Status,DOO)
    VALUES('$RouteID','$Departure','$Arrival','$AirplaneID','$Gate','$Start','$End','$Status','$DOO')";

    if (!mysqli_query($db,$sql)) {
        die('Error: ' . mysqli_error($db));
    }
    header('location: AirportInformation.php');

?>