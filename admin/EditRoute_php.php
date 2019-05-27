<?php
#include("config/config.php");
$db = mysqli_connect("localhost", "root", "", "airline");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$query = mysqli_query($db, "SELECT * 
                                FROM route
                                WHERE RouteID='".$_POST["Edit"]."'");
while ($result = mysqli_fetch_array($query)) {
    $RouteID = $result['RouteID'];
    $Origin = $result['Origin'];
    $Destination = $result['Destination'];
    $Miles = $result['Miles'];
}
$NewOrigin = $_POST['Origin'];
$NewDestination = $_POST['Destination'];
$NewMiles = $_POST['Miles'];
if ($NewOrigin == "") {
    $NewOrigin = $Origin;
}
if ($NewDestination == "") {
    $NewDestination = $Destination;
}
if ($NewMiles == "") {
    $NewMiles = $Miles;
}

$sql = "UPDATE route 
        SET Origin = '$NewOrigin', Destination = '$NewDestination', Miles = $NewMiles
        WHERE RouteID = $RouteID";
    if (!mysqli_query($db,$sql)) {
        die('Error: ' . mysqli_error($db));
    }
    header("location: Route.php?RouteID=$RouteID");
?>