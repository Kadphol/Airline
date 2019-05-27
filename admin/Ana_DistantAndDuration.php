<?php
    #include("config/config.php");
    $db = mysqli_connect("localhost","root","","airline");
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MYSQL: ".mysqli_connect_error();
    }
    $sql = "SELECT Route.RouteID,Route.Origin,Route.Destination,Route.Miles
            FROM Route
            ORDER BY Miles DESC LIMIT 10";
    $query = mysqli_query($db,$sql);
    $MCount = 1;
    $sql2 = "SELECT Route.RouteID,Route.Origin,Route.Destination,TIMESTAMPDIFF(HOUR,Flight.DepartureDate, Flight.ArrivalDate) AS Duration
            FROM Route JOIN Flight ON Route.RouteID = Flight.RouteID
            GROUP BY Route.RouteID
            ORDER BY Duration DESC LIMIT 10";
    $query2 = mysqli_query($db,$sql2);
    $DCount = 1;
?>
<!DOCTYPE html>
    <head>
        <title>Distant and Duration Report</title>
    </head>
    <body>
        <div>
            <h1><b>Most Distant and Duration Route</b></h1>
            <table>
                <tr>
                    <td>No.</td>
                    <td>RouteID</td>
                    <td>Origin</td>
                    <td>Arrival</td>
                    <td>Distant(Miles)</td>
                </tr>
                <?php
                while($row= mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td>".$MCount."</td>";
                    echo "<td>".$row["RouteID"]."</td>";
                    echo "<td>".$row["Origin"]."</td>";
                    echo "<td>".$row["Destination"]."</td>";
                    echo "<td>".$row["Miles"]."</td>";
                    $MCount++;
                    echo "</tr>";
                }
                ?>
            </table>
            <table>
                <tr>
                    <td>No.</td>
                    <td>RouteID</td>
                    <td>Origin</td>
                    <td>Arrival</td>
                    <td>Duration(Hours)</td>
                </tr>
                <?php
                while($row= mysqli_fetch_array($query2)) {
                    echo "<tr>";
                    echo "<td>".$DCount."</td>";
                    echo "<td>".$row["RouteID"]."</td>";
                    echo "<td>".$row["Origin"]."</td>";
                    echo "<td>".$row["Destination"]."</td>";
                    echo "<td>".$row["Duration"]."</td>";
                    $DCount++;
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </body>
</html>