<?php
#include("config/config.php");
$db = mysqli_connect("localhost", "root", "", "airline");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$query = mysqli_query($db, "SELECT * FROM Airplane");
while ($result = mysqli_fetch_array($query)) {
    $AirplaneID[] = $result['AirplaneID'];
}
$query2 = mysqli_query($db, "SELECT * FROM route");
while ($result2 = mysqli_fetch_array($query2)) {
    $RouteID[] = $result2['RouteID'];
    $Origin[] = $result2['Origin'];
    $Destination[] = $result2['Destination'];
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
    </head>

<body>
    <div class="row d-flex justify-content-center " style="margin-bottom:10%">
        <div class="card-container col-md-8">
            <div class="card-body">
    <form action="AddFlight_php.php" method="post">
        <h1><b>Add Flight</b></h1>
        <div class="form-group">
            <label>RouteID </label>
            <select name="RouteID" class="form-control  col-md-5">
                <option value="" Selected>--RouteID--</option>
                <?php
                for ($i = 0; $i < sizeof($RouteID); $i++) { ?>
                    <option> <?php echo $RouteID[$i]." ".$Origin[$i]."-".$Destination[$i] ?> </option>
                <?php } ?>
            </select>
                </div>
        <hr>
        <p>
            <div class="form-row justify-content-left">
                <div class="form-group col-md-5">
                <!-- FlightID <input type="text" name="FlightID"> Auto Increment -->
                    <label>Departure Time</label> <input type="datetime-local" name="Departure" class="mx-1 form-control">
                    <label>Arrival Time</label> <input type="datetime-local" name="Arrival" class="mx-1 form-control">
                </div>
            </div>
            <div class="form-row justify-content-left">
                <div class="form-group col-md-5">
                <label>AirplaneID</label>
                <select name="AirplaneID" class="form-control mx-1">
                    <option value="" Selected>--AirplaneID--</option>
                    <?php
                    for ($i = 0; $i < sizeof($AirplaneID); $i++) { ?>
                        <option> <?php echo $AirplaneID[$i]?> </option>
                    <?php } ?>
                </select>
               </div>
            </div>

            <div class="form-row justify-content-left">
                <div class="form-group col-md-5">
                <label>Gate</label>
                 <input type="text" name="Gate" class="form-control mx-1">
                </div>
            </div>

            <div class="form-row justify-content-left">
                <div class="form-group col-md-5">
                <label>Status</label>
            <select name="Status" class="form-control mx-1">
                <option value="" Selected>--Status--</option>
                <option value="n">Not Active</option>
                <option value="a">Active</option>
            </select>

                    </div>
                </div>
            
            <div class="form-row justify-content-left">
                <div class="form-group col-md-5">
                <label>Price</label>
                 <input type="text" name="Price" class="form-control mx-1">
                    </div>
                    </div>
           
        </p>
        <div class="container d-flex justify-content-center">
        <input type="submit" value="Add Flight" class="btn btn-primary">
                    </div>
    </form>

                </div>
                </div>
                </div>

</body>

</html>