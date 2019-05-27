<?php
    #include("config/config.php");
    $db = mysqli_connect("localhost","root","","airline");
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MYSQL: ".mysqli_connect_error();
    }
    $sql = "SELECT 
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
            FROM (SELECT FLOOR(DATEDIFF(DOB,CURDATE())/365) as age FROM Passenger) p
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
    $query = mysqli_query($db,$sql);
?>
<!DOCTYPE html>
    <head>
        <title>Age of Passenger Report</title>
    </head>
    <body>
        <div>
            <h1><b>Age of Passenger</b></h1>
            <table>
                <tr>
                    <td>Age</td>
                    <td>Amount</td>
                </tr>
                <?php
                while($row= mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td>".$row["age"]."</td>";
                    echo "<td>".$row["Amount"]."</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </body>
</html>