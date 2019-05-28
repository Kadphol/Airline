<?php
    #include("config/config.php");
    $db = mysqli_connect("localhost", "root", "", "airline");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $query = mysqli_query($db, "SELECT * 
                                    FROM flight f, route r 
                                    WHERE f.RouteID=r.RouteID AND FlightID='" . $_POST["Edit"] . "'");
    while ($result = mysqli_fetch_array($query)) {
        $FlightID = $result['FlightID'];
        $Departure = $result['DepartureDate'];
        $Arrival = $result['ArrivalDate'];
        $RouteID = $result['RouteID'];
        $AirplaneID = $result['AirplaneID'];
        $Gate = $result['Gate'];
        $Status = $result['Status'];
        $Origin = $result['Origin'];
        $Destination = $result['Destination'];
        $Price = $result['Price'];
    }
    $NewRoute = $_POST['RouteID'];
    $NewDeparture = $_POST['Departure'];
    $NewArrival = $_POST['Arrival'];
    $NewAirplaneID = $_POST['AirplaneID'];
    $NewGate = $_POST['Gate'];
    $NewStatus = $_POST['Status'];
    $NewPrice = $_POST['Price'];
    if ($NewRoute == "") {
        $NewRoute = $RouteID;
    }
    if ($NewDeparture == "") {
        $NewDeparture = date_create($Departure)->format('Y-m-d H:i');
    }
    if ($NewArrival == "") {
        $NewArrival = date_create($Arrival)->format('Y-m-d H:i');
    }
    if ($NewAirplaneID == "") {
        $NewAirplaneID = $AirplaneID;
    }
    if ($NewGate == "") {
        $NewGate = $Gate;
    }
    if ($NewStatus == "") {
        $NewStatus = $Status;
    }
    if ($NewPrice == "") {
        $NewPrice = $Price;
    }
    $sql = "UPDATE flight 
            SET RouteID = $NewRoute, DepartureDate = '$NewDeparture', ArrivalDate = '$NewArrival', RouteID='$NewRoute', AirplaneID='$NewAirplaneID', Gate='$NewGate', Status='$NewStatus',Price='$NewPrice'
            WHERE FlightID = $FlightID";
    if (!mysqli_query($db,$sql)) {
        die('Error: ' . mysqli_error($db));
    }
    header("location: Flight.php?FlightID=$FlightID");
?>