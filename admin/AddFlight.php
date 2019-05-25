<?php
#include("config/config.php");
$db = mysqli_connect("localhost", "root", "", "airline");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$query = mysqli_query($db, "SELECT * FROM airport");
while ($result = mysqli_fetch_array($query)) {
    $airport[] = $result['AirportID'];
}
?>

<html>

<head>
</head>

<body>
    <h1>Add Flight</h1>
    <p>
        AirportID
        <select name="AirportID">
            <option value="" Selected>--AirportID--</option>
            <?php
            for ($i = 0; $i < sizeof($airport); $i++) { ?>
                <option> <?php echo $airport[$i] ?> </option>
            <?php } ?>
        </select><br><br>
        RouteID <input type="text" name="RouteID">
        From<input type="text" name="Departure"> to <input type="text" name="Arrival">
    </p>
    <hr>
    <p>
        <!-- FlightID <input type="text" name="FlightID"> Auto Increment -->
        Duration <input type="text" name="Duration"><br><br>
        Departure Time <input type="time" name="DepartureTime">
        Arrival Time <input type="time" name="ArrivalTime"><br><br>
        AirplanID <input type="text" name="AirplaneID"> <!--query AirplaneID-->
        Gate <input type="text" name="Gate">
    </p>
    <hr>
    <h2>Day of Oparation</h2>
    <p>
        StartOparation <input type="date" name="StartOparation">
        EndOparation <input type="date" name="EndOparation"><br><br>
        Day of Oparation:
        <input type="checkbox" name="DOO[]" value="mon">Monday
        <input type="checkbox" name="DOO[]" value="tue">Tuesday
        <input type="checkbox" name="DOO[]" value="wed">Wednesday
        <input type="checkbox" name="DOO[]" value="thu">Thursday
        <input type="checkbox" name="DOO[]" value="fri">Friday
        <input type="checkbox" name="DOO[]" value="sat">Saturday
        <input type="checkbox" name="DOO[]" value="sun">Sunday<br><br>
        Status
        <select name="Status">
            <option value="" Selected>--Status--</option>
            <option value="n">Not Active</option>
            <option value="a">Active</option>
        </select>
    </p>
    <input type="submit" value="Add Flight">
</body>

</html>