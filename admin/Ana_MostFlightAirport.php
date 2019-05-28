<?php
    #include("config/config.php");
    $db = mysqli_connect("localhost","root","","airline");
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MYSQL: ".mysqli_connect_error();
    }
    $Dsql = "SELECT Airport.AirportID AS IATA,Airport.AirportName AS AirportName,Airport.Address AS Country,COUNT(*) AS Departure_Count
            FROM Airport JOIN Route ON Airport.AirportID = Route.Origin 
            JOIN Flight ON Route.RouteID = Flight.RouteID
            GROUP BY Airport.AirportID
            ORDER BY Departure_Count DESC
            LIMIT 10";
    $Dquery = mysqli_query($db,$Dsql);
    $DCount = 1;
    $Asql = "SELECT Airport.AirportID AS IATA,Airport.AirportName AS AirportName,Airport.Address AS Country,COUNT(*) AS Arrival_Count
            FROM Airport JOIN Route ON Airport.AirportID = Route.Destination
            JOIN Flight ON Route.RouteID = Flight.RouteID
            GROUP BY Airport.AirportID
            ORDER BY Arrival_Count DESC
            LIMIT 10";
    $Aquery = mysqli_query($db,$Asql);
    $ACount = 1;
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
        <title>Most Flight Airport Report</title>
        <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <div class="row d-flex justify-content-center">
    <div class="card-container col-md-6">
    <div class="card-body">
        <div>
            <h1><b>Most Departure Airport</b></h1>
            <table class='table text-center'>
                <tr>
                    <td><b>No.</b></td>
                    <td><b>IATA</b></td>
                    <td><b>Airport Name</b></td>
                    <td><b>City</b></td>
                    <td><b>Departure Count</b></td>
                </tr>
                <?php
                if($Dquery) {
                    while($row1= mysqli_fetch_array($Dquery)) {
                        echo "<tr>";
                        echo "<td>".$DCount."</td>";
                        echo "<td>".$row1["IATA"]."</td>";
                        echo "<td>".$row1["AirportName"]."</td>";
                        echo "<td>".$row1["Country"]."</td>";
                        echo "<td>".$row1["Departure_Count"]."</td>";
                        $DCount++;
                        echo "</tr>";
                    }
                }
                ?>
            </table>
        </div>
        <div>
        <h1><b>Most Arrival Airport</b></h1>
            <table class='table text-center'>
                <tr>
                    <td><b>No.</b></td>
                    <td><b>IATA</b></td>
                    <td><b>Airport Name</b></td>
                    <td><b>City</b></td>
                    <td><b>Arrival Count</b></td>
                </tr>
                <?php
                if($Aquery) {
                    while($row2= mysqli_fetch_array($Aquery)) {
                        echo "<tr>";
                        echo "<td>".$ACount."</td>";
                        echo "<td>".$row2["IATA"]."</td>";
                        echo "<td>".$row2["AirportName"]."</td>";
                        echo "<td>".$row2["Country"]."</td>";
                        echo "<td>".$row2["Arrival_Count"]."</td>";
                        $ACount++;
                        echo "</tr>";
                    }
                }
                ?>
            </table>
        </div>
            </div>
    </div>
    </div>
    </body>
</html>