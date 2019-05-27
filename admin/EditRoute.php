<?php
    #include("config/config.php");
    $db = mysqli_connect("localhost", "root", "", "airline");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $query = mysqli_query($db, "SELECT * 
                                FROM route
                                WHERE RouteID='".$_GET["Edit"]."'");
    while ($result = mysqli_fetch_array($query)) {
        $RouteID = $result['RouteID'];
        $Origin = $result['Origin'];
        $Destination = $result['Destination'];
        $Miles = $result['Miles'];
    }
    //Airport
    $query1 = mysqli_query($db, "SELECT * FROM Airport");
    while ($result1 = mysqli_fetch_array($query1)) {
        $AllAirportID[] = $result1['AirportID'];
    }
    error_reporting(~E_NOTICE);
?>
<html>
    <body>
        <h1>RouteID : <?php echo $RouteID?></h1>
        <hr>
        <p>
            Origin: <?php echo $Origin?><br>
            Destination: <?php echo $Destination?><br>
            Miles: <?php echo $Miles?><br>
        </p>
    </body>
    <hr>
    <form action="EditRoute_php.php" method="post">
        Origin
        <select name="Origin">
                <option value="" Selected>--Origin--</option>
                <?php
                for ($i = 0; $i < sizeof($AllAirportID); $i++) { ?>
                    <option value="<?php echo $AllAirportID[$i]; ?>"> <?php echo $AllAirportID[$i] ?> </option>
                <?php } ?>
        </select><br>
        Destination
        <select name="Destination">
                <option value="" Selected>--Destination--</option>
                <?php
                for ($i = 0; $i < sizeof($AllAirportID); $i++) { ?>
                    <option value="<?php echo $AllAirportID[$i]; ?>"> <?php echo $AllAirportID[$i] ?> </option>
                <?php } ?>
        </select><br>
        Miles <input type="text" name="Miles">
        <button type="Submit" name="Edit" value="<?php echo $RouteID ?>" >Edit</button><br>
    </form>
</html>