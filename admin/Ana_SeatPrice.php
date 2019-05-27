<?php
    #include("config/config.php");
    $db = mysqli_connect("localhost","root","","airline");
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MYSQL: ".mysqli_connect_error();
    }
    $sqlE = "SELECT MIN(FlightSeatPrice.Price) AS Min,MAX(FlightSeatPrice.Price) AS Max,AVG(FlightSeatPrice.Price) AS Average
                FROM AirplaneSeat JOIN FlightSeatPrice ON AirplaneSeat.Row = FlightSeatPrice.Row
                WHERE AirplaneSeat.ClassName LIKE 'Economy'";
    $Equery = mysqli_query($db,$sqlE);
    $sqlB = "SELECT MIN(FlightSeatPrice.Price) AS Min,MAX(FlightSeatPrice.Price) AS Max,AVG(FlightSeatPrice.Price) AS Average
                FROM AirplaneSeat JOIN FlightSeatPrice ON AirplaneSeat.Row = FlightSeatPrice.Row
                WHERE AirplaneSeat.ClassName LIKE 'Business'";
    $Bquery = mysqli_query($db,$sqlB);
    $sqlF = "SELECT MIN(FlightSeatPrice.Price) AS Min,MAX(FlightSeatPrice.Price) AS Max,AVG(FlightSeatPrice.Price) AS Average
                FROM AirplaneSeat JOIN FlightSeatPrice ON AirplaneSeat.Row = FlightSeatPrice.Row
                WHERE AirplaneSeat.ClassName LIKE 'First'";
    $Fquery = mysqli_query($db,$sqlF);
?>
<!DOCTYPE html>
    <head>
        <title>Price of seat Report</title>
    </head>
    <body>
        <div>
            <h1><b>Statistic of Seat price</b></h1>
            Economy Class
            <table>
                <tr>
                    <td>Min</td>
                    <td>Max</td>
                    <td>Average</td>
                </tr>
                <?php
                while($row1= mysqli_fetch_array($Equery)) {
                    echo "<tr>";
                    echo "<td>".$row1["Min"]."</td>";
                    echo "<td>".$row1["Max"]."</td>";
                    echo "<td>".$row1["Average"]."</td>";
                    echo "</tr>";
                }
                ?>
            </table>
            Bussiness Class
            <table>
                <tr>
                    <td>Min</td>
                    <td>Max</td>
                    <td>Average</td>
                </tr>
                <?php
                while($row2= mysqli_fetch_array($Bquery)) {
                    echo "<tr>";
                    echo "<td>".$row2["Min"]."</td>";
                    echo "<td>".$row2["Max"]."</td>";
                    echo "<td>".$row2["Average"]."</td>";
                    echo "</tr>";
                }
                ?>
            </table>
            First Class
            <table>
                <tr>
                    <td>Min</td>
                    <td>Max</td>
                    <td>Average</td>
                </tr>
                <?php
                while($row3= mysqli_fetch_array($Fquery)) {
                    echo "<tr>";
                    echo "<td>".$row3["Min"]."</td>";
                    echo "<td>".$row3["Max"]."</td>";
                    echo "<td>".$row3["Average"]."</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </body>
</html>