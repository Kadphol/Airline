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
    <body>
        <form action="AddRoute_php.php" method="post">
            <h1>Add Route</h1>
            Origin
            <select name="Origin">
                <option value="" Selected>--Origin--</option>
                <?php
                for ($i = 0; $i < sizeof($airport); $i++) { ?>
                    <option> <?php echo $airport[$i] ?> </option>
                <?php } ?>
            </select><br><br>
            Destination
            <select name="Destination">
                <option value="" Selected>--Destination--</option>
                <?php
                for ($i = 0; $i < sizeof($airport); $i++) { ?>
                    <option> <?php echo $airport[$i] ?> </option>
                <?php } ?>
            </select><br><br>
            Miles<input type="text" name="Miles"><br><br>
            <input type="submit" value="Add Route">
        </form>
    </body>
</html>