<?php
#include("config/config.php");
$db = mysqli_connect("localhost", "root", "", "airline");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$query = mysqli_query($db, "SELECT * 
                                FROM flight f, route r 
                                WHERE f.RouteID=r.RouteID AND FlightID='" . $_GET["Edit"] . "'");
while ($result = mysqli_fetch_array($query)) {
    $FlightID = $result['FlightID'];
    $Departure = $result['DepartureDate'];
    $Arrival = $result['ArrivalDate'];
    $RouteID = $result['RouteID'];
    $AirplaneID = $result['AirplaneID'];
    $Gate = $result['Gate'];
    $Status = $result['Status'];
    $Origin = $result['Origin'];
    $Destination = $result['Destination'];
}
//Airplane
$query1 = mysqli_query($db, "SELECT * FROM Airplane");
while ($result1 = mysqli_fetch_array($query1)) {
    $AllAirplaneID[] = $result1['AirplaneID'];
    //$AllAirport[] = $result1['AirportID'];
}
//Route
$query2 = mysqli_query($db, "SELECT * FROM route");
while ($result2 = mysqli_fetch_array($query2)) {
    $AllRouteID[] = $result2['RouteID'];
    $AllOrigin[] = $result2['Origin'];
    $AllDestination[] = $result2['Destination'];
}
// $Duration = $Departure->diff($Arrival);
error_reporting(~E_NOTICE);
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
    </head>

<body>
<div class="row d-flex justify-content-center" style="margin-bottom:10%">
            <div class="card-container col-md-8">
                <div class="card-body">
                <div class="form-row">
        <input type="button" value="<Back" class='btn btn-primary btn-sm my-2 mx-2' style="height:30px;" onclick="window.location.href = 'AirportInformation.php'"><h1>Flight : <?php echo $FlightID ?></h1>
        </div>
                <hr>
    <p>
        <b>RouteID</b>&emsp;<?php echo $RouteID ?><br>
        From <?php echo $Origin ?> to <?php echo $Destination ?><br>
    </p>

    <p>
    <b>FlightID</b>&emsp;<?php echo $FlightID ?><br>

    <b>Departure Date and Time</b>&emsp;<?php echo $Departure ?><br>
    <b>Arrival Date and Time</b>&emsp;<?php echo $Arrival ?><br>
    <b>AirplaneID</b>&emsp;<?php echo $AirplaneID ?><br>
    <b>Gate</b>&emsp;<?php echo $Gate ?><br>
    <b>Status</b>&emsp;<?php if ($Status == 'n') {
                        echo "Not Active";
                    } else {
                        echo "Active";
                    } ?><br>
    </p>
    <hr>
    <form action="EditFlight_php.php" method="post">
        <div class="form-row justify-content-left">
            <div class="form-group col-md-5">
            RouteID
            <select name="RouteID" class="form-control mx-1">
                <option value="" Selected>--RouteID--</option>
                <?php
                for ($i = 0; $i < sizeof($AllRouteID); $i++) { ?>
                    <option value="<?php echo $AllRouteID[$i]; ?>"> <?php echo $AllRouteID[$i] . " " . $AllOrigin[$i] . "-" . $AllDestination[$i] ?> </option>
                <?php } ?>
            </select>
            </div>
        </div>
        
            <div class="form-row justify-content-left ">
                <div class="form-group col-md-5">
                    <label>Departure Date and Time</label><input type="datetime-local" class="form-control" name="Departure" value="Departure">
                    <label>Arrival Date and Time</label><input type="datetime-local" class="form-control" name="Arrival" value="Arrival">
                </div>
            </div>


        <div class="row justify-content-left">
            <div class="form-group col-md-5"> 
                <label>AirplaneID </label>
                <select name="AirplaneID" class="form-control">
                    <option value="" Selected>--AirplaneID--</option>
                    <?php
                    for ($i = 0; $i < sizeof($AllAirplaneID); $i++) { ?>
                        <option value="<?php echo $AllAirplaneID[$i]; ?>"> <?php echo $AllAirplaneID[$i]." - ".$AllAirport[$i] ?> </option>
                    <?php } ?>
                </select>
            </div>
        </div>
        
        <div class="row justify-content-left">
            <div class="form-group col-md-5">
                 Gate <input type="text" name="Gate" class="form-control">
            </div>
        </div>

        <div class="row justify-content-left">
            <div class="form-group col-md-5">
                <label>Status</label>
                <select name="Status" class="form-control">
                    <option value="">--Status--</option>
                    <option value="n">Not Active</option>
                    <option value="a">Active</option>
                </select>
            </div>
        </div>

        <div class="row justify-content-left">
            <div class="form-group col-md-5">
            Price<input type="text" name="Price" class="form-control"><br>
            </div>
        </div>

        <div class="container d-flex justify-content-center">
        <button type="Submit" name="Edit" class="btn btn-primary" value="<?php echo $FlightID ?>" >Edit</button><br>
                    </div>
        
    </form>



                </div>
            </div>
        </div>

    
   

</body>

</html> 