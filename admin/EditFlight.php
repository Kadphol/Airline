<?php
#include("config/config.php");
$db = mysqli_connect("localhost", "root", "", "airline");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$query = mysqli_query($db, "SELECT * 
                                FROM flight f, route r 
                                WHERE f.RouteID=r.RouteID AND FlightID='" . $_GET["Edit"] . "'");
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
}
//Airplane
$query1 = mysqli_query($db, "SELECT * FROM Airplane");
while ($result1 = mysqli_fetch_array($query1)) {
    $AllAirplaneID[] = $result1['AirplaneID'];
    //$AllAirport[] = $result1['AirportID'];
}
//Route
$query2 = mysqli_query($db, "SELECT * FROM route");
while ($result2 = mysqli_fetch_array($query2)) {
    $AllRouteID[] = $result2['RouteID'];
    $AllOrigin[] = $result2['Origin'];
    $AllDestination[] = $result2['Destination'];
}
// $Duration = $Departure->diff($Arrival);
error_reporting(~E_NOTICE);
?>
<html>

<body>
    <h1>Flight : <?php echo $FlightID ?></h1>
    <hr>
    <p>
        RouteID&emsp;<?php echo $RouteID ?><br>
        From <?php echo $Origin ?> to <?php echo $Destination ?><br>
    </p>

    <p>
        FlightID&emsp;<?php echo $FlightID ?><br>

        Departure Date and Time&emsp;<?php echo $Departure ?><br>
        Arrival Date and Time&emsp;<?php echo $Arrival ?><br>
        AirplaneID&emsp;<?php echo $AirplaneID ?><br>
        Gate&emsp;<?php echo $Gate ?><br>
        Status&emsp;<?php if ($Status == 'n') {
                        echo "Not Active";
                    } else {
                        echo "Active";
                    } ?><br>
    </p>
    <hr>
    <form action="EditFlight_php.php" method="post">
        RouteID
        <select name="RouteID">
            <option value="" Selected>--RouteID--</option>
            <?php
            for ($i = 0; $i < sizeof($AllRouteID); $i++) { ?>
                <option value="<?php echo $AllRouteID[$i]; ?>"> <?php echo $AllRouteID[$i] . " " . $AllOrigin[$i] . "-" . $AllDestination[$i] ?> </option>
            <?php } ?>
        </select><br>
        Departure Date and Time<input type="datetime-local" name="Departure" value="Departure"><br>
        Arrival Date and Time<input type="datetime-local" name="Arrival" value="Arrival"><br>
        AirplaneID 
        <select name="AirplaneID">
            <option value="" Selected>--AirplaneID--</option>
            <?php
            for ($i = 0; $i < sizeof($AllAirplaneID); $i++) { ?>
                <option value="<?php echo $AllAirplaneID[$i]; ?>"> <?php echo $AllAirplaneID[$i]." - ".$AllAirport[$i] ?> </option>
            <?php } ?>
        </select><br>
        gate <input type="text" name="Gate"><br>
        Status
        <select name="Status">
            <option value="">--Status--</option>
            <option value="n">Not Active</option>
            <option value="a">Active</option>
        </select><br>
        Price<input type="text" name="Price"><br>
        <button type="Submit" name="Edit" value="<?php echo $FlightID ?>" >Edit</button><br>
    </form>
   

</body>

</html> 