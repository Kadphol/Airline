<?php
    #include("config/config.php");
    $db = mysqli_connect("localhost","root","","airline");
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MYSQL: ".mysqli_connect_error();
    }
    $statSql = "SELECT MIN(age) AS Min,MAX(age) AS Max,AVG(age) AS Average
            FROM (SELECT FLOOR(DATEDIFF(CURDATE(),DOB)/365) as age FROM Staff) s";
    $statQuery = mysqli_query($db,$statSql);
    $disSql = "SELECT 
                CASE WHEN age > 0 AND age <= 10 THEN '0 - 10'
                    WHEN age > 10 AND age <= 20 THEN '11 - 20'
                    WHEN age > 20 AND age <= 30 THEN '21 - 30'
                    WHEN age > 30 AND age <= 40 THEN '31 - 40'
                    WHEN age > 40 AND age <= 50 THEN '41 - 50'
                    WHEN age > 50 AND age <= 60 THEN '51 - 60'
                    WHEN age > 60 AND age <= 70 THEN '61 - 70'
                    WHEN age > 70 AND age <= 80 THEN '71 - 80'
                    WHEN age > 80 AND age <= 90 THEN '81 - 90'
                    WHEN age > 90 AND age <= 100 THEN '91 - 100'
                    ELSE '>100' END AS age,
                COUNT(*) AS Amount
                FROM (SELECT FLOOR(DATEDIFF(CURDATE(),DOB)/365) as age FROM Staff) s
                GROUP BY CASE WHEN age > 0 AND age <= 10 THEN '0 - 10'
                WHEN age > 10 AND age <= 20 THEN '11 - 20'
                WHEN age > 20 AND age <= 30 THEN '21 - 30'
                WHEN age > 30 AND age <= 40 THEN '31 - 40'
                WHEN age > 40 AND age <= 50 THEN '41 - 50'
                WHEN age > 50 AND age <= 60 THEN '51 - 60'
                WHEN age > 60 AND age <= 70 THEN '61 - 70'
                WHEN age > 70 AND age <= 80 THEN '71 - 80'
                WHEN age > 80 AND age <= 90 THEN '81 - 90'
                WHEN age > 90 AND age <= 100 THEN '91 - 100'
                ELSE '>100'END";
    $disQuery = mysqli_query($db,$disSql);
?>
<!DOCTYPE html>
    <head>
        <title>Age of Staff Report</title>
    </head>
    <body>
        <div>
            <h1><b>Age of Staff</b></h1>
            <table>
                <tr>
                    <td>Min</td>
                    <td>Max</td>
                    <td>Average</td>
                </tr>
                <?php
                while($row1= mysqli_fetch_array($statQuery)) {
                    echo "<tr>";
                    echo "<td>".$row1["Min"]."</td>";
                    echo "<td>".$row1["Max"]."</td>";
                    echo "<td>".$row1["Average"]."</td>";
                    echo "</tr>";
                }
                ?>
            </table>
            <table>
                <tr>
                    <td>Age</td>
                    <td>Amount</td>
                </tr>
                <?php
                while($row2= mysqli_fetch_array($disQuery)) {
                    echo "<tr>";
                    echo "<td>".$row2["age"]."</td>";
                    echo "<td>".$row2["Amount"]."</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </body>
</html>