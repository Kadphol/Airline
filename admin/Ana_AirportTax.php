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
        <title>Airport Tax Report</title>
        <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="row d-flex justify-content-center">
            <div class="card-container">
                <div class="card-body">
            <h1><b>Airport Tax Statistic</b></h1>
            <table class='table'>
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
            <table class='table text-center'>
                <tr>
                    <td><b>Min</b></td>
                    <td><b>Max</b></td>
                    <td><b>Average</b></td>
                </tr>
                <?php
                while($row= mysqli_fetch_array($query2)) {
                    echo "<tr>";
                    echo "<td>".$row["Min"]."</td>";
                    echo "<td>".$row["Max"]."</td>";
                    echo "<td>".$row["Average"]."</td>";
                    echo "</tr>";
                }
                ?>
            </table>
            </div>
            </div>
        </div>
    </body>
</html>