<?php
    #include("config/config.php");
    $db = mysqli_connect("localhost","root","","airline");
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MYSQL: ".mysqli_connect_error();
    }
    $Dsql = "SELECT Airport.AirportID AS IATA,Airport.AirportName AS AirportName,Airport.Address AS Country,COUNT(*) AS Departure_Count
            FROM Airport JOIN Route ON Airport.AirportID = Route.Origin 
            JOIN Flight ON Route.RouteID = Flight.RouteID
            GROUP BY Airport.AirportID
            ORDER BY Arrival_Count DESC
            LIMIT 10";
    $Dquery = mysqli_query($db,$Dsql);
    $DCount = 1;
    $Asql = "SELECT Airport.AirportID AS IATA,irport.AirportName AS AirportName,Airport.Address AS Country,COUNT(*) AS Arrival_Count
            FROM Airport JOIN Route ON Airport.AirportID = Route.Destination
            JOIN Flight ON Route.RouteID = Flight.RouteID
            GROUP BY Airport.AirportID
            ORDER BY Arrival_Count DESC
            LIMIT 10";
    $Aquery = mysqli_query($db,$Asql);
    $ACount = 1;
?>
<!DOCTYPE html>
    <head>
        <title>Most Flight Airport Report</title>
    </head>
    <body>
        <div>
            <h1><b>Most Departure Airport</b></h1>
            <table>
                <tr>
                    <td>No.</td>
                    <td>IATA</td>
                    <td>Airport Name</td>
                    <td>Country</td>
                    <td>Departure Count</td>
                </tr>
                <?php
                if($Dquery) {
                    while($row1= mysqli_fetch_array($Dquery)) {
                        echo "<tr>";
                        echo "<td>".$DCount."</td>";
                        echo "<td>".$row1["IATA"]."</td>";
                        echo "<td>".$row1["AirportName"]."</td>";
                        echo "<td>".$row1["Country"]."</td>";
                        echo "<td>".$row1["Departure_Count"]."</td>";
                        $DCount++;
                        echo "</tr>";
                    }
                }
                ?>
            </table>
        </div>
        <div>
        <h1><b>Most Arrival Airport</b></h1>
            <table>
                <tr>
                    <td>No.</td>
                    <td>IATA</td>
                    <td>Airport Name</td>
                    <td>Country</td>
                    <td>Arrival Count</td>
                </tr>
                <?php
                while($row2= mysqli_fetch_array($Aquery)) {
                    echo "<tr>";
                    echo "<td>".$ACount."</td>";
                    echo "<td>".$row2["IATA"]."</td>";
                    echo "<td>".$row2["AirportName"]."</td>";
                    echo "<td>".$row2["Country"]."</td>";
                    echo "<td>".$row2["Arrival_Count"]."</td>";
                    $ACount++;
                    echo "</tr>";
                }
                ?>
            </table>
            </div>
    </body>
</html>