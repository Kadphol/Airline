<?php
    #include("config/config.php");
    $db = mysqli_connect("localhost","root","","airline");
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MYSQL: ".mysqli_connect_error();
    }
    $sql = "SELECT p.CardType AS Type,COUNT(*) AS Count
            FROM PaymentMethod p JOIN Billing b ON p.CardNo = b.CardNo
            WHERE b.PayDate BETWEEN '2019-01-01' AND '2019-12-31'
            GROUP BY p.CardType
            ORDER BY Count";
    $query = mysqli_query($db,$sql);
?>
<!DOCTYPE html>
    <head>
        <title>Most Payment method Report</title>
    </head>
    <body>
        <div>
            <h1><b>Most Payment method</b></h1>
            <table>
                <tr>
                    <td>Type</td>
                    <td>Count</td>
                </tr>
                <?php
                while($row= mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td>".$row["Type"]."</td>";
                    echo "<td>".$row["Count"]."</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </body>
</html>