<?php
    #include("config/config.php");
    $db = mysqli_connect("localhost","root","","airline");
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MYSQL: ".mysqli_connect_error();
    }
    $sql = "SELECT Class.ClassName,COUNT(*) AS Count
            FROM Class JOIN AirplaneSeat ON Class.ClassName = AirplaneSeat.ClassName
            JOIN Booking ON AirplaneSeat.SeatID = Booking.SeatID
            GROUP BY Class.ClassName";
    $query = mysqli_query($db,$sql);
?>
<!DOCTYPE html>
    <head>
        <title>Reserved Airplane Classes Report</title>
    </head>
    <body>
        <div>
            <h1><b>Reserved Airplane Classes</b></h1>
            <table>
                <tr>
                    <td>Class Name</td>
                    <td>Count</td>
                </tr>
                <?php
                while($row= mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td>".$row["ClassName"]."</td>";
                    echo "<td>".$row["Count"]."</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </body>
</html>