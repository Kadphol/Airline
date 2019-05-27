<?php
    #include("config/config.php");
    $db = mysqli_connect("localhost","root","","airline");
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MYSQL: ".mysqli_connect_error();
    }
    // $sql = "SELECT f.FlightID,f.DepartureDate,f.ArrivalDate,CONCAT(r.Origin,' ',a.AirportName) AS OriginAirport
    //         FROM Airport a JOIN Route r ON a.airportID = r.Origin
    //         JOIN Flight f ON r.RouteID = f.RouteID
    //         WHERE CAST(f.DepartureDate AS DATE) = CURDATE()
    //         UNION
    //         SELECT f.FlightID,f.DepartureDate,f.ArrivalDate,CONCAT(r.Destination,' ',a.AirportName) AS DestinationAirport
    //         FROM Airport a JOIN Route r ON a.airportID = r.Destination
    //         JOIN Flight f ON r.RouteID = f.RouteID
    //         WHERE CAST(f.DepartureDate AS DATE) = CURDATE()";
    $sql = "SELECT f.FlightID,f.DepartureDate,f.ArrivalDate,CONCAT(r.Origin,' ',a.AirportName) AS OriginAirport,f.Gate
             FROM Airport a JOIN Route r ON a.airportID = r.Origin
             JOIN Flight f ON r.RouteID = f.RouteID
             WHERE CAST(f.DepartureDate AS DATE) = CURDATE()";
    $query = mysqli_query($db,$sql);
    while($row=mysqli_fetch_array($query)) {
        $FlightID[] = $row['FlightID'];
        $DepartureDate[] = $row['DepartureDate'];
        $ArrivalDate[] = $row['ArrivalDate'];
        $Origin[] = $row['OriginAirport'];
        $Gate[] = $row['Gate']; 
    }
    $sql2 = "SELECT CONCAT(r.Destination,' ',a.AirportName) AS DestinationAirport
            FROM Airport a JOIN Route r ON a.airportID = r.Destination
            JOIN Flight f ON r.RouteID = f.RouteID
            WHERE CAST(f.DepartureDate AS DATE) = CURDATE()";
    $query2 = mysqli_query($db,$sql2);
    while($row2=mysqli_fetch_array($query2)) {
        $Destination[] = $row2['DestinationAirport'];
    }
?>
<!DOCTYPE html>
    <head>
        <title>Today Flight Report</title>
    </head>
    <body>
        <div>
            <h1><b>Today Flight</b></h1>
            <table>
                <tr>
                    <td>FlightID</td>
                    <td>Departure Date</td>
                    <td>Arrival Date</td>
                    <td>From</td>
                    <td>To</td>
                    <td>Gate</td>
                </tr>
                <?php
                for($i = 0;$i < sizeof($FlightID);$i++) {
                    echo "<tr>";
                    echo "<td>".$FlightID[$i]."</td>";
                    echo "<td>".$DepartureDate[$i]."</td>";
                    echo "<td>".$ArrivalDate[$i]."</td>";
                    echo "<td>".$Origin[$i]."</td>";
                    echo "<td>".$Destination[$i]."</td>";
                    echo "<td>".$Gate[$i]."</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </body>
</html>