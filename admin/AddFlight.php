<?php
#include("config/config.php");
$db = mysqli_connect("localhost", "root", "", "airline");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$query = mysqli_query($db, "SELECT * FROM Airplane");
while ($result = mysqli_fetch_array($query)) {
    $AirplaneID[] = $result['AirplaneID'];
}
$query2 = mysqli_query($db, "SELECT * FROM route");
while ($result2 = mysqli_fetch_array($query2)) {
    $RouteID[] = $result2['RouteID'];
    $Origin[] = $result2['Origin'];
    $Destination[] = $result2['Destination'];
}

?>

<html>

<head>
</head>

<body>
    <form action="AddFlight_php.php" method="post">
        <h1>Add Flight</h1>
        <p>
            RouteID 
            <select name="RouteID">
                <option value="" Selected>--RouteID--</option>
                <?php
                for ($i = 0; $i < sizeof($RouteID); $i++) { ?>
                    <option> <?php echo $RouteID[$i]." ".$Origin[$i]."-".$Destination[$i] ?> </option>
                <?php } ?>
            </select><br><br>
        </p>
        <hr>
        <p>
            <!-- FlightID <input type="text" name="FlightID"> Auto Increment -->
            Departure Time <input type="datetime-local" name="Departure">
            Arrival Time <input type="datetime-local" name="Arrival"><br><br>
            AirplaneID 
            <select name="AirplaneID">
                <option value="" Selected>--AirplaneID--</option>
                <?php
                for ($i = 0; $i < sizeof($AirplaneID); $i++) { ?>
                    <option> <?php echo $AirplaneID[$i]?> </option>
                <?php } ?>
            </select><br><br>
            Gate <input type="text" name="Gate"><br><br>
            Status
            <select name="Status">
                <option value="" Selected>--Status--</option>
                <option value="n">Not Active</option>
                <option value="a">Active</option>
            </select><br><br>
            Price <input type="text" name="Price">
        </p>
        <input type="submit" value="Add Flight">
    </form>
</body>

</html>