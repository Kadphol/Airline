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
            FROM (SELECT FLOOR(DATEDIFF(CURDATE(),DOB)/365) as age FROM Passenger) p
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
    $sql2 = "SELECT MIN(age) AS Min,MAX(age) AS Max,AVG(age) AS Average
            FROM (SELECT FLOOR(DATEDIFF(CURDATE(),DOB)/365) as age FROM Passenger) p";
    $query2 = mysqli_query($db,$sql2);
?>

<!-- import font roboto -->
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

<!-- import style -->
<link rel="stylesheet" type="text/css" href="StaffStyle.css">

<!-- font awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!DOCTYPE html>
    <head>
        <title>Age of Passenger Report</title>
        <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <div class="row d-flex justify-content-center">
    <div class="card-container col-md-6">
    <div class="card-body">
        <div>
            <h1><b>Age of Passenger</b></h1>
            <table class='table text-center'>
                <tr>
                    <td><b>Min</b></td>
                    <td><b>Max</b></td>
                    <td><b>Average</b></td>
                </tr>
                <?php
                while($row1= mysqli_fetch_array($query2)) {
                    echo "<tr>";
                    echo "<td>".$row1["Min"]."</td>";
                    echo "<td>".$row1["Max"]."</td>";
                    echo "<td>".$row1["Average"]."</td>";
                    echo "</tr>";
                }
                ?>
            </table>
            <table class='table text-center'>
                <tr>
                    <td><b>Age</b></td>
                    <td><b>Amount</b></td>
                </tr>
                <?php
                while($row2= mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td>".$row2["age"]."</td>";
                    echo "<td>".$row2["Amount"]."</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
    </div>
    </div>
    </body>
</html>