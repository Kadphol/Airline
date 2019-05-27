<?php
    #include("config/config.php");
    $db = mysqli_connect("localhost", "root", "", "airline");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $query = mysqli_query($db, "SELECT * 
                                FROM route
                                WHERE RouteID='".$_GET["RouteID"]."'");
    while ($result = mysqli_fetch_array($query)) {
        $RouteID = $result['RouteID'];
        $Origin = $result['Origin'];
        $Destination = $result['Destination'];
        $Miles = $result['Miles'];
    }
    error_reporting(~E_NOTICE);
?>
<html>
    <body>
    <h1>RouteID : <?php echo $RouteID?></h1>
        <hr>
        <input type="button" value="<Back to AirportInformation" onclick="window.location.href = 'AirportInformation.php'">
        <form action="EditRoute.php" method="get">
            <button type="submit" name="Edit" value="<?php echo $RouteID ?>">Edit</button>
        </form>
        <form action="#" method="post">
            <button type="submit" name="Delete" value="1">Delete</button>
        </form>
        <hr>
        <p>
            Origin: <?php echo $Origin?><br>
            Destination: <?php echo $Destination?><br>
            Miles: <?php echo $Miles?><br>
        </p>
    </body>
</html>
<?php
    $Delete=$_POST['Delete'];
    if($Delete==1){
        $sql = "DELETE FROM route WHERE RouteID='$RouteID'";
        if (!mysqli_query($db,$sql)) {
            die('Error: ' . mysqli_error($db));
        }
        header('location: AirportInformation.php');
    }

?>