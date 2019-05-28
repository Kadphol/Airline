<?php
    #include("config/config.php");
    $db = mysqli_connect("localhost","root","","airline");
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MYSQL: ".mysqli_connect_error();
    }
    $sql = "SELECT Route.RouteID,Route.Origin,Route.Destination,Route.Miles
            FROM Route
            ORDER BY Miles DESC LIMIT 10";
    $query = mysqli_query($db,$sql);
    $MCount = 1;
    $sql2 = "SELECT Route.RouteID,Route.Origin,Route.Destination,TIMESTAMPDIFF(HOUR,Flight.DepartureDate, Flight.ArrivalDate) AS Duration
            FROM Route JOIN Flight ON Route.RouteID = Flight.RouteID
            GROUP BY Route.RouteID
            ORDER BY Duration DESC LIMIT 10";
    $query2 = mysqli_query($db,$sql2);
    $DCount = 1;
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
        <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Distant and Duration Report</title>
    </head>
    <body>
        <div class="row justify-content-center">
            <div class="card-container">
                <div class="card-body">
                
            <h1><b>Most Distant and Duration Route</b></h1>
            <table class='table'>
                <tr>
                    <td>No.</td>
                    <td>RouteID</td>
                    <td>Origin</td>
                    <td>Arrival</td>
                    <td>Distant(Miles)</td>
                </tr>
                <?php
                while($row= mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td>".$MCount."</td>";
                    echo "<td>".$row["RouteID"]."</td>";
                    echo "<td>".$row["Origin"]."</td>";
                    echo "<td>".$row["Destination"]."</td>";
                    echo "<td>".$row["Miles"]."</td>";
                    $MCount++;
                    echo "</tr>";
                }
                ?>
            </table>
            <table class="table text-center">
                <tr>
                    <td><b>No.</b></td>
                    <td><b>RouteID</b></td>
                    <td><b>Origin</b></td>
                    <td><b>Arrival</b></td>
                    <td><b>Duration(Hours)</b></td>
                </tr>
                <?php
                while($row= mysqli_fetch_array($query2)) {
                    echo "<tr>";
                    echo "<td>".$DCount."</td>";
                    echo "<td>".$row["RouteID"]."</td>";
                    echo "<td>".$row["Origin"]."</td>";
                    echo "<td>".$row["Destination"]."</td>";
                    echo "<td>".$row["Duration"]."</td>";
                    $DCount++;
                    echo "</tr>";
                }
                ?>
            </table>
                
            </div>
            </div>
        </div>
    </body>
</html>