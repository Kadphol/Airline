<?php
    #include("config/config.php");
    $db = mysqli_connect("localhost", "root", "", "airline");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $query = mysqli_query($db, "SELECT * 
                                FROM flight f, route r 
                                WHERE f.RouteID=r.RouteID AND FlightID='".$_GET["FlightID"]."'");
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
        $Price = $result['Price'];
    }
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
        <div class="row d-flex justify-content-center">
            <div class="card-container col-md-8">
                <div class="card-body">

        <div class="form-row">
                <input type="button" value="<Back" class='btn btn-primary btn-sm my-2 mx-2' style="height:30px;" onclick="window.location.href = 'AirportInformation.php'">       
        <h1><b>FlightID : <?php echo $FlightID?></b></h1>
        </div>
        <hr>
        <div class="text-right">
                    <div class="form-inline offset-md-10">
                        <form action="EditFlight.php" method="get">
                            <button type="submit" name="Edit" class='btn btn-primary mx-2' value="<?php echo $FlightID ?>">Edit</button>
                        </form>
                        <form action="#" method="post">
                            <button type="submit" name="Delete" class='btn btn-primary' value="1">Delete</button>
                        </form>
                    </div>
        </div>
        <p>
           <b> RouteID</b>&emsp;<?php echo $RouteID?><br>
           <b>From </b> <?php echo $Origin?> to <?php echo $Destination?><br>
        </p>
        
        <p>
        <b>Departure Date and Time</b>&emsp;<?php echo $Departure?><br>
        <b>Arrival Date and Time</b>&emsp;<?php echo $Arrival?><br><br>
        <b>  AirplaneID</b>&emsp;<?php echo $AirplaneID?><br>
        <b>  Gate</b>&emsp;<?php echo $Gate?><br>
        <b>  Status</b>&emsp;<?php if($Status=='n'){echo "Not Active";}
                                else{echo "Active";}?><br>
          <b>  Price</b>&emsp;<?php echo $Price ?><br>
        </p>
        <br>
        </div>
            </div>
        </div>
    </body>
</html>

<?php
    $Delete=$_POST['Delete'];
    if($Delete==1){
        $sql = "DELETE FROM flight WHERE FlightID='$FlightID'";
        if (!mysqli_query($db,$sql)) {
            die('Error: ' . mysqli_error($db));
        }
        header('location: AirportInformation.php');
    }
    

?>