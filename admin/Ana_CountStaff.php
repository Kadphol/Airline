<?php
#include("config/config.php");
$db = mysqli_connect("localhost", "root", "", "airline");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$query = mysqli_query($db, "SELECT s.AirportID,a.AirportName,COUNT(StaffID) 
                            FROM staff s, airport a
                            WHERE s.AirportID = a.AirportID
                            GROUP BY AirportID");
while ($result = mysqli_fetch_array($query)) {
    $AirportID[] = $result['AirportID'];
    $Staff[] = $result['COUNT(StaffID)'];
    $AirportName[] = $result['AirportName'];
}
?>

<html>
    <body>
    <table>
            <tr class="header">
                <th>AirportID</th>
                <th>AirportName</th>
                <th>Count Staff</th>
            </tr>
            <?php for ($i = 0; $i < sizeof($AirportID); $i++) { ?>
                <tr>
                    <td><?php echo $AirportID[$i] ?></td>
                    <td><?php echo $AirportName[$i] ?></td>
                    <td><?php echo $Staff[$i] ?></td>
                    <!-- <td>Manage</td> -->
                </tr>
            <?php } ?>
 
        </table>
    </body>
</html>