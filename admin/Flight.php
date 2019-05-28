<?php
    #include("config/config.php");
    $db = mysqli_connect("localhost", "root", "", "airline");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $query = mysqli_query($db, "SELECT * 
                                FROM flight f, route r 
                                WHERE f.RouteID=r.RouteID AND FlightID='".$_GET["FlightID"]."'");
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
    error_reporting(~E_NOTICE);
?>
<html>
    <body>
        <h1>FlightID : <?php echo $FlightID?></h1>
        <hr>
        <input type="button" value="<Back to AirportInformation" onclick="window.location.href = 'AirportInformation.php'">
        <form action="EditFlight.php" method="get">
            <button type="submit" name="Edit" value="<?php echo $FlightID ?>">Edit</button>
        </form>
        <form action="#" method="post">
            <button type="submit" name="Delete" value="1">Delete</button>
        </form>

        <hr>
        <p>
            RouteID&emsp;<?php echo $RouteID?><br>
            From <?php echo $Origin?> to <?php echo $Destination?><br>
        </p>
        
        <p>
            Departure Date and Time&emsp;<?php echo $Departure?><br>
            Arrival Date and Time&emsp;<?php echo $Arrival?><br>
            AirplaneID&emsp;<?php echo $AirplaneID?><br>
            Gate&emsp;<?php echo $Gate?><br>
            Status&emsp;<?php if($Status=='n'){echo "Not Active";}
                                else{echo "Active";}?><br>
            Price&emsp;<?php echo $Price ?><br>
        </p>
        <br>
    </body>
</html>

<?php
    $Delete=$_POST['Delete'];
    if($Delete==1){
        $sql = "DELETE FROM flight WHERE FlightID='$FlightID'";
        if (!mysqli_query($db,$sql)) {
            die('Error: ' . mysqli_error($db));
        }
        header('location: AirportInformation.php');
    }
    

?>