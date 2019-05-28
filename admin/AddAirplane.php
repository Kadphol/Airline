<?php
#include("config/config.php");
$db = mysqli_connect("localhost", "root", "", "airline");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
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

<html>

<head>
    <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>


<body>
    <div class="row d-flex justify-content-center">
        <div class="card-container col-md-8">
            <div class="card-body">
    <form action="AddAirplane_php.php" method="post">
        <div id='newElem'>
            <h1><b>Add Airplane</b></h1>
            <hr>
            <p>
                <!-- AirplaneID <input type="text" name="AirplaneID"> Auto Increment -->
                Register Date <input type="date" name="RegisDate"><br><br>
                Model No. <input type="text" name="ModelNo">
                Payload <input type="text" name="Payload"><br><br>
                Status
                <select name="Status">
                    <option value="" Selected>--Status--</option>
                    <option value="n">Not Active</option>
                    <option value="a">Active</option>
                </select>
            </p>
            <hr>
            <h2>Seat</h2>

            <div id="dynamicInput[0]">
                Row <input type="text" name="Row[]">
                to <input type="text" name="ToRow[]">
                <select name="Class[]">
                    <option value="" Selected>--Selected Class--</option>
                    <option value="First">First Class</option>
                    <option value="Business">Business</option>
                    <option value="Economy">Economy</option>
                </select>
                <input type="button" class="btn btn-primary" value="Add" onClick="Add();">
            </div>
        </div>
        <br>
        <input type="submit" class="btn btn-primary" value="Add Airplane">
    </form>
</div>
</div>
</div>
</body>
<script>
    var counter = 1;
    var dynamicInput = [];

    function Add() {
        var newdiv = document.createElement('div');
        newdiv.id = dynamicInput[counter];
        newdiv.innerHTML = "Row " + "<input type='text' name='Row[]'>" +
            " to " + "<input type='text' name='ToRow[]'>" +
            "<select name='Class[]'><option value='No[]' Selected>--Selected Class--</option><option value='First'>First Class</option><option value='Business'>Business</option><option value='Economy'>Economy</option></select>"+"<br>";
        document.getElementById('newElem').appendChild(newdiv);
        counter++;
    }
</script>

</html>