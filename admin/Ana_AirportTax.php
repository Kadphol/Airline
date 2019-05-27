<?php
    #include("config/config.php");
    $db = mysqli_connect("localhost","root","","airline");
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MYSQL: ".mysqli_connect_error();
    }
    $sql = "SELECT AirportID,AirportName,AirportTax
            FROM Airport
            ORDER BY AirportTax DESC LIMIT 10";
    $query = mysqli_query($db,$sql);
    $No1 = 1;
    $sql2 = "SELECT MIN(AirportTax) AS Min,MAX(AirportTax) AS Max,AVG(AirportTax) AS Average
            FROM Airport";
    $query2 = mysqli_query($db,$sql2);
    $No2 = 1;
?>
<!DOCTYPE html>
    <head>
        <title>Airport Tax Report</title>
    </head>
    <body>
        <div>
            <h1><b>Airport Tax Statistic</b></h1>
            <table>
                <tr>
                    <td>No.</td>
                    <td>IATA</td>
                    <td>Airport Name</td>
                    <td>Airport Tax</td>
                </tr>
                <?php
                while($row= mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td>".$No1."</td>";
                    echo "<td>".$row["AirportID"]."</td>";
                    echo "<td>".$row["AirportName"]."</td>";
                    echo "<td>".$row["AirportTax"]."</td>";
                    echo "</tr>";
                }
                ?>
            </table>
            <table>
                <tr>
                    <td>Min</td>
                    <td>Max</td>
                    <td>Average</td>
                </tr>
                <?php
                while($row= mysqli_fetch_array($query2)) {
                    echo "<tr>";
                    echo "<td>".$No2."</td>";
                    echo "<td>".$row["Min"]."</td>";
                    echo "<td>".$row["Max"]."</td>";
                    echo "<td>".$row["Average"]."</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </body>
</html>