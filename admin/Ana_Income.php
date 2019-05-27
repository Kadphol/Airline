<?php
    #include("config/config.php");
    $db = mysqli_connect("localhost","root","","airline");
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MYSQL: ".mysqli_connect_error();
    }
    $sql = "SELECT 
            CASE WHEN m = 1 THEN 'JAN'
                WHEN m = 2 THEN 'FEB'
                WHEN m = 3 THEN 'MAR'
                WHEN m = 4 THEN 'APR'
                WHEN m = 5 THEN 'MAY'
                WHEN m = 6 THEN 'JUN'
                WHEN m = 7 THEN 'JUL'
                WHEN m = 8 THEN 'AUG'
                WHEN m = 9 THEN 'SEP'
                WHEN m = 10 THEN 'OCT'
                WHEN m = 11 THEN 'NOV'
                WHEN m = 12 THEN 'DEC'
                END AS m,
                COUNT(*) Amount
            FROM (SELECT MONTH(PayDate) as m FROM Billing) b
            GROUP BY CASE WHEN m = 1 THEN 'JAN'
                WHEN m = 2 THEN 'FEB'
                WHEN m = 3 THEN 'MAR'
                WHEN m = 4 THEN 'APR'
                WHEN m = 5 THEN 'MAY'
                WHEN m = 6 THEN 'JUN'
                WHEN m = 7 THEN 'JUL'
                WHEN m = 8 THEN 'AUG'
                WHEN m = 9 THEN 'SEP'
                WHEN m = 10 THEN 'OCT'
                WHEN m = 11 THEN 'NOV'
                WHEN m = 12 THEN 'DEC'
                END";
    $query = mysqli_query($db,$sql);
?>
<!DOCTYPE html>
    <head>
        <title>Income Report</title>
    </head>
    <body>
        <div>
            <h1><b>Income per month</b></h1>
            <table>
                <tr>
                    <td>Month</td>
                    <td>Amount(Baht)</td>
                </tr>
                <?php
                while($row= mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td>".$row["m"]."</td>";
                    echo "<td>".$row["Amount"]."</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </body>
</html>