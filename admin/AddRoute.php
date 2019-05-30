<?php
#include("config/config.php");
$db = mysqli_connect("localhost", "root", "", "airline");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$query = mysqli_query($db, "SELECT * FROM airport");
while ($result = mysqli_fetch_array($query)) {
    $airport[] = $result['AirportID'];
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
        <div class="row justify-content-center">
            <div class="card-container col-md-8">
                <div class="card-body">
        <form action="AddRoute_php.php" method="post">
        <h1><b>Add Route</b></h1>
        <hr>
            <div class="form-row justify-content-left">
                <div class="form-group col-md-5">
                    <label>Origin</label>
                    <select name="Origin" class="form-control">
                        <option value="" Selected>--Origin--</option>
                        <?php
                        for ($i = 0; $i < sizeof($airport); $i++) { ?>
                            <option> <?php echo $airport[$i] ?> </option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-row justify-content-left">
                <div class="form-group col-md-5">
                    <label>Destination</label>
                    <select name="Destination" class="form-control">
                        <option value="" Selected>--Destination--</option>
                        <?php
                        for ($i = 0; $i < sizeof($airport); $i++) { ?>
                            <option> <?php echo $airport[$i] ?> </option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-row justify-content-left">
                <div class="form-group col-md-5">
                    <label>Miles</label>
                    <input type="text" name="Miles" class="form-control">
                </div>
            </div>

            <div class="container d-flex justify-content-center">
                <input type="submit" class="btn btn-primary" value="Add Route">
            </div>
        </form>
                </div>
                </div>
                </div>
    </body>
</html>