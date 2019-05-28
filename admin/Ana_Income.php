<?php
    #include("config/config.php");
    $db = mysqli_connect("localhost","root","","airline");
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MYSQL: ".mysqli_connect_error();
    }
    $sql = "SELECT 
            CASE WHEN m = 1 THEN 'JAN 2019'
                WHEN m = 2 THEN 'FEB 2019'
                WHEN m = 3 THEN 'MAR 2019'
                WHEN m = 4 THEN 'APR 2019'
                WHEN m = 5 THEN 'MAY 2019'
                WHEN m = 6 THEN 'JUN 2019'
                WHEN m = 7 THEN 'JUL 2019'
                WHEN m = 8 THEN 'AUG 2019'
                WHEN m = 9 THEN 'SEP 2019'
                WHEN m = 10 THEN 'OCT 2019'
                WHEN m = 11 THEN 'NOV 2019'
                WHEN m = 12 THEN 'DEC 2019'
                END AS m,
                SUM(Billing.AmountPaid) AS Amount
            FROM (SELECT MONTH(PayDate) as m FROM Billing) b,Billing
            GROUP BY CASE WHEN m = 1 THEN 'JAN 2019'
                WHEN m = 2 THEN 'FEB 2019'
                WHEN m = 3 THEN 'MAR 2019'
                WHEN m = 4 THEN 'APR 2019'
                WHEN m = 5 THEN 'MAY 2019'
                WHEN m = 6 THEN 'JUN 2019'
                WHEN m = 7 THEN 'JUL 2019'
                WHEN m = 8 THEN 'AUG 2019'
                WHEN m = 9 THEN 'SEP 2019'
                WHEN m = 10 THEN 'OCT 2019'
                WHEN m = 11 THEN 'NOV 2019'
                WHEN m = 12 THEN 'DEC 2019'
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