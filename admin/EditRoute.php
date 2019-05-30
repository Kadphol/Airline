<?php
    #include("config/config.php");
    $db = mysqli_connect("localhost", "root", "", "airline");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $query = mysqli_query($db, "SELECT * 
                                FROM route
                                WHERE RouteID='".$_GET["Edit"]."'");
    while ($result = mysqli_fetch_array($query)) {
        $RouteID = $result['RouteID'];
        $Origin = $result['Origin'];
        $Destination = $result['Destination'];
        $Miles = $result['Miles'];
    }
    //Airport
    $query1 = mysqli_query($db, "SELECT * FROM Airport");
    while ($result1 = mysqli_fetch_array($query1)) {
        $AllAirportID[] = $result1['AirportID'];
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
        <title>Peaktime Report</title>
        <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
    <div class="row d-flex justify-content-center">
            <div class="card-container col-md-8">
                <div class="card-body">


        <h1>RouteID : <?php echo $RouteID?></h1>
        <hr>
        <p>
        <b>Origin:</b> <?php echo $Origin?><br>
            <b>Destination:</b> <?php echo $Destination?><br>
            <b>Miles:</b> <?php echo $Miles?><br>
        </p>
 

    <hr>
    <form action="EditRoute_php.php" method="post">
    <b>Origin</b>
        <select name="Origin" class="form-control col-md-5">
                <option value="" Selected>--Origin--</option>
                <?php
                for ($i = 0; $i < sizeof($AllAirportID); $i++) { ?>
                    <option value="<?php echo $AllAirportID[$i]; ?>"> <?php echo $AllAirportID[$i] ?> </option>
                <?php } ?>
        </select><br>
        <b>Destination</b>
        <select name="Destination" class="form-control col-md-5">
                <option value="" Selected>--Destination--</option>
                <?php
                for ($i = 0; $i < sizeof($AllAirportID); $i++) { ?>
                    <option value="<?php echo $AllAirportID[$i]; ?>"> <?php echo $AllAirportID[$i] ?> </option>
                <?php } ?>
        </select><br>
        <div class="form-row my-2">
        <label><b>Miles</b></label> <input type="text" name="Miles" class="form-control col-md-5 mx-2">
        <button type="Submit" class="btn btn-primary" name="Edit" value="<?php echo $RouteID ?>" >Edit</button>
        </div><br>
    </form>
    </div>
            </div>
        </div>
        </body>
</html>