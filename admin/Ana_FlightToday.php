<?php
    #include("config/config.php");
    $db = mysqli_connect("localhost","root","","airline");
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MYSQL: ".mysqli_connect_error();
    }
    // $sql = "SELECT f.FlightID,f.DepartureDate,f.ArrivalDate,CONCAT(r.Origin,' ',a.AirportName) AS OriginAirport
    //         FROM Airport a JOIN Route r ON a.airportID = r.Origin
    //         JOIN Flight f ON r.RouteID = f.RouteID
    //         WHERE CAST(f.DepartureDate AS DATE) = CURDATE()
    //         UNION
    //         SELECT f.FlightID,f.DepartureDate,f.ArrivalDate,CONCAT(r.Destination,' ',a.AirportName) AS DestinationAirport
    //         FROM Airport a JOIN Route r ON a.airportID = r.Destination
    //         JOIN Flight f ON r.RouteID = f.RouteID
    //         WHERE CAST(f.DepartureDate AS DATE) = CURDATE()";
    $sql = "SELECT f.FlightID,f.DepartureDate,f.ArrivalDate,CONCAT(r.Origin,' ',a.AirportName) AS OriginAirport,f.Gate
             FROM Airport a JOIN Route r ON a.airportID = r.Origin
             JOIN Flight f ON r.RouteID = f.RouteID
             WHERE CAST(f.DepartureDate AS DATE) = CURDATE()
             ORDER BY DepartureDate";
    $query = mysqli_query($db,$sql);
    while($row=mysqli_fetch_array($query)) {
        $FlightID[] = $row['FlightID'];
        $DepartureDate[] = $row['DepartureDate'];
        $ArrivalDate[] = $row['ArrivalDate'];
        $Origin[] = $row['OriginAirport'];
        $Gate[] = $row['Gate']; 
    }
    $sql2 = "SELECT CONCAT(r.Destination,' ',a.AirportName) AS DestinationAirport
            FROM Airport a JOIN Route r ON a.airportID = r.Destination
            JOIN Flight f ON r.RouteID = f.RouteID
            WHERE CAST(f.DepartureDate AS DATE) = CURDATE()";
    $query2 = mysqli_query($db,$sql2);
    while($row2=mysqli_fetch_array($query2)) {
        $Destination[] = $row2['DestinationAirport'];
    }
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
        <title>Today Flight Report</title>
    </head>
    <body>
        <div class="row justify-content-center">
            <div class="card-container">
                <div class="card-body">
            <h1><b>Today Flight</b></h1>
            <table class='table'>
                <tr>
                    <td>FlightID</td>
                    <td>Departure time</td>
                    <td>Arrival time</td>
                    <td>From</td>
                    <td>To</td>
                    <td>Gate</td>
                </tr>
                <?php
                for($i = 0;$i < sizeof($FlightID);$i++) {
                    echo "<tr>";
                    echo "<td>".$FlightID[$i]."</td>";
                    echo "<td>".$DepartureDate[$i]."</td>";
                    echo "<td>".$ArrivalDate[$i]."</td>";
                    echo "<td>".$Origin[$i]."</td>";
                    echo "<td>".$Destination[$i]."</td>";
                    echo "<td>".$Gate[$i]."</td>";
                    echo "</tr>";
                }
                ?>
            </table>
            </div>
            </div>
        </div>
    </body>
</html>